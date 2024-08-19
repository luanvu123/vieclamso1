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
                        <li>{{ $company->name }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
 <div class="listing-title">
                <a href="{{ route('companies.edit', $company->id) }}"><i class="fa fa-pencil"></i>
                    Edit</a>
                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;"
                    onsubmit="return confirm('Are you sure you want to delete this job posting?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button"
                        style="background: none; border: none; color: red; cursor: pointer;">
                        <i class="fa fa-remove"></i> Delete
                    </button>
                </form>
            </div>
        <!-- Recent Jobs -->
        <div class="eleven columns">
            <div class="padding-right">

                <!-- Company Info -->
                <div class="company-info">
                    <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                        alt="">
                    <div class="content">
                        <h4>{{ $company->name }}</h4>
                        <span><a href="#"><i class="fa fa-link"></i> {{ $company->website }}</a></span>
                        <span><a href="#"><i class="fa fa-twitter"></i> {{ $company->twitter }}</a></span>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <p class="margin-reset">
                    {{ $company->detail }}

                </p>
                <span>{!! $company->map !!}</span>
            </div>
        </div>


        <!-- Widgets -->
        <div class="five columns">

            <!-- Sort by -->
            <div class="widget">
                <h4>Overview</h4>

                <div class="job-overview">

                    <ul>
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <div>
                                <strong>Location:</strong>
                                <span> {{ $company->address }}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-user"></i>
                            <div>
                                <strong>Facebook:</strong>
                                <span>{{ $company->facebook }}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-clock-o"></i>
                            <div>
                                <strong>Qui mô</strong>
                                   <span>{{ $company->scale }} Nhân viên</span>

                            </div>
                        </li>
                        <li>
                            <i class="fa fa-money"></i>
                            <div>
                                <strong>Linkedin:</strong>
                                <span>{{$company->linkedin}}</span>
                            </div>
                        </li>
                    </ul>

                </div>

            </div>

        </div>
        <!-- Widgets / End -->


    </div>
@endsection
