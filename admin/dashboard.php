<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');
$data = ['pageTitle' => 'Quản lý trang web'];
layouts('header', $data);
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');
?>


<?php
layouts('footer-login');
?>