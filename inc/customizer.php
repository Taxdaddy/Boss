<?php
/**
 * The 100 Theme Customizer
 *
 * @package The_100
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the100_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//Template Layout
	$wp_customize->add_section(
		'the100_template_section',
		array(
			'title'            =>       __('Template Settings', 'the100'),
			'priority'         =>      '5',
			)
		);

	$wp_customize->add_setting(
		'the100_template_setting',
		array(
			'default'       =>  'template1',
			'sanitize_callback' => 'the100_sanitize_radio_templatelayout'
			)
		);

	$wp_customize->add_control(
		'the100_template_setting',
		array(
			'type' => 'radio',
			'label' => __('Choose Template', 'the100'),
			'description' => __('Choose template for your Site. This setting will be applied for your Whole site.Some sections may not work properly in different template than demo.', 'the100'),
			'section' => 'the100_template_section',
			'choices' => array(
				'template1' => __('Classic Demo Layout', 'the100'),
				'template2' => __('Construction Demo Layout', 'the100'),
				'template3' => __('Resturant Demo Layout', 'the100'),
				'template4' => __('Events Demo Layout', 'the100'),
				'template5' => __('Charity Demo Layout', 'the100'),
				)
			)
		);	

	//Adding the General Setup Panel
	$wp_customize->add_panel('the100_basic_setting',
		array(
			'priority' => '10',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Basic Settings','the100'),
			'description' => __('Manage Basic Setups for the site','the100')
			)
		);

		//Add Default Sections to General Panel
		$wp_customize->get_section('colors')->panel = 'the100_basic_setting'; //priority 40
		$wp_customize->get_section('background_image')->panel = 'the100_basic_setting'; //priority 80
		$wp_customize->get_section('static_front_page')->panel = 'the100_basic_setting'; //priority 120

		//Webpage Layout
		$wp_customize->add_section(
			'the100_basic_setting_webpage_layout',
			array(
				'title'            =>       __('Web Layout Setting', 'the100'),
				'priority'         =>      '140',
				'panel'            =>      'the100_basic_setting',
				)
			);

		$wp_customize->add_setting(
			'the100_basic_setting_webpage_layout',
			array(
				'default'       =>  'fullwidth',
				'sanitize_callback' => 'the100_sanitize_radio_webpagelayout'
				)
			);

		$wp_customize->add_control(
			'the100_basic_setting_webpage_layout',
			array(
				'type' => 'radio',
				'label' => __('Website Layout', 'the100'),
				'description' => __('Choose weblayout for your Site. This setting will be applied for your Whole site.', 'the100'),
				'section' => 'the100_basic_setting_webpage_layout',
				'choices' => array(
					'fullwidth' => __('Full Width', 'the100'),
					'boxed' => __('Boxed Layout', 'the100'),
					)
				)
			);	

		require get_template_directory(). '/inc/assets/header-settings.php';
		require get_template_directory(). '/inc/assets/home-settings.php';
		require get_template_directory(). '/inc/assets/footer-settings.php';
		require get_template_directory(). '/inc/assets/social-settings.php';
		require get_template_directory(). '/inc/assets/inner-settings.php';
	}
	add_action( 'customize_register', 'the100_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the100_customize_preview_js() {
	wp_enqueue_script( 'the100_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'the100_customize_preview_js' );
