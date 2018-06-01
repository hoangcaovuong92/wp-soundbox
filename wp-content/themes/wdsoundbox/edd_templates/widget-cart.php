<?php
/**
 * This template is used to display the Downloads cart widget.
 */
$cart_items    = edd_get_cart_contents();
$cart_quantity = edd_get_cart_quantity();
?>
<div class="container_header_cart widget_edd_cart_widget">
<p class="edd-cart-number-of-items_custom"><a href="javascript:void(0)" class='header_cart'><?php _e( 'Cart', 'wdsoundbox' ); ?><span class="edd-cart-quantity"><?php echo esc_html($cart_quantity); ?></span></a></p>
<ul class="edd-cart">
<?php if( $cart_items ) : ?>

	<?php foreach( $cart_items as $key => $item ) : ?>

		<?php echo edd_get_cart_item_template( $key, $item, true ); ?>

	<?php endforeach; ?>

	<?php edd_get_template_part( 'widget', 'cart-checkout' ); ?>

<?php else : ?>

	<?php edd_get_template_part( 'widget', 'cart-empty' ); ?>

<?php endif; ?>
</ul>
</div>
