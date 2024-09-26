<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Award;
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
    public function index(Request $request)
    {
        $this->trackVisitor($request->ip(), OnlineVisitor::class);

        $jobPostings = JobPosting::with(['company', 'employer', 'cities'])
            ->where('status', 0) // Lọc các jobPostings đang mở
            ->where('closing_date', '>=', Carbon::now()) // Lấy các jobPostings còn hạn
            ->paginate(12);
        $categories = Category::withCount('jobPostings')
            ->where('status', 1)
            ->get();

        $salaries = Salary::where('status', 'active')->withCount('jobPostings')->get();

        $companies = Company::select('name', 'logo')->take(12)->get();
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

        return view('pages.home', compact('jobPostings', 'categories', 'companies', 'awards', 'ecosystems', 'medias', 'totalCompanyCount', 'totalApplicationCount', 'cities', 'data', 'type'));
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
        $jobPostings = JobPosting::with('employer', 'company')->where('status', 0)->where('closing_date', '>=', Carbon::now())->paginate(12);
        $categories = Category::withCount('jobPostings')
            ->where('status', 1)
            ->get();

        $salaries = Salary::where('status', 'active')->withCount('jobPostings')->get();

        $companies = Company::select('name', 'logo')->take(12)->get();
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
        return view('pages.home', compact('jobPostings', 'categories', 'companies', 'awards', 'ecosystems', 'medias', 'totalCompanyCount', 'totalApplicationCount', 'cities', 'data', 'type'));
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
        return view('pages.job', compact('jobPosting', 'closingDate', 'isExpired', 'candidate', 'applied', 'appliedDate', 'relatedJobs', 'courses', 'company_random', 'jobPosting_random', 'cities_random', 'cities'));
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

        // Trả dữ liệu về view
        return view('pages.tim-kiem', compact('jobPostings', 'keyword', 'city', 'jobCount', 'cities'));
    }


    public function showCategory($slug)
    {
        // Lấy danh mục theo slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Lấy các công việc thuộc danh mục với trạng thái = 0
        $jobPostings = JobPosting::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->with('employer', 'company')->where('closing_date', '>=', Carbon::now())->where('status', 0)->paginate(12);

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
        $jobPostings = $company->jobPostings()->where('status', 0)->get();

        // Lấy các cities liên quan đến các jobPostings của công ty
        $cities = City::whereHas('jobPostings', function ($query) use ($jobPostings) {
            $query->whereIn('job_posting_id', $jobPostings->pluck('id'));
        })->get();

        return view('pages.company-show', compact('company', 'jobPostings', 'cities'));
    }

    public function showPost($slug)
    {
        $genrePost = GenrePost::where('slug', $slug)->with('posts')->firstOrFail();
        $featuredPosts = $genrePost->posts()->where('featured', 1)->take(1)->get();
        return view('pages.blog', compact('genrePost', 'featuredPosts'));
    }
    public function showCourse()
    {
        $courses = Course::where('status', 1)->get(); // Chỉ lấy những khóa học có trạng thái active
        return view('pages.course', compact('courses'));
    }
    public function showApp()
    {
        return view('pages.app');
    }

    public function recruitment(Request $request)
    {
        $this->trackVisitor($request->ip(), OnlineVisitorRecruitment::class);

        // Lấy ngôn ngữ từ session hoặc mặc định là 'vi'
        $lang = session('app_locale', 'vi');
        $tr = new GoogleTranslate($lang);

        // Lấy dữ liệu từ các bảng
        $info_lg = Info::first();
        $recruitment_lg = SmartRecruitment::where('status', true)->get();
        $service_lg = RecruitmentService::where('status', true)->get();
        $figure_lg = Figure::where('status', true)->get();
        $value_lg = Value::where('status', true)->get();
        $award_lg = Award::where('status', 1)->get();
        $typePartner_lg = TypePartner::with('partners')->get();
        $typeHotline_lg = TypeHotline::where('status', true)->get();

        // Dịch các chuỗi từ $info_lg
        $info_lg->recruitment_title_1 = $tr->translate($info_lg->recruitment_title_1);
        $info_lg->big_update_title_1 = $tr->translate($info_lg->big_update_title_1);
        $info_lg->big_update_description = $tr->translate($info_lg->big_update_description);
        $info_lg->ai_in_recruitment_h1 = $tr->translate($info_lg->ai_in_recruitment_h1);
        $info_lg->ai_in_recruitment_h2 = $tr->translate($info_lg->ai_in_recruitment_h2);
        $info_lg->smart_recruitment = $tr->translate($info_lg->smart_recruitment);
        $info_lg->smart_recruitment_description = $tr->translate($info_lg->smart_recruitment_description);
        $info_lg->about_us_h1 = $tr->translate($info_lg->about_us_h1);
        $info_lg->about_us = $tr->translate($info_lg->about_us);


        // Dịch các chuỗi của $recruitment_lg
        foreach ($recruitment_lg as $recruitment) {
            $recruitment->title = $tr->translate($recruitment->title);
            $recruitment->description = $tr->translate($recruitment->description);
        }

        // Dịch các chuỗi của $service_lg
        foreach ($service_lg as $service) {
            $service->title = $tr->translate($service->title);
            $service->description = $tr->translate($service->description);
        }

        // Dịch các chuỗi của $figure_lg
        foreach ($figure_lg as $figure) {
            $figure->title = $tr->translate($figure->title);
            $figure->name = $tr->translate($figure->name);
        }

        // Dịch các chuỗi của $value_lg
        foreach ($value_lg as $value) {
            $value->name = $tr->translate($value->name);
            $value->description = $tr->translate($value->description);
        }

        // Dịch các chuỗi của $award_lg
        foreach ($award_lg as $award) {
            $award->name = $tr->translate($award->name);
            $award->category = $tr->translate($award->category);
        }

        // Dịch các chuỗi của $typePartner_lg
        foreach ($typePartner_lg as $typePartner) {
            $typePartner->name = $tr->translate($typePartner->name);
        }

        // Dịch các chuỗi của $typeHotline_lg
        foreach ($typeHotline_lg as $typeHotline) {
            $typeHotline->name = $tr->translate($typeHotline->name);
        }
        $post_job_free = $tr->translate('Đăng tin miễn phí');
        $free_recruitment_advice = $tr->translate('Tư vấn tuyển dụng miễn phí');
        $new_technology = $tr->translate('Công nghệ đăng tin tuyển dụng mới. Tính năng mới. Trải nghiệm mới.');
        $learn_more = $tr->translate('Tìm hiểu thêm');
        $Recruitment_posting_service = $tr->translate('Dịch vụ đăng tuyển tuyển dụng.');
        $The_numbers_of_the_recruitment = $tr->translate('Những con số của trang tuyển dụng của Vieclamso1');
        $Smart_recruitment_platform = $tr->translate('Giá trị khi sử dụng Vieclamso1 Smart Recruitment Platform');
        $About_us_lg = $tr->translate('Về chúng tôi');
        $Typical_customers = $tr->translate('Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1');
        // Lấy dữ liệu hotlines, cities, và type consultations
        $hotlines = Hotline::with('typeHotline')->where('status', true)->get();
        $cities = City::where('status', 1)->pluck('name', 'id');
        $typeConsultations = TypeConsultation::where('status', 1)->pluck('name', 'id');
        // Dịch các chuỗi khác
        $question_1_lg = $tr->translate('Đâu là giải pháp phù hợp cho doanh nghiệp của bạn?');
        $question_2_lg = $tr->translate('Hãy để lại thông tin và các chuyên viên tư vấn tuyển dụng của Vieclamso1 sẽ liên hệ ngay với bạn');
        $register_for_consultation_lg = $tr->translate('Đăng ký nhận tư vấn');
        $full_name_lg = $tr->translate('Họ và tên');
        $email_lg = $tr->translate('Email');
        $phone_number_lg = $tr->translate('Số điện thoại');
        $city_lg = $tr->translate('Tỉnh/Thành phố');
        $select_city_lg = $tr->translate('Chọn Tỉnh/Thành phố');
        $consultation_needs_lg = $tr->translate('Nhu cầu tư vấn');
        $select_consultation_needs_lg = $tr->translate('Chọn nhu cầu tư vấn');
        $submit_request_lg = $tr->translate('Gửi yêu cầu tư vấn');
         $Awardlg_lg = $tr->translate('Giải thưởng tiêu biểu');

        $cooperation_lg = $tr->translate('Vieclamso1 Việt Nam mong muốn được hợp tác cùng Doanh nghiệp');
        $support_team_ready_lg = $tr->translate('Đội ngũ hỗ trợ của Vieclamso1 luôn sẵn sàng để tư vấn giải pháp tuyển dụng và đồng hành cùng các Quý nhà tuyển dụng');
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
            'post_job_free',
            'free_recruitment_advice',
            'new_technology',
            'learn_more',
            'Recruitment_posting_service',
            'The_numbers_of_the_recruitment',
            'Smart_recruitment_platform',
            'About_us_lg',
            'Typical_customers',
            'question_1_lg',
            'question_2_lg',
            'register_for_consultation_lg',
            'full_name_lg',
            'email_lg',
            'phone_number_lg',
            'city_lg',
            'select_city_lg',
            'consultation_needs_lg',
            'select_consultation_needs_lg',
            'submit_request_lg',
            'cooperation_lg',
            'support_team_ready_lg',
            'Awardlg_lg',
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
