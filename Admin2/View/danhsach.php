<form action="" method="post">
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
                    <button type="button" class="btn btn-primary">Xóa</button>
                    <a type="button" href="index.php?action=danhsach&act=danhsach_edit" class="btn btn-danger">Sửa</a>
                </td>
            </tr>
            <?php
                endwhile
            ?>
        </tbody>
    </table>
</form>