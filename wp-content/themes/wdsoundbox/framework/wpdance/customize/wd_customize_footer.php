<?php
	if(!function_exists ('soundbax_customize_footer')){
		function soundbax_customize_footer($wp_customize){
			/*--------------------------------------------------------------*/
			/*						 CUSTOM FOOTER	 						*/
			/*--------------------------------------------------------------*/
			$wp_customize->add_section( 'soundbax_footer_config' , array(
 				'title'       		=> esc_html__( 'Footer', 'wdsoundbox' ),
 				'description' 		=> 'Custom footer site.',
 				'priority'    		=> 41,
 			));
			/*--------------------------------------------------------------*/
			/*						 CONTENT CONFIG FOOTER 					*/
			/*--------------------------------------------------------------*/
			// Layout Footer
			$wp_customize->add_setting('soundbax_footer_logo_url', array(
				'default'        	=> TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png',
				'sanitize_callback' => 'esc_url_raw',
				'type' 				=> 'theme_mod'
			));
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'soundbax_footer_logo_url', array(
		        'label'    			=> esc_html__( 'Logo', 'wdsoundbox' ),
		        'section'  			=> 'soundbax_footer_config',
		        'settings' 			=> 'soundbax_footer_logo_url',
		    )));
		    
 			$wp_customize->add_setting('soundbax_footer_layout', array(
        		'default' 			=> -1,
        		'sanitize_callback' => 'soundbax_sanitize_text',
       			'capability' 		=> 'edit_theme_options'		
        	));
	  		$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'soundbax_footer_layout',array(
            	'label'          	=> esc_html__( 'Select the layout', 'wdsoundbox' ),
            	'section'        	=> 'soundbax_footer_config',
            	'settings'       	=> 'soundbax_footer_layout',
            	'choices'			=> soundbax_get_html_choices('wpdance_footer_layout',TVLGIAO_WPDANCE_THEME_IMAGES.'/footers/wd_footer_default.jpg','url_image')
        	)));
	  		// Text Copyright 
			$wp_customize->add_setting('soundbax_footer_copyright_text',array(
		    	'default'           => sprintf(__( 'Copyright %s. All rights reserved.', 'wdsoundbox' ), esc_html( get_bloginfo('name')) ),
		    	'sanitize_callback' => 'soundbax_sanitize_html'
			));
    
    		$wp_customize->add_control('soundbax_footer_copyright_text_control',array(
            	'label'         	=> esc_html__( 'Footer copyright text', 'wdsoundbox' ),
            	'settings'      	=> 'soundbax_footer_copyright_text',
            	'section'       	=> 'soundbax_footer_config',
            	'type'          	=> 'textarea',
            	'description'   	=> esc_html__( 'Copyright or other text to be displayed in the site footer. HTML allowed.', 'wdsoundbox' )
        	));
		}
	}
	add_action('customize_register','soundbax_customize_footer' );
?>