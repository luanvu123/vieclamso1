<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class EmployerResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected function broker()
    {
        return Password::broker('employers');
    }

    protected function guard()
    {
        return auth()->guard('employer');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('pages.app-reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
