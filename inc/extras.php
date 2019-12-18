<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package The_100
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function the100_body_classes( $classes ) {
	// Adds a class of template to all pages
	if ( get_theme_mod('the100_template_setting','template1') ) {
		$classes[] = 'the100-'.get_theme_mod('the100_template_setting','template1');
	}

	// Adds a class of template to all pages
	if ( get_theme_mod('the100_basic_setting_webpage_layout','fullwidth') ) {
		$classes[] = 'the100-'.get_theme_mod('the100_basic_setting_webpage_layout','fullwidth');
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'the100_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function the100_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'the100_pingback_header' );

function the100_parent_category_lists(){
	$category 	=	get_categories( array(
		'hide_empty' => 1,
		'orderby' => 'name',
		'parent'  => 0,
		));
	$cat_list 	=	array();
	$cat_list[0]=	__('Select Parent category','the100');
	foreach ($category as $cat) {
		$cat_list[$cat->term_id]	=	$cat->name;
	}
	return $cat_list;
}

//adding custom scripts and styles in header for favicon and other
function the100_header_scripts(){
	$header_bg_v = get_header_image();
	echo "<style type='text/css' media='all'>";
	if(($header_bg_v)){
		$header_bg_v =   '.site-header { background: url("'.esc_url($header_bg_v).'") no-repeat scroll left top rgba(0, 0, 0, 0); position: relative; background-size: cover; }';
		echo wp_kses_post($header_bg_v);
		echo "\n";
		echo '.site-header:before {
			content: "";
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background: rgba(255,255,255,0.7);
		}';
	}
	echo "</style>\n";
}
add_action('wp_head','the100_header_scripts');

if ( class_exists( 'woocommerce' ) ){
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	function the100_wrapper_start() {
		echo '<div class="ed-container"><div id="primary" class="content-area">';
	}
	add_action('woocommerce_before_main_content', 'the100_wrapper_start', 10);

	function the100_wrapper_end() {
		echo '</div>';
		$the100_sidebar=get_theme_mod('the100_woocommerce_sidebar_layout','right-sidebar');
		if($the100_sidebar=='left-sidebar'){
			get_sidebar('left');
		}elseif($the100_sidebar=='right-sidebar'){
			get_sidebar('right');
		}else{
			remove_action('woocommerce_sidebar','woocommerce_get_sidebar');
		}
		echo '</div>';
	}
	add_action('woocommerce_after_main_content','the100_wrapper_end',9);
}