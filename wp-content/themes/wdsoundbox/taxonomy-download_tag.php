<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @since wpdance
 */
?>
<?php get_header(); ?>

<?php
	global $wp_query;
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

	$atts = array(
		'category'         => '',
		'exclude_category' => '',
		'tags'             => '',
		'exclude_tags'     => '',
		'relation'         => 'OR',
		'style'			   => 'default',
		'style_icon'	   => 'default',
		'number'           => 9,
		'author'		   => 'yes',
		'price'            => 'yes',
		'excerpt'          => 'yes',
		'full_content'     => 'no',
		'buy_button'       => 'yes',
		'columns'          => 3,
		'thumbnails'       => 'true',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'ids'              => '',
		'pagination'       => 'true'
	);
	$i = 1;
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
					<?php $wrapper_class = 'edd_download_columns_' . $atts['columns']; ?>
					<div class="edd_downloads_list <?php echo apply_filters( 'edd_downloads_list_wrapper_class', $wrapper_class, $atts ); ?>">
						<div class="tvlgiao_download_header_infor">
						<?php
							//before head download 
							# tvlgiao_download_header_left 5
							# gridlist_toggle_button 10
							# tvlgiao_download_filter   15
							# tvlgiao_download_footer_left 20
							do_action('tvlgiao_download_before_heade'); 
						?>
						<div class="tvlgiao_download_header_count">
							<?php echo esc_html__('show','wdsoundbox').' '.$wp_query->post_count.' '.esc_html__('of','wdsoundbox').' '.$wp_query->found_posts.' '.esc_html__('product','wdsoundbox'); ?>
						</div>
					</div>
				<div class="download_product">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>
					<div <?php echo wp_kses_post($schema); ?>class="<?php echo apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $atts, $i);  ?>" id="edd_download_<?php echo get_the_ID(); ?>">
						<div class="edd_download_inner">
							<?php

							do_action( 'edd_download_before' );

							if ( 'false' != $atts['thumbnails'] ) :
								echo '<div class="download_thumbnail">';
								edd_get_template_part( 'shortcode', 'content-image' );
								echo '<div class="download_icon">';
								echo '<div class="download_content_icon">';
								do_action( 'edd_download_after_thumbnail' );
								if ( $atts['buy_button'] == 'yes' )
								edd_get_template_part( 'shortcode', 'content-cart-button' );
								echo '</div>';//end div download_content_icon 
								echo '</div>';//end div download_icon 
								echo '</div>';//end div download_thumbnail
							endif;
							echo '<div class="content_download_grid">';
							edd_get_template_part( 'shortcode', 'content-title' );
							do_action( 'edd_download_after_title' );

							if ( $atts['author'] == 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-author' );
							}

							if ( $atts['price'] == 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-price' );
								do_action( 'edd_download_after_price' );
							}

							if ( $atts['excerpt'] == 'yes' && $atts['full_content'] != 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-excerpt' );
								do_action( 'edd_download_after_content' );
							} else if ( $atts['full_content'] == 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-full' );
								do_action( 'edd_download_after_content' );
							}
							echo "</div>"; // end div content download grid
							//add content list
							echo '<div class="content_download_list">';
							echo '<div class="content_download_title_author">';
							edd_get_template_part( 'shortcode', 'content-title' );
							
							if ( $atts['author'] == 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-author' );
							}
							echo '</div>';//end div title author
							echo '<div class="content_download_price">';
							if ( $atts['price'] == 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-price' );
								do_action( 'edd_download_after_price' );
							}
							echo '</div>';//end div content_download_price
							echo '<div class="content_download_excerpt">';
							if ( $atts['excerpt'] == 'yes' && $atts['full_content'] != 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-excerpt' );
								do_action( 'edd_download_after_content' );
							} else if ( $atts['full_content'] == 'yes' ) {
								edd_get_template_part( 'shortcode', 'content-full' );
								do_action( 'edd_download_after_content' );
							}
							echo '</div>';//end div content_download_excerpt
							echo '<div class="download_icon_list">';

							if ( $atts['buy_button'] == 'yes' )
							edd_get_template_part( 'shortcode', 'content-cart-button' );
							do_action( 'edd_download_after_thumbnail' );
							echo '</div>'; // end div download_icon_list
							echo "</div>"; // end div content download list

							do_action( 'edd_download_after' );
							?>
						</div>
					</div>
				<?php if ( $atts['columns'] != 0 && $i % $atts['columns'] == 0 ) { ?><div style="clear:both;"></div><?php } ?>
				<?php $i++; endwhile; ?>
				</div>
			<div style="clear:both;"></div>

			<?php wp_reset_postdata(); ?>

			<?php if ( filter_var( $atts['pagination'], FILTER_VALIDATE_BOOLEAN ) ) :
					$page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$big = 999999;
					$search_for   = array( $big, '#038;' );
					$replace_with = array( '%#%', '&' );
					$pagination = paginate_links(array(
						'base'    => str_replace( $search_for, $replace_with, get_pagenum_link( $big ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1,$page),
						'total'   => $wp_query->max_num_pages,
					));
				
				 if ( ! empty( $pagination ) ) : ?>
					<div id="edd_download_pagination" class="navigation">
						<?php echo wp_kses_post($pagination); ?>
					</div>
				<?php endif; ?>

			<?php endif; ?>
			</div>
			<?php endif; // end if have_post ?>			
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