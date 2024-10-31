@extends('dashboard-employer')

@section('content')
    <main data-v-48257136="" class="page-container service-page position-relative">
        <div data-v-48257136="" class="breadcrumb-box">
            <h6 class="breadcrumb-title d-flex">
                <div><span>Mua dịch vụ</span></div>
            </h6>
        </div>
        <div data-v-48257136="" class="container-fluid page-content">
            <div data-v-1eb6ef20="" data-v-48257136="">
                @foreach ($carts->groupBy('type_cart_id') as $typeCartId => $cartsByType)
                    <div data-v-1eb6ef20="" class="service-group">
                        <div data-v-1eb6ef20="" class="d-flex service-group-header">
                            <h3 data-v-1eb6ef20="" class="text-uppercase font-s-1-9 mg-b-8 mb-0">
                                <span data-v-1eb6ef20="" class="text-primary font-normal">{{ $cartsByType->first()->typeCart->name ?? 'Unknown Type' }}</span>
                            </h3>
                            <div data-v-1eb6ef20="" role="button" class="ml-2 position-relative d-flex align-items-center">
                            </div>
                        </div>
                        <p data-v-1eb6ef20="" class="cat-description mg-0">{!! $cartsByType->first()->typeCart->detail ?? 'Unknown Type' !!}</p>
                        <div data-v-1eb6ef20="" class="list-service">
                            @foreach ($cartsByType as $cart)
                                <div data-v-1eb6ef20="" class="service">
                                    <div data-v-f938ab0e="" data-v-1eb6ef20="">
                                        <div data-v-f938ab0e="" class="v-popover service-box">
                                            <div class="trigger" style="display: inline-block;">
                                                <div data-v-f938ab0e="" class="service-item d-flex flex-column justify-content-between service-item__lg">
                                                    <a data-v-f938ab0e="" href="{{ route('job-postings.cart.detail', $cart->id) }}" class="link-service-detail">
                                                        <div data-v-f938ab0e="" style="position: relative;"></div>
                                                        <div data-v-f938ab0e="" type="button" class="detail-service">
                                                            <h4 data-v-f938ab0e="" class="text-uppercase d-flex align-items-center">
                                                                <span data-v-f938ab0e="" class="service-name">{{ $cart->title }}</span> 
                                                            </h4>
                                                            <p data-v-f938ab0e="" class="service-price font-weight-bold text-primary">
                                                                {{ number_format($cart->value, 0, ',', '.') }}
                                                                {{ $cart->planCurrency->currency }}<span data-v-f938ab0e="" class="text-danger">*</span>
                                                            </p>
                                                             <p data-v-f938ab0e="" class="service-description color-gray custom-color">
                                                                    {{ $cart->description_home }}
                                                                </p>
                                                            {{-- @foreach ($cart->planFeatures as $feature)
                                                                <p data-v-f938ab0e="" class="service-description color-gray custom-color">
                                                                    {{ $feature->feature }}
                                                                </p>
                                                            @endforeach --}}
                                                        </div>
                                                    </a>
                                                    <div data-v-f938ab0e="" class="d-flex flex-row align-items-center justify-content-between">
                                                        <form action="{{ route('cartlist.add', $cart->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn min-width btn btn-secondary btn-service font-weight-bold btn-add-service">
                                                                <i class="mr-1 fa-solid fa-cart-shopping mr-1"></i> Thêm vào giỏ
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <p data-v-1eb6ef20="" class="text-red">* Giá dịch vụ chưa bao gồm VAT</p>
            </div>
        </div>
    </main>
@endsection

