<?php
	$numbertv = mysqli_num_rows($querytv);
	if($numbertv!=0){
	?>
	<center>
	<h3>Các thành viên tìm thấy!</h3>
	<table class="table table-hover">
			<thead>
				<tr>
					<th width="5%" style="text-align:center;">ID</th>
					<th width="15%">Tên thành viên</th>
					<th width="15%">Email</th>
					<th width="15%">Phone</th>
					<th width="15%">Address</th>
					<th width="10%">Quyền</th>
					<th width="5%" style="text-align:center;">Sửa</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($rows = mysqli_fetch_array($querytv)) {
			?>
				<tr>
					<td style="text-align:center;"><?php echo $rows['id_thanhvien']; ?></td>
					<td><?php echo $rows['ten_thanhvien']; ?></td>
					<td><?php echo $rows['email_thanhvien']; ?></td>
					<td><?php echo $rows['sdt_thanhvien']; ?></td>
					<td><?php echo $rows['dc_thanhvien']; ?></td>
					<td><?php echo $rows['quyen_thanhvien']; ?></td>
					
					<td style="text-align:center;">
						<a href="sp.php?page_layout=edit_thanhvien&id=<?php echo $rows['id_thanhvien']; ?>">
							<button type="button" class="btn btn-primary" >
								<span class="glyphicon glyphicon-pencil"></span>
							</button>
						</a>
					</td>
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
					<div><h3 style=' padding-top:8px;'>Không có thành viên nào phù hợp!</h3></div>
				
				</div>
				</center>
				<div class='clear'></div>
				<hr>";
	}
?>
		
		


