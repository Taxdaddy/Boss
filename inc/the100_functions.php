<?php
// fucntion to add social icons
function the100_social_cb(){
	$facebooklink = esc_url( get_theme_mod('the100_social_facebook','') );
	$twitterlink = esc_url( get_theme_mod('the100_social_twitter',''));
	$instagramlink = esc_url( get_theme_mod('the100_social_instagram','') );
	$pinterestlink = esc_url( get_theme_mod('the100_social_pinterest','') );
	$linkedinlink = esc_url( get_theme_mod('the100_social_linkedin','') );
	$youtubelink = esc_url( get_theme_mod('the100_social_youtube','') );
	?>
	<div class="social-icons">
		<?php if(!empty($facebooklink)){ ?>
		<a href="<?php echo esc_url($facebooklink); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($twitterlink)){ ?>
		<a href="<?php echo esc_url($twitterlink); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($instagramlink)){ ?>
		<a href="<?php echo esc_url($instagramlink); ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($pinterestlink)){ ?>
		<a href="<?php echo esc_url($pinterestlink); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($linkedinlink)){ ?>
		<a href="<?php echo esc_url($linkedinlink); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($youtubelink)){ ?>
		<a href="<?php echo esc_url($youtubelink); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
		<?php } ?>
	</div>
	<?php
}
add_action('the100_social_icons','the100_social_cb');

add_action('the100_homepage_slider_config','the100_homepage_slider_config_cb',9);
//homepage slider configuration settings
function the100_homepage_slider_config_cb(){
	$show_pager = (get_theme_mod('the100_home_slider_pager','yes') == "yes") ? "true" : "false";
	$show_controls = (get_theme_mod('the100_home_slider_controls','yes') == "yes") ? "true" : "false";
	$auto_transition = (get_theme_mod('the100_home_slider_transition_auto','yes') == "yes") ? "true" : "false";
	$slider_transition = get_theme_mod('the100_home_slider_transition_type','slideOutLeft');
	$slider_speed = get_theme_mod('the100_home_slider_transition_speed','1000');
	
	// Send data to client
	wp_localize_script('the100-myscript', 'The100SliderData', array(
		'autop' => $auto_transition,
		'speed' => $slider_speed,
		'controls' => $show_controls,
		'pager' => $show_pager,
		'trans' => $slider_transition
	));
}
// Function for using Slider
function the100_slider_section_cb(){
	$slider_enabled = get_theme_mod('the100_home_slider_setting','yes');
	if($slider_enabled=='yes'){
		$slider_category = get_theme_mod('the100_home_slider_category');
		if(!empty($slider_category)){
			$show_caption = get_theme_mod('the100_home_slider_caption','caption-left');	
			?>
			<section id="slider-section" class="slider">
				<div id="main-slider" class="owl-slider owl-carousel owl-theme">
					<?php
					$loop = new WP_Query(array('cat' => $slider_category,'post_status'=>'publish','posts_per_page' => -1));
					if($loop->have_posts()){
						while($loop->have_posts()){
							$loop-> the_post();                    
							?>
							<div class="slides">
								<?php
								if(has_post_thumbnail()){
									the_post_thumbnail('full');
								}
								if($show_caption != 'caption-no'): ?>
								<div class="caption-wrapper <?php echo esc_attr($show_caption);?>">  
									<div class="ed-container">
										<div class="slider-caption">
											<h2 class="small-caption"> 
												<?php the_title(); ?>										
											</h2>
											<div class="slider-content">
												<?php the_excerpt(); ?>
											</div>
										</div>
									</div>
								</div>  
								<?php
								endif; ?> 
							</div>
							<?php 
						}
						wp_reset_postdata();
					}?>
				</div>  
			</section>			
			<?php
		}
	}
}
add_action('the100_slider_section','the100_slider_section_cb', 10);

