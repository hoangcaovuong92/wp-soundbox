<?php
/**
 * EW Social Widget
 */
if(!class_exists('WP_Widget_Ew_subscriptions')){
	class WP_Widget_Ew_subscriptions extends WP_Widget {

		function __construct() {
			$widgetOps = array('classname' => 'widget_subscriptions', 'description' => esc_html__('Display Subscriptions Form','wdsoundbox'));
			$controlOps = array('width' => 400, 'height' => 550);
			parent::__construct('ew_subscriptions', esc_html__('WD - Feedburner Subscriptions','wdsoundbox'), $widgetOps, $controlOps);
		}

		function widget( $args, $instance ) {
			extract($args);
			$title = esc_attr($instance['title']);
			$title = (strlen($title) <= 0 ? '' : $title);
			
			$intro_text = $instance['intro_text'];
			
			$button_text = isset($instance['button_text']) ? esc_attr($instance['button_text']) : "";
			$button_text = (strlen($button_text) <= 0 ? '' : $button_text);
			
			$feedburner_id = $instance['feedburner_id'];
			$feedburner_id = (strlen($feedburner_id) <= 0 ? 'wdsoundbox' : $feedburner_id);
			
			echo wp_kses_post($before_widget);
			echo wp_kses_post($before_title . $title . $after_title);
			?>
			
			<div class="subscribe_widget">

					
				<?php echo ($intro_text)? '<div class="newsletter">'.wp_kses_post($intro_text).'</div>':'' ?>			
				<div class="subscribe_form">
					<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_attr($feedburner_id); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<p class="subscribe-email"><input type="text" name="email" placeholder='Put Enter your email' class="subscribe_email" value="" data-default="<?php esc_html_e('Put Enter your email','wdsoundbox');?>" /></p>
						<input type="hidden" value="<?php echo esc_attr($feedburner_id);?>" name="uri"/>
						<input type="hidden" value="<?php echo get_bloginfo( 'name' );?>" name="title"/>
						<input type="hidden" name="loc" value="en_US"/>
						<button class="button" type="submit" title="Subscribe"><?php echo esc_html($button_text ); ?></button>
						<p style="display:none;">Delivered by <a href="<?php echo "http://www.feedburner.com"; ?>" target="_blank">FeedBurner</a></p>
					</form>
				</div>
			</div>
			<?php
			echo wp_kses_post($after_widget);
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;		
			$instance['title'] = $new_instance['title'];
			$instance['intro_text'] =  $new_instance['intro_text'];
			$instance['button_text'] =  $new_instance['button_text'];
			$instance['feedburner_id'] =  $new_instance['feedburner_id'];		
			return $instance;
		}

		function form( $instance ) { 
			$instance = wp_parse_args( (array) $instance, array( 'title' => 'Sign up for Our Newsletter', 
																 'intro_text' => 'A newsletter is a regularly distributed publication generally', 
																 'button_text' => '',
																 'feedburner_id' => 'WpComic-Manga' ) );
			$title = $instance['title'];
			$intro_text = $instance['intro_text'];
			$button_text = $instance['button_text'];
			$feedburner_id = format_to_edit($instance['feedburner_id']);		
		?>
			<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter your title','wdsoundbox'); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('intro_text')); ?>"><?php esc_html_e('Enter your Intro Text','wdsoundbox'); ?> : </label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('intro_text')); ?>" name="<?php echo esc_attr($this->get_field_name('intro_text')); ?>" value="<?php echo esc_attr($intro_text); ?>" /></p>
			<p><label for="<?php echo esc_attr($this->get_field_id('button_text')); ?>"><?php esc_html_e('Enter your Button','wdsoundbox'); ?> : </label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('button_text')); ?>" value="<?php echo esc_attr($button_text); ?>" /></p>
			<p><label for="<?php echo esc_attr($this->get_field_id('feedburner_id')); ?>"><?php esc_html_e('Enter your Feedburner ID','wdsoundbox'); ?> : </label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('feedburner_id')); ?>" name="<?php echo esc_attr($this->get_field_name('feedburner_id')); ?>" value="<?php echo esc_attr($feedburner_id); ?>" /></p>		
			<?php }
	}
}

register_widget("WP_Widget_Ew_subscriptions" );

