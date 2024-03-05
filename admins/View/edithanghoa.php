<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Forms</h3>
							</div>
							<div class="module-body">

									<div class="alert">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Warning!</strong> Something fishy here!
									</div>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Oh snap!</strong> Whats wrong with you? 
									</div>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Well done!</strong> Now you are listening me :) 
									</div>

									<br />

									<form class="form-horizontal row-fluid">
									<table class="table" style="border: 0px;">

<tr>
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
	<input type="submit" value="submit">
	

  </td>
</tr>

</table>
									</form>
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
    <!-- Initialize the editor. -->
    <script> 
    	$(function() { $('textarea').froalaEditor() }); 
	</script>
