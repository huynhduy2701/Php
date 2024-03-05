<?php
//  <?php
$act = isset($_GET['act']) ? $_GET['act'] : 'dangnhap';
if (isset($_GET['act'])) {
    # code...
    $act=$_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
    case 'dangnhap_action':
        //gởi thông tin đăgn nhập lên
        $user = "";
        $pass = "";
        if (isset($_POST['submit'])) {
            $user = $_POST['txtuser'];
            $pass = $_POST['txtpass'];
            $saltF = "G45a#?";
            $saltL = "Td23$%";
            $passnew = md5($saltF.$pass.$saltL);
            // var_dump($passnew);
            // echo "đâsda";
            // controller yêu cầu hiển thị thông tin có hay khong?model
            $kh = new user();
            $loginResult = $kh->loginUser($user,$passnew);
            $loginRowCount = $loginResult->rowCount();
            // var_dump($loginResult)  ;
            if ($loginRowCount > 0) {
                // Fetch user data
                $userData = $loginResult->fetch(PDO::FETCH_ASSOC);

                // Set session variables
                $_SESSION['idUser'] = $userData['idUser'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['tenkh'] = $userData['TenKh'];
                $_SESSION['hokh'] = $userData['HoKh'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['sodt'] = $userData['sodt'];
                $_SESSION['diachi'] = $userData['diachi'];
                echo 'idUser: ' . $_SESSION['idUser'] . '<br>';
                echo 'username: ' . $_SESSION['username'] . '<br>';
               
                echo '<script>
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Đăng Nhập Thành Công",
                            showConfirmButton: false,
                            timer: 1000 
                        });
                        setTimeout(function() {
                            window.location.href = "./index.php";
                        }, 1000); // Chuyển hướng sau 10 giây
                    </script>';
                
            } else {
                // echo '<script>
                // Swal.fire({
                //     position: "top-end",
                //     icon: "error",
                //     title: "Đăng Nhập Thất Bại",
                //     showConfirmButton: false,
                //     timer: 1000
                //   })
                //   setTimeout(function() {
                //     window.location.href = "./index.php?action=dangnhap";
                // }, 1000); // Chuyển hướng sau 10 giây;
                // </script>';
                // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap" />';
            }
        }
        break;
        case "dangxuat":
            unset($_SESSION['idUser']);
            unset($_SESSION['username']);
            unset($_SESSION['tenkh']);
            unset($_SESSION['hokh']);
            unset($_SESSION['email']);
            unset($_SESSION['sodt']);
            unset($_SESSION['diachi']);
            unset($_SESSION['cart']);
            echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Đăng Xuất Thành Công",
                    showConfirmButton: false,
                    timer: 1000
                  })
                  setTimeout(function() {
                    window.location.href = "./index.php";
                }, 900); // Chuyển hướng sau 10 giây;;
                </script>';
            // echo '<meta http-equiv="refresh" content="0;url=./index.php" />';
            break;
    default:
   
        break;
}
?>

   