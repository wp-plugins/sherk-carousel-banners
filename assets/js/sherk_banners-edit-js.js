window.jQuery = window.$ = jQuery; /*Sherk Banners type class*/

var EditSherkBannersAjax = function() {
    var controller=new EditSherkBannersController();
	
	this.ajaxSubmit = function(request, ajax_data) {
		console.log('request='+request+' ajax_data='+ajax_data);
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxurl,
			data: {
				'action': 'sherk_banners_action',
				'request': request,
				'post_id': controller.getPostId(),
				'data_sherk_banners': ajax_data,
			},
			complete: function(object) {
				console.log('object');
				console.log(object);				
				
				if (object.status == 200) {
					var jsonResponse = object.responseJSON;
					console.log(jsonResponse);
					console.log('hehe');
					if (jsonResponse && typeof jsonResponse === "object" && jsonResponse !== null) {
						var sherkBannersHtml=new EditSherkBannersHtml();
						if(request == 'get' && jsonResponse.success==true){
							sherkBannersHtml.refreshDataTable(jsonResponse.slides, 'list_slides');
						}else if (request == 'add_update_slide_submit' && jsonResponse.success==true) {
							sherkBannersHtml.refreshDataTable(jsonResponse.slides, 'list_slides');
						} else if (request == 'delete_slide_submit' && jsonResponse.success) { 
							sherkBannersHtml.refreshDataTable(jsonResponse.slides, 'list_slides');
						} 
					} else {
						console.log("Ajax Failed");
					}
				} else {
					console.log("Ajax Failed");
				}
			}
		});
	}
}

var EditSherkBannersController = function() {
	
	this.slideToJson = function(slideCaption,slideLink,slideFile) {
		var slideJson = {
			slide_caption: escape(slideCaption),
			slide_link: escape(slideLink),
			slide_file: escape(slideFile),
		};
		return JSON.stringify(slideJson);
	};
	
	
	this.isValidUrl = function(url) {
		var urlregex = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
		if (urlregex.test(url)) {
			return true;
		} else {
			alert('Error:Invalid Url Format');
			return false;
		}
	}
	
	this.getPostId= function (){
		return $('#_post_id').attr('value');
	}
	
	
}

var EditSherkBannersHtml = function(){

	this.refreshDataTable = function(jsonSherkBanners, tableId) {
		var objSherkBanners = JSON.parse(jsonSherkBanners);
		var thead='<thead><tr><th>Caption</th><th>Image/Link</th><th>Actions</th></tr></thead>';
	    var trdata='';
		if(tableId=='list_slides'){			
			for (index = 0; index < objSherkBanners.length; ++index) {
				sherkSlide=objSherkBanners[index];
				if(sherkSlide['slide_link']!=''){
					imglink='<a target="_blank" href="'+unescape(sherkSlide['slide_link'])+'"><img src="'+unescape(sherkSlide['slide_file'])+'"/></a>';
				}else{
					imglink='<img src="'+unescape(sherkSlide['slide_file'])+'"/>';
				}
				
				
				trdata += '<tr id="slide_row_'+index+'" file="'+unescape(sherkSlide['slide_file'])+'"><td class="slide_row_caption">'+unescape(sherkSlide['slide_caption'])+'</td><td class="slide_row_img">'+imglink+'</td><td><i class="edit-slide-sherk-banners dashicons dashicons-edit"></i><i class="remove-slide-sherk-banners dashicons dashicons-no"></i></td></tr>';
			}
			$('#list_slides').html(thead+'<tbody>'+trdata+'</tbody>');
			$('#_sherk_banners_meta_caption').val('');
			$('#_sherk_banners_meta_link').val('');
			$('#_sherk_banners_meta_file').val('');
			$('#_sherk_banners_meta_file').prop('disabled', false);
			$('#upload_image_button').prop('disabled', false);
		    $('#_slide_submit').html('Add Slide');
		}
	}
	
	this.populateForm = function(trId,listId){
	    if(listId=='list_slides'){
		   $('#_sherk_banners_meta_file').val($('#'+trId).attr('file'));
		   $('#_sherk_banners_meta_file').prop('disabled', true);
		   $('#upload_image_button').prop('disabled', true);
		   $('#_sherk_banners_meta_link').val($('#'+trId+' .slide_row_img a').attr('href'));
		   $('#_sherk_banners_meta_caption').val($('#'+trId+' .slide_row_caption').html());
		   $('#_slide_submit').html('Update Slide Details');
		}
	}
}


var EditSherkBannersMain=function(){
	var controller=new EditSherkBannersController();
    var ajaxController= new EditSherkBannersAjax();
	var sherkBannersHtml= new EditSherkBannersHtml();
	
	$(document).on('click', '#_slide_submit', function(e) {
		console.log('waaaahhhe');
	    var slide_caption=$('#_sherk_banners_meta_caption').val();
	    var slide_link=$('#_sherk_banners_meta_link').val();
	    var slide_file=$('#_sherk_banners_meta_file').val();
		console.log('weeehhhe');
		if(slide_file!=''){
		   if(slide_link!='' && controller.isValidUrl(slide_link)==false){
		       return;
		   }else{
				ajaxController.ajaxSubmit('add_update_slide_submit',controller.slideToJson(slide_caption,slide_link,slide_file));
			}
		   		   
		}else{
		   alert('Missing values. Please input values.');
		} 
		e.preventDefault();
	});
	
	
	$(document).on('click','.edit-slide-sherk-banners',function(e){
        var trId=$(this).closest('tr').attr('id');
		sherkBannersHtml.populateForm(trId,'list_slides');
	});
	
	$(document).on('click','.remove-slide-sherk-banners',function(e){
        var slide_file=$(this).closest('tr').attr('file');
		ajaxController.ajaxSubmit('delete_slide_submit',controller.slideToJson('','',slide_file));
	});
	
	 $(document).ready(function(){
		ajaxController.ajaxSubmit('get',controller.slideToJson('','',''));
	}); 
	
	/**upload**/
	$(document).on('click','#upload_image_button',function(e){
		formfield = $('#upload_image').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});

	window.send_to_editor = function(html) {
		var imgurl = $('img',html).attr('src');
		$('#_sherk_banners_meta_file').val(imgurl);
		tb_remove();
	}
}

new EditSherkBannersMain();

