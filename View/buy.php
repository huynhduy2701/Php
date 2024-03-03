<?php

        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
            # code...

        
    ?>
    <?php
// if (isset($_GET['act']) && $_GET['act'] == 'buynow' && isset($_GET['id'])) {
//     // If 'buynow' action is present and product ID is provided
//     $productId = $_GET['id'];

//     // Retrieve product details based on the product ID and display it
//     include_once 'Model/sanpham.php';
//     $sp = new sanpham();
//     $result = $sp->producttail($productId);
//     $product = $result->fetch();

//     // Display the product details in the buy view
//     ?>
<!-- //     <div class="mb-3">
//         <label for="input2" class="form-label">Tên Sản Phẩm</label>
//         <input type="text" class="form-control" value="<?php echo $product['tensp']; ?>" readonly>
//     </div> -->
   <!-- Add other fields as needed -->

    <?php
// } else {
//     // Display the cart contents as before
//     if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
//         // ... (your existing code)
//     } else {
//         echo '<script> alert("Bạn chưa có giỏ hàng")</script>';
//         echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home" />';
//     }
// }
?>
<form action="index.php?action=checkout" method="post" enctype="multipart/form-data">
<table
    class="table table-bordered "
>
    <thead>
        <tr>
            <th>STT</th>
            <th scope="col">Hình Sản Phẩm</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">size</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Đơn gía</th>
            <th >Thành Tiền</th>
            <th >Ghi Chú</th>

        </tr>
    </thead>
    <tbody>
        <?php
            $j=0;
            foreach($_SESSION['cart'] as $key=>$item):
                $j++;
        ?>
        <tr class="">
            <td scope="row"><?php echo $j?></td>
            <td>
                <img src="Content/img/<?php echo $item['hinh']?>" alt="" width="50px" height="50px" >
            </td>
            <td><?php echo $item['tenhh']?></td>
            <td><?php echo $item['tensize']?></td>
            <td style="width: 90px;">
               <input type="number" class='form-control'  disabled  value="<?php echo $item['soluong']?>">

            </td>
            <td><?php echo number_format($item['dongia']) ?></td>
            <td ><?php echo number_format($item['thanhtien']) ?></td>
            <td ><?php echo($item['note']) ?></td>

        </tr>
        <?php
            endforeach
        ?>
        <tr>
        <?php
        $j = 0;
        $totalAmount = 0; 
        foreach ($_SESSION['cart'] as $key => $item) :
            $j++;
            $totalAmount += $item['dongia'] * $item['soluong']; // Sum up the 'thanhtien' values
           
        ?>
            <!-- (your existing code) -->
        <?php
        endforeach
        ?>
        <tr>
            <th colspan="4" class="text-center">Tổng Tiền</th>
            <th colspan="4" class="text-center"><?php echo number_format($totalAmount) ?></th>
            
        </tr>
          
       
        
    </tbody>
</table>
<h1 class="text-center">Điền Thông Tin Mua Hàng</h1>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="input1" class="form-label">Họ</label>
            <input type="text" name="field1" id="input1" value="<?php echo isset($_SESSION['hokh'])? $_SESSION['hokh'] :'' ;?>"class="form-control" placeholder="Nhập Họ" aria-describedby="helpId1" />
            <!-- <small id="helpId1" class="text-muted">Help text for Field 1</small> -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="input2" class="form-label">Tên</label>
            <input type="text" name="field2" value="<?php echo isset($_SESSION['tenkh'])? $_SESSION['tenkh'] :'' ;?>" id="input2" class="form-control" placeholder="Nhập Tên" aria-describedby="helpId2" />
            <!-- <small id="helpId2" class="text-muted">Help text for Field 2</small> -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="input1" class="form-label">Số Điện Thoại</label>
            <input type="number" name="field1" value="<?php echo isset($_SESSION['sodt'])? $_SESSION['sodt'] :'' ;?>" id="input1" class="form-control" placeholder="Nhập Số Điện Thoại" aria-describedby="helpId1" />
            <!-- <small id="helpId1" class="text-muted">Help text for Field 1</small> -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="input2" class="form-label">Email</label>
            <input type="email" name="field2" value="<?php echo isset($_SESSION['email'])? $_SESSION['email'] :'' ;?>" id="input2" class="form-control" placeholder="Nhập Email" aria-describedby="helpId2" />
            <!-- <small id="helpId2" class="text-muted">Help text for Field 2</small> -->
        </div>
    </div>
      <div class="mb-3">
        <label for="input2" class="form-label">Địa chỉ</label>
      <textarea name="" id="" cols="30" value="" rows="10" class="form-control"><?php echo isset($_SESSION['diachi'])? $_SESSION['diachi'] :'' ;?></textarea>
        <!-- <small id="helpId2" class="text-muted">Help text for Field 2</small> -->
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Thanh Toán :</label>

      <?php
        $ptt= new checkout();
        $thanhtoan=$ptt->getPTTT();
        while ($set=$thanhtoan->fetch()):
      ?>
        <input type="radio" name="thanhtoan" value="<?php echo $set['idthanhtoan']?>" <?php echo ($set['idthanhtoan'] ? 'checked' : ''); ?>><?php echo $set['tenthanhtoan']?>
      
      <?php
        endwhile
      ?>
      <!-- <small id="helpId" class="text-muted">Help text</small> -->
    </div>
     
    <button type="submit" name="submit_checkout" class="btn btn-primary mb-3" onclick="thanhtoan()">Thanh Toán</button>




   
</div>



</form>
<script>
        function thanhtoan() {
            alert('Thanh toán thành công!');
        }
    </script>
<?php
        }
        else {
            echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "bạn chưa có giỏ hàng",
                                showConfirmButton: false,
                                timer: 1000 
                            });
                            setTimeout(function() {
                                window.location.href = "/index.php?action=home";
                            }, 1000); // Chuyển hướng sau 10 giây
                        </script>';
            // echo '<script> alert("bạn chưa có giỏ hàng")</script>';
            // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home" />';
        }
?>