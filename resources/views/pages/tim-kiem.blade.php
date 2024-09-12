 @extends('layout')
 @section('content')
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
         <div class="container">
             <div class="d-flex justify-content-between wrap-seo-breadcrumb align-items-center">
                 <div class="d-flex flex-column">
                     <h1 id="search-job-heading" class="search-job-heading">
                         @if ($keyword)
                             Tuyển dụng {{ $jobCount }} việc làm @if ($keyword)
                                 "{{ $keyword }}"
                                 @endif @if ($city)
                                     tại {{ $city }}
                                 @endif
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
                                     @if ($keyword)
                                         Tuyển dụng {{ $jobCount }} việc làm @if ($keyword)
                                             "{{ $keyword }}"
                                             @endif @if ($city)
                                                 tại {{ $city }}
                                             @endif
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
                                                                     <img src="{{ $jobPosting->company->logo ? asset('storage/' . $jobPosting->company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                                                         class="w-100 lazy"
                                                                         alt="{{ $jobPosting->company->name }}"
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
                                                                                 rel="nooppener noreferrer"
                                                                                 data-original-title="{{ $jobPosting->company->name }}">
                                                                                 {{ $jobPosting->company->name }}
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
                                                                             @foreach ($jobPosting->cities as $city)
                                                                                 {{ $city->name }}@if (!$loop->last)
                                                                                     ,
                                                                                 @endif
                                                                             @endforeach
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
                                 </div>
                                 <div class="job-list-detail"></div>
                             </div>

                         </div>
                     </div>
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
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/job-notification-setting.bea5fa3f03028ed1K.css">
     <script data-type="lazy" data-src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js" src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js"></script>
 @endsection
