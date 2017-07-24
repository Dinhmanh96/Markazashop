<?php
if(isset($_GET['id_order'])){
	$id_order  = $_GET['id_order'];
	$sql = "SELECT * FROM orderlist WHERE id_order = $id_order";
	$query = mysqli_query($conn,$sql);

}
?>

<center>
	<p>
		<h3 style="color: #00aeac; padding-top: 50px;">Thông tin đơn hàng</h3>
	</p>
</center>
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-4">
		<?php
		while ($rows = mysqli_fetch_array($query)) {
			$code_order = $rows['code_order'];
			?>
			<center><h4 style="color: #00aeac;">Thông tin cơ bản</h4></center>
			<table class="table">
				<tbody>
					<tr>
						<td><b>Mã đơn hàng: </b></td>
						<td colspan="2"><?php echo $rows['code_order']?></td>
					</tr>

					<tr>
						<td><b>Tên khách hàng: </b></td>
						<td colspan="2"><?php echo $rows['sdt']?></td>
					</tr>
					<tr>
						<td><b>Số điện thoại: </b></td>
						<td colspan="2"><?php echo $rows['sdt']?></td>
					</tr>
					<tr>
						<td><b>Email: </b></td>
						<td colspan="2"><?php echo $rows['mail_customer']?></td>
					</tr>
					<tr>
						<td><b>Địa chỉ giao hàng: </b></td>
						<td colspan="2"><?php echo $rows['address']?></td>
					</tr>
					<tr>
						<td><b>Thời gian đặt hàng: </b></td>
						<td colspan="2"><?php echo $rows['date_order']?></td>
					</tr>
					<tr>
						<td><b>Tình trạng: </b></td>
						<td><?php echo $rows['status']?></td>
						<td><?php 
							if ($rows['status'] != 'Đã hủy') {
								echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn hủy đơn hàng ID = '.$rows['id_order'].' ? &#39'.');" href="sp.php?page_layout=huydonhang&code_order='.$rows['code_order'].'"';
							}
							?>
							<button <?php if ($rows['status'] === 'Đã hủy') {
								echo "disabled";
							} ?> type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>

							<?php 
							if ($_SESSION['role'] == '1') {
								echo '</a>'; 

							}
							?>
						</td>
					</tr>
					<tr>
						<td><b>Chuyển khoản: </b></td>
						<td><?php 
							if($rows['pay']=="Chưa đặt cọc"){
								echo '<span style="color:red">'.$rows['pay'].'</span>';
							}else{ 
								echo $rows['pay'];
								echo ' <img style="padding-bottom: 10px" src ="../image/yes.png" with ="5px" height ="auto">';
							}
							?></td> 
							<td><a onclick="return confirm('Đơn hàng này Đã đặt cọc?');" href="sp.php?page_layout=pay&id=<?php echo $rows['id_order']; ?>">
								<button type="button" class="btn btn-primary btn-sm" >
									<span class="glyphicon glyphicon-ok"></span>
								</button>
							</a></td>
						</tr>
						<tr>
							<td><b>Xác nhận: </b></td>
							<td><?php 
								if($rows['confirm']=="Awaiting confirmation"){
									echo '<span style="color:red">'.$rows['confirm'].'</span>';
								}else{ 
									echo $rows['confirm'];
									echo ' <img style="padding-bottom: 10px" src ="../image/yes.png" with ="5px" height ="auto">';
								}
								?></td>
							</tr>
							<tr>
								<td colspan="3"><center>
									<?php 
									if ($_SESSION['role'] == '1') {
										echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn xóa đơn hàng ID = '.$rows['id_order'].' ? &#39'.');" href="sp.php?page_layout=xoadonhang&id='.$rows['id_order'].'"';
									}
									?>
									<button <?php if ($_SESSION['role'] != '1') {
										echo "disabled";
									} ?> type="button" class="btn btn-danger">Xóa đơn hàng</button>

									<?php 
									if ($_SESSION['role'] == '1') {
										echo '</a>'; 

									}
									?>
									</center></td>
							</tr>
							
						</tbody>
					</table>
					<?php
				}
				?>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-8">
				<center><h4 style="color: #00aeac;">Thông tin sản phẩm</h4></center>
				<table class="table table-striped table-hover">
					<thead>

						<tr>
							<th width="10%">Id</th>
							<th width="35%">Tên sản phẩm</th>
							<th width="15%" style="text-align: center;">Số lượng</th>
							<th width="20%" style="text-align: right;">Giá</th>
							<th width="20%" style="text-align: right;">Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
				// echo $code_order;
						$totalPriceAll = 0;
						$sql1 = "SELECT * FROM ordercontent WHERE code_order = '$code_order'";
						$query1 = mysqli_query($conn,$sql1);

						while ($rows = mysqli_fetch_array($query1)) {
							$rs  = $rows['id_sp'];
							$sql2 = "SELECT * FROM sp WHERE id_sp = $rs";
							$query2 = mysqli_query($conn,$sql2);
							while ($rowsp = mysqli_fetch_array($query2)) {
								$totalPrice = $rowsp['gia_sp']*$rows['sl_sp'];

								?>
								<tr>
									<td><?php echo $rowsp['id_sp']?></td>
									<td><?php echo $rowsp['ten_sp'];?></td>
									<td style="text-align: center;"><?php echo $rows['sl_sp'];?></td>
									<td style="text-align: right;"><?php echo number_format($rowsp['gia_sp'],0,',','.') ?></td>
									<td style="text-align: right;"><?php echo number_format($totalPrice,0,',','.') ?></td>
								</tr>

								<?php
								$totalPriceAll += $totalPrice;
							}
						}
						?>	
						<tr>
							<td colspan="2" class="prd-name" style="color: #1bbc9b; font-size: 16px;padding-top: 30px;"><b>Tổng giá trị hóa đơn là:</b></td>
							<td colspan="2"></td>
							<td class="prd-total" style="padding-top: 30px;font-size: 16px; text-align: right;"><span><b><?php echo number_format($totalPriceAll,0,',','.') ?> VNĐ</b></span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>