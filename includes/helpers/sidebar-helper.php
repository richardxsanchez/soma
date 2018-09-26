<?php

/*
Sidebar Helper
*/

global $soma_shop_sidebar;

if (isset($_GET['shop_sidebar'])) {
    if ($_GET['shop_sidebar'] == 'on') {
        $soma_shop_sidebar = '1';
    } elseif ($_GET['shop_sidebar'] == 'off') {
       $soma_shop_sidebar = '2';
    } 
}