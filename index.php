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


require_once('./templates/layouts/content.php');
require_once('./templates/layouts/footer.php');

?>
