@extends('layout')

@section('content')
    <div class="chrome-container" id="chrome-container" style="font-family: 'Arial', sans-serif; color: #333;">
       
        <!-- Chrome Tab Bar Simulation -->
        <div class="chrome-tab-bar" style="background-color: #f5f5f5; padding: 10px 20px; border-bottom: 2px solid #ddd;">
            <div class="chrome-tab" style="display: flex; align-items: center;">
                <div class="chrome-icon"
                    style="background: #fbbc05; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px;"></div>
                <div class="chrome-icon"
                    style="background: #34a853; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px;"></div>
                <div class="chrome-icon"
                    style="background: #ea4335; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px;"></div>
                <span style="font-weight: bold; font-size: 1.1em;">{{ $candidate->fullname_candidate }} - CV</span>
            </div>
        </div>

        <!-- Chrome Address Bar -->
        <div class="chrome-address-bar"
            style="background-color: #e0e0e0; padding: 8px 20px; display: flex; align-items: center; justify-content: space-between;">
            <input type="text" value="https://mycvprofile.com/{{ $candidate->fullname_candidate }}" readonly
                style="width: 100%; background-color: #fff; border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
        </div>

        <!-- CV Content -->
        <div class="cv-container" style="padding: 30px; background-color: #f9f9f9;">
            <div class="cv-header"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <div class="cv-info">
                    <h1 style="font-size: 2.5em; margin: 0;">{{ $candidate->fullname_candidate }}</h1>
                    <p style="color: #00838F; font-size: 1.2em;">{{ $candidate->position }}</p>
                </div>
                <div class="cv-avatar">
                    <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                        alt="Avatar" style="border-radius: 50%; width: 120px; height: 120px; border: 4px solid #00838F;">
                </div>
            </div>

            <!-- Personal Information -->
            <div class="cv-section personal-info" style="margin-bottom: 30px;">
                <h2 class="section-title"><i class="fa fa-user" aria-hidden="true"></i> Personal Information</h2>
                <p>Email: {{ $candidate->email }}</p>
                <p>Phone: {{ $candidate->phone_number_candidate }}</p>
                <p>Address: {{ $candidate->address }}</p>
            </div>

            <!-- Work Experience -->
            <div class="cv-section work-experience" style="margin-bottom: 30px;">
                <h2 class="section-title"><i class="fa fa-briefcase" aria-hidden="true"></i> Work Experience</h2>
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

            <!-- Education -->
            <div class="cv-section education" style="margin-bottom: 30px;">
                <h2 class="section-title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h2>
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

            <!-- Skills -->
            <div class="cv-section skills" style="margin-bottom: 30px;">
                <h2 class="section-title"><img src="{{ asset('backend_admin/images/skills-svgrepo-com.svg') }}"
                        width="20" height="20"> Skills</h2>
                <ul class="skills-list">
                    @foreach ($candidate->skills as $skill)
                        <li><i class="fa fa-check-circle" style="color: #00838F;"></i> {{ $skill->name }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Hobbies -->
            <div class="cv-section hobbies" style="margin-bottom: 30px;">
                <h2 class="section-title"><img
                        src="{{ asset('backend_admin/images/read-news-learn-understand-paper-svgrepo-com.svg') }}"
                        width="20" height="20"> Hobbies</h2>
                <ul class="skills-list">
                    @foreach ($candidate->hobbies as $hobby)
                        <li><i class="fa fa-check-circle" style="color: #00838F;"></i>  {{ $hobby->name }}:
                        {{ $hobby->description }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="cv-section certificates" style="margin-bottom: 30px;">
                <h2 class="section-title"><img src="{{ asset('backend_admin/images/diploma-roll-svgrepo-com.svg') }}"
                        width="20" height="20"> Certificates</h2>
                <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
            </div>
            <div class="cv-section activities" style="margin-bottom: 30px;">
                <h2 class="section-title"> <img
                        src="{{ asset('backend_admin/images/volunteer-kindness-care-heart-love-svgrepo-com.svg') }}"
                        width="20" height="20"> Activities</h2>
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

            <div class="cv-section advisers" style="margin-bottom: 30px;">
                <h2 class="section-title"> <img src="{{ asset('backend_admin/images/consultant-svgrepo-com.svg') }}"
                        width="20" height="20"> Advisers</h2>
                <ul class="experience-list">
                    @foreach ($candidate->advisers as $adviser)
                        <li>
                            <strong>{{ $adviser->name }}</strong> - {{ $adviser->position }}<br>
                            <p>{{ $adviser->company }} - {{ $adviser->description }}</p>

                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="cv-section prizes" style="margin-bottom: 30px;">
                <h2 class="section-title"> <img src="{{ asset('backend_admin/images/award-star-ui-svgrepo-com.svg') }}"
                        width="20" height="20"> Prizes</h2>
                <ul class="experience-list">
                    @foreach ($candidate->prizes as $prize)
                        <li>
                            <strong>{{ $prize->title }}</strong> - {{ $prize->organization }}<br>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- Download Button -->
        <form action="{{ route('cvChrome.download') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-primary">Download PDF</button>
        </form>
        <script>
            // Thay đổi màu nền khi chọn màu
            document.getElementById('colorPicker').addEventListener('input', function() {
                const selectedColor = this.value;
                document.getElementById('chrome-container').style.backgroundColor = selectedColor;
                document.getElementById('hiddenBgColor').value = selectedColor;
            });
        </script>
    </div>

    <!-- Style -->
    <style>
        .chrome-container {
            max-width: 900px;
            margin: 0 auto;
            border: 1px solid #E0E0E0;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .chrome-tab-bar {
            border-radius: 10px 10px 0 0;
        }

        .cv-section {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            border-left: 5px solid #00838F;
            padding-left: 10px;
            color: #00838F;
            font-size: 1.4em;
        }

        .cv-avatar img {
            border-radius: 50%;
            border: 4px solid #00838F;
        }

        .experience-list,
        .education-list,
        .skills-list {
            list-style: none;
            padding-left: 0;
        }

        .experience-dates,
        .education-dates {
            color: #757575;
        }

        /* Dynamic color classes for background */
        .cv-section.blue {
            background-color: #e3f2fd;
        }

        .cv-section.green {
            background-color: #e8f5e9;
        }

        .cv-section.purple {
            background-color: #f3e5f5;
        }

        .cv-section.red {
            background-color: #ffebee;
        }
    </style>
@endsection
