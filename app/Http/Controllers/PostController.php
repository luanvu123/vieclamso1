<?php

namespace App\Http\Controllers;

use App\Models\GenrePost;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
        public function __construct()
    {
          $this->middleware('permission:post-choose', ['only' => ['post_choose']]);
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $posts = Post::with(['user', 'genrePost'])->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genrePosts = GenrePost::where('status', 1)->get();
        return view('admin.posts.create', compact('genrePosts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre_post_id' => 'required|exists:genre_posts,id',
            'detail' => 'nullable|string',
            'content' => 'nullable|string',
            'website' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'featured' => 'boolean'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        }

        Post::create($data);

        return redirect()->route('posts.index')
                         ->with('success', 'Bài viết đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['user', 'genrePost']);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $genrePosts = GenrePost::where('status', 1)->get();
        return view('admin.posts.edit', compact('post', 'genrePosts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre_post_id' => 'required|exists:genre_posts,id',
            'detail' => 'nullable|string',
            'content' => 'nullable|string',
            'website' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'featured' => 'boolean'
        ]);

        $data = $request->all();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && \Storage::disk('public')->exists($post->image)) {
                \Storage::disk('public')->delete($post->image);
            }

            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('posts.index')
                         ->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Delete image if exists
        if ($post->image && \Storage::disk('public')->exists($post->image)) {
            \Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Bài viết đã được xóa thành công.');
    }
     public function post_choose(Request $request)
    {
        $data = $request->all();
        $post =Post::find($data['id']);
        $post->status = $data['trangthai_val'];
        $post->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $post->save();
    }
}
