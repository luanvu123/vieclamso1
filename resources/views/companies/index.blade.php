@extends('dashboard-employer')

@section('content')
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>My Company</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Company</a></li>
                        <li>List</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @foreach ($companies as $company)
        <!-- Listing -->
        <a href="{{ route('companies.show', $company->id) }}" class="listing full-time">
            <div class="listing-logo">
                <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                    alt="">
            </div>
            <div class="listing-title">
                <h4>{{ $company->name }} <span class="listing-type">{{ $company->status ? 'Active' : 'Inactive' }}</span>
                </h4>
                <ul class="listing-icons">
                    <li><i class="ln ln-icon-Management"></i> {{ $company->website }}</li>
                    <li><i class="ln ln-icon-Map2"></i> {{ $company->address }}</li>
                    <li><i class="ln ln-icon-Globe"></i> {{ $company->scale }} Nhân viên</li>
                </ul>
            </div>
        </a>
    @endforeach
    <div class="clearfix"></div>
@endsection
