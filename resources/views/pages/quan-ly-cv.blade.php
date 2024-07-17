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
                                             <img src="{{ asset('storage/' . $cv->image_path) }}" onerror="onErrorImage(this)"
                                                 class="img-responsive entered loaded" data-ll-status="loaded">
                                             <div class="box-bg">
                                                 <div class="cv-main">
                                                     <a data-container="body" data-toggle="tooltip" data-placement="top"
                                                         title="" data-cv-title="{{ $cv->cv_name }}"
                                                         class="tcv-tooltip"
                                                         data-original-title="Nhà tuyển dụng sẽ xem CV này của bạn trong mục Tìm kiếm ứng viên">
                                                         <i class="fa fa-star"></i> Đặt làm CV chính
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

                 <div class="box-block box-profile">
                     <div class="box-header">
                         <h1 class="title">TopCV Profile</h1>
                         <a href="javascript:void(0)">Cập nhật lần cuối ngày 07/07/2024</a>
                     </div>
                     <div class="banner-profile">
                         <img src="https://www.topcv.vn/images/profile_default_cover.jpg" class="img-responsive">
                     </div>
                     <div class="info-profile">
                         <div class="avatar-profile">
                             <img src="https://www.topcv.vn/images/avatar-default.jpg" class="img-responsive">
                         </div>
                         <div class="action">
                             <div class="name">
                                 <p>
                                     <b>7467_ Phạm Vũ Luân</b>
                                 </p>
                             </div>
                             <ul class="list-action">
                                 <li><a href="https://www.topcv.vn/profile?isView=0&amp;ta_source=ViewProfileInManagerCV"><i
                                             class="fa-solid fa-pen"></i> Chỉnh sửa</a></li>
                                 <li><a href="https://www.topcv.vn/profile?isView=1&amp;ta_source=ViewProfileInManagerCV"
                                         target="_blank"><i class="fa-solid fa-eye"></i> Xem</a></li>
                                 <li><a href="javascript:void(0)" data-cv-id="0aa1f8218e2e348f2b70e8fdccd7d963"
                                         class=" active-cv-profile-main"> <i class="fa fa-star "></i> <span>Đặt làm CV
                                             chính</span> </a></li>
                             </ul>
                         </div>
                     </div>
                     <div class="bottom">
                         <p>TopCV Profile là tính năng giúp bạn giới thiệu với mọi người mình là ai, đã làm gì và những
                             thành tích nổi bật của bạn.</p>
                         <a href="https://blog.topcv.vn/su-dung-topcv-profile-nhu-the-nao-cho-hieu-qua/"
                             target="_blank">Tìm
                             hiểu ngay</a>
                     </div>
                 </div>
                 <!-- Modal -->
                 <div class="modal fade" id="editCvModal" tabindex="-1" role="dialog"
                     aria-labelledby="editCvModalLabel" aria-hidden="true">
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


                 <div id="suggest-ai">
                     <div class="box-group">
                         <div class="box-group-header">
                             <div class="box-group-title mb-12px">
                                 Việc làm phù hợp với bạn
                             </div>
                             <p>Để nhận được gợi ý việc làm chính xác hơn, hãy <a target="_blank"
                                     href="https://www.topcv.vn/cai-dat-goi-y-viec-lam" class="text-highlight">tùy chỉnh
                                     cài
                                     đặt gợi ý việc làm</a>.</p>
                         </div>
                         <div class="box-group-body">
                             <div class="suggestion-jobs">
                                 <link rel="stylesheet"
                                     href="https://static.topcv.vn/v4/css/components/desktop/jobs/job-list-default.97543bda8f4055bcK.css">

                                 <div class="job-list-default">
                                     <div class="job-item-default
                                 job-ta
                                "
                                         data-job-id="976479" data-job-position="1" data-u-sr-id=""
                                         data-box="SuggestJobBox"
                                         data-jr-id="freezing-runway-5::1720992571211-d69d75::c08510734a904e52a6f7920b341d44d4::3::0.4523"
                                         id="featured-suggest-976479">
                                         <div class="avatar">
                                             <a target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/lap-trinh-vien-php/976479.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3Ac08510734a904e52a6f7920b341d44d4%3A%3A3%3A%3A0.4523">
                                                 <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cong-ty-phan-mem-dat-viet-5ea67abdb10c0.jpg"
                                                     class="w-100" alt="Công ty TNHH Phần Mềm Dsoft"
                                                     title="Lập Trình Viên PHP">
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
                                                                 href="https://www.topcv.vn/viec-lam/lap-trinh-vien-php/976479.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3Ac08510734a904e52a6f7920b341d44d4%3A%3A3%3A%3A0.4523">
                                                                 <span data-toggle="tooltip" data-container="body"
                                                                     data-placement="top" title=""
                                                                     data-original-title="Lập Trình Viên PHP">Lập Trình
                                                                     Viên PHP</span>
                                                             </a>
                                                         </h3>
                                                         <a rel="nofollow" class="company"
                                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-phan-mem-dsoft/27213.html"
                                                             data-toggle="tooltip" title="" data-placement="top"
                                                             target="_blank"
                                                             data-original-title="Công ty TNHH Phần Mềm Dsoft">Công ty TNHH
                                                             Phần Mềm Dsoft</a>

                                                     </div>


                                                     <div class="box-right">
                                                         <label class="title-salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             Thoả thuận
                                                         </label>
                                                     </div>
                                                 </div>



                                             </div>


                                             <div class="info">
                                                 <div class="label-content">
                                                     <label class="address" data-toggle="tooltip" data-html="true"
                                                         title="" data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 12</p>">Hồ
                                                         Chí Minh</label>
                                                     <label class="time mobile-hidden">
                                                         Còn
                                                         <strong>47</strong>
                                                         ngày để ứng tuyển
                                                     </label>

                                                     <label class="address" data-container="body">
                                                         Cập nhật 6 ngày trước

                                                     </label>
                                                 </div>
                                                 <div class="icon">
                                                     <button data-job-id="976479" data-apply-url=""
                                                         data-redirect-to="https://www.topcv.vn/viec-lam/lap-trinh-vien-php/976479.html?ta_source=JobSuggestInManagerCV_ButtonApplyFormCard&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3Ac08510734a904e52a6f7920b341d44d4%3A%3A3%3A%3A0.4523"
                                                         class="btn btn-apply-now">
                                                         <span>Ứng tuyển</span>
                                                     </button>
                                                     <div id="box-save-job-976479"
                                                         class="box-save-job  box-save-job-hover   job-notsave ">
                                                         <a href="javascript:void(0)" class="btn-save save"
                                                             data-id="976479" data-title="Lưu" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="" title="">
                                                             <span id="save-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-regular fa-heart"></i>
                                                         </a>
                                                         <a href="javascript:void(0)"
                                                             class="btn-unsave unsave text-highlight"
                                                             data-toggle="tooltip" title="" data-id="976479"
                                                             data-title="Lập Trình Viên PHP" data-placement="top"
                                                             data-original-title="Bỏ lưu">
                                                             <span id="unsave-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-solid fa-heart"></i>
                                                         </a>
                                                     </div>
                                                     <div class="btn-remove-job">
                                                         <a href="javascript:showConfirmIgnoreJob(976479)" class=""
                                                             title="Ẩn tin tuyển dụng này">
                                                             <i class="fa-regular fa-trash"></i>
                                                         </a>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="job-item-default
                                 job-ta
                                "
                                         data-job-id="1322992" data-job-position="2" data-u-sr-id=""
                                         data-box="SuggestJobBox"
                                         data-jr-id="freezing-runway-5::1720992571211-d69d75::51579cf3551d4181a384b195aaaf37d0::6::0.3199"
                                         id="featured-suggest-1322992">
                                         <div class="avatar">
                                             <a target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/php-developer/1322992.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A51579cf3551d4181a384b195aaaf37d0%3A%3A6%3A%3A0.3199">
                                                 <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/6FyeNNLZ8XYsKgTEtgyR1QlqSwKVnuY4_1710123290____3307e8bbc82b046d5a7b89be02676a42.png"
                                                     class="w-100" alt="CÔNG TY TNHH  BANANALINK" title="PHP Developer">
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
                                                                 href="https://www.topcv.vn/viec-lam/php-developer/1322992.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A51579cf3551d4181a384b195aaaf37d0%3A%3A6%3A%3A0.3199">
                                                                 <span data-toggle="tooltip" data-container="body"
                                                                     data-placement="top" title=""
                                                                     data-original-title="PHP Developer">PHP
                                                                     Developer</span>
                                                             </a>
                                                         </h3>
                                                         <a rel="nofollow" class="company"
                                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-bananalink/165205.html"
                                                             data-toggle="tooltip" title="" data-placement="top"
                                                             target="_blank"
                                                             data-original-title="CÔNG TY TNHH  BANANALINK">CÔNG TY TNHH
                                                             BANANALINK</a>

                                                     </div>


                                                     <div class="box-right">
                                                         <label class="title-salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             Thoả thuận
                                                         </label>
                                                     </div>
                                                 </div>



                                             </div>


                                             <div class="info">
                                                 <div class="label-content">
                                                     <label class="address" data-toggle="tooltip" data-html="true"
                                                         title="" data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Bình Thạnh</p>">Hồ
                                                         Chí Minh</label>
                                                     <label class="time mobile-hidden">
                                                         Còn
                                                         <strong>17</strong>
                                                         ngày để ứng tuyển
                                                     </label>

                                                     <label class="address" data-container="body">
                                                         Cập nhật 1 tuần trước

                                                     </label>
                                                 </div>
                                                 <div class="icon">
                                                     <button data-job-id="1322992" data-apply-url=""
                                                         data-redirect-to="https://www.topcv.vn/viec-lam/php-developer/1322992.html?ta_source=JobSuggestInManagerCV_ButtonApplyFormCard&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A51579cf3551d4181a384b195aaaf37d0%3A%3A6%3A%3A0.3199"
                                                         class="btn btn-apply-now">
                                                         <span>Ứng tuyển</span>
                                                     </button>
                                                     <div id="box-save-job-1322992"
                                                         class="box-save-job  box-save-job-hover   job-notsave ">
                                                         <a href="javascript:void(0)" class="btn-save save"
                                                             data-id="1322992" data-title="Lưu" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="" title="">
                                                             <span id="save-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-regular fa-heart"></i>
                                                         </a>
                                                         <a href="javascript:void(0)"
                                                             class="btn-unsave unsave text-highlight"
                                                             data-toggle="tooltip" title="" data-id="1322992"
                                                             data-title="PHP Developer" data-placement="top"
                                                             data-original-title="Bỏ lưu">
                                                             <span id="unsave-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-solid fa-heart"></i>
                                                         </a>
                                                     </div>
                                                     <div class="btn-remove-job">
                                                         <a href="javascript:showConfirmIgnoreJob(1322992)" class=""
                                                             title="Ẩn tin tuyển dụng này">
                                                             <i class="fa-regular fa-trash"></i>
                                                         </a>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="job-item-default
                                 job-ta
                                "
                                         data-job-id="1082073" data-job-position="3" data-u-sr-id=""
                                         data-box="SuggestJobBox"
                                         data-jr-id="freezing-runway-5::1720992571211-d69d75::037129278aa044e3b1068597f76de640::8::0.2671"
                                         id="featured-suggest-1082073">
                                         <div class="avatar">
                                             <a target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/senior-php-developer-laravel-mysql/1082073.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A037129278aa044e3b1068597f76de640%3A%3A8%3A%3A0.2671">
                                                 <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cong-ty-tnhh-mtv-phan-mem-javac-technology-5cd3e936c7811.jpg"
                                                     class="w-100" alt="Công Ty TNHH MTV Phần Mềm Javac Technology"
                                                     title="Senior PHP Developer (Laravel, MySQL)">
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
                                                                 href="https://www.topcv.vn/viec-lam/senior-php-developer-laravel-mysql/1082073.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A037129278aa044e3b1068597f76de640%3A%3A8%3A%3A0.2671">
                                                                 <span data-toggle="tooltip" data-container="body"
                                                                     data-placement="top" title=""
                                                                     data-original-title="Senior PHP Developer (Laravel, MySQL)">Senior
                                                                     PHP Developer (Laravel, MySQL)</span>
                                                             </a>
                                                         </h3>
                                                         <a rel="nofollow" class="company"
                                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-mtv-phan-mem-javac-technology/20858.html"
                                                             data-toggle="tooltip" title="" data-placement="top"
                                                             target="_blank"
                                                             data-original-title="Công Ty TNHH MTV Phần Mềm Javac Technology">Công
                                                             Ty TNHH MTV Phần Mềm Javac Technology</a>

                                                     </div>


                                                     <div class="box-right">
                                                         <label class="title-salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             Thoả thuận
                                                         </label>
                                                     </div>
                                                 </div>



                                             </div>


                                             <div class="info">
                                                 <div class="label-content">
                                                     <label class="address" data-toggle="tooltip" data-html="true"
                                                         title="" data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Tân Bình</p>">Hồ
                                                         Chí Minh</label>
                                                     <label class="time mobile-hidden">
                                                         Còn
                                                         <strong>23</strong>
                                                         ngày để ứng tuyển
                                                     </label>

                                                     <label class="address" data-container="body">
                                                         Cập nhật 6 ngày trước

                                                     </label>
                                                 </div>
                                                 <div class="icon">
                                                     <button data-job-id="1082073" data-apply-url=""
                                                         data-redirect-to="https://www.topcv.vn/viec-lam/senior-php-developer-laravel-mysql/1082073.html?ta_source=JobSuggestInManagerCV_ButtonApplyFormCard&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A037129278aa044e3b1068597f76de640%3A%3A8%3A%3A0.2671"
                                                         class="btn btn-apply-now">
                                                         <span>Ứng tuyển</span>
                                                     </button>
                                                     <div id="box-save-job-1082073"
                                                         class="box-save-job  box-save-job-hover   job-notsave ">
                                                         <a href="javascript:void(0)" class="btn-save save"
                                                             data-id="1082073" data-title="Lưu" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="" title="">
                                                             <span id="save-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-regular fa-heart"></i>
                                                         </a>
                                                         <a href="javascript:void(0)"
                                                             class="btn-unsave unsave text-highlight"
                                                             data-toggle="tooltip" title="" data-id="1082073"
                                                             data-title="Senior PHP Developer (Laravel, MySQL)"
                                                             data-placement="top" data-original-title="Bỏ lưu">
                                                             <span id="unsave-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-solid fa-heart"></i>
                                                         </a>
                                                     </div>
                                                     <div class="btn-remove-job">
                                                         <a href="javascript:showConfirmIgnoreJob(1082073)" class=""
                                                             title="Ẩn tin tuyển dụng này">
                                                             <i class="fa-regular fa-trash"></i>
                                                         </a>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="job-item-default
                                 job-ta
                                "
                                         data-job-id="540530" data-job-position="4" data-u-sr-id=""
                                         data-box="SuggestJobBox"
                                         data-jr-id="freezing-runway-5::1720992571211-d69d75::f0d8b384797245779d5c710abbb3c585::13::0.1964"
                                         id="featured-suggest-540530">
                                         <div class="avatar">
                                             <a target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/front-end-developer-fresher/540530.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3Af0d8b384797245779d5c710abbb3c585%3A%3A13%3A%3A0.1964">
                                                 <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cong-ty-tnhh-allgrow-labo-c81fc13f43ed30a5647ef23e13d70afd-5e66eaf0e0e67.jpg"
                                                     class="w-100" alt="Công ty TNHH Allgrow-labo"
                                                     title="Front-End Developer (Fresher)">
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
                                                                 href="https://www.topcv.vn/viec-lam/front-end-developer-fresher/540530.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3Af0d8b384797245779d5c710abbb3c585%3A%3A13%3A%3A0.1964">
                                                                 <span data-toggle="tooltip" data-container="body"
                                                                     data-placement="top" title=""
                                                                     data-original-title="Front-End Developer (Fresher)">Front-End
                                                                     Developer (Fresher)</span>
                                                             </a>
                                                         </h3>
                                                         <a rel="nofollow" class="company"
                                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-allgrow-labo/29699.html"
                                                             data-toggle="tooltip" title="" data-placement="top"
                                                             target="_blank"
                                                             data-original-title="Công ty TNHH Allgrow-labo">Công ty TNHH
                                                             Allgrow-labo</a>

                                                     </div>


                                                     <div class="box-right">
                                                         <label class="title-salary">
                                                             Tới 9.5 triệu
                                                         </label>
                                                     </div>
                                                 </div>



                                             </div>


                                             <div class="info">
                                                 <div class="label-content">
                                                     <label class="address" data-toggle="tooltip" data-html="true"
                                                         title="" data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 3</p>">Hồ
                                                         Chí Minh</label>
                                                     <label class="time mobile-hidden">
                                                         Còn
                                                         <strong>23</strong>
                                                         ngày để ứng tuyển
                                                     </label>

                                                     <label class="address" data-container="body">
                                                         Cập nhật 6 ngày trước

                                                     </label>
                                                 </div>
                                                 <div class="icon">
                                                     <button data-job-id="540530" data-apply-url=""
                                                         data-redirect-to="https://www.topcv.vn/viec-lam/front-end-developer-fresher/540530.html?ta_source=JobSuggestInManagerCV_ButtonApplyFormCard&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3Af0d8b384797245779d5c710abbb3c585%3A%3A13%3A%3A0.1964"
                                                         class="btn btn-apply-now">
                                                         <span>Ứng tuyển</span>
                                                     </button>
                                                     <div id="box-save-job-540530"
                                                         class="box-save-job  box-save-job-hover   job-notsave ">
                                                         <a href="javascript:void(0)" class="btn-save save"
                                                             data-id="540530" data-title="Lưu" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="" title="">
                                                             <span id="save-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-regular fa-heart"></i>
                                                         </a>
                                                         <a href="javascript:void(0)"
                                                             class="btn-unsave unsave text-highlight"
                                                             data-toggle="tooltip" title="" data-id="540530"
                                                             data-title="Front-End Developer (Fresher)"
                                                             data-placement="top" data-original-title="Bỏ lưu">
                                                             <span id="unsave-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-solid fa-heart"></i>
                                                         </a>
                                                     </div>
                                                     <div class="btn-remove-job">
                                                         <a href="javascript:showConfirmIgnoreJob(540530)" class=""
                                                             title="Ẩn tin tuyển dụng này">
                                                             <i class="fa-regular fa-trash"></i>
                                                         </a>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="job-item-default
                                 job-ta
                                "
                                         data-job-id="1058998" data-job-position="5" data-u-sr-id=""
                                         data-box="SuggestJobBox"
                                         data-jr-id="freezing-runway-5::1720992571211-d69d75::7936ccd3d68044aa8ccb91750dd540ec::14::0.1876"
                                         id="featured-suggest-1058998">
                                         <div class="avatar">
                                             <a target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/junior-front-end-developer/1058998.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A7936ccd3d68044aa8ccb91750dd540ec%3A%3A14%3A%3A0.1876">
                                                 <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cP39kmJTCXca8OHfqjwti5vAVWn2s40M_1665734358____6b629a088d02dffcbe76af06f5f0e9da.png"
                                                     class="w-100" alt="Dicom Interactive CO., LTD"
                                                     title="Junior Front-End Developer">
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
                                                                 href="https://www.topcv.vn/viec-lam/junior-front-end-developer/1058998.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A7936ccd3d68044aa8ccb91750dd540ec%3A%3A14%3A%3A0.1876">
                                                                 <span data-toggle="tooltip" data-container="body"
                                                                     data-placement="top" title=""
                                                                     data-original-title="Junior Front-End Developer">Junior
                                                                     Front-End Developer</span>
                                                             </a>
                                                         </h3>
                                                         <a rel="nofollow" class="company"
                                                             href="https://www.topcv.vn/cong-ty/dicom-interactive-co-ltd/123043.html"
                                                             data-toggle="tooltip" title="" data-placement="top"
                                                             target="_blank"
                                                             data-original-title="Dicom Interactive CO., LTD">Dicom
                                                             Interactive CO., LTD</a>

                                                     </div>


                                                     <div class="box-right">
                                                         <label class="title-salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             Thoả thuận
                                                         </label>
                                                     </div>
                                                 </div>



                                             </div>


                                             <div class="info">
                                                 <div class="label-content">
                                                     <label class="address" data-toggle="tooltip" data-html="true"
                                                         title="" data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 3</p>">Hồ
                                                         Chí Minh</label>
                                                     <label class="time mobile-hidden">
                                                         Còn
                                                         <strong>17</strong>
                                                         ngày để ứng tuyển
                                                     </label>

                                                     <label class="address" data-container="body">
                                                         Cập nhật 1 tuần trước

                                                     </label>
                                                 </div>
                                                 <div class="icon">
                                                     <button data-job-id="1058998" data-apply-url=""
                                                         data-redirect-to="https://www.topcv.vn/viec-lam/junior-front-end-developer/1058998.html?ta_source=JobSuggestInManagerCV_ButtonApplyFormCard&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A7936ccd3d68044aa8ccb91750dd540ec%3A%3A14%3A%3A0.1876"
                                                         class="btn btn-apply-now">
                                                         <span>Ứng tuyển</span>
                                                     </button>
                                                     <div id="box-save-job-1058998"
                                                         class="box-save-job  box-save-job-hover   job-notsave ">
                                                         <a href="javascript:void(0)" class="btn-save save"
                                                             data-id="1058998" data-title="Lưu" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="" title="">
                                                             <span id="save-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-regular fa-heart"></i>
                                                         </a>
                                                         <a href="javascript:void(0)"
                                                             class="btn-unsave unsave text-highlight"
                                                             data-toggle="tooltip" title="" data-id="1058998"
                                                             data-title="Junior Front-End Developer" data-placement="top"
                                                             data-original-title="Bỏ lưu">
                                                             <span id="unsave-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-solid fa-heart"></i>
                                                         </a>
                                                     </div>
                                                     <div class="btn-remove-job">
                                                         <a href="javascript:showConfirmIgnoreJob(1058998)" class=""
                                                             title="Ẩn tin tuyển dụng này">
                                                             <i class="fa-regular fa-trash"></i>
                                                         </a>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="job-item-default
                                 job-ta
                                "
                                         data-job-id="1285595" data-job-position="6" data-u-sr-id=""
                                         data-box="SuggestJobBox"
                                         data-jr-id="freezing-runway-5::1720992571211-d69d75::639f4243b67e47698228318a6c3feee1::15::0.1848"
                                         id="featured-suggest-1285595">
                                         <div class="avatar">
                                             <a target="_blank"
                                                 href="https://www.topcv.vn/viec-lam/thuc-tap-sinh-net-developer-asp-net-c/1285595.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A639f4243b67e47698228318a6c3feee1%3A%3A15%3A%3A0.1848">
                                                 <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/yAA4CzCAandR4j2CZ89RkdXpPjCL0vap_1675052241____e95f294b649b7be6fa76c250a591cbbc.jpg"
                                                     class="w-100" alt="CÔNG TY TNHH W2SOLUTION VIỆT NAM"
                                                     title="Thực Tập Sinh .Net Developer ( ASP.NET , C#)">
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
                                                                 href="https://www.topcv.vn/viec-lam/thuc-tap-sinh-net-developer-asp-net-c/1285595.html?ta_source=JobSuggestInManagerCV_LinkDetail&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A639f4243b67e47698228318a6c3feee1%3A%3A15%3A%3A0.1848">
                                                                 <span data-toggle="tooltip" data-container="body"
                                                                     data-placement="top" title=""
                                                                     data-original-title="Thực Tập Sinh .Net Developer ( ASP.NET , C#)">Thực
                                                                     Tập Sinh .Net Developer ( ASP.NET , C#)</span>
                                                                 <span class="icon-verified-employer level-five">
                                                                     <i class="fa-solid fa-circle-check icon-verified-employer-tooltip"
                                                                         data-toggle="tooltip" data-container="body"
                                                                         data-html="true" title=""
                                                                         data-placement="top"
                                                                         data-original-title="
  <b>Nhà tuyển dụng</b><span> đã được xác thực:</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực email tên miền công ty</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực số điện thoại</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã được duyệt Giấy phép kinh doanh</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Tài khoản NTD được tạo tối thiểu 6 tháng</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Chưa có lịch sử bị báo cáo tin đăng</span><br>"></i></span>
                                                             </a>
                                                         </h3>
                                                         <a rel="nofollow" class="company"
                                                             href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-w2solution-viet-nam/7304.html"
                                                             data-toggle="tooltip" title="" data-placement="top"
                                                             target="_blank"
                                                             data-original-title="CÔNG TY TNHH W2SOLUTION VIỆT NAM">CÔNG TY
                                                             TNHH W2SOLUTION VIỆT NAM</a>

                                                     </div>


                                                     <div class="box-right">
                                                         <label class="title-salary">
                                                             <i class="fa-solid fa-circle-dollar"></i>
                                                             Thoả thuận
                                                         </label>
                                                     </div>
                                                 </div>



                                             </div>


                                             <div class="info">
                                                 <div class="label-content">
                                                     <label class="address" data-toggle="tooltip" data-html="true"
                                                         title="" data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 3</p>">Hồ
                                                         Chí Minh</label>
                                                     <label class="time mobile-hidden">
                                                         Còn
                                                         <strong>19</strong>
                                                         ngày để ứng tuyển
                                                     </label>

                                                     <label class="address" data-container="body">
                                                         Cập nhật 1 tuần trước

                                                     </label>
                                                 </div>
                                                 <div class="icon">
                                                     <button data-job-id="1285595" data-apply-url=""
                                                         data-redirect-to="https://www.topcv.vn/viec-lam/thuc-tap-sinh-net-developer-asp-net-c/1285595.html?ta_source=JobSuggestInManagerCV_ButtonApplyFormCard&amp;jr_i=freezing-runway-5%3A%3A1720992571211-d69d75%3A%3A639f4243b67e47698228318a6c3feee1%3A%3A15%3A%3A0.1848"
                                                         class="btn btn-apply-now">
                                                         <span>Ứng tuyển</span>
                                                     </button>
                                                     <div id="box-save-job-1285595"
                                                         class="box-save-job  box-save-job-hover   job-notsave ">
                                                         <a href="javascript:void(0)" class="btn-save save"
                                                             data-id="1285595" data-title="Lưu" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="" title="">
                                                             <span id="save-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-regular fa-heart"></i>
                                                         </a>
                                                         <a href="javascript:void(0)"
                                                             class="btn-unsave unsave text-highlight"
                                                             data-toggle="tooltip" title="" data-id="1285595"
                                                             data-title="Thực Tập Sinh .Net Developer ( ASP.NET , C#)"
                                                             data-placement="top" data-original-title="Bỏ lưu">
                                                             <span id="unsave-job-loading" style="display: none;">
                                                                 <img src="https://www.topcv.vn/v3/images/ap-loading.gif"
                                                                     style="width: 20px">
                                                             </span>
                                                             <i class="fa-solid fa-heart"></i>
                                                         </a>
                                                     </div>
                                                     <div class="btn-remove-job">
                                                         <a href="javascript:showConfirmIgnoreJob(1285595)" class=""
                                                             title="Ẩn tin tuyển dụng này">
                                                             <i class="fa-regular fa-trash"></i>
                                                         </a>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <script>
                                     $(document).on('click touch', '.btn-apply-now', function(e) {

                                         var link = $(this).attr('data-redirect-to');
                                         var jobId = $(this).data('job-id');
                                         let applyUrl = $(this).attr('data-apply-url');
                                         if (applyUrl) {
                                             window.setCookieBySecond('trigger_apply_now', true, 15);
                                         } else {
                                             localStorage.setItem('trigger_apply_now', true);
                                         }
                                         if (link) {
                                             if (window.qgTracking && window.qg) {
                                                 window.qg('event', 'hit_to_apply_now', window.qgTracking);
                                             }
                                             if (window.fbq) {
                                                 window.fbq('event', 'hit_to_apply_now');
                                             }
                                             window.open(link, '_blank');
                                             e.stopPropagation();
                                             window.trackingTopCV.sendClickApplyButtonInListV2(jobId);
                                         }
                                     });
                                     $(document).on('click', '.job-list-default a', function(e) {
                                         e.stopPropagation();
                                     });
                                 </script>
                             </div>
                             <div class="text-center">
                                 <a href="https://www.topcv.vn/viec-lam-phu-hop"
                                     class="btn btn-suggestion-more btn-primary-hover" target="_blank">
                                     Xem tất cả việc làm phù hợp
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-4" id="sidebar">
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
                                     Bật tìm việc giúp hồ sơ của bạn nổi bật hơn và được chú ý nhiều hơn trong danh sách tìm
                                     kiếm của
                                     NTD.
                                 </p>
                                 <div id="box-job-waiting" class="box-job-waiting" style="display: none;">
                                     <div class="box-job-waiting__title">
                                         Trạng thái <span class="highlight">Bật tìm việc</span> sẽ tự động tắt sau <b
                                             class="highlight" id="time-remaining-turn-on-job">14 ngày</b>. Nếu bạn vẫn
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
                                     <p class="job-waiting-description d-flex  border-top ">
                                         <i class="fa-light fa-circle-info"></i>
                                         <span> Bạn cần hoàn thiện trên 70% TopCV Profile để bắt đầu tiếp cận với nhà tuyển
                                             dụng</span>
                                     </p>
                                     <a href="https://www.topcv.vn/p/7467-pham-vu-luan-5863682"
                                         class="btn btn-create-profile btn-sm">Cập nhật TopCV Profile</a>
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
                                             Vui lòng lựa chọn các CV bạn muốn bật tìm việc Hoặc click "Tôi không có nhu
                                             cầu" để bỏ qua
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
                                     <p class="modal-turn-on-job__cv-empty--desc">Bạn chưa có CV nào.<br>Vui lòng tạo CV
                                         mới để bật tìm
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
                             <div class="popup-wrapper__header">
                                 <div class="popup-wrapper__body-description">
                                     <img src="https://static.topcv.vn/v4/image/upload-cv/upload-cv-success.png"
                                         alt="" class="popup-wrapper__body-description--logo img-responsive">
                                     <div class="popup-wrapper__body-description--title">
                                         Bật tìm việc thành công
                                     </div>
                                     <div class="popup-wrapper__body-description--content">
                                         Khi có cơ hội việc làm phù hợp, NTD sẽ chủ động liên hệ và trao đổi với bạn qua:
                                     </div>
                                     <div class="popup-wrapper__body-description--list">
                                         <div class="popup-wrapper__body-description--list-item">
                                             1. Top Connect trên TopCV
                                         </div>
                                         <div class="popup-wrapper__body-description--list-item">
                                             <div class="popup-wrapper__body-description--list-item">
                                                 2. Email và Số điện thoại của bạn
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="popup-wrapper__body-qr">
                                     <div class="popup-wrapper__body-qr--description">
                                         Tải ứng dụng TopCV để nhận thông báo ngay lập tức khi bạn có tin nhắn mới
                                     </div>
                                     <div class="popup-wrapper__body-qr--img">
                                         <img class="competitive-rating__img--qr"
                                             src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/qr-detail-job-feature.png"
                                             alt="QR Code">
                                         <span>Quét QR để tải app</span>
                                     </div>
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
                                     CV <span id="open-to-work-warning-cv-name"></span> của bạn đã lâu chưa được cập nhật.
                                     Hãy cập nhật để
                                     Nhà tuyển dụng nắm được những thông tin mới nhất về năng lực, kinh nghiệm của bạn nhé.
                                     <br>
                                     <a href="#" target="_blank" id="open-to-work-warning-link">Cập nhật CV
                                         ngay</a>
                                 </div>
                             </div>
                             <div class="popup-wrapper__close">
                                 Đóng
                             </div>
                         </div>
                     </div>
                     <script>
                         APP_DOWNLOAD_URL = 'https://www.topcv.vn/app-download'
                     </script>
                     <link rel="stylesheet"
                         href="https://static.topcv.vn/v4/css/components/modals/profile/modal-open-to-work-success.min.28602a53cc00e938K.css">
                     <script defer="" src="https://static.topcv.vn/v4/js/components/profile/modal-open-to-work-success.6ba1a9b5a5ed4e66.js">
                     </script>
                 </div>
                 <div class="box box-white box-setting-sidebar">
                     <div id="ignore-cv-employer">
                         <div class="box-title">
                             <h4 class="title">Ẩn hồ sơ với NTD</h4>
                             <span class="tag">Mới</span>
                         </div>
                         <p class="desc"> Tôi không muốn CV của tôi hiển thị với danh sách các NTD có tên miền email và
                             thuộc các công ty dưới đây:</p>
                         <div class="box-ignore-item ignore-domain">
                             <div class="title">
                                 Các NTD với email có tên miền
                             </div>
                             <div class="tutorial">
                                 <i class="fa-solid fa-circle-info"></i>
                                 <span>Ví dụ: Để ẩn hồ sơ của bạn với NTD có email <u>admin@tenmiencongty.com</u>, vui lòng
                                     nhập <u>tenmiencongty.com</u>.</span>
                             </div>
                             <div class="form-ignore-domain">
                                 <input class="form-control border-hover input-domain" placeholder="Nhập tên miền email">
                                 <span class="prefix">@</span>
                                 <button
                                     class="btn btn-sm btn-topcv-default btn-default-hover btn-add-domain">Thêm</button>
                             </div>
                             <div class="list-ignore-domain">
                             </div>
                         </div>
                         <div class="box-ignore-item">
                             <div class="title">Các NTD thuộc công ty</div>
                             <div class="form-ignore-company">
                                 <input class="form-control border-hover input-company" placeholder="Nhập tên công ty">
                                 <i class="fa-solid fa-magnifying-glass"></i>
                                 <div class="box-suggest-company">
                                 </div>
                             </div>
                             <div class="list-ignore-company">
                             </div>
                         </div>
                     </div>
                 </div>
                 <script src="https://static.topcv.vn/v4/js/components/mobile-app/download-app-component.c9a553da008b283d.js"></script>
                 <script>
                     const LOCAL_STORAGE_MODAL_OPEN_TO_WORK_SUCCESS_KEY = 'isShowModalOpenToWorkSuccess';
                     let linkEditCv = "https://www.topcv.vn/sua-cv";
                     var SETTING_PRIVACY_URL = "https://www.topcv.vn/tai-khoan/bao-mat";
                     var cbjobWaiting = null;
                     var isRequesting = false;
                     var allowEplViewCvAjaxLock = false;
                     var modalOptionWishJobVue = null;
                     APP_DOWNLOAD_URL = 'https://www.topcv.vn/app-download'
                     var AJAX_UPDATE_JOB_WAITING_STATUS_URL = "https://www.topcv.vn/profile/ajax-update-status";

                     function openFileDialog() {
                         $('#img-avatar').click();
                     }
                     $(document).ready(function() {
                         setProgressbarValue(1,
                             3);
                         $('#category-selector').select2();

                         $('#no-profile').click(function() {
                             toastr.error('Hiện tại bạn chưa có TopCV Profile vui lòng cập nhật TopCV Profile.');
                             return false;
                         });
                         $('#incomplete').click(function() {
                             toastr.error('Hiện tại TopCV Profile của bạn chưa hoàn thành trên 70%.');
                             return false;
                         });

                         $('.radio-choose-active input[name=profile_is_active]').change(function() {
                             if (isRequesting) return false;
                             isRequesting = true;
                             $.ajax({
                                     url: 'https://www.topcv.vn/profile/choose-active',
                                     type: 'POST',
                                     data: {
                                         is_active: $('#box-profile-active input[name=profile_is_active]:checked')
                                             .val()
                                     },
                                 })
                                 .done(function(response) {
                                     if (response.success == true) {
                                         toastr.success(response.message);
                                     } else {
                                         toastr.error(response.message);
                                     }
                                 })
                                 .fail(function() {
                                     toastr.error('Đã có lỗi xảy ra vui lòng liên hệ quản trị hệ thống');
                                 })
                                 .always(function() {
                                     isRequesting = false;
                                 });

                         });

                         $('.download--app').on('click', function() {
                             window.downloadApp()
                         })
                     });
                 </script>
                 <div class="box box-white text-center-sm box-employee-view-cv">
                     <div class="row">
                         <div class=" cv-count-header">
                             <div class="text-highlight">
                                 <strong style="font-size: 16px;">CV của bạn đã đủ tốt?</strong>
                                 <p class="text-neutral-neutral-40">Bao nhiêu NTD đang quan tâm tới Hồ sơ của bạn?</p>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="cv-count  gray ">
                                 <div class="cv-count-number">0</div>
                                 <div>lượt</div>
                             </div>
                         </div>
                         <div class="col-md-8" style="padding-top: 5px">
                             <p>Mỗi lượt Nhà tuyển dụng xem CV mang đến một cơ hội để bạn gần hơn với công việc phù hợp.</p>
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
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/components/common/ignore-cv-employer.e1c5492da1d7a17dK.css">
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
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/components/common/ignore-cv-employer.e1c5492da1d7a17dK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/support-ticket/support-ticket.b6c89357bb501feaK.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/partials/icon-verified-employer.min.59a8d20b3e34dfbfK.css">
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/desktop/manager-cv.b6b84668d5c1950aK.css">
 @endsection
