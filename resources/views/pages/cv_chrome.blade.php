@extends('layout')

@section('content')
    <div class="chrome-container" id="chrome-container" style="font-family: 'Arial', sans-serif; color: #333;">

        <!-- Chrome Tab Bar Simulation -->
        <div class="chrome-tab-bar" style="background-color: #f5f5f5; padding: 10px 20px; border-bottom: 2px solid #ddd;">
            <div class="chrome-tab" style="display: flex; align-items: center;">
                <div class="chrome-icon"
                    style="background: #fbbc05; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px;"></div>
                <div class="chrome-icon"
                    style="background: #34a853; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px;"></div>
                <div class="chrome-icon"
                    style="background: #ea4335; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px;"></div>
                <span style="font-weight: bold; font-size: 1.1em;">{{ $candidate->fullname_candidate }} - CV</span>
            </div>
        </div>

        <!-- Chrome Address Bar -->
        <div class="chrome-address-bar"
            style="background-color: #e0e0e0; padding: 8px 20px; display: flex; align-items: center; justify-content: space-between;">
            <input type="text" value="https://mycvprofile.com/{{ $candidate->fullname_candidate }}" readonly
                style="width: 100%; background-color: #fff; border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
        </div>

        <!-- CV Content -->
        <div class="cv-container" style="padding: 30px; background-color: #f9f9f9;">
            <div class="cv-header"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <div class="cv-info">
                    <h1 style="font-size: 2.5em; margin: 0;">{{ $candidate->fullname_candidate }}</h1>
                    <p style="color: #00838F; font-size: 1.2em;">{{ $candidate->position ?? 'Lập trình viên'}}</p>
                </div>
                <div class="cv-avatar">
                    <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                        alt="Avatar" style="border-radius: 50%; width: 120px; height: 120px; border: 4px solid #00838F;">
                </div>
            </div>

            <!-- Personal Information -->
            <div class="cv-section personal-info" style="margin-bottom: 30px;">
                <h2 class="section-title"><i class="fa fa-user" aria-hidden="true"></i> Personal Information</h2>
                <p>Email: {{ $candidate->email ?? 'vieclamso1@gmail.com' }}</p>
                <p>Phone: {{ $candidate->phone_number_candidate ?? '(024) 6680 5588' }}</p>
                <p>Address: {{ $candidate->address ?? 'Quận A, Hà Nội' }}</p>
            </div>

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
                document.getElementById('chrome-container').style.backgroundColor = selectedColor;
                document.getElementById('hiddenBgColor').value = selectedColor;
            });
        </script>
    </div>

    <!-- Style -->
    <style>
        .chrome-container {
            max-width: 900px;
            margin: 0 auto;
            border: 1px solid #E0E0E0;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .chrome-tab-bar {
            border-radius: 10px 10px 0 0;
        }

        .cv-section {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            border-left: 5px solid #00838F;
            padding-left: 10px;
            color: #00838F;
            font-size: 1.4em;
        }

        .cv-avatar img {
            border-radius: 50%;
            border: 4px solid #00838F;
        }

        .experience-list,
        .education-list,
        .skills-list {
            list-style: none;
            padding-left: 0;
        }

        .experience-dates,
        .education-dates {
            color: #757575;
        }

        /* Dynamic color classes for background */
        .cv-section.blue {
            background-color: #e3f2fd;
        }

        .cv-section.green {
            background-color: #e8f5e9;
        }

        .cv-section.purple {
            background-color: #f3e5f5;
        }

        .cv-section.red {
            background-color: #ffebee;
        }
    </style>
@endsection
