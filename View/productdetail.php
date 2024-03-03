

<form action="./index.php?action=giohang&act=giohang_action" class="mt-5" method="post">
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <?php
                    include_once 'Model/sanpham.php';
                    $sp = new sanpham();
                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                    $result = $sp->producttail($id);
                    $productData = $result->fetch(); // Lấy dữ liệu một lần và lưu trữ trong $productData
                    ?>
                    <input type="hidden" name="mahh" value="<?php echo $id ?>">
                    <input type="hidden" name="tensize" id="tensizeInput">

                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" >
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="Content/img/<?php echo $productData['hinh'] ?>" />
                        </a>
                    </div>
                </aside>

                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            <?php echo $productData['tensp'] ?>
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">4.5</span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 đơn hàng</span>
                            <span class="text-success ms-2">Còn hàng</span>
                        </div>

                        <div class="mb-3">
                            <span class="h5"><?php echo $productData['dongia'] ?></span>
                            <span class="text-muted">VND</span>
                        </div>

                        <p>
                            <?php echo $productData['mota'] ?>
                        </p>

                        <hr />

                        <div class="col-md-4 col-6 mb-3">
                            <label class="mb-2">Kích cỡ</label>
                            <select class="form-select border border-secondary" name="mysize" id="mysize" style="height: 35px;">
                                <?php
                                // Fetch all available sizes from the model
                                $sizes = $sp->getSizes();
                                while ($size = $sizes->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='{$size['idsize']}'>{$size['tensize']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4 col-6 mb-3">
                            <label class="mb-2 d-block">Số Lượng</label>
                            <div class="input-group mb-3" style="width: 200px;">
                                <button class="btn btn-danger" type="button" id="decreaseButton">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" class="form-control text-center border border-secondary" min="1" name="soluong" id="quantityInput" value="1" aria-label="Số Lượng" aria-describedby="decreaseButton" />
                                <button type="button" class="btn btn-primary" id="increaseButton">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- <a href="./index.php?action=buy&act=buynow&id=<?= $productData['masp']; ?>" class="btn btn-warning shadow-0"> Mua ngay </a> -->
                    <button type="button" class="btn btn-primary shadow-0" id="addToCartBtn">
                        <i class="me-1 fa fa-shopping-basket"></i> Thêm vào giỏ hàng
                    </button>
      
                    <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Lưu </a>
                </main>
            </div>
        </div>
    </section>
    
</form>
<section>
  <!-- Phần bình luận -->

  <div class="row">
    <div class="col-md-4 col-6 mb-3">
       <hr>
    <?php
   
    if (isset($_SESSION['idUser']) && isset($_SESSION['username']) && isset($_SESSION['idUser']) > 0):
        var_dump($_SESSION['idUser']);
?>

<form action="index.php?action=binhluan" method="post">
    <input type="text" name="name" value="<?php echo $_SESSION["username"] ?>">
    <input type="hidden" name="idsp" value="<?php echo $productData['masp']; ?>">
    <textarea name="noidung" cols="30" rows="10"></textarea>
    <input type="submit" name="submit_binhluan" value="Gửi bình luận">
</form>
<?php
    else:
        echo "<a href='index.php?action=dangnhap'>Bạn Vui Long đăng nhập để bình luận</a>";
    endif;
?>
    <hr>
    <?php
       include_once "./Model/binhluan.php";
       $db=new binhluan();
    //    echo $id;
       $masp=$id;
       $showbl=$db->showbl($id);
     
       while($set=$showbl->fetch()):
        // var_dump($set);
    ?>
    <p>name : <?php echo $set['username_b']?></p>
    <p>nội dung : <?php echo $set['noidung_a']?></p>
    <?php
        endwhile;
    ?>


    </div>
</div>
</section>
<!-- content -->

<!-- Footer -->

<!-- Footer -->
<script>
document.getElementById('addToCartBtn').addEventListener('click', function () {
    console.log('Add to Cart button clicked');
    document.querySelector('form').submit();
});

document.getElementById('mysize').addEventListener('change', function () {
    var selectedSize = this.options[this.selectedIndex].text;
    document.getElementById('tensizeInput').value = selectedSize;
});

document.getElementById('decreaseButton').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantityInput');
    var currentValue = parseInt(quantityInput.value, 10);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

document.getElementById('increaseButton').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantityInput');
    var currentValue = parseInt(quantityInput.value, 10);
    quantityInput.value = currentValue + 1;
});
</script>
