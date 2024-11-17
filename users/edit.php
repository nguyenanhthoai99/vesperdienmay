<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/session.php');
adminLogin();
$data = ['pageTitle' => 'Thêm thông tin tài khoản khách hàng'];
layouts('header-admin', $data);
$filterAll = filter();

//Kiểm tra id có tồn tại không
if (!empty($filterAll['id'])) {
    // truy vấn đến cơ sở dữ liệu
    $userId = $filterAll['id'];
    $userDetail = oneRaw("SELECT * FROM users WHERE id_user = '$userId'");
    if (!empty($userDetail)) {
        setFlashData('userDetail', $userDetail);
    }
} else {
    redirect(_WEB_HOST . '/users/list.php');
}

if (isPost()) {
    $errors = [];
    $filterAll = filter();
    // Kiểm tra lỗi của Họ và tên
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
        $sql = "SELECT id_user FROM users WHERE email = '$email' AND id_user <> $userId";

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
    if (empty($filterAll['dia_chi'])) {
        $errors['dia_chi']['required'] = 'Địa chỉ bắt buộc phải nhập';
    }

    // Trường hợp người dùng có đổi mật khẩu
    if (!empty($filterAll['password'])) {
        $dataUpdate['password'] = password_hash($filterAll['password'], PASSWORD_DEFAULT);
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
    }
    if (isset($_FILES['hinhanh_user'])) {
        $upload_dir = _WEB_PATH_TEMPLATES . "/images/users/";

        if (!$_FILES['hinhanh_user']['error'] > 0 && empty($errors)) {
            $anhDaiDien = $_FILES['hinhanh_user']['name'];
            $tentaptin_anh = date('YdmHis') . '_' . $anhDaiDien;
            move_uploaded_file($_FILES['hinhanh_user']['tmp_name'], $upload_dir . $tentaptin_anh);
            $old_file_sp_hinh =  $upload_dir .$userDetail['hinhanh_user'];
            if (file_exists($old_file_sp_hinh)) {
                unlink($old_file_sp_hinh);
            }
        } else {
            $tentaptin_anh =  $userDetail['hinhanh_user'];
        }
    }

    if (empty($errors)) {
        $dataUpdate = [
            'hoten_user' => $filterAll['hoten_user'],
            'email' => $filterAll['email'],
            'sdt' => $filterAll['sdt'],
            'hinhanh_user' => $tentaptin_anh,
            'dia_chi' => $filterAll['dia_chi'],
            'phan_quyen' => 2,
            'mat_khau' => password_hash($filterAll['password'], PASSWORD_DEFAULT),
            'update_at' => date('Y-m-d H:i:s')
        ];

        // Trường hợp người dùng có đổi mật khẩu
        if (!empty($filterAll['password'])) {
            $dataUpdate['password'] = password_hash($filterAll['password'], PASSWORD_DEFAULT);
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
        }

        $condition = "id_user = $userId";
        $updateStatus = update('users', $dataUpdate, $condition);
        if ($updateStatus) {
            setFlashData('msg', 'Sửa khách hàng thành công!!');
            setFlashData('msgType', 'success');
        } else {
            setFlashData('msg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sao');
            setFlashData('msgType', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng kiểm tra lại dữ liệu!');
        setFlashData('msgType', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
    }
    redirect(_WEB_HOST . '/users/edit.php?id=' . $userId);
}

$msg = getFlashData('msg');
$msgType = getFlashData('msgType');
$errors = getFlashData('errors');
$old = getFlashData('old');
$userDetail = getFlashData('userDetail');

// Kiểm userDetail vào gán dữ liệu cũ vào form
if (!empty($userDetail)) {
    $old = $userDetail;
}
?>

<div class="container-fulid">
    <!-- menu dọc -->
    <div class="row" style="margin: 0px">
        <?php layouts('menu-admin'); ?>

        <!-- Nội dung chính của trang -->
        <div class="col-1"></div>
        <div class="col-7 content">
            <div class="col">
                <h2 class="text-center title-login">THÊM TÀI KHOẢN KHÁCH HÀNG</h2>
                <?php
                !empty($msg) ? getMsg($msg, $msgType) : '';
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
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
                                <img src="<?php echo _WEB_HOST_TEMPLATES ?>/images/users/<?php echo $userDetail['hinhanh_user'] ?>" id="anhDemo" name="anhDemo" width="200px" height="200px">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" id="hinhanh_user" name="hinhanh_user" placeholder="Ảnh đại diện" onchange="showHinh()" value="<?php echo old('hinhanh_user', $old); ?>">
                                <?php echo formError('hinhanh_user', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Địa chỉ <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="dia_chi" placeholder="Số nhà, ấp, xã, huyện, tỉnh" value="<?php echo old('dia_chi', $old); ?>">
                                <?php echo formError('dia_chi', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Mật Khẩu</label>
                                <input type="password" class="mg-form form-control" name="password" placeholder="Mật khẩu (nếu có thay đổi)"> <?php echo formError('password', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Nhập lại mật Khẩu</label>
                                <input type="password" class="mg-form form-control" name="password_confirm" placeholder="Nhập lại mật khẩu (nếu có thay đổi)"> <?php echo formError('password_confirm', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $userId; ?>">
                        </div>
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <button type="submit" class="btn-login btn btn-primary btn-block" style="width:30%;">Sửa thông tin</button>
                        <a href="<?php echo _WEB_HOST . '/users/list.php' ?>" class="btn btn-success btn-block" style="width:30%;">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
layouts('footer-admin');
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