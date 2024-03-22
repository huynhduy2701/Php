<form action="" method="post">
   <div class="mt-3">
        <h1 class="text-center mt-3">Danh Sách Chi Tiết Sản Phẩm</h1>
        <div class=" d-flex justify-content-end my-3">
        <a class="btn btn-primary" href="index.php?action=chitiet&act=add_chitiet">Thêm Danh Mục</a>
        </div>
   </div>
   <table class="table table-hover shadow-lg p-3 mb-5 bg-body-tertiary rounded">

        <thead>
            <th>ID</th>
            <th>TÊN SẢN PHẨM </th>
            <th>TÊN SIZE</th>
            <th>ĐƠN GIÁ</th>
            <th>GIẢM GIÁ</th>
            <th></th>
        
        </thead>
        <tbody style="cursor: pointer;">
      
            <?php
                $db= new chitiet();
                $chitiet= $db->getChiTiet();
                while($set=$chitiet->fetch()):

            ?>
            <tr>
                <td>
                    <?php echo $set['idsp']?> 
                </td>
                <td>
                    <?php echo $set['tensp']?>
                </td>
                <td>
             
                    <?php echo $set['tensize'] ?>
                </td>
                <td>
                    <?php echo $set['dongia']?>
                </td>
                <td>
                    <?php echo $set['giamgia']?>
                </td>
                <td>
                <input type="hidden" name="delete_id" value="<?php echo $set['idsp']; ?>">
                <button type="button" onclick="confirmDelete()" class="btn btn-danger">Xóa</button>

                <a href="index.php?action=chitiet&act=sua_chitiet&id=<?php echo $set['idsp'] ?>" class="btn btn-primary">Sửa</a>
                </td>
            </tr>
            <?php
                endwhile
            ?>
        </tbody>
    </table>
</form>    
<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Bạn có chắc muốn xóa?",
        text: "Hành động này sẽ không thể hoàn tác !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa"
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to the delete action with the corresponding ID
            window.location.href = "./index.php?action=danhsach&act=xoa&id=" + id;
        }
    });
}
</script>