
<?php
// b1: xac dinh duoc tong so san pham tren trang can phan trang
// $hh = new sanpham();
// // $count=$hh->getCountHangHoaAll();// lay ra duoc so 14
// $count = $hh->getsanpham()->rowCount();
// //b2 : cho gioi han 1 trang bao nhieu san pham (tu cho)
// $limit = 5;
// //can tinh so trang va start
// $trang = new page();
// //b3: lay ra so trrang
// $page = $trang->findPage($count, $limit);;//2 trang
// //lay start
// $start = $trang->findStart($limit);//8
?>

<div  style="margin-top:50px">
    <?php
        // include_once "nav.php"
    ?>
</div>

<!--Section: Examples-->
<section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row">
    <div class="col-md-5">
        <div class="col-lg-8 text-center mt-5">
            <h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM BÁN CHẠY</h3>
        </div>
    </div>
    <div class="col-md-7">
        <div class="col-lg-8 mt-5 text-md-right">
            <div class="float-md-right" style="width: 600px; display: inline-block;">
                
              
            <?php
                  // <p>Xin Chào <a href="#"> '.$_SESSION["username"].'</a></p>
                if (isset($_SESSION['idUser']) && isset($_SESSION['username'])) {
                    echo '
                    
                    <ul style="display: inline-block; margin-left: 10px; list-style-type: none; padding: 0;">
                        <li>
                            
                            <div class="dropdown">
                            <button class="btn btn-info bg-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Xin Chào <a href="#"> '.$_SESSION["username"].'</a>
                            </button>
                            <ul class="dropdown-menu ">
                              <li> <a class="dropdown-item " href="index.php?action=thongtin">Thông Tin</a></li>
                              <li> <a class="dropdown-item " href="index.php?action=dangnhap&act=dangxuat">Đăng Xuất</a></li>
                              
                            </ul>
                          </div>
                        </li>
                        </ul>
                        ';
                        
                    } 
            ?>
            </div>
        </div>
    </div>
</div>

    <!-- Cart section -->
    <div class="row">
    <div class="d-flex">
        <!-- <form action="./index.php?action=search&act=search-product" method="post"> -->
        <form action="./index.php?action=search&act=search-product&search_keyword" method="post">
            <input type="text" class="form-control" name="search_keyword" style="width: 200px; display: inline-block; margin-right: 10px;">
            <!-- <select id="sortOption" class="form-control" style="width: 150px; display: inline-block; margin-right: 10px;">
                <option value="">Giá Từ Thấp Đến Cao</option>
                <option value="">Giá Từ Cao Đến Thấp</option>
            </select>  -->
            <input type="submit" value="Tìm Kiếm" class="btn btn-primary" name="search">
        </form>
    </div>      
