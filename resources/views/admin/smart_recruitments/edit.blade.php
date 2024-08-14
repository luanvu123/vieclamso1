@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Recruitment</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('smart_recruitments.update', $smartRecruitment->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $smartRecruitment->title }}"
                    required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                @if ($smartRecruitment->image)
                    <img src="{{ asset('storage/' . $smartRecruitment->image) }}" alt="{{ $smartRecruitment->title }}"
                        width="100">
                @endif
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $smartRecruitment->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" class="form-control" id="url" name="url"
                    value="{{ $smartRecruitment->url }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ $smartRecruitment->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $smartRecruitment->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
