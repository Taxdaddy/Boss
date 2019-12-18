<?php
//Add New Panel for header Setups
$wp_customize->add_panel( 'the100_header_setting', array(
	'priority' => '20',
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Header Settings', 'the100' ),
	'description' => __( 'Setup header of the site.', 'the100' ),
	)
);

/* Header Section */
$wp_customize->add_section( 'the100_header_layout', array(
	'title' => __('Header Layouts', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_header_setting',
	'priority' => 0,
	)
);

$wp_customize->add_setting( 'the100_header_layout_setting', array( 
	'default' 			=> 'lay-one',
	'sanitize_callback' => 'the100_sanitize_lay' 
	)
);

$wp_customize->add_control( 'the100_header_layout_setting', array(
	'type' => 'radio',
	'label' => __( 'Header Layouts', 'the100' ),
	'section' => 'the100_header_layout',
	'choices' => array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		'lay-three' => __('Layout Three', 'the100'),
		'lay-four' => __('Layout Four', 'the100'),
		'lay-five' => __('Layout Five', 'the100'),
		),
	)
);

/* Top Header Section */
$wp_customize->add_section( 'the100_header_top', array(
	'title' => __('Top Header', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_header_setting',
	'priority' => 0,
	)
);

$wp_customize->add_setting( 'the100_header_top_setting', array( 
	'default' 			=> 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no' 
	)
);

$wp_customize->add_control( 'the100_header_top_setting', array(
	'type' => 'radio',
	'label' => __( 'Enable Top Header', 'the100' ),
	'section' => 'the100_header_top',
	'description' => __('Select yes to enable top header.', 'the100'),
	'settings' => 'the100_header_top_setting',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

$wp_customize->add_setting(  'the100_header_top_text', array( 
	'default' 			=> '',
	'sanitize_callback' => 'the100_sanitize_text' 
	)
);

$wp_customize->add_control( 'the100_header_top_text', array(
	'type' => 'textarea',
	'label' => __( 'Texts on Top Header', 'the100' ),
	'section' => 'the100_header_top',
	'description' => __('Enter texts like contact number,email, location to show in top header.Supports Html', 'the100'),
	'settings' => 'the100_header_top_text',
	)
);

$wp_customize->add_setting( 'the100_header_top_social', array( 
	'default' 			=> 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no' 
	)
);

$wp_customize->add_control( 'the100_header_top_social', array(
	'type' => 'radio',
	'label' => __( 'Enable Top Header Social Icons', 'the100' ),
	'section' => 'the100_header_top',
	'description' => __('Select yes to enable social icons on top header. To Manage Social Icons, go to Appearance > Customize > Social Icons', 'the100'),
	'settings' => 'the100_header_top_social',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

$wp_customize->get_section('title_tagline')->panel = 'the100_header_setting'; //priority 20
$wp_customize->get_section('header_image')->panel = 'the100_header_setting'; //priority 60

/* Main Header Section */
$wp_customize->add_section( 'the100_header_main', array(
	'title' => __('Main Header', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_header_setting',
	'description' => __('Manage Logo from Customize > Header Settings > Site Identity & Navigation from Customize > Menus','the100'),
	'priority' => 0,
	)
);

$wp_customize->add_setting(  'the100_header_main_text', array( 
	'default' 			=> '',
	'sanitize_callback' => 'the100_sanitize_text' 
	)
);

$wp_customize->add_control( 'the100_header_main_text', array(
	'type' => 'textarea',
	'label' => __( 'Texts on Main Header', 'the100' ),
	'section' => 'the100_header_main',
	'description' => __('Enter texts like contact number,email, location to show in main header beside menu.Supports Html', 'the100'),
	'active_callback' => 'flag_header_lay_two'
	)
);

$wp_customize->add_setting( 'the100_header_main_cart', array( 
	'default' 			=> 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no' 
	)
);

$wp_customize->add_control( 'the100_header_main_cart', array(
	'type' => 'radio',
	'label' => __( 'Enable Main Header Cart Icon', 'the100' ),
	'section' => 'the100_header_main',
	'description' => __('Select yes to enable cart icon on main header beside menu. WooCommerce shall be installed to function it.', 'the100'),
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

$wp_customize->add_setting( 'the100_header_main_search', array( 
	'default' 			=> 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no' 
	)
);

$wp_customize->add_control( 'the100_header_main_search', array(
	'type' => 'radio',
	'label' => __( 'Enable Main Header Search Icon', 'the100' ),
	'section' => 'the100_header_main',
	'description' => __('Select yes to enable search icon on main header beside menu.', 'the100'),
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);