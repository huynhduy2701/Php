<?php
    $action='ThongKe';
    $act='BanNhieuNhat';
    if (isset($_GET['action'])) {
        # code...
        if (isset($_GET['act'])) {
            # code...
            $act=$_GET['act'];
        }
    }
    switch ($act) {
        case 'BanNhieuNhat':
            # code...
            include_once './View/thongke.php';
            break;
        case 'ThongKeTheoThang';
            include_once './View/TKTHeoThang.php';
            break;
        default:
            # code...
            break;
    }
?>