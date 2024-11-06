<?php
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo !empty($data['pageTitle']) ?  $data['pageTitle'] : 'Điện máy giá rẻ nhất - Siêu thị điện máy Vesper Nguyễn' ?></title>
    <meta name="keywords " content="Vesper Nguyễn, vesperdienmay, vesper nguyễn, Điện máy Giá Rẻ, dienmaygiare, điện máy giá rẻ, md, tivi,tủ lạnh,máy giặt">
    <link rel="icon" href="<?php echo _WEB_HOST_TEMPLATES ?>/images/icon/icon.jpg?ver=" type="image/jpg" sizes="16x16">
    <link rel="icon" href="<?php echo _WEB_HOST_TEMPLATES ?>/images/icon/icon.jpg?ver=" type="image/jpg" sizes="32x32">

    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container">
    <nav id="header" class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="<?php echo _WEB_HOST; ?>"><img src="<?php echo _WEB_HOST_TEMPLATES ?>/images/icon/icon.jpg" class="hinh-icon" />Vesper Nguyễn</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu-header" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <form class="d-flex main-timkiem" role="search" method="get">
                        <input class="form-control me-2 input-timkiem" type="search" placeholder="Nhập sản phẩm bạn muốn tìm kiếm" aria-label="search">
                        <button class="btn btn-search" type="submit">Tìm kiếm</button>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" aria-current="page" href="<?php echo _WEB_HOST ?>/gioithieu.php">Giới thiệu</a>
                    </li>

                    <?php
                    $checkSession = getSession('user_login');
                    if (!empty($_COOKIE['user_login'])) {
                        $checkSession =  $_COOKIE['user_login'];
                    }
                    $email = getSession('user_login');
                    if (!empty(getSession('user_login')) || !empty($_COOKIE['user_login'])) :
                        $queryCheckEmail = getRaw("SELECT email FROM users");
                        foreach ($queryCheckEmail as $item) {
                            if (password_verify($item['email'], $checkSession)){
                                $email = $item['email'];
                                break;
                            }
                        }
                        
                        $queryUser = oneRaw("SELECT * FROM users WHERE email = '$email'");
                    ?>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/users/<?php echo $queryUser['hinhanh_user'] ?  $queryUser['hinhanh_user'] : 'default-account.jpg' ?>" class="img-user">
                        </a>
                        <li class="nav-item dropdown">

                            <?php if (!empty($checkSession) && $queryUser['email'] == 'admin'): ?>
                                <ul class="dropdown-menu dropdown-menu-end" style="background:#2a83e9b0;">
                                    <li><a class="dropdown-item" href="<?php _WEB_HOST;?>/vesperdienmay/auth/profile.php">Thông tin tài khoản</a></li>
                                    <li><a class="dropdown-item" href="<?php _WEB_HOST;?>/vesperdienmay/admin/dashboard.php">Quản lý</a></li>
                                    <li><a class="dropdown-item" href="<?php echo _WEB_HOST ?>/auth/logout.php">Đăng xuất</a></li>
                                </ul>
                            <?php else: ?>
                                <ul class="dropdown-menu dropdown-menu-end" style="background:#2a83e9b0">
                                    <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                                    <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                                    <li><a class="dropdown-item" href="<?php echo _WEB_HOST ?>/auth/logout.php">Đăng xuất</a></li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php
                    else :
                    ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary" href="<?php echo _WEB_HOST ?>/auth/login.php"><i class="fa-solid fa-user"></i> Đăng nhập</a>
                        </li>
                    <?php
                    endif;
                    ?>

                    <li class="nav-item giohang">
                        <a class="nav-link btn btn-outline-primary" href="<?php echo _WEB_HOST ?>/cart/"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                        <span class="sohanghoa">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $giohang = $_SESSION['cart'];
                                if ($giohang != null) {
                                    echo count($giohang);
                                }
                            }
                            ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


</html>