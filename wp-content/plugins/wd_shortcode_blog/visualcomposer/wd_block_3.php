<?php 
	vc_map(array(
			"name"=>__("Block 3",'wpdanceestut'),
			"base"=>"tvlg_block_3",
			"class"=>"tvlg_block_3",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			'icon' => 'icon-pagebuilder-tvlg_block_3',
			"params"=>array(				
				array(
					"type"=>"textfield",
					"heading"=>__("Limit",'wpdanceestut'),
					"param_name"=>"posts_per_page",
					"value"=>'8',
					"description"=>__("",'wpdanceestut'),
					),
				array(
					"type"=>"textfield",
					"heading"=>__("Columns",'wpdanceestut'),
					"param_name"=>"columns",
					"value"=>'1',
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