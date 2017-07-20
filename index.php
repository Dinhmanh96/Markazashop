<?php
	ob_start();
	session_start();	
?>
<!DOCTYPE html>
<html>
<head>
	<title>MarKara</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/thongtinsanpham.css">
	<link rel="stylesheet" href="css/rateit.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery.rateit.js"></script>
	<script type="text/javascript" src="js/jquery.watermark.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
// $("#input").watermark("Bạn muốn tìm gi?");	// Watermart cho khung nhập
$("#input").keyup(function()
{
	var input = $(this).val();   		// Lấy giá trị search của người dùng
	if(input==""){ document.getElementById("resultdata").style.display = 'none';}
	var dataString = 'keyword='+ input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
	if(input.length>0)					// Kiểm tra giá trị người nhập có > 3 ký tự hay ko
	{
		$.ajax({
			type: "GET",      						// Phương thức gọi là GET
			url: "ajax-search.php",  				// File xử lý
			data: dataString,						// Dữ liệu truyền vào
			beforeSend:  function() {				// add class "loading" cho khung nhập
				$('input#input').addClass('loading');
			},
			success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
			{
				$('#resultdata').html(server_response).show();  	// Hiển thị dữ liệu vào thẻ div #searchresultdata
				$('span#faq_category_title').html(faq_search_input);	// Hiển thị giá trị search của người dùng
				
				if ($('input#input').hasClass("loading")) {		// Kiểm tra class "loading"
					$("input#input").removeClass("loading");		// Remove class "loading"
				} 
			}
		});
	}return false;		// Không chuyển trang
});
});
</script>
	<?php
		include_once('connect/ketnoi.php');
		$sqldmt = "SELECT * FROM dmt";
		$querydmt  = mysqli_query($conn,$sqldmt);

	?>
	<script src="mdl/material.min.js"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
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
	<div class="container wrapper">
		<header>

			<div class="row header" >
					<div class="col-xs-3 col-sm-2 col-md-2 logo">
						<a href="index.php"><img src="image/logo_final.png" ></a>
					</div>
					<!-- div class="col-sx-12 col-sm-12 col-md-12"></div> -->

					<?php
						include_once('search.php');
					?>

					<div class="col-xs-3 col-sm-3 col-md-3 navbar navbar-default header-top-right">
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" role="navigation">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse collapse-li" id="collapse"  >
							<ul >

								<li><a href="index.php?page_layout=giohang"><span class="glyphicon glyphicon-shopping-cart" ><span class="text-icon"><sup><sup><sup><b class="number_item"><?php if(isset($_SESSION['giohang'])){echo count($_SESSION['giohang']);}else{echo 0;}?></b></sup></sup></sup>Giỏ</span></span></a></li>
								<!-- 
								<li><a href="#" data-toggle="modal" data-target="#myModalLogin"><span class="glyphicon glyphicon-user"><span class="text-icon">Login</span></span></a></li> -->
							</ul>
						</div>
						<div style="clear: both;"></div>
					</div>
			</div>

			<!-- End Header -->
			
			<!-- Menu -->
			<div class="row menu" >
				<ul class="list"style="line-height: 5px" >
					<?php
					while ( $rowsdmt = mysqli_fetch_array($querydmt)) {
					$id_dmt=$rowsdmt['id_dmt'];
					$sqldmn = "SELECT * FROM dmn WHERE id_dmt = $id_dmt";
					$querydmn  = mysqli_query($conn,$sqldmn);
					?>
					<li class="drdown" >
					    <a href="index.php?page_layout=sanpham&id_dmt=<?php echo $rowsdmt['id_dmt']?>" class="drbtn" ><?php echo $rowsdmt['ten_dmt']?></a>
					    <div class="drdown-content">		
						<?php
						while ($rowsdmn = mysqli_fetch_array($querydmn)) {
						?>
					    	<a href="index.php?page_layout=sanpham&id_dmn=<?php echo $rowsdmn['id_dmn']?>"><?php echo $rowsdmn['ten_dmn']?></a>
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
			<!-- End Menu -->		
			<?php
			if(isset($_GET['page_layout'])){
				switch ($_GET['page_layout']) {
					case 'sanpham':
						include_once('web/sanpham/sanpham_content.php');
						break;
					case 'giohang':
						include_once('web/giohang/giohang_content.php');
						break;
					case 'thongtinsanpham':
						include_once('web/sanpham/thongtinsanpham_content.php');
						break;
					case 'thanhtoan':
						include_once('web/thanhtoan/thanhtoan_content.php');	
						break;
					case 'thanhtoanthanhcong':
						include_once('web/thanhtoan/thanhtoanthanhcong.php');	
						break;	
					case 'timkiem':
						include_once('web/timkiem/timkiem_content.php');
						break;
					case 'topnew':
						include_once('web/sanpham/topnew_content.php');
						break;
					case 'topview':
						include_once('web/sanpham/topview_content.php');
						break;
					case 'topbuy':
						include_once('web/sanpham/topbuy_content.php');
						break;
					case 'confirm':
						include_once('web/giohang/confirm.php');
						break;
					case 'error':
						include_once('web/error.php');
						break;
					default:
						include_once('index_content.php');
						break;
				}
			}else{
				include_once('index_content.php');
			}
			
			?>

		</header>


		<!-- Footer -->
		<div>
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
					<img src="image/logo_card1.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
					<img src="image/logo_card2.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px">
					<img src="image/logo_card3.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
					<img src="image/logo_card4.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
					<img src="image/logo_card5.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
					<img src="image/logo_card6.jpg" class="img-responsive" width="50px"; height="auto" style="float: left; margin: 5px;">
				</div>

				<div class="col-xs-12 col-sm-12 col-md-5">
					<p>ĐĂNG KÝ NHẬN TIN KHUYẾN MÃI</p>
					<form>
					<div class="form-group">
						<input type="text" name="email" class="email form-control" placeholder="Nhập địa chỉ email" style="width: 55%">
					</div>
					<div class="clear"></div>
					<label class="radio-inline"><input type="radio" name="sex">Nam</label>
					<label class="radio-inline"><input type="radio" name="sex">Nữ</label>
					<button style="margin-left: 5px" type="submit" class="btn btn-primary">Gửi đăng ký</button>
					</form>
				</div>
			</div>	
		</div>
		<!-- End Footer -->
	</div>
	
	<script src="js/show-image.js"></script>
	<!-- <script src="js/bootstrap.js"></script> -->
</body>
</html>