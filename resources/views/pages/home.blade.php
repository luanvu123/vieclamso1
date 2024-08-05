 @extends('layout')
 @section('content')
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <style>
         /* Phần CSS để trang trí form */
         .search-form {
             display: flex;
             flex-wrap: wrap;
             max-width: 600px;
             margin: auto;
             padding: 20px;
             border: 1px solid #ccc;
             border-radius: 5px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }

         .search-form .form-group {
             flex: 1;
             margin-right: 10px;
         }

         .search-form .form-group label {
             display: block;
             font-weight: bold;
             margin-bottom: 5px;
         }

         .search-form .form-group input[type="text"],
         .search-form .form-group select {
             width: 100%;
             padding: 10px;
             font-size: 16px;
             border: 1px solid #ccc;
             border-radius: 5px;
         }

         .search-form .form-group button {
             background-color: #4CAF50;
             color: white;
             border: none;
             padding: 10px 20px;
             cursor: pointer;
             border-radius: 5px;
         }

         .search-form .form-group button:hover {
             background-color: #45a049;
         }
     </style>
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
                         <form class="search-form" action="/search-jobs" method="GET">
                             <div class="form-group">
                                 <input type="text" id="key" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                             </div>
                             <div class="form-group">
                                 <select id="city" name="city">
                                     <option value="">Chọn thành phố</option>
                                     <option value="Hà Nội">Hà Nội</option>
                                     <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                     <option value="Đà Nẵng">Đà Nẵng</option>
                                     <option value="Cần Thơ">Cần Thơ</option>
                                     <option value="Hải Phòng">Hải Phòng</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <button type="submit">Tìm kiếm</button>
                             </div>
                         </form>
                     </div>
                     <div class="col">
                         <button class="btn-show-video">
                             <img class="img-responsive"
                                 src="{{ asset('storage/' . $info->image_section) }}"
                                 alt>
                         </button>
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
                                     <img src="../cdn-new.topcv.vn/unsafe/https_/static.topcv.vn/v4/image/welcome/feature-job/label-toppy-ai.png"
                                         alt>
                                 </div>
                             </div>
                         </div>
                         <div class="box-header__tool">
                             <span class="see-more">
                                 <a href="viec-lam-tot-nhat.html" target="_blank">
                                     Xem tất cả
                                 </a>
                             </span>
                             <span class="btn-feature-jobs-pre btn-slick-arrow"
                                 :class="{ 'slick-disabled': currentPage === 1 || totalPage === 0 }" @click="backPage">
                                 <i class="fa-solid fa-chevron-left"></i>
                             </span>
                             <span class="btn-feature-jobs-next btn-slick-arrow"
                                 :class="{ 'slick-disabled': currentPage === totalPage || totalPage === 0 }"
                                 @click="nextPage">
                                 <i class="fa-solid fa-chevron-right"></i>
                             </span>
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
                                                                     <img title="{{ $jobPosting->company->name }} tuyển dụng tại TopCV"
                                                                         alt="{{ $jobPosting->company->name }} tuyển dụng tại TopCV"
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
                                                                         class="job_title ">{{ $jobPosting->title }}</strong>
                                                                 </a>
                                                             </h3>
                                                             <a href="{{ route('job.show', $jobPosting->slug) }}"
                                                                 target="_blank"
                                                                 class="text-silver company text_ellipsis company_name">
                                                                 {{ $jobPosting->company->name }}
                                                             </a>
                                                             <div class="box-footer">
                                                                 <div class="col-job-info">
                                                                     <div class="salary"><span
                                                                             class="text_ellipsis">{{ $jobPosting->salary }}</span>
                                                                     </div>
                                                                     <div class="address"><span
                                                                             class="text_ellipsis">{{ $jobPosting->location }}</span>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-like">
                                                                     <a
                                                                         href="javascript:showLoginPopup(null, 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')">
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
                             <div class="content"><span class="btn-feature-jobs-pre btn-slick-arrow slick-disabled"><i
                                         class="fa-solid fa-chevron-left"></i></span>
                                 <div class="feature-job-page__text">
                                     <p class="slick-pagination"><span class="hight-light"> {{ $jobPostings->links() }}
                                     </p>
                                 </div> <span class="btn-feature-jobs-next btn-slick-arrow"><i
                                         class="fa-solid fa-chevron-right"></i></span>
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
                     <div class="top-company__navigation">
                         <button class="btn btn-prev btn-navigation">
                             <i class="fa-solid fa-chevron-left"></i>
                         </button>
                         <button class="btn btn-next btn-navigation">
                             <i class="fa-solid fa-chevron-right"></i>
                         </button>
                     </div>
                 </div>
                 <div id="slider-company" class="top-company__body  slick-initialized slick-slider">
                     <div class="slick-list draggable">
                         <div class="slick-track">
                             @foreach ($companies as $company)
                                 <div class="slick-slide slick-cloned" style="width: 25%;">
                                     <div class="top-company--item">
                                         <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                                             class="lazy">
                                         <p>{{ $company->name }}</p>
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                     </div>
                 </div>
                 <script>
                     $(document).ready(function() {
                         $('#slider-company .slick-track').slick({
                             slidesToShow: 4,
                             slidesToScroll: 4,
                             nextArrow: '.btn-next',
                             prevArrow: '.btn-prev',
                             infinite: false
                         });
                     });
                 </script>

             </div>
         </div>
         <script>
             window.lazyFunctions.initDashboard = async function(element) {
                 await loadScript(
                     '../static.topcv.vn/v4/js/common/chart/chart-demand-job-dashboard.f17c946d4662a289.js');
                 await loadScript(
                     '../static.topcv.vn/v4/js/common/chart/chart-job-opportunity-growth-dashboard.c0ed9cc917481586.js'
                 );
             }
         </script>
         <link rel="stylesheet"
             href="../static.topcv.vn/v4/css/components/desktop/home-page/dashboard.8048fde994d8ae2eG.css">

         <link rel="stylesheet" href="../static.topcv.vn/v4/css/components/home/box-flash-badge.3b535c0dc5d2a99dG.css">
         <div class="top-category lazy" data-lazy-function="initTopCategory">
             <div class="container">
                 <div class="top-category__header">
                     <div class="top-category__box-title">
                         <h2 class="top-category__title">
                             Top ngành nghề nổi bật
                         </h2>
                         <p>Bạn muốn tìm việc mới? Xem danh sách việc làm <a class="text-highlight text-underline"
                                 target="_blank" href="viec-lam.html">tại đây</a></p>
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
                                                             <img src="{{ Storage::url($category->image) }}"
                                                                 alt="{{ $category->name }}" class="lazy entered loaded">
                                                         </a>
                                                     </div>
                                                     <h3 class="top-category__name">
                                                         <a href="{{ route('categoriehomes.show', $category->slug) }}"
                                                             title="{{ $category->name }}" target="_blank">
                                                             {{ $category->name }}
                                                         </a>
                                                     </h3>
                                                     <p class="top-category__caption">{{ $category->job_postings_count }}
                                                         việc làm</p>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-quan-ly-chat-luong-qa-qc-c10037"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/quan-ly-chat-luong-qa-qc.png?v=2"
                                                             alt="Quản lý chất lượng (QA/QC)" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-quan-ly-chat-luong-qa-qc-c10037"
                                                         title="Quản lý chất lượng (QA/QC)" target="_blank">Quản lý
                                                         chất
                                                         lượng (QA/QC)</a></h3>
                                                 <p class="top-category__caption">843 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-cong-nghe-thong-tin-c10131"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/cong-nghe-thong-tin.png?v=2"
                                                             alt="Công nghệ thông tin" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-cong-nghe-thong-tin-c10131"
                                                         title="Công nghệ thông tin" target="_blank">Công nghệ thông
                                                         tin</a></h3>
                                                 <p class="top-category__caption">3.237 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-thu-ky-tro-ly-c10129" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/thu-ky-tro-ly.png?v=2"
                                                             alt="Thư ký / Trợ lý" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-thu-ky-tro-ly-c10129" title="Thư ký / Trợ lý"
                                                         target="_blank">Thư ký / Trợ lý</a>
                                                 </h3>
                                                 <p class="top-category__caption">958 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-thoi-trang-c10042" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/thoi-trang.png?v=2"
                                                             alt="Thời trang" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-thoi-trang-c10042"
                                                         title="Thời trang" target="_blank">Thời trang</a></h3>
                                                 <p class="top-category__caption">995 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-thiet-ke-do-hoa-c10039" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/thiet-ke-do-hoa.png?v=2"
                                                             alt="Thiết kế đồ họa" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-thiet-ke-do-hoa-c10039"
                                                         title="Thiết kế đồ họa" target="_blank">Thiết kế đồ họa</a>
                                                 </h3>
                                                 <p class="top-category__caption">1.288 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-nhan-su-c10034"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/nhan-su.png?v=2"
                                                             alt="Nhân sự" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-nhan-su-c10034"
                                                         title="Nhân sự" target="_blank">Nhân sự</a></h3>
                                                 <p class="top-category__caption">2.152 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-to-chuc-su-kien-qua-tang-c10046"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/to-chuc-su-kien-qua-tang.png?v=2"
                                                             alt="Tổ chức sự kiện / Quà tặng" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-to-chuc-su-kien-qua-tang-c10046"
                                                         title="Tổ chức sự kiện / Quà tặng" target="_blank">Tổ chức
                                                         sự
                                                         kiện / Quà tặng</a></h3>
                                                 <p class="top-category__caption">457 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-xay-dung-c10050"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/xay-dung.png?v=2"
                                                             alt="Xây dựng" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-xay-dung-c10050"
                                                         title="Xây dựng" target="_blank">Xây dựng</a></h3>
                                                 <p class="top-category__caption">1.770 việc làm</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-y-te-duoc-c10051"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/y-te-duoc.png?v=2"
                                                             alt="Y tế / Dược" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-y-te-duoc-c10051"
                                                         title="Y tế / Dược" target="_blank">Y tế / Dược</a></h3>
                                                 <p class="top-category__caption">1.840 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-dien-dien-tu-dien-lanh-c10016"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/dien-dien-tu-dien-lanh.png?v=2"
                                                             alt="Điện / Điện tử / Điện lạnh" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-dien-dien-tu-dien-lanh-c10016"
                                                         title="Điện / Điện tử / Điện lạnh" target="_blank">Điện /
                                                         Điện
                                                         tử / Điện lạnh</a></h3>
                                                 <p class="top-category__caption">1.741 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-bien-phien-dich-c10003" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/bien-phien-dich.png?v=2"
                                                             alt="Biên / Phiên dịch" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-bien-phien-dich-c10003"
                                                         title="Biên / Phiên dịch" target="_blank">Biên / Phiên
                                                         dịch</a>
                                                 </h3>
                                                 <p class="top-category__caption">1.402 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-co-khi-che-tao-tu-dong-hoa-c10010"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/co-khi-che-tao-tu-dong-hoa.png?v=2"
                                                             alt="Cơ khí / Chế tạo / Tự động hóa" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-co-khi-che-tao-tu-dong-hoa-c10010"
                                                         title="Cơ khí / Chế tạo / Tự động hóa" target="_blank">Cơ
                                                         khí /
                                                         Chế tạo / Tự động hóa</a></h3>
                                                 <p class="top-category__caption">1.541 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-ngan-hang-tai-chinh-c10033"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/ngan-hang-tai-chinh.png?v=2"
                                                             alt="Ngân hàng / Tài chính" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-ngan-hang-tai-chinh-c10033"
                                                         title="Ngân hàng / Tài chính" target="_blank">Ngân hàng /
                                                         Tài
                                                         chính</a></h3>
                                                 <p class="top-category__caption">2.869 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-thuc-pham-do-uong-c10043"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/thuc-pham-do-uong.png?v=2"
                                                             alt="Thực phẩm / Đồ uống" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-thuc-pham-do-uong-c10043"
                                                         title="Thực phẩm / Đồ uống" target="_blank">Thực phẩm / Đồ
                                                         uống</a></h3>
                                                 <p class="top-category__caption">1.253 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-luat-phap-ly-c10036" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/luat-phap-ly.png?v=2"
                                                             alt="Luật/Pháp lý" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-luat-phap-ly-c10036" title="Luật/Pháp lý"
                                                         target="_blank">Luật/Pháp lý</a></h3>
                                                 <p class="top-category__caption">711 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-bao-chi-truyen-hinh-c10004"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/bao-chi-truyen-hinh.png?v=2"
                                                             alt="Báo chí / Truyền hình" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-bao-chi-truyen-hinh-c10004"
                                                         title="Báo chí / Truyền hình" target="_blank">Báo chí /
                                                         Truyền
                                                         hình</a></h3>
                                                 <p class="top-category__caption">1.790 việc làm</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-quan-ly-dieu-hanh-c10038"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/quan-ly-dieu-hanh.png?v=2"
                                                             alt="Quản lý điều hành" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-quan-ly-dieu-hanh-c10038"
                                                         title="Quản lý điều hành" target="_blank">Quản lý điều
                                                         hành</a>
                                                 </h3>
                                                 <p class="top-category__caption">1.257 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-nganh-nghe-khac-c11000" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/nganh-nghe-khac.png?v=2"
                                                             alt="Ngành nghề khác" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-nganh-nghe-khac-c11000"
                                                         title="Ngành nghề khác" target="_blank">Ngành nghề khác</a>
                                                 </h3>
                                                 <p class="top-category__caption">1.486 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-dien-tu-vien-thong-c10015"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/dien-tu-vien-thong.png?v=2"
                                                             alt="Điện tử viễn thông" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-dien-tu-vien-thong-c10015"
                                                         title="Điện tử viễn thông" target="_blank">Điện tử viễn
                                                         thông</a></h3>
                                                 <p class="top-category__caption">745 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-logistics-c10048"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/logistics.png?v=2"
                                                             alt="Logistics" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-logistics-c10048"
                                                         title="Logistics" target="_blank">Logistics</a></h3>
                                                 <p class="top-category__caption">1.525 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-khach-san-nha-hang-c10027"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/khach-san-nha-hang.png?v=2"
                                                             alt="Khách sạn / Nhà hàng" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-khach-san-nha-hang-c10027"
                                                         title="Khách sạn / Nhà hàng" target="_blank">Khách sạn / Nhà
                                                         hàng</a></h3>
                                                 <p class="top-category__caption">1.319 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-xuat-nhap-khau-c10049" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/xuat-nhap-khau.png?v=2"
                                                             alt="Xuất nhập khẩu" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-xuat-nhap-khau-c10049" title="Xuất nhập khẩu"
                                                         target="_blank">Xuất nhập khẩu</a>
                                                 </h3>
                                                 <p class="top-category__caption">1.327 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-it-phan-cung-mang-c10025"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/it-phan-cung-mang.png?v=2"
                                                             alt="IT Phần cứng / Mạng" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-it-phan-cung-mang-c10025"
                                                         title="IT Phần cứng / Mạng" target="_blank">IT Phần cứng /
                                                         Mạng</a></h3>
                                                 <p class="top-category__caption">1.063 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-du-lich-c10011"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/du-lich.png?v=2"
                                                             alt="Du lịch" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-du-lich-c10011"
                                                         title="Du lịch" target="_blank">Du lịch</a></h3>
                                                 <p class="top-category__caption">755 việc làm</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-chung-khoan-vang-ngoai-te-c10008"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/chung-khoan-vang-ngoai-te.png?v=2"
                                                             alt="Chứng khoán / Vàng / Ngoại tệ" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-chung-khoan-vang-ngoai-te-c10008"
                                                         title="Chứng khoán / Vàng / Ngoại tệ" target="_blank">Chứng
                                                         khoán / Vàng / Ngoại tệ</a></h3>
                                                 <p class="top-category__caption">342 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-dich-vu-khach-hang-c10014"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/dich-vu-khach-hang.png?v=2"
                                                             alt="Dịch vụ khách hàng" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-dich-vu-khach-hang-c10014"
                                                         title="Dịch vụ khách hàng" target="_blank">Dịch vụ khách
                                                         hàng</a></h3>
                                                 <p class="top-category__caption">4.863 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hoach-dinh-du-an-c10019" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hoach-dinh-du-an.png?v=2"
                                                             alt="Hoạch định/Dự án" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-hoach-dinh-du-an-c10019"
                                                         title="Hoạch định/Dự án" target="_blank">Hoạch định/Dự
                                                         án</a>
                                                 </h3>
                                                 <p class="top-category__caption">366 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-tai-chinh-dau-tu-c10127" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/tai-chinh-dau-tu.png?v=2"
                                                             alt="Tài chính / Đầu tư" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-tai-chinh-dau-tu-c10127"
                                                         title="Tài chính / Đầu tư" target="_blank">Tài chính / Đầu
                                                         tư</a></h3>
                                                 <p class="top-category__caption">1.210 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-cong-nghe-o-to-c10052" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/cong-nghe-o-to.png?v=2"
                                                             alt="Công nghệ Ô tô" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-cong-nghe-o-to-c10052" title="Công nghệ Ô tô"
                                                         target="_blank">Công nghệ Ô tô</a>
                                                 </h3>
                                                 <p class="top-category__caption">384 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-my-pham-trang-suc-c10031"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/my-pham-trang-suc.png?v=2"
                                                             alt="Mỹ phẩm / Trang sức" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-my-pham-trang-suc-c10031"
                                                         title="Mỹ phẩm / Trang sức" target="_blank">Mỹ phẩm / Trang
                                                         sức</a></h3>
                                                 <p class="top-category__caption">733 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-kien-truc-c10120"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/kien-truc.png?v=2"
                                                             alt="Kiến trúc" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-kien-truc-c10120"
                                                         title="Kiến trúc" target="_blank">Kiến trúc</a></h3>
                                                 <p class="top-category__caption">720 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-bat-dong-san-c10007" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/bat-dong-san.png?v=2"
                                                             alt="Bất động sản" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-bat-dong-san-c10007" title="Bất động sản"
                                                         target="_blank">Bất động sản</a></h3>
                                                 <p class="top-category__caption">1.496 việc làm</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-thiet-ke-noi-that-c10128"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/thiet-ke-noi-that.png?v=2"
                                                             alt="Thiết kế nội thất" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-thiet-ke-noi-that-c10128"
                                                         title="Thiết kế nội thất" target="_blank">Thiết kế nội
                                                         thất</a>
                                                 </h3>
                                                 <p class="top-category__caption">786 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-san-xuat-c10126"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/san-xuat.png?v=2"
                                                             alt="Sản xuất" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-san-xuat-c10126"
                                                         title="Sản xuất" target="_blank">Sản xuất</a></h3>
                                                 <p class="top-category__caption">1.432 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-my-thuat-nghe-thuat-dien-anh-c10032"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/my-thuat-nghe-thuat-dien-anh.png?v=2"
                                                             alt="Mỹ thuật / Nghệ thuật / Điện ảnh" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-my-thuat-nghe-thuat-dien-anh-c10032"
                                                         title="Mỹ thuật / Nghệ thuật / Điện ảnh" target="_blank">Mỹ
                                                         thuật / Nghệ thuật / Điện ảnh</a></h3>
                                                 <p class="top-category__caption">585 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-cong-nghe-cao-c10009" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/cong-nghe-cao.png?v=2"
                                                             alt="Công nghệ cao" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-cong-nghe-cao-c10009" title="Công nghệ cao"
                                                         target="_blank">Công nghệ cao</a></h3>
                                                 <p class="top-category__caption">487 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-nong-lam-ngu-nghiep-c10035"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/nong-lam-ngu-nghiep.png?v=2"
                                                             alt="Nông / Lâm / Ngư nghiệp" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-nong-lam-ngu-nghiep-c10035"
                                                         title="Nông / Lâm / Ngư nghiệp" target="_blank">Nông / Lâm /
                                                         Ngư
                                                         nghiệp</a></h3>
                                                 <p class="top-category__caption">252 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-duoc-pham-cong-nghe-sinh-hoc-c10110"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/duoc-pham-cong-nghe-sinh-hoc.png?v=2"
                                                             alt="Dược phẩm / Công nghệ sinh học" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-duoc-pham-cong-nghe-sinh-hoc-c10110"
                                                         title="Dược phẩm / Công nghệ sinh học" target="_blank">Dược
                                                         phẩm
                                                         / Công nghệ sinh học</a></h3>
                                                 <p class="top-category__caption">773 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-spa-lam-dep-c10130" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/spa-lam-dep.png?v=2"
                                                             alt="Spa / Làm đẹp" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-spa-lam-dep-c10130"
                                                         title="Spa / Làm đẹp" target="_blank">Spa / Làm đẹp</a></h3>
                                                 <p class="top-category__caption">856 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hang-tieu-dung-c10117" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hang-tieu-dung.png?v=2"
                                                             alt="Hàng tiêu dùng" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-hang-tieu-dung-c10117" title="Hàng tiêu dùng"
                                                         target="_blank">Hàng tiêu dùng</a>
                                                 </h3>
                                                 <p class="top-category__caption">393 việc làm</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-det-may-da-giay-c10013" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/det-may-da-giay.png?v=2"
                                                             alt="Dệt may / Da giày" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-det-may-da-giay-c10013"
                                                         title="Dệt may / Da giày" target="_blank">Dệt may / Da
                                                         giày</a>
                                                 </h3>
                                                 <p class="top-category__caption">387 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-hang-hai-c10021"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hang-hai.png?v=2"
                                                             alt="Hàng hải" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-hang-hai-c10021"
                                                         title="Hàng hải" target="_blank">Hàng hải</a></h3>
                                                 <p class="top-category__caption">48 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-an-toan-lao-dong-c10101" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/an-toan-lao-dong.png?v=2"
                                                             alt="An toàn lao động" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-an-toan-lao-dong-c10101"
                                                         title="An toàn lao động" target="_blank">An toàn lao
                                                         động</a>
                                                 </h3>
                                                 <p class="top-category__caption">127 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hoa-hoc-sinh-hoc-c10018" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hoa-hoc-sinh-hoc.png?v=2"
                                                             alt="Hoá học / Sinh học" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-hoa-hoc-sinh-hoc-c10018"
                                                         title="Hoá học / Sinh học" target="_blank">Hoá học / Sinh
                                                         học</a></h3>
                                                 <p class="top-category__caption">285 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-bao-tri-sua-chua-c10104" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/bao-tri-sua-chua.png?v=2"
                                                             alt="Bảo trì / Sửa chữa" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-bao-tri-sua-chua-c10104"
                                                         title="Bảo trì / Sửa chữa" target="_blank">Bảo trì / Sửa
                                                         chữa</a></h3>
                                                 <p class="top-category__caption">690 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-moi-truong-xu-ly-chat-thai-c10030"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/moi-truong-xu-ly-chat-thai.png?v=2"
                                                             alt="Môi trường / Xử lý chất thải" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-moi-truong-xu-ly-chat-thai-c10030"
                                                         title="Môi trường / Xử lý chất thải" target="_blank">Môi
                                                         trường
                                                         / Xử lý chất thải</a></h3>
                                                 <p class="top-category__caption">213 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-buu-chinh-vien-thong-c10005"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/buu-chinh-vien-thong.png?v=2"
                                                             alt="Bưu chính - Viễn thông" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-buu-chinh-vien-thong-c10005"
                                                         title="Bưu chính - Viễn thông" target="_blank">Bưu chính -
                                                         Viễn
                                                         thông</a></h3>
                                                 <p class="top-category__caption">469 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hang-gia-dung-c10020" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hang-gia-dung.png?v=2"
                                                             alt="Hàng gia dụng" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-hang-gia-dung-c10020" title="Hàng gia dụng"
                                                         target="_blank">Hàng gia dụng</a></h3>
                                                 <p class="top-category__caption">277 việc làm</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-ban-hang-ky-thuat-c10102"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/ban-hang-ky-thuat.png?v=2"
                                                             alt="Bán hàng kỹ thuật" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-ban-hang-ky-thuat-c10102"
                                                         title="Bán hàng kỹ thuật" target="_blank">Bán hàng kỹ
                                                         thuật</a>
                                                 </h3>
                                                 <p class="top-category__caption">600 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-ban-le-ban-si-c10103" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/ban-le-ban-si.png?v=2"
                                                             alt="Bán lẻ / bán sỉ" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-ban-le-ban-si-c10103" title="Bán lẻ / bán sỉ"
                                                         target="_blank">Bán lẻ / bán sỉ</a>
                                                 </h3>
                                                 <p class="top-category__caption">2.164 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-bao-hiem-c10006"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/bao-hiem.png?v=2"
                                                             alt="Bảo hiểm" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-bao-hiem-c10006"
                                                         title="Bảo hiểm" target="_blank">Bảo hiểm</a></h3>
                                                 <p class="top-category__caption">520 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-dau-khi-hoa-chat-c10012" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/dau-khi-hoa-chat.png?v=2"
                                                             alt="Dầu khí/Hóa chất" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-dau-khi-hoa-chat-c10012"
                                                         title="Dầu khí/Hóa chất" target="_blank">Dầu khí/Hóa
                                                         chất</a>
                                                 </h3>
                                                 <p class="top-category__caption">130 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-in-an-xuat-ban-c10024" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/in-an-xuat-ban.png?v=2"
                                                             alt="In ấn / Xuất bản" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-in-an-xuat-ban-c10024"
                                                         title="In ấn / Xuất bản" target="_blank">In ấn / Xuất
                                                         bản</a>
                                                 </h3>
                                                 <p class="top-category__caption">160 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hang-khong-c10022" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hang-khong.png?v=2"
                                                             alt="Hàng không" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-hang-khong-c10022"
                                                         title="Hàng không" target="_blank">Hàng không</a></h3>
                                                 <p class="top-category__caption">80 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-ngo-phi-chinh-phu-phi-loi-nhuan-c10132"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/ngo-phi-chinh-phu-phi-loi-nhuan.png?v=2"
                                                             alt="NGO / Phi chính phủ / Phi lợi nhuận" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-ngo-phi-chinh-phu-phi-loi-nhuan-c10132"
                                                         title="NGO / Phi chính phủ / Phi lợi nhuận" target="_blank">NGO
                                                         / Phi chính phủ / Phi lợi nhuận</a></h3>
                                                 <p class="top-category__caption">9 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-dia-chat-khoang-san-c10111"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/dia-chat-khoang-san.png?v=2"
                                                             alt="Địa chất / Khoáng sản" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-dia-chat-khoang-san-c10111"
                                                         title="Địa chất / Khoáng sản" target="_blank">Địa chất /
                                                         Khoáng
                                                         sản</a></h3>
                                                 <p class="top-category__caption">30 việc làm</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="owl-item" style="width: 1140px; margin-right: 30px;">
                                     <div class="row mx-2">
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-phi-chinh-phu-phi-loi-nhuan-c10124"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/phi-chinh-phu-phi-loi-nhuan.png?v=2"
                                                             alt="Phi chính phủ / Phi lợi nhuận" class="lazy"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-phi-chinh-phu-phi-loi-nhuan-c10124"
                                                         title="Phi chính phủ / Phi lợi nhuận" target="_blank">Phi
                                                         chính
                                                         phủ / Phi lợi nhuận</a></h3>
                                                 <p class="top-category__caption">2 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-san-pham-cong-nghiep-c10125"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/san-pham-cong-nghiep.png?v=2"
                                                             alt="Sản phẩm công nghiệp" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-san-pham-cong-nghiep-c10125"
                                                         title="Sản phẩm công nghiệp" target="_blank">Sản phẩm công
                                                         nghiệp</a></h3>
                                                 <p class="top-category__caption">235 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hang-cao-cap-c10113" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hang-cao-cap.png?v=2"
                                                             alt="Hàng cao cấp" class="lazy"></a></div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-hang-cao-cap-c10113" title="Hàng cao cấp"
                                                         target="_blank">Hàng cao cấp</a></h3>
                                                 <p class="top-category__caption">100 việc làm</p>
                                             </div>
                                         </div>
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
         <link rel="stylesheet"
             href="../static.topcv.vn/v4/css/components/partials/self-growth.min.90d4930a9a50c71fG.css">
         <section id="self-growth" class="self-growth">
             <div class="container">
                 <div class="row">
                     <div class="col-sm-12 self-growth__item">
                         <h2 class="self-growth__title">Cùng TopCV xây dựng thương hiệu cá nhân</h2>
                         <div class="self-growth__content">
                             <div class="self-growth__content--item">
                                 <div class="content">
                                     <h3>
                                         TopCV Profile
                                     </h3>
                                     <p>
                                         TopCV Profile là bản hồ sơ năng lực giúp bạn xây dựng thương hiệu cá nhân, thể
                                         hiện
                                         thế mạnh của bản thân thông qua việc đính kèm học vấn, kinh nghiệm, dự án, kỹ
                                         năng,... của mình
                                     </p>
                                     <a class="btn btn-success btn-growth" href="{{route('candidate.account')}}">
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
                                     <a class="btn btn-success btn-growth" href="{{route('cv.upload')}}">
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
                         <a class="item" href="{{route('site.courses')}}" target="_blank">
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
                         <a class="item" href="{{route('site.app')}}" target="_blank">
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
                     <h2 class="title">{{$info->title_section}}</h2>
                     <h3>{{$info->title2_section}}</h3>
                     <p>{{$info->title3_section}}</p>
                     <div class="box-qr-download">
                         <h3>Tải ứng dụng ngay</h3>
                         <div class="box-imgs">
                             <div class="box-img-qr">
                                 <img class="lazy"
                                     data-src="{{ asset('storage/' . $info->image_qr_code_download) }}"
                                     alt>
                             </div>
                             <div class="box-img-download-app">
                                 <a href="{{$info->link_appstore}}"
                                     class="box-img-download-appstore">
                                     <img class="lazy"
                                         data-src="{{ asset('storage/' . $info->image_appstore) }}"
                                         alt>
                                 </a>
                                 <a href="{{$info->link_googleplay}}"
                                     class="box-img-download-chplay">
                                     <img class="lazy"
                                         data-src="{{ asset('storage/' . $info->image_googleplay) }} "
                                         alt >
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
                 <div class="section-subtitle">TopCV là công ty công nghệ nhân sự (HR Tech) hàng đầu Việt Nam. Với năng
                     lực lõi là công nghệ, đặc biệt là trí tuệ nhân tạo (AI), sứ mệnh của TopCV đặt ra cho mình là thay
                     đổi thị trường tuyển dụng - nhân sự ngày một hiệu quả hơn. Bằng công nghệ, chúng tôi tạo ra nền tảng
                     cho phép người lao động tạo CV, phát triển được các kỹ năng cá nhân, xây dựng hình ảnh chuyên nghiệp
                     trong mắt nhà tuyển dụng và tiếp cận với các cơ hội việc làm phù hợp.
                 </div>
                 <div class="box-impressive-numbers__list">
                     <div class="box-impressive-numbers__row">
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{ $totalEmployerCount }}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Nhà tuyển dụng uy tín</div>
                                 <div class="box-impressive-numbers__item--description">Các nhà tuyển dụng đến từ tất cả các ngành nghề và được xác thực bởi TopCV</div>
                             </span>
                         </div>
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{ $totalCompanyCount }}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Doanh nghiệp hàng đầu</div>
                                 <div class="box-impressive-numbers__item--description">TopCV được nhiều doanh nghiệp
                                     hàng đầu tin tưởng và đồng hành, trong đó có các thương hiệu nổi bật như Samsung,
                                     Viettel, Vingroup, FPT, Techcombank,...</div>
                             </span>
                         </div>
                     </div>
                     <div class="box-impressive-numbers__row row-bottom">
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{$totalApplicationCount}}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Việc làm đã được kết nối</div>
                                 <div class="box-impressive-numbers__item--description">TopCV đồng hành và kết nối hàng
                                     nghìn ứng viên với những cơ hội việc làm hấp dẫn từ các doanh nghiệp uy tín.</div>
                             </span>
                         </div>
                         <div class="box-impressive-numbers__item-image">
                             <img class="lazy"
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/home/topcv_processor_2x.png"
                                 alt="TopCV Processor">
                         </div>
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="{{$totalCandidateCount}}">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Lượt tải ứng dụng</div>
                                 <div class="box-impressive-numbers__item--description">Hàng triệu ứng viên sử dụng ứng
                                     dụng TopCV để tìm kiếm việc làm, trong đó có 60% là ứng viên có kinh nghiệm từ 3 năm
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
                                                      c-44.1,44.1-96.9,79.4-154.5,103.2c-28.8,11.9-58.8,21-89.3,27c-30.6,6-61.7,9-92.9,9c-31.1,0-62.3-3.1-92.8-9.2
                                                      c-30.5-6.1-60.5-15.2-89.2-27.1c-57.5-23.9-110.2-59.3-154.2-103.3c-44-44.1-79.3-96.8-103-154.3c-11.9-28.8-20.9-58.7-26.9-89.2
                                                      c-6-30.5-9-61.6-9-92.7c0-31.1,3.1-62.2,9.1-92.7C32,368.8,41,338.9,53,310.2c23.8-57.5,59.2-110.1,103.2-154
                                                      c44-43.9,96.7-79.2,154.1-102.9c28.7-11.9,58.6-20.9,89.1-26.9c30.5-6,61.6-9,92.6-9c31.1,0,62.1,3.1,92.6,9.1
                                                      c30.5,6.1,60.3,15.1,89,27c57.4,23.8,109.9,59.1,153.8,103.1c43.9,43.9,79.1,96.5,102.8,153.9c11.9,28.7,20.9,58.5,26.9,89
                                                      c6,30.4,9,61.5,9,92.5H968.5z M966,492c0-31-3.1-62-9.1-92.5c-6-30.4-15.1-60.2-27-88.9c-23.8-57.3-59-109.8-102.9-153.6
                                                      c-43.9-43.8-96.4-79-153.7-102.6c-28.6-11.8-58.5-20.9-88.9-26.8c-30.4-6-61.4-9-92.4-9c-31,0-62,3.1-92.4,9.1
                                                      c-30.4,6-60.2,15.1-88.8,27c-57.2,23.7-109.6,58.9-153.4,102.8C113.7,201.3,78.6,253.8,55,311c-11.8,28.6-20.8,58.4-26.8,88.7
                                                      c-6,30.4-9,61.3-8.9,92.3c0,30.9,3.1,61.9,9.1,92.2c6,30.3,15.1,60.1,26.9,88.7C79,730,114.2,782.4,157.9,826.1
                                                      c43.8,43.7,96.1,78.8,153.3,102.4c28.6,11.8,58.3,20.8,88.6,26.8c30.3,6,61.2,8.9,92.1,8.9c30.9,0,61.8-3.1,92.1-9.1
                                                      c30.3-6,60-15,88.5-26.9c57.1-23.7,109.3-58.8,153-102.5c43.7-43.7,78.6-96,102.2-153.1c11.8-28.5,20.8-58.2,26.7-88.5
                                                      c6-30.3,8.9-61.2,8.9-92H966z" />
                             </g>
                         </svg>
                     </div>
                     <ul class="globe-list js-list"></ul>
                     <canvas class="globe-canvas js-canvas" width="1400" height="1200"></canvas>
                     <button class="btn-play-video">
                         <img class="lazy"
                             data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/icon-play.png"
                             alt>
                     </button>
                     <p class="globe-title">Tiếp lợi thế, nối thành công</p>
                     <div class="overlay"></div>
                 </div>

                 <script>
                     const urlPointGlobeJson = 'https://static.topcv.vn/v4/cdn/plugins/three-js/globe-points.json'
                 </script>
                 <script>
                     window.lazyFunctions.initGlobe = async function(element) {
                         await window.loadScript('../static.topcv.vn/v4/cdn/plugins/three-js/three.js');
                         await window.loadScript('../static.topcv.vn/v4/cdn/plugins/three-js/ThreeOrbitControls.js');
                         await window.loadScript('../static.topcv.vn/v4/cdn/plugins/three-js/THREE.MeshLine.js');
                         await window.loadScript('../static.topcv.vn/v4/js/common/globe-threejs.a8d903dbf41fd7c7.js');
                     }
                 </script>
             </div>
         </section>
         <section id="topcv-ecosystem">
             <div class="container">
                 <h2>
                     Hệ sinh thái công nghệ nhân sự của TopCV bao gồm 4 sản phẩm chủ lực:
                 </h2>
                 <div class="topcv-products-list">
                     @foreach ($ecosystems as $ecosystem)
                         <div class="topcv-product-item">
                             <h3 class="topcv-product-title">
                                 {{ $ecosystem->name }}
                             </h3>
                             <div class="topcv-product-content">
                                 {{ $ecosystem->detail }}
                             </div>
                             <a class="topcv-product-viewmore" target="_blank" href="{{ $ecosystem->website }}">
                                 Tìm hiểu thêm</span><i class="fa-solid fa-arrow-right"></i>
                             </a>
                             <div class="topcv-product-cover">
                                 <img class="lazy" data-src="{{ asset('storage/' . $ecosystem->image) }}"
                                     alt="{{ $ecosystem->name }}" style="max-width: 260px">
                             </div>
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
                <div class="box-image-item">
                    <a target="_blank" href="{{ $media->website }}">
                        <img data-src="{{ asset('storage/' . $media->image) }}" class="img-responsive lazy" title="{{ $media->name }}" alt="{{ $media->name }}" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
     </div>
 @endsection
