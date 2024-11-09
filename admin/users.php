<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
adminLogin();
$data = ['pageTitle' => 'Quản lý thông tin tài khoản khách hàng'];
layouts('header-admin', $data);
$filterAll = filter();
$page = !empty($filterAll['page']) ? $filterAll['page'] : 1;
$itemPage = 10;
$offset = ($page - 1) * $itemPage;
$queryUsers = getRaw("SELECT * FROM users ORDER BY update_at DESC, create_at DESC");
$tongUsers = getRows("SELECT * FROM sanpham");
$tongPage = ceil($tongUsers / $itemPage);

?>
<body>
    <div class="container-fulid">
        <!-- menu dọc -->
        <div class="row" style="margin: 0px">
            <?php layouts('menu-admin'); ?>

            <!-- Nội dung chính của trang -->
            <div class="col-8 content">
                <div class="row">
                    <div>
                        
                    </div>
                </div>
                <h2 class="text-center title-login">QUẢN LÝ TÀI KHOẢN KHÁCH HÀNG</h2>
                <?php
                !empty($msg) ? getMsg($msg, $msgType) : '';
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Họ và tên <mn style="color:red">*</mn></label>
                        <input type="text" class="mg-form form-control" name="fullname" placeholder="Họ và tên" value="<?php echo old('fullname', $old); ?>">
                        <?php echo formError('fullname', ' <span class="error">', '</span>', $errors) ?>
                    </div>

                    <div class="form-group">
                        <label for="">Email <mn style="color:red">*</mn></label>
                        <input type="text" class="mg-form form-control" name="email" placeholder="Địa chỉ Email" value="<?php echo old('email', $old); ?>">
                        <?php echo formError('email', ' <span class="error">', '</span>', $errors) ?>
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại <mn style="color:red">*</mn></label>
                        <input type="number" class="mg-form form-control" name="phone" placeholder="Số điện thoại" value="<?php echo old('phone', $old); ?>">
                        <?php echo formError('phone', ' <span class="error">', '</span>', $errors) ?>
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ <mn style="color:red">*</mn></label>
                        <input type="text" class="mg-form form-control" name="address" placeholder="Số nhà, ấp, xã, huyện, tỉnh" value="<?php echo old('address', $old); ?>">
                        <?php echo formError('address', ' <span class="error">', '</span>', $errors) ?>
                    </div>

                    <div class="form-group">
                        <label for="">Mật Khẩu<mn style="color:red">*</mn></label>
                        <input type="password" class="mg-form form-control" name="password" placeholder="Mật khẩu"> <?php echo formError('password', ' <span class="error">', '</span>', $errors) ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nhập lại mật Khẩu<mn style="color:red">*</mn></label>
                        <input type="password" class="mg-form form-control" name="password_confirm" placeholder="Nhập lại mật khẩu"> <?php echo formError('password_confirm', ' <span class="error">', '</span>', $errors) ?>
                    </div>
                    <button type="submit" class="btn-login btn btn-primary btn-block" style="margin-top:20px;">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
layouts('footer-admin');
?>