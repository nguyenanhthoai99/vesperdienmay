<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/clients.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<nav class="navbar navbar-expand-lg menu" id ="menu">
    <div class="container" id="main-menu">
        <a class="navbar-brand" href="#"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/imgages/icon/icon.jpg" width="30" height="30"> Vesper Nguyễn</a>
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
                    <a class="nav-link" href="#"><i class="fa-regular fa-user"></i> Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</html>