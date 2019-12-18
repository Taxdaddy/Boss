<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_100
 */

get_header(); ?>
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
		get_sidebar('left');
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

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
			get_sidebar();
		}
		?>
	</div>
	<?php
	get_footer();
