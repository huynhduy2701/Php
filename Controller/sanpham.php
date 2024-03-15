<?php

// Include necessary files and initialize objects
// $action = isset($_GET['action']) ? $_GET['action'] : '';
// $act = isset($_GET['act']) ? $_GET['act'] : '';

// switch ($act) {
//     case 'phindikemsua':
//     case 'bacxiuda':
//     case 'traquamonganhdao':
//     case 'traxanhdaudo':
//     case 'trathachvai':
//     case 'freezetraxanh':
//     case 'cookiescream':
//     case 'freezequamonganhdao':
//     case 'banhphomaitraxanh':
//     case 'banhphomaichanhday':
//     case 'banhmoussedao':
//     case 'trasuamaccatranchau':
//     case 'trasuaolongnuong':
//     case 'hongtrasuanong':
//         include_once "View/{$act}.php";
//         break;
//     case 'productdetail':
//         // Get and sanitize the product ID from the URL
//         // $productId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//             include_once 'View/productdetail.php';

//         break;
//     default:
//         include_once 'View/home.php';
// }


// Controller/sanpham.php

$action = isset($_GET['act']) ? $_GET['act'] : '';
$act = "home";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

include_once 'Model/sanpham.php';
$db = new sanpham();

switch ($action) {
    case 'productdetail':
        // Lấy và hiển thị chi tiết sản phẩm
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $productData = $db->producttail($id)->fetch();
        include_once 'View/productdetail.php';
        break;
    case 'home':
        // Hiển thị trang chủ
        include_once 'View/home.php';
        break;
    
    default:
        // Lấy và hiển thị danh sách sản phẩm
        $products = $db->getSanPhamMenu($act);
        include_once 'View/sanpham.php';
        break;
}
// switch ($action) {
//     case 'bacxiuda':
//         $pageTitle = "Bạc Xĩu Đá";
//         $products = $sp->getSanPhamBacXiuDa();
//         include_once 'View/sanpham.php';
//         break;

//     case 'banhmoussedao':
//         $pageTitle = "BÁNH MOUSSE";
//         $products = $sp->banhmoussedao();
//         include_once 'View/sanpham.php';
//         break;
//     case 'phindikemsua':
//         $pageTitle = "PHINDI";
//         $products = $sp->getSanPhamPhinDi();
//         include_once 'View/sanpham.php';
//         break;
//     case 'traquamonganhdao':
//         $pageTitle = "TRÀ QUẢ MỌNG ANH ĐÀO";
//         $products = $sp->traquamonganhdao();
//         include_once 'View/sanpham.php';
//         break;
//     case 'traxanhdaudo':
//         $pageTitle = "TRÀ XANH ĐẬU ĐỎ";
//         $products = $sp->traxanhdaudo();
//         include_once 'View/sanpham.php';
//         break;
//     case 'trathachvai':
//         $pageTitle = "TRÀ THẠCH VẢI";
//         $products = $sp->trathachvai();
//         include_once 'View/sanpham.php';
//         break;
//     case 'freezetraxanh':
//         $pageTitle = "FREEZE TRÀ XANH";
//         $products = $sp->freezetraxanh();
//         include_once 'View/sanpham.php';
//         break;
//     case 'cookiescream':
//         $pageTitle = "FREEZE TRÀ XANH";
//         $products = $sp->cookiescream();
//         include_once 'View/sanpham.php';
//         break;
//     case 'freezequamonganhdao':
//         $pageTitle = "FREEZE QUẢ MỌNG ANH ĐÀO";
//         $products = $sp->freezequamonganhdao();
//         include_once 'View/sanpham.php';
//         break;
//     case 'banhphomaitraxanh':
//         $pageTitle = "BÁNH PHÔ MAI TRÀ XANH";
//         $products = $sp->banhphomaitraxanh();
//         include_once 'View/sanpham.php';
//         break;
//     case 'banhphomaichanhday':
//         $pageTitle = "BÁNH PHÔ MAI CHANH DÂY";
//         $products = $sp->banhphomaichanhday();
//         include_once 'View/sanpham.php';
//         break;
//     case 'trasuamaccatranchau':
//         $pageTitle = "Trà Sữa Mắc Ca Trân Châu";
//         $products = $sp->trasuamaccatranchau();
//         include_once 'View/sanpham.php';
//         break;
//     case 'trasuaolongnuong':
//         $pageTitle = "Trà sữa olong Nướng Trân Châu";
//         $products = $sp->trasuaolongnuong();
//         include_once 'View/sanpham.php';
//         break;
//     case 'hongtrasuanong':
//         $pageTitle = "Hồng Trà Sữa";
//         $products =  $sp->hongtrasuanong();
//         include_once 'View/sanpham.php';
//         break;
//     case 'productdetail':
//         // Get and sanitize the product ID from the URL
//         // $productId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//             include_once 'View/productdetail.php';
//         break;

//     default:
//         include_once 'View/home.php';
//         break;
// }
?>


