<?php
$numbersp = mysqli_num_rows($querysp);
if($numbersp!=0){
	?>
	<center>
		<h3>Các sản phẩm tìm thấy!</h3>
		<table class="table table-hover table-striped table-responsive">
			<thead>
				<tr>
					<th width="5%" style="text-align:center;">ID</th>
					<th width="10%" style="text-align:center;">Tên sản phẩm</th>
					<th width="12" style="text-align:center;">Danh mục</th>
					<th width="5%" style="text-align:center;">Giá (VNĐ)</th>
					<th width="10%" style="text-align:center;">Bảo hành</th>
					<th width="15%" style="text-align:center;">Thương hiệu</th>
					<th width="8%" style="text-align:center;">Chỉ số</th>
					<th width="5%" style="text-align:center;">Số lượng</th>
					<th width="10%" style="text-align:center;">Ảnh</th>
					<th width="15%" style="text-align:center;">Chi tiết</th>
					<th width="5%" style="text-align:center;">Sửa</th>
					<!-- <th width="5%" style="text-align:center;">Xóa</th> -->
				</tr>
			</thead>
			<tbody>
				<?php while ($rows = mysqli_fetch_array($querysp)) {
					?>
					<tr>
						<td style="text-align:center;"><?php echo $rows['id_sp']; ?></td>
						<td><?php echo $rows['ten_sp']; ?></td>
						<td style="text-align:center;">
							<?php $id_dmn=$rows['id_dmn'];?>
							<?php 
							$sql2 = "SELECT ten_dmn FROM dmn WHERE id_dmn = $id_dmn ";
							$query2 = mysqli_query($conn,$sql2);
							$rs = mysqli_fetch_assoc($query2);
							echo $rs['ten_dmn'];
							?>
						</td>
						<td style="text-align:right;"><?php echo number_format($rows['gia_sp'],0,',','.') ?></td>
						<td style="text-align:center;"><?php echo $rows['bh_sp']; ?></td>
						<td style="text-align:center;"><?php echo $rows['th_sp']; ?></td>
						<td style="text-align:center;"><?php echo $rows['cs_sp']; ?></td>
						<td style="text-align:center;"><?php echo $rows['sl_sp']; ?></td>
						<td style="text-align:center;"><img src="../image/Source/<?php echo $rows['anh_sp']; ?>" class="img"></td>
						<td style="font-size: 11px;"><?php echo $rows['chitiet_sp']; ?></td>
						<td style="text-align:center;">
							<a href="sp.php?page_layout=edit_sp&id=<?php echo $rows['id_sp']; ?>">
								<button type="button" class="btn btn-primary" >
									<span class="glyphicon glyphicon-pencil"></span>
								</button>
							</a>
						</td>
						<!-- <td style="text-align:center;">
							<a onclick="return confirm('Bạn có muốn xóa?');" href="sp.php?page_layout=xoa_sp&id=<?php echo $rows['id_sp']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
						</td> -->
					</tr>
					<?php
				}  
				?>
				
			</tbody>
		</table>
	</center>
	<?php
}else{
	echo "<hr><center>	
	<div>
		<div style=''>
			<img src='image/search_fail_final.png' height='50px'>
		</div>
		<div class='clear'></div>
		<div><h3 style=' padding-top:8px;'>Không có sản phẩm nào phù hợp!</h3></div>
		
	</div>
</center>
<div class='clear'></div>
<hr>";
}
?>