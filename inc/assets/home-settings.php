<?php
//Add New Panel for Homepage Setups
$wp_customize->add_panel( 'the100_home_setting', array(
	'priority' => '20',
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Homepage Settings', 'the100' ),
	'description' => __( 'Setup Homepage of the site.', 'the100' ),
	)
);

//Slider Baisc setup sections
$wp_customize->add_section('the100_home_slider',array(
	'priority' => '10',
	'title' => __( 'Slider Settings', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Setup the slider settings for homepage', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_slider_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_slider_setting',array(
	'type' => 'radio',
	'label' => __('Enable Slider', 'the100'),
	'description' => __('Select Yes to show Slider on homepage.','the100'),
	'section' => 'the100_home_slider',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

//select category for slider
$wp_customize->add_setting(
	'the100_home_slider_category',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'the100_sanitize_integer'
		)
	);

$wp_customize->add_control( 'the100_home_slider_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in slider','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_slider',
	'choices' => the100_parent_category_lists(),
	)
);
//pager
$wp_customize->add_setting(
	'the100_home_slider_pager',
	array(
		'default' => 'yes',
		'sanitize_callback' => 'the100_sanitize_yes_no'
		)
	);

$wp_customize->add_control('the100_home_slider_pager',array(
	'type' => 'radio',
	'label' => __('Slider Pager', 'the100'),
	'section' => 'the100_home_slider',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);
//controls
$wp_customize->add_setting(
	'the100_home_slider_controls',
	array(
		'default' => 'yes',
		'sanitize_callback' => 'the100_sanitize_yes_no'
		)
	);

$wp_customize->add_control('the100_home_slider_controls',array(
	'type' => 'radio',
	'label' => __('Slider Controls', 'the100'),
	'section' => 'the100_home_slider',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);
//transition type
$wp_customize->add_setting('the100_home_slider_transition_type', array(
	'default' => 'slideOutLeft',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_transition_type'
	)
);

$wp_customize->add_control('the100_home_slider_transition_type', array(
	'type' => 'select',
	'label' => __('Transition Type', 'the100'),
	'section' => 'the100_home_slider',
	'choices' => array(
		'fadeOut' => __('Fade', 'the100'),
		'slideOutLeft' => __('Slide', 'the100')
		)
	)
);
//auto
$wp_customize->add_setting('the100_home_slider_transition_auto',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);

$wp_customize->add_control('the100_home_slider_transition_auto',array(
	'type' => 'radio',
	'label' => __('Auto Play', 'the100'),
	'section' => 'the100_home_slider',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

$wp_customize->add_setting( 'the100_home_slider_transition_speed',array(
	'default'=>'1000',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control('the100_home_slider_transition_speed',array(
	'type' => 'number',
	'label' => __('Auto Play Speed', 'the100'),
	'section' => 'the100_home_slider',
	'active_callback' => 'the100_autoplay_on'
	)
);

$wp_customize->add_setting('the100_home_slider_caption',array(
	'default' => 'caption-left',
	'sanitize_callback' => 'the100_sanitize_caption'
	)
);

$wp_customize->add_control('the100_home_slider_caption',array(
	'type' => 'radio',
	'label' => __('Slider Caption', 'the100'),
	'description' => __('Choose how to show titles and description over Slider', 'the100'),
	'section' => 'the100_home_slider',
	'choices' => array(
		'caption-no' => __('No caption', 'the100'),
		'caption-left' => __('Left Aligned', 'the100'),
		'caption-center' => __('Center Aligned', 'the100'),
		),
	)
);

//below slider text section:
$wp_customize->add_section('the100_home_belowslider',array(
	'priority' => '10',
	'title' => __( 'Below Slider Text', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Add contents from Widgets on this section.', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_belowslider_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_belowslider_setting',array(
	'type' => 'radio',
	'label' => __('Enable Below Slider Text', 'the100'),
	'section' => 'the100_home_belowslider',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

//featured section:
$wp_customize->add_section('the100_home_featured',array(
	'priority' => '10',
	'title' => __( 'Featured Settings', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Setup the featured posts settings for homepage', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_featured_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_featured_setting',array(
	'type' => 'radio',
	'label' => __('Enable Featured Section', 'the100'),
	'description' => __('Select Yes to show featured posts on homepage.','the100'),
	'section' => 'the100_home_featured',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);
$wp_customize->add_setting('the100_home_featured_title',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_featured_title',array(
	'type' => 'text',
	'label' => __('Featured Section Title', 'the100'),
	'section' => 'the100_home_featured',
	)
);
$wp_customize->add_setting('the100_home_featured_desc',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_featured_desc',array(
	'type' => 'textarea',
	'label' => __('Featured Section Description', 'the100'),
	'section' => 'the100_home_featured',
	)
);
//layout for featured
$wp_customize->add_setting('the100_home_featured_layout',array(
	'default' => 'lay-one',
	'sanitize_callback' => 'the100_sanitize_lay'
	)
);
$wp_customize->add_control('the100_home_featured_layout',array(
	'type' => 'radio',
	'label' => __('Layout for Featured Section', 'the100'),
	'section' => 'the100_home_featured',
	'choices' => array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		'lay-three' => __('Layout Three', 'the100'),
		'lay-four' => __('Layout Four', 'the100'),
		),
	)
);

//select category for featured
$wp_customize->add_setting('the100_home_featured_category',array(
	'default' => '0',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control( 'the100_home_featured_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in Featured','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_featured',
	'choices' => the100_parent_category_lists(),
	)
);

//team
$wp_customize->add_section('the100_home_team',array(
	'priority' => '10',
	'title' => __( 'Team Settings', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Setup the team settings for homepage', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_team_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_team_setting',array(
	'type' => 'radio',
	'label' => __('Enable Team Section', 'the100'),
	'description' => __('Select Yes to show team section on homepage.','the100'),
	'section' => 'the100_home_team',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

$wp_customize->add_setting('the100_home_team_title',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_team_title',array(
	'type' => 'text',
	'label' => __('Team Section Title', 'the100'),
	'section' => 'the100_home_team',
	)
);
$wp_customize->add_setting('the100_home_team_desc',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_team_desc',array(
	'type' => 'textarea',
	'label' => __('Team Section Description', 'the100'),
	'section' => 'the100_home_team',
	)
);

//select category for team
$wp_customize->add_setting('the100_home_team_category',array(
	'default' => '0',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control( 'the100_home_team_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in team','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_team',
	'choices' => the100_parent_category_lists(),
	)
);
//layout for team
$wp_customize->add_setting('the100_home_team_layout',array(
	'default' => 'lay-one',
	'sanitize_callback' => 'the100_sanitize_lay'
	)
);
$wp_customize->add_control('the100_home_team_layout',array(
	'type' => 'radio',
	'label' => __('Layout for Team Section', 'the100'),
	'section' => 'the100_home_team',
	'choices' => array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		'lay-three' => __('Layout Three', 'the100'),
		),
	)
);

//gallery
$wp_customize->add_section('the100_home_gallery',array(
	'priority' => '10',
	'title' => __( 'Gallery Settings', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Setup the gallery settings for homepage', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_gallery_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_gallery_setting',array(
	'type' => 'radio',
	'label' => __('Enable Gallery Section', 'the100'),
	'description' => __('Select Yes to show gallery section on homepage.','the100'),
	'section' => 'the100_home_gallery',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

//layout for about gallery
$wp_customize->add_setting('the100_home_gallery_layout',array(
	'default' => 'lay-one',
	'sanitize_callback' => 'the100_sanitize_lay'
	)
);
$wp_customize->add_control('the100_home_gallery_layout',array(
	'type' => 'radio',
	'label' => __('Layout for Gallery Section', 'the100'),
	'section' => 'the100_home_gallery',
	'choices' => array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		),
	)
);

$wp_customize->add_setting('the100_home_gallery_title',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_gallery_title',array(
	'type' => 'text',
	'label' => __('Gallery Section Title', 'the100'),
	'section' => 'the100_home_gallery',
	)
);
$wp_customize->add_setting('the100_home_gallery_desc',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_gallery_desc',array(
	'type' => 'textarea',
	'label' => __('Gallery Section Description', 'the100'),
	'section' => 'the100_home_gallery',
	)
);
//select category for gallery
$wp_customize->add_setting('the100_home_gallery_category',array(
	'default' => '0',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control( 'the100_home_gallery_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in gallery','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_gallery',
	'choices' => the100_parent_category_lists(),
	)
);

//about
$wp_customize->add_section('the100_home_aboutservice',array(
	'priority' => '10',
	'title' => __( 'About & Service Section', 'the100' ),
	'capability' => 'edit_theme_options',
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_aboutservice_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_aboutservice_setting',array(
	'type' => 'radio',
	'label' => __('Enable About Section', 'the100'),
	'section' => 'the100_home_aboutservice',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);
//layout for about service
$wp_customize->add_setting('the100_home_aboutservice_layout',array(
	'default' => 'lay-one',
	'sanitize_callback' => 'the100_sanitize_lay'
	)
);
$wp_customize->add_control('the100_home_aboutservice_layout',array(
	'type' => 'radio',
	'label' => __('Layout for About Section', 'the100'),
	'section' => 'the100_home_aboutservice',
	'choices' => array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		),
	)
);

$wp_customize->add_setting('the100_home_aboutservice_page',array(
	'default' => '0',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);
$wp_customize->add_control('the100_home_aboutservice_page',array(
	'type' => 'dropdown-pages',
	'label' => __('Select About Page', 'the100'),
	'section' => 'the100_home_aboutservice',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

//select category for about+service
$wp_customize->add_setting('the100_home_service_category',array(
	'default' => '0',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control( 'the100_home_service_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in About Section','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_aboutservice',
	'choices' => the100_parent_category_lists(),
	)
);

//counter
$wp_customize->add_section('the100_home_counter',array(
	'priority' => '10',
	'title' => __( 'Counter Section', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Add counters from Widgets on this section.', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_counter_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_counter_setting',array(
	'type' => 'radio',
	'label' => __('Enable Counter', 'the100'),
	'section' => 'the100_home_counter',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

$wp_customize->add_setting('the100_home_counter_bkg', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
	));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'the100_home_counter_bkg', array(
	'label' => __('Background Image', 'the100'),
	'section' => 'the100_home_counter',
	'active_callback' => 'the100_counter_layone'
	)));

//testimonialpartner
$wp_customize->add_section('the100_home_testimonialpartner',array(
	'priority' => '10',
	'title' => __( 'Testimonials & Partner Settings', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Setup the testimonial & partner settings for homepage', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

//layout for about featured
$wp_customize->add_setting('the100_home_testimonialpartner_layout',array(
	'default' => 'lay-one',
	'sanitize_callback' => 'the100_sanitize_lay'
	)
);
$wp_customize->add_control('the100_home_testimonialpartner_layout',array(
	'type' => 'radio',
	'label' => __('Layout for this section', 'the100'),
	'section' => 'the100_home_testimonialpartner',
	'choices' => array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		),
	)
);
$wp_customize->add_setting('the100_home_testimonial_title',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_testimonial_title',array(
	'type' => 'text',
	'label' => __('Testimonial Section Title', 'the100'),
	'section' => 'the100_home_testimonialpartner',
	)
);
$wp_customize->add_setting('the100_home_testimonial_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_testimonial_setting',array(
	'type' => 'radio',
	'label' => __('Enable Testimonial Section', 'the100'),
	'description' => __('Select Yes to show testimonial section on homepage.','the100'),
	'section' => 'the100_home_testimonialpartner',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);

//select category for testimonial
$wp_customize->add_setting('the100_home_testimonial_category',array(
	'default' => '0',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control( 'the100_home_testimonial_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in testimonial','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_testimonialpartner',
	'choices' => the100_parent_category_lists(),
	)
);

$wp_customize->add_setting('the100_home_partner_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_partner_setting',array(
	'type' => 'radio',
	'label' => __('Enable Partner Section', 'the100'),
	'description' => __('Select Yes to show partner section on homepage.','the100'),
	'section' => 'the100_home_testimonialpartner',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);
$wp_customize->add_setting('the100_home_partner_title',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_partner_title',array(
	'type' => 'text',
	'label' => __('Partner Section Title', 'the100'),
	'section' => 'the100_home_testimonialpartner',
	)
);
//select category for partner
$wp_customize->add_setting('the100_home_partner_category',array(
	'default' => '0',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control( 'the100_home_partner_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in partner','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_testimonialpartner',
	'choices' => the100_parent_category_lists(),
	)
);

//blog
$wp_customize->add_section('the100_home_blog',array(
	'priority' => '10',
	'title' => __( 'Blog Settings', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Setup the blog settings for homepage', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_blog_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_blog_setting',array(
	'type' => 'radio',
	'label' => __('Enable Blog Section', 'the100'),
	'description' => __('Select Yes to show blog section on homepage.','the100'),
	'section' => 'the100_home_blog',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);
//layout for blog
$wp_customize->add_setting('the100_home_blog_layout',array(
	'default' => 'lay-one',
	'sanitize_callback' => 'the100_sanitize_lay'
	)
);
$wp_customize->add_control('the100_home_blog_layout',array(
	'type' => 'radio',
	'label' => __('Layout for this section', 'the100'),
	'section' => 'the100_home_blog',
	'choices' => array(
		'lay-one' => __('Layout One', 'the100'),
		'lay-two' => __('Layout Two', 'the100'),
		'lay-three' => __('Layout Three', 'the100'),
		'lay-four' => __('Layout Four', 'the100'),
		),
	)
);
$wp_customize->add_setting('the100_home_blog_title',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_blog_title',array(
	'type' => 'text',
	'label' => __('Blog Section Title', 'the100'),
	'section' => 'the100_home_blog',
	)
);
$wp_customize->add_setting('the100_home_blog_desc',array(
	'default' => '',
	'sanitize_callback' => 'the100_sanitize_text'
	)
);
$wp_customize->add_control('the100_home_blog_desc',array(
	'type' => 'textarea',
	'label' => __('Blog Section Description', 'the100'),
	'section' => 'the100_home_blog',
	)
);
//select category for blog
$wp_customize->add_setting('the100_home_blog_category',array(
	'default' => '0',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'the100_sanitize_integer'
	)
);

$wp_customize->add_control( 'the100_home_blog_category', array(
	'type'	=>	'select',
	'label' => __('Select a category to show in blog','the100'),
	'description' => __('Note: Parent Category are only listed in dropdown.','the100'),
	'section' => 'the100_home_blog',
	'choices' => the100_parent_category_lists(),
	)
);

//above footer cta section:
$wp_customize->add_section('the100_home_abovefooter',array(
	'priority' => '10',
	'title' => __( 'Above Footer CTA', 'the100' ),
	'capability' => 'edit_theme_options',
	'description' => __( 'Add contents from Widgets on this section.', 'the100' ),
	'panel' => 'the100_home_setting'
	)
);

$wp_customize->add_setting('the100_home_abovefooter_setting',array(
	'default' => 'yes',
	'sanitize_callback' => 'the100_sanitize_yes_no'
	)
);
$wp_customize->add_control('the100_home_abovefooter_setting',array(
	'type' => 'radio',
	'label' => __('Enable Above Footer CTA', 'the100'),
	'section' => 'the100_home_abovefooter',
	'choices' => array(
		'yes' => __('Yes', 'the100'),
		'no' => __('No', 'the100'),
		),
	)
);