<div class="row mt-5">
    <div class="alert alert-danger my-4 text-center mt-5" role="alert">
        <h1><?php echo $pageTitle; ?></h1>
    </div>

    <div class="row d-flex justify-content-end mb-2">
        <div class="col-md-8">
            <!-- Đoạn mã tìm kiếm và lọc -->
            <input type="text" class="form-control" style="width: 200px; display: inline-block; margin-right: 10px;">
            <select name="" id="" class="form-control" style="width: 150px; display: inline-block; margin-right: 10px;">
                <option value="">từ 10->50</option>
                <option value="">từ 50->100</option>
                <option value="">từ 100->150</option>
            </select>
        </div>
        <div class="col-md-4">
            <?php
            // Kiểm tra đăng nhập
            if (isset($_SESSION['idUser']) && isset($_SESSION['username'])) :
            ?>
                <!-- Hiển thị thông tin người dùng nếu đã đăng nhập -->
                <ul style="display: inline-block; margin-left: 10px; list-style-type: none; padding: 0;">
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-info bg-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Xin Chào <a href="#"> <?php echo $_SESSION["username"]; ?></a>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?action=dangnhap&act=dangxuat">Thông Tin</a></li>
                                <li><a class="dropdown-item" href="index.php?action=dangnhap&act=dangxuat">Đăng Xuất</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php
            endif;
            ?>
        </div>
    </div>

    <?php
    if ($products->rowCount() > 0) {
        // Nếu có sản phẩm, hiển thị danh sách
        while ($set = $products->fetch()) :
            $chuoi = $set['tensp'];
            $chuoi_thuong = mb_strtolower($chuoi, 'UTF-8');
            $chuoi_thuong = str_replace(' ', '-', $chuoi_thuong);
    ?>

            <div class="card mb-5 mx-2">
                <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>">
                <img src="Content/img/<?php echo $set['hinh'] ?>" class="img-fluid align-items-center" alt="" style="width: 162px; height: 170px; margin: auto; display: flex;"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg>
                <div class="card__content">
                    <p class="card__title"><?php echo $set['tensp'] ?></p>
                    <p class="card__description"><?php echo $set['mota'] ?></p>
                </div>
                </a>
            </div>

<!-- ----------------- -->
            <!-- <div class="col-lg-3 col-md-4 mb-3 text-left my_sp rounded-3 m-4">
                <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>">
                    <div class="view overlay z-depth-1-half">
                        <img src="Content/img/<?php echo $set['hinh'] ?>" class="img-fluid align-items-center" alt="" style="width: 162px; height: 170px; margin: auto; display: flex;">
                        <div class="mask rgba-white-slight"></div>
                    </div>
                    <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>" class="tensp_a text-center">
                        <span><?php echo $set['tensp'] ?></span></br>
                    </a>
                    <h5 class="text-center font-weight-bold" style="color: #53382c;">Giá: <?php echo number_format($set['dongia']) ?>VND</br></h5>
                </a>
            </div> -->
        <?php
        endwhile;
    } else {
        // Nếu không có sản phẩm, hiển thị thông báo
        ?>
        <div class="alert alert-primary text-center my-5 " role="alert">
            Chưa Có Sản Phẩm !!
        </div>
    <?php
    }
    ?>
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