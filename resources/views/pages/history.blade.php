@extends('layout')
@section('content')
    <div id="main">
        <div id="history-apply">
            <div class="container">
                <div id="chat-app" class="row">
                    <div class="col-md-8">
                        <div class="box-group">
                            <div class="box-group-header-applied box-group-header">
                                <div class="box-group-title">
                                    Công việc đã ứng tuyển
                                </div>
                            </div>


                            <div class="box-group-body">
                                <div class="feed-jobs">
                                    @foreach ($applications as $application)
                                        <div class="job-item job-ta">
                                            <div class="d-flex">
                                                <div class="company-logo">
                                                    <img src="{{ $application->jobPosting->company->logo ? asset('storage/' . $application->jobPosting->company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                                        style="max-height: 100%;">
                                                </div>
                                                <div class="company-info">
                                                    <div class="title-block">
                                                        <div class="job-title">
                                                            <a href="{{ route('job.show', $application->jobPosting->slug) }}"
                                                                class="transform-job-title">
                                                                {{ $application->jobPosting->title }}
                                                            </a>
                                                        </div>
                                                        <label class="title-salary">
                                                            <i class="fa-solid fa-circle-dollar"></i>
                                                            {{ $application->jobPosting->salary }}
                                                        </label>
                                                    </div>
                                                    <div class="company-name text-gray">
                                                        <a href="{{ route('company-home.show', $application->jobPosting->company->slug) }}"
                                                            class="text-gray">
                                                            {{ $application->jobPosting->company->name }}
                                                        </a>
                                                    </div>
                                                    <div class="job-applies-meta">
                                                        <span class="cv-date">
                                                            Thời gian ứng tuyển:
                                                            {{ $application->created_at->format('d-m-Y H:i A') }}
                                                        </span>
                                                    </div>
                                                    <div class="box-footer-history">
                                                        <p class="cv-apply-caption">
                                                            CV đã ứng tuyển:
                                                            <a target="_blank"
                                                                href="{{ asset('storage/' . $application->cv->cv_path) }}"
                                                                class="text-highlight">CV tải lên</a>
                                                        </p>
                                                        <div class="action-job">
                                                            <div class="job-applies-meta">
                                                                <div>
                                                                    <a href="#" class="btn-sm btn-topcv-primary"
                                                                        onclick="document.getElementById('messageForm-{{ $application->jobPosting->company->id }}').style.display = 'block'">
                                                                        <i class="fa-solid fa-message"></i> Nhắn tin
                                                                    </a>
                                                                    <a target="_blank"
                                                                        href="{{ asset('storage/' . $application->cv->cv_path) }}"
                                                                        class="btn-sm btn-topcv-primary">
                                                                        <i class="fa-solid fa-eye"></i> Xem CV
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-cv-apply-status">
                                                        <div class="cv-apply-status-text">
                                                            Trạng thái:
                                                            <span class="applied">
                                                                @if ($application->status == 1)
                                                                    Đã ứng tuyển
                                                                @elseif ($application->status == 2)
                                                                    NTD đã xem hồ sơ
                                                                @elseif ($application->status == 3)
                                                                    Hồ sơ phù hợp
                                                                @elseif ($application->status == 4)
                                                                    Hồ sơ chưa phù hợp
                                                                @else
                                                                    Không xác định
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="cv-apply-status-time">
                                                            Vào lúc: {{ $application->created_at->format('d-m-Y H:i A') }}
                                                        </div>
                                                    </div>
                                                    <div id="messageForm-{{ $application->jobPosting->company->id }}"
                                                        style="display: none;">
                                                        <form action="{{ route('messages.send') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="employer_id"
                                                                value="{{ $application->jobPosting->company->employer->id }}">
                                                            <div class="form-group">
                                                                <label for="message">Tin nhắn</label>
                                                                <textarea name="message" class="form-control" rows="3" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Gửi</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="active-candidate"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
