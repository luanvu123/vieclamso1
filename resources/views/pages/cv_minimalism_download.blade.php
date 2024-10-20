<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Minimalism Download</title>
    <style>
        /* CSS chính cho CV định dạng PDF */
        @page {
            margin: 20px;
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12pt;
            margin: 0;
            padding: 20px;
            background-color: #ffffff;
            color: #333;
        }

        .cv-container {
            width: 100%;
            background-color: #ffffff;
            padding: 20px;
            box-sizing: border-box;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-avatar {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            overflow: hidden;
            margin: 0 auto;
        }

        .profile-avatar img {
            width: 100%;
            height: auto;
        }

        h1 {
            font-size: 22px;
            margin: 10px 0 5px;
        }

        p {
            margin: 5px 0;
            line-height: 1.6;
        }

        section {
            margin-bottom: 15px;
        }

        h2 {
            font-size: 18px;
            border-bottom: 1px solid #4a90e2;
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 8px;
        }

        .strong {
            font-weight: bold;
        }

        .small {
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <div class="cv-container">
        <header>
            <div class="profile-avatar">
                @php
                    $avatarPath = $candidate->avatar_candidate
                        ? public_path('storage/' . $candidate->avatar_candidate)
                        : public_path('storage/avatar/avatar-default.jpg');
                @endphp
                <img src="{{ $avatarPath }}" alt="Avatar">
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
                        <span class="strong">{{ $experience->title }}</span> tại {{ $experience->company }}<br>
                        <span class="small">({{ $experience->start_date }} - {{ $experience->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="education">
            <h2>Giáo dục</h2>
            <ul>
                @foreach ($candidate->educations as $education)
                    <li>
                        <span class="strong">{{ $education->school }}</span> - {{ $education->degree }}<br>
                        <span class="small">({{ $education->start_date }} - {{ $education->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="skills">
            <h2>Kỹ năng</h2>
            <ul>
                @foreach ($candidate->skills as $skill)
                    <li>{{ $skill->name }}</li>
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
                        <span class="strong">{{ $activity->title }}</span><br>
                        <span class="small">({{ $activity->start_date }} - {{ $activity->end_date }})</span>
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
                        <span class="strong">{{ $adviser->name }}</span> - {{ $adviser->position }}<br>
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
                        <span class="strong">{{ $prize->title }}</span> - {{ $prize->organization }}
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</body>

</html>
