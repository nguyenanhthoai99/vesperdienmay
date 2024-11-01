<?php
session_start();
require_once('../config.php');
require_once('../includes/connect.php');
require_once('../includes/function.php');
$data = ['pageTitle' => 'Giỏ hàng của bạn'];
layouts('header', $data);
require_once('../includes/database.php');
require_once('../includes/session.php');
?>
<div class="container" style="margin-top: 100px;">
    <h2 class="text-center">Giỏ Hàng</h2>
    <?php
    $cart = getSession('cart');
    $sum = 0;
    ?>
    <div class="row">
        <div class="col-md-12">
            <?php if (!empty($cart)) : ?>
                <a href="<?php echo _WEB_HOST; ?>" class="btn btn-primary mt-4 mb-3">
                    Mua Thêm
                </a>
                <form action="" method="POST">
                    <table id="tblcart" class="table table-bordered align-middle text-center">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            <?php foreach ($cart as $item) : ?>
                                <tr>
                                    <td name="stt"><?= $stt++ ?></td>
                                    <td>
                                        <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']); ?>
                                    </td>
                                    <td><?php echo $item['ten_sp'] ?></td>
                                    <td><?= $item['soluongmua'] ?></td>
                                    <td><?= number_format($item['giahientai_sp'], 0, ".", ",") . ' vnđ' ?></td>
                                    <td><?= number_format($item['tongtien'], 0, ".", ",") . ' vnđ'  ?></td>
                                    <td>
                                        <a href="xoagiohang.php?id=<?php echo $item['id_sp'] ?>" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $sum += $item['tongtien'];
                                ?>
                        </tbody>

                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4">
                            <b>Tổng cộng:</b>
                        </td>
                        <td colspan="3" style="color: red;">
                            <?= number_format($sum, 0, ".", ",") . ' vnđ'  ?>
                        </td>
                    </tr>
                    </table>
                </form>
            <?php else : ?>
                <h2>Giỏ hàng rỗng!!!</h2>
            <?php endif; ?>
            <a href="<?php echo _WEB_HOST; ?>" class="btn btn-warning btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay
                về trang chủ</a>
            <a href="<?php echo _WEB_HOST; ?>/cart/thanhtoan.php" class="btn btn-primary btn-md"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thanh toán</a>
        </div>
    </div>
</div>


<?php
layouts('footer-login');
?>