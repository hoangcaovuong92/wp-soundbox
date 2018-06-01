<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @since wpdance
 *
 **/
get_header(); 

	$post_ID		= soundbax_get_post_by_global();
	/*PAGE CONFIG*/
	$_page_config 	= get_post_meta($post_ID, '_soundbax_custom_page_config', true);
	$_page_config 	= unserialize($_page_config);
	$page_layout 	= $_page_config['layout'];
	$layout 		= get_theme_mod('soundbax_default_page_layout','0-0-1');
	if($page_layout != "0"){
		$layout 	= $page_layout;
	}
	/*CUSTOM DEFAULT*/
	$sidebar_left 	= get_theme_mod('soundbax_default_page_sidebar_left','sidebar');
	$sidebar_right 	= get_theme_mod('soundbax_default_page_sidebar_right','sidebar');
	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-sm-18";
	}elseif($layout == '1-0-1'){
		$content_class = "col-sm-12";
	}else{
		$content_class = "col-sm-24";
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
				
				<!-- Content Index -->
				<div class="<?php echo esc_attr($content_class); ?>">
					<div class="wd-content-blog">
						<div id="primary" class="content-area">
							<main id="main" class="site-main">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php the_content(); ?>	
									<div class="wd-comment-form">
										<!-- Comment-post -->
										<?php		
											//If comments are open or we have at least one comment, load up the comment template
											if ( comments_open() || '0' != get_comments_number() ) :
												comments_template('');
											endif;
										?>		
									</div>
								<?php endwhile; ?>

							</main><!-- #main -->
						</div><!-- #primary -->
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
		</div>
	</div>
</div>
<?php get_footer(); ?>