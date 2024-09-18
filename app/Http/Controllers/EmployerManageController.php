<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employer;
use App\Models\Purchased;
use Carbon\Carbon;
use App\Mail\SendEmailEmployer;
use App\Models\EmailReplyEmployer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
    }
    public function index()
    {
        $employers = Employer::all();
        return view('admin.employers.index', compact('employers'));
    }

    public function show($id)
    {
        $employer = Employer::with('company')->findOrFail($id); // Nạp thông tin công ty liên quan
        return view('admin.employers.show', compact('employer'));
    }


    public function edit($id)
    {
        $employer = Employer::findOrFail($id);
        return view('admin.employers.edit', compact('employer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isVerify' => 'nullable|boolean',
            'isVerify_license' => 'nullable|boolean',
            'isVerifyCompany' => 'nullable|boolean',
            'level' => 'nullable|integer|in:1,2,3',
        ]);

        $employer = Employer::findOrFail($id);

        $data = $request->only([
            'isVerify',
            'isVerify_license',
            'isVerifyCompany',
            'level',
        ]);

        $employer->update($data);

        return redirect()->route('employers.index')->with('success', 'Employer updated successfully.');
    }


    // Hiển thị danh sách các công ty
    public function indexCompany()
    {
        $companies = Company::with('employer')->get();
        return view('admin.companies.index', compact('companies'));
    }

    // Hiển thị chi tiết một công ty
    public function showCompany($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.show', compact('company'));
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
    public function purchasedManage()
    {
        $purchasedItems = Purchased::with(['employer', 'product'])->orderBy('updated_at', 'DESC')->get();

        return view('admin.employers.purchased', compact('purchasedItems'));
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
}
