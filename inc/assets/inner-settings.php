<?php
//Add New Panel for inner Setups
$wp_customize->add_panel( 'the100_inner_setting', array(
	'priority' => '20',
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Inner Page Settings', 'the100' ),
	'description' => __( 'Setup inner of the site.', 'the100' ),
	)
);

/* Archive Page Layout */
$wp_customize->add_section( 'the100_archive_section', array(
	'title' => __('Archive Page Layout', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_inner_setting',
	'priority' => 0,
	)
);

$wp_customize->add_setting( 'the100_archive_sidebar_layout', array( 
	'default' 			=> 'right-sidebar',
	'sanitize_callback' => 'the100_sanitize_radio_sidebar' 
	)
);

$wp_customize->add_control( 'the100_archive_sidebar_layout', array(
	'type' => 'radio',
	'label' => __( 'Choose Layout for Archive Page', 'the100' ),
	'section' => 'the100_archive_section',
	'choices' => array(
		'left-sidebar' => __('Left Sidebar', 'the100'),
		'right-sidebar' => __('Right Sidebar', 'the100'),
		'no-sidebar' => __('No Sidebar', 'the100'),
		),
	)
);

/* Archive grid/list option */
$wp_customize->add_section( 'the100_archive_type', array(
	'title' => __('Archive Posts Layout', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_inner_setting',
	'priority' => 0,
	)
);

$wp_customize->add_setting( 'the100_archive_type_layout', array( 
	'default' 			=> 'list',
	'sanitize_callback' => 'the100_sanitize_list_grid' 
	)
);

$wp_customize->add_control( 'the100_archive_type_layout', array(
	'type' => 'radio',
	'label' => __( 'Choose layout for archive posts', 'the100' ),
	'section' => 'the100_archive_type',
	'choices' => array(
		'list' => __('List View', 'the100'),
		'grid' => __('Grid View', 'the100'),
		),
	)
);

$wp_customize->add_setting( 'the100_archive_image_layout', array( 
	'default' 			=> 'medium-image',
	'sanitize_callback' => 'the100_sanitize_radio_image' 
	)
);

$wp_customize->add_control( 'the100_archive_image_layout', array(
	'type' => 'radio',
	'label' => __( 'Choose image layout for archive posts', 'the100' ),
	'section' => 'the100_archive_type',
	'choices' => array(
		'large-image' => __('Above Content', 'the100'),
		'medium-image' => __('Beside Content', 'the100'),
		),
	'active_callback' => 'the100_archive_type_list'
	)
);

if ( class_exists( 'woocommerce' ) ){
	/* Woocommerce Page Layout */
	$wp_customize->add_section( 'the100_woocommerce_section', array(
		'title' => __('Woocommerce Page Layout', 'the100' ),
		'capability' => 'edit_theme_options',
		'panel' => 'the100_inner_setting',
		'priority' => 0,
		)
	);

	$wp_customize->add_setting( 'the100_woocommerce_sidebar_layout', array( 
		'default' 			=> 'right-sidebar',
		'sanitize_callback' => 'the100_sanitize_radio_sidebar' 
		)
	);

	$wp_customize->add_control( 'the100_woocommerce_sidebar_layout', array(
		'type' => 'radio',
		'label' => __( 'Choose Layout for Woocommerce Page', 'the100' ),
		'section' => 'the100_woocommerce_section',
		'choices' => array(
			'left-sidebar' => __('Left Sidebar', 'the100'),
			'right-sidebar' => __('Right Sidebar', 'the100'),
			'no-sidebar' => __('No Sidebar', 'the100'),
			),
		)
	);
}