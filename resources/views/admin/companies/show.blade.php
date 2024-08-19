@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết công ty</h1>
    <div>
        <strong>Tên công ty:</strong> {{ $company->name }}
    </div>
    <div>
        <strong>Địa chỉ:</strong> {{ $company->address }}
    </div>
    <div>
        <strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
    </div>
      <div>
        <strong>MST:</strong> {{ $company->mst }}
    </div>
    <div>
        <strong>Mô tả:</strong> {{ $company->detail }}
    </div>
    <div>
        <strong>Logo:</strong>
        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" style="width: 150px;">
    </div>
</div>
@endsection
