<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employer;
use App\Models\Purchased;
use Carbon\Carbon;
use App\Mail\SendEmailEmployer;
use App\Models\Application;
use App\Models\Cart;
use App\Models\EmailReplyEmployer;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EmployerManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employer-list|employer-create|employer-edit|employer-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:employer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:employer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:employer-delete', ['only' => ['destroy']]);
        $this->middleware('permission:company-list', ['only' => ['indexCompany']]);
        $this->middleware('permission:company-show', ['only' => ['showCompany']]);
        $this->middleware('permission:company-choose', ['only' => ['company_choose']]);
        $this->middleware('permission:top-choose', ['only' => ['top_choose']]);
        $this->middleware('permission:top-home-choose', ['only' => ['top_home_choose']]);
        $this->middleware('permission:featured-choose', ['only' => ['featured_choose']]);
        $this->middleware('permission:purchased-manage', ['only' => ['purchasedManage']]);
        $this->middleware('permission:employer-carts-list', ['only' => ['listAllCarts']]);
        $this->middleware('permission:employer-carts-delete', ['only' => ['destroyCart']]);
        $this->middleware('permission:employer-sentEmails-view', ['only' => ['sentEmails']]);
        $this->middleware('permission:employer-sentEmails-delete', ['only' => ['destroySentEmail']]);
    }
    public function index()
    {
        $userId = Auth::id();
        $user = Auth::user();
        if ($user->roles()->where('id', 1)->exists()) {
            $employers = Employer::with('user')->get();
        } else {
            $employers = Employer::with('user')->where('user_id', $userId)->get();
        }
        $users = User::all();
        return view('admin.employers.index', compact('employers', 'users'));
    }
    // Trong EmployerManageController.php
    public function showJobPostings($id)
    {
        $employer = Employer::findOrFail($id);
        $jobPostings = $employer->jobPostings;
        return view('admin.employers.job_postings', compact('employer', 'jobPostings'));
    }

    public function showApplications($id)
    {
        // Tìm tin tuyển dụng theo ID
        $jobPosting = JobPosting::with('applications.candidate', 'applications.cv')->findOrFail($id);

        // Truyền dữ liệu đến view
        return view('admin.employers.applications', compact('jobPosting'));
    }
    public function updateCvHiddenInfo(Request $request, $id)
    {
        // Xác thực cho phép file PDF hoặc PNG, tối đa 2MB
        $request->validate([
            'cv_hidden_info' => 'required|file|mimes:pdf,png|max:2048', // Cho phép file PDF và PNG, tối đa 2MB
        ]);

        // Tìm ứng tuyển theo ID
        $application = Application::findOrFail($id);

        // Lưu file vào thư mục storage nếu có
        if ($request->hasFile('cv_hidden_info')) {
            // Lưu tệp vào thư mục cv_hidden_infos trong storage, dùng disk public
            $filePath = $request->file('cv_hidden_info')->store('cv_hidden_infos', 'public');

            // Cập nhật đường dẫn của file vào trường cv_hidden_info
            $application->cv_hidden_info = $filePath;
            $application->save();
        }

        // Quay lại trang trước với thông báo thành công
        return redirect()->back()->with('success', 'CV hidden info updated successfully.');
    }




    public function show($id)
    {
        $employer = Employer::with('company')->findOrFail($id);
        $user = Auth::user();

        // Skip ownership check if user has Admin role
        if ($user->roles()->where('id', 1)->exists() || $employer->user_id === $user->id) {
            return view('admin.employers.show', compact('employer'));
        }

        return redirect()->route('employers.index')->with('error', 'You are not authorized to view this employer.');
    }

    public function edit($id)
    {
        $employer = Employer::findOrFail($id);
        $user = Auth::user();

        if ($user->roles()->where('id', 1)->exists() || $employer->user_id === $user->id) {
            return view('admin.employers.edit', compact('employer'));
        }

        return redirect()->route('employers.index')->with('error', 'You are not authorized to edit this employer.');
    }


   public function update(Request $request, $id)
{
    $request->merge([
        'isVerifyCompany' => $request->has('isVerifyCompany') ? 1 : 0,
        'isVerifyEmail' => $request->has('isVerifyEmail') ? 1 : 0,
        'isInfomation' => $request->has('isInfomation') ? 1 : 0,
        'IsBasicnews' => $request->has('IsBasicnews') ? 1 : 0,
        'isUrgentrecruitment' => $request->has('isUrgentrecruitment') ? 1 : 0,
        'IsPrioritize' => $request->has('IsPrioritize') ? 1 : 0,
        'IsRefresheveryhour' => $request->has('IsRefresheveryhour') ? 1 : 0,
        'IsRefresheveryday' => $request->has('IsRefresheveryday') ? 1 : 0,
        'IsDarkredeffect' => $request->has('IsDarkredeffect') ? 1 : 0,
        'IsFramingeffect' => $request->has('IsFramingeffect') ? 1 : 0,
        'IsHoteffect' => $request->has('IsHoteffect') ? 1 : 0,
    ]);

    $request->validate([
        'isVerify' => 'nullable|boolean',
        'isVerify_license' => 'nullable|boolean',
        'isVerifyCompany' => 'nullable|boolean',
        'isInfomation' => 'required|boolean',
        'level' => 'nullable|integer|in:1,2,3',
        // Validation mới
        'IsBasicnews' => 'nullable|boolean',
        'isUrgentrecruitment' => 'nullable|boolean',
        'IsPrioritize' => 'nullable|boolean',
        'IsRefresheveryhour' => 'nullable|boolean',
        'IsRefresheveryday' => 'nullable|boolean',
        'IsDarkredeffect' => 'nullable|boolean',
        'IsFramingeffect' => 'nullable|boolean',
        'IsHoteffect' => 'nullable|boolean',
    ]); 

    $employer = Employer::findOrFail($id);
    $user = Auth::user();
    if ($user->roles()->where('id', 1)->exists() || $employer->user_id === $user->id) {
        $data = $request->only([
            'isVerify',
            'isVerify_license',
            'isVerifyCompany',
            'isInfomation',
            'level',
            // Thêm cột mới
            'IsBasicnews',
            'isUrgentrecruitment',
            'IsPrioritize',
            'IsRefresheveryhour',
            'IsRefresheveryday',
            'IsDarkredeffect',
            'IsFramingeffect',
            'IsHoteffect',
        ]);
        $employer->update($data);

        return redirect()->route('employers.index')->with('success', 'Employer updated successfully.');
    }

    return redirect()->route('employers.index')->with('error', 'You are not authorized to update this employer.');
}



    public function indexCompany()
    {
        $user = Auth::user();
        $userId = $user->id;

        // Nếu người dùng là Admin, hiển thị tất cả công ty; nếu không, chỉ hiển thị công ty thuộc về user_id của nhà tuyển dụng
        if ($user->roles()->where('id', 1)->exists()) {
            $companies = Company::with('employer')->get();
        } else {
            $companies = Company::with('employer')->whereHas('employer', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();
        }

        return view('admin.companies.index', compact('companies'));
    }

    // Hiển thị chi tiết một công ty
    public function showCompany($id)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Lấy thông tin công ty
        $company = Company::with('employer')->findOrFail($id);

        // Kiểm tra nếu người dùng là Admin hoặc là chủ sở hữu của công ty thông qua user_id
        if ($user->roles()->where('id', 1)->exists() || $company->employer->user_id === $userId) {
            return view('admin.companies.show', compact('company'));
        }

        return redirect()->route('companies.index')->with('error', 'Bạn không có quyền xem công ty này.');
    }

    public function company_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['id']);
        $company->status = $data['trangthai_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function top_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['company_id']);
        $company->top = $data['top_choose_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function top_home_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['company_id']);
        $company->top_home = $data['top_home_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function featured_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['company_id']);
        $company->featured = $data['featured_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function employer_choose(Request $request)
    {
        $data = $request->all();
        $employer = Employer::find($data['id']);
        $employer->status = $data['trangthai_val'];
        $employer->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $employer->save();
    }
    public function employer_user_choose(Request $request)
    {
        $employer = Employer::find($request->employer_id);
        $employer->user_id = $request->user_id;
        $employer->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $employer->save();

        return response()->json(['success' => true, 'message' => 'User ID updated successfully.']);
    }


    public function sendEmail(Request $request)
    {
        $to = $request->input('emailEmployer');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $attachment = $request->file('attachment');
        $employerId = $request->input('employer_id');

        $emailReply = new EmailReplyEmployer();
        $emailReply->employer_id = $employerId;
        $emailReply->user_id = auth()->id();
        $emailReply->to = $to;
        $emailReply->subject = $subject;
        $emailReply->message = $message;

        $attachmentPath = null;

        // Lưu file attachment vào thư mục public
        if ($attachment) {
            $attachmentPath = $attachment->store('attachments', 'public');
            $emailReply->attachment = $attachmentPath;
        }

        $emailReply->save();

        // Gửi email
        Mail::to($to)->send(new SendEmailEmployer($subject, $message, $attachmentPath));

        session()->flash('success', 'Gửi email thành công');
        return redirect()->back();
    }
    public function sentEmails()
    {
        // Lấy danh sách email đã gửi cùng với thông tin người dùng và nhà tuyển dụng
        $list = EmailReplyEmployer::with('employer', 'user')->orderBy('id', 'DESC')->get();
        return view('admin.employers.sent_emails', compact('list'));
    }

    public function destroySentEmail($id)
    {
        // Tìm email reply theo id
        $emailReply = EmailReplyEmployer::find($id);

        // Kiểm tra xem email có file đính kèm hay không
        if ($emailReply->attachment) {
            // Xóa file từ thư mục public
            Storage::disk('public')->delete($emailReply->attachment);
        }

        // Xóa dữ liệu trong cơ sở dữ liệu
        $emailReply->delete();

        // Thông báo xóa thành công
        toastr()->info('Thành công', 'Xóa email thành công');
        return redirect()->back();
    }
    public function addCart(Employer $employer)
    {
        $user = Auth::user();

        // Kiểm tra quyền truy cập của người dùng
        if ($user->roles()->where('id', 1)->exists() || $employer->user_id === $user->id) {
            $carts = Cart::all(); // Fetch available carts
            return view('admin.employers.cart_employer', compact('carts', 'employer'));
        }

        return redirect()->route('employers.index')->with('error', 'You are not authorized to add a cart for this employer.');
    }


    // Store the cart-employer relationship with start and end dates
    public function storeCart(Request $request, Employer $employer)
    {
        $user = Auth::user();

        // Kiểm tra quyền truy cập của người dùng
        if ($user->roles()->where('id', 1)->exists() || $employer->user_id === $user->id) {
            $request->validate([
                'cart_id' => 'required|exists:carts,id',
            ]);

            $cart = Cart::find($request->cart_id);
            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addDays($cart->validity);

            $employer->carts()->attach($cart->id, [
                'user_id' => Auth::id(),
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            return redirect()->route('service')->with('success', 'Them dich vu thanh cong !');
        }

        return redirect()->route('employers.index')->with('error', 'You are not authorized to add a cart for this employer.');
    }
    public function listAllCarts()
    {
        $cartEmployers = Cart::with(['employers' => function ($query) {
            $query->withPivot('start_date', 'end_date', 'user_id');
        }])->get();

        return view('admin.employers.list_all_cart_employer', compact('cartEmployers'));
    }
    public function purchasedManage()
    {
        $user = Auth::user();
        $userId = $user->id;
        if ($user->roles()->where('id', 1)->exists()) {
            $purchasedItems = Purchased::with(['employer', 'product'])->orderBy('updated_at', 'DESC')->get();
        } else {
            $purchasedItems = Purchased::with(['employer', 'product'])
                ->whereHas('employer', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->orderBy('updated_at', 'DESC')->get();
        }

        return view('admin.employers.purchased', compact('purchasedItems'));
    }

    public function indexCart(Employer $employer)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Kiểm tra quyền truy cập của người dùng để hiển thị các giỏ hàng
        if ($user->roles()->where('id', 1)->exists() || $employer->user_id === $userId) {
            $cartEmployers = $employer->carts()->withPivot('start_date', 'end_date', 'user_id')->get();
            foreach ($cartEmployers as $cart) {
                $cart->user = User::find($cart->pivot->user_id);
            }

            return view('admin.employers.cart_employer_index', compact('employer', 'cartEmployers'));
        }

        return redirect()->route('admin.employers.index')->with('error', 'Bạn không có quyền xem giỏ hàng này.');
    }


    public function destroyCart(Employer $employer, Cart $cart)
    {
        $employer->carts()->detach($cart->id);

        return redirect()->route('employers.carts.index', $employer->id)->with('success', 'Removed successfully.');
    }
}
