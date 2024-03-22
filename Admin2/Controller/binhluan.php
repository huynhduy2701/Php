<?php
$action = "binhluan";
$act="danh-sach-binh-luan";
if (isset($_GET['action'])) {
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];
    }
}

switch ($act) {
    case 'danh-sach-binh-luan':
        include_once "./View/binhluan.php";
        break;

    case 'xoa-binh-luan':
        if (isset($_GET['id'])) {
            # code...
            $itemXoa=$_GET['id'];
            $db= new binhluan();
            $delCMT=$db->delCMT($itemXoa);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=binhluan&act=danh-sach-binh-luan" />';
            echo " <script>
            Swal.fire({
                title: 'Xóa Thành Công!',
                text: 'Bình Luận Của Bạn Đã Được Xóa.',
                icon: 'success'
              });
            </script>";
        }
        break;
  

    default:
        // Nếu action không hợp lệ, hiển thị trang mặc định hoặc thông báo lỗi
        break;
}
?>
