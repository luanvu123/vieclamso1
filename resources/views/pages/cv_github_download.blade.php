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

        .github-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f6f8fa;
            color: #24292e;
        }

        .github-header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #e1e4e8;
        }

        .github-profile {
            display: flex;
        }

        .github-avatar img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 2px solid #d1d5da;
        }

        .github-info {
            margin-left: 20px;
        }

        .github-name {
            font-size: 24px;
            font-weight: bold;
        }

        .github-status {
            font-size: 16px;
            color: #586069;
        }

        .cv-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e1e4e8;
            border-radius: 5px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .section-title img {
            margin-right: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="github-container" id="github-container" style="background-color: #ffffff;">
        <!-- GitHub Header -->
        <header class="github-header">
            <div class="github-profile">
                <div class="github-avatar">
                    <img src="{{ $candidate->avatar_candidate ? public_path('storage/' . $candidate->avatar_candidate) : public_path('storage/avatar/avatar-default.jpg') }}"
                        alt="Avatar" />
                </div>
                <div class="github-info">
                    <h1 class="github-name">{{ $candidate->fullname_candidate }}</h1>
                    <p class="github-status">{{ $candidate->position }}</p>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section class="cv-section about">
            <h2 class="section-title"> About</h2>
            <p>Email: {{ $candidate->email }}</p>
            <p>Phone: {{ $candidate->phone_number_candidate }}</p>
            <p>Address: {{ $candidate->address }}</p>
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
            <h2 class="section-title"> Skills</h2>
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
