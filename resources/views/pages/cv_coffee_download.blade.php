<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Resume</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            /* Hỗ trợ tiếng Việt */
            background-color: #EBECF0;
        }

        .main-section2 {
            width: 21cm;
            height: 29.7cm;
            background-color: rgb(245, 15, 15);
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            /* Đặt hướng flex là hàng */
            flex-wrap: nowrap;
            /* Ngăn nội dung xuống dòng */
            align-items: flex-start;
            /* Căn các phần tử theo hàng trên cùng */
            justify-content: space-between;
            /* Đảm bảo khoảng cách giữa các phần tử */
            padding: 0;
            box-sizing: border-box;
            border: 1px solid red;
        }


        /* Phần trái chiếm 30% */
        .left-part {
            width: 30%;
            background-color: #f8f8f8;
            padding: 1cm;
            box-sizing: border-box;
            /* Đảm bảo padding không làm tăng kích thước phần tử */
            overflow: hidden;
            /* Ngăn chặn tràn nội dung */
        }

        /* Phần phải chiếm 70% */
        .right-part {
            width: 70%;
            /* Sửa lại chiều rộng để chiếm 70% */
            padding: 1cm;
            box-sizing: border-box;
            /* Đảm bảo padding không làm tăng kích thước phần tử */
            overflow: hidden;
            /* Ngăn chặn tràn nội dung */
            background-color: #6d26df;
        }

        .left-part,
        .right-part {
            flex-shrink: 1;
            /* Cho phép các phần tử co lại nếu vượt quá kích thước cha */
        }


        .left-part .photo-container img {
            border-radius: 50%;
            width: 170px;
            height: 170px;
            margin-bottom: 30px;
            border: 1rem solid white;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        /* Tựa đề */
        .title2 {
            font-size: 1.2rem;
            text-transform: uppercase;
            background-color: #444440;
            color: white;
            text-align: center;
            padding: 0.4rem;
            margin-bottom: 1rem;
        }

        /* Contact list */
        .contact-list {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #444440;
            margin-bottom: 0.8rem;
        }

        /* Thiết lập khi in */
        @media print {
            body {
                background-color: white;
            }

            .main-section2 {
                margin: 0;
                padding: 0;
                width: 21cm;
                height: 29.7cm;
                box-shadow: none;
            }

            .left-part,
            .right-part {
                padding: 0;
            }

            img {
                max-width: 100%;
                height: auto;
            }

            .main-section2 {
                width: 21cm;
                height: 29.7cm;
                display: flex;
                flex-direction: row;
            }

            .left-part {
                width: 30%;
            }

            .right-part {
                width: 69%;
                /* Giảm nhẹ để đảm bảo không tràn */
            }
        }
    </style>
</head>

<body>
    <section class="main-section2">
        <div class="left-part">
            <div class="photo-container">
                @php
                    $avatarPath = $candidate->avatar_candidate
                        ? public_path('storage/' . $candidate->avatar_candidate)
                        : public_path('storage/avatar/avatar-default.jpg');
                @endphp
                <img src="{{ $avatarPath }}">
            </div>
            <div class="contact-container">
                <h2 class="title2">Contact Me</h2>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p>{{ $candidate->address }}</p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p>{{ $candidate->email }}</p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <div class="contact-text">
                        <p>{{ $candidate->linkedin }}</p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-linkedin"></i>
                    </div>
                    <div class="contact-text">
                        <p>{{ $candidate->phone_number_candidate }}</p>
                    </div>
                </div>
            </div>
            <div class="education-container">
                <h2 class="title2">Education</h2>
                <ul class="education-list">
                    @foreach ($candidate->educations as $education)
                        <li>
                            <strong>{{ $education->school }}</strong> {{ $education->degree }}<br>
                            <span class="education-dates">({{ $education->start_date }} -
                                {{ $education->end_date }})</span>
                            <p>{{ $education->description }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="skills-container">
                <h2 class="title2">Skills</h2>
                <ul class="skills-list">
                    @foreach ($candidate->skills as $skill)
                        <li><i class="fa fa-check-circle" style="color: #00838F;"></i> {{ $skill->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="right-part">
            <div class="banner">
                <h1 class="firstname">{{ $candidate->fullname_candidate }}</h1>
                <p class="position">{{ $candidate->position }}</p>
            </div>

            <div class="work-container">
                <h2 class="title2 text-left">Work Experience</h2>
                <ul class="experience-list">
                    @foreach ($candidate->experiences as $experience)
                        <li>
                            <strong>{{ $experience->title }}</strong> {{ $experience->company }}<br>
                            <span class="experience-dates">({{ $experience->start_date }} -
                                {{ $experience->end_date }})</span>
                            <p>{{ $experience->description }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="references-container">
                <h2 class="title2 text-left">References</h2>
                <div class="references">
                    <ul class="experience-list">
                        @foreach ($candidate->advisers as $adviser)
                            <li>
                                <strong>{{ $adviser->name }}</strong> - {{ $adviser->position }}<br>
                                <p>{{ $adviser->company }} - {{ $adviser->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="references-container">
                <h2 class="title2 text-left">Activities</h2>
                <div class="references">
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
                </div>
            </div>

            <div class="references-container">
                <h2 class="title2 text-left">Certificates</h2>
                <div class="references">
                    <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
