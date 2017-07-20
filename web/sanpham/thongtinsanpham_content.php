<?php
	ob_start();

	$id_sp = $_GET['id_sp'];
	$sql = "SELECT * FROM sp WHERE id_sp = $id_sp ";
	$query = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($query);
	$view  = $rows['view'];
	$view +=1;
	$id_dmn = $rows['id_dmn'];

	$sql = "UPDATE sp SET view = '$view' WHERE id_sp = $id_sp";
	$query = mysqli_query($conn,$sql);
	$chitiet_sp = explode("\n", $rows['chitiet_sp']);

	$sqlcmt = "SELECT * FROM comment WHERE id_sp = $id_sp";
	$querycmt = mysqli_query($conn,$sqlcmt);
	$totalcmt = mysqli_num_rows($querycmt);

	if(isset($_POST['submit'])){
		$time_cmt = gmdate("Y-m-d H:i:s",time()+7*3600);
		// $now = getdate();
   		// $time_cmt = $now["year"] . "." . $now["mon"] . "." . $now["mday"] . "." . $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
		$name_cmt = $_POST['name_cmt'];
		$text_cmt = $_POST['text_cmt'];
		$sql = "INSERT INTO comment(id_sp, name_cmt, text_cmt, time_cmt)VALUES('$id_sp','$name_cmt','$text_cmt','$time_cmt')";
		$query = mysqli_query($conn,$sql);
		header("location:index.php?page_layout=thongtinsanpham&id_sp=$id_sp");
	}

	// Đếm lượt View sản phẩm
