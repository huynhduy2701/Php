
      <div class="card mt-5  ">
        <div class="card-header info">
          <h1 class="text-center text-primary">Chỉnh Sủa Danh Mục </h1>
        </div>
        <div class="card-body">
          <?php
             $id = isset($_GET['id']) ? $_GET['id'] : null;
             $db= new danhsach();
             $getCate=$db->getMenuId($id);
             
            //  var_dump($getCate) ;
             while($set=$getCate->fetch()):
              $menu_name = $set['menu_name'];
              $menu_url = $set['menu_url'];
             
          
          ?>
        <!-- khi gởi file hay bất kì hình ảnh lên serve ta bắt buộc phải có enctype="multipart/form-data" nghĩa la đa dạng mọi dữ liệu như ecel php pdf -->
    <form action="index.php?action=loai&act=loai_file" method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" value="Import" name="submit_file">
    </form>
    <form action="index.php?action=danhsach&act=capnhat" method="post">
      <input type="hidden" name="id" value="<?php echo $set['id']?>">
                <div class="form-group">
                    <label for="">Mã danh mục</label>
                    <input type="text" readonly name="id"  value="<?php if(isset($id)) echo $id?>" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" name="namecatagory" value="<?php if(isset($menu_name)) echo $menu_name?>" class="form-control">

                </div>
                <div class="form-group">
                <label for="">Menu số:</label>
                <div class="row">
                        <div class="col-md-6">
                            <input type="radio" name="button1" value="1">
                            <input type="number" name="idParent" class="form-control">
                        </div>
                    <div class="col-md-6">
                        <input type="radio" name="button1" value="2">
                        <select name="idMenu" class="form-control" style="width:150px;">
                            <?php
                                $select = -1;
                                if (isset($loai) && $loai != -1) {
                                    $select = $loai;
                                }
                                $loai = new loai();
                                $kql = $loai->getLoai();
                                while ($set = $kql->fetch()):
                            ?>
                            <option value="<?php echo $set['id']?>" <?php if ($select === $set['id']) echo 'selected' ?>><?php echo $set['menu_name'];?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>
            </div>
              <div class="form-group">
                <label for="">Menu URL:</label>
                <input type="text" name="nameUrl" value="<?php if(isset($menu_url)) echo $menu_url?>"  class="form-control">

              </div>
<?php
endwhile
?>
        <div class="form-group">
            <button type="submit" name="submit_editcate" class="btn btn-primary">Cập Nhật</button>
         
            <!-- <a href="index.php?action=danhsach&act=loai" class="btn btn-danger">Danh sách</a> -->
        </div>
    </form>
  </div>
</div>

 