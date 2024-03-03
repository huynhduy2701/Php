<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action=='thongtin') {
    # code...
    if ($_SESSION['idUser']) {
        # code...
        $id=$_SESSION['idUser'];
        $getInf=new thongtin();
        $getInf->getThongTin($id);
        $data = $getInf->getThongTin($id);
        include_once "./View/thongtin.php";

    }
}
?>