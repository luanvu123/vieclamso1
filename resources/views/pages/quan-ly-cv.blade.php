 @extends('layout')
 @section('content')
     <div class="container">
         <div class="row">
             <div class="col-sm-8" id="manager-cv">
                 <div id="cv-list" class="box-block">
                     <div class="box-header">
                         <h1 class="title">CV đã tạo trên TopCV</h1> <a href="{{route('personal.profile.account')}}"
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
 @endsection
