<?php 
include("connect/ketnoi.php");

if (isset($_GET['code_order'])) {
	$code_order = $_GET['code_order'];
	$sql = "SELECT * FROM ordercontent WHERE code_order = '$code_order'";
	$query  = mysqli_query($conn,$sql);

	while ($rows = mysqli_fetch_array($query)) {
		$id_sp = $rows['id_sp'];
		$sl_sp = $rows['sl_sp'];

		$sql1 = "SELECT * FROM sp WHERE id_sp = $id_sp";
		$query1 = mysqli_query($conn,$sql1);
		$rows1 = mysqli_fetch_array($query1);
		$rs = $rows1['sl_sp'];
		$sl_sp += $rs;

		$sql2 = "UPDATE sp SET sl_sp = $sl_sp WHERE id_sp = $id_sp";
		$query2 = mysqli_query($conn,$sql2);
	}

	$sql3 = "UPDATE orderlist SET status = 'Đã hủy' WHERE code_order = '$code_order'";
	$query3 = mysqli_query($conn,$sql3);

	header("location:sp.php?page_layout=order");
}else {
	header("location:sp.php?page_layout=order");
}

?>