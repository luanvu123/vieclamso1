<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vieclamso1 - Giải Pháp Tuyển Dụng Chuyên Nghiệp</title>
    <style>
        :root {
            --primary-color: #1a2e44;
            --secondary-color: #4CAF50;
            --text-light: #ffffff;
            --text-dark: #333333;
            --background-light: #f8f9fa;
            --border-color: #e6e6e6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            line-height: 1.6;
            color: var(--text-dark);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .logo span {
            color: var(--secondary-color);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: var(--secondary-color);
        }

        .nav-button {
            background-color: var(--secondary-color);
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .mobile-menu-btn {
            display: none;
            cursor: pointer;
            font-size: 24px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(to right, var(--primary-color) 50%, var(--background-light) 50%);
            padding: 120px 0 80px;
            margin-top: 60px;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .hero-content {
            color: var(--text-light);
            padding-right: 40px;
        }

        .hero-content h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-content p {
            margin-bottom: 30px;
            font-size: 16px;
        }

        .cta-button {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 28px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #3d8b40;
        }

        .hero-image {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .hero-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background-color: var(--background-light);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 32px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .section-header p {
            max-width: 700px;
            margin: 0 auto;
            color: #666;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .feature-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 40px;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        /* How It Works Section */
        .how-it-works {
            padding: 80px 0;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--secondary-color);
            color: white;
            font-size: 24px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            font-weight: bold;
        }

        .step h3 {
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .step:not(:last-child):after {
            content: "";
            position: absolute;
            top: 30px;
            right: -15%;
            width: 30%;
            height: 2px;
            background-color: var(--secondary-color);
        }

        /* Testimonials Section */
        .testimonials {
            padding: 80px 0;
            background-color: var(--background-light);
        }

        .testimonials-slider {
            margin-top: 50px;
            position: relative;
            overflow: hidden;
        }

        .testimonial-slides {
            display: flex;
            transition: transform 0.5s ease;
        }

        .testimonial {
            min-width: 100%;
            padding: 0 15px;
        }

        .testimonial-content {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .testimonial-content p {
            font-style: italic;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .client {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .client-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .client-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .client-info h4 {
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .slider-controls {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .slider-arrow {
            background-color: var(--secondary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin: 0 10px;
            transition: background-color 0.3s;
        }

        .slider-arrow:hover {
            background-color: #3d8b40;
        }

        /* CTA Section */
        .cta {
            padding: 80px 0;
            background-color: var(--primary-color);
            color: var(--text-light);
            text-align: center;
        }

        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .cta p {
            max-width: 700px;
            margin: 0 auto 30px;
            font-size: 18px;
        }

        /* Footer */
        footer {
            background-color: #0f1c2a;
            color: var(--text-light);
            padding: 50px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-logo span {
            color: var(--secondary-color);
        }

        .footer-about p {
            margin-bottom: 20px;
            color: #bbb;
        }

        .social-links {
            display: flex;
        }

        .social-links a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .social-links a:hover {
            background-color: var(--secondary-color);
        }

        .footer-links h3 {
            font-size: 18px;
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links ul li {
            margin-bottom: 10px;
        }

        .footer-links ul li a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links ul li a:hover {
            color: var(--secondary-color);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            text-align: center;
            color: #bbb;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
            }

            .hero-content {
                padding-right: 0;
                text-align: center;
                margin-bottom: 40px;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .steps {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }

            .step:nth-child(2):after {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            nav {
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: var(--primary-color);
                padding: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                display: none;
            }

            nav.active {
                display: block;
            }

            nav ul {
                flex-direction: column;
            }

            nav ul li {
                margin: 10px 0;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .step:after {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
           <a href="{{ route('/') }}" class="logo">
                <img src="{{ asset('storage/' . $info->logo) }}" style="width: 200px; height: auto;" alt="Logo ">
            </a>
            <nav id="main-nav">
                <ul>
                    <li><a href="#home">Trang chủ</a></li>
                    <li><a href="#features">Dịch vụ</a></li>
                    <li><a href="#how-it-works">Cách thức</a></li>
                    <li><a href="#testimonials">Khách hàng</a></li>
                    <li><a href="#contact" class="nav-button">Liên hệ</a></li>
                </ul>
            </nav>
            <div class="mobile-menu-btn" id="mobile-menu">☰</div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container hero-container">
            <div class="hero-content">
                <h1>Cách chúng tôi phát triển những sản phẩm công nghệ đầy cảm hứng</h1>
                <p>Thấu hiểu những bài toán khó trong thị trường tuyển dụng, đội ngũ Kỹ sư công nghệ của Vieclamso1 Việt Nam đang đưa ra các sản phẩm/dịch vụ được phát triển, thử nghiệm, đánh giá & không ngừng tối ưu trong nhiều năm để có thể thực hiện việc kết nối được "đúng người" tới "đúng việc".</p>
                <a href="#contact" class="cta-button">Tìm hiểu thêm</a>
            </div>
            <div class="hero-image">
                <img src="{{asset('images/doingu.jpg')}}" alt="Đội ngũ Vieclamso1 đang làm việc">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Giải pháp tuyển dụng toàn diện</h2>
                <p>Chúng tôi cung cấp các công cụ và dịch vụ hiện đại giúp doanh nghiệp tối ưu hóa quy trình tuyển dụng</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h3>Tìm kiếm ứng viên thông minh</h3>
                    <p>Hệ thống AI tìm kiếm và đề xuất ứng viên phù hợp với yêu cầu của doanh nghiệp, tiết kiệm thời gian và nguồn lực.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Quản lý tuyển dụng hiệu quả</h3>
                    <p>Nền tảng quản lý toàn diện giúp theo dõi tiến trình tuyển dụng, đánh giá ứng viên và tổ chức phỏng vấn.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Xây dựng thương hiệu tuyển dụng</h3>
                    <p>Giải pháp marketing tuyển dụng giúp doanh nghiệp xây dựng thương hiệu nhà tuyển dụng hấp dẫn.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Tuyển dụng đa kênh</h3>
                    <p>Đăng tin tuyển dụng trên nhiều nền tảng khác nhau từ một giao diện duy nhất, tiếp cận đa dạng ứng viên tiềm năng.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📝</div>
                    <h3>Kiểm tra năng lực trực tuyến</h3>
                    <p>Bộ công cụ đánh giá và kiểm tra kỹ năng ứng viên trực tuyến, giúp sàng lọc ứng viên hiệu quả.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📈</div>
                    <h3>Phân tích dữ liệu tuyển dụng</h3>
                    <p>Báo cáo và phân tích chi tiết về hiệu quả tuyển dụng, giúp doanh nghiệp điều chỉnh chiến lược phù hợp.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header">
                <h2>Quy trình làm việc đơn giản</h2>
                <p>Chỉ với 4 bước đơn giản, doanh nghiệp có thể tiếp cận hàng nghìn ứng viên tiềm năng</p>
            </div>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Đăng ký tài khoản</h3>
                    <p>Tạo tài khoản doanh nghiệp và hoàn thiện thông tin công ty</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Đăng tin tuyển dụng</h3>
                    <p>Tạo tin tuyển dụng với thông tin chi tiết về vị trí và yêu cầu</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Quản lý ứng viên</h3>
                    <p>Tiếp nhận hồ sơ và sàng lọc ứng viên trên hệ thống</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Tuyển dụng thành công</h3>
                    <p>Hoàn tất quy trình tuyển dụng và đánh giá hiệu quả</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>Khách hàng nói gì về chúng tôi</h2>
                <p>Những đánh giá từ các doanh nghiệp đã sử dụng dịch vụ của Vieclamso1</p>
            </div>
            <div class="testimonials-slider">
                <div class="testimonial-slides" id="testimonial-slides">
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"Vieclamso1 đã giúp công ty chúng tôi tìm kiếm những ứng viên chất lượng cao trong lĩnh vực IT. Chỉ trong vòng 2 tuần, chúng tôi đã tuyển dụng thành công 5 vị trí khó. Đội ngũ hỗ trợ rất chuyên nghiệp và nhiệt tình."</p>
                            <div class="client">
                                <div class="client-image">
                                    <img src="/api/placeholder/100/100" alt="Khách hàng">
                                </div>
                                <div class="client-info">
                                    <h4>Nguyễn Văn A</h4>
                                    <p>Giám đốc Nhân sự, Công ty ABC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"Nền tảng quản lý tuyển dụng của Vieclamso1 giúp chúng tôi tiết kiệm rất nhiều thời gian và nguồn lực. Các tính năng thông minh giúp sàng lọc ứng viên hiệu quả. Đây là công cụ không thể thiếu cho bộ phận HR của chúng tôi."</p>
                            <div class="client">
                                <div class="client-image">
                                    <img src="/api/placeholder/100/100" alt="Khách hàng">
                                </div>
                                <div class="client-info">
                                    <h4>Trần Thị B</h4>
                                    <p>Trưởng phòng Nhân sự, Công ty XYZ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"Chúng tôi đã thử nhiều nền tảng tuyển dụng khác nhau, nhưng Vieclamso1 là giải pháp toàn diện nhất. Không chỉ giúp đăng tin tuyển dụng mà còn hỗ trợ xây dựng thương hiệu nhà tuyển dụng. Số lượng và chất lượng ứng viên đều rất tốt."</p>
                            <div class="client">
                                <div class="client-image">
                                    <img src="/api/placeholder/100/100" alt="Khách hàng">
                                </div>
                                <div class="client-info">
                                    <h4>Lê Văn C</h4>
                                    <p>CEO, Công ty DEF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-controls">
                    <div class="slider-arrow prev" id="prev-slide">❮</div>
                    <div class="slider-arrow next" id="next-slide">❯</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta" id="contact">
        <div class="container">
            <h2>Hãy bắt đầu ngay hôm nay</h2>
            <p>Đăng ký tài khoản và khám phá các giải pháp tuyển dụng hiệu quả từ Vieclamso1</p>
            <a href="#" class="cta-button">Đăng ký miễn phí</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-about">
                    <a href="{{ route('/') }}" class="logo">
                <img src="{{ asset('storage/' . $info->logo) }}" style="width: 200px; height: auto;" alt="Logo Vieclamso1">
            </a>
                    <p>Vieclamso1 là nền tảng công nghệ hàng đầu Việt Nam cung cấp giải pháp tuyển dụng toàn diện cho doanh nghiệp với hơn 5 triệu ứng viên hoạt động.</p>
                    <div class="social-links">
                        <a href="#"><span>f</span></a>
                        <a href="#"><span>in</span></a>
                        <a href="#"><span>Y</span></a>
                        <a href="#"><span>t</span></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h3>Doanh nghiệp</h3>
                    <ul>
                        <li><a href="#">Đăng tin tuyển dụng</a></li>
                        <li><a href="#">Tìm kiếm hồ sơ</a></li>
                        <li><a href="#">Giải pháp tuyển dụng</a></li>
                        <li><a href="#">Bảng giá dịch vụ</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h3>Về Vieclamso1</h3>
                    <ul>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Đối tác</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h3>Hỗ trợ</h3>
                    <ul>
                        <li><a href="#">Trung tâm trợ giúp</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#">Điều khoản dịch vụ</a></li>
                        <li><a href="#">Quy chế hoạt động</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Vieclamso1. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu');
        const mainNav = document.getElementById('main-nav');

        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                if (mainNav.classList.contains('active')) {
                    mainNav.classList.remove('active');
                }
            });
        });

        // Testimonial Slider
        const slidesContainer = document.getElementById('testimonial-slides');
        const prevBtn = document.getElementById('prev-slide');
        const nextBtn = document.getElementById('next-slide');
        const testimonials = document.querySelectorAll('.testimonial');

        let currentIndex = 0;
        const maxIndex = testimonials.length - 1;

        function updateSlider() {
            slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        prevBtn.addEventListener('click', function() {
            currentIndex = currentIndex > 0 ? currentIndex - 1 : maxIndex;
            updateSlider();
        });

        nextBtn.addEventListener('click', function() {
            currentIndex = currentIndex < maxIndex ? currentIndex + 1 : 0;
            updateSlider();
        });

        // Auto slide
        let slideInterval = setInterval(() => {
            currentIndex = currentIndex < maxIndex ? currentIndex + 1 : 0;
            updateSlider();
        }, 5000);

        // Pause auto slide on hover
        slidesContainer.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });

        slidesContainer.addEventListener('mouseleave', () => {
            slideInterval = setInterval(() => {
                currentIndex = currentIndex < maxIndex ? currentIndex + 1 : 0;
                updateSlider();
            }, 5000);
        });
    </script>
</body>
</html>

