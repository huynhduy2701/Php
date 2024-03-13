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
            include_once './View/TKBanNhieuNhat.php';
            break;
        
        default:
            # code...
            break;
    }
?>