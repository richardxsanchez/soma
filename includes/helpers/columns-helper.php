<?php

/*
Columns Helper
*/

global $soma_shop_selector_class;

if (isset($_GET['shop_columns'])) {
    if ($_GET['shop_columns'] == 'two') {
        $soma_shop_selector_class = 'col-sm-6';
    } elseif ($_GET['shop_columns'] == 'three') {
       $soma_shop_selector_class = 'col-sm-6 col-xl-4';
    } elseif ($_GET['shop_columns'] == 'four') {
        $soma_shop_selector_class = 'col-sm-6 col-xl-3';
    }
}