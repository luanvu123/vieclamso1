<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function index(){
         $candidate = Auth::guard('candidate')->user();
        $cvs = $candidate->cvs; // Lấy danh sách CV của candidate
        return view('pages.quan-ly-cv', compact('candidate', 'cvs'));
    }
     public function uploadCV_index()
    {
         return view('pages.upload-cv');
    }
    public function uploadCv(Request $request)
    {
        $request->validate([
            'file_upload_cv' => 'required|file|mimes:doc,docx,pdf|max:5120', // 5MB
        ]);

        $candidate = Auth::guard('candidate')->user();

        if ($request->hasFile('file_upload_cv')) {
            $path = $request->file('file_upload_cv')->store('cvs', 'public');

            $cv = new Cv();
            $cv->candidate_id = $candidate->id;
            $cv->cv_path = $path;
            $cv->save();
        }

        return redirect()->back()->with('success', 'CV đã được tải lên.');
    }

   public function updateCvName(Request $request)
    {
        $request->validate([
            'cv_id' => 'required|exists:cvs,id',
            'cv_name' => 'required|string|max:255',
        ]);

        $cv = Cv::find($request->cv_id);
        $cv->cv_name = $request->cv_name;
        $cv->updated_at = now();
        $cv->save();

        return redirect()->back()->with('success', 'Tên CV đã được cập nhật.');
    }
    public function delete(Request $request)
    {
        $request->validate([
            'cv_id' => 'required|exists:cvs,id',
        ]);

        $cv = Cv::find($request->cv_id);

        // Xóa tệp CV khỏi storage
        if (Storage::disk('public')->exists($cv->cv_path)) {
            Storage::disk('public')->delete($cv->cv_path);
        }

        // Xóa CV khỏi database
        $cv->delete();

        return redirect()->back()->with('success', 'CV đã được xóa.');
    }
}
