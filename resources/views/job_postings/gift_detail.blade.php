@extends('dashboard-employer')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
                <div data-v-03d2f0de="" class="total-point"><span data-v-03d2f0de="">{{ $employer->top_point }}</span> <img
                        data-v-03d2f0de="" src="https://tuyendung.topcv.vn/app/_nuxt/img/top_point.49313b4.png"
                        alt="point"></div>
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
            <div class="modal-content border-0">
                <div data-v-db3e7bea="" class="wrap-header-gift"><span data-v-db3e7bea="" class="btn-close-gift"><i
                            data-v-db3e7bea="" class="far fa-xmark"></i></span></div>
                <div data-v-db3e7bea="" class="modal-body">
                    <div data-v-db3e7bea="" class="wrap-detail-img"
                        style="background: url('{{ $product->imagePath }}') 50% center / cover no-repeat;">
                    </div>
                    <div data-v-db3e7bea="" class="wrap-detail-gift">
                        <div data-v-db3e7bea="" class="name-gift">
                            <div data-v-db3e7bea="" class="font-weight-700 text-20">{{ $product->name }}</div>
                            <div data-v-db3e7bea="" class="d-flex align-items-center justify-content-between"><span
                                    data-v-db3e7bea=""
                                    class="text-16 font-weight-400 text-neutral-700 mt-1 text-uppercase">{{ $product->company }}</span>
                            </div>
                        </div>
                    </div>
                    <div data-v-db3e7bea="" class="mb-3">
                        <div data-v-db3e7bea="" class="tab-gift px-3 tab-gift-2">
                            <div id="infoTab" data-v-db3e7bea="" class="tab-item active">
                                Thông tin
                            </div>
                            <div id="conditionTab" data-v-db3e7bea="" class="tab-item">
                                Điều kiện sử dụng
                            </div>
                        </div>

                        <!-- Thông tin -->
                        <div id="infoContent" data-v-db3e7bea="" class="wrap-detail-gift mt-3 d-flex flex-column">
                            <div data-v-db3e7bea="" class="d-flex align-items-start">
                                <div data-v-db3e7bea="" style="width: 12%;">
                                    <span data-v-db3e7bea="" class="icon-gift">
                                        <i data-v-db3e7bea="" class="far fa-calendar"></i>
                                    </span>
                                </div>
                                <div data-v-db3e7bea="" style="width: 88%;">
                                    <div data-v-db3e7bea="" class="text-16 font-weight-600">Thời hạn sử dụng</div>
                                    <div data-v-db3e7bea="" class="font-weight-400 mt-1">{{ $product->expiration }} ngày
                                        kể từ ngày đổi quà</div>
                                </div>
                            </div>
                            <div data-v-db3e7bea="" class="d-flex align-items-start" style="margin-top: 25px;">
                                <div data-v-db3e7bea="" style="width: 12%;">
                                    <span data-v-db3e7bea="" class="icon-gift">
                                        <i data-v-db3e7bea="" class="far fa-gift"></i>
                                    </span>
                                </div>
                                <div data-v-db3e7bea="" style="width: 88%;">
                                    <div data-v-db3e7bea="" class="text-16 font-weight-600">Mô tả quà tặng</div>
                                    <div data-v-db3e7bea="" class="font-weight-400 mt-1">{!! $product->description !!}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Điều kiện sử dụng -->
                        <div id="conditionContent" data-v-db3e7bea=""
                            class="wrap-detail-gift mt-3 d-flex flex-column font-weight-400" style="display: none;">
                            <p>{{ $product->condition }}</p>
                        </div>
                    </div>

                    <script>
                        document.getElementById('infoTab').addEventListener('click', function() {
                            document.getElementById('infoTab').classList.add('active');
                            document.getElementById('conditionTab').classList.remove('active');

                            document.getElementById('infoContent').style.display = 'flex';
                            document.getElementById('conditionContent').style.display = 'none';
                        });

                        document.getElementById('conditionTab').addEventListener('click', function() {
                            document.getElementById('conditionTab').classList.add('active');
                            document.getElementById('infoTab').classList.remove('active');

                            document.getElementById('conditionContent').style.display = 'flex';
                            document.getElementById('infoContent').style.display = 'none';
                        });
                    </script>


                </div>
                <div data-v-db3e7bea="" class="modal-footer">
                    @if ($employer->top_point < $product->top_point)
                        <div data-v-db3e7bea="" class="warning-change-gift">
                            <i data-v-db3e7bea="" class="fas fa-triangle-exclamation"></i>
                            <div data-v-db3e7bea="" class="font-weight-400 ml-2">
                                Số Top Point không đủ để đổi quà. Vui lòng
                                <span data-v-db3e7bea="" class="text-primary font-weight-600 cursor-pointer">Mua thêm đơn
                                    hàng</span>
                                để tích thêm Top Point.
                            </div>
                        </div>
                        <button data-v-db3e7bea="" type="button"
                            class="btn min-width btn btn-primary-disable btn-lg w-100 font-weight-600"
                            disabled="disabled">
                            Đổi ngay {{ $product->top_point }} Top Point
                        </button>
                    @else
                        <form action="{{ route('purchase.product', $product->id) }}" method="POST">
                            @csrf
                            <button data-v-db3e7bea="" type="submit"
                                class="btn min-width btn btn-primary btn-lg w-100 font-weight-600">
                                Đổi ngay {{ $product->top_point }} Top Point
                            </button>
                        </form>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
