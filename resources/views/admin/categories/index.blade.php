<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Categories</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Manage Categories</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Table -->
        <div class="col-lg-12 col-md-12">
            <div class="notification notice">
                Your categories are shown in the table below.
            </div>

            <div class="dashboard-list-box margin-top-30">
                <div class="dashboard-list-box-content">
                    <!-- Table -->
                    <table class="manage-table responsive-table" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Số lượng công việc</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->image)
                                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" style="width: 30px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $category->job_postings_count }}</td>
                                    <td>
                                        <select id="{{ $category->id }}" class="category_choose">
                                            @if ($category->status == 0)
                                                <option value="1">Show</option>
                                                <option selected value="0">Hidden</option>
                                            @else
                                                <option selected value="1">Show</option>
                                                <option value="0">Hidden</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                        {{-- <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('categories.create') }}" class="button margin-top-30">Add New Category</a>
        </div>
    </div>
@endsection
