<div class="container">
    <table class="table caption-top table-hover shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h1 class="text-center text-primary">Danh Sách Tài Khoản Thành Viên</h1>
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">HỌ</th>
      <th scope="col">TÊN</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">SỐ ĐIỆN THOẠI</th>
      <th scope="col">ĐỊA CHỈ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
        $db= new thanhvien();
        $getThanhVien= $db->getThanhvienAll();
        $i = 0;
        while($set=$getThanhVien->fetch()):
    ?>
    <tr style="cursor: pointer;">
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $set['HoKh']?></td>
      <td><?php echo $set['TenKh']?></td>
      <td><?php echo $set['username']?></td>
      <td><?php echo $set['email']?></td>
      <td><?php echo $set['sodt']?></td>
      <td><?php echo $set['diachi']?></td>
      <td>
          <a onclick="confirmDelete(<?php echo $set['idUser'] ?>)"  class="btn btn-danger btn-sm">Xóa</a>
      </td>
    </tr>
   <?php
   $i++;
   endwhile;
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
            window.location.href = "./index.php?action=thanhvien&act=xoa-binh-thanh-vien&id=" + key;
           
        }
    });
    }
</script>
