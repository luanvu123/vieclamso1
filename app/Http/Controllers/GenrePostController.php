<?php

namespace App\Http\Controllers;

use App\Models\GenrePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GenrePostController extends Controller
{
      public function __construct()
    {
        $this->middleware('permission:genre-post-list|genre-post-create|genre-post-edit|genre-post-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:genre-post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:genre-post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:genre-post-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $genrePosts = GenrePost::all();
        return view('admin.genre_posts.index', compact('genrePosts'));
    }

    public function show($id)
    {
        $genrePost = GenrePost::findOrFail($id);
        return view('admin.genre_posts.show', compact('genrePost'));
    }

    public function create()
    {
        return view('admin.genre_posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'boolean',
            'slug' => 'nullable|string|unique:genre_posts,slug',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'note' => 'nullable|string',
        ]);

        // Handle icon upload
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconPath = $icon->store('genre_posts', 'public');
        }

        GenrePost::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'status' => $request->status,
            'slug' => $request->slug ?? Str::slug($request->title),
            'icon' => $iconPath,
            'note' => $request->note,
        ]);

        return redirect()->route('genre-posts.index');
    }

    public function edit($id)
    {
        $genrePost = GenrePost::findOrFail($id);
        return view('admin.genre_posts.edit', compact('genrePost'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'boolean',
            'slug' => 'nullable|string|unique:genre_posts,slug,' . $id,
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'note' => 'nullable|string',
        ]);

        $genrePost = GenrePost::findOrFail($id);

        // Handle icon upload if a new one is provided
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconPath = $icon->store('genre_posts', 'public');
            $genrePost->icon = $iconPath;
        }

        $genrePost->update([
            'title' => $request->title,
            'status' => $request->status,
            'slug' => $request->slug ?? Str::slug($request->title),
            'note' => $request->note,
        ]);

        return redirect()->route('genre-posts.index');
    }

    public function destroy($id)
    {
        $genrePost = GenrePost::findOrFail($id);
        $genrePost->delete();
        return redirect()->route('genre-posts.index');
    }
}

