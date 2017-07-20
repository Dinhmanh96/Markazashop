
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/sp.css">
	
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

	<div class="container">
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
				  <a href="sp.php">Home</a>
				  <a href="thanhviem.php">Thành viên</a>
				  <a href="logout.php">Logout</a>
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
		
		<?php
			include_once('thanhvien_content.php')
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