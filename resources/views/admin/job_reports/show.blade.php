@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Report Details</h1>
    <div class="card">
        <div class="card-header">
            Report ID: {{ $jobReport->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Job Title: {{ $jobReport->jobPosting->title }}</h5>
            <p class="card-text">Nhà tuyển dụng: {{ $jobReport->jobPosting->employer->name }}</p>
            <p class="card-text">Ứng viên: {{ $jobReport->candidate->fullname_candidate }}</p>
            <p class="card-text">Nội dung bc: {{ $jobReport->content }}</p>
            <p class="card-text">Status: {{ $jobReport->status }}</p>
            <a href="{{ route('job-reports.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
