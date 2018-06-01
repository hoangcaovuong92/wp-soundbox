<?php
	function soundbax_get_product_availability($product) {
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}	
		$availability = $class = "";

		if ( $product->managing_stock() ) {
			if ( $product->is_in_stock() ) {

				if ( $product->get_total_stock() > 0 ) {

					$format_option = get_option( 'woocommerce_stock_format' );

					switch ( $format_option ) {
						case 'no_amount' :
							$format = esc_html__( 'In stock', 'wdsoundbox' );
						break;
						case 'low_amount' :
							$low_amount = get_option( 'woocommerce_notify_low_stock_amount' );

							$format = ( $product->get_total_stock() <= $low_amount ) ? esc_html__( 'Only %s left in stock', 'wdsoundbox' ) : esc_html__( 'In stock', 'wdsoundbox' );
						break;
						default :
							$format = esc_html__( '%s in stock', 'wdsoundbox' );
						break;
					}

					$availability = sprintf( $format, $product->get_stock_quantity() );
					$class = 'in-stock';

					if ( $product->backorders_allowed() && $product->backorders_require_notification() )
						$availability .= ' ' . esc_html__( '(backorders allowed)', 'wdsoundbox' );

				} else {

					if ( $product->backorders_allowed() ) {
						if ( $product->backorders_require_notification() ) {
							$availability = esc_html__( 'Available on backorder', 'wdsoundbox' );
							$class        = 'available-on-backorder';
						} else {
							$availability = esc_html__( 'In stock', 'wdsoundbox' );
						}
					} else {
						$availability = esc_html__( 'Out of stock', 'wdsoundbox' );
						$class        = 'out-of-stock';
					}

				}

			} elseif ( $product->backorders_allowed() ) {
				$availability = esc_html__( 'Available on backorder', 'wdsoundbox' );
				$class        = 'available-on-backorder';
			} else {
				$availability = esc_html__( 'Out of stock', 'wdsoundbox' );
				$class        = 'out-of-stock';
			}
		} elseif ( ! $product->is_in_stock() ) {
			$availability = esc_html__( 'Out of stock', 'wdsoundbox' );
			$class        = 'out-of-stock';
		} elseif ( $product->is_in_stock() ){
			$availability = esc_html__( 'In stock', 'wdsoundbox' );
			$class        = 'in-stock';		
		}

		return apply_filters( 'woocommerce_get_availability', array( 'availability' => $availability, 'class' => $class ), $product );
	}
	
?>