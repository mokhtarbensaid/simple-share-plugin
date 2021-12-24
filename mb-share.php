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
if (!function_exists( 'mbs_share_styles' )) {
add_action( 'wp_enqueue_scripts', 'mbs_share_styles' );
	function mbs_share_styles(){
	    wp_enqueue_style( 'mbs-fontawesome', 'https://pro.fontawesome.com/releases/v5.15.0/css/all.css' );
		wp_enqueue_style( 'mbs-style', plugins_url( 'assets/css/style.css', __FILE__ ) );
	}
}

// Add submenu for show plugin settings
if (!function_exists( 'mbs_share_menu' ) ) {

	add_action( 'admin_menu', 'mbs_share_menu' );
	function mbs_share_menu(){
		add_submenu_page( 'options-general.php', esc_html__( 'MB Share', 'mb-share' ), esc_html__( 'MB Share', 'mb-share' ), 'manage_options', 'mb-share', 'mbs_share_function' );
	}
}

// display the button in the frontend
if (!function_exists( 'mbs_share_buttons' ) ) {

	add_filter( 'the_content', 'mbs_share_buttons',0 );
	function mbs_share_buttons( $content ){
		if ( is_single() ) { 
			global $post;
		    $mbs_url = get_permalink( $post->ID );
		    $mbs_url = esc_url( $mbs_url );

			$content .= '<ul class="mbs-links">';
			if ( get_option( 'mbs_email_share') == 1 ) {
				$content.= '<li><a class="mbs-email" target="_blank" href="mailto:%7Bemail_address%7D?subject=&body='. $mbs_url .'"><i class="fa fa-envelope"></i></a></li>';
			}
			if ( get_option( 'mbs_facebook_share' ) == 1 ) {
				$content.= '<li><a class="mbs-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . $mbs_url . '"><i class="fab fa-facebook-f"></i></a></li>';
			}
			if ( get_option( 'mbs_twitter_share' ) == 1 ) {
				$content.= '<li><a class="mbs-twitter" target="_blank" href="https://twitter.com/intent/tweet?url=' . $mbs_url . '"><i class="fab fa-twitter"></i></a></li>';
			}
			if ( get_option( 'mbs_pinterest_share' ) == 1 ) {
				$content.= '<li><a class="mbs-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url='. $mbs_url .'"><i class="fab fa-pinterest"></i></a></li>';
			}
					
			if ( get_option( 'mbs_linkedin_share') == 1 ) {
				$content.= '<li><a class="mbs-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $mbs_url . '"><i class="fab fa-linkedin-in"></i></a></li>';
			}	
			$content.='</ul>';

			return $content;
		}
	}
}


if ( !function_exists( 'mbs_share_function' ) ) {

	function mbs_share_function(){
	    ?>
	        <div class="wrap">
		        <h1><?php echo esc_html__( 'Social Media share:', 'mb-share' ) ?></h1>
		        <form method="post" action="options.php">
		            <?php
		                settings_fields( 'mbs_section' );
		                do_settings_sections( 'mbs_social_share_links' );
		                submit_button(); 
		            ?>          
		        </form>
	        </div>
	    <?php
	}
}

if ( !function_exists( 'mbs_display_social_links_fields' ) ) {

	add_action( 'admin_init', 'mbs_display_social_links_fields' );
	function mbs_display_social_links_fields(){

	    add_settings_section( 'mbs_section', esc_html__( 'Social Media share:', 'mb-share' ), null, 'mbs_social_share_links' );
	    add_settings_field( 'mbs_email_share', esc_html__( 'Email:', 'mb-share' ), 'mbs_display_email_field', 'mbs_social_share_links', 'mbs_section');
	    add_settings_field( 'mbs_facebook_share', esc_html__( 'Facebook:', 'mb-share' ), 'mbs_display_facebook_field', 'mbs_social_share_links', 'mbs_section');   
	    add_settings_field( 'mbs_twitter_share', esc_html__( 'Twitter:', 'mb-share' ), 'mbs_display_twitter_field', 'mbs_social_share_links', 'mbs_section');
	    add_settings_field( 'mbs_pinterest_share', esc_html__( 'Pinterest:', 'mb-share' ), 'mbs_display_pinterest_field', 'mbs_social_share_links', 'mbs_section');
	    add_settings_field( 'mbs_linkedin_share', esc_html__( 'Linkedin:', 'mb-share' ), 'mbs_display_linkedin_field', 'mbs_social_share_links', 'mbs_section');
	    
	    register_setting( 'mbs_section', 'mbs_email_share' );
	    register_setting( 'mbs_section', 'mbs_facebook_share' );
	    register_setting( 'mbs_section', 'mbs_twitter_share' );
	    register_setting( 'mbs_section', 'mbs_pinterest_share' );
	    register_setting( 'mbs_section', 'mbs_linkedin_share' );
	}
}

//Adding Social sharing checkboxes to dashboard
function mbs_display_email_field(){
    ?>
        <input type="checkbox" name="mbs_email_share"  value="1" <?php checked( 1, get_option( 'mbs_email_share' ), true ); ?> />
    <?php
}

function mbs_display_twitter_field(){
    ?>
        <input type="checkbox" name="mbs_twitter_share"  value="1" <?php checked( 1, get_option( 'mbs_twitter_share' ), true ); ?> />
    <?php
}

function mbs_display_facebook_field(){
    ?>
        <input type="checkbox" name="mbs_facebook_share"  value="1" <?php checked( 1, get_option( 'mbs_facebook_share' ), true ); ?> />
    <?php
}

function mbs_display_pinterest_field(){
    ?>
        <input type="checkbox" name="mbs_pinterest_share"  value="1" <?php checked(1, get_option( 'mbs_pinterest_share' ), true ); ?> />
    <?php
}

function mbs_display_linkedin_field(){
    ?>
        <input type="checkbox" name="mbs_linkedin_share"  value="1" <?php checked( 1, get_option( 'mbs_linkedin_share' ), true ); ?> />
    <?php
}


