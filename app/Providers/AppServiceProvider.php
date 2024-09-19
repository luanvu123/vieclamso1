<?php

namespace App\Providers;

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
use App\Models\GenrePost;
use App\Models\Info;
use App\Models\JobReport;
use App\Models\Order;
use App\Models\PublicLink;
use App\Models\Purchased;
use App\Models\Slug;
use App\Models\Support;
use App\Models\TypeFeedback;
use App\Models\TypeSupport;
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
            $info = Info::first();

            // Sử dụng Google Translate để dịch tiêu đề
            $tr = new GoogleTranslate($lang);

            // Dịch các chuỗi cần thiết
            $info->recruitment_title_1 = $tr->translate($info->recruitment_title_1);

            // Dịch các item menu
            $menuItems = [
                'Giới thiệu' => $tr->translate('Giới thiệu'),
                'Dịch vụ' => $tr->translate('Dịch vụ'),
                'Báo giá' => $tr->translate('Báo giá'),
                'Hỗ trợ' => $tr->translate('Hỗ trợ'),
                'Blog tuyển dụng' => $tr->translate('Blog tuyển dụng')
            ];

            // Chia sẻ dữ liệu dịch với tất cả các views
            $view->with(compact('info', 'menuItems', 'lang'));
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
