<?php
	if(!function_exists ('soundbax_customize_product')){
		function soundbax_customize_product($wp_customize){
			/*--------------------------------------------------------------*/
			/*						 CUSTOM PRODUCT  						*/
			/*--------------------------------------------------------------*/
			$wp_customize->add_panel( 'soundbax_product_config', array(
		        'title' 			=> esc_html__( 'Product Config', 'wdsoundbox' ),
		        'description' 		=> esc_html__( 'Theme Sidebar Layout', 'wdsoundbox'),
		        'priority' 			=> 50,
		    ));
 			$wp_customize->add_section( 'soundbax_genneral_product' , array(
 				'title'       		=> esc_html__( 'Genneral Product Config', 'wdsoundbox' ),
 				'description' 		=> esc_html__('Genneral Product Config', 'wdsoundbox') ,
 				'panel'	 			=> 'soundbax_product_config',
 				'priority'    		=> 5,
 			));
 			$wp_customize->add_section( 'soundbax_archive_product' , array(
 				'title'       		=> esc_html__( 'Archive Product', 'wdsoundbox' ),
 				'description' 		=> esc_html__('Custom archive product page', 'wdsoundbox'),
 				'panel'	 			=> 'soundbax_product_config',
 				'priority'    		=> 10,
 			));
 			$wp_customize->add_section( 'soundbax_single_product' , array(
 				'title'       		=> esc_html__( 'Single Product', 'wdsoundbox' ),
 				'description' 		=> esc_html__('Custom single product page', 'wdsoundbox') ,
 				'panel'	 			=> 'soundbax_product_config',
 				'priority'    		=> 15,
 			));

 			//---------------------------------------------------------------//
 			/*Get list sidebar*/
 			global $wp_registered_sidebars;
	  		$arr_sidebar = array();
	  		$i = 0;
	  		foreach ( $wp_registered_sidebars as $sidebar ){
	  			if($i==0){
					$default = $sidebar['id'];
					$i++;
				}
	  			$arr_sidebar[$sidebar['id']] = $sidebar['name'];
	  		}
	  		//Genneral Product Config
			/*$wp_customize->add_setting('soundbax_genneral_catalog_mode', array(
				'default'        	=> 'no',
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_genneral_catalog_mode_control', array(
				'label'   			=> esc_html__( 'Catalog Mod', 'wdsoundbox' ),
				'description' 		=> esc_html__( 'Enable/Disable Catalog Mod(Hide All "Add To Cart" button on your site)', 'wdsoundbox'),
				'section'  			=> 'soundbax_genneral_product',
				'settings' 			=> 'soundbax_genneral_catalog_mode',
				'type'    			=> 'select',
				'choices' 			=> array(
					'no'		=> "Disable",	
					'yes'		=> "Enable"

				)
			));	
			$wp_customize->add_setting('soundbax_genneral_show_title', array(
				'default'        	=> 'yes',
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_genneral_show_title_control', array(
				'label'   			=> esc_html__( 'Show Title Product', 'wdsoundbox' ),
				'description' 		=> esc_html__( 'Show/Hile title product', 'wdsoundbox'),
				'section'  			=> 'soundbax_genneral_product',
				'settings' 			=> 'soundbax_genneral_show_title',
				'type'    			=> 'select',
				'choices' 			=> array(
					'yes'		=> "Show",	
					'no'		=> "Hide"
				)
			));
			$wp_customize->add_setting('soundbax_genneral_show_rating', array(
				'default'        	=> 'yes',
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_genneral_show_rating_control', array(
				'label'   			=> esc_html__( 'Show Rating Product', 'wdsoundbox' ),
				'description' 		=> esc_html__( 'Show/Hile rating product', 'wdsoundbox'),
				'section'  			=> 'soundbax_genneral_product',
				'settings' 			=> 'soundbax_genneral_show_rating',
				'type'    			=> 'select',
				'choices' 			=> array(
					'yes'		=> "Show",	
					'no'		=> "Hide"
				)
			));
			$wp_customize->add_setting('soundbax_genneral_show_price', array(
				'default'        	=> 'yes',
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_genneral_show_price_control', array(
				'label'   			=> esc_html__( 'Show Price Product', 'wdsoundbox' ),
				'description' 		=> esc_html__( 'Show/Hile price product', 'wdsoundbox'),
				'section'  			=> 'soundbax_genneral_product',
				'settings' 			=> 'soundbax_genneral_show_price',
				'type'    			=> 'select',
				'choices' 			=> array(
					'yes'		=> "Show",	
					'no'		=> "Hide"
				)
			));
			$wp_customize->add_setting('soundbax_genneral_show_meta', array(
				'default'        	=> 'yes',
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_genneral_show_meta_control', array(
				'label'   			=> esc_html__( 'Show Meta Product', 'wdsoundbox' ),
				'description' 		=> esc_html__( 'Show/Hile sale/featured product', 'wdsoundbox'),
				'section'  			=> 'soundbax_genneral_product',
				'settings' 			=> 'soundbax_genneral_show_meta',
				'type'    			=> 'select',
				'choices' 			=> array(
					'yes'		=> "Show",	
					'no'		=> "Hide"
				)
			));	 */
 		/*	$wp_customize->add_setting('soundbax_genneral_product_layout', array(
        		'default' 			=> 'wd-hover-style-1',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_genneral_product_layout',array(
            	'label'          	=> esc_html__( 'Select Style Hover Product', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_genneral_product',
            	'settings'       	=> 'soundbax_genneral_product_layout',
            	'choices'			=> array(
					'wd-hover-style-1' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/products/wd-hover-style-1.png',
					'wd-hover-style-2'	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/products/wd-hover-style-2.png',
					'wd-hover-style-3'	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/products/wd-hover-style-3.png'
				)
        	)));*/

 			//Content Custom Single Product
 			$wp_customize->add_setting('soundbax_single_product_layout', array(
        		'default' 			=> '0-0-0',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_single_product_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_single_product',
            	'settings'       	=> 'soundbax_single_product_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
			$wp_customize->add_setting('soundbax_single_product_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_single_product_sidebar_left', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_single_product',
				'settings' 			=> 'soundbax_single_product_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_single_product_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_single_product_sidebar_right', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_single_product',
				'settings' 			=> 'soundbax_single_product_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
        	$wp_customize->add_setting('soundbax_single_additional_image', array(
        		'default' 			=> 'bottom',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
			$wp_customize->add_control( 'soundbax_control_additional_image', array(
				'label'   			=> esc_html__( 'Select the position', 'wdsoundbox' ),
				'section'  			=> 'soundbax_single_product',
				'settings' 			=> 'soundbax_single_additional_image',
				'type'    			=> 'select',
				'choices' 			=> array(
					'bottom'	=> "Bottom Thumbnail Image",
					'left'		=> "Left Thumbnail Image"
				)
			));	
        	$wp_customize->add_setting('soundbax_single_recently_product', array(
        		'default' 			=> 'hide',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
			$wp_customize->add_control( 'soundbax_control_recently_product', array(
				'label'   			=> esc_html__( 'Show Recent Product', 'wdsoundbox' ),
				'section'  			=> 'soundbax_single_product',
				'settings' 			=> 'soundbax_single_recently_product',
				'type'    			=> 'select',
				'choices' 			=> array(
					'hide'	=> "Hide",
					'show'	=> "Show"
				)
			));		
        	$wp_customize->add_setting('soundbax_single_full_width', array(
        		'default' 			=> 'no',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
			$wp_customize->add_control( 'soundbax_control_full_width', array(
				'label'   			=> esc_html__( 'Full Content Detail', 'wdsoundbox' ),
				'section'  			=> 'soundbax_single_product',
				'settings' 			=> 'soundbax_single_full_width',
				'type'    			=> 'select',
				'description'   	=> esc_html__( 'If you want full width detail, you must select layout the full width', 'wdsoundbox' ),
				'choices' 			=> array(
					'no'	=> "NOT FULL",
					'yes'	=> "FULL"
				)
			));						
        	//Content Custom Archive Product
        	$wp_customize->add_setting('soundbax_archive_product_layout', array(
        		'default' 			=> '0-0-0',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_archive_product_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_archive_product',
            	'settings'       	=> 'soundbax_archive_product_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
        	$wp_customize->add_setting('soundbax_archive_product_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_archive_single_sidebar_left_select_control', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_archive_product',
				'settings' 			=> 'soundbax_archive_product_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_archive_product_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_archive_single_sidebar_right_select_control', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_archive_product',
				'settings' 			=> 'soundbax_archive_product_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
	  		// Text Copyright 
			$wp_customize->add_setting('soundbax_archive_number_perpage',array(
		    	'default'           => '15',
		    	'sanitize_callback' => 'soundbax_sanitize_html'
			));
    
    		$wp_customize->add_control('soundbax_archive_number_perpage_control',array(
            	'label'         	=> esc_html__( 'Number Product Of Page', 'wdsoundbox' ),
            	'settings'      	=> 'soundbax_archive_number_perpage',
            	'section'       	=> 'soundbax_archive_product',
            	'description'   	=> esc_html__( '', 'wdsoundbox' )
        	));
        	$wp_customize->add_setting('soundbax_archive_columns_product', array(
        		'default' 			=> '3',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
			$wp_customize->add_control( 'soundbax_control_columns_product', array(
				'label'   			=> esc_html__( 'Columns Product', 'wdsoundbox' ),
				'section'  			=> 'soundbax_archive_product',
				'settings' 			=> 'soundbax_archive_columns_product',
				'type'    			=> 'select',
				'choices' 			=> array(
					'2'	=> esc_html__( '2 Columns', 'wdsoundbox' ),
					'3'	=> esc_html__( '3 Columns', 'wdsoundbox' ),
					'4'	=> esc_html__( '4 Columns', 'wdsoundbox' ),
				)
			));	
		}
	}
	add_action('customize_register','soundbax_customize_product' );
?>