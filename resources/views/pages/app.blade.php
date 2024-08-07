 @extends('layout')
 @section('content')
    <div id="main">
        <div class="app_mobile">
            <header class="header">
                <div class="header-inner container-fluid">
                    <div class="header-left">
                        <h1>CV xịn, việc làm chất</h1>
                        <h2>Ứng tuyển bất cứ nơi đâu!</h2>
                        <h3>Ứng dụng di động TopCV</h3>
                        <div class="list-featured">
                            <div class="box-featured">
                                <div class="box-featured-icon">
                                    <span>
                                        <img src="https://static.topcv.vn/v4/image/welcome/mobile-app/award_icon.svg">
                                    </span>
                                </div>
                                <div class="box-featured-text">
                                    <div class="box-featured-title">Việc làm xứng tầm</div>
                                    <div class="box-featured-desc">Thăng tiến nhanh, công việc hấp dẫn, thu nhập xứng
                                        tầm</div>
                                </div>
                            </div>
                            <div class="box-featured">
                                <div class="box-featured-icon">
                                    <span>
                                        <img src="https://static.topcv.vn/v4/image/welcome/mobile-app/user_icon.svg">
                                    </span>
                                </div>
                                <div class="box-featured-text">
                                    <div class="box-featured-title">Cá nhân hóa trải nghiệm</div>
                                    <div class="box-featured-desc">Sử dụng công nghệ AI dự đoán, cá nhân hoá việc làm
                                    </div>
                                </div>
                            </div>
                            <div class="box-featured">
                                <div class="box-featured-icon">
                                    <span>
                                        <img
                                            src="https://static.topcv.vn/v4/image/welcome/mobile-app/trend_up_icon.svg">
                                    </span>
                                </div>
                                <div class="box-featured-text">
                                    <div class="box-featured-title">Đồng hành cùng bạn trên hành trình sự nghiệp</div>
                                    <div class="box-featured-desc">Tìm kiếm, kết nối, xây dựng thành công</div>
                                </div>
                            </div>
                        </div>
                        <div class="box-qr-download">
                            <h3>Tải ứng dụng ngay</h3>
                            <div class="box-imgs">
                                <div class="box-img-qr">
                                    <img src="{{ asset('storage/' . $info->qr_code_image) }}" alt>
                                </div>
                                <div class="box-img-download-app">
                                    <a href="{{ $info->link_appstore }}"
                                        class="box-img-download-appstore">
                                        <img src="{{ asset('storage/' . $info->image_appstore) }}" alt>
                                    </a>
                                    <a href="{{ $info->link_googleplay }}"
                                        class="box-img-download-chplay">
                                        <img src="{{ asset('storage/' . $info->image_googleplay) }}" alt>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="header-image">
                            <img src="{{asset('static.topcv.vn/v4/image/welcome/mobile-app/mobile.png')}}" alt>
                        </div>
                    </div>
                </div>
            </header>
            <main class="main">
                <section class="section section-featured-list container-fluid">
                    <h2 class="section-title section-title-decorated">Tính năng nổi bật</h2>
                    <div class="section-subtitle">Những tính năng của ứng dụng TopCV giúp ứng viên dễ dàng ứng tuyển,
                        nâng cao
                        trải nghiệm tìm việc trong kỷ nguyên số</div>
                    <div class="featured-list">
                        <div class="featured-item ">
                            <div class="featured-text">
                                <h3 class="featured-title">Chọn đúng việc - Đi đúng hướng</h3>
                                <div class="featured-content">Cá nhân hoá trải nghiệm tìm việc theo nhu cầu ứng viên
                                    gồm các tính năng Gợi ý việc làm phù hợp, Tìm kiếm việc làm, Việc làm gần bạn, Công
                                    ty nổi bật và Top Connect - Chat trực tiếp với Nhà tuyển dụng. </div>
                            </div>
                            <div class="featured-img">
                                <img src="{{asset('v4/image/welcome/mobile-app/select_truejob.png')}}"
                                    alt="Chọn đúng việc - Đi đúng hướng">
                            </div>
                        </div>
                        <div class="featured-item  featured-item-reverse ">
                            <div class="featured-text">
                                <h3 class="featured-title">Cùng chia sẻ - Cùng vươn xa</h3>
                                <div class="featured-content">Các bài viết chia sẻ kinh nghiệm thành công trong môi
                                    trường công sở, kinh nghiệm tìm việc, phát triển kỹ năng và viết CV được chọn lọc
                                    theo mức độ kinh nghiệm và số năm đi làm của ứng viên.</div>
                            </div>
                            <div class="featured-img">
                                <img src="v4/image/welcome/mobile-app/share_together.png"
                                    alt="Cùng chia sẻ - Cùng vươn xa">
                            </div>
                        </div>
                        <div class="featured-item ">
                            <div class="featured-text">
                                <h3 class="featured-title">TopCV Podcast</h3>
                                <div class="featured-content">Các Podcast với nội dung chiều sâu, hữu ích cho người đi
                                    làm được chia sẻ bởi chuyên gia và TopCV về các chủ đề tìm việc, phỏng vấn, ứng dụng
                                    công nghệ trong công việc.</div>
                            </div>
                            <div class="featured-img">
                                <img src="v4/image/welcome/mobile-app/topcv_podcast.png" alt="TopCV Podcast">
                            </div>
                        </div>
                        <div class="featured-item  featured-item-reverse ">
                            <div class="featured-text">
                                <h3 class="featured-title">Thêm công cụ - Thêm vượt trội</h3>
                                <div class="featured-content">Các công cụ hữu ích cho người đi làm bao gồm:
                                    <ul>
                                        <li>Công cụ chuyển đổi lương Gross - Net</li>
                                        <li>Công cụ tính thuế thu nhập cá nhân </li>
                                        <li>Công cụ tính Bảo hiểm thất nghiệp </li>
                                        <li>Công cụ tính BHXH 1 lần.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-img">
                                <img src="v4/image/welcome/mobile-app/tools.png" alt="Thêm công cụ - Thêm vượt trội">
                            </div>
                        </div>
                        <div class="featured-item ">
                            <div class="featured-text">
                                <h3 class="featured-title">Định vị bản thân</h3>
                                <div class="featured-content">Các công cụ trắc nghiệm tính cách giúp cho ứng viên hiểu
                                    hơn về bản thân, bao gồm:
                                    <ul>
                                        <li>Trắc nghiệm tính cách MBTI.</li>
                                        <li>Trắc nghiệm đa trí thông minh MI.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-img">
                                <img src="v4/image/welcome/mobile-app/mbti_mi.png" alt="Định vị bản thân">
                            </div>
                        </div>
                        <div class="featured-item  featured-item-reverse ">
                            <div class="featured-text">
                                <h3 class="featured-title">Tạo CV &amp; Profile</h3>
                                <div class="featured-content">Công cụ tạo CV online số 1 Việt Nam đã có phiên bản ứng
                                    dụng điện thoại. <br>
                                    Tạo CV, Cover Letter và Profile ngay trên điện thoại. <br>
                                    Thuận tiện, nhanh chóng, chuyên nghiệp và khác biệt. <br>
                                    Tăng 80% tỉ lệ ứng tuyển thành công.</div>
                            </div>
                            <div class="featured-img">
                                <img src="v4/image/welcome/mobile-app/cv_profile.png" alt="Tạo CV &amp; Profile">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section section-impressive-numbers">
                    <div class="container-fluid">
                        <h2 class="section-title section-title-decorated section-title-decorated-white">Con số ấn tượng
                        </h2>
                        <div class="section-subtitle">Những con số nổi bật mà ứng dụng TopCV đã đạt được</div>
                        <div class="box-impressive-numbers-list">
                            <div class="box-left">
                                <div class="box-impressive-numbers-item">
                                    <div class="box-impressive-number-text">540.000+</div>
                                    <div class="box-impressive-number-title">Nhà tuyển dụng uy tín</div>
                                    <div class="box-impressive-number-content">Các nhà tuyển dụng đến từ tất cả các
                                        ngành nghề và được xác thực bởi TopCV</div>
                                </div>
                                <div class="box-impressive-numbers-item">
                                    <div class="box-impressive-number-text">2.000.000+</div>
                                    <div class="box-impressive-number-title">Việc làm đã được kết nối</div>
                                    <div class="box-impressive-number-content">TopCV đồng hành và kết nối hàng nghìn
                                        ứng viên với những cơ hội việc làm hấp dẫn từ các doanh nghiệp uy tín.</div>
                                </div>
                            </div>
                            <div class="box-center">
                                <div class="box-center-img">
                                    <img src="../static.topcv.vn/v4/image/welcome/mobile-app/topcv_global.png"
                                        alt="Con số ấn tượng">
                                </div>
                            </div>
                            <div class="box-right">
                                <div class="box-impressive-numbers-item">
                                    <div class="box-impressive-number-text">200.000+</div>
                                    <div class="box-impressive-number-title">Doanh nghiệp hàng đầu</div>
                                    <div class="box-impressive-number-content">TopCV được nhiều doanh nghiệp hàng đầu
                                        tin tưởng và đồng hành, trong đó có các thương hiệu nổi bật như Samsung,
                                        Viettel, Vingroup, FPT, Techcombank,...</div>
                                </div>
                                <div class="box-impressive-numbers-item">
                                    <div class="box-impressive-number-text">1.200.000+</div>
                                    <div class="box-impressive-number-title">Lượt tải ứng dụng</div>
                                    <div class="box-impressive-number-content">Hàng triệu ứng viên sử dụng ứng dụng
                                        TopCV để tìm kiếm việc làm, trong đó có 60% là ứng viên có kinh nghiệm từ 3 năm
                                        trở lên.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section section-build-career">
                    <div class="section-build-career-inner container-fluid">
                        <div class="section-left">
                            <h2>Kiến tạo sự nghiệp của riêng bạn với ứng dụng TopCV </h2>
                            <h3>“Tất cả trong một”</h3>
                            <p>Trải nghiệm tạo CV, tìm việc, ứng tuyển và hơn thế nữa - chỉ với một ứng dụng duy nhất.
                                Bắt đầu ngay hôm nay!</p>
                            <div class="box-qr-download">
                                <h3>Tải ứng dụng ngay</h3>
                                <div class="box-imgs">
                                    <div class="box-img-qr">
                                        <img src="{{ asset('storage/' . $info->qr_code_image) }}" alt>
                                    </div>
                                    <div class="box-img-download-app">
                                        <a href="{{ $info->link_appstore }}"
                                            class="box-img-download-appstore">
                                            <img src="{{ asset('storage/' . $info->image_appstore) }}"
                                                alt>
                                        </a>
                                        <a href="{{ $info->link_googleplay }}"
                                            class="box-img-download-chplay">
                                            <img src="{{ asset('storage/' . $info->image_googleplay) }}"
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
            </main>
        </div>
    </div>
    @endsection
