<?php 
 
	/**
 * Get Cart Item Template
 *
 * @since 1.0
 * @param int $cart_key Cart key
 * @param array $item Cart item
 * @param bool $ajax AJAX?
 * @return string Cart item
*/
add_filter('edd_cart_item','wdsoundbax_edd_get_cart_item_template_custom',10,2);
	
function wdsoundbax_edd_get_cart_item_template_custom($value, $item) {
	global $post;

	$id = is_array( $item ) ? $item['id'] : $item;
	$thumnail   = (has_post_thumbnail($id))?get_the_post_thumbnail_url($id):get_template_directory_uri().'/assets/images/sample.png';
	$value = str_replace( '{item_thumbnail_download}', $thumnail, $value );
	return  $value;
	}