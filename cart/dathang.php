<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');

require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');
$filterAll = filter();
$id_sp = $filterAll["id_sp"];
$soluongmua = $filterAll["soluongmua"];

$querySanPham = oneRaw("SELECT ten_sp, giahientai_sp, id_lsp, hinhanh, (giahientai_sp * $soluongmua) as tongtien FROM sanpham WHERE id_sp = $id_sp");
echo '<pre>';

if (!empty($querySanPham)) {
    $dataDatHang = [
        'id_sp' => $id_sp,
        'ten_sp' => $querySanPham['ten_sp'],
        'giahientai_sp' => $querySanPham['giahientai_sp'],
        'hinhanh' => $querySanPham['hinhanh'],
        'tongtien' => $querySanPham['tongtien'],
        'soluongmua' => $soluongmua,
        'id_lsp' =>  $querySanPham['id_lsp'],
    ];
    
    $cart = [];

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    } else {
        $cart = [];
    }
    array_push($cart, $dataDatHang);
    setSession('cart', $cart);

    redirect(_WEB_HOST . "/cart/");
}
