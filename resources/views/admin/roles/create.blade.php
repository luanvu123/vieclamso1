@extends('layouts.app')

@section('content')
<div class="dashboard-content">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tạo phân quyền</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Quay lại</a>
        </div>
    </div>
</div>

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

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Quyền:</strong>
        <br/>
        @foreach($permission as $value)
            <label>
                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}
                @if(!empty($value->description))
                    <small class="text-muted"> - {{ $value->description }}</small>
                @endif
            </label>
            <br/>
        @endforeach
    </div>
</div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Tạo</button>
    </div>
</div>
</div>
{!! Form::close() !!}

@endsection
