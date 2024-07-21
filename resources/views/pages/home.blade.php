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
                                 src="../cdn-new.topcv.vn/unsafe/800x/https_/static.topcv.vn/v4/image/welcome/section-header/banner.png"
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
                         <div class="input">
                         </div>
                         <div class="box-smart-filter box-smart-feature-jobs">

                         </div>
                     </div>
                     <div class="text-guide-quick-view guide-box-feature active">
                         <p><i class="fa-solid fa-lightbulb-on fa-fade"></i> <b>Gợi ý</b>: Di chuột vào tiêu đề việc làm
                             để xem thêm thông tin chi tiết
                         </p> <button data-type="guide-box-feature"><i class="fa fa-close"></i></button>
                     </div>
                     <div class="box-feature-job-container">
                         <div>
                             <div class="el-carousel feature-jobs">
                                 <div class="el-carousel-ctn ">
                                     <div class="row feature_job_item">
                                         @foreach ($jobPostings as $jobPosting)
                                             <div class="col-md-4 col-sm-6 feature-job job-ta">
                                                 <div class="feature-job-item">
                                                     <div class="cvo-flex">
                                                         <a href="{{ route('job.show', $jobPosting->slug) }}"
                                                             target="_blank">
                                                             <div class="box-company-logo">
                                                                 <div class="avatar">
                                                                     <img title="{{ $jobPosting->company_name }} tuyển dụng tại TopCV"
                                                                         alt="{{ $jobPosting->company_name }} tuyển dụng tại TopCV"
                                                                         src="{{ $jobPosting->logo ? asset('storage/' . $jobPosting->logo) : asset('storage/avatar/avatar-default.jpg') }}"
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
                                                                 {{ $jobPosting->company_name }}
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
                         <div class="slick-track"
                             style="opacity: 1; width: 12760px; transform: translate3d(-3480px, 0px, 0px);">
                             <div class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-cp-uv-5e032e505081a.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CP UV</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-duoc-pham-imexpharm-5ee729d3db2a0.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN DƯỢC PHẨM IMEXPHARM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cty-co-phan-duoc-pham-boston-viet-nam-5cbecffd2a79b.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CTY CỔ PHẦN DƯỢC PHẨM BOSTON VIỆT NAM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/d6D6cQmPmM6UGab999jf54M4uLyG0ZZh_1681263254____9e681e99c76c6d79bcef3dbdf4b27af2.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN VIỆT - ÚC BẠC LIÊU</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-dau-tu-chau-a-thai-binh-duong-61c2a38ac82d5.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-dau-tu-chau-a-thai-binh-duong-61c2a38ac82d5.jpg">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN ĐẦU TƯ CHÂU Á - THÁI BÌNH DƯƠNG
                                     </h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-cp-nong-san-phu-gia-60cac4cd4e599.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-cp-nong-san-phu-gia-60cac4cd4e599.jpg">
                                     <h3 class="top-company__title">Công ty CP nông sản Phú Gia</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="v1000 top-company__label">v1000</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-tnhh-mtv-mirae-asset-57d9002332f00_rs.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-tnhh-mtv-mirae-asset-57d9002332f00_rs.jpg">
                                     <h3 class="top-company__title">Công Ty Tài Chính TNHH MTV Mirae Asset</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/LzuAxWv2tf6Az2ZoFcCCJvk84GcctYf9_1668571892____31ebed37aa0606ca68db3b867d96dd89.png"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/LzuAxWv2tf6Az2ZoFcCCJvk84GcctYf9_1668571892____31ebed37aa0606ca68db3b867d96dd89.png">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN TỐC ĐỘ</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="v1000 top-company__label">v1000</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-tnhh-mot-thanh-vien-home-credit-viet-nam-5b7100af1f634_rs.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-tnhh-mot-thanh-vien-home-credit-viet-nam-5b7100af1f634_rs.jpg">
                                     <h3 class="top-company__title">Công Ty Tài Chính TNHH Một Thành Viên Home Credit
                                         Việt Nam</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-tap-doan-cong-nghiep-viet-604b4b4340633.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-tap-doan-cong-nghiep-viet-604b4b4340633.jpg">
                                     <h3 class="top-company__title">Công Ty Cổ Phần Tập Đoàn Công Nghiệp Việt</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="6" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-bot-thuc-pham-tai-ky-5bb578f70d5a0_rs.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-bot-thuc-pham-tai-ky-5bb578f70d5a0_rs.jpg">
                                     <h3 class="top-company__title">Công Ty Cổ Phần Bột Thực Phẩm Tài Ký</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="7" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/OEKs3vhfgl7Ji5id2X42SWus0L2VwKAY_1652511514____65e81f942dcb109305f3b7e1bb4f139f.png"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/OEKs3vhfgl7Ji5id2X42SWus0L2VwKAY_1652511514____65e81f942dcb109305f3b7e1bb4f139f.png">
                                     <h3 class="top-company__title">Công ty Cổ phần xuất nhập khẩu hóa chất và thiết bị
                                         Kim Ngưu</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-current slick-active" data-slick-index="8" aria-hidden="false"
                                 style="width: 270px;" tabindex="0">
                                 <div class="top-company--item"><label class="vnr500 top-company__label">vnr500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/ZnJ5XqByJvkumYpFAkmucDhhov6ctgCW_1658888043____ddc29c0af50455ab0da3418dd0f458d6.PNG"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/ZnJ5XqByJvkumYpFAkmucDhhov6ctgCW_1658888043____ddc29c0af50455ab0da3418dd0f458d6.PNG">
                                     <h3 class="top-company__title">Công ty Cổ Phần Dịch Vụ Phân Phối Tổng Hợp Dầu Khí
                                         PSD</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-active" data-slick-index="9" aria-hidden="false"
                                 style="width: 270px;" tabindex="0">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-duoc-pham-opc-duoc-chuyen-the-tu-xi-nghiep-duoc-pham-trung-uong-26-doanh-nghiep-nha-nuoc-dkkd-so-102652-do-trong-tai-kinh-te-thanh-pho-ho-chi-minh-cap-ngay-10-05-1993-63afaf5e1e4b3.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-duoc-pham-opc-duoc-chuyen-the-tu-xi-nghiep-duoc-pham-trung-uong-26-doanh-nghiep-nha-nuoc-dkkd-so-102652-do-trong-tai-kinh-te-thanh-pho-ho-chi-minh-cap-ngay-10-05-1993-63afaf5e1e4b3.jpg">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN DƯỢC PHẨM OPC</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-active" data-slick-index="10" aria-hidden="false"
                                 style="width: 270px;" tabindex="0">
                                 <div class="top-company--item"><label class="v1000 top-company__label">v1000</label>
                                     <img data-src="https://static.topcv.vn/company_logos/69iEFNHI0d8edsYdTDgV.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/69iEFNHI0d8edsYdTDgV.jpg">
                                     <h3 class="top-company__title">TỔ CHỨC GIÁO DỤC FPT</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-active" data-slick-index="11" aria-hidden="false"
                                 style="width: 270px;" tabindex="0">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tnhh-phuc-giang-5e9007f082cb6.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-tnhh-phuc-giang-5e9007f082cb6.jpg">
                                     <h3 class="top-company__title">Công Ty TNHH Phúc Giang</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="12" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="vnr500 top-company__label">vnr500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-giao-hang-tiet-kiem-637de1b0d244b.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-giao-hang-tiet-kiem-637de1b0d244b.jpg">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN GIAO HÀNG TIẾT KIỆM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="13" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-co-phan-tin-viet-5bd6b78cc1e7e_rs.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-co-phan-tin-viet-5bd6b78cc1e7e_rs.jpg">
                                     <h3 class="top-company__title">Công Ty Tài Chính Cổ Phần Tín Việt</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="14" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-sua-quoc-te-6299d31d546f7.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-sua-quoc-te-6299d31d546f7.jpg">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN SỮA QUỐC TẾ</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="15" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-cong-nghe-va-dau-tu-intech-5af16e45a98a9_rs.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-cong-nghe-va-dau-tu-intech-5af16e45a98a9_rs.jpg">
                                     <h3 class="top-company__title">Công ty Cổ phần công nghệ và đầu tư Intech</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="16" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-cp-uv-5e032e505081a.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-cp-uv-5e032e505081a.jpg">
                                     <h3 class="top-company__title">CÔNG TY CP UV</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="17" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-duoc-pham-imexpharm-5ee729d3db2a0.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-duoc-pham-imexpharm-5ee729d3db2a0.jpg">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN DƯỢC PHẨM IMEXPHARM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="18" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cty-co-phan-duoc-pham-boston-viet-nam-5cbecffd2a79b.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cty-co-phan-duoc-pham-boston-viet-nam-5cbecffd2a79b.jpg">
                                     <h3 class="top-company__title">CTY CỔ PHẦN DƯỢC PHẨM BOSTON VIỆT NAM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide" data-slick-index="19" aria-hidden="true" style="width: 270px;"
                                 tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/d6D6cQmPmM6UGab999jf54M4uLyG0ZZh_1681263254____9e681e99c76c6d79bcef3dbdf4b27af2.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/d6D6cQmPmM6UGab999jf54M4uLyG0ZZh_1681263254____9e681e99c76c6d79bcef3dbdf4b27af2.jpg">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN VIỆT - ÚC BẠC LIÊU</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="20" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-dau-tu-chau-a-thai-binh-duong-61c2a38ac82d5.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-co-phan-dau-tu-chau-a-thai-binh-duong-61c2a38ac82d5.jpg">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN ĐẦU TƯ CHÂU Á - THÁI BÌNH DƯƠNG
                                     </h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="21" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-cp-nong-san-phu-gia-60cac4cd4e599.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-cp-nong-san-phu-gia-60cac4cd4e599.jpg">
                                     <h3 class="top-company__title">Công ty CP nông sản Phú Gia</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="22" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="v1000 top-company__label">v1000</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-tnhh-mtv-mirae-asset-57d9002332f00_rs.jpg"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-tnhh-mtv-mirae-asset-57d9002332f00_rs.jpg">
                                     <h3 class="top-company__title">Công Ty Tài Chính TNHH MTV Mirae Asset</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="23" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/LzuAxWv2tf6Az2ZoFcCCJvk84GcctYf9_1668571892____31ebed37aa0606ca68db3b867d96dd89.png"
                                         alt="Logo" class="lazy entered loaded" data-ll-status="loaded"
                                         src="https://static.topcv.vn/company_logos/LzuAxWv2tf6Az2ZoFcCCJvk84GcctYf9_1668571892____31ebed37aa0606ca68db3b867d96dd89.png">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN TỐC ĐỘ</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="24" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="v1000 top-company__label">v1000</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-tnhh-mot-thanh-vien-home-credit-viet-nam-5b7100af1f634_rs.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công Ty Tài Chính TNHH Một Thành Viên Home Credit
                                         Việt Nam</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="25" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-tap-doan-cong-nghiep-viet-604b4b4340633.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công Ty Cổ Phần Tập Đoàn Công Nghiệp Việt</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="26" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-bot-thuc-pham-tai-ky-5bb578f70d5a0_rs.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công Ty Cổ Phần Bột Thực Phẩm Tài Ký</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="27" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/OEKs3vhfgl7Ji5id2X42SWus0L2VwKAY_1652511514____65e81f942dcb109305f3b7e1bb4f139f.png"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công ty Cổ phần xuất nhập khẩu hóa chất và thiết bị
                                         Kim Ngưu</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="28" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="vnr500 top-company__label">vnr500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/ZnJ5XqByJvkumYpFAkmucDhhov6ctgCW_1658888043____ddc29c0af50455ab0da3418dd0f458d6.PNG"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công ty Cổ Phần Dịch Vụ Phân Phối Tổng Hợp Dầu Khí
                                         PSD</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="29" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-duoc-pham-opc-duoc-chuyen-the-tu-xi-nghiep-duoc-pham-trung-uong-26-doanh-nghiep-nha-nuoc-dkkd-so-102652-do-trong-tai-kinh-te-thanh-pho-ho-chi-minh-cap-ngay-10-05-1993-63afaf5e1e4b3.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN DƯỢC PHẨM OPC</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="30" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="v1000 top-company__label">v1000</label>
                                     <img data-src="https://static.topcv.vn/company_logos/69iEFNHI0d8edsYdTDgV.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">TỔ CHỨC GIÁO DỤC FPT</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="31" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tnhh-phuc-giang-5e9007f082cb6.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công Ty TNHH Phúc Giang</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="32" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="vnr500 top-company__label">vnr500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-giao-hang-tiet-kiem-637de1b0d244b.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN GIAO HÀNG TIẾT KIỆM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="33" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-tai-chinh-co-phan-tin-viet-5bd6b78cc1e7e_rs.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công Ty Tài Chính Cổ Phần Tín Việt</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="34" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-sua-quoc-te-6299d31d546f7.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN SỮA QUỐC TẾ</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="35" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-cong-nghe-va-dau-tu-intech-5af16e45a98a9_rs.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">Công ty Cổ phần công nghệ và đầu tư Intech</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="36" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cong-ty-cp-uv-5e032e505081a.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CP UV</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="37" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/cong-ty-co-phan-duoc-pham-imexpharm-5ee729d3db2a0.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN DƯỢC PHẨM IMEXPHARM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="38" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label class="fast500 top-company__label">fast500</label>
                                     <img data-src="https://static.topcv.vn/company_logos/cty-co-phan-duoc-pham-boston-viet-nam-5cbecffd2a79b.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CTY CỔ PHẦN DƯỢC PHẨM BOSTON VIỆT NAM</h3>
                                 </div>
                             </div>
                             <div class="slick-slide slick-cloned" data-slick-index="39" aria-hidden="true"
                                 style="width: 270px;" tabindex="-1">
                                 <div class="top-company--item"><label
                                         class="profit500 top-company__label">profit500</label> <img
                                         data-src="https://static.topcv.vn/company_logos/d6D6cQmPmM6UGab999jf54M4uLyG0ZZh_1681263254____9e681e99c76c6d79bcef3dbdf4b27af2.jpg"
                                         alt="Logo" class="lazy">
                                     <h3 class="top-company__title">CÔNG TY CỔ PHẦN VIỆT - ÚC BẠC LIÊU</h3>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div id="dashboard-section" class="lazy entered" data-lazy-function="initDashboard" data-ll-status="entered">
             <div class="container lazy entered" id="dashboard" data-lazy-function="initDashboardHomeJS"
                 data-ll-status="entered">
                 <div class="block-dashboard">
                     <div class="block-dashboard__header">
                         <h3>Thị trường việc làm hôm nay <span>14/06/2024</span></h3>
                     </div>
                     <div class="block-dashboard__content">
                         <div class="block-newest-job">
                             <img class="block-newest-job__img lazy entered loaded"
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/dashboard/dashboard-item.png"
                                 alt="" data-ll-status="loaded"
                                 src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/dashboard/dashboard-item.png">
                             <div class="wrapper">
                                 <p class="block-newest-job__title">Việc làm mới nhất</p>
                                 <img class="block-newest-job__icon-top lazy animated entered loaded fadeIn"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/dashboard/icon-top.png"
                                     data-ll-status="loaded"
                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/dashboard/icon-top.png">
                                 <div class="" id="sliderNewJobPublish">
                                     <div class="job-item" data-index="item-14" data-id="1205271">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/chuyen-vien-kinh-doanh-tu-van-sale-hoach-dinh-tai-chinh-manh-ve-event-cskh-tai-ho-chi-minh/1205271.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/106245c62d9bfb6390241b6f82d725fd-658d4e7962c80.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/chuyen-vien-kinh-doanh-tu-van-sale-hoach-dinh-tai-chinh-manh-ve-event-cskh-tai-ho-chi-minh/1205271.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Chuyên Viên Kinh Doanh/ Tư Vấn/ Sale / Hoạch Định Tài Chính (Mạnh Về Event &amp; CSKH) Tại Hồ Chí Minh">
                                                 <p class="job-item__title">Chuyên Viên Kinh Doanh/ Tư Vấn/ Sale /
                                                     Hoạch
                                                     Định Tài Chính (Mạnh Về Event &amp; CSKH) Tại Hồ Chí Minh</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-bao-hiem-nhan-tho-aia-viet-nam/161011.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH BẢO HIỂM NHÂN THỌ AIA (VIỆT NAM)">
                                                 <p class="job-item__company">CÔNG TY TNHH BẢO HIỂM NHÂN THỌ AIA (VIỆT
                                                     NAM)</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh">Hồ Chí Minh</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-15" data-id="1368001">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/brand/cpvietnam/tuyen-dung/chuong-trinh-tim-kiem-tai-nang-phat-trien-lanh-dao-tuong-lai-j1368001.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-co-phan-chan-nuoi-c-p-viet-nam-5fec3c5e83804.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/brand/cpvietnam/tuyen-dung/chuong-trinh-tim-kiem-tai-nang-phat-trien-lanh-dao-tuong-lai-j1368001.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Chương Trình Tìm Kiếm Tài Năng - Phát Triển Lãnh Đạo Tương Lai">
                                                 <p class="job-item__title">Chương Trình Tìm Kiếm Tài Năng - Phát Triển
                                                     Lãnh Đạo Tương Lai</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/brand/cpvietnam?id=51602"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty Cổ Phần Chăn Nuôi C.P. Việt Nam">
                                                 <p class="job-item__company">Công ty Cổ Phần Chăn Nuôi C.P. Việt Nam
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Lâm Đồng &amp; 3 nơi khác">Lâm Đồng &amp; 3 nơi
                                                 khác</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-16" data-id="1367894">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-ke-toan-tong-hop-tu-3-nam-kinh-nghiem-luong-tu-15-20-trieu/1367894.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/7e90af44a9442b3c9bdcda30b9809c0f-6669421db1dc3.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-ke-toan-tong-hop-tu-3-nam-kinh-nghiem-luong-tu-15-20-trieu/1367894.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kế Toán Tổng Hợp Từ 3 Năm Kinh Nghiệm (Lương Từ 15-20 Triệu)">
                                                 <p class="job-item__title">Nhân Viên Kế Toán Tổng Hợp Từ 3 Năm Kinh
                                                     Nghiệm (Lương Từ 15-20 Triệu)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-nang-luong-mat-troi-an-gia/180830.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty TNHH Năng lượng mặt trời An Gia">
                                                 <p class="job-item__company">Công ty TNHH Năng lượng mặt trời An Gia
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Bắc Ninh, Hưng Yên">Bắc Ninh, Hưng Yên</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-17" data-id="1367746">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/chuyen-vien-dao-tao-va-quan-ly-van-hanh-lop-hoc-thu-nhap-tu-15-20-trieu-phu-cap-thuong-nong-thuong-theo-hieu-qua/1367746.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://www.topcv.vn/v4/image/normal-company/logo_default.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/chuyen-vien-dao-tao-va-quan-ly-van-hanh-lop-hoc-thu-nhap-tu-15-20-trieu-phu-cap-thuong-nong-thuong-theo-hieu-qua/1367746.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Chuyên Viên Đào Tạo Và Quản Lý Vận Hành Lớp Học (Thu Nhập Từ 15 - 20 Triệu + Phụ Cấp + Thưởng Nóng + Thưởng Theo Hiệu Quả)">
                                                 <p class="job-item__title">Chuyên Viên Đào Tạo Và Quản Lý Vận Hành Lớp
                                                     Học (Thu Nhập Từ 15 - 20 Triệu + Phụ Cấp + Thưởng Nóng + Thưởng Theo
                                                     Hiệu Quả)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-tap-doan-vesta-b-viet-nam/180804.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY CỔ PHẦN TẬP ĐOÀN VESTA-B VIỆT NAM">
                                                 <p class="job-item__company">CÔNG TY CỔ PHẦN TẬP ĐOÀN VESTA-B VIỆT NAM
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-18" data-id="1367654">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/chuyen-vien-sales-dich-vu-ban-khoa-hoc-cho-ca-nhan-doanh-nghiep-luong-cung-tu-10-trieu-thang/1367654.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/4f23f967f98c21c02cf002eb71dda487-60fa78efdb43f.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/chuyen-vien-sales-dich-vu-ban-khoa-hoc-cho-ca-nhan-doanh-nghiep-luong-cung-tu-10-trieu-thang/1367654.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Chuyên Viên Sales Dịch Vụ Bán Khóa Học Cho Cá Nhân/ Doanh Nghiệp,Lương Cứng Từ 10 Triệu/Tháng">
                                                 <p class="job-item__title">Chuyên Viên Sales Dịch Vụ Bán Khóa Học Cho
                                                     Cá
                                                     Nhân/ Doanh Nghiệp,Lương Cứng Từ 10 Triệu/Tháng</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-chung-nhan-kna/73294.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH CHỨNG NHẬN KNA">
                                                 <p class="job-item__company">CÔNG TY TNHH CHỨNG NHẬN KNA</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội, Hồ Chí Minh">Hà Nội, Hồ Chí Minh</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-19" data-id="1367637">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-dai-dien-ban-hang-sales-tai-ha-noi-thu-nhap-20-den-30-trieu/1367637.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-tnhh-cem-studio-047c3c4217b0ff2eab0c214eeadcf63b-666959aa0dfbb.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-dai-dien-ban-hang-sales-tai-ha-noi-thu-nhap-20-den-30-trieu/1367637.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh / Đại Diện Bán Hàng/ Sales - Tại Hà Nội, Thu Nhập 20 Đến 30 Triệu">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh / Đại Diện Bán Hàng/
                                                     Sales - Tại Hà Nội, Thu Nhập 20 Đến 30 Triệu</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-cem-studio/180819.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH CEM STUDIO">
                                                 <p class="job-item__company">CÔNG TY TNHH CEM STUDIO</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-20" data-id="1367610">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/chuyen-vien-nhan-su/1367610.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/pG9pyaClIATSidgRLzuMf4GoNAsxDdO9_1683879766____2ab964ea0a689a84769609ea9dc8ccf7.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/chuyen-vien-nhan-su/1367610.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Chuyên Viên Nhân Sự">
                                                 <p class="job-item__title">Chuyên Viên Nhân Sự</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-tham-my-quoc-te-viet-han/125851.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty TNHH Thẩm Mỹ Quốc Tế Việt Hàn">
                                                 <p class="job-item__company">Công ty TNHH Thẩm Mỹ Quốc Tế Việt Hàn</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh">Hồ Chí Minh</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-21" data-id="1367552">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-sale-thu-nhap-tu-15-35-trieu-tai-ha-noi/1367552.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-co-phan-tu-van-giao-duc-quoc-te-gks-147b5915c4131cec4ebe29a3ba828ccd-6610eadbcca07.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-sale-thu-nhap-tu-15-35-trieu-tai-ha-noi/1367552.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh/ Tư Vấn/ Sale - Thu Nhập Từ 15 - 35 Triệu - Tại Hà Nội">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh/ Tư Vấn/ Sale - Thu
                                                     Nhập
                                                     Từ 15 - 35 Triệu - Tại Hà Nội</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-tu-van-giao-duc-quoc-te-gks/168353.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY CỔ PHẦN TƯ VẤN GIÁO DỤC QUỐC TẾ GKS">
                                                 <p class="job-item__company">CÔNG TY CỔ PHẦN TƯ VẤN GIÁO DỤC QUỐC TẾ
                                                     GKS
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-22" data-id="1367488">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/truong-phong-mua-hang/1367488.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-co-phan-san-xuat-va-thuong-mai-thiet-bi-khach-san-pham-kien-d23c546b62c91e8a16b15d9843cfda27-666a646543b3f.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/truong-phong-mua-hang/1367488.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Trưởng Phòng Mua Hàng">
                                                 <p class="job-item__title">Trưởng Phòng Mua Hàng</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-san-xuat-va-thuong-mai-thiet-bi-khach-san-pham-kien/101373.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY CỔ PHẦN SẢN XUẤT VÀ THƯƠNG MẠI THIẾT BỊ KHÁCH SẠN PHẠM KIÊN">
                                                 <p class="job-item__company">CÔNG TY CỔ PHẦN SẢN XUẤT VÀ THƯƠNG MẠI
                                                     THIẾT BỊ KHÁCH SẠN PHẠM KIÊN</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hải Phòng">Hải Phòng</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-23" data-id="1367483">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/giam-doc-kinh-doanh-asm-khu-vuc-tay-bac-lang-son-cao-bang-bac-kan/1367483.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-cp-phan-phoi-va-logistics-hung-cuong-5db6623e0a4be.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/giam-doc-kinh-doanh-asm-khu-vuc-tay-bac-lang-son-cao-bang-bac-kan/1367483.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Giám Đốc Kinh Doanh ASM Khu Vực Tây Bắc( Lạng Sơn, Cao Bằng, Bắc Kạn)">
                                                 <p class="job-item__title">Giám Đốc Kinh Doanh ASM Khu Vực Tây Bắc(
                                                     Lạng
                                                     Sơn, Cao Bằng, Bắc Kạn)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-cp-phan-phoi-va-logistics-hung-cuong/28829.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty CP Phân phối và Logistics Hùng Cường">
                                                 <p class="job-item__company">Công ty CP Phân phối và Logistics Hùng
                                                     Cường</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Miền Bắc">Miền Bắc</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-24" data-id="1367476">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/giam-sat-kinh-doanh-luong-cung-tu-15-20-trieu-thu-nhap-tong-tu-30-trieu-thang/1367476.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/230c4b4bcddc65e5a5c8ef0a41309649-5f3e4d8fde6e6.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/giam-sat-kinh-doanh-luong-cung-tu-15-20-trieu-thu-nhap-tong-tu-30-trieu-thang/1367476.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Giám Sát Kinh Doanh (Lương Cứng Từ 15 - 20 Triệu) Thu Nhập Tổng Từ 30 Triệu/ Tháng">
                                                 <p class="job-item__title">Giám Sát Kinh Doanh (Lương Cứng Từ 15 - 20
                                                     Triệu) Thu Nhập Tổng Từ 30 Triệu/ Tháng</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-dien-tu-viet-nhat/43027.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công Ty TNHH Điện Tử Việt Nhật">
                                                 <p class="job-item__company">Công Ty TNHH Điện Tử Việt Nhật</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Nghệ An &amp; 3 nơi khác">Nghệ An &amp; 3 nơi
                                                 khác
                                             </p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-25" data-id="1367462">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/quan-ly-livestream-thu-nhap-len-den-20-trieu-tai-ha-noi/1367462.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/230c4b4bcddc65e5a5c8ef0a41309649-5f3e4d8fde6e6.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/quan-ly-livestream-thu-nhap-len-den-20-trieu-tai-ha-noi/1367462.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Quản Lý Livestream, Thu Nhập Lên Đến 20 Triệu Tại Hà Nội">
                                                 <p class="job-item__title">Quản Lý Livestream, Thu Nhập Lên Đến 20
                                                     Triệu
                                                     Tại Hà Nội</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-dien-tu-viet-nhat/43027.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công Ty TNHH Điện Tử Việt Nhật">
                                                 <p class="job-item__company">Công Ty TNHH Điện Tử Việt Nhật</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-26" data-id="1367171">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/ke-toan-truong-cau-giay-thu-nhap-15-25-trieu/1367171.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-cp-duoc-pham-thai-minh-5adda3bf077f6_rs.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/ke-toan-truong-cau-giay-thu-nhap-15-25-trieu/1367171.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Kế Toán Trưởng - Cầu Giấy - Thu Nhập 15 - 25 Triệu">
                                                 <p class="job-item__title">Kế Toán Trưởng - Cầu Giấy - Thu Nhập 15 -
                                                     25
                                                     Triệu</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-cp-duoc-pham-thai-minh/9375.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty CP Dược Phẩm Thái Minh">
                                                 <p class="job-item__company">Công ty CP Dược Phẩm Thái Minh</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-27"
                                         data-id="1367167">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-sales-tu-van-khoa-hoc-tieng-anh-co-co-hoi-lam-sales-leader-sau-3-thang-tai-binh-duong/1367167.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/bZnLqiGFWWa16jBtM2jAYSvOIcH1MNtl_1692067864____f998aa395d3040df65b9a854a7bdfe8f.jpeg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-sales-tu-van-khoa-hoc-tieng-anh-co-co-hoi-lam-sales-leader-sau-3-thang-tai-binh-duong/1367167.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh - Sales Tư Vấn Khóa Học Tiếng Anh (Có Cơ Hội Làm Sales Leader Sau 3 Tháng) - Tại Bình Dương">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh - Sales Tư Vấn Khóa
                                                     Học
                                                     Tiếng Anh (Có Cơ Hội Làm Sales Leader Sau 3 Tháng) - Tại Bình Dương
                                                 </p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/he-thong-trung-tam-anh-ngu-10x-english/151380.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Hệ thống trung tâm Anh Ngữ 10X English">
                                                 <p class="job-item__company">Hệ thống trung tâm Anh Ngữ 10X English
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Bình Dương">Bình Dương</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-28"
                                         data-id="1366817">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/truong-nhom-kinh-doanh-kenh-pos-va-kenh-tien-mat-vung-tau-dong-nai-khanh-hoa/1366817.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/15ca037fd42c0566216d6f9938b8c4b3-6662d6b4c646f.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/truong-nhom-kinh-doanh-kenh-pos-va-kenh-tien-mat-vung-tau-dong-nai-khanh-hoa/1366817.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Trưởng Nhóm Kinh Doanh Kênh POS Và Kênh Tiền Mặt (VŨNG TÀU, ĐỒNG NAI, KHÁNH HÒA)">
                                                 <p class="job-item__title">Trưởng Nhóm Kinh Doanh Kênh POS Và Kênh
                                                     Tiền
                                                     Mặt (VŨNG TÀU, ĐỒNG NAI, KHÁNH HÒA)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tai-chinh-trach-nhiem-huu-han-mot-thanh-vien-shinhan-viet-nam/180260.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TÀI CHÍNH TRÁCH NHIỆM HỮU HẠN MỘT THÀNH VIÊN SHINHAN VIỆT NAM">
                                                 <p class="job-item__company">CÔNG TY TÀI CHÍNH TRÁCH NHIỆM HỮU HẠN MỘT
                                                     THÀNH VIÊN SHINHAN VIỆT NAM</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Đồng Nai &amp; 2 nơi khác">Đồng Nai &amp; 2 nơi
                                                 khác</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-29"
                                         data-id="1366732">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/brand/congnghiepvienthongquandoi/tuyen-dung/ky-su-ps-core-bo-thu-nhap-toi-thieu-200-trieu-nam-j1366732.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/tap-doan-cong-nghiep-vien-thong-quan-doi-6417bb41bf793.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/brand/congnghiepvienthongquandoi/tuyen-dung/ky-su-ps-core-bo-thu-nhap-toi-thieu-200-trieu-nam-j1366732.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Kỹ Sư PS Core (BO) - Thu Nhập Tối Thiểu 200 Triệu/ Năm">
                                                 <p class="job-item__title">Kỹ Sư PS Core (BO) - Thu Nhập Tối Thiểu 200
                                                     Triệu/ Năm</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/brand/congnghiepvienthongquandoi?id=128588"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="TẬP ĐOÀN CÔNG NGHIỆP - VIỄN THÔNG QUÂN ĐỘI">
                                                 <p class="job-item__company">TẬP ĐOÀN CÔNG NGHIỆP - VIỄN THÔNG QUÂN
                                                     ĐỘI
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-30"
                                         data-id="1366708">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-sale-online-tai-ha-dong/1366708.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/hOSOdy8XqMNltEd2hEQVSKbollXJYJwQ_1648714606____c3118f453d1fe2b7d80931a9e5fde5e0.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-sale-online-tai-ha-dong/1366708.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Sale Online Tại Hà Đông">
                                                 <p class="job-item__title">Nhân Viên Sale Online Tại Hà Đông</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-tra-dac-san-tay-bac/95593.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công Ty TNHH Trà &amp; Đặc Sản Tây Bắc">
                                                 <p class="job-item__company">Công Ty TNHH Trà &amp; Đặc Sản Tây Bắc
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-31"
                                         data-id="1366689">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/business-development-phat-trien-kinh-doanh-sales-b2b-tai-ha-noi-tp-ho-chi-minh-thu-nhap-18-30-trieu/1366689.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-tnhh-nc-11546033883981007f324b96234eeea4-66694bdf1e066.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/business-development-phat-trien-kinh-doanh-sales-b2b-tai-ha-noi-tp-ho-chi-minh-thu-nhap-18-30-trieu/1366689.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Business Development / Phát Triển Kinh Doanh / Sales B2B Tại Hà Nội, TP Hồ Chí Minh - Thu Nhập 18 - 30 Triệu">
                                                 <p class="job-item__title">Business Development / Phát Triển Kinh
                                                     Doanh
                                                     / Sales B2B Tại Hà Nội, TP Hồ Chí Minh - Thu Nhập 18 - 30 Triệu</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-nc/154232.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH NC">
                                                 <p class="job-item__company">CÔNG TY TNHH NC</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh, Hà Nội">Hồ Chí Minh, Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-32"
                                         data-id="1366665">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-va-phat-trien-thi-truong/1366665.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/3c5uwoMlSxbRC0ql1uJtP7srta9Ej5Uz_1665471368____877f3b84d14c0e038923a14038b92e0e.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-va-phat-trien-thi-truong/1366665.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh Và Phát Triển Thị Trường">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh Và Phát Triển Thị
                                                     Trường
                                                 </p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-thuong-mai-kaiyo-viet-nam/122516.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty TNHH thương mại Kaiyo Việt Nam">
                                                 <p class="job-item__company">Công ty TNHH thương mại Kaiyo Việt Nam
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-33"
                                         data-id="1365329">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-thu-nhap-toi-50tr-di-lam-ngay/1365329.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/ee4f54890bba6e7b3ca5e7fb6b1ad693-60d2fb35b247f.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-thu-nhap-toi-50tr-di-lam-ngay/1365329.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh (Thu Nhập Tới 50tr) - Đi Làm Ngay">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh (Thu Nhập Tới 50tr) -
                                                     Đi
                                                     Làm Ngay</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-tm-dv-asiatech-viet-nam/70812.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY CỔ PHẦN TM &amp; DV ASIATECH VIỆT NAM">
                                                 <p class="job-item__company">CÔNG TY CỔ PHẦN TM &amp; DV ASIATECH VIỆT
                                                     NAM</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-34"
                                         data-id="1024835">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/truong-phong-marketing-linh-vuc-my-pham-tpcn-thu-nhap-toi-thieu-40tr/1024835.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/nGsz88SiPM5K5GvDEVonP1MjALop2gJI_1692325077____508de7ba238212d55776b64a818fc379.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/truong-phong-marketing-linh-vuc-my-pham-tpcn-thu-nhap-toi-thieu-40tr/1024835.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Trưởng Phòng Marketing - Lĩnh Vực Mỹ Phẩm Tpcn - Thu Nhập Tối Thiểu 40tr">
                                                 <p class="job-item__title">Trưởng Phòng Marketing - Lĩnh Vực Mỹ Phẩm
                                                     Tpcn - Thu Nhập Tối Thiểu 40tr</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-thuong-mai-hkk/126818.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH THƯƠNG MẠI HKK">
                                                 <p class="job-item__company">CÔNG TY TNHH THƯƠNG MẠI HKK</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-35"
                                         data-id="1366591">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/tong-quan-ly-khach-san-thu-nhap-tu-30-trieu/1366591.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://www.topcv.vn/v4/image/normal-company/logo_default.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/tong-quan-ly-khach-san-thu-nhap-tu-30-trieu/1366591.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Tổng Quản Lý Khách Sạn ( Thu Nhập Từ 30 Triệu )">
                                                 <p class="job-item__title">Tổng Quản Lý Khách Sạn ( Thu Nhập Từ 30
                                                     Triệu
                                                     )</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-dich-vu-du-lich-nha-tren-may/178958.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY CỔ PHẦN DỊCH VỤ DU LỊCH NHÀ TRÊN MÂY">
                                                 <p class="job-item__company">CÔNG TY CỔ PHẦN DỊCH VỤ DU LỊCH NHÀ TRÊN
                                                     MÂY</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Lào Cai">Lào Cai</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-36"
                                         data-id="1366582">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/tong-dai-vien-nhac-phi-khong-yeu-cau-kinh-nghiem-thu-nhap-15-30-trieu/1366582.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/galaxy-debt-trading-company-limited-f8f5c5a006471f597baff8f7d7250f3b-664f196d38443.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/tong-dai-vien-nhac-phi-khong-yeu-cau-kinh-nghiem-thu-nhap-15-30-trieu/1366582.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Tổng Đài Viên Nhắc Phí Không Yêu Cầu Kinh Nghiệm Thu Nhập 15-30 Triệu">
                                                 <p class="job-item__title">Tổng Đài Viên Nhắc Phí Không Yêu Cầu Kinh
                                                     Nghiệm Thu Nhập 15-30 Triệu</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/galaxy-debt-trading-company-limited/177839.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="GALAXY DEBT TRADING COMPANY LIMITED">
                                                 <p class="job-item__company">GALAXY DEBT TRADING COMPANY LIMITED</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh, Đà Nẵng">Hồ Chí Minh, Đà Nẵng</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-37"
                                         data-id="1366066">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/can-bo-ky-thuat-phong-chay-chua-chay-tai-ha-noi-thu-nhap-upto-25tr/1366066.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-tnhh-thuong-mai-phong-chay-chua-chay-huy-hoang-60fd0775c658d.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/can-bo-ky-thuat-phong-chay-chua-chay-tai-ha-noi-thu-nhap-upto-25tr/1366066.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Cán Bộ Kỹ Thuật Phòng Cháy Chữa Cháy Tại Hà Nội/ Thu Nhập Upto 25tr">
                                                 <p class="job-item__title">Cán Bộ Kỹ Thuật Phòng Cháy Chữa Cháy Tại Hà
                                                     Nội/ Thu Nhập Upto 25tr</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-thuong-mai-phong-chay-chua-chay-huy-hoang/73344.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH THƯƠNG MẠI PHÒNG CHÁY CHỮA CHÁY HUY HOÀNG">
                                                 <p class="job-item__company">CÔNG TY TNHH THƯƠNG MẠI PHÒNG CHÁY CHỮA
                                                     CHÁY HUY HOÀNG</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-38"
                                         data-id="1366064">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/sales-supervisor-giam-sat-kinh-doanh-direct-sales/1366064.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/15ca037fd42c0566216d6f9938b8c4b3-6662d6b4c646f.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/sales-supervisor-giam-sat-kinh-doanh-direct-sales/1366064.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Sales Supervisor/ Giám Sát Kinh Doanh (Direct Sales)">
                                                 <p class="job-item__title">Sales Supervisor/ Giám Sát Kinh Doanh
                                                     (Direct
                                                     Sales)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tai-chinh-trach-nhiem-huu-han-mot-thanh-vien-shinhan-viet-nam/180260.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TÀI CHÍNH TRÁCH NHIỆM HỮU HẠN MỘT THÀNH VIÊN SHINHAN VIỆT NAM">
                                                 <p class="job-item__company">CÔNG TY TÀI CHÍNH TRÁCH NHIỆM HỮU HẠN MỘT
                                                     THÀNH VIÊN SHINHAN VIỆT NAM</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Đồng Nai &amp; 2 nơi khác">Đồng Nai &amp; 2 nơi
                                                 khác</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-39"
                                         data-id="1365990">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/chuyen-vien-facebook-ads/1365990.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-tnhh-thuong-mai-du-lich-sai-gon-thoi-dai-b1602cbc5ad3a9209c13fa1bf029dbd3-64e2e5c69b7e8.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/chuyen-vien-facebook-ads/1365990.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Chuyên Viên Facebook Ads">
                                                 <p class="job-item__title">Chuyên Viên Facebook Ads</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-thuong-mai-du-lich-sai-gon-thoi-dai/151878.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH THƯƠNG MẠI DU LỊCH SÀI GÒN THỜI ĐẠI">
                                                 <p class="job-item__company">CÔNG TY TNHH THƯƠNG MẠI DU LỊCH SÀI GÒN
                                                     THỜI ĐẠI</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh">Hồ Chí Minh</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-40"
                                         data-id="1365950">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-tuyen-sinh-khong-yeu-cau-kinh-nghiem-thu-nhap-15-30-trieu/1365950.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/BGQN9dGifkTwXcfcxQ5yH97wU0NHjPfk_1712130215____477d3121d8c15ac7164485b825c1c656.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-tuyen-sinh-khong-yeu-cau-kinh-nghiem-thu-nhap-15-30-trieu/1365950.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh (Tư Vấn Tuyển Sinh) Không Yêu Cầu Kinh Nghiệm, Thu Nhập 15 - 30 Triệu">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh (Tư Vấn Tuyển Sinh)
                                                     Không Yêu Cầu Kinh Nghiệm, Thu Nhập 15 - 30 Triệu</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-giao-duc-quoc-te-edugo/168024.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY CỔ PHẦN GIÁO DỤC QUỐC TẾ EDUGO">
                                                 <p class="job-item__company">CÔNG TY CỔ PHẦN GIÁO DỤC QUỐC TẾ EDUGO
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-41"
                                         data-id="1365903">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/truong-phong-kinh-doanh-thu-nhap-20-30-trieu/1365903.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/nSxtnw8QDG6fBt5mwV8p6HOokqO8la6w_1661567754____276729e7a816e711b37ad5cdd077a39e.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/truong-phong-kinh-doanh-thu-nhap-20-30-trieu/1365903.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Trưởng Phòng Kinh Doanh (Thu Nhập 20 - 30 Triệu)">
                                                 <p class="job-item__title">Trưởng Phòng Kinh Doanh (Thu Nhập 20 - 30
                                                     Triệu)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-cp-sxtm-xnk-miyoung-cosmetic/85171.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty CP SXTM XNK MiYoung Cosmetic">
                                                 <p class="job-item__company">Công ty CP SXTM XNK MiYoung Cosmetic</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh, Long An">Hồ Chí Minh, Long An</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-42"
                                         data-id="1365855">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/quan-ly-nhan-hang-thu-nhap-tren-30-trieu/1365855.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/0itHxuQFQ8zv51qrwZLQVGOpAcX6RPAz_1703587197____afb7091433d09e69da5891534b07fef5.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/quan-ly-nhan-hang-thu-nhap-tren-30-trieu/1365855.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Quản Lý Nhãn Hàng Thu Nhập Trên 30 Triệu">
                                                 <p class="job-item__title">Quản Lý Nhãn Hàng Thu Nhập Trên 30 Triệu
                                                 </p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-duoc-pham-revo/76616.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công Ty Cổ Phần Dược Phẩm Revo">
                                                 <p class="job-item__company">Công Ty Cổ Phần Dược Phẩm Revo</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-43"
                                         data-id="1365820">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-tu-van-cham-soc-khach-hang-telesales-luong-cung-8-trieu/1365820.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/y8MegOlBrwDGzgAC4yNcKHbkrXSksIpY_1649353722____852a72f6198579eea667c86a95454174.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-tu-van-cham-soc-khach-hang-telesales-luong-cung-8-trieu/1365820.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Tư Vấn/ Chăm Sóc Khách Hàng/ Telesales (Lương Cứng 8 Triệu)">
                                                 <p class="job-item__title">Nhân Viên Tư Vấn/ Chăm Sóc Khách Hàng/
                                                     Telesales (Lương Cứng 8 Triệu)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-tu-van-thuong-mai-idc/76951.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công Ty TNHH Tư Vấn Thương Mại IDC">
                                                 <p class="job-item__company">Công Ty TNHH Tư Vấn Thương Mại IDC</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh">Hồ Chí Minh</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-44"
                                         data-id="1365657">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-khong-yeu-cau-kinh-nghiem-luong-cung-8-10-trieu-hoa-hong-thuong/1365657.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/0p6iAavmx4Ux2Sqc5HAzLdTPDEF4n9l7_1713337917____2185785436d6c098a6c64b20759f4ae1.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-khong-yeu-cau-kinh-nghiem-luong-cung-8-10-trieu-hoa-hong-thuong/1365657.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh Không Yêu Cầu Kinh Nghiệm (Lương Cứng 8 - 10 Triệu + Hoa Hồng + Thưởng)">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh Không Yêu Cầu Kinh
                                                     Nghiệm (Lương Cứng 8 - 10 Triệu + Hoa Hồng + Thưởng)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-thiet-bi-vat-tu-minh-hai/169532.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY CỔ PHẦN THIẾT BỊ VẬT TƯ MINH HẢI">
                                                 <p class="job-item__company">CÔNG TY CỔ PHẦN THIẾT BỊ VẬT TƯ MINH HẢI
                                                 </p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội, Hồ Chí Minh">Hà Nội, Hồ Chí Minh</p>
                                         </div>
                                     </div>
                                     <div class="job-item active animated zoomIn" data-index="item-45"
                                         data-id="1365584">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-tuyen-sinh-telesales-thu-nhap-tu-20-40-trieu-thang-thanh-xuan-ha-noi-chi-tuyen-nu/1365584.html?ta_source=DashboardJob_LinkDetail">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-tnhh-truong-quoc-te-palfish-singapore-vietnam-3a509a4c6be3dfd6911be34593e3e859-6483f311bef71.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-tuyen-sinh-telesales-thu-nhap-tu-20-40-trieu-thang-thanh-xuan-ha-noi-chi-tuyen-nu/1365584.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh - Tư Vấn Tuyển Sinh - Telesales (Thu Nhập Từ 20-40 Triệu/Tháng) - Thanh Xuân Hà Nội - Chỉ Tuyển Nữ">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh - Tư Vấn Tuyển Sinh -
                                                     Telesales (Thu Nhập Từ 20-40 Triệu/Tháng) - Thanh Xuân Hà Nội - Chỉ
                                                     Tuyển Nữ</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-truong-quoc-te-palfish-singapore-vietnam/145266.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH TRƯỜNG QUỐC TẾ PALFISH SINGAPORE - VIETNAM">
                                                 <p class="job-item__company">CÔNG TY TNHH TRƯỜNG QUỐC TẾ PALFISH
                                                     SINGAPORE - VIETNAM</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item  active animated zoomIn" data-index="item-46"
                                         data-id="1365444">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-giao-duc-izone/28565.html">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/gn9IHExgpEYRstQP3YKPsT4aHlXS6QDZ_1694514042____72938442cfd990b8bf9580a07e8e4818.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-tu-van-tuyen-sinh-thu-nhap-len-den-25tr-khong-yc-kinh-nghiem/1365444.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Tư Vấn Tuyển Sinh Thu Nhập Lên Đến 25Tr ( Không Yc Kinh Nghiệm)">
                                                 <p class="job-item__title">Nhân Viên Tư Vấn Tuyển Sinh Thu Nhập Lên
                                                     Đến
                                                     25Tr ( Không Yc Kinh Nghiệm)</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-giao-duc-izone/28565.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Công ty TNHH Giáo Dục IZONE">
                                                 <p class="job-item__company">Công ty TNHH Giáo Dục IZONE</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active" data-index="item-" data-id="1365441">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/fpt-software/3.html">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/fpt-software-6073b38a10cb4.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/java-solution-architect-banking-domain-3000-4000-ho-chi-minh/1365441.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Java Solution Architect (Banking Domain) 3000 - 4000$- Hồ Chí Minh">
                                                 <p class="job-item__title">Java Solution Architect (Banking Domain)
                                                     3000
                                                     - 4000$- Hồ Chí Minh</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/fpt-software/3.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="FPT Software">
                                                 <p class="job-item__company">FPT Software</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hồ Chí Minh">Hồ Chí Minh</p>
                                         </div>
                                     </div>
                                     <div class="job-item active" data-index="item-" data-id="1365251">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-dau-tu-thuong-mai-dich-vu-diamond-home/90745.html">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-tnhh-dau-tu-thuong-mai-dich-vu-diamond-home-621de3b6cf579.jpg">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-thu-nhap-25-trieu-den-150-trieu-data-doi-dao-ho-tro-chi-phi-noi-o-vinsmart-city/1365251.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Nhân Viên Kinh Doanh/Tư Vấn Thu Nhập 25 Triệu Đến 150 Triệu, Data Dồi Dào + Hỗ Trợ Chi Phí Nơi Ở VinSmart City">
                                                 <p class="job-item__title">Nhân Viên Kinh Doanh/Tư Vấn Thu Nhập 25
                                                     Triệu
                                                     Đến 150 Triệu, Data Dồi Dào + Hỗ Trợ Chi Phí Nơi Ở VinSmart City</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-dau-tu-thuong-mai-dich-vu-diamond-home/90745.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="CÔNG TY TNHH ĐẦU TƯ THƯƠNG MẠI DỊCH VỤ DIAMOND HOME">
                                                 <p class="job-item__company">CÔNG TY TNHH ĐẦU TƯ THƯƠNG MẠI DỊCH VỤ
                                                     DIAMOND HOME</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                     <div class="job-item active" data-index="item-" data-id="1365241">
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/trung-tam-tiec-cuoi-hoi-nghi-mipec-palace/995.html">
                                             <img class="job-item__logo"
                                                 src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/B3liLb6TxRmh8RZ0xG1VIfJwAKxjwQrq_1691825152____b1eb605a0878ca07febd8bda5e75e76b.png">
                                         </a>
                                         <div>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/ke-toan-truong-nganh-fb-tai-ha-noi-thu-nhap-15-20-trieu/1365241.html?ta_source=DashboardJob_LinkDetail"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="Kế Toán Trưởng ( Ngành F&amp;B) - Tại Hà Nội - Thu Nhập 15 - 20 Triệu">
                                                 <p class="job-item__title">Kế Toán Trưởng ( Ngành F&amp;B) - Tại Hà
                                                     Nội
                                                     - Thu Nhập 15 - 20 Triệu</p>
                                             </a>
                                             <a class="job-item__link" target="_blank"
                                                 href="https://www.topcv.vn/cong-ty/trung-tam-tiec-cuoi-hoi-nghi-mipec-palace/995.html"
                                                 data-toggle="tooltip" title=""
                                                 data-original-title="TRUNG TÂM TIỆC CƯỚI &amp; HỘI NGHỊ MIPEC PALACE">
                                                 <p class="job-item__company">TRUNG TÂM TIỆC CƯỚI &amp; HỘI NGHỊ MIPEC
                                                     PALACE</p>
                                             </a>
                                             <p class="job-item__location" data-toggle="tooltip" title=""
                                                 data-original-title="Hà Nội">Hà Nội</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="block-statistics-job">
                             <div class="block-work-market work-market">
                                 <div class="item">
                                     <p class=" quantity quantity_job_new_today">2.191</p>
                                     <p class="title">Việc làm mới 24h gần nhất</p>
                                 </div>
                                 <div class="item">
                                     <p class="quantity quantity_job_recruitment">43.417</p>
                                     <p class="title">Việc làm đang tuyển</p>
                                 </div>
                                 <div class="item">
                                     <p class="quantity quantity_company_recruitment">15.211</p>
                                     <p class="title">Công ty đang tuyển</p>
                                 </div>
                             </div>
                             <div class="block-chart">
                                 <div class="item-chart">
                                     <div class="header">
                                         <div class="title">
                                             <div class="icon">
                                                 <i class="fa-solid fa-arrow-trend-up"></i>
                                             </div>
                                             <span class="caption">
                                                 Tăng trưởng cơ hội việc làm
                                             </span>
                                         </div>
                                     </div>
                                     <img class="img-responsive loading-chart lazy"
                                         data-src="https://static.topcv.vn/v4/image/welcome/section-header/loading-chart.svg"
                                         style="display: none;">
                                     <div class="box-chart" style="display: block;">
                                         <div style="height: 220px">
                                             <canvas id="myChartJobOpportunityGrowthDashboard"
                                                 style="display: block; box-sizing: border-box; height: 220px; width: 352px;"
                                                 height="183" width="293"></canvas>
                                             <div
                                                 style="opacity: 0; pointer-events: none; position: absolute; transform: translate(-50%, 0px); transition: all 0.3s ease 0s; left: 630.849px; top: 1867.18px;">
                                                 <div class="chartjs-tooltip-caret"
                                                     style="width: 0px; height: 0px; border-bottom: 5px solid rgb(33, 47, 63); border-right: 5px solid transparent; border-left: 5px solid transparent; margin: 0px auto;">
                                                 </div>
                                                 <table
                                                     style="margin: 0px; background: rgb(33, 47, 63); border-radius: 4px; color: white; padding: 8px; display: block;">
                                                     <thead style="margin-bottom: 3px; display: block;">
                                                         <tr style="border-width: 0px;">
                                                             <td
                                                                 style="border-width: 0px; font-weight: 400; font-size: 12px;">
                                                                 15/05/2024</td>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr style="background-color: inherit; border-width: 0px;">
                                                             <td
                                                                 style="border-width: 0px; font-weight: bold; font-size: 15px;">
                                                                 46.625 việc làm</td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="item-chart">
                                     <div class="header">
                                         <div class="title">
                                             <div class="icon">
                                                 <i class="fa-solid fa-arrow-trend-up"></i>
                                             </div>
                                             <span class="caption">
                                                 Nhu cầu tuyển dụng theo
                                             </span>
                                         </div>
                                         <div class="box-select">
                                             <select name="demand-job-select" id="demand-job-select-dashboard"
                                                 class="form-control select2 select2-hidden-accessible" tabindex="-1"
                                                 aria-hidden="true">
                                                 <option value="2">
                                                     Ngành nghề
                                                 </option>
                                                 <option value="4">
                                                     Mức lương
                                                 </option>
                                             </select><span class="select2 select2-container select2-container--default"
                                                 dir="ltr" style="width: 115px;"><span class="selection"><span
                                                         class="select2-selection select2-selection--single"
                                                         role="combobox" aria-haspopup="true" aria-expanded="false"
                                                         tabindex="0"
                                                         aria-labelledby="select2-demand-job-select-dashboard-container"><span
                                                             class="select2-selection__rendered"
                                                             id="select2-demand-job-select-dashboard-container"
                                                             title="Ngành nghề">Ngành nghề
                                                         </span><span class="select2-selection__arrow"
                                                             role="presentation"><b
                                                                 role="presentation"></b></span></span></span><span
                                                     class="dropdown-wrapper" aria-hidden="true"></span></span>
                                         </div>
                                     </div>
                                     <img class="img-responsive loading-chart lazy"
                                         data-src="https://static.topcv.vn/v4/image/welcome/section-header/loading-chart.svg"
                                         style="display: none;">
                                     <div class="box-chart" style="display: block;">
                                         <div style="height: 170px">
                                             <canvas id="myChartDemandJobDashboard"
                                                 style="display: block; box-sizing: border-box; height: 170px; width: 352px;"
                                                 height="141" width="293"></canvas>
                                             <div
                                                 style="opacity: 0; pointer-events: none; position: absolute; transform: translate(-50%, 0px); transition: all 0.3s ease 0s; left: 1286.8px; top: 1911.61px;">
                                                 <div class="chartjs-tooltip-caret"
                                                     style="width: 0px; height: 0px; border-bottom: 5px solid rgb(33, 47, 63); border-right: 5px solid transparent; border-left: 5px solid transparent; margin: 0px auto;">
                                                 </div>
                                                 <table
                                                     style="margin: 0px; background: rgb(33, 47, 63); border-radius: 4px; color: white; padding: 8px; display: block;">
                                                     <thead style="margin-bottom: 3px; display: block;">
                                                         <tr style="border-width: 0px;">
                                                             <td
                                                                 style="border-width: 0px; font-weight: 400; font-size: 12px;">
                                                                 Tư vấn</td>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr style="background-color: inherit; border-width: 0px;">
                                                             <td
                                                                 style="border-width: 0px; font-weight: bold; font-size: 15px;">
                                                                 4.388 việc làm</td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         <div id="htmlLegendDemandJobDashboard">
                                             <div class="item">
                                                 <div class="color" style="background: rgb(17, 215, 105);"></div>
                                                 <div class="text">Kinh doanh / Bán hàng</div>
                                             </div>
                                             <div class="item">
                                                 <div class="color" style="background: rgb(48, 138, 255);"></div>
                                                 <div class="text">Marketing / Truyền thông / Quảng cáo</div>
                                             </div>
                                             <div class="item">
                                                 <div class="color" style="background: rgb(218, 131, 0);"></div>
                                                 <div class="text">Dịch vụ khách hàng</div>
                                             </div>
                                             <div class="item">
                                                 <div class="color" style="background: rgb(28, 255, 241);"></div>
                                                 <div class="text">Hành chính / Văn phòng</div>
                                             </div>
                                             <div class="item">
                                                 <div class="color" style="background: rgb(255, 231, 0);"></div>
                                                 <div class="text">Tư vấn</div>
                                             </div>
                                             <div style="clear: both;"></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
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
         <div class="ovf-x-hidden">
             <section id="flash-badge-banner" class="lazy entered" data-lazy-function="initBoxFlashBadge"
                 data-ll-status="entered">
                 <div class="container">
                     <div class="block-content">
                         <div class="block-left">
                             <h2 class="banner-title">Huy Hiệu Tia Sét</h2>
                             <div class="banner-subtitle">Ghi nhận sự tương tác thường xuyên của Nhà tuyển dụng với CV
                                 ứng viên</div>
                             <div id="numberFlashJobs" class="number-flash-jobs" style="opacity: 1;">
                                 <span class="value">3.621</span>
                                 <span>tin đăng được NTD tương tác thường xuyên trong 24 giờ qua</span>
                             </div>
                             <div id="boxCountdownUpdate" class="box-countdown-update" style="opacity: 1;">
                                 <div class="box-countdown-update-title">
                                     Tự động cập nhật sau
                                 </div>
                                 <div id="boxCountdownTimer" class="box-countdown-clock">
                                     <div class="box-countdown-value hour">
                                         <span class="value">09</span>
                                         <span class="unit">Giờ</span>
                                     </div>
                                     <div class="dot-divider"></div>
                                     <div class="box-countdown-value minute">
                                         <span class="value">53</span>
                                         <span class="unit">Phút</span>
                                     </div>
                                     <div class="dot-divider"></div>
                                     <div class="box-countdown-value second">
                                         <span class="value">19</span>
                                         <span class="unit">Giây</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="block-job">
                             <div id="pushTopIcon" style="display: block; opacity: 0.112252;">
                                 <img class="lazy entered loaded"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/box-flash-badge/push-top-icon.png"
                                     data-ll-status="loaded"
                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/box-flash-badge/push-top-icon.png">
                             </div>
                             <div id="sliderNewFlashJobPublish" style="opacity: 1;">
                                 <div class="job-item  active" data-index="item-23" data-id="1360671"
                                     style="transform: scale(1); opacity: 1;">
                                     <a class="job-item__logo" target="_blank"
                                         href="https://www.topcv.vn/viec-lam/nhan-vien-idea-creator-seller-nganh-pod-full-time/1360671.html?ta_source=FlashSection_LinkDetail">
                                         <img
                                             src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/ThxcEjZuDXdCqaUSP54zelCH9lhB20a0_1639625577____186d6913beb54e2198abe3ac60ec19b4.png">
                                     </a>
                                     <div class="tag-job-flash" data-toggle="tooltip-flash-job" data-trigger="manual"
                                         data-html="true" data-job-id="1360671"
                                         data-template="<div data-job-id=1360671 class=&quot;flash-job-tag-tooltip tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>"
                                         title="" data-placement="top" data-container="body"
                                         data-original-title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/tim-viec-lam-moi-nhat?flash_job=1'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>">
                                         <img src="https://www.topcv.vn/v4/image/job-list/icon-flash.webp"
                                             alt="">
                                     </div>
                                     <div>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-idea-creator-seller-nganh-pod-full-time/1360671.html?ta_source=FlashSection_LinkDetail"
                                             data-toggle="tooltip" title=""
                                             data-original-title="Nhân Viên Idea Creator/Seller (Ngành POD) Full Time">
                                             <p class="job-item__title">Nhân Viên Idea Creator/Seller (Ngành POD) Full
                                                 Time</p>
                                         </a>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-tm-dv-quoc-te-hoang-thinh-phat/59028.html"
                                             data-toggle="tooltip" title=""
                                             data-original-title="CÔNG TY TNHH TM &amp; DV QUỐC TẾ HOÀNG THỊNH PHÁT">
                                             <p class="job-item__company">CÔNG TY TNHH TM &amp; DV QUỐC TẾ HOÀNG THỊNH
                                                 PHÁT</p>
                                         </a>
                                         <p class="job-item__location" data-toggle="tooltip" title=""
                                             data-original-title="Hà Nội">Hà Nội</p>
                                     </div>
                                 </div>
                                 <div class="job-item  active" data-index="item-24" data-id="1353754"
                                     style="transform: scale(1); opacity: 1;">
                                     <a class="job-item__logo" target="_blank"
                                         href="https://www.topcv.vn/viec-lam/nhan-vien-ban-hang-tu-van-tai-showroom-thu-nhap-hap-dan-8-15-trieu-thang-chi-tuyen-nu/1353754.html?ta_source=FlashSection_LinkDetail">
                                         <img
                                             src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/jpHGWGqDayKERLDnZur2Xgs9EknmYTzo_1696060477____74a18cc670fd1c804fd5cf02b64a88dd.jpg">
                                     </a>
                                     <div class="tag-job-flash" data-toggle="tooltip-flash-job" data-trigger="manual"
                                         data-html="true" data-job-id="1353754"
                                         data-template="<div data-job-id=1353754 class=&quot;flash-job-tag-tooltip tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>"
                                         title="" data-placement="top" data-container="body"
                                         data-original-title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/tim-viec-lam-moi-nhat?flash_job=1'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>">
                                         <img src="https://www.topcv.vn/v4/image/job-list/icon-flash.webp"
                                             alt="">
                                     </div>
                                     <div>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/nhan-vien-ban-hang-tu-van-tai-showroom-thu-nhap-hap-dan-8-15-trieu-thang-chi-tuyen-nu/1353754.html?ta_source=FlashSection_LinkDetail"
                                             data-toggle="tooltip" title=""
                                             data-original-title="Nhân Viên Bán Hàng / Tư Vấn , Tại Showroom  - ( Thu Nhập Hấp Dẫn 8-15 Triệu/Tháng - Chỉ Tuyển Nữ )">
                                             <p class="job-item__title">Nhân Viên Bán Hàng / Tư Vấn , Tại Showroom - (
                                                 Thu Nhập Hấp Dẫn 8-15 Triệu/Tháng - Chỉ Tuyển Nữ )</p>
                                         </a>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/showroom-the-little-kitchen/154487.html"
                                             data-toggle="tooltip" title=""
                                             data-original-title="Showroom The Little Kitchen">
                                             <p class="job-item__company">Showroom The Little Kitchen</p>
                                         </a>
                                         <p class="job-item__location" data-toggle="tooltip" title=""
                                             data-original-title="Hà Nội">Hà Nội</p>
                                     </div>
                                 </div>
                                 <div class="job-item  active" data-index="item-25" data-id="1363687"
                                     style="transform: scale(1); opacity: 1;">
                                     <a class="job-item__logo" target="_blank"
                                         href="https://www.topcv.vn/viec-lam/ky-su-in-3d-tai-ha-noi-muc-luong-tu-10-15-trieu/1363687.html?ta_source=FlashSection_LinkDetail">
                                         <img
                                             src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/cong-ty-co-phan-3dp-viet-nam-eb1d39e5666ede9a71cb69a243109a2e-666664827c7f0.jpg">
                                     </a>
                                     <div class="tag-job-flash" data-toggle="tooltip-flash-job" data-trigger="manual"
                                         data-html="true" data-job-id="1363687"
                                         data-template="<div data-job-id=1363687 class=&quot;flash-job-tag-tooltip tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>"
                                         title="" data-placement="top" data-container="body"
                                         data-original-title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/tim-viec-lam-moi-nhat?flash_job=1'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>">
                                         <img src="https://www.topcv.vn/v4/image/job-list/icon-flash.webp"
                                             alt="">
                                     </div>
                                     <div>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/ky-su-in-3d-tai-ha-noi-muc-luong-tu-10-15-trieu/1363687.html?ta_source=FlashSection_LinkDetail"
                                             data-toggle="tooltip" title=""
                                             data-original-title="Kỹ Sư In 3D Tại Hà Nội (Mức Lương Từ 10 - 15 Triệu)">
                                             <p class="job-item__title">Kỹ Sư In 3D Tại Hà Nội (Mức Lương Từ 10 - 15
                                                 Triệu)</p>
                                         </a>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-3dp-viet-nam/36129.html"
                                             data-toggle="tooltip" title=""
                                             data-original-title="Công ty Cổ phần 3DP Việt Nam">
                                             <p class="job-item__company">Công ty Cổ phần 3DP Việt Nam</p>
                                         </a>
                                         <p class="job-item__location" data-toggle="tooltip" title=""
                                             data-original-title="Hà Nội">Hà Nội</p>
                                     </div>
                                 </div>
                                 <div class="job-item  active" data-index="item-26" data-id="1354320"
                                     style="transform: scale(1); opacity: 1;">
                                     <a class="job-item__logo" target="_blank"
                                         href="https://www.topcv.vn/viec-lam/quan-ly-kinh-doanh-bao-hiem-luong-tu-20tr-thuong-tro-cap-huan-luyen-40tr-2-thang-dau-tien-dao-tao/1354320.html?ta_source=FlashSection_LinkDetail">
                                         <img
                                             src="https://cdn-new.topcv.vn/unsafe/200x/https://static.topcv.vn/company_logos/BnjJlenq3UG7NJR8j8VHdMEG3RW4GHi1_1717068334____d92751270eb6ca5f6bf4231060fc1369.jpg">
                                     </a>
                                     <div class="tag-job-flash" data-toggle="tooltip-flash-job" data-trigger="manual"
                                         data-html="true" data-job-id="1354320"
                                         data-template="<div data-job-id=1354320 class=&quot;flash-job-tag-tooltip tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>"
                                         title="" data-placement="top" data-container="body"
                                         data-original-title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/tim-viec-lam-moi-nhat?flash_job=1'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>">
                                         <img src="https://www.topcv.vn/v4/image/job-list/icon-flash.webp"
                                             alt="">
                                     </div>
                                     <div>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/viec-lam/quan-ly-kinh-doanh-bao-hiem-luong-tu-20tr-thuong-tro-cap-huan-luyen-40tr-2-thang-dau-tien-dao-tao/1354320.html?ta_source=FlashSection_LinkDetail"
                                             data-toggle="tooltip" title=""
                                             data-original-title="Quản Lý Kinh Doanh Bảo Hiểm (Lương Từ 20tr + Thưởng) Trợ Cấp Huấn Luyện: 40tr/2 Tháng Đầu Tiên Đào Tạo">
                                             <p class="job-item__title">Quản Lý Kinh Doanh Bảo Hiểm (Lương Từ 20tr +
                                                 Thưởng) Trợ Cấp Huấn Luyện: 40tr/2 Tháng Đầu Tiên Đào Tạo</p>
                                         </a>
                                         <a class="job-item__link" target="_blank"
                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-bao-hiem-nhan-tho-sun-life-viet-nam-nt/179234.html"
                                             data-toggle="tooltip" title=""
                                             data-original-title="CÔNG TY TNHH BẢO HIỂM NHÂN THỌ SUN LIFE VIỆT NAM (NT)">
                                             <p class="job-item__company">CÔNG TY TNHH BẢO HIỂM NHÂN THỌ SUN LIFE VIỆT
                                                 NAM (NT)</p>
                                         </a>
                                         <p class="job-item__location" data-toggle="tooltip" title=""
                                             data-original-title="Hồ Chí Minh">Hồ Chí Minh</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="block-intro">
                             <div class="block-intro-image">
                                 <img class="lazy entered loaded" draggable="false"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/box-flash-badge/flash-badge-intro.png"
                                     alt="" srcset="" data-ll-status="loaded"
                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/box-flash-badge/flash-badge-intro.png">
                             </div>
                             <div class="block-intro-flashjob-list">
                                 <div class="title">Danh sách tin đăng đạt<br>Huy hiệu Tia sét</div>
                                 <a href="https://www.topcv.vn/huy-hieu-tia-set" class="btn-watchnow">
                                     Xem Ngay<span><i class="fa-regular fa-arrow-right"></i></span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
         </div>
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
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-kinh-doanh-ban-hang-c10001"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/kinh-doanh-ban-hang.png?v=2"
                                                             alt="Kinh doanh / Bán hàng" class="lazy entered loaded"
                                                             data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/kinh-doanh-ban-hang.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-kinh-doanh-ban-hang-c10001"
                                                         title="Kinh doanh / Bán hàng" target="_blank">Kinh doanh /
                                                         Bán
                                                         hàng</a></h3>
                                                 <p class="top-category__caption">13.854 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-it-phan-mem-c10026" target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/it-phan-mem.png?v=2"
                                                             alt="IT phần mềm" class="lazy entered loaded"
                                                             data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/it-phan-mem.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-it-phan-mem-c10026" title="IT phần mềm"
                                                         target="_blank">IT phần mềm</a></h3>
                                                 <p class="top-category__caption">3.698 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hanh-chinh-van-phong-c10023"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/hanh-chinh-van-phong.png?v=2"
                                                             alt="Hành chính / Văn phòng" class="lazy entered loaded"
                                                             data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/hanh-chinh-van-phong.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-hanh-chinh-van-phong-c10023"
                                                         title="Hành chính / Văn phòng" target="_blank">Hành chính /
                                                         Văn
                                                         phòng</a></h3>
                                                 <p class="top-category__caption">4.556 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-giao-duc-dao-tao-c10017"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/giao-duc-dao-tao.png?v=2"
                                                             alt="Giáo dục / Đào tạo" class="lazy entered loaded"
                                                             data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/giao-duc-dao-tao.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-giao-duc-dao-tao-c10017"
                                                         title="Giáo dục / Đào tạo" target="_blank">Giáo dục / Đào
                                                         tạo</a></h3>
                                                 <p class="top-category__caption">3.511 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a href="/tim-viec-lam-tu-van-c10045"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/tu-van.png?v=2"
                                                             alt="Tư vấn" class="lazy entered loaded"
                                                             data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/tu-van.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a href="/tim-viec-lam-tu-van-c10045"
                                                         title="Tư vấn" target="_blank">Tư vấn</a></h3>
                                                 <p class="top-category__caption">4.388 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-marketing-truyen-thong-quang-cao-c10029"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/marketing-truyen-thong-quang-cao.png?v=2"
                                                             alt="Marketing / Truyền thông / Quảng cáo"
                                                             class="lazy entered loaded" data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/marketing-truyen-thong-quang-cao.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-marketing-truyen-thong-quang-cao-c10029"
                                                         title="Marketing / Truyền thông / Quảng cáo"
                                                         target="_blank">Marketing / Truyền thông / Quảng cáo</a></h3>
                                                 <p class="top-category__caption">7.374 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-van-tai-kho-van-c10047"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/van-tai-kho-van.png?v=2"
                                                             alt="Vận tải / Kho vận" class="lazy entered loaded"
                                                             data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/van-tai-kho-van.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-van-tai-kho-van-c10047"
                                                         title="Vận tải / Kho vận" target="_blank">Vận tải / Kho
                                                         vận</a>
                                                 </h3>
                                                 <p class="top-category__caption">1.313 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-ke-toan-kiem-toan-c10028"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/ke-toan-kiem-toan.png?v=2"
                                                             alt="Kế toán / Kiểm toán" class="lazy entered loaded"
                                                             data-ll-status="loaded"
                                                             src="../vieclamso1/v4/image/welcome/top-categories/ke-toan-kiem-toan.png?v=2"></a>
                                                 </div>
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-ke-toan-kiem-toan-c10028"
                                                         title="Kế toán / Kiểm toán" target="_blank">Kế toán / Kiểm
                                                         toán</a></h3>
                                                 <p class="top-category__caption">3.686 việc làm</p>
                                             </div>
                                         </div>
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
                                                         href="/tim-viec-lam-thu-ky-tro-ly-c10129"
                                                         title="Thư ký / Trợ lý" target="_blank">Thư ký / Trợ lý</a>
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
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-thoi-trang-c10042" title="Thời trang"
                                                         target="_blank">Thời trang</a></h3>
                                                 <p class="top-category__caption">995 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-thiet-ke-do-hoa-c10039"
                                                         target="_blank"><img
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
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-xay-dung-c10050" target="_blank"><img
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
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-y-te-duoc-c10051" target="_blank"><img
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
                                                         href="/tim-viec-lam-bien-phien-dich-c10003"
                                                         target="_blank"><img
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
                                                         href="/tim-viec-lam-nganh-nghe-khac-c11000"
                                                         target="_blank"><img
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
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-logistics-c10048" target="_blank"><img
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
                                                         href="/tim-viec-lam-xuat-nhap-khau-c10049"
                                                         title="Xuất nhập khẩu" target="_blank">Xuất nhập khẩu</a>
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
                                                         href="/tim-viec-lam-hoach-dinh-du-an-c10019"
                                                         target="_blank"><img
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
                                                         href="/tim-viec-lam-tai-chinh-dau-tu-c10127"
                                                         target="_blank"><img
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
                                                         href="/tim-viec-lam-cong-nghe-o-to-c10052"
                                                         title="Công nghệ Ô tô" target="_blank">Công nghệ Ô tô</a>
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
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-kien-truc-c10120" target="_blank"><img
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
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-san-xuat-c10126" target="_blank"><img
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
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-spa-lam-dep-c10130" title="Spa / Làm đẹp"
                                                         target="_blank">Spa / Làm đẹp</a></h3>
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
                                                         href="/tim-viec-lam-hang-tieu-dung-c10117"
                                                         title="Hàng tiêu dùng" target="_blank">Hàng tiêu dùng</a>
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
                                                         href="/tim-viec-lam-det-may-da-giay-c10013"
                                                         target="_blank"><img
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
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-hang-hai-c10021" target="_blank"><img
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
                                                         href="/tim-viec-lam-an-toan-lao-dong-c10101"
                                                         target="_blank"><img
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
                                                         href="/tim-viec-lam-hoa-hoc-sinh-hoc-c10018"
                                                         target="_blank"><img
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
                                                         href="/tim-viec-lam-bao-tri-sua-chua-c10104"
                                                         target="_blank"><img
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
                                                         href="/tim-viec-lam-ban-le-ban-si-c10103"
                                                         title="Bán lẻ / bán sỉ" target="_blank">Bán lẻ / bán sỉ</a>
                                                 </h3>
                                                 <p class="top-category__caption">2.164 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-bao-hiem-c10006" target="_blank"><img
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
                                                         href="/tim-viec-lam-dau-khi-hoa-chat-c10012"
                                                         target="_blank"><img
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
                                                 <h3 class="top-category__name"><a
                                                         href="/tim-viec-lam-hang-khong-c10022" title="Hàng không"
                                                         target="_blank">Hàng không</a></h3>
                                                 <p class="top-category__caption">80 việc làm</p>
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="top-category--item">
                                                 <div class="top-category__image"><a
                                                         href="/tim-viec-lam-ngo-phi-chinh-phu-phi-loi-nhuan-c10132"
                                                         target="_blank"><img
                                                             data-src="../vieclamso1/v4/image/welcome/top-categories/ngo-phi-chinh-phu-phi-loi-nhuan.png?v=2"
                                                             alt="NGO / Phi chính phủ / Phi lợi nhuận"
                                                             class="lazy"></a>
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
                         <div class="owl-nav disabled"><button type="button" role="presentation"
                                 class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button"
                                 role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
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
                                     <a class="btn btn-success btn-growth" href="profile.html">
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
                                     <a class="btn btn-success btn-growth" href="mau-cv.html">
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
                     <div class="col-sm-12 self-growth__item">
                         <h2 class="self-growth__title">Thấu hiểu bản thân - Nâng tầm giá trị</h2>
                         <div class="self-growth__content">
                             <div class="self-growth__content--item">
                                 <div class="content">
                                     <h3>
                                         Trắc nghiệm tính cách MBTI
                                     </h3>
                                     <p>
                                         Kết quả trắc nghiệm MBTI chỉ ra cách bạn nhận thức thế giới xung quanh và ra
                                         quyết định
                                         trong cuộc sống, từ đó, giúp bạn có thêm thông tin để lựa chọn nghề nghiệp chính
                                         xác
                                         hơn.
                                     </p>
                                     <a class="btn btn-success btn-growth" href="trac-nghiem-tinh-cach-mbti.html"
                                         target="_blank">
                                         Khám phá ngay
                                         <i class="fa-light fa-arrow-right"></i>
                                     </a>
                                 </div>
                                 <div class="box-image">
                                     <img class="lazy"
                                         data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/sel-growth/mbti-desktop.png"
                                         alt="arnh">
                                 </div>
                             </div>
                             <div class="self-growth__content--item">
                                 <div class="content">
                                     <h3>
                                         Trắc nghiệm đa trí thông minh MI
                                     </h3>
                                     <p>
                                         Trả lời cho câu hỏi “Bạn có trí thông minh nổi trội trong lĩnh vực nào?”, từ đó
                                         bạn có
                                         thể hiểu bản thân mình hơn và đưa ra các quyết định nghề nghiệp phù hợp.
                                     </p>
                                     <a class="btn btn-success btn-growth"
                                         href="trac-nghiem-da-tri-thong-minh-multiple-intelligences-test.html"
                                         target="_blank">
                                         Khám phá ngay
                                         <i class="fa-light fa-arrow-right"></i>
                                     </a>
                                 </div>
                                 <div class="box-image">
                                     <img class="lazy"
                                         data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/sel-growth/mi-desktop.png"
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
                         <a class="item" href="tinh-luong-gross-net.html" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/gross-net.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>Tính lương GROSS - NET</h3>
                                 <span>
                                     Khám phá ngay
                                     <i class="fa-solid fa-arrow-right"></i>
                                 </span>
                             </div>
                         </a>
                         <a class="item" href="tinh-lai-kep.html" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/lai-suat-kep.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>Tính lãi suất kép</h3>
                                 <span>
                                     Khám phá ngay
                                     <i class="fa-solid fa-arrow-right"></i>
                                 </span>
                             </div>
                         </a>
                         <a class="item" href="tinh-thue-thu-nhap-ca-nhan.html" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/thu-nhap-ca-nhan.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>Tính thuế thu nhập cá nhân</h3>
                                 <span>
                                     Khám phá ngay
                                     <i class="fa-solid fa-arrow-right"></i>
                                 </span>
                             </div>
                         </a>
                     </div>
                     <div class="content__session">
                         <a class="item" href="cong-cu-tinh-muc-huong-bao-hiem-that-nghiep.html" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/bao-hiem-that-nghiep.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>Tính Bảo hiểm thất nghiệp</h3>
                                 <span>
                                     Khám phá ngay
                                     <i class="fa-solid fa-arrow-right"></i>
                                 </span>
                             </div>
                         </a>
                         <a class="item" href="lap-ke-hoach-tiet-kiem.html" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/ke-hoach-tiet-kiem.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>Lập kế hoạch tiết kiệm</h3>
                                 <span>
                                     Khám phá ngay
                                     <i class="fa-solid fa-arrow-right"></i>
                                 </span>
                             </div>
                         </a>
                         <a class="item" href="tinh-bao-hiem-xa-hoi-mot-lan.html" target="_blank">
                             <div class="icon">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/superior-tool/bao-hiem-xa-hoi-mot-lan.png"
                                     alt>
                             </div>
                             <div class="title">
                                 <h3>Tính bảo hiểm xã hội một lần</h3>
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
                     <div class="box-award-item">
                         <img data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/award/award_01.png"
                             class="img-responsive lazy" title="Top 10 doanh nghiệp ICT Việt Nam 2022"
                             alt="Top 10 doanh nghiệp ICT Việt Nam 2022" />
                         <div>
                             <a class="name_award"
                                 href="https://cafef.vn/topcv-duoc-vinh-danh-tai-top-10-doanh-nghiep-cntt-viet-nam-2022-20220920090048025.chn"
                                 target="_blank">Top 10 doanh nghiệp ICT Việt Nam 2022</a>
                             <a class="read_more"
                                 href="https://cafef.vn/topcv-duoc-vinh-danh-tai-top-10-doanh-nghiep-cntt-viet-nam-2022-20220920090048025.chn"
                                 target="_blank">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                         </div>
                     </div>
                     <div class="box-award-item">
                         <img data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/award/award_02.png"
                             class="img-responsive lazy"
                             title="TopCV được vinh danh trong Top 10 doanh nghiệp công nghệ thông tin Việt Nam 2021"
                             alt="TopCV được vinh danh trong Top 10 doanh nghiệp công nghệ thông tin Việt Nam 2021" />
                         <div>
                             <a class="name_award"
                                 href="https://cafebiz.vn/topcv-duoc-vinh-danh-trong-top-10-doanh-nghiep-cong-nghe-thong-tin-viet-nam-2021-20211028151113789.chn"
                                 target="_blank">TopCV được vinh danh trong Top 10 doanh nghiệp công nghệ thông tin
                                 Việt
                                 Nam 2021</a>
                             <a class="read_more"
                                 href="https://cafebiz.vn/topcv-duoc-vinh-danh-trong-top-10-doanh-nghiep-cong-nghe-thong-tin-viet-nam-2021-20211028151113789.chn"
                                 target="_blank">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                         </div>
                     </div>
                     <div class="box-award-item">
                         <img data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/award/award_03.png"
                             class="img-responsive lazy" title="Giải thưởng Sao Khuê 2022"
                             alt="Giải thưởng Sao Khuê 2022" />
                         <div>
                             <a class="name_award"
                                 href="https://blog.topcv.vn/nen-tang-quan-ly-cham-cong-online-happy-time-cua-topcv-duoc-vinh-danh-tai-sao-khue-2022/"
                                 target="_blank">Giải thưởng Sao Khuê 2022</a>
                             <a class="read_more"
                                 href="https://blog.topcv.vn/nen-tang-quan-ly-cham-cong-online-happy-time-cua-topcv-duoc-vinh-danh-tai-sao-khue-2022/"
                                 target="_blank">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                         </div>
                     </div>
                     <div class="box-award-item">
                         <img data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/award/award_04.png"
                             class="img-responsive lazy" title="Sản phẩm Công nghệ số Make in Viet Nam 2022"
                             alt="Sản phẩm Công nghệ số Make in Viet Nam 2022" />
                         <div>
                             <a class="name_award"
                                 href="https://vietnamnet.vn/topcv-viet-nam-nhan-bo-doi-giai-thuong-san-pham-cong-nghe-so-make-in-viet-nam-i5010442.html"
                                 target="_blank">Sản phẩm Công nghệ số Make in Viet Nam 2022</a>
                             <a class="read_more"
                                 href="https://vietnamnet.vn/topcv-viet-nam-nhan-bo-doi-giai-thuong-san-pham-cong-nghe-so-make-in-viet-nam-i5010442.html"
                                 target="_blank">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                         </div>
                     </div>
                     <div class="box-award-item">
                         <img data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/award/award_05.png"
                             class="img-responsive lazy" title="Top 15 Google for Startups Accelerator: Southeast Asia"
                             alt="Top 15 Google for Startups Accelerator: Southeast Asia" />
                         <div>
                             <a class="name_award"
                                 href="https://www.blog.google/around-the-globe/google-asia/support-southeast-asian-startups/"
                                 target="_blank">Top 15 Google for Startups Accelerator: Southeast Asia</a>
                             <a class="read_more"
                                 href="https://www.blog.google/around-the-globe/google-asia/support-southeast-asian-startups/"
                                 target="_blank">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <section id="mobile-app-intro">
             <div class="container">
                 <div class="section-left">
                     <h2 class="title">Kiến tạo sự nghiệp của riêng bạn với ứng dụng TopCV </h2>
                     <h3>“Tất cả trong một”</h3>
                     <p>Trải nghiệm tạo CV, tìm việc, ứng tuyển và hơn thế nữa - chỉ với một ứng dụng duy nhất. Bắt đầu
                         ngay hôm nay!</p>
                     <div class="box-qr-download">
                         <h3>Tải ứng dụng ngay</h3>
                         <div class="box-imgs">
                             <div class="box-img-qr">
                                 <img class="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/mobile-app/qrcode_black.png"
                                     alt>
                             </div>
                             <div class="box-img-download-app">
                                 <a href="https://itunes.apple.com/us/app/topcv-tạo-cv-tìm-việc-làm/id1455928592?ls=1&amp;mt=8"
                                     class="box-img-download-appstore">
                                     <img class="lazy"
                                         data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/mobile-app/appstore_black.png"
                                         alt>
                                 </a>
                                 <a href="https://play.google.com/store/apps/details?id=com.topcv"
                                     class="box-img-download-chplay">
                                     <img class="lazy"
                                         data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/mobile-app/googleplay_black.png"
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
                                         class="number" data-number="540000">0</span>+</div>
                                 <div class="box-impressive-numbers__item--title">Nhà tuyển dụng uy tín</div>
                                 <div class="box-impressive-numbers__item--description">Các nhà tuyển dụng đến từ tất
                                     cả
                                     các ngành nghề và được xác thực bởi TopCV</div>
                             </span>
                         </div>
                         <div class="box-impressive-numbers__item">
                             <span class="box-impressive-numbers__item--wrapper">
                                 <div class="box-impressive-numbers__item--number box-impressive-number-text"><span
                                         class="number" data-number="200000">0</span>+</div>
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
                                         class="number" data-number="2000000">0</span>+</div>
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
                                         class="number" data-number="1200000">0</span>+</div>
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
                     <div class="topcv-product-item">
                         <h3 class="topcv-product-title">
                             TopCV
                         </h3>
                         <div class="topcv-product-content">
                             Nền tảng công nghệ tuyển dụng thông minh TopCV.vn
                         </div>
                         <a class="topcv-product-viewmore" target="_blank" href="index.html"><span>Tìm hiểu
                                 thêm</span><i class="fa-solid fa-arrow-right"></i></a>
                         <div class="topcv-product-cover">
                             <img class="lazy"
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/ecosystem/topcv.png"
                                 alt srcset>
                         </div>
                     </div>
                     <div class="topcv-product-item happytime">
                         <h3 class="topcv-product-title">
                             HappyTime
                         </h3>
                         <div class="topcv-product-content">
                             Nền tảng quản lý và gia tăng trải nghiệm nhân viên HappyTime.vn
                         </div>
                         <a class="topcv-product-viewmore" target="_blank" href="https://happytime.vn/"><span>Tìm
                                 hiểu
                                 thêm</span><i class="fa-solid fa-arrow-right"></i></a>
                         <div class="topcv-product-cover">
                             <img class="lazy"
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/ecosystem/happytime.png"
                                 alt srcset>
                         </div>
                     </div>
                     <div class="topcv-product-item testcenter">
                         <h3 class="topcv-product-title">
                             TestCenter
                         </h3>
                         <div class="topcv-product-content">
                             Nền tảng đánh giá năng lực nhân viên TestCenter.vn
                         </div>
                         <a class="topcv-product-viewmore" target="_blank" href="https://testcenter.vn/"><span>Tìm
                                 hiểu
                                 thêm</span><i class="fa-solid fa-arrow-right"></i></a>
                         <div class="topcv-product-cover">
                             <img class="lazy"
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/ecosystem/testcenter.png"
                                 alt srcset>
                         </div>
                     </div>
                     <div class="topcv-product-item shiring">
                         <h3 class="topcv-product-title">
                             SHiring
                         </h3>
                         <div class="topcv-product-content">
                             Giải pháp quản trị tuyển dụng hiệu suất cao SHiring.ai
                         </div>
                         <a class="topcv-product-viewmore" target="_blank" href="https://shiring.ai/"><span>Tìm
                                 hiểu
                                 thêm</span><i class="fa-solid fa-arrow-right"></i></a>
                         <div class="topcv-product-cover">
                             <img class="lazy"
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/ecosystem/shiring.png"
                                 alt srcset>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <section id="newspapers-talk-about-topcv">
             <div class="container">
                 <h2>Báo chí nói về TopCV</h2>
                 <div class="box-image">
                     <div class="box-image-item">
                         <a target="_blank"
                             href="https://vietnambiz.vn/topcv-va-thuocsi-la-2-startup-viet-duoc-google-ho-tro-tang-toc-khoi-nghiep-20200807110033455.htm"><img
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/logo_bao_chi_01.png"
                                 class="img-responsive lazy" title="Vietnambiz bài viết về TopCV"
                                 alt="Vietnambiz bai viet ve TopCV" /></a>
                     </div>
                     <div class="box-image-item">
                         <a target="_blank"
                             href="https://cafebiz.vn/topcv-nhan-cu-dup-giai-thuong-sao-khue-2021-202104271838343.chn"><img
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/logo_bao_chi_02.png"
                                 class="img-responsive lazy" title="Cafebiz bài viết về TopCV"
                                 alt="Cafebiz bai viet ve TopCV" /></a>
                     </div>
                     <div class="box-image-item">
                         <a target="_blank"
                             href="https://baodautu.vn/goi-von-trieu-do-topcv-tap-trung-phat-trien-cong-nghe-gia-tang-hieu-qua-tuyen-dung-d147798.html"><img
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/logo_bao_chi_03.png"
                                 class="img-responsive lazy" title="Dau tu Online bai viet ve TopCV" /></a>
                     </div>
                     <div class="box-image-item">
                         <a target="_blank"
                             href="https://genk.vn/topcv-va-no-luc-thay-doi-thi-truong-tuyen-dung-viet-nam-20170328123950793.chn"><img
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/logo_bao_chi_04.png"
                                 class="img-responsive lazy" title="GenK bài viết về TopCV"
                                 alt="GenK bai viet ve TopCV" /></a>
                     </div>
                     <div class="box-image-item">
                         <a target="_blank"
                             href="https://kenh14.vn/tao-cv-ha-guc-nha-tuyen-dung-chi-trong-mot-buoc-20210301205913038.chn"><img
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/logo_bao_chi_05.png"
                                 class="img-responsive lazy" title="Kenh14 bài viết về TopCV"
                                 alt="Kenh14 bai viet ve TopCV" /></a>
                     </div>
                     <div class="box-image-item">
                         <a target="_blank"
                             href="https://theleader.vn/chien-luoc-thu-hut-nhan-tai-thoi-ky-vang-hau-covid-19-1593484912759.htm"><img
                                 data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/welcome/logo_bao_chi_06.png"
                                 class="img-responsive lazy" title="The Leader bài viết về TopCV"
                                 alt="The Leader bai viet ve TopCV" /></a>
                     </div>
                 </div>
             </div>
         </section>
     </div>
 @endsection
