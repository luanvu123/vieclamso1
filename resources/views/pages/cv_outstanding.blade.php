@extends('layout')

@section('content')
    <div class="classic-container" id="cv-container">
        <!-- Classic Header -->
        <header class="classic-header">
            <div class="classic-profile">
                <div class="classic-avatar">
                    <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                        alt="Avatar" />
                </div>
                <div class="classic-info">
                    <h1 class="classic-name">{{ $candidate->fullname_candidate }}</h1>
                    <p class="classic-status">{{ $candidate->position ?? 'Lập trình viên' }}</p>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section class="cv-section about">
            <h2 class="section-title"><img
                    src="{{ asset('backend_admin/images/file-infomation-meeting-note-paper-svgrepo-com.svg') }}"
                    width="20" height="20"> About</h2>
         <p>Email: {{ $candidate->email ?? 'vieclamso1@gmail.com' }}</p>
                <p>Phone: {{ $candidate->phone_number_candidate ?? '(024) 6680 5588' }}</p>
                <p>Address: {{ $candidate->address ?? 'Quận A, Hà Nội' }}</p>
        </section>

        <!-- Work Experience -->
      <div class="cv-section work-experience" style="margin-bottom: 30px;">
                <h2 class="section-title"><i class="fa fa-briefcase" aria-hidden="true"></i> Work Experience</h2>
                <ul class="experience-list">
                    @if ($candidate->experiences && $candidate->experiences->count() > 0)
                        @foreach ($candidate->experiences as $experience)
                            <li>
                                <strong>{{ $experience->title ?? 'Công ty TOPCV1' }}</strong><br>
                                <span class="experience-dates">
                                    ({{ $experience->start_date ?? '2024-07-03' }} -
                                    {{ $experience->end_date ?? '2024-07-29' }})
                                </span>
                                <p>{{ $experience->description ?? '- Hỗ trợ viết bài quảng cáo sản phẩm qua kênh Facebook, các forum,... - Giới thiệu, tư vấn sản phẩm, giải đáp các vấn đề thắc mắc của khách hàng qua điện thoại và email.' }}
                                </p>
                            </li>
                        @endforeach
                    @else
                        <li>
                            <strong>Công ty TOPCV1</strong><br>
                            <span class="experience-dates">(2024-07-03 - 2024-07-29)</span>
                            <p>- Hỗ trợ viết bài quảng cáo sản phẩm qua kênh Facebook, các forum,...<br>
                                - Giới thiệu, tư vấn sản phẩm, giải đáp các vấn đề thắc mắc của khách hàng qua điện thoại và
                                email.</p>
                        </li>
                    @endif
                </ul>
            </div>


            <!-- Education -->
            <div class="cv-section education" style="margin-bottom: 30px;">
                <h2 class="section-title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h2>
                <ul class="education-list">
                    @if ($candidate->educations && $candidate->educations->count() > 0)
                        @foreach ($candidate->educations as $education)
                            <li>
                                <strong>{{ $education->school ?? 'Đại học TOPCV' }}</strong><br>
                                <span class="education-dates">
                                    ({{ $education->start_date ?? '2020-10-31' }} -
                                    {{ $education->end_date ?? '2023-07-31' }})
                                </span>
                                <p>{{ $education->description ?? 'Tốt nghiệp loại Giỏi, điểm trung bình 9.0' }}</p>
                            </li>
                        @endforeach
                    @else
                        <li>
                            <strong>Đại học TOPCV</strong><br>
                            <span class="education-dates">(2020-10-31 - 2023-07-31)</span>
                            <p>Tốt nghiệp loại Giỏi, điểm trung bình 9.0</p>
                        </li>
                    @endif
                </ul>
            </div>


            <!-- Skills -->
            <div class="cv-section skills" style="margin-bottom: 30px;">
                <h2 class="section-title">
                    <img src="{{ asset('backend_admin/images/skills-svgrepo-com.svg') }}" width="20" height="20">
                    Skills
                </h2>
                <ul class="skills-list">
                    @if ($candidate->skills && $candidate->skills->count() > 0)
                        @foreach ($candidate->skills as $skill)
                            <li><i class="fa fa-check-circle" style="color: #00838F;"></i> {{ $skill->name }}</li>
                        @endforeach
                    @else
                        <li><i class="fa fa-check-circle" style="color: #00838F;"></i> Sử dụng thành thạo các công cụ Word,
                            Excel, PowerPoint</li>
                        <li><i class="fa fa-check-circle" style="color: #00838F;"></i> Khả năng giao tiếp Tiếng Anh trôi
                            chảy</li>
                    @endif
                </ul>
            </div>

            <!-- Hobbies -->
            <div class="cv-section hobbies" style="margin-bottom: 30px;">
                <h2 class="section-title">
                    <img src="{{ asset('backend_admin/images/read-news-learn-understand-paper-svgrepo-com.svg') }}"
                        width="20" height="20"> Hobbies
                </h2>
                <ul class="skills-list">
                    @if ($candidate->hobbies && $candidate->hobbies->count() > 0)
                        @foreach ($candidate->hobbies as $hobby)
                            <li>
                                <i class="fa fa-check-circle" style="color: #00838F;"></i>
                                {{ $hobby->name }}: {{ $hobby->description }}
                            </li>
                        @endforeach
                    @else
                        <li><i class="fa fa-check-circle" style="color: #00838F;"></i> Đọc sách: Nâng cao kiến thức và kỹ
                            năng chuyên môn</li>
                        <li><i class="fa fa-check-circle" style="color: #00838F;"></i> Du lịch: Khám phá văn hóa và ẩm thực
                            các vùng miền</li>
                    @endif
                </ul>
            </div>

            {{-- Certificates --}}
            <div class="cv-section certificates" style="margin-bottom: 30px;">
                <h2 class="section-title">
                    <img src="{{ asset('backend_admin/images/diploma-roll-svgrepo-com.svg') }}" width="20"
                        height="20"> Certificates
                </h2>
                @if ($candidate->certificates && $candidate->certificates->count() > 0)
                    <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
                @else
                    <p>Giải nhất Tài năng TOPCV</p>
                @endif
            </div>
            <div class="cv-section activities" style="margin-bottom: 30px;">
                <h2 class="section-title">
                    <img src="{{ asset('backend_admin/images/volunteer-kindness-care-heart-love-svgrepo-com.svg') }}"
                        width="20" height="20"> Activities
                </h2>
                @if ($candidate->activities && $candidate->activities->count() > 0)
                    <ul class="skills-list">
                        @foreach ($candidate->activities as $activity)
                            <li>
                                <strong>{{ $activity->title }}</strong><br>
                                <span class="experience-dates">({{ $activity->start_date }} -
                                    {{ $activity->end_date }})</span>
                                <p>{{ $activity->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p><strong>Tình nguyện viên trung tâm</strong></p>
                    <span class="experience-dates">(2024-07-09 - 2024-07-17)</span>
                    <p>Tập hợp các món quà và phân phát tới người vô gia cư. Chia sẻ, động viên họ vượt qua giai đoạn khó
                        khăn, giúp họ có những suy nghĩ lạc quan.</p>
                @endif
            </div>


            {{-- Advisers --}}
            <div class="cv-section advisers" style="margin-bottom: 30px;">
                <h2 class="section-title">
                    <img src="{{ asset('backend_admin/images/consultant-svgrepo-com.svg') }}" width="20"
                        height="20"> Advisers
                </h2>
                @if ($candidate->advisers && $candidate->advisers->count() > 0)
                    <ul class="experience-list">
                        @foreach ($candidate->advisers as $adviser)
                            <li>
                                <strong>{{ $adviser->name }}</strong> - {{ $adviser->position }}<br>
                                <p>{{ $adviser->company }} - {{ $adviser->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul class="experience-list">
                        <li>
                            <strong>Ông Nguyễn Văn A</strong> - CEO công ty A<br>
                            <p>Công ty TOPCV - 0987654321</p>
                        </li>
                    </ul>
                @endif
            </div>

            {{-- Prizes --}}
            <div class="cv-section prizes" style="margin-bottom: 30px;">
                <h2 class="section-title">
                    <img src="{{ asset('backend_admin/images/award-star-ui-svgrepo-com.svg') }}" width="20"
                        height="20"> Prizes
                </h2>
                @if ($candidate->prizes && $candidate->prizes->count() > 0)
                    <ul class="experience-list">
                        @foreach ($candidate->prizes as $prize)
                            <li>
                                <strong>{{ $prize->title }}</strong> - {{ $prize->organization }}<br>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul class="experience-list">
                        <li>
                            <strong>Nhân viên xuất sắc năm công ty TOPCV</strong> - TopCV<br>
                        </li>
                    </ul>
                @endif
            </div>

        <!-- Download Button -->
        <form action="{{ route('cvChrome.download') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-primary">Tải PDF</button>
            <a href="{{ route('cv.overview') }}" class="btn btn-warning">Dùng mẫu này</a>
        </form>

        <script>
            // Thay đổi màu nền khi chọn màu
            document.getElementById('colorPicker').addEventListener('input', function() {
                const selectedColor = this.value;
                document.getElementById('cv-container').style.backgroundColor = selectedColor;
                document.getElementById('hiddenBgColor').value = selectedColor;
            });
        </script>
    </div>
    <style>
        .classic-container {
            max-width: 800px;
            /* Chiều rộng tối đa cho CV */
            margin: 0 auto;
            /* Căn giữa */
            font-family: 'Times New Roman', serif;
            /* Font chữ cổ điển */
            color: #333;
            /* Màu chữ */
            line-height: 1.6;
            /* Khoảng cách dòng */
        }

        .classic-header {
            display: flex;
            /* Flexbox để căn chỉnh avatar và thông tin */
            border-bottom: 2px solid #ccc;
            /* Đường viền dưới */
            padding-bottom: 15px;
            /* Khoảng cách dưới */
            margin-bottom: 20px;
            /* Khoảng cách dưới */
        }

        .classic-avatar {
            margin-right: 20px;
            /* Khoảng cách bên phải cho avatar */
        }

        .classic-avatar img {
            width: 100px;
            /* Kích thước avatar */
            height: 100px;
            /* Tự động căn chỉnh chiều cao */
            border-radius: 50%;
            /* Bo tròn avatar */
        }

        .classic-info {
            flex-grow: 1;
            /* Căn giữa thông tin */
        }

        .classic-name {
            font-size: 24px;
            /* Kích thước chữ tên */
            margin: 0;
            /* Bỏ khoảng cách mặc định */
        }

        .classic-status {
            font-size: 18px;
            /* Kích thước chữ vị trí */
            color: #777;
            /* Màu chữ nhạt hơn */
        }

        .cv-section {
            margin-bottom: 20px;
            /* Khoảng cách giữa các section */
        }

        .section-title {
            font-size: 20px;
            /* Kích thước chữ tiêu đề section */
            border-bottom: 1px solid #ccc;
            /* Đường viền dưới cho tiêu đề */
            padding-bottom: 10px;
            /* Khoảng cách dưới tiêu đề */
        }

        .cv-section ul {
            list-style: none;
            /* Bỏ dấu đầu dòng */
            padding: 0;
            /* Bỏ khoảng cách */
        }

        .cv-section ul li {
            margin-bottom: 10px;
            /* Khoảng cách giữa các mục */
        }

        .btn-primary {
            background-color: #007bff;
            /* Màu nền cho nút */
            color: #fff;
            /* Màu chữ */
            border: none;
            /* Bỏ đường viền */
            padding: 10px 20px;
            /* Khoảng cách trong nút */
            border-radius: 5px;
            /* Bo góc nút */
            cursor: pointer;
            /* Con trỏ chuột */
            transition: background-color 0.3s;
            /* Hiệu ứng chuyển màu */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Màu nền khi hover */
        }
    </style>
@endsection
