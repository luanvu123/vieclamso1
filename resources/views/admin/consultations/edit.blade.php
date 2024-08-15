

@extends('layouts.app')

@section('title', 'Edit Consultation Status')

@section('content')
<div class="container">
    <h1>Edit Consultation Status</h1>
    <form action="{{ route('consultations.update', $consultation) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $consultation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $consultation->status === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $consultation->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Status</button>
        </div>
    </form>
</div>
@endsection

