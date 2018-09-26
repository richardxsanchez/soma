<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
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
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="woocommerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>

	<div class="row align-items-center">
		<p class="col-sm-6">
			<label for="username"><?php esc_html_e( 'Username or email', 'soma' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="username" id="username" />
		</p>
		<p class="col-sm-6">
			<label for="password"><?php esc_html_e( 'Password', 'soma' ); ?> <span class="required">*</span></label>
			<input class="input-text" type="password" name="password" id="password" />
		</p>
	</div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<p class="button-holder">
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<button type="submit" class="button shadow normal light-blue" name="login" value="<?php esc_attr_e( 'Login', 'soma' ); ?>"><span><?php esc_html_e( 'Login', 'soma' ); ?></span></button>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
	</p>

	<div class="d-flex align-items-center">
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox d-flex aling-items-center">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox d-flex align-self-center" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'soma' ); ?></span>
		</label>

		<p class="lost_password ml-auto">
			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'soma' ); ?></a>
		</p>
	</div>


	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
