<?php
session_start();
require_once('../config.php');
require_once('../includes/connect.php');
require_once('../includes/function.php');
$data = ['pageTitle' => $_GET['sp']];
layouts('header', $data);
require_once('../includes/database.php');
require_once('../includes/session.php');
$kq  = $_GET['sp'];
$query = oneRaw("SELECT * FROM maygiat as mg INNER JOIN sanpham as sp ON mg.id_mg = sp.id_sp INNER JOIN nhasanxuat as nsx ON nsx.id_nsx = mg.id_nsx WHERE ten_mg = '$kq'");
?>

<div class="container-fluid" style="margin-top: 100px; background: white">
    <div class="row" style="padding:15px 5px">
        <div class="col-6">
            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/maygiat/<?php echo $query['hinhanh']; ?>" class="img-sanphamchitiet">
        </div>
        <div class="col-6">
            <table class="table">
                <h3 class="tieudieu-spct text-center">Thông tin chi tiết</h3>
                <tbody>
                    <div class="row">
                        <tr>
                            <div class="col-3">
                                <td>
                                    Loại máy giặt:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['kieu_mg'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Lồng giặt:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['long_mg'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Khối lượng giặt
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['khoiluong_mg'] ?> Kg</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Tốc độ quay vắt tốc đa:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['tocdoquay_mg'] ?> vòng/phút</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Chất lượng lồng giặt:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieulong_mm'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Chất lượng vỏ máy:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieuvo_mg'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Chất lượng cửa máy:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieunap_mg'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Sản xuất:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['ten_nsx'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Năm:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['nam'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                    Thời gian bản hàng động cơ:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['baohanh'] ?></td>
                            </div>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
layouts('footer-login');
?>