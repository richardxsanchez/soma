<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Type
$soma_shop_type = get_theme_mod('shop_type', '1');

// Columns
$soma_shop_columns = get_theme_mod('shop_columns', '1');
if (is_tax()) {
	$soma_shop_orderby = soma_inherit_option('product_taxonomy_columns', 'shop_columns', '1', true); 
}

switch ($soma_shop_columns) {
	case '1':
		$soma_shop_item_class = 'col-sm-6';	
		break;
	default:
		$soma_shop_item_class = 'col-sm-6 col-md-4';	
		break;
	case '3':
		$soma_shop_item_class = 'col-sm-6 col-md-3';	
		break;
}

if (is_single()) {
	$soma_shop_item_class = 'col-sm-6 col-md-4';
	$soma_shop_type = '1';
}

?>
<div <?php post_class('selector' . ' ' . $soma_shop_item_class); ?> data-id="<?php the_ID(); ?>">
	<?php 
		if ($soma_shop_type == '2') {
			get_template_part('templates/shop/shop-creative');
		} else {
			get_template_part('templates/shop/shop-basic');
		}
	?>
</div>
