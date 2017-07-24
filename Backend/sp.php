<?php
	ob_start();
	session_start();
	include_once('connect/ketnoi.php');
	if(isset($_SESSION['tk']) && isset($_SESSION['mk'])){	
	$sqldmt = "SELECT * FROM dmt";
	$querydmt  = mysqli_query($conn,$sqldmt);
	// echo $_SESSION['role'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN - MarKara</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/sp.css">
	<script type="text/javascript" src="ck/ckeditor/ckeditor.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script type="text/javascript">
		function myFunction() {
		    var x = document.getElementById("myTopnav");
		    if (x.className === "topnav") {
		        x.className += " responsive";
		    } else {
		        x.className = "topnav";
		    }
		}
	</script>

	<style type="text/css" media="screen">
		th, td{
  max-width: 100px; white-space: nowrap;  overflow: hidden; text-overflow: ellipsis;
}
	</style>
</head>
<body>
	<div class="container">

		<!-- Header -->
		<div class="row head">
			<div class="col-xs-2 col-sm-2 col-md-2">
				<div><a href="#"><img src="../image/logo_final.png" class="logo"></a></div>
			</div>
			<?php
				include_once('search.php');
			?>
			<div class="col-xs-4 col-sm-4 col-md-5 about">
				<div id="myTopnav"  class="topnav">
				  <a href="sp.php?page_layout=sp">Sản phẩm</a>
				  <a href="sp.php?page_layout=thanhvien">Thành viên</a>
				  <a href="sp.php?page_layout=order">Đơn hàng</a>
				  <a href="sp.php?page_layout=logout">Logout</a>
				  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>	
				</div>	
			</div>
		</div>
		<!-- End header -->

		<!-- Menu -->
		<div class="row menu " >
						
				<ul class="list"style="line-height: 5px" >
					<?php
					while ( $rowsdmt = mysqli_fetch_array($querydmt)) {
					$id_dmt=$rowsdmt['id_dmt'];
					$sqldmn = "SELECT * FROM dmn WHERE id_dmt = $id_dmt";
					$querydmn  = mysqli_query($conn,$sqldmn);
					?>
					<li class="drdown" >
					    <a href="sp.php?page_layout=sanpham&id_dmt=<?php echo $rowsdmt['id_dmt']?>" class="drbtn" ><?php echo $rowsdmt['ten_dmt']?></a>
					    <div class="drdown-content">		
						<?php
						while ($rowsdmn = mysqli_fetch_array($querydmn)) {
						?>
					    	<a href="sp.php?page_layout=sanpham&id_dmn=<?php echo $rowsdmn['id_dmn']?>"><?php echo $rowsdmn['ten_dmn']?></a>
						<?php
						}
						?>
					    </div>
					</li>
					<?php

					}

					?>
				</ul>
		</div>
		<div id="resultdata"></div>
		<!-- End menu -->
		<?php
			if(isset($_GET['page_layout'])){
				switch ($_GET['page_layout']) {
					case 'sp':
						include_once('web/sanpham/sp_content.php');
						break;
					case 'add_sp':
						include_once('web/sanpham/add_sp_content.php');
						break;
					case 'xoa_sp':
						include_once('web/sanpham/xoa_sp_content.php');
						break;
					case 'edit_sp':
						include_once('web/sanpham/edit_sp_content.php');	
						break;
					case 'thanhvien':
						include_once('web/thanhvien/thanhvien_content.php');
						break;
					case 'add_thanhvien':
						include_once('web/thanhvien/add_thanhvien_content.php');
						break;
					case 'edit_thanhvien':
						include_once('web/thanhvien/edit_thanhvien_content.php');	
						break;
					case 'xoa_thanhvien':
						include_once('web/thanhvien/xoa_thanhvien_content.php');
						break;
					case 'order':
						include_once('web/order/order_content.php');
						break;
					case 'pay':
						include_once('web/order/pay.php');
						break;
					case 'timkiem':
						include_once('web/timkiem/timkiem_content.php');
						break;
					case 'updatesl':
						include_once('web/order/updatesl.php');
						break;	
					case 'xoadonhang':
						include_once('web/order/xoadonhang.php');
						break;
					case 'huydonhang':
						include_once('web/order/huydonhang.php');
						break;
					case 'thongtindonhang':
						include_once('web/order/thongtindonhang_content.php');
						break;
					case 'logout':
						include_once('logout.php');
						break;
					default:
						include_once('web/sanpham/sp_content.php');
						break;
				}
			}else{
				include_once('web/sanpham/sp_content.php');
			}
			
		?>
		<!-- Footer -->
		<div class="row footer">
			<div class="col-xs-12 col-sm-12 col-md-4">
				<p >Chăm sóc khách hàng +84 969 960 196</p>
				<p style="line-height: 20px;">Đặt hàng qua diên thoại +84 966 899 770</p>
				<div><span class="glyphicon glyphicon-earphone" style="font-size: 13px; padding-right: 10px;"></span>+84 969 960 196</div>
				<div><span class="glyphicon glyphicon-envelope" style="font-size: 13px; padding-right: 10px;"></span>support@markara.com.vn</div>
				<div><span class="glyphicon glyphicon-map-marker" style="font-size: 13px; padding-right: 10px;"></span>Tầng 10, Tòa Thư viện Tạ Quang Bửu, số 1 Đại Cồ Việt, Quận Hai Bà Trưng, Hà Nội.</div>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-3">
				<p >CÁCH THỨC THANH TOÁN</p>
				<img src="../image/logo_card1.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../image/logo_card2.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px">
				<img src="../image/logo_card3.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../image/logo_card4.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../image/logo_card5.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../image/logo_card6.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
			</div>

			<div class="col-xs-12 col-sm-12 col-md-5">
				<p>ĐĂNG KÝ NHẬN TIN KHUYẾN MÃI</p>
				<form>
				<input type="text" name="email" class="email" placeholder="Nhập địa chỉ email">
				<input type="radio" name="gender" val="female">Nam
				<input type="radio" name="gender" val="male">Nữ
				<button type="submit" class="btn btn-primary">Gửi đăng ký</button>
				</form>
			</div>
		</div>	
		<!-- End footer -->

	</div>
	
</body>
</html>
<?php
}else{
		header("location:index.php");
	}


?>