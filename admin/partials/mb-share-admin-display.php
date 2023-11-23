<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://mokhtarbensaid.com
 * @since      1.0.0
 *
 * @package    Mb_Share
 * @subpackage Mb_Share/admin/partials
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general-settings'; 

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<h2 class="nav-tab-wrapper">
	<a href="options-general.php?page=mb-share&tab=general-settings" class="nav-tab <?php echo $active_tab == 'general-settings' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'General Settings', 'mb-share' ); ?></a>
	<a href="options-general.php?page=mb-share&tab=style-settings" class="nav-tab <?php echo $active_tab == 'style-settings' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Style Settings', 'mb-share' ); ?></a>
	<a href="options-general.php?page=mb-share&tab=advanced-settings" class="nav-tab <?php echo $active_tab == 'advanced-settings' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__( 'Advanced Settings', 'mb-share' ); ?></a>
</h2>

<form method="post" action="options.php">
<?php 
	
	// Display sections
	if( $active_tab == 'general-settings' ) {
		
	settings_fields( 'mb-share-general-settings-group' );
	do_settings_sections( 'mb-share-general-settings-page' );

	}elseif ( $active_tab == 'style-settings' ) {

		settings_fields( 'mb-share-style-settings-group' );
		do_settings_sections( 'mb-share-style-settings-page' );
	}

	else{

		settings_fields( 'mb-share-advanced-settings-group' );
		do_settings_sections( 'mb-share-advanced-settings-page' );
	}
	
?>

<?php submit_button(); ?>
</form>

</div>
