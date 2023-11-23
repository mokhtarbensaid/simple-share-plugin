<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_settings_field( 
	'mb-share-facebook', 
	__( 'Facebook', 'mb-share' ), 
	array( $this, 'mb_share_markup_text_fields_callback' ), 
	'mb-share-general-settings-page', 
	'mb_share_general_section',
	array(
		'name' => 'mb_share_facebook',
		'value' => get_option( 'mb_share_facebook' ),
	)
);

add_settings_field( 
	'mb-share-twitter', 
	__( 'Twitter', 'mb-share' ), 
	array( $this, 'mb_share_markup_text_fields_callback' ), 
	'mb-share-general-settings-page', 
	'mb_share_general_section',
	array(
		'name' => 'mb_share_twitter',
		'value' => get_option( 'mb_share_twitter' ),
	)
);

add_settings_field( 
	'mb-share-linkedin', 
	__( 'Linkedin', 'mb-share' ), 
	array( $this, 'mb_share_markup_text_fields_callback' ), 
	'mb-share-general-settings-page', 
	'mb_share_general_section',
	array(
		'name' => 'mb_share_linkedin',
		'value' => get_option( 'mb_share_linkedin' ),
	)
);

add_settings_field( 
	'mb-share-pinterest', 
	__( 'Pinterest', 'mb-share' ), 
	array( $this, 'mb_share_markup_text_fields_callback' ), 
	'mb-share-general-settings-page', 
	'mb_share_general_section',
	array(
		'name' => 'mb_share_pinterest',
		'value' => get_option( 'mb_share_pinterest' ),
	)
);

add_settings_field( 
	'mb-share-whatsapp', 
	__( 'Whatsapp', 'mb-share' ), 
	array( $this, 'mb_share_markup_text_fields_callback' ), 
	'mb-share-general-settings-page', 
	'mb_share_general_section',
	array(
		'name' => 'mb_share_whatsapp',
		'value' => get_option( 'mb_share_whatsapp' ),
	)
);		
