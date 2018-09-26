<?php

/*
Team Member - Visual Composer Element
*/

global $columns, $animation, $soma_team_data_wow_seconds, $shadow;

extract(
	shortcode_atts(
		array(
			'image' => '',
			'title' => '',
			'subtitle' => '',
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
		),
		$atts
	)
);

$soma_team_member = $atts;
$soma_team_member['class'] = 'member';

// Social Media
$soma_social_media_output = array();
$soma_social_media_array = array(
    'facebook' => array(
        'url' => $facebook_url,
        'class' => 'facebook',
        'icon' => 'facebook-square',
        'text' => 'Facebook'
    ),
    'twitter' => array(
        'url' => $twitter_url,
        'class' => 'twitter',
        'icon' => 'twitter',
        'text' => 'Twitter'
    ),
    '500px' => array(
        'url' => $icon_500px_url,
        'class' => 'i-500px',
        'icon' => '500px',
        'text' => '500px'
    ),
    'google_plus' => array(
        'url' => $google_plus_url,
        'class' => 'google-plus',
        'icon' => 'google-plus',
        'text' => 'Google Plus'
    ),
    'vimeo' => array(
        'url' => $vimeo_url,
        'class' => 'vimeo',
        'icon' => 'vimeo',
        'text' => 'Vimeo'
    ),
    'dribbble' => array(
        'url' => $dribbble_url,
        'class' => 'dribbble',
        'icon' => 'dribbble',
        'text' => 'Dribbble'
    ),
    'pinterest' => array(
        'url' => $pinterest_url,
        'class' => 'pinterest',
        'icon' => 'pinterest',
        'text' => 'Pinterest'
    ),
    'youtube' => array(
        'url' => $youtube_url,
        'class' => 'youtube',
        'icon' => 'youtube',
        'text' => 'Youtube'
    ),
    'tumblr' => array(
        'url' => $tumblr_url,
        'class' => 'tumblr',
        'icon' => 'tumblr',
        'text' => 'Tumblr'
    ),
    'linkedin' => array(
        'url' => $linkedin_url,
        'class' => 'linkedin',
        'icon' => 'linkedin',
        'text' => 'Linkedin'
    ),
    'behance' => array(
        'url' => $behance_url,
        'class' => 'behance',
        'icon' => 'behance',
        'text' => 'Behance'
    ),
    'flickr' => array(
        'url' => $flickr_url,
        'class' => 'flickr',
        'icon' => 'flickr',
        'text' => 'Flickr'
    ),
    'spotify' => array(
        'url' => $spotify_url,
        'class' => 'spotify',
        'icon' => 'spotify',
        'text' => 'Spotify'
    ),
    'instagram' => array(
        'url' => $instagram_url,
        'class' => 'instagram',
        'icon' => 'instagram',
        'text' => 'Instagram'
    ),
    'github' => array(
        'url' => $github_url,
        'class' => 'github',
        'icon' => 'github',
        'text' => 'GitHub'
    ),
    'houzz' => array(
        'url' => $houzz_url,
        'class' => 'houzz',
        'icon' => 'houzz',
        'text' => 'Houzz'
    ),
    'stackexchange' => array(
        'url' => $stackexchange_url,
        'class' => 'stack-exchange',
        'icon' => 'stack-exchange',
        'text' => 'StackExchange'
    ),
    'soundcloud' => array(
        'url' => $soundcloud_url,
        'class' => 'soundcloud',
        'icon' => 'soundcloud',
        'text' => 'Soundcloud'
    ),
    'vk' => array(
        'url' => $vk_url,
        'class' => 'vk',
        'icon' => 'vk',
        'text' => 'VK'
    ),
);

foreach ($soma_social_media_array as $social_media) {
    if (!empty($social_media['url'])) {
        $soma_social_media_output[] = $social_media;
    }
}

// Columns
switch ($columns) {
	case '1':
		$soma_team_member['column'] = 'col-12';
		break;
	default:
		$soma_team_member['column'] = 'col-xl-6';
		break;
}

// Animation
if ($animation == '2' || $animation == '3') {
    $soma_team_member['class'] .= ' wow fadeInNeuron';
} elseif ($animation == '4' || $animation == '5') {
    $soma_team_member['class'] .= ' wow fadeInUpNeuron';
}

// Data Delay
if ($soma_team_data_wow_seconds == 10) {
    $soma_team_data_wow_seconds = 0;
}

// Shadow
if ($shadow == '1') {
    $soma_team_member['class'] .= ' shadow';
}

$soma_team_data_wow = 'data-wow-delay="0.'. $soma_team_data_wow_seconds .'s"';
?>
<div class="selector <?php echo esc_attr($soma_team_member['column']) ?>">
	<div class="<?php echo esc_attr($soma_team_member['class']) ?>" <?php echo !empty($soma_team_data_wow_seconds) && ($animation == '3' || $animation == '5') ? $soma_team_data_wow  : ''; ?>>
		<div class="member-holder">
            <div class="member-entry_overlay">
                <?php 
                    // Image
                    if (!empty($soma_team_member['image'])) {
                    ?>
                        <div class="member-entry_media calculated-image" style="<?php echo esc_attr(soma_calculate_img($image)) ?>">
                            <img src="<?php echo esc_url(wp_get_attachment_url($soma_team_member['image'])) ?>" alt="<?php echo esc_attr(soma_get_attachment_alt(wp_get_attachment_url($soma_team_member['image']))) ?>">
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="member-entry_media">
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/default-placeholder.png' ?>">
                        </div>
                    <?php
                    }
                ?>
                <div class="member-overlay"></div>
            </div>
            <div class="member-overlay_wrap">
                <?php 
                    if (!empty($soma_social_media_output)) :
                ?>
                    <div class="social-media item-delay_off">
                        <ul>
                            <?php
                                foreach ($soma_social_media_output as $social_media) { 
                                ?>
                                    <li><a href="<?php echo esc_url($social_media['url']) ?>" class="<?php echo esc_attr($social_media['class']) ?>"><i class="fab fa-<?php echo esc_attr($social_media['icon']) ?>"></i></a></li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                <?php
                    endif;
                ?>
                <div class="member-content">
                    <?php
                        // Title
                        if (!empty($soma_team_member['title'])) {
                            echo '<h4>'. esc_attr($soma_team_member['title']) .'</h4>';
                        }
                    ?>
                    <?php
                        // Subtitle
                        if (!empty($soma_team_member['subtitle'])) {
                            echo '<span>'. esc_attr($soma_team_member['subtitle']) .'</span>';
                        }
                    ?>
                </div>
            </div>
        </div>
	</div>
</div>
<?php
$soma_team_data_wow_seconds = $soma_team_data_wow_seconds + 2;