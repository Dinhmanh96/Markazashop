<?php
	if(isset($_GET['code_order'])){
		$code_order = $_GET['code_order'];
		include_once('connect/ketnoi.php');

		$sqllist = "SELECT * FROM orderlist WHERE code_order = '$code_order'";
		$querylist = mysqli_query($conn,$sqllist);
		$total  =mysqli_num_rows($querylist);
		if($total>0){
			while ($rowlist = mysqli_fetch_array($querylist)) {
				$rslist = $rowlist['confirm'];
				if($rslist == "Awaiting confirmation") {
					$sql1 = "SELECT * FROM ordercontent WHERE code_order = '$code_order'";
					$query1 = mysqli_query($conn,$sql1);

					while ($rows = mysqli_fetch_array($query1)) {
						$rs  = $rows['id_sp'];
						$sql2 = "SELECT * FROM sp WHERE id_sp = $rs";
						$query2 = mysqli_query($conn,$sql2);
						while ($rowsp = mysqli_fetch_array($query2)) {
						$buy = $rowsp['buy'] + $rows['sl_sp'];
						$sql3 = "UPDATE sp SET buy = '$buy' WHERE id_sp = '$rs'";
						$query3 = mysqli_query($conn,$sql3);
						}
					}
				}
			}
			$sql = "UPDATE orderlist SET confirm = 'Confirmed' WHERE code_order = '$code_order'";
			$query = mysqli_query($conn,$sql);
		
			include_once('confirm_success.php');

		}else{
			include_once('confirm_fail.php');
		}
	}
?>