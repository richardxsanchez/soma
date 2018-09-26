<?php

/*
About Me - Visual Composer Element
*/

extract(
	shortcode_atts(
		array(
			'image' => '',
			'title' => '',
			'subtitle' => '',
			'alignment' => '1',
			'el_class' => '',
	        'css' => ''
		),
		$atts
	)
);

$soma_about_me = $atts;
$soma_about_me['class'] = 'about-me';
$soma_about_me['row_class'] = 'row';
$soma_about_me['image_class'] = 'col-lg-6';
$soma_about_me['content_class'] = 'col-lg-6 align-self-center';

// Image
if (!empty($soma_about_me['image'])) {
    $soma_about_me['image'] = wp_get_attachment_url($soma_about_me['image']);
}

// Alignment
if (empty($soma_about_me['alignment'])) {
    $soma_about_me['alignment'] = '1';
}

if ($soma_about_me['alignment'] == '1') {
    $soma_about_me['row_class'] .= ' flex-row-reverse';
}

// Extra Class
if (!empty($soma_about_me['el_class'])) {
	$soma_about_me['class'] .= ' ' . $soma_about_me['el_class'];
}

// CSS 
if (!empty($soma_about_me['css'])) {
	$soma_about_me['class'] .= ' ' . apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($soma_about_me['css'], ''), $this->settings['base'], $atts);
}
?>
<div class="<?php echo esc_attr($soma_about_me['class']) ?>"> 
    <div class="<?php echo esc_attr($soma_about_me['row_class']) ?>">
        <!-- Image -->
        <?php if (!empty($soma_about_me['image'])) : ?>
            <div class="<?php echo esc_attr($soma_about_me['image_class']) ?>">
                <!-- About Me Image -->
                <div class="about-me_image" style="background-image: url(<?php echo esc_url($soma_about_me['image']) ?>)"></div>
            </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="<?php echo esc_attr($soma_about_me['content_class']) ?>">
            <div class="lateral-content">
                <!-- About Me Title -->
                <?php if (!empty($soma_about_me['title'])) : ?>
                    <h3><?php echo esc_attr($soma_about_me['title']) ?></h3>
                <?php endif; ?>

                <!-- About Me Subtitle -->
                <?php if (!empty($soma_about_me['subtitle'])) : ?>
                    <h6><?php echo esc_attr($soma_about_me['subtitle']) ?></h6>
                <?php endif; ?>

                <!-- About Me Divider -->
                <hr>

                <!-- About Me Content -->
                <?php if ($content) : ?>
                    <p><?php echo ($content) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>