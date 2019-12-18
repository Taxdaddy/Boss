<?php
/**
 * Welcome Page Initiation
*/

include get_template_directory() . '/welcome/welcome.php';

/** Plugins **/
$plugins = array(
	// *** Companion Plugins
	'companion_plugins' => array(
		'access-demo-importer' 	=> array(
			'slug' 				=> 'access-demo-importer',
			'name' 				=> esc_html__('Instant Demo Importer', 'the100'),
			'filename' 			=>'access-demo-importer.php',
 			// Use either bundled, remote, wordpress
			'host_type' 		=> 'wordpress',
			'class' 			=> 'Access_Demo_Importer',
			'info' => __('Access Demo Importer Plugin adds the feature to Import the Demo Conent with a single click.', 'the100'),
		)
	),
	// *** Required Plugins
	'required_plugins' 			=> array(),

	// *** Recommended Plugins
	'recommended_plugins' => array(
			// Free Plugins
		'free_plugins' => array(
			'8-degree-coming-soon-page' => array(
				'slug' 		=> '8-degree-coming-soon-page',
				'filename' 	=> '8-degree-coming-soon-page.php',
				'class' 	=> 'Eight_Degree_Coming_Soon_Page'
			),
			'ultimate-form-builder-lite' => array(
				'slug' 		=> 'ultimate-form-builder-lite',
				'filename' 	=> 'ultimate-form-builder-lite.php',
				'class' 	=> 'UFBL_Class'
			),
			'8-degree-notification-bar' => array(
				'slug' 		=> '8-degree-notification-bar',
				'filename' 	=> '8degree-notification.php',
				'class' 	=> 'Edn_Class'
			)
		),
		// Pro Plugins
		'pro_plugins' => array()
	),
);

$strings = array(
		// Welcome Page General Texts
	'welcome_menu_text' => esc_html__( 'The100 Setup', 'the100' ),
	'theme_short_description' => esc_html__( 'The 100 is a brilliant free WordPress theme with premium like features. Carefully designed and developed, this multipurpose theme best suits for different business and personal purposes. The theme comes with clean and elegant design. It comprises 5 beautiful demos with one click demo import feature. It is a fully responsive and easy-to-use WP theme that comes with tons of customization options. Anybody can design a complete website in no time - without any coding skill. Multiple web layouts, 5 different header layouts, 2 slider layouts, well organized homepage section, 4 different blog layouts are some of the features included.', 'the100' ),

	// Plugin Action Texts
	'install_n_activate' => esc_html__('Install and Activate', 'the100'),
	'deactivate' => esc_html__('Deactivate', 'the100'),
	'activate' => esc_html__('Activate', 'the100'),

	// Recommended Plugins Section
	'pro_plugin_title' => esc_html__( 'Pro Plugins', 'the100' ),
	'pro_plugin_description' => esc_html__( 'Take Advantage of some of our Premium Plugins.', 'the100' ),
	'free_plugin_title' => esc_html__( 'Free Plugins', 'the100' ),
	'free_plugin_description' => esc_html__( 'These Free Plugins might be handy for you.', 'the100' ),

	// Demo Actions
	'installed_btn' => esc_html__('Activated', 'the100'),
	'deactivated_btn' => esc_html__('Activated', 'the100'),
	'demo_installing' => esc_html__('Installing Demo', 'the100'),
	'demo_installed' => esc_html__('Demo Installed', 'the100'),
	'demo_confirm' => esc_html__('Are you sure to import demo content ?', 'the100'),

	// Actions Required
	'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'the100' ),
	'customize_theme_btn' => esc_html__( 'Customize Theme', 'the100' ),
);

/**
 * Initiating Welcome Page
*/
$my_theme_wc_page = new The100_Welcome( $plugins, $strings );


