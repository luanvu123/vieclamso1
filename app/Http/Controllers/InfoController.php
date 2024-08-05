<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::first();
        return view('admin.info.index', compact('info'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'business_license_number' => 'required|string|max:255',
            'service_license_number' => 'required|string|max:255',
            'headquarter_address' => 'required|string|max:255',
            'branch_address' => 'required|string|max:255',
            'qr_code_image' => 'nullable|image|max:2048',
            'link_website' => 'nullable|string|max:255',
            'name_website' => 'nullable|string|max:255',
            'copyright' => 'nullable|string|max:255',
            'supporter' => 'nullable|image|max:2048',
            'name_supporter' => 'nullable|string|max:255',
            'title_supporter' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'logo_google_for_startup' => 'nullable|image|max:2048',
            'logo_dmca_com' => 'nullable|image|max:2048',
            'image_section' => 'nullable|image|max:2048',
            'title_section' => 'nullable|string|max:255',
            'title2_section' => 'nullable|string|max:255',
            'title3_section' => 'nullable|string|max:255',
            'image_qr_code_download' => 'nullable|image|max:2048',
            'link_appstore' => 'nullable|url|max:255',
            'image_appstore' => 'nullable|image|max:2048',
            'link_googleplay' => 'nullable|url|max:255',
            'image_googleplay' => 'nullable|image|max:2048',
        ]);

        $info = Info::findOrFail($id);
        $info->company_name = $request->company_name;
        $info->business_license_number = $request->business_license_number;
        $info->service_license_number = $request->service_license_number;
        $info->headquarter_address = $request->headquarter_address;
        $info->branch_address = $request->branch_address;

        // Xử lý các tệp hình ảnh
        if ($request->hasFile('qr_code_image')) {
            $path = $request->file('qr_code_image')->store('images', 'public');
            $info->qr_code_image = $path;
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logo', 'public');
            $info->logo = $path;
        }

        if ($request->hasFile('logo_google_for_startup')) {
            $path = $request->file('logo_google_for_startup')->store('logo', 'public');
            $info->logo_google_for_startup = $path;
        }

        if ($request->hasFile('logo_dmca_com')) {
            $path = $request->file('logo_dmca_com')->store('logo', 'public');
            $info->logo_dmca_com = $path;
        }

        if ($request->hasFile('supporter')) {
            $path = $request->file('supporter')->store('logo', 'public');
            $info->supporter = $path;
        }

        if ($request->hasFile('image_section')) {
            $path = $request->file('image_section')->store('images', 'public');
            $info->image_section = $path;
        }

        if ($request->hasFile('image_qr_code_download')) {
            $path = $request->file('image_qr_code_download')->store('images', 'public');
            $info->image_qr_code_download = $path;
        }

        if ($request->hasFile('image_appstore')) {
            $path = $request->file('image_appstore')->store('images', 'public');
            $info->image_appstore = $path;
        }

        if ($request->hasFile('image_googleplay')) {
            $path = $request->file('image_googleplay')->store('images', 'public');
            $info->image_googleplay = $path;
        }

        // Cập nhật các trường khác
        $info->link_website = $request->link_website;
        $info->name_website = $request->name_website;
        $info->copyright = $request->copyright;
        $info->name_supporter = $request->name_supporter;
        $info->title_supporter = $request->title_supporter;
        $info->title_section = $request->title_section;
        $info->title2_section = $request->title2_section;
        $info->title3_section = $request->title3_section;
        $info->link_appstore = $request->link_appstore;
        $info->link_googleplay = $request->link_googleplay;

        $info->save();

        return redirect()->back()->with('success', 'Footer information updated successfully!');
    }
}
