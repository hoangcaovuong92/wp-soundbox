<?php
/**
 * Shortcode: wpdancebootstrap_site_header
 */
if (!function_exists('tvlgiao_wpdance_shortcode_site_header')) {
	function tvlgiao_wpdance_shortcode_site_header($atts) {
		extract(shortcode_atts(array(
			'class' 		=> ''
			,'custom_logo_url'		=> ''
		), $atts));
		
		$hide_site_title 	= get_theme_mod('tvlgiao_wpdance_hide_site_title','1');
		$default_logo 		= TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png';
		if($custom_logo_url != ""){
			$image	  		= wp_get_attachment_image_src($custom_logo_url,'full');
			$logo_url 		= $image[0];
		}else{
			$logo_url	  	= get_theme_mod('tvlgiao_wpdance_header_logo_url', $default_logo); 
		}

		ob_start();
		?>
		<div class="header-main <?php echo esc_attr($class) ?>">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				
				<img id="site-logo" class="site-logo" src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name') ); ?>' title="<?php echo esc_attr(bloginfo('name')) ?>">
			
				<?php if (!$hide_site_title): ?>
					<?php if (is_front_page() && is_home()): ?>
						<h1 class="site-title" rel="home"><?php bloginfo( 'name' ); ?></h1>
					<?php else: ?>
						<p class="site-title" rel="home"><?php bloginfo( 'name' ); ?></p>
					<?php endif ?>
				<?php endif ?>
			</a>
		</div>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_site_header', 'tvlgiao_wpdance_shortcode_site_header');
?>