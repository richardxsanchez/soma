<?php

/*
Type Helper
*/

global $soma_shop_type;

if (isset($_GET['shop_type'])) {
    if ($_GET['shop_type'] == 'basic') {
        $soma_shop_type = '1';
    } elseif ($_GET['shop_type'] == 'creative') {
        $soma_shop_type = '2';
    }
}