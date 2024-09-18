@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h2>Smart Recruitments</h2>



                    <a href="{{ route('smart_recruitments.create') }}" class="btn btn-primary mb-3">Add New Recruitment</a>

                    <table class="table table-striped" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recruitments as $recruitment)
                                <tr>
                                    <td>{{ $recruitment->id }}</td>
                                    <td>{{ $recruitment->title }}</td>
                                    <td>
                                        @if ($recruitment->image)
                                            <img src="{{ asset('storage/' . $recruitment->image) }}"
                                                alt="{{ $recruitment->title }}" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $recruitment->description }}</td>
                                    <td>{{ $recruitment->url }}</td>
                                    <td>{{ $recruitment->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('smart_recruitments.edit', $recruitment->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('smart_recruitments.destroy', $recruitment->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this recruitment?')">Delete</button>
                                        </form>
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
