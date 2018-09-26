<?php

/*
Masonry Gallery Product
*/

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$post_thumbnail_id = $product->get_image_id();

// Gallery Columns
$soma_product_gallery_columns = soma_inherit_option('product_gallery_columns', 'product_gallery_columns', '3');
$soma_product_selector_class = 'woocommerce-product-gallery__image gallery-thumbnail selector';
switch ($soma_product_gallery_columns) {
    case '1':
        $soma_product_selector_class .= ' col-12';
        break;
    case '2':
        $soma_product_selector_class .= ' col-sm-6';
        break;
    default:
        $soma_product_selector_class .= ' col-sm-6 col-md-4';
        break;
    case '4':
        $soma_product_selector_class .= ' col-sm-6 col-md-3';
        break;
}

// Gallery Animation
$soma_product_gallery_animation = soma_inherit_option('product_gallery_animation', 'product_gallery_animation', '1');
if ($soma_product_gallery_animation == '2' || $soma_product_gallery_animation == '3') {
	$soma_product_selector_class .= ' wow fadeInNeuron';
} elseif ($soma_product_gallery_animation == '4' || $soma_product_gallery_animation == '5') {
	$soma_product_selector_class .= ' wow fadeInUpNeuron';
}

// Spacing
$soma_product_spacing = get_field('product_spacing');
$soma_product_custom_spacing = get_field('product_custom_spacing');

if (!$soma_product_spacing) {
    $soma_product_spacing = '1';
}

if ($soma_product_spacing == '1' && get_theme_mod('product_gallery_spacing', false)) {
    if (get_theme_mod('product_gallery_spacing_range', '10') == '0') {
        soma_generate_custom_css_footer('.woocommerce-product-gallery__wrapper.masonry.masonry-gallery { margin-left: 0; margin-right: 0; } .woocommerce-product-gallery__wrapper.masonry.masonry-gallery .selector {padding-left: 0; padding-right: 0; padding-bottom: 0; }');
    } else {
        soma_generate_custom_css_footer('.woocommerce-product-gallery__wrapper.masonry.masonry-gallery { margin-left: -'. get_theme_mod('product_gallery_spacing_range', '10')/12 .'rem; margin-right: -'. get_theme_mod('product_gallery_spacing_range', '10')/12 .'rem; } .woocommerce-product-gallery__wrapper.masonry.masonry-gallery .selector {padding-left: '. get_theme_mod('product_gallery_spacing_range', '10')/12 .'rem; padding-right: '. get_theme_mod('product_gallery_spacing_range', '10')/12 .'rem; padding-bottom: '. (get_theme_mod('product_gallery_spacing_range', '10')/12)*2 .'rem; }');
    }
} elseif ($soma_product_spacing == '2') {
    if ($soma_product_custom_spacing == '0') {
        soma_generate_custom_css_footer('.woocommerce-product-gallery__wrapper.masonry.masonry-gallery { margin-left: 0; margin-right: 0; } .woocommerce-product-gallery__wrapper.masonry.masonry-gallery .selector {padding-left: 0; padding-right: 0; padding-bottom: 0; }');
    } else {
        soma_generate_custom_css_footer('.woocommerce-product-gallery__wrapper.masonry.masonry-gallery { margin-left: -'. $soma_product_custom_spacing/12 .'rem; margin-right: -'. $soma_product_custom_spacing/12 .'rem; } .woocommerce-product-gallery__wrapper.masonry.masonry-gallery .selector {padding-left: '. $soma_product_custom_spacing/12 .'rem; padding-right: '. $soma_product_custom_spacing/12 .'rem; padding-bottom: '. ($soma_product_custom_spacing/12)*2 .'rem; }');
    }
}

// Animation Data Delay
$soma_product_data_wow = '';
$soma_product_wow_seconds = 2;

?>
<div class="woocommerce-product-gallery woocommerce-product-gallery--with-images">
	<div class="woocommerce-product-gallery__wrapper row masonry gallery-type_grid masonry-gallery">
        <?php
            if (soma_inherit_option('product_thumbnail', 'product_thumbnail', '1') != '2') {
                if (has_post_thumbnail()) {
                    ?>
                        <div data-thumb="<?php echo esc_url(wp_get_attachment_url($post_thumbnail_id)) ?>" class="woocommerce-product-gallery__image <?php echo esc_attr($soma_product_selector_class) ?>">
                            <div class="lightbox">
                                <a href="<?php echo esc_url(wp_get_attachment_url($post_thumbnail_id)) ?>">
                                <?php woocommerce_show_product_sale_flash(); ?>
                                    <div class="calculated-image" style="<?php echo esc_attr(soma_calculate_img($post_thumbnail_id)) ?>">
                                        <?php 
                                            echo sprintf(
                                                '<img src="%s" alt="%s" title="%s">',
                                                esc_url(wp_get_attachment_url($post_thumbnail_id)),
                                                esc_attr(soma_get_attachment_alt(wp_get_attachment_url($post_thumbnail_id))),
                                                esc_attr(get_the_title($post_thumbnail_id))
                                            );
                                        ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                } else {
                    echo sprintf( '<div class="col-12"><img src="%s" alt="%s" class="wp-post-image" /></div>', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'soma' ) );
                }
            }

            foreach ($attachment_ids as $attachment_id) { 
                if ($soma_product_wow_seconds == 12) {
                    $soma_product_wow_seconds = 0;
                }

                $soma_product_data_wow = 'data-wow-delay="0.'. $soma_product_wow_seconds .'s"';			
                ?>
                <div <?php echo !empty($soma_product_wow_seconds) && ($soma_product_gallery_animation == '3' || $soma_product_gallery_animation == '5') ? $soma_product_data_wow  : ''; ?> data-thumb="<?php echo esc_url(wp_get_attachment_url($attachment_id)) ?>" class="<?php echo esc_attr($soma_product_selector_class) ?>">
                    <div class="lightbox">
                        <a href="<?php echo esc_url(wp_get_attachment_url($attachment_id)) ?>">
                            <div class="calculated-image" style="<?php echo esc_attr(soma_calculate_img($attachment_id)) ?>">
                                <?php 
                                    echo sprintf(
                                        '<img src="%s" alt="%s" title="%s">',
                                        esc_url(wp_get_attachment_url($attachment_id)),
                                        esc_attr(soma_get_attachment_alt(wp_get_attachment_url($attachment_id))),
                                        esc_attr(get_the_title($attachment_id))
                                    );
                                ?>
                            </div>
                        </a>
                    </div>
                </div>
                <?php 
                $soma_product_wow_seconds = $soma_product_wow_seconds + 2;
            } 
        ?>
    </div>
</div>