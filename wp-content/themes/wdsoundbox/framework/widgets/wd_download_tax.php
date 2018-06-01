<?php
if (class_exists( 'Easy_Digital_Downloads') ){
class edd_categories_tags_widget_custom extends WP_Widget {
	/** Constructor */
	function __construct() {
		parent::__construct( 'edd_categories_tags_custom', __( 'Custom Downloads Categories / Tags', 'wdsoundbox' ), array( 'description' => __( 'Display the downloads categories or tags', 'wdsoundbox' ) ) );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		// Set defaults.
		$args['id']           = ( isset( $args['id'] ) ) ? $args['id'] : 'edd_categories_tags_widget';
		$instance['title']    = ( isset( $instance['title'] ) ) ? $instance['title'] : '';
		$instance['taxonomy'] = ( isset( $instance['taxonomy'] ) ) ? $instance['taxonomy'] : 'download_category';

		$title      = apply_filters( 'widget_title', $instance['title'], $instance, $args['id'] );
		$tax        = $instance['taxonomy'];
		$count      = isset( $instance['count'] ) && $instance['count'] == 'on' ? 1 : 0;
		$hide_empty = isset( $instance['hide_empty'] ) && $instance['hide_empty'] == 'on' ? 1 : 0;

		echo wp_kses_post($args['before_widget']);

		if ( $title ) {
			echo wp_kses_post($args['before_title'] . $title . $args['after_title']);
		}

		do_action( 'edd_before_taxonomy_widget' );

		echo "<ul class=\"edd-taxonomy-widget ".$tax."\">\n";
			wp_list_categories( 'title_li=&taxonomy=' . $tax . '&show_count=' . $count . '&hide_empty=' . $hide_empty );
		echo "</ul>\n";

		do_action( 'edd_after_taxonomy_widget' );

		echo wp_kses_post($args['after_widget']);
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['taxonomy']   = strip_tags( $new_instance['taxonomy'] );
		$instance['count']      = isset( $new_instance['count'] ) ? $new_instance['count'] : '';
		$instance['hide_empty'] = isset( $new_instance['hide_empty'] ) ? $new_instance['hide_empty'] : '';
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array(
			'title'         => '',
			'taxonomy'      => 'download_category',
			'count'         => 'off',
			'hide_empty'    => 'off',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'wdsoundbox' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html($instance['title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>"><?php _e( 'Taxonomy:', 'wdsoundbox' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'taxonomy' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>">
				<?php
				$category_labels = edd_get_taxonomy_labels( 'download_category' );
				$tag_labels      = edd_get_taxonomy_labels( 'download_tag' );
				?>
				<option value="download_category" <?php selected( 'download_category', $instance['taxonomy'] ); ?>><?php echo esc_html($category_labels['name']); ?></option>
				<option value="download_tag" <?php selected( 'download_tag', $instance['taxonomy'] ); ?>><?php echo esc_html($tag_labels['name']); ?></option>
			</select>
		</p>
		<p>
			<label><?php _e( 'Show Count:', 'wdsoundbox' ); ?></label>
			<input <?php checked( $instance['count'], 'on' ); ?> id="<?php echo esc_html($this->get_field_id( 'count' )); ?>" name="<?php echo esc_html($this->get_field_name( 'count' )); ?>" type="checkbox" />
		</p>
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'hide_empty' )); ?>"><?php _e( 'Hide Empty Categories:', 'wdsoundbox' ); ?></label>
			<input <?php checked( $instance['hide_empty'], 'on' ); ?> id="<?php echo esc_html($this->get_field_id( 'hide_empty' )); ?>" name="<?php echo esc_html($this->get_field_name( 'hide_empty' )); ?>" type="checkbox" />
		</p>
	<?php
	}
}
register_widget( 'edd_categories_tags_widget_custom');
}
?>