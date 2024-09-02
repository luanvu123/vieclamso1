<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employer;
use App\Models\Purchased;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployerManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employer-list|employer-create|employer-edit|employer-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:employer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:employer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:employer-delete', ['only' => ['destroy']]);
        $this->middleware('permission:company-list', ['only' => ['indexCompany']]);
        $this->middleware('permission:company-show', ['only' => ['showCompany']]);
        $this->middleware('permission:company-choose', ['only' => ['company_choose']]);
        $this->middleware('permission:top-choose', ['only' => ['top_choose']]);
        $this->middleware('permission:top-home-choose', ['only' => ['top_home_choose']]);
        $this->middleware('permission:featured-choose', ['only' => ['featured_choose']]);
        $this->middleware('permission:purchased-manage', ['only' => ['purchasedManage']]);
    }
    public function index()
    {
        $employers = Employer::all();
        return view('admin.employers.index', compact('employers'));
    }

    public function show($id)
    {
        $employer = Employer::with('company')->findOrFail($id); // Nạp thông tin công ty liên quan
        return view('admin.employers.show', compact('employer'));
    }


    public function edit($id)
    {
        $employer = Employer::findOrFail($id);
        return view('admin.employers.edit', compact('employer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isVerify' => 'nullable|boolean',
            'isVerify_license' => 'nullable|boolean',
            'isVerifyCompany' => 'nullable|boolean',
            'level' => 'nullable|integer|in:1,2,3',
        ]);

        $employer = Employer::findOrFail($id);

        $data = $request->only([
            'isVerify',
            'isVerify_license',
            'isVerifyCompany',
            'level',
        ]);

        $employer->update($data);

        return redirect()->route('employers.index')->with('success', 'Employer updated successfully.');
    }


    // Hiển thị danh sách các công ty
    public function indexCompany()
    {
        $companies = Company::with('employer')->get();
        return view('admin.companies.index', compact('companies'));
    }

    // Hiển thị chi tiết một công ty
    public function showCompany($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.show', compact('company'));
    }
    public function company_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['id']);
        $company->status = $data['trangthai_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function top_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['id']);
        $company->top = $data['trangthai_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function top_home_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['id']);
        $company->top_home = $data['trangthai_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function featured_choose(Request $request)
    {
        $data = $request->all();
        $company = Company::find($data['id']);
        $company->featured = $data['trangthai_val'];
        $company->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $company->save();
    }
    public function employer_choose(Request $request)
    {
        $data = $request->all();
        $employer = Employer::find($data['id']);
        $employer->status = $data['trangthai_val'];
        $employer->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $employer->save();
    }
    public function purchasedManage()
    {
        $purchasedItems = Purchased::with(['employer', 'product'])->get();

        return view('admin.employers.purchased', compact('purchasedItems'));
    }
}
