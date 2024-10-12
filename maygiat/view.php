<h1>view</h1>
<?php 
require_once(__DIR__ . '../../config.php');
require_once(__DIR__ .'../../templates/layouts/header.php');
require_once(__DIR__ .'../../includes/connect.php');
require_once(__DIR__ .'../../includes/database.php');
$kq  = $_GET['sp'];
echo $kq ;
$query = getRaw("SELECT * FROM maygiat WHERE ten_mg = '$kq'");
echo '<pre>'; print_r($query); echo '<pre/>';
?>