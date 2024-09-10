@extends('layouts.app')

@section('content')
    <h2 class="title1">Employer: {{ $jobPosting->employer->name }}</h2>
    <div class="grids widget-shadow">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 grid_box1">
                    <label for="email">Email</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->email }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->title }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="type">Type</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->type }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="category">Category</label>
                    <input type="text" class="form-control1"
                        value="{{ $jobPosting->categories->pluck('name')->implode(', ') }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="location">Location</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->location }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->tags }}" readonly>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-12">
                        <textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"style="height: 200px;"
                            readonly>{!! $jobPosting->description !!}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="application_email_url">Application Email/URL</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->application_email_url }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="closing_date">Closing Date</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->closing_date }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="salary">Salary công việc</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->salary }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="salary">Salary(hệ thống)</label>
                    <input type="text" class="form-control1"
                        value="{{ $jobPosting->salaries->pluck('name')->implode(', ') }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="place">Place</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->place }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="experience">Experience</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->experience }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="rank">Rank</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->rank }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="number_of_recruits">Number of Recruits</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->number_of_recruits }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="sex">Sex</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->sex }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="skills_required">Skills Required</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->skills_required }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="area">Area</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->area }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control1" value="{{ $jobPosting->slug }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control1"
                        value="{{ $jobPosting->cities->pluck('name')->implode(', ') }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
