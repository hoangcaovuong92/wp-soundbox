<?php
	$default_logo 	= TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo_mobile.png';
	$logo_url	  	= get_theme_mod('soundbax_header_logo_url_mobile', $default_logo); 
?>
<div class="wd_header_background wd-header-top">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'header_info' ) ) : ?>
				<div class="wd-header-info">
					<?php dynamic_sidebar( 'header_info' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>		
<div class="wd-header-bottom">
	<div class="container">
		<div class="wd-header-bottom__logo">
			<div class="wd-header-logo">
				<a href="<?php  echo esc_url(home_url());?>">
					<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
				</a>
			</div>
		</div>
		<!-- after header -->
		<div class="wd-header-bottom__menu">
			<div class="wd-header-menu">
				<a class="menu-bars"><i class="fa fa-bars fa-2x"></i></a>
				<div class="pushmenu-left">
					<a class="menu-bars"><i class="fa fa-times fa-2x"></i></a>
					<?php
						if( has_nav_menu( 'primary_mobile' ) ){ 
							wp_nav_menu( array( 'container_class' => 'mobile-main-menu toggle-menu','theme_location' => 'primary_mobile' ) ); 
						}
						else{
							wp_nav_menu( array( 'container_class' => 'mobile-main-menu toggle-menu','menu_class' => 'nav navbar-nav responsive-nav main-nav-list', 'theme_location' => 'primary' ) ); 
						}
					?>
				</div>
			</div>
			<div class="mobile-seach">
				<?php get_search_form(); ?>
			</div>
			<div class="wd-header-cart">
					<?php if(wdsoundbax_checkplugin_download()): ?>
						<?php echo do_shortcode( '[tvlgiao_wpdance_download_cart]' ); ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
</div>