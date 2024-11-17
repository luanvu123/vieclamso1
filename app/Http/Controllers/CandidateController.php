<?php

namespace App\Http\Controllers;

use App\Models\JobReport;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidateVerificationMail;
use App\Models\Category;
use App\Models\City;

class CandidateController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('pages.signup');
    }

    /**
     * Handle the registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidates',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo mã xác thực ngẫu nhiên
        $verificationToken = Str::random(32);

        // Tạo một bản ghi ứng viên tạm thời với trạng thái chưa kích hoạt
        $candidate = Candidate::create([
            'fullname_candidate' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => 0,  // trạng thái chưa kích hoạt
            'verification_token' => $verificationToken,
        ]);

        // Gửi email xác thực
        Mail::to($candidate->email)->send(new CandidateVerificationMail($candidate));

        return redirect()->route('candidate.register')->with('success', 'Vui lòng kiểm tra email để xác thực tài khoản.');
    }


    public function verify($token)
    {
        // Tìm ứng viên với mã xác thực
        $candidate = Candidate::where('verification_token', $token)->first();

        if (!$candidate) {
            return redirect()->route('candidate.register')->with('error', 'Mã xác thực không hợp lệ.');
        }

        // Cập nhật trạng thái và xóa mã xác thực
        $candidate->status = 1;
        $candidate->verification_token = null;
        $candidate->save();

        return redirect()->route('candidate.login')->with('success', 'Tài khoản của bạn đã được xác thực thành công.');
    }

    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('candidate')->attempt($credentials)) {
            $candidate = Auth::guard('candidate')->user();

            // Kiểm tra nếu tài khoản chưa xác thực
            if ($candidate->verification_token !== null) {
                Auth::guard('candidate')->logout(); // Đăng xuất ngay lập tức nếu chưa xác thực
                return redirect()->back()->withInput()->withErrors(['email' => 'Bạn chưa xác thực tài khoản. Vui lòng kiểm tra email.']);
            }

            // Nếu đã xác thực
            return redirect()->route('/')->with('success', 'Xin chào ' . $candidate->fullname_candidate);
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
        }
    }

    public function dashboard()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.home', compact('notifications'));
    }
    public function logout()
    {
        Auth::guard('candidate')->logout();
        return redirect()->route('candidate.login');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $candidate = Candidate::where('email', $user->getEmail())->first();

            if (!$candidate) {
                $candidate = new Candidate();
                $candidate->fullname_candidate = $user->getName();
                $candidate->email = $user->getEmail();
                $candidate->password = Hash::make('');
                $candidate->save();
            }
            Auth::guard('candidate')->login($candidate);
            return redirect('/')->with('success', 'Xin chào ' . $candidate->fullname_candidate);
        } catch (\Exception $e) {
            return redirect()->route('candidate.login')->with('error', 'Failed to log in with Google.');
        }
    }
    public function showAccount()
    {
        $candidate = Auth::guard('candidate')->user();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.profile', compact('candidate', 'notifications'));
    }

    public function updateAccount(Request $request)
    {
        $candidate = Auth::guard('candidate')->user();

        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $candidate->update([
            'fullname_candidate' => $request->input('fullname'),
            'phone_number_candidate' => $request->input('phone'),
        ]);

        return redirect()->route('candidate.account')->with('success', 'Thông tin cá nhân đã được cập nhật.');
    }


    public function showChangePasswordForm()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.change-password', 'notifications');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed',
        ]);

        $user = Auth::guard('candidate')->user();
        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['currentPassword' => 'Mật khẩu hiện tại không đúng']);
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        return back()->with('success', 'Mật khẩu đã được thay đổi thành công');
    }

    public function showPersonalProfile()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Lấy danh sách tất cả ngành nghề
        $categories = Category::where('status', 1)->get();
          $cities = City::where('status', 1)->get();

        return view('pages.personal-profile', compact('notifications', 'categories', 'cities'));
    }

    public function updatePersonalProfile(Request $request)
    {
        $candidate = Auth::guard('candidate')->user();

        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'favorite_skills' => 'nullable|string|max:255',
            'favorite_tags' => 'nullable|string|max:255',
            'is_public_profile' => 'boolean',
            'hide_cv' => 'boolean',
            'description' => 'nullable|string|max:1000',
            'linkedin' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:100000',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level' => 'nullable|string|max:255',
            'desired_level' => 'nullable|string|max:255',
            'desired_salary' => 'nullable|integer|min:0',
            'education_level' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|integer|min:0',
            'working_form' => 'nullable|string|max:255',
        ]);

        // Cập nhật thông tin cá nhân
        $candidate->update([
            'fullname_candidate' => $request->input('fullname'),
            'phone_number_candidate' => $request->input('phone'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'skill' => $request->input('favorite_skills'),
            'position' => $request->input('favorite_tags'),
            'is_public' => $request->input('is_public_profile', 0),
            'cv_public' => $request->input('hide_cv', 0),
            'story' => $request->input('description'),
            'linkedin' => $request->input('linkedin'),
            'level' => $request->input('level'),
            'desired_level' => $request->input('desired_level'),
            'desired_salary' => $request->input('desired_salary'),
            'education_level' => $request->input('education_level'),
            'years_of_experience' => $request->input('years_of_experience'),
            'working_form' => $request->input('working_form'),
        ]);
         $candidate->cities()->sync($request->input('cities', []));
        $candidate->categories()->sync($request->input('categories', []));
        // Cập nhật avatar nếu có upload
        if ($request->hasFile('avatar')) {
            if ($candidate->avatar_candidate && Storage::disk('public')->exists($candidate->avatar_candidate)) {
                Storage::disk('public')->delete($candidate->avatar_candidate);
            }
            $avatar = $request->file('avatar');
            $candidate->avatar_candidate = $avatar->store('avatars', 'public');
        }
        if ($request->hasFile('resume')) {
            if ($candidate->cv_path && Storage::disk('public')->exists($candidate->cv_path)) {
                Storage::disk('public')->delete($candidate->cv_path);
            }
            $candidate->cv_path = $request->file('resume')->store('cvs', 'public');
        }
        if ($request->hasFile('cover_letter')) {
            if ($candidate->letter_path && Storage::disk('public')->exists($candidate->letter_path)) {
                Storage::disk('public')->delete($candidate->letter_path);
            }
            $candidate->letter_path = $request->file('cover_letter')->store('cover_letters', 'public');
        }
        if ($request->hasFile('cover_image')) {
            if ($candidate->cover_image && Storage::disk('public')->exists($candidate->cover_image)) {
                Storage::disk('public')->delete($candidate->cover_image);
            }
            $candidate->cover_image = $request->file('cover_image')->store('cover_images', 'public');
        }

        $candidate->save();

        return redirect()->route('personal.profile.account')->with('success', 'Hồ sơ cá nhân đã được cập nhật.');
    }


    public function overview()
    {
        $candidate = Auth::guard('candidate')->user();

        $educations = $candidate->educations;
        $experiences = $candidate->experiences;
        $skills = $candidate->skills;
        $certificates = $candidate->certificates;
        $projects = $candidate->projects;
        $activities = $candidate->activities;
        $hobbies = $candidate->hobbies;
        $advisers = $candidate->advisers;
        $prizes = $candidate->prizes;
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.overview', compact(
            'candidate',
            'educations',
            'experiences',
            'skills',
            'certificates',
            'projects',
            'activities',
            'hobbies',
            'advisers',
            'prizes',
            'notifications'
        ));
    }


    public function showCv($id)
    {
        $candidate = Candidate::with([
            'educations',
            'experiences',
            'skills',
            'certificates',
            'projects',
            'activities',
            'hobbies',
            'advisers',
            'prizes'
        ])->findOrFail($id);
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.overview-cv', compact('candidate', 'notifications'));
    }

    public function storeReport(Request $request)
    {
        $request->validate([
            'job_posting_id' => 'required|exists:job_postings,id',
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        JobReport::create([
            'job_posting_id' => $request->job_posting_id,
            'candidate_id' => Auth::guard('candidate')->id(),
            'name' => $request->name,
            'content' => $request->content,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Job report submitted successfully.');
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $candidate = Candidate::where('email', $user->getEmail())->first();

            if (!$candidate) {
                $candidate = new Candidate();
                $candidate->fullname_candidate = $user->getName();
                $candidate->email = $user->getEmail();
                $candidate->password = Hash::make('');
                $candidate->save();
            }
            Auth::guard('candidate')->login($candidate);
            return redirect('/')->with('success', 'Xin chào ' . $candidate->fullname_candidate);
        } catch (\Exception $e) {
            return redirect()->route('candidate.login')->with('error', 'Failed to log in with Google.');
        }
    }

    public function markAllAsRead()
    {
        // Lấy tất cả thông báo của ứng viên hiện tại và cập nhật cột 'is_read' thành true
        Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->update(['is_read' => true]);

        return back(); // Quay lại trang trước
    }
}
