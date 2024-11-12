<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');
if(isLogin()){
    redirect(_WEB_HOST);
}

$data = ['pageTitle' => 'Đặt lại mật khẩu'];
layouts('header', $data);
$token = filter()['token'];
if (!empty($token)) {
    // truy vấn database
    $tokenQuery = oneRaw("SELECT * FROM users WHERE forgotToken = '$token'");

    $userId = $tokenQuery['id_user'];
    if (!empty($tokenQuery)) {
        if (isPost()) {
            $filterAll = filter();
            $errors = [];
            // kiểm tra password
            if (empty($filterAll['password'])) {
                $errors['password']['required'] = 'Mật khẩu buộc phải nhập';
            } else {
                if (strlen(trim($filterAll['password'])) < 7) {
                    $errors['password']['min'] = 'Mật khẩu ít nhất phải 8 kí tự';
                }
            }
            // Kiểm tra password_confirm
            if (empty($filterAll['password_confirm'])) {
                $errors['password_confirm']['required'] = 'Mật khẩu nhập lại buộc phải nhập';
            } else {
                if (($filterAll['password_confirm']) != ($filterAll['password'])) {
                    $errors['password_confirm']['match'] = 'Mật khẩu nhập lại không Khớp';
                }
            }
            if (empty($errors)) {
                $passwordhash = password_hash($filterAll['password'], PASSWORD_DEFAULT);
                $dataUpdate = [
                    'mat_khau' => $passwordhash,
                    'forgotToken' => null,
                    'update_at' => date('Y-m-d H:i:s')
                ];

                $updateStatus = update('users', $dataUpdate, "id_user = '$userId'");
                if ($updateStatus) {
                    setFlashData('msg', 'Đổi mật khẩu thành công bạn có thể đăng nhập!');
                    setFlashData('msgType', 'success');
                    redirect(_WEB_HOST . '/auth/login.php');
                } else {
                    setFlashData('msg', 'Lỗi hệ thống vui lòng thử lại sau!');
                    setFlashData('msgType', 'danger');
                }
            } else {
                setFlashData('msg', 'Vui lòng kiểm tra lại dữ liệu!');
                setFlashData('msgType', 'danger');
                setFlashData('errors', $errors);
     
            }
        }
    }
}

$msg = getFlashData('msg');
$msgType = getFlashData('msgType');
$errors = getFlashData('errors');

?>

<div class="row main-dangky">
    <div class="col-4" style="margin:75px auto;">
        <h2 class="title-login text-center">ĐẶT LẠI MẶT KHẨU</h2>
        <?php
        !empty($msg) ? getMsg($msg, $msgType) : '';
        ?>
        <form action="" method="post">
            <div class="form-group">
            <p class="title-login">Nhập lại mật khẩu mới</p>
                <label for="">Mật Khẩu<mn style="color:red">*</mn></label>
                <input type="password" class="mg-form form-control" name="password" placeholder="Mật khẩu"> <?php echo formError('password', ' <span class="error">', '</span>', $errors) ?>
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu<mn style="color:red">*</mn></label>
                <input type="password" class="mg-form form-control" name="password_confirm" placeholder="Nhập lại mật khẩu"> <?php echo formError('password_confirm', ' <span class="error">', '</span>', $errors) ?>
            </div>
            <input type="hidden" name="token" value="<?php echo $token; ?>" />
            <button type="submit" class="btn-login btn btn-primary btn-block">Lấy lại mật khẩu</button>
            <p class="text-center mt-3"><a href="<?php echo _WEB_HOST ?>/auth/login.php" style="text-decoration: none; color: black;">Hủy</a></p>
        </form>
    </div>
</div>

<?php
layouts('footer-login');
?>