<?php
 $act="hanghoa";
 if (isset($_GET['act'])) {
    # code...
    $act=$_GET['act'];
 }
 switch ($act) {
    case 'hanghoa':
        # code...

        include_once "./View/hanghoa.php";
        break;
    case 'add_hanghoa';
        include_once "./View/edithanghoa.php";
        break;
    case 'insert_action';
        // nhận thông tin về là tên sp  mô tả mã loại mô
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            # code...
            $masp=$_POST['masp'];
            $ngaylap=$_POST['ngaylap'];
            $mota=$_POST['mota'];
            $tensp=$_POST['tensp'];
            $maloai=$_POST['idMenu'];
            $hinh=$_POST['hinh'];
            // $hinh = $_FILES['hinh']['name'];
            //đem thông tin này inser vào sản phẩm
            $sp = new hanghoa();
            $sp->getInsertSanPham($tensp,$maloai,$mota,$ngaylap,$hinh);
            echo '<script>alert("Thêm Sản Phẩm Thành Công")</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php"/>';
        }
        break;
        case 'update_hanghoa':
            include_once "./View/edithanghoa.php";

            break;
        case 'update_action':
            //nhận thông tin
            if (isset($_POST['masp'])) {
                # code...
                $masp=$_POST['masp'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                $tensp=$_POST['tensp'];
                $maloai=$_POST['idMenu'];
            
                $hinh=$_POST['hinh'];

                // $hinh = $_FILES['hinh']['name'];
                //tiến hành update
                $hh= new hanghoa();
                $hh->updatehangHoa($masp,$tensp,$maloai,$mota,$ngaylap,$hinh);
                echo "<script> alert('Cập Nhật Thành công') </script>";
                echo " <meta http-equiv='refresh' content='0;url=./index.php?action=hanghoa&act=hanghoa'/>";

            }
            break;
            case 'delete_hanghoa':
                if (isset($_GET['id'])) {
                    # code...
                    $masp=$_GET['id'];
                    $hh= new hanghoa();
                    $hh->getDeleteSanPham( $masp);
                    echo "<script> alert('Xóa Thành công') </script>";
                    echo " <meta http-equiv='refresh' content='0;url=./index.php?action=hanghoa&act=hanghoa'/>";
    
                }
                break;
    default:
        # code...
        break;
 }
?>