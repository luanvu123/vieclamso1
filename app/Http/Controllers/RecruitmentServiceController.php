<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentService;
use Illuminate\Http\Request;

class RecruitmentServiceController extends Controller
{
    public function index()
    {
        $services = RecruitmentService::all();
        return view('admin.recruitment_services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.recruitment_services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
            'position_image' => 'required|in:left,right',
        ]);

        $service = new RecruitmentService($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $service->image = $path;
        }

        $service->save();

        return redirect()->route('recruitment_services.index')->with('success', 'Service created successfully!');
    }

    public function edit($id)
    {
        $service = RecruitmentService::findOrFail($id);
        return view('admin.recruitment_services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
            'position_image' => 'required|in:left,right',
        ]);

        $service = RecruitmentService::findOrFail($id);
        $service->fill($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $service->image = $path;
        }

        $service->save();

        return redirect()->route('recruitment_services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy($id)
    {
        $service = RecruitmentService::findOrFail($id);
        $service->delete();

        return redirect()->route('recruitment_services.index')->with('success', 'Service deleted successfully!');
    }
}