?>
<!-- <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div> -->
<hr>
<div class="row title-production" style="padding-top: 20px">
				<div class="col-xs-9 col-sm-9 col-md-9 name">
				
					<h3><?php echo $rows['ten_sp']?></h3>
					<span style="color: red;">Đánh giá chất lượng sản phẩm (<?php echo $totalcmt ?> bình luận)</span><div class="rateit" data-rateit-mode="font"  data-rateit-resetable="false"  data-rateit-ispreset="true" style="font-size:15px;"></div>
					
				</div>
				<div class="col-xs-3 col-sm-3 col-md-3">
					<div class="fb-like like" data-href="https://MarKara.com.vn" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
				</div>
			</div>
			<hr>
			
			<div class="row show-production">
				

				<div class="col-xs-12 col-sm-6 col-md-4 image-production">
					<img id="myImg" src="image/Source/<?php echo $rows['anh_sp']?>" alt="<?php echo $rows['ten_sp']?>" width="250px" height="auto" class="image">
					<div id="myModal" class="modal">
						<span class="close">×</span>
						<img class="modal-content" id="img01">
						<div id="caption"></div>
					</div>
					<!-- <hr>
					<div class="clear"></div> -->
					<!-- <div class="list-image-production">
						<img id="myImg" src="image/233px/logo_final2.png" alt="Iphone 7 plus/64Gb mạ sắt" width="50" height="50" class="image">
						<img id="myImg" src="image/233px/logo_final2.png" alt="Iphone 7 plus/64Gb mạ sắt" width="50" height="50" class="image">
						<img id="myImg" src="image/233px/logo_final2.png" alt="Iphone 7 plus/64Gb mạ sắt" width="50" height="50" class="image">
						<img id="myImg" src="image/233px/logo_final2.png" alt="Iphone 7 plus/64Gb mạ sắt" width="50" height="50" class="image">
					</div> -->
					<hr>
					<!-- <img src="image/233px/top100/anh1.jpg" class="image"> -->
					
				</div>
				<div class="col-xs-12 col-sm-6 col-md-5 info-production">
					<p><b><?php if($rows['bh_sp']!="0"){ echo 'Bảo hành '.$rows['bh_sp'].' tháng(Hàng điện tử)';}else{ echo "Lưu ý: Hàng không bảo hành";}?>  </b><i class="xemthem"> <a href="#" title="Chế độ bảo hành" data-toggle="popover" data-trigger="focus" data-content="Chế độ bảo hành chỉ áp dụng cho 'Hàng điện tử' và được dựa vào hóa đơn đi kèm khi mua sản phẩm! Quý khách lưu ý giữ lại hóa đơn.">xem thêm</a></i></p>
					
					<hr>
					<?php
						foreach ($chitiet_sp as $value) {
							echo '<div style="float: left; width: 50%" >
								<li><span>'.$value.'</span></li></div>';
						}
					?>

					<div class="clear"></div>
					<hr>
					<h5><b class="price">Giá sản phẩm: <?php echo number_format($rows['gia_sp'],0,',','.') ?> VND</b></h5>
					<!---->
					<?php
						if($rows['sl_sp']==0){
						?>
							<p style="padding-top: 10px;">Tình trạng: Hết hàng</p>
							<button style="margin-top: 20px;" type="button" class="btn btn-danger btn1">Hết hàng</button>
						<?php
						}else{
							echo '<p style="padding-top: 10px;">Tình trạng: Còn hàng</p>';
							echo '<a  href="web/giohang/themhang.php?id_sp='.$rows['id_sp'].'">
							<button style="margin-top: 20px;" type="button" class="btn btn-primary btn1" onclick="popup_add();">Mua hàng</button>
							</a>';
						}
					?>
					
					<div style="padding-top: 20px">Thương hiệu: <b><?php echo $rows['th_sp']?></b></div>
					<div id="snackbar">Bạn đã thêm 1 sản phẩm vào giỏ hàng!</div>
				</div>
				
				<div class="col-sx-12 col-sm-12 col-md-3 info_shop" style="font-size: 12px">
					<p><b>Tùy chọn giao hàng</b></p>
					<hr>
					<div class="ship">
						<div class="icon_free" style="float: left; padding-left: 5px; padding-top: 10px; margin-right: 20px"><img src="image/ship.png" width="40px" height="30px"></div>
						<div class="giao_hang" style=""><b>Giao hàng tiêu chuẩn: Miễn phí</b></div>
					</div>
					<hr>
					<div class="clear"></div>
					<div class="ship">
						<div class="icon_free" style="float: left; padding-left: 5px; padding-top: 5px; margin-right: 20px"><img src="image/ship1.png" width="40px" height="40px"></div>
						<div class="giao_hang"><b>Giao hàng hỏa tốc: Phí 22.000 đ</b></div>
					</div>
					<hr>
					<div class="ship" style="color: #000; background-color: #fff;">
						<div class="icon_free" style="float: left;"><img src="image/danger.png" width="30px" height="auto"></div>
						<div class="giao_hang" style="padding-top: 0px;"><b>Quý khách có thể thanh toán khi nhận hàng!</b></div>
					</div>
					
					<div class="clear"></div>
					<div>
						<div style="width: 50%; float: left; color: #000; background-color: #fff; border-width: 1px; border-right: 1px solid;">
							<div ><b>Được bán & giao hàng bởi</b><div style="color: #00a48f">MarKara Shop<div class="rateit" data-rateit-mode="font"  data-rateit-resetable="false"  data-rateit-ispreset="true" style="font-size:15px;"></div></div></div>
						</div>

						<div style="float: left; width: 25%; height: 100%; padding: 5px 10px; opacity: 1; border-width: 1px; border-right: 1px solid; border-right: 1px solid;"><b>Hàng chính hãng</b></div>

						<div style="opacity: 1; "><b>Thanh toán đảm bảo</b></div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row intro_production">
				<h4>Giới thiệu sản phẩm </h4>
				<p><?php echo $rows['baiviet_sp']?></p>
				<img style="text-align: center;" src="image/Source/<?php echo $rows['anh_sp']?>" class="img-responsive" alt="" width="500px" height="auto">
			</div>
			<hr>
			<div class="row name_comment">
				<div style="padding-bottom: 20px;" class="form-group">
					<h4>Bình luận</h4>
					<form enctype="multipart/form-data" method="post">
						<span><b>Tên</b></span></br>
						<input style="margin-top: 10px; width: 300px" type="" name="name_cmt" required="" class="form-control">
						<div class="clear"></div>
						<span><b>Bình luận</b></span></br>
						<textarea style="margin-top: 10px; width: 300px; height: 100px" type="" name="text_cmt" required="" class="form-control"></textarea></br>
						<button type="submit" name="submit" class="btn btn-primary">Gửi</button>
					</form>
				</div>
				<h4><?php if($totalcmt==0){echo "Chưa có đánh giá và nhận xét nào cho sản phẩm, hãy đánh giá sản phẩm này!";}else { echo "Đánh giá và nhận xét cho sản phẩm";}?></h4>
				<hr>
				<?php
				while ( $rowscmt = mysqli_fetch_array($querycmt)) {
				?>
				<div style='padding-top: 10px;'>
					<span><b><?php echo $rowscmt['name_cmt']?></b></span></br>
					<span style="opacity: 0.8; font-size: 12px;"><i><?php echo $rowscmt['time_cmt']?></i></span></br>
					<p style="padding-top: 10px;"><?php echo $rowscmt['text_cmt']?></p>
					<hr>
				</div>

				<?php
				}
				?>			
			</div>

<?php
	include_once('web/sptuongtu.php');
?>
<hr>
