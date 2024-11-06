<?php
$month = date("m");
$year = date("Y");
$startDate = $year . '-' . $month . '-01';
$endDate = endDate($year, $month);
$query = getRaw("SELECT dh.so_luong, dh.trang_thai, dh.ngay_tt,  lsp.ten_lsp, COUNT(lsp.ten_lsp) FROM `donhang` as dh INNER JOIN loaisanpham as lsp ON lsp.id_lsp = dh.id_lsp WHERE ngay_tt BETWEEN '$startDate' AND '$endDate' AND (trang_thai = 3 || trang_thai = 5) GROUP BY dh.id_lsp;");
?>

<div class="container-fulid">
    <!-- menu dọc -->
    <div class="row" style="margin: 0px">
        <div class="col-4 menu-column">
            <h2 class="text-center text-upcase">Danh mục</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/maygiat"> Dashbroad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/maylocnuoc">Quản lý tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php _WEB_HOST; ?>/vesperdienmay/tulanh">Quản lý sản phẩm</a>
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