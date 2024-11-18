<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/session.php');
adminLogin();
$data = ['pageTitle' => 'Sửa thông tin máy lọc nước'];
layouts('header-admin', $data);
$filterAll = filter();

//Kiểm tra id có tồn tại không
if (!empty($filterAll['id'])) {
    // truy vấn đến cơ sở dữ liệu
    $sanPhamId = $filterAll['id'];
    $userDetail = oneRaw("SELECT * FROM sanpham as sp INNER JOIN maylocnuoc as mln ON mln.id_sp = sp.id_sp WHERE sp.id_sp = '$sanPhamId'");
    if (!empty($userDetail)) {
        if (!empty($userDetail['kieu_mln']) == 'Tủ đứng') {
            $userDetail['kieu_mln'] = 1;
        } else {
            $userDetail['kieu_mln'] = 2;
        }
        if (!empty($userDetail['khangkhuan_mln']) == 'Nano Silver') {
            $userDetail['khangkhuan_mln'] = 1;
        } else {
            $userDetail['khangkhuan_mln'] = 2;
        }
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
    $filterAll = filter();
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
    if (empty($filterAll['giahientai_sp'])) {
        $errors['giahientai_sp']['required'] = 'Giá máy giặt bắt buộc phải nhập';
    }

    // kiểm Dung tích bình chứa
    if (empty($filterAll['dungtich_mln'])) {
        $errors['dungtich_mln']['required'] = 'Dung tích bình chứa máy lọc nước bắt buộc phải nhập';
    }

    // kiểm tra công suất lọc
    if (empty($filterAll['congsuatloc_mln'])) {
        $errors['congsuatloc_mln']['required'] = 'công suất lọc máy lọc nước bắt buộc phải nhập';
    }

    // kiểm tra Công suất điện tiêu thụ trung bình khoảng 
    if (empty($filterAll['congsuatdien_mln'])) {
        $errors['congsuatdien_mln']['required'] = 'Công suất điện tiêu thụ trung bình của máy lọc nước bắt buộc phải nhập';
    }

    // kiểm tra máy lực nước yêu cầu
    if (empty($filterAll['aplucnuoc_mln'])) {
        $errors['aplucnuoc_mln']['required'] = 'Áp lực nước bắt buộc phải nhập';
    }

    // kiểm tra năm sản xuất của máy giặt
    if (empty($filterAll['nam'])) {
        $errors['nam']['required'] = 'Năm sản xuất của máy giặt bắt buộc phải nhập';
    }

    // kiểm tra số lượng
    if (empty($filterAll['so_luong'])) {
        $errors['so_luong']['required'] = 'Số lượng máy lọc nước bắt buộc phải nhập';
    }

    // kiểm tra thương hiệu
    if (empty($filterAll['id_th'])) {
        $errors['id_th']['required'] = 'Thương hiệu chưa chọn';
    }

    // kiểm tra kiểu máy lọc nước
    if (empty($filterAll['kieu_mln'])) {
        $errors['kieu_mln']['required'] = 'Kiểu máy lọc nước chưa chọn';
    }

    // kiểm tra kháng khuẩn
    if (empty($filterAll['khangkhuan_mln'])) {
        $errors['khangkhuan_mln']['required'] = 'Kháng khuẩn chưa chọn';
    }

    // kiểm tra nhà sản xuất
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
        $upload_dir = _WEB_PATH_TEMPLATES . "/images/maylocnuoc/";
        if (!$_FILES['hinhanh']['error'] > 0 && empty($errors)) {
            $anhDaiDien = $_FILES['hinhanh']['name'];
            $tentaptin_anh = date('YdmHis') . '_' . $anhDaiDien;
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], $upload_dir . $tentaptin_anh);
            $old_file_sp_hinh =  $upload_dir . $userDetail['hinhanh'];
            if (file_exists($old_file_sp_hinh)) {
                unlink($old_file_sp_hinh);
            }
        } else {
            $tentaptin_anh =  $userDetail['hinhanh'];
        }
    }

    if (empty($errors)) {
        $ten_sp =  $filterAll['ten_sp'];
        $datetime = date('Y-m-d H:i:s');
        $dataUpdateSP = [
            'ten_sp' =>  $ten_sp,
            'id_lsp' => 2,
            'hinhanh' => $tentaptin_anh,
            'id_th' => $filterAll['id_th'],
            'so_luong' => $filterAll['so_luong'],
            'create_at' => $datetime,
        ];

        if (!empty($filterAll['giagoc_sp'])) {
            $dataUpdateSP['giagoc_sp'] = $filterAll['giagoc_sp'];
        } else {
            $dataUpdateSP['giagoc_sp'] = $filterAll['giagoc_sp'];
        }

        if (!empty($filterAll['id_tthai'])) {
            $dataUpdateSP['id_tthai'] = $filterAll['id_tthai'];
        } else {
            $dataUpdateSP['id_tthai'] = null;
        }

        if (!empty($filterAll['id_km'])) {
            $dataUpdateSP['id_km'] = $filterAll['id_km'];
        } else {
            $dataUpdateSP['id_km'] = null;
        }
        $condition = "id_sp = $sanPhamId";

        $inserStatusSP = update('sanpham', $dataUpdateSP, $condition);
        if ($inserStatusSP) {
            $querySP = oneRaw("SELECT * FROM sanpham WHERE ten_sp = '$ten_sp' AND create_at='$datetime'");
            $id_sp = $querySP['id_sp'];
            if (!empty($filterAll['kieu_mln'] == 1)) {
                $filterAll['kieu_mln'] = 'Tủ đứng';
            } else {
                $filterAll['kieu_mln'] = 'Tủ lắp âm';
            }

            if (!empty($filterAll['khangkhuan_mln'] == 1)) {
                $filterAll['khangkhuan_mln'] = 'Nano Silver';
            } else {
                $filterAll['khangkhuan_mln'] = 'Nano Silver Plus';
            }

            $dataUpdateMayLocNuoc = [
                'id_sp' => $id_sp,
                'ten_mln' => $ten_sp,
                'kieu_mln' => $filterAll['kieu_mln'],
                'khangkhuan_mln' => $filterAll['khangkhuan_mln'],
                'dungtich_mln' => $filterAll['dungtich_mln'],
                'congsuatloc_mln' => $filterAll['congsuatloc_mln'],
                'congsuatdien_mln' => $filterAll['congsuatdien_mln'],
                'aplucnuoc_mln' => $filterAll['aplucnuoc_mln'],
                'id_nsx' => $filterAll['id_nsx'],
                'nam' => $filterAll['so_luong'],
                'create_at' => date('Y-m-d H:i:s')
            ];
            $updateStatusMayLocNuoc = update('maylocnuoc', $dataUpdateMayLocNuoc, $condition);
            if (!empty($updateStatusMayLocNuoc)) {
                setFlashData('msg', 'Sửa máy lọc nước thành công!');
                setFlashData('msgType', 'success');
                redirect(_WEB_HOST . '/maylocnuoc/list.php');
            }
        } else {
            setFlashData('msg', 'Sửa máy lọc nước không thành công!');
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
                <h2 class="text-center title-login">SỬA SẢN PHẨM MỚI MÁY LỌC NƯỚC</h2>
                <?php
                !empty($msg) ? getMsg($msg, $msgType) : '';
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tên sản phẩm <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="ten_sp" placeholder="Tên sản phẩm" value="<?php echo old('ten_sp', $old); ?>">
                                <?php echo formError('ten_sp', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="anhDaiDien">Ảnh sản phẩm</label><br />
                                <img src="<?php echo _WEB_HOST_TEMPLATES ?>/images/maylocnuoc/<?php echo $userDetail['hinhanh'] ?>" id="anhDemo" name="anhDemo" width="200px" height="200px">
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
                                <label for="">Kiểu lắp tủ <mn style="color:red">*</mn></label>
                                <select class="form-select" aria-label="Default select example" name="kieu_mln">
                                    <option value="" selected>Chưa lựa chọn</option>
                                    <option value="1" <?php echo (old('kieu_mln', $old) == 1) ? ' selected' : false; ?>>
                                        Tủ đứng</option>
                                    <option value="2" <?php echo (old('kieu_mln', $old) == 2) ? ' selected' : false; ?>>Tủ lắp âm</option>
                                </select>
                                <?php echo formError('kieu_mln', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Kháng khuẩn <mn style="color:red">*</mn></label>
                                <select class="form-select" aria-label="Default select example" name="khangkhuan_mln">
                                    <option value="" selected>Chưa lựa chọn</option>
                                    <option value="1" <?php echo (old('khangkhuan_mln', $old) == 1) ? ' selected' : false; ?>>
                                        Nano Silver</option>
                                    <option value="2" <?php echo (old('khangkhuan_mln', $old) == 2) ? ' selected' : false; ?>>Nano Silver Plus</option>
                                </select>
                                <?php echo formError('khangkhuan_mln', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Giá gốc <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="giahientai_sp" placeholder="Nhập số tiền giá gốc" value="<?php echo old('giahientai_sp', $old); ?>">
                                <?php echo formError('giahientai_sp', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label id="currencyInput" for="">Giá sau giảm</label>
                                <input type="number" class="mg-form form-control" name="giagoc_sp" placeholder="Nhập số tiền giá sau giảm" value="<?php echo old('giagoc_sp', $old); ?>">
                                <?php echo formError('giagoc_sp', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Dung tích chứa (Lít) <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="dungtich_mln" placeholder="Dung tích chứa (Lít)" value="<?php echo old('dungtich_mln', $old); ?>">
                                <?php echo formError('dungtich_mln', ' <span class="error">', '</span>', $errors) ?>
                            </div>
                            <div class="form-group">
                                <label for="">Công suất lọc (lít/giờ) <mn style="color:red">*</mn></label>
                                <input type="number" class="mg-form form-control" name="congsuatloc_mln" placeholder="Công suất lọc (lít/giờ)" value="<?php echo old('congsuatloc_mln', $old); ?>">
                                <?php echo formError('congsuatloc_mln', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Công suất điện tiêu thụ trung bình khoảng (kW/h)<mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="congsuatdien_mln" placeholder="Công suất điện tiêu thụ trung bình khoảng (kW/h)" value="<?php echo old('congsuatdien_mln', $old); ?>">
                                <?php echo formError('congsuatdien_mln', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="">Máy lực nước yêu cầu (MPa) <mn style="color:red">*</mn></label>
                                <input type="text" class="mg-form form-control" name="aplucnuoc_mln" placeholder="Máy lực nước yêu cầu (MPa)" value="<?php echo old('aplucnuoc_mln', $old); ?>">
                                <?php echo formError('aplucnuoc_mln', ' <span class="error">', '</span>', $errors) ?>
                            </div>

                            <div class="form-group">
                                <label for="id_nsx">Nhà sản xuất <mn style="color:red">*</mn></label>
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
                                <label for="">Số lượng <mn style="color:red">*</mn></label>
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
                            <input type="hidden" name="id" value="<?php echo $sanPhamId; ?>">
                        </div>
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <button type="submit" class="btn-login btn btn-primary btn-block" style="width:30%;">Sửa thông tin</button>
                        <a href="<?php echo _WEB_HOST . '/maylocnuoc/list.php' ?>" class="btn btn-success btn-block" style="width:30%;">Quay lại</a>
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