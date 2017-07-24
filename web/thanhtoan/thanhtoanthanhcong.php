<?php
	if(isset($_GET['mail']) && $_GET['mail']!=''){
		$mail = $_GET['mail'];
?>
<center>
<img style="padding-top: 50px;" src="image/confirm_success.png" height="230px">
	<p><h3>Đơn hàng của bạn đã được đặt thành công!</h3></p>

	<p style="padding-top: 20px">Chúng tôi đã gửi link xác nhận vào địa chỉ thư <b><i><?php echo $mail;?></i></b>,hãy truy cập vào Email này để xác nhận đơn hàng!</p>
</center>
<hr>
<?php
}else{
	echo '<hr><center><h3 style="padding-top:120px; padding-bottom: 130px">Bạn hãy vào Giỏ hàng để mua và tiến hành đặt hàng!</h3></center><hr>';

	// include_once('web/giohang/emptycart.php');
}

?>
