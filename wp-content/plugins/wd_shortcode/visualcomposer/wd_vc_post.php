<?php 
	vc_map(array(
			"name"=>esc_html__("WD Recent Blogs",'wdance'),
			"base"=>"wd_recent_blogs",
			"class"=>"",
			"category"=>esc_html__("WPDance Elements",'wdance'),
			"params"=>array(
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Style",'wdance'),
					"param_name"=>"style",
					"value"=>array( "horizontal"=>"horizontal" ,"special" => "special"),
					"description"=>esc_html__(" ",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Display Stick Post",'wdance'),
					"param_name"=>"ignore_sticky_posts",
					"value"=>array( "Top"=>"top" ,"Normal" => "normal" ,"Hide"=>"hide"),
					"description"=>esc_html__("Position dispaly Stick Post ",'wdance'),
					),
				array(
					"type"=>"textfield",
					"heading"=>esc_html__("Number Blogs",'wdance'),
					"param_name"=>"per_page",
					"value"=>'-1',
					"description"=>esc_html__(" ",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Show excerpt special",'wdance'),
					"param_name"=>"show_excerpt_special",
					"dependency"		=> array( 'element' => "style", 'value' => 'special' ),
					"value"=>array( "Yes"=>"yes" ,"No" => "no"),
					"description"=>esc_html__("",'wdance'),
					),
				array(
					"type"=>"textfield",
					"heading"=>esc_html__("Number Words",'wdance'),
					"param_name"=>"excerpt_words",
					"value"=>'10',
					"description"=>esc_html__(" ",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("OrderBy",'wdance'),
					"param_name"=>"orderby",
					"value"=>array( "Date"=>"date","Author"=>"author" ,"Title" => "title","Random" => "rand","Comment Count" => "comment_count"),
					
					"description"=>esc_html__("",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Order",'wdance'),
					"param_name"=>"order",
					"value"=>array( "ASC"=>"ASC" ,"DESC" => "DESC"),
					"description"=>esc_html__("",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Show thumbnail",'wdance'),
					"param_name"=>"show_thumbnail",
					"value"=>array( "Yes"=>"yes" ,"No" => "no"),
					"description"=>esc_html__("",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Show Title",'wdance'),
					"param_name"=>"show_title",
					"value"=>array( "Yes"=>"yes" ,"No" => "no"),
					"description"=>esc_html__("",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Show excerpt",'wdance'),
					"param_name"=>"show_excerpt",
					"value"=>array( "Yes"=>"yes" ,"No" => "no"),
					"description"=>esc_html__("",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Show date",'wdance'),
					"param_name"=>"show_date",
					"value"=>array( "Yes"=>"yes" ,"No" => "no"),
					"description"=>esc_html__("",'wdance'),
					),
				array(
					"type"=>"dropdown",
					"heading"=>esc_html__("Show author",'wdance'),
					"param_name"=>"show_author",
					"value"=>array( "Yes"=>"yes" ,"No" => "no"),
					"description"=>esc_html__("",'wdance'),
					),					
				)

			)
	);
?>