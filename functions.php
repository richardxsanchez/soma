<?php

// Set max content width
if (!isset($content_width)) {
	$content_width = 1920;
}

// Soma Setup
add_action('after_setup_theme', 'soma_setup');
function soma_setup() {
	// Language Setup
	load_theme_textdomain('soma', get_template_directory() . '/language');
	
	// Add theme support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('woocommerce');

	// Include custom files
	include(get_template_directory() . '/includes/customizer/soma_customizer.php');
	include(get_template_directory() . '/includes/neuron/neuron_functions.php');
	include_once(get_template_directory() . '/includes/extras/class-tgm-plugin-activation.php');
	include_once(get_template_directory() . '/includes/acf/custom_fields.php');

	// Add stylesheets and scripts
	add_action('wp_enqueue_scripts', 'soma_add_external_css');
	add_action('wp_enqueue_scripts', 'soma_add_external_js');
	add_action('admin_enqueue_scripts', 'soma_add_extra_scripts');

	// Register Menus
	register_nav_menus(
		array(
			'main-menu' => esc_html__('Main Menu', 'soma'),
			'top-menu' => esc_html__('Top Menu', 'soma')
		)
	);

	// Set Visual Composer as part of theme
	if (function_exists('vc_map')) {
		// Include NeuronElements Params
		include_once(get_template_directory() . '/includes/vc/vc_functions.php');

		vc_disable_frontend();

		// Set Visual Composer As Theme
		add_action('vc_before_init', 'soma_vcSetAsTheme');
		function soma_vcSetAsTheme() {
			vc_set_as_theme();
		}

		// Custom Style for Back End Editor
		add_action('admin_enqueue_scripts', 'soma_vc_styles');
		function soma_vc_styles() {
			wp_enqueue_style('soma-vc', get_template_directory_uri() .'/includes/vc/vc_custom.css', false, null, null);
		}
	}

	// TGMPA
	add_action('tgmpa_register', 'soma_plugins');
	function soma_plugins() {
		$plugins = array(
			array(
	        	'name'      => esc_html__('Advanced Custom Fields', 'soma'),
				'slug'      => 'advanced-custom-fields',
	            'required'  => true
			),
			array(
	        	'name'      => esc_html__('WooCommerce', 'soma'),
	            'slug'      => 'woocommerce',
	            'required'  => true
	        ),
			array(
				'name'      => esc_html__('WPBakery Page Builder(Visual Composer)', 'soma'),
				'slug'      => 'js_composer',
				'source'    => get_template_directory() . '/includes/plugins/js_composer.zip',
	            'required'  => true
	        ),
			array(
				'name'      => esc_html__('One Click Demo Importer', 'soma'),
				'slug'      => 'one-click-demo-import',
				'required'  => false
			),
			array(
				'name'      		=> esc_html__('NeuronThemes Share', 'soma'),
				'slug'     			=> 'neuronthemes-share',
				'required'  		=> true,
				'source'    		=> get_template_directory() . '/includes/plugins/neuronthemes-share.zip',
				'force_activation' 	=> true
			),
	    );
		$config = array(
			'id'           => 'tgmpa',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => ''
		);
	    tgmpa($plugins, $config);
	}
}


