<?php

	include("connect/ketnoi.php");
	// $id = $_GET['id'];
	// $sql = "SELECT * FROM thanhvien WHERE id_thanhvien ='$id'";
	// $query = mysqli_query($conn,$sql);
	// $rows = mysqli_fetch_array($query);
	$sqlDmt = 'SELECT * FROM dmt';
	$queryDmt = mysqli_query($conn,$sqlDmt);

	$sqlDmn = 'SELECT * FROM dmn ';
	$queryDmn = mysqli_query($conn,$sqlDmn);


 	if(isset($_POST['submit'])){

 				$iddmn = $_POST['iddmn'];

 				$sql = "SELECT id_dmt FROM dmn WHERE id_dmn = $iddmn";
 				$query = mysqli_query($conn,$sql);

 				$rs = mysqli_fetch_assoc($query);

 				$iddmt = $rs['id_dmt'];

				$ten_sp = $_POST['ten_sp'];
				$gia_sp = $_POST['gia_sp'];
				$bh_sp = $_POST['bh_sp'];
				$anh_sp = $_POST['anh_sp'];
				$chitiet_sp = $_POST['chitiet_sp'];


				$anh_sp = $_FILES['anh_sp']['name'];
				$tmp = 	$_FILES['anh_sp']['tmp_name'];
				move_uploaded_file($tmp, '../image/Source/'.$anh_sp);


				$sql = "INSERT INTO sp(id_dmt,id_dmn,ten_sp,gia_sp,bh_sp,anh_sp,chitiet_sp)VALUES('$iddmt','$iddmn','$ten_sp','$gia_sp','$bh_sp','$anh_sp','$chitiet_sp')";
				$query = mysqli_query($conn,$sql);
				header("location:sp.php");
				}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/quantri.css">
	
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
</head>
<body>
	<!-- <div id="fb-root"></div> -->
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1285853614831863";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<script>
			window.fbAsyncInit = function() {
		  FB.init({
		    appId      : '1285853614831863',
		    xfbml      : true,
		    version    : 'v2.8'
		  });
		  FB.AppEvents.logPageView();  
		}
		(function(d, s, id){
		   var js, fjs = d.getElementsByTagName(s)[0];
		   if (d.getElementById(id)) {return;}
		   js = d.createElement(s); js.id = id;
		   js.src = "//connect.facebook.net/en_US/sdk.js";
		   fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
	<div class="container">

		<!-- Trigger the modal with a button -->
		
		  <!-- Trigger the modal with a button -->
		

		  <!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
		  	<form class="form_login">
			    <div class="modal-dialog" style="width: 400px; padding-top: 100px">
			      <!-- Modal content-->
				    <div class="modal-content">

				        <div class="modal-header" style="background-color: #00aeac; border-radius: 5px 5px 0px 0px;">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title" style="color: #fff;"><center>ĐĂNG NHẬP MARKAZA</center></h4>
				        </div>

				        <div class="modal-body">
				          	
								<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Username</span>
								  <input type="text" class="form-control" name="username" aria-describedby="sizing-addon2">
								</div>
								<br>
								<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Password</span>
								  <input type="password" class="form-control" name="pass" aria-describedby="sizing-addon2">
								</div>

				        </div>

				        <div class="modal-footer">
				        <div style="float: left;" class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="true" data-auto-logout-link="false"></div>
				          <button type="submit" class="btn btn-default" >Login</button>
				        </div>

				    </div>
			    </div>
		   	</form>
		</div>
		<!-- Header -->
		<div class="row head">
			<div class="col-xs-2 col-sm-2 col-md-2">
				<div><a href="#"><img src="../image/logo_final.png" class="logo"></a></div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 search" >
						<div class="input-group add-on">
	      					<input class="form-control" placeholder="Tìm kiếm sản phẩm, thương hiệu, tên shop, ..." name="srch-term" id="srch-term" type="text">
	      					<div class="input-group-btn">
	        					<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	      					</div>
	    				</div>
					</div>
			<div class="col-xs-4 col-sm-4 col-md-4 about">
				<div id="myTopnav"  class="topnav">
				  <a href="#home">Home</a>
				  <a href="#news">Thành viên</a>
				  <a href="#" data-toggle="modal" data-target="#myModal">Logout</a>
				  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>	
				</div>	
			</div>
		</div>
		<!-- End header -->

		<!-- Menu -->
		<div class="row menu " >
						
				<ul class="list" style="line-height: 5px">

					<li class="drdown" >
					    <a href="javascript:void(0)" class="drbtn" >Điện tử</a>
					    <div class="drdown-content">
					    	<a href="index.php?page_layout=sanpham">Điện thoại</a>
					    	<a href="#">Máy tính bảng</a>
					    	<a href="#">Laptop/PC</a>
					    	<a href="">Phụ kiện điện tử</a>
					    	<a href="#">Tivi / hệ thống âm thanh</a>
					    	<a href="#">Thiết bị nhà bếp</a>

					    </div>
					</li>

					<li class="drdown">
					    <a href="javascript:void(0)" class="drbtn">Thời trang nam</a>
					    <div class="drdown-content">
					    	<a href="#">Sơ mi / Áo</a>
					    	<a href="#">Quần Jean</a>
					    	<a href="#">Phụ kiên thời trang</a>
					    </div>
					</li>

					<li class="drdown">
					    <a href="javascript:void(0)" class="drbtn">Thời trang nữ</a>
					    <div class="drdown-content">
					    	<a href="#">Áo</a>
					    	<a href="#">Quần / váy</a>
					    	<a href="#">Phụ kiện thời trang</a>
					    </div>
					</li>

					<li class="drdown">
					    <a href="javascript:void(0)" class="drbtn">Sức khỏe & sắc đẹp</a>
					    <div class="drdown-content">
					    	<a href="#">Thực phẩm chức năng</a>
					    	<a href="#">Mỹ phẩm</a>
					    	<a href="#">Phụ kiện làm đẹp</a>
					    </div>
					</li>

					<li class="drdown">
					    <a href="javascript:void(0)" class="drbtn">Đồ gia dụng</a>
					    <div class="drdown-content">
					    	
					    </div>
					</li>

					<li class="drdown">
					    <a href="javascript:void(0)" class="drbtn">Trẻ em & đồ chơi</a>
					    <div class="drdown-content">
					    	<a href="#">Học tập</a>
					    	<a href="#">Đồ chơi</a>
					    	<a href="#">Thực phẩm / sữa</a>
					    </div>
					</li>

					<li class="drdown">
					    <a href="javascript:void(0)" class="drbtn">Thể thao & du lịch</a>
					    <div class="drdown-content">
					    	<a href="#">Đồ phượt</a>
					    	<a href="#">Dụng cụ thể thao</a>
					    	<a href="#">Phụ kiện thể thao</a>
					    </div>
					</li>
				</ul>
		</div>
		<!-- End menu -->
		
		
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


