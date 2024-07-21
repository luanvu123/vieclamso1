<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\EmployerLoginController;
use App\Http\Controllers\EmployerManageController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobsManageController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateManageController;
use App\Http\Controllers\Auth\EmployerRegisterController;
use App\Http\Controllers\CVController;
use App\Models\Candidate;
use Laravel\Socialite\Facades\Socialite;
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

Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('job/{slug}', [SiteController::class, 'show'])->name('job.show');

Auth::routes();
Route::get('/recruitment', function () {
    return view('pages.recruitment');
})->name('recruitment');

Route::get('/search-jobs', [SiteController::class, 'searchJobs'])->name('search-jobs');
Route::get('employer/login', [EmployerLoginController::class, 'showLoginForm'])->name('employer.login');
Route::post('employer/login', [EmployerLoginController::class, 'login'])->name('employer.login.submit');
Route::get('employer/register', [EmployerRegisterController::class, 'showRegistrationForm'])->name('employer.register');
Route::post('employer/register', [EmployerRegisterController::class, 'register'])->name('employer.register.submit');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('candidates', CandidateManageController::class);
    Route::put('/users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::get('/user-choose', [UserController::class, 'user_choose'])->name('user-choose');
    Route::resource('employers', EmployerManageController::class);
    Route::resource('job-postings-manage', JobsManageController::class);
    Route::get('/jobPosting-choose', [JobsManageController::class, 'jobPosting_choose'])->name('jobPosting-choose');
});
Route::get('/candidate-login-google', [CandidateController::class, 'redirectToGoogle'])->name('candidate.login.google');
Route::get('candidate/register', [CandidateController::class, 'showRegistrationForm'])->name('candidate.register');
Route::post('candidate/register', [CandidateController::class, 'register'])->name('candidate.register');
Route::get('candidate/login', [CandidateController::class, 'showLoginForm'])->name('candidate.login');
Route::post('candidate/login', [CandidateController::class, 'login'])->name('candidate.login');
Route::post('candidate/logout', [CandidateController::class, 'logout'])->name('candidate.logout');


Route::get('candidate/google', [CandidateController::class, 'redirectToGoogle'])->name('candidate.google');
Route::get('candidate/google/callback', [CandidateController::class, 'handleGoogleCallback']);


Route::middleware(['candidate'])->group(function () {

    Route::get('/cai-dat-thong-tin-ca-nhan', [CandidateController::class, 'showAccount'])->name('candidate.account');
    Route::post('/cai-dat-thong-tin-ca-nhan', [CandidateController::class, 'updateAccount'])->name('candidate.update.account');

    Route::post('/candidate/update-avatar', [CandidateController::class, 'updateAvatar'])->name('candidate.update.avatar');
    Route::get('/quan-ly-cv', [CVController::class, 'index'])->name('cv.manage');
    Route::post('/upload-cv', [CVController::class, 'uploadCV'])->name('cv.upload');
    Route::get('/upload-cv', [CVController::class, 'uploadCV_index'])->name('cv.upload');
    Route::post('/cv/update-name', [CVController::class, 'updateCvName'])->name('cv.update.name');
    Route::post('/cv/delete', [CVController::class, 'delete'])->name('cv.delete');


    Route::post('applications', [ApplicationController::class, 'store'])->name('applications.store');
});

Route::middleware(['employer'])->group(function () {
    Route::resource('job-postings', JobPostingController::class);
    Route::get('/application-choose', [JobPostingController::class, 'application_choose'])->name('application-choose');
    Route::get('trang-chu-tuyen-dung', [JobPostingController::class, 'dashboard'])->name('job-postings.dashboard');
    Route::post('employer/logout', [EmployerLoginController::class, 'logout'])->name('logout-employer');
    Route::get('employer/profile', [EmployerLoginController::class, 'profile'])->name('employer.profile');
    Route::post('employer/profile', [EmployerLoginController::class, 'updateProfile'])->name('employer.profile.update');
});

Route::get('/jobs/filter', [JobPostingController::class, 'filter'])->name('job.filter');
