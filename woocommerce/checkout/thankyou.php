<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="padding-top_lg padding-bottom_xl text-align_center checkout-title">
	<h1 class="margin-bottom_0"><?php echo esc_html__('Checkout', 'soma') ?></h1>
</div>

<div class="woocommerce-order padding-bottom_xl">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'soma' ); ?></p>

			<p class="woocommerce-error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'soma' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'soma' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-info justify-content-center margin-bottom_0"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'soma' ), $order ); ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<h6>
						<?php _e( 'Order number:', 'soma' ); ?>
					</h6>
					<p>
						<?php echo esc_html($order->get_order_number()); ?>
					</p>
				</li>

				<li class="woocommerce-order-overview__date date">
					<h6>
						<?php _e( 'Date:', 'soma' ); ?>
					</h6>
					<p>
						<?php echo wc_format_datetime( $order->get_date_created() ); ?>
					</p>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<h6>
							<?php _e( 'Email:', 'soma' ); ?>
						</h6>
						<p>
							<?php echo esc_html($order->get_billing_email()); ?>
						</p>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<h6>
						<?php _e( 'Total:', 'soma' ); ?>
					</h6>
					<p>
						<?php echo wp_kses_post($order->get_formatted_order_total()); ?>
					</p>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<h6>
							<?php _e( 'Payment method:', 'soma' ); ?>
						</h6>
						<p>
							<?php echo wp_kses_post( $order->get_payment_method_title() ); ?>
						</p>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-info"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'soma' ), null ); ?></p>

	<?php endif; ?>

</div>
