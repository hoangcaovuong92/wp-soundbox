<?php 
	vc_map(array(
			"name"=>__("WD Get Video Blogs",'wpdanceestut'),
			"base"=>"wd_getvideoblogs",
			"class"=>"",
			"category"=>__("WPDance Elements",'wpdanceestut'),
			"params"=>array(
				array(
					"type" => "textfield",
					"heading" => __("Title", 'wpdance'),
					"param_name" => "title",
					"value" => __("", 'wpdance'),
					"description" => ""
				),
				array(
					"type"=>"textfield",
					"heading"=>__("Limit",'wpdanceestut'),
					"param_name"=>"per_page",
					"value"=> "3",
					"description"=>__("",'wpdanceestut'),
					),
				
				)

			)
	);
?>