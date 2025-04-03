<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Award;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Course;
use App\Models\Ecosystem;
use App\Models\Figure;
use App\Models\GenrePost;
use App\Models\Hotline;
use App\Models\Info;
use App\Models\JobPosting;
use App\Models\Media;
use App\Models\Notification;
use App\Models\OnlineVisitor;
use App\Models\OnlineVisitorRecruitment;
use App\Models\Partner;
use App\Models\RecruitmentService;
use App\Models\Salary;
use App\Models\SmartRecruitment;
use App\Models\TypeConsultation;
use App\Models\TypeHotline;
use App\Models\TypePartner;
use App\Models\Value;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;


class SiteController extends Controller
{

    public function tutorial(){
        return view('pages.tutorial');
    }
     public function termsService(Request $request)
    {

        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.terms', compact('notifications'));
    }
  public function faqs(Request $request)
    {

        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.faqs', compact('notifications'));
    }
    public function index(Request $request)
    {
        $this->trackVisitor($request->ip(), OnlineVisitor::class);

        $jobPostings = JobPosting::with(['company', 'employer', 'cities'])
            ->where('status', 0)
            ->where('isHot', '1')
            ->where('closing_date', '>=', Carbon::now())
            ->orderBy('updated_at', 'desc')
            ->paginate(12);
      $categories = Category::withCount('jobPostings')
    ->where('status', 1)
    ->get(); // Không phân trang
$category_slider = Category::withCount('jobPostings')
    ->where('status', 1)
    ->get()
    ->chunk(8);


        $salaries = Salary::where('status', 'active')->withCount('jobPostings')->get();

        $companies = Company::select('name', 'logo', 'slug')->where('status', 1)->where('top_home', 1)->take(12)->get();
        $awards = Award::where('status', 1)->take(5)->get();
        $ecosystems = Ecosystem::where('status', 1)->take(4)->get();
        $medias = Media::where('status', 1)->take(6)->get();
        $totalCompanyCount = Company::count();
        $totalApplicationCount = Application::count();
        $cities = City::where('status', 1)->pluck('name', 'id');

        // Prepare data for categories and salaries
        $jobData = $categories->map(function ($category) {
            return [
                'name' => $category->name,
                'count' => $category->job_postings_count
            ];
        })->take(5);

        $salaryData = $salaries->map(function ($salary) {
            return [
                'name' => $salary->name,
                'count' => $salary->job_postings_count
            ];
        })->take(5);

        // Determine which data to show based on the selected type
        $type = $request->input('type', 'job');
        $data = ($type === 'salary') ? $salaryData : $jobData;
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.home', compact('jobPostings', 'categories', 'companies', 'awards', 'ecosystems', 'medias', 'totalCompanyCount', 'totalApplicationCount', 'cities', 'data', 'type', 'notifications','category_slider'));
    }

    public function filter(Request $request)
    {
        $city = $request->input('city');
        $salary = $request->input('salary');
        $experience = $request->input('experience');
        $category = $request->input('category');
        $jobPostings = JobPosting::with('employer', 'company', 'cities', 'categories')
            ->where('status', 0)
            ->where('isHot', '1')
            ->where('closing_date', '>=', Carbon::now());


        // Apply filters based on the user's input
        if ($city) {
            $jobPostings->whereHas('cities', function ($query) use ($city) {
                $query->where('name', 'like', '%' . $city . '%');
            });
        }

        if ($salary) {
            $jobPostings->where('salary', '>=', $salary);
        }

        if ($experience) {
            $jobPostings->where('experience', '>=', $experience);
        }

        if ($category) {
            $jobPostings->whereHas('categories', function ($query) use ($category) {
                $query->where('name', 'like', '%' . $category . '%');
            });
        }
        $jobPostings = $jobPostings->paginate(12);


        $categories = Category::withCount('jobPostings')->where('status', 1)->paginate(8);
        $salaries = Salary::where('status', 'active')->withCount('jobPostings')->get();
        $companies = Company::select('name', 'logo', 'slug')->take(12)->get();
        $awards = Award::where('status', 1)->take(5)->get();
        $ecosystems = Ecosystem::where('status', 1)->take(4)->get();
        $medias = Media::where('status', 1)->take(6)->get();
        $totalCompanyCount = Company::count();
        $totalApplicationCount = Application::count();
        $cities = City::where('status', 1)->pluck('name', 'id');
        $jobData = $categories->map(function ($category) {
            return [
                'name' => $category->name,
                'count' => $category->job_postings_count
            ];
        });

        $salaryData = $salaries->map(function ($salary) {
            return [
                'name' => $salary->name,
                'count' => $salary->job_postings_count
            ];
        });

        // Determine which data to show based on the selected type
        $type = $request->input('type', 'job');
        $data = ($type === 'salary') ? $salaryData : $jobData;
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Return view with filtered job postings and other data
        return view('pages.home', compact('jobPostings', 'categories', 'companies', 'awards', 'ecosystems', 'medias', 'totalCompanyCount', 'totalApplicationCount', 'cities', 'data', 'type', 'notifications'));
    }