// External CSS
function soma_add_external_css() {
	wp_enqueue_style('soma-wp-style', get_stylesheet_uri());
	wp_enqueue_style('soma-vendor', get_template_directory_uri() .'/assets/css/vendor.css', false, wp_get_theme()['Version'], null);
	wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.min.css', false, wp_get_theme()['Version'], null);
	wp_enqueue_style('owl-theme-default', get_template_directory_uri() .'/assets/css/owl.theme.default.min.css', false, wp_get_theme()['Version'], null);
	wp_enqueue_style('magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css', false, wp_get_theme()['Version'], null);
	wp_enqueue_style('soma-style', get_template_directory_uri() .'/assets/css/soma.css', false, wp_get_theme()['Version'], null);

	if (get_theme_mod('primary_color')) {
		$soma_border_color = [
			'.widget.widget_search .shadow::before',
			'.widget.widget_search input',
			'.select2 .selection .select2-selection',
			'.select2-container .select2-dropdown',
			'.select2-container .select2-dropdown .select2-search input',
			'.search .masonry .selector .shadow::before',
			'.search .masonry .selector .search-result_holder',
			'.woocommerce .masonry .product .product-holder.shadow .product-inner_holder',
			'.woocommerce .masonry .product .product-holder.shadow:before',
			'.woocommerce .basic .product .product-holder.shadow .product-inner_holder .product-entry_overlay',
			'.woocommerce .woo-sidebar .widget.shadow .shadow-holder',
			'.woocommerce .woo-sidebar .widget.widget_shopping_cart .widget_shopping_cart_content .total',
			'.woocommerce .woo-sidebar .widget.widget_product_search .shadow-holder .shadow .search-field',
			'.woocommerce-top_bar .top-bar_right .woocommerce-orderby .dropdown #dropdown-button',
			'.woocommerce-top_bar .top-bar_right .woocommerce-orderby .dropdown .submenu',
			'.woocommerce-top_bar .top-bar_right .woocommerce-orderby .dropdown .submenu ul',
			'.single-product .single-product_info .cart .quantity input',
			'.woocommerce div.product .woocommerce-tabs ul.tabs:before',
			'.woocommerce #reviews #review_form_wrapper #review_form .shadow textarea',
			'.woocommerce #reviews #review_form_wrapper #review_form .shadow input',
			'.woocommerce #reviews #review_form_wrapper #review_form .form-submit .shadow input',
			'.woocommerce .woocommerce-cart-form .shop_table tbody tr .product-quantity .quantity input',
			'.woocommerce .woocommerce-cart-form .shop_table tbody tr .actions',
			'.woocommerce .woocommerce-cart-form .shop_table tbody tr .actions .shadow .button',
			'.woocommerce .woocommerce-cart-form .shop_table tbody tr .actions .coupon input',
			'.woocommerce .cart-collaterals .cart_totals::before',
			'.woocommerce .cart-collaterals .cart_totals .inner-shadow',
			'.woocommerce .cart-collaterals .cart_totals table tbody tr th, .woocommerce .cart-collaterals .cart_totals table tbody tr td',
			'.woocommerce .cart-collaterals .cart_totals table tbody tr.shipping .woocommerce-shipping-calculator .shipping-calculator-form p input',
			'.woocommerce .cart-collaterals .cart_totals table tbody tr.shipping .woocommerce-shipping-calculator .shipping-calculator-form .shadow:before',
			'.woocommerce .cart-collaterals .cart_totals table tbody tr.shipping .woocommerce-shipping-calculator .shipping-calculator-form .shadow .button',
			'.woocommerce-account input',
			'.woocommerce-account .woocommerce-ResetPassword input',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-navigation.shadow::before',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-navigation ul',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-content table tbody tr td a.button',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-content table tbody tr th a.button',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-content .woocommerce-order-details table tbody tr:last-child td',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-content .woocommerce-order-details table tbody tr:last-child th',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-content .woocommerce-order-details table tfoot tr:last-child td',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-content .woocommerce-order-details table tfoot tr:last-child th',
			'.woocommerce-account.logged-in .woocommerce-MyAccount-content .woocommerce-customer-details .woocommerce-column--billing-address address',
			'.woocommerce .track_order p input',
			'.woocommerce-checkout .woocommerce .checkout_coupon',
			'.woocommerce-checkout .woocommerce .woocommerce-form-login',
			'.woocommerce-checkout .woocommerce .checkout_coupon input',
			'.woocommerce-checkout .woocommerce .woocommerce-form-login input',
			'.woocommerce-checkout .woocommerce .checkout input',
			'.woocommerce-checkout .woocommerce .checkout textarea',
			'.woocommerce-checkout .woocommerce .checkout .your-order .shadow::before',
			'.woocommerce-checkout .woocommerce .checkout .your-order .shadow .inner-shadow',
			'.woocommerce-checkout .woocommerce .checkout .your-order .woocommerce-checkout-review-order table tr td',
			'.woocommerce-checkout .woocommerce .checkout .your-order .woocommerce-checkout-review-order table tr th',
			'.woocommerce-checkout .woocommerce .woocommerce-order table tbody tr td a.button',
			'.woocommerce-checkout .woocommerce .woocommerce-order table tbody tr th a.button', 
			'.woocommerce-checkout .woocommerce .woocommerce-order table tbody tr:last-child td',
			'.woocommerce-checkout .woocommerce .woocommerce-order table tbody tr:last-child th',
			'.woocommerce-checkout .woocommerce .woocommerce-order .woocommerce-column--billing-address address',
			'.woocommerce-order-details table tbody tr td a.button',
			'.woocommerce-order-details table tbody tr th a.button',
			'.woocommerce-order-details table tbody tr:last-child td',
			'.woocommerce-order-details table tbody tr:last-child th',
			'.woocommerce-order-details table tfoot tr:last-child td',
			'.woocommerce-order-details table tfoot tr:last-child th',
			'.woocommerce #payment ul.wc_payment_methods',
			'.woocommerce #payment .form-row .woocommerce-terms-and-conditions',
			'.button.light-blue span',
			'.button.light-blue:before',
			'.button.light-blue:hover:before',
			'.blog .post-holder.shadow .post-inner_holder',
			'.blog .post-holder.shadow .post-image',
			'.comments textarea',
			'.comments input',
			'.comments .comments-area',
			'.comments .comments-area .comment .comment-avatar::before',
			'.comments .comments-area .comment .comment-avatar img',
			'.team .members-background',
			'.service.shadow .service-holder'
		];

		$soma_bg_color = [
			'.widget.widget_search .shadow:focus-within::before',
			'header .lateral .search',
			'.woocommerce .masonry .product .product-holder.shadow:hover:before',
			'.woocommerce .masonry .product .product-holder.shadow:before',
			'.woocommerce-info',
			'.woocommerce .basic .product .product-holder .product-inner_holder .product-overlay_wrap .product-title_cart .add_to_cart_button',
			'.woocommerce .basic .product .product-holder .product-inner_holder .product-overlay_wrap .price del',
			'.woocommerce .badge.on-sale .badge-inner',
			'.shopping-bag .shopping-bag_holder .cart-total_buttons .woocommerce-mini-cart__buttons .button',
			'.woocommerce .woo-sidebar .widget.shadow:before',
			'.woocommerce .woo-sidebar .widget .widgettitle:after',
			'.woocommerce .woo-sidebar .widget .product_list_widget li del',
			'.woocommerce .woo-sidebar .widget.widget_shopping_cart .widget_shopping_cart_content .buttons .button',
			'.woocommerce .woo-sidebar .widget.widget_shopping_cart .widget_shopping_cart_content .buttons .checkout',
			'.woocommerce .woo-sidebar .widget.widget_price_filter .price_slider_wrapper .price_slider',
			'.woocommerce .woo-sidebar .widget.widget_price_filter .price_slider_wrapper .price_slider .ui-slider-handle',
			'.woocommerce .woo-sidebar .widget.widget_price_filter .price_slider_wrapper .price_slider_amount button',
			'.widget.widget_search .shadow:focus-within::before',
			'.woocommerce .woo-sidebar .widget.widget_product_search .shadow-holder .shadow:before',
			'.woocommerce-top_bar .top-bar_right .woocommerce-orderby .dropdown a:hover',
			'.woocommerce-top_bar .top-bar_right .woocommerce-orderby .dropdown .submenu ul li a:hover',
			'.woocommerce-top_bar .top-bar_right .woocommerce-orderby .dropdown .submenu ul li a.active',
			'.single-product .single-product_info .stock p',
			'.single-product .single-product_info .variations_form .variations tbody tr td.label',
			'.woocommerce #reviews #comments ol.commentlist li .shadow::before',
			'.woocommerce #reviews #review_form_wrapper #review_form .shadow::before',
			'.woocommerce .woocommerce-cart-form .shop_table tbody tr .actions .shadow::before',
			'.woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout .button',
			'.woocommerce-checkout .woocommerce .woocommerce-order .woocommerce-bacs-bank-details h3.wc-bacs-bank-details-account-name',
			'.woocommerce #payment .form-row .button',
			'.load-more_button button.button:disabled:before, .load-more_button button.button:disabled[disabled]:before',
			'.blog .post-holder.shadow::before',
			'.blog .post-holder.shadow:hover::before',
			'.comments .shadow:before',
			'.service.shadow::before',
			'footer' 
		];

		$soma_primary_output_css = '';
		$soma_primary_output_css .= implode(', ', $soma_bg_color) .'{ background-color: '. get_theme_mod('primary_color') .' }';
		$soma_primary_output_css .= implode(', ', $soma_border_color) .'{ border-color: '. get_theme_mod('primary_color') .' }';
		wp_add_inline_style('soma-style', $soma_primary_output_css);
	}

	if (get_theme_mod('secondary_color')) {
		$soma_secondary_text_color = [
			'.widget.widget_archive ul li a:hover',
			'.widget.widget_categories ul li a:hover',
			'.widget.widget_archive ul li',
			'.widget.widget_categories ul li',
			'.widget .tagcloud a:hover',
			'.post .post-info a',
			'.header-wrapper header a:hover',
			'.header-wrapper header .bag-text .number',
			'.woocommerce-checkout .woocommerce .checkout .woocommerce-validated label abbr',
			'.button.green:before',
			'.button.green:hover:before',
			'a',
			'a:focus',
			'a:hover',
			'.widget ul li a:hover'
		];
		$soma_secondary_bg_color = [
			'.widget .tagcloud a:before',
			'.header-wrapper header .line a:before',
			'.woocommerce-message',
			'.widget ul li a:before'
		];
		$soma_secondary_border_color = [
			'.woocommerce-checkout .woocommerce .checkout .woocommerce-validated input',
			'.woocommerce-checkout .woocommerce .checkout .woocommerce-validated .select2 .selection span',
			'.button.green span'
		];

		$soma_secondary_output = '';
		$soma_secondary_output .= implode(', ', $soma_secondary_text_color) .'{ color: '. get_theme_mod('secondary_color') .' }';
		$soma_secondary_output .= implode(', ', $soma_secondary_bg_color) .'{ background-color: '. get_theme_mod('secondary_color') .' }';
		$soma_secondary_output .= implode(', ', $soma_secondary_border_color) .'{ border-color: '. get_theme_mod('secondary_color') .' }';
		wp_add_inline_style('soma-style', $soma_secondary_output);
	}

}

