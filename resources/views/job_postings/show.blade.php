@extends('dashboard-employer')

@section('content')
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Ứng viên ứng tuyển cho vị trí này</h2>
            </div>
        </div>
    </div>


    <div class="row">
        <form method="GET" action="{{ route('job-postings.show', $jobPosting->id) }}">
            <div class="col-md-6">
               <select name="status" class="chosen-select-no-singl" onchange="this.form.submit()">
    <option value="">Lọc theo trạng thái</option>
    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Đã ứng tuyển</option>
    <option value="reviewed" {{ request('status') == 'reviewed' ? 'selected' : '' }}>NTD đã xem hồ sơ</option>
    <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Hồ sơ phù hợp</option>
    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Hồ sơ chưa phù hợp</option>
</select>

                <div class="margin-bottom-15"></div>
            </div>
            <div class="col-md-6">
                <select name="sort" class="chosen-select-no-singl" onchange="this.form.submit()">
                    <opti value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Gần đây nhất
                    </option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sắp xếp theo tên</option>
                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Sắp xếp theo số sao</option>
                </select>
                <div class="margin-bottom-35"></div>
            </div>
        </form>

        <div class="col-md-12">
            @foreach ($applications as $application)
                    <div class="application">
                        <div class="app-content">
                            <div class="info">
                                <img src="{{ $application->candidate->avatar_candidate ? asset('storage/' . $application->candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                    alt="">
                                <span>{{ $application->candidate->fullname_candidate }}


                                </span>
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

                                    <li><a href="{{ route('candidates.show.cv', $application->candidate->id) }}"><i
                                                class="fa fa-user"></i> Profile</a></li>
                                    <li><a href="{{ route('messages.show', $application->candidate) }}"><i
                                                class="fa fa-envelope"></i> Message</a></li>
                                    <li>
                                        <form action="{{ route('job_postings.save_profile', $application->candidate->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="listing-date new">Lưu</button>
                                        </form>
                                    </li>
                                    <li>
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

                                                0%,
                                                100% {
                                                    opacity: 1;
                                                }

                                                50% {
                                                    opacity: 0;
                                                }
                                            }
                                        </style>
                                        @if ($application->created_at->diffInHours(now()) < 5)
                                            <span class="new-badge">New</span>
                                        @endif

                                    </li>


                                </ul>
                            </div>
                            <div class="buttons">
                                <a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i>Cập nhật hồ sơ</a>
                                <a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Thêm ghi chú</a>
                                <a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Xem chi tiết</a>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="app-tabs">
                            <a href="#" class="close-tab button gray" style="display: none;"><i class="fa fa-close"></i></a>
                            <!-- First Tab -->
                            <form id="rating-form" action="{{ route('applications.update.rating', $application->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="app-tab-content" id="one-1" style="display: none;">
                                    <div class="select-grid">
                                       <select name="status" id="status-{{ $application->id }}" class="chosen-select-no-single">
    <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Đã ứng tuyển</option>
    <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>NTD đã xem hồ sơ</option>
    <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Hồ sơ phù hợp</option>
    <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Hồ sơ chưa phù hợp</option>
</select>

                                    </div>
                                    <div class="select-grid">
                                        <input name="rating" type="number" min="1" max="5" placeholder="Rating (out of 5)"
                                            value="{{ old('rating', $application->rating) }}">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="submit" class="button margin-top-15">Lưu</button>
                            </form>
                        </div>
                        <!-- Second Tab -->
                        <form id="note-form" action="{{ route('applications.update.note', $application->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="app-tab-content" id="two-1">
                                <textarea name="note"
                                    placeholder="Private note regarding this application">{{ old('note', $application->note) }}</textarea>
                                <button type="submit" class="button margin-top-15">Thêm ghi chú</button>
                            </div>
                        </form>
                        <!-- Third Tab -->
                        <div class="app-tab-content" id="three-1" style="display: none;">
                            <i>Full Name:</i>
                            <span>{{ $application->candidate->fullname_candidate }}</span>

                            @if($hasViewInfoPackage)
                                <!-- Hiển thị Email và Phone nếu isInfomation = true -->
                                <i>Email:</i>
                                <span>{{ $application->candidate->email }}</span>

                                <i>Phone:</i>
                                <span>{{ $application->candidate->phone_number_candidate }}</span>
                            @else
                                <!-- Hiển thị liên kết nếu isInfomation = false -->
                                <i>Email:</i>
                                <span><a href="{{ route('employer.services') }}">Nhấn để xem</a></span>

                                <i>Phone:</i>
                                <span><a href="{{ route('employer.services') }}">Nhấn để xem</a></span>
                            @endif

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
    <li><i class="fa fa-calendar"></i> {{ $application->created_at }}</li>
</ul>

                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Vui lòng liên hệ hỗ trợ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Vui lòng liên hệ với chúng tôi qua số điện thoại: <strong>0123456789</strong> để được hỗ trợ.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const contactLink = document.getElementById('contactLink');

            if (contactLink) {
                contactLink.addEventListener('click', function (event) {
                    event.preventDefault(); // Ngừng hành động mặc định (chuyển hướng)
                    // Mở modal
                    var myModal = new bootstrap.Modal(document.getElementById('contactModal'));
                    myModal.show();
                });
            }
        });
    </script>
@endsection
