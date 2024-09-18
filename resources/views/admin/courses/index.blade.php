@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                  <div class="table-responsive">
    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Create New Course</a>
    <table class="table" id="user-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Website</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                  <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->website }}</td>
                <td>
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" style="width: 50px;">
                    @endif
                </td>
                <td>{{ $course->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('courses.show', $course) }}"><i class="fa fa-eye"></i> View</a>
                    <a href="{{ route('courses.edit', $course) }}"><i class="fa fa-pencil"></i> Edit</a>
                    {{-- <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
        </div>
    </div>
@endsection

