<div class="row cart">
	<?php
	if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
		
		if(isset($_POST['sl'])){
			foreach($_POST['sl'] as $id_sp=>$sl){
				if($sl <= 0){
					unset($_SESSION['giohang'][$id_sp]);	
				}
				elseif($sl > 0){
					$_SESSION['giohang'][$id_sp] = $sl;	
				}	
			} 		
		}
		
				$arrId = []; //mang id_sp
				foreach($_SESSION['giohang'] as $id_sp => $value){
					$arrId[] = $id_sp;		
				}
				$strId = implode(',', $arrId);
				$sql = "SELECT * FROM sp WHERE id_sp IN($strId) ORDER BY id_sp DESC";
				$query = mysqli_query($conn,$sql);
				
				?>
				<hr>		
				<?php
				if(count($_SESSION['giohang'])>0){
					?>
					<h5 style="padding-top: 4px; padding-bottom: 10px; padding-left: 15px; font-size: 20px;"><b>Giỏ hàng của bạn</b></h5>
					<div class="col-xs-12 col-sm-12 col-md-9">
						<div class="row" style="background-color: #00b3b1;color: #fff; margin-bottom: 30px; height: 30px;" >
							<div class="col-xs-2 col-sm-2 col-md-2"><h6 style="font-size: 15px; margin-top: 7px;"><b><?php if(isset($_SESSION['giohang'])){echo count($_SESSION['giohang']);}else{echo 0;}?> sản phẩm</b></h6></div>
							<div class="col-xs-3 col-sm-3 col-md-3"><h6 style="font-size: 15px; margin-top: 7px;"><b>Tên sản phẩm</b></h6></div>
							<div class="col-xs-2 col-sm-2 col-md-2"><h6 style="font-size: 15px; margin-top: 7px;"><b>Giá (VNĐ)</h6></b></div>
							<div class="col-xs-2col-sm-2 col-md-2"><h6 style="font-size: 15px; margin-top: 7px;"><b>Số lượng</b></h6></div>
							<div class="col-xs-2 col-sm-2 col-md-2"><h6 style="font-size: 15px; margin-top: 7px;"><b>Thành tiền</b></h6></div>
							<div class="col-xs-1 col-sm-1 col-md-1"><h6 style="font-size: 15px; margin-top: 7px;"><b>Xóa</b></h6></div>
							<div class="clear"></div>			
						</div>
						<hr>
						<form class="form-group" id="giohang" method="post">
							<?php
							$totalPriceAll = 0;
							while ($rows = mysqli_fetch_array($query)) {
								$totalPrice = $rows['gia_sp']*$_SESSION['giohang'][$rows['id_sp']];					
								?>
								<div class="row">
									
									<div class="col-xs-2 col-sm-2 col-md-2"><img src="image/Source/<?php echo $rows['anh_sp']?>" class="img-responsive" alt="" height="60px"; width="60px" style="float: left;"></div>
									<div class="col-xs-3 col-sm-3 col-md-3"><?php echo $rows['ten_sp']?></div>
									<div class="col-xs-2 col-sm-2 col-md-2" style="padding-top: 5px"><?php echo number_format($rows['gia_sp'],0,',','.') ?></div>
									
									<div class="col-xs-2 col-sm-2 col-md-2" "><input class="form-control" type="number" max="<?php echo $rows['sl_sp']?>" name="sl[<?php echo $rows['id_sp']?>]" value="<?php echo $_SESSION['giohang'][$rows['id_sp']];?>"></div>

									<div class="col-xs-2 col-sm-2 col-md-2" style="padding-top: 5px"><?php echo number_format($totalPrice,0,',','.') ?></div>
									<div class="col-xs-1 col-sm-1 col-md-1"><a href="web/giohang/xoahang.php?id_sp=<?php echo $rows['id_sp'] ?>"><button type="button" class="btn btn-primary btn-xs " >x</button></a></div>
								</div>
								<hr>

								<?php
								$totalPriceAll += $totalPrice;
							}
							?>

							<button style="float: right;" type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
						</form>
						<!-- <a onclick="document.getElementById('giohang').submit();" href="#"><button style="float: right;" type="button" class="btn btn-primary">Cập nhật</button></a> -->
						
					</div>
					
					<div class="col-sx-12 col-sm-12 col-md-3" >
						<div style="color: #00b3b1;">
							<h5 style="padding-top: 3px; ">Thông tin đơn hàng</h5>
						</div>
						<hr style="padding-top: 20px;">					
						<div style="float: left; padding-right: 80px;"><b>Tạm tính:</b></div>
						<div><?php echo number_format($totalPriceAll,0,',','.') ?></div>
						<hr>
						<a href="index.php?page_layout=thanhtoan" style="color: #fff; text-decoration: none;"><button type="button" class="btn btn-primary" style="margin-left: 40px;" ">Tiến hành thanh toán</button></a>
					</div>
					<?php
				}else{
					include_once('emptycart.php');
				}
				?>
				<?php
			}
			else{
				include_once('emptycart.php');
			}
			?>
			
		</div>

		<hr>

		<?php
		include_once('web/topview.php');
		?>
		<hr>