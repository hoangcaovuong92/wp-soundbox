<?php
/**
 * Shortcode: tvlgiao_wpdance_brand_slider
 */

if (!function_exists('tvlgiao_wpdance_brand_slider_function')) {
	function tvlgiao_wpdance_brand_slider_function($atts) {
		extract(shortcode_atts(array(
			'image_url'		=> ''
			,'show_nav'		=> '1'
			,'auto_play'	=> '1'
			,'class' 		=> ''
		), $atts));
		$array_image 	= explode(',',$image_url); 

		$i = 0;
		$imglink_array = array();
		foreach($array_image as $_image)
	    {	
	        $img_url = wp_get_attachment_image_src($_image, "full");
	        $imglink_array[$i] = $img_url[0];
	        $i++;
	    }
		ob_start(); ?>
			<div class="wd-shortcode-brand <?php echo esc_attr($class); ?>">				
				<?php foreach($array_image as $_image){ ?>
					<?php $img_url = wp_get_attachment_image_src($_image, "full"); ?>
					<img src="<?php echo esc_url($img_url[0]); ?>" alt="">
				<?php } ?>
			</div>
			<script type="text/javascript">
						jQuery(document).ready(function() {
							"use strict";	
							var $_this = jQuery('.wd-shortcode-brand');
							var owl = $_this.owlCarousel({
								item : 3
								,responsive		:{
									0:{
										items: 1
									},
									480:{
										items: 3
									},
									768:{
										items: 4
									},
									992:{
										items: 5
									},
									1200:{
										items: 6
									}
								}
								,nav : true
								<?php if($show_nav) : ?>
									,navText		: [ '<', '>' ]
								<?php endif; ?>
								<?php if($auto_play) : ?>
									,autoplay: true
									,autoplayTimeout: 3000
								<?php endif; ?>
								<?php if(!$show_nav) : ?>
									,nav : false
								<?php endif; ?>
								,dots			: false
								,loop			: true
								,lazyload		: true
								,onInitialized: function(){
									$_this.addClass('loaded').removeClass('loading');
								}
							});
						});	
			</script>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_brand_slider', 'tvlgiao_wpdance_brand_slider_function');
?>