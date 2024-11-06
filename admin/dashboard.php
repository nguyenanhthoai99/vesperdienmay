<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
adminLogin();
$data = ['pageTitle' => 'Dashbroad'];
layouts('header-admin', $data);
layouts('content-admin');
layouts('footer-admin');
?>
