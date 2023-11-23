<?php
 
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mokhtarbensaid.com
 * @since             2.0.0
 * @package           Mb_Share
 *
 * @wordpress-plugin
 * Plugin Name:       MB Share
 * Plugin URI:        https://mokhtarbensaid.com
 * Description:       Share your posts or custom posts to social media through MB share plugin.
 * Version:           2.0.0
 * Author:            Mokhtar Bensaid
 * Author URI:        https://mokhtarbensaid.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mb-share
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if ( ! defined( 'WPINC' ) ) {
	define( 'MB_SHARE_VERSION', '2.0.0' );
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mb-share-activator.php
 */
if ( ! function_exists( 'activate_mb_share' ) ) {
	function activate_mb_share() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-mb-share-activator.php';
		Mb_Share_Activator::activate();
	}
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mb-share-deactivator.php
 */
if ( ! function_exists( 'deactivate_mb_share' ) ) {

	function deactivate_mb_share() {
		
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-mb-share-deactivator.php';
		Mb_Share_Deactivator::deactivate();
	}

}

register_activation_hook( __FILE__, 'activate_mb_share' );
register_deactivation_hook( __FILE__, 'deactivate_mb_share' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mb-share.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */ 
if ( ! function_exists( 'run_mb_share' ) ) {

	function run_mb_share() {

		$plugin = new Mb_Share();
		$plugin->run();
		
	}
}

run_mb_share();
