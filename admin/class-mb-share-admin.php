<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mokhtarbensaid.com
 * @since      1.0.0
 *
 * @package    Mb_Share
 * @subpackage Mb_Share/admin
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mb_Share
 * @subpackage Mb_Share/admin
 * @author     Mokhtar Bensaid <mokhtar1992bensaid@gmail.com>
 */
if ( ! class_exists( 'Mb_Share_Admin' ) ) {
	
	class Mb_Share_Admin {

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
		 * @param      string    $plugin_name       The name of this plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;

		}

		/**
		 * Register the stylesheets for the admin area.
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

			wp_enqueue_style( $this->plugin_name.'-spectrum-style', 'https://cdn.jsdelivr.net/npm/spectrum-colorpicker2@2.0.0/dist/spectrum.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name.'-fontawesome', plugin_dir_url( __FILE__ ) . 'css/fontawesome/all.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name.'-admin', plugin_dir_url( __FILE__ ) . 'css/mb-share-admin.css', array(), $this->version, 'all' );

		}

		/**
		 * Register the JavaScript for the admin area.
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
			
			wp_enqueue_script( $this->plugin_name.'-spectrum-script', 'https://cdn.jsdelivr.net/npm/spectrum-colorpicker2@2.0.0/dist/spectrum.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mb-share-admin.js', array( 'jquery' ), $this->version, false );

		}

		/**
		 * Enqueue CodeMirror editor for plugin
		 */
		function mb_share_codemirror_enqueue_scripts($hook) {
			
		  $cm_settings['codeEditor'] = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
		  wp_localize_script( 'jquery', 'cm_settings', $cm_settings );
		  wp_enqueue_script( 'wp-theme-plugin-editor' );
		  wp_enqueue_style(' wp-codemirror' );

		}

		/**
		 * Register admin menu for plugin
		 */
		public function mb_share_admin_menu_page(){
			add_options_page( 
				__( 'MB Share Options', 'mb-share' ), 
				__( 'MB Share', 'mb-share' ), 
				'manage_options', 
				'mb-share', 
				array( $this, 'mb_share_admin_menu_page_callback' ),
				10
			);
		}

		public function mb_share_admin_menu_page_callback(){
			
			include 'partials/mb-share-admin-display.php';
		}

		public function mb_share_admin_init(){
			// Add settings section
			$this->mb_share_add_settings_section();

			// add settings fields
			$this->mb_share_add_settings_fields();

			// save settings
			$this->mb_share_save_settings();
		}

		/**
		 * Add Settings sections for plugin options
		 */
		public function mb_share_add_settings_section(){
			add_settings_section( 
				'mb_share_general_section', 
				__( 'General Settings', 'mb-share' ), 
				array( $this, 'mb_share_general_section_callback' ), 
				'mb-share-general-settings-page' 
			);

			add_settings_section( 
				'mb_share_style_section', 
				__( 'Style Settings', 'mb-share' ), 
				array( $this, 'mb_share_style_section_callback' ), 
				'mb-share-style-settings-page' 
			);

			add_settings_section( 
				'mb_share_advanced_section', 
				__( 'Advance Settings', 'mb-share' ), 
				array( $this, 'mb_share_advanced_section_callback' ), 
				'mb-share-advanced-settings-page' 
			);
		}

		/**
		 * Add Settings fields to sections for plugin options
		 */
		public function mb_share_add_settings_fields(){

			// Settings of general section
			require 'partials/settings-tabs/general-tab/add-general-settings.php';

			// Settings of style section
			require 'partials/settings-tabs/style-tab/add-style-settings.php';

			// Settings of advanced section
			require 'partials/settings-tabs/advanced-tab/add-advanced-settings.php';
		}

		/**
		 * Save Settings for plugin options
		 */
		public function mb_share_save_settings(){
			// save Settings of general section
			require 'partials/settings-tabs/general-tab/register-general-settings.php';

			// save Settings of style section
			require 'partials/settings-tabs/style-tab/register-style-settings.php';

			// save Settings of advanced section
			require 'partials/settings-tabs/advanced-tab/register-advanced-settings.php';
		}

		/**
		 * All HTML markups of the settings fields 
		**/	


		// Sections markups
		public function mb_share_general_section_callback(){
			echo esc_html__( 'control your share icons you want to show', 'mb-share' );
		}
		public function mb_share_style_section_callback(){
			echo esc_html__( 'customize your share icons using these style settings', 'mb-share' );
		}
		public function mb_share_advanced_section_callback(){
			echo esc_html__( 'more advanced settings of your share icons', 'mb-share' );

		}
		
		// Text Fields markup for plugin options

		 public function mb_share_markup_text_fields_callback( $args ){

		 	if ( !is_array( $args) ) {
		 		return null;
		 	}

		 	$name = ( isset( $args[ 'name' ] ) ) ? $args[ 'name' ] : '';
		 	$value = ( isset( $args[ 'value' ] ) ) ? $args[ 'value' ] : '';
		 	?>
		 
		 	<input type="checkbox" id="<?php echo esc_attr( $name ); ?>" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( 1, $value, true ); ?>>
		 	<?php 
		 
		 }

		/**
		 * Radio Fields ( Buttons design / Buttons placements ) markup for plugin options
		 */
		public function mb_share_markup_button_design_callback( $args ){

		 	if ( ! is_array( $args ) ) {
		 		return null;
		 	}

		 	$name = ( isset( $args['name'] ) ) ? $args[ 'name' ] : '';
		 	$value = ( isset( $args['value'] ) ) ? $args[ 'value' ] : '';
		 	$options = ( isset( $args['options'] ) && is_array( $args['options'] ) ) ? $args[ 'options' ] : array();
		 	?>
		 	<fieldset>
			 		<?php 
			 		foreach ($options as $option_key => $option_label) { ?>
			 			<div class="mbs-buttons <?php echo esc_attr( $option_key ); ?>">
							<input type="radio" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $option_key ); ?>" <?php checked( $option_key, $value, true ); ?>>
							<label><?php echo esc_html( $option_label ); ?></label>
							<ul class="icons">
								<li class="icon"><i class="fa-brands fa-facebook-f"></i></li>
								<li class="icon"><i class="fa-brands fa-x-twitter"></i></li>
								<li class="icon"><i class="fa-brands fa-linkedin-in"></i></li>
								<li class="icon"><i class="fa-brands fa-pinterest"></i></li>
								<li class="icon"><i class="fa-brands fa-whatsapp"></i></li>
							</ul>
						</div>
			 		<?php }
			 		?>	 		
		 	</fieldset>

		 	<?php 
		 
		}

		public function mb_share_markup_button_placement_callback( $args ){

		 	if ( ! is_array( $args ) ) {
		 		return null;
		 	}

		 	$name = ( isset( $args['name'] ) ) ? $args[ 'name' ] : '';
		 	$value = ( isset( $args['value'] ) ) ? $args[ 'value' ] : '';
		 	$options = ( isset( $args['options'] ) && is_array( $args['options'] ) ) ? $args[ 'options' ] : array();
		 	?>
		 	<fieldset>
			 		<?php 
			 		foreach ($options as $option_key => $option_label) { ?>
			 			<div class="mbs-buttons <?php echo esc_attr( $option_key ); ?>">
							<input type="radio" name="<?php echo esc_attr( $name ) ?>" value="<?php echo esc_attr( $option_key ); ?>" <?php checked( $option_key, $value, true ); ?>>
							<label><?php echo esc_html( $option_label ); ?></label>
						</div>
			 		<?php }
			 		?>	 		
		 	</fieldset>
		 	<?php 
	 	
	 	}
		
		/**
		 * Post Types Fields markup for plugin options
		 */
		public function mb_share_markup_posttypes_fields_callback( $args ){

		 	if (!is_array($args)) {
		 		return null;
		 	}
			$post_args = array(
			   'public'   => true
			);
			 
			$output = 'names';
			$operator = 'and';
			$post_types = get_post_types( $post_args, $output, $operator );

		 	$name = ( isset( $args['name'] ) ) ? $args[ 'name' ] : '';
		 	$value = ( isset( $args['value'] ) && is_array( $args['value'] ) ) ? $args[ 'value' ]  : '';		 
		 	
		 	
			if ( $post_types ) { ?>

			 	<fieldset>
				 		<?php 
				 		foreach ($post_types as $post_type) { 

				 			$checked = ( is_array( $value ) && in_array( $post_type, $value )  ) ? 'checked' : '';
				 			?>
				 			<div class="mb-share-postype-<?php echo esc_attr( $post_type ); ?>">
								<input type="checkbox" name="<?php echo esc_attr( $name ); ?>[]" value="<?php echo esc_attr( $post_type ); ?>" <?php echo $checked; ?>>
								<label><?php echo ucwords( esc_html( $post_type ) ) ?></label>
							</div>
				 		<?php }
				 		?>	 		
			 	</fieldset>

			 	<?php 
		    }
		}

		public function mb_share_markup_custom_css_field_callback(){ ?>
			<textarea id="mb_share_custom_css" name="mb_share_custom_css" cols="80" rows="10"><?php echo get_option( 'mb_share_custom_css' ); ?></textarea>
			<?php 
		}

		/**
		 * Buttons color markup for plugin options
		 */
		 public function mb_share_markup_button_color_callback( $args ){

		 	if (!is_array($args)) {
		 		return null;
		 	}

		 	$name = ( isset( $args['name'] ) ) ? $args[ 'name' ] : '';
		 	$value = ( isset( $args['value'] ) ) ? $args[ 'value' ] : '';
		 	$options = ( isset( $args['options'] ) && is_array( $args['options'] ) ) ? $args[ 'options' ] : array();
		 	?>

		 	<select id="<?php echo esc_attr( $name ) ?>" name="<?php echo esc_attr( $name ) ?>">
		 		<?php 
		 		foreach ($options as $option_key => $option_label) { ?>
		 			<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $value ); ?> > <?php echo esc_html( $option_label ); ?> </option>
		 		<?php }
		 		?>
		 	</select>	
		 	<?php 
		 
		 }

		/**
		 * Buttons custom color markup for plugin options
		 */
		 public function mb_share_markup_button_custom_color_callback() {

		    $custom_color = get_option('mb_share_button_custom_color', '#e60023');
		    ?>
		    <input type="color" id="mb_share_button_custom_color" class="wp-color-picker" name="mb_share_button_custom_color" value="<?php echo esc_attr( $custom_color ); ?>" />
		    <script>
		        jQuery(document).ready(function($) {
		            $('#mb_share_button_custom_color').spectrum({
		                showInput: true,
		                showPalette: false,
		                showAlpha: true,
		                preferredFormat: 'hex',
		                palette: ['#000', '#333', '#666', '#999', '#ccc', '#fff'],
		            });
		        });
		    </script>
		    <?php
		}

		/**
		 * Custom Css option operations
		 * **/
		public function mb_share_sanitize_custom_css($css_code) {
	    	return wp_kses_post($css_code);
		}	

	}
}
