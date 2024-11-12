<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/session.php');
adminLogin();
$data = ['pageTitle' => 'Thêm thông tin máy giặt'];
layouts('header-admin', $data);

$queryNSX = getRaw("SELECT * FROM nhasanxuat");
$queryTh = getRaw("SELECT * FROM thuonghieu");

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
        $upload_dir = _WEB_PATH_TEMPLATES . "/images/maygiat/";

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
            setFlashData('msg', 'Thêm tài khoản khách hàng thành công!');
            setFlashData('msgType', 'success');
            redirect(_WEB_HOST . '/users/list.php');
        } else {
            setFlashData('msg', 'Thêm mới không thành công!');
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

<div class="container-fulid">
    <!-- menu dọc -->
    <div class="row" style="margin: 0px">
        <?php layouts('menu-admin'); ?>

        <!-- Nội dung chính của trang -->
        <div class="col-1"></div>
        <div class="col-7 content">
            <div class="col">
                <h2 class="text-center title-login">THÊM SẢN PHẨM MỚI GIẶT</h2>
                <?php
                !empty($msg) ? getMsg($msg, $msgType) : '';
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tên sản phẩm <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="ten_sp" placeholder="Tên sản phẩm" value="<?php echo old('ten_sp', $old); ?>">
                                <?php echo formError('hoten_user', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="anhDaiDien">Ảnh sản phẩm</label><br />
                                <img src="<?php echo _WEB_HOST_TEMPLATES ?>/images/maygiat/default.jpg" id="anhDemo" name="anhDemo" width="200px" height="200px">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" id="hinhanh" name="hinhanh" placeholder="Ảnh sản phẩm" onchange="showHinh()" value="<?php echo old('hinhanh', $old); ?>">
                                <?php echo formError('hinhanh', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="id_th">Thương hiệu</label>
                                <select class="form-control" id="id_th" name="id_th">
                                    <option selected>Chưa lựa chọn</option>
                                    <?php foreach ($queryTh  as $item) : ?>
                                        <option value="<?= $item['id_th'] ?>" <?php echo (old('id_th', $old) == $item['id_th']) ? ' selected' : false; ?>><?= $item['ten_th'] ?></option>
                                        <?php echo (old('id_th', $old) == $item['id_th']) ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo formError('id_nsx', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Loại máy giặt <mn style="color:red">*</mn></label>
                                <select class="form-select" aria-label="Default select example" name="kieu_mg">
                                    <option selected>Chưa lựa chọn</option>
                                    <option value="1" <?php echo (old('kieu_mg', $old) == 1) ? ' selected' : false; ?>>
                                        Cửa đứng</option>
                                    <option value="2" <?php echo (old('kieu_mg', $old) == 2) ? ' selected' : false; ?>>Cửa trước</option>
                                </select>
                                <?php echo formError('kieu_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Lồng máy giặt <mn style="color:red">*</mn></label>
                                <select class="form-select" aria-label="Default select example" name="long_mg">
                                    <option selected>Chưa lựa chọn</option>
                                    <option value="1" <?php echo (old('long_mg', $old) == 1) ? ' selected' : false; ?>>
                                        Lồng đứng</option>
                                    <option value="2" <?php echo (old('long_mg', $old) == 2) ? ' selected' : false; ?>>Lồng ngang</option>
                                </select>
                                <?php echo formError('long_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Giá gốc <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="giagoc_sp" placeholder="Giá gốc" value="<?php echo old('giagoc_sp', $old); ?>">
                                <?php echo formError('giagoc_sp', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Giá giảm</label>
                                <input type="number" class="mg-form form-control" name="giahientai_sp" placeholder="Giá giảm" value="<?php echo old('giahientai_sp', $old); ?>">
                                <?php echo formError('giahientai_sp', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Khối lượng giặt (Kg) <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="khoiluong_mg" placeholder="Khối lượng giặt (kg)" value="<?php echo old('khoiluong_mg', $old); ?>">
                                <?php echo formError('khoiluong_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Tốc độ quay vắt tốc đa (vòng/phút) <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="tocdoquay_mg" placeholder="Tốc độ quay vắt tốc đa (vòng/phút)" value="<?php echo old('tocdoquay_mg', $old); ?>">
                                <?php echo formError('tocdoquay_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Chất lượng lồng giặt <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="chatluonglong_mg" placeholder="Chất lượng lồng giặt" value="<?php echo old('chatluonglong_mg', $old); ?>">
                                <?php echo formError('chatluonglong_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Chất lượng vỏ máy <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="chatlieuvo_mg" placeholder="Chất lượng vỏ máy" value="<?php echo old('chatlieuvo_mg', $old); ?>">
                                <?php echo formError('chatlieuvo_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Chất lượng cửa máy <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="chatlieunap_mg" placeholder="Chất lượng cửa máy" value="<?php echo old('chatlieunap_mg', $old); ?>">
                                <?php echo formError('chatlieunap_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="id_nsx">Nhà sản xuất</label>
                                <select class="form-control" id="id_nsx" name="id_nsx">
                                    <option selected>Chưa lựa chọn</option>
                                    <?php foreach ($queryNSX  as $item) : ?>
                                        <option value="<?= $item['id_nsx'] ?>" <?php echo (old('id_nsx', $old) == $item['id_nsx']) ? ' selected' : false; ?>><?= $item['ten_nsx'] ?></option>
                                        <?php echo (old('id_nsx', $old) == $item['id_nsx']) ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo formError('id_nsx', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Năm <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="nam" placeholder="Năm sản xuất" value="<?php echo old('nam', $old); ?>">
                                <?php echo formError('nam', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Thời gian bản hàng động cơ <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="baohanh" placeholder="Thời gian bản hàng động cơ" value="<?php echo old('baohanh', $old); ?>">
                                <?php echo formError('baohanh', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                        </div>
                        <button type="submit" class="btn-login btn btn-primary btn-block" style="margin:15px 5px; width:45%">Thêm mới</button>
                        <button type="submit" class="btn-login btn btn-secondary btn-block" style="margin:15px 5px; width:45%"><a href="list.php" style="text-decoration: none; color:white">Quay về</a></button>
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
    document.getElementById('hinhanh').onchange = function(evt) {
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