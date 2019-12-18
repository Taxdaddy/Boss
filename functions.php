<?php
/**
 * The 100 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_100
 */

if ( ! function_exists( 'the100_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the100_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The 100, use a find and replace
	 * to change 'the100' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'the100', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('the100-rectangle', 1170, 782, true);
	add_image_size('the100-square', 640, 640, true);
	add_image_size('the100-vh-large', 640, 809, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'the100' ),
		'menu-2' => esc_html__( 'Left of Logo', 'the100' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'the100_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo' , array(
		'header-text' => array( 'site-title', 'site-description' ),
	));

	add_theme_support('woocommerce');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'the100_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the100_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the100_content_width', 640 );
}
add_action( 'after_setup_theme', 'the100_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function the100_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'the100' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'the100' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'the100' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here.', 'the100' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Below Slider Area', 'the100' ),
		'id'            => 'th100-below-slider',
		'description'   => esc_html__( 'Add widgets here.', 'the100' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Counter Area', 'the100' ),
		'id'            => 'th100-home-counter',
		'description'   => esc_html__( 'Add widgets here.', 'the100' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Above Footer Area', 'the100' ),
		'id'            => 'th100-above-footer',
		'description'   => esc_html__( 'Add widgets here.', 'the100' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Footer', 'the100' ),
		'id'            => 'the100-top-footer',
		'description'   => esc_html__( 'Add widgets here.', 'the100' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'the100' ),
		'id'            => 'the100-footer-menu',
		'description'   => esc_html__( 'Add widgets here.', 'the100' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'the100_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function the100_scripts() {
	$query_args = array( 
		'family' => 'Hind:300,400,500,600,700|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i|Kristi'
	);
	wp_enqueue_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl.theme.default.css' );
	wp_enqueue_style( 'the100-style', get_stylesheet_uri() );
	wp_enqueue_style('the100-keyboard', get_template_directory_uri() . '/css/keyboard.css' );
	wp_enqueue_style('the100-responsive', get_template_directory_uri() . '/css/responsive.css' );
	if(is_rtl()){
		wp_enqueue_style('the100-rtl', get_template_directory_uri() . '/rtl.css' );
	}
	wp_enqueue_script( 'directional-hover', get_template_directory_uri() . '/js/jquery.directional-hover.min.js', array(), '20151215', true );
	wp_enqueue_script( 'the100-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'the100-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.3.3', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.1.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script('the100-myscript', get_template_directory_uri() .'/js/myscript.js');
	wp_enqueue_script( 'the100-myscript', get_template_directory_uri() . '/js/myscript.js', array('jquery'), '20170531', true );
	do_action('the100_homepage_slider_config');
}
add_action( 'wp_enqueue_scripts', 'the100_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Theme Custom Theme Functions
 */
require get_template_directory() . '/inc/the100_functions.php';

/**
 * Load Theme Sanitizer Functions
 */
require get_template_directory() . '/inc/the100_sanitizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/the100_metabox.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/the100_widgets.php';
/**
 * Load Welcome Page.
 */
//require get_template_directory() . '/welcome/the100_about.php';
require get_template_directory() . '/welcome/welcome-config.php';

add_filter('adi_git_config_location', 'git_url_config' );
function git_url_config(){
	$git_url = 'https://raw.githubusercontent.com/8degreethemes/8degreethemes.github.io/master/demos/the100/config.json';
	return $git_url;
}