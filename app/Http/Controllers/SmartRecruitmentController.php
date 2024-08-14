<?php
namespace App\Http\Controllers;

use App\Models\SmartRecruitment;
use Illuminate\Http\Request;

class SmartRecruitmentController extends Controller
{
    public function index()
    {
        $recruitments = SmartRecruitment::all();
        return view('admin.smart_recruitments.index', compact('recruitments'));
    }

    public function create()
    {
        return view('admin.smart_recruitments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string',
             'url' => 'nullable|url|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        SmartRecruitment::create($data);

        return redirect()->route('smart_recruitments.index')->with('success', 'Smart Recruitment created successfully.');
    }

    public function edit(SmartRecruitment $smartRecruitment)
    {
        return view('admin.smart_recruitments.edit', compact('smartRecruitment'));
    }

    public function update(Request $request, SmartRecruitment $smartRecruitment)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string',
             'url' => 'nullable|url|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $smartRecruitment->update($data);

        return redirect()->route('smart_recruitments.index')->with('success', 'Smart Recruitment updated successfully.');
    }

    public function destroy(SmartRecruitment $smartRecruitment)
    {
        $smartRecruitment->delete();
        return redirect()->route('smart_recruitments.index')->with('success', 'Smart Recruitment deleted successfully.');
    }
}
