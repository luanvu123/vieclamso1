@extends('dashboard-employer')

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Resumes</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Manage Resumes</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Table -->
        <div class="col-lg-12 col-md-12">
            <div class="notification notice">
                Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.
            </div>

            <div class="dashboard-list-box margin-top-30">
                <div class="dashboard-list-box-content">
                    <!-- Table -->
                    <table class="manage-table responsive-table">
                        <tr>
                            <th><i class="fa fa-file-text"></i> Title</th>
                            <th><i class="fa fa-check-square-o"></i> Views</th>
                            <th><i class="fa fa-calendar"></i> Date Posted</th>
                            <th><i class="fa fa-calendar"></i> Date Expires</th>
                            <th><i class="fa fa-user"></i> Applications</th>
                            <th></th>
                        </tr>

                        @foreach ($jobPostings as $jobPosting)
                            <tr>
                                <td class="title">
                                    <a href="{{ route('job-postings.show', $jobPosting->id) }}">
                                        {{ $jobPosting->title }}
                                    </a>
                                </td>
                                <td class="centered">{{$jobPosting->views}} view</td>
                                <td>{{ $jobPosting->created_at->format('F d, Y') }}</td>
                                <td>{{ $jobPosting->closing_date ? \Carbon\Carbon::parse($jobPosting->closing_date)->format('F d, Y') : '-' }}
                                </td>
                                <td class="centered">
                                    <a href="{{ route('job-postings.show', $jobPosting->id) }}" class="button">
                                        Show ({{ $jobPosting->applications ? $jobPosting->applications->count() : 0 }})
                                    </a>
                                </td>
                                <td class="action">
                                    <a href="{{ route('job-postings.edit', $jobPosting->id) }}"><i class="fa fa-pencil"></i>
                                        Edit</a>
                                    <form action="{{ route('job-postings.destroy', $jobPosting->id) }}" method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this job posting?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button"
                                            style="background: none; border: none; color: red; cursor: pointer;">
                                            <i class="fa fa-remove"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <a href="{{ route('job-postings.create') }}" class="button margin-top-30">Add New Listing</a>
        </div>
    </div>
@endsection
