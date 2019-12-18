<?php
/**
 *	Template Name:Homepage
 *
 */

get_header();
if(get_the_content()){
	?>
	<section class="homepage-content">
		<div class="ed-container">
			<?php the_content();?>
		</div>
	</section>
	<?php
}
do_action('the100_belowslider_section');
do_action('the100_featured_section');
do_action('the100_team_section');
do_action('the100_gallery_section');
do_action('the100_aboutservice_section');
do_action('the100_counter_section');
do_action('the100_testimonial_partner_section');
do_action('the100_blog_section');
do_action('the100_abovefooter_section');
get_footer();