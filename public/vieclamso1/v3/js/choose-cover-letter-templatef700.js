var popupChooseOptionsShown=false;var selectedCvTemplate=null;var selectedColorIndex=0;var selectedColor=null;var selectedFont=null;var selectedOrder=DEFAULT_ORDER;var selectedLanguage=DEFAULT_LANGUAGE;var selectedCategory=DEFAULT_CATEGORY;function setOption(requestData)
{requestData._token=CSRF_TOKEN;$.ajax({url:URL_SET_OPTION,type:'POST',data:requestData,dataType:'json',beforeSend:function(){$('#loader-overlay').show();$('#template-list').hide();},success:function(data){if(data.status=='success'){$.cookie("user.popup-option.choose-template-page","hide",{expires:365});$('#option-modal').modal('hide');$('#template-list').delay(2000).show();$('#loader-overlay').delay(2000).hide();$('#template-list').html(data.html);$('.parent-category-selector').val(requestData.parent_category_id).trigger('change.select2');$('.children-category-selector').val(requestData.category_id).trigger('change.select2');$('.lang_selector').val(requestData.lang).trigger('change.select2');$('.exp_selector').val(requestData.exp).trigger('change.select2');}},});}
function filterTemplates(requestData){$('#templates-place-holder').show();$('#list-template-cv').hide();requestData._token=CSRF_TOKEN;$.ajax({url:URL_FILTER_COVER_LETTER_TEMPLATES,type:'POST',data:requestData,dataType:'json',beforeSend:function(){},success:function(data){if(data.status=='success'){$('#template-list').html(data.html);initSelect2();}},error:function(){$('#templates-place-holder').hide();$('#list-template-cv').show();}});}
function showPopupChooseOptions()
{$("#option-modal").modal({keyboard:true,backdrop:'static'});popupChooseOptionsShown=true;}
function initSelect2(){$('#language-selector').select2({placeholder:"Chọn ngôn ngữ CV",}).on('change',function(){let value=$(this).val();let dataRequest={lang:value,}
filterTemplates(dataRequest);});$('#category-selector').select2({placeholder:"Chọn ngành nghề",}).on('change',function(){let value=$(this).val();let dataRequest={category_id:value,}
filterTemplates(dataRequest);});$('#style-selector').select2({placeholder:"Chọn kiểu thiết kế",}).on('change',function(){let value=$(this).val();let dataRequest={style:value,}
filterTemplates(dataRequest);});$("input[name='radio']").on("change",function(){selectedOrder=this.value;let dataRequest={order_by:selectedOrder,}
filterTemplates(dataRequest);});$('#modal-preview-language-selector').select2({placeholder:"Chọn ngôn ngữ CV",}).on('change',function(){selectedLanguage=$(this).val();let previewUrl=generatePreviewUrl(selectedCvTemplate.name,selectedColor,selectedLanguage,selectedCategory,selectedFont);$('#template-preview-iframe').attr('src',previewUrl);});$('#modal-preview-category-selector').select2({placeholder:"Chọn ngành nghề",}).on('change',function(){selectedCategory=$(this).val();let previewUrl=generatePreviewUrl(selectedCvTemplate.name,selectedColor,selectedLanguage,selectedCategory,selectedFont);$('#template-preview-iframe').attr('src',previewUrl);});$('#modal-preview-font-selector').select2({placeholder:"Chọn font chữ",}).on('change',function(){selectedFont=$(this).val();let previewUrl=generatePreviewUrl(selectedCvTemplate.name,selectedColor,selectedLanguage,selectedCategory,selectedFont);$('#template-preview-iframe').attr('src',previewUrl);});}
$(document).ready(function(){initSelect2();$('.children-category-selector').select2({placeholder:"-- Chọn một nghề --"});$('.lang_selector').select2({minimumResultsForSearch:Infinity});$('.job_cat_selector').select2();$('.exp_selector').select2({minimumResultsForSearch:Infinity});$('.status_selector').select2({minimumResultsForSearch:Infinity});$('#optionFormPopup').submit(function(event){event.preventDefault();var lang=$(this).find('select[name="lang"]').val();var category_id=$(this).find('.children-category-selector').val();var exp=$(this).find('select[name="exp"]').val();var status=$(this).find('select[name="status"]').val();var valid=true;if(exp===''){$('#exp-missing-alert').show();valid=false;}else{$('#exp-missing-alert').hide();}
if(status===''){$('#job-waiting-status-missing-alert').show();valid=false;}else{$('#job-waiting-status-missing-alert').hide();}
if(category_id==null||category_id==''){$('#child-category-missing-alert').show();valid=false;}else{$('#child-category-missing-alert').hide();}
if(!valid)return false;requestData={lang:lang,category_id:category_id,exp:exp,status:status,};if(lang==''||category_id==''||exp==''){$('.status-submit').html("Bạn cần chọn ngành nghề phù hợp!");return false;}
setOption(requestData);});$('#btn-show-options').click(function(){showPopupChooseOptions();});$(window).on('scroll',function(){if(popupChooseOptionsShown||($.cookie("user.popup-option.choose-template-page")=="hide"))return true;if($(window).scrollTop()>100){showPopupChooseOptions();}});});