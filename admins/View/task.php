<div class="span9">
	<div class="content">

		<div class="module message">
			<div class="module-head ">
				<h3 class="">Sản Phẩm</h3>
			</div>
			<div class="module-option clearfix">
				<div class="pull-left">
					Filter : &nbsp;
					<div class="btn-group">
						<button class="btn">All</button>
						<button class="btn dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">All</a></li>
							<li><a href="#">In Progress</a></li>
							<li><a href="#">Done</a></li>
							<li class="divider"></li>
							<li><a href="#">New task</a></li>
							<li><a href="#">Overdue Task</a></li>
						</ul>
					</div>
				</div>
				<div class="pull-right">
					<a href="index.php?action=hanghoa&act=add_hanghoa" class="btn btn-primary">Tạo Sản Phẩm</a>
				</div>
			</div>
			<div class="module-body table">								

				<table class="table table-message">
					<thead>
					<tr class="heading">
							<td class="cell-icon">Mã Sản Phẩm</td>
							<td class="cell-title">Tên Sản Phẩm</td>
							<td class="cell-status hidden-phone hidden-tablet">	Mô tả</td>
							<td class="cell-status hidden-phone hidden-tablet">	Mã Menu</td>
							<td class="cell-status hidden-phone hidden-tablet">	Ngày Lập</td>
							<td class="cell-status hidden-phone hidden-tablet">	Hình</td>
							<td class="cell-status hidden-phone hidden-tablet"></td>
							<td class="cell-status hidden-phone hidden-tablet">Action</td>
							<td class="cell-status hidden-phone hidden-tablet">	</td>
					
						</tr>	
					</thead>
					<tbody>
					
<?php
        $hh= new hanghoa();
        $ht=$hh->getHangHoa();
        while($set=$ht->fetch()):
?>
      <tr>
        <td><?php echo $set['masp']?> </td>
        <td><?php echo $set['tensp']?></td>
        <td><?php echo $set['mota']?></td>
        <td><?php echo $set['idMenu']?></td>
        <td><?php echo $set['ngaylap']?></td>
        <td><?php echo $set['hinh']?></td>
        <td></td>
        <td><a href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['masp'] ?>">Cập nhật</a></td>
        <td><a href="index.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set['masp'] ?>">Xóa</a></td>
      </tr>
<?php
endwhile;
?>
<!--  -->
						
				</tbody>

				</table>


			</div>
			<div class="module-foot">
			<div class="pagination">
		
            </div>
			</div>
		</div>
		
	</div><!--/.content-->
</div><!--/.span9-->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.table-message tbody tr').click(
				function() 
				{
					$(this).toggleClass('resolved');
				}
			);
		} );
	</script>
