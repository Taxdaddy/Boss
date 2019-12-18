<?php
//social Settings section
$wp_customize->add_section('the100_social_setting_section', array(
	'priority' => 70,
	'capability' => 'edit_theme_options',
	'title' => __('Social Settings', 'the100'),		       	
	)
);

//social facebook link
$wp_customize->add_setting('the100_social_facebook', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('the100_social_facebook',array(
	'type' => 'url',
	'label' => __('Facebook','the100'),
	'section' => 'the100_social_setting_section',
	'setting' => 'the100_social_facebook'
	)
);

//social twitter link
$wp_customize->add_setting('the100_social_twitter', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('the100_social_twitter',array(
	'type' => 'url',
	'label' => __('Twitter','the100'),
	'section' => 'the100_social_setting_section',
	'setting' => 'the100_social_twitter'
	)
);

//social instagram link
$wp_customize->add_setting('the100_social_instagram', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('the100_social_instagram',array(
	'type' => 'url',
	'label' => __('Instagram','the100'),
	'section' => 'the100_social_setting_section',
	'setting' => 'the100_social_instagram'
	)
);

//social pinterest link
$wp_customize->add_setting( 'the100_social_pinterest', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('the100_social_pinterest',array(
	'type' => 'url',
	'label' => __('Pinterest','the100'),
	'section' => 'the100_social_setting_section',
	'setting' => 'the100_social_pinterest'
	)
);

//social linkedin link
$wp_customize->add_setting('the100_social_linkedin', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('the100_social_linkedin',array(
	'type' => 'url',
	'label' => __('Linkedin','the100'),
	'section' => 'the100_social_setting_section',
	'setting' => 'the100_social_linkedin'
	)
);
//social youtube link
$wp_customize->add_setting('the100_social_youtube', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('the100_social_youtube',array(
	'type' => 'url',
	'label' => __('YouTube','the100'),
	'section' => 'the100_social_setting_section',
	'setting' => 'the100_social_youtube'
	)
);