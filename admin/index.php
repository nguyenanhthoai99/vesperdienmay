<?php
$module = _MODULE;
$action = _ACTION;

if (!empty($_GET['module'])) {
    if (is_string($_GET['module'])) {
        $module = trim($_GET['module']);
    }
}

if (!empty($_GET['action'])) {
    if (is_string($_GET['action'])) {
        $action = trim($_GET['action']);
    }
}
$path = 'modules/' . $module . '/' . $action . '.php';
if (file_exists($path)) {
    include_once($path);
} else {
    include_once('modules/error/404.php');
}
