 @extends('layout')
 @section('content')
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/desktop/update-info.min.d09d237a2056cfd0K.css">
     <div class="container">
         <div class="row pt-24">
             <div class="col-sm-8">
                 <div class="box-group">
                     <div class="box-group-body">
                         <div class="box-white clearfix box-update-info">
                             <div class="box-header">
                                 <h4>Cài đặt thông tin cá nhân</h4>
                                 <span class="required"><span class="require_hight-light">(*)</span>&nbsp;Các
                                     thông
                                     tin bắt
                                     buộc</span>
                             </div>
                             <form id="profile-form" method="POST" action="{{ route('candidate.update.account') }}">
                                 @csrf
                                 <div class="box-content">
                                     <div class="box-need-work">
                                         <div class="box-item">
                                             <p>Họ và tên <span class="require_hight-light">*</span></p>
                                             <input type="text" class="form-control box-item__input"
                                                 placeholder="Nhập họ và tên" name="fullname"
                                                 value="{{ $candidate->fullname_candidate }}">
                                         </div>
                                         <div class="box-item">
                                             <p>Số điện thoại</p>
                                             <input type="text" class="form-control box-item__input"
                                                 placeholder="Nhập số điện thoại" name="phone"
                                                 value="{{ $candidate->phone_number_candidate }}">
                                         </div>
                                         <div class="box-item">
                                             <p>Email</p>
                                             <input type="text" class="form-control box-item__input"
                                                 value="{{ $candidate->email }}" disabled readonly>
                                         </div>
                                     </div>
                                     <div class="box-submit">
                                         <button type="submit" id="btn-topcv-update-profile-online"
                                             class="btn btn-topcv-primary">Lưu</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-4" id="sidebar">
                 <div class="modal fade" tabindex="-1" role="dialog" id="modal-email-password" aria-hidden="true"
                     style="display: none;">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <form action="" id="form-email-password">
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                             aria-hidden="true">×</span></button>
                                     <h4 class="modal-title text-center text-highlight">Cập nhật mật khẩu đăng nhập
                                     </h4>
                                     <div class="text-gray text-center">Sử dụng email và mật khẩu này để đăng nhập
                                         thay thế tài khoản Facebook</div>
                                 </div>
                                 <div class="modal-body">
                                     <div class="alert alert-danger" id="modal-email-password-errors" style="display: none">
                                         <ul></ul>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Email</label>
                                         <input type="text" class="form-control" value="phamvuluan131@gmail.com"
                                             disabled="">
                                     </div>

                                     <div class="form-group">
                                         <label for="">Password</label>
                                         <input type="password" class="form-control" name="password" placeholder="Password"
                                             required="">
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                     <button type="submit" class="btn btn-topcv-primary">Cập Nhật</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="box box-white box-setting-sidebar">
                     <div class="turn-on-job__header">
                         <div class="profile-avatar">
                             <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                 alt="" onerror="this.src='{{ asset('storage/avatar/avatar-default.jpg') }}'">
                             <span class="vip-badge" style="background-color: gray">VERIFIED</span>
                             <a href="{{ route('candidate.update.avatar') }}" class="change-avatar"
                                 data-target="#upload-profile-avatar" data-toggle="modal" id="btn-upload-avatar">
                                 <i class="fa-solid fa-camera"></i>
                             </a>
                             <form action="{{ route('candidate.update.avatar') }}" method="post"
                                 enctype="multipart/form-data" id="upload-avatar-form" style="display: none;">
                                 @csrf
                                 <input type="file" name="avatar" id="avatar-image">
                             </form>
                             <div id="imageEditorWraper" style="display: none;">
                                 <div class="container">
                                     <h3>Chỉnh sửa ảnh đại diện</h3>
                                     <div class="editor-col-left">
                                         <h4>Ảnh gốc</h4>
                                         <div class="imageEditor">
                                             <img src="">
                                         </div>
                                         <div class="editorChooseImage">
                                             <a href="#" class="btn-choose-image"><i
                                                     class="fa fa-picture-o"></i><br>Click chọn ảnh để tải lên!</a>
                                         </div>
                                         <div class="tipCompress"
                                             style="color: red; margin-top: 5px; margin-left: 20px; text-align: left;">
                                             Nếu ảnh của bạn có dung lượng trên 5MB, vui lòng
                                             <a href="https://compressor.io/compress" target="_blank" style="color:">bấm
                                                 vào đây</a> để giảm dung lượng ảnh.
                                         </div>
                                         <div class="loadingShow" style="display: none;">
                                             <i class="fa fa-spinner fa-spin"></i>
                                             <br><br>
                                             <span class="loadingMessage">Đang tải ảnh lên ...</span>
                                         </div>
                                     </div>
                                     <div class="editor-col-right">
                                         <h4>Ảnh đại diện hiển thị</h4>
                                         <div class="imageEditorControls">
                                             <div class="img-edit-preview"
                                                 style="border: 1px solid #efefef; border-radius: 50%">
                                                 <img src="{{ asset('storage/avatar/avatar-default.jpg') }}">
                                             </div>
                                             <div class="edit-image-btns">
                                                 <button type="button" class="btn-change-image">Đổi ảnh</button>
                                                 <button type="button" class="btn-remove-image">Xóa ảnh</button><br>
                                             </div>
                                             <div>
                                                 <button type="button" class="btn-save-image">Xong</button>
                                             </div>
                                             <div>
                                                 <a href="#" class="btn-close-image-editor"
                                                     title="Đóng trình chỉnh sửa (Không lưu thay đổi)">Đóng lại (Không
                                                     lưu)</a>
                                             </div>
                                             <form action="{{ route('candidate.update.avatar') }}" method="post"
                                                 id="saveEditedAvatar" style="display: none;">
                                                 @csrf
                                                 <input type="hidden" name="key" value="">
                                                 <input type="hidden" name="cropx" id="inpCropX" value="">
                                                 <input type="hidden" name="cropy" id="inpCropY" value="">
                                                 <input type="hidden" name="cropw" id="inpCropW" value="">
                                                 <input type="hidden" name="croph" id="inpCropH" value="">
                                                 <input type="hidden" name="rotate" id="inpRotate" value="0">
                                                 <input type="hidden" name="noimage" id="inpNoImage" value="0">
                                                 <input type="hidden" name="imgChanged" id="imgChanged" value="0">
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>


                         <div class="turn-on-job__header-info">
                             <div class="text-welcome">Chào bạn trở lại,</div>
                             <h4 class="profile-fullname">{{ $candidate->fullname_candidate }}</h4>
                             <div class="account-type vip">
                                 <span style="background-color:  gray">
                                     Tài khoản đã xác thực
                                 </span>
                             </div>
                             <div class="box-footer">
                                 <a href="https://www.topcv.vn/tai-khoan/nang-cap" class="btn btn-sm btn-upgrade">
                                     <i class="fa-solid fa-circle-arrow-up"></i>
                                     <span>
                                         Nâng cấp tài khoản
                                     </span>
                                 </a>
                             </div>
                         </div>
                     </div>
                     <div class="row turn-on-job__body" style="margin-top: 15px">
                         <input type="hidden" id="currentStatus" value="0">
                         <div id="on-off-job-waiting" class="">
                             <div class="col-xs-12 group-switch">
                                 <label class="switch">
                                     <input type="checkbox" value="1" id="btn-job-waiting">
                                     <span class="slider round"></span>
                                 </label>
                                 <span class="job-waiting-status-text job-off-show">
                                     <strong class="text-neutral-neutral-40">Đang Tắt tìm việc</strong>
                                 </span>
                                 <span class="job-waiting-status-text job-on-show">
                                     <strong class="text-highlight">Trạng thái tìm việc đang bật</strong>
                                 </span>
                             </div>
                             <div class="col-xs-12">
                                 <p class="job-waiting-description" id="job-waiting-text">
                                     Bật tìm việc giúp hồ sơ của bạn nổi bật hơn và được chú ý nhiều hơn trong danh
                                     sách tìm kiếm của
                                     NTD.
                                 </p>
                                 <div id="box-job-waiting" class="box-job-waiting" style="display: none;">
                                     <div class="box-job-waiting__title">
                                         Trạng thái <span class="highlight">Bật tìm việc</span> sẽ tự động tắt sau
                                         <b class="highlight" id="time-remaining-turn-on-job"></b>. Nếu bạn vẫn
                                         còn nhu cầu tìm việc, hãy <span class="highlight">Bật tìm
                                             việc trở lại</span>
                                     </div>
                                     <div class="box-job-waiting__cv-choose">
                                         <div class="box-job-waiting__cv-choose--icon">
                                             <i class="fa-solid fa-file-lines"></i>
                                         </div>
                                         <div class="box-job-waiting__cv-choose--text">
                                             <span id="text-count-cv-turn-on-job">0</span> CV đang được chọn
                                         </div>
                                         <div class="box-job-waiting__cv-choose--button" id="btn-edit-job-waiting">
                                             Thay đổi
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xs-12 group-switch">
                                 <label class="switch">
                                     <input type="checkbox" value="1" id="btn-allow-epl-view-cv" checked="">
                                     <span class="slider round"></span>
                                 </label>
                                 <span class="job-waiting-status-text">
                                     <strong id="text-allow-epl-view-cv" class=" text-highlight ">
                                         Cho phép NTD tìm kiếm hồ sơ
                                     </strong>
                                 </span>
                             </div>
                             <div id="box-profile-active" class="col-xs-12">
                                 <div class="description-allow-employee-search">
                                     <p>
                                         Khi có cơ hội việc làm phù hợp, NTD sẽ liên hệ và trao đổi với bạn qua:
                                     </p>
                                     <ul>
                                         <li>Nhắn tin qua Top Connect trên TopCV</li>
                                         <li>Email và Số điện thoại của bạn</li>
                                     </ul>
                                     <div class="banner--app  ">
                                         <img src="https://static.topcv.vn/v4/image/app/banner--app.png" alt="">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xs-12">
                                 <div class="job-waiting-description" id="allow-view-cv-text">
                                 </div>
                                 <div>
                                     <p class="job-waiting-description d-flex border-top ">
                                         <i class="fa-light fa-circle-info"></i>
                                         <span>
                                             Khởi tạo TopCV Profile để gia tăng 300% cơ hội việc làm tốt
                                         </span>
                                     </p>
                                     <a href="https://www.topcv.vn/profile" class="btn btn-create-profile btn-sm">Tạo
                                         TopCV
                                         Profile</a>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="modal fade modal-turn-on-job modal-slide-up" role="dialog" id="modalTurnOnJob"
                         data-backdrop="static" data-keyboard="false">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-turn-on-job__header">
                                     <div class="modal-turn-on-job__header--content content">
                                         <h3 class="content__title">
                                             Bật tìm việc ngay để không bỏ lỡ những cơ hội đặc biệt hấp dẫn
                                         </h3>
                                         <p class="content__desc">
                                             Vui lòng lựa chọn các CV bạn muốn bật tìm việc Hoặc click "Tôi không có
                                             nhu cầu" để bỏ qua
                                         </p>
                                     </div>
                                     <div class="modal-turn-on-job__header--image">
                                         <img src="https://static.topcv.vn/v4/image/turn-on-job/img-header.png"
                                             alt="">
                                     </div>
                                     <div class="modal-turn-on-job__header--close" id="btn-close-turn-on-job">
                                         <i class="fa-solid fa-xmark"></i>
                                     </div>
                                 </div>
                                 <div class="modal-turn-on-job__cv-empty">
                                     <img class="modal-turn-on-job__cv-empty--img"
                                         src="https://static.topcv.vn/v4/image/turn-on-job/img-empty.png" alt="">
                                     <p class="modal-turn-on-job__cv-empty--desc">Bạn chưa có CV nào.<br>Vui lòng
                                         tạo
                                         CV mới để bật tìm
                                         việc
                                     </p>
                                     <div class="modal-turn-on-job__cv-empty--button-create-cv">
                                         <a href="https://www.topcv.vn/mau-cv">Tạo CV mới</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="overlay-modal-open-to-work-success" style="display: none">
                     </div>
                     <div id="modal-open-to-work-success" style="display: none">
                         <div class="popup-wrapper">
                             <div class="popup-wrapper__close">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <g clip-path="url(#clip0_3143_1352)">
                                         <path
                                             d="M16.75 15.7192C17.0312 16.0317 17.0312 16.5005 16.75 16.7817C16.4375 17.0942 15.9688 17.0942 15.6875 16.7817L12 13.063L8.28125 16.7817C7.96875 17.0942 7.5 17.0942 7.21875 16.7817C6.90625 16.5005 6.90625 16.0317 7.21875 15.7192L10.9375 12.0005L7.21875 8.28174C6.90625 7.96924 6.90625 7.50049 7.21875 7.21924C7.5 6.90674 7.96875 6.90674 8.25 7.21924L12 10.9692L15.7188 7.25049C16 6.93799 16.4688 6.93799 16.75 7.25049C17.0625 7.53174 17.0625 8.00049 16.75 8.31299L13.0312 12.0005L16.75 15.7192Z"
                                             fill="#263A4D"></path>
                                     </g>
                                     <defs>
                                         <clipPath id="clip0_3143_1352">
                                             <rect width="24" height="24" fill="white"
                                                 transform="translate(0 0.000488281)"></rect>
                                         </clipPath>
                                     </defs>
                                 </svg>
                             </div>
                             <div class="popup-wrapper__logo">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                     viewBox="0 0 36 36" fill="none">
                                     <path fill-rule="evenodd" clip-rule="evenodd"
                                         d="M32.3597 6.46444C33.139 7.14634 33.2179 8.33089 32.5362 9.11022L16.1299 27.8602C15.4504 28.6366 14.2714 28.7184 13.4915 28.043L3.64774 19.5204C2.86485 18.8425 2.77969 17.6583 3.4575 16.8755C4.13532 16.0927 5.31945 16.0074 6.10232 16.6852L14.536 23.9872L29.7139 6.64082C30.3959 5.8615 31.5805 5.78252 32.3597 6.46444Z"
                                         fill="white"></path>
                                 </svg>
                             </div>
                             <div class="popup-wrapper__body-description">
                                 <div class="popup-wrapper__body-description--title">
                                     Bật tìm việc thành công
                                 </div>
                                 <div class="popup-wrapper__body-description--content">
                                     Khi có cơ hội việc làm phù hợp, Nhà tuyển dụng sẽ chủ động liên hệ và trao đổi
                                     với bạn qua:
                                 </div>
                                 <div class="popup-wrapper__body-description--list">
                                     <div class="popup-wrapper__body-description--list-item">
                                         <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <rect y="0.000488281" width="16" height="16" rx="8"
                                                 fill="#E3FAED">
                                             </rect>
                                             <g clip-path="url(#clip0_2515_81158)">
                                                 <path
                                                     d="M12.375 5.75049C12.375 5.92627 12.2969 6.08252 12.1797 6.19971L7.17969 11.1997C7.0625 11.3169 6.90625 11.3755 6.75 11.3755C6.57422 11.3755 6.41797 11.3169 6.30078 11.1997L3.80078 8.69971C3.68359 8.58252 3.625 8.42627 3.625 8.25049C3.625 7.89893 3.89844 7.62549 4.25 7.62549C4.40625 7.62549 4.5625 7.70361 4.67969 7.8208L6.75 9.87158L11.3008 5.3208C11.418 5.20361 11.5742 5.12549 11.75 5.12549C12.082 5.12549 12.375 5.39893 12.375 5.75049Z"
                                                     fill="#00B14F"></path>
                                             </g>
                                             <defs>
                                                 <clipPath id="clip0_2515_81158">
                                                     <rect width="16" height="16" fill="white"
                                                         transform="translate(0 0.000488281)"></rect>
                                                 </clipPath>
                                             </defs>
                                         </svg>
                                         Nhắn tin qua Top Connect trên TopCV*
                                     </div>
                                     <div class="popup-wrapper__body-description--list-item">
                                         <div class="popup-wrapper__body-description--list-item">
                                             <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <rect y="0.000488281" width="16" height="16" rx="8"
                                                     fill="#E3FAED">
                                                 </rect>
                                                 <g clip-path="url(#clip0_2515_81158)">
                                                     <path
                                                         d="M12.375 5.75049C12.375 5.92627 12.2969 6.08252 12.1797 6.19971L7.17969 11.1997C7.0625 11.3169 6.90625 11.3755 6.75 11.3755C6.57422 11.3755 6.41797 11.3169 6.30078 11.1997L3.80078 8.69971C3.68359 8.58252 3.625 8.42627 3.625 8.25049C3.625 7.89893 3.89844 7.62549 4.25 7.62549C4.40625 7.62549 4.5625 7.70361 4.67969 7.8208L6.75 9.87158L11.3008 5.3208C11.418 5.20361 11.5742 5.12549 11.75 5.12549C12.082 5.12549 12.375 5.39893 12.375 5.75049Z"
                                                         fill="#00B14F"></path>
                                                 </g>
                                                 <defs>
                                                     <clipPath id="clip0_2515_81158">
                                                         <rect width="16" height="16" fill="white"
                                                             transform="translate(0 0.000488281)"></rect>
                                                     </clipPath>
                                                 </defs>
                                             </svg>
                                             Email và Số điện thoại của bạn
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="popup-wrapper__body-line"></div>
                             <div class="popup-wrapper__body-qr">
                                 <div class="popup-wrapper__body-qr--description">
                                     *Tải ứng dụng Top CV để nhận thông báo ngay lập tức khi bạn có tin nhắn mới và
                                     không bỏ lỡ bất cứ cơ hội nào từ Nhà tuyển dụng bạn nhé.
                                 </div>
                                 <div class="popup-wrapper__body-qr--img">
                                     <img class="competitive-rating__img--qr"
                                         src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/qr-detail-job-feature.png"
                                         alt="QR Code">
                                     <span>Quét QR để tải app</span>
                                 </div>
                             </div>
                             <div class="popup-wrapper__body-warning" id="open-to-work-warning">
                                 <div class="popup-wrapper__body-warning--icon">
                                     <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <g clip-path="url(#clip0_3143_6423)">
                                             <path
                                                 d="M10 2.74951C13.8555 2.74951 17 5.89404 17 9.74951C17 13.6323 13.8555 16.7495 10 16.7495C6.11719 16.7495 3 13.6323 3 9.74951C3 5.89404 6.11719 2.74951 10 2.74951ZM10 6.24951C9.50781 6.24951 9.125 6.65967 9.125 7.12451C9.125 7.6167 9.50781 7.99951 10 7.99951C10.4648 7.99951 10.875 7.6167 10.875 7.12451C10.875 6.65967 10.4648 6.24951 10 6.24951ZM11.0938 13.2495C11.4492 13.2495 11.75 12.9761 11.75 12.5933C11.75 12.2378 11.4492 11.937 11.0938 11.937H10.6562V9.53076C10.6562 9.17529 10.3555 8.87451 10 8.87451H9.125C8.74219 8.87451 8.46875 9.17529 8.46875 9.53076C8.46875 9.91357 8.74219 10.187 9.125 10.187H9.34375V11.937H8.90625C8.52344 11.937 8.25 12.2378 8.25 12.5933C8.25 12.9761 8.52344 13.2495 8.90625 13.2495H11.0938Z"
                                                 fill="#286AC6"></path>
                                         </g>
                                         <defs>
                                             <clipPath id="clip0_3143_6423">
                                                 <rect width="20" height="20" fill="white"
                                                     transform="translate(0 -0.000488281)"></rect>
                                             </clipPath>
                                         </defs>
                                     </svg>
                                 </div>
                                 <div class="popup-wrapper__body-warning--content">
                                     CV <span id="open-to-work-warning-cv-name"></span> của bạn đã lâu chưa được
                                     cập
                                     nhật. Hãy cập nhật để Nhà tuyển dụng nắm được những thông tin mới nhất về năng
                                     lực, kinh nghiệm của bạn nhé.
                                     <a href="#" target="_blank" id="open-to-work-warning-link">Cập nhật
                                         CV ngay</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <script>
                         APP_DOWNLOAD_URL = 'https://www.topcv.vn/app-download'
                     </script>
                     <link rel="stylesheet"
                         href="https://static.topcv.vn/v4/css/components/modals/profile/modal-open-to-work-success.min.739713a80816bf2eG.css">
                     <script defer="" src="https://static.topcv.vn/v4/js/components/profile/modal-open-to-work-success.6ba1a9b5a5ed4e66.js">
                     </script>
                 </div>
                 <script src="https://static.topcv.vn/v4/js/components/mobile-app/download-app-component.c9a553da008b283d.js"></script>
                 <div class="box box-white text-center-sm box-employee-view-cv">
                     <div class="row">
                         <div class=" cv-count-header">
                             <div class="text-highlight">
                                 <strong style="font-size: 16px;">CV của bạn đã đủ tốt?</strong>
                                 <p class="text-neutral-neutral-40">Bao nhiêu NTD đang quan tâm tới Hồ sơ của bạn?
                                 </p>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="cv-count  gray ">
                                 <div class="cv-count-number">0</div>
                                 <div>lượt</div>
                             </div>
                         </div>
                         <div class="col-md-8" style="padding-top: 5px">
                             <p>Mỗi lượt Nhà tuyển dụng xem CV mang đến một cơ hội để bạn gần hơn với công việc phù
                                 hợp.</p>
                             <div class="">
                                 <a href="https://www.topcv.vn/xem-ho-so" target="_blank"
                                     class="btn btn-sm btn-topcv-primary">Khám phá ngay</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>




     <script src="https://www.topcv.vn/js/jquery.form.js" type="text/javascript"></script>
     <script src="https://www.topcv.vn/v3/js/cropper.min.js"></script>
     <script src="https://www.topcv.vn/v3/js/axios.js"></script>
     <script src="https://www.topcv.vn/v2/plugins/switchery/switchery.min.js"></script>
     <script src="https://www.topcv.vn/v3/js/jquery-ui.min.js"></script>
     <script src="https://www.topcv.vn/v3/js/jobs.js?v=3.0.0" type="text/javascript"></script>
     <script src="https://www.topcv.vn/v3/js/init-cropper.js?v=1.0.1"></script>
     <link rel="stylesheet" type="text/css" href="https://www.topcv.vn/packages/cvo/cropper/style.css?v=2.1">
     <script src="https://www.topcv.vn/v3/js/topcv-connect.js?v=1.0.8"></script>
     <script>
         window.routes = {
             'upload-avatar-user': 'https://www.topcv.vn/ajax-upload-avatar',
         }
     </script>


     <script src="https://static.topcv.vn/v4/js/components/turn-on-job/turn-on-job.7d7a19f928f6be6a.js"></script>
     <script src="https://static.topcv.vn/v4/js/components/nav-header.564259730905beea.js"></script>
     <div class="modal fade" id="evaluate-tool-cv-modal-success" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"><span
                             aria-hidden="true">×</span></button>
                 </div>
                 <div class="modal-body">
                     <div class="section-icon">
                         <div class="box-icon">
                             <i class="fa-solid fa-check"></i>
                         </div>
                     </div>
                     <p class="title">Cảm ơn bạn đã gửi đánh giá!</p>
                     <span class="desc">Chúc bạn một ngày tốt lành</span>
                 </div>
             </div>
         </div>
     </div>
     <div id="shimeji-workArea"
         style="position: fixed; background: transparent; z-index: 2147483643; width: 100vw; height: 100vh; left: 0px; top: 0px; transform: translate(0px, 0px); pointer-events: none;">
     </div>
     <script id="" text="" charset="" type="text/javascript" src="//topcvvn.api.useinsider.com/ins.js?id=10004264"
         nonce="vRUcXWy5"></script>
     <script type="text/javascript" id="" charset="">
         window.woorankAssistantOptions = window.woorankAssistantOptions || {};
         window.woorankAssistantOptions.url = "topcv.vn";
         window.woorankAssistantOptions.assistantPublicKey = "287a5a3e534ada7508ee0048db88658ae8a8abd3";
         (function() {
             var a = document.createElement("script");
             a.type = "text/javascript";
             a.async = !0;
             a.src = "https://assistant.woorank.com/hydra/assistantLoader.latest.js";
             var b = document.getElementsByTagName("script")[0];
             b.parentNode.insertBefore(a, b)
         })();
     </script>
 @endsection
