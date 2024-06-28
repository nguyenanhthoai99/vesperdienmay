<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị điện máy giá rẻ nhất - Điện máy Vesper Nguyễn </title>
    <meta name="keywords " content="Vesper Nguyễn, vespernguyen, vesper nguyễn, Điện Thoại Giá Rẻ, dienthoaigiare, điện thoại giá rẻ, dtdd, smartphone,laptop,tablet">
    <link rel="icon" href="<?php echo _WEB_HOST_TEMPLATES; ?>/imgages/icon/icon.jpg" type="image/jpg" sizes="16x16">
    <link rel="icon" href="<?php echo _WEB_HOST_TEMPLATES; ?>/imgages/icon/icon.jpg" type="image/jpg" sizes="32x32">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/clients.css">
    <link rel="stylesheet" href="http://localhost/vesperdienmay/templates/css/admin.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/slick.css">
</head>
<nav class="navbar navbar-expand-lg menu fixed-top" id="menu">
    <div class="container" id="main-menu">
        <a class="navbar-brand" href="<?php echo _WEB_HOST_CLIENTS; ?>"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/imgages/icon/icon.jpg" width="30" height="30"> Vesper Nguyễn</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex text-menu me-2" role="search">
                <input class="form-control me-2 search" type="search" placeholder="Bạn muốn tìm gì...." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Tìm kiếm</button>
            </form>
            <ul class="nav main-menu">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-house" style="color: #74C0FC;"></i>Trang chủ</a>
                </li>
                <li class="nav-item">
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Form đăng nhập -->
                                <?php require_once(_WEB_PATH_AUTH . '/login.php'); ?>
                            </div>
                        </div>
                        <!-- Form đăng ký -->
                        <?php require_once(_WEB_PATH_AUTH . '/regester.php'); ?>
                        <a class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa-regular fa-user"></i> Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

</html>