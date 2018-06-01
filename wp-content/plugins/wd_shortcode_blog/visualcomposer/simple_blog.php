<?php

// **********************************************************************// 

// ! Register New Element: WD Recent Simple Blogs

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Recent Simple Blogs
// **********************************************************************//

$recent_simple_blogs_params = array(
	"name" => __("Recent Simple Blogs", 'wpdance'),
	"base" => "wd_recent_simple_blogs",
	"icon" => "icon-wpb-wpdance",
	"category" => __('WPDance Blogs', 'wpdance'),
	"params" => array(
		// Heading
		array(
			"type" => "wd_simple_post",
			"class" => "",
			"heading" => __("Name Post", 'wpdance'),
			"admin_label" => true,
			"param_name" => "slug_simple",
			"value" => "",
			"description" => ''
		),
	)
);
vc_map( $recent_simple_blogs_params );
?>