// External Javascript
function soma_add_external_js() {
	if (!is_admin()) {
		wp_enqueue_script('images-loaded', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('packery', get_template_directory_uri().'/assets/js/packery-mode.pkgd.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri().'/assets/js/theia-sticky-sidebar.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('owl-carousel-thumbs', get_template_directory_uri().'/assets/js/owl.carousel2.thumbs.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('wow', get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'), wp_get_theme()['Version'], TRUE);
		wp_enqueue_script('soma-functions', get_template_directory_uri().'/assets/js/soma.js', array('jquery'), wp_get_theme()['Version'], TRUE);
	}

	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}
}

// Enqueue Extra Scripts
function soma_add_extra_scripts() {
	wp_enqueue_style('soma-acf-style', get_template_directory_uri() .'/includes/acf/soma-acf-styling.css', false, wp_get_theme()['Version'], null);
	wp_enqueue_script('soma-acf', get_template_directory_uri().'/includes/acf/soma-acf-js.js', array('jquery'), wp_get_theme()['Version'], TRUE);
}

// Active class in header
add_filter('nav_menu_css_class', 'soma_nav_class', 10, 2);
function soma_nav_class($classes, $item) {
	if (in_array('current-menu-item', $classes)) {
		$classes[] = 'active ';
	}
	return $classes;
}