    public function show($slug)
    {
        $jobPosting = JobPosting::with(['company', 'cities', 'categories'])->where('slug', $slug)->where('status', 0)->firstOrFail();
        // Tăng số lượt xem lên 1
        $jobPosting->increment('views');
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
        $relatedJobs = JobPosting::with(['company', 'cities'])
            ->where('closing_date', '>=', Carbon::now()) // Công việc còn hạn ứng tuyển
            ->where('status', 0) // Công việc đang mở
            ->where('id', '!=', $jobPosting->id) // Loại trừ công việc hiện tại
            ->whereHas('cities', function ($query) use ($jobPosting) {
                $query->whereIn('cities.id', $jobPosting->cities->pluck('id'));
            })
            ->whereHas('categories', function ($query) use ($jobPosting) {
                $query->whereIn('categories.id', $jobPosting->categories->pluck('id'));
            })
            ->where('title', 'LIKE', '%' . Str::of($jobPosting->title)->explode(' ')->first() . '%') // Tìm theo từ khóa đầu tiên trong title
            ->take(5) // Giới hạn 5 công việc
            ->get();
        foreach ($relatedJobs as $relatedJob) {
            $relatedJob->days_to_closing = Carbon::now()->diffInDays(Carbon::parse($relatedJob->closing_date), false);
            $relatedJob->time_since_update = Carbon::parse($relatedJob->updated_at)->diffForHumans();
        }
        $courses = Course::where('status', 1)->take(3)->get();
        $company_random = Company::inRandomOrder()->first();
        $jobPosting_random = $company_random->jobPostings()->where('status', 0)->where('closing_date', '>=', Carbon::now())->get();
        $cities_random = City::whereHas('jobPostings', function ($query) use ($jobPosting_random) {
            $query->whereIn('job_posting_id', $jobPosting_random->pluck('id'));
        })->get();
        $cities = City::where('status', 1)->pluck('name', 'id');
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.job', compact('jobPosting', 'closingDate', 'isExpired', 'candidate', 'applied', 'appliedDate', 'relatedJobs', 'courses', 'company_random', 'jobPosting_random', 'cities_random', 'cities', 'notifications'));
    }

    public function searchJobs(Request $request)
    {
        $query = JobPosting::with('cities')->where('closing_date', '>=', Carbon::now())->where('status', 0);
        $cities = City::where('status', 1)->pluck('name', 'id');
        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
            $keyword = $request->keyword;
        } else {
            $keyword = null;
        }
        if ($request->filled('city')) {
            $cityId = $request->city;
            $query->whereHas('cities', function ($q) use ($cityId) {
                $q->where('city_id', $cityId);
            });
            $city = $cities->get($cityId);
        } else {
            $city = null;
        }

