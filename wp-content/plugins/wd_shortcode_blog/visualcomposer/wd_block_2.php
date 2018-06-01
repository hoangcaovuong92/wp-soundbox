<?php 
	vc_map(array(
			"name"=>__("Block 2",'wpdanceestut'),
			"base"=>"tvlg_block_2",
			"class"=>"tvlg_block_2",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			'icon' => 'icon-pagebuilder-tvlg_block_2',
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
					"heading"=>__("Limit Excerpt Words",'wpdanceestut'),
					"param_name"=>"short_limit",
					"value"=>'8',
					"description"=>__("",'wpdanceestut'),
					),	
				)
			)
	);
?>