<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải CV PDF</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            /* Use a font that supports Vietnamese */
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .classic-container {
            font-family: 'DejaVu Sans', sans-serif;
            /* Sử dụng font hỗ trợ tiếng Việt */
            color: #333;
            line-height: 1.6;
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
</head>

<body>
    <div class="classic-container" id="cv-container">
        <!-- Classic Header -->
        <header class="classic-header">
            <div class="classic-profile">
                <div class="classic-avatar">
                    <img src="{{ $candidate->avatar_candidate ? public_path('storage/' . $candidate->avatar_candidate) : public_path('storage/avatar/avatar-default.jpg') }}"
                        alt="Avatar" />
                </div>
                <div class="classic-info">
                    <h1 class="classic-name">{{ $candidate->fullname_candidate }}</h1>
                    <p class="classic-status">{{ $candidate->position }}</p>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section class="cv-section about">
            <h2 class="section-title"> About</h2>
            <p><strong>Email:</strong> {{ $candidate->email }}</p>
            <p><strong>Phone:</strong> {{ $candidate->phone_number_candidate }}</p>
            <p><strong>Address:</strong> {{ $candidate->address }}</p>
        </section>

        <!-- Work Experience -->
        <section class="cv-section work-experience">
            <h2 class="section-title"> Work Experience</h2>
            <ul>
                @foreach ($candidate->experiences as $experience)
                    <li>
                        <strong>{{ $experience->title }}</strong> at {{ $experience->company }}<br>
                        <span class="experience-dates">({{ $experience->start_date }} -
                            {{ $experience->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <!-- Education -->
        <section class="cv-section education">
            <h2 class="section-title"> Education</h2>
            <ul>
                @foreach ($candidate->educations as $education)
                    <li>
                        <strong>{{ $education->school }}</strong> - {{ $education->degree }}<br>
                        <span class="education-dates">({{ $education->start_date }} -
                            {{ $education->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <!-- Skills -->
        <section class="cv-section skills">
            <h2 class="section-title">Skills</h2>
            <ul>
                @foreach ($candidate->skills as $skill)
                    <li><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $skill->name }}</li>
                @endforeach
            </ul>
        </section>

        <!-- Hobbies -->
        <section class="cv-section hobbies">
            <h2 class="section-title"> Hobbies</h2>
            <p>{{ $candidate->hobbies->pluck('name')->implode(', ') }}</p>
        </section>

        <!-- Certificates -->
        <section class="cv-section certificates">
            <h2 class="section-title"> Certificates</h2>
            <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
        </section>

        <!-- Activities -->
        <section class="cv-section activities">
            <h2 class="section-title"> Activities</h2>
            <ul>
                @foreach ($candidate->activities as $activity)
                    <li>
                        <strong>{{ $activity->title }}</strong><br>
                        <span class="experience-dates">({{ $activity->start_date }} -
                            {{ $activity->end_date }})</span>
                        <p>{{ $activity->description }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <!-- Advisers -->
        <section class="cv-section advisers">
            <h2 class="section-title"> Advisers</h2>
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
            <h2 class="section-title"> Prizes</h2>
            <ul>
                @foreach ($candidate->prizes as $prize)
                    <li>
                        <strong>{{ $prize->title }}</strong> - {{ $prize->organization }}<br>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</body>

</html>
