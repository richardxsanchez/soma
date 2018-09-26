<?php

/*
Offset Helper
*/

global $soma_shop_offset;

if (isset($_GET['shop_offset'])) {
    if ($_GET['shop_offset'] == 'on') {
        $soma_shop_offset = '1';
    } elseif ($_GET['shop_offset'] == 'off') {
       $soma_shop_offset = '2';
    } 
}