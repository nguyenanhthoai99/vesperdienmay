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
$query = oneRaw("SELECT * FROM sanpham as sp INNER JOIN tulanh as tl ON tl.id_sp = sp.id_sp INNER JOIN nhasanxuat as nsx ON nsx.id_nsx = tl.id_nsx WHERE sp.ten_sp = '$kq'");
$id = $query['id_sp'];
$lsp = $query['id_lsp'];
$giaNho = $query['giahientai_sp'] - 5000000;
$giaLon = $query['giahientai_sp'] + 5000000;
?>

<div class="container-fluid" style="margin-top: 100px; background: white">
    <div class="row" style="padding:15px 5px">
        <div class="col-5">
            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/tulanh/<?php echo $query['hinhanh']; ?>" class="img-sanphamchitiet">
        </div>
        <div class="col-7">
            <form action="<?php _WEB_HOST; ?>/vesperdienmay/cart/dathang.php" method="post">
                <table class="table table-borderless">
                    <h3 class="tieudieu-spct text-center">Thông tin chi tiết</h3>
                    <tbody>
                        <div class="row">
                            <tr>
                                <div class="col-3">
                                    <td>
                                        Kiểu tủ:
                                    </td>
                                </div>
                                <div class="col-9">
                                    <td><?php echo $query['kieu_tl'] ?></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="col-3">
                                    <td>
                                        Dung tích tổng:
                                    </td>
                                </div>
                                <div class="col-9">
                                    <td><?php echo $query['dungtich_tl'] ?> Lít</td>
                                </div>
                            </tr>
                            <tr>
                                <div class="col-3">
                                    <td>
                                        Dung tích ngăn đá:
                                    </td>
                                </div>
                                <div class="col-9">
                                    <td><?php echo $query['dungtichnganda_tl'] ?> Lít</td>
                                </div>
                            </tr>
                            <tr>
                                <div class="col-3">
                                    <td>
                                        Dung tích ngăn lạnh:
                                    </td>
                                </div>
                                <div class="col-9">
                                    <td><?php echo $query['dungtichnganlanh_tl'] ?> Lít</td>
                                </div>
                            </tr>
                            <tr>
                                <div class="col-3">
                                    <td>
                                        Chất lượng cửa tủ lạnh:
                                    </td>
                                </div>
                                <div class="col-9">
                                    <td><?php echo $query['chatlieucua_tl'] ?></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="col-3">
                                    <td>
                                        Chất liệu ống dẫn gas, dàn lạnh:
                                    </td>
                                </div>
                                <div class="col-9">
                                    <td><?php echo $query['chatlieuonggas_tl'] ?></td>
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
                    <input type="hidden" name="id_sp" value="<?php echo $id; ?>" />
                    <div class="col-9">
                        <button type="submit" style="width:100%" class="btn btn-primary btn-mua">Mua ngay</button>
                    </div>
                </div>
            </form>
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
                    <a href="<?php echo _WEB_HOST; ?>/tulanh/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-4 main-gioy card" title="<?php echo $item['ten_sp']; ?>">
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