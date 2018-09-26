<?php

/*
Visual Composer Elements by NeuronThemes
*/

// Removes ACF Element
if( function_exists('vc_remove_element') ){ 
    vc_remove_element('vc_acf');
    vc_remove_element('woocommerce_cart');
    vc_remove_element('woocommerce_checkout');
    vc_remove_element('woocommerce_order_tracking');
    vc_remove_element('woocommerce_my_account');
    vc_remove_element('recent_products');
    vc_remove_element('featured_products');
    vc_remove_element('product');
    vc_remove_element('products');
    vc_remove_element('product_attribute');
    vc_remove_element('add_to_cart');
    vc_remove_element('add_to_cart_url');
    vc_remove_element('product_categories');
    vc_remove_element('product_page');
    vc_remove_element('product_category');
    vc_remove_element('sale_products');
    vc_remove_element('best_selling_products');
    vc_remove_element('top_rated_products');
}

// Creates a multi select for categories
vc_add_shortcode_param('soma_multi_select', 'soma_multi_select_settings');
function soma_multi_select_settings($param, $value) {
    $output = '';
    $output .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
            foreach ( $param['value'] as $text_val => $val ) {
                if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
                    $text_val = $val;
                }
                $selected = '';

                if(!is_array($value)) {
                    $param_value_arr = explode(',',$value);
                } else {
                    $param_value_arr = $value;
                }
                
                if ($value!=='' && in_array($val, $param_value_arr)) {
                    $selected = ' selected="selected"';
                }
                $output .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
            }
            $output .= '</select>';

    return $output;
}

// Get Blog Categories
$soma_blog_categories = array('All' => 'all');
if(is_admin()) {
    foreach (get_categories() as $term) {
        $soma_blog_categories[$term->name] = $term->slug;
    }
} else {
    $soma_blog_categories['All'] = 'all';
}

// Blog
class WPBakeryShortCode_Soma_Blog extends WPBakeryShortCode {}
vc_map(
    array(
        'name' => __('Blog', 'soma'),
        'base' => 'soma_blog',
        'description' => __('Display a blog.', 'soma'),
        'category' => __('NeuronElements', 'soma'),
        'icon' => get_template_directory_uri() . '/includes/vc/vc-icon.png',
        'params' => array(
            array(
                'type' => 'soma_multi_select',
                'heading' => __('Categories', 'soma'),
                'param_name' => 'categories',
                'value' => $soma_blog_categories,
                'description' => __('Select the categories from where you want to get the posts from.', 'soma'),
                'admin_label' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Posts Per Page', 'soma'),
                'param_name' => 'posts_per_page',
                'description' => __('Write how many posts per page you want, default is 10. Enter -1 if you want to show them all.', 'soma'),
                'admin_label' => true
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Columns', 'soma'),
                'param_name' => 'columns',
                'description' => __('Select the columns of Blog, default is one column.', 'soma'),
                'value' => array(
                    __('Inherit from Theme Options', 'soma') => '1',
                    __('One Column', 'soma') => '2',
                    __('2 Columns', 'soma') => '3',
                    __('3 Columns', 'soma') => '4',
                    __('4 Columns', 'soma') => '5'
                ),
                'group' => __('Style', 'soma'),
                'std' => '1',
                'admin_label' => true
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Sidebar', 'soma'),
                'param_name' => 'sidebar',
                'description' => __('Select the alignment of sidebar or hide it.', 'soma'),
                'value' => array(
                    __('Inherit from Theme Options', 'soma') => '1',
                    __('Left', 'soma') => '2',
                    __('Right', 'soma') => '3',
                    __('Hide', 'soma') => '4'
                ),
                'group' => __('Style', 'soma'),
                'std' => '1',
                'admin_label' => true
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Offset', 'soma'),
                'param_name' => 'offset',
                'description' => __('Enable or disable the offset layout, first and third post will get top spacing.', 'soma'),
                'value' => array(
                    __('Inherit from Theme Options', 'soma') => '1',
                    __('Enable', 'soma') => '2',
                    __('Disable', 'soma') => '3'
                ),
                'group' => __('Style', 'soma'),
                'std' => '1'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Shadow', 'soma'),
                'param_name' => 'shadow',
                'description' => __('Show or hide posts shadow in blog.', 'soma'),
                'value' => array(
                    __('Inherit from Theme Options', 'soma') => '1',
                    __('Show', 'soma') => '2',
                    __('Hide', 'soma') => '3'
                ),
                'group' => __('Style', 'soma'),
                'std' => '1'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Pagination', 'soma'),
                'param_name' => 'pagination',
                'description' => __('Select the pagination type.', 'soma'),
                'value' => array(
                    __('Inherit from Theme Options', 'soma') => '1',
                    __('Normal', 'soma') => '2',
                    __('Show More', 'soma') => '3'
                ),
                'group' => __('Style', 'soma'),
                'std' => '1'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Initial Loading Animation', 'soma'),
                'param_name' => 'animation',
                'description' => __('Select initial loading animation for posts.', 'soma'),
                'value' => array(
                    __('None', 'soma') => '1',
                    __('Fade In', 'soma') => '2',
                    __('Fade In (with delay)', 'soma') => '3',
                    __('Fade In Up', 'soma') => '4',
                    __('Fade In Up (with delay)', 'soma') => '5'
                ),
                'group' => __('Style', 'soma'),
                'std' => '1'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra Class', 'soma'),
                'param_name' => 'el_class',
                'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'soma'),
                'group' => __('Style', 'soma')
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('CSS', 'soma'),
                'param_name' => 'css',
                'group' => __('Design Options', 'soma')
            ),
        )
    )
);

