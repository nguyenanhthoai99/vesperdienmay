<?php
session_start();
require_once('config.php');
require_once('./includes/function.php');
layouts('header-clients');
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3 sidebar fixed-top">
                <?php layouts('sidebar-clients'); ?>
            </div>
            <div class="col-3">

            </div>
            <div class="col-9 content">
                <!-- Trang lọc sản phẩm -->
                <div class="main-filter">
                    <ul class="nav nav-pills nav-pills nav-fill">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">Hãng</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">LG</a></li>
                                <li><a class="dropdown-item" href="#">LG</a></li>
                                <li><a class="dropdown-item" href="#">LG</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-3">TIVI</div>
                    <div class="col-3">TIVI</div>
                    <div class="col-3">TIVI</div>
                    <div class="col-3">TIVI</div>
                </div>
            </div>
        </div>
    </div>
</body>


<div class="row container-fluid">
    <div class="col-3">
    </div>
    <div class="col-9">
        <?php layouts('footer-clients');   ?>
    </div>
</div>