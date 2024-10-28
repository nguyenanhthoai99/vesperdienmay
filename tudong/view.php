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
$query = oneRaw("SELECT * FROM sanpham as sp INNER JOIN tudong as td ON td.id_sp = sp.id_sp INNER JOIN nhasanxuat as nsx ON nsx.id_nsx = td.id_nsx WHERE sp.ten_sp = '$kq'");
$id = $query['id_sp'];
$lsp = $query['id_lsp'];
$giaNho = $query['giahientai_sp'] - 5000000;
$giaLon = $query['giahientai_sp'] + 5000000;
?>

<div class="container-fluid" style="margin-top: 100px; background: white">
    <div class="row" style="padding:15px 5px">
        <div class="col-5">
            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/tudong/<?php echo $query['hinhanh']; ?>" class="img-sanphamchitiet">
        </div>
        <div class="col-7">
            <table class="table">
                <h3 class="tieudieu-spct text-center">Thông tin chi tiết</h3>
                <tbody>
                    <div class="row">
                        <tr>
                            <div class="col-3">
                                <td>
                                Loại tủ:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['kieu_td'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Dung tích tổng:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['dungtich_td'] ?> Lít</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Số cửa:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['socua_td'] ?> Lít</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Điện năng tiêu thụ:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['congsuat_td'] ?> Lít</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Công nghệ tích hợp:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['congnghe_td'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Chất liệu dàn lạnh:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieudanlanh_td'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Chất liệu lòng tủ:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieulongtu_td'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Chất liệu bên ngoài:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['chatlieubenngoai_td'] ?></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-3">
                                <td>
                                Độ ồn:
                                </td>
                            </div>
                            <div class="col-9">
                                <td><?php echo $query['doon_td'] ?> dB</td>
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
    </div>

    <!-- Sản phẩm gợi ý -->
    <div class="main-goiy" style="margin: 100px 0px;">
        <h3 class="title-goiy">Sản phẩm gợi ý cùng phân khúc</h3>
        <div class="row content-goiy">
            <?php
            $queryMaygiat = getRaw("SELECT * FROM sanpham WHERE id_lsp = $lsp AND giahientai_sp BETWEEN $giaNho AND $giaLon AND NOT id_sp = $id ORDER BY update_at DESC, create_at DESC  limit 10");
            if (!empty($queryMaygiat)) :
                foreach ($queryMaygiat as $item):
            ?>
                    <a href="<?php echo _WEB_HOST; ?>/tudong/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-4 main-gioy card" title="<?php echo $item['ten_sp']; ?>">
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
<?php
layouts('footer-login');
?>