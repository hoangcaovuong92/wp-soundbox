<?php
	if(!function_exists ('soundbax_customize_font')){
		function soundbax_customize_font($wp_customize){
			/*--------------------------------------------------------------*/
			/*					 CUSTOM STYLING OPTION						*/
			/*--------------------------------------------------------------*/
		    $wp_customize->add_panel( 'soundbax_font_config', array(
		        'title' 			=> esc_html__( 'Font Setting', 'wdsoundbox' ),
		        'description' 		=> esc_html__( 'Custom font in website.', 'wdsoundbox'),
		        'priority' 			=> 42,
		    ));

 			//---------------------------------------------------------------//
 			//Content Config Site
 			//Background Color
 			global $wd_google_fonts;
			$xml_file 			= 'font_config';
			$objXML_font 		= simplexml_load_file(TVLGIAO_WPDANCE_THEME_WPDANCE."/config_xml/".$xml_file.".xml");
			foreach ($objXML_font->children() as $child) {	 				//items_setting => general
				$title 			= (string)$child->title;
				$section 		= (string)$child->section;
				$description 	= (string)$child->description;
				$wp_customize->add_section( $section , array(
	 				'title'       		=> $title,
	 				'description' 		=> $description,
	 				'panel'	 			=> 'soundbax_font_config',
 				));	
				foreach ($child->items->children() as $childofchild) { 		//items => item
					$name 	 =  (string)$childofchild->name;					//name
					$slug 	 =  (string)$childofchild->slug; 				//slug
					$std 	 =  (string)$childofchild->std; 					//std
					$control =  (string)$slug."_control";
					$wp_customize->add_setting( $slug , array(
						'default'           =>  $std,
						'sanitize_callback' => 'soundbax_sanitize_text',
						'capability' 		=> 'edit_theme_options'
					));
					$wp_customize->add_control( $control , array(
						'label'   			=> $name,
						'section'  			=> $section,
						'settings' 			=> $slug,
						'type'    			=> 'select',
						'choices' 			=> $wd_google_fonts,
					));
				}
			}			
		}
	}
	add_action('customize_register','soundbax_customize_font' );
?>