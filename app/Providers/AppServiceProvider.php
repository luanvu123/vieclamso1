<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\JobPosting;
use App\Models\Employer;
use App\Models\Candidate;
use App\Models\Ecosystem;
use App\Models\GenrePost;
use App\Models\Slug;

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
        $slugs_layout = Slug::where('status', 1)->get();
        $ecosystems_layout = Ecosystem::where('status', 1)->get();
         $genrepost_layout = GenrePost::where('status', 1)->get();

        // Chia sẻ dữ liệu với tất cả các view
        View::share([
            'activeJobListingsCount' => $activeJobListingsCount,
            'totalJobCount' => $totalJobCount,
            'totalEmployerCount' => $totalEmployerCount,
            'totalCandidateCount' => $totalCandidateCount,
            'slugs_layout' => $slugs_layout,
            'ecosystems_layout' => $ecosystems_layout,
            'genrepost_layout' => $genrepost_layout
        ]);
    }
}
