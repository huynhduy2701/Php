<?php
    $act='danhsach';
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'danhsach':
            # code...
        include_once "./View/danhsach.php";
        
            break;
        case 'danhsach_edit':
            # code...
           

            include_once "./View/addloaisanpham.php";
        
            break;
        default:
            # code...
            break;
    }
?>