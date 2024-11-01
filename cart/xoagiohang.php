<?php

session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');

require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');
$filterAll = filter();
$id_sp = $filterAll['id'];
$giohang = getSession('cart');
echo '<pre>'; print_r($giohang); echo '</pre>'

; 
if (!empty($giohang)) {
    foreach( $giohang as $data ){
        if($data['id_sp'] == $id_sp) {
            $key = array_search($data,$giohang);
            unset($_SESSION['cart'][$key]);                       
        }
    }
}
redirect(_WEB_HOST . '/cart');
