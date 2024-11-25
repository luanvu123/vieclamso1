@extends('layout')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
            color: #333;
        }

        .cv-container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-avatar {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            overflow: hidden;
            margin: 0 auto;
            border: 2px solid #4a90e2;
        }

        .profile-avatar img {
            width: 100%;
            height: auto;
        }

        h1 {
            font-size: 24px;
            margin: 10px 0 5px;
        }

        p {
            margin: 5px 0;
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            font-size: 20px;
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #357ABD;
        }
    </style>
    <style>
        /* CSS cho CV phong cách tối giản và chuyên nghiệp với biểu tượng và màu sắc */
        .cv-minimalism {
            max-width: 900px;
            margin: auto;
            padding: 40px;
            background-color: #f9f9f9;
        }

        .cv-container {
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .cv-header {
            margin-bottom: 40px;
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .cv-name {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #333;
        }

        .cv-position {
            font-size: 18px;
            color: #777;
            margin-bottom: 20px;
        }

        .cv-body {
            font-size: 16px;
            color: #555;
        }

        .cv-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #0056b3;
        }

        .cv-section p {
            margin: 0 0 10px;
        }

        .skills-list {
            list-style: none;
            padding: 0;
        }

        .skills-list li {
            padding-left: 25px;
            position: relative;
            margin-bottom: 10px;
            font-size: 16px;
            color: #0056b3;
        }

        .skills-list li i {
            position: absolute;
            left: 0;
            color: #0056b3;
        }

        .experience-list {
            list-style: none;
            padding: 0;
        }

        .experience-list li {
            padding-left: 20px;
            margin-bottom: 10px;
            border-left: 3px solid #0056b3;
            padding-left: 15px;
            color: #333;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            padding: 10px 25px;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #004494;
        }
    </style>
    <div class="cv-container" id="cv-container">

        <header>
            <div class="profile-avatar">
                <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                    alt="Avatar">
            </div>
            <h1>{{ $candidate->fullname_candidate }}</h1>
            <p>{{ $candidate->position ?? 'Lập trình viên' }}</p>
        </header>

        <section class="about">
            <h2>Thông tin cá nhân</h2>
            <p>Email: {{ $candidate->email ?? 'vieclamso1@gmail.com' }}</p>
            <p>Phone: {{ $candidate->phone_number_candidate ?? '(024) 6680 5588' }}</p>
            <p>Address: {{ $candidate->address ?? 'Quận A, Hà Nội' }}</p>
        </section>

        <section class="work-experience">
            <h2>Kinh nghiệm làm việc</h2>
            <ul>
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
        </section>

        <section class="education">
            <h2>Giáo dục</h2>
            <ul>
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
        </section>

        <section class="skills">
            <h2>Kỹ năng</h2>
            <ul>
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
        </section>

        <section class="hobbies">
            <h2>Sở thích</h2>
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
        </section>

        <section class="certificates">
            <h2>Chứng chỉ</h2>
              @if ($candidate->certificates && $candidate->certificates->count() > 0)
                    <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
                @else
                    <p>Giải nhất Tài năng TOPCV</p>
                @endif
        </section>

        <section class="activities">
            <h2>Hoạt động</h2>
            <ul>
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
            </ul>
        </section>

        <section class="advisers">
            <h2>Cố vấn</h2>
            <ul>
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
            </ul>
        </section>

        <section class="prizes">
            <h2>Giải thưởng</h2>
            <ul>
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
            </ul>
        </section>
        <script>
            // Thay đổi màu nền khi chọn màu
            document.getElementById('colorPicker').addEventListener('input', function() {
                const selectedColor = this.value;
                document.getElementById('cv-container').style.backgroundColor = selectedColor;
                document.getElementById('hiddenBgColor').value = selectedColor;
            });
        </script>
        <form action="{{ route('cvMinimalism.download') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" id="hiddenBgColor" name="bgcolor" value="#ffffff">
            <button type="submit" class="btn">Tải xuống PDF</button>
             <a href="{{ route('cv.overview') }}" class="btn btn-warning">Dùng mẫu này</a>
        </form>

    </div>
@endsection
