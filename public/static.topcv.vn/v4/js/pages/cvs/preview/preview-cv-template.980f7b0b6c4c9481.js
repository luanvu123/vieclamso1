(()=>{var e={25306:e=>{e.exports={disableAction:function(){document.querySelectorAll("button").forEach((function(e){return e.disabled=!0})),document.querySelectorAll("input").forEach((function(e){return e.disabled=!0})),document.querySelectorAll("select").forEach((function(e){return e.disabled=!0})),document.querySelectorAll("textarea").forEach((function(e){return e.disabled=!0}))},enableAction:function(){document.querySelectorAll("button").forEach((function(e){return e.disabled=!1})),document.querySelectorAll("input").forEach((function(e){return e.disabled=!1})),document.querySelectorAll("select").forEach((function(e){return e.disabled=!1})),document.querySelectorAll("textarea").forEach((function(e){return e.disabled=!1}))},formDataToJSON:function(e){var t={};return e.forEach((function(e,a){t[a]=e})),t},initTooltipFlashJob:function(e){var t=[];e.each((function(){var e=this,a=Math.random(),o=$(this).data("job-id");$(this).tooltip("destroy"),$(this).tooltip({html:!0,trigger:"manual"}).on("mouseenter",(function(){t[a]&&clearTimeout(t[a]),$(".flash-job-tag-tooltip[data-job-id='".concat(o,"']")).length||$(this).tooltip("show")})).on("mouseleave",(function(){var e=this;t[a]=setTimeout((function(){$(e).tooltip("hide")}),1)})),$(document).on("mouseenter",".flash-job-tag-tooltip[data-job-id='".concat(o,"']"),(function(){t[a]&&clearTimeout(t[a])})),$(document).on("mouseleave",".flash-job-tag-tooltip[data-job-id='".concat(o,"']"),(function(){t[a]=setTimeout((function(){$(e).tooltip("hide")}),1)}))}))}}},34751:(e,t,a)=>{"use strict";a.r(t),a.d(t,{JobSugest:()=>i});var o=a(25306);function n(e,t){for(var a=0;a<t.length;a++){var o=t[a];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var i=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,a,i;return t=e,a=[{key:"init",value:function(){var e,t,a,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};if(JOB_SEARCH_CONFIG.is_login||1!=n.needLogin){var i={data:{savedJobIds:JOB_SEARCH_CONFIG.listSaveJobs}};window.jobsSuggestList=new Vue({mixins:[i],el:"#suggest-job-section",data:{jobsRecommend:[],trackedJobIds:new Set,jobPositionMapping:{},numberRow:null!==(e=n.rows)&&void 0!==e?e:1,taSource:null!==(t=n.ta_source)&&void 0!==t?t:"jobRendered",jobBlockList:{},page:null!==(a=n.page)&&void 0!==a?a:"search-job"},methods:{loadJobRecommend:function(e){var t=this,a=this;$("#suggest-job-section .loading").show(),$("#job-suggest-list").css({height:"0",opacity:"0"}),$.ajax({url:GET_JOB_RECOMMEND_PAGE_JOB_URL,type:"post",data:e}).done((function(e){if(e.data.length>0){t.jobsRecommend=e.data;var n=[],i={},r={};for(var l in e.data){var s=e.data[l].id;i[s]=parseInt(l)+1,r[s]=e.data[l].ta_block,n.push(s)}a.jobPositionMapping=i,a.jobBlockList=r,"preview-cv"==a.page&&"JobYouMayCare"==e.data[0].ta_block&&($("#suggest-job-section .box-title").html("Việc làm có thể bạn quan tâm"),$("#suggest-job-section .box-header__tool .see-more a").attr("href",JOB_FEATURE_URL),$(".list-job-recommend_footer .see-more a").attr("href",JOB_FEATURE_URL)),onFeatureTrackingTa&&n.length&&ta("jobRendered",{ts:(new Date).getTime(),p:taPage,b:"SuggestJobsBox",jb_ids:n}),Vue.nextTick((function(){t.initCarousel(),$('#suggest-job-section [data-toggle="tooltip"]').tooltip({trigger:"hover",placement:"top",html:!0}),(0,o.initTooltipFlashJob)($("#suggest-job-section .tag-job-flash"))}))}else $(".suggest-ai").remove()})).fail((function(){}))},initCarousel:function(){var e=window.jobsSuggestList;$("#job-suggest-list").on("init",(function(){$("#suggest-job-section .loading").hide(),$("#job-suggest-list").css({height:"auto",opacity:"1"})}));var t=e.numberRow;IS_MOBILE&&(t=1);var a={dots:!1,slidesToShow:IS_MOBILE?1:2,slidesToScroll:IS_MOBILE?1:2,infinite:!1,autoplay:!1,autoplaySpeed:5e3,arrows:!0,prevArrow:".btn-pre",nextArrow:".btn-next",rows:t};$("#job-suggest-list").hasClass("slick-initialized")&&$("#job-suggest-list").slick("destroy"),$("#job-suggest-list").slick(a),$("#job-suggest-list").on("afterChange",(function(t,a,o,n){e.updateJobInViewPort()})),e.updateJobInViewPort()},updateJobInViewPort:function(){var e=window.jobsSuggestList,t="#job-suggest-list .slick-active .job-ta-suggestion";(1==e.numberRow||IS_MOBILE)&&(t="#job-suggest-list .slick-active.job-ta-suggestion"),$(t).each((function(t,a){if($(a).isInViewport()){var o=$(a).data("job-id"),n=$(a).data("jr-id");if(!e.trackedJobIds.has(o)){e.trackedJobIds.add(o);var i,r=e.jobPositionMapping[o],l=(new Date).getTime();$(a).isInViewport()?ta("JobInViewPort",{jb_id:o,jr_i:n,ts:l,p:taPage,impr_pos:r,b:null!==(i=e.jobBlockList[o])&&void 0!==i?i:"SuggestJobsBox2"}):e.trackedJobIds.delete(o)}}}))}}}),this.handleRemoveBtnJobRecommend(),this.handleSaveBtnJobRecommend()}}},{key:"handleRemoveBtnJobRecommend",value:function(){var e=this;$(document).on("click",".btn-remove-job-recommend",(function(){if(JOB_SEARCH_CONFIG.is_login){if(ajaxLock)return!1;var t=$(this).data("id"),a=$(this);ajaxLock=!0,$.ajax({url:IGNORE_SUGGESTED_JOB_URL,type:"post",data:{id:t},success:function(o){ajaxLock=!1,"success"==o.status?e.removeJobSuggest(a,t):toastr.error(o.message)},error:function(e){ajaxLock=!1,toastr.error("Có lỗi xảy ra, vui lòng thử lại!")}})}else showLoginPopup(null,"Đăng nhập hoặc Đăng ký để bỏ qua tin tuyển dụng")}))}},{key:"handleSaveBtnJobRecommend",value:function(){$(document).on("click",".btn-save-job",(function(){if(JOB_SEARCH_CONFIG.is_login){if(ajaxLock)return!1;ajaxLock=!0;var e=$(this),t=$(this).data("id"),a=$(this).data("jr-id"),o=$(this).data("type-submit"),n="";n="save"==o?saveJobUrl:unsaveJobUrl,$.ajax({url:n,type:"POST",data:{job_id:t,jr_i:a}}).done((function(t){"success"==t.status?"save"==o?(e.addClass("saved"),e.removeClass("unsaved"),e.data("type-submit","unsave"),e.attr("data-original-title","Bỏ Lưu"),e.tooltip(),e.mouseover()):(e.removeClass("saved"),e.addClass("unsaved"),e.data("type-submit","save"),e.attr("data-original-title","Lưu"),e.tooltip(),e.mouseover()):"failed"==t.status&&showModalError(t.message)})).fail((function(){console.log("error")})).always((function(){ajaxLock=!1}))}else showLoginPopup(null,"Đăng nhập hoặc Đăng ký để lưu tin tuyển dụng")}))}},{key:"removeJobSuggest",value:function(e,t){e.tooltip("destroy");var a=$("#job-suggest-list").slick("slickCurrentSlide");$("#suggest-job-section .loading").show(),$("#job-suggest-list").css({height:"0",opacity:"0"}),$("#job-suggest-list").slick("unslick"),$("#item_suggest_job_".concat(t)).remove(),$("#job-suggest-list").children(".box-job").length?setTimeout((function(){jobsSuggestList.initCarousel(),$("#job-suggest-list").slick("slickGoTo",a)}),500):$("#suggest-job-section").remove()}}],a&&n(t.prototype,a),i&&n(t,i),Object.defineProperty(t,"prototype",{writable:!1}),e}()}},t={};function a(o){var n=t[o];if(void 0!==n)return n.exports;var i=t[o]={exports:{}};return e[o](i,i.exports,a),i.exports}a.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return a.d(t,{a:t}),t},a.d=(e,t)=>{for(var o in t)a.o(t,o)&&!a.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),a.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})};var o={};(()=>{"use strict";a.r(o);var e=a(34751);function t(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var a=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null==a)return;var o,n,i=[],r=!0,l=!1;try{for(a=a.call(e);!(r=(o=a.next()).done)&&(i.push(o.value),!t||i.length!==t);r=!0);}catch(e){l=!0,n=e}finally{try{r||null==a.return||a.return()}finally{if(l)throw n}}return i}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return n(e,t);var a=Object.prototype.toString.call(e).slice(8,-1);"Object"===a&&e.constructor&&(a=e.constructor.name);if("Map"===a||"Set"===a)return Array.from(e);if("Arguments"===a||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(a))return n(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function n(e,t){(null==t||t>e.length)&&(t=e.length);for(var a=0,o=new Array(t);a<t;a++)o[a]=e[a];return o}function i(e,t){for(var a=0;a<t.length;a++){var o=t[a];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var r=function(){function a(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,a),this.jobSuggest=new e.JobSugest}var o,n,r;return o=a,n=[{key:"init",value:function(){this.initSelect2(),this.handleGetValueOnQuery(),this.jobSuggest.init({needLogin:!1,rows:2,page:"preview-cv"}),window.jobsSuggestList.loadJobRecommend({get_feature_job:!0,ta_source:"JobSuggestInCVTemplate_LinkDetail",limit:10}),this.initSlickCvs(),this.initSlickArticles(),this.handleChooseColor(),this.handleChooseLang(),this.handleChooseTemplate(),this.handleChangeUrlPreview(),this.handleClickCreateCV(),$(document).on("scroll",(function(){window.jobsSuggestList.updateJobInViewPort()}))}},{key:"handleGetValueOnQuery",value:function(){var e=window.location.href,t=new URL(e),a=t.searchParams.get("color"),o=t.searchParams.get("category_id");a&&$("#action .color .color-item").each((function(){$(this).data("value")==a?$(this).addClass("active"):$(this).removeClass("active")})),o&&$("#modal-preview-category-selector").val(o).trigger("change")}},{key:"generatePreviewUrl",value:function(e){var t,a,o,n,i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},r={iframe:!0,name:e,color:null!==(t=i.color)&&void 0!==t?t:"",lang:null!==(a=i.lang)&&void 0!==a?a:"",category_id:null!==(o=i.category_id)&&void 0!==o?o:"",font:"",level:null!==(n=i.level)&&void 0!==n?n:""},l=LINK_PREVIEW+"?"+new URLSearchParams(r).toString();return l}},{key:"initSlickCvs",value:function(){$("#list-cvs").hasClass("slick-initialized")&&$("#list-cvs").slick("destroy");var e=7;IS_MOBILE&&(e=2.5),$("#list-cvs").slick({dots:!1,slidesToShow:e,infinite:!1,autoplay:!1,arrows:!0,swipeToSlide:!0,prevArrow:"#btn-pre-list-cv",nextArrow:"#btn-next-list-cv"})}},{key:"initSlickArticles",value:function(){$("#list-articles").hasClass("slick-initialized")&&$("#list-articles").slick("destroy");var e=4;IS_MOBILE&&(e=1.5),$("#list-articles").slick({dots:!1,slidesToShow:e,slidesToScroll:1,infinite:!1,autoplay:!1,arrows:!0,swipeToSlide:!0,prevArrow:"#btn-pre-list-articles",nextArrow:"#btn-next-list-articles"})}},{key:"initSelect2",value:function(){var e=this;$("#modal-preview-category-selector").select2({placeholder:"Chọn vị trí ứng tuyển",dropdownParent:$("#modal-preview-category-selector").parent()}).on("change",(function(t){e.handleChangeUrlPreview()})).data("select2").$dropdown.addClass("dropdown-select-category-preview")}},{key:"handleChooseLang",value:function(){var e=this;$("#action .language .language-item").on("click",(function(){var t=$("#action .language .language-item.active").data("value");$(this).data("value")!=t&&($("#action .language .language-item").removeClass("active"),$(this).addClass("active"),e.handleChangeUrlPreview())}))}},{key:"handleChooseColor",value:function(){var e=this;$("#action .color .color-item").on("click",(function(){var t=$("#action .color .color-item.active").data("value");$(this).data("value")!=t&&($("#action .color .color-item").removeClass("active"),$(this).addClass("active"),e.handleChangeUrlPreview())}))}},{key:"handleChooseTemplate",value:function(){var e=this;$(".container-preview #list-cvs .template__item").on("click",(function(){var t=$(this).data("available_languages"),a=e.getLang(t),o=$(this).data("name"),n=e.generateUrl(o,a);window.open(n,"_blank")}))}},{key:"getLang",value:function(e){for(var a=$("#action .language .language-item.active").data("value"),o=Object.keys(e).includes(a),n="",i=0,r=0,l=Object.entries(e);r<l.length;r++){var s=t(l[r],2),c=s[0];s[1],o?a==c&&(n=c):0==i&&(n=c),i++}return n}},{key:"renderColor",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t="";e.forEach((function(e,a){var o="";0==a&&(o="active"),t+='<div class="color-item '.concat(o,'" data-value="').concat(e,'" style="background-color: #').concat(e,'"></div>')})),$("#action .color").html(t),this.handleChooseColor()}},{key:"renderLanguage",value:function(){for(var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],a="",o=0,n=$("#action .language .language-item.active").data("value"),i=Object.keys(e).includes(n),r=0,l=Object.entries(e);r<l.length;r++){var s=t(l[r],2),c=s[0],u=s[1],d="";i?n==c&&(d="active"):0==o&&(d="active"),o++,a+='<div class="language-item '.concat(d,'" data-name="').concat(u.name,'" data-value="').concat(c,'"> <span>Tiếng ').concat(u.name,"</span></div>")}$("#action .language").html(a),this.handleChooseLang()}},{key:"handleChangeUrlPreview",value:function(){var e=$("#action .language .language-item.active").data("value"),t=$("#action .language .language-item.active").data("name"),a=$("#action .color .color-item.active").data("value"),o=$("#modal-preview-category-selector").val(),n=$(".container-preview #list-cvs .template__item.active").data("name"),i=$(".container-preview #list-cvs .template__item.active").data("title"),r=$("#modal-preview-category-selector").find(":selected").data("level"),l=this.generatePreviewUrl(n,{lang:e,color:a,category_id:o,level:r});this.showSkeleton();var s=this.generateUrl(n,e);$("#action .action-box_title").html("Mẫu CV tiếng ".concat(t," - ").concat(i)),history.pushState(null,null,s),$("#template-preview-iframe").attr("src",l)}},{key:"generateUrl",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",a=REGEX_URL;switch(t){case"en":a=a.replace("LANGUAGE","anh");break;case"vi":default:a=a.replace("LANGUAGE","viet");break;case"jp":a=a.replace("LANGUAGE","nhat")}return a=a.replace("TEMPLATE",e)}},{key:"showSkeleton",value:function(){$("#template-preview-iframe").css({height:"0"}),$("#skeleton").css("height","800px")}},{key:"handleClickCreateCV",value:function(){$(".chooseCvData").click((function(){var e=$(".container-preview #list-cvs .template__item.active").data("name"),t=$("#action .language .language-item.active").data("value"),a=CREATE_CV_URL_REGEX.replace("TEMPLATE",e);if(IS_LOGIN){if(IS_TEMPLATE_NEW)return void(window.location.href=a+"?lang=".concat(t,"&ta_source=UseTemplateInTemplateDetail"));var o=localStorage.getItem("data-cv-auto-save");o&&$(".useCvDataUnsave").removeClass("hidden"),IS_LASTEST_CV||o?($("#chooseCvDataModal").modal("show"),$("#chooseCvDataModal").attr("data-url-create-cv-lastest",a+"?type=latest&lang=".concat(t,"&ta_source=UseTemplateInTemplateDetail")),$("#chooseCvDataModal").attr("data-url-create-cv-recovery",a+"?type=recovery&lang=".concat(t,"&ta_source=UseTemplateInTemplateDetail")),$("#chooseCvDataModal").attr("data-url-create-cv-new",a+"?type=new&lang=".concat(t,"&ta_source=UseTemplateInTemplateDetail"))):window.location.href=a+"?type=new&lang=".concat(t,"&ta_source=UseTemplateInTemplateDetail")}else showLoginPopup(a,"Đăng nhập hoặc Đăng ký để sử dụng mẫu CV!")}))}}],n&&i(o.prototype,n),r&&i(o,r),Object.defineProperty(o,"prototype",{writable:!1}),a}();$(document).ready((function(){(new r).init()}))})()})();