        // Lấy các bài đăng công việc theo truy vấn
        $jobPostings = $query->get();
        $jobCount = $jobPostings->count();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Trả dữ liệu về view
        return view('pages.tim-kiem', compact('jobPostings', 'keyword', 'city', 'jobCount', 'cities', 'notifications'));
    }


    public function showCategory($slug)
    {
        // Lấy danh mục theo slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Lấy các công việc thuộc danh mục với trạng thái = 0
        $jobPostings = JobPosting::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->with('employer', 'company')->where('closing_date', '>=', Carbon::now())->where('status', 0)->paginate(12);
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.category', compact('category', 'jobPostings', 'notifications'));
    }

    public function allCompany()
    {
        $companies = Company::where('top', 1)
            ->where('status', 1)
            ->take(20)
            ->get(); // Lấy tối đa 20 công ty có top = 1 và status = 1
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.company', compact('companies', 'notifications'));
    }
    public function searchCompany(Request $request)
    {
        $keyword = $request->input('keyword');
        $companies = Company::where('name', 'like', '%' . $keyword . '%')
            ->where('status', 1)
            ->where('top', 1)
            ->take(20)
            ->get();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.company', compact('companies', 'notifications'));
    }
    public function showCompany($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();
        $jobPostings = $company->jobPostings()->where('status', 0)->get();

        // Lấy các cities liên quan đến các jobPostings của công ty
        $cities = City::whereHas('jobPostings', function ($query) use ($jobPostings) {
            $query->whereIn('job_posting_id', $jobPostings->pluck('id'));
        })->get();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.company-show', compact('company', 'jobPostings', 'cities', 'notifications'));
    }

    public function showPost($slug)
    {
        $genrePost = GenrePost::where('slug', $slug)->with('posts')->firstOrFail();
        $featuredPosts = $genrePost->posts()->where('featured', 1)->take(1)->get();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.blog', compact('genrePost', 'featuredPosts', 'notifications'));
    }
    public function showCourse()
    {
        $courses = Course::where('status', 1)->get(); // Chỉ lấy những khóa học có trạng thái active
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.course', compact('courses', 'notifications'));
    }
    public function showApp()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.app', compact('notifications'));
    }

    public function recruitment(Request $request)
    {
        $this->trackVisitor($request->ip(), OnlineVisitorRecruitment::class);
        $info_lg = Info::first();
        $recruitment_lg = SmartRecruitment::where('status', true)->get();
        $service_lg = RecruitmentService::where('status', true)->get();
        $figure_lg = Figure::where('status', true)->get();
        $value_lg = Value::where('status', true)->get();
        $award_lg = Award::where('status', 1)->get();
        $typePartner_lg = TypePartner::with('partners')->get();
        $typeHotline_lg = TypeHotline::where('status', true)->get();
        // Lấy dữ liệu hotlines, cities, và type consultations
        $hotlines = Hotline::with('typeHotline')->where('status', true)->get();
        $cities = City::where('status', 1)->pluck('name', 'id');
        $typeConsultations = TypeConsultation::where('status', 1)->pluck('name', 'id');
        return view('pages.recruitment', compact(
            'hotlines',
            'cities',
            'typeConsultations',
            'info_lg',
            'recruitment_lg',
            'service_lg',
            'figure_lg',
            'value_lg',
            'award_lg',
            'typePartner_lg',
            'typeHotline_lg',
        ));
    }
    public function pricing()
    {

        // Retrieve carts and cart benefits
        $carts = Cart::with(['typeCart', 'planCurrency', 'planFeatures'])
            ->where('status', 1)
            ->get();
        $cart_benefit = Cart::with(['typeCart', 'planCurrency', 'planFeatures'])
            ->where('status', 1)
            ->where('Pricing', 1)
            ->take(6)
            ->get();
        $hotlines = Hotline::with('typeHotline')->where('status', true)->get();
        $cities = City::where('status', 1)->pluck('name', 'id');
        $typeConsultations = TypeConsultation::where('status', 1)->pluck('name', 'id');
        // Return view with translated data
        return view('pages.pricing', compact(
            'carts',
            'cart_benefit',
            'hotlines',
            'cities',
            'typeConsultations',
        ));
    }


    public function storeConsultation(Request $request)
    {
        // Validate the form data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10',
            'city_id' => 'required|exists:cities,id',
            'type_consulting_id' => 'required|exists:type_consultings,id',
            'consulting_text' => 'nullable|string|max:1000',
        ]);

        // Create a new consultation record
        Consultation::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'city_id' => $request->input('city_id'),
            'type_consulting_id' => $request->input('type_consulting_id'),
            'consulting_text' => $request->input('consulting_text'),
            'status' => Consultation::STATUS_PENDING, // Default to pending
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Your consultation request has been submitted successfully.');
    }
    protected function trackVisitor($ip, $model)
    {
        $visitor = $model::updateOrCreate(
            ['ip_address' => $ip],
            ['last_activity' => Carbon::now()]
        );
    }
}
