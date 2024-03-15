<?php
    $hh = new hanghoa();
    $tenhh = array();
    $soluong = array();
    if (isset($_POST['submit'])) {
        $month = $_POST['thang'];
        $year = $_POST['nam'];
        $result = $hh->getThongKeTheoNgayNam($month, $year);
        while ($set = $result->fetch()) {
            $tenhh[] = $set['tensp'];
            $soluong[] = $set['soluong'];
        }
        var_dump($_POST);
    }
?>

<div class="mt-5">
    <form action="" method="post">
        <div class="">
            <h1 class="text-center text-primary">Vui Lòng Chọn Để Xem Thống Kê</h1>
            <div class="d-flex">
                <select name="thang" id="" class="form-control">
                    <option value="" selected disabled> Tháng</option>
                    <?php
                        $n = 12;
                        for ($i = 1; $i <= $n; $i++) { 
                            if ($i<10) {
                                # code...
                                echo "<option value=\"0$i\">$i</option>";
                            }else{
                                echo "<option value=\"$i\">$i</option>";

                            }
                        }
                    ?>
                </select>
                <select name="nam" id="" class="form-control">
                    <option value="" selected disabled>Năm</option>
                    <?php
                        $n = 2020;
                        for ($i = $n + 1; $i <= 2024 ; $i++) { 
                            echo "<option value=\"$i\">$i</option>";
                        }
                    ?>
                </select>
                <input type="submit" class="btn btn-primary" name="submit" value="Tìm Kiếm">
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1.0', {'packages':['corechart']});
    google.setOnLoadCallback(drawVisualization);
    function drawVisualization() {
        var data = new google.visualization.DataTable();
        var tenhh = <?php echo json_encode($tenhh); ?>;
        var soluong = <?php echo json_encode($soluong); ?>;
        var dataten = 0;
        var slb = 0;
        var rows = new Array();

        for (var i = 0; i < tenhh.length; i++) {
            dataten = tenhh[i];
            slb = parseInt(soluong[i]);
            rows.push([dataten, slb]);
        }

        data.addColumn("string", " Tên Hàng Hóa");
        data.addColumn('number', "Số Lượng Bán");
        data.addRows(rows);

        var options = {
            title: "THỐNG KÊ SỐ LƯỢNG BÁN",
            'width': 600,
            "height": 500,
            "backgroundColor": "#fffffff",
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<div class="thongke">
    <div style="width:50%; float: left;" id="chart_div">dfsf</div>
    <div style="width:50%; float: right" id="chart_div1">dsfd</div>    
</div>
