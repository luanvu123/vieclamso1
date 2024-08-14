@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Recruitment Service</h2>
    <form action="{{ route('recruitment_services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
             <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary2" spellcheck="true"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="position_image">Position Image</label>
            <select class="form-control" id="position_image" name="position_image" required>
                <option value="left">Left</option>
                <option value="right">Right</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
