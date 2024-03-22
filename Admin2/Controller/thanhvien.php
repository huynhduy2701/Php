<?php

$action="thanh-vien";$act="danh-sach-thanh-vien";
if (isset($_GET["action"])) {
    # code...
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];
    }

}
switch ($act) {
    case 'danh-sach-thanh-vien':
        # code...
        include_once "./View/thanhvien.php";
        break;
    case 'xoa-binh-thanh-vien':
        if (isset($_GET['id'])) {
            # code...
            $itemXoa=$_GET['id'];
            $db= new thanhvien();
            $delCMT=$db->deletThanhVien($itemXoa);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=thanhvien&act=danh-sach-thanh-vien" />';
            echo " <script>
            Swal.fire({
                title: 'Xóa Thành Công!',
                text: 'Thành Viên Đã Được Bạn Xóa.',
                icon: 'success'
              });
            </script>";
        }
        break;
    default:
        # code...
        break;
}
?>