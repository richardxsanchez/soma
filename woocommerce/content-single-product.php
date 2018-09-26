<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

// Related Products
$soma_product_related_products = soma_inherit_option('product_related_products', 'product_related_products', '1');

// Container
$soma_product_container = soma_inherit_option('product_container', 'product_container', '1');
if ($soma_product_container == '2') {
	$soma_product_container_class = 'non-container';
	$soma_product_image_class = 'col-md-6 col-xxl-7';
	$soma_product_info_class = 'col-md-6 col-xxl-5';
} else {
	$soma_product_container_class = 'container';
	$soma_product_image_class = $soma_product_info_class = 'col-xl-6';
}

// Navigation
$soma_product_navigation = soma_inherit_option('product_navigation', 'product_navigation', '1');

// Navigation Category
$soma_product_navigation_category = soma_inherit_option('product_navigation_category', 'product_navigation_category', '2');
if ($soma_product_navigation_category == '1') {
	$soma_product_navigation_category_bool = true;
} else {
	$soma_product_navigation_category_bool = false;
}

// Alignment
$soma_product_alignment = soma_inherit_option('product_content_alignment', 'product_content_alignment', '2');
if ($soma_product_alignment == '1') {
	$soma_product_row_class = 'row flex-row-reverse';
} else {
	$soma_product_row_class = 'row';
}

// Animation
$soma_product_animation = soma_inherit_option('product_content_animation', 'product_content_animation', '1');
if ($soma_product_animation == '2') {
	$soma_product_info_class .= ' wow fadeInNeuron';
} elseif ($soma_product_animation == '3') {
	$soma_product_info_class .= ' wow fadeInUpNeuron';
}

// Sticky
$soma_product_sticky = soma_inherit_option('product_content_sticky', 'product_content_sticky', '2');
if ($soma_product_sticky == '1') {
	$soma_product_info_class .= ' sticky-description';
}

?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="<?php echo esc_attr($soma_product_container_class) ?>">
		<div class="product-holder padding-bottom_md <?php echo esc_attr($soma_product_row_class) ?>">
			<div class="<?php echo esc_attr($soma_product_image_class) ?>">
				<?php
					// Product Images
					woocommerce_show_product_images();
				?>
			</div>
			<div class="<?php echo esc_attr($soma_product_info_class) ?>">
				<div class="single-product_info">
					<div class="d-flex align-items-center breadcrumb-rating">
						<?php
							// Breadcrumb
							$breadcrumb_args = array(
								'delimiter' => '<span>/</span>'
							);
							woocommerce_breadcrumb($breadcrumb_args); 

							// Rating
							woocommerce_template_single_rating();
						?>
					</div>
					<?php
						// Title
						woocommerce_template_single_title();
					
						// Price
						woocommerce_template_single_price();

						// Excerpt
						woocommerce_template_single_excerpt();

						// Add To Cart
						woocommerce_template_single_add_to_cart();

						// Meta
						woocommerce_template_single_meta();

						// Sharing
						woocommerce_template_single_sharing();

						// Data Tabs
						woocommerce_output_product_data_tabs();
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<?php
			// Navigation
			if ($soma_product_navigation == '1') :
		?>
			<div class="navigation">
				<div class="row">
					<div class="col-6 prev">
						<?php previous_post_link('%link', '<h1>'. esc_html__('Prev', 'soma') .'</h1><h6>%title</h6>', $soma_product_navigation_category_bool, '', 'product_cat'); ?>
					</div>
					<div class="col-6 next text-align_right">
						<?php next_post_link('%link', '<h1>'. esc_html__('Next', 'soma') .'</h1><h6>%title</h6>', $soma_product_navigation_category_bool, '', 'product_cat'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php
if ($soma_product_related_products == '1') { 
?>
	<div class="related-upsell_products">
		<?php
			// Upsell products
			woocommerce_upsell_display();
			
			// Related Products
			woocommerce_related_products(apply_filters( 'woocommerce_output_related_products_args', $args = array('posts_per_page' => 3)));
		?>
	</div>
<?php 
}

do_action( 'woocommerce_after_single_product' );
