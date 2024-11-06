<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');

$data = ['pageTitle' => 'Đăng nhập tài khoản'];
adminLogin();



?>
