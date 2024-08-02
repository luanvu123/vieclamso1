<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'type_feedback_id' => 'required|integer|exists:type_feedback,id',
            'content' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'satisfaction' => 'nullable|integer|min:1|max:5',
        ]);

        // Create a new feedback record
        Feedback::create([
            'type_feedback_id' => $request->input('type_feedback_id'),
            'content' => $request->input('content'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'satisfaction' => $request->input('satisfaction'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Phản hồi của bạn đã được gửi.');
    }
}

