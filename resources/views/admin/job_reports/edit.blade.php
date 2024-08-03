@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Job Report Status</h1>
    <form action="{{ route('job-reports.update', $jobReport->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ $jobReport->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

