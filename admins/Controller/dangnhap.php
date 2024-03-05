<?php
    $act="dangnhap";
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            # code...
            include_once "View/dangnhap.php";
            break;
        case 'dangnhap_action':
            # code...
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                # code...
                $user=$_POST['txtusername'];
                $pass=$_POST['txtpassword'];
                //đem thông tun nhận về đưa vào câu truy vấn kiểmtra có hay không
                $nv= new nhanvien();
                $result=$nv->getAdmin($user,$pass);
                if ($result!= false) {
                    # code...
                    $_SESSION['admin']=$result[0];
                    echo "<script> alert('Đăng Nhập Thành công') </script>";
                    echo " <meta http-equiv='refresh' content='0;url=./index.php?action=hanghoa&act=hanghoa'/>";
                }

            }
            break;
        default:
            # code...
            break;
    }
?>