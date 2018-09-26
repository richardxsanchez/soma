<?php

/*
Owl Carousel for Shop Products
*/

global $product;

$attachment_ids = $attachment_thumbs_ids = $product->get_gallery_image_ids();
$post_thumbnail_id = $product->get_image_id();

// Gallery Type
$soma_product_gallery_type = soma_inherit_option('product_gallery_type', 'product_gallery_type', '1');
$soma_product_gallery_class = 'gallery-type_default';

if ($product->get_gallery_image_ids() && $soma_product_gallery_type == '1') {
	$soma_product_gallery_class = 'gallery-type_default has-gallery';
}

// Gallery Animation
$soma_product_gallery_animation = soma_inherit_option('product_gallery_animation', 'product_gallery_animation', '1');
$soma_product_selector_class = '';

if ($soma_product_gallery_animation == '2' || $soma_product_gallery_animation == '3') {
	$soma_product_selector_class = 'wow fadeInNeuron';
} elseif ($soma_product_gallery_animation == '4' || $soma_product_gallery_animation == '5') {
	$soma_product_selector_class = 'wow fadeInUpNeuron';
}

// Animation Data Delay
$soma_product_data_wow = '';
$soma_product_wow_seconds = 2;

?>
<div class="product-gallery">
	<div class="<?php echo esc_attr($soma_product_gallery_class) ?>">
		<div class="owl-carousel <?php echo esc_attr($soma_product_selector_class) ?>" data-slider-id="1">
            <?php if (has_post_thumbnail()) { ?>
                <?php 
                    array_unshift($attachment_ids, $post_thumbnail_id);
                    
                    foreach ($attachment_ids as $attachment_id) { 
                ?>
                    <div class="lightbox">
                        <a href="<?php echo esc_url(wp_get_attachment_url($attachment_id)) ?>">
                            <?php 
                                echo sprintf(
                                    '<img src="%s" alt="%s" title="%s">',
                                    esc_url(wp_get_attachment_url($attachment_id)),
                                    esc_attr(soma_get_attachment_alt(wp_get_attachment_url($attachment_id))),
                                    esc_attr(get_the_title($attachment_id))
                                );
                            ?>
                        </a>
                    </div>
                <?php } ?>
        </div>
        <?php
            } if ($attachment_thumbs_ids) {
        ?>
            <div class="gallery-items_holder">
                <div class="hide-scrollbar">
                    <div class="inner-hide_scrollbar">
                        <div class="owl-thumbs" data-slider-id="1">
                            <?php 
                                if ($product->get_gallery_image_ids()) {
                                    array_unshift($attachment_thumbs_ids, $post_thumbnail_id);
                                }

                                foreach ($attachment_thumbs_ids as $attachment_id) { 
                                    if ($soma_product_wow_seconds == 10) {
                                        $soma_product_wow_seconds = 0;
                                    }
                                    $soma_product_data_wow = 'data-wow-delay="0.'. $soma_product_wow_seconds .'s"';	
                            ?>
                                <div class="owl-thumb-item <?php echo esc_attr($soma_product_selector_class) ?>" <?php echo !empty($soma_product_wow_seconds) && ($soma_product_gallery_animation == '3' || $soma_product_gallery_animation == '5') ? $soma_product_data_wow  : ''; ?>>
                                    <div class="image-holder">
                                        <?php 
                                            echo sprintf(
                                                '<img src="%s" alt="%s" title="%s">',
                                                esc_url(wp_get_attachment_url($attachment_id)),
                                                esc_attr(soma_get_attachment_alt(wp_get_attachment_url($attachment_id))),
                                                esc_attr(get_the_title($attachment_id))
                                            );
                                        ?>
                                    </div>
                                </div>
                            <?php 
                                    $soma_product_wow_seconds = $soma_product_wow_seconds + 2;
                                } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
	</div>
</div>