<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mokhtarbensaid.com
 * @since      1.0.0
 *
 * @package    Mb_Share
 * @subpackage Mb_Share/public
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


/**
 * The public-facing functionality of the plugin.
 * 
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mb_Share
 * @subpackage Mb_Share/public
 * @author     Mokhtar Bensaid <mokhtar1992bensaid@gmail.com>
 */
if (! class_exists('Mb_Share_Public')) {

	class Mb_Share_Public {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string    $plugin_name       The name of the plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;

		}

		/**
		 * Register the stylesheets for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Mb_Share_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Mb_Share_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
			wp_enqueue_style( $this->plugin_name.'-fontawesome', plugin_dir_url( __FILE__ ) . 'css/fontawesome/all.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name.'-styles', plugin_dir_url( __FILE__ ) . 'css/mb-share-public.css', array(), $this->version, 'all' );
		    

		    $custom_color = ( get_option( 'mb_share_button_color' ) == 'color-custom' ) ? get_option( 'mb_share_button_custom_color' ) : '' ;
		    
		    $custom_css = get_option('mb_share_custom_css');
		    
		    $custom_styles = "
				.mbs-buttons .icons .icon .fa-facebook-f,
				.mbs-buttons .icons .icon .fa-x-twitter,
				.mbs-buttons .icons .icon .fa-linkedin-in,
				.mbs-buttons .icons .icon .fa-pinterest,
				.mbs-buttons .icons .icon .fa-whatsapp{
		            background-color: {$custom_color};
		        }

		        {$custom_css}

		    ";
			wp_add_inline_style($this->plugin_name.'-styles', $custom_styles);
		
		}

		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Mb_Share_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Mb_Share_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mb-share-public.js', array( 'jquery' ), $this->version, false );

		}


		/**
		 * Show the share icons in the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */	
		public function mb_share_show_sharing_buttons( $content ){
			global $post;
			$mbs_post_types = get_option( 'mb_share_posttype' );
		    $mbs_post_url = esc_url( get_permalink( $post->ID ) );
			$mbs_current_type = get_post_type( $post->ID );

			if ( is_array( $mbs_post_types ) && in_array( $mbs_current_type, $mbs_post_types ) ) {

				if ( is_singular() ) {

					$content .= '<div class="mbs-buttons '. get_option('mb_share_button_design') .' '. get_option('mb_share_button_placement') .'">';
					$content .= '<ul class="icons">';

					if ( get_option( 'mb_share_facebook' ) == 1 ) {
						$content.= '<li class="icon"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . $mbs_post_url . '"><i class="fa-brands fa-facebook-f"></i></i></a></li>';
					}
					if ( get_option( 'mb_share_twitter' ) == 1 ) {
						$content.= '<li class="icon"><a target="_blank" href="https://twitter.com/intent/tweet?url=' . $mbs_post_url . '"><i class="fa-brands fa-x-twitter"></i></a></li>';
					}
					if ( get_option( 'mb_share_pinterest' ) == 1 ) {
						$content.= '<li class="icon"><a target="_blank" href="http://pinterest.com/pin/create/button/?url='. $mbs_post_url .'"><i class="fa-brands fa-pinterest"></i></a></li>';
					}
							
					if ( get_option( 'mb_share_linkedin') == 1 ) {
						$content.= '<li class="icon"><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=' . $mbs_post_url . '"><i class="fa-brands fa-linkedin-in"></i></a></li>';
					}	
					if ( get_option( 'mb_share_whatsapp') == 1 ) {
						$content.= '<li class="icon"><a target="_blank" href="https://api.whatsapp.com/send?text='. $mbs_post_url .'"><i class="fa-brands fa-whatsapp"></i></a></li>';
					}

					$content.='</ul>';
					$content.='</div>';
					
					return $content;
					
				}			
			}else{
				return $content;
			}

		}

	}

}