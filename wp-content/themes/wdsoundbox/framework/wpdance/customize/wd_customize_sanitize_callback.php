<?php
	//Type: Text
	function soundbax_sanitize_html( $html ) {
	    return wp_filter_post_kses( $html );
	}
	//Type: Radio / Choise / Select
	function soundbax_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
	//Type: Checkbox
	function soundbax_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
?>