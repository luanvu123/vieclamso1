@extends('layouts.app')

@section('content')
    <h2>Thống kê truy cập</h2>
    <p>Trang Vieclamso1: {{ $totalHomeVisitors }}</p>
    <p>Trang Tuyendungso1: {{ $totalRecruitmentVisitors }}</p>

    <h2>Đang online</h2>
    <p>Trang Vieclamso1: {{ $onlineHomeVisitors }}</p>
    <p>Trang Tuyendungso1: {{ $onlineRecruitmentVisitors }}</p>
@endsection