// Social Media
class WPBakeryShortCode_Soma_Social_Media extends WPBakeryShortCode {}
vc_map(
    array(
        'name' => __('Social Media', 'soma'),
        'base' => 'soma_social_media',
        'description' => __('Display social medias.', 'soma'),
        'category' => __('NeuronElements', 'soma'),
        'icon' => get_template_directory_uri() . '/includes/vc/vc-icon.png',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => __('Type', 'soma'),
                'param_name' => 'type',
                'description' => __('Select if you want the social media to be plain text or icons.', 'soma'),
                'value' => array(
                    __('Icons', 'soma') => '1',
                    __('Text', 'soma') => '2'
                ),
                'std' => '1',
                'admin_label' => true
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Style', 'soma'),
                'param_name' => 'style',
                'description' => __('Select the style of social media.', 'soma'),
                'value' => array(
                    __('Colorful', 'soma') => '1',
                    __('Dark', 'soma') => '2',
                    __('Light', 'soma') => '3'
                ),
                'std' => '1',
                'admin_label' => true
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('URL', 'soma'),
                'param_name' => 'url',
                'description' => __('Inherit the URL\'s from Theme Options or enter them only for this element.', 'soma'),
                'value' => array(
                    __('Inherit from Theme Options', 'soma') => '1',
                    __('Custom', 'soma') => '2'
                ),
                'std' => '1',
                'admin_label' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Facebook URL', 'soma'),
                'param_name' => 'facebook_url',
                'description' => __('Enter the Facebook URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Twitter URL', 'soma'),
                'param_name' => 'twitter_url',
                'description' => __('Enter the Twitter URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('500px URL', 'soma'),
                'param_name' => 'icon_500px_url',
                'description' => __('Enter the 500px URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Google Plus URL', 'soma'),
                'param_name' => 'google_plus_url',
                'description' => __('Enter the Google Plus URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Vimeo URL', 'soma'),
                'param_name' => 'vimeo_url',
                'description' => __('Enter the Vimeo URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Dribbble URL', 'soma'),
                'param_name' => 'dribbble_url',
                'description' => __('Enter the Dribbble URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Pinterest URL', 'soma'),
                'param_name' => 'pinterest_url',
                'description' => __('Enter the Pinterest URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Youtube URL', 'soma'),
                'param_name' => 'youtube_url',
                'description' => __('Enter the Youtube URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Tumblr URL', 'soma'),
                'param_name' => 'tumblr_url',
                'description' => __('Enter the Tumblr URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Linkedin URL', 'soma'),
                'param_name' => 'linkedin_url',
                'description' => __('Enter the Linkedin URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Behance URL', 'soma'),
                'param_name' => 'behance_url',
                'description' => __('Enter the Behance URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Flickr URL', 'soma'),
                'param_name' => 'flickr_url',
                'description' => __('Enter the Flickr URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Spotify URL', 'soma'),
                'param_name' => 'spotify_url',
                'description' => __('Enter the Spotify URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Instagram URL', 'soma'),
                'param_name' => 'instagram_url',
                'description' => __('Enter the Instagram URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('GitHub URL', 'soma'),
                'param_name' => 'github_url',
                'description' => __('Enter the GitHub URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Houzz URL', 'soma'),
                'param_name' => 'houzz_url',
                'description' => __('Enter the Houzz URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('StackExchange URL', 'soma'),
                'param_name' => 'stackexchange_url',
                'description' => __('Enter the StackExchange URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Soundcloud URL', 'soma'),
                'param_name' => 'soundcloud_url',
                'description' => __('Enter the Soundcloud URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('VK URL', 'soma'),
                'param_name' => 'vk_url',
                'description' => __('Enter the VK URL.', 'soma'),
                'dependency' => array('element' => 'url', 'value' => '2')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra Class', 'soma'),
                'param_name' => 'el_class',
                'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'soma')
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('CSS', 'soma'),
                'param_name' => 'css',
                'group' => __('Design Options', 'soma')
            ),
        )
    )
);

// About Me
class WPBakeryShortCode_Soma_About_Me extends WPBakeryShortCode {}
vc_map(
    array(
        'name' => __('About Me', 'soma'),
        'base' => 'soma_about_me',
        'description' => __('Display an about me.', 'soma'),
        'category' => __('NeuronElements', 'soma'),
        'icon' => get_template_directory_uri() . '/includes/vc/vc-icon.png',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'soma'),
                'param_name' => 'image',
                'description' => __('Upload the image.', 'soma')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'soma'),
                'param_name' => 'title',
                'description' => __('Enter the title.', 'soma')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Subtitle', 'soma'),
                'param_name' => 'subtitle',
                'description' => __('Enter the subtitle.', 'soma')
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __('Description', 'soma'),
                'param_name' => 'content',
                'description' => __('Enter the description.', 'soma')
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Alignment', 'soma'),
                'description' => __('Select the alignment of content.', 'soma'),
                'param_name' => 'alignment',
                'value' => array(
                    __('Left', 'soma') => '1',
                    __('Right', 'soma') => '2'
                ),
                'std' => '1'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra Class', 'soma'),
                'param_name' => 'el_class',
                'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'soma')
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('CSS', 'soma'),
                'param_name' => 'css',
                'group' => __('Design Options', 'soma')
            ),
        )
    )
);

