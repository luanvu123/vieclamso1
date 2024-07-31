@extends('layout')
 @section('content')
    <div id="main">
        <div class="container container-preview">
            <div class="row">
                <div class="col-md-9">
                    <div class="frame-container ">
                        <div class="wrap-skeleton" id="skeleton">
                            <div class="skeleton is-animated"></div>
                            <img src="https://www.topcv.vn/images/skeleton.png" alt />
                        </div>
                        <iframe id="template-preview-iframe" class="iframe" loading="lazy" src frameBorder="0"
                            onload="handleLoadPreview()" height="800px" width="100%"></iframe>
                    </div>
                </div>
                <div class="col-md-3 action-box" id="action">
                    <h1 class="action-box_title">
                        Mẫu CV tiếng Việt - Trang trọng
                    </h1>
                    <div class="action-box_section">
                        <div class="action-box_section-title">
                            Ngôn ngữ
                        </div>
                        <div class="action-box_section-content language">
                            <div class="language-item  active " data-name="Việt" data-value="vi">
                                <span>Tiếng Việt</span>
                            </div>
                            <div class="language-item " data-name="Anh" data-value="en">
                                <span>Tiếng Anh</span>
                            </div>
                            <div class="language-item " data-name="Nhật" data-value="jp">
                                <span>Tiếng Nhật</span>
                            </div>
                        </div>
                    </div>
                    <div class="action-box_section section-color">
                        <div class="action-box_section-title">
                            Màu sắc
                        </div>
                        <div class="action-box_section-content color">
                            <div class="color-item  active " data-value="4D9DC3"
                                style="background-color: #4D9DC3"></div>
                            <div class="color-item " data-value="FF9090" style="background-color: #FF9090"></div>
                            <div class="color-item " data-value="2F5A9B" style="background-color: #2F5A9B"></div>
                            <div class="color-item " data-value="CD7BFF" style="background-color: #CD7BFF"></div>
                            <div class="color-item " data-value="4CD4BC" style="background-color: #4CD4BC"></div>
                            <div class="color-item " data-value="595758" style="background-color: #595758"></div>
                            <div class="color-item " data-value="F16833" style="background-color: #F16833"></div>
                        </div>
                    </div>
                    <div class="action-box_section">
                        <div class="action-box_section-title">
                            Vị trí ứng tuyển
                        </div>
                        <div class="action-box_section-content">
                            <select class="form-control" id="modal-preview-category-selector" name="level"
                                style="width: 100%">
                                <option value>Chọn mẫu nội dung</option>
                                <option value="10017" data-level="1" data-category="10017">Chuyên viên đào tạo
                                    nội bộ
                                </option>
                                <option value="10029" data-level="3" data-category="10029">Chuyên viên Marketing
                                </option>
                                <option value="10001" data-level="2" data-category="10001">Giám đốc kinh doanh
                                </option>
                                <option value="10001" data-level="3" data-category="10001">Giám đốc Quan hệ Khách
                                    hàng Doanh nghiệp
                                </option>
                                <option value="10001" data-level="1" data-category="10001">Nhân viên bán hàng
                                </option>
                                <option value="10045" data-level="1" data-category="10045">Nhân viên tư vấn
                                </option>
                                <option value="10023" data-level="1" data-category="10023">Nhân viên Lễ tân Hành
                                    chính
                                </option>
                                <option value="10048" data-level="3" data-category="10048">Chuyên viên Logistics
                                </option>
                                <option value="10131" data-level="3" data-category="10131">Kỹ sư phần mềm
                                </option>
                                <option value="10028" data-level="3" data-category="10028">Nhân viên Kế toán
                                </option>
                                <option value="10051" data-level="1" data-category="10051">Trình Dược Viên
                                </option>
                                <option value="10003" data-level="1" data-category="10003">Giáo viên Tiếng Anh
                                </option>
                                <option value="10037" data-level="1" data-category="10037">Nhân viên Kiểm soát
                                    chất lượng
                                </option>
                                <option value="10034" data-level="1" data-category="10034">Nhân viên Hành chính
                                    nhân sự
                                </option>
                                <option value="10010" data-level="1" data-category="10010">Kỹ sư cơ khí chế tạo
                                    máy
                                </option>
                                <option value="10017" data-level="2" data-category="10017">Trưởng nhóm Đào tạo
                                </option>
                                <option value="10045" data-level="2" data-category="10045">Trưởng nhóm Telesales
                                </option>
                                <option value="10023" data-level="2" data-category="10023">Quản lý Phòng Hành
                                    chính
                                </option>
                                <option value="10047" data-level="2" data-category="10047">Trưởng nhóm Vận hành
                                    kho
                                </option>
                                <option value="10026" data-level="2" data-category="10026">Trưởng nhóm Tester
                                </option>
                                <option value="10028" data-level="2" data-category="10028">Kế toán trưởng
                                </option>
                                <option value="10029" data-level="1" data-category="10029">Thực tập sinh
                                </option>
                                <option value="10027" data-level="3" data-category="10027">Quản lý khách sạn
                                </option>
                                <option value="10027" data-level="3" data-category="10027">Lễ tân khách sạn
                                </option>
                                <option value="10027" data-level="3" data-category="10027">Quản lý nhà hàng
                                </option>
                                <option value="10051" data-level="3" data-category="10051">Điều dưỡng
                                </option>
                                <option value="10131" data-level="3" data-category="10131">Lập trình viên
                                </option>
                                <option value="10131" data-level="3" data-category="10131">IT Helpdesk
                                </option>
                                <option value="10131" data-level="3" data-category="10131">Business Analyst
                                </option>
                                <option value="10131" data-level="3" data-category="10131">Data Analyst
                                </option>
                                <option value="10039" data-level="3" data-category="10039">Designer
                                </option>
                                <option value="10001" data-level="3" data-category="10001">Nhân viên kinh doanh
                                </option>
                                <option value="10001" data-level="3" data-category="10001">Nhân viên telesales
                                </option>
                                <option value="10048" data-level="3" data-category="10048">Logistics Sales
                                </option>
                                <option value="10017" data-level="2" data-category="10017">Trợ giảng tiếng Anh
                                </option>
                                <option value="10033" data-level="3" data-category="10033">Ngân hàng
                                </option>
                                <option value="10050" data-level="3" data-category="10050">Kỹ sư xây dựng
                                </option>
                                <option value="10043" data-level="3" data-category="10043">F&amp;B
                                </option>
                                <option value="10023" data-level="3" data-category="10023">Nhân viên văn phòng
                                </option>
                                <option value="10014" data-level="3" data-category="10014">Chăm sóc khách hàng
                                </option>
                                <option value="10034" data-level="3" data-category="10034">Tuyển dụng nhân sự
                                </option>
                                <option value="10006" data-level="3" data-category="10006">Chuyên viên tư vấn bảo
                                    hiểm
                                </option>
                                <option value="10029" data-level="3" data-category="10029">Digital marketing
                                </option>
                                <option value="10029" data-level="2" data-category="10029">Content marketing
                                </option>
                                <option value="10001" data-level="2" data-category="10001">Nhân viên vận hành sàn
                                    thương mại điện tử
                                </option>
                                <option value="10028" data-level="3" data-category="10028">Kế toán tổng hợp
                                </option>
                                <option value="10028" data-level="3" data-category="10028">Kế toán nội bộ
                                </option>
                                <option value="10028" data-level="1" data-category="10028">Thực tập sinh kế toán
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="action-box_section create-cv">
                        <button style="border: none" class="btn btn-create-cv btn-use chooseCvData"
                            data-template="formal" data-title="Trang trọng">
                            Tạo CV với mẫu thiết kế này
                        </button>
                        <a href="https://www.topcv.vn/mau-cv" class="btn btn-view-list-cv"><i
                                class="fa fa-arrow-left"></i>
                            Danh sách mẫu CV</a>
                    </div>
                </div>
            </div>
            <div class=" box-content list-job-recommend">
                <div class="suggest-ai lazy" id="suggest-job-section" data-lazy-function="initJobSuggestList">
                    <img id="arrow"
                        src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/v4/image/job-new/arrow.png" alt>
                    <div class="container">
                        <div class="box-header">
                            <div class="box-header__title">
                                <h2 class="text_ellipsis uppercase box-title">
                                    Gợi ý việc làm phù hợp
                                </h2>
                            </div>
                            <div class="box-header__tool">
                                <span class="see-more">
                                    <a href="https://www.topcv.vn/viec-lam-phu-hop" target="_blank">
                                        Xem tất cả
                                    </a>
                                </span>
                                <span class="btn-pre btn-slick-arrow slick-arrow" aria-disabled="false">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </span>
                                <span class="btn-next btn-slick-arrow slick-arrow" aria-disabled="false">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="box-owl-slider">
                            <div class="row loading">
                                <div class="col-md-6">
                                    <img class="lazy"
                                        data-src="https://static.topcv.vn/v4/image/loading/job-suggest-box.svg"
                                        width="560px" alt="Loading Job Content" height="244px">
                                </div>
                                <div class="col-md-6">
                                    <img class="lazy"
                                        data-src="https://static.topcv.vn/v4/image/loading/job-suggest-box.svg"
                                        width="560px" alt="Loading Job Content" height="244px">
                                </div>
                            </div>
                            <div id="job-suggest-list" class="body job-suggest-list ta-slick"
                                :data-total-item="jobsRecommend.length">
                                <div v-for="(job,index)
                    in jobsRecommend"
                                    :id="'item_suggest_job_' + job.id"
                                    class="box-job job-ta-slick-suggestion job-ta-suggestion" :data-job-id="job.id"
                                    :data-jr-id="job.job_recommendation_id"
                                    :data-job-slick-id="'item_suggest_job_' + job.id">
                                    <div class="wrap-item"
                                        :class="[job.is_diamond_employer ? 'bg-diamond-employer' : job.is_vip_employer ?
                                            'bg-vip-employer' : job.is_bg_featured ? 'bg-highlight' : job.is_yellow_bg ?
                                            'bg-yellow' : '', job.is_job_flash ?
                                            'bg-flash-job' : ''
                                        ]">
                                        <div class="box-company-logo">
                                            <div class="avatar">
                                                <a data-toggle="tooltip" :data-original-title="job.company.name"
                                                    target="_blank" data-placement="top" data-container="body"
                                                    :href="job.company.url">
                                                    <img :src="job.company.logo_url" class="w-100"
                                                        :alt="job.company.name" :title="job.company.name">
                                                </a>
                                            </div>
                                            <div v-if="job.is_job_flash" class="tag-job-flash"
                                                data-toggle="tooltip-flash-job" data-trigger="manual"
                                                data-html="true" :data-job-id="job.id"
                                                :data-template="`<div data-job-id=${job.id} class=&quot;flash-job-tag-tooltip tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>`"
                                                title="<div>Tin đăng được NTD tương tác thường xuyên trong 24 giờ qua | <a class='flash-job-tag-tooltip-view-all' href='https://www.topcv.vn/huy-hieu-tia-set'>Xem tất cả</a> <i class='fa fa-chevron-right'></i></div>"
                                                data-placement="top" data-container="body">
                                                <img src="https://static.topcv.vn/v4/image/job-list/icon-flash.webp"
                                                    alt="icon-flash">
                                            </div>
                                        </div>
                                        <div class="info-job">
                                            <div class="info-job-header">
                                                <h3 class="title" :class="[job.is_highlight ? 'highlight' : '']">
                                                    <a target="_blank" :class="[job.is_highlight ? 'highlight' : '']"
                                                        :href="job.url">
                                                        <span v-if="job.is_diamond_employer"
                                                            class="label tag-diamond-employer-home"
                                                            data-toggle="tooltip" title="Nhà tuyển dụng kim cương"
                                                            data-placement="top" data-container="body">
                                                            <i class="fa-solid fa-gem"></i> Top
                                                        </span>
                                                        <span v-if="job.is_vip_employer"
                                                            class="label tag-employer-vip-home">Top</span>
                                                        <span v-if="job.is_hot"
                                                            class="label label-danger urgent">Hot</span>
                                                        <span v-if="job.is_urgent"
                                                            class="label label-warning urgent">Gấp</span>
                                                        <span v-if="job.is_new"
                                                            class="label label-danger new">Mới</span>
                                                        <span :class="[job.is_highlight ? 'highlight' : '']"
                                                            data-toggle="tooltip" :data-original-title="job.title"
                                                            data-placement="top" data-container="body"
                                                            class="bold transform-job-title">{{ job . title }}</span>
                                                        <span class="icon-verified-employer level-five">
                                                            <i v-if="job.employer_verified"
                                                                class="fa-solid fa-circle-check icon-verified-employer-tooltip"
                                                                data-container="#suggest-job-section"
                                                                data-toggle="tooltip" data-html="true"
                                                                title="
                                                  <b>Nhà tuyển dụng</b><span> đã được xác thực:</span><br>
                                                  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực email tên miền công ty</span><br>
                                                  <span><i class='fa-solid fa-circle-check color-green'></i> Đã xác thực số điện thoại</span><br>
                                                  <span><i class='fa-solid fa-circle-check color-green'></i> Đã được duyệt Giấy phép kinh doanh</span><br>
                                                  <span><i class='fa-solid fa-circle-check color-green'></i> Tài khoản NTD được tạo tối thiểu 6 tháng</span><br>
                                                  <span><i class='fa-solid fa-circle-check color-green'></i> Chưa có lịch sử bị báo cáo tin đăng</span><br>"
                                                                data-placement="top"></i></span>
                                                    </a>
                                                </h3>
                                                <div class="salary">
                                                    <label> {{ job . salary }}</label>
                                                </div>
                                            </div>
                                            <a :href="job.company.url" class="company">
                                                <i class="fa-regular fa-buildings"></i>
                                                <span data-toggle="tooltip" :data-original-title="job.company.name"
                                                    data-placement="top"
                                                    data-container="body">{{ job . company . name }}</span>
                                            </a>
                                            <div class="wrap-update-icon">
                                                <p class="address">
                                                    <i class="fa-regular fa-location-dot"></i>
                                                    <span data-toggle="tooltip" data-html="true"
                                                        :title="job.cities" data-placement="top"
                                                        data-container="body">{{ job . short_cities }}</span>
                                                </p>
                                                <div class="icon">
                                                    <div :id="'box-save-job-' + job.id"
                                                        class="btn-remove-job-recommend" :data-id="job.id"
                                                        data-toggle="tooltip" data-html="true" title="Bỏ qua"
                                                        data-placement="top" data-container="body">
                                                        <i class="fa-regular fa-trash"></i>
                                                    </div>
                                                    <div :id="'box-save-job-' + job.id" class="btn-save-job"
                                                        :class="[savedJobIds.includes(job.id) ? 'saved' : 'unsaved',
                                                            'box-save-job-' + job.id
                                                        ]"
                                                        data-toggle="tooltip"
                                                        :data-type-submit="savedJobIds.includes(job.id) ? 'unsave' : 'save'"
                                                        :data-id="job.id" data-placement="top"
                                                        data-container="body">
                                                        <i class="fa-solid fa-heart"></i>
                                                        <link rel="stylesheet"
                                                            href="https://static.topcv.vn/v4/css/components/tooltip-popper/saved-job-tooltip.f6f880018f1bdc66K.css">
                                                        <div id="saved-job-tooltip">
                                                            <h5>Lưu tin thành công!</h5>
                                                            <div class="link-saved-job">
                                                                Để xem
                                                                <a href="https://www.topcv.vn/viec-lam-da-luu"
                                                                    target="blank">Danh sách việc làm đã lưu</a>,
                                                                vui lòng truy cập:
                                                            </div>
                                                            <div class="guide-text">Menu => Việc làm => Việc làm đã
                                                                lưu</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-header__tool--mobile">
                                <span class="btn-pre btn-slick-arrow slick-arrow" aria-disabled="false">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </span>
                                <span class="btn-next btn-slick-arrow slick-arrow" aria-disabled="false">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" box-content box-list-cv">
                <div class="box-content_header">
                    <h2 class="title">
                        Tham khảo 50+ mẫu CV chất lượng, chuyên nghiệp đề xuất bởi TopCV
                    </h2>
                    <div class="action">
                        <div class="btn-location left" id="btn-pre-list-cv">
                            <i class="fa-regular fa-chevron-left"></i>
                        </div>
                        <div class="btn-location right" id="btn-next-list-cv">
                            <i class="fa-regular fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                <div class="box-content_detail list-cvs">
                    <div id="list-cvs">
                        <div class="template__item " data-name="delicate_2_v2" data-title="Tinh tế 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;529300&quot;, &quot;212F3F&quot;, &quot;BC4922&quot;, &quot;994787&quot;, &quot;247796&quot;, &quot;595758&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/delicate_2_v2.png"
                                alt />
                            <p>Tinh tế 2</p>
                        </div>
                        <div class="template__item " data-name="premium_v2" data-title="Cao Cấp"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;04a08c&quot;,&quot;3d3e40&quot;,&quot;b53534&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/premium_v2.png"
                                alt />
                            <p>Cao Cấp</p>
                        </div>
                        <div class="template__item " data-name="senior_v2" data-title="Senior"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/senior_v2.png"
                                alt />
                            <p>Senior</p>
                        </div>
                        <div class="template__item " data-name="experts" data-title="Chuyên gia"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;000000&quot;, &quot;003161&quot;, &quot;1D1B77&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/experts.png"
                                alt />
                            <p>Chuyên gia</p>
                        </div>
                        <div class="template__item " data-name="basic_4_v2" data-title="Basic 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00B4D8&quot;, &quot;0083B1&quot;, &quot;FFA211&quot;, &quot;17AD30&quot;, &quot;FF3737&quot;, &quot;646D79&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_4_v2.png"
                                alt />
                            <p>Basic 4</p>
                        </div>
                        <div class="template__item " data-name="basic_5_v2" data-title="Basic 5"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00B4D8&quot;, &quot;00B4D8&quot;, &quot;FFA211&quot;, &quot;17AD30&quot;, &quot;FF3737&quot;, &quot;646D79&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_5_v2.png"
                                alt />
                            <p>Basic 5</p>
                        </div>
                        <div class="template__item " data-name="modern_2_v2" data-title="Hiện Đại 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;555555&quot;, &quot;38618c&quot;, &quot;118ab2&quot;, &quot;ef476f&quot;, &quot;1a936f&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_2_v2.png"
                                alt />
                            <p>Hiện Đại 2</p>
                        </div>
                        <div class="template__item " data-name="modern_6_v2" data-title="Hiện đại 6"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00B4D8&quot;, &quot;0083B1&quot;, &quot;FFA211&quot;, &quot;17AD30&quot;, &quot;FF3737&quot;, &quot;646D79&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_6_v2.png"
                                alt />
                            <p>Hiện đại 6</p>
                        </div>
                        <div class="template__item " data-name="default_v2" data-title="Tiêu chuẩn"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;000000&quot;, &quot;404040&quot;, &quot;1F3F57&quot;, &quot;3A0912&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/default_v2.png"
                                alt />
                            <p>Tiêu chuẩn</p>
                        </div>
                        <div class="template__item " data-name="timeline_clean_v2" data-title="Dòng Thời Gian"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;32A1B5&quot;, &quot;EC8F00&quot;, &quot;C44B4B&quot;, &quot;00A915&quot;, &quot;646D79&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/timeline_clean_v2.png"
                                alt />
                            <p>Dòng Thời Gian</p>
                        </div>
                        <div class="template__item " data-name="pro_1_v2" data-title="Chuyên Nghiệp 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;1FBC89&quot;, &quot;FC8383&quot;, &quot;6D84A3&quot;, &quot;FFA211&quot;, &quot;866DA3&quot;, &quot;6DA39F&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/pro_1_v2.png"
                                alt />
                            <p>Chuyên Nghiệp 1</p>
                        </div>
                        <div class="template__item " data-name="basic_3_v2" data-title="Basic 3"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;F4E8F8&quot;, &quot;CAEFF5&quot;, &quot;E7F6E0&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_3_v2.png"
                                alt />
                            <p>Basic 3</p>
                        </div>
                        <div class="template__item " data-name="onepage_impressive_3_v2" data-title="Ấn Tượng 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;1FBC89&quot;, &quot;FC8383&quot;, &quot;6D84A3&quot;, &quot;FFA211&quot;, &quot;866DA3&quot;, &quot;6DA39F&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_impressive_3_v2.png"
                                alt />
                            <p>Ấn Tượng 4</p>
                        </div>
                        <div class="template__item " data-name="gradient_1_v2" data-title="Gradient 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;BDA4ED&quot;, &quot;71B8FF&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/gradient_1_v2.png"
                                alt />
                            <p>Gradient 1</p>
                        </div>
                        <div class="template__item " data-name="time" data-title="Thời đại"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;FFE800&quot;, &quot;A8D1FF&quot;, &quot;FFC0A5&quot;, &quot;B0FF4D&quot;, &quot;DDB2FF&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/time.png"
                                alt />
                            <p>Thời đại</p>
                        </div>
                        <div class="template__item " data-name="elegant" data-title="Thanh lịch"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;037C12&quot;, &quot;14ABE2&quot;, &quot;EC8F00&quot;, &quot;F30000&quot;, &quot;DB447B&quot;, &quot;595758&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/elegant.png"
                                alt />
                            <p>Thanh lịch</p>
                        </div>
                        <div class="template__item " data-name="passion" data-title="Đam mê"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;000000&quot;, &quot;351616&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/passion.png"
                                alt />
                            <p>Đam mê</p>
                        </div>
                        <div class="template__item " data-name="modern_1_v2" data-title="Hiện Đại 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;529300&quot;, &quot;212F3F&quot;, &quot;BC4922&quot;, &quot;994787&quot;, &quot;247796&quot;, &quot;595758&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_1_v2.png"
                                alt />
                            <p>Hiện Đại 1</p>
                        </div>
                        <div class="template__item  active " data-name="formal" data-title="Trang trọng"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;4D9DC3&quot;, &quot;FF9090&quot;, &quot;2F5A9B&quot;, &quot;CD7BFF&quot;, &quot;4CD4BC&quot;, &quot;595758&quot;, &quot;F16833&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/formal.png"
                                alt />
                            <p>Trang trọng</p>
                        </div>
                        <div class="template__item " data-name="impressive_3_v2" data-title="Ấn tượng 3"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;479b9d&quot;,&quot;a9ac77&quot;,&quot;ff5964&quot;, &quot;9f224e&quot;,&quot;1fbc89&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/impressive_3_v2.png"
                                alt />
                            <p>Ấn tượng 3</p>
                        </div>
                        <div class="template__item " data-name="minimalism" data-title="Tối giản"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;529300&quot;, &quot;212F3F&quot;, &quot;BC4922&quot;, &quot;994787&quot;, &quot;247796&quot;, &quot;595758&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/minimalism.png"
                                alt />
                            <p>Tối giản</p>
                        </div>
                        <div class="template__item " data-name="onepage_elegant_v2" data-title="Thanh Lịch 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;556E8E&quot;,&quot;3BA469&quot;,&quot;202122&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_elegant_v2.png"
                                alt />
                            <p>Thanh Lịch 1</p>
                        </div>
                        <div class="template__item " data-name="modern_4_v2" data-title="Hiện Đại 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;1FBC89&quot;, &quot;FC8383&quot;, &quot;6D84A3&quot;, &quot;FFA211&quot;, &quot;866DA3&quot;, &quot;6DA39F&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_4_v2.png"
                                alt />
                            <p>Hiện Đại 4</p>
                        </div>
                        <div class="template__item " data-name="onepage_impressive_v2" data-title="Ấn tượng"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;EC8F00&quot;, &quot;6897AD&quot;, &quot;212F3F&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_impressive_v2.png"
                                alt />
                            <p>Ấn tượng</p>
                        </div>
                        <div class="template__item " data-name="ambitious" data-title="Tham vọng"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;EC8F00&quot;, &quot;14ABE2&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/ambitious.png"
                                alt />
                            <p>Tham vọng</p>
                        </div>
                        <div class="template__item " data-name="prosper" data-title="Thành đạt"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;FFB156&quot;, &quot;00AFD3&quot;, &quot;777777&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/prosper.png"
                                alt />
                            <p>Thành đạt</p>
                        </div>
                        <div class="template__item " data-name="onepage_impressive_2_v2" data-title="Ấn tượng 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;37474f&quot;, &quot;029c7c&quot;, &quot;28699a&quot;, &quot;db2827&quot;, &quot;655643&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_impressive_2_v2.png"
                                alt />
                            <p>Ấn tượng 2</p>
                        </div>
                        <div class="template__item " data-name="basic_1_v2" data-title="Basic 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;7CB4DE&quot;, &quot;8ED39B&quot;, &quot;F1B99C&quot;, &quot;CCCCCC&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_1_v2.png"
                                alt />
                            <p>Basic 1</p>
                        </div>
                        <div class="template__item " data-name="modern_5" data-title="Hiện Đại 5"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;00b14f&quot;,&quot;2aabd0&quot;,&quot;e57829&quot;,&quot;e40137&quot;,&quot;620dd5&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_5.png"
                                alt />
                            <p>Hiện Đại 5</p>
                        </div>
                        <div class="template__item " data-name="toptify" data-title="Toptify"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;1ed760&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/toptify.png"
                                alt />
                            <p>Toptify</p>
                        </div>
                        <div class="template__item " data-name="topinstar" data-title="Topinstar"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;000000&quot;,&quot;999999&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/topinstar.png"
                                alt />
                            <p>Topinstar</p>
                        </div>
                        <div class="template__item " data-name="toppier" data-title="Toppier"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;f05a66&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/toppier.png"
                                alt />
                            <p>Toppier</p>
                        </div>
                        <div class="template__item " data-name="tiktop" data-title="TikTop"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;000000&quot;,&quot;999999&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/tiktop.png"
                                alt />
                            <p>TikTop</p>
                        </div>
                        <div class="template__item " data-name="twittop" data-title="Twittop"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;333333&quot;,&quot;999999&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/twittop.png"
                                alt />
                            <p>Twittop</p>
                        </div>
                        <div class="template__item " data-name="outstanding" data-title="Outstanding"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;333333&quot;,&quot;999999&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding.png"
                                alt />
                            <p>Outstanding</p>
                        </div>
                        <div class="template__item " data-name="outstanding_2" data-title="Outstanding 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;f2eb27&quot;,&quot;ffc800&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_2.png"
                                alt />
                            <p>Outstanding 2</p>
                        </div>
                        <div class="template__item " data-name="outstanding_3" data-title="Outstanding 3"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00b14f&quot;,&quot;ff7f29&quot;,&quot;0063ff&quot;,&quot;ff9292&quot;,&quot;e84545&quot;,&quot;51c2d5&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_3.png"
                                alt />
                            <p>Outstanding 3</p>
                        </div>
                        <div class="template__item " data-name="outstanding_4" data-title="Outstanding 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;51c2d5&quot;,&quot;00b14f&quot;,&quot;ff7f29&quot;,&quot;0063ff&quot;,&quot;ff9292&quot;,&quot;e84545&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_4.png"
                                alt />
                            <p>Outstanding 4</p>
                        </div>
                        <div class="template__item " data-name="outstanding_5" data-title="Outstanding 5"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;ff7f29&quot;,&quot;e84545&quot;,&quot;ff9292&quot;,&quot;0063ff&quot;,&quot;00b14f&quot;,&quot;51c2d5&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_5.png"
                                alt />
                            <p>Outstanding 5</p>
                        </div>
                        <div class="template__item " data-name="outstanding_6" data-title="Outstanding 6"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;fcbd88&quot;,&quot;bbdfc8&quot;,&quot;d6dae4&quot;,&quot;f4b0ae&quot;,&quot;a5dfe5&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_6.png"
                                alt />
                            <p>Outstanding 6</p>
                        </div>
                        <div class="template__item " data-name="outstanding_7" data-title="Outstanding 7"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;bbdfc8&quot;,&quot;d6dae4&quot;,&quot;f4b0ae&quot;,&quot;fcbd88&quot;,&quot;a5dfe5&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_7.png"
                                alt />
                            <p>Outstanding 7</p>
                        </div>
                        <div class="template__item " data-name="outstanding_8" data-title="Outstanding 8"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;fcbd88&quot;,&quot;bbdfc8&quot;,&quot;d6dae4&quot;,&quot;f4b0ae&quot;,&quot;a5dfe5&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_8.png"
                                alt />
                            <p>Outstanding 8</p>
                        </div>
                        <div class="template__item " data-name="outstanding_9" data-title="Outstanding 9"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;8fd6e1&quot;,&quot;eab2a7&quot;,&quot;66d178&quot;,&quot;a3d2ca&quot;,&quot;ffc785&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_9.png"
                                alt />
                            <p>Outstanding 9</p>
                        </div>
                        <div class="template__item " data-name="outstanding_10" data-title="Outstanding 10"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;548ca8&quot;,&quot;1eae98&quot;,&quot;00b14f&quot;,&quot;e97878&quot;,&quot;f58634&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_10.png"
                                alt />
                            <p>Outstanding 10</p>
                        </div>
                        <div class="template__item " data-name="outstanding_11" data-title="Outstanding 11"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;66aebe&quot;,&quot;00b04f&quot;,&quot;67a79e&quot;,&quot;e16f6f&quot;,&quot;f48534&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/outstanding_11.png"
                                alt />
                            <p>Outstanding 11</p>
                        </div>
                        <div class="template__item " data-name="default" data-title="Tiêu Chuẩn"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/default.png"
                                alt />
                            <p>Tiêu Chuẩn</p>
                        </div>
                        <div class="template__item " data-name="sun" data-title="Hệ mặt trời"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;75b6fc&quot;,&quot;ffd85c&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/sun.png"
                                alt />
                            <p>Hệ mặt trời</p>
                        </div>
                        <div class="template__item " data-name="vintage" data-title="Vintage"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00b14f&quot;,&quot;035397&quot;,&quot;f45c47&quot;,&quot;ff8b00&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/vintage.png"
                                alt />
                            <p>Vintage</p>
                        </div>
                        <div class="template__item " data-name="impressive_5" data-title="Ấn tượng 5"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;ff9f0a&quot;,&quot;00b14f&quot;,&quot;0d79e5&quot;,&quot;f22f2f&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/impressive_5.png"
                                alt />
                            <p>Ấn tượng 5</p>
                        </div>
                        <div class="template__item " data-name="fresher" data-title="Fresher"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;0d79e5&quot;,&quot;00b14f&quot;,&quot;f22f2f&quot;,&quot;ff9f0a&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/fresher.png"
                                alt />
                            <p>Fresher</p>
                        </div>
                        <div class="template__item " data-name="modern_6" data-title="Hiện đại 6"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;ff9f0a&quot;,&quot;00b14f&quot;,&quot;0d79e5&quot;,&quot;f22f2f&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_6.png"
                                alt />
                            <p>Hiện đại 6</p>
                        </div>
                        <div class="template__item " data-name="dev_2" data-title="Lập trình viên 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;2c69a5&quot;,&quot;c36839&quot;,&quot;5e8b7e&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/dev_2.png"
                                alt />
                            <p>Lập trình viên 2</p>
                        </div>
                        <div class="template__item " data-name="basic_1" data-title="Basic 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;f1b99c&quot;,&quot;81d1ea&quot;,&quot;8ed39b&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_1.png"
                                alt />
                            <p>Basic 1</p>
                        </div>
                        <div class="template__item " data-name="gradient_1" data-title="Gradient 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;71b8ff&quot;,&quot;66d7ed&quot;,&quot;dbaac6&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/gradient_1.png"
                                alt />
                            <p>Gradient 1</p>
                        </div>
                        <div class="template__item " data-name="delicate_1" data-title="Tinh tế 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;0A84FF&quot;,&quot;FF9F0A&quot;,&quot;FF453A&quot;,&quot;00B14F&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/delicate_1.png"
                                alt />
                            <p>Tinh tế 1</p>
                        </div>
                        <div class="template__item " data-name="basic_2" data-title="Basic 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;0A84FF&quot;,&quot;00B14F&quot;,&quot;FF9F0A&quot;,&quot;FF453A&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_2.png"
                                alt />
                            <p>Basic 2</p>
                        </div>
                        <div class="template__item " data-name="basic_3" data-title="Basic 3"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;F4E8F8&quot;,&quot;CAEFF5&quot;,&quot;E7F6E0&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_3.png"
                                alt />
                            <p>Basic 3</p>
                        </div>
                        <div class="template__item " data-name="cv_color" data-title="Màu sắc"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;dddddd&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/cv_color.png"
                                alt />
                            <p>Màu sắc</p>
                        </div>
                        <div class="template__item " data-name="delicate_2" data-title="Tinh tế 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;212f3f&quot;,&quot;9a1c1c&quot;,&quot;013c9e&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/delicate_2.png"
                                alt />
                            <p>Tinh tế 2</p>
                        </div>
                        <div class="template__item " data-name="chrome" data-title="Chrome"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;0a84ff&quot;,&quot;00b14f&quot;,&quot;ff9f0a&quot;,&quot;ff453a&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/chrome.png"
                                alt />
                            <p>Chrome</p>
                        </div>
                        <div class="template__item " data-name="hello" data-title="Hello"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00B4D8&quot;,&quot;5D5FEF&quot;,&quot;40BA77&quot;,&quot;FF823C&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/hello.png"
                                alt />
                            <p>Hello</p>
                        </div>
                        <div class="template__item " data-name="basic_4" data-title="Basic 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00b4d8&quot;,&quot;5d5fef&quot;,&quot;40ba77&quot;,&quot;ff823c&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_4.png"
                                alt />
                            <p>Basic 4</p>
                        </div>
                        <div class="template__item " data-name="basic_5" data-title="Basic 5"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;FF823C&quot;,&quot;40BA77&quot;,&quot;5D5FEF&quot;,&quot;00B4D8&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/basic_5.png"
                                alt />
                            <p>Basic 5</p>
                        </div>
                        <div class="template__item " data-name="timeline_clean_2" data-title="Dòng Thời Gian 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00b14f&quot;,&quot;2aabd0&quot;,&quot;620dd5&quot;,&quot;e40137&quot;,&quot;e57829&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/timeline_clean_2.png"
                                alt />
                            <p>Dòng Thời Gian 2</p>
                        </div>
                        <div class="template__item " data-name="onepage_impressive_3" data-title="Ấn Tượng 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;00b14f&quot;,&quot;620dd5&quot;,&quot;e40137&quot;,&quot;e57829&quot;,&quot;2aabd0&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_impressive_3.png"
                                alt />
                            <p>Ấn Tượng 4</p>
                        </div>
                        <div class="template__item " data-name="schoolarship_standard"
                            data-title="Xin Học Bổng Tiêu Chuẩn"
                            data-available_languages="{&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/schoolarship_standard.png"
                                alt />
                            <p>Xin Học Bổng Tiêu Chuẩn</p>
                        </div>
                        <div class="template__item " data-name="senior_2" data-title="Senior 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/senior_2.png"
                                alt />
                            <p>Senior 2</p>
                        </div>
                        <div class="template__item " data-name="impressive_3" data-title="Ấn Tượng 3"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;479b9d&quot;,&quot;a9ac77&quot;,&quot;ff5964&quot;,&quot;9f224e&quot;,&quot;1fbc89&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/impressive_3.png"
                                alt />
                            <p>Ấn Tượng 3</p>
                        </div>
                        <div class="template__item " data-name="pro_5" data-title="Chuyên Nghiệp 5"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;168dc7&quot;,&quot;568a3c&quot;,&quot;6a6a71&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/pro_5.png"
                                alt />
                            <p>Chuyên Nghiệp 5</p>
                        </div>
                        <div class="template__item " data-name="pro_4" data-title="Chuyên Nghiệp 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;0ca4cd&quot;,&quot;644c4c&quot;,&quot;a28f76&quot;,&quot;707282&quot;,&quot;768f7a&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/pro_4.png"
                                alt />
                            <p>Chuyên Nghiệp 4</p>
                        </div>
                        <div class="template__item " data-name="pro_3" data-title="Chuyên Nghiệp 3"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;504e4e&quot;,&quot;ffa96a&quot;,&quot;e6666f&quot;,&quot;1fbc89&quot;,&quot;4fa4d8&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/pro_3.png"
                                alt />
                            <p>Chuyên Nghiệp 3</p>
                        </div>
                        <div class="template__item " data-name="premium" data-title="Cao Cấp"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;04a08c&quot;,&quot;3d3e40&quot;,&quot;b53534&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/premium.png"
                                alt />
                            <p>Cao Cấp</p>
                        </div>
                        <div class="template__item " data-name="senior" data-title="Senior"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/senior.png"
                                alt />
                            <p>Senior</p>
                        </div>
                        <div class="template__item " data-name="pro_2" data-title="Chuyên Nghiệp 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;21abd0&quot;,&quot;333333&quot;,&quot;e71d36&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/pro_2.png"
                                alt />
                            <p>Chuyên Nghiệp 2</p>
                        </div>
                        <div class="template__item " data-name="modern_4" data-title="Hiện Đại 4"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;ffd23f&quot;,&quot;0ead69&quot;,&quot;ee4266&quot;,&quot;3bceac&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_4.png"
                                alt />
                            <p>Hiện Đại 4</p>
                        </div>
                        <div class="template__item " data-name="dev_1" data-title="Lập Trình Viên"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;999999&quot;,&quot;272822&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/dev_1.png"
                                alt />
                            <p>Lập Trình Viên</p>
                        </div>
                        <div class="template__item " data-name="impressive_pro"
                            data-title="Chuyên Nghiệp Ấn Tượng"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;3F9599&quot;,&quot;616493&quot;,&quot;159CD0&quot;,&quot;CE6B23&quot;,&quot;559F22&quot;,&quot;A42A72&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/impressive_pro.png"
                                alt />
                            <p>Chuyên Nghiệp Ấn Tượng</p>
                        </div>
                        <div class="template__item " data-name="pro_1" data-title="Chuyên Nghiệp 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;213f4a&quot;,&quot;247ba0&quot;,&quot;32936f&quot;,&quot;333333&quot;,&quot;843b62&quot;,&quot;ff6d86&quot;,&quot;665479&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/pro_1.png"
                                alt />
                            <p>Chuyên Nghiệp 1</p>
                        </div>
                        <div class="template__item " data-name="modern_3" data-title="Hiện Đại 3"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;333333&quot;,&quot;ff5964&quot;,&quot;9f224e&quot;,&quot;1da1f2&quot;,&quot;1fbc89&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_3.png"
                                alt />
                            <p>Hiện Đại 3</p>
                        </div>
                        <div class="template__item " data-name="modern_2" data-title="Hiện Đại 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;555555&quot;,&quot;38618c&quot;,&quot;118ab2&quot;,&quot;ef476f&quot;,&quot;1a936f&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_2.png"
                                alt />
                            <p>Hiện Đại 2</p>
                        </div>
                        <div class="template__item " data-name="modern_1" data-title="Hiện Đại 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;246b81&quot;,&quot;d55c59&quot;,&quot;0f936a&quot;,&quot;666666&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/modern_1.png"
                                alt />
                            <p>Hiện Đại 1</p>
                        </div>
                        <div class="template__item " data-name="japanese_default" data-title="Tiếng Nhật Chuẩn"
                            data-available_languages="{&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/japanese_default.png"
                                alt />
                            <p>Tiếng Nhật Chuẩn</p>
                        </div>
                        <div class="template__item " data-name="onepage_classic" data-title="Một Trang Cổ Điển"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;232323&quot;,&quot;3d91cd&quot;,&quot;4c900d&quot;,&quot;947222&quot;,&quot;b10357&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_classic.png"
                                alt />
                            <p>Một Trang Cổ Điển</p>
                        </div>
                        <div class="template__item " data-name="timeline_clean" data-title="Dòng Thời Gian"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;32a1b5&quot;,&quot;57b103&quot;,&quot;b10357&quot;,&quot;f7af05&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/timeline_clean.png"
                                alt />
                            <p>Dòng Thời Gian</p>
                        </div>
                        <div class="template__item " data-name="onepage_impressive_2" data-title="Ấn Tượng 2"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;37474f&quot;,&quot;029c7c&quot;,&quot;28699a&quot;,&quot;db2827&quot;,&quot;655643&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_impressive_2.png"
                                alt />
                            <p>Ấn Tượng 2</p>
                        </div>
                        <div class="template__item " data-name="onepage_impressive" data-title="Ấn Tượng"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;7c7a79&quot;,&quot;33c4e8&quot;,&quot;95cd87&quot;,&quot;fcc188&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_impressive.png"
                                alt />
                            <p>Ấn Tượng</p>
                        </div>
                        <div class="template__item " data-name="onepage_elegant" data-title="Thanh Lịch"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;556e8e&quot;,&quot;3ba469&quot;,&quot;202122&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/onepage_elegant.png"
                                alt />
                            <p>Thanh Lịch</p>
                        </div>
                        <div class="template__item " data-name="tiny_1" data-title="Sinh Viên"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;7cc398&quot;,&quot;f7b44f&quot;,&quot;a7759f&quot;,&quot;6f92b3&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/tiny_1.png"
                                alt />
                            <p>Sinh Viên</p>
                        </div>
                        <div class="template__item " data-name="software_engineer" data-title="Kỹ Sư Phần Mềm"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/software_engineer.png"
                                alt />
                            <p>Kỹ Sư Phần Mềm</p>
                        </div>
                        <div class="template__item " data-name="classic_1" data-title="Cổ Điển 1"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;}}"
                            data-color="[&quot;000000&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/classic_1.png"
                                alt />
                            <p>Cổ Điển 1</p>
                        </div>
                        <div class="template__item " data-name="landing" data-title="Landing"
                            data-available_languages="{&quot;vi&quot;:{&quot;name&quot;:&quot;Vi\u1ec7t&quot;,&quot;slug&quot;:&quot;viet&quot;},&quot;en&quot;:{&quot;name&quot;:&quot;Anh&quot;,&quot;slug&quot;:&quot;anh&quot;},&quot;jp&quot;:{&quot;name&quot;:&quot;Nh\u1eadt&quot;,&quot;slug&quot;:&quot;nhat&quot;}}"
                            data-color="[&quot;0F52BA&quot;,&quot;00B14F&quot;,&quot;F7923C&quot;,&quot;FF4848&quot;]">
                            <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/landing.png"
                                alt />
                            <p>Landing</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" box-content box-article">
                <div class="box-content_header">
                    <h2 class="title">
                        Bài viết được đề xuất
                    </h2>
                    <div class="action">
                        <div class="btn-location left" id="btn-pre-list-articles">
                            <i class="fa-regular fa-chevron-left"></i>
                        </div>
                        <div class="btn-location right" id="btn-next-list-articles">
                            <i class="fa-regular fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                <div class="box-content_detail list-articles">
                    <div id="list-articles">
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-trinh-bay-diem-manh-diem-yeu-cua-ban-than-trong-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/cv-3.jpg622ad58c55ed4.jpg " alt title>
                            </a>
                            <div class="list-article_item-content">
                                <a
                                    href="https://www.topcv.vn/cach-trinh-bay-diem-manh-diem-yeu-cua-ban-than-trong-cv">
                                    <div class="list-article_item-description">
                                        Hướng dẫn cách trình bày điểm mạnh điểm yếu của bản thân trong CV
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-du-an-vao-cv">
                                <img class="img-responsive" src="/images/seo/partials/related_post_default.png " alt
                                    title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-du-an-vao-cv">
                                    <div class="list-article_item-description">
                                        Cách Viết Dự Án Vào CV
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-hoc-van-trong-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/hoc-van-trong-cv-topcv.jpg6530e5c9c1793.jpg " alt
                                    title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-hoc-van-trong-cv">
                                    <div class="list-article_item-description">
                                        Hướng dẫn cách viết Trình độ học vấn trong CV thu hút nhà tuyển dụng
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-kinh-nghiem-lam-viec-trong-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/kinh-nghiem-lam-viec-trong-CV-thumb.jpg62fb3defc3cd9.jpg "
                                    alt title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-kinh-nghiem-lam-viec-trong-cv">
                                    <div class="list-article_item-description">
                                        Cách viết kinh nghiệm làm việc trong CV cực hay cho ứng viên
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-ky-nang-trong-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/ky-nang-trong-cv-thumb.jpg62f4c6019b25a.jpg " alt
                                    title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-ky-nang-trong-cv">
                                    <div class="list-article_item-description">
                                        10 kỹ năng trong CV nên có thu hút nhà tuyển dụng
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-muc-tieu-nghe-nghiep-trong-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/viet-muc-tieu-nghe-nghiep-trong-cv-thumb.png630c1dbcb31d6.png "
                                    alt title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-muc-tieu-nghe-nghiep-trong-cv">
                                    <div class="list-article_item-description">
                                        Cách viết mục tiêu nghề nghiệp trong CV chuẩn nhất dành cho ứng viên
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-nguoi-tham-chieu-vao-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/nguoi-tham-chieu-trong-cv-topcv.jpg64e32a1b7c5d6.jpg "
                                    alt title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-nguoi-tham-chieu-vao-cv">
                                    <div class="list-article_item-description">
                                        Người tham chiếu trong CV là gì? Cách viết người tham chiếu trong CV
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-so-thich-vao-cv">
                                <img class="img-responsive" src="/images/seo/partials/related_post_default.png " alt
                                    title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-so-thich-vao-cv">
                                    <div class="list-article_item-description">
                                        Cách viết sở thích trong CV tạo ấn tượng với nhà tuyển dụng
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/cach-viet-thong-tin-ca-nhan-trong-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/cach-viet-thong-tin-ca-nhan-trong-cv-topcv (2).jpg641d7ece1b292.jpg "
                                    alt title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/cach-viet-thong-tin-ca-nhan-trong-cv">
                                    <div class="list-article_item-description">
                                        Cách viết thông tin cá nhân trong CV
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="list-article_item">
                            <a href="https://www.topcv.vn/gioi-thieu-ban-than-trong-cv">
                                <img class="img-responsive"
                                    src="https://static.topcv.vn/cms/gioi-thieu-ban-than-trong-cv-topcv (1).jpg642b83f23ca99.jpg "
                                    alt title>
                            </a>
                            <div class="list-article_item-content">
                                <a href="https://www.topcv.vn/gioi-thieu-ban-than-trong-cv">
                                    <div class="list-article_item-description">
                                        Giới thiệu bản thân trong CV ghi điểm với nhà tuyển dụng chỉ trong 5 giây
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="preview-cv-seo">
                <p class="preview-cv-seo_title">Những lưu ý quan trọng khi viết CV xin việc</p>
                <p class="preview-cv-seo_description"><a href="https://www.topcv.vn/mau-cv" target="_blank">CV xin
                        việc</a> là một
                    trong những yếu tố quan trọng hỗ trợ ứng viên trong quá
                    trình tìm kiếm
                    công việc mơ ước. Vậy đâu là những lưu ý bạn cần nắm rõ khi viết CV xin việc? Nên viết gì và trình
                    bày ra sao?
                    Hãy cùng <a target="_blank" href="https://www.topcv.vn/">TopCV</a> khám phá trong bài viết dưới
                    đây nhé!</p>
                <div class="preview-cv-seo_section">
                    <h2>
                        Nên và không nên viết gì trong CV xin việc?
                    </h2>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Tiêu đề CV
                        </h3>
                        <p class="content">
                            Đối với những CV được gửi trực tuyến qua mail, thường là dưới dạng file .doc hoặc .pdf, thì
                            tiêu đề CV
                            sẽ là điều đầu tiên mà nhà tuyển dụng chú ý tới. Đối với tiêu đề CV bạn hãy trình bày một
                            cách thật ngắn
                            gọn, bao hàm đầy đủ các nội dung quan trọng như tên vị trí ứng tuyển, tên ứng viên. Các phần
                            nội dung có
                            thể được ngăn cách bằng khoảng trống, dấu gạch ngang hoặc dấu gạch dưới. Đối với CV được
                            viết bằng tiếng
                            Việt, luôn sử dụng tiếng Việt có dấu khi viết tiêu đề CV để thể hiện sự chuyên nghiệp.
                        </p>
                        <div class="sub-content">
                            <span class="sub-content-title">
                                Ví dụ về “Tiêu đề” trong CV xin việc:
                            </span>
                            <ul>
                                <li>CV_Nhân viên kinh doanh_Đỗ Quỳnh Mai</li>
                                <li>CV - Nhân viên kinh doanh - Đỗ Quỳnh Mai</li>
                            </ul>
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Mục tiêu nghề nghiệp
                        </h3>
                        <p class="content">
                            Mục tiêu nghề nghiệp là một trong những yếu tố quan trọng khi trình bày CV xin việc và
                            thường xuất hiện
                            ở phần trên cùng của CV. Vậy nên trình bày nội dung này như thế nào để ghi điểm trong mắt
                            nhà tuyển
                            dụng?
                        </p>
                        <h4>
                            Nên
                        </h4>
                        <div class="sub-content">
                            <ul>
                                <li>Trình bày ngắn gọn</li>
                                <li>Chia mục tiêu thành mục tiêu ngắn hạn (trong 1 - 2 năm) và mục tiêu dài hạn (trong 5
                                    - 10 năm)
                                </li>
                                <li>Đưa ra những mục tiêu thực tế cho bản thân ứng viên và cho nhà tuyển dụng</li>
                            </ul>
                        </div>
                        <h4>
                            Không nên
                        </h4>
                        <div class="sub-content">
                            <ul>
                                <li>Trình bày dài dòng, lan man</li>
                                <li>Mục tiêu quá xa vời gần như không thể thực hiện</li>
                                <li>Mục tiêu không gắn liền với lợi ích của bất kỳ cá nhân hay tổ chức nào</li>
                            </ul>
                        </div>
                        <div class="sub-content">
                            <div class="sub-content-title">
                                Ví dụ về “Mục tiêu nghề nghiệp” trong CV xin việc:
                            </div>
                            <ul>
                                <li>Mục tiêu ngắn hạn: Nắm chắc sản phẩm, cải thiện được kỹ năng đàm phán với khách
                                    hàng, cải
                                    thiện kỹ năng làm việc nhóm trong các hoạt động kinh doanh chung.
                                </li>
                                <li>Mục tiêu dài hạn: Hoàn thiện kỹ năng và tiến tới trở thành một Trưởng nhóm bán hàng
                                    trong
                                    vòng 5 năm tới.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Trình độ học vấn
                        </h3>
                        <div class="content">
                            Đối với trình độ học vấn, bạn nên trình bày các cấp học cũng như các khóa học đã tham gia
                            theo trình tự
                            thời gian từ gần tới xa. Một lời khuyên từ TopCV là hãy tập trung liệt kê các cấp học từ Đại
                            học, Cao
                            đẳng, Trung cấp trở lên, bởi các cấp Trung học và Tiểu học sẽ không được nhà tuyển dụng chú
                            ý quá nhiều.
                            Với mỗi cấp, hãy ghi chú thêm thời gian theo học cũng như các chứng chỉ bạn đã đạt được nếu
                            đủ tự tin
                            nhé. Đặc biệt đối với những ứng viên không có nhiều kinh nghiệm làm việc thì bạn càng nên
                            đưa thêm nhiều
                            thông tin vào “Trình độ học vấn” nếu lĩnh vực bạn theo học có liên quan tới công việc đang
                            ứng tuyển,
                            đây sẽ là cơ sở quan trọng để nhà tuyển dụng cân nhắc sự phù hợp của bạn với công việc sau
                            này.
                        </div>
                        <h4>
                            Nên
                        </h4>
                        <div class="sub-content">
                            <ul>
                                <li>Trình bày chính xác tên cơ sở giáo dục đã theo học kèm mốc thời gian</li>
                                <li>Có thể bổ sung chứng chỉ, bằng cấp,thành tích đã đạt được</li>
                            </ul>
                        </div>
                        <h4>
                            Không nên
                        </h4>
                        <div class="sub-content">
                            <ul>
                                <li>Chỉ nêu tên cơ sở giáo dục hoặc mốc thời gian</li>
                                <li>Liệt kê lan man toàn bộ các cấp học từ Đại học tới Tiểu học</li>
                            </ul>
                        </div>
                        <div class="sub-content">
                            <div class="sub-content-title">
                                Ví dụ về “Trình độ học vấn” trong CV xin việc:
                            </div>
                            <div class="sub-content-detail">
                                <p>2014 - 2018: Trường Đại học Hà Nội</p>
                                <p>Khoa Quản trị kinh doanh</p>
                                <p>Thành tích: Tốt nghiệp loại Giỏi</p>
                                <p>
                                    Chứng chỉ đi kèm:
                                <ul>
                                    <li>IELTS 8.5</li>
                                    <li>DELE B2 (Chứng chỉ tiếng Tây Ban Nha như một ngoại ngữ cho người nước ngoài)
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Kinh nghiệm làm việc
                        </h3>
                        <div class="content">
                            Đối với bất cứ ngành nghề nào thì đây cũng là nội dung quan trọng nhất trong CV xin việc.
                            Kinh nghiệm
                            làm việc của bạn sẽ phản ánh bạn có phải ứng viên phù hợp với công việc đang được tuyển dụng
                            hay không,
                            đâu là những kỹ năng bạn đã tích lũy để phục vụ cho công việc sau này. Không chỉ vậy, đây
                            cũng đồng thời
                            là thước đo về khả năng thích nghi của bạn với nhiều môi trường làm việc khác nhau, vì vậy
                            hãy chú ý
                            trình bày kinh nghiệm làm việc một cách thật chỉn chu.
                        </div>
                        <h4>
                            Nên
                        </h4>
                        <div class="sub-content">
                            <ul>
                                <li>Trình bày ngắn gọn, súc tích</li>
                                <li>Trình bày theo dòng thời gian từ gần tới xa</li>
                                <li> Với mỗi mốc thời gian, hãy liệt kê: Tên công ty, vị trí công việc, nhiệm vụ chính,
                                    kỹ năng đi
                                    kèm,
                                    thành tựu nổi bật (nếu có)</li>
                            </ul>
                        </div>
                        <h4>
                            Không nên
                        </h4>
                        <div class="sub-content">
                            <ul>
                                <li>
                                    Trình bày lan man, dài dòng
                                </li>
                                <li>
                                    Đưa vào thông tin sai sự thật
                                </li>
                                <li>
                                    Đề cập tới nhiều việc làm không liên quan tới những kỹ năng cần thiết phục vụ cho
                                    công việc hiện
                                    tại
                                </li>
                            </ul>
                        </div>
                        <div class="sub-content">
                            <div class="sub-content-title">
                                Ví dụ về “Kinh nghiệm làm việc” trong CV xin việc:
                            </div>
                            2020 - Hiện tại: Công ty Cổ phần TopCV Việt Nam <br />
                            Vị trí: Trưởng phòng kinh doanh<br />
                            <ul>
                                <li>Lập kế hoạch kinh doanh và phân bổ cho nhân viên trong khu vực quản lý</li>
                                <li>Giám sát tiến độ của kế hoạch kinh doanh, thúc đẩy nhằm đảm bảo đạt doanh thu của
                                    khu vực</li>
                                <li>Phát triển khách hàng mới và chăm sóc khách hàng cũ tại khu vực, đảm bảo giữ được
                                    doanh thu và
                                    sản
                                    lượng
                                    trên khách hàng hiện có</li>
                                <li>Phối hợp làm việc với các bộ phận phòng ban liên quan nhằm thúc đẩy hỗ trợ phát
                                    triển hệ thống
                                    kinh
                                    doanh</li>
                            </ul>
                        </div>
                        <div class="sub-content">
                            Vậy nếu bạn là người chưa từng đi làm và không có bất kỳ kinh nghiệm làm việc nào thì sao?
                            Trong trường
                            hợp đó, hãy liệt kê những câu lạc bộ, hội nhóm, dự án trong lĩnh vực liên quan mà bạn đã
                            từng tham gia.
                            Tuy không được tính là kinh nghiệm làm việc nhưng những hoạt động đó sẽ chứng tỏ bạn đã từng
                            có cơ hội
                            tiếp xúc với ngành nghề đang ứng tuyển.
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Kỹ năng
                        </h3>
                        <div class="content">
                            Tuy không phải là nội dung quá quan trọng, nhưng đây cũng sẽ là một điểm cộng trong mắt nhà
                            tuyển dụng
                            nếu bạn đã trang bị đầy đủ những kỹ năng liên quan tới công việc trước khi tham gia buổi
                            phỏng vấn. Bạn
                            có thể trình bày các kỹ năng mình đã tích lũy trong quá trình học tập và làm việc trước đây
                            dưới dạng
                            liệt kê theo bullet, gạch đầu dòng, và đừng quên ưu tiên những kỹ năng có thể phục vụ cho
                            công việc sau
                            này lên trước nhé.
                        </div>
                        <div class="sub-content">
                            <div class="sub-content-title">
                                Ví dụ về “Kỹ năng” trong CV xin việc:
                            </div>
                            <ul>
                                <li>Kỹ năng đàm phán</li>
                                <li>Kỹ năng thuyết phục khách hàng</li>
                                <li>Kỹ năng giao tiếp</li>
                                <li>Kỹ năng xử lý vấn đề</li>
                                <li>Kỹ năng làm việc nhóm</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="preview-cv-seo_section">
                    <h2>
                        Một số lưu ý khi trình bày CV xin việc
                    </h2>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Chỉn chu về chính tả và ngữ pháp
                        </h3>
                        <div class="content">
                            Đây gần như là yêu cầu tối thiểu bạn cần đáp ứng được trong CV xin việc của mình. Một chiếc
                            CV đúng
                            chính tả, đúng ngữ pháp đã bước đầu chứng tỏ bạn là một ứng viên cẩn thận và nghiêm túc
                            trong công việc.
                            Ngược lại, việc sai chính tả, ngữ pháp trong CV có thể khiến nhà tuyển dụng đánh giá bạn là
                            một ứng viên
                            thiếu thận trọng, và liệu họ có thể an tâm đặt trọng trách lên vai bạn không, khi một lần
                            kiểm tra kỹ
                            càng trước khi nộp CV bạn cũng không thể làm được?
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Viết CV với chiều dài vừa đủ
                        </h3>
                        <div class="content">
                            <p>
                                Một trang giấy A4 là chiều dài vừa đủ để trình bày CV xin việc, nếu bạn có nhiều mốc
                                thời gian cần
                                đưa vào thì có thể trình bày sang trang thứ hai. Khi cầm trên tay CV xin việc thì điều
                                quan trọng
                                nhất mà nhà tuyển dụng muốn biết là kinh nghiệm làm việc của ứng viên, sau đó mới tới
                                các phần nội
                                dung khác, đặc biệt đối với những vị trí HOT mà nhà tuyển dụng không có nhiều thời gian
                                để đọc hết
                                CV của toàn bộ ứng viên.
                            </p>
                            <p>
                                Hiện nay nhiều đơn vị tuyển dụng đã bắt đầu sử dụng AI hỗ trợ trong quá trình lọc CV
                                online để đẩy
                                nhanh quá trình tìm kiếm ứng viên phù hợp, vì vậy bạn cũng nên tập trung vào những phần
                                nội dung
                                quan trọng thay vì viết CV dài vài trang giấy nhưng lại không có quá nhiều giá trí mang
                                lại cho công
                                việc sau này.
                            </p>
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Hãy trung thực
                        </h3>
                        <div class="content">
                            <p>
                                Với mạng lưới quen biết rộng rãi trong lĩnh vực tuyển dụng, sẽ không khó để nhà tuyển
                                dụng phát hiện
                                ra những thông tin sai lệch được đưa vào trong CV của bạn. Trong trường hợp đó, không
                                chỉ bạn và nhà
                                tuyển dụng sẽ “đường ai nấy đi” mà còn có thể để lại ấn tượng xấu trong quá trình xin
                                việc sau này.
                            </p>
                            <p>
                                Còn trong trường hợp nhà tuyển dụng không phát hiện được thông tin “fake” trong CV của
                                bạn thì sao?
                                Vậy thì buổi phỏng vấn cũng như những tháng ngày công tác sau này sẽ dần khiến bạn lộ ra
                                những điểm
                                yếu kém khi năng lực thật sự không đáp ứng được yêu cầu của công việc. Hãy trung thực,
                                chúng tôi tin
                                rằng luôn có ít nhất một công việc phù hợp với khả năng của bạn, và sự cố gắng sẽ dần
                                được đền đáp
                                bằng những thành tựu rực rỡ sau này.
                            </p>
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Liệt kê nhiều công việc trong thời gian ngắn
                        </h3>
                        <div class="content">
                            Nhảy việc nhiều gần như là “vảy ngược” của nhà tuyển dụng khi quan sát một CV xin việc, họ
                            sẽ tự hỏi
                            rằng nếu được nhận thì sau bao nhiêu tháng, bao nhiêu tuần hoặc thậm chí là bao nhiêu ngày
                            thì bạn sẽ
                            bắt đầu kiếm tìm một bến đỗ mới? Ngược lại, nếu bạn có thể gắn bó với những đơn vị công tác
                            cũ trong một
                            thời gian dài, làm việc ở nhiều cấp bậc khác nhau thì đây lại là một điểm cộng lớn, bởi mọi
                            nhà tuyển
                            dụng đều yêu những ứng viên có tinh thần gắn bó và cống hiến lâu dài.
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Nên gửi CV online dưới định dạng gì?
                        </h3>
                        <div class="content">
                            CV online luôn ghi điểm nhờ sự tiện lợi của mình, đây cũng là hình thức được đa số ứng viên
                            sử dụng
                            trong thời đại lên ngôi của các nền tảng tuyển dụng trực tuyến. Hai định dạng thường được
                            ứng viên lựa
                            chọn để nộp CV online nhất là .doc và .pdf, .pdf cũng là định dạng mà TopCV khuyên dùng nhờ
                            những ưu
                            điểm sau:
                        </div>
                        <div class="sub-content">
                            <ul>
                                <li>Hạn chế lỗi font và cỡ chữ so với định dạng .doc</li>
                                <li>Không dễ dàng để chỉnh sửa, đảm bảo thông tin đưa tới nhà tuyển dụng là nguyên vẹn
                                    và chính xác
                                    nhất
                                </li>
                                <li>Hình ảnh đẹp mắt, màu sắc đa dạng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="preview-cv-seo_section-part">
                        <h3>
                            Nên in CV xin việc một mặt hay hai mặt?
                        </h3>
                        <div class="content">
                            Hầu như không nhà tuyển dụng nào quy định về số mặt được sử dụng để in CV xin việc, bạn có
                            thể lựa chọn
                            in một hoặc hai mặt tùy theo nhu cầu và sở thích. Tuy nhiên, nếu bạn vô tình lựa chọn loại
                            giấy in chất
                            lượng không cao thì lời khuyên của chúng tôi là chỉ in một mặt để hạn chế tình trạng màu chữ
                            bị nhòe và
                            cấn vào mặt phía sau.
                        </div>
                    </div>
                </div>
                <div class="content preview-cv-seo_footer">
                    Trên đây là những lưu ý bạn cần nắm rõ khi trình bày CV xin việc. Bên cạnh đó, đừng quên chuẩn bị
                    một tâm thế
                    sẵn sàng cho buổi phỏng vấn trong tương lai nhé. TopCV chúc bạn sớm tìm được một công việc ưng ý,
                    phù hợp với
                    khả năng cũng như nhu cầu của bản thân.
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://www.topcv.vn/v3/css/toastr.min.css" />
        <div class="modal fade" id="chooseCvDataModal" role="dialog" data-url>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Vui lòng lựa chọn nội dung để bắt đầu tạo CV của bạn</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-item">
                            <div class="item useCvDataUnsave hidden">
                                <img src="https://static.topcv.vn/v4/image/cv_builder/choose-cv-data/image_4.png" alt>
                                <p class="title">Khôi phục dữ liệu chưa lưu</p>
                            </div>
                            <div class="item useCvDataNew">
                                <img src="https://static.topcv.vn/v4/image/cv_builder/choose-cv-data/image_5.png" alt>
                                <p class="title">Tạo CV từ đầu</p>
                            </div>
                        </div>
                    </div>
                    <div id="list-saved-cv">
                        <h5 class="title">Chọn nội dung từ CV đã lưu</h5>
                        <ul id="list-cv">
                        </ul>
                    </div>
                    <div class="modal-footer" id="footer-chooseCvDataModal">
                        <a class="btn btn-cancel" href="javascript:void(0)">Hủy</a>
                        <a class="btn btn-continue" href="javascript:void(0)">Tiếp tục</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://www.topcv.vn/v3/js/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#chooseCvDataModal").on('hide.bs.modal', function() {
                    resetDataCv();
                });

                $(".useCvDataLastest").click(function() {
                    const div = $(this);
                    let html = '';
                    let array = [1, 2, 3, 4, 5, 6, 7];
                    $.ajax({
                        url: 'https://www.topcv.vn/get-list-cv-saved',
                        type: 'GET',
                        data: {},
                        dataType: 'json',
                        beforeSend: function() {

                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                data.list.forEach((item, index) => {
                                    let checked = '';
                                    if (index == 0) {
                                        checked = 'checked';
                                    }
                                    html += `<li class="radio-choose-active">
                                        <input type="radio" value="${item.cv_id}" id="radio-${item.cv_id}" name="cv_id" ${checked}>
                                        <label for="radio-${item.cv_id}">
                                            <div class="content">
                                                <p>
                                                    <span>${item.title} &nbsp;&nbsp;</span>
                                                    <a href="${item.origin_url}" target="_blank">(Xem CV)</a>
                                                </p>
                                                <small>Ngày lưu: ${item.updated_at}</small>
                                            </div>

                                        </label>
                                    </li>`;
                                });
                                div.addClass('active')
                                $('#list-cv').html(html);
                                $('#list-saved-cv').css("display", "block");
                                $('#footer-chooseCvDataModal').css("display", "block");
                                window.trackingTopCV.sendCreateCvSaveCv();
                            } else {
                                toastr.error('Đã có lỗi xảy ra')
                            }
                        },
                    });
                })

                $(".useCvDataNew").click(function() {
                    window.trackingTopCV.sendCreateCvFromScratch();
                    localStorage.removeItem('data-cv-auto-save')
                    window.location.href = $(this).closest("#chooseCvDataModal").attr('data-url-create-cv-new');
                })

                $(".useCvDataUnsave").click(function() {
                    window.trackingTopCV.sendCreateCvUnSavedData();
                    let url = $(this).closest("#chooseCvDataModal").attr('data-url-create-cv-recovery');
                    window.location.href = url;
                })

                $('.btn-cancel').click(function() {
                    /* $('#chooseCvDataModal').hide();*/
                    resetDataCv();
                })

                $('.btn-continue').click(function() {
                    let cvId = $('input[name=cv_id]:checked').val();

                    if (cvId) {
                        let url = $(this).closest("#chooseCvDataModal").attr('data-url-create-cv-lastest');
                        window.location.href = url + `&cv_id=${cvId}`;
                    } else {
                        toastr.error('Bạn chưa chọn CV');
                    }
                })
            });

            function resetDataCv() {
                $('.useCvDataLastest.active').removeClass('active')
                $('#list-cv').html('');
                $('#list-saved-cv').css("display", "none");
                $('#footer-chooseCvDataModal').css("display", "none");
            }
        </script>
        <div class="modal" tabindex="-1" role="dialog" id="modal-upgrade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <p>Bạn đang sử dụng <strong>Tài Khoản MIỄN PHÍ</strong>.</p>
                        <p>Vui lòng nâng cấp Tài Khoản Cao Cấp để sử dụng tất cả các CV cao cấp.</p>
                        <a href="https://www.topcv.vn/tai-khoan/nang-cap"><img
                                src="https://www.topcv.vn/images/banner/premium-04.png" alt
                                class="img-responsive"></a>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default" href="https://www.topcv.vn/mau-cv">Chọn mẫu khác</a>
                        <a target="_blank" href="https://www.topcv.vn/tai-khoan/nang-cap"
                            class="btn btn-warning">Nâng Cấp Tài Khoản</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-limit-cv-free">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <a target="_blank" href="https://www.topcv.vn/tai-khoan/nang-cap"><img
                                src="https://www.topcv.vn/images/banner/premium-04.png" alt
                                class="img-responsive"></a>
                    </div>
                    <div class="modal-footer">
                        <a href="https://www.topcv.vn/quan-ly-cv" type="button" class="btn btn-default">Quản lý
                            CV</a>
                        <a target="_blank" href="https://www.topcv.vn/tai-khoan/nang-cap"
                            class="btn btn-topcv-primary">Nâng Cấp Tài Khoản</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-limit-cv-premium">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p style="font-weight: bold; color: #EF4949;">Hiện tại TopCV chỉ hỗ trợ tạo tối đa
                            <strong>6</strong> CV.</p>
                        <p style="font-style: italic;">Vui lòng xóa CV không sử dụng hoặc sửa lại CV cũ</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-topcv-primary" data-dismiss="modal">Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var templatePrice = 20000;
            $(function() {
                $('#template-price').text(Number(templatePrice.toFixed(1)).toLocaleString());
                $('#origin-price').text(Number(templatePrice.toFixed(1)).toLocaleString());
                setCost(templatePrice, 0, true);

                $(document).on('click', '.require-premium', function(event) {
                    event.preventDefault();
                    $('#modal-upgrade').modal();
                    var template = $(this).data('template');
                    var title = $(this).data('title');
                    $('#modal-upgrade').find('#btn-buy-template').data('template', template);
                    $('#modal-upgrade').find('#btn-buy-template').data('title', title);
                });

                $(document).on('click', '.limit-cv-free', function(event) {
                    event.preventDefault();
                    $('#modal-limit-cv-free').modal();
                });

                $(document).on('click', '.limit-cv-premium', function(event) {
                    event.preventDefault();
                    $('#modal-limit-cv-premium').modal();
                });

                $('#btn-buy-template').click(function(event) {
                    event.preventDefault();
                    $('#modal-upgrade').modal('hide');
                    $('#modal-buy-template').modal('show');

                    var template = $(this).data('template');
                    var title = $(this).data('title');
                    $('#buy-template-name').text(title);

                    $('#form-buy-template').find('input[name=template]').val(template);
                });

                $('#modal-buy-template').on('hidden.bs.modal', function() {
                    removeCoupon();
                });

                $('input[name=coupon]').on('input', function() {
                    if ($(this).val().length != 0) {
                        $('#btn-apply-coupon').attr('disabled', false);
                    } else {
                        removeCoupon();
                    }
                });

                $('#btn-apply-coupon').click(function(event) {
                    // hideUpgradeAccount();
                    $('#code-desc-wraper').hide();
                    $('#coupon-error').hide();
                    event.preventDefault();
                    var service = parseInt('6');
                    var coupon = $('input[name=coupon]').val();
                    var price = $('#origin-price').text();
                    price = price.replace(',', '');

                    var data = {
                        'code': coupon,
                        'price': price,
                        'service': service
                    };

                    checkCoupon(data);
                });

                $('#btn-active-template').click(function(event) {
                    event.preventDefault();
                    var code = $(this).attr('data-code');
                    var template = $('#form-buy-template').find('input[name=template]').val();

                    var data = {
                        code: code,
                        template: template,
                    }

                    $.ajax({
                            url: "https://www.topcv.vn/tai-khoan/active-tempate",
                            type: 'POST',
                            dataType: 'json',
                            data: data,
                            beforeSend: function() {
                                $('#btn-active-template').attr('disabled', true);
                            }
                        })
                        .done(function(response) {
                            if (response.status == 'success') {
                                window.location.href = response.url;
                            } else {
                                // $('#modal-buy-template').modal('hide');
                                alert(response.error);
                            }
                        })
                        .fail(function(response) {
                            console.log(response);
                        })
                        .complete(function() {
                            $('#btn-active-template').attr('disabled', false);
                        })
                });
            });

            function checkCoupon(data) {
                $.ajax({
                        url: 'https://www.topcv.vn/coupon/verify',
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        beforeSend: function() {
                            $('#btn-apply-coupon').attr('disabled', true);
                        },
                    })
                    .done(function(response) {
                        if (response.status == 'success') {
                            var re_pay_price = response.data.pay_price;
                            var re_discount = response.data.discount;
                            setCost(re_pay_price, re_discount, true);
                            if (re_pay_price == 0) {
                                // alert('GIam 100%');
                                showUseTemplate(response.data.code);
                            }
                            $('#coupon-error').hide()
                            $('#code-desc').text(response.data.code_desc);
                            $('#code-desc-wraper').show();
                        } else if (response.status == 'fail') {
                            $('#coupon-error').show().text(response.error);
                            setCost(templatePrice, 0);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .complete(function() {
                        $('#btn-apply-coupon').attr('disabled', false);
                    })
            }

            function setCost(payPrice, discount, needFormat = false) {
                if (needFormat == true) {
                    payPrice = Number(payPrice.toFixed(1)).toLocaleString();
                    discount = Number(discount.toFixed(1)).toLocaleString();
                }
                $('#pay-price').text(payPrice);
                $('#discount').text(discount);
                $('#card-value-notice strong').text(payPrice);
            }

            function removeCoupon() {
                $('#coupon-error').hide();
                $('input[name=coupon]').val('');
                $('#code-desc-wraper').hide();
                $('#btn-apply-coupon').attr('disabled', true);
                $('#origin-price').text($('input[name=product_code]:checked').data('value'));
                setCost(templatePrice, 0);
                hideUseTemplate();
            }

            function showUseTemplate(code) {
                $('#phone-input').hide();
                $('#active-buy-template').show();
                $('#btn-active-template').attr('data-code', code);
            }

            function hideUseTemplate(code) {
                $('#phone-input').show();
                $('#active-buy-template').hide();
                $('#btn-active-template').attr('data-code', '');
            }
        </script>
    </div>
 @endsection
