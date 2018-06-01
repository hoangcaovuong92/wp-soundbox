<?php
/**
 * Shortcode: tvlgiao_special_post
 */
if(!function_exists('tvlgiao_wpdance_special_blog_function')){
	function tvlgiao_wpdance_special_blog_function($atts,$content){
		extract(shortcode_atts(array(
			'title'					=> ''
			,'number'				=> 6
			,'data_post'			=> 'recent-post'
			,'style'				=> 'style-1'
			,'show_thumbnail' 		=> '1'
			,'show_author'			=> '1'
			,'show_date'			=> '1'
			,'excerpt'				=> '1'
			,'number_excerpt'		=> '20'
			,'read_more'			=> '1'
			,'is_slider'			=> '1'
			,'show_nav'				=> '1'
			,'auto_play'			=> '1'
			,'per_slide'			=> 3
			,'class'				=> ''
		),$atts));
		$args = array(
			'post_type'				=> 'post'
			,'ignore_sticky_posts'	=> 1
			,'posts_per_page'		=> $number
			,'post_status'			=> 'publish'
		);
		if($data_post == 'most-view'){
			$args['meta_key'] 		= '_wd_post_views_count';
			$args['orderby'] 		= 'meta_value_num';
			$args['order'] 			= 'DESC';
		}
		wp_reset_query();
		$recent_posts = new WP_Query($args);
		ob_start();

		if ( $recent_posts->have_posts() ) {
			$num_post =  $recent_posts->post_count;
			if( $num_post < 2 || $num_post <= $per_slide ){
				$is_slider = 0;
			}
			$random_id = 'wd_special_post'.mt_rand();
			?>
			<div class="wd_special_post_wrapper <?php echo ($show_nav)?'has_navi':''; ?> <?php echo esc_attr( $style ); ?> <?php echo esc_attr( $class ); ?>" id="<?php echo esc_attr( $random_id ); ?>">
				<?php if($title != "") : ?>
					<div class="wd-title">
						<h2><?php echo esc_attr( $title ); ?></h2>
					</div>
				<?php endif; ?>
				<div class="widget_list_post_inner">
			<?php
			$count = 0;	
			while( $recent_posts->have_posts() ) {
				$recent_posts->the_post();
				global $post;
				if ($count == 0 || $count % $per_slide == 0 ){
				?>
					<div class="widget_per_slide">
						<ul>
					<?php } ?>
						<li>
							<?php if( $show_thumbnail ){ ?>
								<div class="wd-thumbnail-post">
									<?php if(has_post_thumbnail()){ ?>
										<div class="post_thumbnail image">
											<a class="wd-effect-blog" href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('wp_outline_thumbnail_04_image',array('class' => 'thumbnail-effect-1', 'title'=>get_the_title())); ?>
											</a>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="wd-infomation-post">
								<div class="wd-entry-title">
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_html__( 'Permalink to %s', 'wpdance' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
										<?php echo esc_attr(get_the_title()); ?>
									</a>
								</div>
								<?php if($excerpt): ?>
									<div class="excerpt"><?php tvlgiao_wpdance_the_excerpt_max_words($number_excerpt); ?><a class="readmore_link" href="<?php the_permalink(); ?>"></a></div>
								<?php endif; ?>
								<?php if($show_date) : ?>
									<div class="wd-date-post">
										<?php the_time('j F, Y'); ?>
									</div>
								<?php endif;?>

								<?php if($show_detail) : ?>
									<div class="wd-count-post-detail">
										<span class="post-views"><i class="fa fa-eye"></i> <?php tvlgiao_wpdance_get_post_views(); ?></span>
										<span class="comments-count"><i class="fa fa-comment"></i> <?php $comments_count = wp_count_comments($post->ID); if($comments_count->approved < 10 && $comments_count->approved > 0) echo '0'; echo esc_attr( $comments_count->approved);?></span>
										<span class="post-like"><i class="fa fa-heart"></i> <?php $comments_count = wp_count_comments($post->ID); if($comments_count->approved < 10 && $comments_count->approved > 0) echo '0'; echo esc_attr( $comments_count->approved);?></span>
									</div>
								<?php endif;?>

								<?php if($show_author) : ?>
									<div class="author_post">	
										<i><?php esc_html_e('Post by','wpdance'); ?></i><a href="#"> </a><?php the_author_posts_link(); ?> 
									</div>
								<?php endif; ?>	

							</div>	
						</li>
					<?php $count++; if( $count % $per_slide == 0 || $count == $num_post){ ?>
						</ul>
					</div>
				<?php
				}
			}
			?>
				</div>
				<?php if( $show_nav && $is_slider ){ ?>
					<div class="slider_control">
						<a href="#" class="prev">&lt;</a>
						<a href="#" class="next">&gt;</a>
					</div>
				<?php } ?>
			</div>

			<?php if( $is_slider ) : ?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						"use strict";						
						var $_this = jQuery('#<?php echo esc_attr( $random_id ); ?>');
						var _auto_play = <?php echo esc_attr( $auto_play ); ?> == 1;
						var owl = $_this.find('.widget_list_post_inner').owlCarousel({
									loop : true
									,items : 1
									,nav : false
									,dots : false
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
			<?php endif; // End if			
		}
		$output = ob_get_contents();
		ob_end_clean();
		rewind_posts();
		wp_reset_query();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_special_blog','tvlgiao_wpdance_special_blog_function');
?>