<?php

/*
Team Members - Visual Composer Element
*/

global $columns, $animation, $soma_team_data_wow_seconds, $shadow;

extract(
	shortcode_atts(
		array(
			'title' => '',
			'subtitle' => '',
			'description' => '',
			'columns' => '2',
			'background_color' => '',
			'shadow' => '1',
			'animation' => '1',
			'alignment' => '1',
			'el_class' => '',
			'css' => '',
		),
		$atts
	)
);

// Delay
$soma_team_data_wow_seconds = 0;

$soma_team_members = $atts;
$soma_team_members['class'] = 'team';
$soma_team_members['row_class'] = 'row';
$soma_team_members['masonry_class'] = 'row masonry';

// Background Color
$soma_team_members_style = array();
if (!empty($soma_team_members['background_color'])) {
	$soma_team_members_style[] = 'background-color: '. $soma_team_members['background_color'] .'';
}

// Alignment
if (empty($soma_team_members['alignment'])) {
    $soma_team_members['alignment'] = '1';
}

if ($soma_team_members['alignment'] == '2') {
    $soma_team_members['row_class'] .= ' flex-row-reverse';
}

// Extra Class
if (!empty($soma_team_members['el_class'])) {
	$soma_team_members['class'] .= ' ' . $soma_team_members['el_class'];
}

// CSS 
if (!empty($soma_team_members['css'])) {
	$soma_team_members['class'] .= ' ' . apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($soma_team_members['css'], ''), $this->settings['base'], $atts);
}
?>
<div class="<?php echo esc_attr($soma_team_members['class']) ?>">
	<div class="<?php echo esc_attr($soma_team_members['row_class']) ?>">
		<div class="col-lg-6 team-holder align-self-center">
			<?php if (!empty($soma_team_members['title']) || !empty($soma_team_members['subtitle']) || !empty($soma_team_members['description'])) : ?>
				<div class="lateral-content">
					<?php 
						// Team Title
						if (!empty($soma_team_members['title'])) {
							echo '<h3>' . esc_attr($soma_team_members['title']) . '</h3>';
						}

						// Team Subtitle
						if (!empty($soma_team_members['subtitle'])) {
							echo '<h6>' . esc_attr($soma_team_members['subtitle']) . '</h6>';
						}
					?>
					<hr>
					<?php 
						// Team Content
						if (!empty($soma_team_members['description'])) {
							echo '<p>' . ($soma_team_members['description']) . '</p>';
						}
					?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-lg-6 team-holder members-background">
			<div class="members" <?php echo !empty($soma_team_members_style) ? 'style="' . implode(' ', $soma_team_members_style) . '"' : '' ?>>
				<div class="<?php echo esc_attr($soma_team_members['masonry_class']) ?>">
					<?php echo do_shortcode($content); ?>
				</div>
			</div>
		</div>
	</div>
</div>
