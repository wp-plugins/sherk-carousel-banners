window.jQuery = window.$ = jQuery; /*SherkBannersJS type class*/
 	
var SherkBannersJS = function() {
	
	$(document).ready(function(){
	
		$('.sherkbanners_bxslider').each(function() {
		
			v_captions=$(this).attr('v_captions');
			v_controls=$(this).attr('v_controls');
			v_pager=$(this).attr('v_pager');
			v_auto=$(this).attr('v_auto');
			v_minslides=$(this).attr('v_minslides');
			v_maxslides=$(this).attr('v_maxslides');
			v_slidewidth=$(this).attr('v_slidewidth');
			
			$(this).bxSlider({
				captions: $.parseJSON(v_captions),
			    controls: $.parseJSON(v_controls),
				pager:$.parseJSON(v_pager),
				auto: $.parseJSON(v_auto),
				adaptiveHeight:true,
				maxSlides: v_maxslides,
				minSlides: v_minslides,
				slideWidth:v_slidewidth,
			});
		});
		
	});
	
};

new SherkBannersJS();