<?php
// Hàm kiểm tra tài khoản admin
function adminLogin()
{
    $checkAdmin = false;
    if (!empty($_COOKIE['user_login'])) {
        $_SESSION['user_login'] = $_COOKIE['user_login'];
        $checkAdmin = true;
    }

    //kiểm tra có phải session của admin không
    $checkSession = password_verify("admin", $_SESSION['user_login']);
    if (!empty($_SESSION['user_login'] == 'admin' || $checkSession)) {
        $checkAdmin = true;
    } else {
        redirect(_WEB_HOST . '/errors/404.php');
    }
    return $checkAdmin;
}


//hàm tính ngày cuối cùng của tháng trong năm
function endDate($year, $month)
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    switch ($month) {
        case 1:
            return $year . '-0' . $month . '-31';
        case 2:
            if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
                return $year . '-0' . $month . '-29';
            } else {
                return $year . '-0' . $month . '-28';
            }
        case 3:
            return $year . '-0' . $month . '-31';
        case 4:
            return $year . '-0' . $month . '-30';;
        case 5:
            return $year . '-0' . $month . '-31';
        case 6:
            return $year . '-0' . $month . '-30';;
        case 7:
            return $year . '-0' . $month . '-31';
        case 8:
            return $year . '-0' . $month . '-31';
        case 9:
            return $year . '-0' . $month . '-30';;
        case 10:
            return $year . '-' . $month . '-31';
        case 11:
            return $year . '-' . $month . '-30';
            break;
        case 12:
            return $year . '-' . $month . '-31';
        default:
            return 'Tháng không hợp lệ';
    }
}
