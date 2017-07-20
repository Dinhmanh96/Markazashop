<?php
			include_once('render_code.php');
			$code_order = rand_string(20);
?>
<?php
if(isset($_SESSION['giohang'])){
	$arrId = array();
	foreach($_SESSION['giohang'] as $id_sp=>$sl){
		$arrId[] = $id_sp;
	}
	$strId = implode(', ', $arrId);
	$sql = "SELECT * FROM sp WHERE id_sp IN($strId) ORDER BY id_sp DESC";
	$query = mysqli_query($conn,$sql);	

?>		
			<center><p><h3 style="color: #00aeac; padding-top: 50px;">Đơn hàng của tôi</h3></p></center>
			<hr>
			<div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="45%">Tên Sản phẩm</th>
		                    <th width="20%">Giá</th>
		                    <th width="15%">Số lượng</th>
		                    <th width="20%">Thành tiền</th>
		                </tr>
					</thead>
					<tbody>
						<?php
						$totalPriceAll = 0;
						while ($rows = mysqli_fetch_array($query)) {
						$totalPrice = $rows['gia_sp']*$_SESSION['giohang'][$rows['id_sp']];
						?>

						<tr>
							<td><?php echo $rows['ten_sp']?></td>
							<td><?php echo number_format($rows['gia_sp'],0,',','.') ?></td>
							<td><?php echo $_SESSION['giohang'][$rows['id_sp']];?></td>
							<td><?php echo number_format($totalPrice,0,',','.') ?></td>
						</tr>

						<?php
						$totalPriceAll += $totalPrice;
						}
						?>
						
						<tr>
		                	<td class="prd-name" style="color: #1bbc9b; font-size: 16px;padding-top: 30px;"><b>Tổng giá trị hóa đơn là:</b></td>
		                    <td colspan="2"></td>
		                    <td class="prd-total" style="padding-top: 30px;font-size: 16px;"><span><b><?php echo number_format($totalPriceAll,0,',','.') ?> VNĐ</b></span></td>
		            	</tr>
					</tbody>
				</table>
			</div>
			<?php
    if(isset($_POST['submit'])){
		if($_POST['ten'] == ''){
			$error_ten = '<span>(*)</span>';
		}
		else{
			$ten = 	$_POST['ten'];
		}
		
		if($_POST['mail'] == ''){
			$error_mail = '<span>(*)</span>';
		}
		else{
			$mail = 	$_POST['mail'];
		}
		
		if($_POST['dt'] == ''){
			$error_dt = '<span>(*)</span>';
		}
		else{
			$dt = 	$_POST['dt'];
		}
		
		if($_POST['dc'] == ''){
			$error_dc = '<span>(*)</span>';
		}
		else{
			$dc = 	$_POST['dc'];
		}
		
		// Xử lý mua hàng và gửi mail xác nhận
		if(isset($ten) && isset($mail) && isset($dt) && isset($dc)){
			
			if(isset($_SESSION['giohang'])){


				$arrId = array();
				foreach($_SESSION['giohang'] as $id_sp=>$sl){
				$arrId[] = $id_sp;
				}
				$strId = implode(', ', $arrId);
				$sql = "SELECT * FROM sp WHERE id_sp IN($strId) ORDER BY id_sp DESC";
				$query = mysqli_query($conn,$sql);
			}
						
			$strBody = '';
			// Thông tin Khách hàng
			$strBody = '<html>
			<head>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
						
			</head>
			<body>
						<p>
							<b>Khách hàng:</b> '.$ten.'<br />
							<b>Email:</b> '.$mail.'<br />
							<b>Điện thoại:</b> '.$dt.'<br />
							<b>Địa chỉ:</b> '.$dc.'
						</p>
						<p>Truy cập link: <a href="http://markaza.hol.es/index.php?page_layout=confirm&code_order='.$code_order.'">http://markaza.hol.es/index.php?page_layout=confirm&code_order='.$code_order.'</a> để xác nhận đơn hàng</p>';
			// Danh sách Sản phẩm đã mua
			$strBody .= '<div class="container">
							<table class="table table-striped" border="1px solid #fff" cellpadding="10px" cellspacing="1px" width="100%">
								<thead>
								<tr>
									<td align="center" bgcolor="#00aeac" colspan="4"><font color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
								</tr>
								<tr id="invoice-bar">
									<td style="color: #01b9b7" width="45%"><b>Tên Sản phẩm</b></td>
									<td style="color: #01b9b7" width="20%"><b>Giá</b></td>
									<td style="color: #01b9b7" width="15%"><b>Số lượng</b></td>
									<td style="color: #01b9b7" width="20%"><b>Thành tiền</b></td>
								</tr>
								</thead>';
			
			$totalPriceAll = 0;
			while($row = mysqli_fetch_array($query)){
				$totalPrice = $row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];
					
					$strBody .= '<tbody>
								<tr>
									<td style="color: #01b9b7" class="prd-name">'.$row['ten_sp'].'</td>
									<td style="color: #01b9b7" class="prd-price"><font color="#C40000">'.$row['gia_sp'].' VNĐ</font></td>
									<td style="color: #01b9b7" class="prd-number">'.$_SESSION['giohang'][$row['id_sp']].'</td>
									<td style="color: #01b9b7" class="prd-total"><font color="#C40000">'.$totalPrice.' VNĐ</font></td>
								</tr>';
			
			$totalPriceAll += $totalPrice;
			}
			
					$strBody .= '<tr>
									<td style="color: #01b9b7" class="prd-name"><b>Tổng giá trị hóa đơn là:<b></td>
									<td colspan="2"></td>
									<td class="prd-total"><b><font color="#C40000">'.$totalPriceAll.' VNĐ</font></b></td>
								</tr>
								</tbody>
							</table>

							</div>';
					
					$strBody .= '<p align="justify">
									<b>Quý khách đã đặt hàng thành công!</b><br />
									• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
									• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
									<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của MarKaza!</b>
								</p>
								</body>
								</html>';
			
			// Thiết lập SMTP Server
			// include_path = ".;C:\wamp\php4\PEAR";
			require("PHPMailer-master/PHPMailerAutoload.php"); // nạp thư viện
			$mailer = new PHPMailer(); // khởi tạo đối tượng
			$mailer->IsSMTP(); // gọi class smtp để đăng nhập
			$mailer->CharSet="utf-8"; // bảng mã unicode
			
			//Đăng nhập Gmail
			$mailer->SMTPAuth = true; // Đăng nhập
			$mailer->SMTPSecure = "ssl"; // Giao thức SSL
			$mailer->Host = "smtp.gmail.com"; // SMTP của GMAIL
			$mailer->Port = 465; // cổng SMTP
			
			// Phải chỉnh sửa lại
			$mailer->Username = "dinhmanh96@gmail.com"; // GMAIL username
			$mailer->Password = "manh9896"; // GMAIL password
			$mailer->AddAddress($mail, $ten); //email người nhận
			$mailer->AddCC("20146475@student.hust.edu.vn", "Admin MarKaza Shop"); // gửi thêm một email cho Admin
			 
			// Chuẩn bị gửi thư nào
			$mailer->FromName = 'MarKaza Shop'; // tên người gửi
			$mailer->From = 'dinhmanh96@gmail.com'; // mail người gửi
			$mailer->Subject = 'Confirm order MarKaza';
			$mailer->IsHTML(TRUE); //Bật HTML không thích thì false
			 
			// Nội dung lá thư
			$mailer->Body = $strBody;
			 
			// Gửi email 
			if(!$mailer->Send()){
				// Gửi không được, đưa ra thông báo lỗi
			 	echo "Lỗi gửi Email: " . $mailer->ErrorInfo;
			}
			else{	
				$time_order = gmdate("Y-m-d H:i:s",time()+7*3600); 
				$sql1 = "INSERT INTO orderlist(code_order,name_customer,mail_customer,sdt,address,date_order,status,pay,confirm)VALUES('$code_order','$ten','$mail','$dt','$dc','$time_order','Chưa giao','Chưa đặt cọc','Awaiting confirmation')";
				$query = mysqli_query($conn,$sql1);

				$arrId = array();
				foreach($_SESSION['giohang'] as $id_sp=>$sl){
					$arrId[] = $id_sp;
					$sqladdorder = "INSERT INTO ordercontent(id_sp,sl_sp,code_order)VALUES('$id_sp','$sl','$code_order')";
					$query1 = mysqli_query($conn,$sqladdorder);

					// Lấy số lượng hiện tại của sản phẩm
					$sqlsl = "SELECT * FROM sp WHERE id_sp = $id_sp";
					$querysl = mysqli_query($conn,$sqlsl);
					$rowsl = mysqli_fetch_array($querysl);
					$rowsl1 = $rowsl['sl_sp'];
					// Trừ số lượng sản phẩm
					$sl_new = $rowsl1 - $sl;

					// Update số lượng sản phẩm mới
					$sqlupdate = "UPDATE sp SET sl_sp = $sl_new WHERE id_sp = $id_sp";
					$queryupdate = mysqli_query($conn,$sqlupdate);
				}
				unset($_SESSION['giohang']);	
				header("location:index.php?page_layout=thanhtoanthanhcong&mail=$mail");
			}
		}	
	}
	?>
			<form class="form-group" method="post">

				<label class="form_info">Họ và tên</label>
				<input type="text" name="ten" class="form-control" style="width: 30%" required><br>
				<label class="form_info">Số điện thoại</label>
				<input type="text" name="dt" class="form-control" style="width: 30%" required><br>
				<label class="form_info" >Email</label>
				<input type="email" name="mail" class="form-control" style="width: 30%" required><br>
				<label class="form_info" >Địa chỉ người nhận</label>
				<input type="text" name="dc" class="form-control" style="width: 30%" required><br>
				<center><button type="submit" name="submit" class="btn btn-primary" style="margin-left: 330px; width: 400px;">Đặt hàng</button></center>
			</form>
			<hr>
<?php
}else{
	include_once('web/giohang/emptycart.php');
}
?>