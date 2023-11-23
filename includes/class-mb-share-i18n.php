<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://mokhtarbensaid.com
 * @since      1.0.0
 *
 * @package    Mb_Share
 * @subpackage Mb_Share/includes
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mb_Share
 * @subpackage Mb_Share/includes
 * @author     Mokhtar Bensaid <mokhtar1992bensaid@gmail.com>
 */
if ( ! class_exists( 'Mb_Share_i18n' ) ) {
	
	class Mb_Share_i18n {


		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since    1.0.0
		 */
		public function load_plugin_textdomain() {

			load_plugin_textdomain(
				'mb-share',
				false,
				dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
			);

		}

	}
}
