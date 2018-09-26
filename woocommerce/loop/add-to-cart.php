<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
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

global $product;

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="ajax_add_to_cart %s product_type_%s"><span class="bag-icon">%s</span><span class="checkbox-icon">%s</span><span class="loader-icon rotating">%s</span></a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : 'display-none',
        esc_attr( $product->get_type() ),
        '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24"></metadata> <path id="bag" class="cls-1" d="M14,6V5A5,5,0,1,0,4,5V6H0V21a3,3,0,0,0,3,3H15a3,3,0,0,0,3-3V6H14ZM6,5a3,3,0,0,1,6,0V6H6V5ZM16,21a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V8H16V21Z"/> <rect x="4" y="14" width="10" height="2"/> <rect x="8" y="10" width="2" height="10"/></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14"></metadata> <path id="check" class="cls-1" d="M6.992,13.992A1,1,0,0,1,6.285,13.7l-6-6A1,1,0,0,1,1.7,6.285l5.293,5.293L18.285,0.285A1,1,0,0,1,19.7,1.7l-12,12A1,1,0,0,1,6.992,13.992Z"/></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20"></metadata> <path id="repeat" class="cls-1" d="M24,2V8a1,1,0,0,1-1,1H17a1,1,0,0,1,0-2h3.372c-1.346-1.312-2.408-2.35-2.709-2.65l-0.007-.007a7.993,7.993,0,0,0-11.314,0c-0.067.067-.133,0.135-0.2,0.2A7.932,7.932,0,0,0,4.635,6.872c-0.056.157-.125,0.309-0.181,0.466a1,1,0,0,1-1.887-.661c0.076-.219.161-0.435,0.253-0.647A9.959,9.959,0,0,1,4.683,3.184q0.121-.13.246-0.255A9.959,9.959,0,0,1,10.091.183a10.025,10.025,0,0,1,5.672.549,9.935,9.935,0,0,1,3.309,2.2l0.015,0.015c0.321,0.32,1.476,1.449,2.914,2.85V2A1,1,0,0,1,24,2ZM1,19a1,1,0,0,0,1-1V14.206c1.438,1.4,2.594,2.53,2.914,2.85l0.015,0.015a9.959,9.959,0,0,0,5.162,2.746,10.035,10.035,0,0,0,5.672-.549,9.935,9.935,0,0,0,3.309-2.2q0.126-.125.246-0.255a9.959,9.959,0,0,0,1.863-2.845c0.092-.212.178-0.428,0.253-0.647a1,1,0,0,0-1.887-.661c-0.055.157-.125,0.309-0.181,0.466a8.057,8.057,0,0,1-4.355,4.286,7.993,7.993,0,0,1-8.668-1.758L6.336,15.65c-0.3-.3-1.363-1.338-2.708-2.65H7a1,1,0,0,0,0-2H1a1,1,0,0,0-1,1v6A1,1,0,0,0,1,19Z"/></svg>'
    ),
$product );