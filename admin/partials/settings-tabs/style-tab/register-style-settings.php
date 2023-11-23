<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

register_setting( 
	'mb-share-style-settings-group', 
	'mb_share_button_design', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);

register_setting( 
	'mb-share-style-settings-group', 
	'mb_share_button_placement', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);

register_setting( 
	'mb-share-style-settings-group', 
	'mb_share_button_color', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);
register_setting( 
	'mb-share-style-settings-group', 
	'mb_share_button_custom_color', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);