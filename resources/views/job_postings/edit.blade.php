  @extends('dashboard-employer')

  @section('content')
      <!-- Titlebar -->
      <div id="titlebar">
          <div class="row">
              <div class="col-md-12">
                  <h2>Chỉnh sửa công việc</h2>
                  <!-- Breadcrumbs -->
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Dashboard</a></li>
                          <li>Chỉnh sửa công việc</li>
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
                                  <h5>Email</h5>
                                  <input class="search-field" type="text" name="email" value="{{ $jobPosting->email }}"
                                      readonly>
                              </div>
                              <!-- Title -->
                              <div class="form">
                                  <h5>Tiêu đề công việc</h5>
                                  <input class="search-field" type="text" name="title"
                                      value="{{ $jobPosting->title }}"id="slug" onkeyup="ChangeToSlug()">
                              </div>

                              <!-- Chọn thành phố -->
                              <div class="form">
                                  <div class="select">
                                      <h5>Khu vực</h5>
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
                                  <h5>Hình thức làm việc</h5>
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
                                      <h5>Danh mục</h5>
                                      <select name="category[]" data-placeholder="Chọn danh mục" class="chosen-select"
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
                                  <h5>Địa điểm làm việc</h5>
                                  <input class="search-field" type="text" name="location"
                                      value="{{ $jobPosting->location }}">
                                  <p class="note">Leave this blank if the location is not important</p>
                              </div>
                              <!-- Salary -->
                              <div class="form">
                                  <h5>Mức lương</h5>
                                  <input type="text" name="salary" value="{{ $jobPosting->salary }}">
                              </div>


                              <!-- Experience -->
                              <div class="form">
                                  <h5>Kinh nghiệm</h5>
                                  <input type="text" name="experience" value="{{ $jobPosting->experience }}">
                              </div>
                              <!-- Rank -->
                              <div class="form">
                                  <h5>Cấp bậc</h5>
                                  <input type="text" name="rank" value="{{ $jobPosting->rank }}">
                              </div>
                              <!-- Number of recruits -->
                              <div class="form">
                                  <h5>Số lượng tuyển dụng</h5>
                                  <input type="number" name="number_of_recruits"
                                      value="{{ $jobPosting->number_of_recruits }}">
                              </div>
                              <!-- Sex -->
                              <div class="form">
                                  <h5>Giới tính</h5>
                                  <select name="sex" class="chosen-select-no-single">
                                      <option value="Male" {{ $jobPosting->sex == 'Male' ? 'selected' : '' }}>Nam
                                      </option>
                                      <option value="Female" {{ $jobPosting->sex == 'Female' ? 'selected' : '' }}>Nữ
                                      </option>
                                      <option value="Not required"
                                          {{ $jobPosting->sex == 'Not required' ? 'selected' : '' }}>Không yêu cầu
                                      </option>
                                  </select>
                              </div>
                              <!-- Description -->
                              <div class="form" style="width: 100%;">
                                  <h5>Mô tả</h5>
                                  <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true">{!! $jobPosting->description !!}</textarea>
                              </div>
<div class="form" style="width: 100%;">
    <h5>Kỹ năng yêu cầu</h5>
    <textarea class="WYSIWYG" name="job_skills" cols="40" rows="3" spellcheck="true">{{ old('job_skills', $jobPosting->job_skills) }}</textarea>
</div>

                              <div class="form" style="width: 100%;">
    <h5>Phúc lợi</h5>
    <textarea class="WYSIWYG" name="benefits" cols="40" rows="3" spellcheck="true">{{ old('benefits', $jobPosting->benefits) }}</textarea>
</div>
<div class="form">
    <h5>Trình độ học vấn</h5>
    <select name="education" class="chosen-select-no-single">
        <option value="">-- Chọn trình độ học vấn --</option>
        <option value="Cao đẳng" {{ $jobPosting->education == 'Cao đẳng' ? 'selected' : '' }}>Cao đẳng</option>
        <option value="Đại học" {{ $jobPosting->education == 'Đại học' ? 'selected' : '' }}>Đại học</option>
        <option value="Thạc sĩ" {{ $jobPosting->education == 'Thạc sĩ' ? 'selected' : '' }}>Thạc sĩ</option>
        <option value="Tiến sĩ" {{ $jobPosting->education == 'Tiến sĩ' ? 'selected' : '' }}>Tiến sĩ</option>
        <option value="Không yêu cầu" {{ $jobPosting->education == 'Không yêu cầu' ? 'selected' : '' }}>Không yêu cầu</option>
    </select>
</div>

                              <!-- Application email/url -->
                              <div class="form">
                                  <h5>Email / URL nhận đơn ứng tuyển</h5>
                                  <input type="text" name="application_email_url"
                                      value="{{ $jobPosting->application_email_url }}">
                              </div>
                              <!-- Closing Date -->
                              <div class="form">
                                  <h5>Ngày hết hạn</h5>
                                  <input data-role="date" type="date" name="closing_date"
                                      value="{{ $jobPosting->closing_date }}">
                                  <p class="note">Thời hạn cho các ứng viên mới.</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="dashboard-list-box margin-top-30">
                      <div class="form">
                          <h5>Công ty của bạn</h5>
                          <select name="company_id" class="chosen-select">
                              <option value="{{ $company->id }}">{{ $company->name }}</option>
                          </select>
                      </div>

                  </div>
                  <button type="submit" class="button margin-top-30">Lưu thay đổi <i
                          class="fa fa-arrow-circle-right"></i></button>
              </form>
          </div>
      </div>
  @endsection
