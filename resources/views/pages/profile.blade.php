 @extends('layout')
 @section('content')
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
                         </div>
                     </div>
                     <div class="row turn-on-job__body" style="margin-top: 15px">
                         <input type="hidden" id="currentStatus" value="0">
                         <div id="on-off-job-waiting" class="">
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
                                         <img src="{{ asset('storage/' . $info->profile_banner_image) }}" alt="">
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
                                     <a href="{{ route('personal.profile.account') }}"
                                         class="btn btn-create-profile btn-sm">Tạo
                                         TopCV
                                         Profile</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     @endsection
