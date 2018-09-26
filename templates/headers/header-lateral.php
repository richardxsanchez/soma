<?php

/*
Header Lateral
*/

$soma_header_lateral_class[] = 'lateral fixed-lateral right';

// Social Media Visibility
$soma_social_media_visibility = soma_inherit_option('header_social_media_visibility', 'header_social_media_visibility', '1');

if ($soma_social_media_visibility == '1') {
    $soma_header_lateral_class[] = 'has-socials';
}

// Social Media Type
$soma_social_media_type = soma_inherit_option('header_social_media_type', 'header_social_media_type', '1');

// Social Media Style
$soma_social_media_style = soma_inherit_option('header_social_media_style', 'header_social_media_style', '1');
?>
<div class="soma-overlay" id="header-overlay"></div>
<div class="<?php echo esc_attr(implode(' ', $soma_header_lateral_class)) ?>">
    <?php 
        if (soma_inherit_option('header_search', 'header_search', '1') != '2') {
            get_template_part('templates/searches/search-overlay'); 
        }
    ?>
    <div class="hide-scrollbar">
        <div class="inner-hide_scrollbar">
            <div class="lateral-wrapper">
                <div class="d-flex language-search line item-delay_off">
                    <?php
                        $args_top_menu = array(
                            'theme_location' => 'top-menu',
                            'menu_class' => 'language',
                            'container' => false
                        );

                        if (has_nav_menu('top-menu')) {
                            wp_nav_menu($args_top_menu);
                        }
                    ?>
                    <?php if (soma_inherit_option('header_search', 'header_search', '1') != '2') : ?>
                        <div class="search-icon_holder ml-auto">
                            <a href="#" class="search-icon_text d-flex align-items-center"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S14.61,6,23.984,6z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg><span><?php echo esc_html__('Search', 'soma') ?></span></a>
                        </div>
                    <?php endif; ?>
                    <div class="close-menu_holder ml-auto">
                        <a href="#" id="close-menu"><?php echo esc_html__('Close', 'soma') ?></a>
                    </div>
                </div>
                <div class="menu-holder item-delay_off">
                    <?php
                        $args_main_menu = array(
                            'theme_location' => 'main-menu',
                            'container' => 'nav',
                            'before' => '<span>',
                            'after' => '</span>'
                        );

                        if (has_nav_menu('main-menu')) {
                            wp_nav_menu($args_main_menu);
                        } 
                    ?>
                </div>
            </div>
            <?php soma_social_media($soma_social_media_visibility, $soma_social_media_type, $soma_social_media_style, true, 'header'); ?>
        </div>
    </div>
</div>