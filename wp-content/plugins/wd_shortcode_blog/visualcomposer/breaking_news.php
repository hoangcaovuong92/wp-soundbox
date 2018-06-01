<?php 
	vc_map(array(
			"name"=>__("Breaking News",'wpdanceestut'),
			"base"=>"wd_breaking_news",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			"params"=>array(				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'wpthepilot'),
					"param_name" => "title",
					"value" => esc_html__("Breaking New", 'wpthepilot'),
					"description" => ""
					),
				array(
					"type" => "wd_taxonomy",
					"taxonomy" => "category",
					"class" => "",
					"heading" => __("Category", "wpdance"),
					"admin_label" => true,
					"param_name" => "category",
					"value" => "",
					"description" => ""
					),
				array(
					"type"=>"textfield",
					"heading"=>__("Limit Blogs",'wpdanceestut'),
					"param_name"=>"posts_per_page",
					"value"=>'5',
					"description"=>__("",'wpdanceestut'),
					),
				)
			)
	);
?>