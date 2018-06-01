<?php 
	vc_map(array(
			"name"				=> esc_html__("Category Product",'wpdance'),
			"base"				=> 'tvlgiao_wpdance_category_product',
			'description' 		=> esc_html__("category product", 'wpdance'),
			"category"			=> esc_html__("WPDance",'wpdance'),
			"params"=>array(	
				array(
					'type' 			=> 'textfield'
					,'heading' 		=> esc_html__( 'Number of category', 'wpdance' )
					,'param_name' 	=> 'number_posts'
					,'admin_label' 	=> true
					,'value' 		=> '6'
					,'description' 	=> ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Sort By', 'wpdance' )
					,'param_name' 	=> 'sort'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Date'		=> 'term_id'
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
					"type" 			=> "textfield",
					"class"			=> "",
					"heading" 		=> esc_html__("Columns", 'wpdance'),
					"admin_label" 	=> true,
					"param_name" 	=> "columns",
					"value" 		=> '3',
					"description" 	=> "",
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show title', 'wpdance' )
					,'param_name' 	=> 'title'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Yes'	=> '1'
							,'No'	=> '0'
						)
					,'description' => ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show Image Category', 'wpdance' )
					,'param_name'	=> 'thumbnail'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Yes'	=> '1'
							,'No'	=> '0'
						)
					,'description' => ''
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show Readmore', 'wpdance' )
					,'param_name' 	=> 'readmore'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Yes'	=> '1'
							,'No'	=> '0'
						)
					,'description' => esc_html__('Read more', 'wdoutline')
				)
				,array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show meta', 'wpdance' )
					,'param_name' 	=> 'meta'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Yes'	=> '1'
							,'No'	=> '0'
						)
					,'description' => esc_html__('Number product in category', 'wdoutline')
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