<?php

/*
Search Page
*/

get_header();

$soma_post_types = array('post', 'page');

if (class_exists('WooCommerce')) {
	$soma_post_types[] = 'product';
}

$args = array_merge($wp_query->query_vars, array('post_type' => $soma_post_types));

$query = new WP_Query($args);

if ($query->have_posts()) {
	$soma_heading_title = 'heading-title margin-bottom_0';
} else {
	$soma_heading_title = 'heading-title';
}

?>
<div class="container">
	<div class="padding-top_lg padding-bottom_xl text-align_center">
		<h1 class="<?php echo esc_attr($soma_heading_title) ?>"><?php echo esc_attr($query->found_posts) . ' ' . esc_html__('results for', 'soma') ?> <span class="text-blue"><?php echo esc_attr(the_search_query()) ?></span></h1>
		<?php if (!$query->have_posts()) : ?>
			<p><?php echo esc_html__('The post you were looking for couldn\'t be found. The post could be removed or you misspelled the word while searching for it.', 'soma') ?></p>
		<?php endif; ?>
	</div>
	<div class="row masonry">
		<?php if ($query->have_posts()) :  while ($query->have_posts()) : $query->the_post(); ?>
			<div <?php post_class('selector col-sm-6') ?> id="id-<?php the_ID() ?>" data-id="<?php the_ID(); ?>">
				<div class="shadow">
					<div class="search-result_holder">
						<div class="post-content line">
							<p><?php echo esc_attr(get_post_type()) ?></p>
							<h2 class="post-title"><a class="soma-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<?php echo wpautop(wp_kses_post(soma_custom_excerpt())); ?>
							<div class="link">
								<a class="soma-link" href="<?php the_permalink() ?>"><?php echo esc_html__('Continue', 'soma') ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
	<?php soma_pagination($query->max_num_pages, 999); ?>
</div>
<?php 

get_footer();