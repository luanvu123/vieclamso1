@extends('dashboard-employer')

@section('content')
    <style>
        .me-4 {
            width: 300px;
            margin-right: 1.5rem !important;
        }
    </style>
    <link media="all" type="text/css" rel="stylesheet"
        href="https://vieclam.topgialai.vn/themes/jobbox/plugins/bootstrap/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/plugins/language/css/language-public.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/plugins/cookie-consent/css/cookie-consent.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('themes/jobbox/plugins/bootstrap/bootstrap.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('themes/jobbox/css/style.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/plugins/job-board/css/avatar.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('vendor/core/core/base/libraries/tagify/tagify.css') }}">
    <div class="container">
        <div class="banner-hero banner-image-single"
            style="background: url('{{ $candidate->cover_image ? asset('storage/' . $candidate->cover_image) : asset('storage/pages/background-cover-candidate.png') }}') center no-repeat">
        </div>
        <div class="box-company-profile">
            <div class="image-candidate"><img
                    src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                    alt="{{ $candidate->fullname_candidate }}"></div>
            <div class="row mt-30">
                <div class="col-lg-8 col-md-12">
                    <h5 class="f-18">{{ $candidate->fullname_candidate }} <span
                            class="card-location font-regular ml-20"></span></h5>
                    <p class="mt-0 font-md color-text-paragraph-2 mb-15"></p>
                </div>
            </div>
        </div>
        <div class="border-bottom pt-10 pb-10"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-12 col-12 mb-50">
                <div class="content-single">
                    <div class="tab-content">
                        <div class="tab-content">
                            <div class="col-lg-12">
                                <div class="card profile-content-page mt-4 mt-lg-0">
                                    <ul class="profile-content-nav nav nav-pills border-bottom mb-50" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <h3 class="mt-0 mb-15 mt-15 color-brand-1">Tổng quan</h3>
                                        </li>
                                    </ul>
                                    <div class="card-body p-4">
                                        <div class="candidate-info d-flex align-items-center mb-4">
                                            <div class="candidate-avatar me-4">
                                                <img src="{{ asset('storage/' . $candidate->avatar_candidate) }}"
                                                    alt="{{ $candidate->fullname_candidate }}" class="rounded-circle"
                                                    style="width: 262px;height: 262px">
                                            </div>
                                            <div class="candidate-details">
                                                <h2 class="fs-24 fw-bold mb-1">{{ $candidate->fullname_candidate }}
                                                </h2>
                                                <p class="mb-1"><strong>Email:</strong> {{ $candidate->email }}</p>
                                                <p class="mb-1"><strong>Phone:</strong>
                                                    {{ $candidate->phone_number_candidate }}</p>
                                                <p class="mb-1"><strong>Address:</strong> {{ $candidate->address }}
                                                </p>
                                                <p class="mb-1"><strong>Position:</strong> {{ $candidate->position }}
                                                </p>
                                                <p class="mb-1"><strong>LinkedIn:</strong> <a
                                                        href="{{ $candidate->linkedin }}"
                                                        target="_blank">{{ $candidate->linkedin }}</a></p>
                                                <p class="mb-1"><strong>Gender:</strong> {{ $candidate->gender }}</p>
                                                <p class="mb-1"><strong>Date of Birth:</strong>
                                                    {{ \Carbon\Carbon::parse($candidate->dob)->format('d-m-Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="pills-tabContent">
                                            <h5 class="fs-18 fw-bold">Giới thiệu</h5>
                                            <p class="text-muted mt-4">{{ $candidate->story }}</p>

                                            <!-- Education Section -->
                                            <div class="candidate-education-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Giáo dục</h4>
                                                @foreach ($candidate->educations as $education)
                                                    <div class="candidate-education-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $education->institution }}</h6>
                                                            <p class="mb-2 text-muted">
                                                                {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }}
                                                                -
                                                                {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : 'Hiện tại' }}
                                                            </p>
                                                            <p class="text-muted">{{ $education->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Experience Section -->
                                            <div class="candidate-experience-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Kinh nghiệm</h4>
                                                @foreach ($candidate->experiences as $experience)
                                                    <div class="candidate-experience-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $experience->company }}</h6>
                                                            <p class="mb-2 text-muted">
                                                                {{ \Carbon\Carbon::parse($experience->start_date)->format('Y') }}
                                                                -
                                                                {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y') : 'Hiện tại' }}
                                                            </p>
                                                            <p class="text-muted">{{ $experience->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Skills Section -->
                                            <div class="candidate-skills-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Kỹ năng</h4>
                                                @foreach ($candidate->skills as $skill)
                                                    <div class="candidate-skill-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $skill->name }}</h6>
                                                            <p class="text-muted">{{ $skill->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Certificates Section -->
                                            <div class="candidate-certificates-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Chứng chỉ</h4>
                                                @foreach ($candidate->certificates as $certificate)
                                                    <div class="candidate-certificate-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $certificate->name }}</h6>
                                                            <p class="mb-2 text-muted">
                                                                {{ \Carbon\Carbon::parse($certificate->issue_date)->format('Y') }}
                                                            </p>
                                                            <p class="text-muted">{{ $certificate->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Projects Section -->
                                            <div class="candidate-projects-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Dự án</h4>
                                                @foreach ($candidate->projects as $project)
                                                    <div class="candidate-project-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $project->title }}</h6>
                                                            <p class="mb-2 text-muted">
                                                                {{ \Carbon\Carbon::parse($project->start_date)->format('Y') }}
                                                                -
                                                                {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y') : 'Hiện tại' }}
                                                            </p>
                                                            <p class="text-muted">{{ $project->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Activities Section -->
                                            <div class="candidate-activities-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Hoạt động</h4>
                                                @foreach ($candidate->activities as $activity)
                                                    <div class="candidate-activity-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $activity->title }}</h6>
                                                            <p class="mb-2 text-muted">
                                                                {{ \Carbon\Carbon::parse($activity->start_date)->format('Y') }}
                                                                -
                                                                {{ $activity->end_date ? \Carbon\Carbon::parse($activity->end_date)->format('Y') : 'Hiện tại' }}
                                                            </p>
                                                            <p class="text-muted">{{ $activity->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Hobbies Section -->
                                            <div class="candidate-hobbies-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Sở thích</h4>
                                                @foreach ($candidate->hobbies as $hobby)
                                                    <div class="candidate-hobby-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $hobby->name }}</h6>
                                                            <p class="text-muted">{{ $hobby->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Advisers Section -->
                                            <div class="candidate-advisers-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Người tham chiếu</h4>
                                                @foreach ($candidate->advisers as $adviser)
                                                    <div class="candidate-adviser-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $adviser->name }}</h6>
                                                            <p class="mb-2 text-muted">{{ $adviser->contact_info }}
                                                            </p>
                                                            <p class="text-muted">{{ $adviser->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Prizes Section -->
                                            <div class="candidate-prizes-details mt-4 pt-3">
                                                <h4 class="fs-17 fw-bold mb-0">Giải thưởng</h4>
                                                @foreach ($candidate->prizes as $prize)
                                                    <div class="candidate-prize-content mt-4 d-flex">
                                                        <div class="circle flex-shrink-0 bg-soft-primary">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="ms-4">
                                                            <h6 class="fs-16 mb-1">{{ $prize->title }}</h6>
                                                            <p class="mb-2 text-muted">{{ $prize->description }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
