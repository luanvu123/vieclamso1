  @extends('dashboard-employer')

  @section('content')
      <main data-v-179375b4="" class="page-container">
          <div data-v-179375b4="" class="breadcrumb-box">
              <h6 class="breadcrumb-title d-flex">
                  <div><span>Cài đặt tài khoản</span> </div>
              </h6>
          </div>
          <div data-v-179375b4="" class="container-fluid page-content">
              <div data-v-179375b4="" class="d-flex shadow-sm">
                  <div data-v-179375b4="" class="bg-white w-100 rounded">
                      <div data-v-179375b4="" class="card-body setting-form mt-3 radius-4">
                          <div data-v-209c16fc="" data-v-179375b4="">
                              <div data-v-209c16fc="" class="authen-level">
                                  <div data-v-209c16fc="" class="title px-3 pt-3">
                                      Tài khoản xác thực: <span data-v-209c16fc="" class="text-primary">Cấp 1/3</span></div>
                                  <div data-v-209c16fc="" class="p-3 border-bottom-modal">
                                      <div data-v-209c16fc="" class="d-flex mb-3 align-items-center">
                                          <div data-v-209c16fc="" class="mr-3"><img data-v-209c16fc=""
                                                  src="/app/_nuxt/img/star.7ca212d.png" width="40"></div>
                                          <div data-v-209c16fc="" class="pl-0">
                                              <div data-v-209c16fc="">Nâng cấp tài khoản lên <span class="text-primary"
                                                      style="font-weight: 600 !important;">cấp 2/3</span> để nhận <span
                                                      class="text-primary font-weight-bold"
                                                      style="font-weight: 600 !important;">100 lượt xem CV ứng viên từ công
                                                      cụ tìm kiếm CV</span>.</div>
                                          </div>
                                      </div>
                                      <div data-v-209c16fc="" class="verify-step-title">Vui lòng thực hiện các bước xác thực
                                          dưới đây:</div>
                                      <div data-v-9b2a1ab0="" data-v-209c16fc="" class="verify-content">
                                          <div data-v-9b2a1ab0="" class="verify-content__progress">
                                              <div data-v-9b2a1ab0="" class="d-flex justify-content-between"><span
                                                      data-v-9b2a1ab0="" class="verify-content__progress__title">Xác thực
                                                      thông tin</span> <span data-v-9b2a1ab0="">Hoàn thành <span
                                                          data-v-9b2a1ab0=""
                                                          class="text-primary verify-content__progress__percentage ">0%</span></span>
                                              </div>
                                              <div data-v-9b2a1ab0="" class="progress">
                                                  <div data-v-9b2a1ab0="" role="progressbar" aria-valuenow="0"
                                                      aria-valuemin="0" aria-valuemax="100" class="progress-bar"
                                                      style="width: 0%;"></div>
                                              </div>
                                          </div>
                                          <div data-v-9b2a1ab0="" class="verify-item not-verified">
                                              <div data-v-9b2a1ab0="" class="d-flex align-items-center"><i
                                                      data-v-9b2a1ab0="" class="text-20 step-icon fa-light fa-circle"></i>
                                                  <div data-v-9b2a1ab0="" class="ml-2 font-weight-600 verify-item-title"
                                                      style="position: relative;"><span data-v-9b2a1ab0="">Xác thực số điện
                                                          thoại</span> <span data-v-9b2a1ab0=""></span></div>
                                              </div> <span data-v-9b2a1ab0="" class="text-primary btn-to-verify"><i
                                                      data-v-9b2a1ab0="" class="fa-regular fa-arrow-right"></i></span>
                                          </div>
                                          <div data-v-9b2a1ab0="" class="verify-item not-verified">
                                              <div data-v-9b2a1ab0="" class="d-flex align-items-center"><i
                                                      data-v-9b2a1ab0="" class="text-20 step-icon fa-light fa-circle"></i>
                                                  <div data-v-9b2a1ab0="" class="ml-2 font-weight-600 verify-item-title"
                                                      style="position: relative;"><span data-v-9b2a1ab0="">Cập nhật thông
                                                          tin công ty</span> <span data-v-9b2a1ab0=""></span></div>
                                              </div> <span data-v-9b2a1ab0="" class="text-primary btn-to-verify"><i
                                                      data-v-9b2a1ab0="" class="fa-regular fa-arrow-right"></i></span>
                                          </div>
                                          <div data-v-9b2a1ab0="" class="verify-item not-verified">
                                              <div data-v-9b2a1ab0="" class="d-flex align-items-center"><i
                                                      data-v-9b2a1ab0="" class="text-20 step-icon fa-light fa-circle"></i>
                                                  <div data-v-9b2a1ab0="" class="ml-2 font-weight-600 verify-item-title"
                                                      style="position: relative;"><span data-v-9b2a1ab0="">Xác thực Giấy
                                                          đăng ký doanh nghiệp</span> <span data-v-9b2a1ab0=""></span>
                                                  </div>
                                              </div> <span data-v-9b2a1ab0="" class="text-primary btn-to-verify"><i
                                                      data-v-9b2a1ab0="" class="fa-regular fa-arrow-right"></i></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div data-v-209c16fc="" class="d-flex p-3 justify-content-end"><a data-v-209c16fc=""
                                          href="https://tuyendung.topcv.vn/help/huong-dan-su-dung/tao-tai-khoan-nha-tuyen-dung/"
                                          target="_blank" class="btn btn-lg text-primary show-more-btn">Tìm hiểu thêm</a>
                                  </div>
                              </div>
                              <div data-v-209c16fc="" id="bzSvu" data-backdrop="static" role="dialog"
                                  class="modal">
                                  <div role="document" class="modal-dialog modal-company-email-update ">
                                      <div class="modal-content border-0">
                                          <div class="modal-header border-bottom-1 px-4">
                                              <h5
                                                  class="modal-title text-truncate overflow-hidden font-weight-600 text-nowrap">
                                                  <!---->Thông báo
                                              </h5> <button aria-label="Close" data-dismiss="modal" type="button"
                                                  class="close"><span aria-hidden="true"><i
                                                          class="fal fa-times"></i></span></button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <p><i class="fas fa-exclamation-triangle text-danger mr-2"></i>
                                                          <strong class="font-weight-bold">Tài khoản đang sử dụng là email
                                                              cá nhân</strong>
                                                      </p>
                                                      <p>Vui lòng liên hệ CSKH để đổi sang email tên miền công ty.</p>
                                                      <div data-v-06841101="" class="d-flex justify-content-between">
                                                          <div data-v-06841101="" class="w-50"><span data-v-06841101=""
                                                                  class="font-weight-bold text-tr-up">Chuyên viên tư vấn
                                                                  của bạn:</span>
                                                              <div data-v-06841101=""
                                                                  class="d-flex align-items-center mt-2">
                                                                  <div data-v-2a31697a="" data-v-06841101=""
                                                                      class="border mr-2  avatar"
                                                                      style="width: 30px; height: 30px; flex: 0 0 30px; background-image: url(&quot;https://static.topcv.vn/admin_avatars/da1c0b2472bca1d72debdf192fe815c8-6333ef0614054.jpg&quot;);">
                                                                  </div> <span data-v-06841101="">Nguyễn Thị Thúy
                                                                      Hằng</span>
                                                              </div>
                                                              <div data-v-06841101=""
                                                                  class="d-flex align-items-center mt-2"><button
                                                                      data-v-06841101=""
                                                                      class="btn rounded-circle transparent-1 py-1 px-2 btn-primary mr-2"><i
                                                                          data-v-06841101=""
                                                                          class="fas fa-phone-alt"></i></button> <a
                                                                      data-v-06841101="" href="tel:0353 894 608"
                                                                      target="_blank" class="link">
                                                                      0353 894 608
                                                                  </a></div>
                                                              <div data-v-06841101=""
                                                                  class="d-flex align-items-center mt-2"><button
                                                                      data-v-06841101=""
                                                                      class="btn rounded-circle transparent-1 py-1 px-2 btn-primary mr-2"><i
                                                                          data-v-06841101=""
                                                                          class="fas fa-envelope"></i></button> <a
                                                                      data-v-06841101="" href="mailto:hangntt1@topcv.vn"
                                                                      target="_blank" class="link">
                                                                      hangntt1@topcv.vn
                                                                  </a></div>
                                                          </div>
                                                          <div data-v-06841101="" class="w-50"><span data-v-06841101=""
                                                                  class="text-tr-up">Bộ phận hỗ trợ dịch vụ:</span>
                                                              <div data-v-06841101=""
                                                                  class="d-flex align-items-center mt-2"><button
                                                                      data-v-06841101=""
                                                                      class="btn rounded-circle transparent-1 py-1 px-2 btn-primary mr-2"><i
                                                                          data-v-06841101=""
                                                                          class="fas fa-phone"></i></button> <a
                                                                      data-v-06841101="" href="tel:(024)71079799"
                                                                      target="_blank" class="link">
                                                                      (024)71079799
                                                                  </a></div>
                                                              <div data-v-06841101=""
                                                                  class="d-flex align-items-center mt-2"><button
                                                                      data-v-06841101=""
                                                                      class="btn rounded-circle transparent-1 py-1 px-2 btn-primary mr-2"><i
                                                                          data-v-06841101=""
                                                                          class="fas fa-phone"></i></button> <a
                                                                      data-v-06841101="" href="tel:0862691929"
                                                                      target="_blank" class="link">
                                                                      0862691929
                                                                  </a></div>
                                                              <div data-v-06841101=""
                                                                  class="d-flex align-items-center mt-2"><button
                                                                      data-v-06841101=""
                                                                      class="btn rounded-circle transparent-1 py-1 px-2 btn-primary mr-2"><i
                                                                          data-v-06841101=""
                                                                          class="fas fa-envelope"></i></button> <a
                                                                      data-v-06841101="" href="mailto:cskh@topcv.vn"
                                                                      class="link">
                                                                      cskh@topcv.vn
                                                                  </a></div>
                                                          </div> <!---->
                                                      </div>
                                                  </div> <!---->
                                              </div>
                                          </div>
                                          <div class="modal-footer border-top-0 pt-0 m-auto"><button type="button"
                                                  class="btn min-width btn btn-primary px-5 btn-lg"><!----> Xác nhận

                                              </button></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> <!---->
                      <form data-v-179375b4="">
                          <div data-v-179375b4="" class="card-body setting-form mt-3 radius-4">
                              <div data-v-179375b4="" class="font-weight-600 mb-3">
                                  Cập nhật thông tin cá nhân
                              </div>
                              <div data-v-179375b4="" class="border d-flex justify-content-between  mb-3 area-to-ekyc"
                                  style="padding: 8px; border-radius: 5px;">
                                  <div data-v-179375b4="" class="d-flex align-items-center"><i data-v-179375b4=""
                                          class="fa-solid fa-shield mr-2 ml-1" style="font-size: 18px;"></i>
                                      Xác thực tài khoản điện tử eKYC
                                  </div>
                                  <div data-v-179375b4=""><button data-v-179375b4="" type="button"
                                          class="btn btn-to-ekyc">
                                          Xác thực ngay
                                      </button></div>
                              </div>
                              <div data-v-179375b4="" class="row">
                                  <div data-v-179375b4="" class="form-group col-md-6">
                                      <div data-v-179375b4="" class="d-flex align-items-center"><label data-v-179375b4=""
                                              class="col-form-label mr-2">Avatar</label>
                                          <div data-v-2a31697a="" data-v-179375b4="" class="mr-2  avatar"
                                              style="width: 40px; height: 40px; flex: 0 0 40px; background-image: url(&quot;/app/_nuxt/img/noavatar-2.18f0212.svg&quot;);">
                                          </div>
                                          <div data-v-179375b4="">
                                              <div data-v-6bfc33fa="" data-v-179375b4="" class="file-upload mt-2 d-none"
                                                  name="avatar" type="file">
                                                  <div data-v-6bfc33fa="" class="mx-4"><span data-v-6bfc33fa=""
                                                          class="text-muted"><span data-v-6bfc33fa="">Chọn hoặc kéo file
                                                              vào đây</span></span> <!----> <!----></div> <input
                                                      data-v-6bfc33fa="" id="avatar" accept="image/*" type="file">
                                                  <label data-v-6bfc33fa="" for="audio-file"
                                                      class="btn btn-secondary text-primary btn-sm mt-2"><i
                                                          data-v-6bfc33fa="" class="fas fa-upload"></i> Chọn file </label>
                                              </div> <input data-v-179375b4="" name="avatar" type="text"
                                                  class="d-none"> <button data-v-179375b4="" type="button"
                                                  class="btn btn-light">
                                                  Đổi avatar
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                                  <div data-v-179375b4="" class="form-group col-md-6"><label data-v-179375b4=""
                                          class="col-form-label">Email: phamvuluan131@gmail.com</label></div>
                              </div>
                              <div data-v-179375b4="" class="row">
                                  <div data-v-179375b4="" class="form-group col-md-6"><label data-v-179375b4="">Họ và
                                          tên</label>
                                      <div data-v-0ec03045="" data-v-179375b4="" class="">
                                          <div data-v-0ec03045="" class="input-container ml-auto position-relative">
                                              <!----> <!----> <!----> <input data-v-0ec03045="" id="BYIMBknJrE"
                                                  autocomplete="true" placeholder="Nhập họ và tên" type="text"
                                                  class="form-control"> <!---->
                                          </div> <!---->
                                      </div>
                                  </div>
                                  <div data-v-179375b4="" class="form-group col-md-6"><label data-v-179375b4="">Giới
                                          tính</label>
                                      <div data-v-63f81806="" data-v-179375b4="">
                                          <div data-v-63f81806="" id="uQJyrUMAfY"
                                              class="my-custom-select position-relative text-b"><span data-v-63f81806=""
                                                  class="position-absolute mr-auto clear-all"><i data-v-63f81806=""
                                                      class="far fa-times"></i></span>
                                              <div data-v-63f81806="" tabindex="0" class="multiselect text-b">
                                                  <div class="multiselect__select"></div>
                                                  <div class="multiselect__tags">
                                                      <div class="multiselect__tags-wrap" style="display: none;"></div>
                                                      <!---->
                                                      <div class="multiselect__spinner" style="display: none;"></div>
                                                      <!----> <span class="multiselect__single">Nam</span> <!---->
                                                  </div>
                                                  <div tabindex="-1" class="multiselect__content-wrapper"
                                                      style="max-height: 300px; display: none;">
                                                      <ul class="multiselect__content" style="display: inline-block;">
                                                          <span data-v-63f81806=""></span> <!---->
                                                          <li class="multiselect__element"><span data-select=""
                                                                  data-selected="" data-deselect=""
                                                                  class="multiselect__option multiselect__option--highlight multiselect__option--selected"><span>Nam</span></span>
                                                              <!---->
                                                          </li>
                                                          <li class="multiselect__element"><span data-select=""
                                                                  data-selected="" data-deselect=""
                                                                  class="multiselect__option"><span>Nữ</span></span>
                                                              <!---->
                                                          </li>
                                                          <li style="display: none;"><span
                                                                  class="multiselect__option"><span
                                                                      data-v-63f81806="">Không tìm thấy kết kết
                                                                      quả</span></span></li>
                                                          <li style="display: none;"><span
                                                                  class="multiselect__option"><span
                                                                      data-v-63f81806="">Danh sách trống</span></span></li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </div> <!---->
                                      </div>
                                  </div>
                              </div>
                              <div data-v-179375b4="" class="row">
                                  <div data-v-179375b4="" class="form-group col-md-6">
                                      <div data-v-179375b4="" class="d-flex justify-content-between"><label
                                              data-v-179375b4="">Số điện thoại</label>
                                          <div data-v-179375b4=""><a data-v-179375b4="" href="/app/account/phone-verify"
                                                  class="text-primary border-right pr-2">Cập nhật </a> <a
                                                  data-v-179375b4="" href="/app/account/phone-verify"
                                                  class="pl-2 text-primary">Xác thực </a></div>
                                      </div>
                                      <div data-v-4c25145f="" data-v-179375b4="" class="mask-input"><input
                                              data-v-4c25145f="" type="text" placeholder="Số điện thoại"
                                              readonly="readonly" class="form-control hidden-spin-button"> <span
                                              data-v-4c25145f="" class="suffix text-primary"></span> <!----></div>
                                  </div>
                              </div>
                              <hr data-v-179375b4="">
                              <div data-v-179375b4="" class="form-group mb-0 text-right"><a data-v-179375b4=""
                                      href="/app/dashboard" class="btn min-width btn btn-secondary mr-2 btn-lg">Hủy </a>
                                  <button data-v-179375b4="" type="submit"
                                      class="btn min-width btn btn-primary btn-lg"><!---->
                                      Lưu


                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </main>
  @endsection
