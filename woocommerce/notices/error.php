<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

$soma_woocommerce_message_holder = '';
$soma_woocommerce_message_container = '';

if (is_checkout()) {
	$soma_woocommerce_message = 'woocommerce-error';
} else {
	$soma_woocommerce_message_holder = 'message-holder';
	$soma_woocommerce_message_container = 'container';
	$soma_woocommerce_message = 'woocommerce-error';
}
?>
<div class="<?php echo esc_attr($soma_woocommerce_message_holder) ?>">
	<div class="<?php echo esc_attr($soma_woocommerce_message_container) ?>">
		<ul class="<?php echo esc_attr($soma_woocommerce_message) ?>" role="alert">
			<?php foreach ( $messages as $message ) : ?>
				<li><?php echo wp_kses_post( $message ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
