<?php

/*
Neuron Functions
*/

function soma_social_media($visibility, $type, $style, $delay, $position) {
    if ($visibility == '2') {
        return;
    }

    $soma_social_media_output = array();
    $soma_social_media_class = array('social-media');
    $soma_social_media_ul_class = '';

    // Type
    if ($type == '2') {
        $soma_social_media_class[] = 'type-text';
    } else {
        $soma_social_media_class[] = 'type-icon';
    }
    
    // Style
    switch ($style) {
        default:
            $soma_social_media_class[] = 'colorful';
            break;
        case '2':
            $soma_social_media_class[] = 'dark-color';
            break;
        case '3':
            $soma_social_media_class[] = 'light-color';
            break;
    }

    // Delay
    if ($delay == true) {
        $soma_social_media_class[] = 'item-delay_off';
    }

    // Position
    if ($position == 'header') {
        $soma_social_media_ul_class = 'd-flex justify-content-between';
    } elseif ($position == 'footer') {
        $soma_social_media_class[] = 'text-align_center';
    }

    // Social Media
    $soma_social_media = array(
        'facebook' => array(
            'url' => get_theme_mod('facebook_url'),
            'class' => 'facebook',
            'icon' => 'facebook-f',
            'text' => 'Facebook'
        ),
        'twitter' => array(
            'url' => get_theme_mod('twitter_url'),
            'class' => 'twitter',
            'icon' => 'twitter',
            'text' => 'Twitter'
        ),
        '500px' => array(
            'url' => get_theme_mod('500px_url'),
            'class' => 'i-500px',
            'icon' => '500px',
            'text' => '500px'
        ),
        'google_plus' => array(
            'url' => get_theme_mod('google_plus_url'),
            'class' => 'google-plus',
            'icon' => 'google-plus-g',
            'text' => 'Google Plus'
        ),
        'vimeo' => array(
            'url' => get_theme_mod('vimeo_url'),
            'class' => 'vimeo',
            'icon' => 'vimeo-v',
            'text' => 'Vimeo'
        ),
        'dribbble' => array(
            'url' => get_theme_mod('dribbble_url'),
            'class' => 'dribbble',
            'icon' => 'dribbble',
            'text' => 'Dribbble'
        ),
        'pinterest' => array(
            'url' => get_theme_mod('pinterest_url'),
            'class' => 'pinterest',
            'icon' => 'pinterest',
            'text' => 'Pinterest'
        ),
        'youtube' => array(
            'url' => get_theme_mod('youtube_url'),
            'class' => 'youtube',
            'icon' => 'youtube',
            'text' => 'Youtube'
        ),
        'tumblr' => array(
            'url' => get_theme_mod('tumblr_url'),
            'class' => 'tumblr',
            'icon' => 'tumblr',
            'text' => 'Tumblr'
        ),
        'linkedin' => array(
            'url' => get_theme_mod('linkedin_url'),
            'class' => 'linkedin',
            'icon' => 'linkedin-in',
            'text' => 'Linkedin'
        ),
        'behance' => array(
            'url' => get_theme_mod('behance_url'),
            'class' => 'behance',
            'icon' => 'behance',
            'text' => 'Behance'
        ),
        'flickr' => array(
            'url' => get_theme_mod('flickr_url'),
            'class' => 'flickr',
            'icon' => 'flickr',
            'text' => 'Flickr'
        ),
        'spotify' => array(
            'url' => get_theme_mod('spotify_url'),
            'class' => 'spotify',
            'icon' => 'spotify',
            'text' => 'Spotify'
        ),
        'instagram' => array(
            'url' => get_theme_mod('instagram_url'),
            'class' => 'instagram',
            'icon' => 'instagram',
            'text' => 'Instagram'
        ),
        'github' => array(
            'url' => get_theme_mod('github_url'),
            'class' => 'github',
            'icon' => 'github',
            'text' => 'GitHub'
        ),
        'houzz' => array(
            'url' => get_theme_mod('houzz_url'),
            'class' => 'houzz',
            'icon' => 'houzz',
            'text' => 'Houzz'
        ),
        'stackexchange' => array(
            'url' => get_theme_mod('stackexchange_url'),
            'class' => 'stack-exchange',
            'icon' => 'stack-exchange',
            'text' => 'StackExchange'
        ),
        'soundcloud' => array(
            'url' => get_theme_mod('soundcloud_url'),
            'class' => 'soundcloud',
            'icon' => 'soundcloud',
            'text' => 'Soundcloud'
        ),
        'vk' => array(
            'url' => get_theme_mod('vk_url'),
            'class' => 'vk',
            'icon' => 'vk',
            'text' => 'VK'
        ),
    );

    foreach ($soma_social_media as $social_media) {
        if (!empty($social_media['url'])) {
            $soma_social_media_output[] = $social_media;
        }
    }

    if (!empty($soma_social_media_output)) {
    ?>
        <div class="<?php echo esc_attr(implode(' ', $soma_social_media_class)) ?>">
            <ul class="<?php echo esc_attr($soma_social_media_ul_class) ?>">
            <?php
                foreach ($soma_social_media_output as $social_media) {
                    if ($type == '2') {
                    ?>
                        <li class="shadow <?php echo esc_attr($social_media['class']) ?>"><a href="<?php echo esc_url($social_media['url']) ?>"><?php echo esc_attr($social_media['text']) ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="<?php echo esc_attr($social_media['class']) ?>"><a href="<?php echo esc_url($social_media['url']) ?>"><i class="fab fa-<?php echo esc_attr($social_media['icon']) ?>"></i></a></li>
                    <?php
                    }
                }
            ?>
            </ul>
        </div>
    <?php
    }
}

