@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>CV Templates</h1>
        <a href="{{ route('cv_templates.create') }}" class="btn btn-primary">Create New Template</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table"  id="user-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Image</th>
                    <th>Colors</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cvTemplates as $key => $template)
                    <tr>
                          <td>{{ $key + 1 }}</td>
                        <td>{{ $template->name }}</td>
                        <td>{{ $template->url }}</td>
                        <td>
                            @if ($template->image)
                                <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->name }}"
                                    width="100">
                            @endif
                        </td>
                        <td>
                            @php
                                $colors = json_decode($template->colors);
                            @endphp
                            <div style="display: flex; gap: 5px;">
                                @foreach ($colors as $color)
                                    <div
                                        style="width: 30px; height: 30px; background-color: {{ $color }}; border: 1px solid #ccc; border-radius: 50%;">
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            {{ $template->status ? 'Active' : 'Inactive' }}
                        </td>
                        <td>
                            <a href="{{ route('cv_templates.edit', $template->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('cv_templates.destroy', $template->id) }}" method="POST"
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
@endsection
