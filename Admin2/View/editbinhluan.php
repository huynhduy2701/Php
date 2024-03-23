<form action="index.php?action=binhluan&act=cap-nhat-binh-luan" method="post">
<div class="row col-md-4 col-md-offset-4 mt-5 m-auto " >
 
 <table class="table border shadow-lg p-3 mb-5 bg-body-tertiary rounded " style="border: 0px;">
 
 <?php foreach ($binhLuan as $bl) : ?>
     <tr>
         <td>ID BÌNH LUẬN</td>
         <td><input type="text" class="form-control" name="id" value="<?php echo $bl['id']; ?>" readonly/></td>
     </tr>
     <tr>
         <td>TÊN USER</td>
         <td><input type="text" class="form-control" name="username" value="<?php echo $bl['username']; ?> " readonly/></td>
     </tr>
     <tr>
         <td>SẢN PHẨM BÌNH LUẬN</td>
         <td><input type="text" class="form-control" name="tensp" value="<?php echo $bl['tensp']; ?>" readonly/></td>
     </tr>
     <tr>
         <td>NỘI DUNG BÌNH LUẬN</td>
         <td><textarea name="noidung" class="form-control"><?php echo $bl['noidung']; ?></textarea></td>
     </tr>
 <?php endforeach; ?>
      
 
       <tr>
         <td colspan="2">
           <div class="d-flex justify-content-center">
           <input type="submit" value="Cập Nhật Bình Luận" name="submit" class="btn btn-primary">
           </div>
           
 
         </td>
       </tr>
 
     </table>
</form>