<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/function-admin.php');
require_once(_WEB_PATH . '/includes/connect.php');
require_once(_WEB_PATH . '/includes/session.php');
adminLogin();
$data = ['pageTitle' => 'Quản lý thông tin tài khoản khách hàng'];
layouts('header-admin', $data);
$filterAll = filter();
$page = !empty($filterAll['page']) ? $filterAll['page'] : 1;
$itemPage = 10;
$offset = ($page - 1) * $itemPage;
$queryUsers = getRaw("SELECT * FROM users WHERE NOT id_user = 1 ORDER BY update_at DESC, create_at DESC LIMIT " . $itemPage . " OFFSET " . $offset);
$tongUsers = getRows("SELECT * FROM users WHERE NOT id_user = 1");
$tongPage = ceil($tongUsers / $itemPage);
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
                <h2 class="text-center title-login">QUẢN LÝ TÀI KHOẢN KHÁCH HÀNG</h2>
                <?php
                !empty($msg) ? getMsg($msg, $msgType) : '';
                ?>
                <button type="button" class="btn btn-primary btn-plus"><a href="add.php"><i class="fa-solid fa-plus"></i> Thêm mới</a></button>
                <table class="table table-bordered align-middle text-center table-list mt-3 border-secondary">
                    <thead class="align-middle text-center">
                        <tr>
                            <th scope="col" style="background-color: #1075e994;">STT</th>
                            <th scope="col" style="background-color: #1075e994;">Họ và tên</th>
                            <th scope="col" style="background-color: #1075e994;">Email</th>
                            <th scope="col" style="background-color: #1075e994;">Số điện thoại</th>
                            <th scope="col" style="background-color: #1075e994;">Địa chỉ</th>
                            <th scope="col" style="background-color: #1075e994;">Ảnh đại diện</th>
                            <th scope="col" style="background-color: #1075e994;">Sửa</th>
                            <th scope="col" style="background-color: #1075e994;">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($queryUsers as $item) : ?>
                            <tr>
                                <th scope="row"><?php echo $stt++; ?></th>
                                <td><?php echo $item['hoten_user'] ?></td>
                                <td title="<?php echo $item['email'] ?>"><?php echo limitString($item['email']); ?></td>
                                <td><?php echo $item['sdt'] ?></td>
                                <td title="<?php echo $item['dia_chi'] ?>"><?php echo limitString($item['dia_chi']); ?></td>
                                <td><img src="<?php echo _WEB_HOST_TEMPLATES ?>/images/users/<?php echo $item['hinhanh_user'] ?>" id="anhDemo" name="anhDemo" width="50px" height="50px" class="rounded mx-auto d-block"></td>
                                <td><button type="button" class="btn btn-warning"><a href="edit.php?id=<?php echo $item['id_user'] ?>"><i class="fa-regular fa-pen-to-square" style="color: black;"></i></a></button></td>
                                <!-- Button trigger modal -->
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-trash-can" style="color: black;"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" width="200px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Bạn có chắc xóa không?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger">
                                        <a href="delete.php?id=<?php echo $item['id_user'] ?>" style="color:white;text-decoration: none;">Có</a></button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                                </div>
                            </div>
                        </div>
                    </div>
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