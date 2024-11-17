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
    $userDetail = oneRaw("SELECT * FROM users WHERE id_user = '$userId'");
    $upload_dir = _WEB_PATH_TEMPLATES . "/images/users/";
    if ($userDetail['hinhanh_user'] != 'default-account.jpg') {
        $old_file_sp_hinh =  $upload_dir . $userDetail['hinhanh_user'];
    } else {
        $old_file_sp_hinh = null;
    }
    if (!empty($userDetail)) {
        // Thực hiện xóa id ở bảng tokenLogin trước
        $deleteLogin = delete('tokenLogin', "id_user = $userId");
        $deleteDonHang = delete('donhang', "id_user = $userId");

        if (!empty(file_exists($old_file_sp_hinh))) {
            unlink($old_file_sp_hinh);
        }
        $deleteUser = delete('users', "id_user = $userId");
        if ($deleteUser) {
            setFlashData('msg', 'Xóa khách hàng thành công!');
            setFlashData('msgType', 'success');
        }
    } else {
        setFlashData('msg', 'Người dùng không tồn tại!');
        setFlashData('msgType', 'danger');
    }
} else {
    setFlashData('msg', 'Liên kết không tồn tại!');
    setFlashData('msgType', 'danger');
}
redirect(_WEB_HOST . '/users/list.php');
