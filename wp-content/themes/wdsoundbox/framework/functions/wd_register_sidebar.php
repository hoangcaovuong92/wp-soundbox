<?php
	if(!function_exists ('soundbax_register_sidebar')){
		function soundbax_register_sidebar(){
			register_sidebar(array(
		        'name' 				=> esc_html__('Sidebar', 'wdsoundbox'),
		        'id' 				=> 'sidebar',
		        'description'   	=> esc_html__( 'Main sidebar that appears on the left.', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Right Sidebar', 'wdsoundbox'),
		        'id' 				=> 'sidebar_left',
		        'description'   	=> esc_html__( 'Left Side Bar', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Left Sidebar Product', 'wdsoundbox'),
		        'id' 				=> 'left_sidebar_prodct',
		        'description'   	=> esc_html__( 'Left Sidebar Product', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Right Sidebar Product', 'wdsoundbox'),
		        'id' 				=> 'right_sidebar_prodct',
		        'description'   	=> esc_html__( 'Right Sidebar Product', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Instagram', 'wdsoundbox'),
		        'id' 				=> 'instagram',
		        'description'   	=> esc_html__( 'Instagram Sidebar', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Header Information', 'wdsoundbox'),
		        'id' 				=> 'header_info',
		        'description'   	=> esc_html__( 'Header Information', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Footer Information', 'wdsoundbox'),
		        'id' 				=> 'footer_info',
		        'description'   	=> esc_html__( 'Footer Information', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Widget Sidebar Footer 1 Default', 'wdsoundbox'),
		        'id' 				=> 'footer_top_01',
		        'description'   	=> esc_html__( 'Footer Top 01', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Widget Sidebar Footer 2 Default', 'wdsoundbox'),
		        'id' 				=> 'footer_top_02',
		        'description'   	=> esc_html__( 'Footer Top 02', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		     register_sidebar(array(
		        'name' 				=> esc_html__('Widget Sidebar Footer 3 Default', 'wdsoundbox'),
		        'id' 				=> 'footer_top_03',
		        'description'   	=> esc_html__( 'Footer Top 03', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		      register_sidebar(array(
		        'name' 				=> esc_html__('Widget Sidebar Footer 4 Default', 'wdsoundbox'),
		        'id' 				=> 'footer_top_04',
		        'description'   	=> esc_html__( 'Footer Top 04', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		      register_sidebar(array(
		        'name' 				=> esc_html__('Widget Sidebar Footer 5', 'wdsoundbox'),
		        'id' 				=> 'footer_top_05',
		        'description'   	=> esc_html__( 'Footer Top 05', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		      register_sidebar(array(
		        'name' 				=> esc_html__('Widget Sidebar Footer 6', 'wdsoundbox'),
		        'id' 				=> 'footer_top_06',
		        'description'   	=> esc_html__( 'Footer Top 06', 'wdsoundbox' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		}
	}
	//Register Sidebar
	add_action('widgets_init', 'soundbax_register_sidebar');
?>