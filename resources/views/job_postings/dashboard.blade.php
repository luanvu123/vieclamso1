  @extends('dashboard-employer')

  @section('content')
      @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif
      <div data-v-b9ee596a="" class="container-fluid page-content">
          <div data-v-5ce51de7="" data-v-b9ee596a="" class="alert-slide"><!---->
              <div data-v-65de3a3a="" data-v-5ce51de7="" class="notify" style="background-color: white;">
                  <div data-v-65de3a3a="" class="notify__icon"><i data-v-65de3a3a="" class="fas fa-info-circle fa-fw"></i>
                  </div>
                  <div data-v-65de3a3a="" class="text-left">
                      <div data-v-65de3a3a="" class="notify__title">Thông báo quan trọng</div>
                      <div data-v-65de3a3a="" class="notify__content">Từ ngày <span
                              class="font-weight-600">03/06/2024</span>, Tuyendungso1 chính thức tiến hành cập nhật
                          chính sách xác thực tài khoản. <a target="_blank" style="color: #00B14F" href="#">Tìm hiểu
                              thêm</a>
                      </div>
                  </div>
              </div> <!---->
          </div>
          <h4 data-v-b9ee596a="" class="mb-4">Bảng tin</h4>
          <div class="VueCarousel">
              <div class="VueCarousel-wrapper">
                  <div class="VueCarousel-inner">
                      @foreach ($slides as $slide)
                          <div class="VueCarousel-slide banner col-6">
                              <a href="{{ $slide->link }}" target="_blank">
                                  <img alt="Slide Image" src="{{ asset('storage/' . $slide->image) }}">
                              </a>
                          </div>
                      @endforeach
                  </div>
              </div>
          </div>
          <div data-v-b9ee596a="" class="row mt-3">
              <div data-v-b9ee596a="" class="col-6 pr-0"><!---->
                  <div data-v-66fd7bea="" data-v-b9ee596a="" class="card border-0 shadow-sm rounded">
                      <div data-v-66fd7bea="">
                          <div data-v-66fd7bea="" class="p-3 d-flex align-items-center">
                              <h5 data-v-66fd7bea="" class="mb-1">Hiệu quả tuyển dụng</h5>
                              <div data-v-66fd7bea="" class="ml-auto">
                                  <div data-v-66fd7bea="" class="v-popover">
                                      <div class="trigger" style="display: inline-block;"><i data-v-66fd7bea=""
                                              class="fas fa-circle-info" style="color: rgb(215, 222, 228);"></i> </div>
                                  </div>
                              </div>
                          </div>
                          <div data-v-66fd7bea="" class="px-3">
                              <div data-v-66fd7bea="" class="row pb-3 mr-0">
                                  <div data-v-66fd7bea="" class="col-6 pr-0"><a data-v-66fd7bea=""
                                          href="{{ route('job-postings.index') }}" class="text-decoration-none">
                                          <div data-v-66fd7bea="" class="bg-info transparent-2 d-flex statistic-box">
                                              <div data-v-66fd7bea="" class="text-info">
                                                  <h5 data-v-66fd7bea="" class="font-weight-bold">
                                                      {{ $activeJobPostingsCount }}</h5>
                                                  <div data-v-66fd7bea="">Chiến dịch đang mở</div>
                                              </div>
                                              <div data-v-66fd7bea="" class="ml-auto"><span data-v-66fd7bea=""
                                                      class="rounded-pill transparent-1 badge badge-info ml-auto icon"><i
                                                          data-v-66fd7bea="" class="fal fa-bullhorn"></i></span></div>
                                          </div>
                                      </a></div>
                                  <div data-v-66fd7bea="" class="col-6 pr-0"><a data-v-66fd7bea=""
                                          href="{{ route('job-postings.index') }}" class="text-decoration-none">
                                          <div data-v-66fd7bea="" class="bg-success transparent-2 d-flex statistic-box">
                                              <div data-v-66fd7bea="" class="text-green">
                                                  <h5 data-v-66fd7bea="" class="font-weight-bold">{{ $totalJobViews }}
                                                  </h5>
                                                  <div data-v-66fd7bea="">Chiến dịch được xem</div>
                                              </div>
                                              <div data-v-66fd7bea="" class="ml-auto"><span data-v-66fd7bea=""
                                                      class="rounded-pill transparent-1 badge badge-success ml-auto icon"><i
                                                          data-v-66fd7bea="" class="fa fa"></i></span>
                                              </div>
                                          </div>
                                      </a></div>
                              </div>
                              <div data-v-66fd7bea="" class="row pb-3 mr-0">
                                  <div data-v-66fd7bea="" class="col-6 pr-0"><a data-v-66fd7bea=""
                                          href="{{ route('job-postings.index') }}" class="text-decoration-none">
                                          <div data-v-66fd7bea="" class="bg-warning transparent-2 d-flex statistic-box">
                                              <div data-v-66fd7bea="" class="text-yellow">
                                                  <h5 data-v-66fd7bea="" class="font-weight-bold">{{ $totalApplications }}
                                                  </h5>
                                                  <div data-v-66fd7bea="">CV</div>
                                              </div>
                                              <div data-v-66fd7bea="" class="ml-auto"><span data-v-66fd7bea=""
                                                      class="rounded-pill transparent-1 badge badge-warning ml-auto icon"><i
                                                          data-v-66fd7bea="" class="fal fa-file-alt"></i></span></div>
                                          </div>
                                      </a></div>
                                  <div data-v-66fd7bea="" class="col-6 pr-0"><a data-v-66fd7bea=""
                                          href="{{ route('messages.receive') }}" class="text-decoration-none">
                                          <div data-v-66fd7bea="" class="bg-danger transparent-2 d-flex statistic-box">
                                              <div data-v-66fd7bea="" class="text-danger">
                                                  <h5 data-v-66fd7bea="" class="font-weight-bold">{{ $totalMessages }}
                                                  </h5>
                                                  <div data-v-66fd7bea="">Tin nhắn</div>
                                              </div>
                                              <div data-v-66fd7bea="" class="ml-auto"><span data-v-66fd7bea=""
                                                      class="rounded-pill transparent-1 badge badge-danger ml-auto icon"><i
                                                          data-v-66fd7bea="" class="fa-light fa-file-import"></i></span>
                                              </div>
                                          </div>
                                      </a></div>
                              </div>
                          </div>

                          <div class="row mb-4">
                              <div class="col-md-12">
                                  <canvas id="applicationsChart" width="400" height="150"></canvas>
                              </div>
                          </div>

                          <hr data-v-66fd7bea="" class="m-0">
                          <div data-v-66fd7bea="">
                              <div data-v-66fd7bea="" class="px-3 py-2"><a data-v-66fd7bea=""
                                      href="{{ route('job-postings.index') }}"
                                      class="btn btn-text text-primary text-left w-100 pl-0"><i data-v-66fd7bea=""
                                          class="fal fa-briefcase mr-1"></i>
                                      QUẢN LÝ CHIẾN DỊCH TUYỂN DỤNG
                                  </a></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div data-v-b9ee596a="" class="col-6">
                  <div data-v-1b96d7ae="" data-v-b9ee596a="" class="bg-white mb-3 box-loyal-customer">
                      <div data-v-fb75f9fa="" data-v-1b96d7ae="" class="box-customer-info">
                          <div data-v-fb75f9fa="" class="head-info"
                              style="background: linear-gradient(105deg, rgb(242, 251, 255) -1.43%, rgb(231, 239, 245) 100%);">
                              <div data-v-fb75f9fa="" class="info">
                                  <div data-v-fb75f9fa="" class="employer-info" style="color: rgb(0, 0, 0);">
                                      <div data-v-fb75f9fa="" class="name"> {{ Auth::guard('employer')->user()->name }}
                                      </div>
                                      <div data-v-fb75f9fa="" class="id"
                                          style="background-color: rgb(232, 237, 242); color: rgb(0, 0, 0);">
                                          Mã NTD: {{ Auth::guard('employer')->user()->id }}
                                      </div>
                                      <div data-v-fb75f9fa="" class="employer-contact">
                                          <div data-v-fb75f9fa="" class="email"><i data-v-fb75f9fa=""
                                                  class="fal fa-envelope"></i><span data-v-fb75f9fa="">
                                                  {{ Auth::guard('employer')->user()->email }}</span></div>
                                          <div data-v-fb75f9fa="" class="phone"><i data-v-fb75f9fa=""
                                                  class="fal fa-phone-alt fa-rotate-90"></i><span data-v-fb75f9fa="">
                                                  {{ Auth::guard('employer')->user()->phone }}</span></div>
                                      </div>
                                  </div>
                              </div>
                              <div data-v-fb75f9fa="" class="medal">
                                  <div data-v-fb75f9fa=""
                                      class="rank-name text-white d-flex align-items-center text-decoration-none justify-content-start ">
                                      <a data-v-fb75f9fa="" href="" target="_blank">
                                          <img data-v-fb75f9fa="" alt="Member Medal"
                                              src="{{ $employer->typeEmployer && $employer->typeEmployer->image ? asset('storage/' . $employer->typeEmployer->image) : asset('storage/avatar/member.png') }}"
                                              style="width: 200px; height: 44px;">
                                      </a>

                                  </div>
                              </div>
                          </div>
                          <div data-v-fb75f9fa="" class="subtract"><img data-v-fb75f9fa="" alt="subtract"
                                  src="https://tuyendung.topcv.vn/app/_nuxt/img/subtract.ba3a797.svg" width="100%">
                          </div>
                      </div>
                      <div data-v-1358ea01="" data-v-1b96d7ae="">
                          <div data-v-1358ea01="" class="box-loyal-rank">
                              <div data-v-823ce444="" data-v-1358ea01="" class="customer-loyal-progress">
                                  <div data-v-823ce444="" class="loyal-progress" style="margin-top: 5px;">
                                      <div data-v-823ce444="" class="custom-progress"></div>
                                      <div data-v-823ce444="" class="custom-progress-milestone">
                                          <div data-v-823ce444="" class="pointer"><img data-v-823ce444=""
                                                  src="https://tuyendung.topcv.vn/app/_nuxt/img/member.4470c3d.svg"
                                                  alt="Pointer" height="32px" width="32px"
                                                  @switch($employer->type_employer_id)
                     @case(1)
                         style="left: 0%;"
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
                         style="left: 0%;"
                 @endswitch>
                                          </div>
                                      </div> <!---->
                                      <div data-v-823ce444="" class="custom-progress-single"
                                          style="width: 0px; background: rgb(0, 177, 79);"></div>
                                      <div data-v-823ce444="" class="custom-progress-text">
                                          <div data-v-823ce444="" class="d-flex">
                                              @foreach ($activeTypeEmployer as $type)
                                                  <div data-v-823ce444="" class="text-item"
                                                      style="left: {{ $loop->iteration * 20 }}%;">
                                                      <div data-v-823ce444="" class="ranking">{{ $type->name }}</div>
                                                      <div data-v-823ce444="" class="milestone">{{ $type->top_point }}
                                                      </div>
                                                  </div>
                                              @endforeach
                                          </div>
                                      </div>
                                  </div>
                                  <div data-v-823ce444="" class="progress-more">
                                      <div data-v-823ce444="" class="popover-more-info"
                                          @switch($employer->type_employer_id)
             @case(1)
                 style="--after-left: 2%; --more-info-border-color: 1px solid #2CE175;"
                 @break
             @case(2)
                 style="--after-left: 22%; --more-info-border-color: 1px solid #2CE175;"
                 @break
             @case(3)
                 style="--after-left: 42%; --more-info-border-color: 1px solid #2CE175;"
                 @break
             @case(4)
                 style="--after-left: 62%; --more-info-border-color: 1px solid #2CE175;"
                 @break
             @case(5)
                 style="--after-left: 82%; --more-info-border-color: 1px solid #2CE175;"
                 @break
             @default
                 style="--after-left: 0%; --more-info-border-color: 1px solid #2CE175;"
         @endswitch>
                                          <div data-v-823ce444="" class="fs-14 loyal-employer-benefit">
                                              <div data-v-823ce444="" class="top-point">
                                                  <div data-v-823ce444="" class="top-point-label">Điểm xét
                                                      hạng</div>
                                                  <div data-v-823ce444=""
                                                      class="font-weight-600 align-items-center d-flex"><span
                                                          data-v-823ce444=""
                                                          class="mr-2 top-point-value">{{ $employer->credit }}</span>
                                                      <img data-v-823ce444="" alt="TP Point"
                                                          src="https://tuyendung.topcv.vn/app/_nuxt/img/tp-point.fdfeec4.png">
                                                  </div>
                                              </div>
                                              <div data-v-823ce444="" class="go-to-benefit cursor-pointer">
                                                  <span data-v-823ce444="">Ưu đãi của tôi</span> <i data-v-823ce444=""
                                                      class="far fa-chevron-right"></i>
                                              </div>
                                          </div>
                                          <div data-v-823ce444="" class="encourage-purchase">
                                              <div data-v-823ce444="" class="auth-verify">
                                                  <div data-v-823ce444="" class="warning">
                                                      <div data-v-823ce444="" class="text-danger">Bạn cần đạt
                                                          tối thiểu cấp độ xác thực 2 để thực hiện xét hạng
                                                          khách hàng và sử dụng các quyền lợi tương ứng.</div>
                                                      <div data-v-823ce444="" class="text-success cursor-pointer"><a
                                                              data-v-823ce444="" href="#" target="_blank">Tìm hiểu
                                                              thêm</a></div>
                                                  </div>
                                                  <div data-v-823ce444="" class="verify-now">
                                                      <div data-v-823ce444="" class="btn-verify">Xác thực ngay
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div data-v-1358ea01="" class="loyal-detail">
                                  <div data-v-1358ea01="" class="row">
                                      <div data-v-1358ea01="" class="col-6 box-point">
                                          <div data-v-1358ea01="" class="label-point">Số lượng Top Point (TP)
                                          </div>
                                          <div data-v-1358ea01="" class="detail-point">
                                              <div data-v-1358ea01="" class="ranking-point"><span data-v-1358ea01=""
                                                      class="ranking-label">Xét hạng:
                                                  </span> <span data-v-1358ea01=""
                                                      class="ranking-value">{{ $employer->credit }}
                                                      TP</span></div>
                                              <div data-v-1358ea01="" class="exchange-point"><span data-v-1358ea01=""
                                                      class="ranking-label">Đổi quà:
                                                  </span> <span data-v-1358ea01=""
                                                      class="ranking-value">{{ $employer->top_point }}
                                                      TP</span></div>
                                          </div> <!---->
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div data-v-b9ee596a="" class="row">
                      <div data-v-b9ee596a="" class="col-6 pr-0">
                          <div data-v-107eec64="" data-v-b9ee596a="" class="card border-0 shadow-sm rounded">
                              <div data-v-107eec64="" class="p-3">
                                  <h5 data-v-107eec64="">Đề xuất từ Toppy AI</h5>
                                  <div data-v-107eec64="" class="mt-2 box-content">
                                      <div data-v-107eec64="" class="text-grey">Tự động phân tích bằng công
                                          nghệ trí tuệ nhân tạo</div>
                                      <div data-v-107eec64="" class="suggest-box">
                                          <div data-v-107eec64="" class="mt-3 text-nowrap d-flex"><span
                                                  data-v-107eec64=""
                                                  class="badge rounded-circle transparent-1 icon badge-success badge-green"><i
                                                      data-v-107eec64="" class="far fa-wrench"></i></span>
                                              <div data-v-107eec64="" class="align-self-center"><span data-v-107eec64=""
                                                      class="ml-1">Tối ưu thiết lập</span>
                                                  <span data-v-107eec64=""
                                                      class="badge badge-success small badge-green">1</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <hr data-v-107eec64="" class="m-0">
                              <div data-v-107eec64="" class="px-3 pb-3 pt-2"><a data-v-107eec64="" href="#"
                                      class="btn btn-text text-primary text-left w-100 pl-0 pb-0 text-uppercase"><i
                                          data-v-107eec64="" class="fal fa-robot mr-1"></i> Xem tất cả đề xuất
                                  </a></div>
                          </div>
                      </div>
                      <div data-v-b9ee596a="" class="col-6">
                          <div data-v-f232a47c="" data-v-b9ee596a="" class="card border-0 shadow-sm rounded">
                              <div data-v-f232a47c="" class="p-3">
                                  <h5 data-v-f232a47c="">Dịch vụ sắp hết hạn</h5>
                                  <div data-v-f232a47c="">
                                      <div data-v-f232a47c="" class="mt-2 text-grey">
                                          Hiện không có dịch vụ nào sắp hết hạn
                                      </div>
                                  </div>
                              </div>
                              <hr data-v-f232a47c="" class="m-0">
                              <div data-v-f232a47c="" class="px-3 pb-3 pt-2"><a data-v-f232a47c=""
                                      href="https://tuyendung.topcv.vn/app/services"
                                      class="btn btn-text text-primary text-left w-100 pl-0 pb-0"><i data-v-f232a47c=""
                                          class="fal fa-magic mr-1"></i> QUẢN LÝ DỊCH VỤ
                                  </a></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
      <div data-v-b9ee596a="">
          <div id="popup-sales-campaign" data-backdrop="static" role="dialog" class="modal">
              <div role="document" class="modal-dialog modal-top-deal">
                  <div class="modal-content border-0">
                      <div class="modal-header border-bottom-1 px-4 border-bottom-0">
                          <h5 class="modal-title text-truncate overflow-hidden font-weight-600 text-nowrap">
                              <!---->
                          </h5>
                          <div class="d-flex box-image image-header"><img alt=""
                                  src="https://tuyendung.topcv.vn/app/_nuxt/img/home_popup.001adc7.png" width="100%">
                          </div> <button aria-label="Close" data-dismiss="modal" type="button" class="close"><span
                                  aria-hidden="true"><i class="fal fa-times"></i></span></button>
                      </div>
                      <div class="content p-4">
                          <div>
                              <div class="title mb-4"></div>
                              <ul></ul>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <div class="custom-control custom-checkbox"><input id="517XsBPN" type="checkbox"
                                  class="custom-control-input" value="false"> <label for="517XsBPN"
                                  class="custom-control-label text-b">Không hiển thị lại nội dung này</label>
                          </div> <button type="submit" class="btn min-width btn btn-primary btn-lg"><!---->
                              Khám phá ngay
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div> <!---->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
          var ctx = document.getElementById('applicationsChart').getContext('2d');
          var applicationsChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: {!! json_encode($dates->keys()) !!},
                  datasets: [{
                      label: 'Applications in the Last 30 Days',
                      data: {!! json_encode($dates->values()) !!},
                      backgroundColor: 'rgba(75, 192, 192, 0.2)',
                      borderColor: 'rgba(75, 192, 192, 1)',
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true
                      }
                  }
              }
          });
      </script>
  @endsection
