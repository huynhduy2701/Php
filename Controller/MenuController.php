<?php

include_once "./Model/menuModel.php";

class MenuController
{
    public function getCartItemCount()
    {
        // Kiểm tra nếu giỏ hàng đã được lưu trong session
        $cart = $_SESSION['cart'] ?? [];

        $cartItemCount = count($cart);

        // Trả về số lượng sản phẩm trong giỏ hàng
        // json-encode dùng để chuyển mảng thành chuổi json
        echo json_encode(['itemCount' => $cartItemCount]);
    }
}

$menuModel = new MenuModel();
$menuData = $menuModel->getMenu();
$menuHTML = $menuModel->generateMenuHTML($menuData);
?>