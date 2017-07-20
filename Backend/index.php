<?php
ob_start();
session_start();
if(isset($_SESSION['tk']) && isset($_SESSION['mk'])){
	header('location:sp.php');	
}
include_once('connect/ketnoi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MarKaza</title>
<!-- <link rel="stylesheet" type="text/css" href="css/dangnhap.css" /> -->
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<style type="text/css">
	.btn-primary{
	background: #007978;
	border-radius: 8px;
	border-color: #007978;
}
.btn-primary:focus{
	background: #007978;
	border-color: #007978;
}
.btn-primary:hover:active{
	background: #007978;
	border-color: #fff;
}
.btn-primary:hover{
	background: #00b3b1;
	border-color: #fff;
}
.btn-primary:active{
	border-color: #fff;
}
</style>
</head>
<body style="background-color: #2c2c2c;">
<?php
if(isset($_POST['submit'])){
	$error = NULL;
	// Bẫy lỗi để trống cho trường nhập tên Tài khoản
	if($_POST['tk'] == ''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';	
	}
	else{
		$tk = $_POST['tk'];	
	}
	
	// Bẫy lỗi để trống cho trường nhập Mật khẩu
	if($_POST['mk'] == ''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';	
	}
	else{
		$mk = $_POST['mk'];	
	}
	
	// Dữ liệu được nhập đầy đủ thì mới xử lý Đăng nhập
	if(isset($tk) && isset($mk)){
		// echo md5('12345');
		$mk_md5 = md5($mk);
		// Kiểm tra Tài khoản với các thông tin nhận được ở trên trong CSDL
		$sql = "SELECT * FROM thanhvien WHERE email_thanhvien = '$tk' AND password = '$mk_md5'";
		$query = mysqli_query($conn,$sql);		
		$totalRows = mysqli_num_rows($query);

		
		// Không ó kết quả thì báo lỗi ngược lại Tạo phiên Đăng nhập cho Tài khoản
		if($totalRows <= 0){
			$error = 'Tài khoản hoặc Mật khẩu không hợp lệ!';	
		}
		else{
			while ($rows = mysqli_fetch_array($query)) {
				$role = $rows['quyen_thanhvien'];
			}
			$_SESSION['tk'] = $tk;
			$_SESSION['mk'] = $mk;
			$_SESSION['role'] = $role;
			header('location:sp.php');	
		}
	}
}
?>

<center>
	<h2><?php if(isset($error)){echo "<span style='color: #f5f5f5'>$error</span>";}else{echo  "<span style='color: #f5f5f5'>Đăng nhập hệ thống quản trị MarKaza</span>";}?></h2>
	<img src="image/logo.png" width="100px" height="auto">
	<form style="width: 300px; height: 300px; padding-top: 20px" method="post">

		    <div class="form-group">
		      <label for="email" style="color: #f5f5f5">Email:</label>
		      <input type="text" name="tk" class="form-control" id="email" placeholder="Enter email">
		    </div>
		    <div class="form-group">
		      <label for="pwd" style="color: #f5f5f5">Password:</label>
		      <input type="password" name="mk" class="form-control" id="pwd" placeholder="Enter password">
		    </div>
		    <div class="checkbox">
		      <label><input type="checkbox" name="check" checked="checked"> Remember me</label>
		    </div>
		    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</form>

</center>
    <!-- <ul>
        <li><label>tài khoản</label><input type="text" name="tk" /></li>
        <li><label>mật khẩu</label><input type="password" name="mk" /></li>
        <li><label>ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
        <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
    </ul> -->


</body>
</html>