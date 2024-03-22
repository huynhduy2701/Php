<div class="container">
<table class="table table-hover shadow-lg p-3 mb-5 bg-body-tertiary rounded">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ID User</th>
      <th scope="col">TÊN USER</th>
      <th scope="col">MÃ SẢN PHẨM</th>
      <th scope="col">NỘI DUNG BÌNH LUẬN</th>
      <th scope="col">Bài Viết</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
        $db= new binhluan();
        $getbl=$db->getBinhLuanAll();
        $i = 0; // Khởi tạo biến $i
        while($set=$getbl->fetch()):
        
    ?>
   
    <tr style="cursor: pointer;">
    <th scope="row"><?php echo $i + 1 ?></th>
      <td><?php echo $set['idUser']?></td>
      <td><?php echo $set['username']?></td>
      <td><?php echo $set['masp']?></td>
      <td><?php echo $set['noidung']?></td>
      <td><a href="../index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?> " target="../index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?>">Click Tới Bài Viết</a></td>
      <td>
        <a href="../index.php?action=sanpham&act=productdetail&id=<?= $set['masp']; ?> "  class="btn btn-primary btn-sm">Sửa</a>
          <a onclick="confirmDelete(<?php echo $set['id'] ?>)"  class="btn btn-danger btn-sm">Xóa</a>
      </td>
    </tr>
   <?php
     $i++; // Tăng biến $i sau mỗi lần lặp
    endwhile
   ?>
  </tbody>
</table>
</div>

<script>
   function confirmDelete(key) {
    Swal.fire({
        title: "Bạn Có Muốn Xóa?",
        text: "Khi Xóa Bạn Không Thể Khôi Phục Nó",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có"
    }).then((result) => {
        if (result.isConfirmed) {
            // If the user clicks "Yes, delete it!", redirect to the delete action
            window.location.href = "./index.php?action=binhluan&act=xoa-binh-luan&id=" + key;
           
        }
    });
    }
</script>
