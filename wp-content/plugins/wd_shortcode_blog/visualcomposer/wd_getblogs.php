<?php 
	vc_map(array(
			"name"=>__("Block 1",'wpdanceestut'),
			"base"=>"wd_getblogs",
			"class"=>"td_block_trending_now",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			'icon' => 'icon-pagebuilder-td_block_trending_now',
			"params"=>array(
				array(
					"type"=>"textfield",
					"heading"=>__("Limit",'wpdanceestut'),
					"param_name"=>"posts_per_page",
					"value"=>'5',
					"description"=>__("",'wpdanceestut'),
					),				
				array(
					"type"=>"textfield",
					"heading"=>__("Columns",'wpdanceestut'),
					"param_name"=>"columns",
					"value"=>'2',
					"description"=>__("",'wpdanceestut'),
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
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Show pagination", 'wpnoone'),
					"admin_label" => true,
					"param_name" => "show_pages",
					"value" => array(
							'Yes' => '1',
							'No' => '0'
						),
					"description" => ''
					),
				)

			)
	);
?>