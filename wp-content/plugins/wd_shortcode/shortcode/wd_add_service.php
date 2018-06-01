<?php
/**
 * Shortcode: tvlgiao_wpdance_service
 */
if (!function_exists('tvlgiao_wpdance_service')) {
	function tvlgiao_wpdance_service($atts,$content='') {
		extract(shortcode_atts(array(
			 'icon'		    => ''
			,'title'		=> 'image'
			,'button_text'	=> ''
			,'link_url'		=> "#"
			,'button_class'	=> ''
			,'style'		=> 'default'
			,'class' 		=> ''
		), $atts));
		$image_url 	= wp_get_attachment_image_src($icon);
		$imgSrc 	= $image_url[0];
		ob_start(); ?>
			<div class="wd-shortcode-service <?php echo esc_attr($class); ?>" >				
				<div class="wd-service-icon">
					<img alt="<?php echo esc_attr($title);?>" title="<?php echo esc_attr($title);?>" class="img" src="<?php echo esc_url($imgSrc)?>" />
				</div>
				<div class='service_content'><?php echo wp_kses_post($content); ?></div>
				<?php if($button_text !== '' ):?>
					<div class="wd-button-banner">
						<a class="wd-button-bn <?php echo esc_attr($button_class)?>" href="<?php echo esc_url($link_url)?>" title="<?php echo esc_attr($title);?>"><?php echo esc_attr($button_text);?></a>
					</div>
				<?php endif;?>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_service', 'tvlgiao_wpdance_service');
?>