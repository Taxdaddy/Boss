<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_100
 */

get_header(); ?>
<header class="page-header">
	<div class="ed-container">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</div>
</header><!-- .page-header -->
<div class="ed-container">
	<?php 
	$the100_sidebar = get_post_meta(get_the_ID(), 'the100_sidebar_layout', true);
	if(empty($the100_sidebar)){$the100_sidebar='right-sidebar';}
	if($the100_sidebar=='left-sidebar'){
		get_sidebar('left');
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			endwhile; // End of the loop.
			?>

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
