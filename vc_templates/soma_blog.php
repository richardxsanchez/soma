<?php

/*
Blog - Visual Composer Element
*/

extract(
	shortcode_atts(
		array(
			'categories' => 'all',
			'posts_per_page' => '',
			'columns' => '1',
			'sidebar' => '1',
			'offset' => '1',
			'shadow' => '1',
			'pagination' => '1',
			'animation' => '1',
			'el_class' => '',
	        'css' => ''
		),
		$atts
	)
);

$soma_blog = $atts;
$soma_blog['class'] = 'blog'; 
$soma_blog['row_holder_class'] = 'row';
$soma_blog['posts_holder_class'] = 'col-md-8';
$soma_blog['post_holder_class'] = 'post-holder'; 
$soma_blog['sidebar_holder_class'] = 'col-md-4';

// Customizer Options
$soma_blog_customizer = array(
	'columns' => get_theme_mod('blog_columns', '2'),
	'offset' => get_theme_mod('blog_offset', '2'),
	'sidebar' => get_theme_mod('blog_sidebar', '2'),
	'shadow' => get_theme_mod('blog_shadow', '1'),
	'pagination' => get_theme_mod('blog_pagination', '1'),
	'animation' => get_theme_mod('blog_animation', '1')
);

// Posts Per Page
if (!empty($soma_blog['posts_per_page'])) {
	$soma_blog['posts_per_page'] = $soma_blog['posts_per_page'];
} elseif (!empty($soma_blog_customizer['posts_per_page'])) {
	$soma_blog['posts_per_page'] = $soma_blog_customizer['posts_per_page'];
} else {
	$soma_blog['posts_per_page'] = 10;
}

// Columns
if (empty($soma_blog['columns'])) {
	$soma_blog['columns'] = '1';
}

if ($soma_blog['columns'] == '1' && $soma_blog_customizer['columns'] !== false) {
	$soma_blog['columns'] = $soma_blog_customizer['columns'];
} else {
	$soma_blog['columns'] = $soma_blog['columns'] - 1;
}

switch ($soma_blog['columns']) {
	case '1':
		$soma_blog['item_class'] = 'col-12';
		break;
	default:
		$soma_blog['item_class'] = 'col-lg-6';	
		break;
	case '3':
		$soma_blog['item_class'] = 'col-sm-6 col-xl-4';	
		break;
	case '4':
		$soma_blog['item_class'] = 'col-sm-6 col-xl-3';	
		break;
}


// Sidebar
if (empty($soma_blog['sidebar'])) {
	$soma_blog['sidebar'] = '1';
}

if ($soma_blog['sidebar'] == '1' && $soma_blog_customizer['sidebar'] !== false) {
	$soma_blog['sidebar'] = $soma_blog_customizer['sidebar'];
} else {
	$soma_blog['sidebar'] = $soma_blog['sidebar'] - 1;
}

if ($soma_blog['sidebar'] == '1') {
	$soma_blog['row_holder_class'] = 'row flex-row-reverse';
} elseif ($soma_blog['sidebar'] == '3') {
	$soma_blog['posts_holder_class'] = 'col-12';
} 

// Offset
if (empty($soma_blog['offset'])) {
	$soma_blog['offset'] = '1';
}

if ($soma_blog['offset'] == '1' && $soma_blog_customizer['offset'] !== false) {
	$soma_blog['offset'] = $soma_blog_customizer['offset'];
} else {
	$soma_blog['offset'] = $soma_blog['offset'] - 1;
}

if ($soma_blog['offset'] == '1') {
	switch ($soma_blog['columns']) {
		case '2':
			$soma_blog['posts_holder_class'] .= ' offset-two_columns';
			break;
		case '3':
			$soma_blog['posts_holder_class'] .= ' offset-three_columns';
			break;
		case '4':
			$soma_blog['posts_holder_class'] .= ' offset-four_columns';
			break;
	}
}

// Shadow
if (empty($soma_blog['shadow'])) {
	$soma_blog['shadow'] = '1';
}

if ($soma_blog['shadow'] == '1' && $soma_blog_customizer['shadow'] !== false) {
	$soma_blog['shadow'] = $soma_blog_customizer['shadow'];
} else {
	$soma_blog['shadow'] = $soma_blog['shadow'] - 1;
}

if ($soma_blog['shadow'] == '1') {
	$soma_blog['post_holder_class'] .= ' shadow';
}

// Pagination
if (empty($soma_blog['pagination'])) {
	$soma_blog['pagination'] = '1';
}

if ($soma_blog['pagination'] == '1' && $soma_blog_customizer['pagination'] !== false) {
	$soma_blog['pagination'] = $soma_blog_customizer['pagination'];
} else {
	$soma_blog['pagination'] = $soma_blog['pagination'] - 1;
}

