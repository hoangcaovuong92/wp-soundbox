<?php
if (class_exists( 'Easy_Digital_Downloads' ) ){
	class soundbax_widget_download extends WP_Widget {

		function __construct() {
			$widget_ops = array( 'classname' => 'widget_recent_download', 'description' => esc_html__( "WD_Download",'wdsoundbox' ) );
			parent::__construct('recent_download', esc_html__('WD - DOWNLOAD','wdsoundbox'), $widget_ops);
		}
	
		function widget( $args, $instance ) {
			global $posts, $post;

			if ( ! isset( $args['widget_id'] ) )
				$args['widget_id'] = $this->id;

			extract($args);
			$output = '';
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( '','wdsoundbox' ) : $instance['title'], $instance, $this->id_base );
			echo '<div class="downloads_widget">';
			echo '<h2 class="widget-title">'.esc_html($title ).'</h2>';
			if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
				$number = 5;
			echo do_shortcode('[downloads number = "'.$number.'" columns="1" order="'.$instance['order'].'" orderby="'.$instance['orderby'].'" pagination="false" price="'.$instance['show_price'].'" thumbnail="'.$instance['show_thumbnail'].'" excerpt="'.$instance['show_excerpt'].'" author="'.$instance['show_author'].'"]');
			echo '</div>';
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] 			= esc_attr($new_instance['title']);
			$instance['number'] 		= $new_instance['number'];
			$instance['orderby'] 		= $new_instance['orderby'];
			$instance['order'] 		    = $new_instance['order'];
			$instance['show_thumbnail'] = $new_instance['show_thumbnail'];
			$instance['show_author'] 	= $new_instance['show_author'];
			$instance['show_excerpt'] 	= $new_instance['show_excerpt'];
			$instance['show_price'] 	    = $new_instance['show_price'];
			return $instance;
		}

		function form( $instance ) {
			$instance_default = array(
									'title' 			=> ''
									,'number' 			=> 5
									,'orderby'		    => 'orderby'
									,'order'			=> 'order'
									,'show_thumbnail' 	=> 'true'
									,'show_author' 		=> 'no'
									,'show_excerpt'		=> 'no'
									,'show_price'		=> 'yes'
									);
			$instance = wp_parse_args( (array) $instance, $instance_default );
			$instance['title'] = esc_attr($instance['title']);
			$data_show = array('date' =>'post_date',
								'price' =>'price',
								'title' =>'title',
								'id'  => 'id',
								'random'=>'random',
								'post in'=>'post__in',
								'sale' => 'sale',
							);
			$style_show = array('DESC'=>'DESC','ASC'=>'ASC');
			?>
			<p><label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php esc_html_e('Title','wdsoundbox'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" name="<?php echo esc_attr( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $instance['title']); ?>" /></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts to show','wdsoundbox'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('number')); ?>" name="<?php echo esc_attr( $this->get_field_name('number')); ?>" type="number" min="1" max="999" value="<?php echo esc_attr( $instance['number']); ?>" /></p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('orderby')); ?>"><?php esc_html_e('Orderby','wdsoundbox'); ?></label>
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('orderby')); ?>" id="<?php echo esc_attr($this->get_field_id('orderby')); ?>">
					<?php foreach( $data_show as $key => $value ){ ?>
					<option value="<?php echo esc_attr($key); ?>" <?php echo ($instance['orderby']==$value)?'selected':'' ?> ><?php echo esc_attr($key); ?></option>
					<?php } ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('order')); ?>"><?php esc_html_e('Order','wdsoundbox'); ?></label>
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('order')); ?>" id="<?php echo esc_attr($this->get_field_id('order')); ?>">
					<?php foreach( $style_show as $key => $value ){ ?>
					<option value="<?php echo esc_attr($key); ?>" <?php echo ($instance['order']==$key)?'selected':'' ?> ><?php echo esc_attr($value); ?></option>
					<?php } ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('show_thumbnail')); ?>"><?php esc_html_e('Show Thumbnail','wdsoundbox'); ?></label>
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('show_thumbnail')); ?>" id="<?php echo esc_attr($this->get_field_id('show_thumbnail')); ?>">
					<option value="true" <?php echo ($instance['show_thumbnail']==='true')?'selected':'' ?> ><?php esc_html_e('True','wdsoundbox'); ?></option>
					<option value="false" <?php echo ($instance['show_thumbnail']==='false')?'selected':'' ?> ><?php esc_html_e('True','wdsoundbox'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('show_author')); ?>"><?php esc_html_e('Show Author','wdsoundbox'); ?></label>
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('show_author')); ?>" id="<?php echo esc_attr($this->get_field_id('show_author')); ?>">
					<option value="no" <?php echo ($instance['show_author']==='no')?'selected':'' ?> ><?php esc_html_e('No','wdsoundbox'); ?></option>
					<option value="yes" <?php echo ($instance['show_author']==='yes')?'selected':'' ?> ><?php esc_html_e('Yes','wdsoundbox'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('show_excerpt')); ?>"><?php esc_html_e('Show Excerpt','wdsoundbox'); ?></label>
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('show_excerpt')); ?>" id="<?php echo esc_attr($this->get_field_id('show_excerpt')); ?>">
					<option value="no" <?php echo ($instance['show_excerpt']==='no')?'selected':'' ?> ><?php esc_html_e('No','wdsoundbox'); ?></option>
					<option value="yes" <?php echo ($instance['show_excerpt']==='yes')?'selected':'' ?> ><?php esc_html_e('Yes','wdsoundbox'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('show_price')); ?>"><?php esc_html_e('Show Price','wdsoundbox'); ?></label>
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('show_price')); ?>" id="<?php echo esc_attr($this->get_field_id('show_price')); ?>">
					<option value="no" <?php echo ($instance['show_price']==='no')?'selected':'' ?> ><?php esc_html_e('No','wdsoundbox'); ?></option>
					<option value="yes" <?php echo ($instance['show_price']==='yes')?'selected':'' ?> ><?php esc_html_e('Yes','wdsoundbox'); ?></option>
				</select>
			</p>
		<?php }
	}
	register_widget( 'soundbax_widget_download');
}
?>