// Sidebars
add_action('widgets_init', 'soma_widgets_init');
function soma_widgets_init() {
	// Blog Widget
    register_sidebar(
    	array(
			'name' => esc_html__('Blog Sidebar', 'soma'),
			'description' => esc_html__('Widgets on this sidebar are displayed in blog.', 'soma'),
			'id' => 'blog-sidebar',
			'before_widget' => '<div id="%1$s" class="widget line %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>'
    	)
	);

	// Shop Widget
	if (class_exists('WooCommerce')) {
		register_sidebar(
			array(
				'name' => esc_html__('Shop Sidebar', 'soma'),
				'description' => esc_html__('Widgets on this sidebar are displayed in Shop.', 'soma'),
				'id' => 'shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget line shadow %2$s"><div class="shadow-holder">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h6 class="widgettitle">',
				'after_title'   => '</h6>'
			)
		);
	}

	// Footer Widgets
	if (get_theme_mod('footer_widgets', '1') == '1') {
		register_sidebar(
			array(
		        'name' => esc_html__('Footer Sidebar 1', 'soma'),
		        'id' => 'footer-sidebar-1',
		        'before_widget' => '<div id="%1$s" class="widget line %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widgettitle">',
				'after_title'   => '</h6>'
		    )
		);
		register_sidebar(
			array(
		        'name' => esc_html__('Footer Sidebar 2', 'soma'),
		        'id' => 'footer-sidebar-2',
		        'before_widget' => '<div id="%1$s" class="widget line %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widgettitle">',
				'after_title'   => '</h6>'
		    )
		);
		register_sidebar(
			array(
				'name' => esc_html__('Footer Sidebar 3', 'soma'),
				'id' => 'footer-sidebar-3',
				'before_widget' => '<div id="%1$s" class="widget line %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widgettitle">',
				'after_title'   => '</h6>'
			)
		);
		register_sidebar(
			array(
				'name' => esc_html__('Footer Sidebar 4', 'soma'),
				'id' => 'footer-sidebar-4',
				'before_widget' => '<div id="%1$s" class="widget line %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widgettitle">',
				'after_title'   => '</h6>'
			)
		);
		register_sidebar(
			array(
				'name' => esc_html__('Footer Sidebar 5', 'soma'),
				'id' => 'footer-sidebar-5',
				'before_widget' => '<div id="%1$s" class="widget line %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widgettitle">',
				'after_title'   => '</h6>'
			)
		);
		register_sidebar(
			array(
				'name' => esc_html__('Footer Sidebar 6', 'soma'),
				'id' => 'footer-sidebar-6',
				'before_widget' => '<div id="%1$s" class="widget line %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widgettitle">',
				'after_title'   => '</h6>'
			)
		);
	}
}

