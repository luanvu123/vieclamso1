@extends('dashboard-employer')

@section('content')
    <main data-v-34354262="" class="page-container">
        <div data-v-34354262="" class="breadcrumb-box">
            <h6 class="breadcrumb-title d-flex">
                <div><span>Cài đặt tài khoản</span> </div>
            </h6>
        </div>
        <div data-v-34354262="" class="container-fluid page-content">
            <div data-v-34354262="" class="card shadow-none border-0">
                <div data-v-34354262="" class="d-flex shadow-sm">
                    <div data-v-34354262="">
                        <div data-v-2015c63f="" data-v-34354262="" class="list-group rounded"><a data-v-2015c63f=""
                                href="{{ route('employer.change-password') }}"
                                class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                    class="fa mr-2 fa-lock"></i> Đổi mật khẩu </a><a data-v-2015c63f=""
                                href="{{ route('employer.profile') }}"
                                class="list-group-item list-group-item-action border-0 nuxt-link-active"><i
                                    data-v-2015c63f="" class="fa mr-2 fa-user"></i> Thông tin cá nhân </a><a
                                data-v-2015c63f="" href="{{ route('employer.gpkd') }}"
                                class="list-group-item list-group-item-action border-0"><i data-v-2015c63f=""
                                    class="fa mr-2 fa-file"></i> Giấy đăng ký doanh nghiệp </a><a data-v-2015c63f=""
                                href="{{ route('companies.index') }}" aria-current="page"
                                class="list-group-item list-group-item-action border-0 nuxt-link-exact-active nuxt-link-active active"><i
                                    data-v-2015c63f="" class="fa mr-2 fa-building"></i> Thông tin công ty </a></div>
                    </div>
                    <div data-v-34354262="" class="bg-white content rounded">
                        <form data-v-7805af9a="" data-v-34354262="">
                            <div data-v-7805af9a="">
                                <div data-v-7805af9a="" class="card-header bg-white font-weight-bold border-0">
                                    Thông tin công ty
                                </div>
                                <main data-v-bf268ef6="" data-v-7805af9a="" class="ekyc-noti">
                                    <div data-v-bf268ef6="" class="area-encourage-verify-ekyc">
                                        <div data-v-bf268ef6="">
                                            <div data-v-bf268ef6="" class="d-flex justify-content-between"
                                                style="font-size: 14px;">
                                                <div data-v-bf268ef6="" class="d-flex">
                                                    <div data-v-bf268ef6="" class="d-flex align-content-center"><img
                                                            data-v-bf268ef6="" alt=""
                                                            src="/app/_nuxt/img/encourage-verify-ekyc.b6e7a78.svg"></div>
                                                    <div data-v-bf268ef6="" class="pl-3" style="font-size: 13px;">
                                                        <p data-v-bf268ef6="" class="mb-0 text-info font-weight-bolder">
                                                            Xác thực tài khoản điện tử giúp bạn
                                                        </p>
                                                        <ul data-v-bf268ef6="">
                                                            <li data-v-bf268ef6="">Tăng mức độ uy tín thương hiệu tuyển dụng
                                                                của công ty</li>
                                                            <li data-v-bf268ef6="">Bảo vệ thương hiệu tuyển dụng trước các
                                                                đối tượng giả mạo</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div data-v-bf268ef6="" class="d-flex align-items-center "><button
                                                        data-v-bf268ef6="" type="button"
                                                        class="btn min-width btn btn-info ml-2 align-items-center"
                                                        style="height: 36px; padding: 8px 34px; line-height: normal;"><!---->
                                                        <i data-v-bf268ef6="" class="fa-solid fa-shield menu-item-icon mr-3"
                                                            style="font-size: 16px;"></i>
                                                        Xác thực ngay


                                                    </button></div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                                <div data-v-7805af9a="" class="card-body pt-1">
                                    <div data-v-7805af9a="">
                                        <div data-v-7805af9a="" class="d-flex justify-content-between border mb-3 p-3">
                                            <div data-v-7805af9a="">
                                                <div data-v-7805af9a="" class="font-weight-600">Yêu cầu cập nhật thông tin
                                                    công ty</div>
                                                <div data-v-7805af9a="" class="mt-1"
                                                    style="font-size: 12px; color: rgb(94, 99, 104);">Ngày yêu cầu gần nhất:
                                                    --:-- --/--/--</div>
                                            </div>
                                            <div data-v-7805af9a="" class="cursor-pointer"
                                                style="background-color: rgb(0, 177, 79); color: white; padding: 10px 16px; border-radius: 5px;">
                                                Tạo yêu cầu
                                            </div>
                                        </div>
                                        <div data-v-7805af9a="" class="border">
                                            <div data-v-7805af9a=""
                                                class="d-flex justify-content-between company-info-header mb-2 p-3">
                                                <div data-v-7805af9a="" class="d-flex">
                                                    <div data-v-2a31697a="" data-v-7805af9a="" class="mr-3  avatar"
                                                        style="width: 40px; height: 40px; flex: 0 0 40px; background-image: url(&quot;https://static.topcv.vn/company_logos/f3bedfa1973bb8310a22fee8c183a90f-66bf1ebd8cd98.jpg&quot;);">
                                                    </div>
                                                    <div data-v-7805af9a="">
                                                        <p data-v-7805af9a="" class="mb-1 font-weight-600">CÔNG TY TNHH
                                                            CÔNG NGHIỆP TỔNG HỢP VIỆT NAM</p>
                                                        <p data-v-7805af9a="" class="mb-0 text-muted">Tầng 5, tòa nhà số
                                                            29 Lê Đại Hành, Phường Lê Đại Hành, Quận Hai Bà Trưng, Hà Nội |
                                                            25-99 nhân viên</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-v-7805af9a="" class="company-info-body px-3">
                                                <div data-v-7805af9a="" class="row mt-3">
                                                    <div data-v-7805af9a="" class="col-md-6">
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-5 font-weight-bold text-muted">
                                                                Mã số thuế:
                                                            </div>
                                                            <div data-v-7805af9a="" class="col-md-7">0101042479</div>
                                                        </div>
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-5 font-weight-bold text-muted">Lĩnh vực hoạt
                                                                động:</div>
                                                            <div data-v-7805af9a="" class="col-md-7">Cơ khí, Bảo trì / Sửa
                                                                chữa, Thương mại điện tử, Tự động hóa</div>
                                                        </div>
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-5 font-weight-bold text-muted">Email:</div>
                                                            <div data-v-7805af9a="" class="col-md-7">
                                                                nguyen-duy.vinh@han.vgi.com.vn</div>
                                                        </div>
                                                    </div>
                                                    <div data-v-7805af9a="" class="col-md-6">
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-5 font-weight-bold text-muted">Website:</div>
                                                            <div data-v-7805af9a="" class="col-md-7"><span
                                                                    data-v-7805af9a=""
                                                                    class="text-primary">https://vgi.com.vn/</span></div>
                                                        </div>
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-5 font-weight-bold text-muted">Quy mô:</div>
                                                            <div data-v-7805af9a="" class="col-md-7">25-99 nhân viên</div>
                                                        </div>
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-5 font-weight-bold text-muted">Số điện thoại
                                                            </div>
                                                            <div data-v-7805af9a="" class="col-md-7">0989200815</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-v-7805af9a="" class="row">
                                                    <div data-v-7805af9a="" class="col-md-12">
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-2 font-weight-bold text-muted"
                                                                style="width: 20.8333%; flex: 0 0 20.8333%; max-width: 20.8333%;">
                                                                Địa chỉ:
                                                            </div>
                                                            <div data-v-7805af9a="" class="col-md-10"
                                                                style="width: 79.1667%; flex: 0 0 79.1667%; max-width: 79.1667%;">
                                                                Tầng 5, tòa nhà số 29 Lê Đại Hành, Phường Lê Đại Hành, Quận
                                                                Hai Bà Trưng, Hà Nội
                                                            </div>
                                                        </div>
                                                        <div data-v-7805af9a="" class="row mb-2">
                                                            <div data-v-7805af9a=""
                                                                class="col-md-2 font-weight-bold text-muted"
                                                                style="width: 20.8333%; flex: 0 0 20.8333%; max-width: 20.8333%;">
                                                                Mô tả công ty:
                                                            </div>
                                                            <div data-v-7805af9a="" class="col-md-10"
                                                                style="width: 79.1667%; flex: 0 0 79.1667%; max-width: 79.1667%;">
                                                                <p>Vietnam General Industrial Company Limited was
                                                                    established in 1998, we operate in many industrial
                                                                    fields and are a prestigious company in consulting,
                                                                    designing, and supplying industrial equipment for
                                                                    factories and projects in Vietnam. Our company is a
                                                                    representative distributor of equipment, providing
                                                                    comprehensive consulting services, repairing and
                                                                    participating in Liebherr projects in Vietnam.&nbsp;</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-7805af9a="" id="yqVsO" data-backdrop="static" role="dialog"
                                class="modal">
                                <div role="document" class="modal-dialog">
                                    <div class="modal-content border-0">
                                        <div class="modal-header border-bottom-1 px-4">
                                            <h5
                                                class="modal-title text-truncate overflow-hidden font-weight-600 text-nowrap">
                                                <!---->Thông báo
                                            </h5> <button aria-label="Close" data-dismiss="modal" type="button"
                                                class="close"><span aria-hidden="true"><i
                                                        class="fal fa-times"></i></span></button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer border-top-0 pt-0 m-auto"><button type="button"
                                                class="btn min-width btn btn-primary px-5 btn-lg"><!----> Đồng ý

                                            </button></div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-dbd28d6a="" data-v-7805af9a="" id="OoUGS" data-backdrop="static"
                                role="dialog" class="modal">
                                <div role="document" class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0">
                                        <div class="modal-header border-bottom-1 px-4">
                                            <h5
                                                class="modal-title text-truncate overflow-hidden font-weight-600 text-nowrap">
                                                <!---->Yêu cầu cập nhật thông tin công ty
                                            </h5> <button aria-label="Close" data-dismiss="modal" type="button"
                                                class="close"><span aria-hidden="true"><i
                                                        class="fal fa-times"></i></span></button>
                                        </div>
                                        <div data-v-dbd28d6a="" class="modal-body">
                                            <p data-v-dbd28d6a="">Do có cập nhật <span data-v-dbd28d6a=""
                                                    class="font-weight-600">Mã số thuế</span> hoặc <span
                                                    data-v-dbd28d6a="" class="font-weight-600">Tên công ty</span>, vui
                                                lòng bổ sung thông tin dưới đây để hoàn hành yêu cầu cập nhật
                                                thông tin công ty</p>
                                            <div data-v-dbd28d6a="" class="form-update">
                                                <div data-v-dbd28d6a="" class="item"><label data-v-dbd28d6a=""
                                                        class="font-weight-500">
                                                        Lý do cập nhật thông tin công ty
                                                        <span data-v-dbd28d6a=""
                                                            class="text-red font-weight-normal">*</span></label>
                                                    <div data-v-0ec03045="" data-v-dbd28d6a="" class="">
                                                        <div data-v-0ec03045=""
                                                            class="input-container ml-auto position-relative"><!---->
                                                            <!----> <!----> <input data-v-0ec03045="" id="cimzhOFwud"
                                                                autocomplete="true" placeholder="Nhập lý do"
                                                                type="text" class="form-control"> <!---->
                                                        </div> <!---->
                                                    </div>
                                                </div>
                                                <div data-v-dbd28d6a="" class="item"><label data-v-dbd28d6a=""
                                                        class="font-weight-500">
                                                        Giấy đăng ký doanh nghiệp hoặc Giấy tờ tương đương khác
                                                        <span data-v-dbd28d6a=""
                                                            class="text-red font-weight-normal">*</span></label>
                                                    <div data-v-6bfc33fa="" data-v-dbd28d6a="" class="file-upload mt-2">
                                                        <div data-v-6bfc33fa="" class="mx-4"><span data-v-6bfc33fa=""
                                                                class="text-muted"><span data-v-6bfc33fa="">Chọn hoặc kéo
                                                                    file vào đây</span></span>
                                                            <div data-v-6bfc33fa="" class="small">Dung lượng tối đa 5MB,
                                                                định dạng: jpeg, jpg, png, pdf</div> <!---->
                                                        </div> <input data-v-6bfc33fa="" id="uwiuV"
                                                            accept=".jpeg, .jpg, .png, .pdf" type="file"> <label
                                                            data-v-6bfc33fa="" for="audio-file"
                                                            class="btn btn-secondary text-primary btn-sm mt-2"><i
                                                                data-v-6bfc33fa="" class="fas fa-upload"></i> Chọn file
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-v-dbd28d6a="" class="modal-footer border-top-0 pt-0 right-0">
                                            <div data-v-dbd28d6a="" class="btn-cancel cursor-pointer">Hủy</div> <button
                                                data-v-dbd28d6a="" disabled="disabled" class="btn btn-submit"><i
                                                    data-v-dbd28d6a="" class="fa-sharp fa-solid fa-paper-plane-top"
                                                    style="margin-right: 10px;"></i>Gửi yêu cầu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
