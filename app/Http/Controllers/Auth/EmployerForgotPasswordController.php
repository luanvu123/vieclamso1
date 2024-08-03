<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class EmployerForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    protected function broker()
    {
        return Password::broker('employers');
    }

    public function showLinkRequestForm()
    {
        return view('pages.app-forgot-password');
    }
}
