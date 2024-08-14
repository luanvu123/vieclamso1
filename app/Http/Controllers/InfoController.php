<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:info-view', ['only' => ['index']]);
        $this->middleware('permission:info-update', ['only' => ['update']]);
    }
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

            'recruitment_title_1' => 'nullable|string|max:255',
            'recruitment_image_1' => 'nullable|image|max:2048',
            'big_update_title' => 'nullable|string|max:255',
            'big_update_title_1' => 'nullable|string|max:255',
            'big_update_description' => 'nullable|string',
            'big_update_image' => 'nullable|image|max:2048',
            'ai_in_recruitment' => 'nullable|string|max:255',
            'ai_in_recruitment_h1' => 'nullable|string|max:255',
            'ai_in_recruitment_h2' => 'nullable|string',
            'ai_in_recruitment_image' => 'nullable|image|max:2048',
            'core_functions' => 'nullable|string|max:255',
            'smart_recruitment' => 'nullable|string|max:255',
            'smart_recruitment_description' => 'nullable|string',
            'about_us' => 'nullable|string|max:255',
            'about_us_h1' => 'nullable|string',
            'about_us_image' => 'nullable|image|max:2048',
            'bct_url' => 'nullable|url|max:255',
            'bct_image' => 'nullable|image|max:2048',
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

        if ($request->hasFile('recruitment_image_1')) {
            $path = $request->file('recruitment_image_1')->store('images', 'public');
            $info->recruitment_image_1 = $path;
        }

        if ($request->hasFile('big_update_image')) {
            $path = $request->file('big_update_image')->store('images', 'public');
            $info->big_update_image = $path;
        }

        if ($request->hasFile('ai_in_recruitment_image')) {
            $path = $request->file('ai_in_recruitment_image')->store('images', 'public');
            $info->ai_in_recruitment_image = $path;
        }

        if ($request->hasFile('about_us_image')) {
            $path = $request->file('about_us_image')->store('images', 'public');
            $info->about_us_image = $path;
        }

        if ($request->hasFile('bct_image')) {
            $path = $request->file('bct_image')->store('images', 'public');
            $info->bct_image = $path;
        }

        // Update new text fields
        $info->recruitment_title_1 = $request->recruitment_title_1;
        $info->big_update_title = $request->big_update_title;
        $info->big_update_title_1 = $request->big_update_title_1;
        $info->big_update_description = $request->big_update_description;
        $info->ai_in_recruitment = $request->ai_in_recruitment;
        $info->ai_in_recruitment_h1 = $request->ai_in_recruitment_h1;
        $info->ai_in_recruitment_h2 = $request->ai_in_recruitment_h2;
        $info->core_functions = $request->core_functions;
        $info->smart_recruitment = $request->smart_recruitment;
        $info->smart_recruitment_description = $request->smart_recruitment_description;
        $info->about_us = $request->about_us;
        $info->about_us_h1 = $request->about_us_h1;
        $info->bct_url = $request->bct_url;
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
