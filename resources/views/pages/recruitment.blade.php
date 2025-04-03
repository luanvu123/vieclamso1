@extends('layout-recruitment')
@section('content')
    <div style="background-image: url(images/introduction/background_header.png)" class="bg-center bg-no-repeat bg-cover">
        <div class="w-container flex flex-col justify-center text-center pt-2 md:pt-8 px-4 md:px-0 leading-tight">
            <h1 class="md:text-[48px] text-[14px] font-semibold m-auto">
                {{ $info_lg->recruitment_title_1 }}
            </h1>
            <div style="position: relative; margin-top: 5px">
                <a href="{{ route('job-postings.index') }}" target="_blank"
                    class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] btn-post-job-free">
                   Đăng tin miễn phí
                    <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="flex justify-center">
                <img style="max-width: 80%" src="{{ asset('storage/' . $info->recruitment_image_1) }}"
                    title="Hệ thống đăng tin tuyển dụng miễn phí" alt="He thong dang tin tuyen dung mien phi">
            </div>
        </div>
    </div>
    <div class="bg-[#F4F5F5] py-[40px] md:py-[80px]">
        <div class="w-container flex items-center flex-col px-[20px] md:flex-row md:px-[0]">
            <div class="md:w-[685px] md:w-max[100%]">
                <div class="uppercase text-primary mb-[10px]">
                    {{ $info->big_update_title }}
                </div>
                <h2
                    class="md:text-[24px] text-[18px] leading-tight border-l-4 border-primary font-simibold mb-[10px] pl-[8px]">
                    {{ $info_lg->big_update_title_1 }}
                </h2>
                <p class="md:text-[14px] font-light text-color-light">
                    {{ $info_lg->big_update_description }}
                </p>
                <div class="text-center md:text-left mt-2">
                    <a href="#"
                        class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                       Tư vấn tuyển dụng miễn phí
                        <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="md:w-[685px] md:w-max[100%]">
                <img class="mt-4 md:mt-0" src="{{ asset('storage/' . $info->big_update_image) }}"
                    title="Cập nhật mới của trang đăng tin tuyển dụng miễn phí"
                    alt="Cap nhat moi cua trang dang tin tuyen dung mien phi">
            </div>
        </div>
    </div>
    <div class="bg-white py-[40px] md:py-[80px]">
        <div class="w-container px-[20px]">
            <h2 class="text-[30px] font-bold text-center mb-[32px] md:mb-[40px]">
              Công nghệ đăng tin tuyển dụng mới. Tính năng mới. Trải nghiệm mới.
            </h2>
            <div class="bg-[#F4F5F5] rounded-[10px] p-[16px] md:flex md:items-center md:flex-row-reverse">
                <div class="md:w-1/2">
                    <div class="text-primary uppercase mb-[10px]">
                        {{ $info->ai_in_recruitment }}
                    </div>
                    <h2 class="text-[18px] md:text-[24px] border-l-4 border-primary font-semibold mb-[10px] pl-[8px]">
                        {{ $info_lg->ai_in_recruitment_h1 }}
                    </h2>
                    <p class="md:text-[14px] font-light text-color-light">
                        {{ $info_lg->ai_in_recruitment_h2 }}
                    </p>
                    <div class="text-center md:text-left mt-4">
                        <a href="#"
                            class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                            Tư vấn miễn phí
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $info->ai_in_recruitment_image) }}"
                        title="Trang web đăng tin tuyển dụng miễn phí" alt="Trang web dang tin tuyen dung mien phi">
                </div>
            </div>
        </div>
    </div>
    <section id="feature" class="w-container py-[40px] md:py-[80px]">
        <div class="text-center px-[20px]">
            <div class="text-primary uppercase">
                {{ $info->core_functions }}
            </div>
            <h2 class="text-[30px] md:text-[30px] mt-2 font-bold">
                {{ $info_lg->smart_recruitment }}
            </h2>
            <p class="md:text-[14px] mt-4 font-light text-color-light">
                {{ $info_lg->smart_recruitment_description }}
            </p>
        </div>
        <div class="px-[20px] mt-[20px] md:mt-[42px]">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px] md:gap-[40px]">
                @foreach ($recruitment_lg as $recruitment)
                    <div class="bg-white relative rounded-[12px] p-[24px]">
                        <h3 class="text-[20px] mb-[16px] font-bold text-center">
                            {{ $recruitment->title }}
                        </h3>
                        <div class="mb-[16px] text-center">
                            <img class="m-auto" src="{{ asset('storage/' . $recruitment->image) }}"
                                title="{{ $recruitment->title }}" alt="{{ $recruitment->title }}">
                        </div>
                        <p class="font-light md:text-[14px] text-center text-color-light">
                            {{ $recruitment->description }}
                        </p>
                        <div class="text-center mt-3">
                            <a href="{{ $recruitment->url }}" target="_blank" style="color: #00B14F">
                               Tìm hiểu thêm
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <section id="service">
        <div class="bg-white">
            <div class="w-container w-container-1 flex text-left px-4 md:px-0">
                <div class>
                    <div class="pb-7 md:pb-24">
                        <div class="w-container text-center pt-10 md:pt-20 px-4 md:px-0">
                            <div class="text-primary uppercase">
                                RECRUITMENT SERVICES
                            </div>
                            <h2 class="text-[24px] md:text-[30px] mt-2 font-bold">
                                Dịch vụ đăng tuyển tuyển dụng.
                            </h2>
                        </div>
                        @foreach ($service_lg as $service)
                            @if ($service->position_image == 'left')
                                <div class="md:pb-6 md:flex-row flex flex-col pt-3 pl-3 md:ml-0">
                                    <div class="md:w-5/12">
                                        <img class="m-auto w-11/12 md:w-auto"
                                            src="{{ asset('storage/' . $service->image) }}" title="{{ $service->title }}"
                                            alt="{{ $service->title }}" class>
                                    </div>
                                    <div class="md:w-7/12 md:pl-6 table">
                                        <div class="table-cell align-middle">
                                            <div class="w-11/12 md:w-full">
                                                <h3 class="text-[14px] md:text-[28px] mb-5 font-semibold">
                                                    {{ $service->title }}</h3>
                                                <p class="md:text-[14px] font-light text-color-light">
                                                    {!! $service->description !!}</p>
                                                <div class="text-center md:text-left">
                                                    <a href="#"
                                                        class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                                                        Tư vấn miễn phí
                                                        <i class="fa-solid fa-arrow-right ml-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="md:pb-6 md:flex-row flex flex-col pt-3 pl-3 md:ml-0">
                                    <div class="md:w-7/12 md:pl-6 table">
                                        <div class="table-cell align-middle">
                                            <div class="md:ml-10">
                                                <h3 class="text-[14px] md:text-[28px] mb-5 font-semibold">
                                                    {{ $service->title }}</h3>
                                                <p class="md:text-[14px] font-light text-color-light">
                                                    {!! $service->description !!}</p>
                                                <div class="text-center md:text-left">
                                                    <a href="#"
                                                        class="bg-primary py-2.5 px-4 rounded text-white text-center font-[14px] font-semibold leading-[3rem] show-modal-create-lead">
                                                        Tư vấn miễn phí
                                                        <i class="fa-solid fa-arrow-right ml-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:w-5/12">
                                        <img class="w-11/12 md:w-auto" src="{{ asset('storage/' . $service->image) }}"
                                            title="{{ $service->title }}" alt="{{ $service->title }}" class>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="w-container py-[40px]">
            <div class="text-center mb-[42px] px-[20px]">
                <div class="text-primary uppercase">
                    Figures
                </div>
                <h2 class="text-[24px] md:text-[30px] mt-2 font-bold">
