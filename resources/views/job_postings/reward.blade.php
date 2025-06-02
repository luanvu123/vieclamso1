 @extends('dashboard-employer')

 @section('content')
     <div data-v-3438675c="" class="breadcrumb-box">
         <h6 class="breadcrumb-title d-flex">
             <div><span>Đổi thưởng</span> </div>
         </h6>
     </div>
     <div data-v-3438675c="" class="container-fluid page-content page-post-job-public__page-content pt-4">
         <div data-v-69ab245a="" data-v-3438675c="" class="top-rewards-loyal-rank">
             <div data-v-69ab245a="" class="header">
                 Hạng khách hàng thân thiết
             </div>
             <div data-v-69ab245a="" class="box-loyal-rank" style="--main-color: #303235; --sub-color: #00B14F;">
                 <div data-v-69ab245a="" class="loyal-progress"
                     style="background: linear-gradient(105deg, rgb(242, 251, 255) -1.43%, rgb(231, 239, 245) 100%);">
                     <div data-v-69ab245a="" class="customer-info">
                         <div data-v-69ab245a="">
                             <div data-v-69ab245a="" class="customer-name">{{ $employer->name }}</div>
                             <div data-v-69ab245a="" class="ranking-point">
                                 Điểm xét hạng:
                                 <span data-v-69ab245a="" class="point">{{ $employer->credit }}</span> <img
                                     data-v-69ab245a="" alt="TP Point"
                                     src="https://tuyendung.topcv.vn/app/_nuxt/img/tp-point.fdfeec4.png" class="tp-icon">
                             </div>
                         </div>
                         <div data-v-69ab245a="" class="customer-medal">
                             <div data-v-69ab245a=""
                                 class="rank-name text-white d-flex align-items-center text-decoration-none justify-content-start ">
                                 <a data-v-69ab245a=""
                                     href="https://tuyendung.topcv.vn/chuong-trinh-khach-hang-than-thiet-topcv"
                                     target="_blank"><img data-v-69ab245a="" alt="Ranking Medal"
                                         src="{{ $employer->typeEmployer && $employer->typeEmployer->image ? asset('storage/' . $employer->typeEmployer->image) : asset('storage/avatar/member.png') }}"style="width: 200px; height: 44px;"></a>
                             </div>
                         </div>
                     </div>
                     <div data-v-823ce444="" data-v-69ab245a="" class="customer-loyal-progress">
                         <div data-v-823ce444="" class="loyal-progress" style="margin-top: 0px;">
                             <div data-v-823ce444="" class="custom-progress"></div>
                             <div data-v-823ce444="" class="custom-progress-milestone">
                                 <div data-v-823ce444="" class="pointer"><img data-v-823ce444=""
                                         src="https://tuyendung.topcv.vn/app/_nuxt/img/member.4470c3d.svg" alt="Pointer"
                                         height="32px" width="32px"
                                         @switch($employer->type_employer_id)
                     @case(1)
                         style="left: -4px;"
                         @break
                     @case(2)
                         style="left: 20%;"
                         @break
                     @case(3)
                         style="left: 40%;"
                         @break
                     @case(4)
                         style="left: 60%;"
                         @break
                     @case(5)
                         style="left: 80%;"
                         @break
                     @default
                         style="left: -4px;"
                 @endswitch>
                                 </div>
                             </div>
                             <div data-v-823ce444="" class="custom-progress-milestone-next-rank">
                                 <div data-v-823ce444="" class="pointer"><img data-v-823ce444=""
                                         src="https://tuyendung.topcv.vn/app/_nuxt/img/silver.03b2036.svg" alt="Pointer"
                                         height="32px" width="32px"
                                         @switch($employer->type_employer_id)
                     @case(1)
                         style="left: 20%;"
                         @break
                     @case(2)
                         style="left: 40%;"
                         @break
                     @case(3)
                         style="left: 60%;"
                         @break
                     @case(4)
                         style="left: 80%;"
                         @break
                     @case(5)
                         style="left: 80%;"
                         @break
                     @default
                         style="left: 20%;"
                 @endswitch>


                                 </div>
                             </div>
                             <div data-v-823ce444="" class="custom-progress-single"
                                 style="width: 0px; background: rgb(0, 177, 79);"></div>
                             <div data-v-823ce444="" class="custom-progress-tooltips"
                                 @switch($employer->type_employer_id)
                     @case(1)
                         style="left: -46px;"
                         @break
                     @case(2)
                         style="left: 14%;"
                         @break
                     @case(3)
                         style="left: 34%;"
                         @break
                     @case(4)
                         style="left: 54%;"
                         @break
                     @case(5)
                         style="left: 74%;"
                         @break
                     @default
                         style="left: -46px;"
                 @endswitch>

                                 @if ($nextType)
                                     <div data-v-823ce444="" class="tooltips">Thêm <span data-v-823ce444=""
                                             class="font-weight-600">{{ $nextType['points_needed'] }} TP</span></div>
                                 @else
                                     <div data-v-823ce444="" class="tooltips">Thêm <span data-v-823ce444=""
                                             class="font-weight-600">0 TP</span></div>
                                 @endif

                             </div>
                         </div> <!---->
                     </div>
                     <div data-v-69ab245a="" class="progress-more">
                         @if ($nextType)
                             <div data-v-69ab245a="" class="more-top-point">
                                 <span data-v-69ab245a="" class="notify">
                                     Bạn chỉ cần tích lũy thêm
                                     <span data-v-69ab245a="" class="font-weight-600">{{ $nextType['points_needed'] }}
                                         TP</span>
                                     để đạt hạng
                                     <span data-v-69ab245a=""
                                         class="font-weight-600">{{ $nextType['next_type_name'] }}</span>.
                                 </span>
                                 <span data-v-69ab245a="" class="buy-now font-weight-600">
                                     <a data-v-69ab245a="" href="{{ route('job-postings.cart') }}">
                                         Mua dịch vụ ngay
                                         <i data-v-69ab245a="" class="fa-regular fa-chevron-right"></i>
                                     </a>
                                 </span>
                             </div>
                         @else
                             <div data-v-69ab245a="" class="more-top-point">
                                 <span data-v-69ab245a="" class="notify">
                                     Bạn đã đạt hạng cao nhất.
                                 </span>
                             </div>
                         @endif
                     </div>
                 </div>
                 <div data-v-69ab245a="" class="loyal-detail"
                     style="background: linear-gradient(105deg, rgb(242, 251, 255) -1.43%, rgb(231, 239, 245) 100%);">
                     <div data-v-69ab245a="" class="loyal-detail-info">
                         <div data-v-69ab245a="" class="label">Điểm đổi quà</div>
                         <div data-v-69ab245a="" class="point"><span
                                 data-v-69ab245a="">{{ $employer->top_point }}</span> <img data-v-69ab245a=""
                                 alt="TP Point" src="https://tuyendung.topcv.vn/app/_nuxt/img/tp-point.fdfeec4.png"
                                 class="tp-icon">
                         </div> <!---->
                     </div>
                     <div data-v-69ab245a="" class="exchange-now">
                         <a href="{{ route('buy-gift') }}" data-v-69ab245a="" class="btn bg-white">
                             <span data-v-69ab245a="">Xem quà ngay</span>
                             <i data-v-69ab245a="" class="fa-solid fa-chevron-right"></i>
                         </a>
                     </div>

                 </div>
             </div>
         </div> <!---->
         <div data-v-540eb7db="" data-v-3438675c="" class="mt-2" rank-to-human="Employer">
             <div data-v-540eb7db="" class="pd-20-15 bdr-8 d-flex mt-4 ">
                 <div data-v-7240e68e="" class="wrap-list-gift">
                     @foreach ($purchases as $purchase)
                         <div data-v-04419ab5="" data-v-7240e68e="" class="gift-item" available-exchange-point="0">
                             <div data-v-04419ab5="" class="img-gift"
                                 style="background: url('{{ asset('storage/' . $purchase->product->image) }}') 50% center / cover no-repeat;">
                             </div>
                             <div data-v-04419ab5="" class="d-flex flex-column justify-content-end" style="height: 55%;">
                                 <div data-v-04419ab5="" class="footer-gift-item">
                                     <div data-v-04419ab5="" class="text-16 font-weight-600 mb-1 gift-name">
                                         {{ $purchase->product->name }}
                                     </div>
                                     <div data-v-04419ab5=""
                                         class="text-12 font-weight-400 text-neutral-700 text-uppercase">
                                         {{ $purchase->product->company }}
                                     </div>
                                 </div>
                                 <div data-v-04419ab5="" class="btn-gift-item mt-2">
                                     <svg data-v-04419ab5="" fill="none" height="1" viewBox="0 0 228 1"
                                         width="228" xmlns="http://www.w3.org/2000/svg">
                                         <rect data-v-04419ab5="" fill="#F5F8FA" height="1" width="227"
                                             x="0.333984"></rect>
                                     </svg>
                                     <div data-v-04419ab5=""
                                         class="d-flex justify-content-between align-items-center w-100 mt-3">
                                         <div data-v-04419ab5="" class="btn-gift-item-left">
                                             <div data-v-04419ab5="" class="top-point">
                                                 <span data-v-04419ab5=""
                                                     class="font-weight-800 text-14 text-primary">{{ $purchase->product->top_point }}</span>
                                                 <img data-v-04419ab5="" alt="point"
                                                     src="https://tuyendung.topcv.vn/app/_nuxt/img/top_point.49313b4.png">
                                             </div>
                                         </div>
                                         <button data-v-04419ab5="" type="button"
                                             class="btn min-width btn btn-primary font-weight-600"
                                             style="background-color: orange;">
                                             Đã đổi
                                         </button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>

             </div> <!---->
         </div>
     </div>
 @endsection
