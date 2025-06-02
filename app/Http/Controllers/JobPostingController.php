<?php

namespace App\Http\Controllers;

use App\DataTables\CandidateDataTable;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\JobPosting;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Purchased;
use App\Models\Salary;
use App\Models\Slide;
use App\Models\TypeEmployer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationStatusUpdate;
use App\Models\Bank;
use App\Models\Notification;
use App\Models\Order;
use App\Models\SavedProfile;
use App\Models\Service;
use App\Models\Typeservice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class JobPostingController extends Controller
{
    public function savedProfiles()
    {
        $employerId = Auth::guard('employer')->id();
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();


        $savedProfiles = SavedProfile::with('candidate')->where('employer_id', $employerId)->paginate(10);

        return view('job_postings.saved_profiles', compact('savedProfiles', 'recentMessagesCount', 'recentApplicationsCount'));
    }
   public function showAllApplications(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        // Đếm tin nhắn và ứng tuyển gần đây
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();

        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();

        // Lấy gói "Xem thông tin ứng viên" của employer
        $orderDetail = OrderDetail::whereHas('order', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id)
                ->where('status', 'Đã thanh toán');
        })
            ->whereHas('service', function ($query) {
                $query->where('name', 'Xem thông tin ứng viên');
            })
            ->where('number_of_active', '>', 0)
            ->whereDate('expiring_date', '>=', now())
            ->first();

        $hasViewInfoPackage = $orderDetail ? true : false;

        // Lấy các tham số filter và sort
        $status = $request->input('status');
        $sort = $request->input('sort', 'created_at');
        $jobPostingId = $request->input('job_posting');

        // Query tất cả applications của employer
        $applicationsQuery = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
        ->whereIn('approve_application', ['Đã duyệt', 'Nộp lại']);

        // Filter theo trạng thái
        if ($status && in_array($status, ['pending', 'reviewed', 'accepted', 'rejected'])) {
            $applicationsQuery->where('applications.status', $status);
        }

        // Filter theo job posting cụ thể
        if ($jobPostingId) {
            $applicationsQuery->where('job_posting_id', $jobPostingId);
        }

        // Sorting
        if ($sort == 'name') {
            $applicationsQuery->join('candidates', 'applications.candidate_id', '=', 'candidates.id')
                ->orderBy('candidates.fullname_candidate', 'asc')
                ->select('applications.*');
        } else {
            $applicationsQuery->orderBy('applications.' . $sort, 'desc');
        }

        $applications = $applicationsQuery->with(['candidate', 'jobPosting'])->paginate(10);

        // Lấy danh sách job postings của employer để filter
        $jobPostings = JobPosting::where('employer_id', $employer->id)
            ->orderBy('title', 'asc')
            ->get();

        $isInfomation = $employer->isInfomation ?? false;

        return view('job_postings.all_applications', compact(
            'applications',
            'jobPostings',
            'isInfomation',
            'recentMessagesCount',
            'recentApplicationsCount',
            'hasViewInfoPackage'
        ));
    }

    public function removeSavedProfile($candidateId)
    {
        $employerId = Auth::guard('employer')->id();

        // Xóa hồ sơ đã lưu
        SavedProfile::where('employer_id', $employerId)
            ->where('candidate_id', $candidateId)
            ->delete();

        return back()->with('success', 'Xóa hồ sơ thành công!');
    }

    public function saveProfile($candidateId)
    {
        $employerId = Auth::guard('employer')->id();

        // Kiểm tra nếu hồ sơ đã được lưu
        $exists = SavedProfile::where('employer_id', $employerId)
            ->where('candidate_id', $candidateId)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Hồ sơ này đã được lưu trước đó.');
        }

        // Lưu hồ sơ
        SavedProfile::create([
            'employer_id' => $employerId,
            'candidate_id' => $candidateId,
        ]);

        return back()->with('success', 'Lưu hồ sơ thành công!');
    }


    public function searchCandidate(Request $request)
    {
        $query = Candidate::query();
        $query->where('is_public', 1);
        // Tìm kiếm theo từ khóa
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('fullname_candidate', 'like', "%$search%")
                    ->orWhere('position', 'like', "%$search%")
                    ->orWhere('working_form', 'like', "%$search%")
                    ->orWhere('desired_salary', 'like', "%$search%")
                    ->orWhere('years_of_experience', 'like', "%$search%");
            });
        }

        // Lọc theo thứ tự
        if ($request->filled('filter')) {
            $filter = $request->input('filter');

            switch ($filter) {
                case 'recent':
                    $query->orderBy('created_at', 'desc'); // Gần nhất
                    break;

                case 'oldest':
                    $query->orderBy('created_at', 'asc'); // Cũ nhất
                    break;

                case 'ratehigh':
                    $query->orderBy('years_of_experience', 'desc'); // Nhiều năm kinh nghiệm
                    break;
            }
        }
        if ($request->filled('category_candidate')) {
            $categoryId = $request->input('category_candidate');

            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }
        $candidates = $query->paginate(10);

        $categories = Category::all();

        $employer = Auth::guard('employer')->user();
        $validOrderDetails = OrderDetail::whereHas('order', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id)
                ->where('status', 'Đã thanh toán');
        })
            ->whereHas('service', function ($query) {
                $query->where('name', 'Tìm ứng viên');
            })
            ->whereDate('expiring_date', '>=', Carbon::today())
            ->get();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();

        return view('job_postings.search_candidate', compact('candidates', 'categories', 'recentMessagesCount', 'recentApplicationsCount', 'validOrderDetails'));
    }


    public function updateNote(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'note' => 'required|string',
        ]);

        $application->update([
            'note' => $validatedData['note'],
        ]);

        return redirect()->back()->with('success', 'Application updated successfully');
    }
    public function updateRating(Request $request, Application $application)
    {
        // Nếu đã ở trạng thái 'accepted' hoặc 'rejected' thì không cho cập nhật nữa
        if (in_array($application->status, ['accepted', 'rejected'])) {
            return redirect()->back()->with('error', 'Không thể cập nhật hồ sơ đã được xử lý.');
        }

        // Validate dữ liệu
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|string|in:pending,reviewed,accepted,rejected',
        ]);

        // Cập nhật
        $application->update([
            'rating' => $validatedData['rating'],
            'status' => $validatedData['status'],
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // Gán tên trạng thái để hiển thị
        $statusLabels = [
            'pending' => 'Đã ứng tuyển',
            'reviewed' => 'Nhà tuyển dụng đã xem hồ sơ',
            'accepted' => 'Hồ sơ phù hợp',
            'rejected' => 'Hồ sơ chưa phù hợp',
        ];

        $statusMessage = $statusLabels[$application->status] ?? 'Trạng thái không xác định';


        if ($application->candidate && $application->candidate->email) {
            Mail::to($application->candidate->email)
                ->send(new ApplicationStatusUpdate($application, $statusMessage, $validatedData['rating']));
        }

        return redirect()->back()->with('success', 'CV và đánh giá đã được cập nhật thành công!');
    }


    public function index()
    {
        $employer = Auth::guard('employer')->user();
        $jobPostings = $employer->jobPostings;
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();

        return view('job_postings.index', compact('jobPostings', 'recentMessagesCount', 'recentApplicationsCount'));
    }

    public function dashboard()
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $activeJobPostingsCount = $employer->activeJobPostingsCount();
        $totalJobViews = $employer->totalJobViews();
        $totalApplications = $employer->totalApplications();
        $totalMessages = $employer->totalMessages();
        $applicationsLast30Days = $employer->jobPostings()
            ->with('applications')
            ->get()
            ->flatMap(function ($jobPosting) {
                return $jobPosting->applications;
            })
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function ($applications) {
                return count($applications);
            });
        $dates = collect();
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[$date] = $applicationsLast30Days->get($date, 0);
        }

        $dates = $dates->reverse();
        $activeTypeEmployer = TypeEmployer::where('status', 'active')->get();
        $slides = Slide::where('status', 'active')->get();

        return view('job_postings.dashboard', compact('activeJobPostingsCount', 'totalJobViews', 'totalApplications', 'totalMessages', 'dates', 'activeTypeEmployer', 'employer', 'slides', 'recentMessagesCount', 'recentApplicationsCount'));
    }






    public function show(Request $request, $id)
    {
        $employer = Auth::guard('employer')->user();

        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $jobPosting = JobPosting::where('employer_id', $employer->id)
            ->findOrFail($id);
        // Lấy gói "Xem thông tin ứng viên" của employer
        $orderDetail = OrderDetail::whereHas('order', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id)
                ->where('status', 'Đã thanh toán');
        })
            ->whereHas('service', function ($query) {
                $query->where('name', 'Xem thông tin ứng viên');
            })
            ->where('number_of_active', '>', 0)
            ->whereDate('expiring_date', '>=', now())
            ->first();
        $hasViewInfoPackage = $orderDetail ? true : false;
        if ($employer->id != $jobPosting->employer_id) {
            return redirect()->back()->with('error', 'Bạn không có quyền xem tin tuyển dụng này.');
        }
        $status = $request->input('status');
        $sort = $request->input('sort', 'created_at');

        $applications = $jobPosting->applications()
            ->whereIn('approve_application', ['Đã duyệt', 'Nộp lại'])

            ->when($status && in_array($status, ['pending', 'reviewed', 'accepted', 'rejected']), function ($query) use ($status) {
                return $query->where('applications.status', $status); // fix ambiguity here
            })

            ->when($sort == 'name', function ($query) {
                return $query->join('candidates', 'applications.candidate_id', '=', 'candidates.id')
                    ->orderBy('candidates.fullname_candidate', 'asc')
                    ->select('applications.*');
            }, function ($query) use ($sort) {
                return $query->orderBy('applications.' . $sort, 'desc'); // add table prefix to avoid future ambiguity
            })

            ->with('candidate')
            ->get();

        $isInfomation = $employer->isInfomation ?? false;
        return view('job_postings.show', compact('jobPosting', 'applications', 'isInfomation', 'recentMessagesCount', 'recentApplicationsCount', 'hasViewInfoPackage'));
    }
    public function create()
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        if ($employer->level != 3) {
            return redirect()->back()->with('error', 'Bạn cần có cấp độ 3 để tạo việc làm.');
        }
        $basicServiceDetails = OrderDetail::whereHas('order', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id)
                ->where('status', 'Đã thanh toán');
        })
            ->whereHas('service', function ($query) {
                $query->where('name', 'Tin cơ bản');
            })
            ->whereDate('expiring_date', '>=', Carbon::today())
            ->where('number_of_active', '>', 0)
            ->with(['service'])
            ->get();
        $hotServiceDetails = OrderDetail::whereHas('order', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id)
                ->where('status', 'Đã thanh toán');
        })
            ->whereHas('service', function ($query) {
                $query->where('name', 'Tin nổi bật');
            })
            ->whereDate('expiring_date', '>=', Carbon::today())
            ->where('number_of_active', '>', 0)
            ->with(['service'])
            ->get();
        $specialServiceDetails = OrderDetail::whereHas('order', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id)
                ->where('status', 'Đã thanh toán');
        })
            ->whereHas('service', function ($query) {
                $query->where('name', 'Tin đặc biệt');
            })
            ->whereDate('expiring_date', '>=', Carbon::today())
            ->where('number_of_active', '>', 0)
            ->with(['service'])
            ->get();
        $email = $employer->email;
        $categories = Category::all();
        $cities = City::all();
        $company = $employer->company;
        $salaries = Salary::where('status', 'active')->get();
        return view('job_postings.create', compact('email', 'categories', 'company', 'cities', 'salaries', 'recentMessagesCount', 'recentApplicationsCount', 'basicServiceDetails', 'hotServiceDetails', 'specialServiceDetails', 'employer'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'category' => 'required|array',
            'description' => 'required|string',
            'application_email_url' => 'required|email',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'number_of_recruits' => 'required|integer',
            'sex' => 'required|string|max:255',
            'job_skills' => 'nullable|string',
            'benefits' => 'nullable|string',
            'education' => 'nullable|string',
            'city' => 'required|array',
            'service_type' => 'required|in:Tin cơ bản,Tin nổi bật,Tin đặc biệt',
        ], [
            'title.required' => 'Job title is required.',
            'type.required' => 'Job type is required.',
            'category.required' => 'At least one category is required.',
            'description.required' => 'Job description is required.',
            'application_email_url.required' => 'Application email or URL is required.',
            'company_id.required' => 'Company is required.',
            'email.required' => 'Your email is required.',
            'email.email' => 'Please enter a valid email address.',
            'city.required' => 'At least one city is required.',
        ]);
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (JobPosting::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $jobPosting = new JobPosting();
        $jobPosting->employer_id = Auth::guard('employer')->id();
        $jobPosting->company_id = $request->company_id;
        $jobPosting->email = $request->email;
        $jobPosting->title = $request->title;
        $jobPosting->slug = $slug;
        $jobPosting->type = $request->type;
        $jobPosting->location = $request->location;
        $jobPosting->tags = $request->tags;
        $jobPosting->description = $request->description;
        $jobPosting->application_email_url = $request->application_email_url;
        $jobPosting->closing_date = $request->closing_date;
        $jobPosting->salary = $request->salary;
        $jobPosting->experience = $request->experience;
        $jobPosting->rank = $request->rank;
        $jobPosting->number_of_recruits = $request->number_of_recruits;
        $jobPosting->sex = $request->sex;
        $jobPosting->status = 1;
        $jobPosting->service_type = $request->service_type;
        $jobPosting->job_skills = $request->job_skills;
        $jobPosting->benefits = $request->benefits;
        $jobPosting->education = $request->education;


        // Handle logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logo_company', 'public');
            $jobPosting->logo = $logoPath;
        }

        // Save job posting before syncing categories
        $jobPosting->save();

        // Sync categories
        $jobPosting->categories()->sync($request->category);
        $jobPosting->cities()->sync($request->city);
        $company = Company::find($jobPosting->company_id);
        if ($request->has('service_type')) {
            $serviceType = $request->service_type;
            $orderDetailId = null;

            switch ($serviceType) {
                case 'Tin cơ bản':
                    $orderDetail = OrderDetail::whereHas('order', function ($query) {
                        $query->where('employer_id', Auth::guard('employer')->user()->id)
                            ->where('status', 'Đã thanh toán');
                    })
                        ->whereHas('service', function ($query) {
                            $query->where('name', 'Tin cơ bản');
                        })
                        ->whereDate('expiring_date', '>=', Carbon::today())
                        ->where('number_of_active', '>', 0)
                        ->first();
                    break;

                case 'Tin nổi bật':
                    $orderDetail = OrderDetail::whereHas('order', function ($query) {
                        $query->where('employer_id', Auth::guard('employer')->user()->id)
                            ->where('status', 'Đã thanh toán');
                    })
                        ->whereHas('service', function ($query) {
                            $query->where('name', 'Tin nổi bật');
                        })
                        ->whereDate('expiring_date', '>=', Carbon::today())
                        ->where('number_of_active', '>', 0)
                        ->first();
                    break;

                case 'Tin đặc biệt':
                    $orderDetail = OrderDetail::whereHas('order', function ($query) {
                        $query->where('employer_id', Auth::guard('employer')->user()->id)
                            ->where('status', 'Đã thanh toán');
                    })
                        ->whereHas('service', function ($query) {
                            $query->where('name', 'Tin đặc biệt');
                        })
                        ->whereDate('expiring_date', '>=', Carbon::today())
                        ->where('number_of_active', '>', 0)
                        ->first();
                    break;
            }

            if ($orderDetail) {
                // Decrement the usage count
                $orderDetail->decrement('number_of_active');

                // Create the relationship in the pivot table
                $jobPosting->orders()->attach($orderDetail->order_id, [
                    'order_detail_id' => $orderDetail->id
                ]);
            }
        }
        // Gửi thông báo đến các candidate theo dõi công ty
        $followers = $company->followers;
        foreach ($followers as $follower) {
            Notification::create([
                'candidate_id' => $follower->id,
                'company_id' => $company->id,
                'message' => "Công ty {$company->name} đã đăng bài tuyển dụng mới.",
            ]);
        }
        return redirect()->route('job-postings.index')->with('success', 'Job posting created successfully!');
    }


    public function destroy($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        if ($jobPosting->employer_id != Auth::guard('employer')->id()) {
            return redirect()->route('job-postings.index')->with('error', 'Unauthorized access.');
        }
        $jobPosting->delete();

        return redirect()->route('job-postings.index')->with('success', 'Job posting deleted successfully!');
    }




    public function edit($id)
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $jobPosting = JobPosting::findOrFail($id);
        if ($employer->id != $jobPosting->employer_id) {
            // Nếu không phải, chuyển hướng về trang trước đó với thông báo lỗi
            return redirect()->back()->with('error', 'Bạn không có quyền chỉnh sửa tin tuyển dụng này.');
        }
        $selectedCities = explode(', ', $jobPosting->city);
        $cities = City::all();
        $selectedCities = $jobPosting->cities->pluck('id')->toArray();
        $jobPosting = JobPosting::findOrFail($id);
        $categories = Category::all();
        $selectedCategories = $jobPosting->categories->pluck('id')->toArray();

        $company = $employer->company;
        $salaries = Salary::where('status', 'active')->get();
        return view('job_postings.edit', compact('jobPosting', 'selectedCities', 'cities', 'categories', 'selectedCategories', 'company', 'selectedCities', 'salaries', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'category' => 'required|array',
            'description' => 'required|string',
            'application_email_url' => 'required|email',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'number_of_recruits' => 'required|integer',
            'sex' => 'required|string|max:255',
            'city' => 'required|array',
            'job_skills' => 'nullable|string',
            'benefits' => 'nullable|string',
            'education' => 'nullable|string|max:255',
        ], [
            'title.required' => 'Job title is required.',
            'type.required' => 'Job type is required.',
            'category.required' => 'At least one category is required.',
            'description.required' => 'Job description is required.',
            'application_email_url.required' => 'Application email or URL is required.',
            'company_id.required' => 'Company is required.',
            'email.required' => 'Your email is required.',
            'email.email' => 'Please enter a valid email address.',
            'city.required' => 'At least one city is required.',
            'job_skills.string' => 'Kỹ năng yêu cầu phải là chuỗi.',
            'benefits.string' => 'Phúc lợi phải là chuỗi.',
            'education.string' => 'Học vấn phải là chuỗi.',
        ]);

        $jobPosting = JobPosting::findOrFail($id);
        if ($jobPosting->status == 0) {
            return redirect()->route('job-postings.index')->with('error', 'Tin đã duyệt không thể chỉnh sửa.');
        }
        $jobPosting->email = $request->email;
        $jobPosting->title = $request->title;
        $jobPosting->type = $request->type;
        $jobPosting->location = $request->location;
        $jobPosting->tags = $request->tags;
        $jobPosting->description = $request->description;
        $jobPosting->application_email_url = $request->application_email_url;
        $jobPosting->closing_date = $request->closing_date;
        $jobPosting->salary = $request->salary;
        $jobPosting->experience = $request->experience;
        $jobPosting->rank = $request->rank;
        $jobPosting->number_of_recruits = $request->number_of_recruits;
        $jobPosting->sex = $request->sex;
        $jobPosting->company_id = $request->company_id;
        $jobPosting->job_skills = $request->job_skills;
        $jobPosting->benefits = $request->benefits;
        $jobPosting->education = $request->education;
        $jobPosting->save();

        // Sync categories
        $jobPosting->categories()->sync($request->category);
        $jobPosting->cities()->sync($request->city);


        // Redirect with success message
        return redirect()->route('job-postings.index')->with('success', 'Job posting updated successfully!');
    }
    public function showCV($id)
    {
        // Lấy nhà tuyển dụng đang đăng nhập
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $candidate = Candidate::with([
            'cvs',
            'educations',
            'experiences',
            'skills',
            'certificates',
            'projects',
            'activities',
            'hobbies',
            'advisers',
            'prizes'
        ])->findOrFail($id);

        // Truyền thêm biến isInfomation để kiểm tra trong view
        $isInfomation = $employer->isInfomation ?? false;
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.overview-cv', compact('candidate', 'isInfomation', 'notifications', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function services()
    {

        $employer = Auth::guard('employer')->user();
        $employerId = $employer->id;
        $carts = Cart::getEmployerCart($employerId);

        $exchangeRate = 0.000042;
        $typeservices = Typeservice::with(['services.weeks'])
            ->where('status', true)
            ->get();

        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Truyền dữ liệu carts sang view
        return view('job_postings.services', compact('carts', 'recentMessagesCount', 'recentApplicationsCount', 'typeservices', 'exchangeRate'));
    }
    public function serviceActive()
    {
        $employer = Auth::guard('employer')->user();

        // Eager load all necessary relationships to prevent N+1 queries
        $orders = Order::with(['orderDetails.cart', 'jobPostings'])
            ->where('employer_id', $employer->id)
            ->where('status', 'Đã thanh toán')
            ->orderBy('created_at', 'desc')
            ->get();

        $recentTimeframe = Carbon::now()->subHours(5);

        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', $recentTimeframe)
            ->count();

        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', $recentTimeframe)
            ->count();

        return view('job_postings.service-active', compact(
            'employer',
            'orders',
            'recentMessagesCount',
            'recentApplicationsCount'
        ));
    }
    public function removeFromCart($id)
    {
        $cart = Cart::where('id', $id)
            ->where('employer_id', Auth::guard('employer')->id())
            ->firstOrFail();

        $cart->delete();

        return response()->json(['success' => true, 'message' => 'Đã xoá dịch vụ khỏi giỏ hàng.']);
    }

    public function getCartCount()
    {
        $employerId = Auth::guard('employer')->user()->id;
        $cartCount = Cart::where('employer_id', $employerId)->sum('quantity');

        return response()->json([
            'cart_count' => $cartCount
        ]);
    }
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'number_of_weeks' => 'required|in:1,2,4',
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $employerId = Auth::guard('employer')->user()->id;

        // Kiểm tra xem có cart giống service_id và number_of_weeks hay không
        $cart = Cart::where('employer_id', $employerId)
            ->where('service_id', $validated['service_id'])
            ->where('number_of_weeks', $validated['number_of_weeks'])
            ->first();

        if ($cart) {
            // Nếu trùng cả service_id và number_of_weeks => gộp quantity
            $cart->quantity += $validated['quantity'];
            $cart->total_price = $service->price * $cart->quantity * $cart->number_of_weeks;
            $cart->save();
        } else {
            // Nếu number_of_weeks khác => tạo mới
            Cart::create([
                'employer_id' => $employerId,
                'service_id' => $validated['service_id'],
                'quantity' => $validated['quantity'],
                'number_of_weeks' => $validated['number_of_weeks'],
                'total_price' => $service->price * $validated['quantity'] * $validated['number_of_weeks'],
            ]);
        }

        $cartCount = Cart::where('employer_id', $employerId)->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => 'Dịch vụ đã được thêm vào giỏ hàng',
            'cart_count' => $cartCount
        ]);
    }
    public function showCartDetail($id)
    {
        // Lấy cart theo ID
        $cart = Cart::findOrFail($id);
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Truyền dữ liệu cart sang view
        return view('job_postings.cart_detail', compact('cart', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function buyGift(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $typeProduct = $request->get('type_product', 'all');
        if ($typeProduct == 'all') {
            $products = Product::active()->get();
        } else {
            $products = Product::active()->where('type_product', $typeProduct)->get();
        }

        // Trả về view với danh sách sản phẩm
        return view('job_postings.gift', compact('products', 'employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    // Hàm hiển thị chi tiết sản phẩm
    public function productDetail($id)
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Trả về view và truyền thông tin sản phẩm vào view
        return view('job_postings.gift_detail', compact('product', 'employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function purchaseProduct(Request $request, $id)
    {
        $employer = Auth::guard('employer')->user();
        $product = Product::findOrFail($id);

        // Check if the employer has reached the usage count limit
        $purchasesCount = Purchased::where('employer_id', $employer->id)
            ->where('product_id', $product->id)
            ->count();

        if ($purchasesCount >= $product->usage_count) {
            return redirect()->back()->with('error', 'Giới hạn lượt mua.');
        }

        // Check if the employer has enough Top Points
        if ($employer->top_point >= $product->top_point) {
            // Deduct the points
            $employer->top_point -= $product->top_point;
            $employer->save();

            // Save the purchase
            Purchased::create([
                'employer_id' => $employer->id,
                'product_id' => $product->id,
                'status' => 'success',
            ]);

            return redirect()->back()->with('success', 'Product purchased successfully!');
        } else {
            return redirect()->back()->with('error', 'Not enough Top Points to purchase this product.');
        }
    }



    public function loyalCustomer()
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $nextType = $employer->pointsToNextTypeEmployer();

        // Retrieve the list of purchases for the employer
        $purchases = Purchased::where('employer_id', $employer->id)->with('product')->get();

        return view('job_postings.reward', compact('employer', 'nextType', 'purchases', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function appInsight()
    {
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('job_postings.insight', compact('employer', 'recentMessagesCount', 'recentApplicationsCount'));
    }
    public function showCartEmployer()
    {
        // Lấy employer hiện tại
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();

        $orders = Order::with(['orderDetails.cart'])
            ->where('employer_id', $employer->id)
            ->where('status', 'Đã thanh toán')
            ->orderBy('created_at', 'desc')
            ->get();
        // Truyền dữ liệu sang view để hiển thị
        return view('job_postings.cart_employer', compact('employer', 'recentMessagesCount', 'recentApplicationsCount', 'orders'));
    }
    public function showCheckout()
    {
        $banks = Bank::where('status', '1')->get();
        $employer = Auth::guard('employer')->user();
        $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('job_postings.checkout', compact('banks', 'recentMessagesCount', 'recentApplicationsCount'));
    }
}
