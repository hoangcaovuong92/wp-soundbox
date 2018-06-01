<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>

<?php
	$post_ID		= soundbax_get_post_by_global();
	//Set Post View
	soundbax_set_post_views($post_ID);
	//Post Config
/*	$_post_config 	= get_post_meta($post_ID, '_soundbax_custom_post_config', true);
	$_post_config 	= unserialize($_post_config);
	$post_layout 	= $_post_config['layout'];*/
	//Customize Config
	$layout 		= get_theme_mod('soundbax_single_product_layout','0-1-0');
	$sidebar_left 	= get_theme_mod('soundbax_single_product_sidebar_left','sidebar');
	$sidebar_right 	= get_theme_mod('soundbax_single_product_sidebar_right','sidebar');
	$row_class 		= '';
	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-sm-18";
		$row_class_1 ="row";
	}elseif($layout == '1-0-1'){
		$content_class = "col-sm-12";
		$row_class_1 ="row";
	}else{
		$content_class = "col-sm-24";
		$row_class ="row";
	}
?>
<div id="main-content" class="main-content">
	<div class="container">
		<div class="row">
			<!-- Left Content -->
			<?php if( ($layout == '1-0-0') || ($layout == '1-0-1') ) : ?> 
				<div class="col-sm-6">							
					<?php if (is_active_sidebar($sidebar_left) ) : ?>
						<?php dynamic_sidebar( $sidebar_left ); ?>
					<?php endif; ?>
				</div>
			<?php endif; // Endif Left?>
			
			<!-- Content Single Post -->
				<div class="<?php echo esc_attr($content_class); ?>">
					<div class="<?php echo esc_attr($row_class); ?>">
						<div class="wd-content-download">
							<div class="wd-content-download-left">
							<?php if( has_post_thumbnail() ){ ?>
								<div class="wd-thumbnail-post">
									<a class="thumbnail" href="<?php the_permalink(); ?>">
										<?php while ( have_posts() ) : the_post();  ?>
											<?php the_post_thumbnail(); ?>
										<?php endwhile; // End of the loop. ?>
									</a>
								</div>
							<?php }; // End If ?>	
							</div>
							<div class="wd-content-download-right">
								<div class="wd-title-post">
									<h2 class="wd-heading-title">
										<a href="<?php the_permalink();?>" class="wd-title-post"><?php the_title(); ?></a>
									</h2>
								</div>
								<div class="wd-info-content-download">
								<div class="wd-infomation-author">
									<span class="author">	
										<?php 
										esc_html_e('Artist: ','wdsoundbox'); 
										the_author_posts_link();
										?> 
									</span>
								</div>
									
								<div class="wd-date-create-post">
									<?php echo esc_html__('publish: ','wdsoundbox' ); ?>
									<?php the_time('Y'); ?>
								</div>
								<div class="product-categories">
									<?php the_terms( $post->ID, 'download_category',esc_html__('IN:','wdsoundbox'), ', ', '' ); ?>
								</div>
								</div>
								<?php if(!edd_has_variable_prices($post->ID)) { ?>
									<h4 class="single-product-price"><?php edd_price($post->ID); ?></h4>
								<?php } ?>
								<div class="wd-content-download-item"><?php echo get_the_content( ); ?> </div>
								<div class="wd-content-download-item-after">
								<?php  echo edd_get_purchase_link(array('download_id'=>$post->ID, 'text'=>'Add to Cart')); ;
								do_action( 'edd_download_after_thumbnail' );?>
								</div>
							</div>
							<div class="wd-comment-form">
								<!-- Comment-post -->
								<?php		
									//If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() ) :
										comments_template('/comments-download.php');
									endif;
								?>		
							</div>
							</div>
							</div>
		
						<div class="wd-related_posts <?php echo esc_attr($row_class); ?>">
							<?php get_template_part( 'templates/wd_related_download' ); ?>	
						</div>
						
					</div>
				
			<!-- Right Content -->
			<?php if( ($layout == '0-0-1') || ($layout == '1-0-1') ) : ?> 
				<div class="col-sm-6">
					<?php if (is_active_sidebar($sidebar_right) ) : ?>
							<?php dynamic_sidebar( $sidebar_right ); ?>
					<?php endif; ?>
				</div>
			<?php endif; // Endif Right?>	
		</div><!-- end row -->
	</div><!-- END CONTAINER  -->
</div><!-- END MainContainer -->
<?php get_footer(); ?>