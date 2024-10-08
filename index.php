<?php
session_start();
require_once('config.php');
require_once('./templates/layouts/header.php');
require_once('./includes/connect.php');
// thư viện phpemailer
require_once('./includes/phpmailer/Exception.php');
require_once('./includes/phpmailer/PHPMailer.php');
require_once('./includes/phpmailer/SMTP.php');

require_once('./includes/function.php');
require_once('./includes/database.php');
require_once('./includes/session.php');



// Gán hằng số điều hướng
// $module = _MODULE;
// $action = _ACTION;
// if (!empty($_GET['module'])) {
//     if (is_string($_GET['module'])) {
//         $module = trim($_GET['module']);
//     }
// }
// if (!empty($_GET['action'])) {
//     if (is_string($_GET['action'])) {
//         $action = trim($_GET['action']);
//     }
// }

// // Đường dẫn điều hướng đến cái file khác
// $path = $module . '/' . $action . '.php';

// if (file_exists($path)) {
//     require_once($path);
// } else {
//     require_once('errors/404.php');
// }
require_once('./templates/layouts/content.php');
require_once('./templates/layouts/footer.php');



?>
