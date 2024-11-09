<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/function.php');
adminLogin();
redirect(_WEB_HOST . '/users/list.php');