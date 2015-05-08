<?php

$sherk_banners_terms = get_the_terms( $post->ID,'sherk_banners_cat');
$sep='';
if($sherk_banners_terms){
	foreach($sherk_banners_terms as $sherk_banners_term) {
		$output.=$sep.'<a href="'.get_term_link($sherk_banners_term).'">'.$sherk_banners_term->name.'</a>';
		if($sep==''){$sep=' / ';}
	}
	echo '<h3>Category: '.trim($output, $separator).'</h3>';
}

$bannerid = $post->ID;
$captions = true; 
$auto = true; 
$controls = true; 
$pager = true; 
$minSlides = 1; 
$maxSlides = 1; 
$slideWidth = 0; 		

$slides=json_decode(get_post_meta( $bannerid, '_slide_sherk_banners', true),true);

if($bannerid==-1 || sizeof($slides)<1){
	echo 'Please provide existing bannerid value that is an existing banner post type.';
	return;
}	

$singlecontent.='
<div class="sherk_banners singlebody">
	<div class="sherkbanners_bxslider" bannerid="'.$bannerid.'" v_controls="'.$controls.'" v_pager="'.$pager.'" v_captions="'.$captions.'" v_auto="'.$auto.'" v_minslides="'.$minSlides.'" v_maxslides="'.$maxSlides.'" v_slidewidth="'.$slideWidth.'">';
		
		foreach ($slides as $slide) {
				if($slide['slide_file']!=''){
					if($slide['slide_link']!=''){
						$singlecontent .= '<div><a href="'.urldecode($slide['slide_link']).'"><img src="'.urldecode($slide['slide_file']).'" title="'.urldecode($slide['slide_caption']).'"/></a></div>'; 
					}else{
						$singlecontent .= '<div><img  src="'.urldecode($slide['slide_file']).'" title="'.urldecode($slide['slide_caption']).'"/></div>'; 
					}
				}
			}
	$singlecontent.='
	</div>
</div>
';

echo $singlecontent;

?>


<?php //the_post_thumbnail('', array( 'class' => 'sherk_banners')); ?>
<?php

	echo $content;

	$donateButton='<div class="float-none"><form id="donatebutton" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input name="cmd" type="hidden" value="_s-xclick" />
<input name="hosted_button_id" type="hidden" value="W7HKSYRWYFB3S" />
<input style="width:100px" alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" type="image" />
<img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" /></form></div>';
	
 echo $donateButton;
?>



<!--
created by:
  _________.__                  __      _________
 /   _____/|  |__   ___________|  | __ /   _____/_____   ____ _____ _______
 \_____  \ |  |  \_/ __ \_  __ \  |/ / \_____  \\____ \_/ __ \\__  \\_  __ \
 /        \|   Y  \  ___/|  | \/    <  /        \  |_> >  ___/ / __ \|  | \/
/_______  /|___|  /\___  >__|  |__|_ \/_______  /   __/ \___  >____  /__|
        \/      \/     \/           \/        \/|__|        \/     \/

http://www.sherkspear.com
-->