@extends('dashboard-employer')

@section('content')
    <main data-v-34a0e819="" class="page-container position-relative">
        <main data-v-4f7dea58="" data-v-34a0e819="" class="page-container main-container">
            <div data-v-4f7dea58="" class="breadcrumb-box mb-4">
                <div data-v-4f7dea58="" class="d-flex align-items-center">
                    <div data-v-4f7dea58="" class="mr-2">
                        <a href="{{ route('job-postings.cart') }}" class="btn min-width btn btn-secondary mr-3 btn-back">
                            <i class="mr-1 fal fa-long-arrow-left mr-1"></i>
                            Quay lại
                        </a>
                    </div>

                    <div data-v-4f7dea58=""><strong data-v-4f7dea58="">
                            <h5 data-v-4f7dea58="" class="mt-2">Chi tiết dịch vụ</h5>
                        </strong></div>
                </div>
            </div>
            <div data-v-4f7dea58="" class="container-fluid page-content mb-3">
                <div data-v-4f7dea58="" class="bg-white service-detail">
                    <div data-v-4f7dea58="" class="service-banner">
                        <div data-v-4f7dea58="" class="info-service">
                            <h6 data-v-4f7dea58="" class="category-image">{{ $cart->title }}</h6>
                            <div data-v-4f7dea58="" class="description">
                                <ul data-v-4f7dea58="" class="d-flex pl-0 mt-1" style="list-style: none;">
                                    <li data-v-4f7dea58="" class="mr-5 li-sub-description">
                                        <div data-v-4f7dea58="" class="d-flex"><i data-v-4f7dea58=""
                                                class="fa-duotone fa-circle-check pt-1"
                                                style="color: rgb(0, 177, 79); padding-right: 5px;"></i> <span
                                                data-v-4f7dea58="">
                                                @foreach ($cart->planFeatures as $feature)
                                                    <p data-v-f938ab0e=""
                                                        class="service-description color-gray custom-color">
                                                        {{ $feature->feature }}
                                                    </p>
                                                @endforeach

                                            </span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- backround_images --}}
                        <img data-v-4f7dea58="" src="{{ asset('storage/' . $cart->background_image) }}" alt=""
                            style="height: 240px;width: 100%">
                    </div>
                    <div data-v-4f7dea58="" class="d-flex pb-4">
                        <div data-v-4f7dea58="" class="detail">
                            <h4 data-v-4f7dea58="" class="mt-3 text-info-service">Thông tin chi tiết dịch vụ</h4>
                            <div data-v-4f7dea58="" class="d-flex box-gift mt-3 mb-4">
                                <div data-v-4f7dea58="" class="expire-time">Thời gian hiệu lực: <span
                                        data-v-4f7dea58="">{{ $cart->validity }} ngày</span></div>
                                <div data-v-4f7dea58="" class="line-right"></div> <!---->
                                <div data-v-4f7dea58="" class="giff">
                                    Quà tặng:<span data-v-4f7dea58=""> {{ $cart->top_point }} Credits</span></div>
                            </div>
                            <div data-v-4f7dea58="" class="content-detail">
                                <div data-v-4f7dea58="">
                                    <p>{!! $cart->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div data-v-4f7dea58="">
                            <div data-v-4f7dea58="" class="box-quantity p-4">
                                <div data-v-4f7dea58="" class="v-popover flash-box">
                                    <div class="trigger" style="display: inline-block;">
                                        <div data-v-4f7dea58="">
                                            <div data-v-4f7dea58="" class="mb-2 service-name">
                                                {{ $cart->title }}</div>
                                            <hr data-v-4f7dea58="">
                                            <div data-v-4f7dea58="" class="price">
                                                {{ number_format($cart->value, 0, ',', '.') }}
                                                {{ $cart->planCurrency->currency }} <span data-v-4f7dea58=""
                                                    class="star">*</span> <!---->
                                            </div>
                                        </div>
                                        <hr data-v-4f7dea58="">
                                        <div data-v-4f7dea58=""
                                            class="d-flex flex-row align-items-center justify-content-between">
                                            <form action="{{ route('cartlist.add', $cart->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="btn min-width btn btn-secondary btn-service font-weight-bold btn-add-service">
                                                    <i class="mr-1 fa-solid fa-cart-shopping mr-1"></i> Thêm vào giỏ
                                                </button>
                                            </form>
                                            <div data-v-4f7dea58="" class="mt-4 vat">* Giá dịch vụ chưa bao gồm VAT</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </main>
@endsection
