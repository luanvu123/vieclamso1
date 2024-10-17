<?php

// app/Http/Controllers/CertificateController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    // Hiển thị danh sách chứng chỉ
    public function index()
    {
        $candidate = Auth::guard('candidate')->user();
        $certificates = $candidate->certificates;
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.certificates.index', compact('certificates','notifications'));
    }

    // Hiển thị form để thêm chứng chỉ
    public function create()
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.certificates.create',compact('notifications'));
    }

    // Lưu chứng chỉ mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
        ]);

        $candidate = Auth::guard('candidate')->user();
        $certificate = new Certificate($request->all());
        $certificate->candidate_id = $candidate->id;
        $certificate->save();

        return redirect()->route('certificates.index')->with('success', 'Chứng chỉ đã được thêm.');
    }

    // Hiển thị form để chỉnh sửa chứng chỉ
    public function edit(Certificate $certificate)
    {
         $notifications = Notification::where('candidate_id', Auth::guard('candidate')->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.certificates.edit', compact('certificate','notifications'));
    }

    // Cập nhật chứng chỉ trong cơ sở dữ liệu
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
        ]);

        $certificate->update($request->all());

        return redirect()->route('certificates.index')->with('success', 'Chứng chỉ đã được cập nhật.');
    }

    // Xóa chứng chỉ khỏi cơ sở dữ liệu
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success', 'Chứng chỉ đã được xóa.');
    }
}
