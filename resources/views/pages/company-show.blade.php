   @extends('layout')
   @section('content')
       <style>
           /* Custom styles */
           .content {
               position: relative;
           }

           #toggle-detail {
               margin-top: 10px;
           }
       </style>
       <link rel="stylesheet"
           href="https://static.topcv.vn/v4/css/components/tooltip-popper/saved-job-tooltip.f6f880018f1bdc66K.css">
       <link rel="stylesheet"
           href="https://static.topcv.vn/v4/css/components/desktop/jobs/job-list-default.40710d157e4df9feK.css">
       <div id="main">
           <div id="breadcrumb" class="breadcrumb">
               <div class="container">
                   <ul class="nav d-flex">
                       <li class="nav-item">
                           <a class="text-highlight bold" href="{{ route('all.company') }}">Danh sách Công ty</a>
                       </li>
                       <li class="nav-item">Thông tin công ty &amp; tin tuyển dụng từ {{ $company->name }}</li>
                   </ul>
               </div>
           </div>
           <div class="company-cover">
               <div class="container">
                   <div class="company-cover-inner">
                       <div class="cover-wrapper">
                           <img draggable="false"
                               src="{{ $company->image ? asset('storage/' . $company->image) : asset('storage/avatar/company_cover_1.jpg') }}"

                               width="100%" class="img-responsive cover-img">
                       </div>
                       <div class="company-logo">
                           <div class="company-image-logo">
                               <img draggable="false"
                                   src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/default-logo.jpg') }}"
                                   alt="{{ $company->name }}" class="img-responsive">
                           </div>
                       </div>
                       <div class="company-detail-overview">
                           <div class="box-detail">
                               <h1 data-toggle="tooltip" title="{{ $company->name }}"
                                   class="company-detail-name text-highlight">{{ $company->name }}</h1>
                               <div class="company-subdetail">
                                   <div data-toggle="tooltip" title="{{ $company->website }}"
                                       class="company-subdetail-info website ">
                                       <span class="company-subdetail-info-icon">
                                           <i class="fa-solid fa-globe"></i>
                                       </span>
                                       <a class="company-subdetail-info-text" href="{{ $company->website }}"
                                           target="_blank">{{ $company->website }}</a>
                                   </div>
                                   <div class="company-subdetail-info">
                                       <span class="company-subdetail-info-icon">
                                           <i class="fa-solid fa-buildings"></i>
                                       </span>
                                       <span class="company-subdetail-info-text">{{ $company->scale }}</span>
                                   </div>
                                   <div class="company-subdetail-info">
                                       <span class="company-subdetail-info-icon">
                                           <i class="fa-solid fa-users"></i>
                                       </span>
                                       <span class="company-subdetail-info-text">{{ $company->followers()->count() }} người
                                           theo dõi</span>
                                   </div>
                               </div>
                           </div>
                           <div class="box-follow">
                               @if (Auth::guard('candidate')->check() &&
                                       Auth::guard('candidate')->user()->followedCompanies->contains($company->id))
                                   <a href="javascript:void(0);" class="btn btn-unfollow" data-id="{{ $company->id }}">
                                       <span><i class="fa-regular fa-minus"></i></span>
                                       Hủy theo dõi công ty
                                   </a>
                               @else
                                   <a href="javascript:void(0);" class="btn btn-follow" data-id="{{ $company->id }}">
                                       <span><i class="fa-regular fa-plus"></i></span>
                                       Theo dõi công ty
                                   </a>
                               @endif
                               <script>
                                   $(document).ready(function() {
                                       $('.btn-follow').click(function() {
                                           var companyId = $(this).data('id');
                                           $.ajax({
                                               url: '/company/' + companyId + '/follow',
                                               type: 'POST',
                                               data: {
                                                   _token: '{{ csrf_token() }}'
                                               },
                                               success: function(response) {
                                                   if (response.success) {
                                                       location.reload();
                                                   }
                                               }
                                           });
                                       });

                                       $('.btn-unfollow').click(function() {
                                           var companyId = $(this).data('id');
                                           $.ajax({
                                               url: '/company/' + companyId + '/unfollow',
                                               type: 'POST',
                                               data: {
                                                   _token: '{{ csrf_token() }}'
                                               },
                                               success: function(response) {
                                                   if (response.success) {
                                                       location.reload();
                                                   }
                                               }
                                           });
                                       });
                                   });
                               </script>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div>
               <div class="container">
                   <div class="row">
                       <div class="col-md-8">
                           <div id="section-introduce">
                               <div class="company-info">
                                   <h2 class="title">Giới thiệu công ty</h2>
                                   <div class="box-body">
                                       <div class="content">
                                           <p id="company-detail">{{ $company->detail }}</p>
                                           <button id="toggle-detail" class="btn btn-primary">Xem thêm</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="job-listing box-white" id="box-job-listing">
                               <div class="job-listing__header">
                                   <h2 class="title">Tuyển dụng</h2>
                               </div>
                               <div class="box-body">
                                   <div class="box-content" id="job-listing-content">
                                       <!-- Display Job Postings -->
                                       <div class="job-list-default">
                                           @foreach ($jobPostings as $job)
                                               <div class="job-item-default bg-highlight job-ta">
                                                   <div class="avatar">
                                                       <a target="_blank" href="{{ route('job.show', $job->slug) }}">
                                                           <img src="{{ asset('storage/' . $job->company->logo) }}"
                                                               class="w-100" alt="{{ $job->title }}"
                                                               title="{{ $job->title }}">
                                                       </a>
                                                   </div>
                                                   <div class="body">
                                                       <div class="body-content">
                                                           <div class="title-block">
                                                               <div>
                                                                   <h3 class="title ">
                                                                       <div class="box-label-top"></div>
                                                                       <a target="_blank"
                                                                           href="{{ route('job.show', $job->slug) }}">
                                                                           <span
                                                                               title="{{ $job->title }}">{{ $job->title }}</span>
                                                                           <span class="icon-verified-employer level-five">
                                                                               <i
                                                                                   class="fa-solid fa-circle-check icon-verified-employer-tooltip"></i></span>
                                                                       </a>
                                                                   </h3>
                                                                   <a rel="nofollow" class="company"
                                                                       href="{{ route('company-home.show', $company->slug) }}">{{ $company->name }}</a>
                                                                   <div class="box-job-relevance-job">
                                                                       <i class="fa-solid fa-star"></i>
                                                                       <i style="display: none;"
                                                                           class="fa-regular fa-star"></i>
                                                                       <span class="box-job-relevance-job_text"></span>
                                                                   </div>
                                                               </div>
                                                               <div class="box-right">
                                                                   <label class="title-salary">{{ $job->salary }}</label>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="info">
                                                           <div class="label-content">
                                                               <label class="address" data-toggle="tooltip"
                                                                   data-html="true" title="" data-placement="top"
                                                                   data-original-title="<p style='text-align: left'>{{ $job->city }}</p>">{{ $job->city }}</label>
                                                               <label class="time mobile-hidden">
                                                                   Còn
                                                                   <strong>{{ \Carbon\Carbon::parse($job->closing_date)->diffInDays() }}</strong>
                                                                   ngày để ứng tuyển
                                                               </label>
                                                           </div>
                                                           <div class="icon">
                                                               <button data-toggle="modal" data-target="#applyModal"
                                                                   class="btn btn-apply-now">
                                                                   <span>Ứng tuyển</span>
                                                               </button>
                                                               <div
                                                                   class="box-save-job  box-save-job-hover   job-notsave ">
                                                                   <a href="" class="btn-save save">
                                                                       <span id="save-job-loading" style="display: none;">
                                                                           <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                               style="width: 20px">
                                                                       </span>
                                                                       <i class="fa-regular fa-heart"></i>
                                                                   </a>
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

                       </div>
                       <div class="col-md-4">
                           <div id="section-contact">
                               <h2 class="title">Thông tin liên hệ</h2>
                               <div class="box-body">
                                   <div class="item">
                                       <div class="box-caption">
                                           <i class="fa-solid fa-location-dot"></i>
                                           <span>Địa chỉ công ty</span>
                                       </div>
                                       <div class="desc">
                                           {{ $company->address }}
                                       </div>
                                   </div>
                                   <div class="item">
                                       <div class="box-caption">
                                           <i class="fa-solid fa-map"></i>
                                           <span>Xem bản đồ</span>
                                       </div>
                                       <div class="desc">
                                           {!! $company->map !!}
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="box-sharing box-white">
                               <h2 class="title bg-header">Chia sẻ công ty tới bạn bè</h2>
                               <div class="box-body">
                                   <p>Sao chép đường dẫn</p>
                                   <div class="box-copy">
                                       <input readonly type="text"
                                           value="{{ route('company-home.show', $company->slug) }}" class="url-copy"
                                           readonly>
                                       <div class="btn-copy">
                                           <button class="btn-copy-url"><i class="fa-regular fa-copy"></i></button>
                                       </div>
                                   </div>
                                   <p>Chia sẻ qua mạng xã hội</p>
                                   <div class="box-share">
                                       <a href="{{ $company->facebook }}" target="_blank"><img
                                               src="../../../static.topcv.vn/v4/image/normal-company/share/facebook.png"
                                               alt></a>
                                       <a href="{{ $company->twitter }}" target="_blank"><img
                                               src="../../../static.topcv.vn/v4/image/normal-company/share/twitter.png"
                                               alt></a>
                                       <a href="{{ $company->linkedin }}" target="_blank"><img
                                               src="../../../static.topcv.vn/v4/image/normal-company/share/linked.png"
                                               alt></a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <script>
               document.addEventListener('DOMContentLoaded', function() {
                   var detail = document.getElementById('company-detail');
                   var toggleBtn = document.getElementById('toggle-detail');

                   if (detail.innerText.length <= 200) {
                       toggleBtn.style.display = 'none';
                   } else {
                       detail.style.height = '100px';
                       detail.style.overflow = 'hidden';

                       toggleBtn.addEventListener('click', function() {
                           if (toggleBtn.innerText === 'Xem thêm') {
                               detail.style.height = 'auto';
                               toggleBtn.innerText = 'Thu gọn';
                           } else {
                               detail.style.height = '100px';
                               toggleBtn.innerText = 'Xem thêm';
                           }
                       });
                   }
               });
           </script>
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
                               <form id="applyForm" action="{{ route('applications.store') }}" method="POST">
                                   @csrf
                                   <input type="hidden" name="job_posting_id" value="{{ $job->id }}">
                                   <div class="form-group">
                                       <label for="cv_id">Chọn CV</label>
                                       <select class="form-control" id="cv_id" name="cv_id">
                                           @foreach (Auth::guard('candidate')->user()->cvs as $cv)
                                               <option value="{{ $cv->id }}">
                                                   {{ $cv->cv_name ?? $cv->cv_path }}
                                               </option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="application_letter">Thư ứng tuyển</label>
                                       <textarea class="form-control" id="application_letter" name="application_letter" rows="4"></textarea>
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
               function submitApplyForm() {
                   document.getElementById('applyForm').submit();
               }
           </script>


           <script>
               function submitApplyForm() {
                   document.getElementById('applyForm').submit();
               }
           </script>
       </div>
   @endsection