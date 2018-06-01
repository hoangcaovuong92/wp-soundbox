<?php
# Add shortcode Site Header
vc_map(array(
	'name' 				=> esc_html__("ADD SHORTCODE", 'wpdance'),
	'base' 				=> 'tvlgiao_wpdance_add_shortcode',
	'description' 		=> esc_html__("Use display content of shortcode .The example:[shortcode] ", 'wpdance'),
	'category' 			=> esc_html__("WPDance", 'wpdance'),
	'params' => array(
		array(
			'type' 			=> 'textfield',
			'class' 		=> '',
			'heading' 		=> esc_html__("Class", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'class',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textfield',
			'class' 		=> '',
			'heading' 		=> esc_html__("Id", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'id',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textarea_html',
			'class' 		=> '',
			'heading' 		=> esc_html__("ShortCode", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'content',
			'value' 		=> ''
		)
	)
));
# Add shortcode service
vc_map(array(
	'name' 				=> esc_html__("WD SERVICE", 'wpdance'),
	'base' 				=> 'tvlgiao_wpdance_service',
	'description' 		=> esc_html__("Use display content of service ", 'wpdance'),
	'category' 			=> esc_html__("WPDance", 'wpdance'),
	'params' => array(
		array(
			'type' 			=> 'attach_image',
			'class' 		=> '',
			'heading' 		=> esc_html__("Icon", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'icon',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textfield',
			'class' 		=> '',
			'heading' 		=> esc_html__("Title", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'title',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textarea_html',
			'class' 		=> '',
			'heading' 		=> esc_html__("Content", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'content',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textfield',
			'class' 		=> '',
			'heading' 		=> esc_html__("Button Text", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'button_text',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textfield',
			'class' 		=> '',
			'heading' 		=> esc_html__("Link URL", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'link_url',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textfield',
			'class' 		=> '',
			'heading' 		=> esc_html__("Button Class", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'button_class',
			'value' 		=> ''
		),
		array(
			'type' 			=> 'textfield',
			'class' 		=> '',
			'heading' 		=> esc_html__("class", 'wpdance'),
			'description'	=> esc_html__("", 'wpdance'),
			'admin_label' 	=> true,
			'param_name' 	=> 'class',
			'value' 		=> ''
		),
		
	)
));
