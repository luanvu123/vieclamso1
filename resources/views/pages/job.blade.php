@extends('layout')
@section('content')
    <style>
        @media (max-width: 768px) {
            .job-detail__body {
                flex-direction: column;
                /* Sắp xếp theo chiều dọc trên thiết bị nhỏ */
            }

            .job-detail__body-left,
            .job-detail__body-right {
                width: 100%;
                /* Full width cho thiết bị nhỏ */
                margin-bottom: 20px;
                /* Khoảng cách giữa các phần */
            }
        }
    </style>

    <div id="main" style="margin-top: 0px;">
        <div class="header">
            <div class="box-search-job">
                <div class="container">
                    <form class="search-form" action="/search-jobs" method="GET">
                        <div class="item item-search">
                            <input type="text" id="key" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                        </div>
                        <div class="item item-search">
                            <select id="city" name="city">
                                <option value="">Chọn thành phố</option>
                                @foreach ($cities as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="item item-search">
                            <button type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container job-detail" id="job-detail">
            <div class="ctn-breadcrumb-detail">
                <a href="{{ route('/') }}" class="text-highlight bold">Trang chủ</a> <i class="fa-solid fa-angle-right"></i>
                <a href="{{ route('/') }}" class="text-highlight bold">Tìm việc làm
                    {{ $jobPosting->category }}</a> <i class="fa-solid fa-angle-right"></i>
                <span class="text-dark-blue"> {{ $jobPosting->title }} [ @foreach ($jobPosting->cities as $city)
                    {{ $city->name }}@if (!$loop->last)
                        ,
                    @endif
                @endforeach]</span>
            </div>
            <div class="job-detail__wrapper">
                <div class="job-detail__body">
                    <div class="job-detail__body-left">
                        <div class="job-detail__box--left job-detail__info" id="header-job-info">
                            <div class="tag-job-flash" data-toggle="tooltip-flash-job" data-trigger="manual"
                                data-html="true" data-job-id="{{ $jobPosting->id }}"
                                data-template="<div data-job-id={{ $jobPosting->id }} class='flash-job-tag-tooltip tooltip' role='tooltip'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>"
                                title="" data-placement="top" data-container="body"
                                data-original-title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/huy-hieu-tia-set'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>">

                            </div>
                            <h1 class="job-detail__info--title  has-flash ">
                                {{ $jobPosting->title }}
                            </h1>
                            <div class="job-detail__info--sections">
                                <div class="job-detail__info--section">
                                    <div class="job-detail__info--section-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M21.92 16.75C21.59 19.41 19.41 21.59 16.75 21.92C15.14 22.12 13.64 21.68 12.47 20.82C11.8 20.33 11.96 19.29 12.76 19.05C15.77 18.14 18.14 15.76 19.06 12.75C19.3 11.96 20.34 11.8 20.83 12.46C21.68 13.64 22.12 15.14 21.92 16.75Z"
                                                fill="white"></path>
                                            <path
                                                d="M9.99 2C5.58 2 2 5.58 2 9.99C2 14.4 5.58 17.98 9.99 17.98C14.4 17.98 17.98 14.4 17.98 9.99C17.97 5.58 14.4 2 9.99 2ZM9.05 8.87L11.46 9.71C12.33 10.02 12.75 10.63 12.75 11.57C12.75 12.65 11.89 13.54 10.84 13.54H10.75V13.59C10.75 14 10.41 14.34 10 14.34C9.59 14.34 9.25 14 9.25 13.59V13.53C8.14 13.48 7.25 12.55 7.25 11.39C7.25 10.98 7.59 10.64 8 10.64C8.41 10.64 8.75 10.98 8.75 11.39C8.75 11.75 9.01 12.04 9.33 12.04H10.83C11.06 12.04 11.24 11.83 11.24 11.57C11.24 11.22 11.18 11.2 10.95 11.12L8.54 10.28C7.68 9.98 7.25 9.37 7.25 8.42C7.25 7.34 8.11 6.45 9.16 6.45H9.25V6.41C9.25 6 9.59 5.66 10 5.66C10.41 5.66 10.75 6 10.75 6.41V6.47C11.86 6.52 12.75 7.45 12.75 8.61C12.75 9.02 12.41 9.36 12 9.36C11.59 9.36 11.25 9.02 11.25 8.61C11.25 8.25 10.99 7.96 10.67 7.96H9.17C8.94 7.96 8.76 8.17 8.76 8.43C8.75 8.77 8.81 8.79 9.05 8.87Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="job-detail__info--section-content">
                                        <div class="job-detail__info--section-content-title">Mức lương</div>
                                        <div class="job-detail__info--section-content-value">{{ $jobPosting->salary }}
                                        </div>
                                    </div>
                                </div>
                                <div class="job-detail__info--section">
                                    <div class="job-detail__info--section-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                            fill="none">
                                            <path
                                                d="M21.2866 8.45C20.2366 3.83 16.2066 1.75 12.6666 1.75C12.6666 1.75 12.6666 1.75 12.6566 1.75C9.1266 1.75 5.0866 3.82 4.0366 8.44C2.8666 13.6 6.0266 17.97 8.8866 20.72C9.9466 21.74 11.3066 22.25 12.6666 22.25C14.0266 22.25 15.3866 21.74 16.4366 20.72C19.2966 17.97 22.4566 13.61 21.2866 8.45ZM12.6666 13.46C10.9266 13.46 9.5166 12.05 9.5166 10.31C9.5166 8.57 10.9266 7.16 12.6666 7.16C14.4066 7.16 15.8166 8.57 15.8166 10.31C15.8166 12.05 14.4066 13.46 12.6666 13.46Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="job-detail__info--section-content">
                                        <div class="job-detail__info--section-content-title">Địa điểm</div>
                                        <div class="job-detail__info--section-content-value">
                                            @foreach ($jobPosting->cities as $city)
                                                {{ $city->name }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                                <div class="job-detail__info--section" id="job-detail-info-experience">
                                    <div class="job-detail__info--section-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M17.39 15.67L13.35 12H10.64L6.59998 15.67C5.46998 16.69 5.09998 18.26 5.64998 19.68C6.19998 21.09 7.53998 22 9.04998 22H14.94C16.46 22 17.79 21.09 18.34 19.68C18.89 18.26 18.52 16.69 17.39 15.67ZM13.82 18.14H10.18C9.79998 18.14 9.49998 17.83 9.49998 17.46C9.49998 17.09 9.80998 16.78 10.18 16.78H13.82C14.2 16.78 14.5 17.09 14.5 17.46C14.5 17.83 14.19 18.14 13.82 18.14Z"
                                                fill="white"></path>
                                            <path
                                                d="M18.35 4.32C17.8 2.91 16.46 2 14.95 2H9.04998C7.53998 2 6.19998 2.91 5.64998 4.32C5.10998 5.74 5.47998 7.31 6.60998 8.33L10.65 12H13.36L17.4 8.33C18.52 7.31 18.89 5.74 18.35 4.32ZM13.82 7.23H10.18C9.79998 7.23 9.49998 6.92 9.49998 6.55C9.49998 6.18 9.80998 5.87 10.18 5.87H13.82C14.2 5.87 14.5 6.18 14.5 6.55C14.5 6.92 14.19 7.23 13.82 7.23Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="job-detail__info--section-content">
                                        <div class="job-detail__info--section-content-title">Kinh nghiệm</div>
                                        <div class="job-detail__info--section-content-value">
                                            {{ $jobPosting->experience }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (!$isExpired)
                                <div class="job-detail__info--flex">
                                    <div class="job-detail__info--deadline">
                                        <span class="job-detail__info--deadline--icon">
                                            <i class="fa-solid fa-clock"></i>
                                        </span>
                                        Hạn nộp hồ sơ: {{ $closingDate->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="job-detail__info--actions box-apply-current">
                                    @auth('candidate')
                                        @if (Auth::guard('candidate')->check())
                                            @if ($applied)
                                                {{-- Ứng tuyển thành công --}}
                                                <div class="job-detail__info--actions box-apply-success">
                                                    <a class="job-detail__info--actions-button button-primary open-apply-modal" href="#"
                                                        data-target="#applyModal" data-toggle="modal" data-job-id="{{ $jobPosting->id }}">
                                                        <span class="button-icon">
                                                            <i class="fa-solid fa-arrow-rotate-right"></i>
                                                        </span>
                                                        Ứng tuyển lại
                                                    </a>
                                                    <a class="job-detail__info--actions-button button-white" target="_blank"
                                                        href="{{ route('applications.showAppliedJobs') }}">
                                                        <span class="button-icon">
                                                            <i class="fa-solid fa-comments"></i>
                                                        </span>
                                                        Nhắn tin
                                                    </a>
                                                    <p style="margin-bottom: 0">
                                                        Bạn đã gửi CV cho vị trí này vào ngày:
                                                        <span class="date">{{ $appliedDate }}</span>.
                                                        <a href="{{ route('applications.showAppliedJobs') }}" target="_blank" type="button"
                                                            class="text-highlight show-applied-cv" style="margin-left: 5px">Xem CV đã
                                                            nộp</a>
                                                    </p>
                                                </div>
                                            @else
                                                <a href="#" class="btn btn-apply-now" data-toggle="modal" data-target="#applyModal"
                                                    data-job-id="{{ $jobPosting->id }}">
                                                    <span class="button-icon">
                                                        <i class="fa-light fa-paper-plane"></i>
                                                    </span>
                                                    Ứng tuyển ngay
                                                </a>
                                            @endif
                                        @endif
                                    @else
                                        <a href="#"
                                            class="job-detail__info--actions-button button-primary open-apply-modal btn-apply-job"
                                            data-toggle="modal" data-target="#applyModal" data-job-id="{{ $jobPosting->id }}">
                                            <span class="button-icon">
                                                <i class="fa-light fa-paper-plane"></i>
                                            </span>
                                            Ứng tuyển ngay
                                        </a>
                                    @endauth
                                    <a class="job-detail__info--actions-button button-white" href="#"
                                        onclick="saveJob({{ $jobPosting->id }})">
                                        <span class="button-icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </span>
                                        Lưu tin
                                    </a>
                                </div>
                            @else
                                {{-- Nếu hết hạn ứng tuyển --}}
                                <div class="job-detail__info--actions box-apply-current">
                                    <div class="job-detail__expired">
                                        <span class="job-detail__info--deadline--icon is-expired">
                                            <i class="fa-solid fa-brake-warning"></i>
                                        </span>
                                        Hết hạn ứng tuyển
                                    </div>
                                    <a href="#tab-job"
                                        class="job-detail__info--actions-button button-primary btn-view-job-similar"
                                        id="btn-view-job-similar">
                                        Xem việc làm liên quan
                                        <span class="button-icon">
                                            <i class="fa-solid fa-angles-down"></i>
                                        </span>
                                    </a>
                                </div>
                            @endif


                        </div>
                        <div class="job-detail__box--left">
                            <div class="job-detail__information-detail" id="box-job-information-detail">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="job-detail__information-detail--title">
                                        Chi tiết tin tuyển dụng
                                    </h2>
                                </div>
                                <div class="job-detail__information-detail--content">
                                    <div class="job-description">
                                        <div class="job-descriptn__item">
                                            <div class="job-description__item--content">
                                                @if (!empty($jobPosting->description))
                                                    <h3><strong>Mô tả công việc</strong></h3>
                                                    {!! $jobPosting->description !!}
                                                @endif

                                                @if (!empty($jobPosting->job_skills))
                                                    <h4><strong>Kỹ năng yêu cầu</strong></h4>
                                                    {!! $jobPosting->job_skills !!}
                                                @endif

                                                @if (!empty($jobPosting->benefits))
                                                    <h4><strong>Phúc lợi</strong></h4>
                                                    {!! $jobPosting->benefits !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="job-detail__information-detail--actions">
                                    <div class="job-detail__information-detail--actions-button box-apply-success"
                                        style="display: none">
                                        <a class="job-detail__info--actions-button button-primary open-apply-modal" href="#"
                                            data-toggle="modal">
                                            <span class="button-icon">
                                                <i class="fa-solid fa-arrow-rotate-right"></i>
                                            </span>
                                            Ứng tuyển lại
                                        </a>
                                        <a class="job-detail__info--actions-button button-white" target="_blank" href="">
                                            <span class="button-icon">
                                                <i class="fa-solid fa-comments"></i>
                                            </span>
                                            Nhắn tin
                                        </a>
                                    </div>
                                    <div class="job-detail__information-detail--actions-label">
                                        Hạn nộp hồ sơ: {{ $closingDate->format('d/m/Y') }}
                                    </div>
                                    @auth('candidate')
                                        <div class="job-detail__information-detail--actions-button box-apply-current">
                                            <button type="submit"
                                                class="job-detail__info--actions-button button-primary open-apply-modal btn-apply-job"
                                                data-toggle="modal" data-target="#applyModal"
                                                data-job-id="{{ $jobPosting->id }}">
                                                <span class="button-icon">
                                                    <i class="fa-light fa-paper-plane"></i>
                                                </span>
                                                Ứng tuyển ngay
                                            </button>
                                        </div>
                                    @endauth
                                </div>

                                <div class="job-detail__information-detail--report">
                                    <span class="job-detail__information-detail--report-icon">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </span>
                                    <span>
                                        Báo cáo tin tuyển dụng: Nếu bạn thấy rằng tin tuyển dụng này không đúng hoặc có dấu
                                        hiệu lừa đảo,
                                        <a class="btn-notice-job color-green"
                                            href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi/1400884.html?report-form=1', 'Đăng nhập hoặc Đăng ký để phản ánh tin tuyển dụng này!')">hãy
                                            phản ánh với chúng tôi.</a>
                                    </span>
                                </div>
                                <div class="mi-chart-workspace-wrap mi-chart-wrapper" id="job-fitness-area"
                                    data-job-fitness="false" style="display: flex;">
                                    <div class="mi-chart-workspace" data-job-id="1400884">
                                        <div class="mi-chart-workspace__header-wrapper">
                                            <div class="mi-chart-workspace__header">
                                                <div class="mi-chart-workspace__tick"></div>
                                                <h2 class="mi-chart-workspace__title">
                                                    Phân tích mức độ phù hợp của bạn với công việc
                                                </h2>
                                            </div>
                                            <div class="new-badge">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.00054 9.99999C4.86887 10.0007 4.74014 9.96113 4.63154 9.88668C4.52294 9.81224 4.43965 9.70642 4.39279 9.58337L3.35541 6.88575C3.3344 6.83139 3.30226 6.78202 3.26105 6.74082C3.21984 6.69961 3.17047 6.66747 3.11611 6.64645L0.417716 5.60829C0.294798 5.56111 0.189074 5.47777 0.114498 5.36927C0.0399225 5.26077 0 5.1322 0 5.00054C0 4.86888 0.0399225 4.74032 0.114498 4.63182C0.189074 4.52331 0.294798 4.43997 0.417716 4.3928L3.11533 3.35541C3.16969 3.3344 3.21906 3.30226 3.26027 3.26105C3.30148 3.21984 3.33362 3.17048 3.35463 3.11612L4.39279 0.417716C4.43997 0.294798 4.52331 0.189074 4.63181 0.114498C4.74031 0.0399224 4.86888 0 5.00054 0C5.1322 0 5.26076 0.0399224 5.36927 0.114498C5.47777 0.189074 5.56111 0.294798 5.60828 0.417716L6.64567 3.11533C6.66668 3.16969 6.69882 3.21906 6.74003 3.26027C6.78124 3.30148 6.8306 3.33362 6.88496 3.35463L9.56695 4.38655C9.69488 4.43396 9.80508 4.51965 9.88256 4.63194C9.96005 4.74422 10.001 4.87766 9.99998 5.01408C9.99799 5.14345 9.95722 5.26925 9.88295 5.37518C9.80867 5.48112 9.7043 5.56233 9.58336 5.60829L6.88574 6.64567C6.83138 6.66668 6.78202 6.69883 6.74081 6.74003C6.6996 6.78124 6.66746 6.83061 6.64645 6.88497L5.60828 9.58337C5.56143 9.70642 5.47813 9.81224 5.36953 9.88668C5.26094 9.96113 5.1322 10.0007 5.00054 9.99999Z"
                                                        fill="#966D05"></path>
                                                </svg>
                                                New
                                            </div>
                                        </div>
                                        <div class="mi-chart-workspace__body">
                                            <div class="mi-chart-workspace-alert-wrap">
                                                <div class="mi-chart-workspace-alert">
                                                    <div class="mi-chart-workspace-alert__icon">
                                                        <i class="fa-solid fa-circle-exclamation"></i>
                                                    </div>
                                                    <div
                                                        class="mi-chart-workspace-alert__content mi-chart-workspace-alert__content--1">
                                                        <div class="mi-chart-workspace-alert__message">
                                                            Toppy Ai chưa thể đưa ra đánh giá vì chưa có đủ hiểu biết về
                                                            năng lực của bạn. Vui
                                                            lòng
                                                            <a
                                                                href="javascript:showLoginPopup(null, 'Đăng nhập hoặc Đăng ký để ứng tuyển công việc này!')">Đăng
                                                                nhập</a> để giúp mình hiểu thêm và đánh giá giúp bạn nhé.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mi-chart-workspace__chart ">
                                                <div class="mi-chart-workspace__chart-row">
                                                    <div
                                                        class="mi-chart-workspace__chart-col-progress-bar mi-chart-workspace__chart-col-progress-bar--desktop">
                                                        <div class="mi-chart-workspace__progress-circle ">
                                                            <div class="mi-chart-workspace__progress-circle-content">
                                                                <h4 class="mi-chart-workspace__progress-circle-title">
                                                                    Đánh giá mức độ phù hợp
                                                                </h4>
                                                                <div>
                                                                    <img class="mi-chart-workspace__progress-circle-image entered loaded"
                                                                        data-src="https://www.topcv.vn/v4/image/job-fitness/toppy_ai_desktop-3x.png"
                                                                        alt="Mức độ phù hợp"
                                                                        src="https://www.topcv.vn/v4/image/job-fitness/toppy_ai_desktop-3x.png"
                                                                        data-ll-status="loaded">
                                                                </div>
                                                            </div>
                                                            <div class="circle-progress-bar">
                                                                <div class="circle-progress-bar__outer">
                                                                    <div class="circle-progress-bar__inner">
                                                                        <div class="circle-progress-bar__percent">
                                                                            <span id="progress-percent">--</span>%
                                                                        </div>
                                                                    </div>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="66"
                                                                        height="66" viewBox="0 0 66 66" fill="none">
                                                                        <circle class="progress-bar" cx="33" cy="33" r="30"
                                                                            stroke="url(#paint0_linear_1195_38016)"
                                                                            stroke-width="5" stroke-linecap="round"
                                                                            fill="none"></circle>
                                                                        <defs>
                                                                            <linearGradient id="paint0_linear_1195_38016"
                                                                                x1="66" y1="33" x2="22" y2="0"
                                                                                gradientUnits="userSpaceOnUse">
                                                                                <stop stop-color="#11D769"></stop>
                                                                                <stop offset="1" stop-color="#089682">
                                                                                </stop>
                                                                            </linearGradient>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="line-progress-bar-wrap">
                                                            <div id="line-progress-bar" class="line-progress-bar">
                                                                <div class="line-progress-bar__item">
                                                                    <div class="line-progress-bar__top">
                                                                        <div class="line-progress-bar__top--left">
                                                                            <div class="line-progress-bar__title">
                                                                                Vị trí công việc
                                                                            </div>
                                                                            <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-container=".mi-chart-workspace-wrap"
                                                                                data-original-title="Mức độ tương đồng của vị trí bạn đang làm việc/sẵn sàng ứng tuyển với vị trí mà công việc yêu cầu"></i>
                                                                        </div>
                                                                        <div class="line-progress-bar__top--right">
                                                                            <div
                                                                                class="line-progress-bar__percent line-progress-bar__percent--1">
                                                                                --%
                                                                            </div>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="line-progress-bar__progress line-progress-bar__progress--1">
                                                                        <div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="line-progress-bar__item line-progress-bar__item-exp-progress-bar">
                                                                    <div class="line-progress-bar__top line-progress-bar_">
                                                                        <div class="line-progress-bar__top--left">
                                                                            <div class="line-progress-bar__title">
                                                                                Mức độ kinh nghiệm
                                                                            </div>
                                                                            <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-container=".mi-chart-workspace-wrap"
                                                                                data-original-title="Mức độ tương đồng kinh nghiệm của bạn với kinh nghiệm mà công việc yêu cầu"></i>
                                                                        </div>
                                                                        <div class="line-progress-bar__top--right">
                                                                            <div
                                                                                class="line-progress-bar__percent line-progress-bar__percent--2">
                                                                                --%
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="line-progress-bar__progress line-progress-bar__progress--2">
                                                                        <div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="line-progress-bar__item line-progress-bar__item-exp-full">
                                                                    <img class="line-progress-bar__item-exp-full--icon"
                                                                        data-src="https://www.topcv.vn/v4/image/job-fitness/star_2.png"
                                                                        alt="star_2"
                                                                        src="https://www.topcv.vn/v4/image/job-fitness/star_2.png">
                                                                    <div class="line-progress-bar__item-exp-full--text">
                                                                        Mức độ kinh nghiệm của bạn cao hơn so với yêu cầu
                                                                        của việc làm
                                                                    </div>
                                                                </div>
                                                                <div class="line-progress-bar__item">
                                                                    <div class="line-progress-bar__top">
                                                                        <div class="line-progress-bar__top--left">
                                                                            <div class="line-progress-bar__title">
                                                                                Kỹ năng
                                                                            </div>
                                                                            <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-container=".mi-chart-workspace-wrap"
                                                                                data-original-title="Mức độ tương đồng của các kỹ năng bạn có với các kỹ năng mà công việc yêu cầu"></i>
                                                                        </div>
                                                                        <div class="line-progress-bar__top--right">
                                                                            <div
                                                                                class="line-progress-bar__percent line-progress-bar__percent--3">
                                                                                --%
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="line-progress-bar__progress line-progress-bar__progress--3">
                                                                        <div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="line-progress-bar__item">
                                                                    <div class="line-progress-bar__top">
                                                                        <div class="line-progress-bar__top--left">
                                                                            <div class="line-progress-bar__title">
                                                                                Định hướng
                                                                            </div>
                                                                            <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-container=".mi-chart-workspace-wrap"
                                                                                data-original-title="Mức độ tương đồng về định hướng nghề nghiệp của bạn (thể hiện qua thông tin ngành nghề và các hoạt động tương tác gần đây của bạn trên nền tảng) với yêu cầu về định hướng nghề nghiệp của công việc đang xem"></i>
                                                                        </div>
                                                                        <div class="line-progress-bar__top--right">
                                                                            <div
                                                                                class="line-progress-bar__percent line-progress-bar__percent--4">
                                                                                --%
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="line-progress-bar__progress line-progress-bar__progress--4">
                                                                        <div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="line-progress-bar__item">
                                                                    <div class="line-progress-bar__top">
                                                                        <div class="line-progress-bar__top--left">
                                                                            <div class="line-progress-bar__title">
                                                                                Yếu tố khác
                                                                            </div>
                                                                            <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-container=".mi-chart-workspace-wrap"
                                                                                data-original-title="Mức độ tương đồng về các yếu tố khác (ví dụ Địa điểm, Giới tính,...) giữa hồ sơ của bạn với các yêu cầu của công việc đang xem"></i>
                                                                        </div>
                                                                        <div class="line-progress-bar__top--right">
                                                                            <div
                                                                                class="line-progress-bar__percent line-progress-bar__percent--5">
                                                                                --%
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="line-progress-bar__progress line-progress-bar__progress--5">
                                                                        <div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mi-chart-workspace__chart-col-radar-chart mi-chart-workspace__radar-chart-wrap">
                                                        <div class="mi-chart-workspace__radar-chart">
                                                            <canvas id="mi-chart-workspace__radar-chart" class="d-none"
                                                                style="display: block; box-sizing: border-box; height: 196px; width: 196px;"
                                                                width="183" height="183">
                                                            </canvas>
                                                            <div id="mi-chart-workspace__radar-chart-label-1"
                                                                class="mi-chart-workspace__radar-chart-label"
                                                                style="left: 53.5px; top: -68px;">
                                                                <div class="mi-chart-workspace__radar-chart-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                        height="16" viewBox="0 0 17 16" fill="none">
                                                                        <path
                                                                            d="M14.9528 4.65351C14.3861 4.02684 13.4394 3.71351 12.0661 3.71351H11.9061V3.68684C11.9061 2.56684 11.9061 1.18018 9.39943 1.18018H8.3861C5.87943 1.18018 5.87943 2.57351 5.87943 3.68684V3.72018H5.71943C4.33943 3.72018 3.39943 4.03351 2.83277 4.66018C2.17277 5.39351 2.19277 6.38018 2.25943 7.05351L2.2661 7.10018L2.31022 7.56346C2.32449 7.71323 2.40523 7.84868 2.53139 7.93065C2.69175 8.03485 2.91297 8.17585 3.05277 8.25351C3.1461 8.31351 3.2461 8.36684 3.3461 8.42018C4.4861 9.04684 5.73943 9.46684 7.01277 9.67351C7.07277 10.3002 7.3461 11.0335 8.8061 11.0335C10.2661 11.0335 10.5528 10.3068 10.5994 9.66018C11.9594 9.44018 13.2728 8.96684 14.4594 8.27351C14.4994 8.25351 14.5261 8.23351 14.5594 8.21351C14.8032 8.07573 15.0554 7.90848 15.2892 7.74187C15.4027 7.66099 15.4748 7.53476 15.4902 7.39625L15.4928 7.37351L15.5261 7.06018C15.5328 7.02018 15.5328 6.98684 15.5394 6.94018C15.5928 6.26684 15.5794 5.34684 14.9528 4.65351ZM9.61943 9.22018C9.61943 9.92684 9.61943 10.0335 8.79943 10.0335C7.97943 10.0335 7.97943 9.90684 7.97943 9.22684V8.38684H9.61943V9.22018ZM6.83277 3.71351V3.68684C6.83277 2.55351 6.83277 2.13351 8.3861 2.13351H9.39943C10.9528 2.13351 10.9528 2.56018 10.9528 3.68684V3.72018H6.83277V3.71351Z"
                                                                            fill="white"></path>
                                                                        <path
                                                                            d="M14.5382 9.28368C14.8929 9.11776 15.3003 9.39865 15.2649 9.78863L15.0526 12.1268C14.9126 13.4601 14.366 14.8201 11.4326 14.8201H6.35264C3.4193 14.8201 2.87264 13.4601 2.73264 12.1335L2.53192 9.92564C2.49688 9.54018 2.89481 9.25964 3.24844 9.41698C4.00816 9.755 5.14866 10.2379 5.92234 10.4541C6.08592 10.4998 6.21847 10.6182 6.29656 10.7691C6.71742 11.5819 7.57909 12.0135 8.80597 12.0135C10.0208 12.0135 10.8925 11.5652 11.3152 10.7493C11.3934 10.5983 11.5264 10.4799 11.69 10.4338C12.5149 10.2014 13.7377 9.65815 14.5382 9.28368Z"
                                                                            fill="white"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="mi-chart-workspace__radar-chart-text">
                                                                    Vị trí công việc
                                                                </div>
                                                            </div>
                                                            <div id="mi-chart-workspace__radar-chart-label-2"
                                                                class="mi-chart-workspace__radar-chart-label"
                                                                style="left: 203.204px; top: 39.7163px;">
                                                                <div class="mi-chart-workspace__radar-chart-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" viewBox="0 0 16 16" fill="none">
                                                                        <path
                                                                            d="M10.7935 1.3335H5.20683C2.78016 1.3335 1.3335 2.78016 1.3335 5.20683V10.7935C1.3335 13.2202 2.78016 14.6668 5.20683 14.6668H10.7935C13.2202 14.6668 14.6668 13.2202 14.6668 10.7935V5.20683C14.6668 2.78016 13.2202 1.3335 10.7935 1.3335ZM6.64683 9.9335L5.14683 11.4335C5.04683 11.5335 4.92016 11.5802 4.7935 11.5802C4.66683 11.5802 4.5335 11.5335 4.44016 11.4335L3.94016 10.9335C3.74016 10.7402 3.74016 10.4202 3.94016 10.2268C4.1335 10.0335 4.44683 10.0335 4.64683 10.2268L4.7935 10.3735L5.94016 9.22683C6.1335 9.0335 6.44683 9.0335 6.64683 9.22683C6.84016 9.42016 6.84016 9.74016 6.64683 9.9335ZM6.64683 5.26683L5.14683 6.76683C5.04683 6.86683 4.92016 6.9135 4.7935 6.9135C4.66683 6.9135 4.5335 6.86683 4.44016 6.76683L3.94016 6.26683C3.74016 6.0735 3.74016 5.7535 3.94016 5.56016C4.1335 5.36683 4.44683 5.36683 4.64683 5.56016L4.7935 5.70683L5.94016 4.56016C6.1335 4.36683 6.44683 4.36683 6.64683 4.56016C6.84016 4.7535 6.84016 5.0735 6.64683 5.26683ZM11.7068 11.0802H8.20683C7.9335 11.0802 7.70683 10.8535 7.70683 10.5802C7.70683 10.3068 7.9335 10.0802 8.20683 10.0802H11.7068C11.9868 10.0802 12.2068 10.3068 12.2068 10.5802C12.2068 10.8535 11.9868 11.0802 11.7068 11.0802ZM11.7068 6.4135H8.20683C7.9335 6.4135 7.70683 6.18683 7.70683 5.9135C7.70683 5.64016 7.9335 5.4135 8.20683 5.4135H11.7068C11.9868 5.4135 12.2068 5.64016 12.2068 5.9135C12.2068 6.18683 11.9868 6.4135 11.7068 6.4135Z"
                                                                            fill="white"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="mi-chart-workspace__radar-chart-text">
                                                                    Kỹ năng
                                                                </div>
                                                            </div>
                                                            <div id="mi-chart-workspace__radar-chart-label-3"
                                                                class="mi-chart-workspace__radar-chart-label"
                                                                style="left: 152.603px; top: 180.284px;">
                                                                <div class="mi-chart-workspace__radar-chart-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                        height="16" viewBox="0 0 17 16" fill="none">
                                                                        <path
                                                                            d="M15.0088 5.20546V5.20683V10.7935C15.0088 11.9074 14.6787 12.7365 14.1286 13.2866C13.5785 13.8367 12.7494 14.1668 11.6355 14.1668H6.05546C4.94157 14.1668 4.11263 13.8367 3.56257 13.286C3.01244 12.7352 2.68213 11.9044 2.68213 10.7868V5.20683C2.68213 4.09293 3.01222 3.26384 3.56235 2.71372C4.11247 2.16359 4.94156 1.8335 6.05546 1.8335H11.6421C12.7561 1.8335 13.585 2.16363 14.1342 2.71349C14.6833 3.26325 15.0119 4.09188 15.0088 5.20546ZM4.14213 8.00016C4.14213 8.75631 4.75932 9.3735 5.51546 9.3735C6.2716 9.3735 6.8888 8.75631 6.8888 8.00016C6.8888 7.24402 6.2716 6.62683 5.51546 6.62683C4.75932 6.62683 4.14213 7.24402 4.14213 8.00016ZM7.47546 8.00016C7.47546 8.75631 8.09265 9.3735 8.8488 9.3735C9.60494 9.3735 10.2221 8.75631 10.2221 8.00016C10.2221 7.24402 9.60494 6.62683 8.8488 6.62683C8.09265 6.62683 7.47546 7.24402 7.47546 8.00016ZM10.8088 8.00016C10.8088 8.75631 11.426 9.3735 12.1821 9.3735C12.9383 9.3735 13.5555 8.7563 13.5555 8.00016C13.5555 7.24402 12.9383 6.62683 12.1821 6.62683C11.426 6.62683 10.8088 7.24402 10.8088 8.00016Z"
                                                                            fill="white" stroke="white"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="mi-chart-workspace__radar-chart-text">
                                                                    Yếu tố khác
                                                                </div>
                                                            </div>
                                                            <div id="mi-chart-workspace__radar-chart-label-4"
                                                                class="mi-chart-workspace__radar-chart-label"
                                                                style="left: -24.603px; top: 180.284px;">
                                                                <div class="mi-chart-workspace__radar-chart-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" viewBox="0 0 16 16" fill="none">
                                                                        <path
                                                                            d="M7.28223 7.3125C7.65723 6.90625 8.31348 6.90625 8.68848 7.3125C9.09473 7.6875 9.09473 8.34375 8.68848 8.71875C8.31348 9.125 7.65723 9.125 7.28223 8.71875C6.87598 8.34375 6.87598 7.6875 7.28223 7.3125ZM8.00098 0C12.4072 0 16.001 3.59375 16.001 8C16.001 12.4375 12.4072 16 8.00098 16C3.56348 16 0.000976562 12.4375 0.000976562 8C0.000976562 3.59375 3.56348 0 8.00098 0ZM11.9385 4.875C12.1572 4.375 11.626 3.84375 11.0947 4.0625L6.59473 6.125C6.40723 6.21875 6.18848 6.4375 6.09473 6.625L4.03223 11.125C3.81348 11.6562 4.34473 12.1875 4.87598 11.9688L9.37598 9.90625C9.56348 9.8125 9.78223 9.59375 9.87598 9.40625L11.9385 4.875Z"
                                                                            fill="white"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="mi-chart-workspace__radar-chart-text">
                                                                    Định hướng
                                                                </div>
                                                            </div>
                                                            <div id="mi-chart-workspace__radar-chart-label-5"
                                                                class="mi-chart-workspace__radar-chart-label"
                                                                style="left: -71.2035px; top: 39.7163px;">
                                                                <div class="mi-chart-workspace__radar-chart-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                        height="16" viewBox="0 0 17 16" fill="none">
                                                                        <path
                                                                            d="M10.0019 2.33977L11.1752 4.68643C11.3352 5.0131 11.7619 5.32643 12.1219 5.38643L14.2486 5.73977C15.6086 5.96643 15.9286 6.9531 14.9486 7.92643L13.2952 9.57977C13.0152 9.85977 12.8619 10.3998 12.9486 10.7864L13.4219 12.8331C13.7952 14.4531 12.9352 15.0798 11.5019 14.2331L9.50857 13.0531C9.14857 12.8398 8.55524 12.8398 8.18857 13.0531L6.19524 14.2331C4.76857 15.0798 3.90191 14.4464 4.27524 12.8331L4.74857 10.7864C4.83524 10.3998 4.68191 9.85977 4.40191 9.57977L2.74857 7.92643C1.77524 6.9531 2.08857 5.96643 3.44857 5.73977L5.57524 5.38643C5.92857 5.32643 6.35524 5.0131 6.51524 4.68643L7.68857 2.33977C8.32857 1.06643 9.36857 1.06643 10.0019 2.33977Z"
                                                                            fill="white"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="mi-chart-workspace__radar-chart-text">
                                                                    Kinh nghiệm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mi-chart-workspace-warning" style="display: none;">
                                        <div class="mi-chart-workspace-warning__content">
                                            <div class="mi-chart-workspace-warning__content-title">
                                                <div>
                                                    Lưu ý:
                                                </div>
                                            </div>
                                            <div class="mi-chart-workspace-warning__content-description">
                                                <div>
                                                    Tiện ích này được nghiên cứu, phát triển trên cơ sở ứng dụng dữ liệu
                                                    lớn và trí tuệ nhân tạo để
                                                    bạn ra quyết định hiệu quả hơn khi tìm việc, tăng thêm cơ hội tiếp cận
                                                    các việc làm phù hợp nhất
                                                    và chỉ nên sử dụng với mục đích tham khảo.
                                                </div>
                                            </div>
                                            <div class="mi-chart-workspace-warning__content-description">
                                                <div>
                                                    Các thông tin này hoàn toàn không có ý nghĩa khẳng định bạn sẽ trúng
                                                    tuyển hay không trúng tuyển
                                                    với bất cứ việc làm nào.
                                                </div>
                                            </div>
                                            <div class="mi-chart-workspace-warning__content-description ">
                                                <div class="text-bold">
                                                    Toppy AI có thể cần 1 - 2 giờ để xử lý các dữ liệu mới từ bạn, đặc biệt
                                                    sau khi bạn update CV.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lazy entered" data-lazy-function="initMiChartWorkspace"
                                    data-ll-status="entered">
                                    <img id="mi-chart-workspace-skeleton" class="mi-chart-wrapper lazy entered loaded"
                                        data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-fitness/match-skill.png"
                                        alt="Mức độ phù hợp" data-ll-status="loaded"
                                        src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-fitness/match-skill.png"
                                        data-job-fitness="false" style="display: none;">
                                </div>
                            </div>
                            <div class="box-job-similar lazy entered" id="box-job-similar"
                                data-lazy-function="initBoxJobSimilar" data-ll-status="entered">
                                <h2 class="box-title">Việc làm liên quan</h2>
                                <div class="box-content">
                                    <div class="job-body row">
                                        <div id="box-relate-jobs" class="box_general">
                                            <div class="job-list-default">
                                                @foreach ($relatedJobs as $relatedJob)
                                                    @if ($relatedJob)
                                                        <div class="job-item-default job-ta bg-flash-job">
                                                            <div class="avatar">
                                                                <a target="_blank" href="">
                                                                    <img
                                                                        src="{{ $relatedJob->company->logo ? asset('storage/' . $relatedJob->company->logo) : asset('storage/avatar/avatar-default.jpg') }}">
                                                                </a>
                                                                <div class="tag-job-flash">

                                                                </div>
                                                            </div>
                                                            <div class="body">
                                                                <div class="body-content">
                                                                    <div class="title-block">
                                                                        <div>
                                                                            <h3 class="title ">
                                                                                <div class="box-label-top">
                                                                                </div>
                                                                                <a target="_blank"
                                                                                    href="{{ route('job.show', $relatedJob->slug) }}">
                                                                                    <span> {{ $relatedJob->title }}</span>
                                                                                </a>
                                                                            </h3>
                                                                            <a rel="nofollow" class="company"
                                                                                href="{{ route('company-home.show', $relatedJob->company->slug) }}">{{ $relatedJob->company->name }}</a>
                                                                        </div>
                                                                        <div class="box-right">
                                                                            <label class="title-salary">
                                                                                {{ $relatedJob->salary }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="info">
                                                                    <div class="label-content">
                                                                        <label class="address">

                                                                            @foreach ($relatedJob->cities as $city)
                                                                                {{ $city->name }}@if (!$loop->last)
                                                                                    ,
                                                                                @endif
                                                                            @endforeach

                                                                        </label>
                                                                        <label class="time mobile-hidden">
                                                                            Còn
                                                                            <strong>{{ $relatedJob->days_to_closing }}</strong>
                                                                            ngày để ứng tuyển
                                                                        </label>
                                                                        <label class="address" data-container="body">
                                                                            Cập nhật {{ $relatedJob->time_since_update }}
                                                                        </label>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <button data-toggle="modal" data-target="#applyModal"
                                                                            class="btn btn-apply-now"
                                                                            data-job-id="{{ $relatedJob->id }}">
                                                                            <span>Ứng tuyển</span>
                                                                        </button>
                                                                        <div class="box-save-job">
                                                                            <a data-id="{{ $relatedJob->id }}" href=""
                                                                                onclick="saveJob({{ $relatedJob->id }})"
                                                                                class="save box-save-job-hover"
                                                                                data-toggle="tooltip"
                                                                                title="Bạn phải đăng nhập để lưu tin"><i
                                                                                    class="fa-regular fa-heart"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-suggest-courses">
                                    <div id="suggestion-course">
                                        <div class="suggestion-course-container">
                                            <h2 class="suggestion-courses-title"><i
                                                    class="fa-solid fa-graduation-cap"></i>Khóa học dành cho bạn</h2>
                                            <div class="suggestion-courses-body">
                                                @foreach ($courses->chunk(3) as $chunk)
                                                    <div>
                                                        @foreach ($chunk as $course)
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="box-course box-white clearfix">
                                                                    <a class="img_a" target="_blank" href="{{ $course->website }}">
                                                                        @if ($course->image)
                                                                            <img src="{{ asset('storage/' . $course->image) }}"
                                                                                alt="{{ $course->name }}"
                                                                                style="width: 100%; height: 190px;background:linear-gradient(to right, #f12711, #f5af19)"
                                                                                class="color-me" rel="nofollow">
                                                                        @else
                                                                            <img src="default-image.jpg" alt="{{ $course->name }}"
                                                                                style="width: 100%; height: 190px;background:linear-gradient(to right, #f12711, #f5af19)"
                                                                                class="color-me" rel="nofollow">
                                                                        @endif
                                                                    </a>
                                                                    <div class="course-meta">
                                                                        <div class="title">
                                                                            <a target="_blank" href="{{ $course->website }}"
                                                                                rel="nofollow"
                                                                                title="{{ $course->name }}">{{ $course->name }}</a>
                                                                        </div>
                                                                        <div class="text-center" style="margin-bottom: 20px">
                                                                            <a class="btn btn-danger" target="_blank"
                                                                                href="{{ $course->website }}" rel="nofollow">Đăng ký
                                                                                học</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job-detail__body-right">
                        <div class="job-detail__box--right job-detail__company">
                            <div class="job-detail__company--information">
                                <div class="job-detail__company--information-item company-name">
                                    <a rel="nofollow" class="company-logo" href="{{ $jobPosting->company->website }}"
                                        target="_blank" data-toggle="tooltip" title="" data-placement="top"
                                        data-original-title="{{ $jobPosting->company->name }}">
                                        <img src="{{ $jobPosting->company->logo ? asset('storage/' . $jobPosting->company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                            alt="Avatar" style="width: 60px" class="img-responsive">
                                    </a>

                                    <h2 class="company-name-label">
                                        <a rel="nofollow" class="name" href="{{ $jobPosting->company->website }}"
                                            target="_blank" data-toggle="tooltip" title="" data-placement="top"
                                            data-original-title="{{ $jobPosting->company->name }}">
                                            {{ $jobPosting->company->name }}
                                        </a>
                                        <div class="company-subdetail-label">
                                        </div>
                                    </h2>
                                </div>
                                <div class="job-detail__company--information-item company-scale">
                                    <div class="company-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none">
                                            <path
                                                d="M5.99998 1.33334C4.25331 1.33334 2.83331 2.75334 2.83331 4.5C2.83331 6.21334 4.17331 7.6 5.91998 7.66C5.97331 7.65334 6.02665 7.65334 6.06665 7.66C6.07998 7.66 6.08665 7.66 6.09998 7.66C6.10665 7.66 6.10665 7.66 6.11331 7.66C7.81998 7.6 9.15998 6.21334 9.16665 4.5C9.16665 2.75334 7.74665 1.33334 5.99998 1.33334Z"
                                                fill="#7F878F"></path>
                                            <path
                                                d="M9.38664 9.43333C7.52664 8.19333 4.49331 8.19333 2.61997 9.43333C1.77331 10 1.30664 10.7667 1.30664 11.5867C1.30664 12.4067 1.77331 13.1667 2.61331 13.7267C3.54664 14.3533 4.77331 14.6667 5.99997 14.6667C7.22664 14.6667 8.45331 14.3533 9.38664 13.7267C10.2266 13.16 10.6933 12.4 10.6933 11.5733C10.6866 10.7533 10.2266 9.99333 9.38664 9.43333Z"
                                                fill="#7F878F"></path>
                                            <path
                                                d="M13.3267 4.89333C13.4333 6.18667 12.5133 7.32 11.24 7.47333C11.2333 7.47333 11.2333 7.47333 11.2267 7.47333H11.2067C11.1667 7.47333 11.1267 7.47333 11.0933 7.48667C10.4467 7.52 9.85334 7.31333 9.40668 6.93333C10.0933 6.32 10.4867 5.4 10.4067 4.4C10.36 3.86 10.1733 3.36667 9.89334 2.94667C10.1467 2.82 10.44 2.74 10.74 2.71333C12.0467 2.6 13.2133 3.57333 13.3267 4.89333Z"
                                                fill="#7F878F"></path>
                                            <path
                                                d="M14.66 11.06C14.6067 11.7067 14.1933 12.2667 13.5 12.6467C12.8333 13.0133 11.9933 13.1867 11.16 13.1667C11.64 12.7333 11.92 12.1933 11.9733 11.62C12.04 10.7933 11.6467 10 10.86 9.36667C10.4133 9.01333 9.89333 8.73333 9.32666 8.52667C10.8 8.1 12.6533 8.38667 13.7933 9.30667C14.4067 9.8 14.72 10.42 14.66 11.06Z"
                                                fill="#7F878F"></path>
                                        </svg>
                                        Quy mô:
                                    </div>
                                    <div class="company-value">{{ $jobPosting->company->scale }} Nhân viên</div>
                                </div>
                                <div class="job-detail__company--information-item company-address">
                                    <div class="company-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none">
                                            <path
                                                d="M13.7467 5.63334C13.0467 2.55334 10.36 1.16667 8 1.16667C8 1.16667 8 1.16667 7.99334 1.16667C5.64 1.16667 2.94667 2.54667 2.24667 5.62667C1.46667 9.06667 3.57334 11.98 5.48 13.8133C6.18667 14.4933 7.09334 14.8333 8 14.8333C8.90667 14.8333 9.81334 14.4933 10.5133 13.8133C12.42 11.98 14.5267 9.07334 13.7467 5.63334ZM8 8.97334C6.84 8.97334 5.9 8.03334 5.9 6.87334C5.9 5.71334 6.84 4.77334 8 4.77334C9.16 4.77334 10.1 5.71334 10.1 6.87334C10.1 8.03334 9.16 8.97334 8 8.97334Z"
                                                fill="#7F878F"></path>
                                            <path
                                                d="M14.66 11.06C14.6067 11.7067 14.1933 12.2667 13.5 12.6467C12.8333 13.0133 11.9933 13.1867 11.16 13.1667C11.64 12.7333 11.92 12.1933 11.9733 11.62C12.04 10.7933 11.6467 10 10.86 9.36667C10.4133 9.01333 9.89333 8.73333 9.32666 8.52667C10.8 8.1 12.6533 8.38667 13.7933 9.30667C14.4067 9.8 14.72 10.42 14.66 11.06Z"
                                                fill="#7F878F"></path>
                                        </svg>
                                        Địa điểm:
                                    </div>
                                    <div class="company-value" data-toggle="tooltip" title="" data-placement="top"
                                        data-original-title="{{ $jobPosting->company->address }}">
                                        {{ $jobPosting->company->address }}
                                    </div>
                                </div>
                            </div>
                            <div class="job-detail__company--link">
                                <a rel="nofollow" href="{{ route('company-home.show', $jobPosting->company->slug) }}"
                                    target="_blank">Xem trang
                                    công ty</a>
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>

                        <div
                            class="job-detail__box--right job-detail__body-right--item job-detail__body-right--box-general">
                            <h2 class="box-title">Thông tin chung</h2>
                            <div class="box-general-content">
                                <div class="button-view-job-fitness" id="button-view-job-fitness">
                                    <div class="button-view-job-fitness__header">
                                        <div class="button-view-job-fitness__header--title">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.71429 1.71429C5.71429 0.767857 6.48214 0 7.42857 0H8.57143C9.51786 0 10.2857 0.767857 10.2857 1.71429V14.2857C10.2857 15.2321 9.51786 16 8.57143 16H7.42857C6.48214 16 5.71429 15.2321 5.71429 14.2857V1.71429ZM0 8.57143C0 7.625 0.767857 6.85714 1.71429 6.85714H2.85714C3.80357 6.85714 4.57143 7.625 4.57143 8.57143V14.2857C4.57143 15.2321 3.80357 16 2.85714 16H1.71429C0.767857 16 0 15.2321 0 14.2857V8.57143ZM13.1429 2.28571H14.2857C15.2321 2.28571 16 3.05357 16 4V14.2857C16 15.2321 15.2321 16 14.2857 16H13.1429C12.1964 16 11.4286 15.2321 11.4286 14.2857V4C11.4286 3.05357 12.1964 2.28571 13.1429 2.28571Z"
                                                    fill="#00B14F"></path>
                                            </svg>
                                            Phân tích mức độ phù hợp
                                        </div>
                                        <div class="button-view-job-fitness__header--badge">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.00054 9.99999C4.86887 10.0007 4.74014 9.96113 4.63154 9.88668C4.52294 9.81224 4.43965 9.70642 4.39279 9.58337L3.35541 6.88575C3.3344 6.83139 3.30226 6.78202 3.26105 6.74082C3.21984 6.69961 3.17047 6.66747 3.11611 6.64645L0.417716 5.60829C0.294798 5.56111 0.189074 5.47777 0.114498 5.36927C0.0399225 5.26077 0 5.1322 0 5.00054C0 4.86888 0.0399225 4.74032 0.114498 4.63182C0.189074 4.52331 0.294798 4.43997 0.417716 4.3928L3.11533 3.35541C3.16969 3.3344 3.21906 3.30226 3.26027 3.26105C3.30148 3.21984 3.33362 3.17048 3.35463 3.11612L4.39279 0.417716C4.43997 0.294798 4.52331 0.189074 4.63181 0.114498C4.74031 0.0399224 4.86888 0 5.00054 0C5.1322 0 5.26076 0.0399224 5.36927 0.114498C5.47777 0.189074 5.56111 0.294798 5.60828 0.417716L6.64567 3.11533C6.66668 3.16969 6.69882 3.21906 6.74003 3.26027C6.78124 3.30148 6.8306 3.33362 6.88496 3.35463L9.56695 4.38655C9.69488 4.43396 9.80508 4.51965 9.88256 4.63194C9.96005 4.74422 10.001 4.87766 9.99998 5.01408C9.99799 5.14345 9.95722 5.26925 9.88295 5.37518C9.80867 5.48112 9.7043 5.56233 9.58336 5.60829L6.88574 6.64567C6.83138 6.66668 6.78202 6.69883 6.74081 6.74003C6.6996 6.78124 6.66746 6.83061 6.64645 6.88497L5.60828 9.58337C5.56143 9.70642 5.47813 9.81224 5.36953 9.88668C5.26094 9.96113 5.1322 10.0007 5.00054 9.99999Z"
                                                    fill="#966D05"></path>
                                            </svg>
                                            New
                                        </div>
                                    </div>
                                    <div class="button-view-job-fitness__button">
                                        Xem ngay
                                    </div>
                                </div>
                                <div class="box-general-group">
                                    <div class="box-general-group-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M17.81 5.49V6.23L14.27 4.18C12.93 3.41 11.06 3.41 9.73 4.18L6.19 6.24V5.49C6.19 3.24 7.42 2 9.67 2H14.33C16.58 2 17.81 3.24 17.81 5.49Z"
                                                fill="white"></path>
                                            <path
                                                d="M17.84 7.96999L17.7 7.89999L16.34 7.11999L13.52 5.48999C12.66 4.98999 11.34 4.98999 10.48 5.48999L7.66 7.10999L6.3 7.90999L6.12 7.99999C4.37 9.17999 4.25 9.39999 4.25 11.29V15.81C4.25 17.7 4.37 17.92 6.16 19.13L10.48 21.62C10.91 21.88 11.45 21.99 12 21.99C12.54 21.99 13.09 21.87 13.52 21.62L17.88 19.1C19.64 17.92 19.75 17.71 19.75 15.81V11.29C19.75 9.39999 19.63 9.17999 17.84 7.96999ZM14.79 13.5L14.18 14.25C14.08 14.36 14.01 14.57 14.02 14.72L14.08 15.68C14.12 16.27 13.7 16.57 13.15 16.36L12.26 16C12.12 15.95 11.89 15.95 11.75 16L10.86 16.35C10.31 16.57 9.89 16.26 9.93 15.67L9.99 14.71C10 14.56 9.93 14.35 9.83 14.24L9.21 13.5C8.83 13.05 9 12.55 9.57 12.4L10.5 12.16C10.65 12.12 10.82 11.98 10.9 11.86L11.42 11.06C11.74 10.56 12.25 10.56 12.58 11.06L13.1 11.86C13.18 11.99 13.36 12.12 13.5 12.16L14.43 12.4C15 12.55 15.17 13.05 14.79 13.5Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="box-general-group-info">
                                        <div class="box-general-group-info-title">Cấp bậc</div>
                                        <div class="box-general-group-info-value">{{ $jobPosting->rank }}</div>
                                    </div>
                                </div>
                                <div class="box-general-group">
                                    <div class="box-general-group-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M17.39 15.67L13.35 12H10.64L6.59998 15.67C5.46998 16.69 5.09998 18.26 5.64998 19.68C6.19998 21.09 7.53998 22 9.04998 22H14.94C16.46 22 17.79 21.09 18.34 19.68C18.89 18.26 18.52 16.69 17.39 15.67ZM13.82 18.14H10.18C9.79998 18.14 9.49998 17.83 9.49998 17.46C9.49998 17.09 9.80998 16.78 10.18 16.78H13.82C14.2 16.78 14.5 17.09 14.5 17.46C14.5 17.83 14.19 18.14 13.82 18.14Z"
                                                fill="white"></path>
                                            <path
                                                d="M18.35 4.32C17.8 2.91 16.46 2 14.95 2H9.04998C7.53998 2 6.19998 2.91 5.64998 4.32C5.10998 5.74 5.47998 7.31 6.60998 8.33L10.65 12H13.36L17.4 8.33C18.52 7.31 18.89 5.74 18.35 4.32ZM13.82 7.23H10.18C9.79998 7.23 9.49998 6.92 9.49998 6.55C9.49998 6.18 9.80998 5.87 10.18 5.87H13.82C14.2 5.87 14.5 6.18 14.5 6.55C14.5 6.92 14.19 7.23 13.82 7.23Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="box-general-group-info">
                                        <div class="box-general-group-info-title">Kinh nghiệm</div>
                                        <div class="box-general-group-info-value">{{ $jobPosting->experience }}</div>
                                    </div>
                                </div>
                                <div class="box-general-group">
                                    <div class="box-general-group-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M9 2C6.38 2 4.25 4.13 4.25 6.75C4.25 9.32 6.26 11.4 8.88 11.49C8.96 11.48 9.04 11.48 9.1 11.49C9.12 11.49 9.13 11.49 9.15 11.49C9.16 11.49 9.16 11.49 9.17 11.49C11.73 11.4 13.74 9.32 13.75 6.75C13.75 4.13 11.62 2 9 2Z"
                                                fill="white"></path>
                                            <path
                                                d="M14.08 14.15C11.29 12.29 6.74002 12.29 3.93002 14.15C2.66002 15 1.96002 16.15 1.96002 17.38C1.96002 18.61 2.66002 19.75 3.92002 20.59C5.32002 21.53 7.16002 22 9.00002 22C10.84 22 12.68 21.53 14.08 20.59C15.34 19.74 16.04 18.6 16.04 17.36C16.03 16.13 15.34 14.99 14.08 14.15Z"
                                                fill="white"></path>
                                            <path
                                                d="M19.99 7.34001C20.15 9.28001 18.77 10.98 16.86 11.21C16.85 11.21 16.85 11.21 16.84 11.21H16.81C16.75 11.21 16.69 11.21 16.64 11.23C15.67 11.28 14.78 10.97 14.11 10.4C15.14 9.48001 15.73 8.10001 15.61 6.60001C15.54 5.79001 15.26 5.05001 14.84 4.42001C15.22 4.23001 15.66 4.11001 16.11 4.07001C18.07 3.90001 19.82 5.36001 19.99 7.34001Z"
                                                fill="white"></path>
                                            <path
                                                d="M21.99 16.59C21.91 17.56 21.29 18.4 20.25 18.97C19.25 19.52 17.99 19.78 16.74 19.75C17.46 19.1 17.88 18.29 17.96 17.43C18.06 16.19 17.47 15 16.29 14.05C15.62 13.52 14.84 13.1 13.99 12.79C16.2 12.15 18.98 12.58 20.69 13.96C21.61 14.7 22.08 15.63 21.99 16.59Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="box-general-group-info">
                                        <div class="box-general-group-info-title">Số lượng tuyển</div>
                                        <div class="box-general-group-info-value">{{ $jobPosting->number_of_recruits }}
                                        </div>
                                    </div>
                                </div>
                                <div class="box-general-group">
                                    <div class="box-general-group-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M21.09 6.98002C20.24 6.04002 18.82 5.57002 16.76 5.57002H16.52V5.53002C16.52 3.85002 16.52 1.77002 12.76 1.77002H11.24C7.47998 1.77002 7.47998 3.86002 7.47998 5.53002V5.58002H7.23998C5.16998 5.58002 3.75998 6.05002 2.90998 6.99002C1.91998 8.09002 1.94998 9.57002 2.04998 10.58L2.05998 10.65L2.13743 11.4633C2.1517 11.6131 2.23236 11.7484 2.35825 11.8307C2.59806 11.9877 2.9994 12.2464 3.23998 12.38C3.37998 12.47 3.52998 12.55 3.67998 12.63C5.38998 13.57 7.26998 14.2 9.17998 14.51C9.26998 15.45 9.67998 16.55 11.87 16.55C14.06 16.55 14.49 15.46 14.56 14.49C16.6 14.16 18.57 13.45 20.35 12.41C20.41 12.38 20.45 12.35 20.5 12.32C20.8967 12.0958 21.3083 11.8195 21.6834 11.5489C21.7965 11.4673 21.8687 11.3413 21.8841 11.2028L21.9 11.06L21.95 10.59C21.96 10.53 21.96 10.48 21.97 10.41C22.05 9.40002 22.03 8.02002 21.09 6.98002ZM13.09 13.83C13.09 14.89 13.09 15.05 11.86 15.05C10.63 15.05 10.63 14.86 10.63 13.84V12.58H13.09V13.83ZM8.90998 5.57002V5.53002C8.90998 3.83002 8.90998 3.20002 11.24 3.20002H12.76C15.09 3.20002 15.09 3.84002 15.09 5.53002V5.58002H8.90998V5.57002Z"
                                                fill="white"></path>
                                            <path
                                                d="M20.8735 13.7342C21.2271 13.5659 21.6344 13.8462 21.599 14.2362L21.24 18.19C21.03 20.19 20.21 22.23 15.81 22.23H8.19003C3.79003 22.23 2.97003 20.19 2.76003 18.2L2.41932 14.4522C2.38427 14.0667 2.78223 13.7868 3.13487 13.9463C4.27428 14.4618 6.37742 15.3764 7.6766 15.7167C7.8409 15.7597 7.9738 15.8773 8.04574 16.0312C8.65271 17.3293 9.96914 18.02 11.87 18.02C13.7521 18.02 15.0852 17.3027 15.6942 16.0014C15.7662 15.8474 15.8992 15.7299 16.0636 15.6866C17.4432 15.3236 19.6818 14.3013 20.8735 13.7342Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="box-general-group-info">
                                        <div class="box-general-group-info-title">Hình thức làm việc</div>
                                        <div class="box-general-group-info-value">{{ $jobPosting->type }}</div>
                                    </div>
                                </div>
                                <div class="box-general-group">
                                    <div class="box-general-group-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M12 2C9.38 2 7.25 4.13 7.25 6.75C7.25 9.32 9.26 11.4 11.88 11.49C11.96 11.48 12.04 11.48 12.1 11.49C12.12 11.49 12.13 11.49 12.15 11.49C12.16 11.49 12.16 11.49 12.17 11.49C14.73 11.4 16.74 9.32 16.75 6.75C16.75 4.13 14.62 2 12 2Z"
                                                fill="white"></path>
                                            <path
                                                d="M17.08 14.15C14.29 12.29 9.74002 12.29 6.93002 14.15C5.66002 15 4.96002 16.15 4.96002 17.38C4.96002 18.61 5.66002 19.75 6.92002 20.59C8.32002 21.53 10.16 22 12 22C13.84 22 15.68 21.53 17.08 20.59C18.34 19.74 19.04 18.6 19.04 17.36C19.03 16.13 18.34 14.99 17.08 14.15Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="box-general-group-info">
                                        <div class="box-general-group-info-title">Giới tính</div>
                                        <div class="box-general-group-info-value">{{ $jobPosting->sex }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="job-detail__box--right job-detail__body-right--item job-detail__body-right--box-category">
                            <div class="box-category">
                                <div class="box-title">Ngành nghề</div>
                                <div class="box-category-tags">
                                    {{ $jobPosting->tags }}
                                </div>
                            </div>

                            <div class="box-category collapsed">
                                <div class="box-title">Kỹ năng nên có</div>
                                <div class="box-category-tags">
                                    <a href="javascript:void(0)" class="box-category-tag"
                                        target="_blank">{{ $jobPosting->skills_required }}</a>
                                </div>
                            </div>
                            <div class="box-category">
                                <div class="box-title">Khu vực</div>
                                <div class="box-category-tags">
                                    <span><a class="box-category-tag"
                                            href="https://www.topcv.vn/tim-viec-lam-video-editor-tai-ha-noi-kl1"
                                            target="_blank"
                                            title="Tìm việc làm video editor tại Hà Nội">{{ $jobPosting->area }}</a></span>
                                </div>
                            </div>
                        </div>
                        <div id="suitable-job-box" style="width: 100%; display: none;"></div>
                        <div class="box-report-job">
                            <h3>
                                <i class="fa-solid fa-circle-question"></i>Bí kíp Tìm việc an toàn
                            </h3>
                            <p>Dưới đây là những dấu hiệu của các tổ chức, cá nhân tuyển dụng không minh bạch:</p>
                            <section class="common-signal lazy entered" data-lazy-function="initCarouselReportCaptions"
                                data-ll-status="entered">
                                <h4 class="common-signal__title">Dấu hiệu phổ biến:</h4>
                                <div id="carouselReportCaptions" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <div class="slider__item">
                                                <img class="slider__image entered loaded"
                                                    data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/1.png"
                                                    alt="Item 1"
                                                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/1.png"
                                                    data-ll-status="loaded">
                                                <p class="slider__caption">
                                                    Nội dung mô tả công việc
                                                    sơ sài, không đồng nhất với công việc thực tế
                                                </p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="slider__item">
                                                <img class="slider__image entered loaded"
                                                    data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/2.png"
                                                    alt="Item 2"
                                                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/2.png"
                                                    data-ll-status="loaded">
                                                <p class="slider__caption">Hứa hẹn "việc nhẹ lương cao", không cần bỏ
                                                    nhiều công sức dễ dàng lấy
                                                    tiền "khủng"</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="slider__item">
                                                <img class="slider__image entered loaded"
                                                    data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/3.png"
                                                    alt="Item 3"
                                                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/3.png"
                                                    data-ll-status="loaded">
                                                <p class="slider__caption">Yêu cầu tải app, nạp tiền, làm nhiệm vụ </p>
                                            </div>
                                        </div>
                                        <div class="carousel-item active">
                                            <div class="slider__item">
                                                <img class="slider__image entered loaded"
                                                    data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/4.png"
                                                    alt="Item 4"
                                                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/4.png"
                                                    data-ll-status="loaded">
                                                <p class="slider__caption">Yêu cầu nộp phí phỏng vấn, phí giữ chỗ...</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="slider__item">
                                                <img class="slider__image"
                                                    data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/5.png"
                                                    alt="Item 4"
                                                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/5.png">
                                                <p class="slider__caption">Yêu cầu ký kết giấy tờ không rõ ràng hoặc nộp
                                                    giấy tờ gốc</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="slider__item">
                                                <img class="slider__image entered loaded"
                                                    data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/6.png?v=1.0.0"
                                                    alt="Item 4"
                                                    src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/6.png?v=1.0.0"
                                                    data-ll-status="loaded">
                                                <p class="slider__caption">Địa điểm phỏng vấn
                                                    bất bình thường</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselReportCaptions" data-bs-slide="prev">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselReportCaptions" data-bs-slide="next">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselReportCaptions" data-bs-slide-to="0"
                                            class="" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselReportCaptions" data-bs-slide-to="1"
                                            aria-label="Slide 2" class=""></button>
                                        <button type="button" data-bs-target="#carouselReportCaptions" data-bs-slide-to="2"
                                            aria-label="Slide 3" class=""></button>
                                        <button type="button" data-bs-target="#carouselReportCaptions" data-bs-slide-to="3"
                                            aria-label="Slide 4" class="active" aria-current="true"></button>
                                        <button type="button" data-bs-target="#carouselReportCaptions" data-bs-slide-to="4"
                                            aria-label="Slide 5" class=""></button>
                                        <button type="button" data-bs-target="#carouselReportCaptions" data-bs-slide-to="5"
                                            aria-label="Slide 6" class=""></button>
                                    </div>
                                </div>
                            </section>
                            <section class="common-signal">
                                <h4 class="common-signal__title">
                                    Cần làm gì khi gặp việc làm, công ty không minh bạch:
                                </h4>
                                <div class="common-signal__content">
                                    <ul>
                                        <li>
                                            Kiểm tra thông tin về công ty, việc làm trước khi ứng tuyển
                                        </li>
                                        <li>
                                            Báo cáo tin tuyển dụng với Vieclamso1 thông qua nút <strong>"Báo cáo tin tuyển
                                                dụng"</strong> để được hỗ
                                            trợ và giúp các
                                            ứng viên khác tránh
                                            được rủi ro </li>
                                        <li>
                                            Hoặc liên hệ với Vieclamso1 thông qua kênh hỗ trợ ứng viên của Vieclamso1:<br>
                                            Email: <a class="text-highlight" href="#">{{ $info->email_contact }}</a><br>
                                            Hotline: <a class="text-highlight" href="">{{ $info->hotline_contact }}</a><br>

                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <a class="box-report-job__action" href="#" data-toggle="modal" data-target="#reportJobModal">Báo
                                cáo tin tuyển dụng</a>

                            <!-- Report Job Modal -->
                            <div class="modal fade" id="reportJobModal" tabindex="-1" aria-labelledby="reportJobModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reportJobModalLabel">Báo cáo tin tuyển dụng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('job-reports.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="job_posting_id" value="{{ $jobPosting->id }}">
                                                <div class="form-group">
                                                    <label for="jobTitle">Tên công việc</label>
                                                    <input type="text" class="form-control" id="jobTitle"
                                                        value="{{ $jobPosting->title }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Tên của bạn</label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="content">Nội dung báo cáo</label>
                                                    <textarea class="form-control" id="content" name="content" rows="4"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="status" value="pending">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Gửi báo cáo</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-maybe-interested">
                            <h3 class="box-maybe-interested__title">Có thể bạn quan tâm</h3>
                            <div class="box-maybe-interested__company">
                                <div class="box-maybe-interested__company--image">
                                    <a rel="nofollow" href="{{ route('company-home.show', $company_random->slug) }}">
                                        <img src="{{ $company_random->image ? asset('storage/' . $company_random->image) : asset('storage/avatar/company_cover_1.jpg') }}"
                                            alt="{{ $company_random->name }}" class="spotlight-cover">
                                    </a>
                                </div>
                                <div class="box-maybe-interested__company--content company">
                                    <div class="company__info">
                                        <div class="company__info--logo">
                                            <a rel="nofollow"
                                                href="{{ route('company-home.show', $company_random->slug) }}">
                                                <img src="{{ $company_random->logo ? asset('storage/' . $company_random->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                                    alt="{{ $company_random->name }}">
                                            </a>
                                        </div>
                                        <div class="company__info--name">
                                            <a rel="nofollow"
                                                href="{{ $company_random->url }}">{{ $company_random->name }}</a>
                                            <img src="https://static.topcv.vn/v4/image/maybe-interested/spotlight.png?v=1.2"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="company__job">
                                        @foreach ($jobPosting_random as $jobPosting)
                                            <div class="job job-ta" data-job-id="{{ $jobPosting->id }}"
                                                data-box="SpotlightCompany">
                                                <a href="{{ route('job.show', $jobPosting->slug) }}" target="_blank"
                                                    data-toggle="tooltip" title="" data-placement="top"
                                                    class="job__name">{{ $jobPosting->title }}</a>
                                                <div class="job__info">
                                                    <div class="job__info--salary">
                                                        <i class="fa-solid fa-circle-dollar"></i>
                                                        <span>{{ $jobPosting->salary }}</span>
                                                    </div>
                                                    <div class="job__info--address">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        <span data-toggle="tooltip" data-html="true" title=""
                                                            data-placement="top">
                                                            @foreach ($cities_random as $city)
                                                                <li>{{ $city->name }}</li>
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="company__link">
                                        <a rel="nofollow" href="{{ route('company-home.show', $company_random->slug) }}"
                                            target="_blank">Tìm hiểu
                                            ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                $(document).on('click', '#notice-intern-apply-modal .btn-continue-apply', function (event) {
                    $('#notice-intern-apply-modal').modal('hide');
                    $('#modal-apply-cv').modal('show');
                    window.trackingTopCV.internConfirmApply();
                });

                $('#notice-intern-apply-modal').on('show.bs.modal', function (event) {
                    window.trackingTopCV.alertInternApply();
                });
                $('#notice-intern-apply-modal').on('hidden.bs.modal', function (event) {
                    window.trackingTopCV.internQuitApply();
                });
            });
        </script>
        <!-- Apply Modal -->
        <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModalLabel">Chọn CV của bạn và viết thư ứng tuyển</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @auth('candidate')
                            <form id="applyForm" action="{{ route('applications.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Empty value that will be filled by JavaScript -->
                                <input type="hidden" name="job_posting_id" id="job_posting_id" value="">

                                <div class="form-group">
                                    <label for="cv_id">Chọn CV</label>
                                    <select class="form-control" id="cv_id" name="cv_id">
                                        <option value="">-- Chọn CV sẵn có hoặc tải lên mới --</option>
                                        @foreach(auth('candidate')->user()->cvs as $cv)
                                            <option value="{{ $cv->id }}">{{ $cv->cv_name }} - {{ $cv->cv_path }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="new-cv-upload">
                                    <label for="cv">CV mới (PDF, DOC, DOCX)*</label>
                                    <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx">
                                </div>
                                <div class="form-group">
                                    <label for="application_letter">Thư ứng tuyển</label>
                                    <textarea class="form-control" id="introduction" name="introduction" rows="4"></textarea>
                                </div>
                            </form>
                        @else
                            <p>Bạn cần đăng nhập để ứng tuyển.</p>
                        @endauth
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        @auth('candidate')
                            <button type="button" class="btn btn-primary" onclick="submitApplyForm()">Ứng tuyển
                                ngay</button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                // Fixed selector to target all buttons that should open apply modal
                $('.btn-apply-now').on('click', function () {
                    var jobId = $(this).data('job-id');
                    console.log("Setting job_posting_id to:", jobId); // For debugging
                    $('#job_posting_id').val(jobId);
                });

                // Single submitApplyForm function
                window.submitApplyForm = function () {
                    console.log("Form submission started"); // For debugging
                    console.log("job_posting_id value:", $('#job_posting_id').val()); // For debugging
                    document.getElementById('applyForm').submit();
                };

                // CV selection logic
                $('#cv_id').on('change', function () {
                    $('#new-cv-upload').css('display', $(this).val() ? 'none' : 'block');
                });

                // Initialize display state
                $('#new-cv-upload').css('display', $('#cv_id').val() ? 'none' : 'block');
            });
        </script>
        <script>
            var search = new URLSearchParams(location.search);
            ta('pageview', Object.assign(topcvJob, {
                utm_source: search.get('utm_source'),
                utm_medium: search.get('utm_medium'),
                utm_campaign: search.get('utm_campaign')
            }))
        </script>
    </div>




@endsection
