<?php

/*
Social Media - Visual Composer Element
*/

extract(
	shortcode_atts(
		array(
			'type' => '1',
			'style' => '1',
			'url' => '1',
			'facebook_url' => '',
			'twitter_url' => '',
			'icon_500px_url' => '',
			'google_plus_url' => '',
			'vimeo_url' => '',
			'dribbble_url' => '',
			'pinterest_url' => '',
			'youtube_url' => '',
			'tumblr_url' => '',
			'linkedin_url' => '',
			'behance_url' => '',
			'flickr_url' => '',
			'spotify_url' => '',
			'instagram_url' => '',
			'github_url' => '',
			'houzz_url' => '',
			'stackexchange_url' => '',
			'soundcloud_url' => '',
			'vk_url' => '',
			'el_class' => '',
	        'css' => ''
		),
		$atts
	)
);

$soma_social_media = $atts;

$soma_social_media_output = array();
$soma_social_media_class = array('social-media');

// Social Media
$soma_social_media_array = array(
    'facebook' => array(
        'url_theme_options' => get_theme_mod('facebook_url'),
        'url_vc' => $facebook_url,
        'class' => 'facebook',
        'icon' => 'facebook-f',
        'text' => 'Facebook'
    ),
    'twitter' => array(
        'url_theme_options' => get_theme_mod('twitter_url'),
        'url_vc' => $twitter_url,
        'class' => 'twitter',
        'icon' => 'twitter',
        'text' => 'Twitter'
    ),
    '500px' => array(
        'url_theme_options' => get_theme_mod('500px_url'),
        'url_vc' => $icon_500px_url,
        'class' => 'i-500px',
        'icon' => '500px',
        'text' => '500px'
    ),
    'google_plus' => array(
       'url_theme_options' => get_theme_mod('google_plus_url'),
        'url_vc' => $google_plus_url,
        'class' => 'google-plus',
        'icon' => 'google-plus-g',
        'text' => 'Google Plus'
    ),
    'vimeo' => array(
        'url_theme_options' => get_theme_mod('vimeo_url'),
        'url_vc' => $vimeo_url,
        'class' => 'vimeo',
        'icon' => 'vimeo-v',
        'text' => 'Vimeo'
    ),
    'dribbble' => array(
        'url_theme_options' => get_theme_mod('dribbble_url'),
        'url_vc' => $dribbble_url,
        'class' => 'dribbble',
        'icon' => 'dribbble',
        'text' => 'Dribbble'
    ),
    'pinterest' => array(
        'url_theme_options' => get_theme_mod('pinterest_url'),
        'url_vc' => $pinterest_url,
        'class' => 'pinterest',
        'icon' => 'pinterest',
        'text' => 'Pinterest'
    ),
    'youtube' => array(
        'url_theme_options' => get_theme_mod('youtube_url'),
        'url_vc' => $youtube_url,
        'class' => 'youtube',
        'icon' => 'youtube',
        'text' => 'Youtube'
    ),
    'tumblr' => array(
       'url_theme_options' => get_theme_mod('tumblr_url'),
        'url_vc' => $tumblr_url,
        'class' => 'tumblr',
        'icon' => 'tumblr',
        'text' => 'Tumblr'
    ),
    'linkedin' => array(
        'url_theme_options' => get_theme_mod('linkedin_url'),
        'url_vc' => $linkedin_url,
        'class' => 'linkedin',
        'icon' => 'linkedin-in',
        'text' => 'Linkedin'
    ),
    'behance' => array(
        'url_theme_options' => get_theme_mod('behance_url'),
        'url_vc' => $behance_url,
        'class' => 'behance',
        'icon' => 'behance',
        'text' => 'Behance'
    ),
    'flickr' => array(
        'url_theme_options' => get_theme_mod('flickr_url'),
        'url_vc' => $flickr_url,
        'class' => 'flickr',
        'icon' => 'flickr',
        'text' => 'Flickr'
    ),
    'spotify' => array(
        'url_theme_options' => get_theme_mod('spotify_url'),
        'url_vc' => $spotify_url,
        'class' => 'spotify',
        'icon' => 'spotify',
        'text' => 'Spotify'
    ),
    'instagram' => array(
        'url_theme_options' => get_theme_mod('instagram_url'),
        'url_vc' => $instagram_url,
        'class' => 'instagram',
        'icon' => 'instagram',
        'text' => 'Instagram'
    ),
    'github' => array(
        'url_theme_options' => get_theme_mod('github_url'),
        'url_vc' => $github_url,
        'class' => 'github',
        'icon' => 'github',
        'text' => 'GitHub'
    ),
    'houzz' => array(
        'url_theme_options' => get_theme_mod('houzz_url'),
        'url_vc' => $houzz_url,
        'class' => 'houzz',
        'icon' => 'houzz',
        'text' => 'Houzz'
    ),
    'stackexchange' => array(
        'url_theme_options' => get_theme_mod('stackexchange_url'),
        'url_vc' => $stackexchange_url,
        'class' => 'stack-exchange',
        'icon' => 'stack-exchange',
        'text' => 'StackExchange'
    ),
    'soundcloud' => array(
        'url_theme_options' => get_theme_mod('soundcloud_url'),
        'url_vc' => $soundcloud_url,
        'class' => 'soundcloud',
        'icon' => 'soundcloud',
        'text' => 'Soundcloud'
    ),
    'vk' => array(
        'url_theme_options' => get_theme_mod('vk_url'),
        'url_vc' => $vk_url,
        'class' => 'vk',
        'icon' => 'vk',
        'text' => 'VK'
    ),
);

// Type
if (empty($soma_social_media['type'])) {
    $soma_social_media['type'] = '1';
}

if ($soma_social_media['type'] == '2') {
    $soma_social_media_class[] = 'type-text';
} else {
    $soma_social_media_class[] = 'type-icon';
}

// Style
if (empty($soma_social_media['style'])) {
    $soma_social_media['style'] = '1';
}

switch ($soma_social_media['style']) {
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

// URL
if (empty($soma_social_media['url'])) {
    $soma_social_media['url'] = '1';
}

foreach ($soma_social_media_array as $social_media) {
    if ($soma_social_media['url'] == '2') {
        $social_media['url'] = $social_media['url_vc'];
    } else {
        $social_media['url'] = $social_media['url_theme_options'];
    }

    if (!empty($social_media['url'])) {
        $soma_social_media_output[] = $social_media;
    }
}

// Extra Class
if (!empty($soma_social_media['el_class'])) {
	$soma_social_media_class[] = $soma_social_media['el_class'];
}

// CSS 
if (!empty($soma_social_media['css'])) {
	$soma_social_media_class[] = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($soma_social_media['css'], ''), $this->settings['base'], $atts);
}

if (!empty($soma_social_media_output)) {
?>
    <div class="<?php echo esc_attr(implode(' ', $soma_social_media_class)) ?>">
        <ul>
        <?php
            foreach ($soma_social_media_output as $social_media) {
                if ($soma_social_media['type'] == '2') {
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