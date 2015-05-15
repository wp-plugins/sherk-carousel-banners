=== Sherk Carousel Banners Plugin ===
Contributors: sherkspear
Donate link: http://www.sherkspear.com/donate/
Tags: widget, shortcode, banner, slideshow , carousel, bxslider, custom post type
Requires at least: 3.0.1
Tested up to: 4.2.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



== Description ==

This is the plugin you need when you have to add responsive slideshows and banners in carousels for your websites. 
The plugin implements widgets and shortcodes on adding the slideshows/banners into your contents. 

Custom post type SherkBanners lets you add slides with captions and links. The good thing to this is you are able to display the SherkBanner anywhere in your website through widgets and shortcodes repeatedly. 

The plugin uses **Bxslider jQuery plugin**. Parameters are added into the widget's configuration and also with the shortcode. 

You can add custom categories to your banners/slideshows for you to organize it easily.

You can email me directly for any plugin request or personal modification such as styles and templates at <contact@sherkspear.com> or contact me at <http://sherkspear.com/contact>


Plugin URI: <http://www.sherkspear.com/portfolio-item/sherk-banners-wordpress-plugin/>    
Demo Page: <http://www.sherkspear.com> *(The banner at the homepage set with false pager)*


== Installation ==

<h3>This section describes how to install the plugin and get it working.</h3>

1. BACKUP everything before you install the plugin.
2. Upload sherk_banners directory to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Update the Permalinks on settings.
5. SherkBanners post type should now available at dashboard and start creating sherkbanners post type.


<h3>Basic Instruction on Creating a SherkBanner Post types</h3>

1. Create Sherk Banners  Post Type
2. Add Sherk Banners  tag at the upper right on the edit Sherk Banners  view.
3. Add Sherk Banners  category.
4. Add Slide Images for the Sherk Banners, its captions and links if needed.
5. Submit the SherkBanner post type form.


<h3>Display Slideshow using Dashboard Widget</h3>
1. Go to Dashboard-> Appearance -> Widgets (/wp-admin/widgets.php)
2. Look for Sherk Banners Slider Widget and drag it to the widget region you would like it to be shown.
3. Configure your Sherk Banners Slider Widget, select the Banner from the select option and save.

<h3>Display Slideshow using Shortcode</h3>
1. Go to Dashboard-> SherkBanners `(/wp-admin/edit.php?post_type=sherk_banners)`
2. Select the Banners you would like it to be shown.
3. Shortcode template is shown at the edit/add SherkBanner post type which looks like this:   
**[sherkbanners title="My Banner" bannerid="234" captions="true" auto="true" controls="true" pager="true" minslides="1" maxslides="1" slidewidth="0"]**
4. Copy the shortcode, paste it to the content text editor and update the values of your shortcode parameters depends on what you need.

<h3>Parameters Available</h3>

**captions**      
*Include image captions. Captions are derived from the image's title attribute*   
default: **true**   
options: **boolean** (true / false)   

**auto**   
*Slides will automatically transition*   
default: **true**   
options: **boolean** (true / false)   

**controls**   
*If true, "Next" / "Prev" controls will be added*   
default: **true**   
options: **boolean** (true / false)   

**pager**   
*If true, a pager will be added*   
default: **true**   
options: **boolean** (true / false)   

**minSlides**   
*The minimum number of slides to be shown. Slides will be sized down if carousel becomes smaller than the original size.*   
default: **1**   
options: **integer**   

**maxSlides**   
*The maximum number of slides to be shown. Slides will be sized up if carousel becomes larger than the original size.*   
default: **1**   
options: **integer**   

**slideWidth**   
*The width of each slide. This setting is required for all horizontal carousels!*   
default: **0**   
options: **integer**   



== Frequently Asked Questions ==

= You have questions?
Contact me through email at contact@sherkspear.com or at http://sherkspear.com/contact.




== Screenshots ==

1. Sherk Banners  Post type at Dashboard
2. Add/Edit SherkBanner post
3. SherkBanner Form at edit/add SherkBanner post.
4. Single view of Sherk Banner.
5. SherkBanners Slider Widget with the widget configs.
6. Frontend sliders at sidebar widget and at the content added by shortcode.
7. Shortcode added at the content.

== Upgrade Notice ==

= 1.0 =
* An initial update with the features added.


== Detailed Instructions ==
**After installation, check at Dashboard -> Tools -> Sherk Banners**    `(/wp-admin/edit.php?post_type=sherk_banners&page=sherkbanners_info)`   
for more detailed instructions.
