@extends('dashboard-employer')

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Tạo Tin Tuyển Dụng</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Tạo Tin Tuyển Dụng</li>
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
                            @if ($basicServiceDetails->count() || $hotServiceDetails->count() || $specialServiceDetails->count())
                                <div class="alert alert-success">
                                    <h5>Bạn có gói còn hiệu lực:</h5>
                                    <ul>
                                        @foreach ($basicServiceDetails as $detail)
                                            <li>
                                                <strong>Tin cơ bản</strong> - Hết hạn:
                                                <strong>{{ \Carbon\Carbon::parse($detail->expiring_date)->format('d/m/Y') }}</strong>
                                                -
                                                Số lượt sử dụng còn lại: <strong>{{ $detail->number_of_active }}</strong>
                                            </li>
                                        @endforeach
                                        @foreach ($hotServiceDetails as $detail)
                                            <li>
                                                <strong>Tin nổi bật</strong> - Hết hạn:
                                                <strong>{{ \Carbon\Carbon::parse($detail->expiring_date)->format('d/m/Y') }}</strong>
                                                -
                                                Số lượt sử dụng còn lại: <strong>{{ $detail->number_of_active }}</strong>
                                            </li>
                                        @endforeach
                                        @foreach ($specialServiceDetails as $detail)
                                            <li>
                                                <strong>Tin đặc biệt</strong> - Hết hạn:
                                                <strong>{{ \Carbon\Carbon::parse($detail->expiring_date)->format('d/m/Y') }}</strong>
                                                -
                                                Số lượt sử dụng còn lại: <strong>{{ $detail->number_of_active }}</strong>
                                            </li>
                                        @endforeach

                                    </ul>

                                   <div class="form-group">
    <label>Loại tin đăng</label><br>

    @if($basicServiceDetails->count() > 0)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="service_type" id="service_basic" value="Tin cơ bản">
            <label class="form-check-label" for="service_basic">
                Tin cơ bản (còn {{ $basicServiceDetails->sum('number_of_active') }} lượt)
            </label>
        </div>
    @endif

    @if($hotServiceDetails->count() > 0)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="service_type" id="service_hot" value="Tin nổi bật">
            <label class="form-check-label" for="service_hot">
                Tin nổi bật (còn {{ $hotServiceDetails->sum('number_of_active') }} lượt)
            </label>
        </div>
    @endif

    @if($specialServiceDetails->count() > 0)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="service_type" id="service_special" value="Tin đặc biệt">
            <label class="form-check-label" for="service_special">
                Tin đặc biệt (còn {{ $specialServiceDetails->sum('number_of_active') }} lượt)
            </label>
        </div>
    @endif
</div>


                                </div>
                                <div class="form">
                                    <h5> Email</h5>
                                    <input class="search-field" type="text" name="email" value="{{ $email }}" readonly>
                                </div>
                                <!-- Job Title -->
                                <div class="form">
                                    <h5>Tiêu đề công việc</h5>
                                    <input class="search-field" type="text" name="title" id="slug" onkeyup="ChangeToSlug()"
                                        placeholder="">
                                </div>
                                <!-- Slug -->
                                <div class="form">
                                    <h5>Slug</h5>
                                    <input class="search-field" type="text" name="slug" id="convert_slug"
                                        placeholder="Đường dẫn">
                                </div>
                                <!-- Job Type -->
                                <div class="form">
                                    <h5>Loại công việc</h5>
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
                                        <h5>Thành phố</h5>
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
                                        <h5>Danh mục</h5>
                                        <select name="category[]" class="chosen-select" multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Location -->
                                <div class="form">
                                    <h5>Địa điểm <span>(optional)</span></h5>
                                    <input class="search-field" type="text" name="location" placeholder="e.g. London">
                                    <p class="note">Leave this blank if the location is not important</p>
                                </div>
                                <!-- Salary -->
                                <div class="form">
                                    <h5>Mức lương <span>(optional)</span></h5>
                                    <input type="text" name="salary" placeholder="Enter salary">
                                </div>

                                <div class="form">
                                    <div class="select">
                                        <label for="salaries">Select Salaries(Mức lương để Vieclamso1 thống kê hệ thống)<span
                                                class="text-danger">*</span></label>
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
                                    <h5>Kinh nghiệm <span>(optional)</span></h5>
                                    <input type="text" name="experience" placeholder="Nhập kinh nghiệm yêu cầu">
                                </div>
                                <!-- Rank -->
                                <div class="form">
                                    <h5>Thứ hạng <span>(optional)</span></h5>
                                    <input type="text" name="rank" placeholder="Nhập thứ hạng">
                                </div>
                                <!-- Number of recruits -->
                                <div class="form">
                                    <h5>Số lượng tuyển dụng <span>(optional)</span></h5>
                                    <input type="number" name="number_of_recruits" placeholder="Nhập số lượng tuyển dụng" min="1">
                                </div>
                                <!-- Sex -->
                                <div class="form">
                                    <h5>Giới tính <span>(optional)</span></h5>
                                    <select name="sex" class="chosen-select-no-single">
                                        <option value="Male">Nam</option>
                                        <option value="Female">Nữ</option>
                                        <option value="Not required">Không yêu cầu</option>
                                    </select>
                                </div>
                                <!-- Skills required -->
                                <div class="form">
                                    <h5>Kỹ năng yêu cầu <span>(optional)</span></h5>
                                    <input type="text" name="skills_required" placeholder="Nhập kỹ năng yêu cầu">
                                </div>
                                <!-- Area -->
                                <div class="form">
                                    <h5>Khu vực <span>(optional)</span></h5>
                                    <input type="text" name="area" placeholder="Nhập khu vực">
                                </div>
                                <!-- Tags -->
                                <div class="form">
                                    <h5>Tags <span>(optional)</span></h5>
                                    <input class="search-field" type="text" name="tags"
                                        placeholder="e.g. PHP, Social Media, Management">
                                    <p class="note">Comma separate tags, such as required skills or technologies, for this
                                        job.</p>
                                </div>
                                <!-- Description -->
                                <div class="form" style="width: 100%;">
                                    <h5>Mô tả</h5>
                                    <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary"
                                        spellcheck="true"></textarea>
                                </div>
                                <!-- Application email/url -->
                                <div class="form">
                                    <h5>Email / URL ứng tuyển</h5>
                                    <input type="text" name="application_email_url"
                                        placeholder="Enter an email address or website URL">
                                </div>
                                <!-- Closing Date -->
                                <div class="form">
                                    <h5>Ngày kết thúc <span>(optional)</span></h5>
                                    <input data-role="date" type="date" name="closing_date" placeholder="yyyy-mm-dd">
                                    <p class="note">Deadline for new applicants.</p>
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    Bạn chưa có gói "Tin cơ bản" còn hiệu lực. Vui lòng mua dịch vụ để đăng tin tuyển dụng.
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="dashboard-list-box margin-top-30">
                    <h4>Chọn công ty của bạn</h4>
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
                <button type="submit" class="button margin-top-30">Gửi <i class="fa fa-arrow-circle-right"></i></button>
            </form>
        </div>
    </div>
@endsection
