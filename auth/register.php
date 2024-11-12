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
$data = ['pageTitle' => 'Đăng ký tài khoản'];
layouts('header-login', $data);



if (isPost()) {
    $filterAll = filter();
    $errors = [];

    // Kiểm tra lỗi của họ và tên
    if (empty($filterAll['hoten_user'])) {
        $errors['hoten_user']['required'] = 'Họ và tên bắt buộc phải nhập';
    } else {
        if (strlen(trim($filterAll['hoten_user'])) < 5) {
            $errors['hoten_user']['min'] = 'Họ và tên ít nhất phải 5 kí tự';
        }
    }

    // kiểm tra email
    if (empty($filterAll['email'])) {
        $errors['email']['required'] = 'Email bắt buộc phải nhập';
    } else {
        $email = $filterAll['email'];
        $sql = "SELECT email FROM users WHERE email = '$email'";
        if (getRows($sql) > 0) {
            $errors['email']['unique'] = 'Email đã tồn tại';
        }
    }

    //Kiểm tra ảnh
    if (isImages('hinhanh_user')) {
        $errors['hinhanh_user']['isImages'] = 'Không phải file ảnh';
    } else {
        if ($_FILES['hinhanh_user']['size'] > 5242880) {
            $errors['hinhanh_user']['max'] = 'Không vượt quá 5MB';
        }
    }

    // kiểm tra số điện thoại
    if (empty($filterAll['sdt'])) {
        $errors['sdt']['required'] = 'Số điện thoại bắt buộc phải nhập';
    } else {
        if (!isPhone($filterAll['sdt'])) {
            $errors['sdt']['isPhone'] = 'Số điện thoại không đúng';
        }
    }

    // Kiểm tra địa chỉ
    if (empty($filterAll['address'])) {
        $errors['address']['required'] = 'Địa chỉ bắt buộc phải nhập';
    }

    // kiểm tra password
    if (empty($filterAll['mat_khau'])) {
        $errors['mat_khau']['required'] = 'Mật khẩu buộc phải nhập';
    } else {
        if (strlen(trim($filterAll['mat_khau'])) < 7) {
            $errors['mat_khau']['min'] = 'Mật khẩu ít nhất phải 8 kí tự';
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

    if (isset($_FILES['hinhanh_user'])) {
        $upload_dir = _WEB_PATH_TEMPLATES . "/images/users/";

        if (!$_FILES['hinhanh_user']['error'] > 0) {
            $anhDaiDien = $_FILES['hinhanh_user']['name'];
            $tentaptin_anh = date('YdmHis') . '_' . $anhDaiDien;
            move_uploaded_file($_FILES['hinhanh_user']['tmp_name'], $upload_dir . $tentaptin_anh);
        } else {
            $tentaptin_anh = "default-account.jpg";
        }
    }

    if (empty($errors)) {
        $dataInsert = [
            'hoten_user' => $filterAll['hoten_user'],
            'email' => $filterAll['email'],
            'sdt' => $filterAll['sdt'],
            'hinhanh_user' => $tentaptin_anh,
            'dia_chi' => $filterAll['address'],
            'phan_quyen' => 2,
            'mat_khau' => password_hash($filterAll['mat_khau'], PASSWORD_DEFAULT),
            'create_at' => date('Y-m-d H:i:s')
        ];
        $inserStatus = insert('users', $dataInsert);
        if ($inserStatus) {
            setFlashData('msg', 'Đăng ký thành công. Bạn có thể đăng nhập ngay!');
            setFlashData('msgType', 'success');
            redirect(_WEB_HOST . '/auth/login.php');
        } else {
            setFlashData('msg', 'Đăng ký không thành công!');
            setFlashData('msgType', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng kiểm tra lại dữ liệu!');
        setFlashData('msgType', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Họ và tên <mn style="color:red">*</mn></label>
                <input type="text" class="mg-form form-control" name="hoten_user" placeholder="Họ và tên" value="<?php echo old('hoten_user', $old); ?>">
                <?php echo formError('hoten_user', ' <span class="error">', '</span>', $errors) ?>
            </div>

            <div class="form-group">
                <label for="">Email <mn style="color:red">*</mn></label>
                <input type="text" class="mg-form form-control" name="email" placeholder="Địa chỉ Email" value="<?php echo old('email', $old); ?>">
                <?php echo formError('email', ' <span class="error">', '</span>', $errors) ?>
            </div>

            <div class="form-group">
                <label for="">Số điện thoại <mn style="color:red">*</mn></label>
                <input type="number" class="mg-form form-control" name="sdt" placeholder="Số điện thoại" value="<?php echo old('sdt', $old); ?>">
                <?php echo formError('sdt', ' <span class="error">', '</span>', $errors) ?>
            </div>

            <div class="form-group">
                <label for="anhDaiDien">Ảnh đại diện</label><br />
                <img src="<?php echo _WEB_HOST_TEMPLATES ?>/images/users/default-account.jpg" id="anhDemo" name="anhDemo" width="200px" height="200px">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="hinhanh_user" name="hinhanh_user" placeholder="Ảnh đại diện" onchange="showHinh()" value="<?php echo old('hinhanh_user', $old); ?>">
                <?php echo formError('hinhanh_user', ' <span class="error">', '</span>', $errors) ?>
            </div>

            <div class="form-group">
                <label for="">Địa chỉ <mn style="color:red">*</mn></label>
                <input type="text" class="mg-form form-control" name="address" placeholder="Số nhà, ấp, xã, huyện, tỉnh" value="<?php echo old('address', $old); ?>">
                <?php echo formError('address', ' <span class="error">', '</span>', $errors) ?>
            </div>

            <div class="form-group">
                <label for="">Mật Khẩu<mn style="color:red">*</mn></label>
                <input type="password" class="mg-form form-control" name="mat_khau" placeholder="Mật khẩu"> <?php echo formError('mat_khau', ' <span class="error">', '</span>', $errors) ?>
            </div>

            <div class="form-group">
                <label for="">Nhập lại mật Khẩu<mn style="color:red">*</mn></label>
                <input type="password" class="mg-form form-control" name="password_confirm" placeholder="Nhập lại mật khẩu"> <?php echo formError('password_confirm', ' <span class="error">', '</span>', $errors) ?>
            </div>
            <button type="submit" class="btn-login btn btn-primary btn-block" style="margin-top:20px;">Đăng ký</button>
        </form>
    </div>
</div>

<?php
layouts('footer-login');
?>

<script>
    document.getElementById('hinhanh_user').onchange = function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById("anhDemo").src = fr.result;
            }
            fr.readAsDataURL(files[0]);
        }
    }
</script>