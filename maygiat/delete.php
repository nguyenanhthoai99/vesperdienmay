<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');
adminLogin();
// Kiểm tra id có tồn tại không
$filterAll = filter();
if (!empty($filterAll['id'])) {
    $IdSP = $filterAll['id'];
    $userDetail = getRows("SELECT * FROM sanphan WHERE ip_sp = '$IdSP'");
    if ($userDetail > 0) {
        // Thực hiện xóa id ở bảng may giặt trước
        $deleteMayGiat = delete('maygiat', "ip_sp = $ip_sp");
        if($deleteMayGiat){
            $deleteSP = delete('users', "ip_sp = $ip_sp");
            if($deleteSP){
                setFlashData('msg', 'Xóa sản phẩm hàng thành công!');
                setFlashData('msgType', 'success');
            }
        }
    } else{
        setFlashData('msg', 'Sản phẩm không tồn tại!');
        setFlashData('msgType', 'danger');
    }
} else {
    setFlashData('msg', 'Liên kết không tồn tại!');
    setFlashData('msgType', 'danger');
}
redirect(_WEB_HOST . '/users/list.php');
