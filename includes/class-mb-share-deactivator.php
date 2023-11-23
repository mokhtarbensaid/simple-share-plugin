<?php

/**
 * Fired during plugin deactivation
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
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Mb_Share
 * @subpackage Mb_Share/includes
 * @author     Mokhtar Bensaid <mokhtar1992bensaid@gmail.com>
 */
if ( ! class_exists( 'Mb_Share_Deactivator' ) ) {
	
	class Mb_Share_Deactivator {

		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function deactivate() {

		}

	}
}
