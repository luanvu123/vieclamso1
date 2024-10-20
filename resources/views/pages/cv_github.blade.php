@extends('layout')

@section('content')
    <style>
        .github-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
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
    <div class="github-container"  id="github-container" style="background-color: #ffffff;">
        <form id="colorForm" class="text-center">
            <label for="colorPicker">Chọn màu nền cho CV:</label>
            <input type="color" id="colorPicker" name="bgcolor" value="#ffffff">
        </form>
        <!-- GitHub Header -->
        <header class="github-header">
            <div class="github-profile">
                <div class="github-avatar">
                    <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
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
            <h2 class="section-title"><img
                    src="{{ asset('backend_admin/images/file-infomation-meeting-note-paper-svgrepo-com.svg') }}"
                    width="20" height="20"> About</h2>
            <p>Email: {{ $candidate->email }}</p>
            <p>Phone: {{ $candidate->phone_number_candidate }}</p>
            <p>Address: {{ $candidate->address }}</p>
        </section>

        <!-- Work Experience -->
        <section class="cv-section work-experience">
            <h2 class="section-title"><img
                    src="{{ asset('backend_admin/images/experience-information-knowledge-svgrepo-com.svg') }}"
                    width="20" height="20"> Work Experience</h2>
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
            <h2 class="section-title"><img src="{{ asset('backend_admin/images/education-svgrepo-com.svg') }}"
                    width="20" height="20"> Education</h2>
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
            <h2 class="section-title"><img src="{{ asset('backend_admin/images/skills-svgrepo-com.svg') }}" width="20"
                    height="20"> Skills</h2>
            <ul>
                @foreach ($candidate->skills as $skill)
                    <li><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $skill->name }}</li>
                @endforeach
            </ul>
        </section>

        <!-- Hobbies -->
        <section class="cv-section hobbies">
            <h2 class="section-title"><img
                    src="{{ asset('backend_admin/images/read-news-learn-understand-paper-svgrepo-com.svg') }}"
                    width="20" height="20"> Hobbies</h2>
            <p>{{ $candidate->hobbies->pluck('name')->implode(', ') }}</p>
        </section>

        <!-- Certificates -->
        <section class="cv-section certificates">
            <h2 class="section-title"><img src="{{ asset('backend_admin/images/diploma-roll-svgrepo-com.svg') }}"
                    width="20" height="20"> Certificates</h2>
            <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
        </section>

        <!-- Activities -->
        <section class="cv-section activities">
            <h2 class="section-title"><img
                    src="{{ asset('backend_admin/images/volunteer-kindness-care-heart-love-svgrepo-com.svg') }}"
                    width="20" height="20"> Activities</h2>
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
            <h2 class="section-title"><img src="{{ asset('backend_admin/images/consultant-svgrepo-com.svg') }}"
                    width="20" height="20"> Advisers</h2>
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
            <h2 class="section-title"><img src="{{ asset('backend_admin/images/award-star-ui-svgrepo-com.svg') }}"
                    width="20" height="20"> Prizes</h2>
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
            <input type="hidden" name="bgcolor" id="hiddenBgColor" value="#ffffff">

            <button type="submit" class="btn btn-primary">Download PDF</button>
        </form>
        <script>
            // Thay đổi màu nền khi chọn màu
            document.getElementById('colorPicker').addEventListener('input', function() {
                const selectedColor = this.value;
                document.getElementById('github-container').style.backgroundColor = selectedColor;
                document.getElementById('hiddenBgColor').value = selectedColor;
            });
        </script>
    </div>


    <!-- Style -->
@endsection
