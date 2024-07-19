 @extends('layout')
 @section('content')
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/components/desktop/jobs/modal-apply.616a455ca1847bcbK.css">
     <div id="main" style="margin-top: 0px;">
         <div class="search-job">
             <div class="header" id="job-detail-simple-search">
                 <div id="box-option-search-job" class="box-search-job">
                     <div class="container">
                         <form id="frm-search-job" method="GET" onsubmit="return false;">
                             <div class="group-search">
                                 <div class="item item-search">
                                     <i class="fa-regular fa-magnifying-glass"></i>
                                     <input class="form-controlui-autocomplete-input" value=""
                                         placeholder="Vị trí tuyển dụng" id="keyword" autocomplete="off" maxlength="50">
                                     <button class="btn-clear">
                                         <i class="fa-solid fa-xmark"></i>
                                     </button>
                                 </div>
                                 <div class="item search-city">
                                     <i class="fa-regular fa-location-dot"></i>
                                     <select name="city" id="city"
                                         class="form-control select2 select2-hidden-accessible" tabindex="-1"
                                         aria-hidden="true">
                                         <option value="">Địa điểm</option>
                                         <option value="1">
                                             Hà Nội</option>
                                         <option value="2">
                                             Hồ Chí Minh</option>
                                         <option value="3">
                                             Bình Dương</option>
                                         <option value="4">
                                             Bắc Ninh</option>
                                         <option value="5">
                                             Đồng Nai</option>
                                         <option value="6">
                                             Hưng Yên</option>
                                         <option value="7">
                                             Hải Dương</option>
                                         <option value="8">
                                             Đà Nẵng</option>
                                         <option value="9">
                                             Hải Phòng</option>
                                         <option value="10">
                                             An Giang</option>
                                         <option value="11">
                                             Bà Rịa-Vũng Tàu</option>
                                         <option value="12">
                                             Bắc Giang</option>
                                         <option value="13">
                                             Bắc Kạn</option>
                                         <option value="14">
                                             Bạc Liêu</option>
                                         <option value="15">
                                             Bến Tre</option>
                                         <option value="16">
                                             Bình Định</option>
                                         <option value="17">
                                             Bình Phước</option>
                                         <option value="18">
                                             Bình Thuận</option>
                                         <option value="19">
                                             Cà Mau</option>
                                         <option value="20">
                                             Cần Thơ</option>
                                         <option value="21">
                                             Cao Bằng</option>
                                         <option value="22">
                                             Cửu Long</option>
                                         <option value="23">
                                             Đắk Lắk</option>
                                         <option value="24">
                                             Đắc Nông</option>
                                         <option value="25">
                                             Điện Biên</option>
                                         <option value="26">
                                             Đồng Tháp</option>
                                         <option value="27">
                                             Gia Lai</option>
                                         <option value="28">
                                             Hà Giang</option>
                                         <option value="29">
                                             Hà Nam</option>
                                         <option value="30">
                                             Hà Tĩnh</option>
                                         <option value="31">
                                             Hậu Giang</option>
                                         <option value="32">
                                             Hoà Bình</option>
                                         <option value="33">
                                             Khánh Hoà</option>
                                         <option value="34">
                                             Kiên Giang</option>
                                         <option value="35">
                                             Kon Tum</option>
                                         <option value="36">
                                             Lai Châu</option>
                                         <option value="37">
                                             Lâm Đồng</option>
                                         <option value="38">
                                             Lạng Sơn</option>
                                         <option value="39">
                                             Lào Cai</option>
                                         <option value="40">
                                             Long An</option>
                                         <option value="41">
                                             Miền Bắc</option>
                                         <option value="42">
                                             Miền Nam</option>
                                         <option value="43">
                                             Miền Trung</option>
                                         <option value="44">
                                             Nam Định</option>
                                         <option value="45">
                                             Nghệ An</option>
                                         <option value="46">
                                             Ninh Bình</option>
                                         <option value="47">
                                             Ninh Thuận</option>
                                         <option value="48">
                                             Phú Thọ</option>
                                         <option value="49">
                                             Phú Yên</option>
                                         <option value="50">
                                             Quảng Bình</option>
                                         <option value="51">
                                             Quảng Nam</option>
                                         <option value="52">
                                             Quảng Ngãi</option>
                                         <option value="53">
                                             Quảng Ninh</option>
                                         <option value="54">
                                             Quảng Trị</option>
                                         <option value="55">
                                             Sóc Trăng</option>
                                         <option value="56">
                                             Sơn La</option>
                                         <option value="57">
                                             Tây Ninh</option>
                                         <option value="58">
                                             Thái Bình</option>
                                         <option value="59">
                                             Thái Nguyên</option>
                                         <option value="60">
                                             Thanh Hoá</option>
                                         <option value="61">
                                             Thừa Thiên Huế</option>
                                         <option value="62">
                                             Tiền Giang</option>
                                         <option value="63">
                                             Toàn Quốc</option>
                                         <option value="64">
                                             Trà Vinh</option>
                                         <option value="65">
                                             Tuyên Quang</option>
                                         <option value="66">
                                             Vĩnh Long</option>
                                         <option value="67">
                                             Vĩnh Phúc</option>
                                         <option value="68">
                                             Yên Bái</option>
                                         <option value="100">
                                             Nước Ngoài</option>
                                     </select><span class="select2 select2-container select2-container--default"
                                         dir="ltr" style="width: 92px;"><span class="selection"><span
                                                 class="select2-selection select2-selection--single" role="combobox"
                                                 aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                 aria-labelledby="select2-city-container"><span
                                                     class="select2-selection__rendered" id="select2-city-container"
                                                     title="Địa điểm">Địa điểm</span><span
                                                     class="select2-selection__arrow" role="presentation"><b
                                                         role="presentation"></b></span></span></span><span
                                             class="dropdown-wrapper" aria-hidden="true"></span></span>
                                 </div>

                             </div>
                             <div class="group">
                                 <div class="item group-item-experience">
                                     <div class="icon">
                                         <i class="fa-regular fa-briefcase"></i>
                                     </div>
                                     <select name="" id="category"
                                         class="form-control select2 select2-hidden-accessible" tabindex="-1"
                                         aria-hidden="true">
                                         <option value="">Ngành nghề</option>
                                         <option value="10101">
                                             An toàn lao động</option>
                                         <option value="10102">
                                             Bán hàng kỹ thuật</option>
                                         <option value="10103">
                                             Bán lẻ / bán sỉ</option>
                                         <option value="10004">
                                             Báo chí / Truyền hình</option>
                                         <option value="10006">
                                             Bảo hiểm</option>
                                         <option value="10104">
                                             Bảo trì / Sửa chữa</option>
                                         <option value="10007">
                                             Bất động sản</option>
                                         <option value="10003">
                                             Biên / Phiên dịch</option>
                                         <option value="10005">
                                             Bưu chính - Viễn thông</option>
                                         <option value="10008">
                                             Chứng khoán / Vàng / Ngoại tệ</option>
                                         <option value="10010">
                                             Cơ khí / Chế tạo / Tự động hóa</option>
                                         <option value="10009">
                                             Công nghệ cao</option>
                                         <option value="10052">
                                             Công nghệ Ô tô</option>
                                         <option value="10131">
                                             Công nghệ thông tin</option>
                                         <option value="10012">
                                             Dầu khí/Hóa chất</option>
                                         <option value="10013">
                                             Dệt may / Da giày</option>
                                         <option value="10111">
                                             Địa chất / Khoáng sản</option>
                                         <option value="10014">
                                             Dịch vụ khách hàng</option>
                                         <option value="10016">
                                             Điện / Điện tử / Điện lạnh</option>
                                         <option value="10015">
                                             Điện tử viễn thông</option>
                                         <option value="10011">
                                             Du lịch</option>
                                         <option value="10110">
                                             Dược phẩm / Công nghệ sinh học</option>
                                         <option value="10017">
                                             Giáo dục / Đào tạo</option>
                                         <option value="10113">
                                             Hàng cao cấp</option>
                                         <option value="10020">
                                             Hàng gia dụng</option>
                                         <option value="10021">
                                             Hàng hải</option>
                                         <option value="10022">
                                             Hàng không</option>
                                         <option value="10117">
                                             Hàng tiêu dùng</option>
                                         <option value="10023">
                                             Hành chính / Văn phòng</option>
                                         <option value="10018">
                                             Hoá học / Sinh học</option>
                                         <option value="10019">
                                             Hoạch định/Dự án</option>
                                         <option value="10024">
                                             In ấn / Xuất bản</option>
                                         <option value="10025">
                                             IT Phần cứng / Mạng</option>
                                         <option value="10026">
                                             IT phần mềm</option>
                                         <option value="10028">
                                             Kế toán / Kiểm toán</option>
                                         <option value="10027">
                                             Khách sạn / Nhà hàng</option>
                                         <option value="10120">
                                             Kiến trúc</option>
                                         <option value="10001">
                                             Kinh doanh / Bán hàng</option>
                                         <option value="10048">
                                             Logistics</option>
                                         <option value="10036">
                                             Luật/Pháp lý</option>
                                         <option value="10029">
                                             Marketing / Truyền thông / Quảng cáo</option>
                                         <option value="10030">
                                             Môi trường / Xử lý chất thải</option>
                                         <option value="10031">
                                             Mỹ phẩm / Trang sức</option>
                                         <option value="10032">
                                             Mỹ thuật / Nghệ thuật / Điện ảnh</option>
                                         <option value="10033">
                                             Ngân hàng / Tài chính</option>
                                         <option value="11000">
                                             Ngành nghề khác</option>
                                         <option value="10132">
                                             NGO / Phi chính phủ / Phi lợi nhuận</option>
                                         <option value="10034">
                                             Nhân sự</option>
                                         <option value="10035">
                                             Nông / Lâm / Ngư nghiệp</option>
                                         <option value="10124">
                                             Phi chính phủ / Phi lợi nhuận</option>
                                         <option value="10037">
                                             Quản lý chất lượng (QA/QC)</option>
                                         <option value="10038">
                                             Quản lý điều hành</option>
                                         <option value="10125">
                                             Sản phẩm công nghiệp</option>
                                         <option value="10126">
                                             Sản xuất</option>
                                         <option value="10130">
                                             Spa / Làm đẹp</option>
                                         <option value="10127">
                                             Tài chính / Đầu tư</option>
                                         <option value="10039">
                                             Thiết kế đồ họa</option>
                                         <option value="10128">
                                             Thiết kế nội thất</option>
                                         <option value="10042">
                                             Thời trang</option>
                                         <option value="10129">
                                             Thư ký / Trợ lý</option>
                                         <option value="10043">
                                             Thực phẩm / Đồ uống</option>
                                         <option value="10046">
                                             Tổ chức sự kiện / Quà tặng</option>
                                         <option value="10045">
                                             Tư vấn</option>
                                         <option value="10047">
                                             Vận tải / Kho vận</option>
                                         <option value="10050">
                                             Xây dựng</option>
                                         <option value="10049">
                                             Xuất nhập khẩu</option>
                                         <option value="10051">
                                             Y tế / Dược</option>
                                     </select><span class="select2 select2-container select2-container--default"
                                         dir="ltr" style="width: 206px;"><span class="selection"><span
                                                 class="select2-selection select2-selection--single" role="combobox"
                                                 aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                 aria-labelledby="select2-category-container"><span
                                                     class="select2-selection__rendered" id="select2-category-container"
                                                     title="Ngành nghề">Ngành nghề</span><span
                                                     class="select2-selection__arrow" role="presentation"><b
                                                         role="presentation"></b></span></span></span><span
                                             class="dropdown-wrapper" aria-hidden="true"></span></span>
                                 </div>
                             </div>
                             <div class="col-button">
                                 <button class="btn btn-topcv btn-search-job" type="submit">Tìm kiếm</button>
                             </div>
                             <input type="text" name="type_keyword" hidden="">
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <div class="job-detail-fixed-menu" id="job-detail-fixed-menu" style="display: none;">
             <div class="container">
                 <div class="job-detail-fixed-menu__left">
                     <div class="job-detail-fixed-menu__tabs">
                         <div class="job-detail-fixed-menu__tabs--item active" id="fixed-menu-tab-job-info">
                             Chi tiết tin tuyển dụng
                         </div>
                         <div class="job-detail-fixed-menu__tabs--item" id="fixed-menu-tab-job-similar">
                             Việc làm liên quan
                         </div>
                     </div>
                     <div class="job-detail-fixed-menu__actions" id="job-detail-fixed-menu-actions">
                         <a href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi/1400884.html?apply-form=1', 'Đăng nhập hoặc Đăng ký để ứng tuyển công việc này!')"
                             class="job-detail-fixed-menu__actions--button">
                             <span class="button-icon">
                                 <i class="fa-light fa-paper-plane"></i>
                             </span>
                             Ứng tuyển ngay
                         </a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="container job-detail" id="job-detail">
             <div class="box-fixed-share-job" id="box-fixed-share-job"
                 style="top: 191.067px; display: block; height: 0px;">
                 <div class="box-fixed-share-job__content">
                     <a href="http://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.topcv.vn%2Fviec-lam%2Fnhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi%2F1400884.html"
                         target="_blank" class="share-item" data-toggle="tooltip" data-placement="top"
                         data-original-title="Chia sẻ qua Facebook">
                         <svg width="10" height="19" viewBox="0 0 10 19" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M9.29432 10.4025L9.80625 7.15275H6.65277V5.04043C6.65277 4.15183 7.09302 3.28354 8.50083 3.28354H9.95471V0.516193C9.10804 0.381299 8.25252 0.308322 7.39506 0.297852C4.79958 0.297852 3.1051 1.85671 3.1051 4.67483V7.15275H0.228058V10.4025H3.1051V18.2628H6.65277V10.4025H9.29432Z"
                                 fill="#7F878F"></path>
                         </svg>
                     </a>
                     <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fwww.topcv.vn%2Fviec-lam%2Fnhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi%2F1400884.html"
                         target="_blank" class="share-item" data-toggle="tooltip" data-placement="top"
                         data-original-title="Chia sẻ qua Twitter">
                         <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M15.9288 1.79435C15.4113 2.00666 14.8672 2.1545 14.3099 2.23421C14.5705 2.19165 14.9538 1.74469 15.1064 1.56378C15.3382 1.2909 15.5148 0.979376 15.6274 0.645043C15.6274 0.620212 15.6534 0.58474 15.6274 0.567003C15.6143 0.560173 15.5995 0.556593 15.5846 0.556593C15.5696 0.556593 15.5549 0.560173 15.5418 0.567003C14.9367 0.879312 14.2928 1.11767 13.6252 1.27646C13.6019 1.28323 13.5771 1.28384 13.5535 1.27821C13.5299 1.27259 13.5084 1.26094 13.4912 1.24453C13.4392 1.18555 13.3833 1.12986 13.3237 1.07781C13.0514 0.845268 12.7425 0.654943 12.4082 0.513794C11.957 0.337346 11.4696 0.26093 10.9828 0.290317C10.5105 0.318748 10.0494 0.439493 9.62819 0.645043C9.21337 0.861753 8.84879 1.15616 8.55637 1.51057C8.24878 1.87536 8.0267 2.2987 7.90509 2.75211C7.80481 3.18341 7.79344 3.62917 7.8716 4.0646C7.8716 4.13909 7.8716 4.14973 7.80461 4.13909C5.15112 3.76663 2.97399 2.86917 1.19507 0.943013C1.11691 0.857879 1.07598 0.857879 1.01271 0.943013C0.238619 2.06395 0.614499 3.83758 1.58211 4.71375C1.71237 4.83081 1.84635 4.94432 1.98777 5.05074C1.54412 5.02072 1.11131 4.90612 0.714982 4.71375C0.64055 4.66763 0.599613 4.69246 0.595891 4.7776C0.585341 4.89563 0.585341 5.0143 0.595891 5.13233C0.673544 5.69797 0.907417 6.23381 1.27359 6.68504C1.63977 7.13628 2.12511 7.48673 2.67998 7.70054C2.81525 7.75576 2.95619 7.79737 3.10052 7.82469C2.68982 7.90176 2.26859 7.91375 1.85379 7.86017C1.76447 7.84243 1.73098 7.88855 1.76447 7.97013C2.31154 9.38904 3.49873 9.8218 4.36958 10.063C4.48867 10.0808 4.60776 10.0808 4.74174 10.1091C4.74174 10.1091 4.74174 10.1091 4.71941 10.1304C4.46262 10.5774 3.4243 10.8789 2.94794 11.035C2.07845 11.3326 1.15142 11.4464 0.231175 11.3684C0.0860335 11.3471 0.0525391 11.3507 0.0153232 11.3684C-0.0218927 11.3861 0.0153232 11.4252 0.0562607 11.4606C0.24234 11.5777 0.42842 11.6806 0.621942 11.7799C1.19806 12.0794 1.80713 12.3173 2.43808 12.4893C5.70563 13.3478 9.38256 12.7164 11.8351 10.3929C13.7629 8.56962 14.4402 6.05461 14.4402 3.53606C14.4402 3.44028 14.563 3.38353 14.6337 3.33386C15.1214 2.97165 15.5514 2.54389 15.9102 2.06395C15.9724 1.9924 16.0042 1.90132 15.9996 1.80854C15.9996 1.75534 15.9996 1.76598 15.9288 1.79435Z"
                                 fill="#7F878F"></path>
                         </svg>
                     </a>
                     <a href="https://www.linkedin.com/cws/share?url=https%3A%2F%2Fwww.topcv.vn%2Fviec-lam%2Fnhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi%2F1400884.html"
                         target="_blank" class="share-item" data-toggle="tooltip" data-placement="top"
                         data-original-title="Chia sẻ qua Linkedin">
                         <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M3.77491 14.8558V4.83137H0.345022V14.8558H3.77527H3.77491ZM2.06068 3.46294C3.25651 3.46294 4.00098 2.69318 4.00098 1.7312C3.9786 0.747299 3.25651 -0.000976562 2.08342 -0.000976562C0.909537 -0.000976562 0.142853 0.747299 0.142853 1.73111C0.142853 2.69309 0.887064 3.46285 2.03821 3.46285H2.06041L2.06068 3.46294ZM5.6734 14.8558H9.10302V9.25832C9.10302 8.95911 9.1254 8.65912 9.21601 8.44542C9.46384 7.84657 10.0282 7.22668 10.9759 7.22668C12.2167 7.22668 12.7133 8.14586 12.7133 9.4936V14.8558H16.1429V9.10811C16.1429 6.02916 14.451 4.59636 12.1945 4.59636C10.3444 4.59636 9.53189 5.60087 9.08046 6.28505H9.10329V4.83172H5.67358C5.71835 5.77213 5.67331 14.8562 5.67331 14.8562L5.6734 14.8558Z"
                                 fill="#7F878F"></path>
                         </svg>
                     </a>
                     <div class="share-item" id="btn-share-job"
                         data-url="https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi/1400884.html"
                         data-toggle="tooltip" data-placement="top" data-original-title="Sao chép đường dẫn">
                         <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M10.8833 9.11621C12.7583 10.9912 12.7583 14.0245 10.8833 15.8912C9.00833 17.7579 5.97499 17.7662 4.10833 15.8912C2.24166 14.0162 2.23333 10.9829 4.10833 9.11621"
                                 stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                             </path>
                             <path
                                 d="M8.82499 11.1754C6.87499 9.22539 6.87499 6.05873 8.82499 4.10039C10.775 2.14206 13.9417 2.15039 15.9 4.10039C17.8583 6.05039 17.85 9.21706 15.9 11.1754"
                                 stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                             </path>
                         </svg>
                     </div>
                 </div>
             </div>
             <div class="ctn-breadcrumb-detail">
                 <a href="https://www.topcv.vn/viec-lam" class="text-highlight bold">Trang chủ</a> <i
                     class="fa-solid fa-angle-right"></i>
                 <a href="https://www.topcv.vn/tim-viec-lam-video-editor" class="text-highlight bold">Tìm việc làm video
                     editor</a> <i class="fa-solid fa-angle-right"></i>
                 <span class="text-dark-blue">Tuyển Nhân Viên Video Editor Youtube Lĩnh Vực Hoạt Hình [Hà Nội]</span>
             </div>
             <div class="job-detail__wrapper">
                 <div class="job-detail__body">
                     <div class="job-detail__body-left">
                         <div class="job-detail__box--left job-detail__info" id="header-job-info">
                             <div class="tag-job-flash" data-toggle="tooltip-flash-job" data-trigger="manual"
                                 data-html="true" data-job-id="{{ $jobPosting->id }}"
                                 data-template="<div data-job-id={{ $jobPosting->id }} class='flash-job-tag-tooltip tooltip' role='tooltip'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>"
                                 title="" data-placement="top" data-container="body"
                                 data-original-title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/huy-hieu-tia-set'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>">
                                 <img src="https://www.topcv.vn/v4/image/job-list/icon-flash.webp" alt="">
                             </div>
                             <h1 class="job-detail__info--title  has-flash ">
                                 {{ $jobPosting->title }}
                             </h1>
                             <div class="job-detail__info--sections">
                                 <div class="job-detail__info--section">
                                     <div class="job-detail__info--section-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                             <path
                                                 d="M21.92 16.75C21.59 19.41 19.41 21.59 16.75 21.92C15.14 22.12 13.64 21.68 12.47 20.82C11.8 20.33 11.96 19.29 12.76 19.05C15.77 18.14 18.14 15.76 19.06 12.75C19.3 11.96 20.34 11.8 20.83 12.46C21.68 13.64 22.12 15.14 21.92 16.75Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M9.99 2C5.58 2 2 5.58 2 9.99C2 14.4 5.58 17.98 9.99 17.98C14.4 17.98 17.98 14.4 17.98 9.99C17.97 5.58 14.4 2 9.99 2ZM9.05 8.87L11.46 9.71C12.33 10.02 12.75 10.63 12.75 11.57C12.75 12.65 11.89 13.54 10.84 13.54H10.75V13.59C10.75 14 10.41 14.34 10 14.34C9.59 14.34 9.25 14 9.25 13.59V13.53C8.14 13.48 7.25 12.55 7.25 11.39C7.25 10.98 7.59 10.64 8 10.64C8.41 10.64 8.75 10.98 8.75 11.39C8.75 11.75 9.01 12.04 9.33 12.04H10.83C11.06 12.04 11.24 11.83 11.24 11.57C11.24 11.22 11.18 11.2 10.95 11.12L8.54 10.28C7.68 9.98 7.25 9.37 7.25 8.42C7.25 7.34 8.11 6.45 9.16 6.45H9.25V6.41C9.25 6 9.59 5.66 10 5.66C10.41 5.66 10.75 6 10.75 6.41V6.47C11.86 6.52 12.75 7.45 12.75 8.61C12.75 9.02 12.41 9.36 12 9.36C11.59 9.36 11.25 9.02 11.25 8.61C11.25 8.25 10.99 7.96 10.67 7.96H9.17C8.94 7.96 8.76 8.17 8.76 8.43C8.75 8.77 8.81 8.79 9.05 8.87Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="job-detail__info--section-content">
                                         <div class="job-detail__info--section-content-title">Mức lương</div>
                                         <div class="job-detail__info--section-content-value">{{ $jobPosting->salary }}
                                         </div>
                                     </div>
                                 </div>
                                 <div class="job-detail__info--section">
                                     <div class="job-detail__info--section-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                             viewBox="0 0 25 24" fill="none">
                                             <path
                                                 d="M21.2866 8.45C20.2366 3.83 16.2066 1.75 12.6666 1.75C12.6666 1.75 12.6666 1.75 12.6566 1.75C9.1266 1.75 5.0866 3.82 4.0366 8.44C2.8666 13.6 6.0266 17.97 8.8866 20.72C9.9466 21.74 11.3066 22.25 12.6666 22.25C14.0266 22.25 15.3866 21.74 16.4366 20.72C19.2966 17.97 22.4566 13.61 21.2866 8.45ZM12.6666 13.46C10.9266 13.46 9.5166 12.05 9.5166 10.31C9.5166 8.57 10.9266 7.16 12.6666 7.16C14.4066 7.16 15.8166 8.57 15.8166 10.31C15.8166 12.05 14.4066 13.46 12.6666 13.46Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="job-detail__info--section-content">
                                         <div class="job-detail__info--section-content-title">Địa điểm</div>
                                         <div class="job-detail__info--section-content-value">{{ $jobPosting->place }}
                                         </div>
                                     </div>
                                 </div>
                                 <div class="job-detail__info--section" id="job-detail-info-experience">
                                     <div class="job-detail__info--section-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                             <path
                                                 d="M17.39 15.67L13.35 12H10.64L6.59998 15.67C5.46998 16.69 5.09998 18.26 5.64998 19.68C6.19998 21.09 7.53998 22 9.04998 22H14.94C16.46 22 17.79 21.09 18.34 19.68C18.89 18.26 18.52 16.69 17.39 15.67ZM13.82 18.14H10.18C9.79998 18.14 9.49998 17.83 9.49998 17.46C9.49998 17.09 9.80998 16.78 10.18 16.78H13.82C14.2 16.78 14.5 17.09 14.5 17.46C14.5 17.83 14.19 18.14 13.82 18.14Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M18.35 4.32C17.8 2.91 16.46 2 14.95 2H9.04998C7.53998 2 6.19998 2.91 5.64998 4.32C5.10998 5.74 5.47998 7.31 6.60998 8.33L10.65 12H13.36L17.4 8.33C18.52 7.31 18.89 5.74 18.35 4.32ZM13.82 7.23H10.18C9.79998 7.23 9.49998 6.92 9.49998 6.55C9.49998 6.18 9.80998 5.87 10.18 5.87H13.82C14.2 5.87 14.5 6.18 14.5 6.55C14.5 6.92 14.19 7.23 13.82 7.23Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="job-detail__info--section-content">
                                         <div class="job-detail__info--section-content-title">Kinh nghiệm</div>
                                         <div class="job-detail__info--section-content-value">{{ $jobPosting->experience }}
                                         </div>
                                     </div>
                                 </div>
                             </div>
@if (!$isExpired)
    <div class="job-detail__info--flex">
        <div class="job-detail__info--deadline">
            <span class="job-detail__info--deadline--icon">
                <i class="fa-solid fa-clock"></i>
            </span>
            Hạn nộp hồ sơ: {{ $closingDate->format('d/m/Y') }}
        </div>
    </div>
    <div class="job-detail__info--actions box-apply-current">
        @auth('candidate')
            @if (Auth::guard('candidate')->check())
                @if ($applied)
                    {{-- Ứng tuyển thành công --}}
                    <div class="job-detail__info--actions box-apply-success">
                        <a class="job-detail__info--actions-button button-primary open-apply-modal"
                            href="#" data-toggle="modal">
                            <span class="button-icon">
                                <i class="fa-solid fa-arrow-rotate-right"></i>
                            </span>
                            Ứng tuyển lại
                        </a>
                        <a class="job-detail__info--actions-button button-white" target="_blank"
                            href="http://candidate.topcvconnect.com/conversations/new/667298">
                            <span class="button-icon">
                                <i class="fa-solid fa-comments"></i>
                            </span>
                            Nhắn tin
                        </a>
                        <p style="margin-bottom: 0">
                            Bạn đã gửi CV cho vị trí này vào ngày:
                            <span class="date">{{ $appliedDate }}</span>.
                            <a href="#" target="_blank" type="button"
                                class="text-highlight show-applied-cv" style="margin-left: 5px">Xem CV đã nộp</a>
                        </p>
                    </div>
                @else
                    <a href="#"
                        class="job-detail__info--actions-button button-primary open-apply-modal btn-apply-job"
                        data-toggle="modal" data-target="#applyModal">
                        <span class="button-icon">
                            <i class="fa-light fa-paper-plane"></i>
                        </span>
                        Ứng tuyển ngay
                    </a>
                @endif
            @endif
        @else
            <a href="{{ route('job-postings.show', $jobPosting->slug) }}"
                class="job-detail__info--actions-button button-primary btn-apply-job">
                <span class="button-icon">
                    <i class="fa-light fa-paper-plane"></i>
                </span>
                Ứng tuyển ngay
            </a>
        @endauth
        <a class="job-detail__info--actions-button button-white" href="#">
            <span class="button-icon">
                <i class="fa-regular fa-heart"></i>
            </span>
            Lưu tin
        </a>
    </div>
@else
    {{-- Nếu hết hạn ứng tuyển --}}
    <div class="job-detail__info--actions box-apply-current">
        <div class="job-detail__expired">
            <span class="job-detail__info--deadline--icon is-expired">
                <i class="fa-solid fa-brake-warning"></i>
            </span>
            Hết hạn ứng tuyển
        </div>
        <a href="#tab-job"
            class="job-detail__info--actions-button button-primary btn-view-job-similar"
            id="btn-view-job-similar">
            Xem việc làm liên quan
            <span class="button-icon">
                <i class="fa-solid fa-angles-down"></i>
            </span>
        </a>
    </div>
