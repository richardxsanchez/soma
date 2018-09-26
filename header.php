<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
        // Disable Responsivity
        if (get_theme_mod('responsivity') != '2') {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        }

        // Header Class
        $soma_header_class = array('normal');
        $soma_header_wrapper_class = array('header-wrapper');

        // Position
        if (soma_inherit_option('header_position', 'header_position', '1', true) == '2') {
            $soma_header_class[] = 'absolute'; 
        }

        // Sticky or Account Page
        if (soma_inherit_option('header_sticky', 'header_sticky', '1', true) == '1' || is_account_page()) {
            $soma_header_class[] = 'fixed'; 
        } 

        if (soma_inherit_option('header_sticky', 'header_sticky', '1', true) == '1' && soma_inherit_option('header_position', 'header_position', '1', true) == '1') {
            $soma_header_wrapper_class[] = 'header-height';
        } elseif (is_account_page()) {
            $soma_header_wrapper_class[] = 'header-height';
        }

        wp_head(); 
    ?>
</head>
<body <?php body_class() ?>>
    <div class="theme-loader"></div>
    <!-- Header -->
    <div class="<?php echo esc_attr(implode(' ', $soma_header_wrapper_class)) ?>">
        <header class="<?php echo esc_attr(implode(' ', $soma_header_class)) ?>">
            <div class="row align-items-center line">
                <div class="col-4">
                    <?php if (class_exists('WooCommerce')) : ?>
                        <div class="bag-text">
                            <a href="#"><?php echo esc_html__('Bag', 'soma') ?></a>
                            <span class="number"><?php echo sprintf('%d', WC()->cart->cart_contents_count); ?></span>
                        </div>
                        <div class="soma-overlay" id="shoppping-bag_overlay"></div>
                        <div class="shopping-bag fixed-lateral left item-delay_off">
                            <div class="hide-scrollbar">
                                <div class="inner-hide_scrollbar">
                                    <a id="close-shopping_bag" href="#"><?php echo esc_html__('Close', 'soma') ?></a>
                                    <div class="widget_shopping_cart_content"></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-4">
                    <?php get_template_part('templates/logos/logo-default') ?>
                </div>
                <div class="col-4">
                    <div class="menu-text_holder text-align_right">
                        <?php if (has_nav_menu('main-menu') || has_nav_menu('top-menu')) { ?>
                            <a href="#" class="menu-text"><?php echo esc_html__('Menu', 'soma') ?></a>
                        <?php 
                            } else {
                                echo '<a href='. esc_url(admin_url('nav-menus.php')) .'>' . esc_html__('No Menu Assigned', 'soma') . '</a>';
                            } 
                        ?>
                    </div>
                </div>
            </div>
            <!-- Lateral -->
            <?php get_template_part('templates/headers/header-lateral'); ?>
        </header>
    </div>