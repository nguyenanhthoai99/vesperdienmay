<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');

setcookie("user_login", "", time() - (60 * 60 * 24 * 30 * 12), "/");
if (isLogin()) {
    $token = getSession('tokenLogin');
    delete('tokenlogin', "token = '$token'");
    removeSession('tokenLogin');
    removeSession('user_login');
    redirect(_WEB_HOST . '/auth/login.php');
}
redirect(_WEB_HOST . '/auth/login.php');