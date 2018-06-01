<?php

/****************************************************************************/
/*							DEFAULT WORDPRESS								*/
/****************************************************************************/
# Add shortcode Site Header
			vc_map(array(
				'name' 				=> esc_html__("Site Header", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_site_header',
				'description' 		=> esc_html__("Display site info (title, tagline, logo...) on the header", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				'params' => array(
					array(
						"type" 			=> "attach_image",
						"class" 		=> "",
						"heading" 		=> esc_html__("Logo Image", 'wpdance'),
						"description" 	=> esc_html__("If you do not want the default logo, you add another logo here", 'wpdance'),
						"param_name" 	=> "custom_logo_url",
						"value" 		=> "",
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));
			# Add Quote
			vc_map(array(
				'name' 				=> esc_html__("Quote", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_quote',
				'description' 		=> esc_html__("Display site info (title, tagline, logo...) on the header", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				"params" 			=> array(
					array(
						"heading" 		=> esc_html__("Style", 'wpdance'),
						"type" 			=> "dropdown",
						"class" 		=> "",
						"admin_label" 	=> true,
						"param_name" 	=> "style",
						"value" => array(
							"Style 1" 	=> "style-1",
							"Style 2" 	=> "style-2",
							"Style 3" 	=> "style-3",
							"Style 4" 	=> "style-4",
							"Style 5" 	=> "style-5"
						),
						"description" 	=> '',
					)
					,array(
						"heading" 		=> esc_html__("Content", 'wpdance'),
						"type" 			=> "textarea_html",
						"class" 		=> "",
						"admin_label" 	=> true,
						"param_name" 	=> "content",
						"value" 		=> "",
						"description" 	=> '',
					)
					,array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)		
				)
			));
			# Add faq
			vc_map(array(
				'name' 				=> esc_html__("FAQ", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_faq',
				'description' 		=> esc_html__("", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				"params" 			=> array(
					/*array(
						"heading" 		=> esc_html__("Style", 'wpdance'),
						"type" 			=> "dropdown",
						"class" 		=> "",
						"admin_label" 	=> true,
						"param_name" 	=> "style",
						"value" => array(
							"Style 1" 	=> "default",
							"Style 2" 	=> "style-2",
							"Style 3" 	=> "style-3",
							"Style 4" 	=> "style-4",
							"Style 5" 	=> "style-5"
						),
						"description" 	=> '',
					)*/
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Question", 'wpdance'),
						'description'	=> esc_html__("", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'question',
						'value' 		=> ''
					)
					,array(
						"heading" 		=> esc_html__("Content", 'wpdance'),
						"type" 			=> "textarea_html",
						"class" 		=> "",
						"admin_label" 	=> true,
						"param_name" 	=> "content",
						"value" 		=> "",
						"description" 	=> '',
					)
							
				)
			));
			# Add shortcode search
			vc_map(array(
				'name' 				=> esc_html__("Search Post", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_search_blog',
				'description' 		=> esc_html__("Search post", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				'params' => array(
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Style", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "style",
						"value" => array(
								'Style 1' => 'style-1',
								'Style 2' => 'style-2'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));
			// Infomation
			vc_map(array(
				'name' 				=> esc_html__("Information", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_information',
				'description' 		=> esc_html__("Display info contact, email, telephone", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				'params' => array(
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Style", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "style",
						"value" => array(
								'Style 1' => 'style-1',
								'Style 2' => 'style-2'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'iconpicker',
						'heading' 		=> esc_html__( 'Icon', 'wpdance' ),
						'param_name' 	=> 'icon_fontawesome',
						'value' 		=> 'fa fa-adjust', 	
						'settings' 		=> array(
							'emptyIcon' 	=> false,
							'iconsPerPage' 	=> 4000,
							),
						'description' 	=> esc_html__( 'Select icon from library.', 'wpdance' )
					),
			        array(
			            "type" 			=> "textarea_html",
			            "holder" 		=> "div",
			            "class" 		=> "",
			            "heading" 		=> esc_html__( "Content", 'wpdance' ),
			            "param_name" 	=> "content",
			            "value" 		=> esc_html__( "I am test text block. Click edit button to change this text.", 'wpdance' ),
			            "description" 	=> esc_html__( "Enter your content.", 'wpdance' )
			        ),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));
			// Special Blog
			vc_map(array(
				'name' 				=> esc_html__("Special Blog", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_special_blog',
				'description' 		=> esc_html__("Display info contact, email, telephone", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				'params' => array(
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Title", 'wpdance'),
						'description' 	=> esc_html__("Title", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'title',
						'value' 		=> ''
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Number Post", 'wpdance'),
						'description' 	=> esc_html__("number", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'number',
						'value' 		=> '6'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Data Show", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "data_post",
						"value" => array(
								'Recent Post' 		=> 'recent-post',
								'Most View Post' 	=> 'most-view'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Style Show", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "style",
						"value" => array(
								'Style 1' 		=> 'style-1',
								'Style 2' 		=> 'style-2'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Thumbnail", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_thumbnail",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Author", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_author",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Date", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_date",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Excerpt", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "excerpt",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Number Excerpt", 'wpdance'),
						'description' 	=> esc_html__("number excerpt", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'number_excerpt',
						'value' 		=> '20'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Readmore", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "read_more",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Is Slider", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "is_slider",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Nav", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_nav",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> "",
						'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Auto Play", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "auto_play",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> "",
						'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Per Slider", 'wpdance'),
						'description' 	=> esc_html__("per slider", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'per_slide',
						'value' 		=> '3',
						'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));

			//Recent Comment
			vc_map( array(
				'name' 				=> esc_html__( 'Recent Comment', 'wpdance' )
				,'base' 			=> 'tvlgiao_wpdance_recent_comment'
				,'category' 		=> esc_html__( 'WPDance', 'wpdance')
				,'params' => array(
					array(
						'type' 			=> 'textfield'
						,'heading' 		=> esc_html__( 'Title', 'wpdance' )
						,'param_name' 	=> 'title'
						,'admin_label' 	=> true
						,'value' 		=> esc_html__("", 'wpdance')
						,'description' 	=> ''
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Limit Word", 'wpdance'),
						'description' 	=> esc_html__("Limit Word", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'number_limit',
						'value' 		=> '20'
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Number Comment", 'wpdance'),
						'description' 	=> esc_html__("number", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'number',
						'value' 		=> '4'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Avata", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_avatar",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Name Author", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_author",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Is Slider", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "is_slider",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Nav", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_nav",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> "",
						'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Auto Play", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "auto_play",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> "",
						'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Per Slider", 'wpdance'),
						'description' 	=> esc_html__("per slider", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'per_slide',
						'value' 		=> '2',
						'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description' 	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));
			//Social Profiles
			vc_map(array(
				'name' 				=> esc_html__("Social Profiles", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_social_profiles',
				'description' 		=> esc_html__("Social Profiles", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				'params' => array(
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Title", 'wpdance'),
						'description' 	=> esc_html__("Title", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'title',
						'value' 		=> ''
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Style Show", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "style",
						"value" => array(
								'Style 1' 		=> 'style-1',
								'Style 2' 		=> 'style-2'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Title Social", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_title",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show RSS", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_rss",
						"value" => array(
								'Show' 		=> '1',
								'Hide' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("RSS ID", 'wpdance'),
						'description' 	=> esc_html__("res id", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'rss_id',
						'value' 		=> '#'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Twitter", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_twitter",
						"value" => array(
								'Show' 		=> '1',
								'Hide' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Twitter ID", 'wpdance'),
						'description' 	=> esc_html__("twitter id", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'twitter_id',
						'value' 		=> '#'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Facebook", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_facebook",
						"value" => array(
								'Show' 		=> '1',
								'Hide' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Facebook ID", 'wpdance'),
						'description' 	=> esc_html__("facebook id", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'facebook_id',
						'value' 		=> '#'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Google", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_google",
						"value" => array(
								'Show' 		=> '1',
								'Hide' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Google ID", 'wpdance'),
						'description' 	=> esc_html__("google id", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'google_id',
						'value' 		=> '#'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Pin", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_pin",
						"value" => array(
								'Show' 		=> '1',
								'Hide' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Pin ID", 'wpdance'),
						'description' 	=> esc_html__("pin id", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'pin_id',
						'value' 		=> '#'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Youtube", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_youtube",
						"value" => array(
								'Show' 		=> '1',
								'Hide' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Youtube ID", 'wpdance'),
						'description' 	=> esc_html__("youtube id", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'youtube_id',
						'value' 		=> '#'
					),
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Instagram", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_instagram",
						"value" => array(
								'Show' 		=> '1',
								'Hide' 		=> '0'
							),
						"description" 	=> ""
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("RSS Instagram", 'wpdance'),
						'description' 	=> esc_html__("instagram id", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'instagram_id',
						'value' 		=> '#'
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));

			//Social Profiles
			vc_map(array(
				'name' 				=> esc_html__("Feedburner Subscriptions", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_feedburner_subscription',
				'description' 		=> esc_html__("Feedburner Subscriptions", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				'params' => array(
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Title", 'wpdance'),
						'description' 	=> esc_html__("Title", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'title',
						'value' 		=> esc_html__("Sign up for Our Newsletter", 'wpdance'),
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Enter your Intro Text", 'wpdance'),
						'description' 	=> esc_html__("Intro text", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'intro_text',
						'value' 		=> esc_html__("A newsletter is a regularly distributed publication generally", 'wpdance'),
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Enter your Button", 'wpdance'),
						'description' 	=> esc_html__("Button Text", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'button_text',
						'value' 		=> esc_html__("Subscribe", 'wpdance'),
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Enter your Feedburner ID", 'wpdance'),
						'description' 	=> esc_html__("", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'feedburner_id',
						'value' 		=> esc_html__("WpComic-Manga", 'wpdance'),
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));
			
			//Pricing Table
			vc_map( array(
				'name' 				=> esc_html__("Pricing Table", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_pricing_table',
				'description' 		=> esc_html__("Pricing Table", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				"params" => array(
					array(
						'type' 			=> 'dropdown'
						,'heading' 		=> esc_html__( 'Style', 'wpdance' )
						,'param_name' 	=> 'style'
						,'admin_label' 	=> true
						,'value' => array(
								'Style 1'	=> 'style-1'
								,'Style 2'	=> 'style-2'
								,'Style 3'	=> 'style-3'
								,'Style 4'	=> 'style-4'
								,'Style 5'	=> 'style-5'
								,'Style 6'	=> 'style-6'
								,'Style 7'	=> 'style-7'
								,'Style 8'	=> 'style-8'
						)
						,'description' 	=> ''
					)
					,array(
						'type' 			=> 'dropdown'
						,'heading' 		=> esc_html__( 'Show image or icon font', 'wpdance' )
						,'param_name' 	=> 'show_icon_font_image'
						,'admin_label' 	=> true
						,'value' => array(
								'Show icon font'	=> '1'
								,'Show Image'		=> '0'
								
							)
						,'description' => ''
					)
					,array(
						'type' 			=> 'iconpicker',
						'heading' 		=> esc_html__( 'Icon font', 'wpdance' ),
						'param_name' 	=> 'class_icon_font',
						'value' 		=> 'fa fa-adjust', 
						'settings' 		=> array(
							'emptyIcon' 	=> false,
							'iconsPerPage' 	=> 4000,
							),
						'description' 	=> esc_html__( 'Select icon from library.', 'wpdance' ),
						'dependency'  	=> Array('element' => "show_icon_font_image", 'value' => array('1'))
					)
					,array(
						"type" 			=> "attach_image",
						"class" 		=> "",
						"heading" 		=> esc_html__("Image Pricing", 'wpdance'),
						"description" 	=> esc_html__("Image pricing", 'wpdance'),
						"param_name" 	=> "image_pricing_url",
						"value" 		=> "",
						'dependency'  	=> Array('element' => "show_icon_font_image", 'value' => array('0'))
					)
					,array(
						"type" 			=> "textfield",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Title", 'wpdance'),
						"param_name" 	=> "title",
						"value" 		=> esc_html__("Basic Plan", 'wpdance'),
						"description" 	=> ""
					)
					,array(
						"type" 			=> "textfield",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Description", 'wpdance'),
						"param_name" 	=> "description",
						"value" 		=> "",
						"description" 	=> ""
					)
					,array(
						"type" 			=> "textfield",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Price", 'wpdance'),
						"param_name" 	=> "price",
						"description" 	=> ""
					)
					,array(
						"type" 			=> "textfield",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Currency", 'wpdance'),
						"param_name" 	=> "currency",
						"description" 	=> ""
					)
					,array(
						"type" 			=> "textfield",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Price Period", 'wpdance'),
						"param_name" 	=> "price_period",
						"description" 	=> ""
					)
					,array(
						"type" 			=> "textfield",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Link", 'wpdance'),
						"param_name" 	=> "link",
						"description" 	=> ""
					)
					,array(
						"type" 			=> "dropdown",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Target", 'wpdance'),
						"param_name" 	=> "target",
						"value" => array(
							"" 				=> "",
							"Self" 			=> "_self",
							"Blank" 		=> "_blank",	
							"Parent" 		=> "_parent"
						),
						"description" => ""
					)
					,array(
						"type" 			=> "textfield",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Button Text", 'wpdance'),
						"param_name" 	=> "button_text",
						"description" 	=> ""
					)
					,array(
						"type" 			=> "dropdown",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Active", 'wpdance'),
						"param_name" 	=> "active",
						"value" => array(
							"No" 			=> "no",
							"Yes" 			=> "yes"	
						),
						"description" 	=> ""
					)
					,array(
						"type" 			=> "textarea_html",
						"holder" 		=> "div",
						"class" 		=> "",
						"heading" 		=> esc_html__("Content", 'wpdance'),
						"param_name" 	=> "content",
						"value" 		=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",
						"description" 	=> ""
					)
				)
			));

			// Banner Image
			vc_map(array(
				'name' 				=> esc_html__("Banner Image", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_banner_image',
				'description' 		=> esc_html__("Banner Image", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				"params" => array(
					array(
						"type" 			=> "attach_image",
						"class" 		=> "",
						"heading" 		=> esc_html__("Background Image", 'wpdance'),
						"param_name" 	=> "bg_image",
						"value" 		=> "",
						"description" 	=> 'Background image banner',
					)
					,array(
						"type" 			=> "textfield",
						"class" 		=> "",
						"heading" 		=> esc_html__("Button text", 'wpdance'),
						"param_name" 	=> "button_text",
						"description" 	=> '',
					)
					,array(
						"type" 			=> "textfield",
						"class" 		=> "",
						"heading" 		=> esc_html__("Link Button", 'wpdance'),
						"param_name" 	=> "link_url",
						"description" 	=> '',
					)
					,array(
						"type" 			=> "textfield",
						"class" 		=> "",
						"heading" 		=> esc_html__("Button class", 'wpdance'),
						"param_name" 	=> "button_class",
						"description" 	=> '',
					)
					,array(
						"type" 			=> "textfield",
						"class" 		=> "",
						"heading" 		=> esc_html__("Top", 'wpdance'),
						"param_name" 	=> "top",
						"description" 	=> esc_html__("ex: 5%", 'wpdance')
					)
					,array(
						"type" 			=> "textfield",
						"class"			=> "",
						"heading" 		=> esc_html__("Right", 'wpdance'),
						"param_name" 	=> "right",
						"description" 	=> esc_html__("ex: 5%", 'wpdance')
					)
					,array(
						"type" 			=> "textfield",
						"class"			=> "",
						"heading" 		=> esc_html__("Bottom", 'wpdance'),
						"param_name" 	=> "bottom",
						"description" 	=> esc_html__("ex: 5%", 'wpdance')
					)
					,array(
						"type" 			=> "textfield",
						"class"			=> "",
						"heading" 		=> esc_html__("Left", 'wpdance'),
						"param_name" 	=> "left",
						"description" 	=> esc_html__("ex: 5%", 'wpdance')
					)
					,array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));

			// Brand Slider
			vc_map(array(
				'name' 				=> esc_html__("Brand Slider", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_brand_slider',
				'description' 		=> esc_html__("Brand Slider", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				"params" => array(
					array(
						"type" 			=> "attach_images",
						"class" 		=> "",
						"heading" 		=> esc_html__("Brand Image", 'wdoutline'),
						"param_name" 	=> "image_url",
						"value" 		=> "",
						"description" 	=> '',
					)
					,array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Nav", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_nav",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> "",
					)
					,array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Auto Play", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "auto_play",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> "",
					)
					,array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));

			// Count Icon
			vc_map(array(
				'name' 				=> esc_html__("Count Icon", 'wpdance'),
				'base' 				=> 'tvlgiao_wpdance_count_icon',
				'description' 		=> esc_html__("Count Icon", 'wpdance'),
				'category' 			=> esc_html__("WPDance", 'wpdance'),
				"params" => array(
					array(
						"type" 			=> "dropdown",
						"class" 		=> "",
						"heading" 		=> esc_html__("Show Icon", 'wpdance'),
						"admin_label" 	=> true,
						"param_name" 	=> "show_icon",
						"value" => array(
								'Yes' 		=> '1',
								'No' 		=> '0'
							),
						"description" 	=> "",
					)
					,array(
						'type' 			=> 'iconpicker',
						'heading' 		=> esc_html__( 'Icon', 'wpdance' ),
						'param_name' 	=> 'icon_fontawesome',
						'value' 		=> 'fa fa-adjust',
						'settings' 		=> array(
							'emptyIcon' 		=> false,
							'iconsPerPage' 		=> 4000,
						),
						'description' 	=> esc_html__( 'Select icon from library.', 'wpdance' ),
					)
					,array(
						"type" 			=> "colorpicker",
						"class" 		=> "",
						"heading" 		=> esc_html__("Color Icon", 'wdoutline'),
						"param_name" 	=> "color_icon",
						"value" 		=> "#cccccc",
						"description" 	=> '',
					)
					,array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Start", 'wpdance'),
						'description'	=> esc_html__("", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'start',
						'value' 		=> ''
					)
					,array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Finish", 'wpdance'),
						'description'	=> esc_html__("", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'finish',
						'value' 		=> ''
					)
					,array(
						"type" 			=> "colorpicker",
						"class" 		=> "",
						"heading" 		=> esc_html__("Color Number", 'wdoutline'),
						"param_name" 	=> "color_number",
						"value" 		=> "#cccccc",
						"description" 	=> '',
					)
					,array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Text Infomation", 'wpdance'),
						'description'	=> esc_html__("", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'text_infomation',
						'value' 		=> ''
					)
					,array(
						"type" 			=> "colorpicker",
						"class" 		=> "",
						"heading" 		=> esc_html__("Color Text", 'wdoutline'),
						"param_name" 	=> "color_text",
						"value" 		=> "#cccccc",
						"description" 	=> '',
					)
					,array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Extra class name", 'wpdance'),
						'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
						'admin_label' 	=> true,
						'param_name' 	=> 'class',
						'value' 		=> ''
					)
				)
			));

			/****************************************************************************/
			/*								WOO WOOCOMERCE								*/
			/****************************************************************************/

			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				# Add shortcode User Links
				vc_map(array(
					'name' 				=> esc_html__("User Links", 'wpdance'),
					'base' 				=> 'tvlgiao_wpdance_user_links',
					'description' 		=> esc_html__("Display user's links (login, logout, register...)", 'wpdance'),
					'category' 			=> esc_html__("WPDance", 'wpdance'),
					'params' => array(
						array(
							'type' 			=> 'dropdown'
							,'heading' 		=> esc_html__( 'Show Title', 'wpdance' )
							,'param_name' 	=> 'show_title'
							,'admin_label' 	=> true
							,'value' => array(
								'Show Text Sign Up / Login'		=> '1',
								'Show Icon User'				=> '0'
							)
							,'description' => esc_html__('Show text or icon', 'wpdance')
						),
						array(
							'type' 			=> 'textfield',
							'class' 		=> '',
							'heading' 		=> esc_html__("Extra class name", 'wpdance'),
							'description' 	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
							'admin_label' 	=> true,
							'param_name' 	=> 'class',
							'value' 		=> ''
						)
					)
				));
				# Add shortcode dropdown cart
				vc_map(array(
					'name' 				=> esc_html__("WooCommerce Dropdown Cart", 'wpdance'),
					'base' 				=> 'tvlgiao_wpdance_dropdowncart',
					'description' 		=> esc_html__("Display the user's Cart in the sidebar.", 'wpdance'),
					'category' 			=> esc_html__("WPDance", 'wpdance'),
					'params' => array(
						array(
							'type' 			=> 'textfield',
							'class' 		=> '',
							'heading' 		=> esc_html__("Extra class name", 'wpdance'),
							'description' 	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
							'admin_label' 	=> true,
							'param_name' 	=> 'class',
							'value' 		=> ''
						)
					)
				));
			} // End Woocommerce



			/****************************************************************************/
			/*						FEATURE BY WOOCOMERCE								*/
			/****************************************************************************/
			if( post_type_exists('feature') || class_exists('Woothemes_Features') ){
				$feature_options = array();
				$args = array(
					'post_type'			=> 'feature'
					,'post_status'		=> 'publish'
					,'posts_per_page' 	=> -1
					);
				$feature_options = tvlgiao_wpdance_vc_get_data($args);
			
				vc_map( array(
					'name' 			=> esc_html__( 'Feature By Woo', 'wpdance' )
					,'base' 		=> 'tvlgiao_wpdance_feature'
					,'category' 	=> esc_html__( 'WD Content', 'wpdance')
					,'params' 		=> array(
						array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Feature ID', 'wpdance' )
							,'param_name' 		=> 'id'
							,'admin_label' 		=> true
							,'value' 			=> $feature_options
							,'description' 		=> ''
						 )
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show thumbnail or icon font', 'wpdance' )
							,'param_name' 		=> 'show_icon_font_thumbnail'
							,'admin_label' 		=> true
							,'value' => array(
									'Show icon font'	=> '1'
									,'Show thumbnail'	=> '0'
									,'Show icon image'	=> '2'
									
								)
							,'description' 		=> ''
						)
						,array(
							"type" 				=> "attach_image",
							"class"				=> "",
							"heading"			=> esc_html__( 'Icon Image', 'wpdance' ),
							"param_name" 		=> "image_url_icon",
							"value" 			=> "",
							"description" 		=> esc_html__( 'Icon Image Feature', 'wpdance' ),
							'dependency'  		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('2'))
						)
						,array(
							'type' 				=> 'iconpicker',
							'heading' 			=> esc_html__( 'Icon', 'wpdance' ),
							'param_name' 		=> 'icon_fontawesome',
							'value' 			=> 'fa fa-adjust',
							'settings' 			=> array(
								'emptyIcon' 		=> false,
								'iconsPerPage' 		=> 4000,
							),
							'description' 		=> esc_html__( 'Select icon from library.', 'wpdance' ),
							'dependency'  		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('1'))
						)
						/*,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Style Font Icon', 'wpdance' )
							,'param_name' 		=> 'style_font'
							,'admin_label' 		=> true
							,'value' => array(
									 'Style Icon 1'			=> 'style-font-1'
									,'Style Icon 2'			=> 'style-font-2'
									,'Style Icon 3'			=> 'style-font-3'
									,'Style Icon 4'			=> 'style-font-4'
									,'Style Icon 5'			=> 'style-font-5'
									,'Style Icon 6'			=> 'style-font-6'
									,'Style Icon 7'			=> 'style-font-7'
									,'Style Icon 8'			=> 'style-font-8'
									,'Style Icon 9'			=> 'style-font-9'
								)
							,'description' 		=> ''
							,'dependency'		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('1'))
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Style Thumbnail', 'wpdance' )
							,'param_name' 		=> 'style_thumbnail'
							,'admin_label' 		=> true
							,'value' => array(
									 'Style Thumbnail 1'	=> 'style-thumbnail-1'
									,'Style Thumbnail 2'	=> 'style-thumbnail-2'
									,'Style Thumbnail 3'	=> 'style-thumbnail-3'
									,'Style Thumbnail 4'	=> 'style-thumbnail-4'
									,'Style Thumbnail 5'	=> 'style-thumbnail-5'
									,'Style Thumbnail 6'	=> 'style-thumbnail-6'
									,'Style Thumbnail 7'	=> 'style-thumbnail-7'
									,'Style Thumbnail 8'	=> 'style-thumbnail-8'
								)
							,'description' 		=> ''
							,'dependency'		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('0'))
						)*/
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show feature title', 'wpdance' )
							,'param_name' 		=> 'title'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Yes'	=> 'yes'
									,'No'	=> 'no'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show excerpt', 'wpdance' )
							,'param_name' 		=> 'excerpt'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Yes'	=> 'yes'
									,'No'	=> 'no'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show Readmore', 'wpdance' )
							,'param_name' 		=> 'readmore'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Yes'	=> 'yes'
									,'No'	=> 'no'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Active', 'wpdance' )
							,'param_name' 		=> 'active'
							,'admin_label' 		=> true
							,'value' => array(
									'No'	=> 'no'
									,'Yes'	=> 'yes'
								)
							,'description' 		=> ''
						),
						array(
							'type' 				=> 'textfield',
							'class' 			=> '',
							'heading' 			=> esc_html__("Extra class name", 'wpdance'),
							'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
							'admin_label' 		=> true,
							'param_name' 		=> 'class',
							'value' 			=> ''
						),
					)
				));
				
				/*$feature_category = array();
				$feature_category[esc_html__('Select Category','wpdance')] = -1;
				$categories = 	get_terms( 'feature-category', 
											array('hide_empty' 	=> 0)
								);
				foreach ($categories as $category ) {		
					$feature_category[$category->slug] = $category->term_id;
				}
				wp_reset_postdata();*/
				vc_map( array(
					'name' 			=> esc_html__( 'Feature By Woo Slider', 'wpdance' )
					,'base' 		=> 'tvlgiao_wpdance_feature_slider'
					,'category' 	=> esc_html__( 'WD Content', 'wpdance')
					,'params' 		=> array(
						array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Style', 'wpdance' )
							,'param_name' 		=> 'feature_style'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Slider'	=> 'feature_slider'
									,'Tab'	    => 'feature_tab'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'textfield',
							'class' 			=> '',
							'heading' 			=> esc_html__("Number Feature", 'wpdance'),
							'description'		=> esc_html__("Number feature", 'wpdance'),
							"dependency"		=> array( 'element' => "feature_style", 'value' => 'feature_slider' ),
							'admin_label' 		=> true,
							'param_name' 		=> 'number',
							'value' 			=> ''
						)
						,array(
							'type' 				=> 'param_feature',
							'class' 			=> '',
							'heading' 			=> esc_html__("ID", 'wpdance'),
							'description'		=> esc_html__("", 'wpdance'),
							"dependency"		=> array( 'element' => "feature_style", 'value' => 'feature_tab' ),
							'admin_label' 		=> true,
							'param_name' 		=> 'feature_list_id',
							'value' 			=> ''
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show feature title', 'wpdance' )
							,'param_name' 		=> 'title'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Yes'	=> 'yes'
									,'No'	=> 'no'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show feature thumbnail', 'wpdance' )
							,'param_name' 		=> 'thumbnail'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Yes'	=> 'yes'
									,'No'	=> 'no'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show excerpt', 'wpdance' )
							,'param_name' 		=> 'excerpt'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Yes'	=> 'yes'
									,'No'	=> 'no'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Show Readmore', 'wpdance' )
							,'param_name' 		=> 'readmore'
							,'admin_label' 		=> true
							,'value' 			=> array(
									'Yes'	=> 'yes'
									,'No'	=> 'no'
								)
							,'description' 		=> ''
						)
						,array(
							'type' 				=> 'textfield',
							'class' 			=> '',
							'heading' 			=> esc_html__("Extra class name", 'wpdance'),
							'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
							'admin_label' 		=> true,
							'param_name' 		=> 'class',
							'value' 			=> ''
						)
					)
				));

			}// End Feature By WooCommerce


			/****************************************************************************/
			/*						TESTIMONIAL	PLUGIN 									*/
			/****************************************************************************/
			if( post_type_exists('testimonial') || class_exists('Woothemes_Testimonials') ){
				$testimonials_options = array();
				$args = array(
						'post_type'			=> 'testimonial'
						,'post_status'		=> 'publish'
						,'posts_per_page' 	=> -1
					);
				$testimonials_options = tvlgiao_wpdance_vc_get_data($args);		
				vc_map( array(
					'name' 			=> esc_html__( 'Testimonials', 'wpdance' )
					,'base' 		=> 'tvlgiao_wpdance_testimonials'
					,'category' 	=> esc_html__( 'WD Content', 'wpdance')
					,'params' 	=> array(
						array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Slider Or One Testimonials', 'wpdance' )
							,'param_name' 		=> 'slider_or_one'
							,'admin_label' 		=> true
							,'value' => array(
									'One Testimonials'	=> '1'
									,'Slider'			=> '0'
									
								)
							,'description' 		=> ''
						)
						,array(
							"type" 				=> "dropdown",
							"class" 			=> "",
							"heading" 			=> esc_html__("Show Nav", 'wpdance'),
							"admin_label" 		=> true,
							"param_name" 		=> "show_nav",
							"value" => array(
									'Yes' 		=> '1',
									'No' 		=> '0'
								),
							"description" 		=> "",
							'dependency'		=> Array('element' => "slider_or_one", 'value' => array('0'))
						)
						,array(
							"type" 				=> "textfield",
							"class" 			=> "",
							"heading" 			=> esc_html__("title", 'wpdance'),
							"admin_label" 		=> true,
							"param_name" 		=> "title",
							"value"				=> "",
							"description" 		=> "",
							'dependency'		=> Array('element' => "slider_or_one", 'value' => array('0'))
						)
						,array(
							"type" 				=> "dropdown",
							"class" 			=> "",
							"heading" 			=> esc_html__("Auto Play", 'wpdance'),
							"admin_label" 		=> true,
							"param_name" 		=> "auto_play",
							"value" => array(
									'Yes' 		=> '1',
									'No' 		=> '0'
								),
							"description" 	=> "",
							'dependency'		=> Array('element' => "slider_or_one", 'value' => array('0'))
						)
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Select Testimonials', 'wpdance' )
							,'param_name' 		=> 'id_testimonial'
							,'admin_label' 		=> true
							,'value' 			=> $testimonials_options
							,'description' 		=> ''
							,'dependency'		=> Array('element' => "slider_or_one", 'value' => array('1'))
						 )
						,array(
							'type' 				=> 'dropdown'
							,'heading' 			=> esc_html__( 'Style', 'wpdance' )
							,'param_name' 		=> 'style_testimonial_class'
							,'admin_label' 		=> true
							,'value' => array(
									 'Style 1'			=> 'style-1'
									,'Style 2'			=> 'style-2'
									/*,'Style 3'			=> 'style-3'
									,'Style 4'			=> 'style-4'
									,'Style 5'			=> 'style-5'*/
								)
							,'description' 		=> ''
							,'dependency'		=> Array('element' => "slider_or_one", 'value' => array('1'))
						)
						,array(
							'type' 				=> 'dropdown',
							'heading' 			=> esc_html__( 'Show Avatar', 'wpdance' ),
							'param_name' 		=> 'show_avatar',
							'admin_label' 		=> true,
							'value' => array(
									'Yes'	=> '1'
									,'No'	=> '0'
								),
							'description' 		=> ''
						)
						,array(
							'type' 				=> 'dropdown',
							'heading' 			=> esc_html__( 'Show Author', 'wpdance' ),
							'param_name' 		=> 'show_author',
							'admin_label' 		=> true,
							'value' => array(
									'Yes'	=> '1'
									,'No'	=> '0'
								),
							'description' => ''
						)
						,array(
							'type' 				=> 'textfield',
							'heading' 			=> esc_html__( 'Number of excerpt words', 'wpdance' ),
							'param_name' 		=> 'number_testimonial',
							'admin_label' 		=> true,
							'value' 			=> '20',
							'description' 		=> ''
						),
						array(
							'type' 				=> 'textfield',
							'class' 			=> '',
							'heading' 			=> esc_html__("Extra class name", 'wpdance'),
							'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
							'admin_label' 		=> true,
							'param_name' 		=> 'class',
							'value' 			=> ''
						)
					)
				));

				vc_map( array(
					'name' 			=> esc_html__( 'Testimonials Tab', 'wpdance' )
					,'base' 		=> 'tvlgiao_wpdance_testimonial_tab'
					,'category' 	=> esc_html__( 'WD Content', 'wpdance')
					,'params' 	=> array(
	
						array(
							'type' 				=> 'param_testimonial'
							,'heading' 			=> esc_html__( 'Select Testimonials', 'wpdance' )
							,'param_name' 		=> 'testimonial_list_id'
							,'admin_label' 		=> true
							,'description' 		=> ''
						 )
						,array(
							'type' 				=> 'dropdown',
							'heading' 			=> esc_html__( 'Show Content', 'wpdance' ),
							'param_name' 		=> 'excerpt',
							'admin_label' 		=> true,
							'value' => array(
									'Yes'	=> '1'
									,'No'	=> '0'
								),
							'description' => ''
						)
						,array(
							'type' 				=> 'dropdown',
							'heading' 			=> esc_html__( 'Show Title', 'wpdance' ),
							'param_name' 		=> 'title',
							'admin_label' 		=> true,
							'value' => array(
									'Yes'	=> '1'
									,'No'	=> '0'
								),
							'description' => ''
						)
						,array(
							'type' 				=> 'dropdown',
							'heading' 			=> esc_html__( 'Show Readmore', 'wpdance' ),
							'param_name' 		=> 'readmore',
							'admin_label' 		=> true,
							'value' => array(
									'Yes'	=> '1'
									,'No'	=> '0'
								),
							'description' => ''
						)
						
						,array(
							'type' 				=> 'textfield',
							'class' 			=> '',
							'heading' 			=> esc_html__("Extra class name", 'wpdance'),
							'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
							'admin_label' 		=> true,
							'param_name' 		=> 'class',
							'value' 			=> ''
						)
					)
				));
			}// End Testimonials By WooCommerce

			if( class_exists('WD_Portfolio') ){
	
	$portfolio_params = array(
		"name" => esc_html__("WD Portfolio", 'wdtheoakwooden'),
		"base" => "wd-portfolio",
		"icon" => "icon-wpb-wpdance",
		"category" => esc_html__('WPDance Elements', 'wdtheoakwooden'),
		"params" => array(
		
			// Heading
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns", 'wdtheoakwooden'),
				"admin_label" => true,
				"param_name" => "columns",
				"value" => '4',
				"description" => '',
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style", 'wdtheoakwooden'),
				"admin_label" => true,
				"param_name" => "portf_style",
				"value" => array(
						'Full Style' => 'full',
						'Wide style' => 'wide'
					),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Title", 'wdtheoakwooden'),
				"admin_label" => true,
				"param_name" => "show_title",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
				"dependency" => Array('element' => "portf_style", 'value' => array('full'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Description", 'wdtheoakwooden'),
				"admin_label" => true,
				"param_name" => "show_desc",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
				"dependency" => Array('element' => "portf_style", 'value' => array('full'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Navigation", 'wdtheoakwooden'),
				"admin_label" => true,
				"param_name" => "show_navi",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Limit", 'wdtheoakwooden'),
				"admin_label" => true,
				"param_name" => "count",
				"value" => '-1',
				"description" => ''
			),
		)
	);
	vc_map( $portfolio_params );

	$portfolio_params = array(
		"name" => esc_html__("WD Portfolio Slider", 'wdtheoakwooden'),
		"base" => "wd-portfolio-carousel",
		"icon" => "icon-wpb-wpdance",
		"category" => esc_html__('WPDance Elements', 'wdtheoakwooden'),
		"params" => array(
		
			// Heading
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Limit", 'wdtheoakwooden'),
				"admin_label" => true,
				"param_name" => "limit",
				"value" => -1,
				"description" => '',
			),
		)
	);
	vc_map( $portfolio_params );

}


		
?>