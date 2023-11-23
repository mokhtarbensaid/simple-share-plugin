<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

register_setting( 
	'mb-share-advanced-settings-group', 
	'mb_share_posttype' 
);

register_setting( 
	'mb-share-advanced-settings-group', 
	'mb_share_custom_css'
);