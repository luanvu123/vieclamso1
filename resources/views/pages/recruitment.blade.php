<script>
  let currentScroll = 0
  window.addEventListener('scroll', function () {
    const scrollPercentage = (document.documentElement.scrollTop + document.body.scrollTop) / (document.documentElement.scrollHeight) * 100;
    if (scrollPercentage >= 50) {
      currentScroll = window.pageYOffset
      showPopup()
    }
  });

  function showPopup() {
    if (!sessionStorage.getItem('hidden_home_popup')) {
      $('#khtt-backdrop').fadeIn(500);
      document.body.style.overflow = 'hidden';
    }
  }

  function hidePopupIcon() {
    $("#khtt-backdrop").fadeOut(500);
    document.body.style.overflow = 'scroll';
    window.scrollTo(0, currentScroll)
    sessionStorage.setItem('hidden_home_popup', true)
  }


  document.getElementById("banner-top").addEventListener("click", function (e) {
    ta('ClickToBannerQuoteTop')
  })
</script>
<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta property="fb:app_id" content="1478418029113221" />
  <meta name="csrf-token" content="9tMEzEyKkPf1mEqyc2WsSK28HqC52gLJAX6Oawmd">

  <meta name="msvalidate.01" content="968C4303D47877E2B0961793E3E4175E" />
  <link rel="preload" as="style" href="../build/assets/app.374c2237.css" />
  <link rel="stylesheet" href="../build/assets/app.374c2237.css" />

  <script>
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return; n = f.fbq = function () {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
      n.queue = []; t = b.createElement(e); t.async = !0;
      t.src = v; s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      '../connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1179818353464615');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1179818353464615&amp;ev=PageView&amp;noscript=1" /></noscript>


  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          '../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5V3NVPX');</script>


  <script>
    window.topcvUser = {
      id: "",
      email: null,
      fullname: null,
    }

    window.header = {
      referer: 'http://tuyendung.topcv.vn/?utm_source=epl-btn&amp;utm_medium=nav-button&amp;utm_campaign=click-tracking'
    }

    window.trackingSource = '';
    if (!window.trackingSource) {
      window.trackingSource = localStorage.getItem('ta_source');
    } else {
      localStorage.setItem('ta_source', window.trackingSource);
    }
  </script>
  <script type="text/javascript">
    let taVersion = '1.0.0';
    (function (w, d, v) {
      w['ta'] = w['ta'] || function () {
        (w['ta'].q = w['ta'].q || []).push([...arguments])
      }
      var po = d.createElement('script');
      po.type = 'text/javascript';
      po.async = true;

      po.src = '../ta.toprework.vn/dist/browser-platform/index9499.js?id=tuyendung_topcv_vn&amp;version=' + v;
      var s = d.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(po, s);
    })(window, document, taVersion);
  </script>
  <script>
    var search = new URLSearchParams(location.search);
    ta('pageview', {
      u_s: search.get('utm_source'),
      u_m: search.get('utm_medium'),
      u_c: search.get('utm_campaign')
    });
  </script>

  <title>Đăng tin tuyển dụng miễn phí – Tìm CV ứng viên trên TopCV</title>
  <meta name="description"
    content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên TopCV." />
  <link rel="icon" type="image/png" href="https://static.topcv.vn/srp/website/favicon.ico?">
  <link rel="canonical" href="index.html" />
  <link rel="publisher" href="https://plus.google.com/u/0/+TopcvVn" />
  <meta property="og:url" content />
  <meta property="og:title" content="Dịch vụ tuyển dụng nhân sự chất lượng cao" />
  <meta property="og:description"
    content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên TopCV." />
  <meta property="og:image" content="https://static.topcv.vn/srp/website/images/thumbnail_home.jpg" />
  <meta property="og:site_name" content="TopCV" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:locale:alternate" content="en_US" />
  <meta name="keywords"
    content="đăng tin tuyển dụng, miễn phí, nhà tuyển dụng, quản lý hồ sơ ứng viên, tìm kiếm hồ sơ ứng viên">
  <meta name="twitter:card" content="Dịch vụ tuyển dụng nhân sự chất lượng cao">
  <meta name="twitter:site" content="TopCV">
  <meta name="twitter:title" content="Dịch vụ tuyển dụng nhân sự chất lượng cao">
  <meta name="twitter:description"
    content="Đăng tin tuyển dụng miễn phí, tìm hồ sơ ứng viên xin việc, đăng tin tuyển dụng 24h miễn phí, đăng tin tuyển dụng việc làm nhanh, hiệu quả tiếp cận 2.000.000+ hồ sơ người tìm việc trên TopCV.">
  <meta property="og:type" content="website" />

  <script> (function (a, b, d, c, e) {
      a[c] = a[c] || [];
      a[c].push({ "atm.start": (new Date).getTime(), event: "atm.js" });
      a = b.getElementsByTagName(d)[0]; b = b.createElement(d); b.async = !0;
      b.src = "//deqik.com/tag/corejs/" + e + ".js"; a.parentNode.insertBefore(b, a)
    })(window, document, "script", "atmDataLayer", "ATMHMAX03KRJ8");</script>

  <script type="text/javascript">
    _linkedin_partner_id = "4459588";
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
  </script>
  <script type="text/javascript">
    (function (l) {
      if (!l) {
        window.lintrk = function (a, b) { window.lintrk.q.push([a, b]) };
        window.lintrk.q = []
      }
      var s = document.getElementsByTagName("script")[0];
      var b = document.createElement("script");
      b.type = "text/javascript"; b.async = true;
      b.src = "../snap.licdn.com/li.lms-analytics/insight.min.js";
      s.parentNode.insertBefore(b, s);
    })(window.lintrk);
  </script>
  <noscript>
    <img height="1" width="1" style="display:none;" alt=""
      src="https://px.ads.linkedin.com/collect/?pid=4459588&amp;fmt=gif" />
  </noscript>

  <script src="code.jquery.com/jquery-2.2.4.js"></script>
  <script src="cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <style>
    .slick-dots {
      display: flex !important;
    }
  </style>
  <style>
    html {
      scroll-behavior: smooth !important;
    }
  </style>
  <style>
    .pd-12 {
      padding: 12px;
    }
  </style>
  <style>
    #mask-form-lead {
      position: fixed;
      z-index: 200;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      display: none;
      top: 0;
      right: 0;
    }

    #modal-form-lead {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 1000px;
      height: 650px;
    }

    #modal-form-lead>.center-form {
      margin-inline: 0;
    }

    #modal-form-lead .icon-top-form-lead {
      display: block !important;
    }

    #modal-form-lead .suggest-post-job {
      display: block;
    }

    #modal-form-lead-success {
      background: #fff;
      width: 600px;
      height: auto;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 20px;
      box-shadow: 0 6px 16px 0 rgba(0, 0, 0, 0.06);
      padding: 40px;
      display: none;
    }

    .form-lead-success-container {
      display: flex;
      justify-content: center;
    }

    .success-msg {
      font-size: 20px;
      font-style: normal;
      font-weight: 700;
      line-height: 28px;
      /* 140% */
      letter-spacing: -0.2px;
      color: #00B14F;
      text-align: center;
      margin-top: 20px;
    }

    .success-des {
      font-size: 16px;
      font-style: normal;
      font-weight: 400;
      line-height: 24px;
      /* 150% */
      letter-spacing: -0.16px;
      color: #303235;
      text-align: center;
      margin-top: 12px;
    }

    #modal-form-lead-success>.icon-top-form-lead {
      display: block;
    }

    .support-footer-form {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 32px;
    }

    .support-footer-form-item {
      width: 47%;
    }

    @media (max-width: 768px) {
      #left-banner-form {
        display: none;
      }

      #modal-form-lead {
        max-width: 90%;
      }

      .right-banner-form .form-lead-container {
        border-radius: 10px;
      }

      .suggest-post-job {
        display: flex !important;
        flex-direction: column;
      }

      #modal-form-lead-success {
        max-width: 90%;
        height: auto;
      }

      .support-footer-form {
        flex-direction: column;
      }

      .support-footer-form-item {
        width: 90%;
        margin-bottom: 15px;
        justify-content: center;
      }

      .form-lead-success-container svg {
        width: 80px;
        height: 80px;
      }
    }
  </style>
  <style>
    #floating-sp-mkt {
      position: fixed;
      right: 10px;
      bottom: 6%;
      display: none;
      z-index: 97;
    }

    #floating-sp-mkt img {
      cursor: pointer;
    }

    #close-img-sp {
      display: flex;
      justify-content: center;
      cursor: pointer;
    }
  </style>
  <style>
    .banner-form {
      background-image: url(images/background-form.png);
      background-size: 100% 100%;
      background-position: center;
      background-repeat: no-repeat;
    }

    .form-banner-title {
      font-size: 28px;
      font-style: normal;
      font-weight: 700;
      line-height: 125%;
      /* 45px */
      letter-spacing: -0.54px;
      color: #FFF;
      text-align: center;
      margin-top: 50px;
    }

    .form-banner-subtitle {
      font-size: 14px;
      font-style: normal;
      font-weight: 400;
      line-height: 22px;
      /* 157.143% */
      letter-spacing: 0.14px;
      color: #FFF;
      text-align: center;
      margin-bottom: 35px;
    }

    @media (max-width: 768px) {
      .banner-form {
        height: fit-content;
      }

      .form-banner-title {
        margin-top: 15px;
        padding-inline: 20px;
      }

      .form-banner-subtitle {
        padding-inline: 20px;
      }
    }
  </style>
  <style>
    .left-banner-form {
      background-image: url("images/banner_form_bg.png");
      height: 100%;
      background-size: 100% 100%;
      background-position: center;
      background-repeat: no-repeat;
      border-bottom-left-radius: 10px;
      border-top-left-radius: 10px;
    }

    .center-banner-form {
      background-image: url("images/banner_form_center.png");
      height: 100%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }

    .center-form {
      margin-inline: 80px;
      border-radius: 10px !important;
      box-shadow: 0 6px 12px 3px rgba(32, 40, 56, 0.05), 0 4px 8px 2px rgba(32, 40, 56, 0.03);
      height: 73%;
      margin-bottom: 30px;
    }

    .right-banner-form .form-lead-container {
      border-bottom-right-radius: 10px;
      border-top-right-radius: 10px;
    }

    .left-banner-form-mobile {
      display: none;
    }

    @media (max-width: 768px) {
      .center-form {
        flex-direction: column;
        margin-inline: 20px;
      }

      .left-banner-form-mobile {
        display: block;
        width: 100%;
        height: 350px;
        background-image: url("images/banner_form_bg.png");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }

      .right-banner-form {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        background: #fff;
      }
    }
  </style>
  <style>
    .left-banner-form {
      background-image: url("images/banner_form_bg.png");
      height: 100%;
      background-size: 100% 100%;
      background-position: center;
      background-repeat: no-repeat;
      border-bottom-left-radius: 10px;
      border-top-left-radius: 10px;
    }

    .center-banner-form {
      background-image: url("images/banner_form_center.png");
      height: 100%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }

    .center-form {
      margin-inline: 80px;
      border-radius: 10px !important;
      box-shadow: 0 6px 12px 3px rgba(32, 40, 56, 0.05), 0 4px 8px 2px rgba(32, 40, 56, 0.03);
      height: 73%;
      margin-bottom: 30px;
    }

    .right-banner-form .form-lead-container {
      border-bottom-right-radius: 10px;
      border-top-right-radius: 10px;
    }

    .left-banner-form-mobile {
      display: none;
    }

    @media (max-width: 768px) {
      .center-form {
        flex-direction: column;
        margin-inline: 20px;
      }

      .left-banner-form-mobile {
        display: block;
        width: 100%;
        height: 350px;
        background-image: url("images/banner_form_bg.png");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }

      .right-banner-form {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        background: #fff;
      }
    }
  </style>
  <style>
    .form-lead-container {
      background: #fff;
      padding: 40px;
      position: relative;
    }

    .form-lead-scroll {
      overflow-y: auto;
      height: 400px;
      padding-right: 5px;
    }

    .form-lead-title {
      font-size: 24px;
      font-style: normal;
      font-weight: 700;
      line-height: 32px;
      /* 133.333% */
      letter-spacing: -0.24px;
      color: #00B14F;
      margin-bottom: 12px;
    }

    .form-lead-label {
      font-size: 14px;
      font-style: normal;
      font-weight: 600;
      line-height: 22px;
      /* 157.143% */
      letter-spacing: 0.175px;
      color: #5E6368;
      margin-bottom: 4px;
      margin-top: 12px;
    }

    .form-lead-item {
      border-radius: 4px;
      border: 1px solid #D7DEE4;
      background: #FFF;
      padding: 6px 12px;
      display: flex;
      align-items: center;
    }

    .form-lead-item>i {
      color: #A8AFB6;
      margin-right: 12px;
    }

    .form-lead-item>input,
    select {
      width: 100%;
      height: 24px;
    }

    .form-lead-item>textarea {
      width: 100%;
      resize: none;
    }

    .form-lead-item>input:focus-visible,
    select:focus-visible,
    textarea:focus-visible {
      outline: none;
    }

    .form-lead-item:focus-within {
      border: 1px solid #00B14F;
    }

    .place_holder {
      color: #A8AFB6;
    }

    .form-footer-lead {
      margin-top: 10px;
      margin-bottom: 15px;
      color: #fff;
      text-align: center;
    }

    .form-footer-lead>button {
      padding: 10px 40px;
      background: #00B14F;
      border-radius: 3px;
      font-size: 16px;
      font-style: normal;
      font-weight: 600;
      line-height: 24px;
      /* 150% */
      letter-spacing: -0.16px;
    }

    .form-footer-lead>button:hover {
      background: #008b3e;
    }

    .form-footer-lead>button>i {
      margin-right: 8px;
    }

    .icon-top-form-lead {
      position: absolute;
      right: 20px;
      top: 20px;
      display: none;
    }

    .icon-top-form-lead span {
      cursor: pointer;
      background: #F5F8FA;
      padding: 3px 8px;
      border-radius: 999px
    }

    .suggest-post-job {
      text-align: center;
      display: none;
    }

    .suggest-post-job a {
      color: #00B14F;
      text-decoration: underline;
    }

    .other-consulting {
      display: none;
      margin-bottom: 10px;
    }

    .form-lead-msg {
      font-size: 12px;
      font-style: normal;
      font-weight: 400;
      color: #C52E20;
      margin-top: 4px;
    }

    .msg-name,
    .msg-city,
    .msg-email,
    .msg-phone,
    .msg-consulting {}
  </style>
  <style>
    .form-lead-container {
      background: #fff;
      padding: 40px;
      position: relative;
    }

    .form-lead-scroll {
      overflow-y: auto;
      height: 400px;
      padding-right: 5px;
    }

    .form-lead-title {
      font-size: 24px;
      font-style: normal;
      font-weight: 700;
      line-height: 32px;
      /* 133.333% */
      letter-spacing: -0.24px;
      color: #00B14F;
      margin-bottom: 12px;
    }

    .form-lead-label {
      font-size: 14px;
      font-style: normal;
      font-weight: 600;
      line-height: 22px;
      /* 157.143% */
      letter-spacing: 0.175px;
      color: #5E6368;
      margin-bottom: 4px;
      margin-top: 12px;
    }

    .form-lead-item {
      border-radius: 4px;
      border: 1px solid #D7DEE4;
      background: #FFF;
      padding: 6px 12px;
      display: flex;
      align-items: center;
    }

    .form-lead-item>i {
      color: #A8AFB6;
      margin-right: 12px;
    }

    .form-lead-item>input,
    select {
      width: 100%;
      height: 24px;
    }

    .form-lead-item>textarea {
      width: 100%;
      resize: none;
    }

    .form-lead-item>input:focus-visible,
    select:focus-visible,
    textarea:focus-visible {
      outline: none;
    }

    .form-lead-item:focus-within {
      border: 1px solid #00B14F;
    }

    .place_holder {
      color: #A8AFB6;
    }

    .form-footer-lead {
      margin-top: 10px;
      margin-bottom: 15px;
      color: #fff;
      text-align: center;
    }

    .form-footer-lead>button {
      padding: 10px 40px;
      background: #00B14F;
      border-radius: 3px;
      font-size: 16px;
      font-style: normal;
      font-weight: 600;
      line-height: 24px;
      /* 150% */
      letter-spacing: -0.16px;
    }

    .form-footer-lead>button:hover {
      background: #008b3e;
    }

    .form-footer-lead>button>i {
      margin-right: 8px;
    }

    .icon-top-form-lead {
      position: absolute;
      right: 20px;
      top: 20px;
      display: none;
    }

    .icon-top-form-lead span {
      cursor: pointer;
      background: #F5F8FA;
      padding: 3px 8px;
      border-radius: 999px
    }

    .suggest-post-job {
      text-align: center;
      display: none;
    }

    .suggest-post-job a {
      color: #00B14F;
      text-decoration: underline;
    }

    .other-consulting {
      display: none;
      margin-bottom: 10px;
    }

    .form-lead-msg {
      font-size: 12px;
      font-style: normal;
      font-weight: 400;
      color: #C52E20;
      margin-top: 4px;
    }

    .msg-name,
    .msg-city,
    .msg-email,
    .msg-phone,
    .msg-consulting {}
  </style>
  <script>
    var BIZ_DOMAIN_BACKEND = 'https://tuyendung-api.topcv.vn/'
  </script>
  <style>
    #khtt-backdrop {
      position: fixed;
      z-index: 200;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      display: none;
      top: 0;
      right: 0;
    }

    #popup-banner-khtt {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    #btn-close {
      position: absolute;
      right: 5px;
      cursor: pointer;
      z-index: 250;
    }

    .image-icon-banner {
      width: 430px;
    }

    @media (max-width: 450px) {
      .btn-icon-popup-khtt {
        bottom: -8px;
        width: 162px;
      }

      #btn-close {
        right: 0px;
      }

      #popup-banner-khtt {
        width: 350px;
      }
    }

    #slogan-topcv-popup {
      width: 415px;
      height: auto;
      background: #fff;
      border: 1px solid #00B14F;
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.09);
      border-radius: 10px;
      right: 10px;
      bottom: 10%;
      position: fixed;
      z-index: 197;
      opacity: 1;
      display: none;
    }

    .header-slogan {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .btn-close {
      background: #f1f1f1;
      padding: 2px 8px;
      border-radius: 100px;
      color: #a7a7a7;
      cursor: pointer;
    }

    .video-container {
      margin-top: 12px;
    }

    .video-container>iframe {
      width: 100%;
      height: 219px;
      border-radius: 10px;
    }

    .content-slogan {
      display: flex;
      flex-direction: column;
      margin-top: 12px;
      color: #303235;
    }

    .bg-line {
      background: #EEEEEE;
      height: 1px;
      width: 100%;
      margin-top: 15px;
      margin-bottom: 15px;
    }

    .slogan-button {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .slogan-footer {
      display: flex;
      flex-direction: column;
    }

    .container-hidden {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .btn-footer-close {
      color: #303235;
      background: #f5f8fa;
      width: 50%;
      line-height: 1.5;
      border-radius: 0.214rem;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      height: 33px;
      margin-right: 4px;
    }

    .btn-footer-close:hover {
      color: #212529;
      background-color: #d0dae4;
    }

    .btn-footer-go {
      color: #fff;
      background: #00b14f;
      width: 50%;
      line-height: 1.5;
      border-radius: 0.214rem;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      height: 33px;
      margin-left: 4px;
    }

    .label-hidden {
      color: #868d94;
    }

    #slogan-hidden {
      border-color: #868d94;
    }

    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 16px;
      width: 16px;
      border: 1px solid #868d94;
      border-radius: 10%;
    }

    .container-checkbox {
      display: block;
      position: relative;
      padding-left: 25px;
      margin-bottom: 20px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      margin-top: 2px;
    }

    .container-checkbox>input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    .checkmark:after {
      content: '';
      position: absolute;
      display: none;
    }

    .container-checkbox:hover input~.checkmark {
      background-color: #fff;
    }

    .container-checkbox input:checked~.checkmark {
      background-color: #00B14F;
      border: unset;
    }

    .container-checkbox input:checked~.checkmark:after {
      display: block;
    }

    .container-checkbox .checkmark:after {
      left: 6px;
      top: 2px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      -webkit-transform: rotate(38deg);
      -ms-transform: rotate(38deg);
      transform: rotate(38deg);
    }

    .container-hidden:hover .checkmark {
      border-color: #00B14F;
    }

    .container-hidden:hover .label-hidden {
      color: #00B14F;
    }

    .font-weight-bolder {
      font-weight: 600;
    }

    #mask-popup {
      display: none;
    }

    @media only screen and (max-device-width: 640px) {
      #slogan-topcv-popup {
        max-width: 92%;
        bottom: unset;
        top: 0;
        left: 0;
        right: 0;
        margin: 50px auto;
      }

      .video-container>iframe {
        height: 195px;
      }

      #mask-popup {
        display: none;
        width: 100%;
        height: 100%;
        background: #1C2835;
        z-index: 190;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        opacity: 0.6;
        outline: 0;
      }
    }
  </style>
