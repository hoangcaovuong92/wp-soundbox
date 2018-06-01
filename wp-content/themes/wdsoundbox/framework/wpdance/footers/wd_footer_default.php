<?php
	$default_logo 	= TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png';
	$logo_url	  	= get_theme_mod('soundbax_footer_logo_url', $default_logo); 
	$copyright = get_theme_mod('soundbax_footer_copyright_text',esc_html__('Copyright CodeSpot. All rights reserved.','wdsoundbox'));
?>
<div class="wd-footer-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-24">
				<div class="wd-footer-logo">
					<a href="<?php  echo esc_url(home_url());?>">
						<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-sm-8">
				<div class="wd-footer-info">
					<div class="col-sm-12">
						<?php if ( is_active_sidebar( 'footer_top_01' ) ) : ?>
							<?php dynamic_sidebar( 'footer_top_01' ); ?>
						<?php endif; ?>
					</div>
					<div class="col-sm-12">
						<?php if ( is_active_sidebar( 'footer_top_02' ) ) : ?>
							<?php dynamic_sidebar( 'footer_top_02' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<?php if ( is_active_sidebar( 'footer_top_03' ) ) : ?>
					<div class="wd-footer-info">
						<?php dynamic_sidebar( 'footer_top_03' ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-8">
				<?php if ( is_active_sidebar( 'footer_top_04' ) ) : ?>
					<div class="wd-footer-instagram">
						<?php dynamic_sidebar( 'footer_top_04' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="wd-footer-bottom">
	<div class="container">
		<div class="row">
			<div class="wd-footer-info">
				<?php echo esc_attr($copyright); ?>
			</div>
			<div class="wd-footer-">

			</div>
		</div>
	</div>
</div>
