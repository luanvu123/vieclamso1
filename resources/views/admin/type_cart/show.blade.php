@extends('layouts.app')

@section('content')
    <h1>Chi tiết Thể loại dịch vụ</h1>
    <div>
        <strong>Name:</strong> {{ $typeCart->name }}
    </div>
     <p><strong>Detail:</strong> {!! $typeCart->detail !!}</p>
    <div>
        <strong>Status:</strong> {{ $typeCart->status ? 'Active' : 'Inactive' }}
    </div>
    <a href="{{ route('type_cart.index') }}" class="btn btn-primary">Back</a>
@endsection
