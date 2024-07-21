<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\JobPosting;
use App\Models\Employer;
use App\Models\Candidate;
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
         // Đếm số lượng Job Listings active
        $activeJobListingsCount = JobPosting::where('status', 1)->count();

        // Đếm tổng số Job Listings
        $totalJobCount = JobPosting::count();

        // Đếm tổng số Employers
        $totalEmployerCount = Employer::count();

        // Đếm tổng số Candidates
        $totalCandidateCount = Candidate::count();

        // Chia sẻ dữ liệu với tất cả các view
        View::share([
            'activeJobListingsCount' => $activeJobListingsCount,
            'totalJobCount' => $totalJobCount,
            'totalEmployerCount' => $totalEmployerCount,
            'totalCandidateCount' => $totalCandidateCount,
        ]);
    }
}
