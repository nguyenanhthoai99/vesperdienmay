<?php
session_start();
require_once('config.php');
require_once('./includes/function.php');
layouts('header-clients');
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3 sidebar">
                <?php layouts('sidebar-clients'); ?>
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
                <?php layouts('content-clients'); ?>
            </div>
        </div>
    </div>
</body>

<?php
layouts('footer-clients');
?>