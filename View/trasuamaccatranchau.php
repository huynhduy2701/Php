
<div class="row">
    <h1>Trà Sữa Mắc Ca Trân Châu</h1>
    <?php
    include_once 'Model/sanpham.php';
    $sp = new sanpham();
    $result=$sp->trasuamaccatranchau();
    while ($set = $result->fetch()) :
    ?>
        <!--Grid column-->
        <div class="col-lg-3 col-md-4 mb-3 text-left my_sp rounded-3 m-4">
            <div class="view overlay z-depth-1-half">
                <img src="Content/img/<?php echo $set['hinh'] ?>" class="img-fluid" alt="" style="width: 162px; height: 170px;">
                <div class="mask rgba-white-slight"></div>
            </div>
            <a href="./index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>" class="tensp_a text-center">
                <span><?php echo $set['tensp'] ?></span></br>
            </a>
            <h5 class="text-center font-weight-bold" style="color: #53382c;">Giá: <?php echo number_format($set['dongia']) ?>VND</br></h5>
            <!-- Uncomment the following lines if needed -->
            <!-- <button class="btn btn-danger" id="may4" value="lap 4">New</button> -->
            <!-- <p>Số lượt mua: <?php echo $set['soluotmua']; ?></p> -->
        </div>
    <?php
    endwhile;
    ?>
    <div class="alert alert-primary text-center" role="alert">
        Chưa Có Sản Phẩm !!
    </div>
</div>

