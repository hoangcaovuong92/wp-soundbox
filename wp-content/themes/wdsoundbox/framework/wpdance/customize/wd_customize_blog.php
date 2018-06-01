<?php
	if(!function_exists ('soundbax_customize_blog')){
		function soundbax_customize_blog($wp_customize){
			/*--------------------------------------------------------------*/
			/*						 CUSTOM BLOG 	 						*/
			/*--------------------------------------------------------------*/
			$wp_customize->add_panel( 'soundbax_blog_config', array(
		        'title' 			=> esc_html__( 'Page Config', 'wdsoundbox' ),
		        'description' 		=> esc_html__( 'Theme Sidebar Layout', 'wdsoundbox'),
		        'priority' 			=> 50,
		    ));
 			$wp_customize->add_section( 'soundbax_default_page' , array(
 				'title'       		=> esc_html__( 'Page Default', 'wdsoundbox' ),
 				'description' 		=> esc_html__('Custom page blog page', 'wdsoundbox'),
 				'panel'	 			=> 'soundbax_blog_config',
 				'priority'    		=> 1,
 			));
 			$wp_customize->add_section( 'soundbax_default_blog' , array(
 				'title'       		=> esc_html__( 'Teamplate 1', 'wdsoundbox' ),
 				'description' 		=> '',
 				'panel'	 			=> 'soundbax_blog_config',
 				'priority'    		=> 2,
 			));
 			$wp_customize->add_section( 'soundbax_default_template2' , array(
 				'title'       		=> esc_html__( 'Teamplate 2', 'wdsoundbox' ),
 				'description' 		=> '',
 				'panel'	 			=> 'soundbax_blog_config',
 				'priority'    		=> 2,
 			));
 			$wp_customize->add_section( 'soundbax_default_template3' , array(
 				'title'       		=> esc_html__( 'Teamplate 3', 'wdsoundbox' ),
 				'description' 		=> '',
 				'panel'	 			=> 'soundbax_blog_config',
 				'priority'    		=> 2,
 			));
 			$wp_customize->add_section( 'soundbax_default_template4' , array(
 				'title'       		=> esc_html__( 'Teamplate 4', 'wdsoundbox' ),
 				'description' 		=> '',
 				'panel'	 			=> 'soundbax_blog_config',
 				'priority'    		=> 2,
 			));
 			$wp_customize->add_section( 'soundbax_archive_blog' , array(
 				'title'       		=> esc_html__( 'Archive Blog', 'wdsoundbox' ),
 				'description' 		=> esc_html__('Custom archive blog page', 'wdsoundbox'),
 				'panel'	 			=> 'soundbax_blog_config',
 				'priority'    		=> 3,
 			));
 			$wp_customize->add_section( 'soundbax_single_blog' , array(
 				'title'       		=> esc_html__( 'Single Blog', 'wdsoundbox' ),
 				'description' 		=> esc_html__('Custom single blog page', 'wdsoundbox') ,
 				'panel'	 			=> 'soundbax_blog_config',
 				'priority'    		=> 4,
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
 			//Content Custom Single Blog
 			$wp_customize->add_setting('soundbax_single_blog_layout', array(
        		'default' 			=> '0-0-0',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_single_blog_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_single_blog',
            	'settings'       	=> 'soundbax_single_blog_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
			$wp_customize->add_setting('soundbax_single_blog_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_single_blog_sidebar_left', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_single_blog',
				'settings' 			=> 'soundbax_single_blog_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_single_blog_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_single_blog_sidebar_right', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_single_blog',
				'settings' 			=> 'soundbax_single_blog_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));

        	//Content Custom Archive Blog
        	$wp_customize->add_setting('soundbax_archive_blog_layout', array(
        		'default' 			=> '0-0-0',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_archive_blog_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_archive_blog',
            	'settings'       	=> 'soundbax_archive_blog_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
        	$wp_customize->add_setting('soundbax_archive_blog_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_archive_blog_sidebar_left', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_archive_blog',
				'settings' 			=> 'soundbax_archive_blog_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_archive_blog_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_archive_blog_sidebar_right', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_archive_blog',
				'settings' 			=> 'soundbax_archive_blog_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
        	//Content Custom Defaule template1
        	$wp_customize->add_setting('soundbax_template1_layout', array(
        		'default' 			=> '0-0-0',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_template1_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_default_blog',
            	'settings'       	=> 'soundbax_template1_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
        	$wp_customize->add_setting('soundbax_default_template1_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_template1_sidebar_left', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_default_blog',
				'settings' 			=> 'soundbax_default_template1_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_default_teamplate1_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_teamplate1_sidebar_right', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_default_blog',
				'settings' 			=> 'soundbax_default_teamplate1_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));

			//Content Custom Defaule template2
        	$wp_customize->add_setting('soundbax_template2_layout', array(
        		'default' 			=> '0-0-0',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_template2_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_default_template2',
            	'settings'       	=> 'soundbax_template2_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
        	$wp_customize->add_setting('soundbax_default_template2_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_template2_sidebar_left', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_default_template2',
				'settings' 			=> 'soundbax_default_template2_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_default_teamplate2_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_teamplate2_sidebar_right', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_default_template2',
				'settings' 			=> 'soundbax_default_teamplate2_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			//Content Custom Defaule template3
        	$wp_customize->add_setting('soundbax_template3_layout', array(
        		'default' 			=> '0-0-0',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_template3_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_default_template3',
            	'settings'       	=> 'soundbax_template3_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
        	$wp_customize->add_setting('soundbax_default_template3_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_template3_sidebar_left', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_default_template3',
				'settings' 			=> 'soundbax_default_template3_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_default_teamplate3_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_teamplate3_sidebar_right', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_default_template3',
				'settings' 			=> 'soundbax_default_teamplate3_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
        	//Content Custom Page Default
        	$wp_customize->add_setting('soundbax_default_page_layout', array(
        		'default' 			=> '0-0-1',
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_default_page_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_default_page',
            	'settings'       	=> 'soundbax_default_page_layout',
            	'choices'			=> array(
					'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
					'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
					'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
					'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
				)
        	)));
        	$wp_customize->add_setting('soundbax_default_page_sidebar_left', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_page_sidebar_left', array(
				'label'   			=> 'Select left sidebar',
				'section'  			=> 'soundbax_default_page',
				'settings' 			=> 'soundbax_default_page_sidebar_left',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));
			$wp_customize->add_setting('soundbax_default_page_sidebar_right', array(
				'default'        	=> $default,
				'sanitize_callback' => 'soundbax_sanitize_text',
				'capability' 		=> 'edit_theme_options'
			));
			$wp_customize->add_control( 'soundbax_default_page_sidebar_right', array(
				'label'   			=> 'Select right sidebar',
				'section'  			=> 'soundbax_default_page',
				'settings' 			=> 'soundbax_default_page_sidebar_right',
				'type'    			=> 'select',
				'choices' 			=> $arr_sidebar,
			));

		}
	}
	add_action('customize_register','soundbax_customize_blog' );
?>