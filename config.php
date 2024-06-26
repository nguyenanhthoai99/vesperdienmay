<?php
// Thiết lập host
define('_WEB_HOST_CLIENTS', 'http://'. $_SERVER['HTTP_HOST'].'/vesperdienmay');
define('_WEB_HOST_ADMIN', _WEB_HOST_CLIENTS.'/admin/modules');
define('_WEB_HOST_TEMPLATES', _WEB_HOST_CLIENTS.'/templates');

// Thiết lập path
define('_WEB_PATH', __DIR__);
define('_WEB_PATH_TEMPLATES', _WEB_PATH . '/templates');
define('_WEB_PATH_AUTH', _WEB_PATH . '/admin/modules/auth');

// Các hằng của project
const _MODULE = 'home';
const _ACTION = 'dashboard';