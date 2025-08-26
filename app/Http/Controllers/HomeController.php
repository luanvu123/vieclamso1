<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Hotline;
use App\Models\JobPosting;
use App\Models\OnlineVisitor;
use App\Models\OnlineVisitorRecruitment;
use App\Models\Order;
use App\Models\Support;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Visitor statistics (existing code)
        $totalHomeVisitors = OnlineVisitor::count();
        $totalRecruitmentVisitors = OnlineVisitorRecruitment::count();
        $onlineHomeVisitors = OnlineVisitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();
        $onlineRecruitmentVisitors = OnlineVisitorRecruitment::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();

        // General Statistics
        $totalCandidates = Candidate::count();
        $totalJobPostings = JobPosting::count();
        $totalApplications = Application::count();
        $totalOrders = Order::count();
        $totalSupport = Support::count();
        $totalHotlines = Hotline::count();

        // Active/Status Statistics
        $activeCandidates = Candidate::where('status', 1)->count();
        $activeJobPostings = JobPosting::where('status', 'active')->count();
        $pendingApplications = Application::where('status', 'pending')->count();
        $approvedApplications = Application::where('status', 'approved')->count();
        $rejectedApplications = Application::where('status', 'rejected')->count();

        // Monthly Growth Data (Last 12 months)
        $monthlyData = collect();
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyData->push([
                'month' => $date->format('M Y'),
                'candidates' => Candidate::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)->count(),
                'job_postings' => JobPosting::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)->count(),
                'applications' => Application::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)->count(),
            ]);
        }

        // Job Categories Distribution
        $jobCategories = JobPosting::select('category', DB::raw('count(*) as total'))
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->groupBy('category')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        // Job Locations Distribution
        $jobLocations = JobPosting::select('city', DB::raw('count(*) as total'))
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->groupBy('city')
            ->orderBy('total', 'desc')
            ->limit(8)
            ->get();

        // Application Status Distribution
        $applicationStatus = Application::select('status', DB::raw('count(*) as total'))
            ->whereNotNull('status')
            ->groupBy('status')
            ->get();

        // Candidate Gender Distribution
        $candidateGender = Candidate::select('gender', DB::raw('count(*) as total'))
            ->whereNotNull('gender')
            ->where('gender', '!=', '')
            ->groupBy('gender')
            ->get();

        // Experience Level Distribution
        $experienceLevels = JobPosting::select('experience', DB::raw('count(*) as total'))
            ->whereNotNull('experience')
            ->where('experience', '!=', '')
            ->groupBy('experience')
            ->orderBy('total', 'desc')
            ->get();

        // Daily Applications (Last 7 days)
        $dailyApplications = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dailyApplications->push([
                'date' => $date->format('M j'),
                'applications' => Application::whereDate('created_at', $date)->count(),
            ]);
        }

        // Support Ticket Status
        $supportStatus = Support::select('status', DB::raw('count(*) as total'))
            ->whereNotNull('status')
            ->groupBy('status')
            ->get();

        // Order Status Distribution
        $orderStatus = Order::select('status', DB::raw('count(*) as total'))
            ->whereNotNull('status')
            ->groupBy('status')
            ->get();

        // Top Skills from Job Postings
        $allSkills = collect();
        JobPosting::select('skills_required')
            ->whereNotNull('skills_required')
            ->chunk(100, function ($jobs) use (&$allSkills) {
                foreach ($jobs as $job) {
                    if (!empty($job->skills_required)) {
                        $skills = explode(',', $job->skills_required);
                        foreach ($skills as $skill) {
                            $trimmedSkill = trim($skill);
                            if (!empty($trimmedSkill)) {
                                $allSkills->push($trimmedSkill);
                            }
                        }
                    }
                }
            });

        $topSkills = $allSkills->countBy()
            ->sortDesc()
            ->take(10)
            ->map(function ($count, $skill) {
                return ['skill' => $skill, 'count' => $count];
            })
            ->values();

        // Salary Range Distribution
        $salaryRanges = JobPosting::select('salary', DB::raw('count(*) as total'))
            ->whereNotNull('salary')
            ->where('salary', '!=', '')
            ->groupBy('salary')
            ->orderBy('total', 'desc')
            ->limit(8)
            ->get();

        // Recent Activity (Last 30 days comparison)
        $currentMonth = [
            'candidates' => Candidate::whereMonth('created_at', Carbon::now()->month)->count(),
            'job_postings' => JobPosting::whereMonth('created_at', Carbon::now()->month)->count(),
            'applications' => Application::whereMonth('created_at', Carbon::now()->month)->count(),
        ];

        $lastMonth = [
            'candidates' => Candidate::whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
            'job_postings' => JobPosting::whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
            'applications' => Application::whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
        ];

        // Calculate growth percentages
        $growthStats = [
            'candidates' => $lastMonth['candidates'] > 0 ?
                round((($currentMonth['candidates'] - $lastMonth['candidates']) / $lastMonth['candidates']) * 100, 1) : 0,
            'job_postings' => $lastMonth['job_postings'] > 0 ?
                round((($currentMonth['job_postings'] - $lastMonth['job_postings']) / $lastMonth['job_postings']) * 100, 1) : 0,
            'applications' => $lastMonth['applications'] > 0 ?
                round((($currentMonth['applications'] - $lastMonth['applications']) / $lastMonth['applications']) * 100, 1) : 0,
        ];

        return view('home', compact(
            // Visitor stats
            'totalHomeVisitors', 'totalRecruitmentVisitors',
            'onlineHomeVisitors', 'onlineRecruitmentVisitors',

            // General stats
            'totalCandidates', 'totalJobPostings', 'totalApplications',
            'totalOrders', 'totalSupport', 'totalHotlines',

            // Status stats
            'activeCandidates', 'activeJobPostings',
            'pendingApplications', 'approvedApplications', 'rejectedApplications',

            // Chart data
            'monthlyData', 'jobCategories', 'jobLocations', 'applicationStatus',
            'candidateGender', 'experienceLevels', 'dailyApplications',
            'supportStatus', 'orderStatus', 'topSkills', 'salaryRanges',

            // Growth data
            'currentMonth', 'lastMonth', 'growthStats'
        ));
    }
}
