<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_checkout'])) {
    if (isset($_GET['action']) && $_GET['action'] == 'checkout') {
        // var_dump($_SESSION['cart']);
        // echo "aaaaaaaaaa";
        // var_dump($_SESSION['idUser']);

        $ck = new checkout();
        $ho=$_POST['field1'];
        $ten=$_POST['field2'];
        $sdt=$_POST['field3'];
        $email=$_POST['field4'];
        $diachi = $_POST['field5']; // Sử dụng tên chính xác của trường textarea trong form
        $thanhtoan=$_POST['thanhtoan'];

        // Kiểm tra xem $_SESSION['idUser'] có được set và không rỗng
        if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
            // Gán giá trị trực tiếp cho $idUser
            $idUser = $_SESSION['idUser'];
            if ($ho!=null &&$ten!=null &&$sdt!=null &&$email!=null &&$diachi!=null &&$thanhtoan!=null) {
                # code...
                foreach ($_SESSION['cart'] as $key => $item2) {
                    $masp = $item2['mahh'];
                    $idsize = $item2['idsize'];
                    $soluong = $item2['soluong'];
                    $dongia = $item2['dongia'];
                    $thanhtien = $item2['thanhtien'];
                 
    
                    // Kiểm tra xem 'thanhtoan' có được đặt trong $_POST trước khi truy cập
                    $idthanhtoan = isset($_POST['thanhtoan']) ? $_POST['thanhtoan'] : null;
                    $insert= $ck->getHoadon( $idUser,$masp, $idsize,$soluong, $dongia, $thanhtien, $idthanhtoan);
                   
                    
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
            }else{
                echo '<script>
                Swal.fire({
                    position: "top-center",
                    icon: "error",
                    title: "Vui Lòng điền đủ thông tin",
                    showConfirmButton: false,
                    timer: 500000
                  })
                  setTimeout(function() {
                    window.location.href = "./index.php?action=buy";
                }, 1000); // Chuyển hướng sau 10 giây;;
                </script>';
            }
            // Lặp qua giỏ hàng
            // echo '<meta http-equiv="refresh" content="0;url=./index.php" />';
        }
    }
}
?>