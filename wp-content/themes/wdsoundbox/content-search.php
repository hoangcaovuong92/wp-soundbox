<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage wdsoundbox
 * @since wdsounbox 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="seach_content">
		<div class="wd_link_home">
			<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home','wdsoundbox'); ?></a>
		</div>
		<div class="content_title">
			<h3> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
		</div>

		<div class="content_author">
			<span><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php echo get_the_date(); ?></a></span>
			<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo esc_html__('Post By:','wdsoundbox').' '.get_the_author(); ?></a></span>
			<span><?php comments_number( '0 comment', '1 comment', '% comment' ); ?></span>

		</div>

		<div class="clear"></div>

		<div class="seach_excerpt"><?php echo get_the_excerpt( ); ?></div>
		<div class="read-more"><a class='button' title='<?php echo esc_html__('Read More','wdsoundbox'); ?>' href="%s" rel="bookmark"><?php echo esc_html__('Read More','wdsoundbox'); ?></a></div>
		<?php if ( 'post' === get_post_type() ) : ?>

		<div class="entry-footer">
			<div class="wd_content_tag"><?php echo get_the_tag_list('<p>'.esc_html__("Tags:","wdsoundbox" ).'',', ','</p>'); ?></div>
			<?php $category_list = get_the_category_list(__( ', ', 'wdsoundbox' )); ?>
			<?php if($category_list): ?>
			<div class="wd_content_category"><?php echo esc_html__('Category :' ,'wdsoundbox' ).wp_kses_post($category_list ); ?></div>
			<?php endif;?>

		</div>

		<?php endif; ?>
	</div>
</article><!-- #post-## -->


