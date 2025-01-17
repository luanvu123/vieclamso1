@extends('layouts.app')

@section('content')
  <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                  <div class="table-responsive">

                <h1>Danh sách Bài viết</h1>
                <style>
                    .table-container {
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;
                        /* Hỗ trợ cuộn mượt trên thiết bị cảm ứng */
                    }

                    .table td.detail {
                        max-width: 200px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
                </style>
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Tạo Bài viết</a>


                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="detail">Tiêu đề</th>
                                <th class="detail">Chi tiết</th>
                                <th class="detail">Website</th>
                                <th class="detail">Status</th>
                                <th>Bài viết nổi bật?</th>
                                <th class="detail">Cẩm nang nghề nghiệp</th>
                                <th>Image</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td class="detail">{{ $post->title }}</td>
                                    <td class="detail">{{ $post->detail }}</td>
                                    <td class="detail">{{ $post->website }}</td>
                                   <td>
                            <select id="{{ $post->id }}" class="post_choose">
                                @if ($post->status == 0)
                                    <option value="1">Show</option>
                                    <option selected value="0">Hidden</option>
                                @else
                                    <option selected value="1">Show</option>
                                    <option value="0">Hidden</option>
                                @endif
                            </select>
                        </td>
                                    <td>{{ $post->featured ? 'Yes' : 'No' }}</td>
                                    <td class="detail">{{ $post->genrePost->title ?? 'N/A' }}</td>
                                    <td>
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                                width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">No posts available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