// Rewrite the ACF functions incase ACF fails to activate
if (!function_exists('get_field') && !is_admin() && !function_exists('get_sub_field')) {
	function get_field($field_id, $post_id = null) {
		return null;
	}

	function get_sub_field($field_id, $post_id = null) {
		return null;
	}
}

// Move WooCommerce Message
function soma_move_woocommerce_message() {
	remove_action('woocommerce_before_single_product', 'wc_print_notices', 10);
	remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
	add_action( 'woocommerce_after_shop_loop', 'wc_print_notices', 10 );
	add_action('woocommerce_after_single_product', 'wc_print_notices', 35);
}
add_filter('wp', 'soma_move_woocommerce_message');

// Demo Importer
function soma_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Main Demo',
			'import_file_url'            => 'http://neuronthemes.com/soma/dummy-import/demo-content.xml',
			'import_widget_file_url'     => 'http://neuronthemes.com/soma/dummy-import/widgets.json',
			'import_customizer_file_url' => 'http://neuronthemes.com/soma/dummy-import/customizer.dat',
			'import_notice'              => __( 'If the shop page is not assigned please go to WooCommerce > Settings > Products and assign the page The Shop as Shop Page.', 'soma' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'soma_ocdi_import_files' );

// After Import Setup
function soma_ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    $top_menu = get_term_by('name', 'Top Menu', 'nav_menu');

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'top-menu' => $top_menu->term_id,
        )
    );

    $front_page_id = get_page_by_title('The Shop');

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'soma_ocdi_after_import_setup' );
