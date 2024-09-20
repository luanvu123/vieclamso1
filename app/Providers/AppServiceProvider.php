<?php

namespace App\Providers;

use App\Models\Award;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\JobPosting;
use App\Models\Employer;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Ecosystem;
use App\Models\Feedback;
use App\Models\Figure;
use App\Models\GenrePost;
use App\Models\Info;
use App\Models\JobReport;
use App\Models\Order;
use App\Models\Partner;
use App\Models\PublicLink;
use App\Models\Purchased;
use App\Models\RecruitmentService;
use App\Models\Slug;
use App\Models\SmartRecruitment;
use App\Models\Support;
use App\Models\TypeFeedback;
use App\Models\TypeHotline;
use App\Models\TypePartner;
use App\Models\TypeSupport;
use App\Models\Value;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $info = Info::find(1);
        // Đếm số lượng Job Listings active
        $activeJobListingsCount = JobPosting::where('status', 0)->count();
        $activeJobListingsCountToday = JobPosting::whereDate('created_at', today())->where('status', 0)->count();

        // Đếm tổng số Job Listings
        $totalJobCount = JobPosting::count();

        // Đếm tổng số Employers
        $totalEmployerCount = Employer::count();
        $typeSupports = TypeSupport::all();
        // Đếm tổng số Candidates
        $totalCandidateCount = Candidate::count();
        $slugs_layout = Slug::where('status', 1)->get();
        $ecosystems_layout = Ecosystem::where('status', 1)->get();
        $genrepost_layout = GenrePost::where('status', 1)->get();
        $typeFeedbacks = TypeFeedback::all();



        $now = Carbon::now();
        $twoHoursAgo = $now->subHours(2);

        $consultationCountTwoHour = Consultation::where('created_at', '>=', $twoHoursAgo)->count();

        $reportCountTwoHour = JobReport::where('created_at', '>=', $twoHoursAgo)->count();
        $candidateCountTwoHour = Candidate::where('created_at', '>=', $twoHoursAgo)->count();
        $employerCountTwoHour = Employer::where('created_at', '>=', $twoHoursAgo)->count();
        $jobPostingCountTwoHour = JobPosting::where('created_at', '>=', $twoHoursAgo)->count();
        $companyCountTwoHour = Company::where('created_at', '>=', $twoHoursAgo)->count();
        $feedbackCountTwoHour = Feedback::where('created_at', '>=', $twoHoursAgo)->count();
        $supportCountTwoHour = Support::where('created_at', '>=', $twoHoursAgo)->count();
        $publiclink_layout = PublicLink::where('status', 'active')->get();
        $ordermanagesCountTwoHour = Order::where('created_at', '>=', $twoHoursAgo)->count();
        $orderpurchasedCountTwoHour = Purchased::where('created_at', '>=', $twoHoursAgo)->count();


        View::composer('*', function ($view) {
            $lang = session('app_locale', 'vi');
            $tr = new GoogleTranslate($lang);
            $menu_1 = $tr->translate('Giới thiệu');
            $menu_2 = $tr->translate('Dịch vụ');
            $menu_3 = $tr->translate('Báo giá');
            $menu_4 = $tr->translate('Hỗ trợ');
            $menu_5 = $tr->translate('Blog tuyển dụng');
            $login = $tr->translate('Đăng nhập');
            $register = $tr->translate('Đăng ký');
            $about_vieclamso1_lg = $tr->translate('Về Vieclamso1');
            $introduction_lg = $tr->translate('Giới thiệu');
            $recruitmentlg_lg = $tr->translate('Tuyển dụng');
            $contact_lg = $tr->translate('Liên hệ');
            $press_corner_lg = $tr->translate('Góc báo chí');
            $privacy_policy_lg = $tr->translate('Chính sách bảo mật');
            $terms_of_service_lg = $tr->translate('Điều khoản dịch vụ');
            $operating_regulations_lg = $tr->translate('Quy chế hoạt động');
            $rewards_program_lg = $tr->translate('Chương trình Vieclamso1 Rewards');
            $candidates_lg = $tr->translate('Ứng viên');
            $find_jobs_lg = $tr->translate('Tìm việc làm');
            $courses_lg = $tr->translate('Khoá học');
            $partners_lg = $tr->translate('Đối tác');
            $companies_lg = $tr->translate('Doanh nghiệp');
            $vieclamso1_corp_lg = $tr->translate('Công ty Cổ phần Vieclamso1 Việt Nam');
            $business_license_lg = $tr->translate('Giấy phép đăng ký kinh doanh số');
            $employment_service_license_lg = $tr->translate('Giấy phép hoạt động dịch vụ việc làm số');
            $headquarters_lg = $tr->translate('Trụ sở');
            $hcm_branch_lg = $tr->translate('Chi nhánh HCM');
            $hr_tech_ecosystem_lg = $tr->translate('Hệ sinh thái HR Tech của Vieclamso1');

            $view->with(compact(
                'menu_1',
                'menu_2',
                'menu_3',
                'menu_4',
                'menu_5',
                'login',
                'register',
                'about_vieclamso1_lg',
                'introduction_lg',
                'recruitmentlg_lg',
                'contact_lg',
                'press_corner_lg',
                'privacy_policy_lg',
                'terms_of_service_lg',
                'operating_regulations_lg',
                'rewards_program_lg',
                'candidates_lg',
                'find_jobs_lg',
                'courses_lg',
                'partners_lg',
                'companies_lg',
                'vieclamso1_corp_lg',
                'business_license_lg',
                'employment_service_license_lg',
                'headquarters_lg',
                'hcm_branch_lg',
                'hr_tech_ecosystem_lg'

            ));
        });

        View::share([
            'activeJobListingsCount' => $activeJobListingsCount,
            'activeJobListingsCountToday' => $activeJobListingsCountToday,
            'totalJobCount' => $totalJobCount,
            'totalEmployerCount' => $totalEmployerCount,
            'totalCandidateCount' => $totalCandidateCount,
            'slugs_layout' => $slugs_layout,
            'ecosystems_layout' => $ecosystems_layout,
            'genrepost_layout' => $genrepost_layout,
            'typeFeedbacks' => $typeFeedbacks,
            'typeSupports' => $typeSupports,
            'publiclink_layout' => $publiclink_layout,

            'info' => $info,
            'candidateCountTwoHour' => $candidateCountTwoHour,
            'employerCountTwoHour' => $employerCountTwoHour,
            'jobPostingCountTwoHour' => $jobPostingCountTwoHour,
            'companyCountTwoHour' => $companyCountTwoHour,
            'feedbackCountTwoHour' => $feedbackCountTwoHour,
            'supportCountTwoHour' => $supportCountTwoHour,
            'reportCountTwoHour' => $reportCountTwoHour,
            'consultationCountTwoHour' => $consultationCountTwoHour,
            'ordermanagesCountTwoHour' => $ordermanagesCountTwoHour,
            'orderpurchasedCountTwoHour' => $orderpurchasedCountTwoHour,
        ]);
    }
}
