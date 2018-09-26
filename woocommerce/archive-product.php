<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.4.0
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

global $soma_data_wow_seconds, $soma_shop_sidebar, $soma_shop_offset, $soma_shop_type;

$soma_shop_offset = get_theme_mod('shop_offset', '2');
$soma_shop_columns = get_theme_mod('shop_columns', '1');
$soma_data_wow_seconds = 0;

$soma_shop_breadcrumb = get_theme_mod('shop_breadcrumb', '1');
$soma_shop_result_count = get_theme_mod('shop_result_count', '1');
$soma_shop_orderby = get_theme_mod('shop_orderby', '1');

// Type
$soma_shop_type = get_theme_mod('shop_type', '2');

// Type Helper
get_template_part('includes/helpers/type-helper');

if ($soma_shop_type == '1') {
	$soma_shop_class = 'basic';
} else {
	$soma_shop_class = 'creative';
}

// Sidebar
$soma_shop_sidebar = get_theme_mod('shop_sidebar', '1');

// Sidebar helper
get_template_part('includes/helpers/sidebar-helper');

if ($soma_shop_sidebar == '2' && $soma_shop_breadcrumb == '2') {
	$soma_shop_top_bar_columns = 'col-12';
} else {
	$soma_shop_top_bar_columns = 'col-sm-6';
}

// Spacing
$soma_shop_spacing = get_theme_mod('shop_spacing');
$soma_shop_spacing_range = get_theme_mod('shop_spacing_range', '48');
if ($soma_shop_spacing == true && $soma_shop_spacing_range) {
	if ($soma_shop_offset == '1') {
		switch ($soma_shop_columns) {
			case '1':
				soma_generate_custom_css_footer('.offset-two_columns .selector:nth-child(2) { padding-top: '. ($soma_shop_spacing_range/12)*2 .'rem }');
				break;
			case '2':
				soma_generate_custom_css_footer('.offset-three_columns .selector:nth-child(1), .offset-three_columns .selector:nth-child(3) { padding-top: '. ($soma_shop_spacing_range/12)*2 .'rem }');
				break;
			case '3':
				soma_generate_custom_css_footer('.offset-four_columns .selector:nth-child(1), .offset-four_columns .selector:nth-child(4) { padding-top: '. ($soma_shop_spacing_range/12)*2 .'rem }');
				break;
		}
	}
	soma_generate_custom_css_footer('.woocommerce .masonry { margin-left: -'. $soma_shop_spacing_range/12 .'rem; margin-right: -'. $soma_shop_spacing_range/12 .'rem; } .woocommerce .masonry .product {padding-left: '. $soma_shop_spacing_range/12 .'rem; padding-right: '. $soma_shop_spacing_range/12 .'rem; padding-bottom: '. ($soma_shop_spacing_range/12)*2 .'rem; }');
} elseif ($soma_shop_spacing == true && $soma_shop_spacing_range == 0) {
	soma_generate_custom_css_footer('.woocommerce .masonry { margin-left: 0; margin-right: 0; } .woocommerce .masonry .product {padding-left: 0; padding-right: 0; padding-bottom: 0; }');
} 

if (is_single()) {
	$soma_shop_class = 'creative';
}

// Offset Helper
get_template_part('includes/helpers/offset-helper');

// Offset
if ($soma_shop_offset == '1' && get_theme_mod('shop_metro', '2') != '1') {
	switch ($soma_shop_columns) {
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
<div class="container">
	<div class="text-align_center padding-top_lg padding-bottom_xl">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="heading-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
		<?php 
			// Archive Description
			do_action('woocommerce_archive_description');
		?>
	</div>
	<?php if ($soma_shop_sidebar != '2' || $soma_shop_breadcrumb != '2' || $soma_shop_result_count != '2' || $soma_shop_orderby != '2') : ?>
		<div class="woocommerce-top_bar row d-flex align-items-center">
			<?php if ($soma_shop_sidebar != '2' || $soma_shop_breadcrumb != '2') : ?>
				<div class="<?php echo esc_attr($soma_shop_top_bar_columns) ?>">
					<div class="top-bar_left d-flex justify-content-between justify-content-sm-start align-items-center">
						<?php if($soma_shop_sidebar != '2' && is_active_sidebar('shop-sidebar')) : ?>
							<a href="#" class="sidebar-open_button">
								<div class="line"></div>
							</a>
						<?php  
							endif;

							// WooCommerce Breadcrumb
							if ($soma_shop_breadcrumb == '1') {
								$args = array(
									'delimiter' => '<span>/</span>'
								);
								woocommerce_breadcrumb($args); 
							}
						?>
					</div>
				</div>
			<?php 
				endif;
				if ($soma_shop_result_count != '2' || $soma_shop_orderby != '2') :
			?>
				<div class="<?php echo esc_attr($soma_shop_top_bar_columns) ?>">
					<div class="top-bar_right d-flex justify-content-end align-items-center">
						<?php do_action('woocommerce_before_shop_loop'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php
		endif;

		if ( have_posts() ) {
	?>
		<div class="shop">
			<div class="row masonry <?php echo esc_attr($soma_shop_class) ?>" data-masonry-id="archive-products">
				<?php
					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							do_action('woocommerce_shop_loop');
							
							wc_get_template_part('content', 'product');

							$soma_data_wow_seconds = $soma_data_wow_seconds + 2;
							if ($soma_data_wow_seconds == 10) {
								$soma_data_wow_seconds = 0;
							}
						}
					}
				?>
			</div>
			<?php 
				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' ); 
			?>
		</div>
	<?php if($soma_shop_sidebar != '2' && is_active_sidebar('shop-sidebar')) : ?>
		<div class="soma-overlay" id="woo-sidebar_overlay"></div>
		<div class="woo-sidebar fixed-lateral left item-delay_off">
			<div class="hide-scrollbar">
				<div class="inner-hide_scrollbar">
					<div class="woo-sidebar_padding">
						<a href="#" class="sidebar-close_button"><?php echo esc_html__('Close', 'soma') ?></a>
						<?php get_sidebar('shop'); ?>
					</div>
				</div>
			</div>
		</div>
	<?php 
		endif; 
		
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}
	?>
</div>
<?php

get_footer();