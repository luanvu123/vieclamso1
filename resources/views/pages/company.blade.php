 @extends('layout')
 @section('content')
     <div id="main">
         <div class="company">
             <div class="box-search-company">
                 <div class="container d-flex">
                     <div class="box-search">
                         <ul class="nav header">
                             <li class="nav-item">
                                 <a href="{{route('all.company')}}" class="nav-link  active ">Danh sách công ty</a>
                             </li>
                         </ul>
                         <div class="caption">
                             <h1 class="title">Khám phá 100.000+ công ty nổi bật</h1>
                             <p class="description">Tra cứu thông tin công ty và tìm kiếm nơi làm việc tốt nhất dành
                                 cho bạn</p>
                         </div>
                       <form action="{{ route('search-company') }}" method="GET" class="form-search border-hover">
                <i class="fa-light fa-magnifying-glass"></i>
                <input class="form-control" placeholder="Nhập tên công ty" id="keyword" name="keyword" value="{{ request('keyword') }}">
                <button type="submit" class="btn btn-search btn-search-company btn-primary-hover">Tìm kiếm</button>
            </form>
                     </div>
                     <div class="box-img">
                         <img src="../static.topcv.vn/v4/image/brand-identity/company-billBoarde209.png?v=1.0.0" class alt
                             style="width: 272px !important;">
                     </div>
                 </div>
             </div>
             <div class="featured-companies">
                 <div class="company-header text-center">
                     <h1 class="title">DANH SÁCH CÁC CÔNG TY NỔI BẬT</h1>
                 </div>
                 <div class="container">
                     <div class="row">
                         @foreach ($companies as $company)
                             <div class="col-md-4 col-sm-6">
                                 <div class="box-company item-hover">
                                     <div class="company-banner">
                                         <a href="{{ route('company-home.show', $company->slug) }}">
                                             <div class="cover-wraper">
                                                 <img src="{{ $company->image ? asset('storage/' . $company->image) : asset('storage/default-cover.jpg') }}"
                                                     alt="{{ $company->name }}" class="img-fluid">
                                             </div>
                                         </a>
                                         <div class="company-logo">
                                             <a href="{{ route('company-home.show', $company->slug) }}">
                                                 <img class="img-fluid"
                                                     src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/default-logo.jpg') }}"
                                                     alt="{{ $company->name }}">
                                             </a>
                                         </div>
                                     </div>
                                     <div class="company-info">
                                         <h3>
                                             <a href="{{ route('company-home.show', $company->slug) }}" class="company-name"
                                                 target="_blank">{{ $company->name }}</a>
                                         </h3>
                                         <div class="company-description">
                                             <p>{{ Str::limit($company->detail, 150) }}</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                     <div class="row justify-content-center">
                         <div class="col-md-12">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
