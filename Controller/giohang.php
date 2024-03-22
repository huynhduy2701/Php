<?php
// Kiểm tra xem session đã khởi tạo chưa
if (!isset($_SESSION)) {
    session_start();
}

$act = 'giohang';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'giohang':
        include_once "./View/cart.php";
        break;
    case 'giohang_action':
        if (isset($_POST['mahh'], $_POST['mysize'], $_POST['soluong'])) {
            $id = $_POST['mahh'];
            $idSize = $_POST['mysize'];
            $idsoluong = $_POST['soluong'];
            $note = $_POST['note'];
            // Xử lý thêm sản phẩm vào giỏ hàng ở đây
            include_once "./Model/giohang.php";
            $gh = new giohang();
            $gh->addGioHang($id, $idSize, $idsoluong,$note);
            echo '<script>
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Thêm Vào Giỏ Hàng Thành Công",
                showConfirmButton: false,
                timer: 1000 
            });
            setTimeout(function() {
                window.location.href = "./index.php?action=sanpham&act=productdetail&id='.$id.'";
            }, 1000); // Chuyển hướng sau 10 giây
        </script>';
            // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang" />';
        }
        break;
        case 'update':
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateCart'])) {
                foreach ($_POST['soluong'] as $key => $quantity) {
                    $quantity = intval($quantity);
                    if ($quantity >= 0) {
                        $_SESSION['cart'][$key]['soluong'] = $quantity;
                    }
                }
                echo '<script>
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Cập Nhật Giỏ Hàng Thành Công",
                showConfirmButton: false,
                timer: 1000 
            });
            setTimeout(function() {
                window.location.href = "./index.php?action=giohang";
            }, 1000); // Chuyển hướng sau 10 giây
        </script>';
                // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang" />';

                exit();
            }
            break;
     
            case 'deleteAll':
                if (isset($_GET['act']) && $_GET['act'] == 'deleteAll') {
                    // Clear the cart by unsetting the session variable
                    unset($_SESSION['cart']);
        
                    // Redirect back to the cart page or any other desired page
                  
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang" />';
                    exit();
                }
                break;
    default:
        // Các trường hợp khác ở đây
        break;
}


// include_once "./Model/giohang.php";
// $gh = new giohang();

// // Rest of your code
// $act = 'giohang';

// if (isset($_GET['act'])) {
//     $act = $_GET['act'];
// }

// switch ($act) {
//     case 'giohang':
//         include_once "./View/cart.php";
//         break;
//     case 'giohang_action':
//         if (isset($_POST['mahh'], $_POST['mysize'], $_POST['soluong'])) {
//             $id = $_POST['mahh'];
//             $idSize = $_POST['mysize'];
//             $idsoluong = $_POST['soluong'];

//             // Xử lý thêm sản phẩm vào giỏ hàng ở đây
//             $gh->addGioHang($id, $idSize, $idsoluong);

//             echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang" />';
//         }
//         break;
//     case 'update':
//         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateCart'])) {
//             foreach ($_POST['soluong'] as $key => $quantity) {
//                 $quantity = intval($quantity);
//                 if ($quantity >= 0) {
//                     $_SESSION['cart'][$key]['soluong'] = $quantity;
//                 }
//             }
//             echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang" />';
//             exit();
//         }
//         break;
//     default:
//         // Các trường hợp khác ở đây
//         break;
// }
?>