@endif


                         </div>
                         <div class="job-detail__box--left">
                             <div class="job-detail__information-detail" id="box-job-information-detail">
                                 <div class="d-flex justify-content-between align-items-center">
                                     <h2 class="job-detail__information-detail--title">
                                         Chi tiết tin tuyển dụng
                                     </h2>
                                     <button
                                         onclick="javascript:showLoginPopup('', 'Đăng nhập hoặc Đăng ký để tạo thông báo việc làm')"
                                         class="page-job-detail btn btn-job-notification-setting">
                                         <i class="fa fa-bell"></i>
                                         <span>Gửi tôi việc làm tương tự</span>
                                     </button>
                                 </div>
                                 <div class="job-detail__information-detail--content">
                                     <div class="job-description">
                                         <div class="job-descriptn__item">
                                             <div class="job-description__item--content">
                                                 {!! $jobPosting->description !!}
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="job-detail__information-detail--actions">
                                     <div class="job-detail__information-detail--actions-button box-apply-success"
                                         style="display: none">
                                         <a class="job-detail__info--actions-button button-primary open-apply-modal"
                                             href="#" data-toggle="modal">
                                             <span class="button-icon">
                                                 <i class="fa-solid fa-arrow-rotate-right"></i>
                                             </span>
                                             Ứng tuyển lại
                                         </a>
                                         <a class="job-detail__info--actions-button button-white" target="_blank"
                                             href="">
                                             <span class="button-icon">
                                                 <i class="fa-solid fa-comments"></i>
                                             </span>
                                             Nhắn tin
                                         </a>
                                     </div>
                                     <div class="job-detail__information-detail--actions-label">
                                         Hạn nộp hồ sơ: {{ $closingDate->format('d/m/Y') }}
                                     </div>
                                     @auth('candidate')
                                         <div class="job-detail__information-detail--actions-button box-apply-current">
                                             <form action="{{ route('applications.store') }}" method="POST">
                                                 @csrf
                                                 <input type="hidden" name="job_posting_id" value="{{ $jobPosting->id }}">
                                                 <button type="submit"
                                                     class="job-detail__info--actions-button button-primary open-apply-modal btn-apply-job"
                                                     data-toggle="modal" data-intern-apply>
                                                     <span class="button-icon">
                                                         <i class="fa-light fa-paper-plane"></i>
                                                     </span>
                                                     Ứng tuyển ngay
                                                 </button>
                                             </form>
                                         </div>
                                     @endauth
                                 </div>

                                 <div class="job-detail__information-detail--report">
                                     <span class="job-detail__information-detail--report-icon">
                                         <i class="fa-solid fa-circle-info"></i>
                                     </span>
                                     <span>
                                         Báo cáo tin tuyển dụng: Nếu bạn thấy rằng tin tuyển dụng này không đúng hoặc có dấu
                                         hiệu lừa đảo,
                                         <a class="btn-notice-job color-green"
                                             href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi/1400884.html?report-form=1', 'Đăng nhập hoặc Đăng ký để phản ánh tin tuyển dụng này!')">hãy
                                             phản ánh với chúng tôi.</a>
                                     </span>
                                 </div>
                                 <div class="mi-chart-workspace-wrap mi-chart-wrapper" id="job-fitness-area"
                                     data-job-fitness="false" style="display: flex;">
                                     <div class="mi-chart-workspace" data-job-id="1400884">
                                         <div class="mi-chart-workspace__header-wrapper">
                                             <div class="mi-chart-workspace__header">
                                                 <div class="mi-chart-workspace__tick"></div>
                                                 <h2 class="mi-chart-workspace__title">
                                                     Phân tích mức độ phù hợp của bạn với công việc
                                                 </h2>
                                             </div>
                                             <div class="new-badge">
                                                 <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                     <path
                                                         d="M5.00054 9.99999C4.86887 10.0007 4.74014 9.96113 4.63154 9.88668C4.52294 9.81224 4.43965 9.70642 4.39279 9.58337L3.35541 6.88575C3.3344 6.83139 3.30226 6.78202 3.26105 6.74082C3.21984 6.69961 3.17047 6.66747 3.11611 6.64645L0.417716 5.60829C0.294798 5.56111 0.189074 5.47777 0.114498 5.36927C0.0399225 5.26077 0 5.1322 0 5.00054C0 4.86888 0.0399225 4.74032 0.114498 4.63182C0.189074 4.52331 0.294798 4.43997 0.417716 4.3928L3.11533 3.35541C3.16969 3.3344 3.21906 3.30226 3.26027 3.26105C3.30148 3.21984 3.33362 3.17048 3.35463 3.11612L4.39279 0.417716C4.43997 0.294798 4.52331 0.189074 4.63181 0.114498C4.74031 0.0399224 4.86888 0 5.00054 0C5.1322 0 5.26076 0.0399224 5.36927 0.114498C5.47777 0.189074 5.56111 0.294798 5.60828 0.417716L6.64567 3.11533C6.66668 3.16969 6.69882 3.21906 6.74003 3.26027C6.78124 3.30148 6.8306 3.33362 6.88496 3.35463L9.56695 4.38655C9.69488 4.43396 9.80508 4.51965 9.88256 4.63194C9.96005 4.74422 10.001 4.87766 9.99998 5.01408C9.99799 5.14345 9.95722 5.26925 9.88295 5.37518C9.80867 5.48112 9.7043 5.56233 9.58336 5.60829L6.88574 6.64567C6.83138 6.66668 6.78202 6.69883 6.74081 6.74003C6.6996 6.78124 6.66746 6.83061 6.64645 6.88497L5.60828 9.58337C5.56143 9.70642 5.47813 9.81224 5.36953 9.88668C5.26094 9.96113 5.1322 10.0007 5.00054 9.99999Z"
                                                         fill="#966D05"></path>
                                                 </svg>
                                                 New
                                             </div>
                                         </div>
                                         <div class="mi-chart-workspace__body">
                                             <div class="mi-chart-workspace-alert-wrap">
                                                 <div class="mi-chart-workspace-alert">
                                                     <div class="mi-chart-workspace-alert__icon">
                                                         <i class="fa-solid fa-circle-exclamation"></i>
                                                     </div>
                                                     <div
                                                         class="mi-chart-workspace-alert__content mi-chart-workspace-alert__content--1">
                                                         <div class="mi-chart-workspace-alert__message">
                                                             Toppy Ai chưa thể đưa ra đánh giá vì chưa có đủ hiểu biết về
                                                             năng lực của bạn. Vui
                                                             lòng
                                                             <a
                                                                 href="javascript:showLoginPopup(null, 'Đăng nhập hoặc Đăng ký để ứng tuyển công việc này!')">Đăng
                                                                 nhập</a> để giúp mình hiểu thêm và đánh giá giúp bạn nhé.
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mi-chart-workspace__chart ">
                                                 <div class="mi-chart-workspace__chart-row">
                                                     <div
                                                         class="mi-chart-workspace__chart-col-progress-bar mi-chart-workspace__chart-col-progress-bar--desktop">
                                                         <div class="mi-chart-workspace__progress-circle ">
                                                             <div class="mi-chart-workspace__progress-circle-content">
                                                                 <h4 class="mi-chart-workspace__progress-circle-title">
                                                                     Đánh giá mức độ phù hợp
                                                                 </h4>
                                                                 <div>
                                                                     <img class="mi-chart-workspace__progress-circle-image entered loaded"
                                                                         data-src="https://www.topcv.vn/v4/image/job-fitness/toppy_ai_desktop-3x.png"
                                                                         alt="Mức độ phù hợp"
                                                                         src="https://www.topcv.vn/v4/image/job-fitness/toppy_ai_desktop-3x.png"
                                                                         data-ll-status="loaded">
                                                                 </div>
                                                             </div>
                                                             <div class="circle-progress-bar">
                                                                 <div class="circle-progress-bar__outer">
                                                                     <div class="circle-progress-bar__inner">
                                                                         <div class="circle-progress-bar__percent">
                                                                             <span id="progress-percent">--</span>%
                                                                         </div>
                                                                     </div>
                                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="66" height="66"
                                                                         viewBox="0 0 66 66" fill="none">
                                                                         <circle class="progress-bar" cx="33"
                                                                             cy="33" r="30"
                                                                             stroke="url(#paint0_linear_1195_38016)"
                                                                             stroke-width="5" stroke-linecap="round"
                                                                             fill="none"></circle>
                                                                         <defs>
                                                                             <linearGradient id="paint0_linear_1195_38016"
                                                                                 x1="66" y1="33"
                                                                                 x2="22" y2="0"
                                                                                 gradientUnits="userSpaceOnUse">
                                                                                 <stop stop-color="#11D769"></stop>
                                                                                 <stop offset="1"
                                                                                     stop-color="#089682"></stop>
                                                                             </linearGradient>
                                                                         </defs>
                                                                     </svg>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="line-progress-bar-wrap">
                                                             <div id="line-progress-bar" class="line-progress-bar">
                                                                 <div class="line-progress-bar__item">
                                                                     <div class="line-progress-bar__top">
                                                                         <div class="line-progress-bar__top--left">
                                                                             <div class="line-progress-bar__title">
                                                                                 Vị trí công việc
                                                                             </div>
                                                                             <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-container=".mi-chart-workspace-wrap"
                                                                                 data-original-title="Mức độ tương đồng của vị trí bạn đang làm việc/sẵn sàng ứng tuyển với vị trí mà công việc yêu cầu"></i>
                                                                         </div>
                                                                         <div class="line-progress-bar__top--right">
                                                                             <div
                                                                                 class="line-progress-bar__percent line-progress-bar__percent--1">
                                                                                 --%
                                                                             </div>
                                                                             <span></span>
                                                                         </div>
                                                                     </div>
                                                                     <div
                                                                         class="line-progress-bar__progress line-progress-bar__progress--1">
                                                                         <div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <div
                                                                     class="line-progress-bar__item line-progress-bar__item-exp-progress-bar">
                                                                     <div
                                                                         class="line-progress-bar__top line-progress-bar_">
                                                                         <div class="line-progress-bar__top--left">
                                                                             <div class="line-progress-bar__title">
                                                                                 Mức độ kinh nghiệm
                                                                             </div>
                                                                             <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-container=".mi-chart-workspace-wrap"
                                                                                 data-original-title="Mức độ tương đồng kinh nghiệm của bạn với kinh nghiệm mà công việc yêu cầu"></i>
                                                                         </div>
                                                                         <div class="line-progress-bar__top--right">
                                                                             <div
                                                                                 class="line-progress-bar__percent line-progress-bar__percent--2">
                                                                                 --%
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div
                                                                         class="line-progress-bar__progress line-progress-bar__progress--2">
                                                                         <div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <div
                                                                     class="line-progress-bar__item line-progress-bar__item-exp-full">
                                                                     <img class="line-progress-bar__item-exp-full--icon"
                                                                         data-src="https://www.topcv.vn/v4/image/job-fitness/star_2.png"
                                                                         alt="star_2"
                                                                         src="https://www.topcv.vn/v4/image/job-fitness/star_2.png">
                                                                     <div class="line-progress-bar__item-exp-full--text">
                                                                         Mức độ kinh nghiệm của bạn cao hơn so với yêu cầu
                                                                         của việc làm
                                                                     </div>
                                                                 </div>
                                                                 <div class="line-progress-bar__item">
                                                                     <div class="line-progress-bar__top">
                                                                         <div class="line-progress-bar__top--left">
                                                                             <div class="line-progress-bar__title">
                                                                                 Kỹ năng
                                                                             </div>
                                                                             <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-container=".mi-chart-workspace-wrap"
                                                                                 data-original-title="Mức độ tương đồng của các kỹ năng bạn có với các kỹ năng mà công việc yêu cầu"></i>
                                                                         </div>
                                                                         <div class="line-progress-bar__top--right">
                                                                             <div
                                                                                 class="line-progress-bar__percent line-progress-bar__percent--3">
                                                                                 --%
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div
                                                                         class="line-progress-bar__progress line-progress-bar__progress--3">
                                                                         <div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <div class="line-progress-bar__item">
                                                                     <div class="line-progress-bar__top">
                                                                         <div class="line-progress-bar__top--left">
                                                                             <div class="line-progress-bar__title">
                                                                                 Định hướng
                                                                             </div>
                                                                             <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-container=".mi-chart-workspace-wrap"
                                                                                 data-original-title="Mức độ tương đồng về định hướng nghề nghiệp của bạn (thể hiện qua thông tin ngành nghề và các hoạt động tương tác gần đây của bạn trên nền tảng) với yêu cầu về định hướng nghề nghiệp của công việc đang xem"></i>
                                                                         </div>
                                                                         <div class="line-progress-bar__top--right">
                                                                             <div
                                                                                 class="line-progress-bar__percent line-progress-bar__percent--4">
                                                                                 --%
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div
                                                                         class="line-progress-bar__progress line-progress-bar__progress--4">
                                                                         <div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <div class="line-progress-bar__item">
                                                                     <div class="line-progress-bar__top">
                                                                         <div class="line-progress-bar__top--left">
                                                                             <div class="line-progress-bar__title">
                                                                                 Yếu tố khác
                                                                             </div>
                                                                             <i class="line-progress-bar__icon fa-solid fa-circle-info"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-container=".mi-chart-workspace-wrap"
                                                                                 data-original-title="Mức độ tương đồng về các yếu tố khác (ví dụ Địa điểm, Giới tính,...) giữa hồ sơ của bạn với các yêu cầu của công việc đang xem"></i>
                                                                         </div>
                                                                         <div class="line-progress-bar__top--right">
                                                                             <div
                                                                                 class="line-progress-bar__percent line-progress-bar__percent--5">
                                                                                 --%
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div
                                                                         class="line-progress-bar__progress line-progress-bar__progress--5">
                                                                         <div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div
                                                         class="mi-chart-workspace__chart-col-radar-chart mi-chart-workspace__radar-chart-wrap">
                                                         <div class="mi-chart-workspace__radar-chart">
                                                             <canvas id="mi-chart-workspace__radar-chart" class="d-none"
                                                                 style="display: block; box-sizing: border-box; height: 196px; width: 196px;"
                                                                 width="183" height="183">
                                                             </canvas>
                                                             <div id="mi-chart-workspace__radar-chart-label-1"
                                                                 class="mi-chart-workspace__radar-chart-label"
                                                                 style="left: 53.5px; top: -68px;">
                                                                 <div class="mi-chart-workspace__radar-chart-icon">
                                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="17" height="16"
                                                                         viewBox="0 0 17 16" fill="none">
                                                                         <path
                                                                             d="M14.9528 4.65351C14.3861 4.02684 13.4394 3.71351 12.0661 3.71351H11.9061V3.68684C11.9061 2.56684 11.9061 1.18018 9.39943 1.18018H8.3861C5.87943 1.18018 5.87943 2.57351 5.87943 3.68684V3.72018H5.71943C4.33943 3.72018 3.39943 4.03351 2.83277 4.66018C2.17277 5.39351 2.19277 6.38018 2.25943 7.05351L2.2661 7.10018L2.31022 7.56346C2.32449 7.71323 2.40523 7.84868 2.53139 7.93065C2.69175 8.03485 2.91297 8.17585 3.05277 8.25351C3.1461 8.31351 3.2461 8.36684 3.3461 8.42018C4.4861 9.04684 5.73943 9.46684 7.01277 9.67351C7.07277 10.3002 7.3461 11.0335 8.8061 11.0335C10.2661 11.0335 10.5528 10.3068 10.5994 9.66018C11.9594 9.44018 13.2728 8.96684 14.4594 8.27351C14.4994 8.25351 14.5261 8.23351 14.5594 8.21351C14.8032 8.07573 15.0554 7.90848 15.2892 7.74187C15.4027 7.66099 15.4748 7.53476 15.4902 7.39625L15.4928 7.37351L15.5261 7.06018C15.5328 7.02018 15.5328 6.98684 15.5394 6.94018C15.5928 6.26684 15.5794 5.34684 14.9528 4.65351ZM9.61943 9.22018C9.61943 9.92684 9.61943 10.0335 8.79943 10.0335C7.97943 10.0335 7.97943 9.90684 7.97943 9.22684V8.38684H9.61943V9.22018ZM6.83277 3.71351V3.68684C6.83277 2.55351 6.83277 2.13351 8.3861 2.13351H9.39943C10.9528 2.13351 10.9528 2.56018 10.9528 3.68684V3.72018H6.83277V3.71351Z"
                                                                             fill="white"></path>
                                                                         <path
                                                                             d="M14.5382 9.28368C14.8929 9.11776 15.3003 9.39865 15.2649 9.78863L15.0526 12.1268C14.9126 13.4601 14.366 14.8201 11.4326 14.8201H6.35264C3.4193 14.8201 2.87264 13.4601 2.73264 12.1335L2.53192 9.92564C2.49688 9.54018 2.89481 9.25964 3.24844 9.41698C4.00816 9.755 5.14866 10.2379 5.92234 10.4541C6.08592 10.4998 6.21847 10.6182 6.29656 10.7691C6.71742 11.5819 7.57909 12.0135 8.80597 12.0135C10.0208 12.0135 10.8925 11.5652 11.3152 10.7493C11.3934 10.5983 11.5264 10.4799 11.69 10.4338C12.5149 10.2014 13.7377 9.65815 14.5382 9.28368Z"
                                                                             fill="white"></path>
                                                                     </svg>
                                                                 </div>
                                                                 <div class="mi-chart-workspace__radar-chart-text">
                                                                     Vị trí công việc
                                                                 </div>
                                                             </div>
                                                             <div id="mi-chart-workspace__radar-chart-label-2"
                                                                 class="mi-chart-workspace__radar-chart-label"
                                                                 style="left: 203.204px; top: 39.7163px;">
                                                                 <div class="mi-chart-workspace__radar-chart-icon">
                                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="16" height="16"
                                                                         viewBox="0 0 16 16" fill="none">
                                                                         <path
                                                                             d="M10.7935 1.3335H5.20683C2.78016 1.3335 1.3335 2.78016 1.3335 5.20683V10.7935C1.3335 13.2202 2.78016 14.6668 5.20683 14.6668H10.7935C13.2202 14.6668 14.6668 13.2202 14.6668 10.7935V5.20683C14.6668 2.78016 13.2202 1.3335 10.7935 1.3335ZM6.64683 9.9335L5.14683 11.4335C5.04683 11.5335 4.92016 11.5802 4.7935 11.5802C4.66683 11.5802 4.5335 11.5335 4.44016 11.4335L3.94016 10.9335C3.74016 10.7402 3.74016 10.4202 3.94016 10.2268C4.1335 10.0335 4.44683 10.0335 4.64683 10.2268L4.7935 10.3735L5.94016 9.22683C6.1335 9.0335 6.44683 9.0335 6.64683 9.22683C6.84016 9.42016 6.84016 9.74016 6.64683 9.9335ZM6.64683 5.26683L5.14683 6.76683C5.04683 6.86683 4.92016 6.9135 4.7935 6.9135C4.66683 6.9135 4.5335 6.86683 4.44016 6.76683L3.94016 6.26683C3.74016 6.0735 3.74016 5.7535 3.94016 5.56016C4.1335 5.36683 4.44683 5.36683 4.64683 5.56016L4.7935 5.70683L5.94016 4.56016C6.1335 4.36683 6.44683 4.36683 6.64683 4.56016C6.84016 4.7535 6.84016 5.0735 6.64683 5.26683ZM11.7068 11.0802H8.20683C7.9335 11.0802 7.70683 10.8535 7.70683 10.5802C7.70683 10.3068 7.9335 10.0802 8.20683 10.0802H11.7068C11.9868 10.0802 12.2068 10.3068 12.2068 10.5802C12.2068 10.8535 11.9868 11.0802 11.7068 11.0802ZM11.7068 6.4135H8.20683C7.9335 6.4135 7.70683 6.18683 7.70683 5.9135C7.70683 5.64016 7.9335 5.4135 8.20683 5.4135H11.7068C11.9868 5.4135 12.2068 5.64016 12.2068 5.9135C12.2068 6.18683 11.9868 6.4135 11.7068 6.4135Z"
                                                                             fill="white"></path>
                                                                     </svg>
                                                                 </div>
                                                                 <div class="mi-chart-workspace__radar-chart-text">
                                                                     Kỹ năng
                                                                 </div>
                                                             </div>
                                                             <div id="mi-chart-workspace__radar-chart-label-3"
                                                                 class="mi-chart-workspace__radar-chart-label"
                                                                 style="left: 152.603px; top: 180.284px;">
                                                                 <div class="mi-chart-workspace__radar-chart-icon">
                                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="17" height="16"
                                                                         viewBox="0 0 17 16" fill="none">
                                                                         <path
                                                                             d="M15.0088 5.20546V5.20683V10.7935C15.0088 11.9074 14.6787 12.7365 14.1286 13.2866C13.5785 13.8367 12.7494 14.1668 11.6355 14.1668H6.05546C4.94157 14.1668 4.11263 13.8367 3.56257 13.286C3.01244 12.7352 2.68213 11.9044 2.68213 10.7868V5.20683C2.68213 4.09293 3.01222 3.26384 3.56235 2.71372C4.11247 2.16359 4.94156 1.8335 6.05546 1.8335H11.6421C12.7561 1.8335 13.585 2.16363 14.1342 2.71349C14.6833 3.26325 15.0119 4.09188 15.0088 5.20546ZM4.14213 8.00016C4.14213 8.75631 4.75932 9.3735 5.51546 9.3735C6.2716 9.3735 6.8888 8.75631 6.8888 8.00016C6.8888 7.24402 6.2716 6.62683 5.51546 6.62683C4.75932 6.62683 4.14213 7.24402 4.14213 8.00016ZM7.47546 8.00016C7.47546 8.75631 8.09265 9.3735 8.8488 9.3735C9.60494 9.3735 10.2221 8.75631 10.2221 8.00016C10.2221 7.24402 9.60494 6.62683 8.8488 6.62683C8.09265 6.62683 7.47546 7.24402 7.47546 8.00016ZM10.8088 8.00016C10.8088 8.75631 11.426 9.3735 12.1821 9.3735C12.9383 9.3735 13.5555 8.7563 13.5555 8.00016C13.5555 7.24402 12.9383 6.62683 12.1821 6.62683C11.426 6.62683 10.8088 7.24402 10.8088 8.00016Z"
                                                                             fill="white" stroke="white"></path>
                                                                     </svg>
                                                                 </div>
                                                                 <div class="mi-chart-workspace__radar-chart-text">
                                                                     Yếu tố khác
                                                                 </div>
                                                             </div>
                                                             <div id="mi-chart-workspace__radar-chart-label-4"
                                                                 class="mi-chart-workspace__radar-chart-label"
                                                                 style="left: -24.603px; top: 180.284px;">
                                                                 <div class="mi-chart-workspace__radar-chart-icon">
                                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="16" height="16"
                                                                         viewBox="0 0 16 16" fill="none">
                                                                         <path
                                                                             d="M7.28223 7.3125C7.65723 6.90625 8.31348 6.90625 8.68848 7.3125C9.09473 7.6875 9.09473 8.34375 8.68848 8.71875C8.31348 9.125 7.65723 9.125 7.28223 8.71875C6.87598 8.34375 6.87598 7.6875 7.28223 7.3125ZM8.00098 0C12.4072 0 16.001 3.59375 16.001 8C16.001 12.4375 12.4072 16 8.00098 16C3.56348 16 0.000976562 12.4375 0.000976562 8C0.000976562 3.59375 3.56348 0 8.00098 0ZM11.9385 4.875C12.1572 4.375 11.626 3.84375 11.0947 4.0625L6.59473 6.125C6.40723 6.21875 6.18848 6.4375 6.09473 6.625L4.03223 11.125C3.81348 11.6562 4.34473 12.1875 4.87598 11.9688L9.37598 9.90625C9.56348 9.8125 9.78223 9.59375 9.87598 9.40625L11.9385 4.875Z"
                                                                             fill="white"></path>
                                                                     </svg>
                                                                 </div>
                                                                 <div class="mi-chart-workspace__radar-chart-text">
                                                                     Định hướng
                                                                 </div>
                                                             </div>
                                                             <div id="mi-chart-workspace__radar-chart-label-5"
                                                                 class="mi-chart-workspace__radar-chart-label"
                                                                 style="left: -71.2035px; top: 39.7163px;">
                                                                 <div class="mi-chart-workspace__radar-chart-icon">
                                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="17" height="16"
                                                                         viewBox="0 0 17 16" fill="none">
                                                                         <path
                                                                             d="M10.0019 2.33977L11.1752 4.68643C11.3352 5.0131 11.7619 5.32643 12.1219 5.38643L14.2486 5.73977C15.6086 5.96643 15.9286 6.9531 14.9486 7.92643L13.2952 9.57977C13.0152 9.85977 12.8619 10.3998 12.9486 10.7864L13.4219 12.8331C13.7952 14.4531 12.9352 15.0798 11.5019 14.2331L9.50857 13.0531C9.14857 12.8398 8.55524 12.8398 8.18857 13.0531L6.19524 14.2331C4.76857 15.0798 3.90191 14.4464 4.27524 12.8331L4.74857 10.7864C4.83524 10.3998 4.68191 9.85977 4.40191 9.57977L2.74857 7.92643C1.77524 6.9531 2.08857 5.96643 3.44857 5.73977L5.57524 5.38643C5.92857 5.32643 6.35524 5.0131 6.51524 4.68643L7.68857 2.33977C8.32857 1.06643 9.36857 1.06643 10.0019 2.33977Z"
                                                                             fill="white"></path>
                                                                     </svg>
                                                                 </div>
                                                                 <div class="mi-chart-workspace__radar-chart-text">
                                                                     Kinh nghiệm
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="mi-chart-workspace-warning" style="display: none;">
                                         <div class="mi-chart-workspace-warning__content">
                                             <div class="mi-chart-workspace-warning__content-title">
                                                 <div>
                                                     Lưu ý:
                                                 </div>
                                             </div>
                                             <div class="mi-chart-workspace-warning__content-description">
                                                 <div>
                                                     Tiện ích này được nghiên cứu, phát triển trên cơ sở ứng dụng dữ liệu
                                                     lớn và trí tuệ nhân tạo để
                                                     bạn ra quyết định hiệu quả hơn khi tìm việc, tăng thêm cơ hội tiếp cận
                                                     các việc làm phù hợp nhất
                                                     và chỉ nên sử dụng với mục đích tham khảo.
                                                 </div>
                                             </div>
                                             <div class="mi-chart-workspace-warning__content-description">
                                                 <div>
                                                     Các thông tin này hoàn toàn không có ý nghĩa khẳng định bạn sẽ trúng
                                                     tuyển hay không trúng tuyển
                                                     với bất cứ việc làm nào.
                                                 </div>
                                             </div>
                                             <div class="mi-chart-workspace-warning__content-description ">
                                                 <div class="text-bold">
                                                     Toppy AI có thể cần 1 - 2 giờ để xử lý các dữ liệu mới từ bạn, đặc biệt
                                                     sau khi bạn update CV.
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="lazy entered" data-lazy-function="initMiChartWorkspace"
                                     data-ll-status="entered">
                                     <img id="mi-chart-workspace-skeleton" class="mi-chart-wrapper lazy entered loaded"
                                         data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-fitness/match-skill.png"
                                         alt="Mức độ phù hợp" data-ll-status="loaded"
                                         src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-fitness/match-skill.png"
                                         data-job-fitness="false" style="display: none;">
                                 </div>
                             </div>
                             <div class="box-job-similar lazy entered" id="box-job-similar"
                                 data-lazy-function="initBoxJobSimilar" data-ll-status="entered">
                                 <h2 class="box-title">Việc làm liên quan</h2>
                                 <div class="box-content">
                                     <div class="job-body row">
                                         <div id="box-relate-jobs" class="box_general">
                                             <link rel="stylesheet"
                                                 href="https://static.topcv.vn/v4/css/components/desktop/jobs/job-list-default.40710d157e4df9feK.css">

                                             <div class="job-list-default">
                                                 <div class="job-item-default
                                 job-ta
                 bg-flash-job                 "
                                                     data-job-id="1401076" data-job-position="1" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::fdb94822ec6a407f9c7cefd37a5ca554::1::0.9500"
                                                     id="featured-suggest-1401076">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/nhan-vien-2d-artist-linh-vuc-hoat-hinh/1401076.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Afdb94822ec6a407f9c7cefd37a5ca554%3A%3A1%3A%3A0.9500">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/183238e350e39514feeed31b9e9943cd-668e64d469f78.jpg"
                                                                 class="w-100" alt="CÔNG TY TNHH EGMEDIA"
                                                                 title="Nhân Viên 2D Artist Lĩnh Vực Hoạt Hình">
                                                         </a>
                                                         <div class="tag-job-flash" data-toggle="tooltip-flash-job"
                                                             data-trigger="manual" data-html="true" data-job-id="1401076"
                                                             data-template="<div data-job-id=1401076 class=&quot;flash-job-tag-tooltip tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>"
                                                             title="" data-placement="top" data-container="body"
                                                             data-original-title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/huy-hieu-tia-set'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>">
                                                             <img src="https://www.topcv.vn/v4/image/job-list/icon-flash.webp"
                                                                 alt="">
                                                         </div>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/nhan-vien-2d-artist-linh-vuc-hoat-hinh/1401076.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Afdb94822ec6a407f9c7cefd37a5ca554%3A%3A1%3A%3A0.9500">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Nhân Viên 2D Artist Lĩnh Vực Hoạt Hình">Nhân
                                                                                 Viên 2D Artist Lĩnh Vực Hoạt Hình</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-egmedia/185340.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY TNHH EGMEDIA">{{ $jobPosting->company_name }}</a>

                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         {{ $jobPosting->salary }}
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title="" data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Thanh Trì</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>22</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 1 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1401076" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/nhan-vien-2d-artist-linh-vuc-hoat-hinh/1401076.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Afdb94822ec6a407f9c7cefd37a5ca554%3A%3A1%3A%3A0.9500"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1401076"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default job-ta " data-job-id="1379455"
                                                     data-job-position="2" data-u-sr-id="" data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::cff0b0c0005a4b839411f9737f0e55fe::2::0.8747"
                                                     id="featured-suggest-1379455">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor-youtube/1379455.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Acff0b0c0005a4b839411f9737f0e55fe%3A%3A2%3A%3A0.8747">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/uJzjXoGzXVhtfRWDPtXs43Wa5W9Dub7T_1647831808____ca04e1945f551f21b3aa6b3b0f56c17d.png"
                                                                 class="w-100"
                                                                 alt="CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ GIẢI TRÍ HG MEDIA"
                                                                 title="Video Editor (Youtube)">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">
                                                                         </div>
                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor-youtube/1379455.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Acff0b0c0005a4b839411f9737f0e55fe%3A%3A2%3A%3A0.8747">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor (Youtube)">Video
                                                                                 Editor (Youtube)</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-truyen-thong-va-giai-tri-hg-media/55696.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ GIẢI TRÍ HG MEDIA">CÔNG
                                                                         TY CỔ PHẦN TRUYỀN THÔNG VÀ GIẢI TRÍ HG MEDIA</a>
                                                                 </div>
                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         8 - 12 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title="" data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Đống Đa</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>5</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 3 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1379455" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor-youtube/1379455.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Acff0b0c0005a4b839411f9737f0e55fe%3A%3A2%3A%3A0.8747"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1379455"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1390823" data-job-position="3" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::99f1d93210a54e68ab3ff97f3a9d2684::3::0.8089"
                                                     id="featured-suggest-1390823">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube/1390823.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A99f1d93210a54e68ab3ff97f3a9d2684%3A%3A3%3A%3A0.8089">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cong-ty-co-phan-viralobal-media-viet-nam-21e1dbe0b0509453a9f4b8f72cde1f83-667d0b08cc241.jpg"
                                                                 class="w-100"
                                                                 alt="CÔNG TY CỔ PHẦN VIRALOBAL MEDIA VIỆT NAM"
                                                                 title="Nhân Viên Video Editor Youtube">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube/1390823.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A99f1d93210a54e68ab3ff97f3a9d2684%3A%3A3%3A%3A0.8089">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Nhân Viên Video Editor Youtube">Nhân
                                                                                 Viên Video Editor Youtube</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-viralobal-media-viet-nam/183217.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY CỔ PHẦN VIRALOBAL MEDIA VIỆT NAM">CÔNG
                                                                         TY CỔ PHẦN VIRALOBAL MEDIA VIỆT NAM</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         6 - 7 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title="" data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Nam Từ Liêm</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>15</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1390823" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube/1390823.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A99f1d93210a54e68ab3ff97f3a9d2684%3A%3A3%3A%3A0.8089"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1390823"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1406864" data-job-position="4" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::f241dd768ef048ed80730b6ec9678549::4::0.8089"
                                                     id="featured-suggest-1406864">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube/1406864.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Af241dd768ef048ed80730b6ec9678549%3A%3A4%3A%3A0.8089">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/E5ytAjINnPHD8YPvcjifjRtCYCFyrzIv_1720434895____ed3fc5e2d844fd2012f4c298ae2e68ea.png"
                                                                 class="w-100" alt="CÔNG TY TNHH DOHAGI"
                                                                 title="Nhân Viên Video Editor Youtube">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube/1406864.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Af241dd768ef048ed80730b6ec9678549%3A%3A4%3A%3A0.8089">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Nhân Viên Video Editor Youtube">Nhân
                                                                                 Viên Video Editor Youtube</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-dohagi/184880.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY TNHH DOHAGI">CÔNG TY
                                                                         TNHH DOHAGI</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         10 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title="" data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Gia Lâm</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>42</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1406864" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube/1406864.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Af241dd768ef048ed80730b6ec9678549%3A%3A4%3A%3A0.8089"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1406864"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1405882" data-job-position="5" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::8d972c2f98af41178e89c2c229f9b3d7::5::0.8023"
                                                     id="featured-suggest-1405882">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor-phim-hoat-hinh/1405882.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A8d972c2f98af41178e89c2c229f9b3d7%3A%3A5%3A%3A0.8023">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/4mKT2F9sSYIKdWPT1Ep5epnZoB2RrIBA_1648197493____546d9b9761d9874c25dbce8027bbbc6d.png"
                                                                 class="w-100" alt="CÔNG TY CỔ PHẦN WEEGOON GLOBAL"
                                                                 title="Video Editor (Phim Hoạt Hình)">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor-phim-hoat-hinh/1405882.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A8d972c2f98af41178e89c2c229f9b3d7%3A%3A5%3A%3A0.8023">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor (Phim Hoạt Hình)">Video
                                                                                 Editor (Phim Hoạt Hình)</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-weegoon-global/61970.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY CỔ PHẦN WEEGOON GLOBAL">CÔNG
                                                                         TY CỔ PHẦN WEEGOON GLOBAL</a>

                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         Tới 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title="" data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Cầu Giấy</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>43</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1405882" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor-phim-hoat-hinh/1405882.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A8d972c2f98af41178e89c2c229f9b3d7%3A%3A5%3A%3A0.8023"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1405882"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1405796" data-job-position="6" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::c26f6780b36949798ea321ae7921f23e::6::0.7220"
                                                     id="featured-suggest-1405796">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/animation-hoat-hinh/1405796.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ac26f6780b36949798ea321ae7921f23e%3A%3A6%3A%3A0.7220">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/4mKT2F9sSYIKdWPT1Ep5epnZoB2RrIBA_1648197493____546d9b9761d9874c25dbce8027bbbc6d.png"
                                                                 class="w-100" alt="CÔNG TY CỔ PHẦN WEEGOON GLOBAL"
                                                                 title="Animation (Hoạt Hình)">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/animation-hoat-hinh/1405796.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ac26f6780b36949798ea321ae7921f23e%3A%3A6%3A%3A0.7220">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Animation (Hoạt Hình)">Animation
                                                                                 (Hoạt Hình)</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-weegoon-global/61970.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY CỔ PHẦN WEEGOON GLOBAL">CÔNG
                                                                         TY CỔ PHẦN WEEGOON GLOBAL</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         Tới 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Cầu Giấy</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>43</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1405796" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/animation-hoat-hinh/1405796.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ac26f6780b36949798ea321ae7921f23e%3A%3A6%3A%3A0.7220"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1405796"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1393189" data-job-position="7" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::45cd4fead3844d589f24c597702e286e::7::0.6980"
                                                     id="featured-suggest-1393189">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/thuc-tap-sinh-marketing-dien-hoat-video-youtube/1393189.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A45cd4fead3844d589f24c597702e286e%3A%3A7%3A%3A0.6980">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cong-ty-tnhh-gifttify-60b5b83d9aaa8.jpg"
                                                                 class="w-100" alt="Công ty TNHH GIFTTIFY"
                                                                 title="Thực Tập Sinh Marketing Diễn Hoạt Video Youtube">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/thuc-tap-sinh-marketing-dien-hoat-video-youtube/1393189.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A45cd4fead3844d589f24c597702e286e%3A%3A7%3A%3A0.6980">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Thực Tập Sinh Marketing Diễn Hoạt Video Youtube">Thực
                                                                                 Tập Sinh Marketing Diễn Hoạt Video
                                                                                 Youtube</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-gifttify/60482.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="Công ty TNHH GIFTTIFY">Công
                                                                         ty TNHH GIFTTIFY</a>

                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         3 - 6 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Nam Từ Liêm</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>16</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1393189" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/thuc-tap-sinh-marketing-dien-hoat-video-youtube/1393189.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A45cd4fead3844d589f24c597702e286e%3A%3A7%3A%3A0.6980"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1393189"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1392573" data-job-position="8" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::b655f16c59bb446eba413d6cac0fe843::8::0.6425"
                                                     id="featured-suggest-1392573">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/content-video-editor-cho-kenh-youtube-ngoai/1392573.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ab655f16c59bb446eba413d6cac0fe843%3A%3A8%3A%3A0.6425">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/sQAIrgB152u8yGnCjJLZ5cTxd78TC6UF_1715320951____3e80745b56f2bbf5c1c457820ddf0d94.jpeg"
                                                                 class="w-100" alt="CÔNG TY TNHH TLS MEDIA"
                                                                 title="Content/Video Editor Cho Kênh Youtube Ngoại">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/content-video-editor-cho-kenh-youtube-ngoai/1392573.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ab655f16c59bb446eba413d6cac0fe843%3A%3A8%3A%3A0.6425">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Content/Video Editor Cho Kênh Youtube Ngoại">Content/Video
                                                                                 Editor Cho Kênh Youtube Ngoại</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-tls-media/171467.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY TNHH TLS MEDIA">CÔNG
                                                                         TY TNHH TLS MEDIA</a>

                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         7 - 8 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Cầu Giấy</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>15</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1392573" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/content-video-editor-cho-kenh-youtube-ngoai/1392573.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ab655f16c59bb446eba413d6cac0fe843%3A%3A8%3A%3A0.6425"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1392573"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1394650" data-job-position="9" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::0bd0e3643c1a4a04ade449fc74b859e9::9::0.6370"
                                                     id="featured-suggest-1394650">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/editor-da-san-pham-da-linh-vuc/1394650.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A0bd0e3643c1a4a04ade449fc74b859e9%3A%3A9%3A%3A0.6370">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/AeyPmpoo6sVttf5jJva0P2e0b4inSFIT_1649054915____ea8af69c63bd002f4d2da36d111cb921.png"
                                                                 class="w-100"
                                                                 alt="CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ QUẢNG CÁO MIC CREATIVE"
                                                                 title="Editor - Đa Sản Phẩm/ Đa Lĩnh Vực">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/editor-da-san-pham-da-linh-vuc/1394650.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A0bd0e3643c1a4a04ade449fc74b859e9%3A%3A9%3A%3A0.6370">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Editor - Đa Sản Phẩm/ Đa Lĩnh Vực">Editor
                                                                                 - Đa Sản Phẩm/ Đa Lĩnh Vực</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-truyen-thong-va-quang-cao-mic-creative/96028.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ QUẢNG CÁO MIC CREATIVE">CÔNG
                                                                         TY CỔ PHẦN TRUYỀN THÔNG VÀ QUẢNG CÁO MIC
                                                                         CREATIVE</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         8 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Cầu Giấy</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>19</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 1 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1394650" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/editor-da-san-pham-da-linh-vuc/1394650.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A0bd0e3643c1a4a04ade449fc74b859e9%3A%3A9%3A%3A0.6370"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1394650"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1405297" data-job-position="10" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::87a94326369f43aba78a0f8752bfb286::10::0.6283"
                                                     id="featured-suggest-1405297">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/bien-kich-phim-hoat-hinh/1405297.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A87a94326369f43aba78a0f8752bfb286%3A%3A10%3A%3A0.6283">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/4mKT2F9sSYIKdWPT1Ep5epnZoB2RrIBA_1648197493____546d9b9761d9874c25dbce8027bbbc6d.png"
                                                                 class="w-100" alt="CÔNG TY CỔ PHẦN WEEGOON GLOBAL"
                                                                 title="Biên Kịch Phim Hoạt Hình">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/bien-kich-phim-hoat-hinh/1405297.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A87a94326369f43aba78a0f8752bfb286%3A%3A10%3A%3A0.6283">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Biên Kịch Phim Hoạt Hình">Biên
                                                                                 Kịch Phim Hoạt Hình</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-weegoon-global/61970.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY CỔ PHẦN WEEGOON GLOBAL">CÔNG
                                                                         TY CỔ PHẦN WEEGOON GLOBAL</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         Tới 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Cầu Giấy</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>43</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 3 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1405297" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/bien-kich-phim-hoat-hinh/1405297.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A87a94326369f43aba78a0f8752bfb286%3A%3A10%3A%3A0.6283"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1405297"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1300578" data-job-position="11" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::45b1d86778684b29865c24ec11b520b2::11::0.6244"
                                                     id="featured-suggest-1300578">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/editor-kenh-youtube/1300578.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A45b1d86778684b29865c24ec11b520b2%3A%3A11%3A%3A0.6244">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/IEFNvwMgS6cHlKQ5niQAWJ596jc4Kw2T_1689846925____d051194ff0a64fa15d1a17dce87d3e2d.jpg"
                                                                 class="w-100"
                                                                 alt="Công ty TNHH Giải Trí và Truyền Thông Matrix Media"
                                                                 title="Editor Kênh Youtube">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/editor-kenh-youtube/1300578.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A45b1d86778684b29865c24ec11b520b2%3A%3A11%3A%3A0.6244">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Editor Kênh Youtube">Editor
                                                                                 Kênh Youtube</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-giai-tri-va-truyen-thong-matrix-media/149169.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="Công ty TNHH Giải Trí và Truyền Thông Matrix Media">Công
                                                                         ty TNHH Giải Trí và Truyền Thông Matrix Media</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         9 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Cầu Giấy</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>31</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 4 giờ trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1300578" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/editor-kenh-youtube/1300578.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A45b1d86778684b29865c24ec11b520b2%3A%3A11%3A%3A0.6244"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1300578"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1276862" data-job-position="12" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::a796ba77255444bdb8816b3e28f5cbfc::12::0.6129"
                                                     id="featured-suggest-1276862">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/bien-kich-phim-hoat-hinh/1276862.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aa796ba77255444bdb8816b3e28f5cbfc%3A%3A12%3A%3A0.6129">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cong-ty-co-phan-chung-khoan-dnse-62467b7f11030.jpg"
                                                                 class="w-100" alt="Công ty Cổ phần Chứng khoán DNSE"
                                                                 title="Biên Kịch Phim Hoạt Hình">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/bien-kich-phim-hoat-hinh/1276862.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aa796ba77255444bdb8816b3e28f5cbfc%3A%3A12%3A%3A0.6129">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Biên Kịch Phim Hoạt Hình">Biên
                                                                                 Kịch Phim Hoạt Hình</span>
                                                                             <span
                                                                                 class="icon-verified-employer level-five">
                                                                                 <i class="fa-solid fa-circle-check icon-verified-employer-tooltip"
                                                                                     data-toggle="tooltip"
                                                                                     data-container="body"
                                                                                     data-html="true" title=""
                                                                                     data-placement="top"
                                                                                     data-original-title="
  <b>Nhà tuyển dụng</b><span> đã được xác thực:</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực email tên miền công ty</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực số điện thoại</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã được duyệt Giấy phép kinh doanh</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Tài khoản NTD được tạo tối thiểu 6 tháng</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Chưa có lịch sử bị báo cáo tin đăng</span><br>"></i></span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-chung-khoan-dnse/70916.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="Công ty Cổ phần Chứng khoán DNSE">Công
                                                                         ty Cổ phần Chứng khoán DNSE</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         <i class="fa-solid fa-circle-dollar"></i>
                                                                         Thoả thuận
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Hai Bà Trưng</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>43</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 3 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1276862" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/bien-kich-phim-hoat-hinh/1276862.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aa796ba77255444bdb8816b3e28f5cbfc%3A%3A12%3A%3A0.6129"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1276862"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1393671" data-job-position="13" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::aa42a7ed459f48b29a905e985d80809c::13::0.5935"
                                                     id="featured-suggest-1393671">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/bien-kich-hoat-hinh-diy/1393671.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aaa42a7ed459f48b29a905e985d80809c%3A%3A13%3A%3A0.5935">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/gRkr6OTlpiNPC5x3ZbwTRjG7nWs2FqyW_1684986527____735aff8c4f2ee9fb0989313fd34e2537.jpg"
                                                                 class="w-100"
                                                                 alt="CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ CÔNG NGHỆ ENJOHUB"
                                                                 title="Biên Kịch Hoạt Hình DIY">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/bien-kich-hoat-hinh-diy/1393671.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aaa42a7ed459f48b29a905e985d80809c%3A%3A13%3A%3A0.5935">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Biên Kịch Hoạt Hình DIY">Biên
                                                                                 Kịch Hoạt Hình DIY</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-truyen-thong-va-cong-nghe-enjohub/144040.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ CÔNG NGHỆ ENJOHUB">CÔNG
                                                                         TY CỔ PHẦN TRUYỀN THÔNG VÀ CÔNG NGHỆ ENJOHUB</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         10 - 12 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Bắc Từ Liêm</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>43</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1393671" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/bien-kich-hoat-hinh-diy/1393671.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aaa42a7ed459f48b29a905e985d80809c%3A%3A13%3A%3A0.5935"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1393671"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1403242" data-job-position="14" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::b5f4ead27bd341198d523a36838df358::14::0.5904"
                                                     id="featured-suggest-1403242">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor/1403242.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ab5f4ead27bd341198d523a36838df358%3A%3A14%3A%3A0.5904">
                                                             <img src="https://www.topcv.vn/v4/image/normal-company/logo_default.png"
                                                                 class="w-100" alt="Công ty Cổ phần Nutricos"
                                                                 title="Video Editor">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor/1403242.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ab5f4ead27bd341198d523a36838df358%3A%3A14%3A%3A0.5904">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor">Video
                                                                                 Editor</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-nutricos/155453.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="Công ty Cổ phần Nutricos">Công
                                                                         ty Cổ phần Nutricos</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         9 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Nam Từ Liêm</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>26</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 4 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1403242" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor/1403242.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ab5f4ead27bd341198d523a36838df358%3A%3A14%3A%3A0.5904"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1403242"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="566449" data-job-position="15" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::de95dac5d83a4ddf918f2e0d282cdd80::15::0.5904"
                                                     id="featured-suggest-566449">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor/566449.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ade95dac5d83a4ddf918f2e0d282cdd80%3A%3A15%3A%3A0.5904">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/cong-ty-co-phan-truyen-thong-medinet-5c710f3d3d2b7_rs.jpg"
                                                                 class="w-100"
                                                                 alt="Công ty Cổ phần Truyền thông Medinet"
                                                                 title="Video Editor">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor/566449.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ade95dac5d83a4ddf918f2e0d282cdd80%3A%3A15%3A%3A0.5904">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor">Video
                                                                                 Editor</span>
                                                                             <span
                                                                                 class="icon-verified-employer level-five">
                                                                                 <i class="fa-solid fa-circle-check icon-verified-employer-tooltip"
                                                                                     data-toggle="tooltip"
                                                                                     data-container="body"
                                                                                     data-html="true" title=""
                                                                                     data-placement="top"
                                                                                     data-original-title="
  <b>Nhà tuyển dụng</b><span> đã được xác thực:</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực email tên miền công ty</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực số điện thoại</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã được duyệt Giấy phép kinh doanh</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Tài khoản NTD được tạo tối thiểu 6 tháng</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Chưa có lịch sử bị báo cáo tin đăng</span><br>"></i></span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-co-phan-truyen-thong-medinet/10931.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="Công ty Cổ phần Truyền thông Medinet">Công
                                                                         ty Cổ phần Truyền thông Medinet</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         10 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Từ Liêm</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>33</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 1 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="566449" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor/566449.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Ade95dac5d83a4ddf918f2e0d282cdd80%3A%3A15%3A%3A0.5904"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="566449"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1310686" data-job-position="16" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::878ff2087e014b30a1f66955d478c107::16::0.5904"
                                                     id="featured-suggest-1310686">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor/1310686.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A878ff2087e014b30a1f66955d478c107%3A%3A16%3A%3A0.5904">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/the-nguyen-travel-jsc-tnt-group-6316c67645c03.jpg"
                                                                 class="w-100"
                                                                 alt="THE NGUYEN TRAVEL .,JSC - TNT GROUP"
                                                                 title="Video Editor">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor/1310686.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A878ff2087e014b30a1f66955d478c107%3A%3A16%3A%3A0.5904">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor">Video
                                                                                 Editor</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/the-nguyen-travel-jsc-tnt-group/117804.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="THE NGUYEN TRAVEL .,JSC - TNT GROUP">THE
                                                                         NGUYEN TRAVEL .,JSC - TNT GROUP</a>

                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         Trên 10 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Thanh Xuân</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>22</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 1 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1310686" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor/1310686.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A878ff2087e014b30a1f66955d478c107%3A%3A16%3A%3A0.5904"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1310686"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="856224" data-job-position="17" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::a68c73694688450c92ee96f77067b2f0::17::0.5904"
                                                     id="featured-suggest-856224">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor/856224.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aa68c73694688450c92ee96f77067b2f0%3A%3A17%3A%3A0.5904">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/fb38363db40db0adee43548a58da0075-62c3c3a87088a.jpg"
                                                                 class="w-100"
                                                                 alt="BỆNH VIỆN ĐA KHOA HỒNG NGỌC PHÚC TRƯỜNG MINH"
                                                                 title="Video Editor">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor/856224.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aa68c73694688450c92ee96f77067b2f0%3A%3A17%3A%3A0.5904">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor">Video
                                                                                 Editor</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/benh-vien-da-khoa-hong-ngoc-phuc-truong-minh/109388.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="BỆNH VIỆN ĐA KHOA HỒNG NGỌC PHÚC TRƯỜNG MINH">BỆNH
                                                                         VIỆN ĐA KHOA HỒNG NGỌC PHÚC TRƯỜNG MINH</a>

                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         13 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Nam Từ Liêm</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>15</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="856224" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor/856224.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3Aa68c73694688450c92ee96f77067b2f0%3A%3A17%3A%3A0.5904"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="856224"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="271534" data-job-position="18" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::2463629c305043e4bdedcb91483a4015::18::0.5890"
                                                     id="featured-suggest-271534">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor/271534.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A2463629c305043e4bdedcb91483a4015%3A%3A18%3A%3A0.5890">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/c3bdc859a308a9fa128c5bf8df6fd703-61c3f7d10f9fd.jpg"
                                                                 class="w-100"
                                                                 alt="CÔNG TY TNHH TRUYỀN THÔNG MEDIA POWER"
                                                                 title="Video Editor">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor/271534.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A2463629c305043e4bdedcb91483a4015%3A%3A18%3A%3A0.5890">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor">Video
                                                                                 Editor</span>
                                                                             <span
                                                                                 class="icon-verified-employer level-five">
                                                                                 <i class="fa-solid fa-circle-check icon-verified-employer-tooltip"
                                                                                     data-toggle="tooltip"
                                                                                     data-container="body"
                                                                                     data-html="true" title=""
                                                                                     data-placement="top"
                                                                                     data-original-title="
  <b>Nhà tuyển dụng</b><span> đã được xác thực:</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực email tên miền công ty</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực số điện thoại</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Đã được duyệt Giấy phép kinh doanh</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Tài khoản NTD được tạo tối thiểu 6 tháng</span><br>
  <span><i class='fa-solid fa-circle-check color-green'></i> Chưa có lịch sử bị báo cáo tin đăng</span><br>"></i></span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-truyen-thong-media-power/84960.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY TNHH TRUYỀN THÔNG MEDIA POWER">CÔNG
                                                                         TY TNHH TRUYỀN THÔNG MEDIA POWER</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         10 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Hai Bà Trưng</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>16</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 2 tuần trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="271534" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor/271534.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A2463629c305043e4bdedcb91483a4015%3A%3A18%3A%3A0.5890"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="271534"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="1403798" data-job-position="19" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::64546462626343de97bcb77328020f7a::19::0.5890"
                                                     id="featured-suggest-1403798">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor/1403798.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A64546462626343de97bcb77328020f7a%3A%3A19%3A%3A0.5890">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/rnHRsKk5FZmqmgATQEFETAr5FlyofwSW_1699871629____6d68aaee3f115385da691ce06a08d1de.png"
                                                                 class="w-100"
                                                                 alt="CÔNG TY TNHH THƯƠNG MẠI VÀ SẢN XUẤT AN THỊNH VIỆT"
                                                                 title="Video Editor">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor/1403798.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A64546462626343de97bcb77328020f7a%3A%3A19%3A%3A0.5890">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor">Video
                                                                                 Editor</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-thuong-mai-va-san-xuat-an-thinh-viet/154794.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="CÔNG TY TNHH THƯƠNG MẠI VÀ SẢN XUẤT AN THỊNH VIỆT">CÔNG
                                                                         TY TNHH THƯƠNG MẠI VÀ SẢN XUẤT AN THỊNH VIỆT</a>

                                                                     <div class="box-job-relevance-job">
                                                                         <i class="fa-solid fa-star"></i>
                                                                         <i style="display: none;"
                                                                             class="fa-regular fa-star"></i>
                                                                         <span class="box-job-relevance-job_text"></span>
                                                                     </div>
                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         10 - 15 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Đống Đa</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>26</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 3 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="1403798" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor/1403798.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A64546462626343de97bcb77328020f7a%3A%3A19%3A%3A0.5890"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="1403798"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="job-item-default
                                 job-ta
                                "
                                                     data-job-id="240631" data-job-position="20" data-u-sr-id=""
                                                     data-box="BoxJobSimilar"
                                                     data-jr-id="job-es-v1::1721378269337-dc5971::5cec6f2bb94b4f77a1a2e25ac22a0227::20::0.5890"
                                                     id="featured-suggest-240631">
                                                     <div class="avatar">
                                                         <a target="_blank"
                                                             href="https://www.topcv.vn/viec-lam/video-editor/240631.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A5cec6f2bb94b4f77a1a2e25ac22a0227%3A%3A20%3A%3A0.5890">
                                                             <img src="https://cdn-new.topcv.vn/unsafe/150x/https://static.topcv.vn/company_logos/nKFmdM5Qw0mbANlHDgL7pReCus9WQaR3_1712830639____0f74783143728af1d20bcbb9f8cad321.png"
                                                                 class="w-100" alt="XGame" title="Video Editor">
                                                         </a>
                                                     </div>
                                                     <div class="body">
                                                         <div class="body-content">
                                                             <div class="title-block">
                                                                 <div>
                                                                     <h3 class="title ">
                                                                         <div class="box-label-top">



                                                                         </div>

                                                                         <a target="_blank"
                                                                             href="https://www.topcv.vn/viec-lam/video-editor/240631.html?ta_source=SuggestSimilarJob_LinkDetail&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A5cec6f2bb94b4f77a1a2e25ac22a0227%3A%3A20%3A%3A0.5890">
                                                                             <span data-toggle="tooltip"
                                                                                 data-container="body"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Video Editor">Video
                                                                                 Editor</span>
                                                                         </a>
                                                                     </h3>
                                                                     <a rel="nofollow" class="company"
                                                                         href="https://www.topcv.vn/cong-ty/xgame/26084.html"
                                                                         data-toggle="tooltip" title=""
                                                                         data-placement="top" target="_blank"
                                                                         data-original-title="XGame">XGame</a>

                                                                 </div>


                                                                 <div class="box-right">
                                                                     <label class="title-salary">
                                                                         8 - 20 triệu
                                                                     </label>
                                                                 </div>
                                                             </div>



                                                         </div>


                                                         <div class="info">
                                                             <div class="label-content">
                                                                 <label class="address" data-toggle="tooltip"
                                                                     data-html="true" title=""
                                                                     data-placement="top"
                                                                     data-original-title="<p style='text-align: left'>Hà Nội: Cầu Giấy</p>">Hà
                                                                     Nội</label>
                                                                 <label class="time mobile-hidden">
                                                                     Còn
                                                                     <strong>26</strong>
                                                                     ngày để ứng tuyển
                                                                 </label>

                                                                 <label class="address" data-container="body">
                                                                     Cập nhật 4 ngày trước

                                                                 </label>
                                                             </div>
                                                             <div class="icon">
                                                                 <button data-job-id="240631" data-apply-url=""
                                                                     data-redirect-to="https://www.topcv.vn/viec-lam/video-editor/240631.html?ta_source=SuggestSimilarJob_ButtonApplyFormCard&amp;jr_i=job-es-v1%3A%3A1721378269337-dc5971%3A%3A5cec6f2bb94b4f77a1a2e25ac22a0227%3A%3A20%3A%3A0.5890"
                                                                     class="btn btn-apply-now">
                                                                     <span>Ứng tuyển</span>
                                                                 </button>
                                                                 <div class="box-save-job">
                                                                     <a data-id="240631"
                                                                         href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/ajax-similar-jobs?id=1400884', 'Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng')"
                                                                         class="save box-save-job-hover"
                                                                         data-toggle="tooltip" title=""
                                                                         data-original-title="Bạn phải đăng nhập để lưu tin"><i
                                                                             class="fa-regular fa-heart"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <script>
                                                 $(document).on('click touch', '.btn-apply-now', function(e) {

                                                     var link = $(this).attr('data-redirect-to');
                                                     var jobId = $(this).data('job-id');
                                                     let applyUrl = $(this).attr('data-apply-url');
                                                     if (applyUrl) {
                                                         window.setCookieBySecond('trigger_apply_now', true, 15);
                                                     } else {
                                                         localStorage.setItem('trigger_apply_now', true);
                                                     }
                                                     if (link) {
                                                         if (window.qgTracking && window.qg) {
                                                             window.qg('event', 'hit_to_apply_now', window.qgTracking);
                                                         }
                                                         if (window.fbq) {
                                                             window.fbq('event', 'hit_to_apply_now');
                                                         }
                                                         window.open(link, '_blank');
                                                         e.stopPropagation();
                                                         window.trackingTopCV.sendClickApplyButtonInListV2(jobId);
                                                     }
                                                 });
                                                 $(document).on('click', '.job-list-default a', function(e) {
                                                     e.stopPropagation();
                                                 });
                                             </script>


                                         </div>
                                     </div>
                                 </div>
                                 <div class="box-suggest-courses">
                                     <div id="suggestion-course">
                                         <div class="suggestion-course-container">
                                             <h2 class="suggestion-courses-title"><i
                                                     class="fa-solid fa-graduation-cap"></i>Khóa học dành cho bạn</h2>
                                             <div class="suggestion-courses-body">
                                                 <div>
                                                     <div>
                                                         <div
                                                             class="row suggestion-courses slick-initialized slick-slider">
                                                             <button class="slick-prev slick-arrow"
                                                                 aria-label="Previous" type="button"
                                                                 style="display: block;">Previous</button>
                                                             <div class="slick-list draggable">
                                                                 <div class="slick-track"
                                                                     style="opacity: 1; width: 3198px; transform: translate3d(-984px, 0px, 0px);">
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="-3" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/3.png"
                                                                                     alt="EXG01 - Tuyệt đỉnh Excel - Trở thành bậc thầy Excel trong 16 giờ"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="EXG01 - Tuyệt đỉnh Excel - Trở thành bậc thầy Excel trong 16 giờ"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/exg01-tuyet-dinh-excel-tro-thanh-bac-thay-excel-trong-16-gio?utm_source=topcv&amp;utm_medium=EXG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">EXG01 - Tuyệt đỉnh
                                                                                         Excel - Trở thành bậc thầy Excel
                                                                                         trong 16 giờ</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/exg01-tuyet-dinh-excel-tro-thanh-bac-thay-excel-trong-16-gio?utm_source=topcv&amp;utm_medium=EXG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="-2" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/6.png"
                                                                                     alt="WOG01 - Tuyệt đỉnh Microsoft Word - Chuyên gia soạn thảo văn bản"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="WOG01 - Tuyệt đỉnh Microsoft Word - Chuyên gia soạn thảo văn bản"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/wog01-tuyet-dinh-microsoft-word-chuyen-gia-soan-thao-van-ban?utm_source=topcv&amp;utm_medium=WOG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">WOG01 - Tuyệt đỉnh
                                                                                         Microsoft Word - Chuyên gia soạn
                                                                                         thảo văn bản</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/wog01-tuyet-dinh-microsoft-word-chuyen-gia-soan-thao-van-ban?utm_source=topcv&amp;utm_medium=WOG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="-1" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/4.png"
                                                                                     alt="PPG01 - Tuyệt đỉnh PowerPoint - Chinh phục mọi ánh nhìn trong 9 bước"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="PPG01 - Tuyệt đỉnh PowerPoint - Chinh phục mọi ánh nhìn trong 9 bước"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/ppg01-tuyet-dinh-powerpoint-truc-quan-hoa-moi-slide-trong-9-buoc?utm_source=topcv&amp;utm_medium=PPG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">PPG01 - Tuyệt đỉnh
                                                                                         PowerPoint - Chinh phục mọi ánh
                                                                                         nhìn trong 9 bước</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/ppg01-tuyet-dinh-powerpoint-truc-quan-hoa-moi-slide-trong-9-buoc?utm_source=topcv&amp;utm_medium=PPG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide"
                                                                         data-slick-index="0" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="/v3/images/funix-course/D10.jpg"
                                                                                     alt="Dễ dàng học 1 ngôn ngữ lập trình bất kỳ theo nhu cầu của bạn"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="Dễ dàng học 1 ngôn ngữ lập trình bất kỳ theo nhu cầu của bạn"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://funix.edu.vn/khoa-hoc-language-of-future-200615/?utm_source=TopCV"
                                                                                         tabindex="-1">Dễ dàng học 1 ngôn
                                                                                         ngữ lập trình bất kỳ theo nhu cầu
                                                                                         của bạn</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://funix.edu.vn/khoa-hoc-language-of-future-200615/?utm_source=TopCV"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-current slick-active"
                                                                         data-slick-index="1" aria-hidden="false"
                                                                         style="width: 246px;" tabindex="0">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/11.png"
                                                                                     alt="Google Data Studio cho người mới bắt đầu"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="Google Data Studio cho người mới bắt đầu"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/data-analysis/google-studio-course?utm_source=topcv&amp;utm_medium=GDSG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="0">Google Data Studio
                                                                                         cho người mới bắt đầu</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/data-analysis/google-studio-course?utm_source=topcv&amp;utm_medium=GDSG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="0">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-active"
                                                                         data-slick-index="2" aria-hidden="false"
                                                                         style="width: 246px;" tabindex="0">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/3.png"
                                                                                     alt="EXG01 - Tuyệt đỉnh Excel - Trở thành bậc thầy Excel trong 16 giờ"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="EXG01 - Tuyệt đỉnh Excel - Trở thành bậc thầy Excel trong 16 giờ"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/exg01-tuyet-dinh-excel-tro-thanh-bac-thay-excel-trong-16-gio?utm_source=topcv&amp;utm_medium=EXG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="0">EXG01 - Tuyệt đỉnh
                                                                                         Excel - Trở thành bậc thầy Excel
                                                                                         trong 16 giờ</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/exg01-tuyet-dinh-excel-tro-thanh-bac-thay-excel-trong-16-gio?utm_source=topcv&amp;utm_medium=EXG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="0">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-active"
                                                                         data-slick-index="3" aria-hidden="false"
                                                                         style="width: 246px;" tabindex="0">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/6.png"
                                                                                     alt="WOG01 - Tuyệt đỉnh Microsoft Word - Chuyên gia soạn thảo văn bản"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="WOG01 - Tuyệt đỉnh Microsoft Word - Chuyên gia soạn thảo văn bản"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/wog01-tuyet-dinh-microsoft-word-chuyen-gia-soan-thao-van-ban?utm_source=topcv&amp;utm_medium=WOG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="0">WOG01 - Tuyệt đỉnh
                                                                                         Microsoft Word - Chuyên gia soạn
                                                                                         thảo văn bản</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/wog01-tuyet-dinh-microsoft-word-chuyen-gia-soan-thao-van-ban?utm_source=topcv&amp;utm_medium=WOG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="0">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide"
                                                                         data-slick-index="4" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/4.png"
                                                                                     alt="PPG01 - Tuyệt đỉnh PowerPoint - Chinh phục mọi ánh nhìn trong 9 bước"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="PPG01 - Tuyệt đỉnh PowerPoint - Chinh phục mọi ánh nhìn trong 9 bước"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/ppg01-tuyet-dinh-powerpoint-truc-quan-hoa-moi-slide-trong-9-buoc?utm_source=topcv&amp;utm_medium=PPG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">PPG01 - Tuyệt đỉnh
                                                                                         PowerPoint - Chinh phục mọi ánh
                                                                                         nhìn trong 9 bước</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/ppg01-tuyet-dinh-powerpoint-truc-quan-hoa-moi-slide-trong-9-buoc?utm_source=topcv&amp;utm_medium=PPG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="5" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="/v3/images/funix-course/D10.jpg"
                                                                                     alt="Dễ dàng học 1 ngôn ngữ lập trình bất kỳ theo nhu cầu của bạn"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="Dễ dàng học 1 ngôn ngữ lập trình bất kỳ theo nhu cầu của bạn"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://funix.edu.vn/khoa-hoc-language-of-future-200615/?utm_source=TopCV"
                                                                                         tabindex="-1">Dễ dàng học 1 ngôn
                                                                                         ngữ lập trình bất kỳ theo nhu cầu
                                                                                         của bạn</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://funix.edu.vn/khoa-hoc-language-of-future-200615/?utm_source=TopCV"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="6" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/11.png"
                                                                                     alt="Google Data Studio cho người mới bắt đầu"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="Google Data Studio cho người mới bắt đầu"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/data-analysis/google-studio-course?utm_source=topcv&amp;utm_medium=GDSG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">Google Data Studio
                                                                                         cho người mới bắt đầu</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/data-analysis/google-studio-course?utm_source=topcv&amp;utm_medium=GDSG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="7" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/3.png"
                                                                                     alt="EXG01 - Tuyệt đỉnh Excel - Trở thành bậc thầy Excel trong 16 giờ"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="EXG01 - Tuyệt đỉnh Excel - Trở thành bậc thầy Excel trong 16 giờ"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/exg01-tuyet-dinh-excel-tro-thanh-bac-thay-excel-trong-16-gio?utm_source=topcv&amp;utm_medium=EXG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">EXG01 - Tuyệt đỉnh
                                                                                         Excel - Trở thành bậc thầy Excel
                                                                                         trong 16 giờ</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/exg01-tuyet-dinh-excel-tro-thanh-bac-thay-excel-trong-16-gio?utm_source=topcv&amp;utm_medium=EXG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="8" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/6.png"
                                                                                     alt="WOG01 - Tuyệt đỉnh Microsoft Word - Chuyên gia soạn thảo văn bản"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="WOG01 - Tuyệt đỉnh Microsoft Word - Chuyên gia soạn thảo văn bản"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/wog01-tuyet-dinh-microsoft-word-chuyen-gia-soan-thao-van-ban?utm_source=topcv&amp;utm_medium=WOG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">WOG01 - Tuyệt đỉnh
                                                                                         Microsoft Word - Chuyên gia soạn
                                                                                         thảo văn bản</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/wog01-tuyet-dinh-microsoft-word-chuyen-gia-soan-thao-van-ban?utm_source=topcv&amp;utm_medium=WOG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-md-3 col-xs-12 slick-slide slick-cloned"
                                                                         data-slick-index="9" aria-hidden="true"
                                                                         style="width: 246px;" tabindex="-1">
                                                                         <div class="course-item">
                                                                             <div class="course-thumbnail"><img
                                                                                     src="https://static.topcv.vn/partner/gitiho/courses/4.png"
                                                                                     alt="PPG01 - Tuyệt đỉnh PowerPoint - Chinh phục mọi ánh nhìn trong 9 bước"
                                                                                     class="img-responsive "></div>
                                                                             <div class="course-body">
                                                                                 <h3 class="course-title"><a
                                                                                         data-toggle="tooltip"
                                                                                         title="PPG01 - Tuyệt đỉnh PowerPoint - Chinh phục mọi ánh nhìn trong 9 bước"
                                                                                         data-placement="top"
                                                                                         data-container="body"
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/ppg01-tuyet-dinh-powerpoint-truc-quan-hoa-moi-slide-trong-9-buoc?utm_source=topcv&amp;utm_medium=PPG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         tabindex="-1">PPG01 - Tuyệt đỉnh
                                                                                         PowerPoint - Chinh phục mọi ánh
                                                                                         nhìn trong 9 bước</a></h3>
                                                                                 <div class="text-right"><a
                                                                                         target="_blank"
                                                                                         href="https://gitiho.com/khoa-hoc/tin-hoc-van-phong/ppg01-tuyet-dinh-powerpoint-truc-quan-hoa-moi-slide-trong-9-buoc?utm_source=topcv&amp;utm_medium=PPG01_topcv_Referral_01_01_01&amp;utm_campaign=Trangchu&amp;utm_content=1"
                                                                                         class="btn btn-default btn-sm"
                                                                                         tabindex="-1">Tìm hiểu ngay</a>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div><button class="slick-next slick-arrow"
                                                                 aria-label="Next" type="button"
                                                                 style="display: block;">Next</button>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="job-detail__body-right">
                         <div class="job-detail__box--right job-detail__company">
                             <div class="job-detail__company--information">
                                 <div class="job-detail__company--information-item company-name">
                                     <a rel="nofollow" class="company-logo" href="{{ $jobPosting->website }}"
                                         target="_blank" data-toggle="tooltip" title="" data-placement="top"
                                         data-original-title="CÔNG TY TNHH EGMEDIA">
                                         <img src="{{ $jobPosting->logo ? asset('storage/' . $jobPosting->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                             alt="Avatar" style="width: 60px" class="img-responsive">
                                     </a>
                                     <h2 class="company-name-label">
                                         <a rel="nofollow" class="name" href="{{ $jobPosting->website }}"
                                             target="_blank" data-toggle="tooltip" title=""
                                             data-placement="top"
                                             data-original-title="CÔNG TY TNHH EGMEDIA">{{ $jobPosting->company_name }}</a>
                                         <div class="company-subdetail-label">
                                         </div>
                                     </h2>
                                 </div>

                                 <div class="job-detail__company--information-item company-address">
                                     <div class="company-title">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
                                             <path
                                                 d="M13.7467 5.63334C13.0467 2.55334 10.36 1.16667 8 1.16667C8 1.16667 8 1.16667 7.99334 1.16667C5.64 1.16667 2.94667 2.54667 2.24667 5.62667C1.46667 9.06667 3.57334 11.98 5.48 13.8133C6.18667 14.4933 7.09334 14.8333 8 14.8333C8.90667 14.8333 9.81334 14.4933 10.5133 13.8133C12.42 11.98 14.5267 9.07334 13.7467 5.63334ZM8 8.97334C6.84 8.97334 5.9 8.03334 5.9 6.87334C5.9 5.71334 6.84 4.77334 8 4.77334C9.16 4.77334 10.1 5.71334 10.1 6.87334C10.1 8.03334 9.16 8.97334 8 8.97334Z"
                                                 fill="#7F878F"></path>
                                         </svg>
                                         Địa điểm:
                                     </div>
                                     <div class="company-value" data-toggle="tooltip" title=""
                                         data-placement="top"
                                         data-original-title="Tầng 6 - Số 86 đường Mễ Trì Hạ, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội">
                                         {{ $jobPosting->location }}
                                     </div>
                                 </div>
                             </div>
                             <div class="job-detail__company--link">
                                 <a rel="nofollow" href="{{ $jobPosting->websit }}" target="_blank">Xem trang công
                                     ty</a>
                                 <i class="fa-solid fa-arrow-up-right-from-square"></i>
                             </div>
                         </div>
                         <div
                             class="job-detail__box--right job-detail__body-right--item job-detail__body-right--box-general">
                             <h2 class="box-title">Thông tin chung</h2>
                             <div class="box-general-content">
                                 <div class="button-view-job-fitness" id="button-view-job-fitness">
                                     <div class="button-view-job-fitness__header">
                                         <div class="button-view-job-fitness__header--title">
                                             <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M5.71429 1.71429C5.71429 0.767857 6.48214 0 7.42857 0H8.57143C9.51786 0 10.2857 0.767857 10.2857 1.71429V14.2857C10.2857 15.2321 9.51786 16 8.57143 16H7.42857C6.48214 16 5.71429 15.2321 5.71429 14.2857V1.71429ZM0 8.57143C0 7.625 0.767857 6.85714 1.71429 6.85714H2.85714C3.80357 6.85714 4.57143 7.625 4.57143 8.57143V14.2857C4.57143 15.2321 3.80357 16 2.85714 16H1.71429C0.767857 16 0 15.2321 0 14.2857V8.57143ZM13.1429 2.28571H14.2857C15.2321 2.28571 16 3.05357 16 4V14.2857C16 15.2321 15.2321 16 14.2857 16H13.1429C12.1964 16 11.4286 15.2321 11.4286 14.2857V4C11.4286 3.05357 12.1964 2.28571 13.1429 2.28571Z"
                                                     fill="#00B14F"></path>
                                             </svg>
                                             Phân tích mức độ phù hợp
                                         </div>
                                         <div class="button-view-job-fitness__header--badge">
                                             <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M5.00054 9.99999C4.86887 10.0007 4.74014 9.96113 4.63154 9.88668C4.52294 9.81224 4.43965 9.70642 4.39279 9.58337L3.35541 6.88575C3.3344 6.83139 3.30226 6.78202 3.26105 6.74082C3.21984 6.69961 3.17047 6.66747 3.11611 6.64645L0.417716 5.60829C0.294798 5.56111 0.189074 5.47777 0.114498 5.36927C0.0399225 5.26077 0 5.1322 0 5.00054C0 4.86888 0.0399225 4.74032 0.114498 4.63182C0.189074 4.52331 0.294798 4.43997 0.417716 4.3928L3.11533 3.35541C3.16969 3.3344 3.21906 3.30226 3.26027 3.26105C3.30148 3.21984 3.33362 3.17048 3.35463 3.11612L4.39279 0.417716C4.43997 0.294798 4.52331 0.189074 4.63181 0.114498C4.74031 0.0399224 4.86888 0 5.00054 0C5.1322 0 5.26076 0.0399224 5.36927 0.114498C5.47777 0.189074 5.56111 0.294798 5.60828 0.417716L6.64567 3.11533C6.66668 3.16969 6.69882 3.21906 6.74003 3.26027C6.78124 3.30148 6.8306 3.33362 6.88496 3.35463L9.56695 4.38655C9.69488 4.43396 9.80508 4.51965 9.88256 4.63194C9.96005 4.74422 10.001 4.87766 9.99998 5.01408C9.99799 5.14345 9.95722 5.26925 9.88295 5.37518C9.80867 5.48112 9.7043 5.56233 9.58336 5.60829L6.88574 6.64567C6.83138 6.66668 6.78202 6.69883 6.74081 6.74003C6.6996 6.78124 6.66746 6.83061 6.64645 6.88497L5.60828 9.58337C5.56143 9.70642 5.47813 9.81224 5.36953 9.88668C5.26094 9.96113 5.1322 10.0007 5.00054 9.99999Z"
                                                     fill="#966D05"></path>
                                             </svg>
                                             New
                                         </div>
                                     </div>
                                     <div class="button-view-job-fitness__button">
                                         Xem ngay
                                     </div>
                                 </div>
                                 <div class="box-general-group">
                                     <div class="box-general-group-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                             <path
                                                 d="M17.81 5.49V6.23L14.27 4.18C12.93 3.41 11.06 3.41 9.73 4.18L6.19 6.24V5.49C6.19 3.24 7.42 2 9.67 2H14.33C16.58 2 17.81 3.24 17.81 5.49Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M17.84 7.96999L17.7 7.89999L16.34 7.11999L13.52 5.48999C12.66 4.98999 11.34 4.98999 10.48 5.48999L7.66 7.10999L6.3 7.90999L6.12 7.99999C4.37 9.17999 4.25 9.39999 4.25 11.29V15.81C4.25 17.7 4.37 17.92 6.16 19.13L10.48 21.62C10.91 21.88 11.45 21.99 12 21.99C12.54 21.99 13.09 21.87 13.52 21.62L17.88 19.1C19.64 17.92 19.75 17.71 19.75 15.81V11.29C19.75 9.39999 19.63 9.17999 17.84 7.96999ZM14.79 13.5L14.18 14.25C14.08 14.36 14.01 14.57 14.02 14.72L14.08 15.68C14.12 16.27 13.7 16.57 13.15 16.36L12.26 16C12.12 15.95 11.89 15.95 11.75 16L10.86 16.35C10.31 16.57 9.89 16.26 9.93 15.67L9.99 14.71C10 14.56 9.93 14.35 9.83 14.24L9.21 13.5C8.83 13.05 9 12.55 9.57 12.4L10.5 12.16C10.65 12.12 10.82 11.98 10.9 11.86L11.42 11.06C11.74 10.56 12.25 10.56 12.58 11.06L13.1 11.86C13.18 11.99 13.36 12.12 13.5 12.16L14.43 12.4C15 12.55 15.17 13.05 14.79 13.5Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="box-general-group-info">
                                         <div class="box-general-group-info-title">Cấp bậc</div>
                                         <div class="box-general-group-info-value">{{ $jobPosting->rank }}</div>
                                     </div>
                                 </div>
                                 <div class="box-general-group">
                                     <div class="box-general-group-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                             <path
                                                 d="M17.39 15.67L13.35 12H10.64L6.59998 15.67C5.46998 16.69 5.09998 18.26 5.64998 19.68C6.19998 21.09 7.53998 22 9.04998 22H14.94C16.46 22 17.79 21.09 18.34 19.68C18.89 18.26 18.52 16.69 17.39 15.67ZM13.82 18.14H10.18C9.79998 18.14 9.49998 17.83 9.49998 17.46C9.49998 17.09 9.80998 16.78 10.18 16.78H13.82C14.2 16.78 14.5 17.09 14.5 17.46C14.5 17.83 14.19 18.14 13.82 18.14Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M18.35 4.32C17.8 2.91 16.46 2 14.95 2H9.04998C7.53998 2 6.19998 2.91 5.64998 4.32C5.10998 5.74 5.47998 7.31 6.60998 8.33L10.65 12H13.36L17.4 8.33C18.52 7.31 18.89 5.74 18.35 4.32ZM13.82 7.23H10.18C9.79998 7.23 9.49998 6.92 9.49998 6.55C9.49998 6.18 9.80998 5.87 10.18 5.87H13.82C14.2 5.87 14.5 6.18 14.5 6.55C14.5 6.92 14.19 7.23 13.82 7.23Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="box-general-group-info">
                                         <div class="box-general-group-info-title">Kinh nghiệm</div>
                                         <div class="box-general-group-info-value">{{ $jobPosting->experience }}</div>
                                     </div>
                                 </div>
                                 <div class="box-general-group">
                                     <div class="box-general-group-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                             <path
                                                 d="M9 2C6.38 2 4.25 4.13 4.25 6.75C4.25 9.32 6.26 11.4 8.88 11.49C8.96 11.48 9.04 11.48 9.1 11.49C9.12 11.49 9.13 11.49 9.15 11.49C9.16 11.49 9.16 11.49 9.17 11.49C11.73 11.4 13.74 9.32 13.75 6.75C13.75 4.13 11.62 2 9 2Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M14.08 14.15C11.29 12.29 6.74002 12.29 3.93002 14.15C2.66002 15 1.96002 16.15 1.96002 17.38C1.96002 18.61 2.66002 19.75 3.92002 20.59C5.32002 21.53 7.16002 22 9.00002 22C10.84 22 12.68 21.53 14.08 20.59C15.34 19.74 16.04 18.6 16.04 17.36C16.03 16.13 15.34 14.99 14.08 14.15Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M19.99 7.34001C20.15 9.28001 18.77 10.98 16.86 11.21C16.85 11.21 16.85 11.21 16.84 11.21H16.81C16.75 11.21 16.69 11.21 16.64 11.23C15.67 11.28 14.78 10.97 14.11 10.4C15.14 9.48001 15.73 8.10001 15.61 6.60001C15.54 5.79001 15.26 5.05001 14.84 4.42001C15.22 4.23001 15.66 4.11001 16.11 4.07001C18.07 3.90001 19.82 5.36001 19.99 7.34001Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M21.99 16.59C21.91 17.56 21.29 18.4 20.25 18.97C19.25 19.52 17.99 19.78 16.74 19.75C17.46 19.1 17.88 18.29 17.96 17.43C18.06 16.19 17.47 15 16.29 14.05C15.62 13.52 14.84 13.1 13.99 12.79C16.2 12.15 18.98 12.58 20.69 13.96C21.61 14.7 22.08 15.63 21.99 16.59Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="box-general-group-info">
                                         <div class="box-general-group-info-title">Số lượng tuyển</div>
                                         <div class="box-general-group-info-value">{{ $jobPosting->number_of_recruits }}
                                         </div>
                                     </div>
                                 </div>
                                 <div class="box-general-group">
                                     <div class="box-general-group-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                             <path
                                                 d="M21.09 6.98002C20.24 6.04002 18.82 5.57002 16.76 5.57002H16.52V5.53002C16.52 3.85002 16.52 1.77002 12.76 1.77002H11.24C7.47998 1.77002 7.47998 3.86002 7.47998 5.53002V5.58002H7.23998C5.16998 5.58002 3.75998 6.05002 2.90998 6.99002C1.91998 8.09002 1.94998 9.57002 2.04998 10.58L2.05998 10.65L2.13743 11.4633C2.1517 11.6131 2.23236 11.7484 2.35825 11.8307C2.59806 11.9877 2.9994 12.2464 3.23998 12.38C3.37998 12.47 3.52998 12.55 3.67998 12.63C5.38998 13.57 7.26998 14.2 9.17998 14.51C9.26998 15.45 9.67998 16.55 11.87 16.55C14.06 16.55 14.49 15.46 14.56 14.49C16.6 14.16 18.57 13.45 20.35 12.41C20.41 12.38 20.45 12.35 20.5 12.32C20.8967 12.0958 21.3083 11.8195 21.6834 11.5489C21.7965 11.4673 21.8687 11.3413 21.8841 11.2028L21.9 11.06L21.95 10.59C21.96 10.53 21.96 10.48 21.97 10.41C22.05 9.40002 22.03 8.02002 21.09 6.98002ZM13.09 13.83C13.09 14.89 13.09 15.05 11.86 15.05C10.63 15.05 10.63 14.86 10.63 13.84V12.58H13.09V13.83ZM8.90998 5.57002V5.53002C8.90998 3.83002 8.90998 3.20002 11.24 3.20002H12.76C15.09 3.20002 15.09 3.84002 15.09 5.53002V5.58002H8.90998V5.57002Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M20.8735 13.7342C21.2271 13.5659 21.6344 13.8462 21.599 14.2362L21.24 18.19C21.03 20.19 20.21 22.23 15.81 22.23H8.19003C3.79003 22.23 2.97003 20.19 2.76003 18.2L2.41932 14.4522C2.38427 14.0667 2.78223 13.7868 3.13487 13.9463C4.27428 14.4618 6.37742 15.3764 7.6766 15.7167C7.8409 15.7597 7.9738 15.8773 8.04574 16.0312C8.65271 17.3293 9.96914 18.02 11.87 18.02C13.7521 18.02 15.0852 17.3027 15.6942 16.0014C15.7662 15.8474 15.8992 15.7299 16.0636 15.6866C17.4432 15.3236 19.6818 14.3013 20.8735 13.7342Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="box-general-group-info">
                                         <div class="box-general-group-info-title">Hình thức làm việc</div>
                                         <div class="box-general-group-info-value">{{ $jobPosting->type }}</div>
                                     </div>
                                 </div>
                                 <div class="box-general-group">
                                     <div class="box-general-group-icon">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                             <path
                                                 d="M12 2C9.38 2 7.25 4.13 7.25 6.75C7.25 9.32 9.26 11.4 11.88 11.49C11.96 11.48 12.04 11.48 12.1 11.49C12.12 11.49 12.13 11.49 12.15 11.49C12.16 11.49 12.16 11.49 12.17 11.49C14.73 11.4 16.74 9.32 16.75 6.75C16.75 4.13 14.62 2 12 2Z"
                                                 fill="white"></path>
                                             <path
                                                 d="M17.08 14.15C14.29 12.29 9.74002 12.29 6.93002 14.15C5.66002 15 4.96002 16.15 4.96002 17.38C4.96002 18.61 5.66002 19.75 6.92002 20.59C8.32002 21.53 10.16 22 12 22C13.84 22 15.68 21.53 17.08 20.59C18.34 19.74 19.04 18.6 19.04 17.36C19.03 16.13 18.34 14.99 17.08 14.15Z"
                                                 fill="white"></path>
                                         </svg>
                                     </div>
                                     <div class="box-general-group-info">
                                         <div class="box-general-group-info-title">Giới tính</div>
                                         <div class="box-general-group-info-value">{{ $jobPosting->sex }}</div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div
                             class="job-detail__box--right job-detail__body-right--item job-detail__body-right--box-category">
                             <div class="box-category">
                                 <div class="box-title">Ngành nghề</div>
                                 <div class="box-category-tags">
                                     {{ $jobPosting->tags }}
                                 </div>
                             </div>

                             <div class="box-category collapsed">
                                 <div class="box-title">Kỹ năng nên có</div>
                                 <div class="box-category-tags">
                                     <a href="javascript:void(0)" class="box-category-tag"
                                         target="_blank">{{ $jobPosting->skills_required }}</a>
                                 </div>
                             </div>
                             <div class="box-category">
                                 <div class="box-title">Khu vực</div>
                                 <div class="box-category-tags">
                                     <span><a class="box-category-tag"
                                             href="https://www.topcv.vn/tim-viec-lam-video-editor-tai-ha-noi-kl1"
                                             target="_blank"
                                             title="Tìm việc làm video editor tại Hà Nội">{{ $jobPosting->area }}</a></span>
                                 </div>
                             </div>
                         </div>
                         <div id="suitable-job-box" style="width: 100%; display: none;"></div>
                         <div class="box-report-job">
                             <h3>
                                 <i class="fa-solid fa-circle-question"></i>Bí kíp Tìm việc an toàn
                             </h3>
                             <p>Dưới đây là những dấu hiệu của các tổ chức, cá nhân tuyển dụng không minh bạch:</p>
                             <section class="common-signal lazy entered" data-lazy-function="initCarouselReportCaptions"
                                 data-ll-status="entered">
                                 <h4 class="common-signal__title">Dấu hiệu phổ biến:</h4>
                                 <div id="carouselReportCaptions" class="carousel slide" data-bs-ride="carousel">
                                     <div class="carousel-inner">
                                         <div class="carousel-item">
                                             <div class="slider__item">
                                                 <img class="slider__image entered loaded"
                                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/1.png"
                                                     alt="Item 1"
                                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/1.png"
                                                     data-ll-status="loaded">
                                                 <p class="slider__caption">
                                                     Nội dung mô tả công việc
                                                     sơ sài, không đồng nhất với công việc thực tế
                                                 </p>
                                             </div>
                                         </div>
                                         <div class="carousel-item">
                                             <div class="slider__item">
                                                 <img class="slider__image entered loaded"
                                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/2.png"
                                                     alt="Item 2"
                                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/2.png"
                                                     data-ll-status="loaded">
                                                 <p class="slider__caption">Hứa hẹn "việc nhẹ lương cao", không cần bỏ
                                                     nhiều công sức dễ dàng lấy
                                                     tiền "khủng"</p>
                                             </div>
                                         </div>
                                         <div class="carousel-item">
                                             <div class="slider__item">
                                                 <img class="slider__image entered loaded"
                                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/3.png"
                                                     alt="Item 3"
                                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/3.png"
                                                     data-ll-status="loaded">
                                                 <p class="slider__caption">Yêu cầu tải app, nạp tiền, làm nhiệm vụ </p>
                                             </div>
                                         </div>
                                         <div class="carousel-item active">
                                             <div class="slider__item">
                                                 <img class="slider__image entered loaded"
                                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/4.png"
                                                     alt="Item 4"
                                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/4.png"
                                                     data-ll-status="loaded">
                                                 <p class="slider__caption">Yêu cầu nộp phí phỏng vấn, phí giữ chỗ...</p>
                                             </div>
                                         </div>
                                         <div class="carousel-item">
                                             <div class="slider__item">
                                                 <img class="slider__image"
                                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/5.png"
                                                     alt="Item 4"
                                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/5.png">
                                                 <p class="slider__caption">Yêu cầu ký kết giấy tờ không rõ ràng hoặc nộp
                                                     giấy tờ gốc</p>
                                             </div>
                                         </div>
                                         <div class="carousel-item">
                                             <div class="slider__item">
                                                 <img class="slider__image entered loaded"
                                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/6.png?v=1.0.0"
                                                     alt="Item 4"
                                                     src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/report/6.png?v=1.0.0"
                                                     data-ll-status="loaded">
                                                 <p class="slider__caption">Địa điểm phỏng vấn
                                                     bất bình thường</p>
                                             </div>
                                         </div>
                                     </div>
                                     <button class="carousel-control-prev" type="button"
                                         data-bs-target="#carouselReportCaptions" data-bs-slide="prev">
                                         <i class="fa-solid fa-chevron-left"></i>
                                     </button>
                                     <button class="carousel-control-next" type="button"
                                         data-bs-target="#carouselReportCaptions" data-bs-slide="next">
                                         <i class="fa-solid fa-chevron-right"></i>
                                     </button>
                                     <div class="carousel-indicators">
                                         <button type="button" data-bs-target="#carouselReportCaptions"
                                             data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                                         <button type="button" data-bs-target="#carouselReportCaptions"
                                             data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                                         <button type="button" data-bs-target="#carouselReportCaptions"
                                             data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                                         <button type="button" data-bs-target="#carouselReportCaptions"
                                             data-bs-slide-to="3" aria-label="Slide 4" class="active"
                                             aria-current="true"></button>
                                         <button type="button" data-bs-target="#carouselReportCaptions"
                                             data-bs-slide-to="4" aria-label="Slide 5" class=""></button>
                                         <button type="button" data-bs-target="#carouselReportCaptions"
                                             data-bs-slide-to="5" aria-label="Slide 6" class=""></button>
                                     </div>
                                 </div>
                             </section>
                             <section class="common-signal">
                                 <h4 class="common-signal__title">
                                     Cần làm gì khi gặp việc làm, công ty không minh bạch:
                                 </h4>
                                 <div class="common-signal__content">
                                     <ul>
                                         <li>
                                             Kiểm tra thông tin về công ty, việc làm trước khi ứng tuyển
                                         </li>
                                         <li>
                                             Báo cáo tin tuyển dụng với TopCV thông qua nút <strong>"Báo cáo tin tuyển
                                                 dụng"</strong> để được hỗ
                                             trợ và giúp các
                                             ứng viên khác tránh
                                             được rủi ro </li>
                                         <li>
                                             Hoặc liên hệ với TopCV thông qua kênh hỗ trợ ứng viên của TopCV:<br>
                                             Email: <a class="text-highlight"
                                                 href="mailto:hotro@topcv.vn">hotro@topcv.vn</a><br>
                                             Hotline: <a class="text-highlight" href="tel:02466805588">(024) 6680
                                                 5588</a><br>
                                         </li>
                                     </ul>
                                 </div>
                             </section>
                             <a class="box-report-job__action"
                                 href="javascript:showLoginPopup('https://www.topcv.vn/viec-lam/nhan-vien-video-editor-youtube-linh-vuc-hoat-hinh-ha-noi/1400884.html?report-form=1', 'Đăng nhập hoặc Đăng ký để phản ánh tin tuyển dụng này!')">Báo
                                 cáo tin tuyển dụng</a>
                             <p style="margin-bottom: 0;">Tìm hiểu thêm kinh nghiệm phòng tránh lừa đảo <a
                                     class="text-highlight" target="__blank"
                                     href="https://blog.topcv.vn/huong-dan-tim-viec-an-toan-trong-ky-nguyen-so/">tại
                                     đây</a></p>
                         </div>
                         <link rel="stylesheet"
                             href="https://static.topcv.vn/v4/css/components/sidebar/box-maybe-interested.7d6ada53ff6b5096K.css">
                         <div class="box-maybe-interested">
                             <h3 class="box-maybe-interested__title">Có thể bạn quan tâm</h3>
                             <div class="box-maybe-interested__company">
                                 <div class="box-maybe-interested__company--image">
                                     <a rel="nofollow"
                                         href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html">
                                         <img src="https://cdn-new.topcv.vn/unsafe/500x/https://static.topcv.vn/company_covers/gWUh7odIskHo6RtZ1xT7.jpg"
                                             data-src="https://cdn-new.topcv.vn/unsafe/500x/https://static.topcv.vn/company_covers/gWUh7odIskHo6RtZ1xT7.jpg"
                                             alt="Công ty Cho thuê tài chính TNHH MTV Quốc tế Chailease"
                                             class="spotlight-cover">
                                     </a>
                                 </div>
                                 <div class="box-maybe-interested__company--content company">
                                     <div class="company__info">
                                         <div class="company__info--logo">
                                             <a rel="nofollow"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html">
                                                 <img src="https://static.topcv.vn/company_logos/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease-5dc39f3d07275.jpg"
                                                     alt="">
                                             </a>
                                         </div>
                                         <div class="company__info--name">
                                             <a rel="nofollow"
                                                 href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html">Công
                                                 ty Cho thuê tài chính TNHH MTV Quốc tế Chailease</a>
                                             <img src="https://static.topcv.vn/v4/image/maybe-interested/spotlight.png?v=1.2"
                                                 alt="">
                                         </div>
                                     </div>
                                     <div class="company__job">
                                         <div class="job job-ta" data-job-id="1340983" data-box="SpotlightCompany">
                                             <a href="https://www.topcv.vn/viec-lam/credit-officer/1340983.html?ta_source=SpotlightCompanyInJobDetail_LinkDetail"
                                                 target="_blank" data-toggle="tooltip" title=""
                                                 data-placement="top" class="job__name"
                                                 data-original-title="Credit Officer">Credit Officer</a>
                                             <div class="job__info">
                                                 <div class="job__info--salary">
                                                     <i class="fa-solid fa-circle-dollar"></i>
                                                     <span>Thoả thuận</span>
                                                 </div>
                                                 <div class="job__info--address">
                                                     <i class="fa-solid fa-location-dot"></i>
                                                     <span data-toggle="tooltip" data-html="true" title=""
                                                         data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 1</p>">
                                                         Hồ Chí Minh
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="job job-ta" data-job-id="1357786" data-box="SpotlightCompany">
                                             <a href="https://www.topcv.vn/viec-lam/brand-marketing/1357786.html?ta_source=SpotlightCompanyInJobDetail_LinkDetail"
                                                 target="_blank" data-toggle="tooltip" title=""
                                                 data-placement="top" class="job__name"
                                                 data-original-title="Brand Marketing">Brand Marketing</a>
                                             <div class="job__info">
                                                 <div class="job__info--salary">
                                                     <i class="fa-solid fa-circle-dollar"></i>
                                                     <span>Thoả thuận</span>
                                                 </div>
                                                 <div class="job__info--address">
                                                     <i class="fa-solid fa-location-dot"></i>
                                                     <span data-toggle="tooltip" data-html="true" title=""
                                                         data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 1</p>">
                                                         Hồ Chí Minh
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="job job-ta" data-job-id="1213268" data-box="SpotlightCompany">
                                             <a href="https://www.topcv.vn/viec-lam/thuc-tap-sinh-quan-he-khach-hang-doanh-nghiep/1213268.html?ta_source=SpotlightCompanyInJobDetail_LinkDetail"
                                                 target="_blank" data-toggle="tooltip" title=""
                                                 data-placement="top" class="job__name"
                                                 data-original-title="Thực Tập Sinh Quan Hệ Khách Hàng Doanh Nghiệp">Thực
                                                 Tập Sinh Quan Hệ Khách Hàng Doanh Nghiệp</a>
                                             <div class="job__info">
                                                 <div class="job__info--salary">
                                                     <i class="fa-solid fa-circle-dollar"></i>
                                                     <span>3 - 3.5 triệu</span>
                                                 </div>
                                                 <div class="job__info--address">
                                                     <i class="fa-solid fa-location-dot"></i>
                                                     <span data-toggle="tooltip" data-html="true" title=""
                                                         data-placement="top"
                                                         data-original-title="<p style='text-align: left'>Hồ Chí Minh: Quận 1<br/>Bình Dương: Thủ Dầu Một</p>">
                                                         Hồ Chí Minh, Bình Dương
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="company__link">
                                         <a rel="nofollow"
                                             href="https://www.topcv.vn/cong-ty/cong-ty-cho-thue-tai-chinh-tnhh-mtv-quoc-te-chailease/27583.html"
                                             target="_blank">Tìm hiểu ngay</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="box-easy-apply job-detail__body-right--item">
                             <div class="image">
                                 <a target="_blank" href="https://www.topcv.vn/mau-cv">
                                     <img data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/easy-apply.png"
                                         alt="Apply việc gì cũng dễ" class="w-100 entered loaded"
                                         data-ll-status="loaded"
                                         src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/easy-apply.png">
                                 </a>
                             </div>
                         </div>
                         <div class="box-easy-content job-detail__box--right job-detail__body-right--item">
                             <div class="box-job-similar__note">
                                 Vị trí Nhân Viên <a href="https://www.topcv.vn/tim-viec-lam-video-editor"
                                     target="_blank">Video Editor</a> Youtube Lĩnh Vực Hoạt Hình [Hà Nội]
                                 tuyển dụng bởi công ty <a rel="nofollow"
                                     href="https://www.topcv.vn/cong-ty/cong-ty-tnhh-egmedia/185340.html"
                                     target="_blank">CÔNG TY TNHH EGMEDIA</a>
                                 tại Hà Nội, Thanh Trì với mức lương 8 - 14 triệu yêu cầu hình thức làm
                                 việc Toàn thời gian. Bạn có thể tham khảo thêm các vị trí tuyển dụng <a
                                     href="https://www.topcv.vn/tim-viec-lam-video-editor-tai-ha-noi-kl1"
                                     target="_blank">Video Editor
                                     tại Hà Nội, Thanh Trì</a> khác trên kênh tuyển dụng việc làm topcv.
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="box-white mt-40" id="seo-box-wrapper">
             <div class="container">
                 <div class="content-seo-box">
                     <div id="seo-box">
                         <p><strong>Cơ hội ứng tuyển việc làm với đãi ngộ hấp dẫn tại các công ty hàng đầu</strong> </p>
                         <p>Trước sự phát triển vượt bậc của nền kinh tế, rất nhiều ngành nghề trở nên khan hiếm nhân lực
                             hoặc thiếu nhân lực giỏi. Vì vậy, hầu hết các trường Đại học đều liên kết với các công ty,
                             doanh nghiệp, cơ quan để tạo cơ hội cho các bạn sinh viên được học tập, rèn luyện bản thân và
                             làm quen với môi trường làm việc từ sớm. Trong <a target="_blank" rel="noopener noreferrer"
                                 href="https://www.topcv.vn/viec-lam"><strong>danh sách việc làm</strong></a> trên đây,
                             TopCV mang đến cho bạn những cơ hội việc làm tại những môi trường làm việc năng động, chuyên
                             nghiệp.</p>
                         <p><strong>Vậy tại sao nên tìm việc làm tại TopCV?</strong> </p>
                         <p><strong>Việc làm Chất lượng</strong> </p>
                         <ul>
                             <li>Hàng ngàn tin tuyển dụng chất lượng cao được cập nhật thường xuyên để đáp ứng nhu cầu tìm
                                 việc của ứng viên.</li>
                             <li>Hệ thống thông minh tự động gợi ý các công việc phù hợp theo CV của bạn.</li>
                         </ul>
                         <p><strong>Công cụ viết CV đẹp Miễn phí</strong> </p>
                         <ul>
                             <li>Nhiều mẫu CV đẹp, phù hợp nhu cầu ứng tuyển các vị trí khác nhau.</li>
                             <li>Tương tác trực quan, dễ dàng chỉnh sửa thông tin, tạo CV online nhanh chóng trong vòng 5
                                 phút.</li>
                         </ul>
                         <p><strong>Hỗ trợ Người tìm việc</strong> </p>
                         <ul>
                             <li>Nhà tuyển dụng chủ động tìm kiếm và liên hệ với bạn qua hệ thống kết nối ứng viên thông
                                 minh.</li>
                             <li>Báo cáo chi tiết Nhà tuyển dụng đã xem CV và gửi offer tới bạn.</li>
                         </ul>
                         <p>Tại <a target="_blank" rel="noopener noreferrer"
                                 href="https://www.topcv.vn/"><strong>TopCV</strong></a>, bạn có thể tìm thấy những tin
                             tuyển dụng việc làm với mức lương vô cùng hấp dẫn. Những nhà tuyển dụng kết nối với TopCV đều
                             là những công ty lớn tại Việt Nam, nơi bạn có thể làm việc trong một môi trường chuyên nghiệp,
                             năng động, trẻ trung. TopCV là nền tảng tuyển dụng công nghệ cao giúp các nhà tuyển dụng và ứng
                             viên kết nối với nhau. Nhanh tay tạo CV để ứng tuyển vào các vị trí việc làm mới nhất hấp dẫn
                             tại <a target="_blank" rel="noopener noreferrer"
                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ha-noi-l1"><strong>việc làm mới nhất
                                     tại Hà Nội</strong></a>, <a target="_blank" rel="noopener noreferrer"
                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ho-chi-minh-l2"><strong>việc làm mới
                                     nhất tại TP.HCM</strong></a> ở TopCV, bạn sẽ tìm thấy những <a target="_blank"
                                 rel="noopener noreferrer"
                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat"><strong>việc làm mới nhất</strong></a>
                             với mức lương tốt nhất!</p>
                     </div>
                 </div>
                 <div class="box-seo-categories">
                     <h3 class="title-box">
                         Từ khoá tìm việc làm phổ biến tại TopCV
                     </h3>
                     <div class="row">
                         <div class="col-md-4" id="box-find-categories-job">
                             <div class="box_general">
                                 <h2 class="text_ellipsis uppercase" title="TÌM VIỆC LÀM THEO NGÀNH NGHỀ">
                                     <i class="fa-solid fa-magnifying-glass green-box-icon"></i>
                                     TÌM VIỆC LÀM THEO NGÀNH NGHỀ
                                 </h2>
                                 <div class="ctn-list-jobs">
                                     <div class="item container-scroll ps ps--active-y">
                                         <div class="el2">
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-an-toan-lao-dong-c10101"
                                                 target="_blank" title="An toàn lao động">
                                                 Việc làm An toàn lao động
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ban-hang-ky-thuat-c10102"
                                                 target="_blank" title="Bán hàng kỹ thuật">
                                                 Việc làm Bán hàng kỹ thuật
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ban-le-ban-si-c10103"
                                                 target="_blank" title="Bán lẻ / bán sỉ">
                                                 Việc làm Bán lẻ / bán sỉ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bao-chi-truyen-hinh-c10004"
                                                 target="_blank" title="Báo chí / Truyền hình">
                                                 Việc làm Báo chí / Truyền hình
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bao-hiem-c10006"
                                                 target="_blank" title="Bảo hiểm">
                                                 Việc làm Bảo hiểm
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bao-tri-sua-chua-c10104"
                                                 target="_blank" title="Bảo trì / Sửa chữa">
                                                 Việc làm Bảo trì / Sửa chữa
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bat-dong-san-c10007"
                                                 target="_blank" title="Bất động sản">
                                                 Việc làm Bất động sản
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bien-phien-dich-c10003"
                                                 target="_blank" title="Biên / Phiên dịch">
                                                 Việc làm Biên / Phiên dịch
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-buu-chinh-vien-thong-c10005"
                                                 target="_blank" title="Bưu chính - Viễn thông">
                                                 Việc làm Bưu chính - Viễn thông
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-chung-khoan-vang-ngoai-te-c10008"
                                                 target="_blank" title="Chứng khoán / Vàng / Ngoại tệ">
                                                 Việc làm Chứng khoán / Vàng / Ngoại tệ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-co-khi-che-tao-tu-dong-hoa-c10010"
                                                 target="_blank" title="Cơ khí / Chế tạo / Tự động hóa">
                                                 Việc làm Cơ khí / Chế tạo / Tự động hóa
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-cong-nghe-cao-c10009"
                                                 target="_blank" title="Công nghệ cao">
                                                 Việc làm Công nghệ cao
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-cong-nghe-o-to-c10052"
                                                 target="_blank" title="Công nghệ Ô tô">
                                                 Việc làm Công nghệ Ô tô
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-cong-nghe-thong-tin-c10131"
                                                 target="_blank" title="Công nghệ thông tin">
                                                 Việc làm Công nghệ thông tin
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-dau-khi-hoa-chat-c10012"
                                                 target="_blank" title="Dầu khí/Hóa chất">
                                                 Việc làm Dầu khí/Hóa chất
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-det-may-da-giay-c10013"
                                                 target="_blank" title="Dệt may / Da giày">
                                                 Việc làm Dệt may / Da giày
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-dia-chat-khoang-san-c10111"
                                                 target="_blank" title="Địa chất / Khoáng sản">
                                                 Việc làm Địa chất / Khoáng sản
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-dich-vu-khach-hang-c10014"
                                                 target="_blank" title="Dịch vụ khách hàng">
                                                 Việc làm Dịch vụ khách hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-dien-dien-tu-dien-lanh-c10016"
                                                 target="_blank" title="Điện / Điện tử / Điện lạnh">
                                                 Việc làm Điện / Điện tử / Điện lạnh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-dien-tu-vien-thong-c10015"
                                                 target="_blank" title="Điện tử viễn thông">
                                                 Việc làm Điện tử viễn thông
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-du-lich-c10011" target="_blank"
                                                 title="Du lịch">
                                                 Việc làm Du lịch
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-duoc-pham-cong-nghe-sinh-hoc-c10110"
                                                 target="_blank" title="Dược phẩm / Công nghệ sinh học">
                                                 Việc làm Dược phẩm / Công nghệ sinh học
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-giao-duc-dao-tao-c10017"
                                                 target="_blank" title="Giáo dục / Đào tạo">
                                                 Việc làm Giáo dục / Đào tạo
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hang-cao-cap-c10113"
                                                 target="_blank" title="Hàng cao cấp">
                                                 Việc làm Hàng cao cấp
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hang-gia-dung-c10020"
                                                 target="_blank" title="Hàng gia dụng">
                                                 Việc làm Hàng gia dụng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hang-hai-c10021"
                                                 target="_blank" title="Hàng hải">
                                                 Việc làm Hàng hải
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hang-khong-c10022"
                                                 target="_blank" title="Hàng không">
                                                 Việc làm Hàng không
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hang-tieu-dung-c10117"
                                                 target="_blank" title="Hàng tiêu dùng">
                                                 Việc làm Hàng tiêu dùng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hanh-chinh-van-phong-c10023"
                                                 target="_blank" title="Hành chính / Văn phòng">
                                                 Việc làm Hành chính / Văn phòng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hoa-hoc-sinh-hoc-c10018"
                                                 target="_blank" title="Hoá học / Sinh học">
                                                 Việc làm Hoá học / Sinh học
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hoach-dinh-du-an-c10019"
                                                 target="_blank" title="Hoạch định/Dự án">
                                                 Việc làm Hoạch định/Dự án
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-in-an-xuat-ban-c10024"
                                                 target="_blank" title="In ấn / Xuất bản">
                                                 Việc làm In ấn / Xuất bản
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-it-phan-cung-mang-c10025"
                                                 target="_blank" title="IT Phần cứng / Mạng">
                                                 Việc làm IT Phần cứng / Mạng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-it-phan-mem-c10026"
                                                 target="_blank" title="IT phần mềm">
                                                 Việc làm IT phần mềm
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ke-toan-kiem-toan-c10028"
                                                 target="_blank" title="Kế toán / Kiểm toán">
                                                 Việc làm Kế toán / Kiểm toán
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-khach-san-nha-hang-c10027"
                                                 target="_blank" title="Khách sạn / Nhà hàng">
                                                 Việc làm Khách sạn / Nhà hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-kien-truc-c10120"
                                                 target="_blank" title="Kiến trúc">
                                                 Việc làm Kiến trúc
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-kinh-doanh-ban-hang-c10001"
                                                 target="_blank" title="Kinh doanh / Bán hàng">
                                                 Việc làm Kinh doanh / Bán hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-logistics-c10048"
                                                 target="_blank" title="Logistics">
                                                 Việc làm Logistics
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-luat-phap-ly-c10036"
                                                 target="_blank" title="Luật/Pháp lý">
                                                 Việc làm Luật/Pháp lý
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-marketing-truyen-thong-quang-cao-c10029"
                                                 target="_blank" title="Marketing / Truyền thông / Quảng cáo">
                                                 Việc làm Marketing / Truyền thông / Quảng cáo
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-truong-xu-ly-chat-thai-c10030"
                                                 target="_blank" title="Môi trường / Xử lý chất thải">
                                                 Việc làm Môi trường / Xử lý chất thải
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-my-pham-trang-suc-c10031"
                                                 target="_blank" title="Mỹ phẩm / Trang sức">
                                                 Việc làm Mỹ phẩm / Trang sức
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-my-thuat-nghe-thuat-dien-anh-c10032"
                                                 target="_blank" title="Mỹ thuật / Nghệ thuật / Điện ảnh">
                                                 Việc làm Mỹ thuật / Nghệ thuật / Điện ảnh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ngan-hang-tai-chinh-c10033"
                                                 target="_blank" title="Ngân hàng / Tài chính">
                                                 Việc làm Ngân hàng / Tài chính
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nganh-nghe-khac-c11000"
                                                 target="_blank" title="Ngành nghề khác">
                                                 Việc làm Ngành nghề khác
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ngo-phi-chinh-phu-phi-loi-nhuan-c10132"
                                                 target="_blank" title="NGO / Phi chính phủ / Phi lợi nhuận">
                                                 Việc làm NGO / Phi chính phủ / Phi lợi nhuận
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-su-c10034" target="_blank"
                                                 title="Nhân sự">
                                                 Việc làm Nhân sự
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nong-lam-ngu-nghiep-c10035"
                                                 target="_blank" title="Nông / Lâm / Ngư nghiệp">
                                                 Việc làm Nông / Lâm / Ngư nghiệp
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-phi-chinh-phu-phi-loi-nhuan-c10124"
                                                 target="_blank" title="Phi chính phủ / Phi lợi nhuận">
                                                 Việc làm Phi chính phủ / Phi lợi nhuận
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-quan-ly-chat-luong-qa-qc-c10037"
                                                 target="_blank" title="Quản lý chất lượng (QA/QC)">
                                                 Việc làm Quản lý chất lượng (QA/QC)
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-quan-ly-dieu-hanh-c10038"
                                                 target="_blank" title="Quản lý điều hành">
                                                 Việc làm Quản lý điều hành
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-san-pham-cong-nghiep-c10125"
                                                 target="_blank" title="Sản phẩm công nghiệp">
                                                 Việc làm Sản phẩm công nghiệp
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-san-xuat-c10126"
                                                 target="_blank" title="Sản xuất">
                                                 Việc làm Sản xuất
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-spa-lam-dep-c10130"
                                                 target="_blank" title="Spa / Làm đẹp">
                                                 Việc làm Spa / Làm đẹp
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-tai-chinh-dau-tu-c10127"
                                                 target="_blank" title="Tài chính / Đầu tư">
                                                 Việc làm Tài chính / Đầu tư
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thiet-ke-do-hoa-c10039"
                                                 target="_blank" title="Thiết kế đồ họa">
                                                 Việc làm Thiết kế đồ họa
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thiet-ke-noi-that-c10128"
                                                 target="_blank" title="Thiết kế nội thất">
                                                 Việc làm Thiết kế nội thất
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thoi-trang-c10042"
                                                 target="_blank" title="Thời trang">
                                                 Việc làm Thời trang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thu-ky-tro-ly-c10129"
                                                 target="_blank" title="Thư ký / Trợ lý">
                                                 Việc làm Thư ký / Trợ lý
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thuc-pham-do-uong-c10043"
                                                 target="_blank" title="Thực phẩm / Đồ uống">
                                                 Việc làm Thực phẩm / Đồ uống
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-to-chuc-su-kien-qua-tang-c10046"
                                                 target="_blank" title="Tổ chức sự kiện / Quà tặng">
                                                 Việc làm Tổ chức sự kiện / Quà tặng
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tu-van-c10045"
                                                 target="_blank" title="Tư vấn">
                                                 Việc làm Tư vấn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-van-tai-kho-van-c10047"
                                                 target="_blank" title="Vận tải / Kho vận">
                                                 Việc làm Vận tải / Kho vận
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-xay-dung-c10050"
                                                 target="_blank" title="Xây dựng">
                                                 Việc làm Xây dựng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-xuat-nhap-khau-c10049"
                                                 target="_blank" title="Xuất nhập khẩu">
                                                 Việc làm Xuất nhập khẩu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-y-te-duoc-c10051"
                                                 target="_blank" title="Y tế / Dược">
                                                 Việc làm Y tế / Dược
                                             </a>
                                         </div>
                                         <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                             <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                             </div>
                                         </div>
                                         <div class="ps__rail-y" style="top: 0px; height: 380px; right: 0px;">
                                             <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 52px;">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4" id="box-find-job-location">
                             <div class="box_general">
                                 <h2 class="text_ellipsis uppercase" title="TÌM VIỆC LÀM TẠI">
                                     TÌM VIỆC LÀM TẠI NHÀ
                                 </h2>
                                 <div class="ctn-list-jobs">
                                     <div class="item container-scroll ps ps--active-y">
                                         <div class="el2">
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ha-noi-l1"
                                                 target="_blank" title="Hà Nội">
                                                 Việc làm tại Hà Nội
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ho-chi-minh-l2"
                                                 target="_blank" title="Hồ Chí Minh">
                                                 Việc làm tại Hồ Chí Minh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-binh-duong-l3"
                                                 target="_blank" title="Bình Dương">
                                                 Việc làm tại Bình Dương
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-bac-ninh-l4"
                                                 target="_blank" title="Bắc Ninh">
                                                 Việc làm tại Bắc Ninh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-dong-nai-l5"
                                                 target="_blank" title="Đồng Nai">
                                                 Việc làm tại Đồng Nai
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-hung-yen-l6"
                                                 target="_blank" title="Hưng Yên">
                                                 Việc làm tại Hưng Yên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-hai-duong-l7"
                                                 target="_blank" title="Hải Dương">
                                                 Việc làm tại Hải Dương
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-da-nang-l8"
                                                 target="_blank" title="Đà Nẵng">
                                                 Việc làm tại Đà Nẵng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-hai-phong-l9"
                                                 target="_blank" title="Hải Phòng">
                                                 Việc làm tại Hải Phòng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-an-giang-l10"
                                                 target="_blank" title="An Giang">
                                                 Việc làm tại An Giang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ba-ria-vung-tau-l11"
                                                 target="_blank" title="Bà Rịa-Vũng Tàu">
                                                 Việc làm tại Bà Rịa-Vũng Tàu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-bac-giang-l12"
                                                 target="_blank" title="Bắc Giang">
                                                 Việc làm tại Bắc Giang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-bac-kan-l13"
                                                 target="_blank" title="Bắc Kạn">
                                                 Việc làm tại Bắc Kạn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-bac-lieu-l14"
                                                 target="_blank" title="Bạc Liêu">
                                                 Việc làm tại Bạc Liêu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ben-tre-l15"
                                                 target="_blank" title="Bến Tre">
                                                 Việc làm tại Bến Tre
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-binh-dinh-l16"
                                                 target="_blank" title="Bình Định">
                                                 Việc làm tại Bình Định
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-binh-phuoc-l17"
                                                 target="_blank" title="Bình Phước">
                                                 Việc làm tại Bình Phước
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-binh-thuan-l18"
                                                 target="_blank" title="Bình Thuận">
                                                 Việc làm tại Bình Thuận
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ca-mau-l19"
                                                 target="_blank" title="Cà Mau">
                                                 Việc làm tại Cà Mau
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-can-tho-l20"
                                                 target="_blank" title="Cần Thơ">
                                                 Việc làm tại Cần Thơ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-cao-bang-l21"
                                                 target="_blank" title="Cao Bằng">
                                                 Việc làm tại Cao Bằng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-cuu-long-l22"
                                                 target="_blank" title="Cửu Long">
                                                 Việc làm tại Cửu Long
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-dak-lak-l23"
                                                 target="_blank" title="Đắk Lắk">
                                                 Việc làm tại Đắk Lắk
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-dac-nong-l24"
                                                 target="_blank" title="Đắc Nông">
                                                 Việc làm tại Đắc Nông
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-dien-bien-l25"
                                                 target="_blank" title="Điện Biên">
                                                 Việc làm tại Điện Biên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-dong-thap-l26"
                                                 target="_blank" title="Đồng Tháp">
                                                 Việc làm tại Đồng Tháp
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-gia-lai-l27"
                                                 target="_blank" title="Gia Lai">
                                                 Việc làm tại Gia Lai
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ha-giang-l28"
                                                 target="_blank" title="Hà Giang">
                                                 Việc làm tại Hà Giang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ha-nam-l29"
                                                 target="_blank" title="Hà Nam">
                                                 Việc làm tại Hà Nam
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ha-tinh-l30"
                                                 target="_blank" title="Hà Tĩnh">
                                                 Việc làm tại Hà Tĩnh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-hau-giang-l31"
                                                 target="_blank" title="Hậu Giang">
                                                 Việc làm tại Hậu Giang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-hoa-binh-l32"
                                                 target="_blank" title="Hoà Bình">
                                                 Việc làm tại Hoà Bình
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-khanh-hoa-l33"
                                                 target="_blank" title="Khánh Hoà">
                                                 Việc làm tại Khánh Hoà
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-kien-giang-l34"
                                                 target="_blank" title="Kiên Giang">
                                                 Việc làm tại Kiên Giang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-kon-tum-l35"
                                                 target="_blank" title="Kon Tum">
                                                 Việc làm tại Kon Tum
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-lai-chau-l36"
                                                 target="_blank" title="Lai Châu">
                                                 Việc làm tại Lai Châu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-lam-dong-l37"
                                                 target="_blank" title="Lâm Đồng">
                                                 Việc làm tại Lâm Đồng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-lang-son-l38"
                                                 target="_blank" title="Lạng Sơn">
                                                 Việc làm tại Lạng Sơn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-lao-cai-l39"
                                                 target="_blank" title="Lào Cai">
                                                 Việc làm tại Lào Cai
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-long-an-l40"
                                                 target="_blank" title="Long An">
                                                 Việc làm tại Long An
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-mien-bac-l41"
                                                 target="_blank" title="Miền Bắc">
                                                 Việc làm tại Miền Bắc
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-mien-nam-l42"
                                                 target="_blank" title="Miền Nam">
                                                 Việc làm tại Miền Nam
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-mien-trung-l43"
                                                 target="_blank" title="Miền Trung">
                                                 Việc làm tại Miền Trung
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-nam-dinh-l44"
                                                 target="_blank" title="Nam Định">
                                                 Việc làm tại Nam Định
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-nghe-an-l45"
                                                 target="_blank" title="Nghệ An">
                                                 Việc làm tại Nghệ An
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ninh-binh-l46"
                                                 target="_blank" title="Ninh Bình">
                                                 Việc làm tại Ninh Bình
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-ninh-thuan-l47"
                                                 target="_blank" title="Ninh Thuận">
                                                 Việc làm tại Ninh Thuận
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-phu-tho-l48"
                                                 target="_blank" title="Phú Thọ">
                                                 Việc làm tại Phú Thọ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-phu-yen-l49"
                                                 target="_blank" title="Phú Yên">
                                                 Việc làm tại Phú Yên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-quang-binh-l50"
                                                 target="_blank" title="Quảng Bình">
                                                 Việc làm tại Quảng Bình
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-quang-nam-l51"
                                                 target="_blank" title="Quảng Nam">
                                                 Việc làm tại Quảng Nam
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-quang-ngai-l52"
                                                 target="_blank" title="Quảng Ngãi">
                                                 Việc làm tại Quảng Ngãi
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-quang-ninh-l53"
                                                 target="_blank" title="Quảng Ninh">
                                                 Việc làm tại Quảng Ninh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-quang-tri-l54"
                                                 target="_blank" title="Quảng Trị">
                                                 Việc làm tại Quảng Trị
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-soc-trang-l55"
                                                 target="_blank" title="Sóc Trăng">
                                                 Việc làm tại Sóc Trăng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-son-la-l56"
                                                 target="_blank" title="Sơn La">
                                                 Việc làm tại Sơn La
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-tay-ninh-l57"
                                                 target="_blank" title="Tây Ninh">
                                                 Việc làm tại Tây Ninh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-thai-binh-l58"
                                                 target="_blank" title="Thái Bình">
                                                 Việc làm tại Thái Bình
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-thai-nguyen-l59"
                                                 target="_blank" title="Thái Nguyên">
                                                 Việc làm tại Thái Nguyên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-thanh-hoa-l60"
                                                 target="_blank" title="Thanh Hoá">
                                                 Việc làm tại Thanh Hoá
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-thua-thien-hue-l61"
                                                 target="_blank" title="Thừa Thiên Huế">
                                                 Việc làm tại Thừa Thiên Huế
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-tien-giang-l62"
                                                 target="_blank" title="Tiền Giang">
                                                 Việc làm tại Tiền Giang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-toan-quoc-l63"
                                                 target="_blank" title="Toàn Quốc">
                                                 Việc làm tại Toàn Quốc
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-tra-vinh-l64"
                                                 target="_blank" title="Trà Vinh">
                                                 Việc làm tại Trà Vinh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-tuyen-quang-l65"
                                                 target="_blank" title="Tuyên Quang">
                                                 Việc làm tại Tuyên Quang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-vinh-long-l66"
                                                 target="_blank" title="Vĩnh Long">
                                                 Việc làm tại Vĩnh Long
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-vinh-phuc-l67"
                                                 target="_blank" title="Vĩnh Phúc">
                                                 Việc làm tại Vĩnh Phúc
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-yen-bai-l68"
                                                 target="_blank" title="Yên Bái">
                                                 Việc làm tại Yên Bái
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-moi-nhat-tai-nuoc-ngoai-l100"
                                                 target="_blank" title="Nước Ngoài">
                                                 Việc làm tại Nước Ngoài
                                             </a>
                                         </div>
                                         <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                             <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                             </div>
                                         </div>
                                         <div class="ps__rail-y" style="top: 0px; height: 380px; right: 0px;">
                                             <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 50px;">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4" id="box-find-job-common">
                             <div class="box_general">
                                 <h3 class="text_ellipsis uppercase">
                                     Việc làm phổ biến
                                 </h3>
                                 <div class="ctn-list-jobs">
                                     <div class="item container-scroll ps ps--active-y">
                                         <div class="el2">
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh"
                                                 title="Tìm việc làm Thực tập sinh" target="_blank">
                                                 Tìm việc làm Thực tập sinh
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tro-giang"
                                                 title="Tìm việc làm Trợ giảng" target="_blank">
                                                 Tìm việc làm Trợ giảng
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-giao-vien"
                                                 title="Tìm việc làm Giáo viên" target="_blank">
                                                 Tìm việc làm Giáo viên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-ky-thuat"
                                                 title="Tìm việc làm Nhân viên kỹ thuật" target="_blank">
                                                 Tìm việc làm Nhân viên kỹ thuật
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-it-helpdesk"
                                                 title="Tìm việc làm IT Helpdesk" target="_blank">
                                                 Tìm việc làm IT Helpdesk
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-php"
                                                 title="Tìm việc làm Lập trình viên PHP" target="_blank">
                                                 Tìm việc làm Lập trình viên PHP
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-javascript"
                                                 title="Tìm việc làm Lập trình viên Javascript" target="_blank">
                                                 Tìm việc làm Lập trình viên Javascript
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-reactjs"
                                                 title="Tìm việc làm Lập trình viên ReactJS" target="_blank">
                                                 Tìm việc làm Lập trình viên ReactJS
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-vuejs"
                                                 title="Tìm việc làm Lập trình viên VueJS" target="_blank">
                                                 Tìm việc làm Lập trình viên VueJS
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-angularjs"
                                                 title="Tìm việc làm Lập trình viên AngularJS" target="_blank">
                                                 Tìm việc làm Lập trình viên AngularJS
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-nodejs"
                                                 title="Tìm việc làm Lập trình viên NodeJS" target="_blank">
                                                 Tìm việc làm Lập trình viên NodeJS
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-java"
                                                 title="Tìm việc làm Lập trình viên Java" target="_blank">
                                                 Tìm việc làm Lập trình viên Java
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-net"
                                                 title="Tìm việc làm Lập trình viên .NET" target="_blank">
                                                 Tìm việc làm Lập trình viên .NET
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-front-end"
                                                 title="Tìm việc làm Lập trình Front-End" target="_blank">
                                                 Tìm việc làm Lập trình Front-End
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-back-end"
                                                 title="Tìm việc làm Lập trình Back-End" target="_blank">
                                                 Tìm việc làm Lập trình Back-End
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-ios"
                                                 title="Tìm việc làm Lập trình viên iOS" target="_blank">
                                                 Tìm việc làm Lập trình viên iOS
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-android"
                                                 title="Tìm việc làm Lập trình viên Android" target="_blank">
                                                 Tìm việc làm Lập trình viên Android
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-react-native"
                                                 title="Tìm việc làm Lập trình viên React Native" target="_blank">
                                                 Tìm việc làm Lập trình viên React Native
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien-mobile"
                                                 title="Tìm việc làm Lập trình viên Mobile" target="_blank">
                                                 Tìm việc làm Lập trình viên Mobile
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tester"
                                                 title="Tìm việc làm Tester" target="_blank">
                                                 Tìm việc làm Tester
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-business-analyst"
                                                 title="Tìm việc làm Business Analyst" target="_blank">
                                                 Tìm việc làm Business Analyst
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-data-analyst"
                                                 title="Tìm việc làm Data Analyst" target="_blank">
                                                 Tìm việc làm Data Analyst
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-lap-trinh-vien"
                                                 title="Tìm việc làm Lập trình viên" target="_blank">
                                                 Tìm việc làm Lập trình viên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-fullstack-developer"
                                                 title="Tìm việc làm Fullstack Developer" target="_blank">
                                                 Tìm việc làm Fullstack Developer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-unity-developer"
                                                 title="Tìm việc làm Unity Developer" target="_blank">
                                                 Tìm việc làm Unity Developer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-game-developer"
                                                 title="Tìm việc làm Game Developer" target="_blank">
                                                 Tìm việc làm Game Developer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-le-tan"
                                                 title="Tìm việc làm Nhân viên Lễ tân" target="_blank">
                                                 Tìm việc làm Nhân viên Lễ tân
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-truong-phong-kinh-doanh"
                                                 title="Tìm việc làm Trưởng phòng kinh doanh" target="_blank">
                                                 Tìm việc làm Trưởng phòng kinh doanh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-giam-doc-kinh-doanh"
                                                 title="Tìm việc làm Giám đốc kinh doanh" target="_blank">
                                                 Tìm việc làm Giám đốc kinh doanh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-giam-sat-ban-hang"
                                                 title="Tìm việc làm Giám sát bán hàng" target="_blank">
                                                 Tìm việc làm Giám sát bán hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-kinh-doanh"
                                                 title="Tìm việc làm Thực tập sinh kinh doanh" target="_blank">
                                                 Tìm việc làm Thực tập sinh kinh doanh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-truong-phong-cham-soc-khach-hang"
                                                 title="Tìm việc làm Trưởng phòng chăm sóc khách hàng" target="_blank">
                                                 Tìm việc làm Trưởng phòng chăm sóc khách hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-cham-soc-khach-hang"
                                                 title="Tìm việc làm Nhân viên chăm sóc khách hàng" target="_blank">
                                                 Tìm việc làm Nhân viên chăm sóc khách hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-marketing"
                                                 title="Tìm việc làm Nhân viên Marketing" target="_blank">
                                                 Tìm việc làm Nhân viên Marketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-giam-doc-marketing"
                                                 title="Tìm việc làm Giám đốc Marketing" target="_blank">
                                                 Tìm việc làm Giám đốc Marketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-truong-phong-marketing"
                                                 title="Tìm việc làm Trưởng phòng Marketing" target="_blank">
                                                 Tìm việc làm Trưởng phòng Marketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-marketing-manager"
                                                 title="Tìm việc làm Marketing Manager" target="_blank">
                                                 Tìm việc làm Marketing Manager
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-truong-nhom-marketing"
                                                 title="Tìm việc làm Trưởng nhóm Marketing" target="_blank">
                                                 Tìm việc làm Trưởng nhóm Marketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-digital-marketing"
                                                 title="Tìm việc làm Digital Marketing" target="_blank">
                                                 Tìm việc làm Digital Marketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-trade-marketing"
                                                 title="Tìm việc làm Trade Marketing" target="_blank">
                                                 Tìm việc làm Trade Marketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-trade-marketing-manager"
                                                 title="Tìm việc làm Trade Marketing Manager" target="_blank">
                                                 Tìm việc làm Trade Marketing Manager
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-facebook-ads"
                                                 title="Tìm việc làm Nhân viên Facebook Ads" target="_blank">
                                                 Tìm việc làm Nhân viên Facebook Ads
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-telemarketing"
                                                 title="Tìm việc làm Telemarketing" target="_blank">
                                                 Tìm việc làm Telemarketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-content-writer"
                                                 title="Tìm việc làm Content Writer" target="_blank">
                                                 Tìm việc làm Content Writer
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-video-editor"
                                                 title="Tìm việc làm Video Editor" target="_blank">
                                                 Tìm việc làm Video Editor
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-quay-d%E1%BB%B1ng-video"
                                                 title="Tìm việc làm Nhân viên Quay/Dựng video" target="_blank">
                                                 Tìm việc làm Nhân viên Quay/Dựng video
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-marketing"
                                                 title="Tìm việc làm Thực tập sinh Marketing" target="_blank">
                                                 Tìm việc làm Thực tập sinh Marketing
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-nhan-vien-seo"
                                                 title="Tìm việc làm Nhân viên SEO" target="_blank">
                                                 Tìm việc làm Nhân viên SEO
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-th%E1%BB%B1c-t%E1%BA%ADp-sinh-seo"
                                                 title="Tìm việc làm Thực tập sinh SEO" target="_blank">
                                                 Tìm việc làm Thực tập sinh SEO
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch"
                                                 title="Tìm việc làm Biên phiên dịch" target="_blank">
                                                 Tìm việc làm Biên phiên dịch
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tieng-nhat"
                                                 title="Tìm việc làm Tiếng Nhật" target="_blank">
                                                 Tìm việc làm Tiếng Nhật
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tieng-han"
                                                 title="Tìm việc làm Tiếng Hàn" target="_blank">
                                                 Tìm việc làm Tiếng Hàn
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tieng-trung"
                                                 title="Tìm việc làm Tiếng Trung" target="_blank">
                                                 Tìm việc làm Tiếng Trung
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tieng-anh"
                                                 title="Tìm việc làm Tiếng Anh" target="_blank">
                                                 Tìm việc làm Tiếng Anh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch-ti%E1%BA%BFng-nh%E1%BA%ADt"
                                                 title="Tìm việc làm Biên phiên dịch Tiếng Nhật" target="_blank">
                                                 Tìm việc làm Biên phiên dịch Tiếng Nhật
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch-ti%E1%BA%BFng-h%C3%A0n"
                                                 title="Tìm việc làm Biên phiên dịch Tiếng Hàn" target="_blank">
                                                 Tìm việc làm Biên phiên dịch Tiếng Hàn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-bi%C3%AAn-phi%C3%AAn-d%E1%BB%8Bch-ti%E1%BA%BFng-trung"
                                                 title="Tìm việc làm Biên phiên dịch Tiếng Trung" target="_blank">
                                                 Tìm việc làm Biên phiên dịch Tiếng Trung
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ti%E1%BA%BFng-nh%E1%BA%ADt"
                                                 title="Tìm việc làm Giáo viên Tiếng Nhật" target="_blank">
                                                 Tìm việc làm Giáo viên Tiếng Nhật
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ti%E1%BA%BFng-h%C3%A0n"
                                                 title="Tìm việc làm Giáo viên Tiếng Hàn" target="_blank">
                                                 Tìm việc làm Giáo viên Tiếng Hàn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ti%E1%BA%BFng-trung"
                                                 title="Tìm việc làm Giáo viên Tiếng Trung" target="_blank">
                                                 Tìm việc làm Giáo viên Tiếng Trung
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-giao-vien-tieng-anh"
                                                 title="Tìm việc làm Giáo viên Tiếng Anh" target="_blank">
                                                 Tìm việc làm Giáo viên Tiếng Anh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thi%E1%BA%BFt-k%E1%BA%BF-%C4%91%E1%BB%93-ho%E1%BA%A1-designer"
                                                 title="Tìm việc làm Thiết kế đồ hoạ/Designer" target="_blank">
                                                 Tìm việc làm Thiết kế đồ hoạ/Designer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thiet-ke-noi-that"
                                                 title="Tìm việc làm Thiết kế nội thất" target="_blank">
                                                 Tìm việc làm Thiết kế nội thất
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thiet-ke-website"
                                                 title="Tìm việc làm Thiết kế website" target="_blank">
                                                 Tìm việc làm Thiết kế website
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-truong-phong-nhan-su"
                                                 title="Tìm việc làm Trưởng phòng nhân sự" target="_blank">
                                                 Tìm việc làm Trưởng phòng nhân sự
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-tuy%E1%BB%83n-d%E1%BB%A5ng-nh%C3%A2n-s%E1%BB%B1"
                                                 title="Tìm việc làm Tuyển dụng/Nhân sự" target="_blank">
                                                 Tìm việc làm Tuyển dụng/Nhân sự
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hanh-chinh-nhan-su"
                                                 title="Tìm việc làm Hành chính nhân sự" target="_blank">
                                                 Tìm việc làm Hành chính nhân sự
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-hanh-chinh"
                                                 title="Tìm việc làm Nhân viên hành chính" target="_blank">
                                                 Tìm việc làm Nhân viên hành chính
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-mua-hang"
                                                 title="Tìm việc làm Nhân viên mua hàng" target="_blank">
                                                 Tìm việc làm Nhân viên mua hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-van-phong"
                                                 title="Tìm việc làm Nhân viên văn phòng" target="_blank">
                                                 Tìm việc làm Nhân viên văn phòng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-nhap-lieu"
                                                 title="Tìm việc làm Nhân viên nhập liệu" target="_blank">
                                                 Tìm việc làm Nhân viên nhập liệu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-chuyen-vien-tuyen-dung"
                                                 title="Tìm việc làm Chuyên viên tuyển dụng" target="_blank">
                                                 Tìm việc làm Chuyên viên tuyển dụng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-nhan-su"
                                                 title="Tìm việc làm Thực tập sinh Nhân sự" target="_blank">
                                                 Tìm việc làm Thực tập sinh Nhân sự
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-truyen-thong-noi-bo"
                                                 title="Tìm việc làm Truyền thông nội bộ" target="_blank">
                                                 Tìm việc làm Truyền thông nội bộ
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-truyen-thong"
                                                 title="Tìm việc làm Truyền thông" target="_blank">
                                                 Tìm việc làm Truyền thông
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-tu-van"
                                                 title="Tìm việc làm Nhân viên Tư vấn" target="_blank">
                                                 Tìm việc làm Nhân viên Tư vấn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-tu-van-tuyen-sinh"
                                                 title="Tìm việc làm Nhân viên Tư vấn tuyển sinh" target="_blank">
                                                 Tìm việc làm Nhân viên Tư vấn tuyển sinh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-t%C6%B0-v%E1%BA%A5n-t%C3%A0i-ch%C3%ADnh"
                                                 title="Tìm việc làm Tư vấn tài chính" target="_blank">
                                                 Tìm việc làm Tư vấn tài chính
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-ke-toan"
                                                 title="Tìm việc làm Nhân viên Kế toán" target="_blank">
                                                 Tìm việc làm Nhân viên Kế toán
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ke-toan-truong"
                                                 title="Tìm việc làm Kế toán trưởng" target="_blank">
                                                 Tìm việc làm Kế toán trưởng
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-ke-toan-kho"
                                                 title="Tìm việc làm Kế toán kho" target="_blank">
                                                 Tìm việc làm Kế toán kho
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ke-toan-ban-hang"
                                                 title="Tìm việc làm Kế toán bán hàng" target="_blank">
                                                 Tìm việc làm Kế toán bán hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ke-toan-tong-hop"
                                                 title="Tìm việc làm Kế toán tổng hợp" target="_blank">
                                                 Tìm việc làm Kế toán tổng hợp
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-thuc-tap-sinh-ke-toan"
                                                 title="Tìm việc làm Thực tập sinh kế toán" target="_blank">
                                                 Tìm việc làm Thực tập sinh kế toán
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-thu-ngan"
                                                 title="Tìm việc làm Nhân viên Thu ngân" target="_blank">
                                                 Tìm việc làm Nhân viên Thu ngân
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-ngan-hang"
                                                 title="Tìm việc làm Ngân hàng" target="_blank">
                                                 Tìm việc làm Ngân hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-tu-van-bat-dong-san"
                                                 title="Tìm việc làm Nhân viên tư vấn bất động sản" target="_blank">
                                                 Tìm việc làm Nhân viên tư vấn bất động sản
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-bat-dong-san"
                                                 title="Tìm việc làm Bất động sản" target="_blank">
                                                 Tìm việc làm Bất động sản
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ki%E1%BB%83m-to%C3%A1n-vi%C3%AAn"
                                                 title="Tìm việc làm Kiểm toán viên" target="_blank">
                                                 Tìm việc làm Kiểm toán viên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-giam-doc-du-an"
                                                 title="Tìm việc làm Giám đốc dự án" target="_blank">
                                                 Tìm việc làm Giám đốc dự án
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-giam-doc-dieu-hanh"
                                                 title="Tìm việc làm Giám đốc điều hành" target="_blank">
                                                 Tìm việc làm Giám đốc điều hành
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-tro-ly-giam-doc"
                                                 title="Tìm việc làm Trợ lý giám đốc" target="_blank">
                                                 Tìm việc làm Trợ lý giám đốc
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-l%C3%A1i-xe"
                                                 title="Tìm việc làm Nhân viên lái xe" target="_blank">
                                                 Tìm việc làm Nhân viên lái xe
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-giao-hang"
                                                 title="Tìm việc làm Nhân viên giao hàng" target="_blank">
                                                 Tìm việc làm Nhân viên giao hàng
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-nhan-vien-kho"
                                                 title="Tìm việc làm Nhân viên kho" target="_blank">
                                                 Tìm việc làm Nhân viên kho
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-ky-su-co-khi"
                                                 title="Tìm việc làm Kỹ sư cơ khí" target="_blank">
                                                 Tìm việc làm Kỹ sư cơ khí
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-ban-thoi-gian"
                                                 title="Tìm việc làm Bán thời gian" target="_blank">
                                                 Tìm việc làm Bán thời gian
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-quan-ly"
                                                 title="Tìm việc làm Quản lý" target="_blank">
                                                 Tìm việc làm Quản lý
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tro-ly"
                                                 title="Tìm việc làm Trợ lý" target="_blank">
                                                 Tìm việc làm Trợ lý
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-kinh-doanh-n%C3%B3i-chung"
                                                 title="Tìm việc làm Kinh doanh nói chung" target="_blank">
                                                 Tìm việc làm Kinh doanh nói chung
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sales-engineer"
                                                 title="Tìm việc làm Sales engineer" target="_blank">
                                                 Tìm việc làm Sales engineer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-b%C3%A1n-h%C3%A0ng"
                                                 title="Tìm việc làm Nhân viên kinh doanh - bán hàng" target="_blank">
                                                 Tìm việc làm Nhân viên kinh doanh - bán hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-telesale"
                                                 title="Tìm việc làm Nhân viên Telesale" target="_blank">
                                                 Tìm việc làm Nhân viên Telesale
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-%C4%91%E1%BA%A1i-di%E1%BB%87n-kinh-doanh"
                                                 title="Tìm việc làm Đại diện kinh doanh" target="_blank">
                                                 Tìm việc làm Đại diện kinh doanh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ph%C3%A1t-tri%E1%BB%83n-th%E1%BB%8B-tr%C6%B0%E1%BB%9Dng"
                                                 title="Tìm việc làm Phát triển thị trường" target="_blank">
                                                 Tìm việc làm Phát triển thị trường
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-quan-ly-kinh-doanh"
                                                 title="Tìm việc làm Quản lý kinh doanh" target="_blank">
                                                 Tìm việc làm Quản lý kinh doanh
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-sales-manager"
                                                 title="Tìm việc làm Sales Manager" target="_blank">
                                                 Tìm việc làm Sales Manager
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-quan-ly-cua-hang"
                                                 title="Tìm việc làm Quản lý Cửa hàng" target="_blank">
                                                 Tìm việc làm Quản lý Cửa hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-truong-nhom-kinh-doanh"
                                                 title="Tìm việc làm Trưởng nhóm kinh doanh" target="_blank">
                                                 Tìm việc làm Trưởng nhóm kinh doanh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-h%E1%BB%97-tr%E1%BB%A3-kinh-doanh"
                                                 title="Tìm việc làm Hỗ trợ kinh doanh" target="_blank">
                                                 Tìm việc làm Hỗ trợ kinh doanh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-ban-ve-may-bay"
                                                 title="Tìm việc làm Nhân viên bán vé máy bay" target="_blank">
                                                 Tìm việc làm Nhân viên bán vé máy bay
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nhan-vien-kinh-doanh-bat-dong-san"
                                                 title="Tìm việc làm Nhân viên kinh doanh bất động sản" target="_blank">
                                                 Tìm việc làm Nhân viên kinh doanh bất động sản
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-%C3%B4-t%C3%B4"
                                                 title="Tìm việc làm Nhân viên kinh doanh ô tô" target="_blank">
                                                 Tìm việc làm Nhân viên kinh doanh ô tô
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-b%C3%A1n-h%C3%A0ng-part-time"
                                                 title="Tìm việc làm Nhân viên bán hàng part time" target="_blank">
                                                 Tìm việc làm Nhân viên bán hàng part time
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-d%E1%BB%A5c-%C4%91%C3%A0o-t%E1%BA%A1o-n%C3%B3i-chung"
                                                 title="Tìm việc làm Giáo dục đào tạo nói chung" target="_blank">
                                                 Tìm việc làm Giáo dục đào tạo nói chung
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-t%C6%B0-v%E1%BA%A5n-t%C3%A0i-ch%C3%ADnh"
                                                 title="Tìm việc làm Nhân viên tư vấn tài chính" target="_blank">
                                                 Tìm việc làm Nhân viên tư vấn tài chính
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-key-account"
                                                 title="Tìm việc làm Key account" target="_blank">
                                                 Tìm việc làm Key account
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-quan-h%E1%BB%87-kh%C3%A1ch-h%C3%A0ng"
                                                 title="Tìm việc làm Nhân viên quan hệ khách hàng" target="_blank">
                                                 Tìm việc làm Nhân viên quan hệ khách hàng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-kh%C3%A1ch-h%C3%A0ng-c%C3%A1-nh%C3%A2n"
                                                 title="Tìm việc làm Chuyên viên khách hàng cá nhân" target="_blank">
                                                 Tìm việc làm Chuyên viên khách hàng cá nhân
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-kh%C3%A1ch-h%C3%A0ng-doanh-nghi%E1%BB%87p"
                                                 title="Tìm việc làm Chuyên viên khách hàng doanh nghiệp"
                                                 target="_blank">
                                                 Tìm việc làm Chuyên viên khách hàng doanh nghiệp
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-t%C3%A0i-ch%C3%ADnh-ng%C3%A2n-h%C3%A0ng"
                                                 title="Tìm việc làm Tài chính ngân hàng" target="_blank">
                                                 Tìm việc làm Tài chính ngân hàng
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-sale-logistic"
                                                 title="Tìm việc làm Sale logistic" target="_blank">
                                                 Tìm việc làm Sale logistic
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-logistics"
                                                 title="Tìm việc làm Logistics" target="_blank">
                                                 Tìm việc làm Logistics
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-logistics"
                                                 title="Tìm việc làm Nhân viên logistics" target="_blank">
                                                 Tìm việc làm Nhân viên logistics
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-sale-logistic"
                                                 title="Tìm việc làm Nhân viên sale logistic" target="_blank">
                                                 Tìm việc làm Nhân viên sale logistic
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-xu%E1%BA%A5t-nh%E1%BA%ADp-kh%E1%BA%A9u"
                                                 title="Tìm việc làm Xuất nhập khẩu" target="_blank">
                                                 Tìm việc làm Xuất nhập khẩu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-xu%E1%BA%A5t-nh%E1%BA%ADp-kh%E1%BA%A9u"
                                                 title="Tìm việc làm Sale xuất nhập khẩu" target="_blank">
                                                 Tìm việc làm Sale xuất nhập khẩu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-sale-xu%E1%BA%A5t-nh%E1%BA%ADp-kh%E1%BA%A9u"
                                                 title="Tìm việc làm Nhân viên sale xuất nhập khẩu" target="_blank">
                                                 Tìm việc làm Nhân viên sale xuất nhập khẩu
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-tiktok"
                                                 title="Tìm việc làm Tiktok" target="_blank">
                                                 Tìm việc làm Tiktok
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-cyber-security"
                                                 title="Tìm việc làm Cyber Security" target="_blank">
                                                 Tìm việc làm Cyber Security
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-area-sales-manager"
                                                 title="Tìm việc làm Area sales manager" target="_blank">
                                                 Tìm việc làm Area sales manager
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-y-t%E1%BA%BF"
                                                 title="Tìm việc làm Nhân viên kinh doanh y tế" target="_blank">
                                                 Tìm việc làm Nhân viên kinh doanh y tế
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-trinh-duoc-vien"
                                                 title="Tìm việc làm Trình dược viên" target="_blank">
                                                 Tìm việc làm Trình dược viên
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-thi%E1%BA%BFt-b%E1%BB%8B-y-t%E1%BA%BF"
                                                 title="Tìm việc làm Nhân viên kinh doanh thiết bị y tế"
                                                 target="_blank">
                                                 Tìm việc làm Nhân viên kinh doanh thiết bị y tế
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-content-tiktok"
                                                 title="Tìm việc làm Content TikTok" target="_blank">
                                                 Tìm việc làm Content TikTok
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-ads"
                                                 title="Tìm việc làm Ads" target="_blank">
                                                 Tìm việc làm Ads
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-quan-tri-kenh-youtube"
                                                 title="Tìm việc làm Quan tri kenh youtube" target="_blank">
                                                 Tìm việc làm Quan tri kenh youtube
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-van-hanh-s%C3%A0n-tmdt"
                                                 title="Tìm việc làm Van hanh sàn TMDT" target="_blank">
                                                 Tìm việc làm Van hanh sàn TMDT
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-livestream"
                                                 title="Tìm việc làm Nhân viên Livestream" target="_blank">
                                                 Tìm việc làm Nhân viên Livestream
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-designer"
                                                 title="Tìm việc làm Designer" target="_blank">
                                                 Tìm việc làm Designer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-d%E1%BB%B1-to%C3%A1n-x%C3%A2y-d%E1%BB%B1ng"
                                                 title="Tìm việc làm Kỹ sư dự toán xây dựng" target="_blank">
                                                 Tìm việc làm Kỹ sư dự toán xây dựng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-h%E1%BB%93-s%C6%A1"
                                                 title="Tìm việc làm Nhân viên hồ sơ" target="_blank">
                                                 Tìm việc làm Nhân viên hồ sơ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-%C4%91%C3%A0o-t%E1%BA%A1o"
                                                 title="Tìm việc làm Chuyên viên đào tạo" target="_blank">
                                                 Tìm việc làm Chuyên viên đào tạo
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-%C4%91%C3%A0o-t%E1%BA%A1o-v%C3%A0-ph%C3%A1t-tri%E1%BB%83n"
                                                 title="Tìm việc làm Đào tạo và phát triển" target="_blank">
                                                 Tìm việc làm Đào tạo và phát triển
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-chuy%C3%AAn-vi%C3%AAn-gi%C3%A1m-%C4%91%E1%BB%8Bnh"
                                                 title="Tìm việc làm Chuyên viên giám định" target="_blank">
                                                 Tìm việc làm Chuyên viên giám định
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-marketing-online"
                                                 title="Tìm việc làm Marketing Online" target="_blank">
                                                 Tìm việc làm Marketing Online
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-thi%E1%BA%BFt-k%E1%BA%BF"
                                                 title="Tìm việc làm Kỹ sư thiết kế" target="_blank">
                                                 Tìm việc làm Kỹ sư thiết kế
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-quan-ly-chat-luong"
                                                 title="Tìm việc làm Quản lý chất lượng" target="_blank">
                                                 Tìm việc làm Quản lý chất lượng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-qu%E1%BA%A3n-l%C3%BD-ch%E1%BA%A5t-l%C6%B0%E1%BB%A3ng"
                                                 title="Tìm việc làm Nhân viên quản lý chất lượng" target="_blank">
                                                 Tìm việc làm Nhân viên quản lý chất lượng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-theo-d%C3%B5i-c%C3%B4ng-n%E1%BB%A3"
                                                 title="Tìm việc làm Nhân viên theo dõi công nợ" target="_blank">
                                                 Tìm việc làm Nhân viên theo dõi công nợ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-th%E1%BB%A7-kho"
                                                 title="Tìm việc làm Nhân viên thủ kho" target="_blank">
                                                 Tìm việc làm Nhân viên thủ kho
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-v%C4%83n-th%C6%B0"
                                                 title="Tìm việc làm Nhân viên văn thư" target="_blank">
                                                 Tìm việc làm Nhân viên văn thư
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-ch%E1%BA%BF-b%E1%BA%A3n"
                                                 title="Tìm việc làm Nhân viên chế bản" target="_blank">
                                                 Tìm việc làm Nhân viên chế bản
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-tr%E1%BB%A3-l%C3%BD-ti%E1%BA%BFng-trung"
                                                 title="Tìm việc làm Trợ lý tiếng Trung" target="_blank">
                                                 Tìm việc làm Trợ lý tiếng Trung
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-%C4%91i%E1%BB%81u-d%C6%B0%E1%BB%A1ng"
                                                 title="Tìm việc làm Điều dưỡng" target="_blank">
                                                 Tìm việc làm Điều dưỡng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-qu%E1%BA%A3n-l%C3%BD-r%E1%BB%A7i-ro"
                                                 title="Tìm việc làm Nhân viên quản lý rủi ro" target="_blank">
                                                 Tìm việc làm Nhân viên quản lý rủi ro
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-ph%C3%A2n-t%C3%ADch-kinh-doanh"
                                                 title="Tìm việc làm Nhân viên phân tích kinh doanh" target="_blank">
                                                 Tìm việc làm Nhân viên phân tích kinh doanh
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-ch%C4%83m-s%C3%B3c-kh%C3%A1ch-h%C3%A0ng-ti%E1%BA%BFng-h%C3%A0n"
                                                 title="Tìm việc làm Nhân viên chăm sóc khách hàng tiếng hàn"
                                                 target="_blank">
                                                 Tìm việc làm Nhân viên chăm sóc khách hàng tiếng hàn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-d%E1%BB%8Bch-v%E1%BB%A5"
                                                 title="Tìm việc làm Giám sát dịch vụ" target="_blank">
                                                 Tìm việc làm Giám sát dịch vụ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-nh%E1%BA%AFc-ph%C3%AD"
                                                 title="Tìm việc làm Nhân viên nhắc phí" target="_blank">
                                                 Tìm việc làm Nhân viên nhắc phí
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-r-d"
                                                 title="Tìm việc làm Nhân viên R&amp;D" target="_blank">
                                                 Tìm việc làm Nhân viên R&amp;D
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-qu%E1%BA%A3n-l%C3%BD-l%E1%BB%9Bp-h%E1%BB%8Dc"
                                                 title="Tìm việc làm Nhân viên quản lý lớp học" target="_blank">
                                                 Tìm việc làm Nhân viên quản lý lớp học
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-h%E1%BB%8Dc-v%E1%BB%A5"
                                                 title="Tìm việc làm Nhân viên học vụ" target="_blank">
                                                 Tìm việc làm Nhân viên học vụ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%E1%BA%A3ng-vi%C3%AAn-cntt"
                                                 title="Tìm việc làm Giảng viên CNTT" target="_blank">
                                                 Tìm việc làm Giảng viên CNTT
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-%C3%A2m-nh%E1%BA%A1c"
                                                 title="Tìm việc làm Giáo viên âm nhạc" target="_blank">
                                                 Tìm việc làm Giáo viên âm nhạc
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ch%E1%BB%A7-nhi%E1%BB%87m"
                                                 title="Tìm việc làm Giáo viên chủ nhiệm" target="_blank">
                                                 Tìm việc làm Giáo viên chủ nhiệm
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-ng%E1%BB%AF-v%C4%83n"
                                                 title="Tìm việc làm Giáo viên ngữ văn" target="_blank">
                                                 Tìm việc làm Giáo viên ngữ văn
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-tin-h%E1%BB%8Dc"
                                                 title="Tìm việc làm Giáo viên tin học" target="_blank">
                                                 Tìm việc làm Giáo viên tin học
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-tri%E1%BB%83n-khai-ph%E1%BA%A7n-m%E1%BB%81m"
                                                 title="Tìm việc làm Nhân viên triển khai phần mềm" target="_blank">
                                                 Tìm việc làm Nhân viên triển khai phần mềm
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-tri%E1%BB%83n-khai-d%E1%BB%B1-%C3%A1n"
                                                 title="Tìm việc làm Nhân viên triển khai dự án" target="_blank">
                                                 Tìm việc làm Nhân viên triển khai dự án
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-v%E1%BA%ADn-h%C3%A0nh"
                                                 title="Tìm việc làm Nhân viên vận hành" target="_blank">
                                                 Tìm việc làm Nhân viên vận hành
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-qu%E1%BA%A3n-l%C3%BD-v%E1%BA%ADn-h%C3%A0nh"
                                                 title="Tìm việc làm Giám sát quản lý vận hành" target="_blank">
                                                 Tìm việc làm Giám sát quản lý vận hành
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-k%E1%BB%B9-n%C4%83ng"
                                                 title="Tìm việc làm Giáo viên kỹ năng" target="_blank">
                                                 Tìm việc làm Giáo viên kỹ năng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-h%C3%B3a-h%E1%BB%8Dc"
                                                 title="Tìm việc làm Giáo viên hóa học" target="_blank">
                                                 Tìm việc làm Giáo viên hóa học
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-m%C4%A9-thu%E1%BA%ADt"
                                                 title="Tìm việc làm Giáo viên mĩ thuật" target="_blank">
                                                 Tìm việc làm Giáo viên mĩ thuật
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-to%C3%A1n"
                                                 title="Tìm việc làm Giáo viên toán" target="_blank">
                                                 Tìm việc làm Giáo viên toán
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-th%E1%BB%8B-tr%C6%B0%E1%BB%9Dng"
                                                 title="Tìm việc làm sale thị trường" target="_blank">
                                                 Tìm việc làm sale thị trường
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-showroom"
                                                 title="Tìm việc làm bán hàng showroom" target="_blank">
                                                 Tìm việc làm bán hàng showroom
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-m%E1%BB%B9-ph%E1%BA%A9m"
                                                 title="Tìm việc làm bán hàng mỹ phẩm" target="_blank">
                                                 Tìm việc làm bán hàng mỹ phẩm
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-l%E1%BA%ADp-tr%C3%ACnh-nh%C3%BAng"
                                                 title="Tìm việc làm Kỹ sư lập trình nhúng" target="_blank">
                                                 Tìm việc làm Kỹ sư lập trình nhúng
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-nh%C3%BAng"
                                                 title="Tìm việc làm Nhúng" target="_blank">
                                                 Tìm việc làm Nhúng
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-it-comtor"
                                                 title="Tìm việc làm IT Comtor" target="_blank">
                                                 Tìm việc làm IT Comtor
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-it-comtor-ti%E1%BA%BFng-nh%E1%BA%ADt"
                                                 title="Tìm việc làm IT Comtor tiếng Nhật" target="_blank">
                                                 Tìm việc làm IT Comtor tiếng Nhật
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-presale"
                                                 title="Tìm việc làm Presale" target="_blank">
                                                 Tìm việc làm Presale
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-m%E1%BA%A1ng"
                                                 title="Tìm việc làm Kỹ sư mạng" target="_blank">
                                                 Tìm việc làm Kỹ sư mạng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-automation-tester"
                                                 title="Tìm việc làm Automation tester" target="_blank">
                                                 Tìm việc làm Automation tester
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-l%E1%BA%ADp-tr%C3%ACnh-vi%C3%AAn-erp"
                                                 title="Tìm việc làm Lập trình viên ERP" target="_blank">
                                                 Tìm việc làm Lập trình viên ERP
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-thi%E1%BA%BFt-k%E1%BA%BF-3d"
                                                 title="Tìm việc làm Nhân viên thiết kế 3D" target="_blank">
                                                 Tìm việc làm Nhân viên thiết kế 3D
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-erp-consultant"
                                                 title="Tìm việc làm ERP Consultant" target="_blank">
                                                 Tìm việc làm ERP Consultant
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1o-vi%C3%AAn-unity"
                                                 title="Tìm việc làm Giáo viên Unity" target="_blank">
                                                 Tìm việc làm Giáo viên Unity
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-project-manager"
                                                 title="Tìm việc làm Project Manager" target="_blank">
                                                 Tìm việc làm Project Manager
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-data-engineer"
                                                 title="Tìm việc làm Data Engineer" target="_blank">
                                                 Tìm việc làm Data Engineer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-hardware-engineer"
                                                 title="Tìm việc làm Hardware Engineer" target="_blank">
                                                 Tìm việc làm Hardware Engineer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-k%E1%BB%B9-s%C6%B0-%C4%91i%E1%BB%87n-t%E1%BB%AD-vi%E1%BB%85n-th%C3%B4ng"
                                                 title="Tìm việc làm Kỹ sư điện tử viễn thông" target="_blank">
                                                 Tìm việc làm Kỹ sư điện tử viễn thông
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-%C4%91i%E1%BB%87n-t%E1%BB%AD-vi%E1%BB%85n-th%C3%B4ng"
                                                 title="Tìm việc làm Điện tử viễn thông" target="_blank">
                                                 Tìm việc làm Điện tử viễn thông
                                             </a>
                                             <a class="list-item" href="https://www.topcv.vn/tim-viec-lam-ky-su-cau-noi"
                                                 title="Tìm việc làm Kỹ sư cầu nối" target="_blank">
                                                 Tìm việc làm Kỹ sư cầu nối
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-ui-ux-designer"
                                                 title="Tìm việc làm UI/UX Designer" target="_blank">
                                                 Tìm việc làm UI/UX Designer
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-t%C6%B0-v%E1%BA%A5n-t%C3%ADn-d%E1%BB%A5ng"
                                                 title="Tìm việc làm Nhân viên tư vấn tín dụng" target="_blank">
                                                 Tìm việc làm Nhân viên tư vấn tín dụng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-kinh-doanh-ph%C3%B2ng-kh%C3%A1m"
                                                 title="Tìm việc làm nhân viên kinh doanh phòng khám" target="_blank">
                                                 Tìm việc làm nhân viên kinh doanh phòng khám
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-th%E1%BB%9Di-trang"
                                                 title="Tìm việc làm bán hàng thời trang" target="_blank">
                                                 Tìm việc làm bán hàng thời trang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-th%E1%BB%9Di-trang"
                                                 title="Tìm việc làm sale thời trang" target="_blank">
                                                 Tìm việc làm sale thời trang
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-b%C3%A1n-h%C3%A0ng-si%C3%AAu-th%E1%BB%8B"
                                                 title="Tìm việc làm bán hàng siêu thị" target="_blank">
                                                 Tìm việc làm bán hàng siêu thị
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-th%E1%BB%B1c-ph%E1%BA%A9m"
                                                 title="Tìm việc làm sale thực phẩm" target="_blank">
                                                 Tìm việc làm sale thực phẩm
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-%C4%91%E1%BB%93-gia-d%E1%BB%A5ng"
                                                 title="Tìm việc làm sale đồ gia dụng" target="_blank">
                                                 Tìm việc làm sale đồ gia dụng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-h%C3%A0ng-ti%C3%AAu-d%C3%B9ng"
                                                 title="Tìm việc làm sale hàng tiêu dùng" target="_blank">
                                                 Tìm việc làm sale hàng tiêu dùng
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-kenh-mt-modern-trade"
                                                 title="Tìm việc làm sale kenh mt (modern trade)" target="_blank">
                                                 Tìm việc làm sale kenh mt (modern trade)
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-k%C3%AAnh-mt"
                                                 title="Tìm việc làm giám sát kênh mt" target="_blank">
                                                 Tìm việc làm giám sát kênh mt
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-gt-general-trade"
                                                 title="Tìm việc làm sale gt (general trade)" target="_blank">
                                                 Tìm việc làm sale gt (general trade)
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-gi%C3%A1m-s%C3%A1t-k%C3%AAnh-gt"
                                                 title="Tìm việc làm giám sát kênh gt" target="_blank">
                                                 Tìm việc làm giám sát kênh gt
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-marketing"
                                                 title="Tìm việc làm sale marketing" target="_blank">
                                                 Tìm việc làm sale marketing
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sales-xu%E1%BA%A5t-kh%E1%BA%A9u"
                                                 title="Tìm việc làm sales xuất khẩu" target="_blank">
                                                 Tìm việc làm sales xuất khẩu
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-sale-ngu%E1%BB%93n-h%C3%A0ng-trung"
                                                 title="Tìm việc làm sale nguồn hàng trung" target="_blank">
                                                 Tìm việc làm sale nguồn hàng trung
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-t%C6%B0-v%E1%BA%A5n-th%E1%BA%A9m-m%E1%BB%B9"
                                                 title="Tìm việc làm Tư vấn thẩm mỹ" target="_blank">
                                                 Tìm việc làm Tư vấn thẩm mỹ
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-k%E1%BA%BF-ho%E1%BA%A1ch"
                                                 title="Tìm việc làm Nhân viên Kế hoạch" target="_blank">
                                                 Tìm việc làm Nhân viên Kế hoạch
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-kinh-doanh-gi%C3%A1o-d%E1%BB%A5c-%C4%91%C3%A0o-t%E1%BA%A1o"
                                                 title="Tìm việc làm Kinh doanh giáo dục đào tạo" target="_blank">
                                                 Tìm việc làm Kinh doanh giáo dục đào tạo
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-telesale-giao-d%E1%BB%A5c-%C4%91%C3%A0o-t%E1%BA%A1o"
                                                 title="Tìm việc làm Telesale giao dục đào tạo" target="_blank">
                                                 Tìm việc làm Telesale giao dục đào tạo
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-k%E1%BA%BF-to%C3%A1n-gi%C3%A1-th%C3%A0nh"
                                                 title="Tìm việc làm Nhân viên kế toán giá thành" target="_blank">
                                                 Tìm việc làm Nhân viên kế toán giá thành
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-nh%C3%A2n-vi%C3%AAn-k%E1%BA%BF-to%C3%A1n-thu%E1%BA%BF"
                                                 title="Tìm việc làm Nhân viên kế toán thuế" target="_blank">
                                                 Tìm việc làm Nhân viên kế toán thuế
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-kinh-doanh-it-ph%E1%BA%A7n-m%E1%BB%81m"
                                                 title="Tìm việc làm Kinh doanh IT Phần mềm" target="_blank">
                                                 Tìm việc làm Kinh doanh IT Phần mềm
                                             </a>
                                             <a class="list-item"
                                                 href="https://www.topcv.vn/tim-viec-lam-telesale-it-ph%E1%BA%A7n-m%E1%BB%81m"
                                                 title="Tìm việc làm Telesale IT phần mềm" target="_blank">
                                                 Tìm việc làm Telesale IT phần mềm
                                             </a>
                                         </div>
                                         <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                             <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                             </div>
                                         </div>
                                         <div class="ps__rail-y" style="top: 0px; height: 380px; right: 0px;">
                                             <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 15px;">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <link rel="stylesheet"
             href="https://static.topcv.vn/v4/components/desktop/partials/modal-confirm-job-remote.4991399ab977df16K.css">
         <div class="modal fade" id="modal-confirm-job-remote" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="title">Lưu ý khi ứng tuyển việc làm từ xa!</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>Trước tình trạng gia tăng các hình thức lừa đảo việc làm trên internet được các cơ quan chức
                             năng
                             cảnh báo, TopCV xin lưu ý bạn một số dấu hiệu lừa đảo việc làm như sau:</p>
                         <div class="box-image">
                             <div class="box-item">
                                 <img clas="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/verify-job-remote/img_1.png"
                                     alt="img_1">
                                 <p>Thông tin thiếu minh bạch</p>
                             </div>
                             <div class="box-item">
                                 <img clas="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/verify-job-remote/img_2.png"
                                     alt="img_2">
                                 <p>Hứa hẹn lương cao bất thường</p>
                             </div>
                             <div class="box-item">
                                 <img clas="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/verify-job-remote/img_3.png"
                                     alt="img_3">
                                 <p>Yêu cầu nạp tiền, mua hàng trên app/website</p>
                             </div>
                             <div class="box-item">
                                 <img clas="lazy"
                                     data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/verify-job-remote/img_4.png"
                                     alt="img_4">
                                 <p>Yêu cầu nộp phí phỏng vấn, phí giữ chỗ, phí đồng phục,...</p>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <p>TopCV không chịu trách nhiệm về việc ứng viên tham gia ứng tuyển - đi làm và bị mất tiền vì bất
                             cứ lý do gì, chúng tôi mong bạn thực sự cảnh giác trước những lời mời nạp tiền vào các ứng dụng
                             hoặc nộp tiền trực tiếp cho nhà tuyển dụng. Trường hợp cần hỗ trợ,
                             vui lòng <span class="color-green">Báo cáo tin tuyển dụng</span> hoặc thông báo tới TopCV qua
                             email <a class="color-green" href="mailto:hotro@topcv.vn">hotro@topcv.vn</a></p>
                         <div class="box-footer text-right">
                             <button type="button" class="btn btn-primary confirm-job-remote">Tôi đã hiểu</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal fade" id="popup-setting-notification-job" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <div class="modal-title">
                             <h5 class="title">
                                 Tạo thông báo việc làm
                             </h5>
                         </div>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <i class="fa-light fa-xmark"></i>
                         </button>
                     </div>
                     <div class="modal-body row">
                         <div class="form-group col-md-12">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Từ khoá tìm kiếm
                                     <span class="text-red">*</span></label>
                             </div>
                             <div class="d-block wrapper-keyword-select2 relative">
                                 <input class="form-control" id="setting-notify-keyword" name="keyword"
                                     placeholder="Nhập từ khoá tìm kiếm">
                                 <p class="error mgt-4px"></p>
                             </div>
                         </div>
                         <div class="form-group col-md-6">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Tỉnh/Thành phố
                                 </label>
                             </div>
                             <div class="d-block relative">
                                 <select name="city" id="setting-notify-city" class="form-control select2">
                                     <option value="">Tất cả tỉnh/thành phố</option>
                                     <option value="1">Hà Nội</option>
                                     <option value="2">Hồ Chí Minh</option>
                                     <option value="3">Bình Dương</option>
                                     <option value="4">Bắc Ninh</option>
                                     <option value="5">Đồng Nai</option>
                                     <option value="6">Hưng Yên</option>
                                     <option value="7">Hải Dương</option>
                                     <option value="8">Đà Nẵng</option>
                                     <option value="9">Hải Phòng</option>
                                     <option value="10">An Giang</option>
                                     <option value="11">Bà Rịa-Vũng Tàu</option>
                                     <option value="12">Bắc Giang</option>
                                     <option value="13">Bắc Kạn</option>
                                     <option value="14">Bạc Liêu</option>
                                     <option value="15">Bến Tre</option>
                                     <option value="16">Bình Định</option>
                                     <option value="17">Bình Phước</option>
                                     <option value="18">Bình Thuận</option>
                                     <option value="19">Cà Mau</option>
                                     <option value="20">Cần Thơ</option>
                                     <option value="21">Cao Bằng</option>
                                     <option value="22">Cửu Long</option>
                                     <option value="23">Đắk Lắk</option>
                                     <option value="24">Đắc Nông</option>
                                     <option value="25">Điện Biên</option>
                                     <option value="26">Đồng Tháp</option>
                                     <option value="27">Gia Lai</option>
                                     <option value="28">Hà Giang</option>
                                     <option value="29">Hà Nam</option>
                                     <option value="30">Hà Tĩnh</option>
                                     <option value="31">Hậu Giang</option>
                                     <option value="32">Hoà Bình</option>
                                     <option value="33">Khánh Hoà</option>
                                     <option value="34">Kiên Giang</option>
                                     <option value="35">Kon Tum</option>
                                     <option value="36">Lai Châu</option>
                                     <option value="37">Lâm Đồng</option>
                                     <option value="38">Lạng Sơn</option>
                                     <option value="39">Lào Cai</option>
                                     <option value="40">Long An</option>
                                     <option value="41">Miền Bắc</option>
                                     <option value="42">Miền Nam</option>
                                     <option value="43">Miền Trung</option>
                                     <option value="44">Nam Định</option>
                                     <option value="45">Nghệ An</option>
                                     <option value="46">Ninh Bình</option>
                                     <option value="47">Ninh Thuận</option>
                                     <option value="48">Phú Thọ</option>
                                     <option value="49">Phú Yên</option>
                                     <option value="50">Quảng Bình</option>
                                     <option value="51">Quảng Nam</option>
                                     <option value="52">Quảng Ngãi</option>
                                     <option value="53">Quảng Ninh</option>
                                     <option value="54">Quảng Trị</option>
                                     <option value="55">Sóc Trăng</option>
                                     <option value="56">Sơn La</option>
                                     <option value="57">Tây Ninh</option>
                                     <option value="58">Thái Bình</option>
                                     <option value="59">Thái Nguyên</option>
                                     <option value="60">Thanh Hoá</option>
                                     <option value="61">Thừa Thiên Huế</option>
                                     <option value="62">Tiền Giang</option>
                                     <option value="63">Toàn Quốc</option>
                                     <option value="64">Trà Vinh</option>
                                     <option value="65">Tuyên Quang</option>
                                     <option value="66">Vĩnh Long</option>
                                     <option value="67">Vĩnh Phúc</option>
                                     <option value="68">Yên Bái</option>
                                     <option value="100">Nước Ngoài</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-md-6">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Quận/Huyện
                                 </label>
                             </div>
                             <div class="d-block relative select2-form-popup">
                                 <select name="district" id="setting-notify-district" class="form-control select2">
                                     <option value="">Tất cả quận/huyện</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-md-6">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Mức lương
                                 </label>
                             </div>
                             <div class="d-block relative">
                                 <select name="salary" id="setting-notify-salary" class="form-control select2">
                                     <option value="0">Tất cả mức lương</option>
                                     <option data-from="0" data-to="10000000" value="1">Dưới 10 triệu</option>
                                     <option data-from="10000000" data-to="15000000" value="5">10 - 15 triệu
                                     </option>
                                     <option data-from="15000000" data-to="20000000" value="7">15 - 20 triệu
                                     </option>
                                     <option data-from="20000000" data-to="25000000" value="8">20 - 25 triệu
                                     </option>
                                     <option data-from="25000000" data-to="30000000" value="9">25 - 30 triệu
                                     </option>
                                     <option data-from="30000000" data-to="50000000" value="10">30 - 50 triệu
                                     </option>
                                     <option data-from="50000000" data-to="0" value="11">Trên 50 triệu</option>
                                     <option data-from="0" data-to="0" value="127">Thoả thuận</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-md-6">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Kinh nghiệm
                                 </label>
                             </div>
                             <div class="d-block relative">
                                 <select name="experience" id="setting-notify-experience"
                                     class="form-control select2">
                                     <option value="">Tất cả kinh nghiệm</option>
                                     <option value="1">Chưa có kinh nghiệm</option>
                                     <option value="2">Dưới 1 năm</option>
                                     <option value="3">1 năm</option>
                                     <option value="4">2 năm</option>
                                     <option value="5">3 năm</option>
                                     <option value="6">4 năm</option>
                                     <option value="7">5 năm</option>
                                     <option value="8">Trên 5 năm</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-md-6">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Ngành nghề
                                 </label>
                             </div>
                             <div class="d-block relative">
                                 <select name="category" id="setting-notify-category" class="form-control select2">
                                     <option value="">Tất cả ngành nghề</option>
                                     <option value="10101">An toàn lao động</option>
                                     <option value="10102">Bán hàng kỹ thuật</option>
                                     <option value="10103">Bán lẻ / bán sỉ</option>
                                     <option value="10004">Báo chí / Truyền hình</option>
                                     <option value="10006">Bảo hiểm</option>
                                     <option value="10104">Bảo trì / Sửa chữa</option>
                                     <option value="10007">Bất động sản</option>
                                     <option value="10003">Biên / Phiên dịch</option>
                                     <option value="10005">Bưu chính - Viễn thông</option>
                                     <option value="10008">Chứng khoán / Vàng / Ngoại tệ</option>
                                     <option value="10010">Cơ khí / Chế tạo / Tự động hóa</option>
                                     <option value="10009">Công nghệ cao</option>
                                     <option value="10052">Công nghệ Ô tô</option>
                                     <option value="10131">Công nghệ thông tin</option>
                                     <option value="10012">Dầu khí/Hóa chất</option>
                                     <option value="10013">Dệt may / Da giày</option>
                                     <option value="10111">Địa chất / Khoáng sản</option>
                                     <option value="10014">Dịch vụ khách hàng</option>
                                     <option value="10016">Điện / Điện tử / Điện lạnh</option>
                                     <option value="10015">Điện tử viễn thông</option>
                                     <option value="10011">Du lịch</option>
                                     <option value="10110">Dược phẩm / Công nghệ sinh học</option>
                                     <option value="10017">Giáo dục / Đào tạo</option>
                                     <option value="10113">Hàng cao cấp</option>
                                     <option value="10020">Hàng gia dụng</option>
                                     <option value="10021">Hàng hải</option>
                                     <option value="10022">Hàng không</option>
                                     <option value="10117">Hàng tiêu dùng</option>
                                     <option value="10023">Hành chính / Văn phòng</option>
                                     <option value="10018">Hoá học / Sinh học</option>
                                     <option value="10019">Hoạch định/Dự án</option>
                                     <option value="10024">In ấn / Xuất bản</option>
                                     <option value="10025">IT Phần cứng / Mạng</option>
                                     <option value="10026">IT phần mềm</option>
                                     <option value="10028">Kế toán / Kiểm toán</option>
                                     <option value="10027">Khách sạn / Nhà hàng</option>
                                     <option value="10120">Kiến trúc</option>
                                     <option value="10001">Kinh doanh / Bán hàng</option>
                                     <option value="10048">Logistics</option>
                                     <option value="10036">Luật/Pháp lý</option>
                                     <option value="10029">Marketing / Truyền thông / Quảng cáo</option>
                                     <option value="10030">Môi trường / Xử lý chất thải</option>
                                     <option value="10031">Mỹ phẩm / Trang sức</option>
                                     <option value="10032">Mỹ thuật / Nghệ thuật / Điện ảnh</option>
                                     <option value="10033">Ngân hàng / Tài chính</option>
                                     <option value="11000">Ngành nghề khác</option>
                                     <option value="10132">NGO / Phi chính phủ / Phi lợi nhuận</option>
                                     <option value="10034">Nhân sự</option>
                                     <option value="10035">Nông / Lâm / Ngư nghiệp</option>
                                     <option value="10124">Phi chính phủ / Phi lợi nhuận</option>
                                     <option value="10037">Quản lý chất lượng (QA/QC)</option>
                                     <option value="10038">Quản lý điều hành</option>
                                     <option value="10125">Sản phẩm công nghiệp</option>
                                     <option value="10126">Sản xuất</option>
                                     <option value="10130">Spa / Làm đẹp</option>
                                     <option value="10127">Tài chính / Đầu tư</option>
                                     <option value="10039">Thiết kế đồ họa</option>
                                     <option value="10128">Thiết kế nội thất</option>
                                     <option value="10042">Thời trang</option>
                                     <option value="10129">Thư ký / Trợ lý</option>
                                     <option value="10043">Thực phẩm / Đồ uống</option>
                                     <option value="10046">Tổ chức sự kiện / Quà tặng</option>
                                     <option value="10045">Tư vấn</option>
                                     <option value="10047">Vận tải / Kho vận</option>
                                     <option value="10050">Xây dựng</option>
                                     <option value="10049">Xuất nhập khẩu</option>
                                     <option value="10051">Y tế / Dược</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-md-6">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Hình thức làm việc
                                 </label>
                             </div>
                             <div class="d-block relative">
                                 <select name="type" id="setting-notify-type" class="form-control select2">
                                     <option value="">Tất cả hình thức làm việc</option>
                                     <option value="1">Toàn thời gian</option>
                                     <option value="3">Bán thời gian</option>
                                     <option value="5">Thực tập</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-md-12 box-radio">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Tuần suất nhận thông báo</label>
                             </div>
                             <div class="box-radio_list">
                                 <div class="custom-radio-circle-2 input-radio">
                                     <input id="notify-daily" type="radio" value="0" name="frequency">
                                     <label for="notify-daily">
                                         <div class="check-mark"></div>
                                         <span class="input-radio_label">
                                             Hằng ngày
                                         </span>
                                     </label>
                                 </div>
                                 <div class="custom-radio-circle-2 input-radio">
                                     <input id="notify-weekly" type="radio" value="1" name="frequency">
                                     <label for="notify-weekly">
                                         <div class="check-mark"></div>
                                         <span class="input-radio_label">
                                             Hàng tuần
                                         </span>
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group col-md-12 box-radio">
                             <div class="mb-1 align-self-center">
                                 <label for="">
                                     Nhận thông báo qua</label>
                             </div>
                             <div class="box-radio_list">
                                 <div class="custom-radio-circle-2 input-radio">
                                     <input id="via-email" type="radio" value="1" name="via">
                                     <label for="via-email">
                                         <div class="check-mark"></div>
                                         <span class="input-radio_label">
                                             Email
                                         </span>
                                     </label>
                                 </div>
                                 <div class="custom-radio-circle-2 input-radio">
                                     <input id="via-app" type="radio" value="2" name="via">
                                     <label for="via-app">
                                         <div class="check-mark"></div>
                                         <span class="input-radio_label">
                                             Ứng dụng
                                         </span>
                                     </label>
                                 </div>
                                 <div class="custom-radio-circle-2 input-radio">
                                     <input id="via-all" type="radio" value="0" name="via">
                                     <label for="via-all">
                                         <div class="check-mark"></div>
                                         <span class="input-radio_label">
                                             Cả hai
                                         </span>
                                     </label>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-cancel" data-dismiss="modal">Hủy</button>
                         <button type="button" class="btn btn-topcv-primary btn-send">Tạo mới</button>
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal fade" tabindex="-1" role="dialog"
             id="modal-require-verify-to-setting-job-notification">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title text-dark">Yêu cầu xác thực tài khoản</h4>
                     </div>
                     <div class="modal-body">
                         Bạn vui lòng xác thực tài khoản để sử dụng tính năng này. Xác thực ngay <a
                             href="https://www.topcv.vn/tai-khoan/xac-thuc-email" target="_blank"
                             class="text-highlight">tại đây</a>.
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button>
                     </div>
                 </div>
             </div>
         </div>
         <link rel="stylesheet"
             href="https://static.topcv.vn/v4/css/components/job-notification-setting.bea5fa3f03028ed1K.css">
         <script data-type="lazy" data-src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js" src="https://static.topcv.vn/v4/js/common/job-notification-setting/popup-job-notification-setting.min.b66ea965f6d6b5ba.js"></script>
         <div class="modal fade" tabindex="-1" role="dialog" id="modal-limit-to-apply">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title text-dark">Thông báo</h4>
                     </div>
                     <div class="modal-body">
                         Tài khoản của bạn có dấu hiện bất thường, vui lòng quay lại ứng tuyển vào ngày mai
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button>
                     </div>
                 </div>
             </div>
         </div>

         <div class="modal fade" tabindex="-1" role="dialog" id="modal-notice-job">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-body">
                         <div class="text-center" style="margin-bottom: 40px">
                             <h3 class="text-highlight text-center bold">Phản ánh tin tuyển dụng không chính xác</h3>
                             <p>
                                 Hãy tìm hiểu kỹ về nhà tuyển dụng và công việc bạn ứng tuyển. Bạn nên cẩn trọng với những
                                 công việc yêu cầu nộp phí, hoặc những hợp đồng mập mờ, không rõ ràng.
                                 <br>
                                 Nếu bạn thấy rằng tin tuyển dụng này không đúng, hãy phản ánh với chúng tôi.
                             </p>
                         </div>
                         <form action="https://www.topcv.vn/report" id="form-notice-job" class="form-horizontal">
                             <input type="hidden" name="_token" value="smdPMvHqX17qnv10QZz9sdDGRXX5QBot8Qx98Ayr">
                             <div class="form-group">
                                 <label class="col-xs-3 control-label">Tin tuyển dụng:</label>
                                 <div class="col-xs-9" style="padding-top: 7px">Nhân Viên Video Editor Youtube Lĩnh Vực
                                     Hoạt Hình [Hà Nội] - CÔNG TY TNHH EGMEDIA</div>
                             </div>
                             <div class="form-group">
                                 <label for="" class="control-label col-xs-3">Họ và tên: <span
                                         class="text-danger">*</span></label>
                                 <div class="col-xs-9">
                                     <input type="text" name="job_report_fullname" class="form-control"
                                         placeholder="Họ và tên" required="">
                                     <p class="text-danger job_report_input-error"
                                         style="font-size: 0.9em; margin-top: 5px; display: none" id="fullname-error">Họ
                                         và tên không được trống</p>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="" class="control-label col-xs-3">Số điện thoại: <span
                                         class="text-danger">*</span></label>
                                 <div class="col-xs-9">
                                     <input type="text" name="job_report_phone" class="form-control"
                                         placeholder="0123xxxxxxx" required="">
                                     <p class="text-danger job_report_input-error"
                                         style="font-size: 0.9em; margin-top: 5px; display: none" id="fullname-error">Số
                                         điện thoại không được để trống</p>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="" class="control-label col-xs-3">Địa chỉ: <span
                                         class="danger">*</span></label>
                                 <div class="col-xs-9">
                                     <input type="text" name="job_report_address" class="form-control"
                                         placeholder="Địa chỉ" required="">
                                     <p class="text-danger job_report_input-error"
                                         style="font-size: 0.9em; margin-top: 5px; display: none" id="address-error">Địa
                                         chỉ không được trống</p>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="" class="control-label col-xs-3">Địa chỉ email: <span
                                         class="danger">*</span></label>
                                 <div class="col-xs-9">
                                     <input type="email" name="job_report_email" class="form-control"
                                         placeholder="Email" required="">
                                     <p class="text-danger job_report_input-error"
                                         style="font-size: 0.9em; margin-top: 5px; display: none" id="email-error">Địa
                                         chỉ email không được trống</p>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="" class="control-label col-xs-3">Nội dung: <span
                                         class="danger">*</span></label>
                                 <div class="col-xs-9">
                                     <textarea name="job_report_content" cols="30" rows="10" class="form-control"
                                         placeholder="Bạn vui lòng cung cấp rõ thông tin hoặc bất kỳ bằng chứng (nếu có) để TopCV xử lý trong thời gian sớm nhất"
                                         required=""></textarea>
                                     <p class="text-danger job_report_input-error"
                                         style="font-size: 0.9em; margin-top: 5px; display: none" id="content-error">Nội
                                         dung phản hồi không được trống</p>
                                 </div>
                             </div>
                             <input type="hidden" value="1400884" name="job_report_job_id">
                             <div class="form-group">
                                 <div class="col-xs-9 col-xs-offset-3">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                     <button type="submit" class="btn btn-topcv-primary" id="btn-report-job">Gửi
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal fade" tabindex="-1" role="dialog" id="modal-deny-apply">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                 aria-hidden="true">×</span></button>
                         <h4 class="modal-title"><span class="text-highlight"><i class="fa fa-info-circle"
                                     style="margin-right: 5px"></i></span>Thông báo</h4>
                     </div>
                     <div class="modal-body text-center">
                         <p><img loading="lazy" src="https://www.topcv.vn/images/toppy-search.png" alt=""
                                 style="width: 80px"></p><br>
                         <p>Chức năng ứng tuyển công việc trên tài khoản của bạn đang tạm thời bị khóa..</p>
                         <p>Vui lòng liên hệ hotline (024) 6680 5588 hoặc email <a class="text-highlight"
                                 href="mailto:hotro@topcv.vn">hotro@topcv.vn</a> để được hỗ trợ.</p>
                     </div>
                 </div>
             </div>
         </div>
         <style>
             .fade-enter-active,
             .fade-leave-active {
                 transition: opacity .5s;
             }

             .fade-enter,
             .fade-leave-to

             /* .fade-leave-active below version 2.1.8 */
                 {
                 opacity: 0;
             }

             .no-mode-translate-fade-enter-active,
             .no-mode-translate-fade-leave-active {
                 transition: all 0.2s;
             }

             .no-mode-translate-fade-enter,
             .no-mode-translate-fade-leave-active {
                 opacity: 0;
             }

             .no-mode-translate-fade-enter {
                 transform: translateX(31px);
             }

             .no-mode-translate-fade-leave-active {
                 transform: translateX(-31px);
             }
         </style>
         <div class="modal fade" id="notification-age-modal" role="dialog">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-title">
                         <h3>Thông báo</h3>
                     </div>
                     <div class="modal-body">
                         <p style="font-size: 15px; font-weight: bold;">Công việc cấp độ quản lý yêu cầu ứng viên từ 22
                             tuổi trở lên</p>
                         <p style="color: #666666; margin-bottom: 0px;"><i>Nếu thông tin độ tuổi của bạn không chính xác
                                 vui lòng cập nhật lại năm sinh trong mục <a style="color: #00B14F;"
                                     href="https://www.topcv.vn/cai-dat-goi-y-viec-lam" target="_blank">Cài đặt gợi ý
                                     việc làm</a></i></p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal"
                             data-dismiss="modal">Đóng</button>
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal fade" id="notice-intern-apply-modal" role="dialog">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button class="close" data-bs-dismiss="modal" data-dismiss="modal">
                             <i class="fa fa-xmark"></i>
                         </button>
                     </div>
                     <div class="modal-body">
                         <img class=""
                             data-src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/modal-appply/notice-intern.png"
                             alt="notice-intern"
                             src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-detail/modal-appply/notice-intern.png">
                         <p class="notice-exp">Số năm kinh nghiệm của bạn chưa phù hợp với yêu cầu của vị trí này. </p>
                         <p class="confirm">Bạn có muốn tiếp tục ứng tuyển?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-sm close-modal" data-bs-dismiss="modal"
                             data-dismiss="modal">Hủy
                         </button>
                         <button type="button" class="btn btn-sm btn-default btn-continue-apply">Tiếp tục ứng
                             tuyển</button>
                     </div>
                 </div>
             </div>
         </div>
         <script>
             $(function() {
                 $(document).on('click', '#notice-intern-apply-modal .btn-continue-apply', function(event) {
                     $('#notice-intern-apply-modal').modal('hide');
                     $('#modal-apply-cv').modal('show');
                     window.trackingTopCV.internConfirmApply();
                 });

                 $('#notice-intern-apply-modal').on('show.bs.modal', function(event) {
                     window.trackingTopCV.alertInternApply();
                 });
                 $('#notice-intern-apply-modal').on('hidden.bs.modal', function(event) {
                     window.trackingTopCV.internQuitApply();
                 });
             });
         </script>
         <div id="modal-batch-apply" class="modal fade">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title"><!----> <!---->
                             <div>
                                 <p class="title">Thêm lựa chọn - thêm cơ hội</p>
                                 <p class="subtitle">Dưới đây là các tin tuyển dụng tương tự với công việc mà bạn vừa ứng
                                     tuyển, bạn có thể lựa chọn những tin tuyển dụng phù hợp để thực hiện ứng tuyển nhanh
                                     qua một cú click.</p>
                             </div>
                         </h4>
                         <div class="modal-header-selected"><label class="checkbox-container"><input
                                     id="toggle-all-jobs" type="checkbox"> <span class="checkmark"></span></label>
                             <label for="toggle-all-jobs">Đã chọn <strong>0</strong> việc làm</label>
                         </div>
                     </div>
                     <div class="modal-body">
                         <div class="no-mode-translate-demo-wrapper">
                             <div class="similar-job-list"></div>
                             <div style="display: none;">
                                 <div class="row">
                                     <div id="frm-select-cv-online">
                                         <div class="col-xs-6"><label class="text-dark-gray">Chọn CV online: <span
                                                     class="italic text-primary text-small"><i
                                                         class="fa fa-thumbs-o-up"></i> Khuyên dùng</span></label>
                                             <div style="text-align: center; margin-bottom: 20px;"><label
                                                     class="text-dark-gray">Bạn chưa có CV nào</label><br> <a
                                                     href="https://www.topcv.vn/mau-cv" target="_blank"
                                                     class="btn btn-sm btn-topcv-primary"
                                                     style="display: inline-block; margin-top: 17px;"><i
                                                         class="fa fa-plus"></i> Tạo CV Ngay</a>
                                                 <div class="text-danger text-small"
                                                     style="margin-top: 10px; font-style: italic;">(Sau khi tạo mới CV,
                                                     tải lại trang này để có thể ứng tuyển nhanh)</div>
                                             </div>
                                         </div>
                                         <div class="col-xs-6"><label class="text-dark-gray">Chọn CV Upload</label>
                                             <!---->
                                         </div> <!---->
                                         <div class="text-center col-xs-12" style="margin-bottom: 15px;"><a
                                                 href="#" class="btn btn-sm btn-topcv-primary bold"><i
                                                     class="fa fa-upload"></i> Tải lên CV từ máy tính</a></div>
                                     </div>
                                 </div>
                                 <div class="row" style="display: none;">
                                     <div id="frm-upload" class="col-xs-12">
                                         <div class="row form-group">
                                             <div class="col-sm-8 col-xs-12">
                                                 <p class="input-label text-dark-gray"><label>Tải lên CV đã
                                                         có</label>&nbsp; <span class="text-gray text-small">File doc,
                                                         docx, pdf. Tối đa 5MB.</span></p>
                                             </div>
                                             <div class="col-sm-4 col-xs-12 text-right"><a href="#"
                                                     class="btn-sm btn-topcv-primary bold"><i class="fa fa-cloud-o"></i>
                                                     Sử dụng CV Online</a></div>
                                         </div> <!---->
                                         <div class="form-group"><input type="file" name="cv_file_batch"
                                                 id="filer_input_batch" accept="doc, docx, pdf"
                                                 style="display: none;"></div>
                                         <div class="form-group"><label for="" class="text-dark-gray">Họ và
                                                 tên<span class="text-danger">*</span> :</label> <input type="text"
                                                 placeholder="Họ tên hiển thị với Nhà tuyển dụng" name="fullname"
                                                 class="form-control input-sm">
                                             <p id="fullnameErrorMessage" class="text-small text-danger italic"
                                                 style="margin-top: 5px; display: none;"></p>
                                         </div>
                                         <div class="row">
                                             <div class="col-xs-6">
                                                 <div class="form-group"><label for=""
                                                         class="text-dark-gray">Email<span class="text-danger">*</span>
                                                         :</label> <input type="text"
                                                         placeholder="Email hiển thị với Nhà tuyển dụng" name="email"
                                                         class="form-control input-sm text-dark-gray"
                                                         style="font-size: 12px;"></div>
                                             </div>
                                             <div class="col-xs-6">
                                                 <div class="form-group"><label for=""
                                                         class="text-dark-gray">Số điện thoại<span
                                                             class="text-danger">*</span> :</label> <input
                                                         type="text"
                                                         placeholder="Số điện thoại hiển thị với Nhà tuyển dụng"
                                                         name="phone" class="form-control input-sm text-dark-gray"
                                                         style="font-size: 12px;"></div>
                                             </div>
                                             <div class="col-xs-12">
                                                 <div class="form-group align-center"><input type="checkbox"
                                                         name="is_save_batch_cv_upload" value="0"
                                                         id="cb-save-batch-cv-upload" class="js-switch"
                                                         data-switchery="true" style="display: none;"><span
                                                         class="switchery switchery-small switchery-default"
                                                         style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small
                                                             style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                                                     <span style="margin-left: 10px;">Lưu CV (Dùng để quản lý trong <a
                                                             target="_blank" href="https://www.topcv.vn/quan-ly-cv"
                                                             class="text-highlight">Hồ Sơ CV</a> và giúp nhà tuyển dụng
                                                         tiếp cận bạn)</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="formInfoUserUpload">
                                         <div class="form-group"><label>Họ và tên<span class="text-danger">*</span>
                                                 :</label> <input type="text" value=""
                                                 placeholder="Họ tên hiển thị với Nhà tuyển dụng" name="fullname"
                                                 class="form-control input-sm" style="font-size: 12px;">
                                             <p id="fullnameErrorMessage" class="text-small text-danger italic"
                                                 style="margin-top: 5px; display: none;"></p>
                                         </div>
                                         <div class="row">
                                             <div class="col-xs-6">
                                                 <div class="form-group"><label>Email<span class="text-danger">*</span>
                                                         :</label> <input type="text" value=""
                                                         placeholder="Email hiển thị với Nhà tuyển dụng" name="email"
                                                         class="form-control input-sm" style="font-size: 12px;"></div>
                                             </div>
                                             <div class="col-xs-6">
                                                 <div class="form-group"><label>Số điện thoại<span
                                                             class="text-danger">*</span> :</label> <input
                                                         type="text" value=""
                                                         placeholder="Số điện thoại hiển thị với Nhà tuyển dụng"
                                                         name="phone" class="form-control input-sm"
                                                         style="font-size: 12px;"></div>
                                             </div>
                                         </div>
                                     </div> <label class="text-dark-gray">Thư giới thiệu: </label>
                                     <textarea name="letter" rows="3"
                                         placeholder="Viết giới thiệu ngắn gọn về bản thân (điểm mạnh, điểm yếu) và nêu rõ mong muốn, lý do làm việc tại công ty này. Đây là cách gây ấn tượng với nhà tuyển dụng nếu bạn có chưa có kinh nghiệm làm việc (hoặc CV không tốt)."
                                         class="form-control text-dark-gray" style="font-size: 12px;"></textarea>
                                 </div>
                             </div>
                             <div style="display: none;">
                                 <div class="panel panel-default">
                                     <div class="panel-body">
                                         <div class="row">
                                             <div class="col-md-10">
                                                 <div style="padding-bottom: 20px;">
                                                     <p><strong>Tin tuyển dụng</strong></p>
                                                 </div>
                                             </div>
                                             <div class="col-md-2"><a href="#" class="btn btn-xs btn-default "
                                                     style="padding: 1px 5px;"><i class="fa fa-pencil"></i> Thay đổi</a>
                                             </div>
                                         </div>
                                         <div class="row"
                                             style="border-top: 1px dashed rgb(234, 234, 234); padding-top: 20px;">
                                             <div class="col-md-10">
                                                 <div class="row">
                                                     <div class="col-md-12">
                                                         <p><strong>Thông tin ứng tuyển</strong></p>
                                                     </div>
                                                     <div class="col-md-4"><!----></div>
                                                     <div class="col-md-8">
                                                         <p style="font-size: 12px;"><strong><i aria-hidden="true"
                                                                     class="fa fa-envelope-o"></i> Thư giới thiệu</strong>
                                                         </p>
                                                         <div>
                                                             <p>Cập nhật thư giới thiệu là cách gây ấn tượng với nhà tuyển
                                                                 dụng nếu bạn có chưa có kinh nghiệm làm việc (hoặc CV không
                                                                 tốt)</p>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-md-2"><a href="#" class="btn btn-xs btn-default "
                                                     style="padding: 1px 5px;"><i class="fa fa-pencil"></i> Thay đổi</a>
                                             </div> <br>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <div class="modal-footer-column"><a href="#" type="button" class="btn btn-cancel">
                                 Bỏ qua
                             </a> <a href="#" type="button" class="btn btn-primary"><i
                                     class="fa-regular fa-paper-plane"></i>
                                 Ứng tuyển ngay
                             </a></div>
                     </div>
                 </div>
             </div>
         </div>


         <!-- Apply Modal -->
         <!-- Apply Modal -->
         <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="applyModalLabel">Chọn CV của bạn và viết thư ứng tuyển</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         @auth('candidate')
                             <form id="applyForm" action="{{ route('applications.store') }}" method="POST">
                                 @csrf
                                 <input type="hidden" name="job_posting_id" value="{{ $jobPosting->id }}">
                                 <div class="form-group">
                                     <label for="cv_id">Chọn CV</label>
                                     <select class="form-control" id="cv_id" name="cv_id">
                                         @foreach (Auth::guard('candidate')->user()->cvs as $cv)
                                             <option value="{{ $cv->id }}">
                                                 {{ $cv->cv_name ?? $cv->cv_path }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="application_letter">Thư ứng tuyển</label>
                                     <textarea class="form-control" id="application_letter" name="application_letter" rows="4"></textarea>
                                 </div>
                             </form>
                         @else
                             <p>Bạn cần đăng nhập để ứng tuyển.</p>
                         @endauth
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                         @auth('candidate')
                             <button type="button" class="btn btn-primary" onclick="submitApplyForm()">Ứng tuyển
                                 ngay</button>
                         @endauth
                     </div>
                 </div>
             </div>
         </div>

         <script>
             function submitApplyForm() {
                 document.getElementById('applyForm').submit();
             }
         </script>


         <script>
             function submitApplyForm() {
                 document.getElementById('applyForm').submit();
             }
         </script>
         <script>
             var search = new URLSearchParams(location.search);
             ta('pageview', Object.assign(topcvJob, {
                 utm_source: search.get('utm_source'),
                 utm_medium: search.get('utm_medium'),
                 utm_campaign: search.get('utm_campaign')
             }))
         </script>
     </div>
     <link rel="stylesheet" as="style" href="https://www.topcv.vn/v2/plugins/select2/css/select2.min.css" />
     <link rel="stylesheet" href="https://static.topcv.vn/v4/css/app.min.566873512a29dfc6K.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/job-detail-new.min.26710c4334316a27K.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/simple-search-job.min.a9523861ff7518f5K.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/job-list-image-company.b29f61ea3112b9d5K.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/jobs/batch-apply.8a4a0ab47640f636K.css">
     <link rel="stylesheet" href="https://www.topcv.vn/chartjs/dist/Chart.min.css">
     <link rel="stylesheet"
         href="https://static.topcv.vn/v4/css/components/desktop/job-suggestion-courses.min.6d5f7bf390a31d2bK.css">
     <style>
     </style>
     <style>
         #toast-container>div {
             opacity: unset;
         }

         [v-cloak] {
             display: none !important;
         }
     </style>
     <script>
         window.lazyFunctions = {};
     </script>
     <script async src="https://www.googletagmanager.com/gtag/js?id=AW-823531084"></script>
 @endsection
