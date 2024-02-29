
<div class="">
    <div class="header fixed-top">
        <nav class="">
            <!-- Navigation Menu -->
            <ul class="menu_nav">
                <?php include_once "./Controller/MenuController.php"; echo $menuHTML; ?>
                <?php
                     if (!isset($_SESSION['idUser']) && !isset($_SESSION['username'])) {
                        # code...
                       echo ' <li><a class="nav-link"  href="index.php?action=dangnhap" ><img src="./Content/images/user.svg"></a></li>';
                    }
                ?>
                
                <li>
                    <a class="nav-link" href="./index.php?action=giohang">
                        <img src="./Content/images/cart.svg">
                        <?php
                            $j = 0;
                            $lastIndex = null;

                            // Kiểm tra $_SESSION['cart'] is set and is an array
                            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $item) {
                                    $j++;
                                    $lastIndex = $key; // Lưu lại chỉ mục cuối cùng
                                }
                            }
                            ?>
                            <span class="badge bg-dark text-white ms-1 rounded-pill" id="cartItemCount"><?php echo $j ?></span>
                    </a>
                </li>
            </ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                
            </ul>

            <!-- Search Bar -->
            <!-- Hiển thị số lượng sản phẩm trong giỏ hàng -->
             
        </nav>
    </div>
              

   