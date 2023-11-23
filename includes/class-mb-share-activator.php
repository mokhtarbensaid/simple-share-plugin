<?php

/**
 * Fired during plugin activation
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
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Mb_Share
 * @subpackage Mb_Share/includes
 * @author     Mokhtar Bensaid <mokhtar1992bensaid@gmail.com>
 */
if ( ! class_exists( 'Mb_Share_Activator' ) ) {
	
	class Mb_Share_Activator {

		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function activate() {

		}

	}
}
