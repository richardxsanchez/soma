<?php

/*
Index Page
*/

get_header();

$soma_index = array(
	'columns' => get_theme_mod('blog_columns', '2'),
	'offset' => get_theme_mod('blog_offset', '2'),
	'sidebar' => get_theme_mod('blog_sidebar', '2'),
	'shadow' => get_theme_mod('blog_shadow', '1'),
	'pagination' => get_theme_mod('blog_pagination', '1'),
	'animation' => get_theme_mod('blog_animation', '1')
);

$soma_index['post_holder_class'] = 'post-holder';
$soma_index['row_holder_class'] = 'row';
$soma_index['posts_holder_class'] = 'col-md-8';
$soma_index['sidebar_holder_class'] = 'col-md-4';

// Columns
if (empty($soma_index['columns'])) {
    $soma_index['columns'] = '1';
}

switch ($soma_index['columns']) {
	case '1':
		$soma_index['item_class'] = 'col-12';
		break;
	default:
		$soma_index['item_class'] = 'col-sm-6';	
		break;
	case '3':
		$soma_index['item_class'] = 'col-sm-4';	
		break;
	case '4':
		$soma_index['item_class'] = 'col-sm-3';	
		break;
}

// Sidebar
if (empty($soma_index['sidebar'])) {
    $soma_index['sidebar'] = '1';
}

if ($soma_index['sidebar'] == '1') {
	$soma_index['row_holder_class'] = 'row flex-row-reverse';
} elseif ($soma_index['sidebar'] == '3') {
	$soma_index['posts_holder_class'] = 'col-12';
} 

// Offset
if (empty($soma_index['offset'])) {
    $soma_index['offset'] = '1';
}

if ($soma_index['offset'] == '1') {
	switch ($soma_index['columns']) {
		case '2':
			$soma_index['posts_holder_class'] .= ' offset-two_columns';
			break;
		case '3':
			$soma_index['posts_holder_class'] .= ' offset-three_columns';
			break;
		case '4':
			$soma_index['posts_holder_class'] .= ' offset-four_columns';
			break;
	}
}


// Shadow
if (empty($soma_index['shadow'])) {
    $soma_index['shadow'] = '1';
}

if ($soma_index['shadow'] == '1') {
	$soma_index['post_holder_class'] .= ' shadow';
}

// Pagination
if (empty($soma_index['pagination'])) {
    $soma_index['pagination'] = '1';
}

// Animation
if (empty($soma_index['animation'])) {
	$soma_index['animation'] = '1';
}

if ($soma_index['animation'] == '2' || $soma_index['animation'] == '3') {
	$soma_index['item_class'] .= ' wow fadeInNeuron';
} elseif ($soma_index['animation'] == '4' || $soma_index['animation'] == '5') {
	$soma_index['item_class'] .= ' wow fadeInUpNeuron';
}

// Data Wow Delay
$soma_index_wow_seconds = 0;

?>
<div class="blog">
	<div class="container">
		<div class="<?php echo esc_attr($soma_index['row_holder_class']) ?>">
			<div class="<?php echo esc_attr($soma_index['posts_holder_class']) ?>">
				<div class="row masonry" data-masonry-id="index-load-more">
					<?php 
						$exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';

						$args = array_merge($wp_query->query_vars, array('post_type' => 'post'));

						if ($exclude) {
							$args['post__not_in'] = $exclude;
						}

						$query = new WP_Query($args);

						if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 

						if ($soma_index_wow_seconds == 10) {
							$soma_index_wow_seconds = 0;
						}

						$soma_index_data_wow = 'data-wow-delay="0.'. $soma_index_wow_seconds .'s"';
					?>
						<div <?php post_class('selector '. $soma_index['item_class']) ?> id="id-<?php the_ID() ?>" data-id="<?php the_ID(); ?>" <?php echo !empty($soma_index_wow_seconds) && ($soma_index['animation'] == '3' || $soma_index['animation'] == '5') ? $soma_index_data_wow  : ''; ?>>
							<div class="<?php echo esc_attr($soma_index['post_holder_class']) ?>">
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
										<div class="post-meta">
											<div class="post-meta_date">
												<?php the_time(get_option('date_format')); ?>
											</div>
											<div class="post-meta_categories">
												<?php the_category(); ?>
											</div>
										</div>
										<h2 class="post-title"><a class="soma-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
										<div class="post-link">
											<a class="soma-link" href="<?php the_permalink() ?>"><?php echo esc_html__('Continue Reading', 'soma') ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php 
						$soma_index_wow_seconds = $soma_index_wow_seconds + 2;

						endwhile; endif; wp_reset_postdata(); 
					?>
				</div>
				<?php 
					// Pagination
					$soma_index['show_more_text'] = esc_html__('Show More', 'soma');
					if ($soma_index['pagination'] == '1') {
						soma_pagination($query->max_num_pages, 999);
					} elseif ($query->max_num_pages > $paged) {
				?>
					<div class="button-holder load-more_button text-align_center">
						<button class="button normal black shadow load-more-posts">
							<span data-text="<?php echo esc_attr($soma_index['show_more_text']) ?>"><?php echo esc_attr($soma_index['show_more_text']) ?></span>
						</button>
					</div>
				<?php
					}
				?>
			</div>
			<?php if($soma_index['sidebar'] != '3') : ?>
				<div class="sidebar <?php echo esc_attr($soma_index['sidebar_holder_class']) ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();