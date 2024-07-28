 @extends('layout')
 @section('content')
     <div id="main">
         <div class="container">
             <div class="row">
                 <div class="col-sm-8">
                     <div class="box-group-header">
                         <div class="row">
                             <div class="box-group-title col-xs-9"><a href="javascript:void(0)">Thay đổi mật khẩu
                                     đăng nhập</a></div>
                             <div class="box-group-toolbox col-xs-3 text-right">
                             </div>
                         </div>
                     </div>
                     <div class="box-group">
                         <div class="box-group-body">
                             <div class="box box-white clearfix">
                                 @if (session('success'))
                                     <div class="alert alert-success">{{ session('success') }}</div>
                                 @endif
                                 @if ($errors->any())
                                     <div class="alert alert-danger">
                                         @foreach ($errors->all() as $error)
                                             <p>{{ $error }}</p>
                                         @endforeach
                                     </div>
                                 @endif
                                 <form action="{{ route('change-password') }}" method="POST" class="form-horizontal">
                                     @csrf
                                     <div class="form-group">
                                         <label class="col-sm-4 control-label text-dark-gray">Email đăng nhập</label>
                                         <div class="col-sm-8">
                                             <input type="text" class="form-control"
                                                 value="{{ Auth::guard('candidate')->user()->email }}" readonly>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-4 control-label text-dark-gray">Mật khẩu hiện tại</label>
                                         <div class="col-sm-8">
                                             <input type="password" name="currentPassword" class="form-control">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-4 control-label text-dark-gray">Mật khẩu mới</label>
                                         <div class="col-sm-8">
                                             <input type="password" name="newPassword" class="form-control">
                                             <ul class="rule-password">
                                                 <li>Mật khẩu từ 6 đến 25 ký tự</li>
                                                 <li>Bao gồm chữ hoa, chữ thường và ký tự số</li>
                                             </ul>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-4 control-label text-dark-gray">Nhập lại mật khẩu mới</label>
                                         <div class="col-sm-8">
                                             <input type="password" name="newPassword_confirmation" class="form-control">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <div class="col-sm-offset-4 col-sm-8">
                                             <button class="btn btn-topcv-primary" type="submit">Lưu</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
