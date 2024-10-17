<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');

if (isLogin()) {
    $token = getSession('tokenLogin');
    delete('tokenlogin', "token = '$token'");
    removeSession('tokenLogin');
    redirect(_WEB_HOST . '/auth/login.php');
}
