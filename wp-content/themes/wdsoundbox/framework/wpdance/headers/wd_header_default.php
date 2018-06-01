<?php
	$default_logo 	= TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png';
	$logo_url	  	= get_theme_mod('soundbax_header_logo_url', $default_logo); 
	$sticky_menu 	= get_theme_mod('soundbax_header_sticky_menu'); 
?>
<div class="wd_header_background wd_header">
<div class="wd-header-top">
	<div class="container">
		<div class="row">
			<div class="wd-header-top-content">
				<div class="wd-header-seach ">
					<?php echo soundbox_wpdance_search_post(); ?>
				</div>
				<div class="wd-header-logo">
					<a href="<?php  echo esc_url(home_url());?>">
						<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a>
				</div>
				<div class="wd-header-cart">
					<?php if(wdsoundbax_checkplugin_download()): ?>
						<?php echo do_shortcode( '[tvlgiao_wpdance_download_cart]' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="wd-header-menu">
				<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav responsive-nav main-nav-list')); ?>
			</div>
		</div>
	</div>
</div>
<?php if(!is_home()&&!is_front_page()):?>
<div class="wd-header-bottom">
	<div class="container">
		<div class="row">
			<div class="wd-header-title"><?php echo wdsoundbox_title(); ?></div>
			<div class="wd-header-breadcrumbs"><?php soundbax_dimox_breadcrumbs(); ?></div>
		</div>
	</div>
</div>
<?php endif;//end if home or front page ?>
</div>