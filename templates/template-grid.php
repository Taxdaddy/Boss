<?php
/**
 *	Template Name:Archive Grid
 *
 */

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_100
 */
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_100
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the100' ); ?></a>
		<?php $header_layout = get_theme_mod('the100_header_layout_setting','lay-one'); ?>
		<header id="masthead" class="site-header <?php echo esc_attr($header_layout);?>">
			<?php
			if(get_theme_mod('the100_header_top_setting','yes')=='yes'): ?>
			<div class="top-header">
				<div class="ed-container">
					<?php
					if($header_layout=='lay-two'): ?>
					<div class="site-branding">
						<?php
						if ( function_exists( 'the_custom_logo' ) ){ 
							if(has_custom_logo()){
								?>
								<div class="site-logo">								
									<?php the_custom_logo(); ?>
								</div>										
								<?php 	
							}
						}
						?>
						<div class="site-text">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						</div>
					</div>
					<?php 
					endif;
					$header_text = get_theme_mod('the100_header_top_text','');
					if($header_text!="" || get_theme_mod('the100_header_top_social','yes')=='yes'){
						echo '<div class="htext-soc-wrap">';
						if($header_text && $header_text!=""){
							echo '<div class="header-text-wrap">'.wp_kses_post($header_text).'</div>';
						}
						if($header_layout=='lay-three' || $header_layout=='lay-five'){ 
							echo "<div class='soc-cart-search-wrap'>";
						}
						if(get_theme_mod('the100_header_top_social','yes')=='yes'): ?>
						<div class="ed-social-icons">
							<?php do_action('the100_social_icons');?>
						</div>
						<?php
						endif;
						if($header_layout=='lay-three' || $header_layout=='lay-five') {
							if(get_theme_mod('the100_header_main_cart','yes')=='yes'): ?>
							<div class="header-cart">
								<?php 
								if ( class_exists( 'woocommerce' ) ):
									?>
								<a class="cart-content" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'the100' ); ?>">
									<div class="count">
										<i class="fa fa-shopping-bag"></i>
										<!-- <span class="cart-title"><?php esc_html_e('Shopping Cart','the100');?></span> -->
										<span class="cart-count"><?php echo wp_kses_data(sprintf( _n( '%s Item', '%s Items', WC()->cart->get_cart_contents_count(), 'the100' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
										<!-- <span class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_total() ) ; ?></span> -->
									</div>	               	
								</a>
								<?php //the_widget( 'WC_Widget_Cart' ); ?>
								<?php
								endif;
								?>
							</div>
							<?php
							endif;
							if(get_theme_mod('the100_header_main_search','yes')=='yes'): ?>
							<div class="menu-search">
								<i class="fa fa-search"></i>
								<div class="header-search-wrap">
									<span class="fa fa-close"></span>
									<?php get_search_form();?>
								</div>
							</div>
							<?php
							endif;
						}
						if($header_layout=='lay-three' || $header_layout=='lay-five'){ echo "</div>";}
						echo "</div>";
					}?>
				</div>	
			</div>
			<?php 
			endif;?>
			<div class="main-header">
				<div class="ed-container">
					<?php
					//check if menu exists for layotu three:
					if(has_nav_menu('menu-2') && $header_layout=='lay-three'){
						?>
						<nav id="site-navigation-left" class="main-navigation">
							<button class="menu-toggle" aria-controls="left-menu" aria-expanded="false"><?php esc_html_e( 'Left of Logo Menu', 'the100' ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'menu-2') ); ?>
						</nav><!-- #site-navigation -->
						<?php
					}
					if($header_layout!='lay-two'): ?>
					<div class="site-branding">
						<?php
						if ( function_exists( 'the_custom_logo' ) ){ 
							if(has_custom_logo()){
								?>
								<div class="site-logo">								
									<?php the_custom_logo(); ?>
								</div>										
								<?php 	
							}
						}
						?>
						<div class="site-text">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						</div>
					</div>
					<?php 
					endif;
					$menu_cls = '';
					if($header_layout=='lay-two' && get_theme_mod('the100_header_main_cart','yes')!='yes' && get_theme_mod('the100_header_main_search','yes')!='yes' && get_theme_mod('the100_header_main_text','')==''){
						$menu_cls = 'nav-full';
					}elseif($header_layout!='lay-two' && get_theme_mod('the100_header_main_cart','yes')!='yes' && get_theme_mod('the100_header_main_search','yes')!='yes'){
						$menu_cls = 'nav-full';
					}?>
					<div class="menu-search-wrap <?php echo esc_attr($menu_cls);?>">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'the100' ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'menu-1') ); ?>
						</nav><!-- #site-navigation -->

						<?php
						$menu_text = get_theme_mod('the100_header_main_text','');
						if(get_theme_mod('the100_header_main_cart','yes')=='yes' || get_theme_mod('the100_header_main_search','yes')=='yes' || $menu_text!=""){
							if($header_layout=='lay-two' && $menu_text!="") {
								echo "<div class='text-search-cart-wrap'>";
							}else{
								if(get_theme_mod('the100_header_main_cart','yes')=='yes' || get_theme_mod('the100_header_main_search','yes')=='yes'){
									echo "<div class='text-search-cart-wrap'>";
								}
							}
							if($menu_text && $menu_text!="" && $header_layout=='lay-two'){
								echo '<div class="menu-text-wrap">'.wp_kses_post($menu_text).'</div>';
							}
							if(get_theme_mod('the100_header_main_cart','yes')=='yes' && $header_layout!='lay-three'&& $header_layout!='lay-five'): ?>
							<div class="header-cart">
								<?php 
								if ( class_exists( 'woocommerce' ) ):
									?>
								<a class="cart-content" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'the100' ); ?>">
									<div class="count">
										<i class="fa fa-shopping-bag"></i>
										<!-- <span class="cart-title"><?php esc_html_e('Shopping Cart','the100');?></span> -->
										<span class="cart-count"><?php echo wp_kses_data(sprintf( _n( '%s Item', '%s Items', WC()->cart->get_cart_contents_count(), 'the100' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
										<!-- <span class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_total() ) ; ?></span> -->
									</div>	               	
								</a>
								<?php //the_widget( 'WC_Widget_Cart' ); ?>
								<?php
								endif;
								?>
							</div>
							<?php
							endif;
							if(get_theme_mod('the100_header_main_search','yes')=='yes' && $header_layout!='lay-three' && $header_layout!='lay-five'): ?>
							<div class="menu-search">
								<i class="fa fa-search"></i>
								<div class="header-search-wrap">
									<span class="fa fa-close"></span>
									<?php get_search_form();?>
								</div>
							</div>
							<?php
							endif;?>
							<?php 
							if($header_layout=='lay-two' && $menu_text!="") {
								echo '</div>';
							}else{
								if(get_theme_mod('the100_header_main_cart','yes')=='yes' || get_theme_mod('the100_header_main_search','yes')=='yes'){
									echo '</div>';
								}
							}
						} ?>
					</div>					
				</div>
			</div>
		</header><!-- #masthead -->
		<?php 
		global $post;
		$the100_sidebar = get_post_meta($post->ID, 'the100_sidebar_layout', true);
		if(empty($the100_sidebar)){
			if(is_woocommerce()){
				$the100_sidebar=get_theme_mod('the100_woocommerce_sidebar_layout','right-sidebar');
			}elseif(is_archive()){
				$the100_archive_layout = get_theme_mod('the100_archive_type_layout','list');
				$the100_archive_image_layout = get_theme_mod('the100_archive_image_layout','medium-image');
				$the100_sidebar = get_theme_mod('the100_archive_sidebar_layout', 'right-sidebar');
				$the100_sidebar .= ' '.$the100_archive_layout." ".$the100_archive_image_layout;
			}elseif(is_404()){
				$the100_sidebar='no-sidebar';
			}
			else{
				$the100_sidebar='right-sidebar';
			}
		}
		$the100_sidebar='grid no-sidebar';
		?>
		<div id="content" class="site-content <?php echo esc_attr($the100_sidebar);?>">
			<?php
			if(is_front_page()){
				do_action('the100_slider_section');
			}
			?>
			<header class="page-header">
				<div class="ed-container">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</header><!-- .page-header -->
			<div class="ed-container">
				<?php 
				$the100_sidebar = get_theme_mod('the100_archive_sidebar_layout', 'right-sidebar');
				if(empty($the100_sidebar)){$the100_sidebar='right-sidebar';}
				if($the100_sidebar=='left-sidebar'){
		//get_sidebar('left');
				}
				?>
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
						$blog_args = array(
							'post_type' => 'post',
							'post_per_page' => -1,
							'cat' => '2'
							);
						$blog_query = new WP_Query($blog_args);
						if($blog_query->have_posts()):
							while($blog_query->have_posts()):
								$blog_query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php 
		if($the100_sidebar=='right-sidebar' ){
			//get_sidebar();
		}
		?>
	</div>
	<?php
	get_footer();