<?php

namespace App\Http\Controllers;

use App\Models\CvTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CVTemplateController extends Controller
{
    public function index()
    {
        $cvTemplates = CvTemplate::all();
        return view('admin.cv_templates.index', compact('cvTemplates'));
    }

    public function create()
    {
        return view('admin.cv_templates.create');
    }

  public function store(Request $request)
{
    // Validate incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'url' => 'required|url',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image format and size
        'colors' => 'required|array', // Ensure colors is an array
        'status' => 'boolean',
    ]);

    // Store the image in storage
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('cv_templates', 'public'); // Store in cv_templates directory
    }

    // Create a new CV template
    CvTemplate::create([
        'name' => $request->name,
        'url' => $request->url,
        'image' => $imagePath,
        'colors' => json_encode($request->colors), // Encode colors as JSON
        'status' => $request->status,
    ]);

    // Redirect back with a success message
    return redirect()->route('cv_templates.index')->with('success', 'Template created successfully.');
}



    public function show(CvTemplate $cvTemplate)
    {
        return view('admin.cv_templates.show', compact('cvTemplate'));
    }

   public function edit($id)
{
    $template = CvTemplate::findOrFail($id); // Fetch the existing template
    return view('admin.cv_templates.edit', compact('template'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'url' => 'required|url',
        'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048', // Optional for update
        'colors' => 'required|array',
        'status' => 'boolean',
    ]);

    // Find the existing template
    $template = CvTemplate::findOrFail($id);

    // Lưu hình ảnh vào storage nếu có file mới
    $imagePath = $template->image; // Preserve old image path
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        $image = $request->file('image');
        $imagePath = $image->store('cv_templates', 'public'); // Lưu vào thư mục cv_templates
    }

    // Update template information
    $template->update([
        'name' => $request->name,
        'url' => $request->url,
        'image' => $imagePath,
        'colors' => json_encode($request->colors),
        'status' => $request->status,
    ]);

    return redirect()->route('cv_templates.index')->with('success', 'Template updated successfully.');
}


    public function destroy(CvTemplate $cvTemplate)
    {
        $cvTemplate->delete();
        return redirect()->route('cv_templates.index')->with('success', 'Template deleted successfully.');
    }
}
