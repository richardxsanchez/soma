<?php

/*
Pagination Helper
*/

global $soma_shop_pagination;

if (isset($_GET['shop_pagination'])) {
    if ($_GET['shop_pagination'] == 'default') {
        $soma_shop_pagination = '1';
    } elseif ($_GET['shop_pagination'] == 'show-more') {
       $soma_shop_pagination = '2';
    } 
}