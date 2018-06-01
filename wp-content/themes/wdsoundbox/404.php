<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @since wpdance
 */
?>
<?php get_header(); ?>
<?php
	$select_style		= get_theme_mod( 'soundbax_page_404_select_style' ,'bg_color');
	$class_style_select = 'wd-bg-color-error';
	if($select_style == 'bg_image'){
		$class_style_select = 'wd-bg-image-error';
	}
?>
<div id="main-content" class="main-content wd-404-error <?php echo esc_attr($class_style_select); ?>">
	<section class="wd-error-404">
		<div class="wd-page-header">
			<h1 class="wd-page-title"><?php esc_html_e( '404', 'wdsoundbox' ); ?></h1>
			<span class="wd-text-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'wdsoundbox' ); ?></span>
			<span class="wd-text-title2"><?php esc_html_e( 'Something went wrong. You’re not sure what - was it you? Was it the website? What do you do now?', 'wdsoundbox' ); ?></span>
		</div><!-- .page-header -->

		<div class="wd-page-content">

			<a class="button" href="<?php echo esc_url(home_url('/' )); ?>"><?php echo esc_html__('GO BACK TO HOME PAGE','wdsoundbox' ); ?></a>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->
</div><!-- END CONTAINER  -->