// Team Members
class WPBakeryShortCode_Soma_Team_Members extends WPBakeryShortCodesContainer {}
vc_map(
    array(
        'name' => __('Team Members', 'soma'),
        'base' => 'soma_team_members',
        'category' => __('NeuronElements', 'soma'),
        'description' => __('Display team members.', 'soma'),
        'as_parent' => array('only' => 'soma_team_member'),
        'is_container' => true,
        'js_view' => 'VcColumnView',
        'icon' => get_template_directory_uri() . '/includes/vc/vc-icon.png',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'soma'),
                'param_name' => 'title',
                'description' => __('Enter the title.', 'soma')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Subtitle', 'soma'),
                'param_name' => 'subtitle',
                'description' => __('Enter the subtitle.', 'soma')
            ),
            array(
                'type' => 'textarea',
                'heading' => __('Description', 'soma'),
                'param_name' => 'description',
                'description' => __('Enter the description.', 'soma')
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Columns', 'soma'),
                'description' => __('Select the columns of team members.', 'soma'),
                'param_name' => 'columns',
                'value' => array(
                    __('One Column', 'soma') => '1',
                    __('2 Columns', 'soma') => '2'
                ),
                'std' => '2'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Background Color', 'soma'),
                'param_name' => 'background_color',
                'description' => __('Change the background color of team members holder.', 'soma')
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Alignment', 'soma'),
                'description' => __('Select the alignment of content.', 'soma'),
                'param_name' => 'alignment',
                'value' => array(
                    __('Left', 'soma') => '1',
                    __('Right', 'soma') => '2'
                ),
                'std' => '1'
            ),
             array(
                'type' => 'dropdown',
                'heading' => __('Shadow', 'soma'),
                'description' => __('Show or hide team members shadow.', 'soma'),
                'param_name' => 'shadow',
                'value' => array(
                    __('Show', 'soma') => '1',
                    __('Hide', 'soma') => '2'
                ),
                'std' => '1'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Initial Loading Animation', 'soma'),
                'description' => __('Select the initial loading animation for team members.', 'soma'),
                'param_name' => 'animation',
                'value' => array(
                    __('None', 'soma') => '1',
                    __('Fade In', 'soma') => '2',
                    __('Fade In (with delay)', 'soma') => '3',
                    __('Fade In Up', 'soma') => '4',
                    __('Fade In Up (with delay)', 'soma') => '5'
                ),
                'std' => '1'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra Class', 'soma'),
                'param_name' => 'el_class',
                'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'soma')
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('CSS', 'soma'),
                'param_name' => 'css',
                'group' => __('Design Options', 'soma')
            ),
        )
    )
);
class WPBakeryShortCode_Soma_Team_Member extends WPBakeryShortCode {}
vc_map(
    array(
        'name' => __('Team Member', 'soma'),
        'base' => 'soma_team_member',
        'category' => __('NeuronElements', 'soma'),
        'as_child' => array('only' => 'soma_team_members'),
        'icon' => get_template_directory_uri() . '/includes/vc/vc-icon.png',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'soma'),
                'param_name' => 'image',
                'description' => __('Upload the image for this team member.', 'soma')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'soma'),
                'param_name' => 'title',
                'description' => __('Enter the title for this team member.', 'soma')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Subtitle', 'soma'),
                'param_name' => 'subtitle',
                'description' => __('Enter the subtitle for this team member.', 'soma')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Facebook URL', 'soma'),
                'param_name' => 'facebook_url',
                'description' => __('Enter your Facebook URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Twitter URL', 'soma'),
                'param_name' => 'twitter_url',
                'description' => __('Enter your Twitter URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('500px URL', 'soma'),
                'param_name' => 'icon_500px_url',
                'description' => __('Enter your 500px URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Google Plus URL', 'soma'),
                'param_name' => 'google_plus_url',
                'description' => __('Enter your Google Plus URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Vimeo URL', 'soma'),
                'param_name' => 'vimeo_url',
                'description' => __('Enter your Vimeo URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Dribbble URL', 'soma'),
                'param_name' => 'dribbble_url',
                'description' => __('Enter your Dribbble URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Pinterest URL', 'soma'),
                'param_name' => 'pinterest_url',
                'description' => __('Enter your Pinterest URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Youtube URL', 'soma'),
                'param_name' => 'youtube_url',
                'description' => __('Enter your Youtube URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Tumblr URL', 'soma'),
                'param_name' => 'tumblr_url',
                'description' => __('Enter your Tumblr URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Linkedin URL', 'soma'),
                'param_name' => 'linkedin_url',
                'description' => __('Enter your Linkedin URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Behance URL', 'soma'),
                'param_name' => 'behance_url',
                'description' => __('Enter your Behance URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Flickr URL', 'soma'),
                'param_name' => 'flickr_url',
                'description' => __('Enter your Flickr URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Spotify URL', 'soma'),
                'param_name' => 'spotify_url',
                'description' => __('Enter your Spotify URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Instagram URL', 'soma'),
                'param_name' => 'instagram_url',
                'description' => __('Enter your Instagram URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('GitHub URL', 'soma'),
                'param_name' => 'github_url',
                'description' => __('Enter your GitHub URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('StackExchange  URL', 'soma'),
                'param_name' => 'stackexchange_url',
                'description' => __('Enter your StackExchange URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('SoundCloud  URL', 'soma'),
                'param_name' => 'soundcloud_url',
                'description' => __('Enter your SoundCloud URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('VK  URL', 'soma'),
                'param_name' => 'vk_url',
                'description' => __('Enter your VK URL.', 'soma'),
                'group' => __('Social Media', 'soma'),
            ),
        )
    )
);

// Button
class WPBakeryShortCode_Soma_Button extends WPBakeryShortCode {}
vc_map(
    array(
        'name' => __('Button', 'soma'),
        'base' => 'soma_button',
        'description' => __('Display a button.', 'soma'),
        'category' => __('NeuronElements', 'soma'),
        'icon' => get_template_directory_uri() . '/includes/vc/vc-icon.png',
        'params' => array(
            array(
                'type' => 'vc_link',
                'heading' => __('Link', 'soma'),
                'description' => __('Select the link attributes.', 'soma'),
                'param_name' => 'link'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Size', 'soma'),
                'description' => __('Select the size of button.', 'soma'),
                'param_name' => 'size',
                'value' => array(
                    __('Small', 'soma') => '1',
                    __('Normal', 'soma') => '2',
                    __('Large', 'soma') => '3'
                ),
                'std' => '2'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Fluid', 'soma'),
                'description' => __('Select if you want to the button to get the width of column.', 'soma'),
                'param_name' => 'fluid',
                'value' => array(
                    __('Yes', 'soma') => '1',
                    __('No', 'soma') => '2'
                ),
                'std' => '2'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Color', 'soma'),
                'description' => __('Select the style of button, or select a custom color.', 'soma'),
                'param_name' => 'color',
                'value' => array(
                    __('Light', 'soma') => '1',
                    __('Dark', 'soma') => '2',
                    __('Grey', 'soma') => '3',
                    __('Light Grey', 'soma') => '4',
                    __('Green', 'soma') => '5',
                    __('Red', 'soma') => '6',
                    __('Blue', 'soma') => '7',
                    __('Light Blue', 'soma') => '8',
                    __('Custom', 'soma') => '9'
                ),
                'std' => '2'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Text Color', 'soma'),
                'param_name' => 'color_text',
                'description' => __('Change the color the text and the borders of button.', 'soma'),
                'dependency' => array('element' => 'color', 'value' => '9')
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Background Color', 'soma'),
                'param_name' => 'color_bg',
                'description' => __('Change the background color of button.', 'soma'),
                'dependency' => array('element' => 'color', 'value' => '9')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra class name', 'soma'),
                'param_name' => 'el_class',
                'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'soma')
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('CSS', 'soma'),
                'param_name' => 'css',
                'group' => __('Design Options', 'soma')
            )
        )
    )
);

// Service
class WPBakeryShortCode_Soma_Service extends WPBakeryShortCode {}
vc_map(
    array(
        'name' => __('Service', 'soma'),
        'base' => 'soma_service',
        'description' => __('Display a service.', 'soma'),
        'category' => __('NeuronElements', 'soma'),
        'icon' => get_template_directory_uri() . '/includes/vc/vc-icon.png',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => __('Icon', 'soma'),
                'param_name' => 'icon',
                'description' => __('Select the icon pack of service.', 'soma'),
                'value' => array(
                    __('Open Iconic', 'soma') => '1',
                    __('Typicons', 'soma') => '2',
                    __('Entypo', 'soma') => '3',
                    __('Linecons', 'soma') => '4',
                    __('Mono Social', 'soma') => '5',
                    __('Material', 'soma') => '6'
                ),
                'std' => '1',
                'admin_label' => true,
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __('Open Iconic', 'soma'),
                'param_name' => 'icon_open_iconic',
                'settings' => array(
                    'iconsPerPage' => 100,
                    'type' => 'openiconic',
                ),
                'description' => __('Select the opcenic icon for your service.', 'soma'),
                'dependency' => array('element' => 'icon', 'value' => '1')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __('Typicons', 'soma'),
                'param_name' => 'icon_typicons',
                'settings' => array(
                    'iconsPerPage' => 100,
                    'type' => 'typicons',
                ),
                'description' => __('Select the typicons icon for your service.', 'soma'),
                'dependency' => array('element' => 'icon', 'value' => '2')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __('Entypo', 'soma'),
                'param_name' => 'icon_entypo',
                'settings' => array(
                    'iconsPerPage' => 100,
                    'type' => 'entypo',
                ),
                'description' => __('Select the entypo icon for your service.', 'soma'),
                'dependency' => array('element' => 'icon', 'value' => '3')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __('Linecons', 'soma'),
                'param_name' => 'icon_linecons',
                'settings' => array(
                    'iconsPerPage' => 100,
                    'type' => 'linecons',
                ),
                'description' => __('Select the linecons icon for your service.', 'soma'),
                'dependency' => array('element' => 'icon', 'value' => '4'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __('Mono Social', 'soma'),
                'param_name' => 'icon_mono_social',
                'settings' => array(
                    'iconsPerPage' => 100,
                    'type' => 'monosocial',
                ),
                'description' => __('Select the monosocial icon for your service.', 'soma'),
                'dependency' => array('element' => 'icon', 'value' => '5')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __('Material', 'soma'),
                'param_name' => 'icon_material',
                'settings' => array(
                    'iconsPerPage' => 100,
                    'type' => 'material',
                ),
                'description' => __('Select the material icon for your service.', 'soma'),
                'dependency' => array('element' => 'icon', 'value' => '6')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'soma'),
                'param_name' => 'title',
                'description' => __('Enter the title of service.', 'soma')
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __('Content', 'soma'),
                'param_name' => 'content',
                'description' => __('Enter the content of this service.', 'soma')
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Initial loading animation', 'soma'),
                'param_name' => 'animation',
                'description' => __('Select initial loading animation for the service.', 'soma'),
                'admin_label' => true,
                'value' => array(
                    __('None', 'soma') => '1',
                    __('Fade In', 'soma') => '2',
                    __('Fade In Up', 'soma') => '3'
                ),
                'std' => '1',
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Data WOW Delay', 'soma'),
                'param_name' => 'data_wow_delay',
                'description' => __('Select if you want the elements to come with delay when initial loading animation is selected.<br><small>Note: This option wont work if no initial loading animation is selected.</small>', 'soma'),
                'value' => array(
                    __('None', 'soma') => '1',
                    __('0.15 seconds', 'soma') => '2',
                    __('0.3 seconds', 'soma') => '3',
                    __('0.45 seconds', 'soma') => '4',
                    __('0.6 seconds', 'soma') => '5',
                    __('0.75 second', 'soma') => '6',
                    __('Custom', 'soma') => '7'
                ),
                'std' => '1',
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Custom Seconds', 'soma'),
                'param_name' => 'data_wow_delay_custom',
                'description' => __('Enter the number of custom seconds.', 'soma'),
                'dependency' => array('element' => 'data_wow_delay', 'value' => '7')
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra class name', 'soma'),
                'param_name' => 'el_class',
                'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'soma')
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('CSS', 'soma'),
                'param_name' => 'css',
                'group' => __('Design Options', 'soma')
            )
        )
    )
);

