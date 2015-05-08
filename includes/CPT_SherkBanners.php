<?php

class CPTSherkBanners {

	public function __construct() {
		add_action( 'init', array($this, 'register_cpt_sherk_banners'));
		
		add_action( 'init', array($this, 'register_sherk_banners_taxonomies'));
		
		add_filter( 'the_content', array($this, 'sherk_banners_content'));
		
		add_action( 'widgets_init', array($this, '_sherk_banners_widget')); //addwidgets
	}



	public function register_cpt_sherk_banners() {

		$labels = array(
			'name' => _x( 'Sherk Banners', 'sherk_banners' ),
			'singular_name' => _x( 'Sherk Banners', 'sherk_banners' ),
			'add_new' => _x( 'Add New', 'sherk_banners' ),
			'add_new_item' => _x( 'Add New Sherk Banners', 'sherk_banners' ),
			'edit_item' => _x( 'Edit Sherk Banners', 'sherk_banners' ),
			'new_item' => _x( 'New Sherk Banners', 'sherk_banners' ),
			'view_item' => _x( 'View Sherk Banners', 'sherk_banners' ),
			'search_items' => _x( 'Search Sherk Banners', 'sherk_banners' ),
			'not_found' => _x( 'No Sherk Banners found', 'sherk_banners' ),
			'not_found_in_trash' => _x( 'No Sherk Banners found in Trash', 'sherk_banners'),
			'menu_name' => _x( 'Sherk Banners', 'sherk_banners' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Creates a banner custom post types.',
			'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
			'taxonomies' => array( 'sherk_banners_cat', 'post_tag' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-images-alt2',
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post'
		);

		register_post_type( 'sherk_banners', $args );
	}

	function register_sherk_banners_taxonomies() {
		register_taxonomy(
			'sherk_banners_cat',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
			'sherk_banners',      //post type name
			array(
				'hierarchical'   => true,
				'label'    => 'Banners Category',
				'query_var'   => true,
				'rewrite'   => array(
					'slug'    => 'sherk_banners_category', // This controls the base slug that will display before each term
					'with_front'  => false // Don't display the category base before
				)
			)
		);
	}
	
	
	/**
	 * sherk_banners_content function.
	 *
	 * @access public
	 * @param mixed $content
	 * @return void
	 */
	function sherk_banners_content($content) {
		global $post;
        
		if ($post->post_type=='sherk_banners' && is_single()) {
			include(SherkBanners::get_plugin_uri().'templates/single-sherk_banners-content.php');
			return ob_get_clean();
		}else{
			return $content;
		}
	}
	
	
	
	
	function _sherk_banners_widget(){
		register_widget('SherkBannersWidget');
	}
	
}

new CPTSherkBanners();