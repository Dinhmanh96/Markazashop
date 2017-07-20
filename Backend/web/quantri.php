<?php
	include_once'connect/ketnoi.php';
	$sql = "SELECT * FROM sp";
	$query = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/quantri.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../../js/jquery-3.1.1.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
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
		<!-- Header -->
		<div class="row head">
			<div class="col-xs-2 col-sm-2 col-md-2">
				<div><a href="#"><img src="../../image/logo_final.png" class="logo"></a></div>
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
		
		<hr>
		<div style="float: right; padding-bottom: 10px;">
			<a href="#">
			<button type="button" class="btn btn-primary">
	         	<span class="glyphicon glyphicon-plus-sign"></span> Thêm
	         </button>
	        </a>
        </div>

       


		<table class="table table-hover">
			<thead>
				<tr>
					<th width="5%" style="text-align:center;">ID</th>
					<th width="20%">Tên sản phẩm</th>
					<th width="5%">Giá</th>
					<th width="10%">Bảo hành</th>
					<th width="10%" style="text-align:center;">Ảnh</th>
					<th width="40%" style="text-align:center;">Chi tiết</th>
					<th width="5%" style="text-align:center;">Sửa</th>
					<th width="5%" style="text-align:center;">Xóa</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($rows = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td style="text-align:center;"><?php echo $rows['id_sp']; ?></td>
					<td><?php echo $rows['ten_sp']; ?></td>
					<td><?php echo $rows['gia_sp']; ?></td>
					<td style="text-align:center;"><?php echo $rows['bh_sp']; ?></td>
					<td style="text-align:center;"><img src="<?php echo $rows['anh_sp']; ?>" class="img"></td>
					<td style="font-size: 11px;"><?php echo $rows['chitiet_sp']; ?></td>
					<td style="text-align:center;"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span></button></td>
					<td style="text-align:center;"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></button></td>
				</tr>
			<?php
				}  
			?>
				
			</tbody>
		</table>
		<center>
			<nav>
					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
					</ul>
				</nav>
		</center>		
		


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
				<img src="../../image/logo_card1.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../../image/logo_card2.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px">
				<img src="../../image/logo_card3.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../../image/logo_card4.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../../image/logo_card5.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				<img src="../../image/logo_card6.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
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