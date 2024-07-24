<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $categories = Category::withCount('jobPostings')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
        'slug' => 'required|string|max:255|unique:categories,slug',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $categoryData = [
        'name' => $request->name,
        'slug' => $request->slug,
        'user_id' => Auth::id(),
    ];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('categories', 'public');
        $categoryData['image'] = $imagePath;
    }

    Category::create($categoryData);

    return redirect()->route('categories.index')->with('success', 'Category created successfully!');
}


    public function edit(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index')->with('error', 'Unauthorized access.');
        }

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        $categoryData = [
           'name' => $request->name,
        'slug' => $request->slug,
        ];

       if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('categories', 'public');
            $categoryData['image'] = $imagePath;
        }


        $category->update($categoryData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index')->with('error', 'Unauthorized access.');
        }

        // Delete image if exists
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
       public function category_choose(Request $request)
    {
        $data = $request->all();
        $category =Category::find($data['id']);
        $category->status = $data['trangthai_val'];
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
    }
}
