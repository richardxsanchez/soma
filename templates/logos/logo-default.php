<?php

/*
Default Logo
*/

$soma_logo_style = $soma_logo_display = array();

$soma_logo = array(
    'default' => array(
        'url' => get_theme_mod('header_logo') ? wp_get_attachment_url(get_theme_mod('header_logo')) : '',
        'width' => (get_theme_mod('header_logo') && !empty(wp_get_attachment_metadata(get_theme_mod('header_logo'))['width'])) ? wp_get_attachment_metadata(get_theme_mod('header_logo'))['width'] : '',
        'height' => (get_theme_mod('header_logo') && !empty(wp_get_attachment_metadata(get_theme_mod('header_logo'))['height'])) ? wp_get_attachment_metadata(get_theme_mod('header_logo'))['height'] : '',
    ),
    'custom_logo' => array(
        'url' => get_field('custom_logo')['url'],
        'width' => get_field('custom_logo')['width'],
        'height' => get_field('custom_logo')['height']
    ),
    'attributes' => array(
        'width' => array(
            'page' => get_field('custom_logo_width'),
            'options' => get_theme_mod('header_logo_width')
        ),
        'height' => array(
            'page' => get_field('custom_logo_height'),
            'options' => get_theme_mod('header_logo_height')
        )
    ),
    'img_class' => 'default-logo',
    'text_logo' => get_theme_mod('header_logo_text'),
    'text_logo_size' => get_theme_mod('header_logo_text_size'),
    'ext' => 'png'
);

if (!empty($soma_logo['custom_logo']['url'])) {
    $soma_logo_display = $soma_logo['custom_logo'];
} elseif (!empty($soma_logo['default']['url'])) {
    $soma_logo_display = $soma_logo['default'];
}

// Logo Attributes
if (!empty($soma_logo_display)) {
    if (!empty($soma_logo['attributes']['width']['page'])) {
        $soma_logo_style[] = 'width: '. $soma_logo['attributes']['width']['page'] .'px';
    } elseif (!empty($soma_logo['attributes']['width']['options'])) {
        $soma_logo_style[] = 'width: '. $soma_logo['attributes']['width']['options'] .'px';
    } else {
        $soma_logo_style[] = 'width: '. $soma_logo_display['width'] .'px';
    }

    if (!empty($soma_logo['attributes']['height']['page'])) {
        $soma_logo_style[] = 'height: '. $soma_logo['attributes']['height']['page'] .'px';
    } elseif(!empty($soma_logo['attributes']['height']['options'])) {
        $soma_logo_style[] = 'height: '. $soma_logo['attributes']['height']['options'] .'px';
    } elseif (!empty($soma_logo['attributes']['width']['page'])) {
        $soma_logo_style[] = 'height: '. ($soma_logo['attributes']['width']['page'] / $soma_logo_display['width']) * $soma_logo_display['height'] .'px';
    } elseif (!empty($soma_logo['attributes']['width']['options'])) {
        $soma_logo_style[] = 'height: '. ($soma_logo['attributes']['width']['options'] / $soma_logo_display['width']) * $soma_logo_display['height'] .'px';
    } else {
        $soma_logo_style[] = 'height: '. $soma_logo_display['height'] .'px';
    }
}

// Text Logo Size
if (!empty($soma_logo['text_logo_size'])) {
    $soma_logo_style[] = 'font-size: '. $soma_logo['text_logo_size'] .'px';
 }
?>
<div class="logo justify-content-center d-flex">
    <a href="<?php echo esc_url(home_url('/')) ?>" class="soma-link" style="<?php echo esc_attr(implode(';', $soma_logo_style)) ?>">
        <?php 
            // Check Logo Type
            if (!empty($soma_logo_display['url']) && wp_check_filetype($soma_logo_display['url'])['ext'] == 'svg') {
                $soma_logo['img_class'] = 'style-svg';
            } 

            // Output Logo
            if (!empty($soma_logo_display['url'])) {
                echo sprintf(
                    '<img class="%s" src="%s" alt="%s">',
                    $soma_logo['img_class'],
                    esc_url($soma_logo_display['url']),
                    esc_attr(soma_get_attachment_alt($soma_logo_display['url']))
                );
            } elseif ($soma_logo['text_logo']) {
                echo esc_attr($soma_logo['text_logo']);
            } else {
                echo esc_attr(bloginfo('name'));
            }
        ?>
    </a>
</div>