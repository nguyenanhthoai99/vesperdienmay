<?php
session_start();
require_once('../config.php');
require_once('../includes/connect.php');
require_once('../includes/function.php');
$data = ['pageTitle' => 'Tủ lạnh'];
layouts('header', $data);
require_once('../includes/database.php');
require_once('../includes/session.php');
?>
<div class="container" style="margin-top: 100px">
    <div class="row main-lsp" style="margin:0px">
        <?php
        $queryTuLanh = getRaw("SELECT * FROM sanpham WHERE id_lsp = 6 ORDER BY update_at DESC, create_at DESC");
        if (!empty($queryTuLanh)) :
            foreach ($queryTuLanh as $item):
        ?>
                <a href="view.php?sp=<?php echo $item['ten_sp'] ?>" class="col-3 main-item card" title="<?php echo $item['ten_sp']; ?>" style = "margin-right: 10px">
                <?php echo fileImage($item['id_lsp'], _WEB_HOST_TEMPLATES, $item['hinhanh']) ?>
                    <div class="card-body">
                        <p class="card-title ten-item"><?php echo limitString($item['ten_sp']); ?></p>
                        <p class="card-text gia-item"><?php echo showCurrency($item['giahientai_sp']); ?></p>
                        <?php echo !empty($item['giagoc_sp']) ? '<p class="card-text giacu-item">' . showCurrency($item['giagoc_sp']) . '</p>' : null ?>
                        <span class="phantram-item" style="right: -85px"><?php echo !empty(percentage($item['giagoc_sp'], $item['giahientai_sp'])) ? percentage($item['giagoc_sp'], $item['giahientai_sp']) : null; ?></span>
                    </div>
                    <input type="hidden" name="id_sp" value="<?php echo $item['id_sp'] ?>">
                </a>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</div>

<?php
require_once('../templates/layouts/footer-login.php');
?>