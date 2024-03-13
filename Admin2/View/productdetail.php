<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // var_dump($id);
    $db= new chitiet();
    $kq=$db->getChitietId($id);
    $idsp=$kq['idsp'];
    $size=$kq['idsize'];
    $dongia=$kq['dongia'];
    $giamgia=$kq['giamgia'];
}
?>
<?php
    $act=1;
    if (isset($_GET['action'])) {
        # code...
        if (isset($_GET['act'])&& ($_GET['act']=='add_chitiet')) {
            $act=1;
           
        }else{
            $act=2;
        
        }
    }
?>
<div class="card mt-5">
    <div class="card-header info">
       <?php
        if ($act==1) {
            # code...
            
            echo '<h1 class="text-center text-primary">Thêm Chi Tiết Sản Phẩm </h1>';
        }else{

           
            echo '<h1 class="text-center text-primary">Sửa Tiết Sản Phẩm</h1>';
        }
       ?>
    </div>
    <div class="card-body">
        <?php
            if ($act=1) {
                # code...
                echo '<form action="index.php?action=chitiet&act=insert_chitiet" method="post">';
            }else{
                echo '<form action="index.php?action=chitiet&act=update_action" method="post">';
            }
        ?>
        
            <input type="hidden" name="id" value="">

            <div class="form-group">
                <label for="">Mã Sản Phẩm-Tên Sản Phẩm</label>
                <div>
                    <?php
                         if ($act=1) {

                            echo ' <select name="idsp"  class="form-control">';
                         }else{
                            echo ' <select name="idsp" disabled  class="form-control">';
                         }
                    ?>
                        <?php
                        $select=-1;
                        if (isset($idsp)&&$idsp!=-1) {
                            # code...
                            $select=$idsp;
                        }
                        $db = new chitiet();
                        $GetId = $db->getIdSanpham();
                        while ($set = $GetId->fetch()):
                        ?>
                            <option  value="<?php echo $set['masp'] ?>" <?php if($select===$set['masp']) echo 'selected' ?>><?php echo $set['masp'] ?>-- <?php echo $set['tensp'] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" >Size</label>
                <div class="row">
                    <div class="col-md-6">

                        <select name="size" class="form-control">
                        <?php
                         $select2=-1;
                         if (isset($size)&&$size!=-1) {
                             # code...
                             $select=$size;
                         }
                        $sizes = $db->getSizes();
                        while ($size = $sizes->fetch()):
                        ?>
                            <option value="<?php echo $size['idsize'] ?><?php if($select2== $size['idsize']) echo 'selected'?>"><?php echo $size['tensize'] ?></option>
                        <?php endwhile ?>
                        </select>
                    </div>
                   
                </div>
            </div>

            <div class="form-group">
                <label for=""> Đơn Giá</label>
                <input type="text"  name="don_gia" value="<?php if(isset($dongia)) echo $dongia ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for=""> Giảm Giá</label>
                <input type="text" name="giam_gia" value="<?php if(isset($giamgia)) echo $giamgia ?>" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>
