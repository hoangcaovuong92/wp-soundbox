<?php 
	add_shortcode( "wd_getvideoblogs","tvlgiao_wpdance_getvideoblogs");
	function tvlgiao_wpdance_getvideoblogs($atts){
		extract(shortcode_atts( array(
			'style' => 'regular_image',
			"ignore_sticky_posts" => "top",
			"orderby" => "ID",
			"order" => "ASC",
			'title' => '',
			'columns' => '1',
			'per_page' => '3',
			), $atts));
			
		wp_reset_query();
		$args = array(
			'post_type' 	=> 'post',
			'meta_key'		=> 'blog_tyle',
			'meta_value'	=> 'Video',
			'posts_per_page' 		=> $per_page,
			);	
		$blogs = new WP_Query($args);	
		ob_start();

		$_sub_class = "col-sm-".(24/$columns);
		if($blogs->have_posts()):?>
			<div class="content_blog_video">	
					<?php if(strlen(trim($title)) > 0) :
					echo "<div class='heading-title-blog-video'><h2 class='widget-title'>{$title}</h2></div>";
					endif;
					?>
					<div class="content_blogs <?php echo esc_attr($style); ?>">
						<?php while ($blogs->have_posts()):?>
							<div class="<?php echo esc_attr($_sub_class); ?> wd_item_blog">
								<?php $blogs->the_post(); 
								  $field = get_field_object('blog_tyle');
								  $value = get_field('blog_tyle');
								  $label = $field['choices'][ $value ];
								  if($label == 'Video'){
									echo "<div class='item_blog_video'>";
										$video_url = trim(get_field('link_url'));
										$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
										the_post_thumbnail(array( 870,524)); ?>
										<div class="links">
											<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
										</div>
										</div>
										<div class="item_content">						
											<div class="content_title">
												<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
											</div>						
										  </div>
								<?php }
								  ?>
							</div>						
						<?php endwhile; ?>
					</div>
		</div>
		<?php
		endif;
		wp_reset_postdata(); 	
		wp_reset_query();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
?>