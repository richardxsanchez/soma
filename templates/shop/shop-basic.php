<?php

/*
Basic Shop Layout
*/

global $product, $soma_shop_shadow;

$soma_product_holder_class = 'product-holder';

// Shadow
$soma_shop_shadow = get_theme_mod('shop_shadow', '2');
if (is_tax()) {
	$soma_shop_shadow = soma_inherit_option('product_taxonomy_shadow', 'shop_shadow', '2', true); 
}

// Shadow Helper
get_template_part('includes/helpers/shadow-helper');

if ($soma_shop_shadow == '1') {
    $soma_product_holder_class .= ' shadow';
}

// Second Thumbnail
$soma_product_gallery_ids = $product->get_gallery_image_ids();
$soma_product_second_thumbnail = soma_inherit_option('product_second_thumbnail', 'product_second_thumbnail', '2');

if ($soma_product_second_thumbnail == '1' && !empty($soma_product_gallery_ids[0])) {
    $soma_product_holder_class .= ' product-image_hover';
}

?>
<div class="<?php echo esc_attr($soma_product_holder_class) ?>">
    <div class="product-inner_holder">
        <?php 
            if (!$product->is_in_stock()) {
                echo '<div class="badge shadow out-of-stock"><div class="badge-inner">' . esc_html__('Out of Stock!', 'soma') . '</div></div>';
            } elseif ($product->is_on_sale()) {
                echo '<div class="badge shadow on-sale"><div class="badge-inner">' . esc_html__('On Sale!', 'soma') . '</div></div>';
            }
        ?>
        <div class="product-entry_overlay">
            <a class="soma-link" href="<?php the_permalink() ?>">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="calculated-image" style="<?php echo esc_attr(soma_calculate_img(get_post_thumbnail_id(get_the_ID()))) ?>">
                        <?php 
                            the_post_thumbnail();

                            if ($soma_product_second_thumbnail == '1' && !empty($soma_product_gallery_ids[0])) {
                                echo '<img class="second-image" src='. esc_url(wp_get_attachment_url($soma_product_gallery_ids[0])) .' alt='. esc_attr(soma_get_attachment_alt(wp_get_attachment_url($soma_product_gallery_ids[0]))) .'>';
                            }
                        ?>
                    </div>
                <?php
                    } else {
                        echo wc_placeholder_img();
                    }
                ?>
            </a>
        </div>
        <div class="product-overlay_wrap">
            <div class="product-title_cart d-flex">
                <h3 class="product-title"><a class="soma-link" href="<?php the_permalink() ?>"><?php echo esc_attr($product->get_title()); ?></a></h3>
                <div class="ml-auto d-flex">
                    <?php
                        // Add to Cart
                        wc_get_template_part('woocommerce/loop/add-to-cart');
                    ?>
                </div>
            </div>
            <h5 class="price d-flex align-items-center">
                <?php 
                    // Price
                    wc_get_template_part('woocommerce/loop/price');
                ?>
            </h5>
        </div>
   </div>
</div>