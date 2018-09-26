<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
	exit; // Exit if accessed directly
}

global $product, $soma_data_wow_seconds, $soma_shop_selector_class, $soma_shop_type, $soma_shop_metro;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Type
$soma_shop_type = get_theme_mod('shop_type', '2');

// Columns
$soma_shop_columns = get_theme_mod('shop_columns', '1');
if (is_tax()) {
	$soma_shop_columns = soma_inherit_option('product_taxonomy_columns', 'shop_columns', '1', true);
	$soma_shop_type = soma_inherit_option('product_taxonomy_type', 'shop_type', '2', true);
}

// Helper
get_template_part('includes/helpers/type-helper');

switch ($soma_shop_columns) {
	case '1':
		$soma_shop_selector_class = 'col-sm-6';	
		break;
	case '2':
		$soma_shop_selector_class = 'col-sm-6 col-xl-4';	
		break;
	case '3':
		$soma_shop_selector_class = 'col-sm-6 col-xl-3';	
		break;
}

// Helper
get_template_part('includes/helpers/columns-helper');

// Metro
$soma_shop_metro = get_theme_mod('shop_metro', '2');

// Metro Helper
get_template_part('includes/helpers/metro-helper');

if ($soma_shop_metro == '1' && !is_tax()) {
	switch (get_field('product_metro_column')) {
		default:
			$soma_shop_selector_class = 'col-sm-6 col-xl-3';
			break;
		case '2':
			$soma_shop_selector_class = 'col-sm-6 col-lg-4';
			break;
		case '3':
			$soma_shop_selector_class = 'col-sm-5';
			break;
		case '4':
			$soma_shop_selector_class = 'col-sm-6';
			break;
		case '5':
			$soma_shop_selector_class = 'col-sm-7';
			break;
		case '6':
			$soma_shop_selector_class = 'col-sm-8';
			break;
		case '7':
			$soma_shop_selector_class = 'col-sm-9';
			break;
		case '8':
			$soma_shop_selector_class = 'col-sm-10';
			break;
		case '9':
			$soma_shop_selector_class = 'col-sm-11';
			break;
		case '10':
			$soma_shop_selector_class = 'col-12';
			break;
	}
}

// Animation
$soma_shop_item_class = '';
$soma_shop_animation = get_theme_mod('shop_animation', '1');
if (is_tax()) {
	$soma_shop_animation = soma_inherit_option('product_taxonomy_animation', 'shop_animation', '1', true);
}

if ($soma_shop_animation == '2' || $soma_shop_animation == '3') {
    $soma_shop_item_class = 'wow fadeInNeuron';
} elseif ($soma_shop_animation == '4' || $soma_shop_animation == '5') {
    $soma_shop_item_class = 'wow fadeInUpNeuron';
} 

// Wow Delay
$soma_data_wow_delay = 'data-wow-delay="0.'. $soma_data_wow_seconds .'s"';


// Delay in Related Products
if (is_single() || is_cart()) {
	$soma_shop_selector_class = 'col-sm-6 col-lg-4 product-holder'; 
	$soma_shop_animation = '5';
	$soma_shop_type = '2';
	$soma_shop_item_class = 'wow fadeInUpNeuron';
} 
?>
<div <?php post_class('selector' . ' ' . $soma_shop_selector_class); ?> data-id="<?php the_ID(); ?>">
	<div class="<?php echo esc_attr($soma_shop_item_class) ?>" <?php echo !empty($soma_data_wow_seconds) && ($soma_shop_animation == '3' || $soma_shop_animation == '5') ? $soma_data_wow_delay  : ''; ?>>
		<?php 
			if ($soma_shop_type == '2') {
				get_template_part('templates/shop/shop-creative');
			} else {
				get_template_part('templates/shop/shop-basic');
			}
		?>
	</div>
</div>
