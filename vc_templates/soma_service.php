<?php

/*
Service - Visual Composer Element
*/

extract(
	shortcode_atts(
		array(
            'icon' => '1',
			'icon_open_iconic' => '',
			'icon_typicons' => '',
			'icon_entypo' => '',
			'icon_linecons' => '',
			'icon_mono_social' => '',
			'icon_material' => '',
			'title' => '',
			'animation' => '1',
			'data_wow_delay' => '1',
			'data_wow_delay_custom' => '',
			'el_class' => '',
	        'css' => ''
		),
		$atts
	)
);

$soma_service = $atts;
$soma_service['class'] = 'service shadow';

// Icon
if (empty($soma_service['icon'])) {
    $soma_service['icon'] = '1';
}

switch ($soma_service['icon']) {
	case '1':
		$soma_service['icon_display'] = $icon_open_iconic;
		wp_enqueue_style('vc_openiconic');
		break;
	case '2':
		$soma_service['icon_display'] = $icon_typicons;
		wp_enqueue_style('vc_typicons');
		break;
	case '3':
		$soma_service['icon_display'] = $icon_entypo;
		wp_enqueue_style('vc_entypo');
		break;
	case '4':
		$soma_service['icon_display'] = $icon_linecons;
		wp_enqueue_style('vc_linecons');
		break;
	case '5':
		$soma_service['icon_display'] = $icon_mono_social;
		wp_enqueue_style('vc_monosocialiconsfont');
		break;
	case '6':
		$soma_service['icon_display'] = $icon_material;
		wp_enqueue_style('vc_material');
		break;
}

// Animation
if (empty($soma_service['animation'])) {
	$soma_service['animation'] = '1';
}

if ($soma_service['animation'] == '2') {
	$soma_service['class'] .= ' wow fadeInNeuron';
} elseif ($soma_service['animation'] == '3') {
	$soma_service['class'] .= ' wow fadeInUpNeuron';
}

// Data WOW Delay
if (empty($soma_service['data_wow_delay'])) {
	$soma_service['data_wow_delay'] = '1';
}

if ($soma_service['data_wow_delay'] != '1') {
	if ($soma_service['data_wow_delay'] == '7' && $soma_service['data_wow_delay_custom']) {
		$soma_service['data_wow_seconds'] = $soma_service['data_wow_delay_custom']*100;
	} else {
		switch ($soma_service['data_wow_delay']) {
			case '2':
				$soma_service['data_wow_seconds'] = "15";
				break;
			case '3':
				$soma_service['data_wow_seconds'] = "30";
				break;
			case '4':
				$soma_service['data_wow_seconds'] = "45";
				break;
			case '5':
				$soma_service['data_wow_seconds'] = "60";
				break;
			case '6':
				$soma_service['data_wow_seconds'] = "75";
				break;
		}
	}
}

// Extra Class
if (!empty($soma_service['el_class'])) {
	$soma_service['class'] .= ' ' . $soma_service['el_class'];
}

// CSS 
if (!empty($soma_service['css'])) {
	$soma_service['class'] .= ' ' . apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($soma_service['css'], ''), $this->settings['base'], $atts);
}

?>
<div class="<?php echo esc_attr($soma_service['class']) ?>" <?php echo esc_attr(!empty($soma_service['data_wow_seconds']) ? "data-wow-delay=". $soma_service['data_wow_seconds']/100 ."s" : "") ?>>
    <div class="service-holder">
		<?php if (!empty($soma_service['icon_display'])) : ?>
			<div class="icon">
				<i class="<?php echo esc_attr($soma_service['icon_display']) ?>"></i>
			</div>
		<?php endif; ?>

		<?php 
			// Title
			if (!empty($soma_service['title'])) {
				echo '<h4>' . esc_attr($soma_service['title']) . '</h4>';
			}

			// Content
			if ($content) {
				echo sprintf('<p>%s</p>', $content);
			}
		?>
	</div>
</div>