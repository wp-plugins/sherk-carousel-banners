<?php


class SherkBannersHelper {


	public function __construct() {
		/*AJAX 	prep*/
		add_action('sherk_banners_action', array($this, 'sherk_banners_action'));
		add_action('wp_ajax_sherk_banners_action', array($this, 'sherk_banners_action'));
		add_action('wp_ajax_nopriv_sherk_banners_action', array($this, 'sherk_banners_action'));
	}



	/**
	 * Saves the sherk banners data to the post_meta with meta_keys
	 * @todo save data in json format
	 *
	 * @return string echo success for ajax
	 */ 
	public function sherk_banners_action() {
		$dataSherkBanners=json_decode(str_replace("\\", "",$_POST['data_sherk_banners']), true);
		$post_id=$_POST['post_id'];
		$request=$_POST['request'];
		$post=get_post($post_id);
		$access=current_user_can('edit_posts');
		//echo JSON.stringify($_POST['data_sherk_banners']);
		//echo 'hehe+=data_sherk_banners='.$_POST['data_sherk_banners'].' postid='.$post_id.' access='.$access.' request='.$request;
 		if ($request=='get') {
			echo json_encode(array('access'=>$access, 'success'=>true, 'slides'=>get_post_meta( $post_id, '_slide_sherk_banners', true)));
		} else if ($access==true) { //making sure valid user
			if ($request=='add_update_slide_submit') {
				if ($this->sherk_banners_addUpdate($post_id, $dataSherkBanners,'_slide_sherk_banners')) {
					echo json_encode(array('request'=>$request,'slides'=>get_post_meta( $post_id, '_slide_sherk_banners', true), 'success'=>true));
				}else {
					echo json_encode(array('request'=>$request, 'success'=>false));
				}
			}else if($request=='delete_slide_submit'){
				if ($this->sherk_banners_remove($post_id, $dataSherkBanners,'_slide_sherk_banners')) {
					echo json_encode(array('request'=>$request, 'slides'=>get_post_meta( $post_id, '_slide_sherk_banners', true), 'success'=>true));
				}else {
					echo json_encode(array('request'=>$request, 'success'=>false));
				}
			} 
		}  

		die(1);

	}
	
	public function getDbSherkBannersArray($post_id,$metakey) {
		$oldJSONValue=get_post_meta( $post_id, $metakey, true);
		if ($oldJSONValue && $oldJSONValue!='null') {
			return json_decode($oldJSONValue, true);
		}else {
			return array();
		}
	}
	

	public function sherk_banners_addUpdate($post_id, $jsonData,$metakey) {
		$arrayCollection = array();
		$arrSherkBanners=$this->getDbSherkBannersArray($post_id,$metakey);
		$updated=false;
		
		foreach ($arrSherkBanners as $sherkBanners) {
			if($metakey=='_slide_sherk_banners'){
				if ($sherkBanners['slide_file'] == $jsonData['slide_file']) {
					$sherkBanners['slide_link']=$jsonData['slide_link'];
					$sherkBanners['slide_caption']=$jsonData['slide_caption'];
					$updated=true;
				}
			}
			array_push($arrayCollection, $sherkBanners);
		}
		if($updated==false){ //to be added
			array_push($arrayCollection, $jsonData);
		}
		return update_post_meta($post_id, $metakey, json_encode($arrayCollection));
	}

	public function sherk_banners_remove($post_id, $jsonData, $metakey) {
		$arrayCollection = array();
		$arrSherkBanners=$this->getDbSherkBannersArray($post_id, $metakey);

		foreach ($arrSherkBanners as $sherkBanners) {
			if($metakey=='_slide_sherk_banners'){
				if ($sherkBanners['slide_file'] != $jsonData['slide_file']) {
					array_push($arrayCollection, $sherkBanners);
				}
			}
		}
		return update_post_meta($post_id, $metakey, json_encode($arrayCollection));
	}
	
	function get_all_sherk_banners(){
		$arr_sherk_banners_keys=array();
		
		$args = array(
			'post_type' => 'sherk_banners',
			'post_status' => 'publish',
		);
		
		$the_query = new WP_Query( $args ); 
		
		if ( $the_query->have_posts() ) : 
			while ( $the_query->have_posts() ) : $the_query->the_post();				
			    $arr_sherk_banners_keys[]=array(
						'title'=>get_the_title(),
						'bannerid'=>get_the_ID(),
						'url'=>get_permalink(get_the_ID()),
						);
			endwhile; 
			wp_reset_postdata(); 
		endif;
		return $arr_sherk_banners_keys;
	}

}

new SherkBannersHelper();