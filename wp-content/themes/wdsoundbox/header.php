<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @since wpdance
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>"/>

	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
<header id="header" class="header">
	<div class="hidden-xs hidden-sm"><?php do_action('soundbax_header_init_action'); ?></div>
	<div class="header-mobile visible-xs visible-sm"><?php do_action('soundbax_menu_mobile') ?></div>
</header> <!-- END HEADER  -->
<div>
	<div class="popup">
	    <div class="wrapper-popup">
	       <div class="video-frame">
	       <div class="video-content">
	        <iframe src="#"  allowFullScreen>
	            <p><?php echo esc_html__(' Your browser does not support iframes.','wdsoundbox' ); ?></p>
	        </iframe>
			<div class="close">X</div>
		   </div>
		   </div>
	    </div>
	</div>
	<div class="popup_container_video"></div>