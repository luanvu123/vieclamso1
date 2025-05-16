@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <h2 class="text-primary">Employer: {{ $jobPosting->employer->name }}</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('job-postings-manage.update', $jobPosting->id) }}">
        @csrf
        @method('PUT')

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Job Details</h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label>Your Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $jobPosting->email }}" readonly>
                </div>

                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $jobPosting->title }}" id="slug" onkeyup="ChangeToSlug()">
                </div>

                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $jobPosting->slug }}" id="convert_slug">
                </div>

                <div class="form-group">
                    <label>City</label>
                    <select name="city[]" class="form-control select2" id="cities" multiple>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ in_array($city->id, $selectedCities) ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Job Type</label>
                    <select name="type" class="form-control">
                        <option value="Full-Time" {{ $jobPosting->type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                        <option value="Part-Time" {{ $jobPosting->type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                        <option value="Internship" {{ $jobPosting->type == 'Internship' ? 'selected' : '' }}>Internship</option>
                        <option value="Freelance" {{ $jobPosting->type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category[]" class="form-control select2" id="categories" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Location (optional)</label>
                    <input type="text" name="location" class="form-control" value="{{ $jobPosting->location }}">
                </div>

                <div class="form-group">
                    <label>Salary (optional)</label>
                    <input type="text" name="salary" class="form-control" value="{{ $jobPosting->salary }}">
                </div>

                <div class="form-group">
                    <label>Select Salaries</label>
                    <select name="salaries[]" class="form-control select2" id="salaries" multiple>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}"
                                {{ in_array($salary->id, old('salaries', $jobPosting->salaries->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $salary->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Experience</label>
                    <input type="text" name="experience" class="form-control" value="{{ $jobPosting->experience }}">
                </div>

                <div class="form-group">
                    <label>Rank</label>
                    <input type="text" name="rank" class="form-control" value="{{ $jobPosting->rank }}">
                </div>

                <div class="form-group">
                    <label>Number of Recruits</label>
                    <input type="number" name="number_of_recruits" class="form-control" value="{{ $jobPosting->number_of_recruits }}">
                </div>

                <div class="form-group">
                    <label>Sex</label>
                    <select name="sex" class="form-control">
                        <option value="Male" {{ $jobPosting->sex == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $jobPosting->sex == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Not required" {{ $jobPosting->sex == 'Not required' ? 'selected' : '' }}>Not required</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" disabled>
                        <option value="1" {{ $jobPosting->status == 1 ? 'selected' : '' }}>Visible</option>
                        <option value="2" {{ $jobPosting->status == 2 ? 'selected' : '' }}>Not Visible</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Skills Required</label>
                    <input type="text" name="skills_required" class="form-control" value="{{ $jobPosting->skills_required }}">
                </div>

                <div class="form-group">
                    <label>Area</label>
                    <input type="text" name="area" class="form-control" value="{{ $jobPosting->area }}">
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <input type="text" name="tags" class="form-control" value="{{ $jobPosting->tags }}">
                    <small class="form-text text-muted">Comma separate tags for required skills or technologies.</small>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control summernote" id="description" rows="5">{!! $jobPosting->description !!}</textarea>
                </div>

                <div class="form-group">
                    <label>Application Email / URL</label>
                    <input type="text" name="application_email_url" class="form-control" value="{{ $jobPosting->application_email_url }}">
                </div>

                <div class="form-group">
                    <label>Closing Date</label>
                    <input type="date" name="closing_date" class="form-control" value="{{ $jobPosting->closing_date }}">
                </div>

                <div class="form-group">
                    <label>Company</label>
                    <select name="company_id" class="form-control">
                        <option value="{{ $jobPosting->company->id ?? '' }}">{{ $jobPosting->company->name ?? 'No Company' }}</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Changes <i class="fas fa-save ml-1"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

