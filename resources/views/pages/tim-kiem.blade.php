 @extends('layout')
 @section('content')
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/desktop/search-job.min.5b2166bc3defa96bK.css">
      <link rel="stylesheet"href="https://static.topcv.vn/v4/css/components/desktop/jobs/job-list-search-result.f3a3504e765512c7K.css">
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
                @if($keyword)
                    Tuyển dụng {{ $jobCount }} việc làm @if($keyword) "{{ $keyword }}" @endif @if($city) tại {{ $city }} @endif
                @else
                    Tuyển dụng {{ $jobCount }} việc làm
                @endif
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
                            @if($keyword)
                                Tuyển dụng {{ $jobCount }} việc làm @if($keyword) "{{ $keyword }}" @endif @if($city) tại {{ $city }} @endif
                            @else
                                Tuyển dụng {{ $jobCount }} việc làm
                            @endif
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
                                                     <p>Không tìm thấy công việc nào phù hợp.</p>
                                                 @else
                                                     <div class="job-list">
                                                         @foreach ($jobPostings as $jobPosting)
                                                             <div class="job-item-search-result job-ta"
                                                                 data-job-id="{{ $jobPosting->id }}"
                                                                 data-job-position="{{ $jobPosting->id }}">
                                                                 <div class="avatar">
                                                                     <a target="_blank"
                                                                         href="{{ route('job.show', $jobPosting->slug) }}"
                                                                         rel="nooppener noreferrer">
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
                                                                                 <h3 class="title ">
                                                                                     <div class="box-label-top">
                                                                                     </div>
                                                                                     <a target="_blank"
                                                                                         href="{{ route('job.show', $jobPosting->slug) }}"
                                                                                         rel="nooppener noreferrer">
                                                                                         <span data-toggle="tooltip"
                                                                                             data-container="body"
                                                                                             data-placement="top"
                                                                                             title=""
                                                                                             data-original-title="{{ $jobPosting->title }}">
                                                                                             {{ $jobPosting->title }}
                                                                                         </span>
                                                                                     </a>
                                                                                 </h3>
                                                                                 <a class="company"
                                                                                     href="{{ route('job.show', $jobPosting->slug) }}"
                                                                                     data-toggle="tooltip" title=""
                                                                                     data-placement="top" target="_blank"
                                                                                     rel="nooppener noreferrer"
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
                                                                 <span data-toggle="tooltip" data-html="true"
                                                                     title="" data-placement="top"
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
                                                                 <span data-toggle="tooltip" data-html="true"
                                                                     title="" data-placement="top"
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
                                                                 <span data-toggle="tooltip" data-html="true"
                                                                     title="" data-placement="top"
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
                             <span><a href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ho-chi-minh-l2"
                                     target="_blank" rel="nooppener noreferrer"><strong>việc làm tại Hồ Chí
                                         Minh</strong></a></span>
                             <span>. Nhanh tay </span><span><a href="https://www.topcv.vn/mau-cv" target="_blank"
                                     rel="nooppener noreferrer"><strong>tạo CV</strong></a></span>
                             <span> tại TopCV để đi làm ngay nhé!</span>
                         </p>
                     </div>
                 </div>
                 <div class="box-seo-categories">
                     <div class="keyword-box">
                         <h3 class="title-box">Các từ khóa liên quan:</h3>
                         <div class="row mb-15">
                             <div class="col-md-4 box-seo">
                                 <div class="box_general">
                                     <h3 class="text_ellipsis uppercase">Việc làm theo lĩnh vực</h3>
                                     <div class="ctn-list-jobs">
                                         <div class="item container-scroll">
                                             <div class="el2">
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php agency (design/development)"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=33"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php agency (design/development)
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php agency (marketing/advertising)"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=34"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php agency (marketing/advertising)
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php bán lẻ - hàng tiêu dùng - fmcg"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=11"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php bán lẻ - hàng tiêu dùng - fmcg
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php bảo hiểm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=4"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php bảo hiểm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php bảo trì / sửa chữa"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=20"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php bảo trì / sửa chữa
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php bất động sản"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=5"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php bất động sản
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php chứng khoán"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=13"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php chứng khoán
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php cơ khí"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=23"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php cơ khí
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php cơ quan nhà nước"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=30"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php cơ quan nhà nước
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php du lịch"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=31"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php du lịch
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php dược phẩm / y tế / công nghệ sinh học"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=6"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php dược phẩm / y tế / công nghệ sinh học
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php Điện tử / Điện lạnh"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=21"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php Điện tử / Điện lạnh
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php giải trí"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=36"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php giải trí
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php giáo dục / Đào tạo"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=26"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php giáo dục / Đào tạo
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php in ấn / xuất bản"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=10"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php in ấn / xuất bản
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php internet / online"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=7"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php internet / online
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php it - phần cứng"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=37"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php it - phần cứng
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php it - phần mềm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=1"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php it - phần mềm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kế toán / kiểm toán"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=2"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php kế toán / kiểm toán
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php khác"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=10000"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php khác
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php logistics - vận tải"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=28"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php logistics - vận tải
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php luật"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=3"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php luật
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php marketing / truyền thông / quảng cáo"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=8"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php marketing / truyền thông / quảng cáo
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php môi trường"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=18"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php môi trường
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php năng lượng"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=35"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php năng lượng
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php ngân hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=15"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php ngân hàng
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php nhà hàng / khách sạn"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=9"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php nhà hàng / khách sạn
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php nhân sự"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=16"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php nhân sự
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php nông lâm ngư nghiệp"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=38"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php nông lâm ngư nghiệp
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php sản xuất"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=12"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php sản xuất
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php tài chính"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=39"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tài chính
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php thiết kế / kiến trúc"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=17"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php thiết kế / kiến trúc
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php thời trang"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=22"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php thời trang
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php thương mại điện tử"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=27"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php thương mại điện tử
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php tổ chức phi lợi nhuận"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=29"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tổ chức phi lợi nhuận
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php tự động hóa"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=32"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tự động hóa
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php tư vấn"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=24"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tư vấn
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php viễn thông"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=25"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php viễn thông
                                                 </a>
                                                 <a class="list-item text-silver" title="Tìm việc làm php xây dựng"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=14"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php xây dựng
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php xuất nhập khẩu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?company_field=19"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php xuất nhập khẩu
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4 box-seo">
                                 <div class="box_general">
                                     <h3 class="text_ellipsis uppercase">Việc làm theo mức lương</h3>
                                     <div class="ctn-list-jobs">
                                         <div class="item container-scroll">
                                             <div class="el2">
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương dưới 10 triệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=1"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương dưới 10 triệu
                                                 </a>
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương 10 - 15 triệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=5"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương 10 - 15 triệu
                                                 </a>
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương 15 - 20 triệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=7"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương 15 - 20 triệu
                                                 </a>
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương 20 - 25 triệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=8"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương 20 - 25 triệu
                                                 </a>
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương 25 - 30 triệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=9"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương 25 - 30 triệu
                                                 </a>
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương 30 - 50 triệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=10"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương 30 - 50 triệu
                                                 </a>
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương trên 50 triệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=11"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương trên 50 triệu
                                                 </a>
                                                 <a class="list-item  text-silver"
                                                     title="Tìm việc làm php lương thoả thuận"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?salary=127"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php lương thoả thuận
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4 box-seo">
                                 <div class="box_general">
                                     <h3 class="text_ellipsis uppercase">Việc làm theo kinh nghiệm</h3>
                                     <div class="ctn-list-jobs">
                                         <div class="item container-scroll">
                                             <div class="el2">
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm chưa có kinh nghiệm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=1" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm chưa có kinh nghiệm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm dưới 1 năm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=2" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm dưới 1 năm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm 1 năm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=3" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm 1 năm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm 2 năm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=4" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm 2 năm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm 3 năm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=5" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm 3 năm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm 4 năm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=6" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm 4 năm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm 5 năm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=7" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm 5 năm
                                                 </a>
                                                 <a class="list-item text-silver"
                                                     title="Tìm việc làm php kinh nghiệm trên 5 năm"
                                                     href="https://www.topcv.vn/tim-viec-lam-php?exp=8" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php kinh nghiệm trên 5 năm
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-4 box-seo">
                                 <div class="box_general">
                                     <h3 class="text_ellipsis uppercase">Việc làm theo hình thức công việc</h3>
                                     <div class="ctn-list-jobs">
                                         <div class="item container-scroll">
                                             <div class="el2">
                                                 <a class="list-item" title="Tìm việc làm php toàn thời gian"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-kt1" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php toàn thời gian
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php bán thời gian"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-kt3" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php bán thời gian
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php thực tập"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-kt5" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm php thực tập
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4 box-seo">
                                 <div class="box_general">
                                     <h3 class="text_ellipsis uppercase">Tìm việc làm theo khu vực</h3>
                                     <div class="ctn-list-jobs">
                                         <div class="item container-scroll">
                                             <div class="el2">
                                                 <a class="list-item" title="Tìm việc làm php tại Hà Nội"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-ha-noi-kl1"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Hà Nội
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Hồ Chí Minh"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-ho-chi-minh-kl2"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Hồ Chí Minh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Hải Phòng"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-hai-phong-kl9"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Hải Phòng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Đà Nẵng"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-da-nang-kl8"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Đà Nẵng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Bắc Ninh"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-bac-ninh-kl4"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Bắc Ninh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Cần Thơ"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-can-tho-kl20"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Cần Thơ
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Bình Dương"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-binh-duong-kl3"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Bình Dương
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Vĩnh Phúc"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-vinh-phuc-kl67"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Vĩnh Phúc
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Đồng Nai"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-dong-nai-kl5"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Đồng Nai
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm php tại Long An"
                                                     href="https://www.topcv.vn/tim-viec-lam-php-tai-long-an-kl40"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm php tại Long An
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4 box-seo">
                                 <div class="box_general">
                                     <h3 class="text_ellipsis uppercase">Tìm việc làm theo vị trí công việc</h3>
                                     <div class="ctn-list-jobs">
                                         <div class="item container-scroll">
                                             <div class="el2">
                                                 <a class="list-item" title="Tìm việc làm thực tập sinh"
                                                     href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thực tập sinh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trợ giảng"
                                                     href="https://www.topcv.vn/tim-viec-lam-tro-giang" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm trợ giảng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên"
                                                     href="https://www.topcv.vn/tim-viec-lam-giao-vien" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm giáo viên
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kỹ thuật"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-ky-thuat"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kỹ thuật
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm it helpdesk"
                                                     href="https://www.topcv.vn/tim-viec-lam-it-helpdesk"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm it helpdesk
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên php"
                                                     href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-php"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên php
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên javascript"
                                                     href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-javascript"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên javascript
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên reactjs"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-reactjs"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên reactjs
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên vuejs"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-vuejs"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên vuejs
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên angularjs"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-angularjs"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên angularjs
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên nodejs"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-nodejs"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên nodejs
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên java"
                                                     href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-java"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên java
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên .net"
                                                     href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-net"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên .net
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình front-end"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-front-end"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình front-end
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình back-end"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-back-end"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình back-end
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên ios"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-ios"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên ios
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên android"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-android"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên android
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên react native"
                                                     href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-react-native"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên react native
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên mobile"
                                                     href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-mobile"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên mobile
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tester"
                                                     href="https://www.topcv.vn/tim-viec-lam-tester" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm tester
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm business analyst"
                                                     href="https://www.topcv.vn/tim-viec-lam-business-analyst"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm business analyst
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm data analyst"
                                                     href="https://www.topcv.vn/tim-viec-lam-data-analyst"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm data analyst
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên"
                                                     href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm fullstack developer"
                                                     href="https://www.topcv.vn/tim-viec-lam-fullstack-developer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm fullstack developer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm unity developer"
                                                     href="https://www.topcv.vn/tim-viec-lam-unity-developer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm unity developer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm game developer"
                                                     href="https://www.topcv.vn/tim-viec-lam-game-developer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm game developer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên lễ tân"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-le-tan"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên lễ tân
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trưởng phòng kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-truong-phong-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trưởng phòng kinh doanh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám đốc kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-giam-doc-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám đốc kinh doanh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám sát bán hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-giam-sat-ban-hang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám sát bán hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thực tập sinh kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thực tập sinh kinh doanh
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm trưởng phòng chăm sóc khách hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-truong-phong-cham-soc-khach-hang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trưởng phòng chăm sóc khách hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên chăm sóc khách hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-cham-soc-khach-hang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên chăm sóc khách hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám đốc marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-giam-doc-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám đốc marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trưởng phòng marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-truong-phong-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trưởng phòng marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm marketing manager"
                                                     href="https://www.topcv.vn/tim-viec-lam-marketing-manager"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm marketing manager
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trưởng nhóm marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-truong-nhom-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trưởng nhóm marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm digital marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-digital-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm digital marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trade marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-trade-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trade marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trade marketing manager"
                                                     href="https://www.topcv.vn/tim-viec-lam-trade-marketing-manager"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trade marketing manager
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên facebook ads"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-facebook-ads"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên facebook ads
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm telemarketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-telemarketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm telemarketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm content writer"
                                                     href="https://www.topcv.vn/tim-viec-lam-content-writer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm content writer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm video editor"
                                                     href="https://www.topcv.vn/tim-viec-lam-video-editor"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm video editor
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên quay/dựng video"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-quay-d%E1%BB%B1ng-video"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên quay/dựng video
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thực tập sinh marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thực tập sinh marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên seo"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-seo"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên seo
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thực tập sinh seo"
                                                     href="https://www.topcv.vn/tim-viec-lam-th%E1%BB%B1c-t%E1%BA%ADp-sinh-seo"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thực tập sinh seo
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm biên phiên dịch"
                                                     href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm biên phiên dịch
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tiếng nhật"
                                                     href="https://www.topcv.vn/tim-viec-lam-tieng-nhat" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm tiếng nhật
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tiếng hàn"
                                                     href="https://www.topcv.vn/tim-viec-lam-tieng-han" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm tiếng hàn
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tiếng trung"
                                                     href="https://www.topcv.vn/tim-viec-lam-tieng-trung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm tiếng trung
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tiếng anh"
                                                     href="https://www.topcv.vn/tim-viec-lam-tieng-anh" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm tiếng anh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm biên phiên dịch tiếng nhật"
                                                     href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch-ti%E1%BA%BFng-nh%E1%BA%ADt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm biên phiên dịch tiếng nhật
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm biên phiên dịch tiếng hàn"
                                                     href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch-ti%E1%BA%BFng-h%C3%A0n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm biên phiên dịch tiếng hàn
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm biên phiên dịch tiếng trung"
                                                     href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch-ti%E1%BA%BFng-trung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm biên phiên dịch tiếng trung
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên tiếng nhật"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ti%E1%BA%BFng-nh%E1%BA%ADt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên tiếng nhật
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên tiếng hàn"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ti%E1%BA%BFng-h%C3%A0n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên tiếng hàn
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên tiếng trung"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ti%E1%BA%BFng-trung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên tiếng trung
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên tiếng anh"
                                                     href="https://www.topcv.vn/tim-viec-lam-giao-vien-tieng-anh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên tiếng anh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thiết kế đồ hoạ/designer"
                                                     href="https://www.topcv.vn/tim-viec-lam-thi%E1%BA%BFt-k%E1%BA%BF-%C4%91%E1%BB%93-ho%E1%BA%A1-designer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thiết kế đồ hoạ/designer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thiết kế nội thất"
                                                     href="https://www.topcv.vn/tim-viec-lam-thiet-ke-noi-that"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thiết kế nội thất
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thiết kế website"
                                                     href="https://www.topcv.vn/tim-viec-lam-thiet-ke-website"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thiết kế website
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trưởng phòng nhân sự"
                                                     href="https://www.topcv.vn/tim-viec-lam-truong-phong-nhan-su"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trưởng phòng nhân sự
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tuyển dụng/nhân sự"
                                                     href="https://www.topcv.vn/tim-viec-lam-tuy%E1%BB%83n-d%E1%BB%A5ng-nh%C3%A2n-s%E1%BB%B1"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm tuyển dụng/nhân sự
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm hành chính nhân sự"
                                                     href="https://www.topcv.vn/tim-viec-lam-hanh-chinh-nhan-su"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm hành chính nhân sự
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên hành chính"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-hanh-chinh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên hành chính
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên mua hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-mua-hang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên mua hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên văn phòng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-van-phong"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên văn phòng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên nhập liệu"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-nhap-lieu"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên nhập liệu
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm chuyên viên tuyển dụng"
                                                     href="https://www.topcv.vn/tim-viec-lam-chuyen-vien-tuyen-dung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm chuyên viên tuyển dụng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thực tập sinh nhân sự"
                                                     href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-nhan-su"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thực tập sinh nhân sự
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm truyền thông nội bộ"
                                                     href="https://www.topcv.vn/tim-viec-lam-truyen-thong-noi-bo"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm truyền thông nội bộ
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm truyền thông"
                                                     href="https://www.topcv.vn/tim-viec-lam-truyen-thong"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm truyền thông
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên tư vấn"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-tu-van"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên tư vấn
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên tư vấn tuyển sinh"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-tu-van-tuyen-sinh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên tư vấn tuyển sinh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tư vấn tài chính"
                                                     href="https://www.topcv.vn/tim-viec-lam-t%C6%B0-v%E1%BA%A5n-t%C3%A0i-ch%C3%ADnh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm tư vấn tài chính
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kế toán"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-ke-toan"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kế toán
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kế toán trưởng"
                                                     href="https://www.topcv.vn/tim-viec-lam-ke-toan-truong"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kế toán trưởng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kế toán kho"
                                                     href="https://www.topcv.vn/tim-viec-lam-ke-toan-kho"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kế toán kho
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kế toán bán hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-ke-toan-ban-hang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kế toán bán hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kế toán tổng hợp"
                                                     href="https://www.topcv.vn/tim-viec-lam-ke-toan-tong-hop"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kế toán tổng hợp
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm thực tập sinh kế toán"
                                                     href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-ke-toan"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm thực tập sinh kế toán
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên thu ngân"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-thu-ngan"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên thu ngân
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm ngân hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-ngan-hang" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm ngân hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên tư vấn bất động sản"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-tu-van-bat-dong-san"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên tư vấn bất động sản
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm bất động sản"
                                                     href="https://www.topcv.vn/tim-viec-lam-bat-dong-san"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm bất động sản
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kiểm toán viên"
                                                     href="https://www.topcv.vn/tim-viec-lam-ki%E1%BB%83m-to%C3%A1n-vi%C3%AAn"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kiểm toán viên
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám đốc dự án"
                                                     href="https://www.topcv.vn/tim-viec-lam-giam-doc-du-an"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám đốc dự án
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám đốc điều hành"
                                                     href="https://www.topcv.vn/tim-viec-lam-giam-doc-dieu-hanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám đốc điều hành
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trợ lý giám đốc"
                                                     href="https://www.topcv.vn/tim-viec-lam-tro-ly-giam-doc"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trợ lý giám đốc
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên lái xe"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-l%C3%A1i-xe"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên lái xe
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên giao hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-giao-hang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên giao hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kho"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-kho"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kho
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kỹ sư cơ khí"
                                                     href="https://www.topcv.vn/tim-viec-lam-ky-su-co-khi"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kỹ sư cơ khí
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm bán thời gian"
                                                     href="https://www.topcv.vn/tim-viec-lam-ban-thoi-gian"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm bán thời gian
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm quản lý"
                                                     href="https://www.topcv.vn/tim-viec-lam-quan-ly" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm quản lý
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trợ lý"
                                                     href="https://www.topcv.vn/tim-viec-lam-tro-ly" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm trợ lý
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kinh doanh nói chung"
                                                     href="https://www.topcv.vn/tim-viec-lam-kinh-doanh-n%C3%B3i-chung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kinh doanh nói chung
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sales engineer"
                                                     href="https://www.topcv.vn/tim-viec-lam-sales-engineer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sales engineer
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm nhân viên kinh doanh - bán hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-b%C3%A1n-h%C3%A0ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kinh doanh - bán hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên telesale"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-telesale"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên telesale
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm Đại diện kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-%C4%91%E1%BA%A1i-di%E1%BB%87n-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm Đại diện kinh doanh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm phát triển thị trường"
                                                     href="https://www.topcv.vn/tim-viec-lam-ph%C3%A1t-tri%E1%BB%83n-th%E1%BB%8B-tr%C6%B0%E1%BB%9Dng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm phát triển thị trường
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm quản lý kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-quan-ly-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm quản lý kinh doanh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sales manager"
                                                     href="https://www.topcv.vn/tim-viec-lam-sales-manager"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sales manager
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm quản lý cửa hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-quan-ly-cua-hang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm quản lý cửa hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trưởng nhóm kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-truong-nhom-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trưởng nhóm kinh doanh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm hỗ trợ kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-h%E1%BB%97-tr%E1%BB%A3-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm hỗ trợ kinh doanh
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên bán vé máy bay"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-ban-ve-may-bay"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên bán vé máy bay
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm nhân viên kinh doanh bất động sản"
                                                     href="https://www.topcv.vn/tim-viec-lam-nhan-vien-kinh-doanh-bat-dong-san"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kinh doanh bất động sản
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kinh doanh ô tô"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-%C3%B4-t%C3%B4"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kinh doanh ô tô
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên bán hàng part time"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-b%C3%A1n-h%C3%A0ng-part-time"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên bán hàng part time
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo dục đào tạo nói chung"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-d%E1%BB%A5c-%C4%91%C3%A0o-t%E1%BA%A1o-n%C3%B3i-chung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo dục đào tạo nói chung
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên tư vấn tài chính"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-t%C6%B0-v%E1%BA%A5n-t%C3%A0i-ch%C3%ADnh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên tư vấn tài chính
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm key account"
                                                     href="https://www.topcv.vn/tim-viec-lam-key-account"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm key account
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên quan hệ khách hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-quan-h%E1%BB%87-kh%C3%A1ch-h%C3%A0ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên quan hệ khách hàng
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm chuyên viên khách hàng cá nhân"
                                                     href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-kh%C3%A1ch-h%C3%A0ng-c%C3%A1-nh%C3%A2n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm chuyên viên khách hàng cá nhân
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm chuyên viên khách hàng doanh nghiệp"
                                                     href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-kh%C3%A1ch-h%C3%A0ng-doanh-nghi%E1%BB%87p"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm chuyên viên khách hàng doanh nghiệp
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tài chính ngân hàng"
                                                     href="https://www.topcv.vn/tim-viec-lam-t%C3%A0i-ch%C3%ADnh-ng%C3%A2n-h%C3%A0ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm tài chính ngân hàng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale logistic"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-logistic"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale logistic
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm logistics"
                                                     href="https://www.topcv.vn/tim-viec-lam-logistics" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm logistics
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên logistics"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-logistics"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên logistics
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên sale logistic"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-sale-logistic"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên sale logistic
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm xuất nhập khẩu"
                                                     href="https://www.topcv.vn/tim-viec-lam-xu%E1%BA%A5t-nh%E1%BA%ADp-kh%E1%BA%A9u"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm xuất nhập khẩu
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale xuất nhập khẩu"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-xu%E1%BA%A5t-nh%E1%BA%ADp-kh%E1%BA%A9u"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale xuất nhập khẩu
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên sale xuất nhập khẩu"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-sale-xu%E1%BA%A5t-nh%E1%BA%ADp-kh%E1%BA%A9u"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên sale xuất nhập khẩu
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tiktok"
                                                     href="https://www.topcv.vn/tim-viec-lam-tiktok" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm tiktok
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm cyber security"
                                                     href="https://www.topcv.vn/tim-viec-lam-cyber-security"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm cyber security
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm area sales manager"
                                                     href="https://www.topcv.vn/tim-viec-lam-area-sales-manager"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm area sales manager
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kinh doanh y tế"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-y-t%E1%BA%BF"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kinh doanh y tế
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trình dược viên"
                                                     href="https://www.topcv.vn/tim-viec-lam-trinh-duoc-vien"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trình dược viên
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm nhân viên kinh doanh thiết bị y tế"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-thi%E1%BA%BFt-b%E1%BB%8B-y-t%E1%BA%BF"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kinh doanh thiết bị y tế
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm content tiktok"
                                                     href="https://www.topcv.vn/tim-viec-lam-content-tiktok"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm content tiktok
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm ads"
                                                     href="https://www.topcv.vn/tim-viec-lam-ads" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm ads
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm quan tri kenh youtube"
                                                     href="https://www.topcv.vn/tim-viec-lam-quan-tri-kenh-youtube"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm quan tri kenh youtube
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm van hanh sàn tmdt"
                                                     href="https://www.topcv.vn/tim-viec-lam-van-hanh-s%C3%A0n-tmdt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm van hanh sàn tmdt
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên livestream"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-livestream"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên livestream
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm designer"
                                                     href="https://www.topcv.vn/tim-viec-lam-designer" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm designer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kỹ sư dự toán xây dựng"
                                                     href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-d%E1%BB%B1-to%C3%A1n-x%C3%A2y-d%E1%BB%B1ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kỹ sư dự toán xây dựng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên hồ sơ"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-h%E1%BB%93-s%C6%A1"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên hồ sơ
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm chuyên viên đào tạo"
                                                     href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-%C4%91%C3%A0o-t%E1%BA%A1o"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm chuyên viên đào tạo
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm Đào tạo và phát triển"
                                                     href="https://www.topcv.vn/tim-viec-lam-%C4%91%C3%A0o-t%E1%BA%A1o-v%C3%A0-ph%C3%A1t-tri%E1%BB%83n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm Đào tạo và phát triển
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm chuyên viên giám định"
                                                     href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-gi%C3%A1m-%C4%91%E1%BB%8Bnh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm chuyên viên giám định
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm marketing online"
                                                     href="https://www.topcv.vn/tim-viec-lam-marketing-online"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm marketing online
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kỹ sư thiết kế"
                                                     href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-thi%E1%BA%BFt-k%E1%BA%BF"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kỹ sư thiết kế
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm quản lý chất lượng"
                                                     href="https://www.topcv.vn/tim-viec-lam-quan-ly-chat-luong"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm quản lý chất lượng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên quản lý chất lượng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-qu%E1%BA%A3n-l%C3%BD-ch%E1%BA%A5t-l%C6%B0%E1%BB%A3ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên quản lý chất lượng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên theo dõi công nợ"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-theo-d%C3%B5i-c%C3%B4ng-n%E1%BB%A3"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên theo dõi công nợ
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên thủ kho"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-th%E1%BB%A7-kho"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên thủ kho
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên văn thư"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-v%C4%83n-th%C6%B0"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên văn thư
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên chế bản"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-ch%E1%BA%BF-b%E1%BA%A3n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên chế bản
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm trợ lý tiếng trung"
                                                     href="https://www.topcv.vn/tim-viec-lam-tr%E1%BB%A3-l%C3%BD-ti%E1%BA%BFng-trung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm trợ lý tiếng trung
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm Điều dưỡng"
                                                     href="https://www.topcv.vn/tim-viec-lam-%C4%91i%E1%BB%81u-d%C6%B0%E1%BB%A1ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm Điều dưỡng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên quản lý rủi ro"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-qu%E1%BA%A3n-l%C3%BD-r%E1%BB%A7i-ro"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên quản lý rủi ro
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm nhân viên phân tích kinh doanh"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-ph%C3%A2n-t%C3%ADch-kinh-doanh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên phân tích kinh doanh
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm nhân viên chăm sóc khách hàng tiếng hàn"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-ch%C4%83m-s%C3%B3c-kh%C3%A1ch-h%C3%A0ng-ti%E1%BA%BFng-h%C3%A0n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên chăm sóc khách hàng tiếng hàn
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám sát dịch vụ"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-d%E1%BB%8Bch-v%E1%BB%A5"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám sát dịch vụ
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên nhắc phí"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-nh%E1%BA%AFc-ph%C3%AD"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên nhắc phí
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên r&amp;d"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-r-d"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên r&amp;d
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên quản lý lớp học"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-qu%E1%BA%A3n-l%C3%BD-l%E1%BB%9Bp-h%E1%BB%8Dc"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên quản lý lớp học
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên học vụ"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-h%E1%BB%8Dc-v%E1%BB%A5"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên học vụ
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giảng viên cntt"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%E1%BA%A3ng-vi%C3%AAn-cntt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giảng viên cntt
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên âm nhạc"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-%C3%A2m-nh%E1%BA%A1c"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên âm nhạc
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên chủ nhiệm"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ch%E1%BB%A7-nhi%E1%BB%87m"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên chủ nhiệm
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên ngữ văn"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ng%E1%BB%AF-v%C4%83n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên ngữ văn
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên tin học"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-tin-h%E1%BB%8Dc"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên tin học
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên triển khai phần mềm"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-tri%E1%BB%83n-khai-ph%E1%BA%A7n-m%E1%BB%81m"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên triển khai phần mềm
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên triển khai dự án"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-tri%E1%BB%83n-khai-d%E1%BB%B1-%C3%A1n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên triển khai dự án
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên vận hành"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-v%E1%BA%ADn-h%C3%A0nh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên vận hành
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám sát quản lý vận hành"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-qu%E1%BA%A3n-l%C3%BD-v%E1%BA%ADn-h%C3%A0nh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám sát quản lý vận hành
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên kỹ năng"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-k%E1%BB%B9-n%C4%83ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên kỹ năng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên hóa học"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-h%C3%B3a-h%E1%BB%8Dc"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên hóa học
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên mĩ thuật"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-m%C4%A9-thu%E1%BA%ADt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên mĩ thuật
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên toán"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-to%C3%A1n"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên toán
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale thị trường"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-th%E1%BB%8B-tr%C6%B0%E1%BB%9Dng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale thị trường
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm bán hàng showroom"
                                                     href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-showroom"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm bán hàng showroom
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm bán hàng mỹ phẩm"
                                                     href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-m%E1%BB%B9-ph%E1%BA%A9m"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm bán hàng mỹ phẩm
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kỹ sư lập trình nhúng"
                                                     href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-l%E1%BA%ADp-tr%C3%ACnh-nh%C3%BAng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kỹ sư lập trình nhúng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhúng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%BAng" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm nhúng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm it comtor"
                                                     href="https://www.topcv.vn/tim-viec-lam-it-comtor" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm it comtor
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm it comtor tiếng nhật"
                                                     href="https://www.topcv.vn/tim-viec-lam-it-comtor-ti%E1%BA%BFng-nh%E1%BA%ADt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm it comtor tiếng nhật
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm presale"
                                                     href="https://www.topcv.vn/tim-viec-lam-presale" target="_blank"
                                                     rel="nooppener noreferrer">
                                                     việc làm presale
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kỹ sư mạng"
                                                     href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-m%E1%BA%A1ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kỹ sư mạng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm automation tester"
                                                     href="https://www.topcv.vn/tim-viec-lam-automation-tester"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm automation tester
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm lập trình viên erp"
                                                     href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-erp"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm lập trình viên erp
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên thiết kế 3d"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-thi%E1%BA%BFt-k%E1%BA%BF-3d"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên thiết kế 3d
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm erp consultant"
                                                     href="https://www.topcv.vn/tim-viec-lam-erp-consultant"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm erp consultant
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giáo viên unity"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-unity"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giáo viên unity
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm project manager"
                                                     href="https://www.topcv.vn/tim-viec-lam-project-manager"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm project manager
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm data engineer"
                                                     href="https://www.topcv.vn/tim-viec-lam-data-engineer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm data engineer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm hardware engineer"
                                                     href="https://www.topcv.vn/tim-viec-lam-hardware-engineer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm hardware engineer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kỹ sư điện tử viễn thông"
                                                     href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-%C4%91i%E1%BB%87n-t%E1%BB%AD-vi%E1%BB%85n-th%C3%B4ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kỹ sư điện tử viễn thông
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm Điện tử viễn thông"
                                                     href="https://www.topcv.vn/tim-viec-lam-%C4%91i%E1%BB%87n-t%E1%BB%AD-vi%E1%BB%85n-th%C3%B4ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm Điện tử viễn thông
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kỹ sư cầu nối"
                                                     href="https://www.topcv.vn/tim-viec-lam-ky-su-cau-noi"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kỹ sư cầu nối
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm ui/ux designer"
                                                     href="https://www.topcv.vn/tim-viec-lam-ui-ux-designer"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm ui/ux designer
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên tư vấn tín dụng"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-t%C6%B0-v%E1%BA%A5n-t%C3%ADn-d%E1%BB%A5ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên tư vấn tín dụng
                                                 </a>
                                                 <a class="list-item"
                                                     title="Tìm việc làm nhân viên kinh doanh phòng khám"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-ph%C3%B2ng-kh%C3%A1m"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kinh doanh phòng khám
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm bán hàng thời trang"
                                                     href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-th%E1%BB%9Di-trang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm bán hàng thời trang
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale thời trang"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-th%E1%BB%9Di-trang"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale thời trang
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm bán hàng siêu thị"
                                                     href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-si%C3%AAu-th%E1%BB%8B"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm bán hàng siêu thị
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale thực phẩm"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-th%E1%BB%B1c-ph%E1%BA%A9m"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale thực phẩm
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale đồ gia dụng"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-%C4%91%E1%BB%93-gia-d%E1%BB%A5ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale đồ gia dụng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale hàng tiêu dùng"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-h%C3%A0ng-ti%C3%AAu-d%C3%B9ng"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale hàng tiêu dùng
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale kenh mt (modern trade)"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-kenh-mt-modern-trade"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale kenh mt (modern trade)
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám sát kênh mt"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-k%C3%AAnh-mt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám sát kênh mt
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale gt (general trade)"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-gt-general-trade"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale gt (general trade)
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm giám sát kênh gt"
                                                     href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-k%C3%AAnh-gt"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm giám sát kênh gt
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale marketing"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-marketing"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale marketing
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sales xuất khẩu"
                                                     href="https://www.topcv.vn/tim-viec-lam-sales-xu%E1%BA%A5t-kh%E1%BA%A9u"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sales xuất khẩu
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm sale nguồn hàng trung"
                                                     href="https://www.topcv.vn/tim-viec-lam-sale-ngu%E1%BB%93n-h%C3%A0ng-trung"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm sale nguồn hàng trung
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm tư vấn thẩm mỹ"
                                                     href="https://www.topcv.vn/tim-viec-lam-t%C6%B0-v%E1%BA%A5n-th%E1%BA%A9m-m%E1%BB%B9"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm tư vấn thẩm mỹ
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kế hoạch"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-k%E1%BA%BF-ho%E1%BA%A1ch"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kế hoạch
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kinh doanh giáo dục đào tạo"
                                                     href="https://www.topcv.vn/tim-viec-lam-kinh-doanh-gi%C3%A1o-d%E1%BB%A5c-%C4%91%C3%A0o-t%E1%BA%A1o"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kinh doanh giáo dục đào tạo
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm telesale giao dục đào tạo"
                                                     href="https://www.topcv.vn/tim-viec-lam-telesale-giao-d%E1%BB%A5c-%C4%91%C3%A0o-t%E1%BA%A1o"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm telesale giao dục đào tạo
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kế toán giá thành"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-k%E1%BA%BF-to%C3%A1n-gi%C3%A1-th%C3%A0nh"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kế toán giá thành
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm nhân viên kế toán thuế"
                                                     href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-k%E1%BA%BF-to%C3%A1n-thu%E1%BA%BF"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm nhân viên kế toán thuế
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm kinh doanh it phần mềm"
                                                     href="https://www.topcv.vn/tim-viec-lam-kinh-doanh-it-ph%E1%BA%A7n-m%E1%BB%81m"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm kinh doanh it phần mềm
                                                 </a>
                                                 <a class="list-item" title="Tìm việc làm telesale it phần mềm"
                                                     href="https://www.topcv.vn/tim-viec-lam-telesale-it-ph%E1%BA%A7n-m%E1%BB%81m"
                                                     target="_blank" rel="nooppener noreferrer">
                                                     việc làm telesale it phần mềm
                                                 </a>
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
     <div id="box-survey-search-job-container" style="display: none">
         <div class="box-survey-search-job lazy" id="__SEARCH_JOB_SURVEY_ID__"
             data-lazy-function="initBoxSurveySearchJob">
             <div class="form-group box-survey-search-job_content">
                 <label for="">Bạn có hài lòng với trải nghiệm tìm việc trên TopCV không? <span
                         class="required">*</span></label>
                 <div class="list-icon">
                     <div class="list-icon_tab status-option verry_bad" data-option="Rất tệ">
                         <lottie-player src="https://www.topcv.vn/v4/image/survey/search-job/animation/verry_bad.json"
                             background="transparent" speed="1" autoplay="" loop=""></lottie-player>
                         <div class="list-icon_tab-title">
                             Rất tệ
                         </div>
                     </div>
                     <div class="list-icon_tab status-option bad" data-option="Tệ">
                         <lottie-player src="https://www.topcv.vn/v4/image/survey/search-job/animation/bad.json"
                             background="transparent" speed="1" autoplay="" loop=""></lottie-player>
                         <div class="list-icon_tab-title">
                             Tệ
                         </div>
                     </div>
                     <div class="list-icon_tab status-option normal" data-option="Bình thường">
                         <lottie-player src="https://www.topcv.vn/v4/image/survey/search-job/animation/normal.json"
                             background="transparent" speed="1" autoplay="" loop=""></lottie-player>
                         <div class="list-icon_tab-title">
                             Bình thường
                         </div>
                     </div>
                     <div class="list-icon_tab status-option good" data-option="Tốt">
                         <lottie-player src="https://www.topcv.vn/v4/image/survey/search-job/animation/good.json"
                             background="transparent" speed="1" autoplay="" loop=""></lottie-player>
                         <div class="list-icon_tab-title">
                             Tốt
                         </div>
                     </div>
                     <div class="list-icon_tab status-option verry_good" data-option="Tuyệt vời">
                         <lottie-player src="https://www.topcv.vn/v4/image/survey/search-job/animation/verry_good.json"
                             background="transparent" speed="1" autoplay="" loop=""></lottie-player>
                         <div class="list-icon_tab-title">
                             Tuyệt vời
                         </div>
                     </div>
                 </div>
             </div>
             <div class="form-group box-survey-search-job_content">
                 <label for="">Vui lòng chia sẻ lý do tại sao</label>
                 <textarea class="form-control border-hover" name="reason" id="evaluate_reason" placeholder="Lý do của bạn"
                     cols="30" rows="2"></textarea>
             </div>
             <div class="form-group box-survey-search-job_content text-center">
                 <div class="btn btn-submit-survey disabled">Gửi</div>
             </div>
         </div>
         <div class="box-survey-search-job submit-success" id="box-survey-search-job-success" style="display: none">
             <div class="submit-success_content">
                 <div class="icon">
                     <img data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/survey/search-job/check.png"
                         alt="check" class="lazy">
                 </div>
                 <p class="title">
                     Cảm ơn bạn đã chia sẻ
                 </p>
                 <p class="message">Chúc bạn sớm tìm được công việc như ý!</p>
             </div>
         </div>
     </div>
     <script>
         window.lazyFunctions.initBoxSurveySearchJob = async function(element) {
             await window.loadScript('https://static.topcv.vn/v4/plugins/lottie-player/lottie-player.js');
         }
     </script>
     <div class="modal fade" id="popup-setting-notification-job" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <div class="modal-title">
                         <h5 class="title">
                             Tạo thông báo việc làm
                         </h5>
                     </div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <i class="fa-light fa-xmark"></i>
                     </button>
                 </div>
                 <div class="modal-body row">
                     <div class="form-group col-md-12">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Từ khoá tìm kiếm
                                 <span class="text-red">*</span></label>
                         </div>
                         <div class="d-block wrapper-keyword-select2 relative">
                             <input class="form-control" id="setting-notify-keyword" name="keyword"
                                 placeholder="Nhập từ khoá tìm kiếm">
                             <p class="error mgt-4px"></p>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Tỉnh/Thành phố
                             </label>
                         </div>
                         <div class="d-block relative">
                             <select name="city" id="setting-notify-city" class="form-control select2">
                                 <option value="">Tất cả tỉnh/thành phố</option>
                                 <option value="1">Hà Nội</option>
                                 <option value="2">Hồ Chí Minh</option>
                                 <option value="3">Bình Dương</option>
                                 <option value="4">Bắc Ninh</option>
                                 <option value="5">Đồng Nai</option>
                                 <option value="6">Hưng Yên</option>
                                 <option value="7">Hải Dương</option>
                                 <option value="8">Đà Nẵng</option>
                                 <option value="9">Hải Phòng</option>
                                 <option value="10">An Giang</option>
                                 <option value="11">Bà Rịa-Vũng Tàu</option>
                                 <option value="12">Bắc Giang</option>
                                 <option value="13">Bắc Kạn</option>
                                 <option value="14">Bạc Liêu</option>
                                 <option value="15">Bến Tre</option>
                                 <option value="16">Bình Định</option>
                                 <option value="17">Bình Phước</option>
                                 <option value="18">Bình Thuận</option>
                                 <option value="19">Cà Mau</option>
                                 <option value="20">Cần Thơ</option>
                                 <option value="21">Cao Bằng</option>
                                 <option value="22">Cửu Long</option>
                                 <option value="23">Đắk Lắk</option>
                                 <option value="24">Đắc Nông</option>
                                 <option value="25">Điện Biên</option>
                                 <option value="26">Đồng Tháp</option>
                                 <option value="27">Gia Lai</option>
                                 <option value="28">Hà Giang</option>
                                 <option value="29">Hà Nam</option>
                                 <option value="30">Hà Tĩnh</option>
                                 <option value="31">Hậu Giang</option>
                                 <option value="32">Hoà Bình</option>
                                 <option value="33">Khánh Hoà</option>
                                 <option value="34">Kiên Giang</option>
                                 <option value="35">Kon Tum</option>
                                 <option value="36">Lai Châu</option>
                                 <option value="37">Lâm Đồng</option>
                                 <option value="38">Lạng Sơn</option>
                                 <option value="39">Lào Cai</option>
                                 <option value="40">Long An</option>
                                 <option value="41">Miền Bắc</option>
                                 <option value="42">Miền Nam</option>
                                 <option value="43">Miền Trung</option>
                                 <option value="44">Nam Định</option>
                                 <option value="45">Nghệ An</option>
                                 <option value="46">Ninh Bình</option>
                                 <option value="47">Ninh Thuận</option>
                                 <option value="48">Phú Thọ</option>
                                 <option value="49">Phú Yên</option>
                                 <option value="50">Quảng Bình</option>
                                 <option value="51">Quảng Nam</option>
                                 <option value="52">Quảng Ngãi</option>
                                 <option value="53">Quảng Ninh</option>
                                 <option value="54">Quảng Trị</option>
                                 <option value="55">Sóc Trăng</option>
                                 <option value="56">Sơn La</option>
                                 <option value="57">Tây Ninh</option>
                                 <option value="58">Thái Bình</option>
                                 <option value="59">Thái Nguyên</option>
                                 <option value="60">Thanh Hoá</option>
                                 <option value="61">Thừa Thiên Huế</option>
                                 <option value="62">Tiền Giang</option>
                                 <option value="63">Toàn Quốc</option>
                                 <option value="64">Trà Vinh</option>
                                 <option value="65">Tuyên Quang</option>
                                 <option value="66">Vĩnh Long</option>
                                 <option value="67">Vĩnh Phúc</option>
                                 <option value="68">Yên Bái</option>
                                 <option value="100">Nước Ngoài</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Quận/Huyện
                             </label>
                         </div>
                         <div class="d-block relative select2-form-popup">
                             <select name="district" id="setting-notify-district" class="form-control select2">
                                 <option value="">Tất cả quận/huyện</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Mức lương
                             </label>
                         </div>
                         <div class="d-block relative">
                             <select name="salary" id="setting-notify-salary" class="form-control select2">
                                 <option value="0">Tất cả mức lương</option>
                                 <option data-from="0" data-to="10000000" value="1">Dưới 10 triệu</option>
                                 <option data-from="10000000" data-to="15000000" value="5">10 - 15 triệu</option>
                                 <option data-from="15000000" data-to="20000000" value="7">15 - 20 triệu</option>
                                 <option data-from="20000000" data-to="25000000" value="8">20 - 25 triệu</option>
                                 <option data-from="25000000" data-to="30000000" value="9">25 - 30 triệu</option>
                                 <option data-from="30000000" data-to="50000000" value="10">30 - 50 triệu</option>
                                 <option data-from="50000000" data-to="0" value="11">Trên 50 triệu</option>
                                 <option data-from="0" data-to="0" value="127">Thoả thuận</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Kinh nghiệm
                             </label>
                         </div>
                         <div class="d-block relative">
                             <select name="experience" id="setting-notify-experience" class="form-control select2">
                                 <option value="">Tất cả kinh nghiệm</option>
                                 <option value="1">Chưa có kinh nghiệm</option>
                                 <option value="2">Dưới 1 năm</option>
                                 <option value="3">1 năm</option>
                                 <option value="4">2 năm</option>
                                 <option value="5">3 năm</option>
                                 <option value="6">4 năm</option>
                                 <option value="7">5 năm</option>
                                 <option value="8">Trên 5 năm</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Ngành nghề
                             </label>
                         </div>
                         <div class="d-block relative">
                             <select name="category" id="setting-notify-category" class="form-control select2">
                                 <option value="">Tất cả ngành nghề</option>
                                 <option value="10101">An toàn lao động</option>
                                 <option value="10102">Bán hàng kỹ thuật</option>
                                 <option value="10103">Bán lẻ / bán sỉ</option>
                                 <option value="10004">Báo chí / Truyền hình</option>
                                 <option value="10006">Bảo hiểm</option>
                                 <option value="10104">Bảo trì / Sửa chữa</option>
                                 <option value="10007">Bất động sản</option>
                                 <option value="10003">Biên / Phiên dịch</option>
                                 <option value="10005">Bưu chính - Viễn thông</option>
                                 <option value="10008">Chứng khoán / Vàng / Ngoại tệ</option>
                                 <option value="10010">Cơ khí / Chế tạo / Tự động hóa</option>
                                 <option value="10009">Công nghệ cao</option>
                                 <option value="10052">Công nghệ Ô tô</option>
                                 <option value="10131">Công nghệ thông tin</option>
                                 <option value="10012">Dầu khí/Hóa chất</option>
                                 <option value="10013">Dệt may / Da giày</option>
                                 <option value="10111">Địa chất / Khoáng sản</option>
                                 <option value="10014">Dịch vụ khách hàng</option>
                                 <option value="10016">Điện / Điện tử / Điện lạnh</option>
                                 <option value="10015">Điện tử viễn thông</option>
                                 <option value="10011">Du lịch</option>
                                 <option value="10110">Dược phẩm / Công nghệ sinh học</option>
                                 <option value="10017">Giáo dục / Đào tạo</option>
                                 <option value="10113">Hàng cao cấp</option>
                                 <option value="10020">Hàng gia dụng</option>
                                 <option value="10021">Hàng hải</option>
                                 <option value="10022">Hàng không</option>
                                 <option value="10117">Hàng tiêu dùng</option>
                                 <option value="10023">Hành chính / Văn phòng</option>
                                 <option value="10018">Hoá học / Sinh học</option>
                                 <option value="10019">Hoạch định/Dự án</option>
                                 <option value="10024">In ấn / Xuất bản</option>
                                 <option value="10025">IT Phần cứng / Mạng</option>
                                 <option value="10026">IT phần mềm</option>
                                 <option value="10028">Kế toán / Kiểm toán</option>
                                 <option value="10027">Khách sạn / Nhà hàng</option>
                                 <option value="10120">Kiến trúc</option>
                                 <option value="10001">Kinh doanh / Bán hàng</option>
                                 <option value="10048">Logistics</option>
                                 <option value="10036">Luật/Pháp lý</option>
                                 <option value="10029">Marketing / Truyền thông / Quảng cáo</option>
                                 <option value="10030">Môi trường / Xử lý chất thải</option>
                                 <option value="10031">Mỹ phẩm / Trang sức</option>
                                 <option value="10032">Mỹ thuật / Nghệ thuật / Điện ảnh</option>
                                 <option value="10033">Ngân hàng / Tài chính</option>
                                 <option value="11000">Ngành nghề khác</option>
                                 <option value="10132">NGO / Phi chính phủ / Phi lợi nhuận</option>
                                 <option value="10034">Nhân sự</option>
                                 <option value="10035">Nông / Lâm / Ngư nghiệp</option>
                                 <option value="10124">Phi chính phủ / Phi lợi nhuận</option>
                                 <option value="10037">Quản lý chất lượng (QA/QC)</option>
                                 <option value="10038">Quản lý điều hành</option>
                                 <option value="10125">Sản phẩm công nghiệp</option>
                                 <option value="10126">Sản xuất</option>
                                 <option value="10130">Spa / Làm đẹp</option>
                                 <option value="10127">Tài chính / Đầu tư</option>
                                 <option value="10039">Thiết kế đồ họa</option>
                                 <option value="10128">Thiết kế nội thất</option>
                                 <option value="10042">Thời trang</option>
                                 <option value="10129">Thư ký / Trợ lý</option>
                                 <option value="10043">Thực phẩm / Đồ uống</option>
                                 <option value="10046">Tổ chức sự kiện / Quà tặng</option>
                                 <option value="10045">Tư vấn</option>
                                 <option value="10047">Vận tải / Kho vận</option>
                                 <option value="10050">Xây dựng</option>
                                 <option value="10049">Xuất nhập khẩu</option>
                                 <option value="10051">Y tế / Dược</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-6">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Hình thức làm việc
                             </label>
                         </div>
                         <div class="d-block relative">
                             <select name="type" id="setting-notify-type" class="form-control select2">
                                 <option value="">Tất cả hình thức làm việc</option>
                                 <option value="1">Toàn thời gian</option>
                                 <option value="3">Bán thời gian</option>
                                 <option value="5">Thực tập</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group col-md-12 box-radio">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Tuần suất nhận thông báo</label>
                         </div>
                         <div class="box-radio_list">
                             <div class="custom-radio-circle-2 input-radio">
                                 <input id="notify-daily" type="radio" value="0" name="frequency">
                                 <label for="notify-daily">
                                     <div class="check-mark"></div>
                                     <span class="input-radio_label">
                                         Hằng ngày
                                     </span>
                                 </label>
                             </div>
                             <div class="custom-radio-circle-2 input-radio">
                                 <input id="notify-weekly" type="radio" value="1" name="frequency">
                                 <label for="notify-weekly">
                                     <div class="check-mark"></div>
                                     <span class="input-radio_label">
                                         Hàng tuần
                                     </span>
                                 </label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group col-md-12 box-radio">
                         <div class="mb-1 align-self-center">
                             <label for="">
                                 Nhận thông báo qua</label>
                         </div>
                         <div class="box-radio_list">
                             <div class="custom-radio-circle-2 input-radio">
                                 <input id="via-email" type="radio" value="1" name="via">
                                 <label for="via-email">
                                     <div class="check-mark"></div>
                                     <span class="input-radio_label">
                                         Email
                                     </span>
                                 </label>
                             </div>
                             <div class="custom-radio-circle-2 input-radio">
                                 <input id="via-app" type="radio" value="2" name="via">
                                 <label for="via-app">
                                     <div class="check-mark"></div>
                                     <span class="input-radio_label">
                                         Ứng dụng
                                     </span>
                                 </label>
                             </div>
                             <div class="custom-radio-circle-2 input-radio">
                                 <input id="via-all" type="radio" value="0" name="via">
                                 <label for="via-all">
                                     <div class="check-mark"></div>
                                     <span class="input-radio_label">
                                         Cả hai
                                     </span>
                                 </label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-cancel" data-dismiss="modal">Hủy</button>
                     <button type="button" class="btn btn-topcv-primary btn-send">Tạo mới</button>
                 </div>
             </div>
         </div>
     </div>
     <div class="modal fade" tabindex="-1" role="dialog" id="modal-require-verify-to-setting-job-notification">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title text-dark">Yêu cầu xác thực tài khoản</h4>
                 </div>
                 <div class="modal-body">
                     Bạn vui lòng xác thực tài khoản để sử dụng tính năng này. Xác thực ngay <a
                         href="https://www.topcv.vn/tai-khoan/xac-thuc-email" target="_blank" class="text-highlight"
                         rel="nooppener noreferrer">tại đây</a>.
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button>
                 </div>
             </div>
         </div>
     </div>
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/job-notification-setting.bea5fa3f03028ed1K.css">
     <script data-type="lazy" data-src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js" src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js"></script>
 @endsection
