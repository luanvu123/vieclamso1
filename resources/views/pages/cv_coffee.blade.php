@extends('layout')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #EBECF0;
        }

        .main-section2 {
            width: 210mm;
            height: 297mm;
            background-color: white;
            margin: 0 auto;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
        }

        .main-section2 .left-part {
            width: 60%;
            height: 100%;
            background-color: #F4F4F4;
            padding: 2.8rem;
        }

        .left-part .photo-container {
            margin-bottom: 2.2rem;
        }

        .left-part .photo-container img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            border: 1rem solid white;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        .title2 {
            font-family: 'Public Sans', sans-serif;
            font-size: 1.4rem;
            text-transform: uppercase;
            padding: 0.6rem;
            background-color: #444440;
            color: white;
            text-align: center;
            margin: 1.4rem 0;
        }

        .contact-container {
            margin-bottom: 2.2rem;
        }

        .contact-container .contact-list {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            font-family: 'Lato', sans-serif;
            color: #444440;
            font-size: 1rem;
        }

        .education-container {
            margin-bottom: 2.2rem;
            font-family: 'Lato', sans-serif;
        }

        .education-container .course {
            margin-bottom: 1rem;
            color: #414042;
        }

        .education-container .education-title2 {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: .3rem;
        }

        .education-container .college-name {
            margin-bottom: 0.3rem;
            font-weight: 600;

        }

        .education-container .education-date {
            font-size: 0.9rem;
        }

        .skills-container .skill {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.6rem;
            font-family: 'Lato', sans-serif;
        }

        .skills-container .skill .right-skill .outer-layer {
            background-color: #BBBBBB;
            height: 0.4rem;
            width: 5rem;
            border-radius: 0.4rem;
        }

        .skills-container .skill .right-skill .inner-layer {
            background-color: #3D3D3D;
            height: 100%;
            border-radius: inherit;
        }

        .right-part {
            padding: 2.8rem;
        }

        .right-part .banner {
            font-family: 'Open Sans', sans-serif;
            color: #4D4D4F;
            margin-bottom: 2.2rem;
        }

        .right-part .banner .firstname {
            font-size: 4rem;
        }

        .right-part .banner .lastname {
            font-size: 4rem;
            font-weight: 400;
            letter-spacing: 0.5rem;
            margin-top: -1rem;
        }

        .right-part .banner .position {
            letter-spacing: 0.3rem;
            margin-top: -0.5rem;
            font-size: 1.1rem;
        }

        .work-container {
            margin-top: 5rem;
            font-family: 'Lato', sans-serif;
        }

        .work-container .work:not(:last-child) {
            margin-bottom: 1.8rem;
        }

        .work-container .work .job-date {
            display: flex;
            justify-content: space-between;
            color: #4D4D4F;
            margin-bottom: 0.5rem;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .work-container .work .company-name {
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #4D4D4F;

        }

        .work-container .work .work-text {
            color: #737373;
            font-size: 0.8rem;
            text-align: justify;
            line-height: 1rem;
        }

        .references-container .references {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            font-family: 'Lato', sans-serif;
            color: #4D4D4F;
        }

        .references-container .references .name {
            font-weight: 800;
            font-size: 1.1rem;
        }

        .references-container .references .company-name {
            margin: 0.5rem 0;
            font-size: 0.9rem;
        }

        .references-container .references .phone {
            display: flex;
            justify-content: space-between;
            font-size: 0.7rem;
            color: #414042;
        }

        .references-container .references .phone p {
            margin: 0.4rem 0;
        }

        .references-container .references .phone .phone-text {
            font-weight: 600;
        }

        .text-left {
            text-align: left;
        }
    </style>
    <section class="main-section2">
        <div class="left-part">
            <div class="photo-container">
                <img
                    src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}">
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
                        </p>
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

            <div class="work-container ">
                <h2 class="title2 text-left">work experience</h2>
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
                <h2 class="title2 text-left"> Certificates</h2>
                <div class="references">
                    <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
                </div>
            </div>
        </div>
        <form action="{{ route('cvCoffee.download') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-primary">Download PDF</button>
        </form>
    </section>
@endsection
