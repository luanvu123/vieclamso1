<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\CvTemplate;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Imagick;
use PDF;
use Str;

class CVController extends Controller
{
    public function indexCVTemplate()
    {
        // Lấy tất cả các mẫu CV đang hoạt động (status = true)
        $cvTemplates = CvTemplate::where('status', true)->get();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.cv_template_index', compact('cvTemplates', 'notifications'));
    }
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $cvs = $candidate->cvs; // Lấy danh sách CV của candidate
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.quan-ly-cv', compact('candidate', 'cvs', 'notifications'));
    }
    public function uploadCV_index()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.upload-cv', compact('notifications'));
    }
   public function uploadCv(Request $request)
{
    $request->validate([
        'file_upload_cv' => 'required|file|mimes:pdf|max:5120',
    ]);

    $candidate = Auth::guard('candidate')->user();

    if ($request->hasFile('file_upload_cv')) {
        $pdfFile = $request->file('file_upload_cv');
        $pdfPath = $pdfFile->store('cvs', 'public');

        // Chuyển đổi PDF thành hình ảnh
        $imagePath = $this->convertPdfToImage($pdfFile);

        // Lưu vào bảng cvs
        $cv = new Cv();
        $cv->cv_path = $pdfPath;
        $cv->image_path = $imagePath;
        $cv->save();

        // Gắn vào bảng candidate_cv
        $candidate->cvs()->attach($cv->id, [
            'is_primary' => false,
            'is_active' => true,
        ]);
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
    public function show()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        $candidate = auth()->guard('candidate')->user();
        return view('pages.cv_template', compact('candidate', 'notifications'));
    }

    public function downloadPdf(Request $request)
    {
        $candidate = auth()->guard('candidate')->user();
        $bgColor = $request->input('bgcolor', '#ffffff'); // Màu nền từ yêu cầu

        // Lấy thông báo của ứng viên
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Tải PDF với các dữ liệu cần thiết
        $pdf = PDF::loadView('pages.cv_template_pdf', compact('candidate', 'bgColor', 'notifications'));

        return $pdf->download('cv_' . Str::slug($candidate->fullname_candidate) . '.pdf');
    }
    public function downloadCvChrome(Request $request)
    {
        $candidate = auth()->guard('candidate')->user();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = PDF::loadView('pages.cv_chrome_download', compact('candidate', 'notifications'));

        // Optional: Adjust PDF options like page size (A4)
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('cv_chrome_' . Str::slug($candidate->fullname_candidate) . '.pdf');
    }



    public function cvMinimalism()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        $candidate = auth()->guard('candidate')->user();
        return view('pages.cv_minimalism', compact('candidate', 'notifications'));
    }
    public function downloadCvMinimalism()
    {
        $candidate = auth()->guard('candidate')->user();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Tạo view cho PDF
        $pdf = Pdf::loadView('pages.cv_minimalism_download', compact('candidate', 'notifications'))
            ->setPaper('a4', 'portrait')  // Thiết lập khổ giấy A4, trang dọc
            ->setOption('defaultFont', 'DejaVu Sans');  // Font hỗ trợ tiếng Việt
        return $pdf->download('cv_minimalism_' . Str::slug($candidate->fullname_candidate) . '.pdf');
    }
    public function cvOutstanding()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        $candidate = auth()->guard('candidate')->user();
        return view('pages.cv_outstanding', compact('candidate', 'notifications'));
    }
    public function cvChrome()
    {
        $candidate = auth()->guard('candidate')->user();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        // Return the view with candidate data
        return view('pages.cv_chrome', compact('candidate', 'notifications'));
    }
    public function cvGithub()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $candidate = auth()->guard('candidate')->user();

        return view('pages.cv_github', compact('candidate', 'notifications'));
    }
    public function cvFacebook()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $candidate = auth()->guard('candidate')->user();

        return view('pages.cv_facebook', compact('candidate', 'notifications'));
    }
    public function cvCoffee()
    {
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $candidate = auth()->guard('candidate')->user();

        return view('pages.cv_coffee', compact('candidate', 'notifications'));
    }
    public function downloadCvCoffee()
    {
        $candidate = auth()->guard('candidate')->user();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Tạo view cho PDF
        $pdf = Pdf::loadView('pages.cv_coffee_download', compact('candidate', 'notifications'))
            ->setPaper('a4', 'portrait')  // Thiết lập khổ giấy A4, trang dọc
            ->setOption('defaultFont', 'DejaVu Sans');  // Font hỗ trợ tiếng Việt

        // Trả về file PDF để tải xuống
        return $pdf->download('cv_coffee_' . Str::slug($candidate->fullname_candidate) . '.pdf');
    }
    public function  downloadCvOutstanding()
    {
        $candidate = auth()->guard('candidate')->user();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Tạo view cho PDF
        $pdf = Pdf::loadView('pages.cv_outstanding_download', compact('candidate', 'notifications'))
            ->setPaper('a4', 'portrait')  // Thiết lập khổ giấy A4, trang dọc
            ->setOption('defaultFont', 'DejaVu Sans');  // Font hỗ trợ tiếng Việt
        // Optional: Adjust PDF options like page size (A4)
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('cv_outstanding_' . Str::slug($candidate->fullname_candidate) . '.pdf');
    }

    public function  downloadCvGithub()
    {
        $candidate = auth()->guard('candidate')->user();
        $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Tạo view cho PDF
        $pdf = Pdf::loadView('pages.cv_github_download', compact('candidate', 'notifications'))
            ->setPaper('a4', 'portrait')  // Thiết lập khổ giấy A4, trang dọc
            ->setOption('defaultFont', 'DejaVu Sans');  // Font hỗ trợ tiếng Việt
        // Optional: Adjust PDF options like page size (A4)
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('cv_github_' . Str::slug($candidate->fullname_candidate) . '.pdf');
    }
}
