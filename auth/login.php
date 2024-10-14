<?php
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
$data = ['pageTitle' => 'Đăng nhập tài khoản'];
layouts('header',$data);


if (isPost()) {
    $filterAll = filter();
    $errors = [];


}
?>

<div class="row main-dangky">
    <div class="col-4" style="margin:75px auto;">

        <h2 class="title-login">ĐĂNG NHẬP TÀI KHOẢN</h2>
        <p class="text-center title-login">Bạn chưa có tài khoản ?<a href="<?php echo _WEB_HOST ?>/auth/register.php"> Đăng ký tại đây</a></p>

        <?php
        !empty($msg) ? getMsg($msg, $msgType) : '';
        ?>
        <form action="" method="post" enctype="multipart/form">
            <div class="form-group">
                <label for="">Email <mn style="color:red">*</mn></label>
                <input type="email" class="mg-form form-control" name="email" placeholder="Địa chỉ Email">
            </div>
            <div class="form-group">
                <label for="">Mật Khẩu<mn style="color:red">*</mn></label>
                <input type="password" class="mg-form form-control" name="password" placeholder="Mật khẩu">
            </div>
            <p class="">Quên mật khẩu? Nhấn vào<a href="<?php echo _WEB_HOST ?>/auth/forgot.php"> đây</a></p>
            <button type="submit" class="btn-login btn btn-primary btn-block">Đăng nhập</button>

        </form>
    </div>
</div>

<?php
layouts('footer-login');
?>