<?php 
	$product_category = array();
	$product_category[esc_html__('Select Category','wdoutline')] = -1;
	if( class_exists('WooCommerce') ){
		$categories = 	get_terms( 'product_cat', 
									array('hide_empty' 	=> 0)
								 );
		foreach ($categories as $category ) {
			$product_category[$category->slug] = $category->term_id;
		}
		wp_reset_postdata();
	}
	vc_map(array(
			"name"				=> esc_html__("Category Product By Name",'wpdance'),
			"base"				=> 'tvlgiao_wpdance_category_by_name',
			'description' 		=> esc_html__("Category product by name", 'wpdance'),
			"category"			=> esc_html__("WPDance",'wpdance'),
			"params"=>array(	
				array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Select Category', 'wdoutline' )
					,'param_name' 	=> 'id_category'
					,'admin_label' 	=> true
					,'value' 		=> $product_category
					,'description' 	=> ''
				)
				,array(
					'type' 			=> "attach_image",
					'class' 		=> "",
					'heading' 		=> esc_html__("Background Image", 'wdoutline'),
					'param_name' 	=> "image_url",
					'value' 		=> "",
					'description' 	=> 'Background Category Image',
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