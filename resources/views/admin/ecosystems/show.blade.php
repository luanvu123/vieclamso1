<!-- resources/views/admin/ecosystems/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>HST</h1>

        <div class="mb-3">
            <strong>Tên:</strong> {{ $ecosystem->name }}
        </div>
        <div class="mb-3">
            <strong>CHi tiết:</strong> {{ $ecosystem->detail }}
        </div>
        <div class="mb-3">
            <strong>Website:</strong> <a href="{{ $ecosystem->website }}" target="_blank">{{ $ecosystem->website }}</a>
        </div>
        <div class="mb-3">
            <strong>MÃ màu:</strong> {{ $ecosystem->name_link_website }}
        </div>
        <div class="mb-3">
            <strong>Trạng thái:</strong> {{ $ecosystem->status ? 'Active' : 'Inactive' }}
        </div>
        <div class="mb-3">
            <strong>ẢNh:</strong><br>
            @if($ecosystem->image)
                <img src="{{ asset('storage/' . $ecosystem->image) }}" alt="Image" style="width: 200px;">
            @endif
        </div>
        <div class="mb-3">
            <strong>ảnh Footer :</strong><br>
            @if($ecosystem->image_footer)
                <img src="{{ asset('storage/' . $ecosystem->image_footer) }}" alt="Footer Image" style="width: 200px;">
            @endif
        </div>

        <a href="{{ route('ecosystems.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection


