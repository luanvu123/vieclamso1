<?php
// app/Http/Controllers/Auth/EmployerRegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployerRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pages.app-register');
    }


   public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:6|confirmed',
        'gender' => 'required|in:male,female',
        'phone' => 'required|string|max:15|regex:/^[0-9]+$/',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Kiểm tra email đã tồn tại hay chưa
    if (Employer::where('email', $request->email)->exists()) {
        return redirect()->back()->with('error', 'Email này đã được đăng ký!')->withInput();
    }

    $employer = Employer::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'gender' => $request->input('gender'),
        'phone' => $request->input('phone'),
    ]);

    return redirect()->route('job-postings.dashboard')->with('success', 'Đăng ký thành công.');
}

}
