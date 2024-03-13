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
    // case 'insert_action';
    //     // nhận thông tin về là tên sp  mô tả mã loại mô
    //     if ($_SERVER['REQUEST_METHOD']=='POST') {
    //         # code...
    //         $masp=$_POST['masp'];
    //         $ngaylap=$_POST['ngaylap'];
    //         $mota=$_POST['mota'];
    //         $tensp=$_POST['tensp'];
    //         $maloai=$_POST['idMenu'];
    //         $hinh=$_POST['hinh'];
    //         // $hinh = $_FILES['hinh']['name'];
    //         //đem thông tin này inser vào sản phẩm
    //         $sp = new hanghoa();
    //         $sp->getInsertSanPham($tensp,$maloai,$mota,$ngaylap,$hinh);
    //         echo '<script>
    //         Swal.fire({
    //             position: "top-center",
    //             icon: "success",
    //             title: "Thêm Sản Phẩm thành công",
    //             showConfirmButton: false,
    //             timer: 1000
    //         });
    //         setTimeout(function() {
    //             window.location.href = "./index.php";
    //         }, 1000); // Chuyển hướng sau 1 giây
    //     </script>';
    //         // echo '<meta http-equiv=refresh content="0;url=./index.php"/>';
    //     }
    //     break;
    case 'insert_action':
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nhận thông tin sản phẩm từ form
        $masp = $_POST['masp'];
        $ngaylap = $_POST['ngaylap'];
        $mota = $_POST['mota'];
        $tensp = $_POST['tensp'];
        $maloai = $_POST['idMenu'];
        // Xử lý upload ảnh
        $targetDir = "content/"; // Thư mục chứa ảnh
        $targetFilePath = $targetDir . basename($_FILES["hinh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        // Kiểm tra xem file ảnh có hợp lệ không
        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $targetFilePath)) {
            // Insert thông tin sản phẩm vào database, với tên file ảnh là đường dẫn tương đối
            $hinh = $targetFilePath;
            $sp = new hanghoa();
            $sp->getInsertSanPham($tensp, $maloai, $mota, $ngaylap, $hinh);
            echo '<script>
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Thêm Sản Phẩm thành công",
                    showConfirmButton: false,
                    timer: 1000
                });
                setTimeout(function() {
                    window.location.href = "./index.php";
                }, 1000); // Chuyển hướng sau 1 giây
            </script>';
        } else {
            echo "Có lỗi khi upload ảnh.";
        }
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
                echo '<script>
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Cập Nhật Sản Phẩm thành công",
                    showConfirmButton: false,
                    timer: 1000
                });
                setTimeout(function() {
                    window.location.href = "./index.php?action=hanghoa&act=hanghoa";
                }, 1000); // Chuyển hướng sau 1 giây
            </script>';
                // echo " <meta http-equiv='refresh' content='0;url='/>";

            }
            break;
            case 'delete_hanghoa':
                if (isset($_GET['id'])) {
                    # code...
                    $masp=$_GET['id'];
                    $hh= new hanghoa();
                    $hh->getDeleteSanPham( $masp);
                    echo '<script>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Xóa thành công",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    setTimeout(function() {
                        window.location.href = "./index.php?action=hanghoa&act=hanghoa";
                    }, 1000); // Chuyển hướng sau 1 giây
                </script>';
                    // echo " <meta http-equiv='refresh' content='0;url=./index.php?action=hanghoa&act=hanghoa'/>";
    
                }
                break;
       
                
    default:
        # code...
        break;
 }
?>