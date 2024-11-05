<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Mail\SendEmailCandidate;
use App\Models\EmailReplyCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CandidateManageController extends Controller
{
   public function __construct()
    {
        $this->middleware('permission:candidate-list|candidate-create|candidate-edit|candidate-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:candidate-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:candidate-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:candidate-delete', ['only' => ['destroy']]);
        $this->middleware('permission:candidate-sentEmails-view', ['only' => ['sentEmails']]);
        $this->middleware('permission:candidate-sentEmails-delete', ['only' => ['destroySentEmail']]);
    }
    public function index()
    {
        $candidates = Candidate::with('cvs')->get();
        return view('admin.candidates.index', compact('candidates'));
    }
  public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('admin.candidates.edit', compact('candidate'));
    }

    // Update candidate status
   public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:0,1',
        // other validation rules
    ]);

    $candidate = Candidate::findOrFail($id);
    $candidate->status = (int) $request->input('status');
    // Update other fields
    $candidate->save();

    return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
}

    public function show($id)
    {
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

        return view('admin.candidates.show', compact('candidate'));
    }
   public function sendEmail(Request $request)
    {
        $to = $request->input('emailCandidate');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $attachment = $request->file('attachment');
        $candidateId = $request->input('candidate_id');

        $emailReply = new EmailReplyCandidate();
        $emailReply->candidate_id = $candidateId;
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
        Mail::to($to)->send(new SendEmailCandidate($subject, $message, $attachmentPath));

        session()->flash('success', 'Gửi email thành công');
        return redirect()->back();
    }
     public function sentEmails()
    {
        // Lấy danh sách email đã gửi cùng với thông tin người dùng và ứng viên
        $list = EmailReplyCandidate::with('candidate', 'user')->orderBy('id', 'DESC')->get();
        return view('admin.candidates.sent_emails', compact('list'));
    }

    public function destroySentEmail($id)
    {
        // Tìm email reply theo id
        $emailReply = EmailReplyCandidate::find($id);

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
