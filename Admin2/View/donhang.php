<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">USER</th>
      <th scope="col">TÊN SẢN PHẨM</th>
      <th scope="col">SỐ LƯỢNG</th>
      <th scope="col">ĐƠN GIÁ</th>
      <th scope="col">PHƯƠNG THỨC THANH TOÁN</th>
      <th scope="col">GHI CHÚ</th>
      <th scope="col">TRẠNG THÁI</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
      $db= new donhang();
      $getDonHang= $db->getDonHangAll();
      $i=0;
      // var_dump($getDonHang);
      while($set=$getDonHang->fetch()):
    ?>
    <tr>
      <th scope="row"><?php echo $i+1?></th>
      <td><?php echo $set['user_username']  ?></td>
      <td><?php echo $set['sanpham_tensp']  ?></td>
      <td><?php echo $set['soluong']  ?></td>
      <td><?php echo $set['dongia']  ?></td>
      <td><?php echo $set['pttt_tenthanhtoan']  ?></td>
      <td><?php echo $set['ghichu']  ?></td>
      <td><?php echo $set['trangthai']  ?></td>
      
      
    </tr>
    <?php
      $i++;
      endwhile;
    ?>
  </tbody>
</table>