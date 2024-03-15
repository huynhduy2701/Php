<?php
$action = "binhluan";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'binhluan':
        include_once "./View/binhluan.php";
        break;

    case 'xoa_binhluan':
        // Kiểm tra nếu tồn tại comment_id từ form
        if(isset($_POST['comment_id'])) {
            $comment_id = $_POST['comment_id'];

            // Include file model
            include_once "./model/binhluan.php";

            // Tạo đối tượng binhluan từ model
            $binhluan = new binhluan();

            // Gọi hàm xóa bình luận từ model
            $result = $binhluan->delCMT($comment_id);

            if($result) {
                // Nếu xóa thành công, chuyển hướng về trang binhluan
                header("Location: ./index.php?action=binhluan");
                exit();
            } else {
                // Nếu xóa thất bại, hiển thị thông báo lỗi
                echo "Xóa bình luận không thành công!";
            }
        } else {
            // Nếu không có comment_id được gửi đi
            echo "Không có ID bình luận được cung cấp!";
        }
        break;

    default:
        // Nếu action không hợp lệ, hiển thị trang mặc định hoặc thông báo lỗi
        break;
}
?>
