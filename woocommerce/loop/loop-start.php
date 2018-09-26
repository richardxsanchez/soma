<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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

if (get_theme_mod('shop_type', '2') == '1') {
	$soma_shop_class = 'basic';
} else {
	$soma_shop_class = 'creative';
}

// Offset
if (get_theme_mod('shop_offset', '2') == '1' && get_theme_mod('shop_metro', '2') != '1') {
	switch (get_theme_mod('shop_columns', '1')) {
		case '1':
			$soma_shop_class .= ' offset-two_columns';
			break;
		default:
			$soma_shop_class .= ' offset-three_columns';
			break;
		case '3':
			$soma_shop_class .= ' offset-four_columns';
			break;
	}
}

?>
<div class="row masonry <?php echo esc_attr($soma_shop_class) ?>" data-masonry-id="archive-products">