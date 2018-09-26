<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<div class="shopping-bag_holder d-flex flex-column">
		<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
			<?php
				do_action( 'woocommerce_before_mini_cart_contents' );

				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
						$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
						$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<li class="woocommerce-mini-cart-item d-flex align-items-center <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
							<?php if ( ! $_product->is_visible() ) : ?>
								<a class="cart-item_image" href="<?php echo esc_url( $product_permalink ); ?>">
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
								</a>
								<div class="cart-name_quantity mr-auto">
									<a href="<?php echo esc_url( $product_permalink ); ?>">
										<h6><?php echo esc_attr($product_name); ?></h6>
									</a>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</div>
							<?php else : ?>
								<a class="cart-item_image" href="<?php echo esc_url( $product_permalink ); ?>">
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
								</a>
								<div class="cart-name_quantity mr-auto">
									<a href="<?php echo esc_url( $product_permalink ); ?>">
										<h6><?php echo esc_attr($product_name); ?></h6>
									</a>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</div>
							<?php endif; ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'soma' ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</li>
						<?php
					}
				}

				do_action( 'woocommerce_mini_cart_contents' );
			?>
		</ul>

		<div class="cart-total_buttons">
			<div class="woocommerce-mini-cart__total total d-flex align-items-center">
				<h6><?php _e( 'Subtotal', 'soma' ); ?>:</h6>
				<span class="ml-auto price"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
			</div>

			<?php //do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

			<div class="woocommerce-mini-cart__buttons buttons d-flex justify-content-between"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></div>
		</div>
	</div>

<?php else : ?>
	<div class="d-flex align-items-center justify-content-center empty-message_holder">
		<div class="empty-message-inner_holder text-aling_center">
			<div class="empty-message_icon text-align_center">
				<svg xmlns="http://www.w3.org/2000/svg" width="799" height="800" viewBox="0 0 799 800"> 
				<metadata></metadata><path class="cls-1" d="M401,0C180.44,0,1,179.44,1,400S180.44,800,401,800,801,620.56,801,400,621.56,0,401,0Zm0,756.756A356.952,356.952,0,0,1,44.244,400C44.244,203.284,204.284,43.244,401,43.244A356.858,356.858,0,0,1,757.756,400C757.756,596.716,597.716,756.756,401,756.756Zm76.355-264.882a148.986,148.986,0,0,1,100.228,21.9l23.185-36.5a192.3,192.3,0,0,0-129.359-28.23c-72.25,10.038-133.612,61.308-156.326,130.621l41.095,13.465A150.034,150.034,0,0,1,477.355,491.874Zm-209.689-221.6a43.244,43.244,0,1,1-43.244,43.243A43.242,43.242,0,0,1,267.666,270.269Zm267.571,0a43.244,43.244,0,1,1-43.244,43.243A43.242,43.242,0,0,1,535.237,270.269Z" transform="translate(-1)"/></svg>
			</div>
			<h3 class="woocommerce-mini-cart__empty-message "><?php _e( 'No products in the bag.', 'soma' ); ?></h3>
		</div>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
