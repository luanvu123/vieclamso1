@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Footer MXH</h1>
                    <a href="{{ route('public_links.create') }}" class="btn btn-primary">Tạo Footer MXH</a>
                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Admin tạo</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publicLinks as $publicLink)
                                <tr>
                                    <td>{{ $publicLink->id }}</td>
                                    <td>{{ $publicLink->user->name }}</td>
                                    <td>
                                        @if ($publicLink->image)
                                            <img src="{{ asset('storage/' . $publicLink->image) }}" alt="Image"
                                                style="max-width: 100px;">
                                        @endif
                                    </td>
                                    <td><a href="{{ $publicLink->link }}" target="_blank">Link</a></td>
                                    <td>{{ $publicLink->status }}</td>
                                    <td>
                                        <a href="{{ route('public_links.edit', $publicLink->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('public_links.destroy', $publicLink->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
