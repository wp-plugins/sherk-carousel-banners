<?php

/* Generated from http://themergency.com/generators/wordpress-custom-post-types/ */

class SherkBannersMetaBox {

	private $nonce = 'wp_sherkbanners_nonce';

	public function __construct() {
		
		add_action('add_meta_boxes', array($this, 'register_meta_boxes'));
	
		//save meta box values
		//add_action('save_post', array($this, '_save_meta_boxes'), 1, 2);
		
	}

	
	function register_meta_boxes(){
		$this->boxes[] = add_meta_box('slides_sherk_banners','Slides for the Banner', array($this, '_slides_sherk_banners_html'), 'sherk_banners', 'normal', 'high');
	}
	
	
	function _slides_sherk_banners_html(){
		
		global $post;
		
		wp_nonce_field( plugin_basename( __FILE__ ), $this->nonce );
				
		$meta = get_post_meta($post->ID, '_sherk_banners_meta',true);
		echo '<div id="_post_id" value="'.$post->ID.'">Shortcode details: 
		<h3>[sherkbanners title="'.$post->post_title.'" bannerid="'.$post->ID.'" captions="true" auto="true" controls="true" pager="true" minslides="1" maxslides="1" slidewidth="0"]</h3></div><br/>';
		echo '<table class="form-table" id="slidesherkform">';
			
			echo '<tr>';
				echo '<td>';
					echo 'Slide Caption:<br/><input class="large-text" type="text" name="_sherk_banners_meta_caption" id="_sherk_banners_meta_caption" value=""/>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>';
					echo 'Slide Link:<br/><input class="large-text" type="text" name="_sherk_banners_meta_link" id="_sherk_banners_meta_link" value=""/>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>';
					echo '<input id="_sherk_banners_meta_file" type="text" size="36" name="_sherk_banners_meta_file" value="" /><input id="upload_image_button" type="button" value="Upload Image" /><br />Enter a URL or upload an image for the banner.<br/><b>Note:</b> Use images with the same widths and heights for good result in rendering carousel.';
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>';
					echo '<div class="button-secondary" id="_slide_submit">Add Slide</div>';
				echo '</td>';
			echo '</tr>';
			
		echo '</table>';
		
		echo '<table id="list_slides" class="widefat"></table>';
		
	}//function
	
}
new SherkBannersMetaBox();