<?php
if ($page > 3) {
    $first_page = 1;
?>
    <a href="?page=<?= $first_page ?>" class="pageChuyen">
        <i class="fa-solid fa-angles-left"></i>
    </a>
<?php
}
if ($page > 1) {
    $prePage = $page - 1;
?>
    <a href="?page=<?= $prePage ?>" class="pageChuyen">
        <i class="fa-solid fa-chevron-left"></i>
    </a>
<?php } ?>
<?php for ($num = 1; $num <= $tongPage; $num++) {
    if ($num != $page) { ?>
        <?php if ($num > $page - 3 && $num < $page + 3) { ?>
            <button class="btn-itemPage"><a href="?page=<?php echo $num ?>" class="itemPage"><?php echo $num ?></a></button>
        <?php } ?>
    <?php } else { ?>
        <button class="itemPage-disabled"><a class="pageDisabled" style="cursor: not-allowed;"><?php echo $num ?></a></button>
    <?php } ?>
<?php } ?>

<?php
if ($page < $tongPage - 1) {
    $nextPage = $page + 1; ?>
    <a href="?page=<?= $nextPage ?>" class="pageChuyen">
        <i class="fa-solid fa-chevron-right"></i>
    </a>
<?php
}
if ($page < $tongPage - 3) {
    $endPage = $tongPage;
?>
    <a href="?page=<?= $endPage ?>" class="pageChuyen"><i class="fa-solid fa-angles-right" ></i></a>
<?php
}
?>