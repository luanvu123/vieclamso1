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
            'email' => 'required|string|email|max:255|unique:candidates',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|in:male,female', // Xác thực giới tính phải là 'male' hoặc 'female'
            'phone' => 'required|string|max:15|regex:/^[0-9]+$/', // Xác thực số điện thoại (chỉ chứa số)
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $employer = Employer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'gender' => $request->input('gender'), // Lưu giới tính
            'phone' => $request->input('phone'),   // Lưu số điện thoại
        ]);

        return redirect()->route('job-postings.dashboard')->with('success', 'Registration successful.');
    }
}
