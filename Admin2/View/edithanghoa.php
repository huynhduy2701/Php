<?php
if (isset($_GET['id'])) {
  # code...

  $masp=$_GET['id'];
  //lấy thông tin masp
  $hh = new hanghoa();
  $kq= $hh->getHangHoaId($masp);
  $tensp=$kq['tensp'];
  $mota=$kq['mota'];
  $hinh=$kq['hinh'];
  $loai=$kq['idMenu'];
  $ngaylap=$kq['ngaylap'];
}

?>
<?php
$act=1;
  if (isset($_GET['action'])) {
    # code...
    if (isset($_GET['act'])&& ($_GET['act']=='add_hanghoa')) {
      # code...
      $act=1;
    }
    else{
      $act=2;
    }
  }
?>
 <!-- Hiiern thị tiêu đề -->


<div class="row col-md-4 col-md-offset-4 mt-5 m-auto " >
  <?php
    if ($act==1) {
      # code...
     
      echo  '<form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data">';
  }else{
    echo  '<form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data">';

  }
  ?>
<table class="table border shadow-lg p-3 mb-5 bg-body-tertiary rounded " style="border: 0px;">
<?php
      if ($act==1) {
        # code...
        echo "<h1 class='text-primary my-4  mt-5 mb-0'>Thêm Sản Phẩm</h1>";
      }else{
        echo "<h1 class='text-primary mt-5 mb-0'>Sửa Sản Phẩm</h1>";
      }
?>
      <tr >
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="masp" value="<?php if(isset($masp)) echo $masp?>"  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tensp"  value="<?php if(isset($tensp)) echo $tensp?>"  maxlength="100px"></td>
      </tr>

      <tr>
      <tr>
        <td>Hình</td>
        <td>
         
            <label>
              <img width="50px" height="50px" src="">
            </label>
            Chọn file để upload:
            <!-- <input type="file" name="hinh" id="fileupload" value="<?php if(isset($hinh)) echo $hinh?>" > -->
            <input type="text" name="hinh" id="fileupload" value="<?php if(isset($hinh)) echo $hinh?>" >

         
        </td>
      </tr>
        <td>Mã loại</td>
        <td>
          <select name="idMenu" class="form-control" style="width:150px;">
            <?php
            $select=-1;
            if (isset($loai)&&$loai!=-1 ) {
              # code...
              $select=$loai;
            }
              $loai=new loai();
              $kql=$loai->getLoai();
              while($set=$kql->fetch()):
            ?>
            <!-- hiển thị cái được chọn chính là select -->
            <option value="<?php echo $set['id']?>" <?php if($select===$set['id']) echo 'selected'  ?>><?php echo $set['menu_name'];?></option>
            <?php
              endwhile
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Ngày lập</td>
        <td><input type="text" class="form-control" name="ngaylap" value="<?php if(isset($ngaylap)) echo $ngaylap?>">
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control" name="mota" value="<?php if(isset($mota)) echo $mota?>">
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <div class="d-flex justify-content-center">
          <input type="submit" value="submit" class="btn btn-primary">
          </div>
          

        </td>
      </tr>

    </table>
  </form>
</div>