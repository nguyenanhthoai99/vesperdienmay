<!-- Kết nối với database -->
<?php
// Kiểm tra quyền truy cập
// if(!defined('_CODE')){
//     die('<h1>Trang không tồi tại hoặc bạn không có quyền truy cập trang này</h1>');
// }

// Thông tin kết nối database
const _HOST = 'localhost';
const _DB = 'web_ban_hang_dien_may';
const _USER = 'root';
const _PASSWORD = '';
// kết nối với database (ngại lệ)
try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST;
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Tạo thông báo ra ngoại lệ khi gặp lỗi
        ];
        $conn = new PDO($dsn, _USER, _PASSWORD, $options);
        // kiểm tra kết nối
        // if($conn){
        //     echo 'Kết nối thành công';
        // }
    }
} catch (exception $e) {
    echo $e->getMessage();
    die();
}
