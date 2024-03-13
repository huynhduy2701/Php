<form action="" method="post">
   <div class="mt-3">
        <h1 class="text-center mt-3">Danh Sách Danh Mục</h1>
        <div class=" d-flex justify-content-end my-3">
        <button class="btn btn-primary">Thêm Danh Mục</button>
        </div>
   </div>
   <table class="table table-hover">

        <thead>
            <th>ID</th>
            <th>TÊN MENU CHÍNH</th>
            <th>MENU PHỤ</th>
            <th>MENU URL</th>
            <th></th>
        
        </thead>
        <tbody style="cursor: pointer;">
      
            <?php
                $db= new danhsach();
                $danhsach= $db->getDanhsachDanhMuc();
                while($set=$danhsach->fetch()):

            ?>
            <tr>
                <td><?php echo $set['id']?></td>
                <td><?php echo $set['menu_name']?></td>
                <td>
                <?php
                    $db= new danhsach();
                    $id=$set['parent'];
                    $TenDanhMuc= $db->getTenDanhMuc($id);
                    while($setTen=$TenDanhMuc->fetch()):

                ?>
                    <?php echo $setTen['menu_name'] ?>
                <?php
                    endwhile
                ?>
                </td>
                <td><?php echo $set['menu_url']?></td>
                <td>
                <!-- <input type="hidden" name="delete_id" value="<?php echo $set['id']; ?>"> -->
                <button type="button" onclick="confirmDelete(<?php echo $set['id']; ?>)" class="btn btn-danger">Xóa</button>
                    <a type="button" href="index.php?action=danhsach&act=danhsach_action&id=<?php echo $set['id']; ?>" class="btn btn-primary">Sửa</a>
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