<?php

namespace App\Http\Controllers;

use App\Models\GenrePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    public function create()
    {
        $genrePosts = GenrePost::where('status', 1)->get(); // Lấy tất cả các genre_posts
        return view('admin.posts.create', compact('genrePosts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'genre_post_id' => 'required|exists:genre_posts,id',
            'title' => 'required|string|max:255',
            'detail' => 'nullable|string',
            'website' => 'nullable|url',
            'status' => 'required|boolean',
            'featured' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $postData = $request->only(['genre_post_id', 'title', 'detail', 'website', 'status', 'featured']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('posts', 'public');
            $postData['image'] = $imagePath;
        }

        $postData['user_id'] = Auth::id(); // Set user_id

        Post::create($postData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function edit(Post $post)
    {
        $genrePosts = GenrePost::where('status', 1)->get();
        return view('admin.posts.edit', compact('post', 'genrePosts'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'genre_post_id' => 'required|exists:genre_posts,id',
            'title' => 'required|string|max:255',
            'detail' => 'nullable|string',
            'website' => 'nullable|url',
            'status' => 'required|boolean',
            'featured' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $postData = $request->only(['genre_post_id', 'title', 'detail', 'website', 'status', 'featured']);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($post->image) {
                \Storage::disk('public')->delete($post->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('posts', 'public');
            $postData['image'] = $imagePath;
        }

        $post->update($postData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}