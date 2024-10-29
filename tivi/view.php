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
$query = oneRaw("SELECT * FROM sanpham as sp INNER JOIN tivi as tv ON tv.id_sp = sp.id_sp INNER JOIN nhasanxuat as nsx ON nsx.id_nsx = tv.id_nsx WHERE sp.ten_sp = '$kq'");
$id = $query['id_sp'];
$lsp = $query['id_lsp'];
$giaNho = $query['giahientai_sp'] - 5000000;
$giaLon = $query['giahientai_sp'] + 5000000;
?>

<div class="container-fluid" style="margin-top: 100px; background: white">
    <!-- Thông tin sản phẩm -->
    <div class="row" style="padding:15px 5px">
        <div class="col-5">
            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/tivi/<?php echo $query['hinhanh']; ?>"class="card-img-top">
        </div>
        <div class="col-7">
            <table class="table table-borderless" style="margin-bottom:0px;">
                <h3 class="tieudieu-spct text-center">Thông tin chi tiết</h3>
                <tbody>
                    <div class="row">
                        <tr>
                            <div class="col-3">
                                <td>
                                Loại Tivi:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['loai_tv'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Kích cỡ màn hình:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['kichco_tv'] ?> inch</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Độ phân giải:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['dophangiai_tv'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Loại màn hình:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['loaimanhinh_tv'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Hệ điều hành:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['hedieuhanh_tv'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Chất liệu chân đế:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieuchande_tv'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Chất liệu viền tivi:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieuvien_tv'] ?></td>
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
                            <td>
                                <p class="card-text gia-item"><?php echo showCurrency($query['giahientai_sp']); ?></p>
                                <?php echo !empty($query['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($query['giagoc_sp']) . '</p>' : null ?>
                                <span class="phantram-goiy"><?php echo !empty(percentage($query['giagoc_sp'], $query['giahientai_sp'])) ? percentage($query['giagoc_sp'], $query['giahientai_sp']) : null; ?></span>
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
            <div class="row">
                <label for="soluong">Số lượng đặt mua:</label>
                <div class="col-3 main-btnaddnumber">
                    <button type="button" id="btn-Tru" name="btn-Tru" style="width:50px;" onclick="tru()">
                        <i class="fa fa-minus"></i>
                    </button>
                    <input type="number" min="1" max="9" class="form-control" id="soluongmua" name="soluongmua" style="width:100px; text-align:center;" value="1">
                    <button type="button" id="btn-Cong" name="btn-Cong" style="width:50px;" onclick="cong()">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="col-9">
                    <button type="button" style="width:100%" class="btn btn-primary btn-mua"><a href="<?php echo _WEB_HOST; ?>/cart">Mua ngay</a></button>
                </div>
            </div>
        </div>

        <!-- Sản phẩm gợi ý -->
        <div class="main-goiy" style="margin: 100px 0px;">
            <h3 class="title-goiy">Sản phẩm gợi ý cùng phân khúc</h3>
            <div class="row content-goiy">
                <?php
                $queryTivi = getRaw("SELECT * FROM sanpham WHERE id_lsp = $lsp AND giahientai_sp BETWEEN $giaNho AND $giaLon AND NOT id_sp = $id ORDER BY update_at DESC, create_at DESC  limit 10");
                if (!empty($queryTivi)) :
                    foreach ($queryTivi as $item):
                ?>
                        <a href="<?php echo _WEB_HOST; ?>/tivi/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-4 main-gioy card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                            <div class="card-body">
                                <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                <span class="phantram-goiy"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                            </div>
                        </a>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
layouts('footer-login');
?>