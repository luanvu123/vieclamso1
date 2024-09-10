@extends('layouts.app')

@section('content')
    <h2>Visitors Statistics</h2>
    <p>Total Home Visitors: {{ $totalHomeVisitors }}</p>
    <p>Total Recruitment Visitors: {{ $totalRecruitmentVisitors }}</p>

    <h2>Online Visitors</h2>
    <p>Online Home Visitors: {{ $onlineHomeVisitors }}</p>
    <p>Online Recruitment Visitors: {{ $onlineRecruitmentVisitors }}</p>
@endsection
