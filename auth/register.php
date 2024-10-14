<?php
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
$data = ['pageTitle' => 'Đăng ký tài khoản'];
layouts('header', $data);
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');

if (isPost()) {
    $filterAll = filter();
    $errors = [];

    // Kiểm tra lỗi của fullname
    if (empty($filterAll['fullname'])) {
        $errors['fullname']['required'] = 'Họ và tên bắt buộc phải nhập';
    } else {
        if (strlen(trim($filterAll['fullname'])) < 5) {
            $errors['fullname']['min'] = 'Họ và tên ít nhất phải 5 kí tự';
        }
    }

    // kiểm tra email
    if (empty($filterAll['email'])) {
        $errors['email']['required'] = 'Email bắt buộc phải nhập';
    } else {
        $email = $filterAll['email'];
        $sql = "SELECT id_user FROM users WHERE email = '$email'";
        if (getRows($sql) > 0) {
            $errors['email']['unique'] = 'Email đã tồn tại';
        }
    }

    // kiểm tra phone
    if (empty($filterAll['phone'])) {
        $errors['phone']['required'] = 'Số điện thoại bắt buộc phải nhập';
    } else {
        if (!isPhone($filterAll['phone'])) {
            $errors['phone']['isPhone'] = 'Số điện thoại không đúng';
        }
    }

    // Kiểm tra địa chỉ
    if (empty($filterAll['address'])) {
        $errors['address']['required'] = 'Địa chỉ bắt buộc phải nhập';
    } 

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
            $errors['password_confirm']['match'] = 'Mật khẩu nhập lại không đúng';
        }
    }

// echo '<pre>'; print_r($errors); echo '</pre>';
    if (empty($errors)) {
        
        $activeToken = sha1(uniqid() . time());
        $dataInsert = [
            'hoten_user' => $filterAll['fullname'],
            'email' => $filterAll['email'],
            'sdt' => $filterAll['phone'],
            'dia_chi' => $filterAll['address'],
            'phan_quyen' => 0,
            'mat_khau' => password_hash($filterAll['password'], PASSWORD_DEFAULT),
            'activeToken' => $activeToken,
            'create_at' => date('Y-m-d H:i:s')
        ];
        $inserStatus = insert('users', $dataInsert);
        if ($inserStatus) {
            // Tạo link kích hoạt
            $linkActive = _WEB_HOST . '/auth/active.php?token=' . $activeToken;

            // thiết mail kích hoạt
            $subject = $filterAll['fullname'] . 'Vui lòng kích hoạt tài khoản!';
            $content = 'Chào' . $filterAll['fullname'] . '<br/>';
            $content .= 'Vui lòng bấm vào đường link dưới đây để kích hoạt: <br/>';
            $content .= $linkActive . '<br/>';
            $content .= 'Trân trọng cảm ơn!';

            // Gửi email
            $sendEmail =  sendMail($filterAll['email'], $subject, $content);
            if ($sendEmail) {
                setFlashData('msg', 'Đăng ký thành công! Vui lòng kiểm tra email để kích hoạt tài khoản!!');
                setFlashData('msgType', 'success');
            } else {
                setFlashData('msg', 'Lỗi hệ thống vui lòng thử lại sau!');
                setFlashData('msgType', 'danger');
            }
        } else {
            setFlashData('msg', 'Đăng ký không thành công!');
            setFlashData('msgType', 'danger');
        }
        // redirect(_WEB_HOST . '/auth/login.php');
    } else {
        setFlashData('msg', 'Vui lòng kiểm tra lại dữ liệu!');
        setFlashData('msgType', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        // redirect(_WEB_HOST . '/auth/register.php');
    }
}


$msg = getFlashData('msg');
$msgType = getFlashData('msgType');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

<div class="row main-dangky">
    <div class="col-4" style="margin:75px auto;">

        <h2 class="text-center title-login">ĐĂNG KÝ TÀI KHOẢN</h2>
        <p class="text-center title-login">Bạn đã có tài khoản ? Đăng nhập<a href="<?php echo _WEB_HOST ?>/auth/login.php"> tại đây</a></p>
        <?php
        !empty($msg) ? getMsg($msg, $msgType) : '';
        ?>
        <form action="" method="post" enctype="multipart/form">
            <div class="form-group">
                <label for="">Họ và tên <mn style="color:red">*</mn></label>
                <input type="text" class="mg-form form-control" name="fullname" placeholder="Họ và tên" value="<?php echo old('fullname', $old); ?>">
                <?php echo formError('fullname', ' <span class="error">', '</span>', $errors) ?>
            </div>

            <div class="form-group">
                <label for="">Email <mn style="color:red">*</mn></label>
                <input type="" class="mg-form form-control" name="email" placeholder="Địa chỉ Email" value="<?php echo old('email', $old); ?>">
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
                <label for="">Mật Khẩu<mn style="color:red">*</mn></label>
                <input type="password" class="mg-form form-control" name="password_confirm" placeholder="Nhập lại mật khẩu"> <?php echo formError('password_confirm', ' <span class="error">', '</span>', $errors) ?>
            </div>
            <button type="submit" class="btn-login btn btn-primary btn-block" style="margin-top:20px;">Đăng ký</button>
        </form>
    </div>
</div>

<?php
layouts('footer-login');
?>