function the100_belowslider_section_cb(){
	$the100_ena = get_theme_mod('the100_home_belowslider_setting','yes');
	if($the100_ena=='yes'){
		if ( is_active_sidebar( 'th100-below-slider' ) ){
			?>
			<section class="below-slider-section wow fadeInUp" >
				<div class="ed-container">
					<?php dynamic_sidebar( 'th100-below-slider' ); ?>    							
				</div>
			</section>	
			<?php
		}
	}
}
add_action('the100_belowslider_section','the100_belowslider_section_cb', 10);

function the100_featured_section_cb(){
	$the100_ena = get_theme_mod('the100_home_featured_setting','yes');
	if($the100_ena=='yes'){
		$the100_feat_layout = get_theme_mod('the100_home_featured_layout','lay-one');
		$the100_feat_title = get_theme_mod('the100_home_featured_title','');
		$the100_feat_desc = get_theme_mod('the100_home_featured_desc','');
		?>
		<section class="featured-section <?php echo esc_attr($the100_feat_layout);?>">
			<div class="ed-container">
				<?php if($the100_feat_title!=''){ ?>
				<h2 class="section-title wow fadeInLeft"><span><?php echo esc_html($the100_feat_title);?></span></h2>
				<?php } ?>
				<?php if($the100_feat_desc!=''){ ?>
				<div class="section-desc wow fadeInRight"><?php echo wp_kses_post(force_balance_tags($the100_feat_desc));?></div>
				<?php }
				if($the100_feat_layout=='lay-four'){
					echo "</div>";
				}
				$the100_feat_cat = get_theme_mod('the100_home_featured_category','0');
				if($the100_feat_cat>0){
					$postnum=3;
					if ( get_theme_mod('the100_template_setting','template1')=='template3') {$postnum=8;}
					$feat = new WP_Query(array('cat' => $the100_feat_cat,'post_status'=>'publish','posts_per_page' => $postnum));
					if($feat->have_posts()){
						echo "<div class='featured-posts-wrap'>";
						while($feat->have_posts()){
							$feat-> the_post();
							echo "<div class='featured-posts wow pulse'>";
							if($the100_feat_layout=='lay-two' || $the100_feat_layout=='lay-four'){ echo "<div class='feat-imgtitle-wrap'>";}
							if(has_post_thumbnail()){
								the_post_thumbnail('the100-rectangle');
							}
							if($the100_feat_layout=='lay-four'){ echo "</div>";}
							if($the100_feat_layout=='lay-four'){ echo "<div class='feat-content-wrap'>";}
							the_title( '<h3 class="feat-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							if($the100_feat_layout=='lay-two'){ echo "</div>";}
							echo "<div class='feat-excerpt'>";
							the_excerpt();
							echo "</div>";
							if($the100_feat_layout=='lay-four'){ echo "</div>";}
							echo "</div>";
						}
						echo "</div>";
						wp_reset_postdata();
					}
				}
				if($the100_feat_layout!='lay-four'){
					echo "</div>";
				}
				?>
			</section>	
			<?php
		}
	}
	add_action('the100_featured_section','the100_featured_section_cb', 10);

	function the100_team_section_cb(){
		$the100_ena = get_theme_mod('the100_home_team_setting','yes');
		if($the100_ena=='yes'){
			$the100_team_layout = get_theme_mod('the100_home_team_layout','lay-one');
			$the100_team_title = get_theme_mod('the100_home_team_title','');
			$the100_team_desc = get_theme_mod('the100_home_team_desc','');
			?>
			<section class="team-section <?php echo esc_attr($the100_team_layout);?>">
				<div class="ed-container">
					<?php if($the100_team_title!=''){ ?>
					<h2 class="section-title wow fadeInLeft"><span><?php echo esc_html($the100_team_title);?></span></h2>
					<?php } ?>
					<?php if($the100_team_desc!=''){ ?>
					<div class="section-desc  wow fadeInRight"><?php echo wp_kses_post(force_balance_tags($the100_team_desc));?></div>
					<?php }
					$the100_team_cat = get_theme_mod('the100_home_team_category','0');
					if($the100_team_cat>0){
						$team = new WP_Query(array('cat' => $the100_team_cat,'post_status'=>'publish','posts_per_page' => 4));
						if($team->have_posts()){
							echo "<div class='team-posts-wrap clear'>";
							while($team->have_posts()){
								$team-> the_post();
								echo "<div class='team-posts wow zoomIn'>";
								if(has_post_thumbnail()){
									echo "<div class='team-imgwrap'>";
									if($the100_team_layout=='lay-one'){
										the_post_thumbnail('the100-vh-large');
									}else{
										the_post_thumbnail('the100-square');
									}
									echo "</div>";
								}
								echo "<div class='team-titledesc-wrap'>";
								echo "<div class='team-titledesc-inside-wrap'>";
								the_title( '<h3 class="team-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
								echo "<div class='team-excerpt'>";
								the_excerpt();
								echo "</div>";
								echo "</div>";
								echo "</div>";
								echo "</div>";
							}
							echo "</div>";
							wp_reset_postdata();
						}
					}
					?>
				</div>
			</section>	
			<?php
		}
	}
	add_action('the100_team_section','the100_team_section_cb', 10);

	function the100_gallery_section_cb(){
		$the100_ena = get_theme_mod('the100_home_gallery_setting','yes');
		if($the100_ena=='yes'){
			$the100_gallery_layout = get_theme_mod('the100_home_gallery_layout','lay-one');
			$the100_gallery_title = get_theme_mod('the100_home_gallery_title','');
			$the100_gallery_desc = get_theme_mod('the100_home_gallery_desc','');
			?>
			<section class="gallery-section <?php echo esc_attr($the100_gallery_layout);?>">
				<div class="ed-container">
					<?php if($the100_gallery_title!=''){ ?>
					<h2 class="section-title wow fadeInLeft"><span><?php echo esc_html($the100_gallery_title);?></span></h2>
					<?php } ?>
					<?php if($the100_gallery_desc!=''){ ?>
					<div class="section-desc wow fadeInRight"><?php echo wp_kses_post(force_balance_tags($the100_gallery_desc));?></div>
					<?php
				}
				if($the100_gallery_layout=='lay-two'){ echo "</div>";}
				$the100_gallery_cat = get_theme_mod('the100_home_gallery_category','0');
				if($the100_gallery_cat>0){
					$gallery = new WP_Query(array('cat' => $the100_gallery_cat,'post_status'=>'publish','posts_per_page' => 6));
					if($gallery->have_posts()){
						echo "<div class='gallery-posts-wrap'>";
						while($gallery->have_posts()){
							$gallery-> the_post();
							echo "<div class='gallery-posts wow zoomIn'>";
							if(has_post_thumbnail()){
								if($the100_gallery_layout=='lay-two'){
									the_post_thumbnail('the100-rectangle');
								}else{
									the_post_thumbnail('the100-square');
								}
							}
							echo "<div class='gallery-titledesc-wrap'>";
							echo "<div class='gallery-titledesc-inside-wrap'>";
							the_title( '<h3 class="gallery-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							echo "<div class='gallery-excerpt'>";
							the_excerpt();
							echo "</div>";
							echo "</div>";
							echo "</div>";
							echo "</div>";
						}
						echo "</div>";
						wp_reset_postdata();
					}
				}
				if($the100_gallery_layout!='lay-two'){ echo "</div>";}
				?>
			</section>	
			<?php
		}
	}
	add_action('the100_gallery_section','the100_gallery_section_cb', 10);

	function the100_aboutservice_section_cb(){
		$the100_ena = get_theme_mod('the100_home_aboutservice_setting','yes');
		if($the100_ena=='yes'){
			$the100_aboutservice_layout = get_theme_mod('the100_home_aboutservice_layout','lay-one');
			?>
			<section class="aboutservice-section <?php echo esc_attr($the100_aboutservice_layout);?>">
				<div class="ed-container">
					<?php
					$the100_about_page = get_theme_mod('the100_home_aboutservice_page','0');
					$page = get_post( $the100_about_page );
					if (!empty($the100_about_page)) {
						?>					
						<div class="about-content-wrap">
							<h2 class="section-title"><span><?php echo esc_html($page->post_title); ?></span></h2>
							<div class="about-contents section-desc">
								<?php echo esc_html(wp_trim_words($page->post_content,'80')); ?>
							</div>
						</div>
						<?php 
						if($the100_aboutservice_layout=='lay-one'){
							?>
							<div class="about-serv-wrap">
								<div class="about-image">
									<?php echo get_the_post_thumbnail( $the100_about_page, 'the100-rectangle' );?>
								</div>
								<?php
							}
						}
						wp_reset_postdata();
						if (empty($the100_about_page)) {echo '<div class="about-serv-wrap">';}
						$the100_service_cat = get_theme_mod('the100_home_service_category','0');
						if($the100_service_cat>0){
							$service = new WP_Query(array('cat' => $the100_service_cat,'post_status'=>'publish','posts_per_page' => 4));
							if($service->have_posts()){
								echo "<div class='service-posts-wrap'>";
								$i=1;
								while($service->have_posts()){
									$service-> the_post();
									$j = $i/2;
									echo "<div class='service-posts wow fadeInDown' data-wow-delay='".esc_attr($j)."s'>";
									if($the100_aboutservice_layout=='lay-one'){
										if(has_post_thumbnail()){
											the_post_thumbnail('the100-square');
										}
									}
									if($i==1){$class = "expanded";}else{$class="collapsed";}
									echo "<div class='service-titledesc-wrap ".esc_attr($class)."'>";
									if($the100_aboutservice_layout=='lay-one'){
										the_title( '<h3 class="service-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
									}else{
										the_title('<h3 class="service-title">','</h3>');
									}
									echo "<div class='service-excerpt'>";
									the_excerpt();
									echo "</div>";
									echo "</div>";
									echo "</div>";
									$i++;
								}
								echo "</div>";
								wp_reset_postdata();
							}
						}
						if($the100_aboutservice_layout=='lay-one' && !empty($the100_about_page)){
							?>
						</div>
						<?php
					}
					?>
				</div>
			</section>	
			<?php
		}
	}
	add_action('the100_aboutservice_section','the100_aboutservice_section_cb', 10);

	function the100_counter_section_cb(){
		$the100_ena = get_theme_mod('the100_home_counter','yes');
		if($the100_ena=='yes'){
			$bkg = get_theme_mod('the100_home_counter_bkg','');
			?>
			<section class="home-counter-section <?php if($bkg!=''){echo "has-image";}?>" <?php if($bkg!=''){echo "style='background-image:url(".esc_url($bkg).")'";}?>>
				<?php 
				if ( is_active_sidebar( 'th100-home-counter' ) ){
					dynamic_sidebar( 'th100-home-counter' );
				}
				?>
			</section>	
			<?php
		}
	}
	add_action('the100_counter_section','the100_counter_section_cb', 10);

	function the100_testimonial_partner_section_cb(){
		$the100_ena = get_theme_mod('the100_home_testimonial_setting','yes');
		$the100_ena_p = get_theme_mod('the100_home_partner_setting','yes');
		if($the100_ena=='yes' || $the100_ena_p=='yes'){
			?>
			<section class="testimonial-partner-section">
				<div class="ed-container">
					<?php
					if($the100_ena=='yes'){
						$the100_tp_layout = get_theme_mod('the100_home_testimonialpartner_layout','lay-one');
						$the100_testimonial_title = get_theme_mod('the100_home_testimonial_title','');
						$the100_ena_partner = get_theme_mod('the100_home_partner_setting','yes');
						if($the100_ena_partner=='yes'){$the100_class=' testimonial-partner';}else{$the100_class=' testimonial-only';}
						?>
						<div class="testimonial-section <?php echo esc_attr($the100_tp_layout.$the100_class);?>">
							<?php if($the100_testimonial_title!=''){ ?>
							<h2 class="section-title wow fadeInLeft"><span><?php echo esc_html($the100_testimonial_title);?></span></h2>
							<?php
						}
						$the100_testimonial_cat = get_theme_mod('the100_home_testimonial_category','0');
						if($the100_testimonial_cat>0){
							$testimonial = new WP_Query(array('cat' => $the100_testimonial_cat,'post_status'=>'publish','posts_per_page' => 3));
							if($testimonial->have_posts()){
								echo "<div id='testimonial-posts-wrap' class='testimonial-posts-wrap wow fadeInLeft owl-slider owl-carousel owl-theme'>";
								while($testimonial->have_posts()){
									$testimonial-> the_post();
									echo "<div class='testimonial-posts'>";
									echo "<div class='testimonial-excerpt'>";
									the_excerpt();
									echo "</div>";
									echo "<div class='testimonial-titleimg-wrap'>";
									if(has_post_thumbnail()){
										echo "<div class='testimonial-image'>";
										the_post_thumbnail('the100-square');
										echo "</div>";
									}
									the_title( '<h3 class="testimonial-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
									echo "</div>";
									echo "</div>";
								}
								echo "</div>";
								wp_reset_postdata();
							}
						}
						?>
					</div>	
					<?php
				}
				if($the100_ena_p=='yes'){
					$the100_tp_layout = get_theme_mod('the100_home_testimonialpartner_layout','lay-one');
					$the100_partner_title = get_theme_mod('the100_home_partner_title','');
					$the100_ena_testimonial = get_theme_mod('the100_home_testimonial_setting','yes');
					if($the100_ena_testimonial=='yes'){$the100_class=' testimonial-partner';}else{$the100_class=' partner-only';}
					?>
					<div class="partner-section <?php echo esc_attr($the100_tp_layout.$the100_class);?>">
						<?php if($the100_partner_title!=''){ ?>
						<h2 class="section-title wow fadeInRight"><span><?php echo esc_html($the100_partner_title);?></span></h2>
						<?php
					}
					$the100_partner_cat = get_theme_mod('the100_home_partner_category','0');
					if($the100_partner_cat>0){
						$post_num = 10;
						if($the100_tp_layout=='lay-one' && $the100_ena_testimonial=='yes'){$post_num = 9;}
						$partner = new WP_Query(array('cat' => $the100_partner_cat,'post_status'=>'publish','posts_per_page' => $post_num));
						if($partner->have_posts()){
							echo "<div class='partner-posts-wrap wow fadeInRight'>";
							while($partner->have_posts()){
								$partner-> the_post();
								if(has_post_thumbnail()){									
									echo "<div class='partner-posts'>";
									echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';the_post_thumbnail('the100-square');
									echo '</a>';
									echo "</div>";
								}
							}
							echo "</div>";
							wp_reset_postdata();
						}
					}
					?>
				</div>	
				<?php
			}
			?>
		</div>
	</section>
	<?php
}
}
add_action('the100_testimonial_partner_section','the100_testimonial_partner_section_cb', 10);

function the100_blog_section_cb(){
	$the100_ena = get_theme_mod('the100_home_blog_setting','yes');
	if($the100_ena=='yes'){
		$the100_blog_title = get_theme_mod('the100_home_blog_title','');
		$the100_blog_desc = trim(get_theme_mod('the100_home_blog_desc',''));
		$the100_blog_layout = get_theme_mod('the100_home_blog_layout','lay-one');
		?>
		<section class="blog-section <?php echo esc_attr($the100_blog_layout);?>">
			<div class="ed-container">
				<?php if($the100_blog_layout=='lay-one'){ ?><div class="blog-title-desc-wrap"> <?php } 
				if($the100_blog_title!=''){
					?>
					<h2 class="section-title wow fadeInLeft"><span><?php echo esc_html($the100_blog_title);?></span></h2>
					<?php } 
					if($the100_blog_desc!=''){ ?>
					<div class="section-desc wow fadeInRight"><?php echo wp_kses_post(force_balance_tags($the100_blog_desc));?></div>
					<?php
				}if($the100_blog_layout=='lay-three'){ ?>
			</div>
			<?php } ?>
			<?php if($the100_blog_layout=='lay-one'){ ?></div> <?php } ?>
			<?php						
			$the100_blog_cat = get_theme_mod('the100_home_blog_category','0');
			if($the100_blog_cat>0){
				$post_num = 4;
				if($the100_blog_layout=='lay-one' || $the100_blog_layout=='lay-two'){$post_num = 3;}
				$blog = new WP_Query(array('cat' => $the100_blog_cat,'post_status'=>'publish','posts_per_page' => $post_num));
				if($blog->have_posts()){
					echo "<div class='blog-posts-wrap'>";
					$i=1;
					while($blog->have_posts()){
						$blog-> the_post();
						$j = $i/2;
						echo "<div class='blog-posts wow fadeInDown' data-wow-delay='".esc_attr($j)."s'>";
						if($the100_blog_layout=='lay-two' || $the100_blog_layout=='lay-three'){
							if(has_post_thumbnail()){
								if($the100_blog_layout=='lay-two'){
									echo "<div class='blog-imgtitle-wrap'>";
									the_post_thumbnail('the100-rectangle');
									the_title( '<h3 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
									echo "</div>";
								}else{
									the_post_thumbnail('the100-square');
								}
							}
							echo "<div class='blog-titledesc-wrap'>";
							if($the100_blog_layout!='lay-two'){
								the_title( '<h3 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							}
							echo '<p class="blog-date">'.get_the_date('F j,Y').'</p>';
							if($the100_blog_layout=='lay-two'){
								echo "<div class='blog-excerpt'>";
								the_excerpt();
								echo "</div>";
							}
							echo "</div>";
						}else{
							echo "<div class='blog-titledesc-wrap'>";
							echo "<div class='blog-date'>";
							echo '<span class="date-day">'.get_the_date('j').'</span>';
							echo "<div class='blog-date-comment'>";
							if($the100_blog_layout=='lay-one'){
								echo '<span class="date-my">'.get_the_date('M Y',get_the_ID()).'</span>';
								$cargs = array('post_id' => get_the_ID(),'count' => true);
								$comments = get_comments($cargs);
								echo '<span class="blog-comment">'.esc_attr($comments).' '.esc_html('Comments','the100').'</span>';
							}else{
								echo '<span class="date-my">'.get_the_date('M',get_the_ID()).'</span>';
							}
							echo "</div>";
							echo "</div>";
							echo "<div class='blog-titledesc-inside-wrap'>";
							if($the100_blog_layout=='lay-four'){
								$cargs = array('post_id' => get_the_ID(),'count' => true);
								$comments = get_comments($cargs);
								echo '<span class="blog-comment">'.esc_attr($comments).' '.esc_html('Comments','the100').'</span>';
							}
							the_title( '<h3 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							if($the100_blog_layout=='lay-four'){
								echo "<div class='blog-excerpt'>";
								the_excerpt();
								echo "</div>";
							}
							echo "</div>";
							echo "</div>";
						}
						echo "</div>";
						$i++;
					}
					echo "</div>";
					wp_reset_postdata();
				}
			}
			?>
			<?php if($the100_blog_layout!='lay-three'){ ?>
		</div>
		<?php } ?>
	</section>	
	<?php
}
}
add_action('the100_blog_section','the100_blog_section_cb', 10);


function the100_abovefooter_section_cb(){
	$the100_ena = get_theme_mod('the100_home_abovefooter','yes');
	if($the100_ena=='yes'){
		if ( is_active_sidebar( 'th100-above-footer' ) ){
			?>
			<section class="above-footer-section">
				<?php dynamic_sidebar( 'th100-above-footer' ); ?>    							
			</section>	
			<?php
		}
	}
}
add_action('the100_abovefooter_section','the100_abovefooter_section_cb', 10);