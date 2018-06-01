<?php
/**
 * Shortcode: tvlgiao_wpdance_add_shortcode
 */

if (!function_exists('tvlgiao_wpdance_download_cart')) {
	function tvlgiao_wpdance_download_cart($atts) {
		extract(shortcode_atts(array(
			'class'   => '',
			'id'	  => '',
			'style'	  => 'default',
		), $atts));
		ob_start();
		$id = (empty($id))?'':'id="'.$id.'"';
		echo '<div class="download_cart wpd-download-cart'.$class.' '.$style.'" '.$id.'>';
		echo do_shortcode('[download_cart]');
		echo '</div>';
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_download_cart', 'tvlgiao_wpdance_download_cart');

function tvlgiao_wpdance_downloads( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'category'         => '',
		'exclude_category' => '',
		'tags'             => '',
		'exclude_tags'     => '',
		'relation'         => 'OR',
		'style'			   => 'default',
		'style_icon'	   => 'default',
		'number'           => 9,
		'author'		   => 'yes',
		'price'            => 'no',
		'excerpt'          => 'yes',
		'full_content'     => 'no',
		'buy_button'       => 'yes',
		'columns'          => 3,
		'thumbnails'       => 'true',
		'author_large'	   => 'yes',
		'price_large'      => 'no',
		'excerpt_large'    => 'yes',
		'full_content_large'   => 'no',
		'buy_button_large'     => 'yes',
		'thumbnails_large'     => 'true',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'ids'              => '',
		'pagination'       => 'true'
	), $atts, 'downloads' );

	if(isset($_GET['orderby'])){
		$atts['orderby'] = 	$_GET['orderby'];
	}

	$query = array(
		'post_type'      => 'download',
		'orderby'        => $atts['orderby'],
		'order'          => $atts['order']
	);

	if ( filter_var( $atts['pagination'], FILTER_VALIDATE_BOOLEAN ) || ( ! filter_var( $atts['pagination'], FILTER_VALIDATE_BOOLEAN ) && $atts[ 'number' ] ) ) {

		$query['posts_per_page'] = (int) $atts['number'];

		if ( $query['posts_per_page'] < 0 ) {
			$query['posts_per_page'] = abs( $query['posts_per_page'] );
		}
	} else {
		$query['nopaging'] = true;
	}

	if( 'random' == $atts['orderby'] ) {
		$atts['pagination'] = false;
	}

	switch ( $atts['orderby'] ) {
		case 'price':
			$atts['orderby']   = 'meta_value';
			$query['meta_key'] = 'edd_price';
			$query['orderby']  = 'meta_value_num';
		break;
		
		case 'sale':
			$atts['orderby']   = 'meta_value';
			$query['meta_key'] = '_edd_download_sales';
			$query['orderby']  = 'meta_value_num';
		break;

		case 'title':
			$query['orderby'] = 'title';
		break;

		case 'id':
			$query['orderby'] = 'ID';
		break;

		case 'random':
			$query['orderby'] = 'rand';
		break;

		case 'post__in':
			$query['orderby'] = 'post__in';
		break;

		default:
			$query['orderby'] = 'post_date';
		break;
	}

	if ( $atts['tags'] || $atts['category'] || $atts['exclude_category'] || $atts['exclude_tags'] ) {

		$query['tax_query'] = array(
			'relation' => $atts['relation']
		);

		if ( $atts['tags'] ) {

			$tag_list = explode( ',', $atts['tags'] );

			foreach( $tag_list as $tag ) {

				$t_id  = (int) $tag;
				$is_id = is_int( $t_id ) && ! empty( $t_id );

				if( $is_id ) {

					$term_id = $tag;

				} else {

					$term = get_term_by( 'slug', $tag, 'download_tag' );

					if( ! $term ) {
						continue;
					}

					$term_id = $term->term_id;
				}

				$query['tax_query'][] = array(
					'taxonomy' => 'download_tag',
					'field'    => 'term_id',
					'terms'    => $term_id
				);
			}

		}

		if ( $atts['category'] ) {

			$categories = explode( ',', $atts['category'] );

			foreach( $categories as $category ) {

				$t_id  = (int) $category;
				$is_id = is_int( $t_id ) && ! empty( $t_id );

				if( $is_id ) {

					$term_id = $category;

				} else {

					$term = get_term_by( 'slug', $category, 'download_category' );

					if( ! $term ) {
						continue;
					}

					$term_id = $term->term_id;

				}

				$query['tax_query'][] = array(
					'taxonomy' => 'download_category',
					'field'    => 'term_id',
					'terms'    => $term_id,
				);

			}

		}

		if ( $atts['exclude_category'] ) {

			$categories = explode( ',', $atts['exclude_category'] );

			foreach( $categories as $category ) {

				$t_id  = (int) $category;
				$is_id = is_int( $t_id ) && ! empty( $t_id );

				if( $is_id ) {

					$term_id = $category;

				} else {

					$term = get_term_by( 'slug', $category, 'download_category' );

					if( ! $term ) {
						continue;
					}

					$term_id = $term->term_id;
				}

				$query['tax_query'][] = array(
					'taxonomy' => 'download_category',
					'field'    => 'term_id',
					'terms'    => $term_id,
					'operator' => 'NOT IN'
				);
			}

		}

		if ( $atts['exclude_tags'] ) {

			$tag_list = explode( ',', $atts['exclude_tags'] );

			foreach( $tag_list as $tag ) {

				$t_id  = (int) $tag;
				$is_id = is_int( $t_id ) && ! empty( $t_id );

				if( $is_id ) {

					$term_id = $tag;

				} else {

					$term = get_term_by( 'slug', $tag, 'download_tag' );

					if( ! $term ) {
						continue;
					}

					$term_id = $term->term_id;
				}

				$query['tax_query'][] = array(
					'taxonomy' => 'download_tag',
					'field'    => 'term_id',
					'terms'    => $term_id,
					'operator' => 'NOT IN'
				);

			}

		}
	}

	if ( $atts['exclude_tags'] || $atts['exclude_category'] ) {
		$query['tax_query']['relation'] = 'AND';
	}

	if( ! empty( $atts['ids'] ) )
		$query['post__in'] = explode( ',', $atts['ids'] );

	if ( get_query_var( 'paged' ) )
		$query['paged'] = get_query_var('paged');
	else if ( get_query_var( 'page' ) )
		$query['paged'] = get_query_var( 'page' );
	else
		$query['paged'] = 1;

	// Allow the query to be manipulated by other plugins
	$query = apply_filters( 'edd_downloads_query', $query, $atts );

	$downloads = new WP_Query( $query );
	if ( $downloads->have_posts() ) :
		$i = 1;
		ob_start(); ?>
		<?php if($atts['style'] == 'default' ): ?>
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
					<?php echo esc_html__('show','wpdance').' '.$downloads->post_count.' '.esc_html__('of','wpdance').' '.$downloads->found_posts.' '.esc_html__('product','wpdance'); ?>
				</div>
			</div>
			<div class="download_product">
			<?php while ( $downloads->have_posts() ) : $downloads->the_post(); ?>
				<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>
				<div <?php echo $schema; ?>class="<?php echo apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $atts, $i);  ?>" id="edd_download_<?php echo get_the_ID(); ?>">
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

			<?php if ( filter_var( $atts['pagination'], FILTER_VALIDATE_BOOLEAN ) ) : ?>

			<?php
				$pagination = false;

				if ( is_single() ) {
					$pagination = paginate_links( apply_filters( 'edd_download_pagination_args', array(
						'base'    => get_permalink() . '%#%',
						'format'  => '?paged=%#%',
						'current' => max( 1, $query['paged'] ),
						'total'   => $downloads->max_num_pages
					), $atts, $downloads, $query ) );
				} else {
					$big = 999999;
					$search_for   = array( $big, '#038;' );
					$replace_with = array( '%#%', '&' );
					$pagination = paginate_links( apply_filters( 'edd_download_pagination_args', array(
						'base'    => str_replace( $search_for, $replace_with, get_pagenum_link( $big ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1, $query['paged'] ),
						'total'   => $downloads->max_num_pages
					), $atts, $downloads, $query ) );
				}
			?>

			<?php if ( ! empty( $pagination ) ) : ?>
			<div id="edd_download_pagination" class="navigation">
				<?php echo $pagination; ?>
			</div>
			<?php endif; ?>

			<?php endif; ?>

		</div>
		<?php elseif ($atts['style'] == 'one_big') : //begin style one big ?>
		<?php $wrapper_class = 'edd_download_columns_' . $atts['columns']; ?>
		<div class="edd_downloads_list <?php echo apply_filters( 'edd_downloads_list_wrapper_class', $wrapper_class, $atts ); ?>">
			<?php while ( $downloads->have_posts() ) : $downloads->the_post(); ?>
				<?php $count = $downloads->found_posts;?>
				<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>
				<?php if($i==1): ?>
				<div <?php echo $schema; ?>class="<?php echo apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $atts, $i);echo ' '.'first_big_one';  ?>" >

					<div class="edd_download_inner">
						<?php

						do_action( 'edd_download_before' );

						if ( 'false' != $atts['thumbnails_large'] ) :
							echo '<div class="download_thumbnail">';
							edd_get_template_part( 'shortcode', 'content-image' );
							echo '<div class="download_icon">';
							echo '<div class="download_content_icon">';
							do_action( 'edd_download_after_thumbnail' );
							if ( $atts['buy_button_large'] == 'yes' )
							edd_get_template_part( 'shortcode', 'content-cart-button' );
							echo '</div>';//end div download_content_icon 
							echo '</div>';//end div download_icon 
							echo '</div>';//end div download_thumbnail
						endif;

						edd_get_template_part( 'shortcode', 'content-title' );
						do_action( 'edd_download_after_title' );

						if ( $atts['author_large'] == 'yes' ) {
							edd_get_template_part( 'shortcode', 'content-author' );
						}

						if ( $atts['price_large'] == 'yes' ) {
							edd_get_template_part( 'shortcode', 'content-price' );
							do_action( 'edd_download_after_price' );
						}

						if ( $atts['excerpt_large'] == 'yes' && $atts['full_content_large'] != 'yes' ) {
							edd_get_template_part( 'shortcode', 'content-excerpt' );
							do_action( 'edd_download_after_content' );
						} else if ( $atts['full_content_large'] == 'yes' ) {
							edd_get_template_part( 'shortcode', 'content-full' );
							do_action( 'edd_download_after_content' );
						}
						do_action( 'edd_download_after' );

						?>
					</div>
				</div>
				<?php else: ?>
					<?php if($i==2){echo '<div class="download_container_right">';}?>
					<div <?php echo $schema; ?>class="<?php echo apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $atts, $i);  ?>" >

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
						do_action( 'edd_download_after' );

						?>
					</div>
				</div>
				<?php //echo $i.'--------'.$count.'</br>'; ?>
				<?php if(($i==$atts['number'])||($i==$count)){echo '</div>';}?>
				<?php endif; ?>
			<?php $i++; endwhile; ?>
			<div style="clear:both;"></div>

			<?php wp_reset_postdata(); ?>

			<?php if ( filter_var( $atts['pagination'], FILTER_VALIDATE_BOOLEAN ) ) : ?>

			<?php
				$pagination = false;

				if ( is_single() ) {
					$pagination = paginate_links( apply_filters( 'edd_download_pagination_args', array(
						'base'    => get_permalink() . '%#%',
						'format'  => '?paged=%#%',
						'current' => max( 1, $query['paged'] ),
						'total'   => $downloads->max_num_pages
					), $atts, $downloads, $query ) );
				} else {
					$big = 999999;
					$search_for   = array( $big, '#038;' );
					$replace_with = array( '%#%', '&' );
					$pagination = paginate_links( apply_filters( 'edd_download_pagination_args', array(
						'base'    => str_replace( $search_for, $replace_with, get_pagenum_link( $big ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1, $query['paged'] ),
						'total'   => $downloads->max_num_pages
					), $atts, $downloads, $query ) );
				}
			?>

			<?php if ( ! empty( $pagination ) ) : ?>
			<div id="edd_download_pagination" class="navigation">
				<?php echo $pagination; ?>
			</div>
			<?php endif; ?>

			<?php endif; ?>

		</div>
		<?php elseif ($atts['style'] == 'first_row') : //begin style one big ?>
			<?php $wrapper_class = 'edd_download_columns_' . $atts['columns'].' '.'wp_best_seller'; ?>
		<div class="edd_downloads_list <?php echo apply_filters( 'edd_downloads_list_wrapper_class', $wrapper_class, $atts ); ?>">
			<?php while ( $downloads->have_posts() ) : $downloads->the_post(); ?>
				<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>
				<div <?php echo $schema; ?>class="<?php echo apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $atts, $i);  ?>" >
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
						do_action( 'edd_download_after' );

						?>
					</div>
				</div>
				<?php if ( $atts['columns'] != 0 && $i % $atts['columns'] == 0 ) { ?><div style="clear:both;"></div><?php } ?>
			<?php $i++; endwhile; ?>

			<div style="clear:both;"></div>

			<?php wp_reset_postdata(); ?>

			<?php if ( filter_var( $atts['pagination'], FILTER_VALIDATE_BOOLEAN ) ) : ?>

			<?php
				$pagination = false;

				if ( is_single() ) {
					$pagination = paginate_links( apply_filters( 'edd_download_pagination_args', array(
						'base'    => get_permalink() . '%#%',
						'format'  => '?paged=%#%',
						'current' => max( 1, $query['paged'] ),
						'total'   => $downloads->max_num_pages
					), $atts, $downloads, $query ) );
				} else {
					$big = 999999;
					$search_for   = array( $big, '#038;' );
					$replace_with = array( '%#%', '&' );
					$pagination = paginate_links( apply_filters( 'edd_download_pagination_args', array(
						'base'    => str_replace( $search_for, $replace_with, get_pagenum_link( $big ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1, $query['paged'] ),
						'total'   => $downloads->max_num_pages
					), $atts, $downloads, $query ) );
				}
			?>

			<?php if ( ! empty( $pagination ) ) : ?>
			<div id="edd_download_pagination" class="navigation">
				<?php echo $pagination; ?>
			</div>
			<?php endif; ?>

			<?php endif; ?>

		</div>
		<?php endif; //end if style  ?>
		<?php $display = ob_get_clean();
	else:
		$display = sprintf( _x( 'No %s found', 'download post type name', 'easy-digital-downloads' ), edd_get_label_plural() );
	endif;

	return apply_filters( 'downloads_shortcode', $display, $atts, $atts['buy_button'], $atts['columns'], '', $downloads, $atts['excerpt'], $atts['full_content'], $atts['price'], $atts['thumbnails'], $query );
}
add_shortcode( 'custom_downloads', 'tvlgiao_wpdance_downloads' );
?>