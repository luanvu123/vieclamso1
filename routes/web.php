<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdviserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationManageController;
use App\Http\Controllers\Auth\CandidateForgotPasswordController;
use App\Http\Controllers\Auth\EmployerForgotPasswordController;
use App\Http\Controllers\Auth\EmployerLoginController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EcosystemController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmployerManageController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobsManageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SmartRecruitmentController;
use App\Http\Controllers\ValueController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateManageController;
use App\Http\Controllers\Auth\EmployerRegisterController;
use App\Http\Controllers\Auth\EmployerResetPasswordController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CartListController;
use App\Http\Controllers\CartManageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SlugController;
use App\Models\Candidate;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GenrePostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyFollowerController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CVTemplateController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\HotlineController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\JobReportController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderManageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PlanCurrencyController;
use App\Http\Controllers\PlanFeatureController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicLinkController;
use App\Http\Controllers\RecruitmentServiceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SavedJobController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\TypeCartController;
use App\Http\Controllers\TypeConsultationController;
use App\Http\Controllers\TypeEmployerController;
use App\Http\Controllers\TypeFeedbackController;
use App\Http\Controllers\TypeHotlineController;
use App\Http\Controllers\TypePartnerController;
use App\Http\Controllers\TypeserviceController;
use App\Http\Controllers\TypeSupportController;
use Illuminate\Support\Facades\Session;
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

Auth::routes();
// Route::domain('vieclamso1.vn')->group(function () {
Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('/terms-of-service', [SiteController::class, 'termsService'])->name('terms-of-service');
Route::get('/faqs', [SiteController::class, 'faqs'])->name('faqs');
Route::get('/gioi-thieu', [SiteController::class, 'tutorial'])->name('tutorial');
Route::get('/pricing', [SiteController::class, 'pricing'])->name('pricing');
Route::get('job/{slug}', [SiteController::class, 'show'])->name('job.show');
Route::get('/jobs/filter', [SiteController::class, 'filter'])->name('job.filter');
Route::get('/categoriehomes/{slug}', [SiteController::class, 'showCategory'])->name('categoriehomes.show');
Route::get('/cong-ty', [SiteController::class, 'allCompany'])->name('all.company');
Route::get('/search-company', [SiteController::class, 'searchCompany'])->name('search-company');
Route::get('/cong-ty/{slug}', [SiteController::class, 'showCompany'])->name('company-home.show');
Route::get('cam-nang-nghe-nghiep/{slug}', [SiteController::class, 'showPost'])->name('genrepost.showPost');
Route::get('/khoa-hoc', [SiteController::class, 'showCourse'])->name('site.courses');
Route::get('/ung-dung', [SiteController::class, 'showApp'])->name('site.app');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::resource('support', SupportController::class);








Route::prefix('candidate')->group(function () {
    Route::get('forget-password', [CandidateForgotPasswordController::class, 'showForgetPasswordForm'])->name('candidate.forget.password.get');
    Route::post('forget-password', [CandidateForgotPasswordController::class, 'submitForgetPasswordForm'])->name('candidate.forget.password.post');
    Route::get('reset-password/{token}', [CandidateForgotPasswordController::class, 'showResetPasswordForm'])->name('candidate.reset.password.get');
    Route::post('reset-password', [CandidateForgotPasswordController::class, 'submitResetPasswordForm'])->name('candidate.reset.password.post');
});



