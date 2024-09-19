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
            // Lấy ngôn ngữ từ session hoặc mặc định là 'vi'
            $lang = session('app_locale', 'vi');

            // Lấy dữ liệu từ bảng Info
            $info_lg = Info::first();
            // Lấy danh sách SmartRecruitment
            $recruitment_lg = SmartRecruitment::where('status', true)->get();
            $service_lg = RecruitmentService::where('status', true)->get();
            $figure_lg = Figure::where('status', true)->get();
            $value_lg = Value::where('status', true)->get();
            $award_lg = Award::where('status', 1)->get();
            $typePartner_lg = TypePartner::with('partners')->get();
            $typeHotline_lg = TypeHotline::where('status', true)->get();

            // Sử dụng Google Translate để dịch tiêu đề
            $tr = new GoogleTranslate($lang);

            // Dịch các chuỗi trong bảng info
            $info_lg->recruitment_title_1 = $tr->translate($info_lg->recruitment_title_1);
            $info_lg->big_update_title_1 = $tr->translate($info_lg->big_update_title_1);
            $info_lg->big_update_description = $tr->translate($info_lg->big_update_description);
            $info_lg->ai_in_recruitment_h1 = $tr->translate($info_lg->ai_in_recruitment_h1);
            $info_lg->ai_in_recruitment_h2 = $tr->translate($info_lg->ai_in_recruitment_h2);
            $info_lg->smart_recruitment = $tr->translate($info_lg->smart_recruitment);
            $info_lg->smart_recruitment_description = $tr->translate($info_lg->smart_recruitment_description);
            $info_lg->about_us_h1 = $tr->translate($info_lg->about_us_h1);
            foreach ($recruitment_lg as $recruitment) {
                $recruitment->description = $tr->translate($recruitment->description);
            }
            foreach ($service_lg as $service) {
                $service->title = $tr->translate($service->title);
                $service->description = $tr->translate($service->description);
            }
            foreach ($figure_lg as $figure) {
                $figure->title = $tr->translate($figure->title);
                $figure->name = $tr->translate($figure->name);
            }
            // Dịch các chuỗi của Value
            foreach ($value_lg as $value) {
                $value->name = $tr->translate($value->name);
                $value->description = $tr->translate($value->description);
            }
            foreach ($award_lg as $award) {
                $award->name = $tr->translate($award->name);
                $award->category = $tr->translate($award->category);
            }
            foreach ($typePartner_lg as $typePartner) {
                $typePartner->name = $tr->translate($typePartner->name);
            }
            foreach ($typeHotline_lg as $typeHotline) {
                $typeHotline->name = $tr->translate($typeHotline->name);
            }
            // Dịch các chuỗi mới
            $menu_1 = $tr->translate('Giới thiệu');
            $menu_2 = $tr->translate('Dịch vụ');
            $menu_3 = $tr->translate('Báo giá');
            $menu_4 = $tr->translate('Hỗ trợ');
            $menu_5 = $tr->translate('Blog tuyển dụng');
            $login = $tr->translate('Đăng nhập');
            $register = $tr->translate('Đăng ký');
            $post_job_free = $tr->translate('Đăng tin miễn phí');
            $free_recruitment_advice = $tr->translate('Tư vấn tuyển dụng miễn phí');
            $new_technology = $tr->translate('Công nghệ đăng tin tuyển dụng mới. Tính năng mới. Trải nghiệm mới.');
            $learn_more = $tr->translate('Tìm hiểu thêm');
            $Recruitment_posting_service = $tr->translate('Dịch vụ đăng tuyển tuyển dụng.');
            $The_numbers_of_the_recruitment = $tr->translate('Những con số của trang tuyển dụng của Vieclamso1');
            $Smart_recruitment_platform = $tr->translate('Giá trị khi sử dụng Vieclamso1 Smart Recruitment Platform');
            $About_us_lg = $tr->translate('Về chúng tôi');
            $Typical_customers = $tr->translate('Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1');


            // Chia sẻ các biến với tất cả các views
            $view->with(compact(
                'award_lg',
                'info_lg',
                'menu_1',
                'menu_2',
                'menu_3',
                'menu_4',
                'menu_5',
                'login',
                'register',
                'post_job_free',
                'free_recruitment_advice',
                'new_technology',
                'lang',
                'learn_more',
                'recruitment_lg',
                'service_lg',
                'Recruitment_posting_service',
                'The_numbers_of_the_recruitment',
                'figure_lg',
                'Smart_recruitment_platform',
                'value_lg',
                'About_us_lg',
                'Typical_customers',
                'typePartner_lg',
                'typeHotline_lg'
            ));
        });
        // Chia sẻ dữ liệu với tất cả các view
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
