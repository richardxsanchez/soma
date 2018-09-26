<?php

/*
Default Template Page
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

$soma_vc = preg_match("/\[vc_row.*?\]/i", get_the_content());

$soma_page_class = "container";

if ($soma_vc && function_exists('vc_map')) {
    $soma_page_class = "n-container";
}
?>
    <div class="<?php echo esc_attr($soma_page_class) ?>">
        <?php
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
endwhile; endif;

// Comments
comments_template();

get_footer();
