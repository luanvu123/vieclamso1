  @extends('dashboard-employer')

  @section('content')
      <!-- Titlebar -->
      <div id="titlebar">
          <div class="row">
              <div class="col-md-12">
                  <h2>Edit Job</h2>
                  <!-- Breadcrumbs -->
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Dashboard</a></li>
                          <li>Edit Job</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12 col-md-12">
              <form action="{{ route('job-postings.update', $jobPosting->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="dashboard-list-box margin-top-0">
                      <h4>Edit Job Details</h4>
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
                                  <input class="search-field" type="text" name="email" value="{{ $jobPosting->email }}"
                                      readonly>
                              </div>
                              <!-- Title -->
                              <div class="form">
                                  <h5>Job Title</h5>
                                  <input class="search-field" type="text" name="title"
                                      value="{{ $jobPosting->title }}"id="slug" onkeyup="ChangeToSlug()">
                              </div>
                              <!-- Slug -->
                              <div class="form">
                                  <h5>Slug</h5>
                                  <input class="search-field" type="text" name="slug"
                                      value="{{ $jobPosting->slug }}"id="convert_slug">
                              </div>
                              <!-- Chọn thành phố -->
                              <div class="form">
                                  <div class="select">
                                      <h5>City</h5>
                                      <select name="city[]" data-placeholder="Choose Cities" class="chosen-select"
                                          multiple>
                                          @foreach ($cities as $city)
                                              <option value="{{ $city->id }}"
                                                  {{ in_array($city->id, $selectedCities) ? 'selected' : '' }}>
                                                  {{ $city->name }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>

                              <!-- Job Type -->
                              <div class="form">
                                  <h5>Job Type</h5>
                                  <select name="type" class="chosen-select-no-single">
                                      <option value="Full-Time" {{ $jobPosting->type == 'Full-Time' ? 'selected' : '' }}>
                                          Full-Time</option>
                                      <option value="Part-Time" {{ $jobPosting->type == 'Part-Time' ? 'selected' : '' }}>
                                          Part-Time</option>
                                      <option value="Internship" {{ $jobPosting->type == 'Internship' ? 'selected' : '' }}>
                                          Internship</option>
                                      <option value="Freelance" {{ $jobPosting->type == 'Freelance' ? 'selected' : '' }}>
                                          Freelance</option>
                                  </select>
                              </div>
                              <!-- Choose Category -->
                              <div class="form">
                                  <div class="select">
                                      <h5>Category</h5>
                                      <select name="category[]" data-placeholder="Choose Categories" class="chosen-select"
                                          multiple>
                                          @foreach ($categories as $category)
                                              <option value="{{ $category->id }}"
                                                  {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                                  {{ $category->name }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <!-- Location -->
                              <div class="form">
                                  <h5>Location <span>(optional)</span></h5>
                                  <input class="search-field" type="text" name="location"
                                      value="{{ $jobPosting->location }}">
                                  <p class="note">Leave this blank if the location is not important</p>
                              </div>
                              <!-- Salary -->
                              <div class="form">
                                  <h5>Salary <span>(optional)</span></h5>
                                  <input type="text" name="salary" value="{{ $jobPosting->salary }}">
                              </div>
                              <div class="form">
                                <div class="select">
                                  <label for="salaries">Select Salaries:</label>
                                  <select name="salaries[]" id="salaries" class="form-control" multiple>
                                      @foreach ($salaries as $salary)
                                          <option value="{{ $salary->id }}"
                                              {{ in_array($salary->id, old('salaries', $jobPosting->salaries->pluck('id')->toArray())) ? 'selected' : '' }}>
                                              {{ $salary->name }}
                                          </option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>

                              <!-- Experience -->
                              <div class="form">
                                  <h5>Experience <span>(optional)</span></h5>
                                  <input type="text" name="experience" value="{{ $jobPosting->experience }}">
                              </div>
                              <!-- Rank -->
                              <div class="form">
                                  <h5>Rank <span>(optional)</span></h5>
                                  <input type="text" name="rank" value="{{ $jobPosting->rank }}">
                              </div>
                              <!-- Number of recruits -->
                              <div class="form">
                                  <h5>Number of recruits <span>(optional)</span></h5>
                                  <input type="number" name="number_of_recruits"
                                      value="{{ $jobPosting->number_of_recruits }}">
                              </div>
                              <!-- Sex -->
                              <div class="form">
                                  <h5>Sex <span>(optional)</span></h5>
                                  <select name="sex" class="chosen-select-no-single">
                                      <option value="Male" {{ $jobPosting->sex == 'Male' ? 'selected' : '' }}>Male
                                      </option>
                                      <option value="Female" {{ $jobPosting->sex == 'Female' ? 'selected' : '' }}>Female
                                      </option>
                                      <option value="Not required"
                                          {{ $jobPosting->sex == 'Not required' ? 'selected' : '' }}>Not required
                                      </option>
                                  </select>
                              </div>
                              <!-- Status -->
                              <div class="form">
                                  <h5>Status</h5>
                                  <select name="status" class="chosen-select-no-single" disabled>
                                      <option value="1" {{ $jobPosting->status == 1 ? 'selected' : '' }}>Visible
                                      </option>
                                      <option value="2" {{ $jobPosting->status == 2 ? 'selected' : '' }}>No Visible
                                      </option>
                                  </select>
                              </div>

                              <!-- Skills required -->
                              <div class="form">
                                  <h5>Skills required <span>(optional)</span></h5>
                                  <input type="text" name="skills_required" value="{{ $jobPosting->skills_required }}">
                              </div>
                              <!-- Area -->
                              <div class="form">
                                  <h5>Area <span>(optional)</span></h5>
                                  <input type="text" name="area" value="{{ $jobPosting->area }}">
                              </div>
                              <!-- Tags -->
                              <div class="form">
                                  <h5>Job Tags <span>(optional)</span></h5>
                                  <input class="search-field" type="text" name="tags"
                                      value="{{ $jobPosting->tags }}">
                                  <p class="note">Comma separate tags, such as required skills or technologies, for this
                                      job.</p>
                              </div>

                              <!-- Description -->
                              <div class="form" style="width: 100%;">
                                  <h5>Description</h5>
                                  <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true">{!! $jobPosting->description !!}</textarea>
                              </div>
                              <!-- Application email/url -->
                              <div class="form">
                                  <h5>Application email / URL</h5>
                                  <input type="text" name="application_email_url"
                                      value="{{ $jobPosting->application_email_url }}">
                              </div>
                              <!-- Closing Date -->
                              <div class="form">
                                  <h5>Closing Date <span>(optional)</span></h5>
                                  <input data-role="date" type="date" name="closing_date"
                                      value="{{ $jobPosting->closing_date }}">
                                  <p class="note">Deadline for new applicants.</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="dashboard-list-box margin-top-30">
                      <div class="form">
                          <h5>Your Company</h5>
                          <select name="company_id" class="chosen-select">
                              <option value="{{ $company->id }}">{{ $company->name }}</option>
                          </select>
                      </div>

                  </div>
                  <button type="submit" class="button margin-top-30">Save Changes <i
                          class="fa fa-arrow-circle-right"></i></button>
              </form>
          </div>
      </div>
  @endsection
