<?php

/*
Overlay Search 
*/

?>
<div class="search d-flex justify-content-center">
    <div class="align-self-center">
        <a href="#" id="close-search"><?php echo esc_html__('Close', 'soma') ?></a>
        <form action="<?php echo esc_url(home_url('/')) ?>" method="get">
            <input name="s" type="search" placeholder="<?php echo esc_html__('Search...', 'soma') ?>" class="margin-bottom_0 text-align_center padding_0" id="search-input">
        </form>
    </div>
</div>