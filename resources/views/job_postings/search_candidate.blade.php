@extends('dashboard-employer')


@section('content')
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                {{-- <span>Đã tìm thấy 1000 ứng viên:</span> --}}
                <h2>Tìm ứng viên mới</h2>
            </div>

            <div class="six columns">
                <a href="{{route('job_postings.saved_profiles')}}" class="button">Ứng viên đã lưu!</a>
            </div>

        </div>
    </div>


    <!-- Content
                                            ================================================== -->
    <div class="container">
        <style>
            .container .eleven.columns {
                width: 715px;
            }
        </style>
        <!-- Recent Jobs -->
        <div class="eleven columns">
            <div class="padding-right">
                <div class="listings-container">
                    @foreach ($candidates as $candidate)
                        @if ($candidate->working_form == 'Fulltime')
                            <a href="{{ route('candidates.show.cv', $candidate->id) }}" class="listing full-time">
                            @elseif ($candidate->working_form == 'Part time')
                                <a href="{{ route('candidates.show.cv', $candidate->id) }}" class="listing part-time">
                                @elseif ($candidate->working_form == 'Thực tập sinh')
                                    <a href="{{ route('candidates.show.cv', $candidate->id) }}" class="listing internship">
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
                                <li><i class="ln ln-icon-Management"></i> {{ $candidate->years_of_experience }} năm</li>
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
                                    <!-- Nút Lưu Hồ Sơ -->
                                    <form action="{{ route('job_postings.save_profile', $candidate->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="listing-date new">Lưu</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        </a>
                    @endforeach
                </div>
                <div class="clearfix"></div>

                <!-- Liên kết phân trang -->
                <div class="pagination-container">
                    {{ $candidates->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>




        <!-- Widgets -->
        <div class="five columns">
            <!-- Sort by -->

            <h4>Lọc theo</h4>
            <form action="{{ route('job_postings.search_candidate') }}" method="GET">
                <!-- Input tìm kiếm -->
                <div class="widget">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Tìm kiếm ứng viên...">
                </div>
                <div class="widget">
                    <!-- Dropdown lọc thứ tự -->
                    <select name="filter" class="chosen-select-no-single">
                        <option value="recent" {{ request('filter') == 'recent' ? 'selected' : '' }}>Gần nhất</option>
                        <option value="oldest" {{ request('filter') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                        <option value="ratehigh" {{ request('filter') == 'ratehigh' ? 'selected' : '' }}>Số năm kinh
                            nghiệm</option>
                    </select>
                </div>
                <div class="widget">
                    <!-- Dropdown lọc theo danh mục -->
                    <select name="category_candidate" class="chosen-select-no-single">
                        <option value="">Tất cả danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_candidate') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Nút tìm kiếm -->
                <button type="submit" class="btn-search">Lọc</button>
            </form>

        </div>
    </div>
@endsection
