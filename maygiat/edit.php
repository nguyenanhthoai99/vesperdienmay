<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/session.php');
adminLogin();
$data = ['pageTitle' => 'Sửa thông tin máy giặt'];
layouts('header-admin', $data);
$filterAll = filter();
//Kiểm tra id có tồn tại không
if (!empty($filterAll['id'])) {
    // truy vấn đến cơ sở dữ liệu
    $sanPhamId = $filterAll['id'];
    $userDetail = oneRaw("SELECT * FROM sanpham as sp INNER JOIN maygiat as mg ON mg.id_sp = sp.id_sp WHERE sp.id_sp = '$sanPhamId'");
    if (!empty($userDetail)) {
        setFlashData('userDetail', $userDetail);
    }
} else {
    redirect(_WEB_HOST . '/maygiat/list.php');
}

$queryNSX = getRaw("SELECT * FROM nhasanxuat");
$queryTh = getRaw("SELECT * FROM thuonghieu");
$queryTthai = getRaw("SELECT * FROM trangthai WHERE id_tthai = 1 || id_tthai = 2");
$queryKm = getRaw("SELECT * FROM khuyenmai");

if (isPost()) {
    $errors = [];

    // Kiểm tra lỗi của họ và tên
    if (empty($filterAll['ten_sp'])) {
        $errors['ten_sp']['required'] = 'Tên máy giặt bắt buộc phải nhập';
    } else {
        if (strlen(trim($filterAll['ten_sp'])) < 5) {
            $errors['ten_sp']['min'] = 'Tên máy giặt ít nhất phải 5 kí tự';
        }
        if (strlen(trim($filterAll['ten_sp'])) > 100) {
            $errors['ten_sp']['max'] = 'Tên máy giặt không được quá 100 kí tự';
        }
    }

    // kiểm tra giá
    if (empty($filterAll['giagoc_sp'])) {
        $errors['giagoc_sp']['required'] = 'Giá máy giặt bắt buộc phải nhập';
    }

    // kiểm tra khối lượng
    if (empty($filterAll['khoiluong_mg'])) {
        $errors['khoiluong_mg']['required'] = 'Khối lượng máy giặt bắt buộc phải nhập';
    }

    // kiểm tra tốc độ vắt
    if (empty($filterAll['tocdoquay_mg'])) {
        $errors['tocdoquay_mg']['required'] = 'Tốc độ vắt máy giặt bắt buộc phải nhập';
    }

    // kiểm tra chất lượng lồng máy giặt
    if (empty($filterAll['chatlieulong_mg'])) {
        $errors['chatlieulong_mg']['required'] = 'Chất lượng lồng máy giặt bắt buộc phải nhập';
    } else {
        if (strlen(trim($filterAll['chatlieulong_mg'])) < 5) {
            $errors['chatlieulong_mg']['min'] = 'Chất lượng lồng máy giặt ít nhất phải 5 kí tự';
        }
    }

    // kiểm tra chất lượng vỏ máy giặt
    if (empty($filterAll['chatlieuvo_mg'])) {
        $errors['chatlieuvo_mg']['required'] = 'Chất lượng vỏ máy giặt bắt buộc phải nhập';
    } else {
        if (strlen(trim($filterAll['chatlieuvo_mg'])) < 5) {
            $errors['chatlieuvo_mg']['min'] = 'Chất lượng vỏ  máy giặt ít nhất phải 5 kí tự';
        }
    }

    // kiểm tra năm sản xuất của máy giặt
    if (empty($filterAll['nam'])) {
        $errors['nam']['required'] = 'Năm sản xuất của máy giặt bắt buộc phải nhập';
    }

    // kiểm tra bảo hành của máy giặt
    if (empty($filterAll['baohanh'])) {
        $errors['baohanh']['required'] = 'Thời gian bảo hành của động cơ máy giặt bắt buộc phải nhập';
    }

    // kiểm tra số lượng của máy giặt
    if (empty($filterAll['so_luong'])) {
        $errors['so_luong']['required'] = 'Số lượng máy giặt bắt buộc phải nhập';
    }

    // kiểm tra thương hiệu máy giặt
    if (empty($filterAll['id_th'])) {
        $errors['id_th']['required'] = 'Thương hiệu máy giặt chưa chọn';
    }

    // kiểm tra kiểu máy giặt
    if (empty($filterAll['kieu_mg'])) {
        $errors['kieu_mg']['required'] = 'Loại máy giặt chưa chọn';
    }

    // kiểm tra lồng máy giặt
    if (empty($filterAll['long_mg'])) {
        $errors['long_mg']['required'] = 'Lồng máy giặt chưa chọn';
    }

    // kiểm tra nhà sản xuất máy giặt
    if (empty($filterAll['id_nsx'])) {
        $errors['id_nsx']['required'] = 'Nhà sản xuất máy giặt chưa chọn';
    }

    //Kiểm tra ảnh
    if (isImages('hinhanh')) {
        $errors['hinhanh']['isImages'] = 'Không phải file ảnh';
    } else {
        if ($_FILES['hinhanh']['size'] > 5242880) {
            $errors['hinhanh']['max'] = 'Không vượt quá 5MB';
        }
    }


    if (isset($_FILES['hinhanh'])) {
        $upload_dir = _WEB_PATH_TEMPLATES . "/images/maygiat/";
        if (!$_FILES['hinhanh']['error'] > 0) {
            $anhDaiDien = $_FILES['hinhanh']['name'];
            $tentaptin_anh = date('YdmHis') . '_' . $anhDaiDien;
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], $upload_dir . $tentaptin_anh);
        } else {
            $tentaptin_anh = "default-account.jpg";
        }
    }

    if (empty($errors)) {
        $ten_sp =  $filterAll['ten_sp'];
        $datetime = date('Y-m-d H:i:s');


        $dataInsertSP = [
            'ten_sp' =>  $ten_sp,
            'id_lsp' => 1,
            'hinhanh' => $tentaptin_anh,
            'id_th' => $filterAll['id_th'],
            'so_luong' => $filterAll['so_luong'],
            'create_at' => $datetime,
        ];
        if (!empty($filterAll['giagoc_sp'])) {
            $dataInsertSP['giahientai_sp'] = $filterAll['giagoc_sp'];
        }

        if (!empty($filterAll['giahientai_sp'])) {
            $dataInsertSP['giahientai_sp'] = $filterAll['giahientai_sp'];
            $dataInsertSP['giagoc_sp'] = $filterAll['giagoc_sp'];
        }

        if (!empty($filterAll['id_tthai'])) {
            $dataInsertSP['id_tthai'] = $filterAll['id_tthai'];
        }

        if (!empty($filterAll['id_km'])) {
            $dataInsertSP['id_km'] = $filterAll['id_km'];
        }

        $inserStatusSP = insert('sanpham', $dataInsertSP);
        if ($inserStatusSP) {
            $querySP = oneRaw("SELECT * FROM sanpham WHERE ten_sp = '$ten_sp' AND create_at='$datetime'");
            $id_sp = $querySP['id_sp'];
            if (!empty($filterAll['kieu_mg'] == 2)) {
                $filterAll['kieu_mg'] = 'Cửa trước';
            } else {
                $filterAll['kieu_mg'] = 'Cửa đứng';
            }

            if (!empty($filterAll['long_mg'] == 2)) {
                $filterAll['long_mg'] = 'Lồng đứng';
            } else {
                $filterAll['long_mg'] = 'Lồng ngang';
            }

            $dataInsertMayGiat = [
                'id_sp' => $id_sp,
                'ten_mg' => $ten_sp,
                'kieu_mg' => $filterAll['kieu_mg'],
                'long_mg' => $filterAll['long_mg'],
                'khoiluong_mg' => $filterAll['khoiluong_mg'],
                'tocdoquay_mg' => $filterAll['tocdoquay_mg'],
                'chatlieulong_mg' => $filterAll['chatlieulong_mg'],
                'chatlieuvo_mg' => $filterAll['chatlieuvo_mg'],
                'chatlieunap_mg' => $filterAll['chatlieunap_mg'],
                'id_nsx' => $filterAll['id_nsx'],
                'nam' => $filterAll['so_luong'],
                'baohanh' => $filterAll['so_luong'],
                'create_at' => date('Y-m-d H:i:s')
            ];
            $inserStatusMaygiat = insert('maygiat', $dataInsertMayGiat);
            if (!empty($inserStatusMaygiat)) {
                setFlashData('msg', 'Thêm mới máy giặt thành công!');
                setFlashData('msgType', 'success');
                redirect(_WEB_HOST . '/maygiat/list.php');
            }
        } else {
            setFlashData('msg', 'Thêm mới máy giặt không thành công!');
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
                                <label for="id_th">Thương hiệu <mn style="color:red">*</mn></label>
                                <select class="form-control" id="id_th" name="id_th">
                                    <option value="" selected>Chưa lựa chọn</option>
                                    <?php foreach ($queryTh  as $item) : ?>
                                        <option value="<?= $item['id_th'] ?>" <?php echo (old('id_th', $old) == $item['id_th']) ? ' selected' : false; ?>><?= $item['ten_th'] ?></option>
                                        <?php echo (old('id_th', $old) == $item['id_th']) ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo formError('id_th', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Loại máy giặt <mn style="color:red">*</mn></label>
                                <select class="form-select" aria-label="Default select example" name="kieu_mg">
                                    <option value="" selected>Chưa lựa chọn</option>
                                    <option value="1" <?php echo (old('kieu_mg', $old) == 1) ? ' selected' : false; ?>>
                                        Cửa đứng</option>
                                    <option value="2" <?php echo (old('kieu_mg', $old) == 2) ? ' selected' : false; ?>>Cửa trước</option>
                                </select>
                                <?php echo formError('kieu_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Lồng máy giặt <mn style="color:red">*</mn></label>
                                <select class="form-select" aria-label="Default select example" name="long_mg">
                                    <option value="" selected>Chưa lựa chọn</option>
                                    <option value="1" <?php echo (old('long_mg', $old) == 1) ? ' selected' : false; ?>>
                                        Lồng đứng</option>
                                    <option value="2" <?php echo (old('long_mg', $old) == 2) ? ' selected' : false; ?>>Lồng ngang</option>
                                </select>
                                <?php echo formError('long_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label id="currencyInput" for="">Giá gốc <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="giagoc_sp" placeholder="Nhập số tiền giá gốc" value="<?php echo old('giagoc_sp', $old); ?>">
                                <?php echo formError('giagoc_sp', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Giá sau giảm</label>
                                <input type="number" class="mg-form form-control" name="giahientai_sp" placeholder="Nhập số tiền giá  sau khi giảm" value="<?php echo old('giahientai_sp', $old); ?>">
                                <?php echo formError('giahientai_sp', ' <span class="error">', '</span>', $errors) ?>
                            </div>


                            <div class="form-group">
                                <label for="">Khối lượng giặt (Kg) <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="khoiluong_mg" placeholder="Khối lượng giặt (kg)" value="<?php echo old('khoiluong_mg', $old); ?>">
                                <?php echo formError('khoiluong_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tốc độ quay vắt tốc đa (vòng/phút) <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="tocdoquay_mg" placeholder="Tốc độ quay vắt tốc đa (vòng/phút)" value="<?php echo old('tocdoquay_mg', $old); ?>">
                                <?php echo formError('tocdoquay_mg', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Chất lượng lồng giặt <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="chatlieulong_mg" placeholder="Chất liệu lồng giặt" value="<?php echo old('chatlieulong_mg', $old); ?>">
                                <?php echo formError('chatlieulong_mg', ' <span class="error">', '</span>', $errors) ?>
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
                                    <option value="" selected>Chưa lựa chọn</option>
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

                            <div class="form-group">
                                <label for="">Số lượng máy giặt <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="so_luong" placeholder="Số lượng máy giặt" value="<?php echo old('so_luong', $old); ?>">
                                <?php echo formError('so_luong', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="id_km">Khuyến mãi</mn></label>
                                <select class="form-control" id="id_km" name="id_km">
                                    <option value="" selected>Chưa lựa chọn</option>
                                    <?php foreach ($queryKm as $item) : ?>
                                        <option value="<?= $item['id_km'] ?>" <?php echo (old('id_km', $old) == $item['id_km']) ? ' selected' : false; ?>><?= $item['ten_km'] ?></option>
                                        <?php echo (old('id_km', $old) == $item['id_km']) ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo formError('id_km', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="id_tthai">Trạng thái</label>
                                <select class="form-control" id="id_th" name="id_tthai">
                                    <option value="" selected>Chưa lựa chọn</option>
                                    <?php foreach ($queryTthai  as $item) : ?>
                                        <option value="<?= $item['id_tthai'] ?>" <?php echo (old('id_tthai', $old) == $item['id_tthai']) ? ' selected' : false; ?>><?= $item['ten_tthai'] ?></option>
                                        <?php echo (old('id_tthai', $old) == $item['ten_tthai']) ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo formError('id_tthai', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $userId; ?>">
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