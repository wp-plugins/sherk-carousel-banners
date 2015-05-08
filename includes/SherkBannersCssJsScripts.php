<?php

/**
 * LoadScripts class.
 * Load css and javascripts
 */
class SherkBannersLoadScripts {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'include_sherk_banners_css_js'));
		
		add_action('admin_enqueue_scripts', array(&$this, '_edit_sherk_banners_js'));
		
	}



	/**
	 * include_sherk_banners_css_js function.
	 *
	 * @access public
	 * @return void
	 */
	public function include_sherk_banners_css_js() {
		
		wp_register_style('sherk-banners-styles', SherkBanners::get_plugin_url().'assets/css/style.css', array(), '20121224', 'all' );
		wp_enqueue_style('sherk-banners-styles');
		
		
		//widget styles 
		 wp_register_style('bxslider-styles', SherkBanners::get_plugin_url().'assets/css/jquery.bxslider.css', array(), '20121224', 'all' );
		wp_enqueue_style('bxslider-styles');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('bxslider-js', SherkBanners::get_plugin_url().'assets/js/jquery.bxslider.js', array(), '1.0.0', true); 
		wp_enqueue_script('sherkbanners-js', SherkBanners::get_plugin_url().'assets/js/sherk_banners-classes.js');
	}
	
	function _edit_sherk_banners_js($pagenow){
		global $post,$typenow;
		
		if (empty($typenow) && !empty($_GET['post'])) {
			
			$post = get_post($_GET['post']);
			$typenow = $post->post_type;
			
		}//if
		
		if (is_admin() && $pagenow=='post-new.php' || $pagenow=='post.php' && $typenow=='sherk_banners') {
			wp_register_style('sherk-banners-admin-styles', SherkBanners::get_plugin_url().'assets/css/admin_style.css', array(), '20121224', 'all' );
			wp_enqueue_style('sherk-banners-admin-styles');
			
			wp_enqueue_script('sherk-banners-editjs', SherkBanners::get_plugin_url().'assets/js/sherk_banners-edit-js.js');
			wp_enqueue_script('jquery');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
			wp_enqueue_script('my-upload');
			wp_enqueue_style('thickbox');
	
			
		}
	}

}

new SherkBannersLoadScripts();