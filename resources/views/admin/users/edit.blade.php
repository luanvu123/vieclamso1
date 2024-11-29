@extends('layouts.app')

@section('content')
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit User</h2>
                    <!-- Breadcrumbs -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::model($user, [
                        'method' => 'PATCH',
                        'route' => ['users.update', $user->id],
                        'enctype' => 'multipart/form-data',
                    ]) !!}


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Họ và tên:</strong>
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mật khẩu:</strong>
                            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nhập lại mật khẩu:</strong>
                            {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>giới tính:</strong>
                            {!! Form::select('gender', ['Nam' => 'Nam', 'Nữ' => 'Nữ', 'Khác' => 'Khác'], $user->gender, [
                                'placeholder' => 'Chọn giới tính',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Đia chỉ:</strong>
                            {!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Màu yêu thích:</strong>
                            {!! Form::color('favorite_color', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ẢNh đại diện:</strong>
                            @if ($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" style="max-width: 100px;">
                            @endif
                            {!! Form::file('avatar', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Ngày sinh:</strong>
                            {!! Form::date('date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Số điện thoại:</strong>
                            {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>ngôn ngữ:</strong>
                            {!! Form::text('language', null, ['placeholder' => 'Language', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Google:</strong>
                            {!! Form::text('google', null, ['placeholder' => 'Google', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Skype:</strong>
                            {!! Form::text('skype', null, ['placeholder' => 'Skype', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Slack:</strong>
                            {!! Form::text('slack', null, ['placeholder' => 'Slack', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Instagram:</strong>
                            {!! Form::text('instagram', null, ['placeholder' => 'Instagram', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>Facebook:</strong>
                            {!! Form::text('facebook', null, ['placeholder' => 'Facebook', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <strong>PayPal:</strong>
                            {!! Form::text('paypal', null, ['placeholder' => 'PayPal', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

@endsection
