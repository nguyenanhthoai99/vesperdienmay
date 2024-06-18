<?php
// Thiết lập host
define('_WEB_HOST_CLIENTS', 'http://'. $_SERVER['HTTP_HOST'].'/vesperdienmay');
define('_WEB_HOST_ADMIN', _WEB_HOST_CLIENTS.'/modules');
define('_WEB_HOST_TEMPLATES', _WEB_HOST_CLIENTS.'/templates');

// Thiết lập path
define('_WEB_PATH', __DIR__);
define('_WEB_PATH_TEMPLATES', _WEB_PATH . '/templates');
