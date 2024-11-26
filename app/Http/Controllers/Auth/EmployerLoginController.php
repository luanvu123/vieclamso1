<?php

// app/Http/Controllers/Auth/EmployerLoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\OTP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Twilio\Rest\Client;
use App\Mail\SendOTP;
use App\Mail\SendOtpMail;
use App\Models\Application;
use Laravel\Socialite\Facades\Socialite;

class EmployerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.app-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('employer')->attempt($credentials)) {
            $employer = Auth::guard('employer')->user();

            if ($employer->isVerifyEmail == false) {
                // Gửi mã OTP đến email của người dùng
                $otp = OTP::create([
                    'employer_id' => $employer->id,
                    'otp_code' => rand(100000, 999999),
                    'expires_at' => Carbon::now()->addMinutes(10),
                ]);

                Mail::to($employer->email)->send(new SendOTP($otp->otp_code));

                Auth::guard('employer')->logout();
                 return redirect()->back()->with('otp_needed', true)
                ->with('warning', 'Email của bạn chưa được xác thực. Vui lòng kiểm tra email để nhập mã OTP bên dưới.');
            }

            return redirect()->route('job-postings.dashboard')->with('success', 'Xin chào ' . $employer->name);
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
        }
    }


    public function verifyEmail(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|numeric',
        ]);

        $otp = OTP::where('otp_code', $request->input('otp_code'))
            ->where('expires_at', '>=', Carbon::now())
            ->first();

        if ($otp) {
            $employer = Employer::find($otp->employer_id);
            $employer->isVerifyEmail = true;
            $employer->save();

            // Xóa OTP sau khi xác thực
            $otp->delete();

            // Đăng nhập lại sau khi xác thực OTP thành công
            Auth::guard('employer')->login($employer);

            return redirect()->route('job-postings.dashboard')->with('success', 'Xác thực email thành công.');
        } else {
            return redirect()->back()->withErrors(['otp_code' => 'Mã OTP không hợp lệ hoặc đã hết hạn.']);
        }
    }

    public function dashboard()
    {
         $employer = Auth::guard('employer')->user();
         $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('job_postings.dashboard', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }

    public function logout(Request $request)
    {
        Auth::guard('employer')->logout();
        return redirect()->route('employer.login');
    }
    public function profile()
    {
        $employer = Auth::guard('employer')->user();
         $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('employer.profile', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function formChangePasswordEmployer()
    {
        $employer = Auth::guard('employer')->user();
         $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('employer.password', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function formPhone()
    {
        $employer = Auth::guard('employer')->user();
         $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('employer.phone', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function formCertificate()
    {
        $employer = Auth::guard('employer')->user();
         $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('employer.gpkd', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function formCompany()
    {
        $employer = Auth::guard('employer')->user();
         $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('employer.company', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }

    public function updateCertificate(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        // Xử lý cập nhật business_license
        if ($request->hasFile('business_license')) {
            if ($employer->business_license && Storage::disk('public')->exists($employer->business_license)) {
                Storage::disk('public')->delete($employer->business_license);
            }
            $businessLicense = $request->file('business_license');
            $businessLicensePath = $businessLicense->store('documents', 'public');
            $employer->business_license = $businessLicensePath;
        }

        // Xử lý cập nhật commission
        if ($request->hasFile('commission')) {
            if ($employer->commission && Storage::disk('public')->exists($employer->commission)) {
                Storage::disk('public')->delete($employer->commission);
            }
            $commission = $request->file('commission');
            $commissionPath = $commission->store('documents', 'public');
            $employer->commission = $commissionPath;
        }

        // Xử lý cập nhật identification_card
        if ($request->hasFile('identification_card')) {
            if ($employer->identification_card && Storage::disk('public')->exists($employer->identification_card)) {
                Storage::disk('public')->delete($employer->identification_card);
            }
            $identificationCard = $request->file('identification_card');
            $identificationCardPath = $identificationCard->store('documents', 'public');
            $employer->identification_card = $identificationCardPath;
        }

        // Xử lý cập nhật identification_card_behind
        if ($request->hasFile('identification_card_behind')) {
            if ($employer->identification_card_behind && Storage::disk('public')->exists($employer->identification_card_behind)) {
                Storage::disk('public')->delete($employer->identification_card_behind);
            }
            $identificationCardBehind = $request->file('identification_card_behind');
            $identificationCardBehindPath = $identificationCardBehind->store('documents', 'public');
            $employer->identification_card_behind = $identificationCardBehindPath;
        }

        // Lưu lại các thay đổi
        $employer->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin giấy tờ thành công.');
    }

    public function updateProfile(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employers,email,' . $employer->id,
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'business_license' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'commission' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'identification_card' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $employer->name = $request->name;
        $employer->email = $request->email;
        $employer->gender = $request->gender;
        $employer->phone = $request->phone;
        $employer->status = $request->status ?? $employer->status;

        if ($request->hasFile('avatar')) {
            if ($employer->avatar && Storage::disk('public')->exists($employer->avatar)) {
                Storage::disk('public')->delete($employer->avatar);
            }
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatar_employer', 'public');
            $employer->avatar = $avatarPath;
        }
        if ($request->hasFile('business_license')) {
            if ($employer->business_license && Storage::disk('public')->exists($employer->business_license)) {
                Storage::disk('public')->delete($employer->business_license);
            }
            $businessLicense = $request->file('business_license');
            $businessLicensePath = $businessLicense->store('documents', 'public');
            $employer->business_license = $businessLicensePath;
        }

        if ($request->hasFile('commission')) {
            if ($employer->commission && Storage::disk('public')->exists($employer->commission)) {
                Storage::disk('public')->delete($employer->commission);
            }
            $commission = $request->file('commission');
            $commissionPath = $commission->store('documents', 'public');
            $employer->commission = $commissionPath;
        }

        if ($request->hasFile('identification_card')) {
            if ($employer->identification_card && Storage::disk('public')->exists($employer->identification_card)) {
                Storage::disk('public')->delete($employer->identification_card);
            }
            $identificationCard = $request->file('identification_card');
            $identificationCardPath = $identificationCard->store('documents', 'public');
            $employer->identification_card = $identificationCardPath;
        }

        $employer->save();

        return redirect()->route('employer.profile')->with('success', 'Profile updated successfully.');
    }
    public function changePasswordEmployer(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $employer = Auth::guard('employer')->user();

        if (!Hash::check($request->current_password, $employer->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $employer->password = Hash::make($request->new_password);
        $employer->save();

        return back()->with('status', 'Password changed successfully');
    }
    // public function sendOtp(Request $request)
    // {
    //     $employer = Auth::guard('employer')->user();
    //     $otp = rand(100000, 999999);
    //     $employer->otp = $otp;
    //     $employer->save();
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_TOKEN');
    //     $from = env('TWILIO_FROM');

    //     $twilio = new Client($sid, $token);


    //     $twilio->messages->create(
    //         $employer->phone,
    //         [
    //             'from' => $from,
    //             'body' => "Your OTP is: $otp",
    //         ]
    //     );
    // }



    public function sendOtp(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        // Generate a random 6-digit OTP
        $otp = rand(100000, 999999);

        // Save the OTP to the employer's database record
        $employer->otp = $otp;
        $employer->save();

        // Send OTP via email
        Mail::to($employer->email)->send(new SendOtpMail($otp));

        return back()->with('status', 'Otp sent to your email successfully');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|min:6|max:6',
        ]);

        $employer = Auth::guard('employer')->user();

        if ($employer->otp === $request->otp) {
            $employer->isVerify = true;
            $employer->otp = null; // Clear the OTP after verification
            $employer->save();

            return redirect()->route('job-postings.dashboard')->with('success', 'Phone number verified successfully.');
        } else {
            return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google_employer')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google_employer')->user();
            $employer = Employer::where('email', $user->getEmail())->first();

            if (!$employer) {
                $employer = Employer::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make(''), // Để trống mật khẩu
                ]);
            }

            Auth::guard('employer')->login($employer);
            return redirect()->route('job-postings.dashboard')->with('success', 'Xin chào ' . $employer->name);
        } catch (\Exception $e) {
            return redirect()->route('employer.login')->with('error', 'Failed to log in with Google.');
        }
    }
}