// Get Attachment Alt
function soma_get_attachment_alt($soma_image_url) {
	return get_post_meta(attachment_url_to_postid($soma_image_url), '_wp_attachment_image_alt', true);
}

// Ajax Mini Cart
function soma_woocommerce_header_add_to_cart_fragment($fragments) {
    ob_start();
    ?>
        <span class="number">
            <?php echo sprintf('%d', WC()->cart->cart_contents_count); ?>
        </span>
    <?php
    $fragments['.bag-text .number'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'soma_woocommerce_header_add_to_cart_fragment');

// Active Sidebars
function soma_active_sidebars() {
    if (is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') || is_active_sidebar('footer-sidebar-4') || is_active_sidebar('footer-sidebar-5') || is_active_sidebar('footer-sidebar-6')) {
        return true;
    } else {
        return false;
    }
}

// Comments Open/Close
function soma_comments_open($soma_comment, $soma_comments_args, $soma_comment_depth) {
	switch ($soma_comment_depth) {
		case 1:
			$soma_comment_class = "col-md-12";
			break;
		case 2:
			$soma_comment_class = "col-md-11 offset-md-1";
			break;
		case 3:
			$soma_comment_class = "col-md-10 offset-md-2";
			break;
		case 4:
		default:
			$soma_comment_class = "col-md-9 offset-md-3";
			break;
	}

	if ($soma_comment->comment_type == 'pingback') {
		$soma_comment_class .= " no-avatar";
	}
?>
<div class="comment <?php echo esc_attr($soma_comment_class) ?>" id="comment-<?php echo esc_attr($soma_comment->comment_ID); ?>">
	<?php if($soma_comment->comment_type != 'pingback') : ?>
		<div class="comment-avatar  shadow">
			<?php echo get_avatar($soma_comment, 65) ?>
		</div>
	<?php endif; ?>
	<div class="comment-details">
		<div class="comment-name">
			<?php
				// Comment Author
				echo esc_html($soma_comment->comment_author);

				// Reply Link
				comment_reply_link(
					array_merge(
						$soma_comments_args,
						array(
							'reply_text' => __('reply', 'soma'),
							'depth' => $soma_comment_depth,
							'max_depth' => $soma_comments_args['max_depth'],
						)
					),
					$soma_comment
				);
			?>
		</div>
		<div class="comment-date">
			<?php comment_date('F j, Y ') . comment_date('g:i a') ?>
		</div>
		<div class="comment-text">
			<?php comment_text(); ?>
		</div>
	</div>
</div>
<?php
}

function soma_comments_close() {}

// Comment Form Row
function soma_comment_form_before() {
	?>
		<div class="row">
            <div class="col-12">
	<?php
}
add_action('comment_form_before', 'soma_comment_form_before');

function soma_comment_form_after() {
    ?>
            </div>
		</div>
	<?php
}
add_action('comment_form_after', 'soma_comment_form_after');

// Compress Text
function soma_compress($soma_input) {
	$soma_input = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $soma_input);
	$soma_input = str_replace(array( "\r\n", "\r", "\n", "\t", '	', '	', '	' ), '', $soma_input);

	return $soma_input;
}

// Generate Custom CSS in Footer
$soma_generate_custom_css_footer = array();
function soma_generate_custom_css_footer($soma_css) {
	global $soma_generate_custom_css_footer;

	$soma_generate_custom_css_footer[] = $soma_css;
}

function soma_generate_css() {
	global $soma_generate_custom_css_footer;

	if (!isset($soma_generate_custom_css_footer)) {
		return;
	}

	echo "<style>\n" . soma_compress(implode(PHP_EOL . PHP_EOL, $soma_generate_custom_css_footer)) . "\n</style>";
}
add_action('wp_footer', 'soma_generate_css');

