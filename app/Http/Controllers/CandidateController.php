<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

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

        $candidate = Candidate::create([
            'fullname_candidate' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => 1, // Default status
        ]);

        return redirect()->route('candidate.register')->with('success', 'Registration successful.');
    }

    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('candidate')->attempt($credentials)) {
            return redirect()->route('candidate.dashboard')->with('success', 'Xin chào ' . Auth::guard('candidate')->user()->name);
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
        }
    }

    public function dashboard()
    {
        return view('pages.home');
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
            $existingUser = Candidate::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::guard('candidate')->login($existingUser);
            } else {
                $newUser = Candidate::create([
                    'fullname_candicate' => $user->getName(),
                    'email' => $user->getEmail(),
                    'avatar_candicate' => $user->getAvatar(),
                    // Other fields as required
                ]);
                Auth::guard('candidate')->login($newUser);
            }

            return redirect()->route('candidate.dashboard')->with('success', 'Xin chào ' . Auth::guard('candidate')->user()->fullname_candicate);
        } catch (\Exception $e) {
            return redirect()->route('candidate.login')->withErrors(['email' => 'Đăng nhập bằng Google thất bại, vui lòng thử lại.']);
        }
    }
    public function showAccount()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('pages.profile', compact('candidate'));
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

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $candidate = Auth::guard('candidate')->user();

        if ($request->hasFile('avatar')) {
            // Xóa ảnh cũ nếu có
            if ($candidate->avatar_candidate && Storage::disk('public')->exists($candidate->avatar_candidate)) {
                Storage::disk('public')->delete($candidate->avatar_candidate);
            }

            // Lưu ảnh mới vào disk 'public'
            $avatar = $request->file('avatar');
            $path = $avatar->store('avatars', 'public');

            // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
            $candidate->avatar_candidate = $path;
            $candidate->save();
        }

        return redirect()->back()->with('success', 'Ảnh đại diện đã được cập nhật.');
    }
}
