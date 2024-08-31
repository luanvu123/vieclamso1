@extends('dashboard-employer')

@section('content')
    <main data-v-6b4def55="" class="page-container">
        <div data-v-6b4def55="" class="breadcrumb-box">
            <h6 class="breadcrumb-title d-flex">
                <div><span>Cài đặt tài khoản</span> </div>
            </h6>
        </div>
        <div data-v-6b4def55="" class="container-fluid page-content">
            <div data-v-6b4def55="" class="d-flex shadow-sm">
                <div data-v-6b4def55="">
                    <div data-v-2015c63f="" data-v-6b4def55="" class="list-group rounded"><a data-v-2015c63f=""
                            href="/app/account/settings/password-login"
                            class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                class="fa mr-2 fa-lock"></i> Đổi mật khẩu </a><a data-v-2015c63f=""
                            href="/app/account/settings"
                            class="list-group-item list-group-item-action border-0 nuxt-link-active"><i data-v-2015c63f=""
                                class="fa mr-2 fa-user"></i> Thông tin cá nhân </a><a data-v-2015c63f=""
                            href="/app/account/settings/gpkd" aria-current="page"
                            class="list-group-item list-group-item-action border-0 nuxt-link-exact-active nuxt-link-active active"><i
                                data-v-2015c63f="" class="fa mr-2 fa-file"></i> Giấy đăng ký doanh nghiệp </a><a
                            data-v-2015c63f="" href="/app/account/settings/company"
                            class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                class="fa mr-2 fa-building"></i> Thông tin công ty </a><a data-v-2015c63f=""
                            href="/app/account/settings/connect-api"
                            class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                class="fa mr-2 fa-share-alt"></i> Kết nối API </a></div>
                </div>
                <div data-v-6b4def55="" class="bg-white w-100 rounded">
                    <form data-v-6b4def55="" data-gtm-form-interact-id="1">
                        <div data-v-6b4def55="">
                            <div data-v-6b4def55="" class="card-header bg-white border-0 header">
                                <div data-v-6b4def55="" style="display: flex; align-items: center;"><span data-v-6b4def55=""
                                        class="font-weight-600" style="margin-right: 10px;">Thông tin Giấy đăng ký doanh
                                        nghiệp</span> <span data-v-6b4def55="" class="color-status color-null"></span></div>
                                <!---->
                            </div>
                            <div data-v-6b4def55="" class="card-body"><!---->
                                <div data-v-6b4def55="">
                                    Vui lòng lựa chọn phương thức đăng tải, xem hướng dẫn đăng tải
                                    <a data-v-6b4def55=""
                                        href="https://drive.google.com/file/d/1RSlBTKDRA2s6oRyNgfzAHdnnTyl2_j3g/view"
                                        target="_blank" style="color: rgb(0, 177, 79);">
                                        Tại đây
                                    </a>
                                </div>
                                <div data-v-6b4def55="" style="margin-top: 24px; display: flex; align-items: center;"><input
                                        data-v-6b4def55="" type="radio" value="gpkd" class="radio-input"
                                        data-gtm-form-interact-field-id="3"> <span data-v-6b4def55=""
                                        class="ml-2 mr-3 font-weight-600">Giấy đăng ký doanh nghiệp hoặc Giấy tờ tương đương
                                        khác</span></div>
                                <div data-v-6b4def55="" style="" class="license-input-wrapper">
                                    <div data-v-6b4def55="" class="input">
                                        <div data-v-6b4def55="" class="input-label"><span data-v-6b4def55="">Giấy tờ</span>
                                            <span data-v-6b4def55="" class="star">*</span>
                                            <p data-v-6b4def55="" style="margin-top: 12px;"><a data-v-6b4def55=""
                                                    target="_blank" class="hover-icon" style="color: black;"><i
                                                        data-v-6b4def55="" class="fa-solid fa-file icon-color"></i>
                                                    Giấy phép kinh doanh
                                                </a></p>
                                        </div>
                                        <div data-v-6b4def55="">
                                            <div data-v-6bfc33fa="" data-v-6b4def55="" class="file-upload mt-2">
                                                <div data-v-6bfc33fa="" class="mx-4"><span data-v-6bfc33fa=""
                                                        class="text-muted"><span data-v-6bfc33fa="">Chọn hoặc kéo file vào
                                                            đây</span></span>
                                                    <div data-v-6bfc33fa="" class="small">Dung lượng tối đa 5MB, định dạng:
                                                        jpeg, jpg, png, pdf</div> <!---->
                                                </div> <input data-v-6bfc33fa="" id="uOJJc"
                                                    accept=".jpeg, .jpg, .png, .pdf" type="file"> <label
                                                    data-v-6bfc33fa="" for="audio-file"
                                                    class="btn btn-secondary text-primary btn-sm mt-2"><i
                                                        data-v-6bfc33fa="" class="fas fa-upload"></i> Chọn file </label>
                                            </div>
                                            <div data-v-6b4def55="" class="warning-text"><i data-v-6b4def55=""
                                                    class="fa-solid fa-triangle-exclamation"></i> <span
                                                    data-v-6b4def55="">
                                                    Các văn bản đăng tải cần đầy đủ các mặt và không có dấu hiệu chỉnh sửa/
                                                    che/ cắt thông tin
                                                </span></div>
                                        </div>
                                    </div>
                                    <div data-v-6b4def55="" class="image">
                                        <div data-v-6b4def55="" class="text">Minh họa</div> <img data-v-6b4def55=""
                                            alt="sample" src="/app/_nuxt/img/sample-licence.7436372.jpg">
                                    </div>
                                </div>
                                <div data-v-6b4def55="" class=""
                                    style="margin-top: 24px; display: flex; align-items: center;"><input
                                        data-v-6b4def55="" type="radio" value="refer" class="radio-input"> <span
                                        data-v-6b4def55="" class="ml-2 mr-3 font-weight-600">Giấy ủy quyền và Giấy tờ định
                                        danh</span></div> <!---->
                            </div>
                            <div data-v-6b4def55="" style="float: right; margin-right: 12px; margin-bottom: 12px;"><!---->
                                <button data-v-6b4def55="" disabled="disabled" type="submit" class="btn min-width"
                                    style="background-color: rgb(0, 177, 79); color: white;"><!---->
                                    Lưu


                                </button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div data-v-6b4def55="" id="jiitS" data-backdrop="static" role="dialog" class="modal">
            <div role="document" class="modal-dialog">
                <div class="modal-content border-0">
                    <div class="modal-header border-bottom-1 px-4">
                        <h5 class="modal-title text-truncate overflow-hidden font-weight-600 text-nowrap"><!---->Thông báo
                        </h5> <button aria-label="Close" data-dismiss="modal" type="button" class="close"><span
                                aria-hidden="true"><i class="fal fa-times"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <div data-v-6b4def55="" class="text-center">
                            TopCV đã nhận được Giấy đăng ký doanh nghiệp của bạn và sẽ kiểm duyệt trong 24 giờ (trừ thứ bảy,
                            chủ nhật, ngày
                            nghỉ lễ, tết theo quy định).
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0 m-auto"><button type="button"
                            class="btn min-width btn btn-primary px-5 btn-lg"><!----> Đồng ý

                        </button></div>
                </div>
            </div>
        </div> <!---->
    </main>
@endsection
