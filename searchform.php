<?php
/*
Searchform
*/
?>
<form action="<?php echo esc_url(home_url('/')) ?>" method="get">
    <div class="shadow">
        <input name="s" type="search" placeholder="<?php echo esc_html__('Search...', 'soma') ?>" class="margin-bottom_0" id="search-input">
    </div>
</form>