@extends('layout')

@section('content')
<div class="classic-container" id="cv-container">
    <!-- Classic Header -->
    <header class="classic-header">
        <div class="classic-profile">
            <div class="classic-avatar">
                <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" alt="Avatar" />
            </div>
            <div class="classic-info">
                <h1 class="classic-name">{{ $candidate->fullname_candidate }}</h1>
                <p class="classic-status">{{ $candidate->position }}</p>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="cv-section about">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/file-infomation-meeting-note-paper-svgrepo-com.svg') }}" width="20" height="20"> About</h2>
        <p><strong>Email:</strong> {{ $candidate->email }}</p>
        <p><strong>Phone:</strong> {{ $candidate->phone_number_candidate }}</p>
        <p><strong>Address:</strong> {{ $candidate->address }}</p>
    </section>

    <!-- Work Experience -->
    <section class="cv-section work-experience">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/experience-information-knowledge-svgrepo-com.svg') }}" width="20" height="20"> Work Experience</h2>
        <ul>
            @foreach ($candidate->experiences as $experience)
                <li>
                    <strong>{{ $experience->title }}</strong> at {{ $experience->company }}<br>
                    <span class="experience-dates">({{ $experience->start_date }} - {{ $experience->end_date }})</span>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Education -->
    <section class="cv-section education">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/education-svgrepo-com.svg') }}" width="20" height="20"> Education</h2>
        <ul>
            @foreach ($candidate->educations as $education)
                <li>
                    <strong>{{ $education->school }}</strong> - {{ $education->degree }}<br>
                    <span class="education-dates">({{ $education->start_date }} - {{ $education->end_date }})</span>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Skills -->
    <section class="cv-section skills">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/skills-svgrepo-com.svg') }}" width="20" height="20"> Skills</h2>
        <ul>
            @foreach ($candidate->skills as $skill)
                <li><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $skill->name }}</li>
            @endforeach
        </ul>
    </section>

    <!-- Hobbies -->
    <section class="cv-section hobbies">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/read-news-learn-understand-paper-svgrepo-com.svg') }}" width="20" height="20"> Hobbies</h2>
        <p>{{ $candidate->hobbies->pluck('name')->implode(', ') }}</p>
    </section>

    <!-- Certificates -->
    <section class="cv-section certificates">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/diploma-roll-svgrepo-com.svg') }}" width="20" height="20"> Certificates</h2>
        <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
    </section>

    <!-- Activities -->
    <section class="cv-section activities">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/volunteer-kindness-care-heart-love-svgrepo-com.svg') }}" width="20" height="20"> Activities</h2>
        <ul>
            @foreach ($candidate->activities as $activity)
                <li>
                    <strong>{{ $activity->title }}</strong><br>
                    <span class="experience-dates">({{ $activity->start_date }} - {{ $activity->end_date }})</span>
                    <p>{{ $activity->description }}</p>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Advisers -->
    <section class="cv-section advisers">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/consultant-svgrepo-com.svg') }}" width="20" height="20"> Advisers</h2>
        <ul>
            @foreach ($candidate->advisers as $adviser)
                <li>
                    <strong>{{ $adviser->name }}</strong> - {{ $adviser->position }}<br>
                    <p>{{ $adviser->company }} - {{ $adviser->description }}</p>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Prizes -->
    <section class="cv-section prizes">
        <h2 class="section-title"><img src="{{ asset('backend_admin/images/award-star-ui-svgrepo-com.svg') }}" width="20" height="20"> Prizes</h2>
        <ul>
            @foreach ($candidate->prizes as $prize)
                <li>
                    <strong>{{ $prize->title }}</strong> - {{ $prize->organization }}<br>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Download Button -->
    <form action="{{ route('cv.template.download') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-primary">Download PDF</button>
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
    max-width: 800px; /* Chiều rộng tối đa cho CV */
    margin: 0 auto; /* Căn giữa */
    font-family: 'Times New Roman', serif; /* Font chữ cổ điển */
    color: #333; /* Màu chữ */
    line-height: 1.6; /* Khoảng cách dòng */
}

.classic-header {
    display: flex; /* Flexbox để căn chỉnh avatar và thông tin */
    border-bottom: 2px solid #ccc; /* Đường viền dưới */
    padding-bottom: 15px; /* Khoảng cách dưới */
    margin-bottom: 20px; /* Khoảng cách dưới */
}

.classic-avatar {
    margin-right: 20px; /* Khoảng cách bên phải cho avatar */
}

.classic-avatar img {
    width: 100px; /* Kích thước avatar */
    height: 100px; /* Tự động căn chỉnh chiều cao */
    border-radius: 50%; /* Bo tròn avatar */
}

.classic-info {
    flex-grow: 1; /* Căn giữa thông tin */
}

.classic-name {
    font-size: 24px; /* Kích thước chữ tên */
    margin: 0; /* Bỏ khoảng cách mặc định */
}

.classic-status {
    font-size: 18px; /* Kích thước chữ vị trí */
    color: #777; /* Màu chữ nhạt hơn */
}

.cv-section {
    margin-bottom: 20px; /* Khoảng cách giữa các section */
}

.section-title {
    font-size: 20px; /* Kích thước chữ tiêu đề section */
    border-bottom: 1px solid #ccc; /* Đường viền dưới cho tiêu đề */
    padding-bottom: 10px; /* Khoảng cách dưới tiêu đề */
}

.cv-section ul {
    list-style: none; /* Bỏ dấu đầu dòng */
    padding: 0; /* Bỏ khoảng cách */
}

.cv-section ul li {
    margin-bottom: 10px; /* Khoảng cách giữa các mục */
}

.btn-primary {
    background-color: #007bff; /* Màu nền cho nút */
    color: #fff; /* Màu chữ */
    border: none; /* Bỏ đường viền */
    padding: 10px 20px; /* Khoảng cách trong nút */
    border-radius: 5px; /* Bo góc nút */
    cursor: pointer; /* Con trỏ chuột */
    transition: background-color 0.3s; /* Hiệu ứng chuyển màu */
}

.btn-primary:hover {
    background-color: #0056b3; /* Màu nền khi hover */
}

</style>
@endsection

