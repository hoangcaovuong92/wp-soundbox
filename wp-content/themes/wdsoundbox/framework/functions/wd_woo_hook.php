<?php
/**
 * @package 
 * @subpackage 
 * @since 
 */
	
/*
/*	Content Single Product
*/
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

add_action( 'woocommerce_single_product_summary', 'soundbax_template_single_review', 12 );
function soundbax_template_single_review(){
	global $product;

	if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
		return;	
	if( function_exists('wd_get_rating_html') ){
		$rating_html = wd_get_rating_html();
	}else{
		$rating_html = $product->get_rating_html();
	}
	if ( $rating_html ) {
		echo "<div class=\"review_wrapper\">";
		echo '<span class="add_new_review"><a href="#reviews" class="inline show_review_form woocommerce-review-link" title="Review for '. esc_attr($product->get_title()) .' "><i class="fa fa-pencil-square-o"></i>' . esc_html__( 'Add your review', 'wdsoundbox' ) . '</a></span>';
		echo "</div>";
	}else{
		echo '<p><span class="add_new_review"><a href="#reviews" class="inline show_review_form woocommerce-review-link" title="Review for '. esc_attr($product->get_title()) .' "><i class="fa fa-pencil-square-o"></i>' . esc_html__( 'Be the first to review', 'wdsoundbox' ) . '</a></span></p>';
	}		
}

add_action('woocommerce_single_product_summary', 'soundbax_template_single_availability', 16 );
function soundbax_template_single_availability(){
	global $product;
	$_product_stock = soundbax_get_product_availability($product); ?>
	<p class="availability stock <?php echo esc_attr($_product_stock['class']);?>"><?php esc_html_e('Availability','wdsoundbox');?>: <span><?php echo esc_attr($_product_stock['availability']);?></span></p><?php		
}

add_action( 'woocommerce_single_product_summary', 'soundbax_template_single_sku', 18 );
function soundbax_template_single_sku(){
	global $product, $post;
	$sku_label = esc_html__("Sku:",'wdsoundbox');
	echo "<p class='wd_product_sku product_meta'>" . $sku_label . " <span class=\"product_sku sku\">" . esc_attr($product->get_sku()) . "</span></p>";
}

function soundbax_get_product_categories(){
	global $product;
	$categories_label = esc_html__("Categories: ",'wdsoundbox');
	$rs = '';
	$rs .= '<div class="wd_product_categories"><span>'.$categories_label.'</span>';
	$product_categories = wp_get_post_terms(get_the_ID($product),'product_cat');
	$count = count($product_categories);
	if ( $count > 0 ){
		foreach ( $product_categories as $term ) {
		$rs.= '<a href="'.get_term_link($term->slug,$term->taxonomy).'">'.$term->name . "</a>, ";

		}
		$rs = substr($rs,0,-2);
	}
	$rs .= '</div>';
	echo wp_kses_post( $rs );
}

function soundbax_product_tags_template(){
	global $product, $post;
	$_terms = wp_get_post_terms( $product->id, 'product_tag');
	$tags_label = esc_html__("Tags: ",'wdsoundbox');
	echo '<div class="tagcloud">';
	
	$_include_tags = '';
	if( count($_terms) > 0 ){
		echo '<span class="tag_heading">'.$tags_label.'</span>';
		foreach( $_terms as $index => $_term ){
			$_include_tags .= ( $index == 0 ? "{$_term->term_id}" : ",{$_term->term_id}" ) ;
		}
		wp_tag_cloud( array('taxonomy' => 'product_tag', 'include' => $_include_tags, 'separator'=>'' ) );
	}
	
	echo "</div>\n";			
}

function soundbax_template_single_social_sharing(){
	?>
		<div class="wd-social-share">
			<span><?php esc_html_e('Share ','wdsoundbox'); ?></span>
			<div class="addthis_sharing_toolbox"></div>
		</div>
	<?php
}

add_action( 'woocommerce_single_product_summary', 'soundbax_get_product_tags_categories', 40);
function soundbax_get_product_tags_categories(){
	echo '<div class="wd_product_tags_categoried">';
		soundbax_template_single_social_sharing();
		soundbax_product_tags_template();
		soundbax_get_product_categories();
	echo '</div>';
}



