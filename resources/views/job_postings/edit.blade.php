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
                                  <h5>City</h5>
                                  <select name="city[]" id="city" data-placeholder="Choose Cities"
                                      class="chosen-select" multiple>
                                      @foreach ($cities as $city)
                                          <option value="{{ $city }}"
                                              {{ in_array($city, $selectedCities) ? 'selected' : '' }}>{{ $city }}
                                          </option>
                                      @endforeach
                                  </select>
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
                                      <select name="category[]" class="chosen-select" multiple>
                                          @php
                                              $selectedCategories = explode(', ', $jobPosting->category);
                                          @endphp
                                          <option value="Web Developers"
                                              {{ in_array('Web Developers', $selectedCategories) ? 'selected' : '' }}>Web
                                              Developers</option>
                                          <option value="Mobile Developers"
                                              {{ in_array('Mobile Developers', $selectedCategories) ? 'selected' : '' }}>
                                              Mobile Developers</option>
                                          <option value="Designers & Creatives"
                                              {{ in_array('Designers & Creatives', $selectedCategories) ? 'selected' : '' }}>
                                              Designers & Creatives</option>
                                          <option value="Writers"
                                              {{ in_array('Writers', $selectedCategories) ? 'selected' : '' }}>Writers
                                          </option>
                                          <option value="Virtual Assistants"
                                              {{ in_array('Virtual Assistants', $selectedCategories) ? 'selected' : '' }}>
                                              Virtual Assistants</option>
                                          <option value="Customer Service Agents"
                                              {{ in_array('Customer Service Agents', $selectedCategories) ? 'selected' : '' }}>
                                              Customer Service Agents</option>
                                          <option value="Sales & Marketing Experts"
                                              {{ in_array('Sales & Marketing Experts', $selectedCategories) ? 'selected' : '' }}>
                                              Sales & Marketing Experts</option>
                                          <option value="Accountants & Consultants"
                                              {{ in_array('Accountants & Consultants', $selectedCategories) ? 'selected' : '' }}>
                                              Accountants & Consultants</option>
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
                                      <option value="Other" {{ $jobPosting->sex == 'Other' ? 'selected' : '' }}>Other
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
                                  <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true">{{ $jobPosting->description }}</textarea>
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
                      <h4>Company Details</h4>
                      <div class="dashboard-list-box-content">
                          <div class="submit-page">
                              <!-- Company Name -->
                              <div class="form">
                                  <h5>Company Name</h5>
                                  <input type="text" name="company_name" value="{{ $jobPosting->company_name }}">
                              </div>
                              <!-- Website -->
                              <div class="form">
                                  <h5>Website <span>(optional)</span></h5>
                                  <input type="text" name="website" value="{{ $jobPosting->website }}">
                              </div>
                               <!-- Place -->
                              <div class="form">
                                  <h5>Company size <span>(optional)</span></h5>
                                  <input type="text" name="place" value="{{ $jobPosting->place }}">
                              </div>
                              <!-- Tagline -->
                              <div class="form">
                                  <h5>Tagline <span>(optional)</span></h5>
                                  <input type="text" name="tagline" value="{{ $jobPosting->tagline }}">
                              </div>
                              <!-- Video -->
                              <div class="form">
                                  <h5>Video <span>(optional)</span></h5>
                                  <input type="text" name="video" value="{{ $jobPosting->video }}">
                              </div>
                              <!-- Twitter -->
                              <div class="form">
                                  <h5>Twitter Username <span>(optional)</span></h5>
                                  <input type="text" name="twitter" value="{{ $jobPosting->twitter }}">
                              </div>
                              <!-- Logo -->
                              <div class="form">
                                  <h5>Logo <span>(optional)</span></h5>
                                  <label class="upload-btn">
                                      <input type="file" name="logo">
                                      <i class="fa fa-upload"></i> Browse
                                  </label>
                                  <span class="fake-input">No file selected</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="button margin-top-30">Save Changes <i
                          class="fa fa-arrow-circle-right"></i></button>
              </form>
          </div>
      </div>
  @endsection
