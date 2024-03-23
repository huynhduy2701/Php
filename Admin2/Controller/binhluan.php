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
  
        case 'chinh-sua-binh-luan':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $db = new binhluan();
                $binhLuan = $db->getCMT($id);
                // Kiểm tra nếu bình luận tồn tại
                if ($binhLuan) {
                    include_once './View/editbinhluan.php';
                } 
            }
            break;
        case 'cap-nhat-binh-luan';
          
                # code...
                if (isset($_POST['submit'])) {
                    $id=$_POST['id'];
                    // echo($id);
                    # code...
                    $noidung=$_POST['noidung'];
                    $db= new binhluan();
                    $UpdateCMT=$db->UpdateBinhLuan($id,$noidung);
                    // echo "<script>alert('aaa')</script>";
                    echo '<script>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Cập Nhật Bình Luận Thành Công",
                        showConfirmButton: false,
                        timer: 1000 
                    });
                    setTimeout(function() {
                        window.location.href = "./index.php?action=binhluan&act=danh-sach-binh-luan";
                    }, 1000); // Chuyển hướng sau 10 giây
                </script>';
                }
            
        break;


    default:
        // Nếu action không hợp lệ, hiển thị trang mặc định hoặc thông báo lỗi
        break;
}
?>
