<?php 

/*
Single Post
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();
?>
    <div class="blog single">
        <div class="container">
            <div class="post-content text-align_center">
                <div class="post-meta">
                    <div class="post-meta_date">
                        <?php the_time(get_option('date_format')); ?>
                    </div>
                    <div class="post-meta_categories line">
                        <?php the_category(); ?>
                    </div>
                </div>
                <h1 class="post-title"><?php the_title(); ?></h1>
            </div>
            <?php if (has_post_thumbnail()) : ?>
                <div class="single-post_image">
                    <?php the_post_thumbnail() ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="single-post_content">
                        <?php 
                            // Post Content
                            the_content();
                            
                            // WP Link Pages
                            $args = array(
                                'before' => '<div class="navigation">', 
                                'after' => '</div>'
                            );
                            wp_link_pages($args);
                        ?>
                    </div>
                    <?php 
                        // Social Holder Columns
                        if (!get_the_tags() || get_theme_mod('blog_single_share', '1') == '2') {
                            $soma_single_tags_columns = 'col-12';
                        } else {
                            $soma_single_tags_columns = 'col-lg-6';
                        }

                        if (get_the_tags() || get_theme_mod('blog_single_share', '1') == '1') : 
                    ?>
                        <div class="tags-social_holder">
                            <div class="row align-items-center">
                                <?php if (get_the_tags()) : ?>
                                    <div class="<?php echo esc_attr($soma_single_tags_columns) ?>">
                                        <div class="single-post_tags line">
                                            <?php 
                                                echo '<span class="tag-icon d-inline-flex"><?xml version="1.0" encoding="iso-8859-1"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="333.086px" height="333.087px" viewBox="0 0 333.086 333.087" style="enable-background:new 0 0 333.086 333.087;" xml:space="preserve"><g><g><path d="M284.662,333.087c-3.614,0-7.136-1.57-9.559-4.441l-108.56-128.714L57.983,328.646c-3.384,4.014-8.916,5.481-13.845,3.683c-4.93-1.802-8.21-6.492-8.21-11.741V12.5c0-6.903,5.597-12.5,12.5-12.5h236.23c6.902,0,12.5,5.597,12.5,12.5v308.086c0,5.249-3.28,9.939-8.21,11.741C287.546,332.839,286.096,333.087,284.662,333.087z M166.543,168.043c3.684,0,7.18,1.625,9.555,4.441l96.061,113.893V25H60.928v261.377l96.06-113.893C159.363,169.668,162.859,168.043,166.543,168.043z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></span>';
                                                foreach (get_the_tags() as $tag) {
                                                    echo '<a class="soma-link" href='. esc_url(get_tag_link($tag->term_id)) .'>'. esc_attr($tag->name) .'</a>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                <?php 
                                    endif;
                                    if (get_theme_mod('blog_single_share', '1') == '1' && function_exists('neuron_share_social_media')) :    
                                ?>
                                    <div class="<?php echo esc_attr($soma_single_tags_columns) ?>">
                                        <div class="social-media type-icon colorful text-align_right">
                                            <?php echo neuron_share_social_media(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
                // Navigation
                if (get_theme_mod('blog_single_navigation_category', '1') == '1') {
                    $soma_navigation_category = true;
                } else {
                    $soma_navigation_category = false;
                }

                paginate_links();

                if (get_theme_mod('blog_single_navigation', '1') == '1') :
            ?>
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="navigation">
                            <div class="row">
                                <div class="col-6 prev">
                                    <?php previous_post_link('%link', '<h1>'. esc_html__('Prev', 'soma') .'</h1><h6>%title</h6>', $soma_navigation_category, '', 'category'); ?>
                                </div>
                                <div class="col-6 next text-align_right">
                                    <?php next_post_link('%link', '<h1>'. esc_html__('Next', 'soma') .'</h1><h6>%title</h6>', $soma_navigation_category, '', 'category'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
// Comments 
comments_template();

endwhile; endif;

get_footer();