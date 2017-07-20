<?php

	include("connect/ketnoi.php");
	$id = $_GET['id'];
	$sql = "SELECT * FROM thanhvien WHERE id_thanhvien ='$id'";
	$query = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($query);
	
 	if(isset($_POST['submit'])){

	 	if($_POST['password_new'] != ''){
	 		$password = $_POST['password_new'];
	 	}else{
	 		$password = $_POST['password_old'];
	 	}

	 	$password_md5 = md5($password);
		$password = $_POST['password'];
		$ten_thanhvien = $_POST['ten_thanhvien'];
		$email_thanhvien = $_POST['email_thanhvien'];
		$sdt_thanhvien = $_POST['sdt_thanhvien'];
		$dc_thanhvien= $_POST['dc_thanhvien'];
		$quyen_thanhvien = $_POST['quyen_thanhvien'];

		$sql = "UPDATE thanhvien SET password = '$password_md5', ten_thanhvien ='$ten_thanhvien', email_thanhvien ='$email_thanhvien' , sdt_thanhvien = '$sdt_thanhvien', dc_thanhvien = '$dc_thanhvien', quyen_thanhvien = '$quyen_thanhvien' WHERE id_thanhvien = '$id'";
		$query = mysqli_query($conn,$sql);
		header("location:sp.php?page_layout=thanhvien");
	} 

?>

<?php
	include_once'connect/ketnoi.php';
	$sql = "SELECT * FROM sp";
	$query = mysqli_query($conn,$sql);

?>


		<hr>
		<form enctype="multipart/form-data" method="post">

			<!-- <div class="form-group">
				<label for="">Username</label>
				<input type="text" name="username" value="<?php echo $rows['username'];?>" class="form-control">
			</div> -->

			
			<!-- End check password -->
			<div class="form-group">
				<label for="">Tên thành viên</label>
				<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> type="text" name="ten_thanhvien" value="<?php echo $rows['ten_thanhvien'];?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> type="email" name="email_thanhvien" value="<?php echo $rows['email_thanhvien'];?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label for="">Password</label>
				<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> name="password_new" type="password" id="password_new" class="form-control">
				<input type="hidden" name="password_old" value="<?php echo $rows['password'];?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label for="">Confirm Password</label>
				<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> name="password_confirm" type="password" class="form-control" id="password_confirm" oninput="check(this)"/>
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
				<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> type="text" name="sdt_thanhvien" value="<?php echo $rows['sdt_thanhvien'];?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Địa chỉ</label>
				<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> type="text" name="dc_thanhvien" value="<?php echo $rows['dc_thanhvien'];?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Phân quyền</label>
				<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> type="number" min="0" max="1" name="quyen_thanhvien" value="<?php echo $rows['quyen_thanhvien'];?>" class="form-control">
			</div>



			
			<input <?php if ($_SESSION['role']!=1) {
					echo "disabled";
				}?> type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
				<center>
					<?php 
							if ($_SESSION['role'] == '1') {
								echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn xóa thành viên '.$rows['ten_thanhvien'].'?'.'&#39'.');" href="sp.php?page_layout=xoa_thanhvien&id='.$rows['id_thanhvien'].'"';
							}
						 ?>
					    <button <?php if ($_SESSION['role'] != '1') {
							echo "disabled";
						} ?> type="button" class="btn btn-danger">Xóa thành viên</span></button>

						<?php 
							if ($_SESSION['role'] == '1') {
								echo '</a>'; 

							}
						 ?>
				</center>
		</form>
		<hr>