</div>
<?php
// Khai báo biến để lưu giá trị tìm kiếm
$searchKeyword = '';

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy giá trị của trường input "search_keyword"
    $searchKeyword = isset($_POST['search_keyword']) ? $_POST['search_keyword'] : '';
}
?>
    <!--Grid row-->
    <div class="row">
        <?php
        //tạo đối tượng  mới xài được getHangHoaNew
        include_once 'Model/sanpham.php';
        $sp = new sanpham();
        $result = $sp->getsanphambestsaler();
        while ($set = $result->fetch()) :
            # code...
        ?>
            <!--Grid column-->
            <div class="col-lg-3 col-md-4 mb-3 text-left mt-5 ">
                <?php
                $chuoi = $set['tensp'];
                $chuoi_thuong = mb_strtolower($chuoi, 'UTF-8');
                $chuoi_thuong = str_replace(' ', '-', $chuoi_thuong);
                ?>
                 <div class="card ">
                <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>">
                <img src="Content/img/<?php echo $set['hinh'] ?>" class="img-fluid align-items-center" alt="" style="width: 162px; height: 170px; margin: auto; display: flex;"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg>
                <div class="card__content">
                    <p class="card__title"><?php echo $set['tensp'] ?></p>
                    <p class="card__description"><?php echo $set['mota'] ?></p>
                </div>
                </a>
            </div>

                <!-- --------------- -->
                <!-- <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>">
                    <div class="view overlay z-depth-1-half ">
                        <img src="Content/img/<?php echo $set['hinh'] ?>" class="img-fluid" alt="" style="width: 162px;height: 170px;">
                        <div class="mask rgba-white-slight"></div>
                    </div>
                    <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>" class="tensp_a ">
                        <span><?php echo $set['tensp'] ?></span></br>
                    </a>
                    <h5 class=" font-weight-bold" style="color: #53382c;">Giá: <?php echo number_format($set['dongia']) ?>VND</br>
                    </h5>
                </a> -->
            </div>
        <?php
        endwhile;
        ?>
    </div>

    <!--Grid row-->

    <!-- end sản phẩm mới nhất -->
    <!-- sản phẩm khuyến mãi -->

    <!-- Heading -->
    <div class="row">
        <div class="col-lg-8 text-right mt-5">
            <h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM KHUYẾN MÃI</h3>
        </div>
        <!-- <div class="col-lg-4 text-right mt-4">
            <a href="">
                <span style="color: gray;">Xem chi tiết</span></div>
        </a>
    </div> -->
    </div>
    <!--Grid row-->
    <div class="row">
        <?php
        //    $kq=$sp->getSanPhamNewPage();
        //    while($set=$kq->fetch()):
        ?>
        <div class="alert alert-primary" role="alert">
            Đang Cập Nhật Sản Phẩm Khuyến Mãi
        </div>
        <!--Grid column-->
        <!-- <div class="col-lg-3 col-md-4 mb-3 text-left my_sp rounded-3 m-4"> -->

        <!-- <div class="view overlay z-depth-1-half ">
            <img src="Content/img/<?php echo $set['hinh'] ?>" class="img-fluid" alt="" style="width: 162px;height: 170px;">
            <div class="mask rgba-white-slight"></div>
        </div> -->
        <!-- <a href="" class="tensp_a text-center  ">
            <span><?php echo $set['tensp'] ?></span></br>
        </a> -->
        <!-- <h5 class=" font-weight-bold text-center">
            <font color="red"><?php echo number_format($set['giamgia']) ?><sup><u>đ</u></sup></font>
            <strike><?php echo  number_format($set['dongia']) ?></strike><sup><u>đ</u></sup>
        </h5> -->

        <!-- <a href="">
            <span></span></br></a> -->
        <!-- <button class="btn btn-danger" id="may4" value="lap 4">New</button> -->
        <!-- <p class="text-center">Số lượt mua : <?php echo $set['soluotmua']; ?></p> -->
    </div>

    <?php
    // endwhile;
    ?>

    </div>

    <!--Grid row-->

</section>
<!-- end sản phẩm khuyến mãi -->

<div class="col-md-6 div col-md-offset-3">
    <ul class="pagination">
        <?php
        // Lay duoc trang hien tai
        // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // // Nut PREV
        // if ($current_page > 1 && $page > 1) {
        //      echo '<li><a href="index.php?action=sanpham&page=' . ($current_page - 1) . '">PREV</a></li>';
        // }

        // // Hien thi cac trang
        // for ($i = 1; $i <= $page; $i++) {
        //      echo '<li><a href="index.php?action=sanpham&page=' . $i . '">' . $i . '</a></li>';
        // }

        // // Nut NEXT
        // if ($current_page < $page && $page > 1) {
        //     echo '<li><a href="index.php?action=sanpham&page=' . ($current_page + 1) . '">NEXT</a></li>';
        // }
        ?>
    </ul>
</div>
<style>
    .card {
  position: relative;
  width: 300px;
  height: 200px;
  background-color: #f2f2f2;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  perspective: 1000px;
  box-shadow: 0 0 0 5px #ffffff80;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card svg {
  width: 48px;
  fill: #333;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}

.card__content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f2f2f2;
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover .card__content {
  transform: rotateX(0deg);
}

.card__title {
  margin: 0;
  font-size: 24px;
  color: #333;
  font-weight: 700;
}

.card:hover svg {
  scale: 0;
}

.card__description {
  margin: 10px 0 0;
  font-size: 14px;
  color: #777;
  line-height: 1.4;
}

 </style>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });

        // Bật tính năng loại bỏ cửa sổ bật lên ở tiêu điểm
        var popoverDismissList = [].slice.call(document.querySelectorAll('.popover-dismiss'));
        var popoverDismiss = popoverDismissList.map(function (popoverDismissEl) {
            return new bootstrap.Popover(popoverDismissEl, {
                trigger: 'focus'
            });
        });
    });
</script>