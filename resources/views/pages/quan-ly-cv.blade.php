 @extends('layout')
 @section('content')
     <div class="container">
         <div class="row">
             <div class="col-sm-8" id="manager-cv">
                 <div id="cv-list" class="box-block">
                     <div class="box-header">
                         <h1 class="title">CV đã tạo trên TopCV</h1> <a href="https://www.topcv.vn/mau-cv"
                             class="btn btn-add-cv btn-primary-hover "><i class="fa-solid fa-plus"></i> Tạo mới</a>
                         <div id="createCVModal" tabindex="-1" role="dialog" class="modal fade">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-body">
                                         <h3 class="modal-title">Trải nghiệm Công cụ tạo CV mới nhất - <span
                                                 class="text-highlight">CV Builder 2.0</span>
                                             của TopCV</h3>
                                         <div class="box-content">
                                             <div class="item"><img
                                                     src="https://static.topcv.vn/v4/image/cv-manager/1.png" alt="">
                                                 <p>Linh hoạt chỉnh sửa màu sắc, thiết kế nội dung theo ý muốn</p>
                                             </div>
                                             <div class="item"><img
                                                     src="https://static.topcv.vn/v4/image/cv-manager/2.png" alt="">
                                                 <p>Dễ dàng điều chỉnh bố cục các mục trong CV</p>
                                             </div>
                                             <div class="item"><img
                                                     src="https://static.topcv.vn/v4/image/cv-manager/3.png" alt="">
                                                 <p>Kế thừa những điểm ưu việt của CV Builder 1.0</p>
                                             </div>
                                         </div>
                                         <div class="box-action"><a href="https://www.topcv.vn/mau-cv"
                                                 class="btn btn-topcv-primary-outline">Sử dụng
                                                 CV Builder 1.0</a> <a href="https://www.topcv.vn/mau-cv"
                                                 class="btn btn-topcv-primary btn-primary-hover">Trải nghiệm CV Builder
                                                 2.0</a></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="box-conten box-no-cv"><img src="https://static.topcv.vn/v4/image/cv-manager/no-cv.png"
                             alt="">
                         <p>Bạn chưa tạo CV nào</p>
                     </div>
                 </div>
                 <div id="cv-upload-list" class="box-block">
                     <div class="box-header">
                         <h1 class="title">CV đã tải lên TopCV</h1>
                         <a href="{{ route('cv.upload') }}" class="btn btn-upload-cv btn-primary-hover">
                             <i class="fa-solid fa-upload"></i> Tải CV lên
                         </a>
                     </div>

                     @if ($cvs->isEmpty())
                         <!-- Nếu không có CV -->
                         <div class="box-conten box-no-cv">
                             <img src="https://static.topcv.vn/v4/image/cv-manager/no-cv-upload.png" alt="">
                             <p>Bạn chưa tải lên CV nào</p>
                         </div>
                     @else
                         <!-- Nếu có CV -->
                         <div class="box-content">
                             <div class="row">
                                 @foreach ($cvs as $cv)
                                     <div class="col-md-6 col-12 pr-12">
                                         <div class="box-cv">
                                             <img src="{{ asset('storage/' . $cv->image_path) }}"
                                                 onerror="onErrorImage(this)" class="img-responsive entered loaded"
                                                 data-ll-status="loaded">
                                             <div class="box-bg">
                                                 <div class="cv-main">
                                                     <a data-container="body" data-toggle="tooltip" data-placement="top"
                                                         title="" data-cv-title="{{ $cv->cv_name }}"
                                                         class="tcv-tooltip"
                                                         data-original-title="Nhà tuyển dụng sẽ xem CV này của bạn trong mục Tìm kiếm ứng viên">
                                                     </a>
                                                 </div>
                                                 <div class="box-info">
                                                     <h4 class="title-cv">
                                                         <a href="{{ asset('storage/' . $cv->cv_path) }}" target="_blank"
                                                             class="title-{{ $cv->id }}">
                                                             {{ $cv->cv_name ?? $cv->cv_path }}
                                                         </a>
                                                         <a data-cv-upload-id="{{ $cv->id }}" class="edit">
                                                             <i class="fa-solid fa-pen"></i>
                                                         </a>
                                                     </h4>
                                                     <p class="update_at">Cập nhật lần cuối
                                                         <span>{{ $cv->updated_at->format('d-m-Y H:i A') }}</span>
                                                     </p>
                                                     <ul class="action">
                                                         <li><a href="{{ asset('storage/' . $cv->cv_path) }}"
                                                                 target="_blank" class="btn btn-sm bold"><i
                                                                     class="fa-solid fa-share"></i> Chia sẻ</a></li>
                                                         <li><a href="{{ asset('storage/' . $cv->cv_path) }}" download
                                                                 class="btn btn-sm bold"><i
                                                                     class="fa-solid fa-down-to-line"></i> Tải xuống</a>
                                                         </li>
                                                         <li><a href="javascript:void(0)" class="delete"
                                                                 data-cv-upload-id="{{ $cv->id }}"><i
                                                                     class="fa-regular fa-trash"></i></a></li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                             </div>
                             <div class="text-center"></div>
                         </div>
                     @endif
                 </div>
                 <!-- Modal -->
                 <div class="modal fade" id="editCvModal" tabindex="-1" role="dialog" aria-labelledby="editCvModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="editCvModalLabel">Chỉnh sửa tên CV</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <form id="editCvForm" method="POST" action="{{ route('cv.update.name') }}">
                                 @csrf
                                 <div class="modal-body">
                                     <input type="hidden" name="cv_id" id="editCvId">
                                     <div class="form-group">
                                         <label for="cvName" class="col-form-label">Tên CV:</label>
                                         <input type="text" class="form-control" id="cvName" name="cv_name"
                                             required>
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                     <button type="submit" class="btn btn-primary">Lưu</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <!-- Modal for Confirm Delete CV -->
                 <div class="modal fade" id="confirmDeleteCvModal" tabindex="-1" role="dialog"
                     aria-labelledby="confirmDeleteCvModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="confirmDeleteCvModalLabel">Xác nhận xóa CV</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <form id="deleteCvForm" method="POST" action="{{ route('cv.delete') }}">
                                 @csrf
                                 <div class="modal-body">
                                     <input type="hidden" name="cv_id" id="deleteCvId">
                                     <p>Bạn có chắc chắn muốn xóa CV này không?</p>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                     <button type="submit" class="btn btn-danger">Xóa</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <script>
                     $(document).ready(function() {
                         $('.delete').click(function(e) {
                             e.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
                             var cvId = $(this).data('cv-upload-id');
                             $('#deleteCvId').val(cvId);
                             $('#confirmDeleteCvModal').modal('show');
                         });
                     });
                 </script>
                 <script>
                     $(document).ready(function() {
                         $('.edit').click(function() {
                             var cvId = $(this).data('cv-upload-id');
                             var cvName = $(this).siblings('a').text();
                             $('#editCvId').val(cvId);
                             $('#cvName').val(cvName.trim());
                             $('#editCvModal').modal('show');
                         });
                     });
                 </script>
             </div>
         </div>
     </div>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="stylesheet" href="https://www.topcv.vn/v2/bootstrap/css/bootstrap.min.css?v=1.1.1">
     <link rel="stylesheet" href="https://www.topcv.vn/v2/plugins/select2/css/select2.min.css" />
     <link rel="stylesheet" href="https://www.topcv.vn/v3/css/notification.css?v=1.0.10">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/app.min.fa6e35ed40ac0f6cK.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/navbar_bs.48a14966e2c4f3ceK.css">
     <link rel="preload" as="style" onload="this.rel='stylesheet'"
         href="https://www.topcv.vn/v3/plugins/slick/slick.css?v=1.0.0">
     <link rel="preload" as="style" onload="this.rel='stylesheet'"
         href="https://www.topcv.vn/v3/plugins/slick/slick-theme.css?v=1.0.0">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/style.d8c1fe08632e5e88K.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/sidebar/box-sidebar-profile.af4c32d889bb9024K.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/components/common/ignore-cv-employer.e1c5492da1d7a17dK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/support-ticket/support-ticket.b6c89357bb501feaK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/partials/icon-verified-employer.min.59a8d20b3e34dfbfK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/anti-scam/anti-scam-popup.c5649f2e22fa75d8K.css?v=2.1.7">
     <script src="https://static.topcv.vn/v4/js/components/addon/slide-custom.1fe596cbde5867d1.js"></script>
     <script src="https://static.topcv.vn/v4/js/sign-in-popup.min.b45d0ba8edb038f3.js"></script>
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/components/addon/service-payment/service-payment.min.19d612aa801cdbffK.css">
     <script src="https://www.topcv.vn/v3/js/qrcode.min.js"></script>
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/icon.min.9bbbd0ac9d068264K.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/sign-in-popup.65a92cb48ed456d9K.css">
     <script async defer crossorigin="anonymous"
         src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1478418029113221&autoLogAppEvents=1"
         nonce="vRUcXWy5"></script>
     <link rel="stylesheet" href="https://www.topcv.vn/cv-new/css/download-v2.css?v=1.1.1">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/components/download-cv/download-cv.bae8846e2f67db9fK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/modals/profile/modal-open-to-work-success.min.28602a53cc00e938K.css">
     <script defer src="https://static.topcv.vn/v4/js/components/profile/modal-open-to-work-success.6ba1a9b5a5ed4e66.js">
     </script>
     <link rel="stylesheet" href="https://www.topcv.vn/v2/css/font.css?v=1.1.1">

     <link rel="stylesheet" href="https://www.topcv.vn/v2/css/animate.css?v=1.1.1">
     <link rel="stylesheet" href="https://www.topcv.vn/v3/css/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="https://www.topcv.vn/v3/css/cropper.min.css">
     <link rel="stylesheet" type="text/css" href="https://www.topcv.vn/packages/cvo/cropper/style.css?v=2.1">
     <link rel="stylesheet" href="https://www.topcv.vn/v3/plugins/icon8/css/styles.min.css">
     <link rel="stylesheet" href="https://www.topcv.vn/v2/plugins/switchery/switchery.min.css">
     <link rel="stylesheet" href="https://www.topcv.vn/v3/css/toastr.min.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/jobs/save-job.min.c9999edafec369a1K.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/support-ticket/modal-support-ticket.883d333234b516c9K.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/modal-cv-competitive-notification.min.6cd319d7597e2f70K.css">
     <script defer
         src="https://static.topcv.vn/v4/js/common/cv-competition/modal-cv-competition-notification.8e5c106c1249aa51.js">
     </script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="stylesheet" href="https://www.topcv.vn/v2/bootstrap/css/bootstrap.min.css?v=1.1.1">
     <link rel="stylesheet" href="https://www.topcv.vn/v2/plugins/select2/css/select2.min.css" />
     <link rel="stylesheet" href="https://www.topcv.vn/v3/css/notification.css?v=1.0.10">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/app.min.fa6e35ed40ac0f6cK.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/navbar_bs.48a14966e2c4f3ceK.css">
     <link rel="preload" as="style" onload="this.rel='stylesheet'"
         href="https://www.topcv.vn/v3/plugins/slick/slick.css?v=1.0.0">
     <link rel="preload" as="style" onload="this.rel='stylesheet'"
         href="https://www.topcv.vn/v3/plugins/slick/slick-theme.css?v=1.0.0">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/style.d8c1fe08632e5e88K.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/sidebar/box-sidebar-profile.af4c32d889bb9024K.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/components/common/ignore-cv-employer.e1c5492da1d7a17dK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/support-ticket/support-ticket.b6c89357bb501feaK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/partials/icon-verified-employer.min.59a8d20b3e34dfbfK.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/desktop/manager-cv.b6b84668d5c1950aK.css">
 @endsection
