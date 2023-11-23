<?php 


// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


add_settings_field( 
	'mb-share-posttypes', 
	__( 'Choose Post Types', 'mb-share' ), 
	array( $this, 'mb_share_markup_posttypes_fields_callback' ), 
	'mb-share-advanced-settings-page', 
	'mb_share_advanced_section',
	array(
		'name' => 'mb_share_posttype',
		'value' => get_option( 'mb_share_posttype' ),
	)
);

add_settings_field( 
	'mb-share-custom-css', 
	__( 'Custom CSS', 'mb-share' ), 
	array( $this, 'mb_share_markup_custom_css_field_callback' ), 
	'mb-share-advanced-settings-page', 
	'mb_share_advanced_section',

);