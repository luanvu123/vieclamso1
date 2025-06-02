@extends('dashboard-employer')

@section('content')
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Tất cả ứng viên đã ứng tuyển</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('job-postings.dashboard') }}">Dashboard</a></li>
                        <li>Tất cả ứng viên</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Filters -->
        <form method="GET" action="{{ route('job_postings.all_applications') }}">
            <div class="col-md-4">
                <select name="job_posting" class="chosen-select-no-single" onchange="this.form.submit()">
                    <option value="">Tất cả tin tuyển dụng</option>
                    @foreach($jobPostings as $jobPosting)
                        <option value="{{ $jobPosting->id }}" {{ request('job_posting') == $jobPosting->id ? 'selected' : '' }}>
                            {{ $jobPosting->title }}
                        </option>
                    @endforeach
                </select>
                <div class="margin-bottom-15"></div>
            </div>

            <div class="col-md-4">
                <select name="status" class="chosen-select-no-single" onchange="this.form.submit()">
                    <option value="">Lọc theo trạng thái</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Đã ứng tuyển</option>
                    <option value="reviewed" {{ request('status') == 'reviewed' ? 'selected' : '' }}>NTD đã xem hồ sơ</option>
                    <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Hồ sơ phù hợp</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Hồ sơ chưa phù hợp</option>
                </select>
                <div class="margin-bottom-15"></div>
            </div>

            <div class="col-md-4">
                <select name="sort" class="chosen-select-no-single" onchange="this.form.submit()">
                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Gần đây nhất</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sắp xếp theo tên</option>
                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Sắp xếp theo số sao</option>
                </select>
                <div class="margin-bottom-35"></div>
            </div>
        </form>

        <div class="col-md-12">
            @if($applications->count() > 0)
                <div class="margin-bottom-20">
                    <span class="notification notice margin-bottom-25">
                        Tìm thấy <strong>{{ $applications->total() }}</strong> ứng viên
                    </span>
                </div>

                @foreach ($applications as $application)
                    <div class="application">
                        <div class="app-content">
                            <div class="info">
                                <img src="{{ $application->candidate->avatar_candidate ? asset('storage/' . $application->candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" alt="">
                                <span>{{ $application->candidate->fullname_candidate }}</span>

                                <!-- Hiển thị tên công việc -->
                                <div class="job-title">
                                    <i class="fa fa-briefcase"></i>
                                    <strong class="job-title-text" title="{{ $application->jobPosting->title }}">
                                        {{ Str::limit($application->jobPosting->title, 40) }}
                                    </strong>
                                </div>

                                <ul>
                                    @if($hasViewInfoPackage)
                                        <li>
                                            <a href="{{ asset('storage/' . $application->cv_path) }}">
                                                <i class="fa fa-file-text"></i> CV
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ asset('storage/' . $application->cv_path_hidden_info) }}">
                                                <i class="fa fa-file-text"></i> CV
                                            </a>
                                        </li>
                                    @endif

                                    <li><a href="{{ route('candidates.show.cv', $application->candidate->id) }}"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a href="{{ route('messages.show', $application->candidate) }}"><i class="fa fa-envelope"></i> Message</a></li>
                                    <li><a href="{{ route('job-postings.show', $application->jobPosting->id) }}"><i class="fa fa-eye"></i> Xem tin tuyển dụng</a></li>
                                    <li>
                                        <form action="{{ route('job_postings.save_profile', $application->candidate->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="listing-date new">Lưu</button>
                                        </form>
                                    </li>
                                    <li>
                                        @if ($application->created_at->diffInHours(now()) < 5)
                                            <span class="new-badge">New</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="buttons">
                                <a href="#one-{{ $application->id }}" class="button gray app-link"><i class="fa fa-pencil"></i>Cập nhật hồ sơ</a>
                                <a href="#two-{{ $application->id }}" class="button gray app-link"><i class="fa fa-sticky-note"></i> Thêm ghi chú</a>
                                <a href="#three-{{ $application->id }}" class="button gray app-link"><i class="fa fa-plus-circle"></i> Xem chi tiết</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="app-tabs">
                            <a href="#" class="close-tab button gray" style="display: none;"><i class="fa fa-close"></i></a>

                            <!-- First Tab - Cập nhật trạng thái -->
                            <form action="{{ route('applications.update.rating', $application->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="app-tab-content" id="one-{{ $application->id }}" style="display: none;">
                                    <div class="select-grid">
                                        <select name="status" class="chosen-select-no-single">
                                            <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Đã ứng tuyển</option>
                                            <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>NTD đã xem hồ sơ</option>
                                            <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Hồ sơ phù hợp</option>
                                            <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Hồ sơ chưa phù hợp</option>
                                        </select>
                                    </div>
                                    <div class="select-grid">
                                        <input name="rating" type="number" min="1" max="5" placeholder="Rating (out of 5)" value="{{ old('rating', $application->rating) }}">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="submit" class="button margin-top-15">Lưu</button>
                                </div>
                            </form>

                            <!-- Second Tab - Ghi chú -->
                            <form action="{{ route('applications.update.note', $application->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="app-tab-content" id="two-{{ $application->id }}" style="display: none;">
                                    <textarea name="note" placeholder="Private note regarding this application">{{ old('note', $application->note) }}</textarea>
                                    <button type="submit" class="button margin-top-15">Thêm ghi chú</button>
                                </div>
                            </form>

                            <!-- Third Tab - Chi tiết -->
                            <div class="app-tab-content" id="three-{{ $application->id }}" style="display: none;">
                                <i>Full Name:</i>
                                <span>{{ $application->candidate->fullname_candidate }}</span>

                                @if($hasViewInfoPackage)
                                    <i>Email:</i>
                                    <span>{{ $application->candidate->email }}</span>
                                    <i>Phone:</i>
                                    <span>{{ $application->candidate->phone_number_candidate }}</span>
                                @else
                                    <i>Email:</i>
                                    <span><a href="{{ route('employer.services') }}">Nhấn để xem</a></span>
                                    <i>Phone:</i>
                                    <span><a href="{{ route('employer.services') }}">Nhấn để xem</a></span>
                                @endif

                                <i>Tin tuyển dụng:</i>
                                <span>{{ $application->jobPosting->title }}</span>

                                <i>Message:</i>
                                <span>{{ $application->application_letter }}</span>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="app-footer">
                            @if ($application->rating == 0)
                                <div class="rating no-stars">
                                    <div class="star-rating"></div>
                                    <div class="star-bg"></div>
                                </div>
                            @elseif($application->rating == 1)
                                <div class="rating one-stars">
                                    <div class="star-rating"></div>
                                    <div class="star-bg"></div>
                                </div>
                            @elseif($application->rating == 2)
                                <div class="rating two-stars">
                                    <div class="star-rating"></div>
                                    <div class="star-bg"></div>
                                </div>
                            @elseif($application->rating == 3)
                                <div class="rating three-stars">
                                    <div class="star-rating"></div>
                                    <div class="star-bg"></div>
                                </div>
                            @elseif($application->rating == 4)
                                <div class="rating four-stars">
                                    <div class="star-rating"></div>
                                    <div class="star-bg"></div>
                                </div>
                            @elseif($application->rating == 5)
                                <div class="rating five-stars">
                                    <div class="star-rating"></div>
                                    <div class="star-bg"></div>
                                </div>
                            @endif

                            <ul>
                                <li><i class="fa fa-file-text-o"></i>
                                    @switch($application->status)
                                        @case('pending')
                                            Đã ứng tuyển
                                            @break
                                        @case('reviewed')
                                            NTD đã xem hồ sơ
                                            @break
                                        @case('accepted')
                                            Hồ sơ phù hợp
                                            @break
                                        @case('rejected')
                                            Hồ sơ chưa phù hợp
                                            @break
                                    @endswitch
                                </li>
                                <li><i class="fa fa-calendar"></i> {{ $application->created_at->format('d/m/Y H:i') }}</li>
                                <li><i class="fa fa-briefcase"></i>
                                    <span title="{{ $application->jobPosting->title }}">
                                        {{ Str::limit($application->jobPosting->title, 30) }}
                                    </span>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $applications->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="notification notice margin-bottom-25">
                    <p>Không tìm thấy ứng viên nào phù hợp với bộ lọc đã chọn.</p>
                </div>
            @endif
        </div>
    </div>

    <style>
        .new-badge {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 5px;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .job-title {
            margin: 10px 0;
            color: #666;
            font-size: 14px;
        }

        .job-title i {
            margin-right: 5px;
            color: #888;
        }

        .job-title-text {
            cursor: help;
            transition: color 0.3s ease;
        }

        .job-title-text:hover {
            color: #333;
        }

        .app-footer ul li:last-child {
            color: #666;
            font-size: 13px;
        }

        .app-footer ul li span {
            cursor: help;
            transition: color 0.3s ease;
        }

        .app-footer ul li span:hover {
            color: #333;
        }
    </style>
@endsection
