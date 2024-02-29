

<div class="row">
<h1>Trà sữa olong Nướng Trân Châu</h1>

<?php

        //tạo đối tượng  mới xài được getHangHoaNew
include_once 'Model/sanpham.php';
$sp= new sanpham();
$result= $sp->trasuaolongnuong();
// $result=$sp->getSanPhamNewPage($start,$limit);
while ($set=$result->fetch()) :
    # code...

?>

    <!--Grid column-->
    <div class="col-lg-3 col-md-4 mb-3 text-left my_sp rounded-3 m-4">
    <?php
$chuoi = $set['tensp'];
    // Chuyển thành chữ thường
$chuoi_thuong = mb_strtolower($chuoi, 'UTF-8');
        // thay thế
    $chuoi_thuong = str_replace(' ', '-', $chuoi_thuong);
    // Loại bỏ dấu
// $chuoi_thuong = preg_replace('/[^a-zA-Z0-9]/', '', $chuoi_thuong);
    ?>
    <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>">

        
        <div class="view overlay z-depth-1-half ">
            <img src="Content/img/<?php echo $set['hinh']?>" class="img-fluid" alt=""  style="width: 162px;height: 170px;">
            <div class="mask rgba-white-slight"></div>
        </div>
        <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>" class="tensp_a text-center">
                <span><?php echo $set['tensp'] ?></span></br>
        </a>
        <h5 class="text-center font-weight-bold" style="color: #53382c;">Giá: <?php echo number_format($set['dongia']) ?>VND</br></h5>
    </a>
        
        <!-- <button class="btn btn-danger" id="may4" value="lap 4">New</button> -->
        <!-- <p>Số lượt mua : <?php echo $set['soluotmua'];?></p> -->

    </div>
<?php
endwhile;
?>
</div>