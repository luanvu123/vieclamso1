@extends('layout')
@section('content')
    <div id="main">
        <div class="container" id="box-save-job">
            <div class="row">
                <div class="col-md-9">
                    <div class="box-white">
                        <div class="banner">
                            <div class="content">
                                <h1 class="title">Việc làm đã lưu</h1>
                                <p class="description">Xem lại danh sách những việc làm mà bạn đã lưu trước đó. Ứng
                                    tuyển ngay để không bỏ lỡ cơ hội
                                    nghề nghiệp dành cho bạn.</p>
                            </div>
                            <div class="image">
                                <img src="{{asset('static.topcv.vn/v4/image/featured-job-list/arrow_desktop.png')}}"
                                    alt="Việc làm từ xa (remote) background" title="Việc làm từ xa (remote) background"
                                    class="w-100">
                            </div>
                        </div>
                        <div class="box-job-total">
                            Danh sách <strong>{{ $savedJobs->count() }}</strong> việc làm đã lưu
                        </div>
                        @if ($savedJobs->isEmpty())
                            <p>Danh sách lưu việc rỗng</p>
                        @else
                            <div class="lists">
                                <div class="job-list-default job-list-saved">
                                    @foreach ($savedJobs as $savedJob)
                                        <div class="job-item-default bg-highlight job-ta"
                                            data-job-id="{{ $savedJob->jobPosting->id }}" data-job-position="1"
                                            data-box="BoxSearchResult">
                                            <div class="avatar">
                                                <a target="_blank" href="{{ $savedJob->jobPosting->application_email_url }}">
                                                    <img src="{{ $savedJob->jobPosting->company->logo ? asset('storage/' . $savedJob->jobPosting->company->logo) : asset('storage/avatar/avatar-default.jpg') }}
                                                             " class="w-100" alt="{{ $savedJob->jobPosting->company->name }}"
                                                        title="{{ $savedJob->jobPosting->title }}">
                                                </a>
                                            </div>
                                            <div class="body">
                                                <div class="title-block">
                                                    <h3 class="title">
                                                        <a target="_blank"
                                                            href="{{ route('job.show', $savedJob->jobPosting->slug) }}">
                                                            <span>{{ $savedJob->jobPosting->title }}</span>
                                                        </a>
                                                    </h3>
                                                    <label class="title-salary">
                                                        {{ $savedJob->jobPosting->salary }}
                                                    </label>
                                                </div>
                                                <a class="company"
                                                    href="{{ route('company-home.show', $savedJob->jobPosting->company->slug) }}">{{ $savedJob->jobPosting->company->name }}</a>
                                                <label class="time_save_job">Đã lưu:
                                                    {{ $savedJob->created_at->format('d/m/Y - H:i') }}</label>
                                                <div class="box-job-relevance-job">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i style="display: none;" class="fa-regular fa-star"></i>
                                                    <span class="box-job-relevance-job_text"></span>
                                                </div>
                                                <div class="info">
                                                    <div class="label-content">
                                                        <label class="address" data-toggle="tooltip" data-html="true"
                                                            title="{{ $savedJob->jobPosting->location }}" data-placement="top"
                                                            data-container="body">{{ $savedJob->jobPosting->location }}</label>
                                                        <label class="time">
                                                            Cập nhật
                                                            {{ $savedJob->jobPosting->created_at->diffForHumans() }}
                                                        </label>
                                                    </div>
                                                    <div class="icon">
                                                        <button data-job-id="{{ $savedJob->jobPosting->id }}" data-toggle="modal"
                                                            data-target="#applyModal" class="btn btn-apply-now">
                                                            <span>Ứng tuyển</span>
                                                        </button>
                                                        <div id="box-save-job-{{ $savedJob->jobPosting->id }}"
                                                            class="box-save-job is-page-job-save">
                                                            <a href="javascript:void(0)" class="btn-unsave unsave text-red"
                                                                data-id="{{ $savedJob->jobPosting->id }}"
                                                                data-title="{{ $savedJob->jobPosting->title }}">
                                                                <span id="save-job-loading" style="display: none;">
                                                                    <img src="https://www.topcv.vn/v3/images/ap-loading.gif" alt=""
                                                                        style="width: 20px">
                                                                </span>
                                                                <i class="fa-regular fa-trash"></i> Bỏ lưu
                                                            </a>
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function () {
                                                                    document.querySelectorAll('.btn-unsave').forEach(function (button) {
                                                                        button.addEventListener('click', function (e) {
                                                                            e.preventDefault();

                                                                            let jobId = this.getAttribute('data-id');
                                                                            let url = "{{ route('unsave-job') }}";

                                                                            fetch(url, {
                                                                                method: 'POST',
                                                                                headers: {
                                                                                    'Content-Type': 'application/json',
                                                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                                },
                                                                                body: JSON.stringify({
                                                                                    job_id: jobId
                                                                                })
                                                                            })
                                                                                .then(response => response.json())
                                                                                .then(data => {
                                                                                    if (data.status === 'success') {
                                                                                        // Remove the job item from the view
                                                                                        this.closest('.job-item-default').remove();
                                                                                    } else {
                                                                                        alert(data.message || 'Đã xảy ra lỗi.');
                                                                                    }
                                                                                })
                                                                                .catch(error => {
                                                                                    console.error('Error:', error);
                                                                                });
                                                                        });
                                                                    });
                                                                });
                                                            </script>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <!-- Apply Modal -->
                        @if ($savedJobs->isNotEmpty())
                            <div class="modal fade" id="applyModal" tabindex="-1" role="dialog"
                                aria-labelledby="applyModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="applyModalLabel">Chọn CV của bạn và viết thư ứng tuyển
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @auth('candidate')
                                                <form id="applyForm" action="{{ route('applications.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- Empty value that will be filled by JavaScript -->
                                                    <input type="hidden" name="job_posting_id" id="job_posting_id" value="">

                                                    <div class="form-group">
                                                        <label for="cv_id">Chọn CV</label>
                                                        <select class="form-control" id="cv_id" name="cv_id">
                                                            <option value="">-- Chọn CV sẵn có hoặc tải lên mới --</option>
                                                            @foreach(auth('candidate')->user()->cvs as $cv)
                                                                <option value="{{ $cv->id }}">{{ $cv->cv_name }} - {{ $cv->cv_path }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="form-group" id="new-cv-upload">
                                                        <label for="cv">CV mới (PDF, DOC, DOCX)*</label>
                                                        <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="application_letter">Thư ứng tuyển</label>
                                                        <textarea class="form-control" id="introduction" name="introduction"
                                                            rows="4"></textarea>
                                                    </div>

                                                </form>
                                            @else
                                                <p>Bạn cần đăng nhập để ứng tuyển.</p>
                                            @endauth
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            @auth('candidate')
                                                <button type="button" class="btn btn-primary" onclick="submitApplyForm()">Ứng tuyển
                                                    ngay</button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function () {
                                    // Fixed selector to target all buttons that should open apply modal
                                    $('.btn-apply-now').on('click', function () {
                                        var jobId = $(this).data('job-id');
                                        console.log("Setting job_posting_id to:", jobId); // For debugging
                                        $('#job_posting_id').val(jobId);
                                    });

                                    // Single submitApplyForm function
                                    window.submitApplyForm = function () {
                                        console.log("Form submission started"); // For debugging
                                        console.log("job_posting_id value:", $('#job_posting_id').val()); // For debugging
                                        document.getElementById('applyForm').submit();
                                    };

                                    // CV selection logic
                                    $('#cv_id').on('change', function () {
                                        $('#new-cv-upload').css('display', $(this).val() ? 'none' : 'block');
                                    });

                                    // Initialize display state
                                    $('#new-cv-upload').css('display', $('#cv_id').val() ? 'none' : 'block');

                                });
                            </script>
                        @endif
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
