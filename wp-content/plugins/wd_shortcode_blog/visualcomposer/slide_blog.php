<?php 
	vc_map(array(
			"name"=>__("Slide Blogs",'wpdanceestut'),
			"base"=>"tvlg_slide_blog",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			"params"=>array(
				array(
					"type"=>"textfield",
					"heading"=>__("Limit",'wpdanceestut'),
					"param_name"=>"per_page",
					"value"=>'8',
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
				)

			)
	);
?>