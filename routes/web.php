<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CandidateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

     Route::get('/user-choose', [UserController::class, 'user_choose'])->name('user-choose');

});

Route::get('candidate/register', [CandidateController::class, 'showRegistrationForm'])->name('candidate.register');
Route::post('candidate/register', [CandidateController::class, 'register'])->name('candidate.register');
Route::get('candidate/login', [CandidateController::class, 'showLoginForm'])->name('candidate.login');
Route::post('candidate/login', [CandidateController::class, 'login'])->name('candidate.login');
Route::get('/candidate-login-google', [CandidateController::class, 'redirectToGoogle'])->name('candidate.login.google');

