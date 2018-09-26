<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.1
 */

global $wp_query, $paged, $soma_shop_pagination;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$soma_shop_pagination = get_theme_mod('shop_pagination', '1');
if (is_tax()) {
	$soma_shop_pagination = soma_inherit_option('product_taxonomy_pagination', 'shop_pagination', '1', true); 
}
$soma_show_more_text = __('Show More', 'soma');

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}

// Pagination Helper
get_template_part('includes/helpers/pagination-helper');

if ($soma_shop_pagination == '1') :
?>
	<nav class="pagination">
		<?php soma_pagination($wp_query->max_num_pages, 999); ?>
	</nav>
<?php 
elseif ($wp_query->max_num_pages > $paged) :
?>
	<div class="button-holder load-more_button text-align_center">
		<button class="button normal light-blue shadow load-more-posts">
			<span data-text="<?php echo esc_html($soma_show_more_text) ?>"><?php echo esc_html($soma_show_more_text) ?></span>
		</button>
	</div>
<?php
endif;