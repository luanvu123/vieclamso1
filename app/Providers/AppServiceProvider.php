<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
use App\Models\PublicLink;
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
        $activeJobListingsCount = JobPosting::where('status', 1)->count();

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
        // Chia sẻ dữ liệu với tất cả các view
        View::share([
            'activeJobListingsCount' => $activeJobListingsCount,
            'totalJobCount' => $totalJobCount,
            'totalEmployerCount' => $totalEmployerCount,
            'totalCandidateCount' => $totalCandidateCount,
            'slugs_layout' => $slugs_layout,
            'ecosystems_layout' => $ecosystems_layout,
            'genrepost_layout' => $genrepost_layout,
            'typeFeedbacks' => $typeFeedbacks,
            'typeSupports' => $typeSupports,
            'publiclink_layout'=> $publiclink_layout,

            'info' => $info,
            'candidateCountTwoHour' => $candidateCountTwoHour,
            'employerCountTwoHour' => $employerCountTwoHour,
            'jobPostingCountTwoHour' => $jobPostingCountTwoHour,
            'companyCountTwoHour' => $companyCountTwoHour,
            'feedbackCountTwoHour' => $feedbackCountTwoHour,
            'supportCountTwoHour' => $supportCountTwoHour,
            'reportCountTwoHour' => $reportCountTwoHour,
            'consultationCountTwoHour'=>$consultationCountTwoHour
        ]);
    }
}
