<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;
use App\Models\EmailReply;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $to = $request->input('emailContact');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $attachment = $request->file('attachment');
        $contactId = $request->input('contact_id');

        $emailReply = new EmailReply();
        $emailReply->support_id = $contactId;
        $emailReply->user_id = auth()->id();
        $emailReply->to = $to;
        $emailReply->subject = $subject;
        $emailReply->message = $message;
        $attachmentPath = NULL;

        // Lưu file attachment vào thư mục public
        if ($attachment) {
            $attachmentPath = $attachment->store('attachments', 'public');
            $emailReply->attachment = $attachmentPath;
        }

        $emailReply->save();

        // Gửi email
        Mail::to($to)->send(new SendEmail($subject, $message, $attachmentPath));

        session()->flash('success', 'Gửi email thành công');
        return redirect()->back();
    }

    public function sent()
    {
        $list = EmailReply::with('support', 'user')->orderBy('id', 'DESC')->get();
        return view('admin.about.sent', compact('list'));
    }
    public function destroy_sent(string $id)
    {
        $emailReply = EmailReply::find($id);

        // Kiểm tra xem có attachment hay không
        if ($emailReply->attachment) {
            // Xóa file từ thư mục storage
            Storage::disk('public')->delete($emailReply->attachment);
        }

        // Xóa dữ liệu trong cơ sở dữ liệu
        $emailReply->delete();

        toastr()->info('Thành công', 'Xóa liên hệ thành công');
        return redirect()->back();
    }
}
