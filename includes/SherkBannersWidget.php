<?php


class SherkBannersWidget extends WP_Widget {

	function __construct(){

		$widget_options = array( 'classname'   => 'SherkBanners Slider Widget',

                               'description' => 'Add SherkBanners Carousel on your widget areas.');

 

		$this->WP_Widget('sherk_banners_widget_id',

                       'SherkBanners Slider Widget',

                       $widget_options);

	}

    function is_checked($formvalue,$value){
		if($formvalue==$value){
			echo ' checked';
		}
	}

	function form($instance){
		// outputs the content of the widget
		$instance = wp_parse_args((array) $instance, array( 'title' => '','bannerid'=>'-1','minslides'=>'1','slidewidth'=>'0','maxslides'=>'1','captions'=>'true','auto'=>'true','controls'=>'true','pager'=>'true'));
		
		$title = $instance['title'];
		$bannerid = $instance['bannerid'];
		$minslides = $instance['minslides'];
		$maxslides = $instance['maxslides'];
		$slidewidth = $instance['slidewidth'];
		$captions = $instance['captions'];
		$auto = $instance['auto'];
		$controls = $instance['controls'];
		$pager = $instance['pager'];
		$sherkBanners=SherkBannersHelper::get_all_sherk_banners();
		$selectBanners='<select class="widefat" id="'.$this->get_field_id('bannerid').'" name="'.$this->get_field_name('bannerid').'">';
		foreach($sherkBanners as $sherkBanner){
		    if($sherkBanner['bannerid']==$bannerid){
				$selected=' selected';
			}else{
				$selected='';
			}
			$selectBanners.='<option value="'.$sherkBanner['bannerid'].'" '.$selected.'>'.$sherkBanner['title'].'</option>';			
		}
		
		$selectBanners.="</select>";

	?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"  name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
		<p>
		<p><label for="<?php echo $this->get_field_id('bannerid'); ?>">Banner:</label>
		<?php echo $selectBanners; ?>
		</p>
		<p><label for="<?php echo $this->get_field_id('minslides'); ?>">Minimum Number of Slides: <input class="widefat" id="<?php echo $this->get_field_id('minslides'); ?>"  name="<?php echo $this->get_field_name('minslides'); ?>" type="text" value="<?php echo attribute_escape($minslides); ?>" /></label>
		</p>		
		<p><label for="<?php echo $this->get_field_id('maxslides'); ?>">Maximum Number of Slides: <input class="widefat" id="<?php echo $this->get_field_id('maxslides'); ?>"  name="<?php echo $this->get_field_name('maxslides'); ?>" type="text" value="<?php echo attribute_escape($maxslides); ?>" /></label>
		</p>
		<p><label for="<?php echo $this->get_field_id('slidewidth'); ?>">Width of the Slides<br/>(in px, set 0 by default): <input class="widefat" id="<?php echo $this->get_field_id('slidewidth'); ?>"  name="<?php echo $this->get_field_name('slidewidth'); ?>" type="text" value="<?php echo attribute_escape($slidewidth); ?>" /></label>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('captions'); ?>">Add Captions?</label><br/>
		<input type="radio" id="<?php echo $this->get_field_id('captions'); ?>" name="<?php echo $this->get_field_name('captions'); ?>" value="true" <?php $this->is_checked($captions,"true")?>> True<br>
		<input type="radio" id="<?php echo $this->get_field_id('captions'); ?>" name="<?php echo $this->get_field_name('captions'); ?>" value="false" <?php $this->is_checked($captions,"false")?>> False 
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('controls'); ?>">Add Controls?</label><br/>
		<input type="radio" id="<?php echo $this->get_field_id('controls'); ?>" name="<?php echo $this->get_field_name('controls'); ?>" value="true" <?php $this->is_checked($controls,"true")?>> True<br>
		<input type="radio" id="<?php echo $this->get_field_id('controls'); ?>" name="<?php echo $this->get_field_name('controls'); ?>" value="false" <?php $this->is_checked($controls,"false")?>> False 
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('auto'); ?>">Auto?</label><br/>
		<input type="radio" id="<?php echo $this->get_field_id('auto'); ?>" name="<?php echo $this->get_field_name('auto'); ?>" value="true" <?php $this->is_checked($auto,"true")?>> True<br>
		<input type="radio" id="<?php echo $this->get_field_id('auto'); ?>" name="<?php echo $this->get_field_name('auto'); ?>" value="false" <?php $this->is_checked($auto,"false")?>> False 
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('pager'); ?>">Add Pager?</label><br/>
		<input type="radio" id="<?php echo $this->get_field_id('pager'); ?>" name="<?php echo $this->get_field_name('pager'); ?>" value="true" <?php $this->is_checked($pager,"true")?>> True<br>
		<input type="radio" id="<?php echo $this->get_field_id('pager'); ?>" name="<?php echo $this->get_field_name('pager'); ?>" value="false" <?php $this->is_checked($pager,"false")?>> False 
		</p>
	  
	  
     <?php
	}

	
	function update($new_instance, $old_instance){

      // outputs the options form on admin

		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['bannerid'] = $new_instance['bannerid'];
		$instance['minslides'] = $new_instance['minslides'];
		$instance['maxslides'] = $new_instance['maxslides'];
		$instance['slidewidth'] = $new_instance['slidewidth'];
		$instance['captions'] = $new_instance['captions'];
		$instance['auto'] = $new_instance['auto'];
		$instance['controls'] = $new_instance['controls'];
		$instance['pager'] = $new_instance['pager'];
		
		return $instance;

	}

 
    //body of the widget
    function widget($args, $instance){
        extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']); 
		$bannerid = $instance['bannerid']; 
		$captions = $instance['captions']; 
		$auto = $instance['auto']; 
		$controls = $instance['controls']; 
		$pager = $instance['pager']; 
		$minSlides = $instance['minslides']; 
		$maxSlides = $instance['maxslides']; 	
		$slideWidth = $instance['slidewidth']; 	
		
		if (!empty($title))
		  echo '<h3 class="widgettitle">'.$before_title . $title . $after_title.'</h3>';
		  
		$slides=json_decode(get_post_meta( $bannerid, '_slide_sherk_banners', true),true);
		
		if($bannerid==-1 || sizeof($slides)<1){
			echo 'Please provide existing bannerid value that is an existing banner post type.';
		}else{	
		
			$widgetcontent.='
			<div class="sherk_banners widgetbody">
				<div class="sherkbanners_bxslider" bannerid="'.$bannerid.'" v_controls="'.$controls.'" v_pager="'.$pager.'" v_captions="'.$captions.'" v_auto="'.$auto.'" v_minslides="'.$minSlides.'" v_maxslides="'.$maxSlides.'" v_slidewidth="'.$slideWidth.'">';
					
					foreach ($slides as $slide) {
							if($slide['slide_file']!=''){
								if($slide['slide_link']!=''){
									$widgetcontent .= '<div><a href="'.urldecode($slide['slide_link']).'"><img src="'.urldecode($slide['slide_file']).'" title="'.urldecode($slide['slide_caption']).'"/></a></div>'; 
								}else{
									$widgetcontent .= '<div><img  src="'.urldecode($slide['slide_file']).'" title="'.urldecode($slide['slide_caption']).'"/></div>'; 
								}
							}
						}
				$widgetcontent.='
				</div>
			</div>
			';
		
			echo $widgetcontent;
		
		}
		
		
		?>	
		
		<?php
		echo $after_widget;
	}


} //end class

