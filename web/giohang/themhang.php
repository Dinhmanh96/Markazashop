<?php
	session_start();
	//$_SESSION['giohang']['id'] = so_luong
	$id_sp = $_GET['id_sp'];
	if(isset($_SESSION['giohang'][$id_sp])){
		$_SESSION['giohang'][$id_sp] += 1;
	}else{
		$_SESSION['giohang'][$id_sp] = 1;
	}
	// echo count($_SESSION['giohang']);
	header("location: ../../index.php?page_layout=thongtinsanpham&id_sp=$id_sp");
?>