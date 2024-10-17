<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Imagick;
class CVController extends Controller
{
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $cvs = $candidate->cvs; // Lấy danh sách CV của candidate
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.quan-ly-cv', compact('candidate', 'cvs','notifications'));
    }
    public function uploadCV_index()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.upload-cv',compact('notifications'));
    }
       public function uploadCv(Request $request)
    {
        $request->validate([
            'file_upload_cv' => 'required|file|mimes:pdf|max:5120', // chỉ chấp nhận file PDF và tối đa 5MB
        ]);

        $candidate = Auth::guard('candidate')->user();

        if ($request->hasFile('file_upload_cv')) {
            $pdfFile = $request->file('file_upload_cv');
            $pdfPath = $pdfFile->store('cvs', 'public');

            // Chuyển đổi PDF thành hình ảnh đầu tiên
            $imagePath = $this->convertPdfToImage($pdfFile);

            // Lưu thông tin CV vào database
            $cv = new Cv();
            $cv->candidate_id = $candidate->id;
            $cv->cv_path = $pdfPath;
            $cv->image_path = $imagePath;
            $cv->save();
        }

        return redirect()->back()->with('success', 'CV đã được tải lên.');
    }

    private function convertPdfToImage($pdfFile)
    {
        $imagick = new Imagick();
        $imagick->readImage($pdfFile->getPathname() . '[0]'); // Chỉ lấy trang đầu tiên
        $imagick->setImageFormat('jpg'); // Đổi định dạng thành JPG

        // Lưu hình ảnh vào thư mục 'thumbnails'
        $imageName = pathinfo($pdfFile->hashName(), PATHINFO_FILENAME) . '.jpg';
        $imagePath = 'thumbnails/' . $imageName;
        Storage::disk('public')->put($imagePath, $imagick->getImageBlob());

        return $imagePath;
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