Những con số của trang tuyển dụng của Vieclamso1
                </h2>
            </div>
            <div class="px-[20px]">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px] md:gap-[30px]">

                    @foreach ($figure_lg as $figure)
                        <div class="bg-white p-[24px] text-center rounded-[10px]">
                            <div class="text-[40px] leading-tight mb-[16px] text-primary font-bold">
                                {{ $figure->name }}
                            </div>
                            <p class="font-light md:text-[14px] text-color-light">{{ $figure->title }}</p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="w-container py-[40px] banner-form" id="banner-form">
            <div class="form-banner-title">
           Đâu là giải pháp phù hợp cho doanh nghiệp của bạn?
            </div>
            <div class="form-banner-subtitle">
              Hãy để lại thông tin và các chuyên viên tư vấn tuyển dụng của Vieclamso1 sẽ liên hệ ngay với bạn
            </div>
            <div class="md:flex md:items-start md:justify-between mr-[118px] center-form">
                <div class="md:w-1/2 left-banner-form" id="left-banner-form">
                    <div class="center-banner-form">
                    </div>
                </div>
                <div class="left-banner-form-mobile">
                    <div class="center-banner-form">
                    </div>
                </div>
                <div class="md:w-1/2 right-banner-form" id="right-banner-form">
                    <div class="form-lead-container">
                        <div class="icon-top-form-lead"><span class="btn-close-form-lead"><i
                                    class="fa-regular fa-xmark"></i></span></div>
                        <div class="form-lead-title">Đăng ký nhận tư vấn</div>
                        <form action="{{ route('consultations.store') }}" method="POST">
                            @csrf
                            <div class="d-flex form-lead-scroll" id="form-lead-scroll-">
                                <div class="form-lead-label">Họ và tên</div>
                                <div class="form-lead-item form-item-name">
                                    <i class="fa-regular fa-user"></i>
                                    <input type="text" name="fullname" required id="fullname-"
                                        placeholder="Họ và tên" />
                                </div>
                                <div class="form-lead-msg msg-name"></div>

                                <div class="form-lead-label">Email</div>
                                <div class="form-lead-item form-item-email">
                                    <i class="fa-regular fa-envelope"></i>
                                    <input type="email" name="email" required id="email-" placeholder="email" />
                                </div>
                                <div class="form-lead-msg msg-email"></div>

                                <div class="form-lead-label">Số điện thoại</div>
                                <div class="form-lead-item form-item-phone">
                                    <i class="fa-regular fa-mobile-notch"></i>
                                    <input type="text" name="phone" maxlength="10" id="phone-" required
                                        placeholder="Số điện thoại" />
                                </div>
                                <div class="form-lead-msg msg-phone"></div>

                                <div class="form-lead-label">Tỉnh thành</div>
                                <div class="form-lead-item form-item-city">
                                    <i class="fa-regular fa-building"></i>
                                    <select name="city_id" id="city-id-" class="place_holder dropdown_select" required>
                                        <option value="" disabled selected>Chọn tỉnh thành</option>
                                        @foreach ($cities as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-lead-msg msg-city"></div>

                                <div class="form-lead-label">Nhu cầu tư vấn</div>
                                <div class="form-lead-item form-item-consulting">
                                    <i class="fa-regular fa-square-question"></i>
                                    <select name="type_consulting_id" id="consulting-type-"
                                        class="place_holder dropdown_select" required>
                                        <option value="" disabled selected>Chọn nhu cầu tư vấn</option>
                                        @foreach ($typeConsultations as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-lead-item mt-3 other-consulting" id="other-consulting-">
                                    <textarea name="consulting_text" id="consulting-text-" placeholder="Nhập nhu cầu tư vấn..." rows="3"></textarea>
                                </div>
                                <div class="form-lead-msg msg-consulting"></div>

                                <div class="form-footer-lead">
                                    <button type="submit" id="created-lead-"><i
                                            class="fa-solid fa-paper-plane-top"></i>Gửi yêu cầu </button>
                                </div>
                        </form>
                        <div class="suggest-post-job">
                            Bạn cần tuyển dụng gấp?
                            <a href="{{ route('job-postings.index') }}" target="_blank" class="btn-post-job-free">Đăng
                                tin miễn phí ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    const heightForm = $(".right-banner-form").height();
                    if (heightForm) {
                        $(".left-banner-form").height(heightForm);
                    }
                });
            </script>
        </div>
        <div class="w-container py-[40px]">
            <div class="text-center mb-[42px] px-[20px]">
                <div class="text-primary uppercase">
                    Values
                </div>
                <h2 class="text-[24px] md:text-[30px] mt-2 font-bold" style="color: white">
                   Giá trị khi sử dụng Vieclamso1 Smart Recruitment Platform
                </h2>
            </div>
            <div class="px-[20px]">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] md:gap-[40px]">
                    @foreach ($value_lg as $value)
                        <div class="bg-white py-[24px] px-[16px] rounded-[10px] md:py-[40px] md:px-[40px]">
                            <div class="mb-[16px] md:mb-[50px]">
                                <img class="w-full" src="{{ asset('storage/' . $value->image) }}"
                                    title="{{ $value->name }}" alt="{{ $value->name }}">
                            </div>
                            <h3
                                class="text-[14px] md:text-[24px] leading-tight border-l-4 border-primary px-2 font-semibold mb-[17px] md:mb-[20px]">
                                {{ $value->name }}
                            </h3>
                            <ul class="md:text-[14px] font-light text-color-light">
                                <li>{!! $value->description !!}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="bg-white py-[40px] md:py-[80px]">
        <div class="w-container px-[20px]">
            <div class="text-center mb-[35px] md:mb-[40px]">
                <div class="text-primary uppercase mb-[10px]">
                    {{ $info_lg->about_us }}
                </div>
                <h2 class="text-[24px] md:text-[30px] font-bold">
                   Về chúng tôi
                </h2>
            </div>
            <div class="bg-[#F4F5F5] rounded-[10px] p-[16px] md:flex md:items-center md:p-[40px]">
                <div class="md:w-1/2">
                    <div class="font-light md:leading-[36px] md:text-[14px] text-color-light text-justify">
                        <p class="pb-8">
                            {!! $info_lg->about_us_h1 !!}
                        </p>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-[40px]">
                    <img class="hidden md:block md:translate-y-[-57px]"
                        src="{{ asset('storage/' . $info->about_us_image) }}" title="Nhân sự của  Vieclamso1"
                        alt="Nhan su cua  Vieclamso1">
                    <img class="md:hidden" src="{{ asset('storage/' . $info->about_image_mobile) }}"
                        title="Nhân sự của  Vieclamso1" alt="Nhan su cua  Vieclamso1">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-[40px] md:py-[80px]">
        <div class="w-container px-[20px]">
            <div class="text-center mb-[35px] md:mb-[40px]">
                <div class="text-primary uppercase mb-[10px]">
                    Our Awards
                </div>
                <h2 class="text-[24px] md:text-[30px] font-bold">
                  Giải thưởng
                </h2>
            </div>
            <div class="grid grid-cols-1 gap-[20px] md:grid-cols-4 md:gap-[40px]">

                @foreach ($award_lg as $award)
                    <div class="bg-white rounded-[10px] shadow-[0_3px_20px_#0000001A] p-[20px]">
                        <div class="mb-[20px]">
                            <img src="{{ asset('storage/' . $award->image) }}"
                                class="w-full rounded shadow-[0_3px_30px_#88888829] object-cover"
                                title="{{ $award->name }}" class="img-top">
                        </div>
                        <div class="text-primary">
                            <a href="#" class>
                                <span class="uppercase">{{ $award->category }}</span>
                            </a>
                        </div>
                        <p class="font-semibold mt-[10px]">{{ $award->name }}</p>
                        <div class="mt-[10px]">
                            <a href="{{ $award->website }}" target="_blank"
                                class="bg-primary px-[16px] py-[10px] rounded-[3px] text-white text-center font-medium inline-block">Đọc
                                thêm</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-white py-[40px]">
        <div class="w-container px-[20px]">
            <div class="text-center mb-[35px]">
                <div class="text-primary uppercase mb-[10px]">
                    Our Partners
                </div>
                <h2 class="text-[24px] md:text-[30px] font-bold">
                   Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1
                </h2>
            </div>
            <div class="grid grid-rows-2 md:grid-rows-1 grid-flow-col gap-[20px] md:gap-[40px]">
                @foreach ($typePartner_lg as $typePartner)
                    <div class="px-[16px] py-[28px] bg-white shadow-[0_46px_50px__#0000001A] rounded-[10px]">
                        <h3 class="text-[18px] md:text-[24px] leading-tight border-l-4 border-primary px-2 font-bold">
                            {{ $typePartner->name }}
                        </h3>
                        <div class="grid grid-rows-3 md:grid-rows-2 grid-flow-col mt-8 md:mt-16">
                            @foreach ($typePartner->partners as $partner)
                                <div class="h-[100px] flex items-center">
                                    <img class="m-auto" src="{{ asset('storage/' . $partner->image) }}"
                                        alt="{{ $partner->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-40px" id="contact">
        <div class="w-container px-[20px]">
            <div class="mb-[24px]">
                <div class="border-l-4 border-primary text-[18px] md:text-[24px] font-semibold px-4">
                 Vieclamso1 Việt Nam mong muốn được hợp tác cùng Doanh nghiệp
                </div>
                <div class="md:text-[14px] font-light mt-[10px] text-color-light">
               Đội ngũ hỗ trợ của Vieclamso1 luôn sẵn sàng để tư vấn giải pháp tuyển dụng và đồng hành cùng các Quý nhà tuyển dụng
                </div>
            </div>
            <div class="grid grid-cols-1 gap-[20px] md:grid-cols-3 md:gap-[40px]">
                @foreach ($typeHotline_lg as $typeHotline)
                    <div class="flex-1 pb-4 md:mr-10">
                        <h3 class="text-[#212f3fcc] font-semibold">Hotline {{ $typeHotline->name }}</h3>
                        <div class="mt-4">
                            @foreach ($hotlines->where('type_hotline_id', $typeHotline->id) as $hotline)
                                <div class="bg-white p-2 md:p-4 mb-2 rounded-lg flex">
                                    <div class="flex">
                                        <i
                                            class="fas fa-phone m-auto rounded-full flex justify-center items-center w-[31px] h-[31px] md:w-[42px] md:h-[42px] md:text-[14px] text-primary bg-[#e5f7ed] mr-4"></i>
                                    </div>
                                    <div>
                                        <a href="tel:{{ $hotline->phone_number }}"
                                            class="text-primary font-medium">{{ $hotline->phone_number }}</a>
                                        <p class="md:font-light md:text-[14px]">{{ $hotline->contact_name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
