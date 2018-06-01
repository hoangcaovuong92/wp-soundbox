<?php 
	vc_map(array(
			"name"=>__("Feedburner",'wpdanceestut'),
			"base"=>"wd_feedburner",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			"params"=>array(
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'wpthepilot'),
					"param_name" => "title",
					"value" => esc_html__("newletter", 'wpthepilot'),
					"description" => ""
					),
				array(
					"type"=>"textfield",
					"heading"=>__("Enter your Feedburner ID",'wpdanceestut'),
					"param_name"=>"feedburner",
					"value"=>'wpdance',
					"description"=>__("",'wpdanceestut'),
					),				
				)

			)
	);
?>