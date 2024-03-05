
<div  class="col-md-4 col-md-offset-4"><h3 ><b class="text-primary">DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12   my-3">
<div class="col-md-6">
<form class="d-flex mt-2 w-50" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>
<div class="col-md-6 d-flex justify-content-end">

  <a href="index.php?action=hanghoa&act=add_hanghoa"  class="btn btn-primary " ><h4>Thêm sản phẩm</h4></a>
</div>
</div>
<div class="row">
<table class="table table-hover">
    <thead>
      <tr class="table-primary ">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Mô tả</th>
        <th>Mã Menu</th>
        <th>Ngày Lập</th>
        <th>Hình</th>
        <th></th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody class="">
      <!-- Phần Thân gọi từ kết quả database  vào-->
      <?php
        $hh= new hanghoa();
        $ht=$hh->getHangHoa();
        while($set=$ht->fetch()):
      ?>
      <tr style="cursor: pointer;">
        <td><?php echo $set['masp']?> </td>
        <td><?php echo $set['tensp']?></td>
        <td><?php echo $set['mota']?></td>
        <td><?php echo $set['idMenu']?></td>
        <td><?php echo $set['ngaylap']?></td>
        <td><?php echo $set['hinh']?></td>
        <td></td>
        <td><a href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['masp'] ?>">Cập nhật</a></td>
        <td><a href="index.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set['masp'] ?>">Xóa</a></td>
      </tr>
          <?php
          endwhile;
          ?>
          <!--  -->
    </tbody>
  </table>
</div>