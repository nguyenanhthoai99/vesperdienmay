<?php
// Hằng số của project
// các hằng số điều hướng mặc định của module
const _MODULE = 'home';
const _ACTION = 'dashboard';

// Hằng số kiểm tra người truy cập hợp lệ
const _CODE = true;

// Thiết lập host trên thanh địa chỉ
define('_WEB_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/vesperdienmay');
define('_WEB_HOST_TEMPLATES', _WEB_HOST . '/templates');

//Thiết lập path thư mục templates
define('_WEB_PATH', __DIR__);
define('_WEB_PATH_TEMPLATES', _WEB_PATH . '/templates');

