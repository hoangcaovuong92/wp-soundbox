<?php $item_prop = edd_add_schema_microdata() ? ' itemprop="name"' : ''; ?>
<h3<?php echo esc_html($item_prop); ?> class="edd_download_title title2">
	<span><?php echo get_the_author(); ?></span>
</h3>
