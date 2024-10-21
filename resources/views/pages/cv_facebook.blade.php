@extends('layout')

@section('content')
    <div class="facebook-container" id="facebook-container">
       
        <header class="facebook-header">
            <div class="facebook-profile">
                <div class="facebook-avatar">
                    <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                        alt="Avatar" />
                </div>
                <div class="facebook-info">
                    <h1 class="facebook-name">{{ $candidate->fullname_candidate }}</h1>
                    <p class="facebook-status">{{ $candidate->position }}</p>
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
            <button type="submit" class="btn btn-primary">Download PDF</button>
        </form>
        <script>
            // Thay đổi màu nền khi chọn màu
            document.getElementById('colorPicker').addEventListener('input', function() {
                const selectedColor = this.value;
                document.getElementById('facebook-container').style.backgroundColor = selectedColor;
                document.getElementById('hiddenBgColor').value = selectedColor;
            });
        </script>
    </div>

    <!-- Style -->
    <style>
        .facebook-container {
            max-width: 800px;
            margin: 0 auto;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .facebook-header {
            background-color: #4267B2;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            display: flex;
            align-items: center;
        }

        .facebook-profile {
            display: flex;
            align-items: center;
        }

        .facebook-avatar img {
            border-radius: 50%;
            border: 4px solid white;
            width: 100px;
            height: 100px;
        }

        .facebook-info {
            margin-left: 20px;
        }

        .facebook-name {
            font-size: 2em;
            margin: 0;
        }

        .facebook-status {
            color: #e7e9ed;
            font-size: 1.2em;
        }

        .cv-section {
            margin: 20px 0;
            padding: 15px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 1.5em;
            color: #4267B2;
            margin-bottom: 10px;
            border-bottom: 2px solid #4267B2;
            padding-bottom: 5px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .experience-dates,
        .education-dates {
            color: #6a737d;
            font-size: 0.9em;
        }

        /* Button styling */
        .btn-primary {
            background-color: #4267B2;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #365899;
        }
    </style>
@endsection
