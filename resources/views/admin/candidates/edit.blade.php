@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Candidate Status</h1>

        <form action="{{ route('candidates.update', $candidate->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $candidate->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $candidate->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
@endsection
