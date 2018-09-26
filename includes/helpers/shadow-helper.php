<?php

/*
Shadow Helper
*/

global $soma_shop_shadow;

if (isset($_GET['shop_shadow'])) {
    if ($_GET['shop_shadow'] == 'on') {
        $soma_shop_shadow = '1';
    } elseif ($_GET['shop_shadow'] == 'off') {
       $soma_shop_shadow = '2';
    } 
}