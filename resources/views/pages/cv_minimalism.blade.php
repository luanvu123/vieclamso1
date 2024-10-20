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
            <p>{{ $candidate->position }}</p>
        </header>

        <section class="about">
            <h2>Thông tin cá nhân</h2>
            <p>Email: {{ $candidate->email }}</p>
            <p>Điện thoại: {{ $candidate->phone_number_candidate }}</p>
            <p>Địa chỉ: {{ $candidate->address }}</p>
        </section>

        <section class="work-experience">
            <h2>Kinh nghiệm làm việc</h2>
            <ul>
                @foreach ($candidate->experiences as $experience)
                    <li>
                        <strong>{{ $experience->title }}</strong> tại {{ $experience->company }}<br>
                        <span>({{ $experience->start_date }} - {{ $experience->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="education">
            <h2>Giáo dục</h2>
            <ul>
                @foreach ($candidate->educations as $education)
                    <li>
                        <strong>{{ $education->school }}</strong> - {{ $education->degree }}<br>
                        <span>({{ $education->start_date }} - {{ $education->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="skills">
            <h2>Kỹ năng</h2>
            <ul>
                @foreach ($candidate->skills as $skill)
                    <li><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $skill->name }}</li>
                @endforeach
            </ul>
        </section>

        <section class="hobbies">
            <h2>Sở thích</h2>
            <p>{{ $candidate->hobbies->pluck('name')->implode(', ') }}</p>
        </section>

        <section class="certificates">
            <h2>Chứng chỉ</h2>
            <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
        </section>

        <section class="activities">
            <h2>Hoạt động</h2>
            <ul>
                @foreach ($candidate->activities as $activity)
                    <li>
                        <strong>{{ $activity->title }}</strong><br>
                        <span>({{ $activity->start_date }} - {{ $activity->end_date }})</span>
                        <p>{{ $activity->description }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="advisers">
            <h2>Cố vấn</h2>
            <ul>
                @foreach ($candidate->advisers as $adviser)
                    <li>
                        <strong>{{ $adviser->name }}</strong> - {{ $adviser->position }}<br>
                        <p>{{ $adviser->company }} - {{ $adviser->description }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="prizes">
            <h2>Giải thưởng</h2>
            <ul>
                @foreach ($candidate->prizes as $prize)
                    <li>
                        <strong>{{ $prize->title }}</strong> - {{ $prize->organization }}<br>
                    </li>
                @endforeach
            </ul>
        </section>

        <form action="{{ route('cvMinimalism.download') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn">Tải xuống PDF</button>
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
@endsection
