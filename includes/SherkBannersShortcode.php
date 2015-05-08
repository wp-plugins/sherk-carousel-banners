<?php

class SherkBannersShortcode {

	public function __construct() {
		add_shortcode( 'sherkbanners', array($this,'sherkbanners_func' ));
	}

	function sherkbanners_func( $atts ){
		$shortcode_att = shortcode_atts( array(
				'title' => '',
				'bannerid' => '-1',		
				'captions' => 'true',
				'auto' => 'true',
				'controls' => 'true',
				'pager' => 'true',
				'minslides' => 1,
				'maxslides' => 1,
				'slidewidth' => 0, 	
			), $atts );
		/**Attributes**/	
		$title = $shortcode_att['title']; 
		$bannerid = $shortcode_att['bannerid']; 
		$captions = $shortcode_att['captions']; 
		$auto = $shortcode_att['auto']; 
		$controls = $shortcode_att['controls']; 
		$pager = $shortcode_att['pager']; 
		$minSlides = $shortcode_att['minslides']; 
		$maxSlides = $shortcode_att['maxslides']; 
		$slideWidth = $shortcode_att['slidewidth']; 		
		
		$slides=json_decode(get_post_meta( $bannerid, '_slide_sherk_banners', true),true);
		
		if($bannerid==-1 || sizeof($slides)<1){
			echo 'Please provide existing bannerid value that is an existing banner post type.';
		}else{
			
			if (!empty($title))
				$shortcodecontent='<h3 class="sherk_banner_title shortcodetitle">' . $title .'</h3>'; 	
			
			$shortcodecontent.='
			<div class="sherk_banners shortcodebody">
				<div class="sherkbanners_bxslider" bannerid="'.$bannerid.'" v_controls="'.$controls.'" v_pager="'.$pager.'" v_captions="'.$captions.'" v_auto="'.$auto.'" v_minslides="'.$minSlides.'" v_maxslides="'.$maxSlides.'" v_slidewidth="'.$slideWidth.'">';
					
					foreach ($slides as $slide) {
							if($slide['slide_file']!=''){
								if($slide['slide_link']!=''){
									$shortcodecontent .= '<div><a href="'.urldecode($slide['slide_link']).'"><img src="'.urldecode($slide['slide_file']).'" title="'.urldecode($slide['slide_caption']).'"/></a></div>'; 
								}else{
									$shortcodecontent .= '<div><img  src="'.urldecode($slide['slide_file']).'" title="'.urldecode($slide['slide_caption']).'"/></div>'; 
								}
							}
						}
				$shortcodecontent.='
				</div>
			</div>
			';
		
			echo $shortcodecontent;
		}
	}
	
	
}

new SherkBannersShortcode();