<?php
/**
 * Plugin Name:       MB Share
 * Plugin URI:        https://mokhtarbensaid.com
 * Description:       Simple share posts plugin
 * Version:           1.0..
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mokhtar Bensaid
 * Author URI:        https://mokhtarbensaid.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mb-share
 */
defined( 'ABSPATH' ) or die('You dont access directly' );

//Enqueue styles 
add_action( 'wp_enqueue_scripts', 'mb_share_styles' );
function mb_share_styles(){
    wp_enqueue_style( 'fontawesome-mbs', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css');
	wp_enqueue_style( 'style-mbs', plugins_url('assets/css/style.css', __FILE__));
}

// Add to menu
add_action( 'admin_menu', 'mb_share_menu' );
function mb_share_menu(){

	add_submenu_page( 'options-general.php', 'MB Share', 'MB Share', 'manage_options', 'mb-share', 'mb_share_function' );
}

// display the button in the frontend
add_filter('the_content', 'mb_share_buttons',0);
function mb_share_buttons($content){
	if (is_single()) { 
		global $post;
	    $url = get_permalink($post->ID);
	    $url = esc_url($url);

		$content .= '<ul class="mb-share-links">';
		if (get_option('email_share')==1) {
			$content.= '<li><a class="mb-share-email" target="_blank" href="mailto:info@example.com?&subject=&cc=&bcc=&body='. $url .'"><i class="fa fa-envelope"></i></a></li>';
		}
		if (get_option('facebook_share')==1) {
			$content.= '<li><a class="mb-share-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=' . $url . '"><i class="fab fa-facebook-f"></i></a></li>';
		}
		if (get_option('twitter_share')==1) {
			$content.= '<li><a class="mb-share-twitter" target="_blank" href="https://twitter.com/share?url=' . $url . '"><i class="fab fa-twitter"></i></a></li>';
		}
		if (get_option('instagram_share')==1) {
			$content.= '<li><a class="mb-share-instagram" target="_blank" href="https://instagram.com/send?text='. $url .'"><i class="fab fa-instagram"></i></a></li>';
		}
				
		if (get_option('linkedin_share')==1) {
			$content.= '<li><a class="mb-share-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?url=' . $url . '"><i class="fab fa-linkedin-in"></i></a></li>';
		}	
		$content.='</ul>';

		return $content;
	}
}


function mb_share_function(){
    ?>
        <div class="wrap">
	        <h1>Social Media share:</h1>
	        <span>
	            <?php settings_errors(); ?>
	        </span>
	        <form method="post" action="options.php">
	            <?php
	                settings_fields("section");
	                do_settings_sections("social_share_links");
	                submit_button(); 
	            ?>          
	        </form>
        </div>
    <?php
}

add_action("admin_init", "display_social_links_fields");
function display_social_links_fields(){

    add_settings_section("section", "Social Media share:", null, "social_share_links");

    add_settings_field("email_share", "Email:", "display_email_field", "social_share_links", "section");
    add_settings_field("facebook_share", "Facebook:", "display_facebook_field", "social_share_links", "section");   
    add_settings_field("twitter_share", "Twitter:", "display_twitter_field", "social_share_links", "section");
    add_settings_field("instagram_share", "Instagram:", "display_instagram_field", "social_share_links", "section");
    add_settings_field("linkedin_share", "Linkedin:", "display_linkedin_field", "social_share_links", "section");
    
    register_setting("section", "email_share");
    register_setting("section", "facebook_share");
    register_setting("section", "twitter_share");
    register_setting("section", "instagram_share");
    register_setting("section", "linkedin_share");
}

//Adding Social sharing checkboxes
function display_email_field(){
    ?>
        <input type="checkbox" name="email_share"  value="1" <?php checked(1, get_option('email_share'), true); ?> />
    <?php
}

function display_twitter_field(){
    ?>
        <input type="checkbox" name="twitter_share"  value="1" <?php checked(1, get_option('twitter_share'), true); ?> />
    <?php
}

function display_facebook_field(){
    ?>
        <input type="checkbox" name="facebook_share"  value="1" <?php checked(1, get_option('facebook_share'), true); ?> />
    <?php
}

function display_instagram_field(){
    ?>
        <input type="checkbox" name="instagram_share"  value="1" <?php checked(1, get_option('instagram_share'), true); ?> />
    <?php
}

function display_linkedin_field(){
    ?>
        <input type="checkbox" name="linkedin_share"  value="1" <?php checked(1, get_option('linkedin_share'), true); ?> />
    <?php
}


