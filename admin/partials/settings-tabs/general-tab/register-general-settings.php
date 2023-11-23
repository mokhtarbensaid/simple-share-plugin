<?php 

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


register_setting( 
	'mb-share-general-settings-group', 
	'mb_share_facebook', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);

register_setting( 
	'mb-share-general-settings-group', 
	'mb_share_twitter', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);

register_setting( 
	'mb-share-general-settings-group', 
	'mb_share_linkedin', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);

register_setting( 
	'mb-share-general-settings-group', 
	'mb_share_pinterest', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);

register_setting( 
	'mb-share-general-settings-group', 
	'mb_share_whatsapp', 
	array('sanitize_callback' => 'sanitize_text_field' ) 
);