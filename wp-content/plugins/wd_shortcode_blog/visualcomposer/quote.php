<?php

// **********************************************************************// 

// ! Register New Element: WD Quote

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Quote
// **********************************************************************//

$quote_params = array(
	"name" => __("Quote", 'wpdancemestyle'),
	"base" => "wd_quote",
	"icon" => "icon-wpb-wpdance",
	"category" => __('WPDance Elements', 'wpdancemestyle'),
	"params" => array(
	
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Custom class", 'wpdancemestyle'),
			"admin_label" => true,
			"param_name" => "class",
			"value" => '',
			"description" => '',
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
				"Style 4" => "style4",
				"Style 5" => "style5"
			),
			"description" => '',
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Content", 'wpdancemestyle'),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => '',
		),
		
	)
);
vc_map( $quote_params );
?>