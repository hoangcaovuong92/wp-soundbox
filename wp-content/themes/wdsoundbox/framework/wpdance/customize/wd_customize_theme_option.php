<?php
	if(!function_exists ('soundbax_customize_theme_option')){
		function soundbax_customize_theme_option($wp_customize){
			/*--------------------------------------------------------------*/
			/*					 CUSTOM STYLING OPTION						*/
			/*--------------------------------------------------------------*/
		    $wp_customize->add_panel( 'soundbax_theme_option', array(
		        'title' 			=> esc_html__( 'Theme Option', 'wdsoundbox' ),
		        'description' 		=> esc_html__( 'Custom theme.', 'wdsoundbox'),
		        'priority' 			=> 50,
		    ));
 			$wp_customize->add_section( 'soundbax_breadcrumb_section' , array(
 				'title'       		=> esc_html__( 'Background Header', 'wdsoundbox' ),
 				'description' 		=> esc_html__( '', 'wdsoundbox'),
 				'panel'	 			=> 'soundbax_theme_option',
 				'priority'    		=> 1,
 			));
 			$wp_customize->add_section( 'soundbax_page_404' , array(
 				'title'       		=> esc_html__( 'Page 404 Config', 'wdsoundbox' ),
 				'description' 		=> esc_html__( '', 'wdsoundbox'),
 				'panel'	 			=> 'soundbax_theme_option',
 				'priority'    		=> 1,
 			));
			$wp_customize->add_section( 'soundbax_scroll_button_section' , array(
 				'title'       		=> esc_html__( 'Scroll Button', 'wdsoundbox' ),
 				'description' 		=> esc_html__( 'Scroll Button', 'wdsoundbox'),
 				'panel'	 			=> 'soundbax_theme_option',
 				'priority'    		=> 1,
 			));
			/*--------------------------------------------------------------*/
			/*					 CONTENT CONFIG 							*/
			/*--------------------------------------------------------------*/
 			$wp_customize->add_setting('soundbax_banner_header', array(
				'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_header.jpg',
				'sanitize_callback' => 'esc_url_raw',
				'type' 				=> 'theme_mod'
			));
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'soundbax_banner_header', array(
		        'label'    			=> esc_html__( 'Background Header', 'wdsoundbox' ),
		        'section'  			=> 'soundbax_breadcrumb_section',
		        'settings' 			=> 'soundbax_banner_header',
		        'description' 		=> esc_html__( 'use in header default', 'wdsoundbox'),
		    )));

		    /*Page 404*/
			/*$wp_customize->add_setting('soundbax_page_404_select_style', array(
				'default'        	=> 'bg_color',
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_control_header_sticky_menu', array(
				'label'   			=> esc_html__( 'Background Image Or Color', 'wdsoundbox' ),
				'section'  			=> 'soundbax_page_404',
				'settings' 			=> 'soundbax_page_404_select_style',
				'type'    			=> 'select',
				'choices' 			=> array(
					'bg_image'			=> esc_html__( 'Background Image', 'wdsoundbox' ),
					'bg_color'			=> esc_html__( 'Background Color', 'wdsoundbox' ),
				)
			));*/
 			$wp_customize->add_setting('soundbax_page_404_bg_image', array(
				'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg',
				'sanitize_callback' => 'esc_url_raw',
				'type' 				=> 'theme_mod'
			));
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'soundbax_page_404_bg_image', array(
		        'label'    			=> esc_html__('Select Background Image', 'wdsoundbox' ),
		        'section'  			=> 'soundbax_page_404',
		        'settings' 			=> 'soundbax_page_404_bg_image',
		    )));

		    /* Scroll Button */
			$wp_customize->add_setting('soundbax_scroll_button', array(
				'default'        	=> 'no',
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_scroll_button_control', array(
				'label'   			=> esc_html__('Scroll Button', 'wdsoundbox'),
				'description' 		=> esc_html__('Enable/Disable scroll button in website', 'wdsoundbox'),
				'section'  			=> 'soundbax_scroll_button_section',
				'settings' 			=> 'soundbax_scroll_button',
				'type'    			=> 'select',
				'choices' 			=> array(
					'no'		=> "Disable",	
					'yes'		=> "Enable"
				)
			));

		}
	}
	add_action('customize_register','soundbax_customize_theme_option' );
?>