// Animation
if (empty($soma_blog['animation'])) {
	$soma_blog['animation'] = '1';
}

if ($soma_blog['animation'] == '1' && $soma_blog_customizer['animation'] !== false) {
	$soma_blog['animation'] = $soma_blog_customizer['animation'];
} else {
	$soma_blog['animation'] = $soma_blog['animation'] - 1;
}

if ($soma_blog['animation'] == '2' || $soma_blog['animation'] == '3') {
	$soma_blog['post_holder_class'] .= ' wow fadeInNeuron';
} elseif ($soma_blog['animation'] == '4' || $soma_blog['animation'] == '5') {
	$soma_blog['post_holder_class'] .= ' wow fadeInUpNeuron';
}

// Data Wow Delay
$soma_blog_wow_seconds = 0;

// Query Paged
if (get_query_var('paged')) {
	$paged = get_query_var('paged');
} elseif (get_query_var('page')) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

// Query Operator
if (!empty($soma_blog['categories']) && stripos($soma_blog['categories'], 'all') !== false) {
	$operator = "NOT IN";
} else {
	$operator = "IN";
}

$exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';

// Query
$args = array(
    'post_type' => 'post',
    'paged' => $paged,
    'posts_per_page' => $soma_blog['posts_per_page'],
    'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => $categories,
			'operator' => $operator
		)
	)
);

if ($exclude) {
	$args['post__not_in'] = $exclude;
}

$query = new WP_Query($args);

// Extra Class
if (!empty($soma_blog['el_class'])) {
	$soma_blog['class'] .= ' ' . $soma_blog['el_class'];
}

// CSS 
if (!empty($soma_blog['css'])) {
	$soma_blog['class'] .= ' ' . apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($soma_blog['css'], ''), $this->settings['base'], $atts);
}

if ($query->have_posts()) :
?>
    <div class="<?php echo esc_attr($soma_blog['class']) ?>">
		<div class="<?php echo esc_attr($soma_blog['row_holder_class']) ?>">
			<div class="<?php echo esc_attr($soma_blog['posts_holder_class']) ?>">
				<div class="row masonry" data-masonry-id="<?php echo md5($this->settings['base']); ?>">
					<?php 
						while ($query->have_posts()) : $query->the_post(); 
						
						if ($soma_blog_wow_seconds == 10) {
							$soma_blog_wow_seconds = 0;
						}

						$soma_blog_data_wow = 'data-wow-delay="0.'. $soma_blog_wow_seconds .'s"';
					?>
						<div <?php post_class('selector' . ' ' . $soma_blog['item_class']) ?> id="id-<?php the_ID() ?>" data-id="<?php the_ID(); ?>">
							<div class="<?php echo esc_attr($soma_blog['post_holder_class']) ?>" <?php echo !empty($soma_blog_wow_seconds) && ($soma_blog['animation'] == '3' || $soma_blog['animation'] == '5') ? $soma_blog_data_wow  : ''; ?>>
								<div class="post-inner_holder">
									<?php if (has_post_thumbnail()) : ?>
										<div class="post-image">
											<a class="soma-link" href="<?php the_permalink() ?>">
												<div class="calculated-image" style="<?php echo esc_attr(soma_calculate_img(get_post_thumbnail_id(get_the_ID()))) ?>">
													<?php the_post_thumbnail() ?>
												</div>
											</a>
										</div>
									<?php endif; ?>
									<div class="post-content text-align_center line">
										<div class="post-meta d-flex align-items-center justify-content-center">
											<div class="post-meta_date">
												<?php the_time(get_option('date_format')); ?>
											</div>
											<div class="post-meta_categories">
												<?php the_category(); ?>
											</div>
										</div>
										<h3 class="post-title"><a class="soma-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
										<div class="post-link">
											<a class="soma-link" href="<?php the_permalink() ?>"><?php echo esc_html__('Continue Reading', 'soma') ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php 
						$soma_blog_wow_seconds = $soma_blog_wow_seconds + 2;

						endwhile; 
					?>
				</div>
				<?php 
					// Pagination
					$soma_blog['show_more_text'] = esc_html__('Show More', 'soma');
					if ($soma_blog['pagination'] == '1') {
						soma_pagination($query->max_num_pages, 999);
					} elseif ($query->max_num_pages > $paged) {
				?>
					<div class="button-holder load-more_button text-align_center">
						<button class="button normal black shadow load-more-posts">
							<span data-text="<?php echo esc_attr($soma_blog['show_more_text']) ?>"><?php echo esc_attr($soma_blog['show_more_text']) ?></span>
						</button>
					</div>
				<?php
					}
				?>
			</div>
			<?php if($soma_blog['sidebar'] != '3') : ?>
				<div class="sidebar <?php echo esc_attr($soma_blog['sidebar_holder_class']) ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php
endif; wp_reset_postdata();