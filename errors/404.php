<?php
session_start();
require_once('../config.php');
require_once(_WEB_PATH . '/includes/function.php');
require_once(_WEB_PATH . '/includes/connect.php');
layouts('header');

require_once(_WEB_PATH . '/includes/database.php');
require_once(_WEB_PATH . '/includes/session.php');

?>
<div class="container">
    <div class="container-fulid">
        <!-- menu dọc -->
        <div class="row" style="margin: 0px">
            <div class="col-4 menu-column fixed-top">
                <h2 class="text-center text-upcase">Danh mục</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/maygiat"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/maygiat.jpg" class="icon-column"> Máy giặt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/maylocnuoc"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/maylocnuoc.jpg" class="icon-column"> Máy lọc nước</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/tulanh"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/tulanh.jpg" class="icon-column"> Tủ lạnh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/maylanh"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/maylanh.jpg" class="icon-column"> Máy lạnh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/tudong"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/tudong.jpg" class="icon-column"> Tủ đông</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/maynuocnong"> <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/maynuocnong.jpg" class="icon-column"> Máy nước nóng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/tivi"> <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/tivi.jpg" class="icon-column"> Ti vi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/loa"> <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/icon/loa.jpg" class="icon-column"> Loa</a>
                    </li>
                </ul>
            </div>
            <div class="col-2"></div>
            <div class="col-8 main-error">
                <h3>Trang không tồi tại hoặc bạn không có quyền truy cập trang này</h3>
            </div>
        </div>
    </div>

</div>

<?php
layouts('footer');
?>