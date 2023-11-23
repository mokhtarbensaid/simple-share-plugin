<?php 


// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


add_settings_field( 
	'mb-share-button-design', 
	__( 'Buttons Design', 'mb-share' ), 
	array( $this, 'mb_share_markup_button_design_callback' ), 
	'mb-share-style-settings-page', 
	'mb_share_style_section',
	array(
		'name' => 'mb_share_button_design',
		'value' => get_option( 'mb_share_button_design' ),
		'options' => array(
			'radio-button' => __( 'Radio Buttons', 'mb-share' ),
			'rounded-button' => __( 'Rounded Buttons', 'mb-share' ),
			'square-button' => __( 'Square Buttons', 'mb-share' ),
		)
	)
);	

add_settings_field( 
	'mb-share-button-placement', 
	__( 'Buttons Placement', 'mb-share' ), 
	array( $this, 'mb_share_markup_button_placement_callback' ), 
	'mb-share-style-settings-page', 
	'mb_share_style_section',
	array(
		'name' => 'mb_share_button_placement',
		'value' => get_option( 'mb_share_button_placement' ),
		'options' => array(
			'after-content' => __( 'After Content', 'mb-share' ),
			'floating-right' => __( 'Floating Right', 'mb-share' ),
			'floating-left' => __( 'Floating Left', 'mb-share' ),
		)
	)
);	

add_settings_field( 
	'mb-share-button-color', 
	__( 'Buttons Color', 'mb-share' ), 
	array( $this, 'mb_share_markup_button_color_callback' ), 
	'mb-share-style-settings-page', 
	'mb_share_style_section',
	array(
		'name' => 'mb_share_button_color',
		'value' => get_option( 'mb_share_button_color' ),
		'options' => array(
			'color-original' => __( 'Original Color', 'mb-share' ),
			'color-custom' => __( 'Custom Color', 'mb-share' )
		)
	)
);

add_settings_field( 
	'mb-share-button-custom-color', 
	__( 'Buttons Custom Color', 'mb-share' ), 
	array( $this, 'mb_share_markup_button_custom_color_callback' ), 
	'mb-share-style-settings-page', 
	'mb_share_style_section'
);
