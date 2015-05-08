<div class="wrap">
  
  <h2>Sherk Carousel Banners WordPress Plugin</h2>

  <div id="dashboard-widgets-wrap">
	<div id="dashboard-widgets">
		<div id="postbox-container-1" class="postbox-container">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				<div class="postbox ">
			
				<div class="inside">
					<div class="main">
		
			<p>
				<h3>Thank you and Enjoy!</h3>
				Welcome to Sherk Carousel Banners WordPress Plugin.<br/>
				The intent of its creation is to help developers on adding responsive banners, slideshows at the sidebars using widgets or any contents using the shortcode. <br/>
				What makes it different is it creates its own post types where images, captions and links are added. 
			</p>
			<p>
				It is using the <a href="http://bxslider.com/" target="_blank">Bxslider jQuery plugin</a> known for creating responsive slideshows, carousels.<br/> 
			</p>
			
			<h3>Installation</h3>
			<ol>
				<li>BACKUP everything before you install the plugin.</li>
				<li>Upload sherk_banners directory to the '/wp-content/plugins/' directory</li>
				<li>Activate the plugin through the 'Plugins' menu in WordPress</li>	
				<li>Update the Permalinks on settings.</li>
				<li>SherkBanners post type should now available at dashboard and start creating sherkbanners post type.	</li>
			</ol>
			
			<h3>Basic Instruction on Creating a SherkBanner Post types</h3>

			<ol>
				<li>Create Sherk Banners  Post Type</li>
				<li>Add Sherk Banners  tag at the upper right on the edit Sherk Banners  view.</li>
				<li>Add Sherk Banners  category.</li>
				<li>Add Slide Images for the Sherk Banners, its captions and links if needed.</li>
				<li>Submit the SherkBanner post type form.</li>
			</ol>
			
			<h3>Display Slideshow using Dashboard Widget</h3>
            <ol>			
				<li>Go to Dashboard-> Appearance -> Widgets (/wp-admin/widgets.php)</li>
				<li>Look for Sherk Banners Slider Widget and drag it to the widget region you would like it to be shown.</li>
				<li>Configure your Sherk Banners Slider Widget, select the Banner from the select option and save.</li>
			</ol>

			<h3>Display Slideshow using Shortcode</h3>
			<ol>
				<li>Go to Dashboard-> SherkBanners (/wp-admin/edit.php?post_type=sherk_banners)</li>
				<li>Select the Banners you would like it to be shown.</li>
				<li>Shortcode template is shown at the edit/add SherkBanner post type which looks like this:<br/>
				<b>[sherkbanners title="My Banner" bannerid="234" captions="true" auto="true" controls="true" pager="true" minslides="1" maxslides="1" slidewidth="0"]</b></li>
				<li>Copy the shortcode, paste it to the content text editor and update the values of your shortcode parameters depends on what you need.</li>
			</ol>
			<h3>Parameters Available</h3>

				<h4><b>captions</b></h4>
				Include image captions. Captions are derived from the image's title attribute<br/>
				default: true<br/>
				options: boolean (true / false)<br/><br/>

				<h4><b>auto</b></h4>
				Slides will automatically transition<br/>
				default: true<br/>
				options: boolean (true / false)<br/><br/>

				<h4><b>controls</b></h4>
				If true, "Next" / "Prev" controls will be added<br/>
				default: true<br/>
				options: boolean (true / false)<br/><br/>

				<h4><b>pager</b></h4>
				If true, a pager will be added<br/>
				default: true<br/>
				options: boolean (true / false)<br/><br/>

				<h4><b>minslides</b></h4>
				The minimum number of slides to be shown. Slides will be sized down if carousel becomes smaller than the original size.<br/>
				default: 1<br/>
				options: integer<br/><br/>

				<h4><b>maxslides</b></h4>
				The maximum number of slides to be shown. Slides will be sized up if carousel becomes larger than the original size.<br/>
				default: 1<br/>
				options: integer<br/><br/>

				<h4><b>slidewidth</b></h4>
				The width of each slide. This setting is required for all horizontal carousels!<br/>
				default: 0<br/>
				options: integer<br/><br/>
			
			
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="postbox-container-2" class="postbox-container">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
					<div class="postbox ">
				
					<div class="inside">
						<div class="main">
						
						
			<p style="background:#191919;padding: 10px;text-align:center">
				<a target="_blank" href="http://www.sherkspear.com"><img src="<?php echo SherkBanners::get_plugin_url();?>assets/images/logo.png" align="center" width="350"/></a>
			</p>
			<p>
				<b>Sherk Carousel Banners WordPress Plugin</b> is created by <a target="_blank" href="http://www.sherkspear.com"><b>SherkSpear</b></a>.<br/>
				<a target="_blank" href="http://www.sherkspear.com"><b>SherkSpear</b></a> is an IT provider which makes use of the Agile methodology for web development to create innovative websites from simple Blog sites, or with WordPress websites, Drupal, and such.<br/>It also provides web services like a quick fix to your website bugs, IT consultations, and providing reasonable quotes to your projects. <br/><hr/>
				<h3>SherkSpear Offered Services:</h3>
				<ul>
					<li><b><a href="http://www.sherkspear.com/contact/?help=http://www.sherkspear.com/contact/?help=Consultation" target="_blank">Website Consultations</a><b/></li>
					<li><b><a href="http://www.sherkspear.com/contact/?help=Quick%20Fix" target="_blank">Quick Fix a bug</a><b/></li>
					<li><b><a href="http://www.sherkspear.com/contact/?help=Report%20Bugs" target="_blank">Report a bug</a><b/></li>
					<li><b><a href="http://www.sherkspear.com/contact/?help=I%20want%20to%20hire%20you" target="_blank">Hiring</a><b/></li>
					<li><b><a href="http://www.sherkspear.com/contact/?help=Asking%20for%20a%20Quote" target="_blank">Quote Inquiry</a><b/></li>
				
				</ul><br/><br/>
				<hr/>
				<b>Portfolio:<b/> <a target="_blank" href="http://www.sherkspear.com/portfolio"><i>SherkSpear's Portfolio</i></a> <br/>
				<b>Resume:<b/> <a target="_blank" href="http://www.sherkspear.com/resume"><i>SherkSpear's Resume</i></a> <br/>
				<b>Browse my other WordPress Plugins:<b/> <a target="_blank" href="https://profiles.wordpress.org/sherkspear/#content-plugins"><i>SherkSpear's WordPress Plugins</i></a> <br/>
			</p>
			<p>
			   Feel free to <a target="_blank" href="http://www.sherkspear.com/contact">contact me</a> in case of issues you might encounter and/or customization regarding this plugin or any <a href="http://www.sherkspear.com/contact/?help=Suggestions" target="_blank">suggestions</a>. You can contact me through email <a href="mailto:contact@sherkspear.com" target="_blank">contact@sherkspear</a> or fill the form provided at <a href="http://www.sherkspear.com/contact" target="_blank">SherkSpear Contact</a>.
			</p>
			<p style="text-align:center">
			    <div style="text-align:center" class="float-none"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="H8GHAJZQA2B86">
<input type="image" src="http://www.sherkspear.com/wp-content/uploads/2015/05/sendPaypal1.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
			</p>
			
			
						</div>
					</div>
				</div>
			</div>
		</div>


	  </div><!--dashboard-widgets-->
	</div><!--dashboard-widgets-wrap-->
</div><!--wrap-->


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