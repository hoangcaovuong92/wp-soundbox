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
			'posts_per_page'=> 4,
		);
	else
		$args = array(
		'post_type'			=> $post->post_type,
		'post__not_in'		=> array($post->ID),
		'posts_per_page'	=> 4,
	);
	wp_reset_postdata();
	$related=new WP_Query($args);
	$count=0;
	$random_id = 'wd-related-wrapper-'.mt_rand();
?>
<div class="wd-related-download related block-wrapper">
	<div class="wd-title-wrapper">
		<h4 class="entry-title"><?php esc_html_e('recent product','wdsoundbox'); ?></h4>
	</div>
	<div class="wd-related-wrapper <?php echo esc_attr($random_id); ?>">
		<div class="wd-related-product">
			<?php if($related->have_posts()) : ?>
				<?php if( $related->post_count > 1 ) $is_slider = true; ?>
				<?php while($related->have_posts()) : $related->the_post(); $count++; global $post;?>
					<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>
					<div>
						<div class="edd_download_inner">
							<?php

							do_action( 'edd_download_before' );
							echo '<div class="download_thumbnail">';
							edd_get_template_part( 'shortcode', 'content-image' );
							echo '<div class="download_icon">';
							echo '<div class="download_content_icon">';
							do_action( 'edd_download_after_thumbnail' );
				
							edd_get_template_part( 'shortcode', 'content-cart-button' );
							echo '</div>';//end div download_content_icon 
							echo '</div>';//end div download_icon 
							echo '</div>';//end div download_thumbnail
						
							echo '<div class="content_download_grid">';
							edd_get_template_part( 'shortcode', 'content-title' );
							do_action( 'edd_download_after_title' );
							edd_get_template_part( 'shortcode', 'content-author' );

							//show price
							edd_get_template_part( 'shortcode', 'content-price' );
							do_action( 'edd_download_after_price' );
						
							echo "</div>"; // end div content download grid
							do_action( 'edd_download_after' );
							?>
						</div>
					</div>
				
				<?php endwhile; // End while ?>
			<?php endif; ?>
		</div>
	</div>
</div>	