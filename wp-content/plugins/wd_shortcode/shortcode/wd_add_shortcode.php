<?php
/**
 * Shortcode: tvlgiao_wpdance_add_shortcode
 */
if (!function_exists('tvlgiao_wpdance_add_shortcode')) {
	function tvlgiao_wpdance_add_shortcode($atts) {
		extract(shortcode_atts(array(
			'class'   => '',
			'id'	  => '',
		), $atts));
		ob_start();
		$id = (empty($id))?'':'id="'.$id.'"';
		echo '<div class="add_shortcode '.$clas.'" '.$id.'>';
		echo do_shortcode($content_shortcode);
		echo '</div>';
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_add_shortcode', 'tvlgiao_wpdance_add_shortcode');

if(!function_exists('tvlgiao_wpdance_url')){
	function tvlgiao_wpdance_url(){
		return home_url('/');
	}
	add_shortcode('url_home','tvlgiao_wpdance_url' );
}
/*
* shortcode product download
*/

if (!function_exists('tvlgiao_wpdance_product_download')) {
	function tvlgiao_wpdance_product_download($atts,$content) {
		extract(shortcode_atts(array(
			'class'   => '',
			'id'	  => '',
		), $atts));
		ob_start();
		$id = (empty($id))?'':'id="'.$id.'"';
		echo '<div class="add_shortcode '.$clas.'" '.$id.'>';
		echo do_shortcode($content);
		echo '</div>';
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_product_download', 'tvlgiao_wpdance_product_download');
?>