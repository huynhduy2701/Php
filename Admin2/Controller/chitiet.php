<?php
    $act='danh-sach-chi-tiet';
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];

    }
    switch ($act) {
        case 'danh-sach-chi-tiet':
            include_once "./View/viewCTSP.php";
            break;
        case 'add_chitiet';
            include_once "./View/productdetail.php";
            break;
        case 'insert_chitiet':
            if (isset($_POST['submit'])) {
                $idSp = $_POST['idsp'];
                $idSize = $_POST['size']; // Chỉnh sửa tên trường từ 'idsize' thành 'size'
                $dongia = $_POST['don_gia'];
                $giamGia = $_POST['giam_gia'];
                $db = new chitiet();
                $Insert = $db->getInsCTSP($idSp, $idSize, $dongia, $giamGia);
                if ($Insert) {
                    echo "<script>alert('Dữ liệu đã được thêm thành công.')</script>";
                } else {
                    echo "<script>alert('Đã xảy ra lỗi khi thêm dữ liệu.')</script>";
                }
            }
            break;
        case "sua_chitiet":
            include_once "./View/productdetail.php";
            break;
        case "sua_action":
            if (isset($_POST['idsp'])) {
                $idsp = $_POST['idsp'];
                $idsize = $_POST['size'];
                $dongia = $_POST['don_gia'];
                $giamgia = $_POST['giam_gia'];
                $db = new chitiet();
                // $db->updateChitiet($idsp,$idsize, $dongia, $giamgia);
                echo "<script>alert('Dữ liệu đã được cập nhật thành công.')</script>";
            }
            break;
        default:
            break;
    }
?>