// Row
$soma_custom_rows = array(
    array(
        'type' => 'dropdown',
    	'heading' => __('Left and Right Spacing', 'soma'),
        'group' => __('Extra Options', 'soma'),
        'description' => __('Select the left and right spacing of this row.', 'soma'),
    	'param_name' => 'row_side_spacing',
    	'value' => array(
    		__('0 pixel', 'soma') => '1',
    		__('30 pixels', 'soma') => '2',
    		__('50 pixels', 'soma') => '3',
    		__('75 pixels', 'soma') => '4',
    		__('100 pixels', 'soma') => '5'
    	),
        'std' => '1'
    ),
    array(
        'type' => 'dropdown',
    	'heading' => __('Top Spacing', 'soma'),
        'group' => __('Extra Options', 'soma'),
        'description' => __('Select the top spacing of this row.', 'soma'),
    	'param_name' => 'row_top_spacing',
    	'value' => array(
    		__('0 pixel', 'soma') => '1',
    		__('30 pixels', 'soma') => '2',
    		__('50 pixels', 'soma') => '3',
            __('75 pixels', 'soma') => '4',
    		__('100 pixels', 'soma') => '5'
    	),
        'std' => '3'
    ),
    array(
        'type' => 'dropdown',
    	'heading' => __('Bottom Spacing', 'soma'),
        'group' => __('Extra Options', 'soma'),
        'description' => __('Select the bottom spacing of this row.', 'soma'),
    	'param_name' => 'row_bottom_spacing',
    	'value' => array(
    		__('0 pixel', 'soma') => '1',
    		__('30 pixels', 'soma') => '2',
    		__('50 pixels', 'soma') => '3',
            __('75 pixels', 'soma') => '4',
    		__('100 pixels', 'soma') => '5'
    	),
        'std' => '3'
    ),
    array(
        'type' => 'dropdown',
    	'heading' => __('Alignment', 'soma'),
        'group' => __('Extra Options', 'soma'),
        'description' => __('Select the alignment of this row.', 'soma'),
    	'param_name' => 'row_alignment',
    	'value' => array(
    		__('Left', 'soma') => '1',
    		__('Center', 'soma') => '2',
            __('Right', 'soma') => '3'
    	),
        'std' => '1'
    )
);
vc_add_params('vc_row', $soma_custom_rows);