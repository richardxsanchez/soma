<?php

/*
Metro Helper
*/

global $soma_shop_metro;

if (isset($_GET['shop_metro'])) {
    if ($_GET['shop_metro'] == 'on') {
        $soma_shop_metro = '1';
    } elseif ($_GET['shop_metro'] == 'off') {
       $soma_shop_metro = '2';
    } 
}