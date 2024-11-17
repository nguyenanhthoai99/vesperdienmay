<?php
$month = date("m");
$year = date("Y");
$startDate = $year . '-' . $month . '-01';
$endDate = endDate($year, $month);
$query = getRaw("SELECT dh.so_luong, dh.trang_thai, dh.ngay_tt,  lsp.ten_lsp, COUNT(lsp.ten_lsp) FROM `donhang` as dh INNER JOIN loaisanpham as lsp ON lsp.id_lsp = dh.id_lsp WHERE ngay_tt BETWEEN '$startDate' AND '$endDate' AND (trang_thai = 3 || trang_thai = 5) GROUP BY dh.id_lsp;");
?>

<body>
    <div class="container-fulid">
        <!-- menu dọc -->
        <div class="row" style="margin: 0px">
            <div class="col-4 menu-column">
                <h2 class="text-center text-upcase">Danh mục</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/admin/dashboard.php"> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/users/">Quản lý tài khoản</a>
                    </li>
                    <li class="nav-item dropdown btn-group dropend">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Quản lý sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo _WEB_HOST;?>/maygiat/list.php">Máy giặt</a></li>
                            <li><a class="dropdown-item" href="<?php echo _WEB_HOST;?>/maylocnuoc/list.php">Máy lọc nước</a></li>
                            <li><a class="dropdown-item" href="<?php echo _WEB_HOST;?>/tulanh/list.php">Tủ lạnh</a></li>
                            <li><a class="dropdown-item" href="<?php echo _WEB_HOST;?>/maylanh/list.php">Máy lạnh</a></li>
                            <li><a class="dropdown-item" href="<?php echo _WEB_HOST;?>/tudong/list.php">Tủ đông</a></li>
                            <li><a class="dropdown-item" href="<?php echo _WEB_HOST;?>/maynuocnong/list.php">Máy nước nóng</a></li>
                            <li><a class="dropdown-item" href="<?php echo _WEB_HOST;?>/tivi/list.php">Tivi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/maylanh">Thống kê</a>
                    </li>
                </ul>
            </div>

            <!-- Nội dung chính của trang -->
            <div class="col-8 content">
                <div id="piechart_3d"></div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],

            <?php
            $sum = 0;
            foreach ($query as $item) {
                echo "['" . $item['ten_lsp'] . "' ," . $item['so_luong'] . "],";
            }
            ?>
        ]);

        var options = {
            title: 'Sản phẩm bán trong 1 tháng',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>