<?php 
	vc_map(array(
			"name"=>__("Block 3(masonry)",'wpdanceestut'),
			"base"=>"tvlg_block_masonry",
			"class"=>"tvlg_block_masonry",
			"category"=>__("WPDance Blogs",'wpdanceestut'),
			'icon' => 'icon-pagebuilder-tvlg_block_masonry',
			"params"=>array(				
				array(
					"type"=>"textfield",
					"heading"=>__("Columns",'wpdanceestut'),
					"param_name"=>"columns",
					"value"=>'4',
					"description"=>__("",'wpdanceestut'),
					),	
				)
			)
	);
?>