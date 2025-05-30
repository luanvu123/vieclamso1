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
                <h3 class="card-title">Sửa thông tin công việc</h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $jobPosting->email }}" readonly>
                </div>

                <div class="form-group">
                    <label>Tiêu đề công việc</label>
                    <input type="text" name="title" class="form-control" value="{{ $jobPosting->title }}" id="slug" onkeyup="ChangeToSlug()">
                </div>

                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $jobPosting->slug }}" id="convert_slug">
                </div>

                <div class="form-group">
                    <label>Thành phố</label>
                    <select name="city[]" class="form-control select2" id="cities" multiple>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ in_array($city->id, $selectedCities) ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Loại công việc</label>
                    <select name="type" class="form-control">
                        <option value="Full-Time" {{ $jobPosting->type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                        <option value="Part-Time" {{ $jobPosting->type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                        <option value="Internship" {{ $jobPosting->type == 'Internship' ? 'selected' : '' }}>Internship</option>
                        <option value="Freelance" {{ $jobPosting->type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category[]" class="form-control select2" id="categories" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Địa điểm (tùy chọn)</label>
                    <input type="text" name="location" class="form-control" value="{{ $jobPosting->location }}">
                </div>

                <div class="form-group">
                    <label>Mức lương (tùy chọn)</label>
                    <input type="text" name="salary" class="form-control" value="{{ $jobPosting->salary }}">
                </div>

                <div class="form-group">
                    <label>Chọn mức lương</label>
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
                    <label>Kinh nghiệm</label>
                    <input type="text" name="experience" class="form-control" value="{{ $jobPosting->experience }}">
                </div>

                <div class="form-group">
                    <label>Cấp bậc</label>
                    <input type="text" name="rank" class="form-control" value="{{ $jobPosting->rank }}">
                </div>

                <div class="form-group">
                    <label>Số lượng tuyển dụng</label>
                    <input type="number" name="number_of_recruits" class="form-control" value="{{ $jobPosting->number_of_recruits }}">
                </div>

                <div class="form-group">
                    <label>Giới tính</label>
                    <select name="sex" class="form-control">
                        <option value="Male" {{ $jobPosting->sex == 'Male' ? 'selected' : '' }}>Nam</option>
                        <option value="Female" {{ $jobPosting->sex == 'Female' ? 'selected' : '' }}>Nữ</option>
                        <option value="Not required" {{ $jobPosting->sex == 'Not required' ? 'selected' : '' }}>Không yêu cầu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="0" {{ $jobPosting->status == 0 ? 'selected' : '' }}>Đã duyệt </option>
                        <option value="1" {{ $jobPosting->status == 1 ? 'selected' : '' }}>Đang đợi duyệt</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" class="form-control summernote" id="description" rows="5">{!! $jobPosting->description !!}</textarea>
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
    <select name="education" class="form-control">
        <option value="">-- Chọn trình độ học vấn --</option>
        <option value="Cao đẳng" {{ $jobPosting->education == 'Cao đẳng' ? 'selected' : '' }}>Cao đẳng</option>
        <option value="Đại học" {{ $jobPosting->education == 'Đại học' ? 'selected' : '' }}>Đại học</option>
        <option value="Thạc sĩ" {{ $jobPosting->education == 'Thạc sĩ' ? 'selected' : '' }}>Thạc sĩ</option>
        <option value="Tiến sĩ" {{ $jobPosting->education == 'Tiến sĩ' ? 'selected' : '' }}>Tiến sĩ</option>
        <option value="Không yêu cầu" {{ $jobPosting->education == 'Không yêu cầu' ? 'selected' : '' }}>Không yêu cầu</option>
    </select>
</div>

                <div class="form-group">
                    <label>Email / URL nộp đơn</label>
                    <input type="text" name="application_email_url" class="form-control" value="{{ $jobPosting->application_email_url }}">
                </div>

                <div class="form-group">
                    <label>Ngày hết hạn</label>
                    <input type="date" name="closing_date" class="form-control" value="{{ $jobPosting->closing_date }}">
                </div>

                <div class="form-group">
                    <label>Công ty</label>
                    <select name="company_id" class="form-control">
                        <option value="{{ $jobPosting->company->id ?? '' }}">{{ $jobPosting->company->name ?? 'No Company' }}</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Lưu <i class="fas fa-save ml-1"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

