@extends('dashboard-employer')

@section('content')
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                <h2>Hồ sơ đã lưu</h2>
            </div>

            <div class="six columns">
                <a href="{{ route('job_postings.search_candidate') }}" class="button">Tìm ứng viên mới!</a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <style>
            .container .eleven.columns {
                width: 715px;
            }
        </style>

        <!-- Saved Profiles -->
        <div class="eleven columns">
            <div class="padding-right">
                <div class="listings-container">
                    @forelse ($savedProfiles as $savedProfile)
                        @php
                            $candidate = $savedProfile->candidate;
                        @endphp

                        @if ($candidate)
                            @if ($candidate->working_form == 'Fulltime')
                                <a href="{{ route('candidates.show.cv', $candidate->id) }}" class="listing full-time">
                                @elseif ($candidate->working_form == 'Part time')
                                    <a href="{{ route('candidates.show.cv', $candidate->id) }}" class="listing part-time">
                                    @elseif ($candidate->working_form == 'Thực tập sinh')
                                        <a href="{{ route('candidates.show.cv', $candidate->id) }}"
                                            class="listing internship">
                                        @elseif ($candidate->working_form == 'Freelance')
                                            <a href="{{ route('candidates.show.cv', $candidate->id) }}"
                                                class="listing freelance">
                                            @else
                                                <a href="{{ route('candidates.show.cv', $candidate->id) }}"
                                                    class="listing default">
                            @endif
                            <div class="listing-logo">
                                <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                    alt="">
                            </div>
                            <div class="listing-title">
                                <h4>{{ $candidate->position }} - {{ $candidate->fullname_candidate }}
                                    <span class="listing-type">{{ $candidate->working_form }}</span>
                                </h4>
                                <ul class="listing-icons">
                                    <li><i class="ln ln-icon-Management"></i> {{ $candidate->years_of_experience }} năm
                                    </li>
                                    <li><i class="ln ln-icon-Map2"></i>
                                        @foreach ($candidate->cities as $city)
                                            {{ $city->name }}@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><i class="ln ln-icon-Money-2"></i> {{ $candidate->desired_salary }}</li>
                                    <li>
                                        @if ($candidate->updated_at && $candidate->updated_at->diffInHours(now()) <= 5)
                                            <div class="listing-date new">new</div>
                                        @endif
                                    </li>
                                    <li>
                                        <form action="{{ route('job_postings.remove_saved_profile', $candidate->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="listing-date new">Xóa hồ sơ</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            </a>
                        @endif
                        @empty
                            <p>Không có hồ sơ nào được lưu.</p>
                        @endforelse
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="five columns">
                <h4>Gợi ý hành động</h4>
                <p>Bạn có thể tìm thêm ứng viên mới hoặc quản lý các hồ sơ đã lưu.</p>
            </div>
        </div>
    @endsection
