<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\TypeFeedback;
use Carbon\Carbon;

class TypeFeedbackController extends Controller
{
    public function index()
    {
        $typeFeedbacks = TypeFeedback::all();
        return view('admin.type_feedback.index', compact('typeFeedbacks'));
    }

    public function create()
    {
        return view('admin.type_feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TypeFeedback::create([
            'name' => $request->name,
        ]);

        return redirect()->route('type_feedback.index')->with('success', 'Type feedback created successfully');
    }

    public function show($id)
    {
        $typeFeedback = TypeFeedback::findOrFail($id);
        return view('admin.type_feedback.show', compact('typeFeedback'));
    }

    public function edit($id)
    {
        $typeFeedback = TypeFeedback::findOrFail($id);
        return view('admin.type_feedback.edit', compact('typeFeedback'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeFeedback = TypeFeedback::findOrFail($id);
        $typeFeedback->update([
            'name' => $request->name,
        ]);

        return redirect()->route('type_feedback.index')->with('success', 'Type feedback updated successfully');
    }

    public function destroy($id)
    {
        $typeFeedback = TypeFeedback::findOrFail($id);
        $typeFeedback->delete();

        return redirect()->route('type_feedback.index')->with('success', 'Type feedback deleted successfully');
    }

    public function indexList()
    {
        // Retrieve all feedbacks
        $feedbacks = Feedback::all();

        // Pass feedbacks to the view
        return view('admin.type_feedback.list_feedbacks', compact('feedbacks'));
    }
     public function showList($id)
    {
        $feedback = Feedback::with('typeFeedback')->findOrFail($id);
        return view('admin.type_feedback.show_feedback', compact('feedback'));
    }

    public function destroyList($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedbacks.index.list')->with('success', 'Feedback deleted successfully.');
    }
      public function feedback_choose(Request $request)
    {
        $data = $request->all();
        $feedback =Feedback::find($data['id']);
        $feedback->status = $data['trangthai_val'];
        $feedback->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $feedback->save();
    }
}
