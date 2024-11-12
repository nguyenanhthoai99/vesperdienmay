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
    $userId = $filterAll['id'];
    $userDetail = getRows("SELECT * FROM users WHERE id_user = '$userId'");
    if ($userDetail > 0) {
        // Thực hiện xóa id ở bảng tokenLogin trước
        $deleteLogin = delete('tokenLogin', "id_user = $userId");
        if($deleteLogin){
            $deleteUser = delete('users', "id_user = $userId");
            if($deleteUser){
                setFlashData('msg', 'Xóa khách hàng thành công!');
                setFlashData('msgType', 'success');
            }
        }
    } else{
        setFlashData('msg', 'Người dùng không tồn tại!');
        setFlashData('msgType', 'danger');
    }
} else {
    setFlashData('msg', 'Liên kết không tồn tại!');
    setFlashData('msgType', 'danger');
}
redirect(_WEB_HOST . '/users/list.php');
