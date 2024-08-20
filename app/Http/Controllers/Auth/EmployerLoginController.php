<?php

// app/Http/Controllers/Auth/EmployerLoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EmployerLoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('employer')->except('logout');
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
}
