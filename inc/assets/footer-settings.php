<?php
//Add New Panel for footer Setups
$wp_customize->add_panel( 'the100_footer_setting', array(
	'priority' => '20',
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Footer Settings', 'the100' ),
	'description' => __( 'Setup footer of the site.', 'the100' ),
	)
);

/* Top footer Section */
$wp_customize->add_section( 'the100_footer_top', array(
	'title' => __('Top Footer', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_footer_setting',
	'priority' => 0,
	)
);

$wp_customize->add_setting( 'the100_footer_top_setting', array( 
	'default' 			=> 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no' 
	)
);

$wp_customize->add_control( 'the100_footer_top_setting', array(
	'type' => 'radio',
	'label' => __( 'Enable Top Footer', 'the100' ),
	'section' => 'the100_footer_top',
	'description' => __('Add widgets from Appearance > Widgets > Top Footer widget area.', 'the100'),
	'settings' => 'the100_footer_top_setting',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

$wp_customize->add_setting( 'the100_footer_top_column', array( 
	'default' 			=> '3',
	'sanitize_callback' => 'the100_sanitize_integer' 
	)
);

$wp_customize->add_control( 'the100_footer_top_column', array(
	'type' => 'radio',
	'label' => __( 'Choose Columns on top footer', 'the100' ),
	'section' => 'the100_footer_top',
	'choices' => array(
		'1' => __('1', 'the100'),
		'2' => __('2', 'the100'),
		'3' => __('3', 'the100'),
		'4' => __('4', 'the100'),
		),
	)
);

/* Main footer Section */
$wp_customize->add_section( 'the100_footer_main', array(
	'title' => __('Main Footer', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_footer_setting',
	'priority' => 0,
	)
);

$wp_customize->add_setting(  'the100_footer_main_text', array( 
	'default' 			=> '',
	'sanitize_callback' => 'the100_sanitize_text' 
	)
);

$wp_customize->add_control( 'the100_footer_main_text', array(
	'type' => 'textarea',
	'label' => __( 'Copyright Texts on Main footer', 'the100' ),
	'section' => 'the100_footer_main',
	'description' => __('Supports Html', 'the100'),
	)
);

$wp_customize->add_setting( 'the100_footer_main_menu', array( 
	'default' 			=> 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no' 
	)
);

$wp_customize->add_control( 'the100_footer_main_menu', array(
	'type' => 'radio',
	'label' => __( 'Enable Main Footer Menu', 'the100' ),
	'section' => 'the100_footer_main',
	'description' => __('Add Custom Menu from Appearance > Widgets > Footer Menu widget area.', 'the100'),
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);