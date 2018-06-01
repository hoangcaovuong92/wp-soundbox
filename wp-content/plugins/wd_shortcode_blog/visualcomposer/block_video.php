<?php 
	vc_map(array(
			"name"=>__("Block Video",'wpdanceestut'),
			"base"=>"wd_getvideoblock",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			"params"=>array(
				array(
					"type"=>"textfield",
					"heading"=>__("Limit",'wpdanceestut'),
					"param_name"=>"per_page",
					"value"=>'5',
					"description"=>__("",'wpdanceestut'),
					),				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Style", 'wpdancemestyle'),
					"admin_label" => true,
					"param_name" => "style",
					"value" => array(
						"Style 1" => "style1",
						"Style 2" => "style2",
						"Style 3" => "style3",
						"Style 4" => "style4"
					),
					"description" => '',
					),
				)

			)
	);
?>