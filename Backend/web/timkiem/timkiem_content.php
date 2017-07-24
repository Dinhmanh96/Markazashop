<?php
	
	if(isset($_POST['search_input'])){
		$search_input  =$_POST['search_input'];
	}else{
		$search_input = $_GET['search_input'];
	}

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		}else{
			$page =1;
	}

	$rowsPerPage = 20;
	$perRow = $page*$rowsPerPage - $rowsPerPage;
	$new_search_input = trim($search_input);
	// $new_search_input = str_replace(" ", "%", $search_input);

	// Tìm kiếm trong Đơn hàng
	$sql = "SELECT * FROM orderlist WHERE sdt LIKE '%$new_search_input%' OR code_order LIKE '%$new_search_input%' OR name_customer LIKE '%$new_search_input%' ORDER BY id_order DESC LIMIT $perRow, $rowsPerPage";
	$query = mysqli_query($conn,$sql);

	// Tìm kiếm trong sản phẩm
	$sqlsp =  "SELECT * FROM sp WHERE ten_sp LIKE '%$new_search_input%' OR th_sp LIKE '%$new_search_input%' OR chitiet_sp LIKE '%$new_search_input%'";
	$querysp = mysqli_query($conn,$sqlsp);
	$totalRowssp = mysqli_num_rows($querysp);
	
	// Tìm kiếm trong thành viên
	$sqltv =  "SELECT * FROM thanhvien WHERE ten_thanhvien LIKE '%$new_search_input%' OR email_thanhvien LIKE '%$new_search_input%' OR dc_thanhvien LIKE '%$new_search_input%' OR sdt_thanhvien LIKE '%$new_search_input%'";
	$querytv = mysqli_query($conn,$sqltv);
	$totalRowstv = mysqli_num_rows($querytv);
	
 	
 	$sql1 = "SELECT * FROM orderlist";
	$query1 = mysqli_query($conn,$sql1);

	$totalRows1 = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orderlist WHERE sdt LIKE '%$new_search_input%' OR code_order LIKE '%$new_search_input%' OR name_customer LIKE '%$new_search_input%'"));
	$totalPages1 = ceil($totalRows1/$rowsPerPage);

 	$listPage = '';
 	for($i = 1; $i<= $totalPages1; $i++){

 		if($page == $i){
 			$listPage .='<span style="background-color: #06b9a6; color:#fff;">'.$i.'</span>';
 		}
 		else{
 			$listPage .= '<a href="sp.php?page_layout=timkiem&search_input='.$search_input.'&page='.$i.'">'.$i.'</a>';
 		}
 	}
?>
<hr>

<?php
	if($totalRows1==0 && $totalRowssp==0 && $totalRowstv==0){
		echo "<center>	
				<div>
					<div style=''>
						<img src='image/search_fail_final.png' height='50px'>
					</div>
					<div class='clear'></div>
					<div><h3 style=' padding-top:8px;'>Không có kết quả nào phù hợp!</h3></div>
				
				</div>
				</center>
				<div class='clear'></div>
				<hr>";

		}else{
			echo "<h4>Kết quả tìm kiếm cho '<b style='color: #00aeac'>$search_input</b>'</h4>";
			
			include_once('web/timkiem/timkiem_content_result.php');
			echo "<hr>";
			include_once('web/sanpham/sp_content_result_search.php');
			echo "<hr>";
			include_once ('web/thanhvien/thanhvien_content_result_search.php');
		}
?>

		<hr>	