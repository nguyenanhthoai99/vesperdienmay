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

$data = ['pageTitle' => 'Quên mật khẩu'];
layouts('header', $data);

// Kiểm tra lỗi 
if (isPost()) {
    $filterAll = filter();
    if (!empty($filterAll['email'])) {
        $email = $filterAll['email'];

        // Truy vấn database lấy email
        $queryUser = oneRaw("SELECT * FROM users WHERE email = '$email'");
        if (!empty($queryUser)) {
            $userId = $queryUser['id_user'];

            // Tạo token forgot
            $forgottenToken = sha1(uniqid(). time());
            $dataUpdate = [
                'forgotToken' => $forgottenToken
            ];
            $updataStatus = update('users', $dataUpdate, "id_user = '$userId'");
            if($updataStatus){
                // Tạo đường link khôi phục mật khẩu
                $linkReset = _WEB_HOST . '/auth/reset.php?token=' . $forgottenToken;
                
                // thiết lại email
                $subject = 'Yêu chào khôi phục mật khẩu';
                $content = 'Chào'.$queryUser['fullname'] . '<br/>';
                $content .= 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn. Vui lòng bấm vào đường link dưới đây để đổi mật khẩu! <br/>';
                $content .= $linkReset . '<br/>';
                $content .= 'Trân trọng cảm ơn!';
                
                // Gửi mail
                $sendMail = sendMail($email,$subject,$content);
                if($sendMail){
                    setFlashData('msg', 'Vui lòng kiểm tra Email để đặt phục mật khẩu!');
                    setFlashData('msgType', 'success');
                    redirect(_WEB_HOST . '/auth/login.php');
                } else {
                    setFlashData('msg', 'Hệ thống bị lỗi vui lòng thử lại sau!');
                    setFlashData('msgType', 'danger');
                }
            } else {
                setFlashData('msg', 'Hệ thống bị lỗi vui lòng thử lại sau!');
                setFlashData('msgType', 'danger');
            }
        } else {
            setFlashData('msg', 'Email không tồi tại!');
            setFlashData('msgType', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng nhập địa chỉ Email');
        setFlashData('msgType', 'danger');
    }
    redirect(_WEB_HOST . '/auth/forgot.php');
}

$msg = getFlashData('msg');
$msgType = getFlashData('msgType');

?>

<div class="row main-dangky">
    <div class="col-4" style="margin:75px auto;">

        <h2 class="title-login text-center">QUÊN MẬT KHẨU</h2>
        <p class="text-center title-login">Chúng tôi sẽ gửi cho bạn một email để kích hoạt việc đặt lại mật khẩu.</p>

        <?php
        !empty($msg) ? getMsg($msg, $msgType) : '';
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Email <mn style="color:red">*</mn></label>
                <input type="text" class="mg-form form-control" name="email" placeholder="Địa chỉ Email">
            </div>
           
            <button type="submit" class="btn-login btn btn-primary btn-block">Lấy lại mật khẩu</button>
            <p class="text-center mt-3"><a href="<?php echo _WEB_HOST ?>/auth/login.php" style="text-decoration: none; color: black;">Quay lại</a></p>
        </form>
    </div>
</div>

<?php
layouts('footer-login');
?>