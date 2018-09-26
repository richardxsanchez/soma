<?php

/*
Footer
*/

// Widgets
$soma_footer_widgets = soma_inherit_option('footer_widgets', 'footer_widgets', '1', true);

// Widgets Columns
$soma_footer_widgets_columns = soma_inherit_option('footer_widgets_columns', 'footer_widgets_columns', '1', true);

// Social Media Visibility
$soma_social_media_visibility = soma_inherit_option('footer_social_media_visibility', 'footer_social_media_visibility', '2', true);

// Social Media Type
$soma_social_media_type = soma_inherit_option('footer_social_media_type', 'footer_social_media_type', '1', true);

// Social Media Style
$soma_social_media_style = soma_inherit_option('footer_social_media_style', 'footer_social_media_style', '1', true);

if (($soma_footer_widgets == '1' && soma_active_sidebars() || $soma_social_media_visibility == '1' )) :
?>
    <footer <?php echo ($soma_footer_widgets == '1') ? 'class="has-widgets"' : ''; ?>>
        <?php 
            if ($soma_footer_widgets == '1') :
                switch ($soma_footer_widgets_columns) {
                    default:
                        $soma_footer['columns'] = 'col-sm-6';
                        break;
                    case '2':
                        $soma_footer['columns'] = 'col-sm-4';
                        break;
                    case '3':
                        $soma_footer['columns'] = 'col-sm-6 col-md-3';
                        break;
                    case '4':
                        $soma_footer['columns'] = 'col-sm-4 col-md-3 col-lg-2';
                        break;
                }
        ?>
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="<?php echo esc_attr($soma_footer['columns']);  ?>">
                            <?php
                                if (is_active_sidebar('footer-sidebar-1')) {
                                    dynamic_sidebar('footer-sidebar-1');
                                }
                            ?>
                        </div>
                        <div class="<?php echo esc_attr($soma_footer['columns']);  ?>">
                            <?php
                                if (is_active_sidebar('footer-sidebar-2')) {
                                    dynamic_sidebar('footer-sidebar-2');
                                }
                            ?>
                        </div>
                        <?php if ($soma_footer_widgets_columns == '2' || $soma_footer_widgets_columns == '3' || $soma_footer_widgets_columns == '4') : ?>
                            <div class="<?php echo esc_attr($soma_footer['columns']);  ?>">
                                <?php
                                    if (is_active_sidebar('footer-sidebar-3')) {
                                        dynamic_sidebar('footer-sidebar-3');
                                    }
                                ?>
                            </div>
                        <?php 
                            endif; 
                            if ($soma_footer_widgets_columns == '3' || $soma_footer_widgets_columns == '4') : 
                        ?>
                            <div class="<?php echo esc_attr($soma_footer['columns']);  ?>">
                                <?php
                                    if (is_active_sidebar('footer-sidebar-4')) {
                                        dynamic_sidebar('footer-sidebar-4');
                                    }
                                ?>
                            </div>
                        <?php 
                            endif; 
                            if ($soma_footer_widgets_columns == '4') : 
                        ?>
                            <div class="<?php echo esc_attr($soma_footer['columns']);  ?>">
                                <?php
                                    if (is_active_sidebar('footer-sidebar-5')) {
                                        dynamic_sidebar('footer-sidebar-5');
                                    }
                                ?>
                            </div>
                            <div class="<?php echo esc_attr($soma_footer['columns']);  ?>">
                                <?php
                                    if (is_active_sidebar('footer-sidebar-6')) {
                                        dynamic_sidebar('footer-sidebar-6');
                                    }
                                ?>
                            </div>
                        <?php 
                            endif; 
                        ?>                    
                    </div>
                </div>
            </div>
        <?php 
            endif;

            soma_social_media($soma_social_media_visibility, $soma_social_media_type, $soma_social_media_style, false, 'footer');    
        ?>
    </footer>
<?php 
endif;
wp_footer(); 
?>
</body>
</html>