<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');

$data = ['pageTitle' => 'Đăng nhập tài khoản'];
layouts('header', $data);
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');

if (isLogin()) {
    redirect(_WEB_HOST . '/index.php');
}

if (isPost()) {
    $filterAll = filter();
    if (!empty(trim($filterAll['email'])) && !empty(trim($filterAll['mat_khau']))) {
        $email = $filterAll['email'];
        $password = $filterAll['mat_khau'];

        // Truy vấn đến database
        $userQuery = oneRaw("SELECT * FROM users WHERE email = '$email'");
        if (!empty($userQuery)) {
            $passwordHash = $userQuery['mat_khau'];
            $userId = $userQuery['id_user'];
        
            if (password_verify($password, $passwordHash)) {
                // Tạo token login
                $tokenLogin = sha1(uniqid() . time());

                // insert vào bảng tokenLogin
                $dataInsert = [
                    'id_user' => $userId,
                    'token' => $tokenLogin,
                    'create_at' => date('Y-m-d H:i:s')
                ];
                $insertStatus = insert('tokenLogin', $dataInsert);

                if ($insertStatus) {
                    //lưu token vào session
                    setSession('id_dangnhap', $userId);
                    setSession('tokenLogin', $tokenLogin);
                    redirect(_WEB_HOST . '/index.php');
                } else {
                    setFlashData('msg', 'Hệ thống đang lỗi vui lòng thử lại sau!');
                    setFlashData('msgType', 'danger');
                }
            } else {
                setFlashData('msg', 'Mật khẩu không đúng!');
                setFlashData('msgType', 'danger');
            }
        } else {
            setFlashData('msg', 'Email không tồi tại!');
            setFlashData('msgType', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng nhập Email và mật khẩu!');
        setFlashData('msgType', 'danger');
    }
}

$msg = getFlashData('msg');
$msgType = getFlashData('msgType');
$errors = getFlashData('errors');
$old = getFlashData('old');

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
                <input type="text" class="mg-form form-control" name="email" placeholder="Địa chỉ Email">
            </div>
            <div class="form-group">
                <label for="">Mật Khẩu<mn style="color:red">*</mn></label>
                <input type="password" class="mg-form form-control" name="mat_khau" placeholder="Mật khẩu">
            </div>
            <p class="">Quên mật khẩu? Nhấn vào<a href="<?php echo _WEB_HOST ?>/auth/forgot.php"> đây</a></p>
            <button type="submit" class="btn-login btn btn-primary btn-block">Đăng nhập</button>
        </form>
    </div>
</div>

<?php
layouts('footer-login');
?>