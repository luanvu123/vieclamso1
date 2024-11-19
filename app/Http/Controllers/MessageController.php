<?php
// app/Http/Controllers/MessageController.php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Employer;
use App\Models\Message;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'employer_id' => 'required|exists:employers,id',
            'company_id' => 'required|exists:companies,id',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->candidate_id = Auth::guard('candidate')->id();
        $message->employer_id = $request->employer_id;
        $message->company_id = $request->company_id;
        $message->message = $request->message;
        $message->sender_type = 'candidate';
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully.');
    }

   public function receiveMessages()
{
    $employer_id = Auth::guard('employer')->id();
    $candidates = Candidate::whereHas('messages', function ($query) use ($employer_id) {
        $query->where('employer_id', $employer_id);
    })->get();

    foreach ($candidates as $candidate) {
        $candidate->latestMessage = $candidate->messages()
            ->where('employer_id', $employer_id)
            ->latest()
            ->first();
    }

    $candidates = $candidates->sortByDesc(function ($candidate) {
        return $candidate->latestMessage ? $candidate->latestMessage->created_at : null;
    });

    $messages = Message::where('employer_id', $employer_id)->get();
    return view('job_postings.messages', compact('candidates', 'messages'));
}




    public function showMessages(Candidate $candidate)
    {
        $employer_id = Auth::guard('employer')->id();
        $messages = Message::where('employer_id', $employer_id)
            ->where('candidate_id', $candidate->id)
            ->with('candidate', 'employer')
            ->get();
        foreach ($messages as $message) {
            if (!$message->is_read) {
                $message->markAsRead();
            }
        }

        return view('job_postings.messages_show', compact('messages', 'candidate'));
    }

    public function sendReply(Request $request, Candidate $candidate)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = new Message();
        $message->candidate_id = $candidate->id;
        $message->employer_id = Auth::guard('employer')->id();
        $message->message = $request->message;
        $message->sender_type = 'employer';
        $message->save();

        return redirect()->route('messages.show', $candidate)->with('success', 'Message sent successfully.');
    }

    public function receiveCandidateMessages()
    {
        $candidate_id = Auth::guard('candidate')->id();
        $employers = Employer::whereHas('messages', function ($query) use ($candidate_id) {
            $query->where('candidate_id', $candidate_id);
        })->get();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.messages_candidate', compact('employers', 'notifications'));
    }

    public function showCandidateMessages(Employer $employer)
    {
        $candidate_id = Auth::guard('candidate')->id();
        $messages = Message::where('candidate_id', $candidate_id)
            ->where('employer_id', $employer->id)
            ->with('candidate', 'employer')
            ->get();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.messages_show_candidate', compact('messages', 'employer','notifications'));
    }

    public function sendCandidateReply(Request $request, Employer $employer)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = new Message();
        $message->candidate_id = Auth::guard('candidate')->id();
        $message->employer_id = $employer->id;
        $message->message = $request->message;
        $message->sender_type = 'candidate';
        $message->save();

        return redirect()->route('messages.show.candidate', $employer)->with('success', 'Message sent successfully.');
    }
}
