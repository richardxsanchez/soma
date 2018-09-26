<?php

/*
Archive Page
*/

get_header();

$soma_archive['post_holder_class'] = 'post-holder';

// Columns
switch (soma_inherit_option('taxonomy_columns', 'blog_columns', '2', true)) {
	case '1':
		$soma_archive['item_class'] = 'col-12';
		break;
	default:
		$soma_archive['item_class'] = 'col-lg-6';	
		break;
	case '3':
		$soma_archive['item_class'] = 'col-sm-6 col-lg-4';	
		break;
	case '4':
		$soma_archive['item_class'] = 'col-sm-6 col-lg-3';	
		break;
}

// Sidebar
$soma_archive_sidebar = soma_inherit_option('taxonomy_sidebar', 'blog_sidebar', '2', true);

$soma_archive['row_holder_class'] = 'row';
$soma_archive['posts_holder_class'] = 'col-md-8';
$soma_archive['sidebar_holder_class'] = 'col-md-4';

if ($soma_archive_sidebar == '1') {
	$soma_archive['row_holder_class'] = 'row flex-row-reverse';
} elseif ($soma_archive_sidebar == '3') {
	$soma_archive['posts_holder_class'] = 'col-12';
} 

// Offset
if (soma_inherit_option('taxonomy_offset', 'blog_offset', '2', true) == '1') {
	switch (soma_inherit_option('taxonomy_columns', 'blog_columns', '2', true)) {
		case '2':
			$soma_archive['posts_holder_class'] .= ' offset-two_columns';
			break;
		case '3':
			$soma_archive['posts_holder_class'] .= ' offset-three_columns';
			break;
		case '4':
			$soma_archive['posts_holder_class'] .= ' offset-four_columns';
			break;
	}
}

// Shadow
if (soma_inherit_option('taxonomy_shadow', 'blog_shadow', '1', true) == '1') {
	$soma_archive['post_holder_class'] .= ' shadow';
}

// Animation
$soma_archive_animation = soma_inherit_option('taxonomy_animation', 'blog_animation', '1', true);

if ($soma_archive_animation == '2' || $soma_archive_animation == '3') {
	$soma_archive['post_holder_class'] .= ' wow fadeInNeuron';
} elseif ($soma_archive_animation == '4' || $soma_archive_animation == '5') {
	$soma_archive['post_holder_class'] .= ' wow fadeInUpNeuron';
}

// Data Wow Delay
$soma_archive_wow_seconds = 0;

?>
<div class="blog">
	<div class="container">
		<div class="padding-top_lg padding-bottom_xl text-align_center">
			<h1 class="heding-title margin-bottom_0">
				<?php if (is_category()) : ?>
					<?php echo esc_html__('Category', 'soma') ?> - <span class="text-blue"><?php echo esc_attr(single_cat_title()) ?></span>
				<?php elseif (is_tag()) : ?>
					<?php echo esc_html__('Tag', 'soma') ?> - <span class="text-blue"><?php echo esc_attr(single_tag_title()) ?></span>
				<?php endif; ?>
			</h1>
		</div>
		<?php the_archive_description(); ?>
		<div class="<?php echo esc_attr($soma_archive['row_holder_class']) ?>">
			<div class="<?php echo esc_attr($soma_archive['posts_holder_class']) ?>">
				<div class="row masonry" data-masonry-id="archive-load-more">
					<?php 
						$exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';

						$args = array_merge($wp_query->query_vars, array('post_type' => 'post'));

						if ($exclude) {
							$args['post__not_in'] = $exclude;
						}

						$query = new WP_Query($args);

						if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 

						if ($soma_archive_wow_seconds == 10) {
							$soma_archive_wow_seconds = 0;
						}

						$soma_archive_data_wow = 'data-wow-delay="0.'. $soma_archive_wow_seconds .'s"';
					?>
						<div <?php post_class('selector '. $soma_archive['item_class']) ?> id="id-<?php the_ID() ?>" data-id="<?php the_ID(); ?>">
							<div class="<?php echo esc_attr($soma_archive['post_holder_class']) ?>" <?php echo !empty($soma_archive_wow_seconds) && ($soma_archive_animation == '3' || $soma_archive_animation == '5') ? $soma_archive_data_wow  : ''; ?>>
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
						$soma_archive_wow_seconds = $soma_archive_wow_seconds + 2;

						endwhile; endif; wp_reset_postdata(); 
					?>
				</div>
				<?php 
					// Pagination
					$soma_archive['show_more_text'] = esc_html__('Show More', 'soma');
					if (soma_inherit_option('taxonomy_pagination', 'blog_pagination', '1', true) == '1') {
						soma_pagination($query->max_num_pages, 999);
					} elseif ($query->max_num_pages > $paged) {
				?>
					<div class="button-holder load-more_button text-align_center">
						<button class="button normal black shadow load-more-posts">
							<span data-text="<?php echo esc_attr($soma_archive['show_more_text']) ?>"><?php echo esc_attr($soma_archive['show_more_text']) ?></span>
						</button>
					</div>
				<?php
					}
				?>
			</div>
			<?php if($soma_archive_sidebar != '3') : ?>
				<div class="sidebar <?php echo esc_attr($soma_archive['sidebar_holder_class']) ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();