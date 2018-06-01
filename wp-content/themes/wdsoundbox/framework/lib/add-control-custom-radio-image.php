<?php
/**
 * Customizer: Add Control: Custom: Radio Image
 *
 * This file demonstrates how to add a custom radio-image control to the Customizer.
 * 
 * @package code-examples
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */
 
/**
 * Theme Options Customizer Implementation
 *
 * Implement the Theme Customizer for Theme Settings.
 *
 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 *
 * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
 */
function theme_slug_register_customizer_control_custom_radio_image( $wp_customize ){
	/*
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	/**
	 * Create a Radio-Image control
	 * 
	 * This class incorporates code from the Kirki Customizer Framework and from a tutorial
	 * written by Otto Wood.
	 * 
	 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
	 * is licensed under the terms of the GNU GPL, Version 2 (or later).
	 * 
	 * @link https://github.com/reduxframework/kirki/
	 * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
	 */
	class Theme_Slug_Custom_Radio_Image_Control extends WP_Customize_Control {
		
		/**
		 * Declare the control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'radio-image';
		
		/**
		 * Enqueue scripts and styles for the custom control.
		 * 
		 * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
		 * 
		 * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
		 * at 'customize_controls_print_styles'.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-button' );
		}
		
		/**
		 * Render the control to be displayed in the Customizer.
		 */
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo esc_attr($this->id); ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr($this->id) . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo esc_attr($this->id) . $value; ?>">
							<img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo esc_attr($this->id); ?>"]' ).buttonset(); });</script>
			<?php
		}
	}
}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_control_custom_radio_image' );

/**
 * Add CSS for custom controls
 *
 * This function incorporates CSS from the Kirki Customizer Framework
 *
 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
 * is licensed under the terms of the GNU GPL, Version 2 (or later)
 *
 * @link https://github.com/reduxframework/kirki/
 */
function theme_slug_customizer_custom_control_css() {  ?>
	<style>
		.customize-control-radio-image .ui-button {
	    	margin:        0;
	    	border-radius: 0;
	    	border:        none;
	   		background:    transparent;
			height: auto;
			margin-bottom:20px;
		}
		.customize-control-radio-image .ui-button-text { padding: 0; }
		.customize-control-radio-image img {
		    box-sizing: border-box;
		    max-width:  100%;
		    height:     auto;
		    padding:    1px;
		    border:     4px solid transparent;
		}
	    .customize-control-radio-image img:hover,
	    .customize-control-radio-image img:focus {
	        border-color: #ddd;
	    }
	    .customize-control-radio-image .ui-state-active img {
	        border-color: #00a0d2;
	    }
	    .customize-control-radio-image label{
	    	padding-right: 5px;
	    	padding-left: 5px;
			margin-bottom: 50px;
	    }
	    .customize-control-select select{
	    	width: 100%;
	    }

	</style>
<?php }
add_action( 'customize_controls_print_styles', 'theme_slug_customizer_custom_control_css' );