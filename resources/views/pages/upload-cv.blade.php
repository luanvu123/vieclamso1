 @extends('layout')
 @section('content')
     <div>
         <div class="container">
             <div class="box-main-upload-cv">
                 <div class="box-header">
                     <h1 class="title">{{ $info->upload_cv_title }}</h1>
                     <h2 class="sub-title">{{$info->upload_cv_subtitle}}</h2>
                 </div>
                 <div class="box-body">
                     <p class="desc">{{$info->upload_cv_desc}}</p>
                     <div class="box-upload">
                         <div class="box-upload_title">
                             <img src="https://www.topcv.vn/v4/image/upload-cv/upload-cloud.png" alt>
                             <span>
                                 Tải lên CV từ máy tính, chọn hoặc kéo thả
                             </span>
                         </div>
                         <div class="not-cv">
                             <p>Hỗ trợ định dạng .doc, .docx, pdf có kích thước dưới 5MB</p>
                             <button onclick="document.getElementById('file-upload-cv').click(); return false;">
                                 Chọn CV
                             </button>
                         </div>
                         <div class="is-cv">
                             <p class="name-file"></p>
                             <p>Chọn tệp khác</p>
                         </div>
                         <form id="formUploadCv" action="{{ route('cv.upload.post') }}" method="POST"
                             enctype="multipart/form-data">
                             @csrf
                             <input type="hidden" name="ta_source" value="UploadCVInManagerCV">
                             <input type="file" name="file_upload_cv" class="file-upload-cv" id="file-upload-cv"
                                 style="display: none;" onchange="document.getElementById('formUploadCv').submit();">
                         </form>
                     </div>
                     <div class="box-btn-upload">
                         <button class="btn btn-primary-hover btn-upload"
                             onclick="document.getElementById('formUploadCv').submit();">
                             Tải CV lên
                         </button>
                         <p class="text-highlight upload-process">Hệ thống đang xử lý CV của bạn thông thường mất từ 10 đến
                             15 giây, xin vui lòng đợi !!!</p>
                     </div>
                     <div class="box-info">
                         <div class="item ">
                             <div class="icon icon1">
                                 <i class="fa-solid fa-file-heart"></i>
                             </div>
                             <h3 class="title">Nhận về các cơ hội tốt nhất</h3>
                             <h4 class="sub-title">CV của bạn sẽ được ưu tiên hiển thị với các nhà tuyển dụng đã
                                 xác thực.
                                 Nhận được lời mời với những cơ hội việc làm hấp dẫn từ các doanh nghiệp uy tín.</h4>
                         </div>
                         <div class="item ">
                             <div class="icon icon2">
                                 <i class="fa-solid fa-chart-mixed"></i>
                             </div>
                             <h3 class="title">Theo dõi số liệu, tối ưu CV</h3>
                             <h4 class="sub-title">Theo dõi số lượt xem CV. Biết chính xác nhà tuyển dụng nào trên
                                 TopCV đang
                                 quan tâm đến CV của bạn.</h4>
                         </div>
                         <div class="item ">
                             <div class="icon icon3">
                                 <i class="fa-solid fa-paper-plane"></i>
                             </div>
                             <h3 class="title">Chia sẻ CV bất cứ nơi đâu</h3>
                             <h4 class="sub-title">Upload một lần và sử dụng đường link gửi tới nhiều nhà tuyển
                                 dụng.</h4>
                         </div>
                         <div class="item ">
                             <div class="icon icon4">
                                 <i class="fa-solid fa-message-captions"></i>
                             </div>
                             <h3 class="title">Kết nối nhanh chóng với nhà tuyển dụng</h3>
                             <h4 class="sub-title">Dễ dàng kết nối với các nhà tuyển dụng nào xem và quan tâm
                                 tới CV của bạn</h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