add_action( 'woocommerce_after_single_product_summary', 'soundbax_upsell_related_display', 15 );
function soundbax_upsell_related_display(){ ?>
	<div class="wd-ralated-product">
		<h2 class="wd-heading-title"><?php esc_html_e('RELATED ITEMS','wdsoundbox'); ?></h2>
		<div class="wd-ralated-content">
			<?php woocommerce_related_products( array(12), false );	?>			
		</div>
	</div>	
	<?php	
}
add_action( 'after_setup_theme','soundbax_archive_number_perpage', 200);
function soundbax_archive_number_perpage(){ 
	$wd_archive_product = get_theme_mod('soundbax_archive_number_perpage','15');
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$wd_archive_product.';' ), 20 );
}

add_action('after_setup_theme','soundbax_remove_action', 250);
function soundbax_remove_action(){
	remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
	add_action('soundbax_button_shop_loop','woocommerce_template_loop_add_to_cart',10);
	remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);	
	remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
	add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',5);
	add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',10);
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
	add_action('woocommerce_single_product_summary','woocommerce_template_single_price',14);
}
add_action( 'soundbax_description_product', 'soundbax_short_description_product', 15 );
function soundbax_short_description_product() { ?>
	<div class="wp_description_product">
 		<?php soundbax_the_excerpt_max_words(40); ?> [...]
 	</div>
	<?php 
}

if( class_exists('YITH_WCWL_UI') && class_exists('YITH_WCWL') ){
	add_action( 'soundbax_button_shop_loop', 'soundbax_add_wishlist_button_to_product_list', 20 );
	function soundbax_add_wishlist_button_to_product_list(){
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	}
	// Custom position in Product detail page
	add_action( 'woocommerce_after_add_to_cart_button' , create_function('','echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );'), 50 );
}

if( class_exists( 'YITH_Woocompare_Frontend' ) && class_exists( 'YITH_Woocompare' ) ) {

	global $yith_woocompare;

	$is_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX );
	if( $yith_woocompare->is_frontend() || $is_ajax ) {
		if( $is_ajax ){
			$yith_woocompare->obj = new YITH_Woocompare_Frontend();
		}
		add_action( 'soundbax_button_shop_loop', array( $yith_woocompare->obj, 'add_compare_link' ), 15 );
		add_action( 'woocommerce_after_add_to_cart_button', array( $yith_woocompare->obj, 'add_compare_link' ), 30 );			
	}
	
}

add_action( 'woocommerce_before_shop_loop_item_title', 'soundbax_flash_featured', 5 );
function soundbax_flash_featured(){
	global $product;
	if ( $product->is_featured() ) { ?>
		<span class="featured"><?php esc_html_e('Hot','wdsoundbox');?></span>
	<?php } 
}

add_action( 'soundbax_single_recent_product', 'soundbax_single_recent_product_function', 5 );
function soundbax_single_recent_product_function() { 
		// New Product
	$args = array(  
		'post_type' 		=> 'product',  
		'posts_per_page' 	=> 3,
		'orderby' 			=> 'date',
		'order'				=> 'DESC'
	);
	$products = new WP_Query( $args );
	?>
	<div class="wp_single_recent_product">
		<h2 class="wd-title"><?php esc_html_e('Recently Viewed Products','wdsoundbox');?></h2>
		<?php while ( $products->have_posts() ) : $products->the_post(); global $product; ?>
			<a href="<?php the_permalink(); ?>">
			    <?php				    	
			    	if (has_post_thumbnail( $products->post->ID )){
		    			echo get_the_post_thumbnail($products->post->ID,'shop_thumbnail');	 		
			    	} 
			    ?>
			</a>		
		<?php endwhile; ?>
 	</div>
	<?php 
}

add_action('soundbax_header_init_action','soundbax_customize_product_config', 500);
function soundbax_customize_product_config(){
	$catalog_mod    = get_theme_mod('soundbax_genneral_catalog_mode', "no");
    if($catalog_mod == "yes"){
        remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
		remove_action('soundbax_button_shop_loop','woocommerce_template_loop_add_to_cart',10);
    }
    $show_title    	= get_theme_mod('soundbax_genneral_show_title', "yes");
    if($show_title == "no"){
    	remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
    }
    $show_rating  	= get_theme_mod('soundbax_genneral_show_rating', "yes");
    if($show_rating == "no"){
    	remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',10);
    }
    $show_price  	= get_theme_mod('soundbax_genneral_show_price', "yes");
    if($show_price == "no"){
    	remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',5);
    }
    $show_meta  	= get_theme_mod('soundbax_genneral_show_meta', "yes");
    if($show_meta == "no"){
    	remove_action('woocommerce_before_shop_loop_item_title','soundbax_flash_featured',5);
    	remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
    }
}
?>