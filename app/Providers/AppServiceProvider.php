<?php

namespace App\Providers;

use App\Models\Application;
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
 $paidOrderCount = Order::where('status', 'Đã thanh toán')->count();
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
  $applicationlayout = Application::where('approve_application', 'Chờ duyệt')
                ->where('created_at', '>=', Carbon::now()->subHours(24))
                ->count();
        $orderpurchasedCountTwoHour = Purchased::where('created_at', '>=', $twoHoursAgo)->count();
  $basicJobCountTwoHour = JobPosting::where('created_at', '>=', Carbon::now()->subHours(2))
                ->where('service_type', 'Tin cơ bản')

                ->count();

            $outstandingJobCountTwoHour = JobPosting::where('created_at', '>=', Carbon::now()->subHours(2))
                ->where('service_type', 'Tin nổi bật')
                ->count();

            $specialJobCountTwoHour = JobPosting::where('created_at', '>=', Carbon::now()->subHours(2))
                ->where('service_type', 'Tin đặc biệt')

                ->count();
                 $orderCountTwoHour = Order::where('created_at', '>=', Carbon::now()->subHours(2))->count();

        View::composer('layout-recruitment', function ($view) {
            $infolglg = Info::find(1);
            $ecosystems_layout_lg = Ecosystem::where('status', 1)->get();
            $view->with(compact(
                'ecosystems_layout_lg',
                'infolglg',

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
             'orderCountTwoHour' => $orderCountTwoHour,
            'info' => $info,
            'candidateCountTwoHour' => $candidateCountTwoHour,
            'employerCountTwoHour' => $employerCountTwoHour,
            'jobPostingCountTwoHour' => $jobPostingCountTwoHour,
            'companyCountTwoHour' => $companyCountTwoHour,
            'feedbackCountTwoHour' => $feedbackCountTwoHour,
            'supportCountTwoHour' => $supportCountTwoHour,
            'reportCountTwoHour' => $reportCountTwoHour,
            'consultationCountTwoHour' => $consultationCountTwoHour,
            'orderpurchasedCountTwoHour' => $orderpurchasedCountTwoHour,
            'basicJobCountTwoHour'=> $basicJobCountTwoHour,
                'outstandingJobCountTwoHour'=> $outstandingJobCountTwoHour,
                'specialJobCountTwoHour'=> $specialJobCountTwoHour,
            'applicationlayout' => $applicationlayout,
  'paidOrderCount' => $paidOrderCount,
        ]);
    }
}
