<?php

	include("connect/ketnoi.php");
	// $id = $_GET['id'];
	// $sql = "SELECT * FROM thanhvien WHERE id_thanhvien ='$id'";
	// $query = mysqli_query($conn,$sql);
	// $rows = mysqli_fetch_array($query);
	
 	if(isset($_POST['submit'])){
 			$email_thanhvien = $_POST['email_thanhvien'];
			$sqlKiemTra = "SELECT * FROM thanhvien WHERE email_thanhvien = '$email_thanhvien'";
			$queryKiemTra = mysqli_query($conn,$sqlKiemTra);

			$totalRows = mysqli_num_rows($queryKiemTra);
			
			if($totalRows > 0){
				echo "<center style='color:red'>Tài khoản đã tồn tại</center>";
			}else{

				if($_POST['password_new'] != ''){
			 		$password = $_POST['password_new'];
			 	}

			 	$password_md5 = md5($password);
				$ten_thanhvien = $_POST['ten_thanhvien'];
				$email_thanhvien = $_POST['email_thanhvien'];
				$sdt_thanhvien = $_POST['sdt_thanhvien'];
				$dc_thanhvien= $_POST['dc_thanhvien'];

				$sql = "INSERT INTO thanhvien(password,ten_thanhvien,email_thanhvien,sdt_thanhvien,dc_thanhvien)VALUES('$password_md5','$ten_thanhvien','$email_thanhvien','$sdt_thanhvien','$dc_thanhvien')";
				$query = mysqli_query($conn,$sql);
				header("location:sp.php?page_layout=thanhvien");
				}
	}
?>

<hr>
		<form enctype="multipart/form-data" method="post">

			<div class="form-group">
				<label for="">Tên thành viên</label>
				<input type="text" name="ten_thanhvien" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="email" name="email_thanhvien" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label for="">Password</label>
				<input name="password_new" type="password" id="password_new" class="form-control" required/>
			</div>
			
			<div class="form-group">
				<label for="">Confirm Password</label>
				<input name="password_confirm" type="password" class="form-control" id="password_confirm" oninput="check(this)" required />
			</div>	
			<!-- Check password		 -->
			<script language='javascript' type='text/javascript'>
			    function check(input) {
			        if (input.value != document.getElementById('password_new').value) {
			            input.setCustomValidity('Mật khẩu không khớp nhau!');
			        }else {
			            // input is valid -- reset the error message
			            input.setCustomValidity('');
			        }
			    }
			</script>

			<div class="form-group">
				<label for="">Phone</label>
				<input type="text" name="sdt_thanhvien" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="">Địa chỉ</label>
				<input type="text" name="dc_thanhvien" class="form-control" required>
			</div>

			<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
		</form>
		<hr>