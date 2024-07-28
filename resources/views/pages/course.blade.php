@extends('layout')
@section('content')
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box-group">
                        <div class="box-group-header">
                            <div class="row">
                                <div class="box-group-title col-sm-6 col-md-9">
                                    <p>Chương trình
                                        Đào tạo nhân sự chất lượng cao 4.0</p>
                                </div>
                            </div>
                        </div>
                        <div class="box-group-body">
                            <div class="row">
                                @foreach ($courses as $course)
                                    <div class="col-md-4 col-xs-12">
                                        <div class="box-course box-white clearfix">
                                            <a class="img_a" target="_blank" href="{{ $course->website }}">
                                                @if ($course->image)
                                                    <img src="{{ asset('storage/' . $course->image) }}"
                                                        alt="{{ $course->name }}"
                                                        style="width: 100%; height: 190px;background:linear-gradient(to right, #f12711, #f5af19)"
                                                        class="color-me" rel="nofollow">
                                                @else
                                                    <img src="default-image.jpg" alt="{{ $course->name }}"
                                                        style="width: 100%; height: 190px;background:linear-gradient(to right, #f12711, #f5af19)"
                                                        class="color-me" rel="nofollow">
                                                @endif
                                            </a>
                                            <div class="course-meta">
                                                <div class="title">
                                                    <a target="_blank" href="{{ $course->website }}" rel="nofollow"
                                                        title="{{ $course->name }}">{{ $course->name }}</a>
                                                </div>
                                                <div class="text-center" style="margin-bottom: 20px">
                                                    <a class="btn btn-danger" target="_blank" href="{{ $course->website }}"
                                                        rel="nofollow">Đăng ký học</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
