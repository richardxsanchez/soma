<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>
<div class="row padding-top_md padding-bottom_xl">

	<div class="padding-bottom_sm col-12">
		<h1 class="margin-bottom_0 heading-title text-align_center"><?php echo esc_html__('My Account', 'soma') ?></h1>
	</div>

	<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
		<form method="post" class="woocommerce-ResetPassword lost_reset_password">
			<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'soma' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-wide">
				<label for="user_login"><?php esc_html_e( 'Username or email', 'soma' ); ?></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" />
			</p>

			<?php do_action( 'woocommerce_lostpassword_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<input type="hidden" name="wc_reset_password" value="true" />
				<button type="submit" class="woocommerce-Button button shadow normal light-blue" value="<?php esc_attr_e( 'Reset password', 'soma' ); ?>"><span><?php esc_html_e( 'Reset password', 'soma' ); ?></span></button>
			</p>

			<?php wp_nonce_field( 'lost_password' ); ?>
		</form>
	</div>

</div>
