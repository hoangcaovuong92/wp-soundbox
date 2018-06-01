<?php
/**
 * Shortcode: tvlgiao_wpdance_special_gird_list_product
 */

if (!function_exists('tvlgiao_wpdance_special_gird_list_product_function')) {
	function tvlgiao_wpdance_special_gird_list_product_function($atts) {
		extract(shortcode_atts(array(
			'id_category'			=> '-1'
			,'data_show'			=> 'recent_product'
			,'number_products'		=> '12'
			,'sort'					=> 'term_id'
			,'order_by'				=> 'DESC'
			,'columns'				=> '2'
			,'filter_product'		=> '1'
			,'pagination_loadmore'	=> '1'
			,'number_loadmore'		=> '8'
			,'class'				=> ''

		), $atts));

		$columns_product 	= 'wd-columns-'.$columns;
		wp_reset_query();	

		// New Product
		$args = array(  
			'post_type' 		=> 'product',  
			'posts_per_page' 	=> $number_products,
			'orderby' 			=> $sort,
			'order'				=> $order_by,
			'paged' 			=> get_query_var('paged')
		);
		//Category
		if( $id_category != -1 ){
			$args['tax_query']= array(
					    	array(
							    	'taxonomy' 		=> 'product_cat',
									'terms' 		=> $id_category,
									'field' 		=> 'term_id',
									'operator' 		=> 'IN'
								)
			   			);
		}
		//Most View Products
		if($data_show == 'mostview_product'){
			$args['meta_key'] 	= '_wd_product_views_count';
			$args['orderby'] 	= 'meta_value_num';
			$args['order'] 		= 'DESC';
		}

		//On Sale Product
		if($data_show == 'onsale_product'){
			$args['meta_query'] = array(
					                    'relation' => 'OR',
					                    array( // Simple products type
					                        'key'           => '_sale_price',
					                        'value'         => 0,
					                        'compare'       => '>',
					                        'type'          => 'numeric'
					                    ),
					                    array( // Variable products type
					                        'key'           => '_min_variation_sale_price',
					                        'value'         => 0,
					                        'compare'       => '>',
					                        'type'          => 'numeric'
					                    )
	           					);
		}
		//Featured Product
		if($data_show == 'featured_product'){
			$args['meta_key'] 	= '_featured';
			$args['meta_value'] = 'yes';
		}

		$products 			= new WP_Query( $args );
		$count_products 	= $products->found_posts;

		ob_start(); ?>
		<div class='wd-shortcode-special-pro <?php esc_html_e($class); ?>'>
		<?php if ( $products->have_posts() ) : ?>
			<?php if($filter_product): ?>
				<div class="wrap_filter_button">
					<p class="woocommerce-result-count">
						<?php printf( __('Showing %s - %s of %s results','wpdance'), get_query_var('paged'), $number_products, $count_products); ?>
					</p>
					<form action="shop" class="woocommerce-ordering" method="get">
						<select name="orderby" class="orderby">
							<option value="menu_order" selected="selected"><?php _e('Default sorting','wpdance'); ?></option>
							<option value="popularity"><?php _e('Sort by popularity','wpdance'); ?></option>
							<option value="rating"><?php _e('Sort by average rating','wpdance'); ?></option>
							<option value="date"><?php _e('Sort by newnes','wpdance'); ?></option>
							<option value="price"><?php _e('Sort by price: low to high','wpdance'); ?></option>
							<option value="price-desc"><?php _e('Sort by price: high to low','wpdance'); ?></option>
						</select>
					</form>
					<?php
						/**
						* Grid/ List Product
						*/  
						do_action( 'woocommerce_before_shop_loop' );
					?>
				</div>
			<?php endif; // Filter Product?>
			<div class="wd-products-wrapper grid-list-action <?php esc_html_e($columns_product); ?>">
				<?php woocommerce_product_loop_start(); ?>
				<?php while ( $products->have_posts() ) : $products->the_post();  ?>
					
					<?php wc_get_template_part( 'content', 'product' ); ?>
				
				<?php endwhile;	?>
				<?php woocommerce_product_loop_end(); ?>
			</div>
			<?php if($pagination_loadmore == '1') : ?> 
				<div class="wd-pagination">
					<?php tvlgiao_wpdance_pagination(3, $products); ?>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			<?php if($pagination_loadmore == '0') : ?> 
				<div class="wd-loadmore">
					<div style="display: none;" id="show_image_loading">
						<img src="<?php echo SC_IMAGE.'/ajax-loader_image.gif';?>" alt="HTML5 Icon" style="height:15px;">
					</div>

					<div id="loadmore">
						<a href="#" class="button btn_loadmore_product"><?php _e('LOAD MORE','wpdance') ?></a>
					</div>
				</div>
				<div class="hidden">
					<input type="text" value="<?php esc_html_e($number_loadmore); ?>" id="tvlgiao_number_loadmore">
					<input type="text" value="<?php esc_html_e($id_category); ?>" id="tvlgiao_id_category">	
					<input type="text" value="<?php esc_html_e($data_show); ?>" id="tvlgiao_data_show">
				</div>
			<?php endif; ?>
		<?php endif; // Have Product?>	
		</div>
	
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_special_gird_list_product', 'tvlgiao_wpdance_special_gird_list_product_function');
?>