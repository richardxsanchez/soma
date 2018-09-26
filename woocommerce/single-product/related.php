<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $soma_data_wow_seconds;
$soma_data_wow_seconds = 0;

if ( $related_products ) : ?>


	<section class="related-products">

		<div class="container">
			
			<h6 class="text-align_center wow fadeInNeuron"><?php esc_html_e( 'Related products', 'soma' ); ?></h6>

			<div class="masonry row creative">

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
						$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object );

						wc_get_template_part( 'content', 'product' ); 
						
						$soma_data_wow_seconds = $soma_data_wow_seconds + 2;
						if ($soma_data_wow_seconds == 10) {
							$soma_data_wow_seconds = 0;
						}
					?>

				<?php endforeach; ?>

			</div>

		</div>

	</section>


<?php endif;

wp_reset_postdata();
