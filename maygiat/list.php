<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/session.php');
adminLogin();
$data = ['pageTitle' => 'Quản lý sản phẩm máy giặt'];
layouts('header-admin', $data);
$filterAll = filter();
$page = !empty($filterAll['page']) ? $filterAll['page'] : 1;
$itemPage = 10;
$offset = ($page - 1) * $itemPage;
$queryMatGiat = getRaw("SELECT * FROM sanpham as sp INNER JOIN thuonghieu as th ON th.id_th = sp.id_th WHERE id_lsp = 1 ORDER BY update_at DESC, create_at DESC LIMIT " . $itemPage . " OFFSET " . $offset);
$tongMayGiat = getRows("SELECT * FROM sanpham WHERE id_lsp = 1");
$tongPage = ceil($tongMayGiat / $itemPage);
$stt = $offset + 1;
$msg = getFlashData('msg');
$msgType = getFlashData('msgType');
$errors = getFlashData('errors');
?>

<body>
    <div class="container-fulid">
        <!-- menu dọc -->
        <div class="row" style="margin: 0px 0px 15px 0px">
            <?php layouts('menu-admin'); ?>

            <!-- Nội dung chính của trang -->

            <div class="col-9 content">
                <h2 class="text-center title-login">QUẢN LÝ SẢN PHẨM MÁY GIẶT</h2>
                <?php
                !empty($msg) ? getMsg($msg, $msgType) : '';
                ?>
                <button type="button" class="btn btn-primary btn-plus"><a href="add.php"><i class="fa-solid fa-plus"></i> Thêm mới</a></button>
                <table class="table table-bordered align-middle text-center table-list mt-3 border-secondary">
                    <thead class="align-middle text-center">
                        <tr>
                            <th scope="col" style="background-color: #1075e994;">STT</th>
                            <th scope="col" style="background-color: #1075e994;">Tên sản phẩm</th>
                            <th scope="col" style="background-color: #1075e994;">Giá gốc</th>
                            <th scope="col" style="background-color: #1075e994;">Giá giảm</th>
                            <th scope="col" style="background-color: #1075e994;">Thương hiệu</th>
                            <th scope="col" style="background-color: #1075e994;">Số lượng</th>
                            <th scope="col" style="background-color: #1075e994;">Ảnh sản phẩm</th>
                            <th scope="col" style="background-color: #1075e994;">Sửa</th>
                            <th scope="col" style="background-color: #1075e994;">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($queryMatGiat as $item) : ?>
                            <tr>
                                <th scope="row"><?php echo $stt++; ?></th>
                                <td title="<?php echo $item['ten_sp'] ?>"><?php echo limitString($item['ten_sp']); ?></td>
                                <td style="padding-top:25px"><?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : showCurrency($item['giahientai_sp']) ?></td>
                                <td style="padding-top:25px"><?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giahientai_sp']) . '</p>' : null ?></td>
                                <td><?php echo $item['ten_th']; ?></td>
                                <td><?php echo remainingQuantity($item['so_luong']) ?></td>
                                <td><img src="<?php echo _WEB_HOST_TEMPLATES ?>/images/maygiat/<?php echo $item['hinhanh'] ?>" id="anhDemo" name="anhDemo" width="150px" height="150px" class="rounded mx-auto d-block"></td>
                                <td><button type="button" class="btn btn-warning"><a href="edit.php?id=<?php echo $item['id_sp'] ?>"><i class="fa-regular fa-pen-to-square" style="color: black;"></i></a></button></td>
                                <!-- Button trigger modal -->
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_sp']; ?>">
                                        <i class="fa-solid fa-trash-can" style="color: black;"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_<?php echo $item['id_sp']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" width="200px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Bạn có chắc xóa không?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger">
                                                <a href="delete.php?id=<?php echo $item['id_sp'] ?>" style="color:white;text-decoration: none;">Có</a></button>

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <div class="text-center">
                    <?php echo page($page, $tongPage) ?>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
layouts('footer-admin');
?>