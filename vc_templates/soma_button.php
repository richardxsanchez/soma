<?php

/*
Button - Visual Composer Element
*/

extract(
	shortcode_atts(
		array(
			'link' => '',
			'size' => '2',
			'fluid' => '2',
			'color' => '2',
			'color_text' => '',
			'color_bg' => '',
			'animation' => '1',
			'el_class' => '',
			'css' => ''
		),
		$atts
	)
);

$soma_button = $atts;
$soma_button['class'] = 'button';
$soma_button['uniqid'] = uniqid();
$soma_button['class'] .= ' id-'. $soma_button['uniqid'] .'';

// Link
if (!empty($soma_button['link'])) {
    $soma_button['link'] = vc_build_link($soma_button['link']);
}

// Size
if (empty($soma_button['size'])) {
    $soma_button['size'] = '2';
}

switch ($soma_button['size']) {
    case '1':
        $soma_button['class'] .= ' small';
        break;
    default:
        $soma_button['class'] .= ' normal';
        break;
    case '3':
        $soma_button['class'] .= ' large';
        break;
}

// Fluid
if (empty($soma_button['fluid'])) {
    $soma_button['fluid'] = '2';
}

if ($soma_button['fluid'] == '1') {
    $soma_button['class'] .= ' fluid';
}

// Color
if (empty($soma_button['color'])) {
    $soma_button['color'] = '2';
}

if ($soma_button['color'] == '9') {
    if (!empty($soma_button['color_text'])) {
        soma_generate_custom_css_footer('.button.id-'. $soma_button['uniqid'] .':before { color: '. $soma_button['color_text'] .'}');
        soma_generate_custom_css_footer('.button.id-'. $soma_button['uniqid'] .' span { color: '. $soma_button['color_text'] .'}');
    }
    if (!empty($soma_button['color_bg'])) {
        soma_generate_custom_css_footer('.button.id-'. $soma_button['uniqid'] .' span { background-color: '. $soma_button['color_bg'] .'}');
    }
} else {
    switch ($soma_button['color']) {
        case '1':
            $soma_button['class'] .= ' white';
            break;
        default:
            $soma_button['class'] .= ' black';
            break;
        case '3':
            $soma_button['class'] .= ' grey';
            break;   
        case '4':
            $soma_button['class'] .= ' light-grey';
            break;   
        case '5':
            $soma_button['class'] .= ' green';
            break;   
        case '6':
            $soma_button['class'] .= ' red';
            break;   
        case '7':
            $soma_button['class'] .= ' blue';
            break;   
        case '8':
            $soma_button['class'] .= ' light-blue';
            break;   
    }
}

// Extra Class
if (!empty($soma_button['el_class'])) {
	$soma_button['class'] .= ' ' . $soma_button['el_class'];
}

// CSS 
if (!empty($soma_button['css'])) {
	$soma_button['class'] .= ' ' . apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($soma_button['css'], ''), $this->settings['base'], $atts);
}

if (!empty($soma_button['link']['title'])) {
    echo sprintf(
        '<a class="soma-link shadow %s" href="%s" target="%s" rel="%s"><span>%s</span></a>', 
        $soma_button['class'],
        !empty($soma_button['link']['url']) ? esc_url($soma_button['link']['url']) : "",
        !empty($soma_button['link']['target']) ? esc_attr($soma_button['link']['target']) : "",
        !empty($soma_button['link']['rel']) ? esc_attr($soma_button['link']['rel']) : "",
        !empty($soma_button['link']['title']) ? esc_attr($soma_button['link']['title']) : ""
    );
}