Route::get('/search-jobs', [SiteController::class, 'searchJobs'])->name('search-jobs');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('application-manage', ApplicationManageController::class);
    Route::post('application-manage/{id}/add-hidden-cv', [ApplicationManageController::class, 'addHiddenCv'])
        ->name('application-manage.add-hidden-cv');
    Route::post('application-manage/{id}/update-cv-path', [ApplicationManageController::class, 'updateCvPath'])
        ->name('application-manage.update-cv-path');
    Route::post('application-manage/{id}/delete-hidden-cv', [ApplicationManageController::class, 'deleteHiddenCv'])
        ->name('application-manage.delete-hidden-cv');
    Route::get('manage/orders', [EmployerManageController::class, 'orders'])->name('manage.orders.index');
    Route::get('manage/orders/{id}', [EmployerManageController::class, 'showOrder'])->name('manage.orders.show');
    Route::post('manage/orders/{id}/status', [EmployerManageController::class, 'updateOrderStatus'])->name('manage.orders.updateStatus');
    Route::get('manage/job-postings/basic', [EmployerManageController::class, 'indexBasic'])->name('manage.employers.indexBasic');
    Route::get('manage/job-postings/outstanding', [EmployerManageController::class, 'indexOutstanding'])->name('manage.employers.indexOutstanding');
    Route::get('manage/job-postings/special', [EmployerManageController::class, 'indexSpecial'])->name('manage.employers.indexSpecial');
    // Routes for order details
    Route::get('manage/order-details', [EmployerManageController::class, 'orderDetails'])->name('manage.orderDetails.index');
    Route::post('manage/order-details/{id}/active', [EmployerManageController::class, 'updateOrderDetailActive'])->name('manage.orderDetails.updateActive');

    Route::get('manage/job-postings', [EmployerManageController::class, 'indexJobPosting'])->name('manage.employers.indexJobPosting');
    Route::resource('typeservice', TypeserviceController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('banks', BankController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('cv_templates', CVTemplateController::class);
    Route::get('employers/purchasedManage', [EmployerManageController::class, 'purchasedManage'])->name('employers.purchasedManage');
    Route::resource('products', ProductController::class);
    Route::resource('type-employer', TypeEmployerController::class);
    Route::resource('slides', SlideController::class);
    Route::resource('consultations', ConsultationController::class)
        ->only(['index', 'edit', 'update', 'destroy']);
    Route::resource('cities', CityController::class);
    Route::resource('type-consultations', TypeConsultationController::class);
    Route::resource('hotlines', HotlineController::class);
    Route::resource('type_hotlines', TypeHotlineController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('type-partners', TypePartnerController::class);
    Route::resource('values', ValueController::class);
    Route::resource('figures', FigureController::class);
    Route::resource('recruitment_services', RecruitmentServiceController::class);
    Route::resource('smart_recruitments', SmartRecruitmentController::class);
    Route::get('admin/info', [InfoController::class, 'index'])->name('admin.info.index');
    Route::post('admin/info/{id}', [InfoController::class, 'update'])->name('admin.info.update');
    Route::resource('job-reports', JobReportController::class)->only(['index', 'show', 'edit', 'update']);
    Route::resource('type_feedback', TypeFeedbackController::class);
    Route::get('feedbacks_list', [TypeFeedbackController::class, 'indexList'])->name('feedbacks.index.list');
    Route::get('feedbacks/{feedback}', [TypeFeedbackController::class, 'showList'])->name('feedbacks.show.list');
    Route::delete('feedbacks/{feedback}', [TypeFeedbackController::class, 'destroyList'])->name('feedbacks.destroy.list');
    Route::resource('public_links', PublicLinkController::class);
    Route::resource('awards', AwardController::class);
    Route::resource('ecosystems', EcosystemController::class);
    Route::resource('medias', MediaController::class);
    Route::resource('slugs', SlugController::class);
    Route::resource('posts', PostController::class);
    Route::resource('genre-posts', GenrePostController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('type_support', TypeSupportController::class);
    Route::get('supports_list', [TypeSupportController::class, 'indexSupport'])->name('supports.index.list');
    Route::get('supports_list/{support}', [TypeSupportController::class, 'showSupport'])->name('supports.show.list');
    Route::delete('supports_list/{support}', [TypeSupportController::class, 'destroySupport'])->name('supports.destroy.list');
    Route::get('/support-choose', [TypeSupportController::class, 'support_choose'])->name('support-choose');
    Route::get('/feedback-choose', [TypeFeedbackController::class, 'feedback_choose'])->name('feedback-choose');
    Route::get('/admin/companies', [EmployerManageController::class, 'indexCompany'])->name('admin.companies.index');
    Route::get('/admin/companies/{id}', [EmployerManageController::class, 'showCompany'])->name('admin.companies.show');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('candidates', CandidateManageController::class);
    Route::put('/users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::get('/employer-choose', [EmployerManageController::class, 'employer_choose'])->name('employer-choose');
    Route::get('/employer-user-choose', [EmployerManageController::class, 'employer_user_choose'])->name('employer-user-choose');
    Route::get('/user-choose', [UserController::class, 'user_choose'])->name('user-choose');
    Route::get('/category-choose', [CategoryController::class, 'category_choose'])->name('cate-choose');
    Route::get('/company-choose', [EmployerManageController::class, 'company_choose'])->name('company-choose');
    Route::get('/top-choose', [EmployerManageController::class, 'top_choose'])->name('top-choose');
    Route::get('/top-home-choose', [EmployerManageController::class, 'top_home_choose'])->name('top-home-choose');
    Route::get('/featured-choose', [EmployerManageController::class, 'featured_choose'])->name('featured-choose');
    Route::get('/post-choose', [PostController::class, 'post_choose'])->name('post-choose');
    Route::get('/slug-choose', [SlugController::class, 'slug_choose'])->name('slug-choose');
    Route::get('/media-choose', [MediaController::class, 'media_choose'])->name('media-choose');
    Route::resource('employers', EmployerManageController::class);

    Route::get('employers/{id}/job-postings', [EmployerManageController::class, 'showJobPostings'])->name('employers.job-postings');
    Route::get('admin/job-postings/{id}/applications', [EmployerManageController::class, 'showApplications'])->name('job-postings.applications');
    Route::patch('/applications/{id}/update-cv-hidden-info', [EmployerManageController::class, 'updateCvHiddenInfo'])->name('applications.updateCvHiddenInfo');

    Route::get('employers/{employer}/add-cart', [EmployerManageController::class, 'addCart'])->name('employers.add-cart');
    Route::post('employers/{employer}/store-cart', [EmployerManageController::class, 'storeCart'])->name('employers.store-cart');
    Route::get('employers/{employer}/carts', [EmployerManageController::class, 'indexCart'])->name('employers.carts.index');

    Route::get('service', [EmployerManageController::class, 'listAllCarts'])->name('employers.carts.list');

    // Add a route to delete a cart from an employer
    Route::delete('employers/{employer}/carts/{cart}', [EmployerManageController::class, 'destroyCart'])->name('employers.carts.destroy');



    Route::resource('job-postings-manage', JobsManageController::class);
    Route::patch('job-postings-manage/{id}/refresh', [JobsManageController::class, 'refresh'])->name('job-postings-manage.refresh');

    Route::get('/jobPosting-choose', [JobsManageController::class, 'jobPosting_choose'])->name('jobPosting-choose');
    Route::get('/isHot-choose', [JobsManageController::class, 'isHot_choose'])->name('isHot-choose');

    Route::get('/tin-nhan-da-gui', [ContactController::class, 'sent'])->name('about.sent');
    Route::delete('sent/{id}', [ContactController::class, 'destroy_sent'])->name('about.destroy_sent');
    Route::get('/candidate-sent-emails', [CandidateManageController::class, 'sentEmails'])->name('candidate.sentEmails');
    Route::delete('/candidate-sent-emails/{id}', [CandidateManageController::class, 'destroySentEmail'])->name('candidate.destroySentEmail');
    Route::get('/employer-sent-emails', [EmployerManageController::class, 'sentEmails'])->name('employer.sentEmails');
    Route::delete('/employer-sent-emails/{id}', [EmployerManageController::class, 'destroySentEmail'])->name('employer.destroySentEmail');
    Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send-email');
    Route::get('/admin/about/email', function () {
        $to = request()->query('to');
        return view('admin.about.email', compact('to'));
    })->name('admin.about.email');

    Route::post('/send-email-candidate', [CandidateManageController::class, 'sendEmail'])->name('send-email-candidate');
    Route::get('/admin/candidate/email', function () {
        $to = request()->query('to');
        return view('admin.candidates.email', compact('to'));
    })->name('admin.candidate.email');

    Route::post('/send-email-employer', [EmployerManageController::class, 'sendEmail'])->name('send-email-employer');
    Route::get('/admin/employer/email', function () {
        $to = request()->query('to');
        return view('admin.employers.email', compact('to'));
    })->name('admin.employer.email');
});




// Route::get('/candidate-login-google', [CandidateController::class, 'redirectToGoogle'])->name('candidate.login.google');
Route::get('candidate/register', [CandidateController::class, 'showRegistrationForm'])->name('candidate.showRegister');
Route::post('candidate/register', [CandidateController::class, 'register'])->name('candidate.register');
Route::get('candidate/login', [CandidateController::class, 'showLoginForm'])->name('candidate.login');
Route::post('candidate/login', [CandidateController::class, 'login'])->name('candidate.login.post');
Route::post('candidate/logout', [CandidateController::class, 'logout'])->name('candidate.logout');
Route::get('candidate/verify/{token}', [CandidateController::class, 'verify'])->name('candidate.verify');



Route::get('candidate/google', [CandidateController::class, 'redirectToGoogle'])->name('candidate.google');
Route::get('candidate/google/callback', [CandidateController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [CandidateController::class, 'redirectToFacebook'])->name('candidate.login.facebook');
Route::get('auth/facebook/callback', [CandidateController::class, 'handleFacebookCallback']);


Route::middleware(['candidate'])->group(function () {
    Route::post('candidate/apply', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/candidate/check-application/{jobPostingId}', [ApplicationController::class, 'checkApplicationStatus'])->name('candidate.check-application')->middleware('candidate');
    Route::get('/cv-coffee', [CvController::class, 'cvCoffee'])->name('cv.coffee');
    Route::get('/cv-template', [CvController::class, 'show'])->name('cv.template');
    Route::get('/cv-minimalism', [CvController::class, 'cvMinimalism'])->name('cv.minimalism');
    Route::get('/cv-outstanding', [CvController::class, 'cvOutstanding'])->name('cv.outstanding');
    Route::get('/cv-chrome', [CVController::class, 'cvChrome'])->name('cv.chrome');
    Route::get('/cv-github', [CVController::class, 'cvGithub'])->name('cv.github');
    Route::get('/cv-facebook', [CVController::class, 'cvFacebook'])->name('cv.facebook');
    Route::get('/mau-cv', [CVController::class, 'indexCVTemplate'])->name('mau.cv');


    Route::post('/cv-github/download', [CvController::class, 'downloadCvGithub'])->name('cvGithub.download');
    Route::post('/cv-outstanding/download', [CvController::class, 'downloadCvOutstanding'])->name('cvOutstanding.download');
    Route::post('/cv-coffee/download', [CvController::class, 'downloadCvCoffee'])->name('cvCoffee.download');
    Route::post('/cv-template/download', [CvController::class, 'downloadPdf'])->name('cv.template.download');
    Route::post('/cv-minimalism/download', [CVController::class, 'downloadCvMinimalism'])->name('cvMinimalism.download');
Route::post('/cv-chrome/download', [CVController::class, 'downloadChrome'])->name('cvChrome.download');






    Route::post('/notifications/mark-all-read', [CandidateController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::post('/job-reports', [CandidateController::class, 'storeReport'])->name('job-reports.store');
    Route::get('/candidate/messages', [MessageController::class, 'receiveCandidateMessages'])->name('messages.receive.candidate');
    Route::get('/candidate/messages/{employer}', [MessageController::class, 'showCandidateMessages'])->name('messages.show.candidate');
    Route::post('/candidate/messages/{employer}/reply', [MessageController::class, 'sendCandidateReply'])->name('messages.reply.candidate');
    Route::post('/messages/send', [MessageController::class, 'sendMessage'])->name('messages.send');
    Route::get('/cai-dat-thong-tin-ca-nhan', [CandidateController::class, 'showAccount'])->name('candidate.account');
    Route::post('/cai-dat-thong-tin-ca-nhan', [CandidateController::class, 'updateAccount'])->name('candidate.update.account');
    Route::get('/change-password', [CandidateController::class, 'showChangePasswordForm'])->name('change-password.form');
    Route::post('/change-password', [CandidateController::class, 'changePassword'])->name('change-password');


    Route::get('/ho-so', [CandidateController::class, 'showPersonalProfile'])->name('personal.profile.account');
    Route::post('/ho-so', [CandidateController::class, 'updatePersonalProfile'])->name('update.personal.profile.account');
    Route::resource('experience', ExperienceController::class);
    Route::resource('education', EducationController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('hobbies', HobbyController::class);
    Route::resource('advisers', AdviserController::class);
    Route::resource('prizes', PrizeController::class);



    Route::get('/overview', [CandidateController::class, 'overview'])->name('cv.overview');

    Route::post('/candidate/update-avatar', [CandidateController::class, 'updateAvatar'])->name('candidate.update.avatar');
    Route::get('/quan-ly-cv', [CVController::class, 'index'])->name('cv.manage');
    Route::post('/upload-cv', [CVController::class, 'uploadCV'])->name('cv.upload');
    Route::get('/upload-cv', [CVController::class, 'uploadCV_index'])->name('cv.upload.post');
    Route::post('/cv/update-name', [CVController::class, 'updateCvName'])->name('cv.update.name');
    Route::post('/cv/delete', [CVController::class, 'delete'])->name('cv.delete');

    Route::post('company/{id}/follow', [CompanyFollowerController::class, 'follow'])->name('company.follow');
    Route::post('company/{id}/unfollow', [CompanyFollowerController::class, 'unfollow'])->name('company.unfollow');

    Route::post('save-job', [SavedJobController::class, 'store'])->name('save-job');
    Route::get('saved-jobs', [SavedJobController::class, 'index'])->name('saved-jobs');
    Route::post('unsave-job', [SavedJobController::class, 'unsave'])->name('unsave-job');
    Route::get('applied-jobs', [ApplicationController::class, 'showAppliedJobs'])->name('applications.showAppliedJobs');
});




// route tuyendung
// });

// Route::domain('tuyendungso1.vn')->group(function () {


Route::post('/employer/verify-otp/email', [EmployerLoginController::class, 'verifyEmail'])->name('employer.verify.otp');
Route::prefix('employer')->group(function () {
    Route::get('forget-password', [EmployerForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [EmployerForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [EmployerForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [EmployerForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

Route::get('employer/google', [EmployerLoginController::class, 'redirectToGoogle'])->name('employer.google');
Route::get('employer/google/callback', [EmployerLoginController::class, 'handleGoogleCallback']);
Route::get('employer/login', [EmployerLoginController::class, 'showLoginForm'])->name('employer.login');
Route::post('employer/login', [EmployerLoginController::class, 'login'])->name('employer.login.submit');
Route::get('employer/register', [EmployerRegisterController::class, 'showRegistrationForm'])->name('employer.register');
Route::post('employer/register', [EmployerRegisterController::class, 'register'])->name('employer.register.submit');
Route::get('/change-language/{lang}', function ($lang) {
    Session::put('app_locale', $lang);
    return redirect()->back();
})->name('change.language');
Route::post('/consultations', [SiteController::class, 'storeConsultation'])->name('consultations.store');
Route::get('/recruitment', [SiteController::class, 'recruitment'])->name('recruitment');
Route::middleware(['employer'])->group(function () {
    Route::delete('/saved-profiles/{candidate}', [JobPostingController::class, 'removeSavedProfile'])
        ->name('job_postings.remove_saved_profile');
    Route::get('/candidate_cv/{id}', [JobPostingController::class, 'showCv'])->name('candidates.show.cv');
    Route::get('/saved-profiles', [JobPostingController::class, 'savedProfiles'])->name('job_postings.saved_profiles');

    Route::post('/save-profile/{candidate}', [JobPostingController::class, 'saveProfile'])->name('job_postings.save_profile');

    Route::get('/search-candidate', [JobPostingController::class, 'searchCandidate'])->name('job_postings.search_candidate');
    Route::get('/checkout', [JobPostingController::class, 'showCheckout'])->name('job_postings.checkout');

    Route::get('job_postings/cart', [JobPostingController::class, 'showCartEmployer'])->name('job_postings.cart');


    Route::get('job-postings/cart/detail/{id}', [JobPostingController::class, 'showCartDetail'])->name('job-postings.cart.detail');
    Route::get('/employer/messages', [MessageController::class, 'receiveMessages'])->name('messages.receive');
    Route::get('/employer/messages/{candidate}', [MessageController::class, 'showMessages'])->name('messages.show');
    Route::post('/employer/messages/{candidate}/reply', [MessageController::class, 'sendReply'])->name('messages.reply');
    Route::get('job-postings/cart', [JobPostingController::class, 'showCart'])->name('job-postings.cart');
    Route::resource('job-postings', JobPostingController::class);
    Route::put('/applications/{application}/update-note', [JobPostingController::class, 'updateNote'])->name('applications.update.note');
    Route::put('/applications/{application}/update-rating', [JobPostingController::class, 'updateRating'])->name('applications.update.rating');




    Route::get('app-insights', [JobPostingController::class, 'appInsight'])->name('app-insights');
    Route::get('loyal-customer', [JobPostingController::class, 'loyalCustomer'])->name('loyal-customer');
    Route::get('doi-qua', [JobPostingController::class, 'buyGift'])->name('buy-gift');
    Route::get('/doi-qua/{id}/detail', [JobPostingController::class, 'productDetail'])->name('buy-gift.detail');
    Route::post('/product/purchase/{id}', [JobPostingController::class, 'purchaseProduct'])->name('purchase.product');
    Route::get('trang-chu-tuyen-dung', [JobPostingController::class, 'dashboard'])->name('job-postings.dashboard');
    Route::post('employer/logout', [EmployerLoginController::class, 'logout'])->name('logout-employer');
    Route::get('employer/profile', [EmployerLoginController::class, 'profile'])->name('employer.profile');
    Route::post('employer/profile', [EmployerLoginController::class, 'updateProfile'])->name('employer.profile.update');
    Route::get('employer/profile/change-password', [EmployerLoginController::class, 'formChangePasswordEmployer'])->name('employer.change-password');
    Route::post('employer/profile/change-password', [EmployerLoginController::class, 'changePasswordEmployer'])->name('employer.change-password.post');

    Route::resource('companies', CompanyController::class);


    Route::get('employer/phone', [EmployerLoginController::class, 'formPhone'])->name('employer.phone');
    Route::get('employer/gpkd', [EmployerLoginController::class, 'formCertificate'])->name('employer.gpkd');
    Route::post('employer/gpkd', [EmployerLoginController::class, 'updateCertificate'])->name('employer.updateCertificate');
    Route::post('employer/send-otp', [EmployerLoginController::class, 'sendOtp'])->name('employer.send-otp');
    Route::post('employer/verify-otp', [EmployerLoginController::class, 'verifyOtp'])->name('employer.verify-otp');
    Route::post('employer/orders/checkout', [OrderController::class, 'checkout'])->name('employer.orders.checkout');
    Route::get('employer/orders', [OrderController::class, 'index'])->name('employer.orders.index');
    Route::get('employer/orders/{id}', [OrderController::class, 'show'])->name('employer.orders.show');
    Route::post('employer/orders/{id}/mark-as-paid', [OrderController::class, 'markAsPaid'])->name('employer.orders.markAsPaid');
    Route::post('/employer/add-to-cart', [JobPostingController::class, 'addToCart'])->name('employer.addToCart');
    // web.php
    Route::delete('employer/cart/{id}', [JobPostingController::class, 'removeFromCart'])->name('employer.removeFromCart');
    Route::get('/employer/services', [JobPostingController::class, 'services'])->name('employer.services');
    Route::get('employer/get-cart-count', [JobPostingController::class, 'getCartCount'])->name('employer.getCartCount');
    Route::get('dich-vu-da-mua', [JobPostingController::class, 'serviceActive'])
        ->name('employer.service-active')->middleware('employer');
         Route::get('/danh-sach-ung-vien-da-nop', [JobPostingController::class, 'showAllApplications'])->name('job_postings.all_applications');

});
// });
