@extends('dashboard-employer')

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Job</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Add Job</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="{{ route('job-postings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="dashboard-list-box margin-top-0">
                    <h4>Job Details</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="dashboard-list-box-content">
                        <div class="submit-page">

                            <div class="form">
                                <h5>Your Email</h5>
                                <input class="search-field" type="text" name="email" value="{{ $email }}"
                                    readonly>
                            </div>
                            <!-- Job Title -->
                            <div class="form">
                                <h5>Job Title</h5>
                                <input class="search-field" type="text" name="title" id="slug"
                                    onkeyup="ChangeToSlug()" placeholder="">
                            </div>
                            <!-- Slug -->
                            <div class="form">
                                <h5>Slug</h5>
                                <input class="search-field" type="text" name="slug" id="convert_slug"
                                    placeholder="Đường dẫn">
                            </div>
                            <!-- Job Type -->
                            <div class="form">
                                <h5>Job Type</h5>
                                <select name="type" class="chosen-select-no-single">
                                    <option value="Full-Time">Full-Time</option>
                                    <option value="Part-Time">Part-Time</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Freelance">Freelance</option>
                                </select>
                            </div>
                            <!-- Choose City -->
                            <div class="form">
                                <div class="select">
                                    <h5>City</h5>
                                    <select name="city[]" class="chosen-select" multiple>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Categories -->
                            <div class="form">
                                <div class="select">
                                    <h5>Category</h5>
                                    <select name="category[]" class="chosen-select" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Location -->
                            <div class="form">
                                <h5>Location <span>(optional)</span></h5>
                                <input class="search-field" type="text" name="location" placeholder="e.g. London">
                                <p class="note">Leave this blank if the location is not important</p>
                            </div>
                            <!-- Salary -->
                            <div class="form">
                                <h5>Salary <span>(optional)</span></h5>
                                <input type="text" name="salary" placeholder="Enter salary">
                            </div>

                            <div class="form">
                                <div class="select">
                                <label for="salaries">Select Salaries(Mức lương để Vieclamso1 thống kê hệ thống)<span class="text-danger">*</span></label>
                                <select name="salaries[]" id="salaries" class="form-control" multiple required>
                                    @foreach ($salaries as $salary)
                                        <option value="{{ $salary->id }}">
                                            {{ $salary->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('salaries')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>


                            <!-- Experience -->
                            <div class="form">
                                <h5>Experience <span>(optional)</span></h5>
                                <input type="text" name="experience" placeholder="Enter experience required">
                            </div>
                            <!-- Rank -->
                            <div class="form">
                                <h5>Rank <span>(optional)</span></h5>
                                <input type="text" name="rank" placeholder="Enter rank">
                            </div>
                            <!-- Number of recruits -->
                            <div class="form">
                                <h5>Number of recruits <span>(optional)</span></h5>
                                <input type="number" name="number_of_recruits" placeholder="Enter number of recruits">
                            </div>
                            <!-- Sex -->
                            <div class="form">
                                <h5>Sex <span>(optional)</span></h5>
                                <select name="sex" class="chosen-select-no-single">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Not required">Not required</option>
                                </select>
                            </div>
                            <!-- Skills required -->
                            <div class="form">
                                <h5>Skills required <span>(optional)</span></h5>
                                <input type="text" name="skills_required" placeholder="Enter required skills">
                            </div>
                            <!-- Area -->
                            <div class="form">
                                <h5>Area <span>(optional)</span></h5>
                                <input type="text" name="area" placeholder="Enter area">
                            </div>
                            <!-- Tags -->
                            <div class="form">
                                <h5>Job Tags <span>(optional)</span></h5>
                                <input class="search-field" type="text" name="tags"
                                    placeholder="e.g. PHP, Social Media, Management">
                                <p class="note">Comma separate tags, such as required skills or technologies, for this
                                    job.</p>
                            </div>
                            <!-- Description -->
                            <div class="form" style="width: 100%;">
                                <h5>Description</h5>
                                <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                            </div>
                            <!-- Application email/url -->
                            <div class="form">
                                <h5>Application email / URL</h5>
                                <input type="text" name="application_email_url"
                                    placeholder="Enter an email address or website URL">
                            </div>
                            <!-- Closing Date -->
                            <div class="form">
                                <h5>Closing Date <span>(optional)</span></h5>
                                <input data-role="date" type="date" name="closing_date" placeholder="yyyy-mm-dd">
                                <p class="note">Deadline for new applicants.</p>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="dashboard-list-box margin-top-30">
                    <h4>Choose Your Company</h4>
                    <div class="form">
                        @if ($company)
                            <select name="company_id" class="chosen-select">
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            </select>
                        @else
                            <p>Bạn chưa tạo công ty nào.</p>
                            <a href="{{ route('companies.create') }}" class="btn btn-primary">Tạo công ty mới</a>
                        @endif
                    </div>
                </div>
                <button type="submit" class="button margin-top-30">Submit <i
                        class="fa fa-arrow-circle-right"></i></button>
            </form>
        </div>
    </div>
@endsection
