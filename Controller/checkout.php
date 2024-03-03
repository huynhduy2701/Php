<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_checkout'])) {
    if (isset($_GET['action']) && $_GET['action'] == 'checkout') {
        // var_dump($_SESSION['cart']);
        // echo "aaaaaaaaaa";
        // var_dump($_SESSION['idUser']);

        $ck = new checkout();

        // Kiểm tra xem $_SESSION['idUser'] có được set và không rỗng
        if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
            // Gán giá trị trực tiếp cho $idUser
            $idUser = $_SESSION['idUser'];

            // Lặp qua giỏ hàng
            foreach ($_SESSION['cart'] as $key => $item2) {
                $masp = $item2['mahh'];
                $idsize = $item2['idsize'];
                $soluong = $item2['soluong'];
                $dongia = $item2['dongia'];
                $thanhtien = $item2['thanhtien'];

                // Kiểm tra xem 'thanhtoan' có được đặt trong $_POST trước khi truy cập
                $idthanhtoan = isset($_POST['thanhtoan']) ? $_POST['thanhtoan'] : null;

                $ck->getHoadon( $idUser, $masp, $idsize, $soluong, $dongia, $thanhtien, $idthanhtoan);
                unset($_SESSION['cart']);
              
            }
            echo '<script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Đặt Hàng Thành Công",
                showConfirmButton: false,
                timer: 500000
              })
              setTimeout(function() {
                window.location.href = "./index.php";
            }, 1000); // Chuyển hướng sau 10 giây;;
            </script>';
            // echo '<meta http-equiv="refresh" content="0;url=./index.php" />';
        }
    }
}
?>