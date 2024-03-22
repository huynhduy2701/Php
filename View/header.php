<div class="">
    <div class="header fixed-top">
        <nav class=" navbar-expand-lg navbar-light">
            <!-- Nút toggle cho thiết bị di động -->
            <button class="navbar-toggler  btn-close" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                
            </button>
            
            
            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse mb-0" id="navbarSupportedContent">
                <ul class="menu_nav navbar-nav me-auto">
                    
                    <?php include_once "./Controller/MenuController.php"; echo $menuHTML;  ?>
                    <?php
                         if (!isset($_SESSION['idUser']) && !isset($_SESSION['username'])) {
                            echo ' <li class="nav-item"><a class="nav-link" href="index.php?action=dangnhap"><img src="./Content/images/user.svg"></a></li>';
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=giohang" >
  
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
                            <span class="badge bg-dark text-white ms-1 rounded-pill"  id="cartItemCount"><?php echo $j ?></span>
                        </a>
                    </li>
                </ul>
                <!-- <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    Link with href
                    </a>
                </ul> -->
            </div>
        </nav>
    </div>
</div>



   <!-- <style>
    @media (max-width: 576px) {
  .menu_nav {
    flex-direction: column;
    align-items: center;
  }

  .menu_nav li {
    position: static;
    margin-bottom: 10px; /* Add spacing between menu items */
  }

  .menu_nav ul.dropdown {
    position: static;
    width: auto;
    display: none;
    background: transparent;
    padding: 0;
    margin-left: 20px; /* Adjust margin for dropdown */
  }

  .menu_nav li:hover > ul.dropdown {
    display: none;
  }

  .menu_nav li a {
    padding: 10px 20px;
  }

  .menu_nav > li > a::before {
    display: none;
  }
}
@media (max-width: 912px) {
        .menu_nav li ul.dropdown {
            display: none;
            position: static;
            width: auto;
            background: transparent;
            padding: 0;
            margin-left: 20px; /* Adjust margin for dropdown */
        }

        .menu_nav li:hover > ul.dropdown {
            display: block;
            position: static;
            width: auto;
            background: transparent;
            padding: 0;
            margin-left: 20px; /* Adjust margin for dropdown */
        }
    }
   </style> -->
   <style>
    @media (max-width: 912px) {
        .menu_nav li ul.dropdown {
            display: none;
            position: static;
            width: auto;
            background: transparent;
            padding: 0;
            margin-left: 20px; /* Adjust margin for dropdown */
        }

        .menu_nav li:hover > ul.dropdown {
            display: block;
            position: static;
            width: auto;
            background: transparent;
            padding: 0;
            margin-left: 20px; /* Adjust margin for dropdown */
        }
    }
</style>