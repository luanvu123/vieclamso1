<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $employer = Auth::guard('employer')->user();
         $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $company = $employer->company; // Lấy công ty duy nhất của employer

        return view('companies.index', compact('company', 'categories', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function create()
    {
        $employer = Auth::guard('employer')->user();
 $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        // Kiểm tra nếu employer đã có công ty
        if ($employer->company) {
            return redirect()->route('companies.index')
                ->with('error', 'You can only create one company.');
        }

        $categories = Category::where('status', 1)->get();
        return view('companies.create', compact('employer', 'categories', 'recentMessagesCount', 'recentApplicationsCount'));
    }

    public function store(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        // Kiểm tra nếu employer đã có công ty
        if ($employer->company) {
            return redirect()->route('companies.index')
                ->with('error', 'You can only create one company.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'scale' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'map' => 'nullable|string',
            'detail' => 'nullable|string',
            'url' => 'nullable|url',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'mst' => 'nullable|string|max:255',
        ]);

        $companyData = $request->only([
            'name',
            'scale',
            'address',
            'map',
            'detail',
            'url',
            'website',
            'facebook',
            'twitter',
            'linkedin',
            'mst'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('logo_company', 'public');
            $companyData['image'] = $imagePath;
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logo_company', 'public');
            $companyData['logo'] = $logoPath;
        }

        $companyData['employer_id'] = $employer->id; // Set employer_id
        $companyData['slug'] = Str::slug($request->name); // Tạo slug từ tên công ty
        $companyData['top'] = 0; // Đặt giá trị mặc định cho cột top
        $company = Company::create($companyData);

        if ($request->has('category')) {
            $company->categories()->sync($request->category);
        }

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }


    public function show($id)
    {
        $company = Company::findOrFail($id);
         $employer = Auth::guard('employer')->user();
 $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        return view('companies.show', compact('company', 'recentMessagesCount', 'recentApplicationsCount'));
    }

    public function edit($id)
    {
         $employer = Auth::guard('employer')->user();
 $recentMessagesCount = $employer->messages()
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $recentApplicationsCount = Application::whereHas('jobPosting', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(5))
            ->count();
        $company = Company::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $selectedCategories = $company->categories->pluck('id')->toArray();
        return view('companies.edit', compact('company', 'categories', 'selectedCategories', 'recentMessagesCount', 'recentApplicationsCount'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'scale' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'map' => 'nullable',
            'detail' => 'nullable|string',
            'url' => 'nullable|url',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'mst' => 'nullable|string|max:255',
        ]);

        $company = Company::findOrFail($id);

        $companyData = $request->only([
            'name',
            'scale',
            'address',
            'map',
            'detail',
            'url',
            'website',
            'facebook',
            'twitter',
            'linkedin',
            'mst'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('logo_company', 'public');
            $companyData['image'] = $imagePath;
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logo_company', 'public');
            $companyData['logo'] = $logoPath;
        }
        $companyData['slug'] = Str::slug($request->name);
        $company->update($companyData);
        if ($request->has('category')) {
            $company->categories()->sync($request->category);
        }

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
