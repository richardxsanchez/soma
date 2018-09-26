<?php

/*
Theme Options for Soma by NeuronThemes
*/

function soma_customize_options($wp_customize) {
	// Range Control - Custom Control
	class WP_Customize_Range_Control extends WP_Customize_Control
	{
		public $type = 'custom_range';
		public function enqueue()
		{
			wp_enqueue_script('js-range-control', get_template_directory_uri() . '/includes/customizer/js/range-control.js', array('jquery'), false, true);
			wp_enqueue_style('css-range-control', get_template_directory_uri() .'/includes/customizer/css/range-control.css', false, wp_get_theme()['Version'], null);
		}
		public function render_content()
		{
			?>
			<label>
				<?php if (!empty($this->label)) : ?>
					<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<?php endif; ?>
				<div class="cs-range-value">
					<?php echo esc_attr($this->value()); ?>
				</div>
				<input data-input-type="range" type="range" class="soma-custom-range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
				<?php if (!empty($this->description)) : ?>
					<span class="description customize-control-description"><?php echo esc_attr($this->description); ?></span>
				<?php endif; ?>
			</label>
			<?php
		}
	}

	// General Settings
	$wp_customize->add_setting('responsivity', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('custom_fields_panel', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	
	// Header Settings
	$wp_customize->add_setting('header_logo', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_logo_width', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_logo_height', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_logo_text', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_logo_text_size', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_position', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_sticky', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_search', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_social_media_visibility', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_social_media_type', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('header_social_media_style', array('default' => 'colorful', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	
	// Footer Settings
	$wp_customize->add_setting('footer_widgets', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('footer_widgets_columns', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('footer_social_media_visibility', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('footer_social_media_type', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('footer_social_media_style', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	
	if (class_exists('WooCommerce')) {
		// Shop Settings
		$wp_customize->add_setting('shop_type', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_ppp', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_columns', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_metro', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_sidebar', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_breadcrumb', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_result_count', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_orderby', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_offset', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_spacing', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_spacing_range', array('default' => '48', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_shadow', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_pagination', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('shop_animation', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		
		// Product Settings
		$wp_customize->add_setting('product_second_thumbnail', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_related_products', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_container', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_navigation', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_navigation_category', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_content_alignment', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_content_animation', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_content_sticky', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_gallery_type', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_thumbnail', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_gallery_columns', array('default' => '3', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_gallery_animation', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_gallery_spacing', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
		$wp_customize->add_setting('product_gallery_spacing_range', array('default' => '10', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	}

	// Blog Settings
	$wp_customize->add_setting('blog_ppp', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_columns', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_sidebar', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_shadow', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_offset', array('default' => '2', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_pagination', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_animation', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));

	// Blog Single Settings
	$wp_customize->add_setting('blog_single_navigation', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_single_navigation_category', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('blog_single_share', array('default' => '1', 'transport' => 'refresh', array('sanitize_callback' => '__return_false')));

	// Style Settings
	$wp_customize->add_setting('primary_color', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('secondary_color', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));

	// Social Media Settings
	$wp_customize->add_setting('facebook_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('twitter_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('500px_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('google_plus_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('vimeo_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('dribbble_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('pinterest_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('youtube_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('tumblr_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('linkedin_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('behance_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('flickr_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('spotify_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('instagram_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('github_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('houzz_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('stackexchange_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('soundcloud_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	$wp_customize->add_setting('vk_url', array('transport' => 'refresh', array('sanitize_callback' => '__return_false')));
	
	// Panel
	$wp_customize->add_panel('theme_options', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'title'          => __('Theme Options', 'soma')
	));

	// Sections
	$wp_customize->add_section('general_options', 
		array(
			'title' => __('General', 'soma'), 
			'priority' => 3, 
			'panel' => 'theme_options'
		)
	);
	$wp_customize->add_section('header_options', 
		array(
			'title' => __('Header', 'soma'), 
			'priority' => 4, 
			'panel' => 'theme_options'
		)
	);
	$wp_customize->add_section('footer_options', 
		array(
			'title' => __('Footer', 'soma'), 
			'priority' => 5, 
			'panel' => 'theme_options'
		)
	);
	if (class_exists('WooCommerce')) {
		$wp_customize->add_section('shop_options', 
			array(
				'title' => __('Shop', 'soma'), 
				'priority' => 6, 
				'panel' => 'theme_options'
			)
		);
		$wp_customize->add_section('product_options', 
			array(
				'title' => __('Product', 'soma'), 
				'priority' => 7, 
				'panel' => 'theme_options'
			)
		);
	}
	$wp_customize->add_section('blog_options', 
		array(
			'title' => __('Blog', 'soma'), 
			'priority' => 8, 
			'panel' => 'theme_options'
		)
	);
	$wp_customize->add_section('blog_single_options', 
		array(
			'title' => __('Blog Single', 'soma'), 
			'priority' => 9, 
			'panel' => 'theme_options'
		)
	);
	$wp_customize->add_section('style_options', 
		array(
			'title' => __('Style', 'soma'), 
			'priority' => 10, 
			'panel' => 'theme_options'
		)
	);
	$wp_customize->add_section('social_media_options', 
		array(
			'title' => __('Social Media', 'soma'), 
			'priority' => 11, 
			'panel' => 'theme_options'
		)
	);

	if (class_exists('WooCommerce')) {
		$wp_customize->remove_panel('woocommerce');
	}

	// General Controls
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'responsivity_control',
		array(
			'label' => __('Responsivity', 'soma'),
			'description' => __('Enable or disable the responsivity, if you disable this option your website will remain the same on small devices.', 'soma'),
			'section' => 'general_options',
			'settings' => 'responsivity',
			'type' => 'select',
			'choices' => array(
				'1' => __('Enable', 'soma'),
				'2' => __('Disable', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_fields_panel_control',
		array(
			'label' => __('Custom Fields Panel', 'soma'),
			'description' => __('Enable or disable the custom fields panel(ACF Panel), default is disabled.', 'soma'),
			'section' => 'general_options',
			'settings' => 'custom_fields_panel',
			'type' => 'select',
			'choices' => array(
				'1' => __('Enable', 'soma'),
				'2' => __('Disable', 'soma')
			)
		)
	));

	// Header Controls
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo_control',
		array(
			'label' => __('Logo', 'soma'),
			'description' => __('Upload you logo, will be displayed as normal logo.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_logo'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_logo_width_control',
		array(
			'label' => __('Logo Width', 'soma'),
			'description' => __('Enter the number that will change the logo image width. <br /><small>Note: Enter only the number without {px}.</small>', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_logo_width',
			'type' => 'number'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_logo_height_control',
		array(
			'label' => __('Logo Height', 'soma'),
			'description' => __('Enter the number that will change the logo image height, incase you don\'t add value, the height will be auto. <br /><small>Note: Enter only the number without {px}.</small>', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_logo_height',
			'type' => 'number'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_logo_text_control',
		array(
			'label' => __('Logo Text', 'soma'),
			'description' => __('Enter the text that will appear as logo, incase you don\'t upload any image as logo.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_logo_text',
			'type' => 'text'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_logo_text_size_control',
		array(
			'label' => __('Logo Text Size', 'soma'),
			'description' => __('Enter the number to change the logo text font size. <br /><small>Note: Enter only the number without {px}.</small.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_logo_text_size',
			'type' => 'number'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_position_control',
		array(
			'label' => __('Position', 'soma'),
			'description' => __('Select the header position, default is static. <br /><small>Note: Absolute header will push the content to the top of page.</small.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_position',
			'type' => 'select',
			'choices' => array(
				'1' => __('Static', 'soma'),
				'2' => __('Absolute', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_sticky_control',
		array(
			'label' => __('Sticky', 'soma'),
			'description' => __('Make the header sticky, in scroll the header will stick to the top of page.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_sticky',
			'type' => 'select',
			'choices' => array(
				'1' => __('Enable', 'soma'),
				'2' => __('Disable', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_search_control',
		array(
			'label' => __('Search', 'soma'),
			'description' => __('Show or hide the search in header.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_search',
			'type' => 'select',
			'choices' => array(
				'1' => __('Show', 'soma'),
				'2' => __('Hide', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_social_media_visibility_control',
		array(
			'label' => __('Social Media', 'soma'),
			'description' => __('Show or hide the social media in header, don\'t forget to add the URL\'s in Theme Options > Social Media. <br /><small>Note: Only the social medias with URL inserted will be displayed</small>.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_social_media_visibility',
			'type' => 'select',
			'choices' => array(
				'1' => __('Show', 'soma'),
				'2' => __('Hide', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_social_media_type_control',
		array(
			'label' => __('Social Media Type', 'soma'),
			'description' => __('Select if you want the social media to be plain text or icons.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_social_media_type',
			'type' => 'select',
			'choices' => array(
				'1' => __('Icons', 'soma'),
				'2' => __('Text', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_social_media_style_control',
		array(
			'label' => __('Social Media Style', 'soma'),
			'description' => __('Select the style of social media.', 'soma'),
			'section' => 'header_options',
			'settings' => 'header_social_media_style',
			'type' => 'select',
			'choices' => array(
				'colorful' => __('Colorful', 'soma'),
				'dark' => __('Dark', 'soma')
			)
		)
	));

	// Footer Controls
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_widgets_control',
		array(
			'label' => __('Widgets', 'soma'),
			'description' => __('Show or hide the widgets in footer.', 'soma'),
			'section' => 'footer_options',
			'settings' => 'footer_widgets',
			'type' => 'select',
			'choices' => array(
				'1' => __('Show', 'soma'),
				'2' => __('Hide', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_widgets_columns_control',
		array(
			'label' => __('Widgets Columns', 'soma'),
			'description' => __('Select the columns of widgets.', 'soma'),
			'section' => 'footer_options',
			'settings' => 'footer_widgets_columns',
			'type' => 'select',
			'choices' => array(
				'1' => __('2 Columns', 'soma'),
				'2' => __('3 Columns', 'soma'),
				'3' => __('4 Columns', 'soma'),
				'4' => __('6 Columns', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_social_media_visibility_control',
		array(
			'label' => __('Social Media', 'soma'),
			'description' => __('Show or hide the social media in footer, don\'t forget to add the URL\'s in Theme Options > Social Media. <br /><small>Note: Only the social medias with URL inserted will be displayed</small>.', 'soma'),
			'section' => 'footer_options',
			'settings' => 'footer_social_media_visibility',
			'type' => 'select',
			'choices' => array(
				'1' => __('Show', 'soma'),
				'2' => __('Hide', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_social_media_type_control',
		array(
			'label' => __('Social Media Type', 'soma'),
			'description' => __('Select if you want the social media to be plain text or icons.', 'soma'),
			'section' => 'footer_options',
			'settings' => 'footer_social_media_type',
			'type' => 'select',
			'choices' => array(
				'1' => __('Icons', 'soma'),
				'2' => __('Text', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_social_media_style_control',
		array(
			'label' => __('Social Media Style', 'soma'),
			'description' => __('Select the style of social media.', 'soma'),
			'section' => 'footer_options',
			'settings' => 'footer_social_media_style',
			'type' => 'select',
			'choices' => array(
				'1' => __('Colorful', 'soma'),
				'2' => __('Dark', 'soma'),
				'3' => __('Light', 'soma')
			)
		)
	));

	if (class_exists('WooCommerce')) {
		// Shop Controls
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_type_control',
			array(
				'label' => __('Type', 'soma'),
				'description' => __('Select the type you want to show your products.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_type',
				'type' => 'select',
				'choices' => array(
					'1' => __('Basic', 'soma'),
					'2' => __('Creative', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_ppp_control',
			array(
				'label' => __('Posts Per Page', 'soma'),
				'description' => __('Write how many products you want to display.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_ppp',
				'type' => 'text'
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_columns_control',
			array(
				'label' => __('Columns', 'soma'),
				'description' => __('Select the columns of Shop, default is 2 columns.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_columns',
				'type' => 'select',
				'choices' => array(
					'1' => __('2 Columns', 'soma'),
					'2' => __('3 Columns', 'soma'),
					'3' => __('4 Columns', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_metro_control',
			array(
				'label' => __('Metro', 'soma'),
				'description' => __('Enable or disable the metro layout in Shop. <br /> <small>Note: The columns option above won\'t work anymore, all columns should be changed individually at product settings.</small>', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_metro',
				'type' => 'select',
				'choices' => array(
					'1' => __('Enable', 'soma'),
					'2' => __('Disable', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_sidebar_control',
			array(
				'label' => __('Sidebar', 'soma'),
				'description' => __('Show or hide the sidebar in shop.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_sidebar',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_breadcrumb_control',
			array(
				'label' => __('Breadcrumb', 'soma'),
				'description' => __('Show or hide breadcrumb in shop.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_breadcrumb',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_result_count_control',
			array(
				'label' => __('Result Count', 'soma'),
				'description' => __('Show or hide result count paragraph in shop.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_result_count',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_orderby_control',
			array(
				'label' => __('Order By', 'soma'),
				'description' => __('Show or hide the orderby in shop.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_orderby',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_offset_control',
			array(
				'label' => __('Offset', 'soma'),
				'description' => __('Enable or disable the offset layout, first and third item will get top spacing.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_offset',
				'type' => 'select',
				'choices' => array(
					'1' => __('Enable', 'soma'),
					'2' => __('Disable', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_spacing_control',
			array(
				'label' => __('Spacing', 'soma'),
				'description' => __('Enable custom spacing in shop, the range in the field below will be functionally.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_spacing',
				'type' => 'checkbox'
			)
		));
		$wp_customize->add_control(new WP_Customize_Range_Control($wp_customize, 'shop_spacing_range_control',
			array(
				'label'       => __('Spacing Range', 'soma'),
				'description' => __('Add spacing to shop products, measurement is in pixel. Make sure to enable the checkbox above to make this work.', 'soma'),
				'section'     => 'shop_options',
				'settings'    => 'shop_spacing_range',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_shadow_control',
			array(
				'label' => __('Shadow', 'soma'),
				'description' => __('Show or hide products shadow in shop.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_shadow',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_pagination_control',
			array(
				'label' => __('Pagination', 'soma'),
				'description' => __('Select the pagination type of shop.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_pagination',
				'type' => 'select',
				'choices' => array(
					'1' => __('Normal', 'soma'),
					'2' => __('Show More', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'shop_animation_control',
			array(
				'label' => __('Initial Loading Animation', 'soma'),
				'description' => __('Select initial loading animation for products.', 'soma'),
				'section' => 'shop_options',
				'settings' => 'shop_animation',
				'type' => 'select',
				'choices' => array(
					'1' => __('None', 'soma'),
					'2' => __('Fade In', 'soma'),
					'3' => __('Fade In (with delay)', 'soma'),
					'4' => __('Fade In Up', 'soma'),
					'5' => __('Fade In Up (with delay)', 'soma')
				)
			)
		));

		// Product
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_second_thumbnail_control',
			array(
				'label' => __('Second Thumbnail', 'soma'),
				'description' => __('Enable the second thumbnail, it will be displayed on the hover of product(In Shop Page). The image that will be displayed, will be the first one in the product gallery.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_second_thumbnail',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_related_products_control',
			array(
				'label' => __('Related Products', 'soma'),
				'description' => __('Show or hide the related products, they appear below the product description.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_related_products',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_container_control',
			array(
				'label' => __('Container', 'soma'),
				'description' => __('Enable or disable the container, if enabled the elements will be centered in 1170 pixel width.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_container',
				'type' => 'select',
				'choices' => array(
					'1' => __('Enable', 'soma'),
					'2' => __('Disable', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_navigation_control',
			array(
				'label' => __('Navigation', 'soma'),
				'description' => __('Show or hide the navigation in product.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_navigation',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_navigation_category_control',
			array(
				'label' => __('Navigation Category', 'soma'),
				'description' => __('Switch on if you want the products to be navigated only in the same category.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_navigation_category',
				'type' => 'select',
				'choices' => array(
					'1' => __('On', 'soma'),
					'2' => __('Off', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_content_alignment_control',
			array(
				'label' => __('Content Alignment', 'soma'),
				'description' => __('Select the alignment of content, if selected left the gallery will move to right and so on.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_content_alignment',
				'type' => 'select',
				'choices' => array(
					'1' => __('Left', 'soma'),
					'2' => __('Right', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_content_animation_control',
			array(
				'label' => __('Content Animation', 'soma'),
				'description' => __('Select the initial loading animation for the content.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_content_animation',
				'type' => 'select',
				'choices' => array(
					'1' => __('None', 'soma'),
					'2' => __('Fade In', 'soma'),
					'3' => __('Fade In Up', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_content_sticky_control',
			array(
				'label' => __('Sticky', 'soma'),
				'description' => __('Enable or disable the sticky content, the content will stay fixed when scrolling down.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_content_sticky',
				'type' => 'select',
				'choices' => array(
					'1' => __('Enable', 'soma'),
					'2' => __('Disable', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_gallery_type_control',
			array(
				'label' => __('Gallery Type', 'soma'),
				'description' => __('Select the gallery type.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_gallery_type',
				'type' => 'select',
				'choices' => array(
					'1' => __('Default', 'soma'),
					'2' => __('Masonry', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_thumbnail_control',
			array(
				'label' => __('Thumbnail', 'soma'),
				'description' => __('Show or hide the thumbnail in product. <br /> <small>Note: You can\'t hide thumbnail in default gallery type.</small>', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_thumbnail',
				'type' => 'select',
				'choices' => array(
					'1' => __('Show', 'soma'),
					'2' => __('Hide', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_gallery_columns_control',
			array(
				'label' => __('Gallery Columns', 'soma'),
				'description' => __('Select the gallery columns. <br /> <small>Note: This option works only with Masonry as gallery type.</small>', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_gallery_columns',
				'type' => 'select',
				'choices' => array(
					'1' => __('One Column', 'soma'),
					'2' => __('2 Columns', 'soma'),
					'3' => __('3 Columns', 'soma'),
					'4' => __('4 Columns', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_gallery_animation_control',
			array(
				'label' => __('Gallery Animation', 'soma'),
				'description' => __('Select the initial loading animation for gallery images.', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_gallery_animation',
				'type' => 'select',
				'choices' => array(
					'1' => __('None', 'soma'),
					'2' => __('Fade In', 'soma'),
					'3' => __('Fade In (with delay)', 'soma'),
					'4' => __('Fade In Up', 'soma'),
					'5' => __('Fade In Up (with delay)', 'soma')
				)
			)
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'product_gallery_spacing_control',
			array(
				'label' => __('Spacing', 'soma'),
				'description' => __('Enable custom spacing in gallery, the range in the field below will be functionally. <br /> <small>Note: It works only in Masonry Type.</small>', 'soma'),
				'section' => 'product_options',
				'settings' => 'product_gallery_spacing',
				'type' => 'checkbox'
			)
		));
		$wp_customize->add_control(new WP_Customize_Range_Control($wp_customize, 'product_gallery_spacing_range_control',
			array(
				'label'       => __('Spacing Range', 'soma'),
				'description' => __('Add spacing to gallery images, measurement is in pixel. Make sure to enable the checkbox above to make this work.', 'soma'),
				'section'     => 'product_options',
				'settings'    => 'product_gallery_spacing_range',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100
				)
			)
		));
	}
	
	// Blog Controls
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_ppp_control',
		array(
			'label' => __('Posts Per Page', 'soma'),
			'description' => __('Write how many blog posts you want to display.', 'soma'),
			'section' => 'blog_options',
			'settings' => 'blog_ppp',
			'type' => 'text'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_columns_control',
		array(
			'label' => __('Columns', 'soma'),
			'description' => __('Select the columns of Blog, default is two columns.', 'soma'),
			'section' => 'blog_options',
			'settings' => 'blog_columns',
			'type' => 'select',
			'choices' => array(
				'1' => __('One Column', 'soma'),
				'2' => __('2 Columns', 'soma'),
				'3' => __('3 Columns', 'soma'),
				'4' => __('4 Columns', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_sidebar_control',
		array(
			'label' => __('Sidebar', 'soma'),
			'description' => __('Select the alignment of sidebar or hide it.', 'soma'),
			'section' => 'blog_options',
			'settings' => 'blog_sidebar',
			'type' => 'select',
			'choices' => array(
				'1' => __('Left', 'soma'),
				'2' => __('Right', 'soma'),
				'3' => __('Hide', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_offset_control',
			array(
				'label' => __('Offset', 'soma'),
				'description' => __('Enable or disable the offset layout, first and third post will get top spacing.', 'soma'),
				'section' => 'blog_options',
				'settings' => 'blog_offset',
				'type' => 'select',
				'choices' => array(
					'1' => __('Enable', 'soma'),
					'2' => __('Disable', 'soma')
				)
			)
		));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_shadow_control',
		array(
			'label' => __('Shadow', 'soma'),
			'description' => __('Show or hide posts shadow in blog.', 'soma'),
			'section' => 'blog_options',
			'settings' => 'blog_shadow',
			'type' => 'select',
			'choices' => array(
				'1' => __('Show', 'soma'),
				'2' => __('Hide', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_pagination_control',
		array(
			'label' => __('Pagination', 'soma'),
			'description' => __('Select the pagination type, default is normal.', 'soma'),
			'section' => 'blog_options',
			'settings' => 'blog_pagination',
			'type' => 'select',
			'choices' => array(
				'1' => __('Normal', 'soma'),
				'2' => __('Show More', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_animation_control',
		array(
			'label' => __('Animation', 'soma'),
			'description' => __('Select initial loading animation for posts.', 'soma'),
			'section' => 'blog_options',
			'settings' => 'blog_animation',
			'type' => 'select',
			'choices' => array(
				'1' => __('None', 'soma'),
				'2' => __('Fade In', 'soma'),
				'3' => __('Fade In (with delay)', 'soma'),
				'4' => __('Fade In Up', 'soma'),
				'5' => __('Fade In Up (with delay)', 'soma')
			)
		)
	));

	// Blog Single Controls
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_single_navigation_control',
		array(
			'label' => __('Navigation', 'soma'),
			'description' => __('Show or hide the navigation in blog single.', 'soma'),
			'section' => 'blog_single_options',
			'settings' => 'blog_single_navigation',
			'type' => 'select',
			'choices' => array(
				'1' => __('Show', 'soma'),
				'2' => __('Hide', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_single_navigation_category_control',
		array(
			'label' => __('Navigation Category', 'soma'),
			'description' => __('Switch on if you want the posts to be navigated only in the same category.', 'soma'),
			'section' => 'blog_single_options',
			'settings' => 'blog_single_navigation_category',
			'type' => 'select',
			'choices' => array(
				'1' => __('On', 'soma'),
				'2' => __('Off', 'soma')
			)
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_single_share_control',
		array(
			'label' => __('Share', 'soma'),
			'description' => __('Select the type you want to display the share social media.', 'soma'),
			'section' => 'blog_single_options',
			'settings' => 'blog_single_share',
			'type' => 'select',
			'choices' => array(
				'1' => __('Show', 'soma'),
				'2' => __('Hide', 'soma')
			)
		)
	));

	// Style Controls
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color_control',
		array(
			'label' => __('Primary Color', 'soma'),
			'description' => __('Change the primary color of theme, default is light blue.', 'soma'),
			'section' => 'style_options',
			'settings' => 'primary_color'
		)
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color_control',
		array(
			'label' => __('Secondary Color', 'soma'),
			'description' => __('Change the secondary color of theme, default is green.', 'soma'),
			'section' => 'style_options',
			'settings' => 'secondary_color'
		)
	));

	// Social Media Control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook_url_control',
		array(
			'label' => __('Facebook Url', 'soma'),
			'description' => __('Enter your Facebook URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'facebook_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter_url_control',
		array(
			'label' => __('Twitter Url', 'soma'),
			'description' => __('Enter your Twitter URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'twitter_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, '500px_url_control',
		array(
			'label' => __('500px Url', 'soma'),
			'description' => __('Enter your 500px URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => '500px_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'google_plus_url_control',
		array(
			'label' => __('Google Plus Url', 'soma'),
			'description' => __('Enter your Google Plus URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'google_plus_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vimeo_url_control',
		array(
			'label' => __('Vimeo Url', 'soma'),
			'description' => __('Enter your Vimeo URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'vimeo_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'dribbble_url_control',
		array(
			'label' => __('Dribbble Url', 'soma'),
			'description' => __('Enter your Dribbble URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'dribbble_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pinterest_url_control',
		array(
			'label' => __('Pinterest Url', 'soma'),
			'description' => __('Enter your Pinterest URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'pinterest_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'youtube_url_control',
		array(
			'label' => __('Youtube Url', 'soma'),
			'description' => __('Enter your Youtube URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'youtube_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tumblr_url_control',
		array(
			'label' => __('Tumblr Url', 'soma'),
			'description' => __('Enter your Tumblr URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'tumblr_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'linkedin_url_control',
		array(
			'label' => __('Linkedin Url', 'soma'),
			'description' => __('Enter your Linkedin URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'linkedin_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'behance_url_control',
		array(
			'label' => __('Behance Url', 'soma'),
			'description' => __('Enter your Behance URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'behance_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'flickr_url_control',
		array(
			'label' => __('Flickr Url', 'soma'),
			'description' => __('Enter your Flickr URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'flickr_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'spotify_url_control',
		array(
			'label' => __('Spotify Url', 'soma'),
			'description' => __('Enter your Spotify URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'spotify_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instagram_url_control',
		array(
			'label' => __('Instagram Url', 'soma'),
			'description' => __('Enter your Instagram URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'instagram_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'github_url_control',
		array(
			'label' => __('GitHub Url', 'soma'),
			'description' => __('Enter your GitHub URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'github_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'houzz_url_control',
		array(
			'label' => __('Houzz Url', 'soma'),
			'description' => __('Enter your Houzz URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'houzz_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'stackexchange_url_control',
		array(
			'label' => __('StackExchange Url', 'soma'),
			'description' => __('Enter your StackExchange URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'stackexchange_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'soundcloud_url_control',
		array(
			'label' => __('SoundCloud Url', 'soma'),
			'description' => __('Enter your SoundCloud URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'soundcloud_url',
			'type' => 'url'
		)
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vk_url_control',
		array(
			'label' => __('VK Url', 'soma'),
			'description' => __('Enter your VK URL.', 'soma'),
			'section' => 'social_media_options',
			'settings' => 'vk_url',
			'type' => 'url'
		)
	));
}
add_action('customize_register', 'soma_customize_options');