// Generate Custom CSS in Header
$soma_generate_custom_css_head = array();
function soma_generate_custom_css_head($soma_css) {
	global $soma_generate_custom_css_head;

	$soma_generate_custom_css_head[] = $soma_css;
}

function soma_generate_css_head() {
	global $soma_generate_custom_css_head;

	if (!isset($soma_generate_custom_css_head)) {
		return;
	}

	echo "<style>\n" . soma_compress(implode(PHP_EOL . PHP_EOL, $soma_generate_custom_css_head)) . "\n</style>";
}
add_action('wp_head', 'soma_generate_css_head');

// Calculate Image
function soma_calculate_img($image) {
    $image_data = wp_get_attachment_image_src($image, 'full');
    
    return 'padding-bottom: '. number_format($image_data[2] / $image_data[1] * 100, 6) .'% !important;';
}

function soma_pagination($soma_pages = '', $soma_range = 4) {
	global $paged;
	$soma_showitems = ($soma_range * 2) + 1;

	if (empty($paged)) {
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
	}

	if ($soma_pages == '') {
		global $wp_query;
		$soma_pages = $wp_query->max_num_pages;

		if (!$soma_pages) {
			$soma_pages = 1;
		}
	}

	if (1 != $soma_pages) {
		echo "<div class='navigation row align-items-center'>";

        $soma_prev_class = 'prev col-3';
        $soma_next_class = 'next col-3 text-align_right';
		if ($paged <= 1) {
            $soma_prev_class = 'prev col-3 disabled';
        } 
        echo "<div class='". $soma_prev_class ."'><a href='". get_pagenum_link($paged - 1) ."'><h1>". esc_html__('Prev', 'soma') ."</h1></a></div>";

        echo "<ul class='col-6 text-align_center'>";
		for ($i = 1; $i <= $soma_pages; $i++) {
			if (1 != $soma_pages && (!($i >= $paged + $soma_range + 1 || $i <= $paged - $soma_range - 1) || $soma_pages <= $soma_showitems)) {
				echo ($paged == $i) ? "<li class=\"active\"><a>". $i ."</a></li>":"<li><a href='". get_pagenum_link($i) ."' class=\"inactive\">". $i ."</a></li>";
			}
		}

        $soma_pages_float = intval($soma_pages);
        echo "</ul>";


        if ($paged == $soma_pages_float) {
            $soma_next_class = 'next col-3 text-align_right disabled';
        }

        echo "<div class='". $soma_next_class ."'><a href='". get_pagenum_link($paged + 1) ."'><h1>" . esc_html__('Next', 'soma') . "</h1></a></div>";

		echo "</div>\n";
	}
}

add_action('woocommerce_product_query', 'soma_modify_woocommerce_query');
function soma_modify_woocommerce_query($q){
    $exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';
    $q->set('post__not_in', $exclude);
}

// Inherit Option
function soma_inherit_option($inherit, $customizer, $default_customizer, $queried_object = false) {
    if ($queried_object == true) {
        $inherit = get_field($inherit, get_queried_object());
    } else {
        $inherit = get_field($inherit);
    }

    $customizer = get_theme_mod($customizer, $default_customizer);

    if (!$inherit) {
        $inherit = '1';
    }

    if ($inherit == '1') {
        $inherit = $customizer;
    } else {
        $inherit = $inherit - 1;
    }
    
    return $inherit;
}

// Generate Custom Excerpt 
function soma_custom_excerpt() {
    $excerpt = explode(' ', get_the_excerpt(), 15);
    
    if (count($excerpt) >= 15) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

// Adds 'soma-link' class to previous and next post link
add_filter('next_post_link', 'soma_post_link_attributes');
add_filter('previous_post_link', 'soma_post_link_attributes');
function soma_post_link_attributes($output) {
    return str_replace('<a href=', '<a class="soma-link" href=', $output);
}

// Adds 'soma-link' class to the_category links
add_filter('the_category', 'soma_add_class_to_category', 10, 3);
function soma_add_class_to_category($thelist, $separator, $parents){
    return str_replace('<a href="', '<a class="soma-link" href="', $thelist);
}

// Posts Per Page Function
if (get_theme_mod('shop_ppp') && class_exists('WooCommerce')) {
    add_filter( 'loop_shop_per_page', 'soma_loop_shop_per_page', 20 );
    function soma_loop_shop_per_page( $cols ) {
        $cols = get_theme_mod('shop_ppp');
        return $cols;
    }
}

// Post Per Page Helper
if (isset($_GET['shop_ppp'])) {
    add_filter( 'loop_shop_per_page', 'soma_loop_shop_per_page_helper', 20 );
    function soma_loop_shop_per_page_helper( $cols ) {
        $cols = $_GET['shop_ppp'];
        return $cols;
    }
}
