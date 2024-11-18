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
    $userDetail = oneRaw("SELECT * FROM sanpham WHERE id_sp = '$IdSP'");
    $upload_dir = _WEB_PATH_TEMPLATES . "/images/maylocnuoc/";
    if ($userDetail['hinhanh'] != 'default.jpg') {
        $old_file_sp_hinh =  $upload_dir . $userDetail['hinhanh'];
    } else {
        $old_file_sp_hinh = null;
    }
    if (!empty($userDetail)) {
        // Thực hiện xóa id ở bảng may giặt trước
        $deleteMayLocNuoc = delete('maylocnuoc', "id_sp = $IdSP");
        if($deleteMayLocNuoc){
        if (!empty(file_exists($old_file_sp_hinh))) {
            unlink($old_file_sp_hinh);
        }
            $deleteSP = delete('sanpham', "id_sp = $IdSP");
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
redirect(_WEB_HOST . '/maylocnuoc/list.php');
