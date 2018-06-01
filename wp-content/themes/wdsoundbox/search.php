<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @since wpdance
 */
?>
<?php get_header(); ?>
<?php
	/*CUSTOM DEFAULT*/
	$layout 		= get_theme_mod('soundbax_archive_blog_layout','0-1-0');
	$sidebar_left 	= get_theme_mod('soundbax_archive_blog_sidebar_left' ,'sidebar');
	$sidebar_right 	= get_theme_mod('soundbax_archive_blog_sidebar_right','sidebar');
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
					<?php if ( have_posts() ) : ?>
						<!-- Start the Loop --> 
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
								get_template_part( 'content', get_post_format() );
							?>
						<?php endwhile; ?>
						<!-- End the Loop -->
						<div class="wd-pagination">
							<?php soundbax_pagination(); ?>
						</div>
					<?php else: ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; // End If Have Post ?>
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
</div><!-- END CONTAINER  -->
<?php get_footer(); ?>
