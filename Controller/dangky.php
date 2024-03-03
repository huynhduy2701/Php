<?php
      $act = isset($_GET['act']) ? $_GET['act'] : 'dangky';

    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangky':
            # code...
            include_once "./View/registration.php";
            break;
        case 'dangky_action':
             //ghi dữ liệu thông tin đăng kí người dùng vừa nhập qua dangki_action
             //nhận
            
                # code...
                $hokh="";
                $tenkh="";
                $tenUser="";
                $email="";
                $diachi="";
                $sodt="";
                $pass="";
                $cfpass="";
                if (isset($_POST['submit'])) {
                    # code...
                    $hokh=$_POST['hokh'];
                    $tenkh=$_POST['tenkh'];
                    $tenUser=$_POST['txtuser'];
                    $email=$_POST['txtemail'];
                    $diachi=$_POST['diachi'];
                    $sodt=$_POST['sodienthoai'];
                    $pass=$_POST['password'];
                    $cfpass=$_POST['cfpassword'];
                    $saltF="G45a#?";
                    $saltL="Td23$%";
                    $passnew=md5($saltF.$pass.$saltL); //được mã hóa
                    //controller yêu cầu phair đem thông tin này insert vào database?Model
                    //trước khi insert cần kiểm tra xem user và email đã tồn tại chưa ?
                    $kh= new user();
                    $check=$kh->checkUser($tenUser,$email)->rowCount();
                    if ($check>=1) {
                        # code...
                        echo '<script>
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: "username hoặc email đã tồn tại",
                            showConfirmButton: false,
                            timer: 3000 
                        });
                        setTimeout(function() {
                            window.location.href = "./index.php?action=dangky";
                        }, 1000); // Chuyển hướng sau 10 giây
                    </script>';
                        // echo '<script>alert("username hoặc email đã tồn tại")</script>';
                        // include_once "./View/registration.php";
                        // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky" />';

                    }else{
                        //insert vào database
                        $inserkh=$kh->insertUser($hokh,$tenkh,$email,$diachi,$sodt,$tenUser,$passnew);
                        if ($inserkh!==false&&$pass== $cfpass) {
                            # code...
                            echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "success",
                                title: "Đăng kí thành công",
                                showConfirmButton: false,
                                timer: 1000 
                            });
                            setTimeout(function() {
                                window.location.href = "./index.php";
                            }, 1000); // Chuyển hướng sau 10 giây
                        </script>';
                            // echo '<script>alert("Đăng kí thành công")</script>';
                            // include_once "./View/home.php";
                            // echo '<meta http-equiv="refresh" content="0;url=./index.php" />';

                        }else{
                            echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "Đăng kí không thành công",
                                showConfirmButton: false,
                                timer: 1000 
                            });
                            setTimeout(function() {
                                window.location.href = "./index.php?action=dangki";
                            }, 1000); // Chuyển hướng sau 10 giây
                        </script>';
                            // echo '<script>alert("Đăng kí khong thành công")</script>';
                            // include_once "./View/registration.php";
                        // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangki" />';

                        }
                    }
                }

             
        default:
            # code...
            break;
    }
?>