<?php

// app/Http/Controllers/SlugController.php

namespace App\Http\Controllers;

use App\Models\Slug;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlugController extends Controller
{
  public function __construct()
    {
         $this->middleware('permission:slug-choose', ['only' => ['slug_choose']]);
        $this->middleware('permission:slug-list|slug-create|slug-edit|slug-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:slug-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:slug-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:slug-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $slugs = Slug::all();
        return view('admin.slugs.index', compact('slugs'));
    }

    public function create()
    {
        return view('admin.slugs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $slugData = [
            'user_id' => Auth::id(),
            'name' => $request->name,
            'website' => $request->website,
            'status' => $request->has('status') ? 1 : 0,
        ];

        Slug::create($slugData);

        return redirect()->route('slugs.index')->with('success', 'Slug created successfully!');
    }

    public function show(Slug $slug)
    {
        return view('admin.slugs.show', compact('slug'));
    }

    public function edit(Slug $slug)
    {
        return view('admin.slugs.edit', compact('slug'));
    }

    public function update(Request $request, Slug $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $slugData = [
            'name' => $request->name,
            'website' => $request->website,
            'status' => $request->has('status') ? 1 : 0,
        ];

        $slug->update($slugData);

        return redirect()->route('slugs.index')->with('success', 'Slug updated successfully!');
    }

    public function destroy(Slug $slug)
    {
        $slug->delete();

        return redirect()->route('slugs.index')->with('success', 'Slug deleted successfully!');
    }
       public function slug_choose(Request $request)
    {
        $data = $request->all();
        $slug =Slug::find($data['id']);
        $slug->status = $data['trangthai_val'];
        $slug->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $slug->save();
    }
}
