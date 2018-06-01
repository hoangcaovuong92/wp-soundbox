<?php
	$is_slider 		= false;
	$gallery_ids 	= array();
	$galleries 		= wp_get_post_terms($post->ID,'gallery');
	if(!is_array($galleries))
		$galleries 	= array();
	foreach($galleries as $gallery){
		if( $gallery->count > 0 ){
			array_push( $gallery_ids,$gallery->term_id );
		}	
	}
	if(!empty($galleries) && count($gallery_ids) > 0 )
		$args = array(
				'tax_query' => array(
				array(
					'taxonomy'	=> 'gallery',
					'field' 	=> 'id',
					'terms' 	=> $gallery_ids
				)
			),
			'post__not_in'	=> array($post->ID),
			'posts_per_page'=> 2,
		);
	else
		$args = array(
		'post_type'			=> $post->post_type,
		'post__not_in'		=> array($post->ID),
		'posts_per_page'	=> 2,
	);
	wp_reset_postdata();
	$related=new WP_Query($args);
	$count=0;
	$random_id = 'wd-related-wrapper-'.mt_rand();
?>
<div class="wd-related-post related block-wrapper">
	<div class="wd-title-wrapper">
		<h4 class="entry-title"><?php esc_html_e('recent posts','wdsoundbox'); ?></h4>
	</div>
	<div class="wd-related-wrapper <?php echo esc_attr($random_id); ?>">
		<div class="wd-related-slider">
			<?php if($related->have_posts()) : ?>
				<?php if( $related->post_count > 1 ) $is_slider = true; ?>
				<?php while($related->have_posts()) : $related->the_post(); $count++; global $post;?>
					<div class="wd-wrap-content-blog">
						<div class='wd-wrap-content-blog__container' >
							<div class="wd-thumbnail-post">
								<a class="thumbnail" href="<?php the_permalink(); ?>">
									<?php
										the_post_thumbnail();
									?>
								</a>
							</div>
							<div class="wd-info-post">
								<div class="wd-title-post">
									<h2 class="wd-heading-title">
										<a href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
									</h2>
								</div>
								<div class="wd-content-detail-post"><?php the_excerpt() ?></div>
								<div class="wd-meta-post">
										<div class="wd-date-post">
											<?php the_time('d/m/Y');?>
										</div>
										<div class="wd-comment-post">
											<?php echo get_comments_number(); ?>
											<?php esc_html_e('COMMENTS ','wdsoundbox'); ?>
										</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; // End while ?>
			<?php endif; ?>
		</div>
		
	</div>
</div>
