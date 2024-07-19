<?php

// app/Http/Controllers/Auth/EmployerLoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EmployerLoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest:employer')->except('logout');
    // }

    public function showLoginForm()
    {
        return view('pages.app-login');
    }

      public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('employer')->attempt($credentials)) {
            return redirect()->route('job-postings.dashboard')->with('success', 'Xin chào ' . Auth::guard('employer')->user()->name);
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
        }
    }

    public function dashboard()
    {
        return view('job_postings.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('employer')->logout();
        return redirect()->route('employer.login');
    }
    public function profile()
    {
        $employer = Auth::guard('employer')->user();
        return view('employer.profile', compact('employer'));
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

        $employer->save();

        return redirect()->route('employer.profile')->with('success', 'Profile updated successfully.');
    }
}
