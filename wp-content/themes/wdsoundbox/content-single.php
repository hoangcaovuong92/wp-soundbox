<?php
/**
*
* @package WordPress
*
**/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wdsoundbox' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="wd-tag-post">
		<span><?php esc_html_e('Tags: ','wdsoundbox'); ?></span>
		<?php the_tags(esc_html__('', 'wdsoundbox'),esc_html__(', ', 'wdsoundbox')); ?>
	</div>
	<div class="wd-share_list">
		<span><?php esc_html_e('Share ','wdsoundbox'); ?></span>
		<div class="addthis_sharing_toolbox"></div>
	</div>
</article><!-- End Article -->