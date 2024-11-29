@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>CV mẫu</h1>
        <a href="{{ route('cv_templates.create') }}" class="btn btn-primary">Tạo mẫu CV</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table"  id="user-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>URL</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
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
