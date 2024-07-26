<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $employer = Auth::guard('employer')->user();
        $companies = $employer->companies; // Assuming a relationship exists
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $employer = Auth::guard('employer')->user();
        return view('companies.create', compact('employer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'scale' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'map' => 'nullable|string|max:255',
            'detail' => 'nullable|string',
            'status' => 'boolean',
            'url' => 'nullable|url',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $companyData = $request->only([
            'name', 'scale', 'address', 'map', 'detail', 'status', 'url', 'website', 'facebook', 'twitter', 'linkedin'
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

        $companyData['employer_id'] = Auth::guard('employer')->id(); // Set employer_id

        Company::create($companyData);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'scale' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'map' => 'nullable|string|max:255',
            'detail' => 'nullable|string',
            'status' => 'boolean',
            'url' => 'nullable|url',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $company = Company::findOrFail($id);

        $companyData = $request->only([
            'name', 'scale', 'address', 'map', 'detail', 'status', 'url', 'website', 'facebook', 'twitter', 'linkedin'
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

        $company->update($companyData);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
