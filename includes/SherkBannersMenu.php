<?php


class SherkBannersMenu {


    function __construct(){
	
	   add_action( 'admin_menu', array($this,'register_my_custom_menu_page' ));

	}
	
	
	
	

	function register_my_custom_menu_page(){
		add_submenu_page( 'edit.php?post_type=sherk_banners', 'How To Use', 'How To Use', 'manage_options', 'sherkbanners_info', array($this,'sherkbanners_menu_page'), 'dashicons-images-alt2', 10 ); 
	}

	function sherkbanners_menu_page(){
		include(SherkBanners::get_plugin_uri().'templates/sherkbanners_dashboard.php');
	}
	

	
	

	
} //end of class
	
new SherkBannersMenu();