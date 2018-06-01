<?php
	$blog_category = array();
	$blog_category[esc_html__('All Category','wdoutline')] = -1;
	$categories = 	get_terms( 'category', 
								array('hide_empty' 	=> 0)
							 );
	foreach ($categories as $category ) {
		$blog_category[$category->slug] = $category->term_id;
	}
	wp_reset_postdata();

	vc_map(array(
			"name"				=> esc_html__("Special Gird/List Blog",'wpdance'),
			"base"				=> 'tvlgiao_wpdance_special_gird_list_blog',
			'description' 		=> esc_html__("Special Gird/List Blog", 'wpdance'),
			"category"			=> esc_html__("WPDance",'wpdance'),
			"params"=>array(	
				array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Select Category', 'wdoutline' )
					,'param_name' 	=> 'id_category'
					,'admin_label' 	=> true
					,'value' 		=> $blog_category
					,'description' 	=> ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Data Show', 'wpdance' )
					,'param_name' 	=> 'data_show'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Recent Blog'		=> 'recent_blog'
							,'Most View Blog'	=> 'mostview_blog'
							,'Most Comment'		=> 'comment_blog'
						)
					,'description' => ''
				)
				,array(
					'type'			=> 'textfield'
					,'heading' 		=> esc_html__( 'Number of blogs', 'wdoutline' )
					,'param_name' 	=> 'number_blogs'
					,'admin_label' 	=> true
					,'value' 		=> '12'
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show thumbnail or Show slider/audio/video...', 'wpdance' )
					,'param_name' 	=> 'show_data_image_slider'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Show Thumbnail'		=> '1'
							,'Show slider/ audio/ video...'	=> '0'
						)
					,'description' => ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show Gird/List', 'wpdance' )
					,'param_name' 	=> 'show_gird_list'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Show Gird'		=> 'gird'
							,'Show List'	=> 'list'
						)
					,'description' => ''
				)
				,array(
					"type" 			=> "dropdown",
					"class" 		=> "",
					"heading" 		=> esc_html__("Large / Small ", 'wdoutline'),
					"admin_label" 	=> true,
					"param_name" 	=> "list_style",
					'value' 		=> array(
							'Large'		=> 'large'
							,'Small'	=> 'small'
						),
					"description" 	=> "",
					'dependency'  	=> Array('element' => "show_gird_list", 'value' => array('list'))
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Sort By', 'wpdance' )
					,'param_name' 	=> 'sort'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Date'		=> 'date'
							,'Name'		=> 'name'
							,'Slug'		=> 'slug'
						)
					,'description' => ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Order By', 'wpdance' )
					,'param_name' 	=> 'order_by'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'DESC'		=> 'DESC'
							,'ASC'		=> 'ASC'
						)
					,'description' => ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Columns', 'wpdance' )
					,'param_name' 	=> 'columns'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'1 Columns'		=> '1'
							,'2 Columns'	=> '2'
							,'3 Columns'	=> '3'
							,'4 Columns'	=> '4'
						)
					,'description' => ''
				)
				,array(
					'type' 			=> 'textfield'
					,'heading' 		=> esc_html__( 'Number of excerpt words', 'wdoutline' )
					,'param_name' 	=> 'excerpt_words'
					,'admin_label' 	=> true
					,'value' 		=> '20'
					,'description' 	=> ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show Pagination Or Load More', 'wdoutline' )
					,'param_name' 	=> 'pagination_loadmore'
					,'admin_label' 	=> true
					,'value' 	=> array(
							'Pagination'	=> '1'
							,'Load More'	=> '0'
							,'No Show'		=> '2'
						)
					,'description' 	=> ''
				)
				,array(
					"type" 			=> "textfield",
					"class" 		=> "",
					"heading" 		=> esc_html__("Number blogs Load More", 'wdoutline'),
					"admin_label" 	=> true,
					"param_name" 	=> "number_loadmore",
					"value" 		=> '8',
					"description" 	=> "",
					'dependency'  	=> Array('element' => "pagination_loadmore", 'value' => array('0'))
				)
				,array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> esc_html__("Extra class name", 'woocommerce'),
					'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'woocommerce'),
					'admin_label' 	=> true,
					'param_name' 	=> 'class',
					'value' 		=> ''
				)
			)
		)
	);
?>