</head>

<body class="min-h-screen font-body bg-[#F4F5F5] pt-[68px] md:pt-[80px] text-color-default font-alexandria">

  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5V3NVPX" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>

  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'GTM-5V3NVPX');
  </script>
  <div id="page-container" class="page-container">
    <div class="min-h-screen">
      <div class="bg-white fixed w-full top-0 right-0 z-[100] md:border-b">
        <div class="w-container">
          <div class="md:flex md:items-center md:h-[80px]">
            <div class="relative h-[68px] md:h-auto flex items-center justify-center md:pr-[30px]">
              <a href="index.html?ref=you" class="business-image">
                <img src="../images/image131.gif" class="max-w-[200px] md:mb-[-10px]" alt="topcv logo">
              </a>
              <div class="md:hidden absolute top-0 right-0">
                <button class="md:hidden h-[68px] w-[68px] flex items-center justify-center" id="mb-menu-btn">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </div>
            </div>
            <div id="mb-menu" class="hidden w-full md:flex">
              <ul class="p-0 m-0 list-none flex flex-col md:flex-row text-sm" id="navbar-menu">
                <li>
                  <a class="text-primary hover:text-primary block pd-12 md:py-5 text-center font-medium"
                    href="index944d.html?ref=you">
                    Giới thiệu
                  </a>
                </li>
                <li>
                  <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                    href="index.html?ref=you#service">
                    Dịch vụ
                  </a>
                </li>
                <li>
                  <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium"
                    href="bang-gia-dich-vu.html?ref=you" target="_blank">
                    Báo giá
                  </a>
                </li>
                <li>
                  <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium" href="help/index.html"
                    target="_blank">Hỗ trợ</a>
                </li>
                <li>
                  <a class="hover:text-primary block pd-12 md:py-5 text-center font-medium" href="bai-viet/index.html"
                    target="_blank">
                    Blog tuyển dụng
                  </a>
                </li>
              </ul>
              <div class="py-[40px] md:flex md:items-center md:justify-end md:py-0 md:!ml-auto">
                <div class="mb-[35px] p-0 flex justify-center md:mb-0 md:mr-[30px]">
                  <div class="ml-1 border border-gray-100">
                    <a href="en944d.html?ref=you">
                      <img style="width: 27px; height: 16px" src="../static.topcv.vn/srp/website/images/flags/uk.jpg"
                        alt="us flag">
                    </a>
                  </div>
                  <div class="ml-1 border border-gray-100">
                    <a href="index.html?ref=you">
                      <img style="width: 27px; height: 16px"
                        src="../static.topcv.vn/srp/website/images/flags/vietnam.png" alt="vi flag">
                    </a>
                  </div>
                  <div class="ml-1 border border-gray-100">
                    <a href="jp944d.html?ref=you">
                      <img style="width: 27px; height: 16px" src="../static.topcv.vn/srp/website/images/flags/japan.png"
                        alt="jp flag">
                    </a>
                  </div>
                </div>
                <div id="login-box" class="flex items-center justify-center">
                  <div class="grid grid-cols-2 gap-[12px]">
                    <a href="{{route('employer.login')}}"
                      class="bg-white border border-primary py-[14px] px-[13px] rounded block  text-primary text-center min-w-[104px]">Đăng
                      nhập</a>
                    <a href="{{route('employer.register')}}"
                      class="bg-primary border border-primary py-[14px] px-[13px] rounded block text-white text-center min-w-[104px]">Đăng
                      ký</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style>
        @media (max-width: 1024px) {
          .px-3 {
            padding-right: 12px !important;
          }
        }

        .custom-header {
          border-radius: 100px;
          border: 1px solid #0DB14B;
          background: linear-gradient(90deg, #213142 0.62%, #0A9C4B 99.38%);
          color: #fff;
          padding: 6px;
          margin-top: 6px;
        }

        .custom-header:hover {
          color: #fff;
        }
      </style>
      <div style="background-image: url(images/introduction/background_header.png)"
        class="bg-center bg-no-repeat bg-cover">
        <div class="w-container flex flex-col justify-center text-center pt-2 md:pt-8 px-4 md:px-0 leading-tight">
          <h1 class="md:text-[48px] text-[14px] font-semibold m-auto">
            Đăng tin tuyển dụng,
          </h1>
          <h1 class="md:text-[48px] text-[14px] font-semibold fw:600 m-auto">
            tìm kiếm ứng viên hiệu quả
          </h1>
          <div style="position: relative; margin-top: 5px">
            <a href="{{route('job-postings.index')}}" target="_blank"
              class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] btn-post-job-free">
              Đăng tin miễn phí
              <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
          </div>
          <div class="flex justify-center">
            <img style="max-width: 80%" src="../images/introduction/header_campaign.png"
              title="Hệ thống đăng tin tuyển dụng miễn phí" alt="He thong dang tin tuyen dung mien phi">
          </div>
        </div>
      </div>
      <div class="bg-[#F4F5F5] py-[40px] md:py-[80px]">
        <div class="w-container flex items-center flex-col px-[20px] md:flex-row md:px-[0]">
          <div class="md:w-[685px] md:w-max[100%]">
            <div class="uppercase text-primary mb-[10px]">
              Big Update
            </div>
            <h2
              class="md:text-[24px] text-[18px] leading-tight border-l-4 border-primary font-simibold mb-[10px] pl-[8px]">
              TopCV Smart Recruitment Platform
            </h2>
            <p class="md:text-[14px] font-light text-color-light">
              Nền tảng công nghệ ứng dụng sâu trí tuệ nhân tạo (AI) và Recruitment
              Marketing, mang
              đến các giải pháp toàn diện giúp doanh nghiệp giải quyết đồng thời các bài toán xoay quanh vấn
              đề tuyển
              dụng, từ việc tạo nguồn CV, sàng lọc hồ sơ ứng viên cho đến đánh giá ứng viên và đo lường hiệu quả.
            </p>
            <div class="text-center md:text-left mt-2">
              <a href="#"
                class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                Tư vấn tuyển dụng miễn phí
                <i class="fa-solid fa-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <div class="md:w-[685px] md:w-max[100%]">
            <img class="mt-4 md:mt-0" src="../images/introduction/bg-big-update.png"
              title="Cập nhật mới của trang đăng tin tuyển dụng miễn phí"
              alt="Cap nhat moi cua trang dang tin tuyen dung mien phi">
          </div>
        </div>
      </div>
      <div class="bg-white py-[40px] md:py-[80px]">
        <div class="w-container px-[20px]">
          <h2 class="text-[30px] font-bold text-center mb-[32px] md:mb-[40px]">
            Công nghệ đăng tin tuyển dụng mới. Tính năng mới. Trải nghiệm mới
          </h2>
          <div class="bg-[#F4F5F5] rounded-[10px] p-[16px] md:flex md:items-center md:flex-row-reverse">
            <div class="md:w-1/2">
              <div class="text-primary uppercase mb-[10px]">
                Ai in recruitment
              </div>
              <h2 class="text-[18px] md:text-[24px] border-l-4 border-primary font-semibold mb-[10px] pl-[8px]">
                Tương lai của tuyển dụng
              </h2>
              <p class="md:text-[14px] font-light text-color-light">
                Toppy AI là &quot;trái tim” của bản cập nhật Smart Recruitment Platform. Toppy AI được phát triển bởi
                đội
                ngũ kỹ sư
                tài năng của TOPCV Việt Nam thông qua việc ứng dụng công nghệ Trí tuệ nhân tạo (AI) và Học máy
                (Machine
                Learning). Toppy AI có khả năng phân tích yêu cầu, thói quen, hành vi của nhà tuyển dụng và
                ứng viên, đồng
                thời khai thác tối đa lượng dữ liệu lớn của TopCV, từ đó đưa ra các phán đoán và đề xuất về những việc
                có thể làm để tuyển dụng hiệu quả hơn, kết nối đúng nhu cầu tuyển dụng của doanh nghiệp với các ứng viên
                phù hợp.
              </p>
              <div class="text-center md:text-left mt-4">
                <a href="#"
                  class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                  Tư vấn tuyển dụng miễn phí
                  <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
              </div>
            </div>
            <div class="md:w-1/2">
              <img src="../images/introduction/new-feed.png" title="Trang web đăng tin tuyển dụng miễn phí"
                alt="Trang web dang tin tuyen dung mien phi">
            </div>
          </div>
        </div>
      </div>
      <section id="feature" class="w-container py-[40px] md:py-[80px]">
        <div class="text-center px-[20px]">
          <div class="text-primary uppercase">
            CORE FUNCTIONS OF TOPCV SMART RECRUITMENT PLATFORM
          </div>
          <h2 class="text-[30px] md:text-[30px] mt-2 font-bold">
            Các tính năng chỉ có trên TopCV Smart Recruitment Platform
          </h2>
          <p class="md:text-[14px] mt-4 font-light text-color-light">
            Với sức mạnh công nghệ, TopCV Smart Recruitment Platform kế thừa những hiệu
            quả hiện
            tại và mang đến trải nghiệm một cách hoàn toàn khác biệt, giúp doanh nghiệp tuyển dụng hiệu quả trong thời
            đại số.
          </p>
        </div>
        <div class="px-[20px] mt-[20px] md:mt-[42px]">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px] md:gap-[40px]">
            <div class="bg-white relative rounded-[12px] p-[24px]">
              <h3 class="text-[20px] mb-[16px] font-bold text-center">
                Đề xuất bởi Toppy AI
              </h3>
              <div class="mb-[16px] text-center">
                <img class="m-auto" src="../images/feature/suggestion.png" title="Hệ thống đánh giá ứng viên"
                  alt="He thong danh gia ung vien">
              </div>
              <p class="font-light md:text-[14px] text-center text-color-light">
                Toppy AI sẽ tiến hành phân tích dữ liệu doanh nghiệp, nhu cầu tuyển dụng và
                hành vi tìm
                việc của ứng viên để đề xuất những hoạt động, giải pháp tuyển dụng giúp nhà tuyển dụng gia tăng hiệu quả
                tuyển dụng.
              </p>
              <div class="text-center mt-3">
                <a href="help/dinh-nghia/de-xuat-boi-toppy-ai/index.html" target="_blank" style="color: #00B14F">Tìm
                  hiểu thêm</a>
              </div>
            </div>
            <div class="bg-white relative rounded-[12px] p-[24px]">
              <h3 class="text-[20px] mb-[16px] font-bold text-center">
                Chiến dịch Tuyển dụng
              </h3>
              <div class="mb-[16px] text-center">
                <img class="m-auto" src="../images/feature/header_campaign.png" title="Thực hiện chiến dịch tuyển dụng"
                  alt="Thuc hien chien dich tuyen dung">
              </div>
              <p class="font-light md:text-[14px] text-center text-color-light">
                Giúp doanh nghiệp hoàn thiện được cấu trúc cơ bản của quá trình tuyển dụng và quản lý được các nguồn
                mang lại hiệu quả cho hoạt động tuyển dụng đó. Từ đó, nhà tuyển dụng có thể tối ưu các phương pháp tìm
                nguồn ứng viên và tuyển dụng hiệu quả hơn.
              </p>
              <div class="text-center mt-3">
                <a href="help/dinh-nghia/chien-dich-tuyen-dung/index.html" target="_blank" style="color: #00B14F">Tìm
                  hiểu thêm</a>
              </div>
            </div>
            <div class="bg-white relative rounded-[12px] p-[24px]">
              <h3 class="text-[20px] mb-[16px] font-bold text-center">
                Tính năng quản lý CV
              </h3>
              <div class="mb-[16px] text-center">
                <img class="m-auto" src="../images/feature/cvs-management.png" title="Hệ thống đánh giá ứng viên"
                  alt="He thong danh gia ung vien">
              </div>
              <p class="font-light md:text-[14px] text-center text-color-light">
                Giúp nhà tuyển dụng quản lý kho CV ứng viên của mình một cách đầy đủ, có tính hệ thống và
                không bị mất
                mát dữ liệu.
              </p>
              <div class="text-center mt-3">
                <a href="help/huong-dan-su-dung/quan-ly-ho-so-ung-vien/index.html" target="_blank"
                  style="color: #00B14F">Tìm hiểu thêm</a>
              </div>
            </div>
            <div class="bg-white relative rounded-[12px] p-[24px]">
              <h3 class="text-[20px] mb-[16px] font-bold text-center">
                Hệ thống báo cáo tuyển dụng
              </h3>
              <div class="mb-[16px] text-center">
                <img class="m-auto" src="../images/feature/report-system.png" title="Hệ thống đánh giá ứng viên"
                  alt="He thong danh gia ung vien">
              </div>
              <p class="font-light md:text-[14px] text-center text-color-light">
                Giúp nhà tuyển dụng biết được chính xác số lượng CV ứng viên qua từng vòng từ vòng nhận CV đến đi
                làm. Đồng
                thời cũng đo lường chi phí tuyển dụng theo giá trị thực tế mà doanh nghiệp đã chi trả để tìm kiếm ứng
                viên.
              </p>
              <div class="text-center mt-3">
                <a href="help/dinh-nghia/bao-cao-tuyen-dung/index.html" target="_blank" style="color: #00B14F">Tìm hiểu
                  thêm</a>
              </div>
            </div>
            <div class="bg-white relative rounded-[12px] p-[24px]">
              <h3 class="text-[20px] mb-[16px] font-bold text-center">
                Hệ thống đánh giá ứng viên
              </h3>
              <div class="mb-[16px] text-center">
                <img class="m-auto" src="../images/feature/testcenter-on-phone.png" title="Hệ thống đánh giá ứng viên"
                  alt="He thong danh gia ung vien">
              </div>
              <p class="font-light md:text-[14px] text-center text-color-light">
                Với nền tảng TestCenter.vn, TopCV Smart Recruitment Platform giúp nhà tuyển dụng đánh giá ứng viên toàn
                diện và khách quan thông qua bài test online, từ đó tối ưu tỷ lệ chuyển đổi, tìm kiếm ứng viên tài năng
                từ nguồn CV ứng viên thu được từ Chiến dịch tuyển dụng.
              </p>
              <div class="text-center mt-3">
                <a href="help/huong-dan-su-dung/danh-gia-cv-ung-vien/index.html" target="_blank"
                  style="color: #00B14F">Tìm hiểu thêm</a>
              </div>
            </div>
            <div class="bg-white relative rounded-[12px] p-[24px]">
              <h3 class="text-[20px] mb-[16px] font-bold text-center">
                Gia tăng hiệu quả tuyển dụng thông qua hình thức trả phí
              </h3>
              <div class="mb-[16px] text-center">
                <img class="m-auto" src="../images/feature/service.png" title="Đăng tin tuyển dụng trả phí hiệu quả"
                  alt="Dang tin tuyen dung tra phi hieu qua">
              </div>
              <p class="font-light md:text-[14px] text-center text-color-light">
                Nhà tuyển dụng hoàn toàn chủ động trong việc lựa chọn và kích hoạt dịch vụ phù hợp để gia tăng số lượng
                CV ứng viên ứng tuyển và tìm kiếm ứng viên tài năng. Với các phương pháp tìm nguồn ứng viên thông minh,
                hiệu quả, nhà tuyển dụng sẽ dễ dàng tìm kiếm ứng viên cho Chiến dịch tuyển dụng của mình khi sử dụng
                TopCV Smart Recruitment Platform.
              </p>
              <div class="text-center mt-3">
                <a href="help/dinh-nghia/dich-vu-tuyen-dung/index.html" target="_blank" style="color: #00B14F">Tìm hiểu
                  thêm</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="service">
        <div class="bg-white">
          <div class="w-container w-container-1 flex text-left px-4 md:px-0">
            <div class>
              <div class="pb-7 md:pb-24">
                <div class="w-container text-center pt-10 md:pt-20 px-4 md:px-0">
                  <div class="text-primary uppercase">
                    RECRUITMENT SERVICES
                  </div>
                  <h2 class="text-[24px] md:text-[30px] mt-2 font-bold">
                    Dịch vụ đăng tin tuyển dụng
                  </h2>
                </div>
                <div class="md:pb-6 md:flex-row flex flex-col pt-3 pl-3 md:ml-0">
                  <div class="md:w-5/12">
                    <img class="m-auto w-11/12 md:w-auto" src="../images/service/Macbook%20Pro%20Flying%20Mockup.png"
                      title="Đăng tin tuyển dụng miễn phí" alt="Dang tin tuyen dung mien phi" class>
                  </div>
                  <div class="md:w-7/12 md:pl-6 table">
                    <div class="table-cell align-middle">
                      <div class="w-11/12 md:w-full">
                        <h3 class="text-[14px] md:text-[28px] mb-5 font-semibold">
                          Đăng tin tuyển dụng miễn phí
                        </h3>
                        <ul class="md:text-[14px] font-light text-color-light">
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Đăng tin tuyển dụng miễn phí và không giới hạn số lượng.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Đăng tin tuyển dụng dễ dàng, không quá 1 phút.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Tiếp cận nguồn CV ứng viên khổng lồ, tìm kiếm ứng viên từ kho dữ liệu hơn 5 triệu hồ
                              sơ.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Dễ dàng kiểm duyệt và đăng tin trong 24h.</span>
                          </li>
                        </ul>
                        <div class="text-center md:text-left">
                          <a href="#"
                            class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                            Tư vấn tuyển dụng miễn phí
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="md:flex-row flex flex-col-reverse pt-3 pl-3 md:ml-0 md:mt-6">
                  <div class="md:w-7/12 table">
                    <div class="table-cell align-middle">
                      <div class="md:ml-10">
                        <h3 class="text-[14px] md:text-[28px] mb-5 font-semibold">
                          Top Jobs &amp; Standard Plus - Đăng tin tuyển dụng
                        </h3>
                        <ul class="md:text-[14px] font-light text-color-light">
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Tăng lượt tiếp cận người tìm việc thêm 300% khi đăng tuyển.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Tin tuyển dụng hiển thị ở những vị trí nổi bật.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Đẩy tin tuyển dụng lên vị trí đầu trong kết quả tìm kiếm việc làm trên trang web đăng
                              tin tuyển dụng.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Tự động gợi ý tin tuyển dụng với ứng viên phù hợp, giúp tuyển dụng hiệu quả
                              hơn.</span>
                          </li>
                        </ul>
                        <div class="text-center md:text-left">
                          <a href="#"
                            class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                            Tư vấn tuyển dụng miễn phí
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="md:w-5/12">
                    <img class="w-11/12 md:w-auto" src="../images/service/1.png" title="Quảng cáo tin tuyển dụng hiệu quả"
                      alt="Quang cao tin tuyen dung hieu qua" class>
                  </div>
                </div>
                <div class="md:flex-row flex flex-col md:pl-3 md:ml-0 pt-3 md:mt-6">
                  <div class="md:w-5/12">
                    <img class="m-auto w-11/12 md:w-auto" src="../images/service/001.png"
                      title="Mở CV ứng viên bằng credit" alt="Mo CV ung vien bang credit" class>
                  </div>
                  <div class="flex-1 table">
                    <div class="table-cell align-middle">
                      <div class="m-auto w-11/12 md:w-10/12">
                        <h3 class="text-[14px] md:text-[28px] mb-5 font-semibold">
                          Top Credit - Nạp Credit mở CV ứng viên
                        </h3>
                        <ul class="md:text-[14px] font-light text-color-light">
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Chủ động tiếp cận 6.900.000+ CV ứng viên với hơn 50% ứng viên có kinh nghiệm từ 3 năm
                              trở lên.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Tùy chỉnh các tiêu chí tìm kiếm ứng viên tài năng theo mong muốn: ngành nghề, vị trí
                              tuyển dung, địa điểm làm việc, tính cách ứng viên.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Ứng dụng AI/Machine Learning giúp tìm kiếm ứng viên chính xác, nhanh chóng với mức độ
                              phù hợp tăng theo số CV tìm kiếm.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Duy nhất tại TopCV có chính sách bảo hành dịch vụ với CV sai thông tin.</span>
                          </li>
                        </ul>
                        <div class="text-center md:text-left">
                          <a href="#"
                            class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                            Tư vấn tuyển dụng miễn phí
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="md:flex-row flex flex-col-reverse pl-3 md:ml-0 pt-3 md:mt-6">
                  <div class="md:w-7/12 table">
                    <div class="table-cell align-middle">
                      <div class="md:ml-10">
                        <h3 class="text-[14px] md:text-[28px] mb-5 font-semibold">
                          CV đề xuất
                        </h3>
                        <ul class="md:text-[14px] font-light text-color-light">
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Đa dạng hóa nguồn CV ứng viên mà không cần mất công tìm kiếm ứng viên.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Tiết kiệm thời gian tuyển dụng nhân sự.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Tỷ lệ ứng viên phù hợp lên đến 40%.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Dịch vụ có cam kết CV đang tìm kiếm công việc.</span>
                          </li>
                        </ul>
                        <div class="text-center md:text-left">
                          <a href="#"
                            class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                            Tư vấn tuyển dụng miễn phí
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="md:w-5/12">
                    <img class="m-auto w-11/12 md:w-auto" src="../images/service/ThanhMinh.png"
                      title="CV Scout tối ưu chất lượng CV bằng AI" alt="CV Scout toi uu chat luong CV bang AI" class>
                  </div>
                </div>
                <div class="md:pb-6 md:flex-row flex flex-col pl-3 md:ml-0 pt-3 md:mt-6">
                  <div class="md:w-5/12">
                    <img class="m-auto w-11/12 md:w-auto" src="../images/service/iMac%20Pro%20Front%20View%20Mockup.png"
                      title="Hỗ trợ truyền thông thương hiệu" alt="Ho tro truyen thong thuong hieu" class>
                  </div>
                  <div class="md:w-7/12 table">
                    <div class="table-cell align-middle">
                      <div class="md:ml-10">
                        <h3 class="text-[14px] md:text-[28px] mb-5 font-semibold">
                          Top Branding - Truyền thông thương hiệu hàng đầu
                        </h3>
                        <ul class="md:text-[14px] font-light text-color-light">
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Giúp thương hiệu, sản phẩm, dịch vụ, chương trình của doanh nghiệp được tiếp cận với
                              hơn 5 triệu ứng viên tiềm năng trên TopCV.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Chi phí hợp lý hơn so với các dịch vụ quảng cáo banner tương tự.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Hỗ trợ tư vấn, thiết kế banner chuyên nghiệp.</span>
                          </li>
                          <li class="mb-4 flex items-baseline">
                            <i class="fa-solid fa-circle-check mr-3 text-primary"></i>
                            <span>Xây dựng trang tuyển dụng uy tín, giúp doanh nghiệp tìm kiếm ứng viên, tuyển dụng hiệu
                              quả.</span>
                          </li>
                        </ul>
                        <div class="text-center md:text-left">
                          <a href="#"
                            class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                            Tư vấn tuyển dụng miễn phí
                            <i class="fa-solid fa-arrow-right ml-1"></i>
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
        <div class="w-container py-[40px]">
          <div class="text-center mb-[42px] px-[20px]">
            <div class="text-primary uppercase">
              Figures
            </div>
            <h2 class="text-[24px] md:text-[30px] mt-2 font-bold">
              Những con số của trang tuyển dụng TopCV
            </h2>
          </div>
          <div class="px-[20px]">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px] md:gap-[30px]">
              <div class="bg-white p-[24px] text-center rounded-[10px]">
                <div class="text-[40px] leading-tight mb-[16px] text-primary font-bold">2.100.000+</div>
                <p class="font-light md:text-[14px] text-color-light">Ứng viên đang bật tìm việc trung bình/thời điểm
                </p>
              </div>
              <div class="bg-white p-[24px] text-center rounded-[10px]">
                <div class="text-[40px] leading-tight mb-[16px] text-primary font-bold">200.000+</div>
                <p class="font-light md:text-[14px] text-color-light">Doanh nghiệp tuyển dụng sử dụng dịch vụ tuyển dụng
                  hiệu quả của TopCV</p>
              </div>
              <div class="bg-white p-[24px] text-center rounded-[10px]">
                <div class="text-[40px] leading-tight mb-[16px] text-primary font-bold">540.000+</div>
                <p class="font-light md:text-[14px] text-color-light">Nhà tuyển dụng sử dụng thường xuyên để đăng tin
                  tuyển dụng, tìm kiếm ứng viên tiềm năng chỉ với những thao tác đơn giản, nhanh gọn</p>
              </div>
              <div class="bg-white p-[24px] text-center rounded-[10px]">
                <div class="text-[40px] leading-tight mb-[16px] text-primary font-bold">200.000+</div>
                <p class="font-light md:text-[14px] text-color-light">Ứng viên tạo mới tài khoản trên TopCV mỗi tháng
                </p>
              </div>
              <div class="bg-white p-[24px] text-center rounded-[10px]">
                <div class="text-[40px] leading-tight mb-[16px] text-primary font-bold">5.400.000+</div>
                <p class="font-light md:text-[14px] text-color-light">Lượt ứng viên truy cập hàng tháng, là một trong
                  những trang tuyển dụng có lượng truy cập lớn nhất tại Việt Nam tại thời điểm này.</p>
              </div>
              <div class="bg-white p-[24px] text-center rounded-[10px]">
                <div class="text-[40px] leading-tight mb-[16px] text-primary font-bold">8.000.000+</div>
                <p class="font-light md:text-[14px] text-color-light">Ứng viên tiềm năng, trong đó có 50% là ứng viên có
                  kinh nghiệm từ 3 năm trở lên</p>
              </div>
            </div>
          </div>
        </div>
        <div class="w-container py-[40px] banner-form" id="banner-form">
          <div class="form-banner-title">
            Đâu là giải pháp phù hợp cho doanh nghiệp của bạn?
          </div>
          <div class="form-banner-subtitle">
            Hãy để lại thông tin và các chuyên viên tư vấn tuyển dụng của TopCV sẽ liên hệ ngay với bạn
          </div>
          <div class="md:flex md:items-start md:justify-between mr-[118px] center-form">
            <div class="md:w-1/2 left-banner-form" id="left-banner-form">
              <div class="center-banner-form">
              </div>
            </div>
            <div class="left-banner-form-mobile">
              <div class="center-banner-form">
              </div>
            </div>
            <div class="md:w-1/2 right-banner-form" id="right-banner-form">
              <div class="form-lead-container">
                <div class="icon-top-form-lead"><span class="btn-close-form-lead"><i
                      class="fa-regular fa-xmark"></i></span></div>
                <div class="form-lead-title">Đăng ký nhận tư vấn</div>
                <div class="d-flex form-lead-scroll" id="form-lead-scroll-">
                  <div class="form-lead-label">Họ và tên</div>
                  <div class="form-lead-item form-item-name">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" required id="fullname-" placeholder="Họ và tên" />
                  </div>
                  <div class="form-lead-msg msg-name"></div>
                  <div class="form-lead-label">Email</div>
                  <div class="form-lead-item form-item-email">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" required id="email-" placeholder="Email" />
                  </div>
                  <div class="form-lead-msg msg-email"></div>
                  <div class="form-lead-label">Số điện thoại</div>
                  <div class="form-lead-item form-item-phone">
                    <i class="fa-regular fa-mobile-notch"></i>
                    <input type="text" maxlength="10" id="phone-" required placeholder="Số điện thoại" />
                  </div>
                  <div class="form-lead-msg msg-phone"></div>
                  <div class="form-lead-label">Tỉnh/Thành phố</div>
                  <div class="form-lead-item form-item-city">
                    <i class="fa-regular fa-building"></i>
                    <select id="city-id-" class="place_holder dropdown_select" required>
                      <option value hidden>Chọn Tỉnh/Thành phố</option>
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
                  <div class="form-lead-msg msg-city"></div>
                  <div class="form-lead-label">Nhu cầu tư vấn</div>
                  <div class="form-lead-item form-item-consulting">
                    <i class="fa-regular fa-square-question"></i>
                    <select id="consulting-type-" class="place_holder dropdown_select" required>
                      <option value hidden>Chọn nhu cầu tư vấn</option>
                      <option value="1">Tôi muốn được đăng tin miễn phí</option>
                      <option value="2">Tôi muốn được tìm hiểu thêm về các gói dịch vụ</option>
                      <option value="3">Tôi muốn được biết thêm về các chương trình ưu đãi</option>
                      <option value="4">Tôi muốn được hướng dẫn đăng ký tài khoản</option>
                      <option value="5">Khác</option>
                    </select>
                  </div>
                  <div class="form-lead-item mt-3 other-consulting" id="other-consulting-">
                    <textarea id="consulting-text-" placeholder="Nhập nhu cầu tư vấn..." rows="3"></textarea>
                  </div>
                  <div class="form-lead-msg msg-consulting"></div>
                </div>
                <div class="form-footer-lead">
                  <button id="created-lead-"><i class="fa-solid fa-paper-plane-top"></i>Gửi yêu cầu tư vấn
                  </button>
                </div>
                <div class="suggest-post-job">
                  Bạn cần tuyển dụng gấp?
                  <a href="{{route('job-postings.index')}}" target="_blank" class="btn-post-job-free">Đăng tin miễn phí ngay</a>
                </div>
              </div>
              <script>
                $(document).ready(function () {
                  const createLeadUrl = `https://tuyendung.topcv.vn/api/store-lead`;
                  const consultingTypeDom = $("#consulting-type-");
                  const cityIdDom = $("#city-id-");
                  const nameDom = $('#fullname-');
                  const emailDom = $('#email-');
                  const phoneDom = $('#phone-');
                  const consultingTextDom = $('#consulting-text-');

                  function validateEmail(email) {
                    return email.match(
                      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    );
                  }

                  function validatePhone(phone) {
                    return phone && phone.match(/(84|0[3|5|7|8|9])+([0-9]{8})\b/g);
                  }

                  emailDom.on('input', function () {
                    const $result = $('.msg-email');
                    const email = $(this).val();
                    $result.text('');
                    if (!validateEmail(email) && email) {
                      $result.text("Email không đúng định dạng");
                      $result.css('color', '#C52E20');
                    }
                    return false;
                  });

                  phoneDom.on('input', function () {
                    const $result = $('.msg-phone');
                    const phone = $(this).val();
                    $result.text('');
                    if (!validatePhone(phone) && phone) {
                      $result.text("Số điện thoại không đúng định dạng");
                      $result.css('color', '#C52E20');
                    }
                    return false;
                  })

                  cityIdDom.change(function () {
                    $(this).removeClass("place_holder");
                    $('.msg-city').text('');
                    $('.form-item-city').css('border-color', '#00B14F');
                  });

                  nameDom.keypress(function () {
                    $('.msg-name').text('');
                    $('.form-item-name').css('border-color', '#00B14F');
                  })

                  emailDom.keypress(function () {
                    $('.form-item-email').css('border-color', '#00B14F');
                  })

                  phoneDom.keypress(function () {
                    $('.form-item-phone').css('border-color', '#00B14F');
                  })

                  consultingTextDom.keypress(function () {
                    $('.msg-consulting').text('');
                    $('.form-item-consulting').css('border-color', '#00B14F');
                  })

                  function getIpLocation() {
                    $.get("https://ipinfo.io/", function (response) {
                      const city = response.city;
                      let cities = [];
                      cities = [{ "id": 1, "name": "H\u00e0 N\u1ed9i", "alias": "ha-noi" }, { "id": 2, "name": "H\u1ed3 Ch\u00ed Minh", "alias": "ho-chi-minh" }, { "id": 3, "name": "B\u00ecnh D\u01b0\u01a1ng", "alias": "binh-duong" }, { "id": 4, "name": "B\u1eafc Ninh", "alias": "bac-ninh" }, { "id": 5, "name": "\u0110\u1ed3ng Nai", "alias": "dong-nai" }, { "id": 6, "name": "H\u01b0ng Y\u00ean", "alias": "hung-yen" }, { "id": 7, "name": "H\u1ea3i D\u01b0\u01a1ng", "alias": "hai-duong" }, { "id": 8, "name": "\u0110\u00e0 N\u1eb5ng", "alias": "da-nang" }, { "id": 9, "name": "H\u1ea3i Ph\u00f2ng", "alias": "hai-phong" }, { "id": 10, "name": "An Giang", "alias": "an-giang" }, { "id": 11, "name": "B\u00e0 R\u1ecba-V\u0169ng T\u00e0u", "alias": "ba-ria-vung-tau" }, { "id": 12, "name": "B\u1eafc Giang", "alias": "bac-giang" }, { "id": 13, "name": "B\u1eafc K\u1ea1n", "alias": "bac-kan" }, { "id": 14, "name": "B\u1ea1c Li\u00eau", "alias": "bac-lieu" }, { "id": 15, "name": "B\u1ebfn Tre", "alias": "ben-tre" }, { "id": 16, "name": "B\u00ecnh \u0110\u1ecbnh", "alias": "binh-dinh" }, { "id": 17, "name": "B\u00ecnh Ph\u01b0\u1edbc", "alias": "binh-phuoc" }, { "id": 18, "name": "B\u00ecnh Thu\u1eadn", "alias": "binh-thuan" }, { "id": 19, "name": "C\u00e0 Mau", "alias": "ca-mau" }, { "id": 20, "name": "C\u1ea7n Th\u01a1", "alias": "can-tho" }, { "id": 21, "name": "Cao B\u1eb1ng", "alias": "cao-bang" }, { "id": 22, "name": "C\u1eedu Long", "alias": "cuu-long" }, { "id": 23, "name": "\u0110\u1eafk L\u1eafk", "alias": "dak-lak" }, { "id": 24, "name": "\u0110\u1eafc N\u00f4ng", "alias": "dac-nong" }, { "id": 25, "name": "\u0110i\u1ec7n Bi\u00ean", "alias": "dien-bien" }, { "id": 26, "name": "\u0110\u1ed3ng Th\u00e1p", "alias": "dong-thap" }, { "id": 27, "name": "Gia Lai", "alias": "gia-lai" }, { "id": 28, "name": "H\u00e0 Giang", "alias": "ha-giang" }, { "id": 29, "name": "H\u00e0 Nam", "alias": "ha-nam" }, { "id": 30, "name": "H\u00e0 T\u0129nh", "alias": "ha-tinh" }, { "id": 31, "name": "H\u1eadu Giang", "alias": "hau-giang" }, { "id": 32, "name": "Ho\u00e0 B\u00ecnh", "alias": "hoa-binh" }, { "id": 33, "name": "Kh\u00e1nh Ho\u00e0", "alias": "khanh-hoa" }, { "id": 34, "name": "Ki\u00ean Giang", "alias": "kien-giang" }, { "id": 35, "name": "Kon Tum", "alias": "kon-tum" }, { "id": 36, "name": "Lai Ch\u00e2u", "alias": "lai-chau" }, { "id": 37, "name": "L\u00e2m \u0110\u1ed3ng", "alias": "lam-dong" }, { "id": 38, "name": "L\u1ea1ng S\u01a1n", "alias": "lang-son" }, { "id": 39, "name": "L\u00e0o Cai", "alias": "lao-cai" }, { "id": 40, "name": "Long An", "alias": "long-an" }, { "id": 41, "name": "Mi\u1ec1n B\u1eafc", "alias": "mien-bac" }, { "id": 42, "name": "Mi\u1ec1n Nam", "alias": "mien-nam" }, { "id": 43, "name": "Mi\u1ec1n Trung", "alias": "mien-trung" }, { "id": 44, "name": "Nam \u0110\u1ecbnh", "alias": "nam-dinh" }, { "id": 45, "name": "Ngh\u1ec7 An", "alias": "nghe-an" }, { "id": 46, "name": "Ninh B\u00ecnh", "alias": "ninh-binh" }, { "id": 47, "name": "Ninh Thu\u1eadn", "alias": "ninh-thuan" }, { "id": 48, "name": "Ph\u00fa Th\u1ecd", "alias": "phu-tho" }, { "id": 49, "name": "Ph\u00fa Y\u00ean", "alias": "phu-yen" }, { "id": 50, "name": "Qu\u1ea3ng B\u00ecnh", "alias": "quang-binh" }, { "id": 51, "name": "Qu\u1ea3ng Nam", "alias": "quang-nam" }, { "id": 52, "name": "Qu\u1ea3ng Ng\u00e3i", "alias": "quang-ngai" }, { "id": 53, "name": "Qu\u1ea3ng Ninh", "alias": "quang-ninh" }, { "id": 54, "name": "Qu\u1ea3ng Tr\u1ecb", "alias": "quang-tri" }, { "id": 55, "name": "S\u00f3c Tr\u0103ng", "alias": "soc-trang" }, { "id": 56, "name": "S\u01a1n La", "alias": "son-la" }, { "id": 57, "name": "T\u00e2y Ninh", "alias": "tay-ninh" }, { "id": 58, "name": "Th\u00e1i B\u00ecnh", "alias": "thai-binh" }, { "id": 59, "name": "Th\u00e1i Nguy\u00ean", "alias": "thai-nguyen" }, { "id": 60, "name": "Thanh Ho\u00e1", "alias": "thanh-hoa" }, { "id": 61, "name": "Th\u1eeba Thi\u00ean Hu\u1ebf", "alias": "thua-thien-hue" }, { "id": 62, "name": "Ti\u1ec1n Giang", "alias": "tien-giang" }, { "id": 63, "name": "To\u00e0n Qu\u1ed1c", "alias": "toan-quoc" }, { "id": 64, "name": "Tr\u00e0 Vinh", "alias": "tra-vinh" }, { "id": 65, "name": "Tuy\u00ean Quang", "alias": "tuyen-quang" }, { "id": 66, "name": "V\u0129nh Long", "alias": "vinh-long" }, { "id": 67, "name": "V\u0129nh Ph\u00fac", "alias": "vinh-phuc" }, { "id": 68, "name": "Y\u00ean B\u00e1i", "alias": "yen-bai" }, { "id": 100, "name": "N\u01b0\u1edbc Ngo\u00e0i", "alias": "nuoc-ngoai" }];
                      const currentCity = cities.find(function (item) {
                        return (item?.alias ?? '').replace('-', '') === (city ?? '').toLowerCase();
                      });
                      if (currentCity?.id) {
                        cityIdDom.removeClass("place_holder");
                        cityIdDom.val(currentCity.id);
                      }
                    }, "jsonp");
                  }

                  getIpLocation();
                  consultingTypeDom.change(function () {
                    $(this).removeClass("place_holder");
                    if ($(this).val() === `5`) {
                      $('#other-consulting-').fadeIn(200);
                      $('#form-lead-scroll-').animate({ scrollTop: 9999 }, 2000);
                    } else {
                      $('#other-consulting-').fadeOut(200);
                    }
                    $('.msg-consulting').text('');
                    $('.form-item-consulting').css('border-color', '#00B14F');
                  });

                  $('#created-lead-').click(function (event) {
                    event.preventDefault();
                    const fullName = nameDom.val();
                    const email = emailDom.val();
                    const phone = phoneDom.val();
                    const city = cityIdDom.val();
                    const consultingType = consultingTypeDom.val();
                    const consultingText = consultingTextDom.val();
                    let countError = 0;

                    $('#created-lead- i').removeClass('fa-solid fa-paper-plane-top').addClass('fa fa-spinner fa-spin');

                    if (!fullName) {
                      countError += 1;
                      $('.msg-name').text("Họ và tên không được để trống");
                      $('.form-item-name').css('border-color', '#C52E20');
                    }
                    if (!email) {
                      countError += 1;
                      $('.msg-email').text("Email không được để trống");
                      $('.form-item-email').css('border-color', '#C52E20');
                    }
                    if (!phone) {
                      countError += 1;
                      $('.msg-phone').text("Số điện thoại không được để trống");
                      $('.form-item-phone').css('border-color', '#C52E20');
                    }

                    if (!city) {
                      countError += 1;
                      $('.msg-city').text("Tỉnh/Thành phố không được để trống");
                      $('.form-item-city').css('border-color', '#C52E20');
                    }

                    if (!consultingType) {
                      countError += 1;
                      $('.msg-consulting').text("Nhu cầu tư vấn không được để trống");
                      $('.form-item-consulting').css('border-color', '#C52E20');
                    }

                    if (consultingType === `5` && !consultingText) {
                      countError += 1;
                      $('.msg-consulting').text("Nhu cầu tư vấn không được để trống");
                      $('.form-item-consulting').css('border-color', '#C52E20');
                    }

                    if (countError !== 0) {
                      $('#created-lead- i').removeClass('fa fa-spinner fa-spin').addClass('fa-solid fa-paper-plane-top');
                      return;
                    }

                    const data = {
                      fullname: fullName,
                      email,
                      phone,
                      city_id: city,
                      consulting_type: consultingType,
                      consulting_text: consultingText ?? undefined,
                    }
                    $.ajax({
                      url: createLeadUrl,
                      method: 'POST',
                      dataType: 'json',
                      contentType: "application/json; charset=utf-8",
                      data: JSON.stringify(data),
                      success: function (response) {
                        if (response.message === 'success') {
                          $('#modal-form-lead').fadeOut(400);
                          if (!``) {
                            showPopupLead?.()
                          }
                          $('#modal-form-lead-success').fadeIn(400);
                          $("#consulting-type-").val('')
                          $("#city-id-").val('')
                          $('#fullname-').val('')
                          $('#email-').val('')
                          $('#phone-').val('')
                          $('#consulting-text-').val('')
                          gtag?.('event', 'submitleadsuccess');
                          window.ta?.('ClickSendARequest', { oth: { is_success: true } })
                        }
                        $('#created-lead- i').removeClass('fa fa-spinner fa-spin').addClass('fa-solid fa-paper-plane-top');
                      },
                      error: function (error) {
                        $('#created-lead- i').removeClass('fa fa-spinner fa-spin').addClass('fa-solid fa-paper-plane-top');
                        window.ta?.('ClickSendARequest', { oth: { is_success: false } })
                        console.log({ error });
                      }
                    });
                  })
                });
              </script>
            </div>
          </div>
          <script>
            $(document).ready(function () {
              const heightForm = $(".right-banner-form").height();
              if (heightForm) {
                $(".left-banner-form").height(heightForm);
              }
            });
          </script>
        </div>
        <div class="w-container py-[40px]">
          <div class="text-center mb-[42px] px-[20px]">
            <div class="text-primary uppercase">
              Values
            </div>
            <h2 class="text-[24px] md:text-[30px] mt-2 font-bold">
              Giá trị khi sử dụng TopCV Smart Recruitment Platform
            </h2>
          </div>
          <div class="px-[20px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] md:gap-[40px]">
              <div class="bg-white py-[24px] px-[16px] rounded-[10px] md:py-[40px] md:px-[40px]">
                <div class="mb-[16px] md:mb-[50px]">
                  <img class="w-full" src="../images/service/92836.png"
                    title="Doanh nghiệp sử dụng TopCV Smart Recruitment Platform"
                    alt="Doanh nghiep su dung TopCV Smart Recruitment Platform">
                </div>
                <h3
                  class="text-[14px] md:text-[24px] leading-tight border-l-4 border-primary px-2 font-semibold mb-[17px] md:mb-[20px]">
                  Đối với Doanh nghiệp
                </h3>
                <ul class="md:text-[14px] font-light text-color-light">
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4">Đưa tuyển dụng trở thành lợi thế cạnh tranh của doanh nghiệp: <b
                        class="font-bold">gia tăng cơ hội tuyển đúng người</b>, giúp thúc đẩy hoạt động kinh doanh hiệu
                      quả, hướng đến chuyển đổi số thành công.</span>
                  </li>
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4">Chuẩn hóa toàn bộ quy trình tuyển dụng thống nhất và bài bản
                      với <b class="font-bold">Talent
                        Acquisition Funnel</b>.</span>
                  </li>
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4">Xây dựng <b class="font-bold">thương hiệu tuyển dụng</b> uy tín, chuyên
                      nghiệp.</span>
                  </li>
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4"><b class="font-bold">Tiết kiệm</b> thời gian, chi phí cho hoạt động tuyển
                      dụng.</span>
                  </li>
                </ul>
              </div>
              <div class="bg-white py-[24px] px-[16px] rounded-[10px] md:py-[40px] md:px-[40px]">
                <div class="mb-[16px] md:mb-[50px]">
                  <img class="w-full" src="../images/service/17732.png"
                    title="Nhà tuyển dụng sử dụng TopCV Smart Recruitment Platform"
                    alt="Nha tuyen dung su dung TopCV Smart Recruitment Platform">
                </div>
                <h3
                  class="text-[14px] md:text-[24px] leading-tight border-l-4 border-primary px-2 font-semibold mb-[17px] md:mb-[20px]">
                  Đối với Nhà tuyển dụng
                </h3>
                <ul class="md:text-[14px] font-light text-color-light">
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4"><b class="font-bold">Quản lý tập trung</b> tất cả các hoạt động tạo ra hiệu quả
                      cho mỗi vị trí tuyển dụng theo chiến dịch tuyển dụng.</span>
                  </li>
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4">Đăng tin tuyển dụng, tạo & quản lý <b class="font-bold">nguồn ứng viên</b> hiệu
                      quả.</span>
                  </li>
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4">Đánh giá ứng viên toàn diện dựa trên dữ liệu cụ thể, giúp định tuyển đưa ra quyết
                      dụng chính xác, <b class="font-bold">giảm tỷ lệ tuyển sai người</b>.</span>
                  </li>
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4">Có <b class="font-bold">tư duy ứng dụng công nghệ</b> trong tuyển dụng, xử lý
                      nghiệp vụ tuyển dụng nhanh chóng, thông minh, tổ chức công việc hiệu quả.</span>
                  </li>
                  <li class="flex items-baseline mb-[16px]">
                    <i class="fa fa-circle-check text-lg text-primary"></i>
                    <span class="ml-4">Chủ động lên kế hoạch & <b class="font-bold">tối ưu chi phí tuyển dụng</b> theo
                      các số liệu đo lường.</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="bg-white py-[40px] md:py-[80px]">
        <div class="w-container px-[20px]">
          <div class="text-center mb-[35px] md:mb-[40px]">
            <div class="text-primary uppercase mb-[10px]">
              About us
            </div>
            <h2 class="text-[24px] md:text-[30px] font-bold">
              Về chúng tôi
            </h2>
          </div>
          <div class="bg-[#F4F5F5] rounded-[10px] p-[16px] md:flex md:items-center md:p-[40px]">
            <div class="md:w-1/2">
              <div class="font-light md:leading-[36px] md:text-[14px] text-color-light text-justify">
                <p class="pb-8">
                  TopCV Việt Nam là công ty hàng đầu trong lĩnh vực HR Tech tại Việt Nam, xoay quanh hệ sinh thái nhân
                  sự với 4 sản phẩm chủ lực:
                </p>
                <p class="pb-8">
                  Nền tảng tuyển dụng thông minh TopCV, Nền tảng thiết lập và đánh giá năng lực nhân viên TestCenter,
                  Nền tảng quản lý và gia tăng trải nghiệm nhân viên HappyTime và Giải pháp quản trị tuyển dụng hiệu
                  suất cao SHring.
                </p>
                <p class="pb-8">
                  TopCV đang sở hữu hơn 6,9 triệu người dùng, 190.000 khách hàng lớn và đã kết nối thành công hàng triệu
                  lượt ứng viên mỗi năm tới các doanh nghiệp phù hợp.
                </p>
                <p class="pb-8">
                  Thông qua việc nghiên cứu và không ngừng phát triển năng lực công nghệ lõi vượt trội (đặc biệt là ứng
                  dụng sâu Trí tuệ nhân tạo - AI), TopCV kỳ vọng mang tới các giải pháp nhân sự hiệu quả hơn nữa trong
                  tương lai: tối ưu các trải nghiệm số cho ứng viên, từ đó giúp doanh nghiệp thu hút và giữ chân nhân
                  tài, hướng tới một nền kinh tế Việt Nam phát triển bền vững.
                </p>
              </div>
            </div>
            <div class="md:w-1/2 md:pl-[40px]">
              <img class="hidden md:block md:translate-y-[-57px]" src="../images/about/about-desktop.png"
                title="Nhân sự của TopCV" alt="Nhan su cua TopCV">
              <img class="md:hidden" src="../images/about/about-mobile.png" title="Nhân sự của TopCV"
                alt="Nhan su cua TopCV">
            </div>
          </div>
        </div>
      </div>
      <div class="bg-white py-[40px] md:py-[80px]">
        <div class="w-container px-[20px]">
          <div class="text-center mb-[35px] md:mb-[40px]">
            <div class="text-primary uppercase mb-[10px]">
              Our Awards
            </div>
            <h2 class="text-[24px] md:text-[30px] font-bold">
              Giải thưởng tiêu biểu
            </h2>
          </div>
          <div class="grid grid-cols-1 gap-[20px] md:grid-cols-4 md:gap-[40px]">
            <div class="bg-white rounded-[10px] shadow-[0_3px_20px_#0000001A] p-[20px]">
              <div class="mb-[20px]">
                <img src="../images/about/top-100.png" class="w-full rounded shadow-[0_3px_30px_#88888829] object-cover"
                  title="Giải thưởng Bình chọn Startup Việt 2018" alt="Giai thuong Binh chon Startup Viet 2018"
                  class="img-top">
              </div>
              <div class="text-primary">
                <a href="#" class>
                  <span class="uppercase">Brand</span>
                </a>
              </div>
              <p class="font-semibold mt-[10px]">Top 100 Thương hiệu hàng đầu Việt Nam 2020 tại Vietnam Top Brands do
                HTV tổ chức</p>
              <div class="mt-[10px]">
                <a href="https://topcv.com.vn/blogs/3706/" target="_blank"
                  class="bg-primary px-[16px] py-[10px] rounded-[3px] text-white text-center font-medium inline-block">Đọc
                  thêm</a>
              </div>
            </div>
            <div class="bg-white rounded-[10px] shadow-[0_3px_20px_#0000001A] p-[20px]">
              <div class="mb-[20px]">
                <img src="../images/about/startup.png"
                  class="w-full rounded shadow-[0_3px_30px_#88888829] object-cover img-top"
                  title="Sự kiện Google for Startups Accelerator: Southeast Asia"
                  alt="Su kien Google for Startups Accelerator: Southeast Asia">
              </div>
              <div class="text-primary">
                <a href="#" class>
                  <span class="uppercase">Startup</span>
                </a>
              </div>
              <p class="font-semibold mt-[10px]">Top 15 Startups được Google lựa chọn tham gia Google for Startups
                Accelerator: Southeast Asia</p>
              <div class="mt-[10px]">
                <a href="https://topcv.com.vn/blogs/topcv-thuoc-top-15-startups-duoc-google-lua-chon-tham-gia-google-for-startups-accelerator-southeast-asia/"
                  target="_blank"
                  class="bg-primary px-[16px] py-[10px] rounded-[3px] text-white text-center font-medium inline-block">Đọc
                  thêm</a>
              </div>
            </div>
            <div class="bg-white rounded-[10px] shadow-[0_3px_20px_#0000001A] p-[20px]">
              <div class="mb-[20px]">
                <img src="../images/about/technology-product.png"
                  class="w-full rounded shadow-[0_3px_30px_#88888829] object-cover img-top"
                  title="Giải thưởng Sao Khuê 2020" alt="Giai thuong Sao Khue 2020">
              </div>
              <div class="text-primary">
                <a href="#" class>
                  <span class="uppercase">Tech</span>
                </a>
              </div>
              <p class="font-semibold mt-[10px]">Bộ đôi giải thưởng Sản phẩm công nghệ số Make in Viet Nam 2022</p>
              <div class="mt-[10px]">
                <a href="https://topcv.com.vn/blogs/topcv-viet-nam-nhan-bo-doi-giai-thuong-san-pham-cong-nghe-so-make-in-viet-nam-2022-2/"
                  target="_blank"
                  class="bg-primary px-[16px] py-[10px] rounded-[3px] text-white text-center font-medium inline-block">Đọc
                  thêm</a>
              </div>
            </div>
            <div class="bg-white rounded-[10px] shadow-[0_3px_20px_#0000001A] p-[20px]">
              <div class="mb-[20px]">
                <img src="../images/about/top-10.png"
                  class="w-full rounded shadow-[0_3px_30px_#88888829] object-cover img-top"
                  title="Giải thưởng Sao Khuê 2021" alt="Giai thuong Sao Khue 2021">
              </div>
              <div class="text-primary">
                <a href="#" class>
                  <span class="uppercase">Brand</span>
                </a>
              </div>
              <p class="font-semibold mt-[10px]">Cú đúp giải thưởng tại Lễ vinh danh Top 10 doanh nghiệp CNTT Việt Nam
                2022</p>
              <div class="mt-[10px]">
                <a href="https://topcv.com.vn/blogs/topcv-nhan-cu-dup-giai-thuong-tai-le-vinh-danh-top-10-doanh-nghiep-cntt-viet-nam-2022/"
                  target="_blank"
                  class="bg-primary px-[16px] py-[10px] rounded-[3px] text-white text-center font-medium inline-block">Đọc
                  thêm</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-white py-[40px]">
        <div class="w-container px-[20px]">
          <div class="text-center mb-[35px]">
            <div class="text-primary uppercase mb-[10px]">
              Our Partners
            </div>
            <h2 class="text-[24px] md:text-[30px] font-bold">
              Khách hàng tiêu biểu và đối tác truyền thông của TopCV
            </h2>
          </div>
          <div class="grid grid-rows-2 md:grid-rows-1 grid-flow-col gap-[20px] md:gap-[40px]">
            <div class="px-[16px] py-[28px] bg-white shadow-[0_46px_50px__#0000001A] rounded-[10px]">
              <h3 class="text-[18px] md:text-[24px] leading-tight border-l-4 border-primary px-2 font-bold">
                Khách hàng tiêu biểu
              </h3>
              <div class="grid grid-rows-3 md:grid-rows-2 grid-flow-col mt-8 md:mt-16">
                <div class="h-[100px] flex items-center">
                  <img class="m-auto" src="../images/partner/fpt-software.png" alt="edupia">
                </div>
                <div class="h-[100px] flex items-center">
                  <img class="m-auto" src="../images/partner/edupia.png" alt="edupia">
                </div>
                <div class="h-[100px] flex items-center">
                  <img class="m-auto" src="../images/partner/teky.png" alt="teky">
                </div>
                <div class="h-[100px] flex items-center">
                  <img class="m-auto" src="../static.topcv.vn/srp/website/images/home_page/partners/viettel.png"
                    alt="viettel">
                </div>
                <div class="h-[100px] flex items-center">
                  <img class="m-auto" src="../images/partner/shinhan-bank.png" alt="shinhan bank">
                </div>
                <div class="h-[100px] flex items-center">
                  <img class="m-auto"
                    src="../static.topcv.vn/srp/website/images/home_page/partners/Techcombank_logo.png"
                    alt="techcombank">
                </div>
              </div>
            </div>
            <div class="px-[16px] py-[28px] bg-white shadow-[0_46px_50px_#0000001A] rounded-[10px]">
              <h3 class="text-[18px] md:text-[24px] leading-tight border-l-4 border-primary px-2 font-bold">
                Đối tác truyền thông
              </h3>
              <div class="grid grid-rows-3 md:grid-rows-2 grid-flow-col mt-8 md:mt-16">
                <div class="h-[100px] flex items-center px-2">
                  <img class="m-auto" src="../static.topcv.vn/srp/website/images/home_page/partners/genk.png"
                    alt="genk">
                </div>
                <div class="h-[100px] flex items-center px-2">
                  <img class="m-auto" src="../static.topcv.vn/srp/website/images/home_page/partners/cafebiz.png"
                    alt="cafebiz">
                </div>
                <div class="h-[100px] flex items-center px-2">
                  <img class="m-auto" src="../static.topcv.vn/srp/website/images/home_page/partners/vtc10.png"
                    alt="vtc10">
                </div>
                <div class="h-[100px] flex items-center px-2">
                  <img class="m-auto" src="../static.topcv.vn/srp/website/images/home_page/partners/vtv2.png"
                    alt="vtv2">
                </div>
                <div class="h-[100px] flex items-center px-2">
                  <img class="m-auto" src="../static.topcv.vn/srp/website/images/home_page/partners/vtv1.png"
                    alt="vtv1">
                </div>
                <div class="h-[100px] flex items-center px-2">
                  <img class="m-auto" src="../static.topcv.vn/srp/website/images/home_page/partners/vtv6.png"
                    alt="vtv6">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-40px" id="contact">
        <div class="w-container px-[20px]">
          <div class="mb-[24px]">
            <div class="border-l-4 border-primary text-[18px] md:text-[24px] font-semibold px-4">
              TopCV Việt Nam mong muốn được hợp tác cùng Doanh nghiệp
            </div>
            <div class="md:text-[14px] font-light mt-[10px] text-color-light">
              Đội ngũ hỗ trợ của TopCV luôn sẵn sàng để tư vấn giải pháp tuyển dụng và đồng hành cùng các Quý nhà tuyển
              dụng
            </div>
          </div>
          <div class="grid grid-cols-1 gap-[20px] md:grid-cols-3 md:gap-[40px]">
            <div class="flex-1 pb-4 md:mr-10 ">
              <h3 class="text-[#212f3fcc] font-semibold">Hotline Tư vấn Tuyển dụng miền Bắc</h3>
              <div class="mt-4">
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0969 827 691" class="text-primary font-medium">0969 827 691</a>
                    <p class="md:font-light md:text-[14px]">Tạ Thị Linh</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0945 867 758" class="text-primary font-medium">0945 867 758</a>
                    <p class="md:font-light md:text-[14px]">Nguyễn Ngọc Hà An</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0376 780 575" class="text-primary font-medium">0376 780 575</a>
                    <p class="md:font-light md:text-[14px]">Nguyễn Thị Linh</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0981 940 698" class="text-primary font-medium">0981 940 698</a>
                    <p class="md:font-light md:text-[14px]">Bùi Hải Yến</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0339 317 722" class="text-primary font-medium">0339 317 722</a>
                    <p class="md:font-light md:text-[14px]">Nguyễn Thị Trang</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex-1 pb-4 md:mr-10 ">
              <h3 class="text-[#212f3fcc] font-semibold">Hotline Tư vấn Tuyển dụng miền Nam</h3>
              <div class="mt-4">
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0396 932 311" class="text-primary font-medium">0396 932 311</a>
                    <p class="md:font-light md:text-[14px]">Lê Thị Mỹ Trang</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0879 752 733" class="text-primary font-medium">0879 752 733</a>
                    <p class="md:font-light md:text-[14px]">Nguyễn Thị Phương Trâm</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0393 452 323" class="text-primary font-medium">0393 452 323</a>
                    <p class="md:font-light md:text-[14px]">Lê Thị Thảo Nhi</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0942 630 812" class="text-primary font-medium">0942 630 812</a>
                    <p class="md:font-light md:text-[14px]">Nguyễn Thị Huỳnh Như</p>
                  </div>
                </div>
                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                  <div class="flex">
                    <i
                      class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px]  text-primary bg-[#e5f7ed] mr-4"></i>
                  </div>
                  <div class>
                    <a href="tel:0962 799 083" class="text-primary font-medium">0962 799 083</a>
                    <p class="md:font-light md:text-[14px]">Nguyễn Thị Như Quỳnh</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex-1">
              <div class>
                <h3 class="text-[#212f3fcc] font-semibold">Hỗ trợ khách hàng và khiếu nại dịch vụ</h3>
                <div class="mt-4">
                  <div class="flex flex-col">
                    <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                      <i
                        class="fas fa-phone rounded-full flex justify-center items-center w-[31px] h-[31px]  text-[#F39C12] bg-amber-100 mr-4"></i>
                      <div class="flex">
                        <a href="tel:024 7107 9799" class="text-[#F39C12] items-center flex font-medium">(024) 7107
                          9799</a>
                      </div>
                    </div>
                    <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                      <i
                        class="fas fa-phone rounded-full flex justify-center items-center w-[31px] h-[31px]  text-[#F39C12] bg-amber-100 mr-4"></i>
                      <div class="flex">
                        <a href="tel:0862 69 19 29" class="text-[#F39C12] items-center flex font-medium">0862 69 19
                          29</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="border-t border-[#E0E6ED] bg-white text-[15px] p-[20px] md:p-[40px]">
          <div class="w-container">
            <div class="md:flex md:items-start md:justify-between">
              <div class="md:w-1/3 md:mr-[115px]">
                <a class="flex py-5 justify-center md:justify-start" href="index.html">
                  <img class="max-w-[200px]" src="../images/image131.gif" alt="topcv logo">
                </a>
                <div class="flex flex-row justify-between mb-[35px]">
                  <a class="align-middle basis-5/12 order-1" href="https://bit.ly/topcvstartupaccelerator">
                    <img src="../static.topcv.vn/srp/website/images/logo-google-for-startup.png"
                      class="logo max-h-[33px]" alt="Google">
                  </a>
                  <div class="align-middle basis-1/12 order-2">
                    <img
                      src="../images.dmca.com/Badges/_dmca_premi_badge_2d012.png?ID=1b16a667-a95e-4730-846f-46f962522fce"
                      class="logo max-h-[48px]" alt="DMCA.com Protection Status">
                  </div>
                  <a class="align-middle basis-4/12 order-3"
                    href="http://online.gov.vn/WebsiteDisplay.aspx?DocId=25396">
                    <img src="../www.topcv.vn/images/bct.jpg" class="logo max-h-[41px]" alt="bct confirmation">
                  </a>
                </div>
                <h5 class="font-medium text-color-default mb-[24px] text-[18px]">Ứng dụng tải xuống</h5>
                <p class="flex items-center justify-start mb-[36px]">
                  <a class="block mr-[16px]" target="_blank" href="https://apps.apple.com/us/app/id1469009831">
                    <img class="max-h-[50px]" src="../static.topcv.vn/srp/website/images/app/appstore.jpg"
                      alt="app store">
                  </a>
                  <a class="block" target="_blank"
                    href="https://play.google.com/store/apps/details?id=com.topcvemployer">
                    <img class="max-h-[50px]" src="../static.topcv.vn/srp/website/images/app/googleplay.jpg"
                      alt="google play store">
                  </a>
                </p>
                <div class="grid grid-cols-2">
                </div>
              </div>
              <div class="md:w-2/3 md:flex md:flex-nowrap">
                <div class="grid grid-cols-2 gap-[16px]">
                  <div>
                    <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">Về TopCV</h5>
                    <ul>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://topcv.com.vn/" target="_blank">Giới thiệu</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-topcv-viet-nam/105.html"
                          target="_blank">Tuyển dụng</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a href="#contact"
                          target>Liên hệ</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/gioi-thieu#bao-chi" target="_blank">Góc báo chí</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/privacy-policy" target="_blank">Chính sách bảo mật</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="term-of-services.html" target="_blank">Điều khoản dịch vụ</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://static.topcv.vn/manual/Quy_che_san_TMDT_TopCV.pdf" target="_blank">Quy chế hoạt
                          động</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="chuong-trinh-khach-hang-than-thiet-topcv.html" target="_blank">Chương trình TopCV
                          Rewards</a>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">Ứng viên</h5>
                    <ul>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/viec-lam" target="_blank">Tìm việc làm</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/khoa-hoc" target="_blank">Khoá học</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/trac-nghiem-tinh-cach-mbti" target="_blank">Trắc nghiệm MBTI</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/viet-cv-the-nao-cho-chuan" target="_blank">Hướng dẫn viết CV</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/dich-vu-thiet-ke-cv-theo-yeu-cau" target="_blank">Tư vấn sửa CV</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/dich-vu-thiet-ke-cv-theo-yeu-cau" target="_blank">Thiết kế CV</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/dich-vu-dich-cv-tieng-viet-sang-cv-tieng-anh" target="_blank">Dịch
                          CV</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="grid grid-cols-2 gap-[16px] md:grid-cols-1">
                  <div>
                    <h5 class="font-semibold text-[18px] text-color-default mb-[16px]">Đối tác</h5>
                    <ul>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/gioi-thieu#doi-tac" target="_blank">Doanh nghiệp</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/gioi-thieu#doi-tac" target="_blank">Trường đại học</a>
                      </li>
                      <li class="mb-[8px] text-[16px] text-color-light hover:text-primary"><a
                          href="https://www.topcv.vn/gioi-thieu#doi-tac" target="_blank">Các CLB, đoàn thể</a>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <div class="social-icons text-color-default flex items-center justify-around md:items-start">
                      <a class="text-[26px] mr-[10px]" target="_blank" href="https://www.facebook.com/topcv.vn"><span
                          class="fa-brands fa-facebook"></span></a>
                      <a class="text-[26px] mr-[10px]" target="_blank" href="javascript:void(0)"><span
                          class="fab fa-twitter"></span></a>
                      <a class="text-[26px] mr-[10px]" target="_blank"
                        href="https://www.linkedin.com/company/13378647/"><span class="fab fa-linkedin"></span></a>
                      <a class="text-[26px] mr-[10px]" target="_blank"
                        href="https://www.youtube.com/channel/UCC0FEekxunSzK1h2F_U2T0w"><span
                          class="fa-brands fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="border-t border-[#E0E6ED] bg-white p-[20px]">
          <div class="w-container">
            <div class="grid md:grid-cols-7 text-[13px] mb-[32px]">
              <div class="md:col-span-5 my-2">
                <h3 class="text-[18px] md:text-[24px] font-medium text-color-default mb-[16px]">
                  Công ty Cổ phần TopCV Việt Nam</h3>
                <ul>
                  <li class="xl:inline mt-2.5 mr-1">
                    <img class="inline" src="../images/icons/tax.svg" style="vertical-align: text-bottom !important;"
                      alt="Item icon" />
                    <span class="text-[12px] md:text-[14px] text-color-light font-light">Giấy phép đăng ký kinh doanh
                      số:</span>
                    <span class="text-[12px] md:text-[14px] font-medium text-color-default">0107307178</span>
                  </li>
                  <li class="xl:inline mt-2.5 mr-1">
                    <img class="inline" src="../images/icons/paper.svg" style="vertical-align: text-bottom !important;"
                      alt="Item icon" />
                    <span class="text-[12px] md:text-[14px] text-color-light font-light">Giấy phép hoạt động dịch vụ
                      việc làm số:</span>
                    <span class="text-[12px] md:text-[14px] font-medium text-color-default">18/SLĐTBXH-GP </span>
                  </li>
                  <li class=" mt-2.5 mr-1">
                    <img class="inline" src="../images/icons/location.svg" style="vertical-align: text-bottom !important;"
                      alt="Item icon" />
                    <span class="text-[12px] md:text-[14px] text-color-light font-light">Trụ sở HN: </span>
                    <span class="text-[12px] md:text-[14px] font-medium text-color-default">Tòa FS - GoldSeason số 47
                      Nguyễn Tuân, P.Thanh Xuân Trung, Q.Thanh Xuân, Hà Nội</span>
                  </li>
                  <li class=" mt-2.5 mr-1">
                    <img class="inline" src="../images/icons/location.svg" style="vertical-align: text-bottom !important;"
                      alt="Item icon" />
                    <span class="text-[12px] md:text-[14px] text-color-light font-light">Chi nhánh HCM:</span>
                    <span class="text-[12px] md:text-[14px] font-medium text-color-default">Tòa nhà Dali, 24C Phan Đăng
                      Lưu, P.6, Q.Bình Thạnh, TP HCM</span>
                  </li>
                </ul>
              </div>
              <div class="md:col-span-2 ">
                <div class="hidden sm:grid">
                  <div class="grid justify-center md:justify-end">
                    <div class="flex-row"><a href="https://topcv.com.vn/" target="_blank" class="text-[#0db14b]">
                        <div class="flex-row"><img src="../images/ecosystem/qr-code.svg" alt="icon qr code"></div>
                      </a></div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <h3 class="text-[14px] font-medium text-color-default text-center md:text-left mb-[17px]">
                Hệ sinh thái HR Tech của TopCV
              </h3>
              <div class="flex justify-center md:justify-between flex-row my-2">
                <div class="flex">
                  <a href="https://www.topcv.vn/" target="_blank">
                    <img src="../images/ecosystem/topcv_large3860.svg?v=1" class="max-h-[83px] hidden md:block"
                      alt="topcv">
                    <img src="../images/ecosystem/topcv.svg" class="px-3 block md:hidden object-contain sm:h-[48px]"
                      alt="topcv"></a>
                </div>
                <div class="flex">
                  <a href="https://www.happytime.vn/" target="_blank">
                    <img src="../images/ecosystem/happy-time_large3860.svg?v=1" class="max-h-[83px] hidden md:block"
                      alt="happy-time">
                    <img src="../images/ecosystem/happy-time.svg" class="px-3 block md:hidden object-contain sm:h-[48px]"
                      alt="happy-time"></a>
                </div>
                <div class="flex">
                  <a href="https://www.testcenter.vn/" target="_blank">
                    <img src="../images/ecosystem/test-center_large3860.svg?v=1" class="max-h-[83px] hidden md:block"
                      alt="test-center">
                    <img src="../images/ecosystem/test-center.svg" class="px-3 block md:hidden object-contain sm:h-[48px]"
                      alt="test-center"></a>
                </div>
                <div class="flex">
                  <a href="https://shiring.ai/" target="_blank">
                    <img src="../images/ecosystem/s-hiring_large3860.svg?v=1" class="max-h-[83px] hidden md:block"
                      alt="s-hiring">
                    <img src="../images/ecosystem/s-hiring.svg" class="px-3 block md:hidden object-contain sm:h-[48px]"
                      alt="s-hiring"></a>
                </div>
              </div>
              <div class="grid sm:hidden">
                <div class="grid justify-center">
                  <div class="flex-row"><a href="https://topcv.com.vn/" class="text-[#0db14b]" target="_blank"><img
                        src="../images/ecosystem/qr-code.svg" alt="icon qr code"></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white flex justify-center " style="height: 50px">
          <div class="text-[12px] md:text-[14px] text-color-light">© 2014 - 2024 TopCV Vietnam JSC. All rights reserved.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div id="khtt-backdrop">
    <div id="popup-banner-khtt">
      <img src="../images/icon-banner/Icon-btn-close.png" alt="close btn" id="btn-close" onclick="hidePopupIcon()">
      <a href="app/login.html" target="_blank">
        <img src="../images/csbh/2024/06/home_popup.png" id="landing-popup-image" alt="sales campaign banner"
          class="image-icon-banner">
      </a>
    </div>
  </div>
  <div id="mask-form-lead">
    <div id="modal-form-lead">
      <div class="md:flex md:items-start md:justify-between mr-[118px] center-form">
        <div class="md:w-1/2 left-banner-form" id="left-banner-form">
          <div class="center-banner-form">
          </div>
        </div>
        <div class="left-banner-form-mobile">
          <div class="center-banner-form">
          </div>
        </div>
        <div class="md:w-1/2 right-banner-form" id="right-banner-form">
          <div class="form-lead-container">
            <div class="icon-top-form-lead"><span class="btn-close-form-lead"><i class="fa-regular fa-xmark"></i></span>
            </div>
            <div class="form-lead-title">Đăng ký nhận tư vấn</div>
            <div class="d-flex form-lead-scroll" id="form-lead-scroll-1">
              <div class="form-lead-label">Họ và tên</div>
              <div class="form-lead-item form-item-name">
                <i class="fa-regular fa-user"></i>
                <input type="text" required id="fullname-1" placeholder="Họ và tên" />
              </div>
              <div class="form-lead-msg msg-name"></div>
              <div class="form-lead-label">Email</div>
              <div class="form-lead-item form-item-email">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" required id="email-1" placeholder="Email" />
              </div>
              <div class="form-lead-msg msg-email"></div>
              <div class="form-lead-label">Số điện thoại</div>
              <div class="form-lead-item form-item-phone">
                <i class="fa-regular fa-mobile-notch"></i>
                <input type="text" maxlength="10" id="phone-1" required placeholder="Số điện thoại" />
              </div>
              <div class="form-lead-msg msg-phone"></div>
              <div class="form-lead-label">Tỉnh/Thành phố</div>
              <div class="form-lead-item form-item-city">
                <i class="fa-regular fa-building"></i>
                <select id="city-id-1" class="place_holder dropdown_select" required>
                  <option value hidden>Chọn Tỉnh/Thành phố</option>
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
              <div class="form-lead-msg msg-city"></div>
              <div class="form-lead-label">Nhu cầu tư vấn</div>
              <div class="form-lead-item form-item-consulting">
                <i class="fa-regular fa-square-question"></i>
                <select id="consulting-type-1" class="place_holder dropdown_select" required>
                  <option value hidden>Chọn nhu cầu tư vấn</option>
                  <option value="1">Tôi muốn được đăng tin miễn phí</option>
                  <option value="2">Tôi muốn được tìm hiểu thêm về các gói dịch vụ</option>
                  <option value="3">Tôi muốn được biết thêm về các chương trình ưu đãi</option>
                  <option value="4">Tôi muốn được hướng dẫn đăng ký tài khoản</option>
                  <option value="5">Khác</option>
                </select>
              </div>
              <div class="form-lead-item mt-3 other-consulting" id="other-consulting-1">
                <textarea id="consulting-text-1" placeholder="Nhập nhu cầu tư vấn..." rows="3"></textarea>
              </div>
              <div class="form-lead-msg msg-consulting"></div>
            </div>
            <div class="form-footer-lead">
              <button id="created-lead-1"><i class="fa-solid fa-paper-plane-top"></i>Gửi yêu cầu tư vấn
              </button>
            </div>
            <div class="suggest-post-job">
              Bạn cần tuyển dụng gấp?
              <a href="{{route('job-postings.index')}}" target="_blank" class="btn-post-job-free">Đăng tin miễn phí ngay</a>
            </div>
          </div>
          <script>
            $(document).ready(function () {
              const createLeadUrl = `https://tuyendung.topcv.vn/api/store-lead`;
              const consultingTypeDom = $("#consulting-type-1");
              const cityIdDom = $("#city-id-1");
              const nameDom = $('#fullname-1');
              const emailDom = $('#email-1');
              const phoneDom = $('#phone-1');
              const consultingTextDom = $('#consulting-text-1');

              function validateEmail(email) {
                return email.match(
                  /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
              }

              function validatePhone(phone) {
                return phone && phone.match(/(84|0[3|5|7|8|9])+([0-9]{8})\b/g);
              }

              emailDom.on('input', function () {
                const $result = $('.msg-email');
                const email = $(this).val();
                $result.text('');
                if (!validateEmail(email) && email) {
                  $result.text("Email không đúng định dạng");
                  $result.css('color', '#C52E20');
                }
                return false;
              });

              phoneDom.on('input', function () {
                const $result = $('.msg-phone');
                const phone = $(this).val();
                $result.text('');
                if (!validatePhone(phone) && phone) {
                  $result.text("Số điện thoại không đúng định dạng");
                  $result.css('color', '#C52E20');
                }
                return false;
              })

              cityIdDom.change(function () {
                $(this).removeClass("place_holder");
                $('.msg-city').text('');
                $('.form-item-city').css('border-color', '#00B14F');
              });

              nameDom.keypress(function () {
                $('.msg-name').text('');
                $('.form-item-name').css('border-color', '#00B14F');
              })

              emailDom.keypress(function () {
                $('.form-item-email').css('border-color', '#00B14F');
              })

              phoneDom.keypress(function () {
                $('.form-item-phone').css('border-color', '#00B14F');
              })

              consultingTextDom.keypress(function () {
                $('.msg-consulting').text('');
                $('.form-item-consulting').css('border-color', '#00B14F');
              })

              function getIpLocation() {
                $.get("https://ipinfo.io/", function (response) {
                  const city = response.city;
                  let cities = [];
                  cities = [{ "id": 1, "name": "H\u00e0 N\u1ed9i", "alias": "ha-noi" }, { "id": 2, "name": "H\u1ed3 Ch\u00ed Minh", "alias": "ho-chi-minh" }, { "id": 3, "name": "B\u00ecnh D\u01b0\u01a1ng", "alias": "binh-duong" }, { "id": 4, "name": "B\u1eafc Ninh", "alias": "bac-ninh" }, { "id": 5, "name": "\u0110\u1ed3ng Nai", "alias": "dong-nai" }, { "id": 6, "name": "H\u01b0ng Y\u00ean", "alias": "hung-yen" }, { "id": 7, "name": "H\u1ea3i D\u01b0\u01a1ng", "alias": "hai-duong" }, { "id": 8, "name": "\u0110\u00e0 N\u1eb5ng", "alias": "da-nang" }, { "id": 9, "name": "H\u1ea3i Ph\u00f2ng", "alias": "hai-phong" }, { "id": 10, "name": "An Giang", "alias": "an-giang" }, { "id": 11, "name": "B\u00e0 R\u1ecba-V\u0169ng T\u00e0u", "alias": "ba-ria-vung-tau" }, { "id": 12, "name": "B\u1eafc Giang", "alias": "bac-giang" }, { "id": 13, "name": "B\u1eafc K\u1ea1n", "alias": "bac-kan" }, { "id": 14, "name": "B\u1ea1c Li\u00eau", "alias": "bac-lieu" }, { "id": 15, "name": "B\u1ebfn Tre", "alias": "ben-tre" }, { "id": 16, "name": "B\u00ecnh \u0110\u1ecbnh", "alias": "binh-dinh" }, { "id": 17, "name": "B\u00ecnh Ph\u01b0\u1edbc", "alias": "binh-phuoc" }, { "id": 18, "name": "B\u00ecnh Thu\u1eadn", "alias": "binh-thuan" }, { "id": 19, "name": "C\u00e0 Mau", "alias": "ca-mau" }, { "id": 20, "name": "C\u1ea7n Th\u01a1", "alias": "can-tho" }, { "id": 21, "name": "Cao B\u1eb1ng", "alias": "cao-bang" }, { "id": 22, "name": "C\u1eedu Long", "alias": "cuu-long" }, { "id": 23, "name": "\u0110\u1eafk L\u1eafk", "alias": "dak-lak" }, { "id": 24, "name": "\u0110\u1eafc N\u00f4ng", "alias": "dac-nong" }, { "id": 25, "name": "\u0110i\u1ec7n Bi\u00ean", "alias": "dien-bien" }, { "id": 26, "name": "\u0110\u1ed3ng Th\u00e1p", "alias": "dong-thap" }, { "id": 27, "name": "Gia Lai", "alias": "gia-lai" }, { "id": 28, "name": "H\u00e0 Giang", "alias": "ha-giang" }, { "id": 29, "name": "H\u00e0 Nam", "alias": "ha-nam" }, { "id": 30, "name": "H\u00e0 T\u0129nh", "alias": "ha-tinh" }, { "id": 31, "name": "H\u1eadu Giang", "alias": "hau-giang" }, { "id": 32, "name": "Ho\u00e0 B\u00ecnh", "alias": "hoa-binh" }, { "id": 33, "name": "Kh\u00e1nh Ho\u00e0", "alias": "khanh-hoa" }, { "id": 34, "name": "Ki\u00ean Giang", "alias": "kien-giang" }, { "id": 35, "name": "Kon Tum", "alias": "kon-tum" }, { "id": 36, "name": "Lai Ch\u00e2u", "alias": "lai-chau" }, { "id": 37, "name": "L\u00e2m \u0110\u1ed3ng", "alias": "lam-dong" }, { "id": 38, "name": "L\u1ea1ng S\u01a1n", "alias": "lang-son" }, { "id": 39, "name": "L\u00e0o Cai", "alias": "lao-cai" }, { "id": 40, "name": "Long An", "alias": "long-an" }, { "id": 41, "name": "Mi\u1ec1n B\u1eafc", "alias": "mien-bac" }, { "id": 42, "name": "Mi\u1ec1n Nam", "alias": "mien-nam" }, { "id": 43, "name": "Mi\u1ec1n Trung", "alias": "mien-trung" }, { "id": 44, "name": "Nam \u0110\u1ecbnh", "alias": "nam-dinh" }, { "id": 45, "name": "Ngh\u1ec7 An", "alias": "nghe-an" }, { "id": 46, "name": "Ninh B\u00ecnh", "alias": "ninh-binh" }, { "id": 47, "name": "Ninh Thu\u1eadn", "alias": "ninh-thuan" }, { "id": 48, "name": "Ph\u00fa Th\u1ecd", "alias": "phu-tho" }, { "id": 49, "name": "Ph\u00fa Y\u00ean", "alias": "phu-yen" }, { "id": 50, "name": "Qu\u1ea3ng B\u00ecnh", "alias": "quang-binh" }, { "id": 51, "name": "Qu\u1ea3ng Nam", "alias": "quang-nam" }, { "id": 52, "name": "Qu\u1ea3ng Ng\u00e3i", "alias": "quang-ngai" }, { "id": 53, "name": "Qu\u1ea3ng Ninh", "alias": "quang-ninh" }, { "id": 54, "name": "Qu\u1ea3ng Tr\u1ecb", "alias": "quang-tri" }, { "id": 55, "name": "S\u00f3c Tr\u0103ng", "alias": "soc-trang" }, { "id": 56, "name": "S\u01a1n La", "alias": "son-la" }, { "id": 57, "name": "T\u00e2y Ninh", "alias": "tay-ninh" }, { "id": 58, "name": "Th\u00e1i B\u00ecnh", "alias": "thai-binh" }, { "id": 59, "name": "Th\u00e1i Nguy\u00ean", "alias": "thai-nguyen" }, { "id": 60, "name": "Thanh Ho\u00e1", "alias": "thanh-hoa" }, { "id": 61, "name": "Th\u1eeba Thi\u00ean Hu\u1ebf", "alias": "thua-thien-hue" }, { "id": 62, "name": "Ti\u1ec1n Giang", "alias": "tien-giang" }, { "id": 63, "name": "To\u00e0n Qu\u1ed1c", "alias": "toan-quoc" }, { "id": 64, "name": "Tr\u00e0 Vinh", "alias": "tra-vinh" }, { "id": 65, "name": "Tuy\u00ean Quang", "alias": "tuyen-quang" }, { "id": 66, "name": "V\u0129nh Long", "alias": "vinh-long" }, { "id": 67, "name": "V\u0129nh Ph\u00fac", "alias": "vinh-phuc" }, { "id": 68, "name": "Y\u00ean B\u00e1i", "alias": "yen-bai" }, { "id": 100, "name": "N\u01b0\u1edbc Ngo\u00e0i", "alias": "nuoc-ngoai" }];
                  const currentCity = cities.find(function (item) {
                    return (item?.alias ?? '').replace('-', '') === (city ?? '').toLowerCase();
                  });
                  if (currentCity?.id) {
                    cityIdDom.removeClass("place_holder");
                    cityIdDom.val(currentCity.id);
                  }
                }, "jsonp");
              }

              getIpLocation();
              consultingTypeDom.change(function () {
                $(this).removeClass("place_holder");
                if ($(this).val() === `5`) {
                  $('#other-consulting-1').fadeIn(200);
                  $('#form-lead-scroll-1').animate({ scrollTop: 9999 }, 2000);
                } else {
                  $('#other-consulting-1').fadeOut(200);
                }
                $('.msg-consulting').text('');
                $('.form-item-consulting').css('border-color', '#00B14F');
              });

              $('#created-lead-1').click(function (event) {
                event.preventDefault();
                const fullName = nameDom.val();
                const email = emailDom.val();
                const phone = phoneDom.val();
                const city = cityIdDom.val();
                const consultingType = consultingTypeDom.val();
                const consultingText = consultingTextDom.val();
                let countError = 0;

                $('#created-lead-1 i').removeClass('fa-solid fa-paper-plane-top').addClass('fa fa-spinner fa-spin');

                if (!fullName) {
                  countError += 1;
                  $('.msg-name').text("Họ và tên không được để trống");
                  $('.form-item-name').css('border-color', '#C52E20');
                }
                if (!email) {
                  countError += 1;
                  $('.msg-email').text("Email không được để trống");
                  $('.form-item-email').css('border-color', '#C52E20');
                }
                if (!phone) {
                  countError += 1;
                  $('.msg-phone').text("Số điện thoại không được để trống");
                  $('.form-item-phone').css('border-color', '#C52E20');
                }

                if (!city) {
                  countError += 1;
                  $('.msg-city').text("Tỉnh/Thành phố không được để trống");
                  $('.form-item-city').css('border-color', '#C52E20');
                }

                if (!consultingType) {
                  countError += 1;
                  $('.msg-consulting').text("Nhu cầu tư vấn không được để trống");
                  $('.form-item-consulting').css('border-color', '#C52E20');
                }

                if (consultingType === `5` && !consultingText) {
                  countError += 1;
                  $('.msg-consulting').text("Nhu cầu tư vấn không được để trống");
                  $('.form-item-consulting').css('border-color', '#C52E20');
                }

                if (countError !== 0) {
                  $('#created-lead-1 i').removeClass('fa fa-spinner fa-spin').addClass('fa-solid fa-paper-plane-top');
                  return;
                }

                const data = {
                  fullname: fullName,
                  email,
                  phone,
                  city_id: city,
                  consulting_type: consultingType,
                  consulting_text: consultingText ?? undefined,
                }
                $.ajax({
                  url: createLeadUrl,
                  method: 'POST',
                  dataType: 'json',
                  contentType: "application/json; charset=utf-8",
                  data: JSON.stringify(data),
                  success: function (response) {
                    if (response.message === 'success') {
                      $('#modal-form-lead').fadeOut(400);
                      if (!`1`) {
                        showPopupLead?.()
                      }
                      $('#modal-form-lead-success').fadeIn(400);
                      $("#consulting-type-1").val('')
                      $("#city-id-1").val('')
                      $('#fullname-1').val('')
                      $('#email-1').val('')
                      $('#phone-1').val('')
                      $('#consulting-text-1').val('')
                      gtag?.('event', 'submitleadsuccess');
                      window.ta?.('ClickSendARequest', { oth: { is_success: true } })
                    }
                    $('#created-lead-1 i').removeClass('fa fa-spinner fa-spin').addClass('fa-solid fa-paper-plane-top');
                  },
                  error: function (error) {
                    $('#created-lead-1 i').removeClass('fa fa-spinner fa-spin').addClass('fa-solid fa-paper-plane-top');
                    window.ta?.('ClickSendARequest', { oth: { is_success: false } })
                    console.log({ error });
                  }
                });
              })
            });
          </script>
        </div>
      </div>
      <script>
        $(document).ready(function () {
          const heightForm = $(".right-banner-form").height();
          if (heightForm) {
            $(".left-banner-form").height(heightForm);
          }
        });
      </script>
    </div>
    <div id="modal-form-lead-success">
      <div class="icon-top-form-lead"><span class="btn-close-form-lead"><i class="fa-regular fa-xmark"></i></span></div>
      <div class="form-lead-success-container">
        <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 124 124" fill="none">
          <g clip-path="url(#clip0_3204_98360)">
            <circle opacity="0.3" cx="62" cy="62" r="62" fill="url(#paint0_linear_3204_98360)" />
            <circle cx="62" cy="62" r="48" fill="#00B14F" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M79.1081 49.9144C80.2973 51.1336 80.2973 53.1104 79.1081 54.3296L59.8378 74.0856C58.6487 75.3046 56.7209 75.3048 55.5316 74.0861L45.8924 64.2081C44.7029 62.9891 44.7025 61.0124 45.8915 59.7929C47.0805 58.5734 49.0086 58.573 50.1981 59.7919L57.684 67.4633L74.8014 49.9144C75.9907 48.6952 77.9188 48.6952 79.1081 49.9144Z"
              fill="white" />
          </g>
          <defs>
            <linearGradient id="paint0_linear_3204_98360" x1="62" y1="0" x2="62" y2="124"
              gradientUnits="userSpaceOnUse">
              <stop stop-color="#59CA87" />
              <stop offset="1" stop-color="#35AB65" stop-opacity="0" />
            </linearGradient>
            <clipPath id="clip0_3204_98360">
              <rect width="124" height="124" fill="white" />
            </clipPath>
          </defs>
        </svg>
      </div>
      <div class="success-msg">Đăng ký thành công!</div>
      <div class="success-des">
        TopCV sẽ liên hệ để tư vấn bạn trong thời gian sớm nhất. Nếu bạn cần hỗ trợ ngay, vui lòng liên hệ Hotline chăm
        sóc khách hàng.
      </div>
      <div class="support-footer-form">
        <div class="support-footer-form-item"
          style="display: flex; align-items: center; border: 1px solid #D7DEE4; border-radius: 100px; padding: 12px 24px;">
          <i class="fa-solid fa-phone" style="color: #00B14F; margin-right: 8px"></i>
          <span>Hỗ trợ</span>
          <a style="color: #00B14F; font-weight: 600; margin-left: 8px" href="tel:02471079799">(024) 71079799</a>
        </div>
        <div class="support-footer-form-item"
          style="display: flex; align-items: center; border: 1px solid #D7DEE4; ; border-radius: 100px; padding: 12px 24px;">
          <i class="fa-solid fa-phone" style="color: #00B14F; margin-right: 8px"></i>
          <span>Hỗ trợ</span>
          <a style="color: #00B14F; font-weight: 600; margin-left: 8px" href="tel:0862691929">0862 691929</a>
        </div>
      </div>
    </div>
  </div>
  <script>
    function showPopupLead() {
      $("#mask-form-lead").fadeIn(500);
      document.body.style.overflow = 'hidden';
      const heightForm = $("#modal-form-lead .right-banner-form").height();
      if (heightForm) {
        $("#modal-form-lead .left-banner-form").height(heightForm);
      }
    }
    function hidePopupLead() {
      $("#mask-form-lead").fadeOut(500);
      document.body.style.overflow = 'scroll';
      $('#modal-form-lead').fadeIn(2000);
      $('#modal-form-lead-success').fadeOut();
    }
    $(document).ready(function () {
      $(".btn-close-form-lead").click(function (e) {
        e.preventDefault();
        hidePopupLead();
      });

      $('.show-modal-create-lead').click(function (e) {
        e.preventDefault();
        showPopupLead();
        window.ta?.('ClickGetAFreeConsultation')
      });
    });
  </script>
  <div id="floating-sp-mkt">
    <img id="close-img-sp-banner" src="../images/mkt/floating_marketing.webp" width="210" alt />
    <div id="close-img-sp">
      <img id="close-img-sp-icon" src="../images/mkt/close_floating_support_mkt.webp" width="24" alt />
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      showFloatingIcon()
    })

    function showFloatingIcon() {
      if (sessionStorage.getItem('hidden_floating_icon') !== 'true') {
        $('#floating-sp-mkt').fadeIn(1000)
      }
    }

    function hiddenFloatingIcon() {
      $('#floating-sp-mkt').fadeOut(1000)
      sessionStorage.setItem('hidden_floating_icon', true)
    }

    $('#close-img-sp-banner').click(function () {
      window.open('https://insights.topcv.vn/recruitment-report-2023-2024?source=srpmodal', '_blank')
    })

    $('#close-img-sp-icon').click(function () {
      hiddenFloatingIcon()
    })
  </script>
  <script src="../ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="modulepreload" href="build/assets/header.d1ee4fe5.js" />
  <script type="module" src="build/assets/header.d1ee4fe5.js"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
  <script type="text/javascript">
    !function (q, g, r, a, p, h, js) {
      if (q.qg) return;
      js = q.qg = function () {
        js.callmethod ? js.callmethod.call(js, arguments) : js.queue.push(arguments);
      };
      js.queue = [];
      p = g.createElement(r); p.async = !0; p.src = a; h = g.getElementsByTagName(r)[0];
      h.parentNode.insertBefore(p, h);
    }(window, document, 'script', '../cdn.qgr.ph/qgraph.62369f6992fb483665af.js');
  </script>
  <script src="../tuyendung-api.topcv.vn/js/sso.js"></script>
  <script>
    var BIZ_DOMAIN = 'app/index.html'
  </script>
  <script>
    function onIdentification(operation) {
      $.ajax({
        method: 'post',
        url: '/login',
        data: {
          token: operation.access_token
        },
        success: function (res) { }
      }).done(function () {

        localStorage.setItem('employer', JSON.stringify(operation.user))
      }).fail(function () {

        localStorage.removeItem("employer");
      })


      $('#login-box').html(`
            <a href="https://tuyendung.topcv.vn/app" class="bg-primary border border-primary py-[14px] px-[13px] min-w-[104px] rounded block text-white text-center mr-2">
              Đăng tuyển &amp; Tìm CV
            </a>
        `)
    }

    //callback khi logout sso thanh cong se tu dong goi ve ham nay
    function onLogout() {
      $.ajax({
        method: 'post',
        url: '/logout',
        data: {},
        success: function (res) { }
      }).done(function () {
        localStorage.removeItem("employer");
      })

      $('#login-box').html(`
          <div class="grid grid-cols-2 gap-[12px]">
            <a href="https://tuyendung.topcv.vn/app/login" class="bg-white border border-primary py-[14px] px-[13px] rounded block  text-primary text-center min-w-[104px]">Đăng nhập</a>
            <a href="#" onclick="return taClickRegister();" class="bg-primary border border-primary py-[14px] px-[13px] rounded block text-white text-center min-w-[104px]">Đăng ký</a>
          </div>
        `)
    }
    function taClickRegister() {
      let registerUrl = '{{route('job-postings.index')}}'
      window.ta?.('ClickRegister')
      window.open(registerUrl, '_self')
    }
  </script>
  <script>
    document.getElementById("mb-menu-btn").addEventListener("click", function () {
      const isShow = document.getElementById("mb-menu").style.display && document.getElementById("mb-menu").style
        .display !== 'none'
      if (isShow) {
        document.getElementById("mb-menu").style.display = 'none'
      } else {
        document.getElementById("mb-menu").style.display = 'block'
      }
    });
  </script>
  <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'89398594999d0973',t:'MTcxODM1OTczNC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='https://tuyendung.topcv.vn/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
</body>
</html>
