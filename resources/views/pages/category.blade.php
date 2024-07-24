 @extends('layout')
 @section('content')
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/desktop/search-job.min.5b2166bc3defa96bK.css">
     <link
         rel="stylesheet"href="https://static.topcv.vn/v4/css/components/desktop/jobs/job-list-search-result.f3a3504e765512c7K.css">
     <div class="search-job">
         <div class="header">
             <div class="box-search-job">
                 <div class="container">
                     <style>
                         /* CSS cho form */
                         .search-form {
                             display: flex;
                             /* Sử dụng Flexbox để bố trí các phần tử */
                             align-items: center;
                             /* Căn chỉnh các phần tử theo chiều dọc */
                             gap: 10px;
                             /* Khoảng cách giữa các phần tử */
                         }

                         /* CSS cho các item bên trong form */
                         .search-form .item {
                             flex: 1;
                             /* Đảm bảo rằng các item có thể mở rộng để lấp đầy không gian */
                         }

                         /* CSS cho input và select */
                         .search-form input[type="text"],
                         .search-form select {
                             width: 100%;
                             /* Đảm bảo input và select chiếm hết chiều rộng của item chứa nó */
                             padding: 8px;
                             /* Thêm padding cho các input và select */
                             border: 1px solid #ccc;
                             /* Đặt viền cho các input và select */
                             border-radius: 4px;
                             /* Bo tròn các góc của input và select */
                         }

                         /* CSS cho button */
                         .search-form button {
                             padding: 8px 16px;
                             /* Thêm padding cho button */
                             background-color: #19993d;
                             /* Màu nền cho button */
                             color: white;
                             /* Màu chữ trên button */
                             border: none;
                             /* Loại bỏ viền mặc định của button */
                             border-radius: 4px;
                             /* Bo tròn các góc của button */
                             cursor: pointer;
                             /* Hiển thị con trỏ chuột kiểu tay khi di chuột lên button */
                         }

                         .search-form button:hover {
                             background-color: #00b342;
                             /* Thay đổi màu nền khi di chuột lên button */
                         }
                     </style>
                     <form class="search-form" action="/search-jobs" method="GET">
                         <div class="item item-search">
                             <input type="text" id="key" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                         </div>
                         <div class="item item-search">
                             <select id="city" name="city">
                                 <option value="">Chọn thành phố</option>
                                 <option value="Hà Nội">Hà Nội</option>
                                 <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                 <option value="Đà Nẵng">Đà Nẵng</option>
                                 <option value="Cần Thơ">Cần Thơ</option>
                                 <option value="Hải Phòng">Hải Phòng</option>
                             </select>
                         </div>
                         <div class="item item-search">
                             <button type="submit">Tìm kiếm</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <div class="container">
             <div class="d-flex justify-content-between wrap-seo-breadcrumb align-items-center">
                 <div class="d-flex flex-column">
                     <h1 id="search-job-heading" class="search-job-heading">
                         Công việc trong danh mục: {{ $category->name }}
                     </h1>
                     <div id="breadcrumb">
                         <div class="custom-breadcrumb">
                             <ul class="nav">
                                 <li class="nav-item">
                                     <a href="{{ route('/') }}">Trang chủ</a>
                                 </li>
                                 <i class="fa-solid fa-angle-right"></i>
                                 <li class="nav-item">
                                     <a href="#">Tìm việc làm</a>
                                 </li>
                                 <i class="fa-solid fa-angle-right"></i>
                                 <p class="breadcrumb-heading">
                                     Công việc trong danh mục: {{ $category->name }}
                                 </p>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="result-job-search">
             <div class="container">
                 <div class="list-job">
                     <div class="job-body wrapper-main">
                         <div class="col-md-9">
                             <div class="wrapper-content">
                                 <div class="job-list-main">
                                     <div class="box-job-list">
                                         <div class="job-list-search-result">
                                             @if ($jobPostings->isEmpty())
                                                 <p>Không tìm thấy công việc nào trong danh mục này.</p>
                                             @else
                                                 <div class="job-list">
                                                     @foreach ($jobPostings as $jobPosting)
                                                         <div class="job-item-search-result job-ta"
                                                             data-job-id="{{ $jobPosting->id }}"
                                                             data-job-position="{{ $jobPosting->id }}">
                                                             <div class="avatar">
                                                                 <a target="_blank"
                                                                     href="{{ route('job.show', $jobPosting->slug) }}"
                                                                     rel="noopener noreferrer">
                                                                     <img src="{{ $jobPosting->logo ? asset('storage/' . $jobPosting->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                                                         class="w-100 lazy"
                                                                         alt="{{ $jobPosting->company_name }}"
                                                                         title="{{ $jobPosting->title }}">
                                                                 </a>
                                                             </div>
                                                             <div class="body">
                                                                 <div class="body-content">
                                                                     <div class="title-block">
                                                                         <div>
                                                                             <h3 class="title">
                                                                                 <div class="box-label-top">
                                                                                 </div>
                                                                                 <a target="_blank"
                                                                                     href="{{ route('job.show', $jobPosting->slug) }}"
                                                                                     rel="noopener noreferrer">
                                                                                     <span data-toggle="tooltip"
                                                                                         data-container="body"
                                                                                         data-placement="top" title=""
                                                                                         data-original-title="{{ $jobPosting->title }}">
                                                                                         {{ $jobPosting->title }}
                                                                                     </span>
                                                                                 </a>
                                                                             </h3>
                                                                             <a class="company"
                                                                                 href="{{ route('job.show', $jobPosting->slug) }}"
                                                                                 data-toggle="tooltip" title=""
                                                                                 data-placement="top" target="_blank"
                                                                                 rel="noopener noreferrer"
                                                                                 data-original-title="{{ $jobPosting->company_name }}">
                                                                                 {{ $jobPosting->company_name }}
                                                                             </a>
                                                                         </div>
                                                                         <div class="box-right">
                                                                             <label class="title-salary">
                                                                                 {{ $jobPosting->salary }}
                                                                             </label>
                                                                             <p class="quick-view-job-detail">Xem <span
                                                                                     class="speed">nhanh</span> <i
                                                                                     class="fa-solid fa-chevrons-right"></i>
                                                                             </p>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <div class="info">
                                                                     <div class="label-content">
                                                                         <label class="address" data-toggle="tooltip"
                                                                             data-html="true" title=""
                                                                             data-placement="top"
                                                                             data-original-title="{{ $jobPosting->area }}">
                                                                             {{ $jobPosting->area }}
                                                                         </label>
                                                                         <label class="time mobile-hidden">
                                                                             Còn
                                                                             <strong>{{ \Carbon\Carbon::parse($jobPosting->closing_date)->diffInDays() }}</strong>
                                                                             ngày để ứng tuyển
                                                                         </label>
                                                                         <label class="address mobile-hidden"
                                                                             data-container="body">
                                                                             Cập nhật
                                                                             {{ \Carbon\Carbon::parse($jobPosting->updated_at)->diffForHumans() }}
                                                                         </label>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="overlay-ignore">
                                                             </div>
                                                         </div>
                                                     @endforeach
                                                 </div>
                                             @endif
                                         </div>
                                         <script></script>
                                     </div>
                                     <link rel="stylesheet"
                                         href="https://static.topcv.vn/v4/css/components/box-job-notification-setting.6e3fb86463e68cdfK.css">
                                 </div>
                                 <div class="job-list-detail"></div>
                                 <!-- Phân trang -->
                                 {{ $jobPostings->links() }}
                             </div>


                         </div>
                         <div class="col-md-3 right-box box-interested">
                             <div class="interested">
                                 <link rel="stylesheet"
                                     href="https://static.topcv.vn/v4/css/components/sidebar/box-maybe-interested.7d6ada53ff6b5096K.css">
                                 <div class="box-maybe-interested">
                                     <h3 class="box-maybe-interested__title">Có thể bạn quan tâm</h3>
                                     <div class="box-maybe-interested__company">
                                         <div class="box-maybe-interested__company--image">
                                             <a rel="nofollow"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html">
                                                 <img src="https://cdn-new.topcv.vn/unsafe/500x/https://static.topcv.vn/company_covers/gWUh7odIskHo6RtZ1xT7.jpg"
                                                     data-src="https://cdn-new.topcv.vn/unsafe/500x/https://static.topcv.vn/company_covers/gWUh7odIskHo6RtZ1xT7.jpg"
                                                     alt="Công ty Cho thuê tài chính TNHH MTV Quốc tế Chailease"
                                                     class="spotlight-cover">
                                             </a>
                                         </div>
                                         <div class="box-maybe-interested__company--content company">
                                             <div class="company__info">
                                                 <div class="company__info--logo">
                                                     <a rel="nofollow"
                                                         href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html">
                                                         <img src="https://static.topcv.vn/company_logos/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease-5dc39f3d07275.jpg"
                                                             alt="">
                                                     </a>
                                                 </div>
                                                 <div class="company__info--name">
                                                     <a rel="nofollow"
                                                         href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html">Công
                                                         ty Cho thuê tài chính TNHH MTV Quốc tế Chailease</a>
                                                     <img src="https://static.topcv.vn/v4/image/maybe-interested/spotlight.png?v=1.2"
                                                         alt="">
                                                 </div>
                                             </div>
                                             <div class="company__job">
                                                 <div class="job job-ta" data-job-id="1213268"
                                                     data-box="SpotlightCompany">
                                                     <a href="https://www.topcv.vn/viec-lam/thuc-tap-sinh-quan-he-khach-hang-doanh-nghiep/1213268.html?ta_source=SpotlightCompanyInSearchList_LinkDetail"
                                                         target="_blank" data-toggle="tooltip" title=""
                                                         data-placement="top" class="job__name"
                                                         rel="nooppener noreferrer"
                                                         data-original-title="Thực Tập Sinh Quan Hệ Khách Hàng Doanh Nghiệp">Thực
                                                         Tập Sinh Quan Hệ Khách Hàng Doanh Nghiệp</a>
                                                     <div class="job__info">
                                                         <div class="job__info--salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             <span>3 - 3.5 triệu</span>
                                                         </div>
                                                         <div class="job__info--address">
                                                             <i class="fa-solid fa-location-dot"></i>
                                                             <span data-toggle="tooltip" data-html="true" title=""
                                                                 data-placement="top"
                                                                 data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 1<br/>Bình Dương: Thủ Dầu Một</p>">
                                                                 Hồ Chí Minh, Bình Dương
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job job-ta" data-job-id="1319001"
                                                     data-box="SpotlightCompany">
                                                     <a href="https://www.topcv.vn/viec-lam/nhan-vien-ho-tro-kinh-doanh-phong-bao-hiem-insurance-admin/1319001.html?ta_source=SpotlightCompanyInSearchList_LinkDetail"
                                                         target="_blank" data-toggle="tooltip" title=""
                                                         data-placement="top" class="job__name"
                                                         rel="nooppener noreferrer"
                                                         data-original-title="Nhân Viên Hỗ Trợ Kinh Doanh Phòng Bảo Hiểm (Insurance Admin)">Nhân
                                                         Viên Hỗ Trợ Kinh Doanh Phòng Bảo Hiểm (Insurance Admin)</a>
                                                     <div class="job__info">
                                                         <div class="job__info--salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             <span>Thoả thuận</span>
                                                         </div>
                                                         <div class="job__info--address">
                                                             <i class="fa-solid fa-location-dot"></i>
                                                             <span data-toggle="tooltip" data-html="true" title=""
                                                                 data-placement="top"
                                                                 data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 1</p>">
                                                                 Hồ Chí Minh
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job job-ta" data-job-id="1269998"
                                                     data-box="SpotlightCompany">
                                                     <a href="https://www.topcv.vn/viec-lam/chuyen-vien-phap-ly-thu-hoi-cong-no/1269998.html?ta_source=SpotlightCompanyInSearchList_LinkDetail"
                                                         target="_blank" data-toggle="tooltip" title=""
                                                         data-placement="top" class="job__name"
                                                         rel="nooppener noreferrer"
                                                         data-original-title="Chuyên Viên Pháp Lý Thu Hồi Công Nợ">Chuyên
                                                         Viên Pháp Lý Thu Hồi Công Nợ</a>
                                                     <div class="job__info">
                                                         <div class="job__info--salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             <span>Thoả thuận</span>
                                                         </div>
                                                         <div class="job__info--address">
                                                             <i class="fa-solid fa-location-dot"></i>
                                                             <span data-toggle="tooltip" data-html="true" title=""
                                                                 data-placement="top"
                                                                 data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 1<br/>Cần Thơ: Cái Răng</p>">
                                                                 Hồ Chí Minh, Cần Thơ
                                                             </span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="company__link">
                                                 <a rel="nooppener noreferrer"
                                                     href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html"
                                                     target="_blank">Tìm hiểu ngay</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <a href="https://tuyendung.topcv.vn" target="_blank"
                                     style="margin-bottom: 20px;display: block;" rel="nooppener noreferrer">
                                     <img src="https://cdn-new.topcv.vn/unsafe/300x/https://static.topcv.vn/v4/image/banner-srp-free-1.png"
                                         class="img-responsive" style="width: 100%">
                                 </a>
                                 <div class="image">
                                     <a target="_blank"
                                         href="https://insights.topcv.vn/recruitment-report-2023-2024?source=cvobannerright1"
                                         rel="nooppener noreferrer"><img
                                             data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/search-job/recruiment_report_2023_2024.png"
                                             class="w-100 lazy entered loaded" data-ll-status="loaded"
                                             src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/search-job/recruiment_report_2023_2024.png"></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="box-content" id="section-box-seo">
         <div class="container">
             <div class="content-seo-box">
                 <div id="seo-box">
                     <p>
                         <span style="color:rgb(0,0,0);"><strong>Việc HOT thu nhập hấp dẫn tại</strong></span>
                         <span><strong>Hồ Chí Minh</strong></span>
                         <span><strong> đang chờ bạn apply </strong><br><br>Hiện nay, </span>
                         <span><strong>Hồ Chí Minh</strong></span>
                         <span> là khu vực tập trung rất nhiều công ty và tập đoàn lớn. Nhu cầu tuyển dụng nhân lực tại
                         </span>
                         <span><strong>Hồ Chí Minh</strong></span>
                         <span>luôn rất mạnh mẽ, rất nhiều vị trí việc làm được nhiều doanh nghiệp săn đón. Các công ty
                             có nhu cầu tuyển nhân sự tại </span>
                         <span><strong>Hồ Chí Minh</strong></span>
                         <span> đang đưa ra mức lương và đãi ngộ hấp dẫn nhằm chiêu mộ nhân tài. Nếu như bạn đang tìm
                             việc làm tại</span>
                         <span><strong>Hồ Chí Minh</strong></span>
                         <span><strong> </strong></span>
                         <span>thì chúc mừng bạn, cơ hội việc làm của vị trí tại địa phương này đang rất hấp dẫn với thu
                             nhập cực tốt. </span><br><br>
                         <span><a href="/" target="_blank"
                                 rel="nooppener noreferrer"><strong>TopCV</strong></a></span>
                         <span> đồng hành cùng những công ty, tập đoàn hàng đầu có nhu cầu tuyển dụng nhân sự tại
                         </span>
                         <span><strong>Hồ Chí Minh</strong></span>
                         <span> cùng những offer hấp dẫn về lương thưởng và đãi ngộ. Những tin tuyển dụng </span>
                         <span><a href="https://www.topcv.vn/viec-lam" target="_blank"
                                 rel="nooppener noreferrer"><strong>việc làm</strong></a></span>
                         <span> tại TopCV cập nhật liên tục hàng ngày với rất nhiều cơ hội việc làm hấp dẫn. Bạn hãy ứng
                             tuyển các công việc đang được đăng tuyển tại TopCV để nhận Job xịn, đi làm ngay, nhận lương
                             liền tay. Ngoài ra, TopCV còn mang đến cơ hội việc làm rất nhiều ngành nghề khác dành tặng
                             cho những ứng viên muốn tìm </span>
                         <span><a href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ho-chi-minh-l2" target="_blank"
                                 rel="nooppener noreferrer"><strong>việc làm tại Hồ Chí
                                     Minh</strong></a></span>
                         <span>. Nhanh tay </span><span><a href="https://www.topcv.vn/mau-cv" target="_blank"
                                 rel="nooppener noreferrer"><strong>tạo CV</strong></a></span>
                         <span> tại TopCV để đi làm ngay nhé!</span>
                     </p>
                 </div>
             </div>
         </div>
     </div>
     </div>

     <script>
         window.lazyFunctions.initBoxSurveySearchJob = async function(element) {
             await window.loadScript('https://static.topcv.vn/v4/plugins/lottie-player/lottie-player.js');
         }
     </script>
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/job-notification-setting.bea5fa3f03028ed1K.css">
     <script data-type="lazy" data-src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js" src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js"></script>
 @endsection
