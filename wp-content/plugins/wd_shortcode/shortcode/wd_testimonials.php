<?php
/**
 * Shortcode: tvlgiao_wpdance_testimonials
 */

if (!function_exists('tvlgiao_wpdance_testimonials_function')) {
	function tvlgiao_wpdance_testimonials_function($atts) {
		extract(shortcode_atts(array(
			'slider_or_one'			=> '1'
			,'show_nav'				=> '1'
			,'auto_play'			=> '1'
			,'title'				=> ''
			,'id_testimonial'		=> '-1'
			,'style_testimonial'	=> 'style-2'
			,'style_testimonial_class'	=> 'style-1'
			,'show_avatar'			=> '1'
			,'show_author'			=> '1'
			,'number_testimonial'	=> '20'
			,'class' 				=> ''
		), $atts));
		$args 	= array( 
					'post_type' 	=> 'testimonial'
					,'post_status' 			=> 'publish',
				);
		
		if($slider_or_one == "1"){
			$args['p'] =  $id_testimonial;
		}else{
			$args['posts_per_page']  	=  4;
			$style_testimonial 			= "wd-style-slider-testimonial";
			$style_testimonial_class    =  'wd-style-slider';
		}
		$rating = '<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>';
		wp_reset_postdata();
		$testimonials 	= new WP_Query($args);
		$random_id = 'wd_shortcode_testimonial_'.mt_rand();
		ob_start(); ?>
		
			<div class='wd-testimonial_container <?php echo esc_attr($style_testimonial_class); ?>'>
			<?php if(!empty($title)): ?>
					<div class='wd-testimonial_title'><h3><?php echo $title; ?></h3></div>
			<?php endif; ?>
			<div class="wd-shortcode-testimonials <?php echo esc_attr($class); ?> " id="<?php echo esc_attr($random_id ); ?>">
				<?php while ($testimonials->have_posts()) : $testimonials->the_post(); global $post;
					$_url 				= esc_url(get_post_meta($post->ID,'_url',true));
					$byline				= get_post_meta( $post->ID, '_byline', true );
				?>
					
					<div class="wd-testimonial">
						<?php if($style_testimonial == "style-1" || $style_testimonial == "style-4" || $style_testimonial == "style-5") { ?>
							<div class='wd-conent-testimonial'>
								<?php if($style_testimonial == "style-4"){ ?>
								<blockquote class="testimonial-body">
									<?php echo tvlgiao_wpdance_string_limit_words(get_the_content(),$number_testimonial).' [...]'; ?>
								</blockquote>
								<?php }else{ ?>
									<?php echo tvlgiao_wpdance_string_limit_words(get_the_content(),$number_testimonial).' [...]'; ?>
								<?php } ?>
							</div>
							<div class="wd-info-testimonial">
								<?php if( $show_avatar ): ?>
									<div class="wd-avatar">
										<a href="<?php echo esc_url($_url); ?>"><?php the_post_thumbnail('woo_shortcode');?></a>
									</div>
								<?php endif; ?>		
								
							</div>							
						<?php }else{ ?>
							<?php if( $show_avatar ): ?>
								<div class="wd-avatar">
									<a href="<?php echo esc_url($_url); ?>"><?php the_post_thumbnail('woo_shortcode');?></a>
								</div>
							<?php endif; ?>
							<div class="wd-info-testimonial">
									<div class='wd-conent-testimonial'>
										<?php if( $show_author ){ ?>
										<div class="wd-author-byline">
											<span class="wd-author"><a class="title" href="<?php echo esc_url($_url); ?>"><?php the_title();?></a></span>
											<span class="wd-byline"><?php echo esc_attr($byline); ?></span>
										</div>
									<?php } ?>
										<?php if($style_testimonial == "style-4"){ ?>
											<blockquote class="testimonial-body">
												<?php echo tvlgiao_wpdance_string_limit_words(get_the_content(),$number_testimonial).' [...]'; ?>
											</blockquote>
										<?php }else{ ?>
											<?php echo tvlgiao_wpdance_string_limit_words(get_the_content(),$number_testimonial).' [...]'; ?>
										<?php } ?>
									</div>
									
							
							</div>
						<?php };  // End If?>
					</div>			
				<?php endwhile; // End While ?>		

			</div>
			</div>
			<?php if($slider_or_one == '0') : ?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
						"use strict";					
						var $_this = jQuery('#<?php echo esc_attr( $random_id ); ?>');
						<?php if($auto_play == '1'): ?>
							var _auto_play = 1;
						<?php else: ?>
							var _auto_play = 0;
						<?php endif; ?>
						<?php if($show_nav == '1'): ?>
							var _show_nav = true;
						<?php else: ?>
							var _show_nav = false;
						<?php endif; ?>
						
						var owl = $_this.owlCarousel({
									loop : true
									,items : 1
									,nav : _show_nav
									,dots : true
									,navSpeed : 1000
									,slideBy: 1
									,rtl:jQuery('body').hasClass('rtl')
									,navRewind: false
									,autoplay: _auto_play
									,autoplayTimeout: 5000
									,autoplayHoverPause: true
									,autoplaySpeed: false
									,mouseDrag: true
									,touchDrag: true
									,responsiveBaseElement: $_this
									,responsiveRefreshRate: 1000
									,onInitialized: function(){
									}
								});
								$_this.on('click', '.next', function(e){
									e.preventDefault();
									owl.trigger('next.owl.carousel');
								});

								$_this.on('click', '.prev', function(e){
									e.preventDefault();
									owl.trigger('prev.owl.carousel');
								});
					});
				</script>				
			<?php endif; ?>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_testimonials', 'tvlgiao_wpdance_testimonials_function');
?>