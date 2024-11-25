@extends('layout')

@section('content')
<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
}

.cv-container {
    max-width: 1000px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.cv-header {
    display: flex;
    align-items: center;
    border-bottom: 2px solid #ccc;
    padding-bottom: 20px;
}

.cv-profile {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.cv-avatar img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 20px;
}

.cv-info {
    flex-grow: 1;
}

.cv-name {
    font-size: 24px;
    font-weight: bold;
}

.cv-status {
    font-size: 18px;
    color: #666;
}

.cv-section {
    margin: 20px 0;
}

.section-title {
    font-size: 20px;
    margin-bottom: 10px;
    color: #333;
}

ul {
    list-style-type: none;
    padding-left: 0;
}

ul li {
    margin: 5px 0;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

</style>
  <div class="cv-container" id="cv-container">

        <header class="cv-header">
            <div class="cv-profile">
                <div class="cv-avatar">
                    <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" alt="Avatar" />
                </div>
                <div class="cv-info">
                    <h1 class="cv-name">{{ $candidate->fullname_candidate }}</h1>
                    <p class="cv-status">{{ $candidate->position }}</p>
                </div>
            </div>
        </header>

        <section class="cv-section about">
            <h2 class="section-title"> Thông Tin Cá Nhân</h2>
            <p>Email: {{ $candidate->email ?? 'vieclamso1@gmail.com' }}</p>
            <p>Phone: {{ $candidate->phone_number_candidate ?? '(024) 6680 5588' }}</p>
            <p>Address: {{ $candidate->address ?? 'Quận A, Hà Nội' }}</p>
        </section>

         <div class="cv-section work-experience" style="margin-bottom: 30px;">
                <h2 class="section-title"> Work Experience</h2>
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
                <h2 class="section-title"> Education</h2>
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

                    Skills
                </h2>
                <ul class="skills-list">
                    @if ($candidate->skills && $candidate->skills->count() > 0)
                        @foreach ($candidate->skills as $skill)
                            <li> {{ $skill->name }}</li>
                        @endforeach
                    @else
                        <li> Sử dụng thành thạo các công cụ Word,
                            Excel, PowerPoint</li>
                        <li> Khả năng giao tiếp Tiếng Anh trôi
                            chảy</li>
                    @endif
                </ul>
            </div>

            <!-- Hobbies -->
            <div class="cv-section hobbies" style="margin-bottom: 30px;">
                <h2 class="section-title">
                   Hobbies
                </h2>
                <ul class="skills-list">
                    @if ($candidate->hobbies && $candidate->hobbies->count() > 0)
                        @foreach ($candidate->hobbies as $hobby)
                            <li>
                                {{ $hobby->name }}: {{ $hobby->description }}
                            </li>
                        @endforeach
                    @else
                        <li> Đọc sách: Nâng cao kiến thức và kỹ
                            năng chuyên môn</li>
                        <li> Du lịch: Khám phá văn hóa và ẩm thực
                            các vùng miền</li>
                    @endif
                </ul>
            </div>

            {{-- Certificates --}}
            <div class="cv-section certificates" style="margin-bottom: 30px;">
                <h2 class="section-title">
                   Certificates
                </h2>
                @if ($candidate->certificates && $candidate->certificates->count() > 0)
                    <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
                @else
                    <p>Giải nhất Tài năng TOPCV</p>
                @endif
            </div>
            <div class="cv-section activities" style="margin-bottom: 30px;">
                <h2 class="section-title">
                    Activities
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
                   Advisers
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
                   Prizes
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
        <form action="{{ route('cv.template.download') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-primary">Tải PDF</button>
            <a href="{{ route('cv.overview') }}" class="btn btn-warning">Dùng mẫu này</a>
        </form>
        </div>


@endsection
