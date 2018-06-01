<?php
	if(!function_exists ('soundbax_customize_set_custom_css')){
		function soundbax_customize_set_custom_css(){
			//Banner
			$default_url 				= TVLGIAO_WPDANCE_THEME_IMAGES.'/baner_breadcrumb.jpg';
			$banner_breadcrumb_url 		= get_theme_mod( 'soundbax_banner_breadcrumb' ,$default_url);
			$custom_style_banner 		= '.breadcrumb_banner { background-image: url("'.esc_url($banner_breadcrumb_url).'"); }';
			//Background 404
			$select_style				= get_theme_mod( 'soundbax_page_404_select_style' ,'bg_image');
			if($select_style == 'bg_image'){
				$default_url_404 		= TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg';
				$banner_bg_404_url 		= get_theme_mod( 'soundbax_page_404_bg_image' ,$default_url_404);
				$custom_style_banner 	.= '.error404 { background-image: url("'.esc_url($banner_bg_404_url).'"); }';
			}
			if($select_style == 'bg_color'){
				$array_setting_color 	= array('soundbax_page_404_bg_color');
				$array_color_defaunt	= array('#703f78');
				$array_select_class		= array('.error404');
				$array_attribute		= array('background-color');
				$number_element			= count($array_setting_color);
				$i = 0;	
		    	for($i; $i < $number_element; $i++){ 
					$color_attribute 		= get_theme_mod( $array_setting_color[$i] ,$array_color_defaunt[$i]);
					$custom_style_banner 	.= esc_attr($array_select_class[$i]).'{ '.esc_attr($array_attribute[$i]).': '.esc_attr($color_attribute).'; }';
		        	$i++; 
		     	}		
			}
			// Font Custom
			$custom_font = soundbax_set_font_style();
			//Color Styling
			wp_enqueue_style('tvlgiao-wpdance-custom-style-color', TVLGIAO_WPDANCE_THEME_CSS.'/wd_custom_style.css');
			$custom_css 	= get_option(TVLGIAO_WPDANCE_THEME_SLUG.'custom_style', '');
			wp_add_inline_style( 'tvlgiao-wpdance-custom-style-color', $custom_css );
			wp_add_inline_style( 'tvlgiao-wpdance-custom-style-color', $custom_style_banner );
			wp_add_inline_style( 'tvlgiao-wpdance-custom-style-color', $custom_font );
		}
	}
	add_action( 'wp_enqueue_scripts', 'soundbax_customize_set_custom_css' , 10000);
?>