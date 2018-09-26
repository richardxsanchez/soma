<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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

$soma_shop_orderby = get_theme_mod('shop_orderby', '1');
if (is_tax()) {
	$soma_shop_orderby = soma_inherit_option('product_taxonomy_orderby', 'shop_orderby', '1', true); 
}

if ($soma_shop_orderby != '2') :
?>
	<form class="woocommerce-orderby" method="get">
		<div class="dropdown">
			<a href="#" id="dropdown-button">
				<?php 
					if ($orderby) {
						foreach ($catalog_orderby_options as $id => $name) {
							if ($id == $orderby) {
								echo esc_attr($name);
							} 
						}
					} else {
						echo reset($catalog_orderby_options);
						$orderby = 'popularity';
					}
				?>
				<span class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 16 20"> 
						<metadata>
							<x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01 "> 
							<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"> 
								<rdf:Description rdf:about=""/> 
							</rdf:RDF></x:xmpmeta> 
						</metadata>
						<path id="arrow_down" data-name="arrow down" class="cls-1" d="M7,1.008V16.594L1.707,11.3A1,1,0,1,0,.293,12.715l7,7a1,1,0,0,0,1.414,0l7-7A1,1,0,0,0,14.293,11.3L9,16.594V1.008A1,1,0,0,0,7,1.008Z"/>
					</svg>
				</span>
			</a>
			<div class="submenu">
				<input type="hidden" name="orderby" id="orderby-input">
				<ul class="orderby">
					<?php foreach ($catalog_orderby_options as $id => $name) : ?>
						<li data-value="<?php echo esc_attr($id) ?>">
							<a <?php echo ($id == $orderby ? ' class="active"' : ''); ?>>
								<?php echo esc_html($name); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<input type="hidden" name="paged" value="1" />
		<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
	</form>
<?php
endif;