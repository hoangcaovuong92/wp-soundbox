<?php 
if(!function_exists ('wd_quote_function')){
	function wd_quote_function($atts,$content){
		extract(shortcode_atts(array(
			'class'		=>'',
			'style'		=> 'style1'
		),$atts));		
		$result="<blockquote class='{$style}'>".do_shortcode($content)."</blockquote>";
		return $result;
	}
}
add_shortcode('wd_quote','wd_quote_function');
if(!function_exists('site_url_function')){
		function site_url_function($atts,$content){
			extract(shortcode_atts(array(
				'method' => 'return'
			),$atts));
			switch($method){
				case 'echo': echo site_url(); break;
				case 'return': return site_url(); break;
				default: return site_url(); break;
			}
			
		}
	}
	add_shortcode('wd_site_url','site_url_function');
?>