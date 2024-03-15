<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ID User</th>
      <th scope="col">TÊN USER</th>
      <th scope="col">MÃ SẢN PHẨM</th>
      <th scope="col">NỘI DUNG BÌNH LUẬN</th>
      <th scope="col">Bài Viết</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
        $db= new binhluan();
        $getbl=$db->getBinhLuanAll();
        $i = 0; // Khởi tạo biến $i
        while($set=$getbl->fetch()):
        
    ?>
   
    <tr>
    <th scope="row"><?php echo $i + 1 ?></th>
      <td><?php echo $set['idUser']?></td>
      <td><?php echo $set['username']?></td>
      <td><?php echo $set['masp']?></td>
      <td><?php echo $set['noidung']?></td>
      <td><a href="../index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>">Click Tới Bài Viết</a></td>
      <td>
      
      <form action="index.php?action=binhluan&act=xoa_binhluan" method="post">
                <input type="hidden" name="comment_id" value="<?php echo $set['id']; ?>">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

      </td>
    </tr>
   <?php
     $i++; // Tăng biến $i sau mỗi lần lặp
    endwhile
   ?>
  </tbody>
</table>
</div>
