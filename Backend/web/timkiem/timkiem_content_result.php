<?php
	$number = mysqli_num_rows($query);

	if($number!=0){
	?>
	
	<center>
	<h3>Các đơn hàng tìm thấy!</h3>
	<table class="table table-hover table-striped table-responsive">
			<thead>
				<tr>
					<th width="5%" style="text-align:center;">ID</th>
					<th width="10%" style="text-align:center;">Mã đơn hàng</th>
					<th width="15%" style="text-align:center;">Ngày đặt</th>
					<th width="15%" >Tên khách hàng</th>
					<th width="15%" style="text-align:center;">Số điện thoại</th>
					<th width="10%" style="text-align:center;">Tình trạng</th>
					<th width="10%" style="text-align:center;">Đặt cọc</th>
					<th width="10%" style="text-align:center;">Xác nhận</th>
					<th width="5%" style="text-align:center; ">Chi tiết</th>
					<!-- <th width="10%" style="text-align:center; ">Đã CK</th> -->
					<!-- <th width="5%" style="text-align:center;">Xóa</th> -->
				</tr>
			</thead>
			<tbody>
			<?php while ($rows = mysqli_fetch_array($query)) {
			?>	
				<?php
					if($rows['confirm'] == 'Awaiting confirmation'){
				?>
				<a href="#"><tr class="danger">
				<?php
				}else{
					echo '<a href="#"><tr>';
				}
				?>
					<td style="text-align:center;"><?php echo $rows['id_order']; ?></td>
					<td style="text-align:center; font-size: 11px"><?php echo $rows['code_order']; ?></td>
					<td style="text-align:center; font-size: 11px"><?php echo $rows['date_order'];?></td>
					<td ><?php echo $rows['name_customer']; ?></td>
					<td style="text-align:center;"><?php echo $rows['sdt']; ?></td>
					<td style="text-align:center;"><?php echo $rows['status']; ?></td>
					<td style="text-align:center;"><?php if($rows['pay']=="Chưa đặt cọc"){
					echo '<span style="color:red">'.$rows['pay'].'</span>';
				}else{ 
					// echo $rows['confirm'];
					echo ' <img style="padding-bottom: 10px" src ="../image/yes.png" with ="5px" height ="auto">';
					}?></td>
					<td style="text-align:center; font-size: 11px"><?php if($rows['confirm']=="Awaiting confirmation"){
					echo '<span style="color:red">'.$rows['confirm'].'</span>';
				}else{ 
					// echo $rows['confirm'];
					echo ' <img style="padding-bottom: 10px" src ="../image/yes.png" with ="5px" height ="auto">';
					} ?></td>
					<td style="text-align:center;">
						<a href="sp.php?page_layout=thongtindonhang&id_order=<?php echo $rows['id_order']; ?>">
							<button type="button" class="btn btn-primary" >
								<span class="glyphicon glyphicon-list-alt"></span>
							</button>
						</a>
					</td>
					<!-- <td style="text-align:center;">
						<a onclick="return confirm('Đơn hàng này Đã đặt cọc?');" href="sp.php?page_layout=pay&id=<?php echo $rows['id_order']; ?>">
							<button type="button" class="btn btn-primary" >
								<span class="glyphicon glyphicon-ok"></span>
							</button>
						</a>
					</td>
					<td style="text-align:center;">
						<a onclick="return confirm('Bạn có muốn xóa?');" href="sp.php?page_layout=xoadonhang&id=<?php echo $rows['id_order']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
					</td> -->
				</tr></a>

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
					<div><h3 style=' padding-top:8px;'>Không có đơn hàng nào phù hợp!</h3></div>
				
				</div>
				</center>
				<div class='clear'></div>
				<hr>";
	}
?>
		
		