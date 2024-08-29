@extends('dashboard-employer')

@section('content')
    <div data-v-7240e68e="" class="breadcrumb-box">
        <h6 class="breadcrumb-title d-flex">
            <div><span>Quà tặng</span> </div>
        </h6>
    </div>
    <div data-v-7240e68e="" class="container-fluid page-content">
        <div data-v-03d2f0de="" data-v-7240e68e="" class="banner-gift"><img data-v-03d2f0de=""
                src="https://tuyendung.topcv.vn/app/_nuxt/img/banner_gift.ce6eb61.webp" alt="banner">
            <div data-v-03d2f0de="" class="wrap-point">
                <div data-v-03d2f0de="" class="title-point">Điểm đổi quà</div>
                <div data-v-03d2f0de="" class="total-point"><span data-v-03d2f0de="">0</span> <img data-v-03d2f0de=""
                        src="https://tuyendung.topcv.vn/app/_nuxt/img/top_point.49313b4.png" alt="point"></div>
                <!---->
            </div>
            <div data-v-03d2f0de="" class="wrap-tab">
                <div data-v-03d2f0de="" class="footer-wrap-tab">
                    <div data-v-03d2f0de="" class="wrap-content-tab">
                        <div data-v-03d2f0de="" class="item-tab"><img data-v-03d2f0de=""
                                src="https://tuyendung.topcv.vn/app/_nuxt/img/icon_add_point.3f03441.png" alt="point">
                            <span data-v-03d2f0de="" class="mt-2">Tích thêm Top Point <i data-v-03d2f0de=""
                                    class="far fa-chevron-right"></i></span>
                        </div>
                        <div data-v-03d2f0de="" class="item-tab"><img data-v-03d2f0de=""
                                src="https://tuyendung.topcv.vn/app/_nuxt/img/icon_history_rewards.83a28f2.png"
                                alt="point"> <span data-v-03d2f0de="" class="mt-2">Ưu đãi đã đổi <i data-v-03d2f0de=""
                                    class="far fa-chevron-right"></i></span></div>
                        <div data-v-03d2f0de="" class="item-tab"><img data-v-03d2f0de=""
                                src="https://tuyendung.topcv.vn/app/_nuxt/img/icon_history_gift.61c0947.png" alt="point">
                            <span data-v-03d2f0de="" class="mt-2">Lịch sử đổi quà <i data-v-03d2f0de=""
                                    class="far fa-chevron-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-v-7240e68e="" class="bg-white shadow-sm mb-3 wrap-gift">
            <div data-v-7240e68e="" class="d-flex flex-column p-3">
                <div data-v-1fa6d3fc="" data-v-7240e68e="" class="wrap-filter">
                    <div data-v-1fa6d3fc="" class="wrap-filter-header">
                        <span data-v-1fa6d3fc="" class="filter-item {{ request('type_product') == 'all' ? 'active' : '' }}">
                            <a href="{{ route('buy-gift', ['type_product' => 'all']) }}">Tất cả</a>
                        </span>
                        <span data-v-1fa6d3fc=""
                            class="filter-item {{ request('type_product') == 'service' ? 'active' : '' }}">
                            <a href="{{ route('buy-gift', ['type_product' => 'service']) }}">Quà tặng dịch vụ</a>
                        </span>
                        <span data-v-1fa6d3fc=""
                            class="filter-item {{ request('type_product') == 'voucher' ? 'active' : '' }}">
                            <a href="{{ route('buy-gift', ['type_product' => 'voucher']) }}">Voucher mua sắm</a>
                        </span>
                    </div>

                </div>
                <div data-v-7240e68e="" class="wrap-list-gift">
                    @foreach ($products as $product)
                        <div data-v-04419ab5="" data-v-7240e68e="" class="gift-item" available-exchange-point="0">
                            <div data-v-04419ab5="" class="img-gift"
                                style="background: url('{{ $product->imagePath }}') 50% center / cover no-repeat;">
                            </div>
                            <div data-v-04419ab5="" class="d-flex flex-column justify-content-end" style="height: 55%;">
                                <div data-v-04419ab5="" class="footer-gift-item">
                                    <div data-v-04419ab5="" class="text-16 font-weight-600 mb-1 gift-name">
                                        {{ $product->name }}</div>
                                    <div data-v-04419ab5="" class="text-12 font-weight-400 text-neutral-700 text-uppercase">
                                        {{ $product->company }}
                                    </div>
                                </div>
                                <div data-v-04419ab5="" class="btn-gift-item mt-2">
                                    <svg data-v-04419ab5="" fill="none" height="1" viewBox="0 0 228 1" width="228"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect data-v-04419ab5="" fill="#F5F8FA" height="1" width="227"
                                            x="0.333984"></rect>
                                    </svg>
                                    <div data-v-04419ab5=""
                                        class="d-flex justify-content-between align-items-center w-100 mt-3">
                                        <div data-v-04419ab5="" class="btn-gift-item-left">
                                            <div data-v-04419ab5="" class="top-point">
                                                <span data-v-04419ab5=""
                                                    class="font-weight-800 text-14 text-primary">{{ $product->top_point }}</span>
                                                <img data-v-04419ab5="" alt="point"
                                                    src="https://tuyendung.topcv.vn/app/_nuxt/img/top_point.49313b4.png">
                                            </div>
                                        </div>
                                        <a href="{{ route('buy-gift.detail', $product->id) }}" class="btn min-width btn btn-primary font-weight-600">Đổi quà</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
