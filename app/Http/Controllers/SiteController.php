<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Category;
use App\Models\Company;
use App\Models\Ecosystem;
use App\Models\GenrePost;
use App\Models\JobPosting;
use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::with('employer', 'company')->where('status', 0)->paginate(12);
        $categories = Category::withCount('jobPostings')
            ->where('status', 1)
            ->get();
        $companies = Company::select('name', 'logo')->take(12)->get();
        $awards = Award::where('status', 1)->take(5)->get();
        $ecosystems = Ecosystem::where('status', 1)->take(4)->get();
        $medias = Media::where('status', 1)->take(6)->get();
        return view('pages.home', compact('jobPostings', 'categories', 'companies', 'awards', 'ecosystems', 'medias'));
    }
    public function filter(Request $request)
    {
        $query = JobPosting::with('employer', 'company')->where('status', 0);

        $categories = Category::withCount('jobPostings')
            ->where('status', 1)
            ->get();
        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->input('city') . '%');
        }


        if ($request->filled('salary')) {
            $query->where('salary', 'like', '%' . $request->input('salary') . '%');
        }


        if ($request->filled('experience')) {
            $query->where('experience', 'like', '%' . $request->input('experience') . '%');
        }


        if ($request->filled('category')) {
            $query->where('category', 'like', '%' . $request->input('category') . '%');
        }
        $jobPostings = $query->paginate(12);
        $companies = Company::select('name', 'logo')->take(12)->get();
        $awards = Award::where('status', 1)->take(5)->get();
        $ecosystems = Ecosystem::where('status', 1)->take(4)->get();
        $medias = Media::where('status', 1)->take(6)->get();
        return view('pages.home', compact('jobPostings', 'categories', 'companies', 'awards', 'ecosystems', 'medias'));
    }

    public function show($slug)
    {
        $jobPosting = JobPosting::with('company')->where('slug', $slug)->where('status', 0)->firstOrFail();
        $closingDate = Carbon::parse($jobPosting->closing_date);
        $isExpired = $closingDate->isPast();
        $candidate = Auth::guard('candidate')->user();
        $applied = false;
        $appliedDate = null;
        if ($candidate) {
            $applied = $candidate->applications()->where('job_posting_id', $jobPosting->id)->exists();
            if ($applied) {
                $application = $candidate->applications()->where('job_posting_id', $jobPosting->id)->first();
                $appliedDate = Carbon::parse($application->created_at)->format('d/m/Y');
            }
        }
        // Lấy các công việc liên quan
        $relatedJobs = JobPosting::with('company')->where('category', $jobPosting->category)
            ->orWhere('city', 'like', '%' . $jobPosting->city . '%')
            ->where('id', '!=', $jobPosting->id)
            ->where('status', 0)
            ->take(5) // Lấy tối đa 5 công việc liên quan
            ->get();
        foreach ($relatedJobs as $relatedJob) {
            $relatedJob->days_to_closing = Carbon::now()->diffInDays(Carbon::parse($relatedJob->closing_date), false);
            $relatedJob->time_since_update = Carbon::parse($relatedJob->updated_at)->diffForHumans();
        }
        return view('pages.job', compact('jobPosting', 'closingDate', 'isExpired', 'candidate', 'applied', 'appliedDate', 'relatedJobs'));
    }

    public function searchJobs(Request $request)
    {
        $query = JobPosting::query()->where('status', 0);

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
            $keyword = $request->keyword; // Lưu từ khóa tìm kiếm
        } else {
            $keyword = null;
        }

        if ($request->filled('city')) {
            $query->where('city', $request->city);
            $city = $request->city; // Lưu thành phố tìm kiếm
        } else {
            $city = null;
        }

        $jobPostings = $query->get();
        $jobCount = $jobPostings->count(); // Số lượng công việc tìm thấy

        return view('pages.tim-kiem', compact('jobPostings', 'keyword', 'city', 'jobCount'));
    }

    public function showCategory($slug)
    {
        // Lấy danh mục theo slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Lấy các công việc thuộc danh mục với trạng thái = 0
        $jobPostings = JobPosting::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->where('status', 0)->paginate(12);

        return view('pages.category', compact('category', 'jobPostings'));
    }

    public function allCompany()
    {
        $companies = Company::where('top', 1)
            ->where('status', 1)
            ->take(20)
            ->get(); // Lấy tối đa 20 công ty có top = 1 và status = 1
        return view('pages.company', compact('companies'));
    }
    public function searchCompany(Request $request)
    {
        $keyword = $request->input('keyword');
        $companies = Company::where('name', 'like', '%' . $keyword . '%')
            ->where('status', 1)
            ->where('top', 1)
            ->take(20)
            ->get();
        return view('pages.company', compact('companies'));
    }
    public function showCompany($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();
        $jobPostings = $company->jobPostings()->where('status', 0)->get(); // Lấy các job postings của company có status = 1
        return view('pages.company-show', compact('company', 'jobPostings'));
    }
     public function showPost($slug)
    {
        $genrePost = GenrePost::where('slug', $slug)->with('posts')->firstOrFail();
        $featuredPosts = $genrePost->posts()->where('featured', 1)->take(1)->get();
        return view('pages.blog', compact('genrePost', 'featuredPosts'));
    }
}
