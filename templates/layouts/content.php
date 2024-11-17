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
        <div class="col-4"></div>

        <!-- Nội dung chính của trang -->
        <div class="col-8 content">
            <a href="panasonic.php" class="sidebar img-thumbnail"><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/images/sidebar/panasonic.jpg" alt="" class="img-sidebar"></a>
            <div class="main-content">

                <!-- Máy giặt -->
                <h2 class="tilte-content text-uppercase">Máy giặt</h2>
                <div class="row">
                    <?php
                    $queryMaygiat = getRaw("SELECT * FROM sanpham WHERE id_lsp = 1 ORDER BY update_at DESC, create_at DESC  limit 8");
                    if (!empty($queryMaygiat)) :
                        foreach ($queryMaygiat as $item):
                    ?>
                            <a href="maygiat/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                                <div class="card-body">
                                    <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                    <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                    <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                    <span class="phantram-item"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                                </div>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- Máy lọc nước -->
                <h2 class="tilte-content text-uppercase">Máy lọc nước</h2>
                <div class="row">
                    <?php
                    $queryMayLocNuoc = getRaw("SELECT * FROM sanpham WHERE id_lsp = 2 ORDER BY update_at DESC, create_at DESC  limit 8");
                    if (!empty($queryMayLocNuoc)) :
                        foreach ($queryMayLocNuoc as $item):
                    ?>
                            <a href="maylocnuoc/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                                <div class="card-body">
                                    <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                    <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                    <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                    <span class="phantram-item"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                                </div>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- Tủ lạnh -->
                <h2 class="tilte-content text-uppercase">Tủ lạnh</h2>
                <div class="row">
                    <?php
                    $queryTuLanh = getRaw("SELECT * FROM sanpham WHERE id_lsp = 6 ORDER BY update_at DESC, create_at DESC  limit 8");
                    if (!empty($queryTuLanh)) :
                        foreach ($queryTuLanh as $item):
                    ?>
                            <a href="tulanh/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                                <div class="card-body">
                                    <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                    <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                    <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                    <span class="phantram-item"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                                </div>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- máy lạnh -->
                <h2 class="tilte-content text-uppercase">Máy lạnh</h2>
                <div class="row">
                    <?php
                    $queryMayLanh = getRaw("SELECT * FROM sanpham WHERE id_lsp = 7 ORDER BY update_at DESC, create_at DESC  limit 8");
                    if (!empty($queryMayLanh)) :
                        foreach ($queryMayLanh as $item):
                    ?>
                            <a href="maylanh/view.php?sp=<?php echo $item['ten_sp'] ?>" id="main-maylanh" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                                <div class="card-body">
                                    <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                    <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                    <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                    <span class="phantram-item"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                                </div>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- Tủ đông -->
                <h2 class="tilte-content text-uppercase">Tủ đông</h2>
                <div class="row">
                    <?php
                    $queryTuDong = getRaw("SELECT * FROM sanpham WHERE id_lsp = 3 ORDER BY update_at DESC, create_at DESC  limit 8");
                    if (!empty($queryTuDong)) :
                        foreach ($queryTuDong as $item):
                    ?>
                            <a href="tudong/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                                <div class="card-body">
                                    <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                    <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                    <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                    <span class="phantram-item"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                                </div>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- Máy nước nóng -->
                <h2 class="tilte-content text-uppercase">Máy nước nóng</h2>
                <div class="row">
                    <?php
                    $queryMayNuocNong = getRaw("SELECT * FROM sanpham WHERE id_lsp = 4 ORDER BY update_at DESC, create_at DESC  limit 8");
                    if (!empty($queryMayNuocNong)) :
                        foreach ($queryMayNuocNong as $item):
                    ?>
                            <a href="maynuocnong/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                                <div class="card-body">
                                    <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                    <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                    <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                    <span class="phantram-item"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                                </div>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- Tivi -->
                <h2 class="tilte-content text-uppercase">Ti vi</h2>
                <div class="row">
                    <?php
                    $queryTivi = getRaw("SELECT * FROM sanpham WHERE id_lsp = 5 ORDER BY update_at DESC, create_at DESC  limit 8");
                    if (!empty($queryTivi)) :
                        foreach ($queryTivi as $item):
                    ?>
                            <a href="tivi/view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>">
                            <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                                <div class="card-body">
                                    <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                                    <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                                    <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                                    <span class="phantram-item"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
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
</div>