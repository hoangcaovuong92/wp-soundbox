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
	$_post_config 	= get_post_meta($post_ID, '_soundbax_custom_post_config', true);
	$_post_config 	= unserialize($_post_config);
	$post_layout 	= $_post_config['layout'];
	//Customize Config
	$layout 		= get_theme_mod('soundbax_single_blog_layout','0-1-0');
	if($post_layout != "0"){
		$layout 	= $post_layout;
	}
	$sidebar_left 	= get_theme_mod('soundbax_single_blog_sidebar_left','sidebar');
	$sidebar_right 	= get_theme_mod('soundbax_single_blog_sidebar_right','sidebar');
	$row_class_1 		= '';
	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-sm-18";
		$row_class_1 ="row";
	}elseif($layout == '1-0-1'){
		$content_class = "col-sm-12";
		$row_class_1 ="row";
	}else{
		$content_class = "col-sm-24";
		$row_class_1 ="row";
	}
?>

<div id="main-content" class="main-content">
	<div class="container">
		<div class="row">
		<div class="<?php echo esc_attr($row_class_1); ?>">
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
						<div class="wd-content-single">
							<?php if( has_post_thumbnail() ){ ?>
								<div class="wd-thumbnail-post">
									<a class="thumbnail" href="<?php the_permalink(); ?>">
										<?php while ( have_posts() ) : the_post();  ?>
											<?php the_post_thumbnail(); ?>
										<?php endwhile; // End of the loop. ?>
									</a>
								</div>
							<?php }; // End If ?>						
							<div class="wd-info-post">
								<div class="wd-title-post">
									<h2 class="wd-heading-title">
										<a href="<?php the_permalink();?>" class="wd-title-post"><?php the_title(); ?></a>
									</h2>
								</div>
								<div class="wd-meta-post wp-blog-detail">
									<div class="wd-date-post">
										<?php the_time('d/m/Y');?>
									</div>
									<div class="wd-comment-post">
										<?php echo get_comments_number(); ?>
										<?php esc_html_e('COMMENTS ','wdsoundbox'); ?>
									</div>
			
								</div>
								<div class="wd-content-detail-post">
									<?php while ( have_posts() ) : the_post();  ?>
										<!-- Content Post -->
										<?php get_template_part( 'content', 'single' ); ?>
										<!-- Related Post -->
										<div class="wd-next-previous-post">
											<?php
												$next_post = get_next_post();
												$previous  = get_previous_post()
											?>
											<?php if($next_post){ ?>
												<div class="wd-navi-next">
													<a class="wd-navi-tile" href="<?php echo get_permalink( $next_post->ID ); ?>"><span><?php echo esc_html__('NEXT','wdsoundbox' ); ?></span></a>
													<a class="wd-navi-icon" href="<?php echo get_permalink( $next_post->ID ); ?>"><span><i class="fa fa-angle-right"></i></span></a>
												</div>
											<?php } ?>
											<?php if($previous){ ?>
												<div class="wd-navi-prev">
													<a class="wd-navi-icon" href="<?php echo get_permalink( $previous->ID ); ?>"><span><i class="fa fa-angle-left"></i></span></a>
													<a class="wd-navi-tile" href="<?php echo get_permalink( $previous->ID ); ?>"><span><?php echo esc_html__('PREV','wdsoundbox' ); ?></span></a>
												</div>
											<?php } ?>
										</div>						
									<?php endwhile; // End of the loop. ?>
								</div>
							</div>
						</div>
						<div class="wd-related_posts">
							<?php get_template_part( 'templates/wd_related_posts' ); ?>	
						</div>
						<?php while ( have_posts() ) : the_post();  ?>
							<div class="wd-comment-form">
								<!-- Comment-post -->
								<?php		
									//If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || '0' != get_comments_number() ) :
										comments_template('');
									endif;
								?>		
							</div>
						<?php endwhile; // End of the loop. ?>
				</div>
			<!-- Right Content -->
			<?php if( ($layout == '0-0-1') || ($layout == '1-0-1') ) : ?> 
				<div class="col-sm-6">
					<?php if (is_active_sidebar($sidebar_right) ) : ?>
							<?php dynamic_sidebar( $sidebar_right ); ?>
					<?php endif; ?>
				</div>
			<?php endif; // Endif Right?>	
		</div>
		</div>
	</div>
</div><!-- END CONTAINER  -->
<?php get_footer(); ?>