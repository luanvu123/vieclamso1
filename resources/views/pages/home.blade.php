 @extends('layout')
 @section('content')
     <div id="page-welcome">
         <section id="section-header">
             <div class="container">
                 <div class="lis-column">
                     <div class="col">
                         <h4>Công nghệ AI dự đoán, cá nhân hoá việc làm</h4>
                         <h2>
                             <span class="section-title">Định hướng nghề nghiệp</span>
                             dành cho bạn.
                         </h2>
                         <form class="search-form" action="{{ route('search-jobs') }}" method="GET">
                             <div class="form-group">
                                 <input type="text" id="key" name="keyword" value=""
                                     placeholder="Nhập từ khóa tìm kiếm...">
                             </div>
                             <div class="form-group">
                                 <select id="city" name="city">
                                     <option value="">Chọn thành phố</option>
                                     @foreach ($cities as $id => $name)
                                         <option value="{{ $id }}">{{ $name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <button type="submit">Tìm kiếm</button>
                             </div>
                         </form>
                         <button class="btn-show-video">
                             <img class="img-responsive" src="{{ asset('storage/' . $info->image_section) }}" alt>
                         </button>
                     </div>
                     <div class="col">
                         <div class="dashboard-container">
                             <div class="dashboard-header">
                                 <div class="title">Thị trường việc làm hôm nay:</div>
                                 <div class="date">{{ now()->format('d/m/Y') }}</div>
                             </div>
                             <div class="dashboard-stats">
                                 <p>Việc làm đang tuyển: <strong>{{ $activeJobListingsCount }}</strong></p>
                                 <p>Việc làm mới hôm nay: <strong>{{ $activeJobListingsCountToday }}</strong></p>
                             </div>
                             <div class="dashboard-chart">
                                 <form action="{{ route('/') }}" method="GET">
                                     <select name="type" class="job-type-select" onchange="this.form.submit()">
                                         <option value="job" {{ $type == 'job' ? 'selected' : '' }}>Ngành nghề</option>
                                         <option value="salary" {{ $type == 'salary' ? 'selected' : '' }}>Mức lương
                                         </option>
                                     </select>
                                 </form>

                                 <canvas id="jobChart"></canvas>

                                 <div class="chart-legend">
                                     @foreach ($data as $item)
                                         <div>
                                             <span
                                                 style="background-color: {{ $loop->index == 0 ? '#4CAF50' : ($loop->index == 1 ? '#2196F3' : ($loop->index == 2 ? '#FF9800' : ($loop->index == 3 ? '#FFEB3B' : '#9C27B0'))) }};"></span>
                                             <label>{{ $item['name'] }}</label>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>

                         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                         <script>
                             var ctx = document.getElementById('jobChart').getContext('2d');
                             var chartData = {
                                 labels: {!! json_encode($data->pluck('name')) !!},
                                 datasets: [{
                                     label: '{{ $type === 'salary' ? 'Mức lương' : 'Số lượng công việc' }}',
                                     data: {!! json_encode($data->pluck('count')) !!},
                                     backgroundColor: [
                                         '#4CAF50',
                                         '#2196F3',
                                         '#FF9800',
                                         '#FFEB3B',
                                         '#9C27B0',
                                         '#FF5722'
                                     ],
                                     borderColor: [
                                         '#388E3C',
                                         '#1976D2',
                                         '#F57C00',
                                         '#FBC02D',
                                         '#7B1FA2',
                                         '#D32F2F'
                                     ],
                                     borderWidth: 1
                                 }]
                             };

                             var myChart = new Chart(ctx, {
                                 type: 'bar',
                                 data: chartData,
                                 options: {
                                     scales: {
                                         y: {
                                             beginAtZero: true
                                         }
                                     }
                                 }
                             });
                         </script>
                     </div>
                 </div>
             </div>
         </section>
         <section id="list-feature-jobs">
             <div class="container">
                 <section class="box_general" id="box-feature-jobs">
                     <div class="box-header">
                         <div class="d-flex box-header__wrap">
                             <div class="box-header__title">
                                 <h2 class="text_ellipsis uppercase box-title">
                                     Việc làm tốt nhất
                                 </h2>
                                 <div class="box-label">
                                     <img src="{{ asset('cdn-new.topcv.vn/unsafe/https_/static.topcv.vn/v4/image/welcome/feature-job/label-toppy-ai.png') }}"
                                         alt>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="box-filter">
                         <form method="GET" action="{{ route('job.filter') }}">
                             <div class="input">
                                 <input type="text" name="city" placeholder="Địa điểm" value="{{ request('city') }}">
                                 <input type="text" name="salary" placeholder="Mức lương"
                                     value="{{ request('salary') }}">
                                 <input type="text" name="experience" placeholder="Kinh nghiệm"
                                     value="{{ request('experience') }}">
                                 <input type="text" name="category" placeholder="Ngành nghề"
                                     value="{{ request('category') }}">
                                 <button type="submit">Lọc</button>
                             </div>
                         </form>
                         <div class="box-smart-filter box-smart-feature-jobs"></div>
                     </div>


                     <div class="text-guide-quick-view guide-box-feature active">
                         <p><i class="fa-solid fa-lightbulb-on fa-fade"></i> <b>Gợi ý</b>: Di chuột vào tiêu đề việc làm
                             để xem thêm thông tin chi tiết
                         </p> <button data-type="guide-box-feature"><i class="fa fa-close"></i></button>
                     </div>
                     <div class="box-feature-job-container">
                         <div>
                             <div class="el-carousel feature-jobs">
                                 <div class="el-carousel-ctn">
                                     <div class="row feature_job_item">
                                         @foreach ($jobPostings as $jobPosting)
                                             <div class="col-md-4 col-sm-6 feature-job job-ta">
                                                 <div class="feature-job-item">
                                                     <div class="cvo-flex">
                                                         <a href="{{ route('job.show', $jobPosting->slug) }}"
                                                             target="_blank">
                                                             <div class="box-company-logo">
                                                                 <div class="avatar">
                                                                     <img title="{{ $jobPosting->company->name }} tuyển dụng tại Vieclamso1"
                                                                         alt="{{ $jobPosting->company->name }} tuyển dụng tại Vieclamso1"
                                                                         src="{{ $jobPosting->company->logo ? asset('storage/' . $jobPosting->company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                                                         class="img-responsive">
                                                                 </div>
                                                             </div>
                                                         </a>
                                                         <div class="col-title cvo-flex-grow">
                                                             <h3>
                                                                 <a href="{{ route('job.show', $jobPosting->slug) }}"
                                                                     target="_blank"
                                                                     class="title quickview-job text_ellipsis">
                                                                     @if ($jobPosting->is_urgent)
                                                                         <span class="label label-warning urgent">Gấp</span>
                                                                     @endif
                                                                     <strong
                                                                         class="job_title">{{ $jobPosting->title }}</strong>
                                                                 </a>
                                                             </h3>
                                                             <a href="{{ route('job.show', $jobPosting->slug) }}"
                                                                 target="_blank"
                                                                 class="text-silver company text_ellipsis company_name">
                                                                 {{ $jobPosting->company->name }}
                                                             </a>
                                                             <div class="box-footer">
                                                                 <div class="col-job-info">
                                                                     <div class="salary">
                                                                         <span
                                                                             class="text_ellipsis">{{ $jobPosting->salary }}</span>
                                                                     </div>
                                                                     <div class="address">
                                                                         <span class="text_ellipsis">
                                                                             @foreach ($jobPosting->cities as $city)
                                                                                 {{ $city->name }}@if (!$loop->last)
                                                                                     ,
                                                                                 @endif
                                                                             @endforeach
                                                                         </span>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-like">
                                                                     <a href=""
                                                                         onclick="saveJob({{ $jobPosting->id }})">
                                                                         <button class="save-job"><i
                                                                                 class="fa-regular fa-heart"></i></button>
                                                                     </a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="feature-job-page">
                             <div class="content">
                                 <div class="feature-job-page__text">
                                     <p class="slick-pagination">
                                         <span class="highlight">{{ $jobPostings->links() }}</span>
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div>


                 </section>
             </div>
         </section>


         <div class="top-company lazy" data-lazy-function="initTopCompany">
             <div class="container">
                 <div class="top-company__header">
                     <h2 class="top-company__title">Top Công ty hàng đầu</h2>
                 </div>
                 <div id="slider-company" class="top-company__body slick-initialized slick-slider">
                     <div class="slick-list draggable">
                         <div class="slick-track">
                             @foreach ($companies as $company)
                                 <div class="slick-slide">
                                     <div class="top-company--item">
                                         <a href="{{ route('company-home.show', $company->slug) }}" target="_blank">
                                             <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                                 class="lazy" alt="{{ $company->name }}">
                                         </a>
                                         <p>{{ $company->name }}</p>
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                     </div>
                 </div>
             </div>
         </div>






         <div class="top-category lazy" data-lazy-function="initTopCategory">
             <div class="container">
                 <div class="top-category__header">
                     <div class="top-category__box-title">
                         <h2 class="top-category__title">
                             Top ngành nghề nổi bật
                         </h2>
                         <p>Bạn muốn tìm việc mới? Xem danh sách việc làm <a class="text-highlight text-underline"
                                 target="_blank" href="{{ route('/') }}">tại đây</a></p>
                     </div>
                     <div class="top-category__navigation">
                         <button disabled="disabled" class="btn btn-prev btn-navigation">
                             <i class="fa-solid fa-chevron-left"></i>
                         </button>
                         <button class="btn btn-next btn-navigation">
                             <i class="fa-solid fa-chevron-right"></i>
                         </button>
                     </div>
                 </div>
                 <div class="top-category__body">
                     <div id="top-category-carousel"
                         class="top-category__carousel owl-carousel owl-theme owl-loaded owl-drag">
                         <div class="owl-stage-outer">
                             <div class="owl-stage"
                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 10530px;">
                                 <div class="owl-item active" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         @foreach ($categories as $category)
                                             <div class="col-md-3">
                                                 <div class="top-category--item">
                                                     <div class="top-category__image">
                                                         <a href="{{ route('categoriehomes.show', $category->slug) }}"
                                                             target="_blank">
                                                             <img src="{{ asset('storage/' . $category->image) }}"
                                                                 alt="{{ $category->name }}" class="lazy entered loaded">
                                                         </a>
                                                     </div>
                                                     <h3 class="top-category__name">
                                                         <a href="{{ route('categoriehomes.show', $category->slug) }}"
                                                             title="{{ $category->name }}" target="_blank">
                                                             {{ $category->name }}
                                                         </a>
                                                     </h3>
                                                     <p class="top-category__caption">
                                                         {{ $category->job_postings_count }}
                                                         việc làm</p>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                     aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                 class="owl-next"><span aria-label="Next">›</span></button></div>
                         <div class="owl-dots disabled"></div>
                     </div>
                 </div>
             </div>
         </div>

         <section id="self-growth" class="self-growth">
             <div class="container">
                 <div class="row">
                     <div class="col-sm-12 self-growth__item">
                         <h2 class="self-growth__title">Cùng Vieclamso1 xây dựng thương hiệu cá nhân</h2>
                         <div class="self-growth__content">
                             <div class="self-growth__content--item">
                                 <div class="content">
                                     <h3>
                                         Vieclamso1 Profile
                                     </h3>
                                     <p>
                                         Vieclamso1 Profile là bản hồ sơ năng lực giúp bạn xây dựng thương hiệu cá nhân,
                                         thể
                                         hiện
                                         thế mạnh của bản thân thông qua việc đính kèm học vấn, kinh nghiệm, dự án, kỹ
                                         năng,... của mình
                                     </p>
                                     <a class="btn btn-success btn-growth" href="{{ route('candidate.account') }}">
                                         Tạo Profile &nbsp;
                                         <i class="fa-light fa-arrow-right"></i>
                                     </a>
                                 </div>
                                 <div class="box-image">
                                     <img class="lazy"
                                         data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/sel-growth/profile-desktop.png"
                                         alt="arnh">
                                 </div>
                             </div>
                             <div class="self-growth__content--item">
                                 <div class="content">
                                     <h3>
                                         CV Builder 2.0
                                     </h3>
                                     <p>
                                         Một chiếc CV chuyên nghiệp sẽ giúp bạn gây ấn tượng với nhà tuyển dụng và tăng
                                         khả
                                         năng vượt qua vòng lọc CV.
                                     </p>
                                     <a class="btn btn-success btn-growth" href="{{ route('cv.upload') }}">
                                         Tạo CV ngay
                                         <i class="fa-light fa-arrow-right"></i>
                                     </a>
                                 </div>
                                 <div class="box-image">
                                     <img class="lazy"
                                         data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/sel-growth/cv-builder-desktop.png"
                                         alt="arnh">
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </section>
         <section id="superior-tool" class="superior-tool">
             <div class="container">
                 <h2>Công cụ vượt trội!</h2>
                 <div class="superior-tool__content">
                     <div class="content__session">
                         <a class="item" href="{{ route('site.courses') }}" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/gross-net.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>Khóa học</h3>
                                 <span>
                                     Khám phá ngay
                                     <i class="fa-solid fa-arrow-right"></i>
                                 </span>
                             </div>
                         </a>
                         <a class="item" href="{{ route('site.app') }}" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/lai-suat-kep.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>App</h3>
                                 <span>
                                     Khám phá ngay
                                     <i class="fa-solid fa-arrow-right"></i>
                                 </span>
                             </div>
                         </a>
                     </div>
                 </div>
             </div>
         </section>
         <section id="achievement-award">
             <div class="container">
                 <div class="achievement-award-decorated">
                     <span></span>
                     <span></span>
                     <span></span>
                 </div>
                 <h2>Giải thưởng, thành tựu</h2>
                 <div class="box-award-item-list">
                     @foreach ($awards as $award)
                         <div class="box-award-item">
                             <img data-src="{{ asset('storage/' . $award->image) }}" class="img-responsive lazy"
                                 title="{{ $award->name }}" alt="{{ $award->name }}" />
                             <div>
                                 <a class="name_award" href="{{ $award->website }}"
                                     target="_blank">{{ $award->name }}</a>
                                 <a class="read_more" href="{{ $award->website }}" target="_blank">Đọc thêm <i
                                         class="fa-solid fa-arrow-right"></i></a>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </section>

         <section id="mobile-app-intro">
             <div class="container">
                 <div class="section-left">
                     <h2 class="title">{{ $info->title_section }}</h2>
                     <h3>{{ $info->title2_section }}</h3>
                     <p>{{ $info->title3_section }}</p>
                     <div class="box-qr-download">
                         <h3>Tải ứng dụng ngay</h3>
                         <div class="box-imgs">
                             <div class="box-img-qr">
                                 <img class="lazy" data-src="{{ asset('storage/' . $info->image_qr_code_download) }}"
                                     alt>
                             </div>
                             <div class="box-img-download-app">
                                 <a href="{{ $info->link_appstore }}" class="box-img-download-appstore">
                                     <img class="lazy" data-src="{{ asset('storage/' . $info->image_appstore) }}" alt>
                                 </a>
                                 <a href="{{ $info->link_googleplay }}" class="box-img-download-chplay">
                                     <img class="lazy" data-src="{{ asset('storage/' . $info->image_googleplay) }} "
                                         alt>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="section-right">
                 </div>
             </div>
         </section>
         <section id="impressive-numbers" class="lazy" data-lazy-function="ImpressiveNumbers">
             <div class=" impressive-numbers-wrapper ">
                 <h2 class="section-title section-title-decorated section-title-decorated-white">Con số ấn tượng</h2>
                 <div class="section-subtitle">Vieclamso1 là công ty công nghệ nhân sự (HR Tech) hàng đầu Việt Nam. Với
                     năng
                     lực lõi là công nghệ, đặc biệt là trí tuệ nhân tạo (AI), sứ mệnh của Vieclamso1 đặt ra cho mình là
                     thay
                     đổi thị trường tuyển dụng - nhân sự ngày một hiệu quả hơn. Bằng công nghệ, chúng tôi tạo ra nền
                     tảng
                     cho phép người lao động tạo CV, phát triển được các kỹ năng cá nhân, xây dựng hình ảnh chuyên
                     nghiệp
                     trong mắt nhà tuyển dụng và tiếp cận với các cơ hội việc làm phù hợp.
                 </div>
                 <div class="box-impressive-numbers__list">
                     <div class="box-impressive-numbers__row">
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{ $totalEmployerCount }}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Nhà tuyển dụng uy tín</div>
                                 <div class="box-impressive-numbers__item--description">Các nhà tuyển dụng đến từ tất
                                     cả
                                     các ngành nghề và được xác thực bởi Vieclamso1</div>
                             </span>
                         </div>
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{ $totalCompanyCount }}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Doanh nghiệp hàng đầu</div>
                                 <div class="box-impressive-numbers__item--description">Vieclamso1 được nhiều doanh
                                     nghiệp
                                     hàng đầu tin tưởng và đồng hành, trong đó có các thương hiệu nổi bật như Samsung,
                                     Viettel, Vingroup, FPT, Techcombank,...</div>
                             </span>
                         </div>
                     </div>
                     <div class="box-impressive-numbers__row row-bottom">
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{ $totalApplicationCount }}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Việc làm đã được kết nối</div>
                                 <div class="box-impressive-numbers__item--description">Vieclamso1 đồng hành và kết nối
                                     hàng
                                     nghìn ứng viên với những cơ hội việc làm hấp dẫn từ các doanh nghiệp uy tín.</div>
                             </span>
                         </div>
                         <div class="box-impressive-numbers__item-image">
                             <img class="lazy" data-src="{{ asset('images/image240.png') }}" alt>
                         </div>
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{ $totalCandidateCount }}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Lượt tải ứng dụng</div>
                                 <div class="box-impressive-numbers__item--description">Hàng triệu ứng viên sử dụng ứng
                                     dụng Vieclamso1 để tìm kiếm việc làm, trong đó có 60% là ứng viên có kinh nghiệm từ
                                     3
                                     năm
                                     trở lên.</div>
                             </span>
                         </div>
                     </div>
                 </div>
                 <div class="globe js-globe lazy" data-lazy-function="initGlobe">
                     <div class="svg-wrapper">
                         <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 984 984"
                             width="984" height="984" style="enable-background:new 0 0 984 984;"
                             xml:space="preserve">
                             <style type="text/css">
                                 .st0 {
                                     fill: #217353;
                                 }
                             </style>
                             <g>
                                 <path class="st0" d="M968.5,492c0,31.2-3.1,62.4-9.2,93c-6.1,30.6-15.2,60.6-27.2,89.4c-23.9,57.6-59.3,110.4-103.5,154.4
         c-44.1,
                                     44.1-96.9,
                                     79.4-154.5,
                                     103.2c-28.8,
                                     11.9-58.8,
                                     21-89.3,
                                     27c-30.6,
                                     6-61.7,
                                     9-92.9,
                                     9c-31.1,
                                     0-62.3-3.1-92.8-9.2 c-30.5-6.1-60.5-15.2-89.2-27.1c-57.5-23.9-110.2-59.3-154.2-103.3c-44-44.1-79.3-96.8-103-154.3c-11.9-28.8-20.9-58.7-26.9-89.2 c-6-30.5-9-61.6-9-92.7c0-31.1,
                                     3.1-62.2,
                                     9.1-92.7C32,
                                     368.8,
                                     41,
                                     338.9,
                                     53,
                                     310.2c23.8-57.5,
                                     59.2-110.1,
                                     103.2-154 c44-43.9,
                                     96.7-79.2,
                                     154.1-102.9c28.7-11.9,
                                     58.6-20.9,
                                     89.1-26.9c30.5-6,
                                     61.6-9,
                                     92.6-9c31.1,
                                     0,
                                     62.1,
                                     3.1,
                                     92.6,
                                     9.1 c30.5,
                                     6.1,
                                     60.3,
                                     15.1,
                                     89,
                                     27c57.4,
                                     23.8,
                                     109.9,
                                     59.1,
                                     153.8,
                                     103.1c43.9,
                                     43.9,
                                     79.1,
                                     96.5,
                                     102.8,
                                     153.9c11.9,
                                     28.7,
                                     20.9,
                                     58.5,
                                     26.9,
                                     89 c6,
                                     30.4,
                                     9,
                                     61.5,
                                     9,
                                     92.5H968.5z M966,
                                     492c0-31-3.1-62-9.1-92.5c-6-30.4-15.1-60.2-27-88.9c-23.8-57.3-59-109.8-102.9-153.6 c-43.9-43.8-96.4-79-153.7-102.6c-28.6-11.8-58.5-20.9-88.9-26.8c-30.4-6-61.4-9-92.4-9c-31,
                                     0-62,
                                     3.1-92.4,
                                     9.1 c-30.4,
                                     6-60.2,
                                     15.1-88.8,
                                     27c-57.2,
                                     23.7-109.6,
                                     58.9-153.4,
                                     102.8C113.7,
                                     201.3,
                                     78.6,
                                     253.8,
                                     55,
                                     311c-11.8,
                                     28.6-20.8,
                                     58.4-26.8,
                                     88.7 c-6,
                                     30.4-9,
                                     61.3-8.9,
                                     92.3c0,
                                     30.9,
                                     3.1,
                                     61.9,
                                     9.1,
                                     92.2c6,
                                     30.3,
                                     15.1,
                                     60.1,
                                     26.9,
                                     88.7C79,
                                     730,
                                     114.2,
                                     782.4,
                                     157.9,
                                     826.1 c43.8,
                                     43.7,
                                     96.1,
                                     78.8,
                                     153.3,
                                     102.4c28.6,
                                     11.8,
                                     58.3,
                                     20.8,
                                     88.6,
                                     26.8c30.3,
                                     6,
                                     61.2,
                                     8.9,
                                     92.1,
                                     8.9c30.9,
                                     0,
                                     61.8-3.1,
                                     92.1-9.1 c30.3-6,
                                     60-15,
                                     88.5-26.9c57.1-23.7,
                                     109.3-58.8,
                                     153-102.5c43.7-43.7,
                                     78.6-96,
                                     102.2-153.1c11.8-28.5,
                                     20.8-58.2,
                                     26.7-88.5 c6-30.3,
                                     8.9-61.2,
                                     8.9-92H966z" />
                             </g>
                         </svg>
                     </div>
                     <ul class="globe-list js-list"></ul><canvas class="globe-canvas js-canvas" width="1400"
                         height="1200"></canvas><button class="btn-play-video"><img class="lazy"
                             data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/icon-play.png"
                             alt></button>
                     <p class="globe-title">Tiếp lợi thế,
                         nối thành công</p>
                     <div class="overlay"></div>
                 </div>
             </div>
         </section>
         <section id="topcv-ecosystem">
             <div class="container">
                 <h2>Hệ sinh thái công nghệ nhân sự của Vieclamso1 bao gồm 4 sản phẩm chủ lực: </h2>
                 <div class="topcv-products-list">
                     @foreach ($ecosystems as $ecosystem)
                         <div class="topcv-product-item">
                             <h3 class="topcv-product-title">{{ $ecosystem->name }} </h3>
                             <div class="topcv-product-content">{{ $ecosystem->detail }} </div><a
                                 class="topcv-product-viewmore" target="_blank" href="{{ $ecosystem->website }}">Tìm
                                 hiểu thêm</span><i class="fa-solid fa-arrow-right"></i></a>
                             <div class="topcv-product-cover"><img class="lazy"
                                     data-src="{{ asset('storage/' . $ecosystem->image) }}" alt="{{ $ecosystem->name }}"
                                     style="max-width: 260px"></div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </section>
         <section id="newspapers-talk-about-topcv">
             <div class="container">
                 <h2>Báo chí nói về Vieclamso1</h2>
                 <div class="box-image">
                     @foreach ($medias as $media)
                         <div class="box-image-item"><a target="_blank" href="{{ $media->website }}"><img
                                     data-src="{{ asset('storage/' . $media->image) }}" class="img-responsive lazy"
                                     title="{{ $media->name }}" alt="{{ $media->name }}" /></a></div>
                     @endforeach
                 </div>
             </div>
         </section>
     </div>

 @endsection
