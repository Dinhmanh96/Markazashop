<?php
	if(isset($_POST['search_input'])){
		if($_POST['search_input'] !==""){
		$search_input = $_POST['search_input'];
		// unset($_COOKIE['search_input']);
		// echo $_COOKIE['search_input'];
		setcookie("search_input","$search_input",time() + 3600);
		}else{
			header("location: index.php");
		}
	}elseif (isset($_GET['search_input'])) {
		$search_input = $_GET['search_input'];
	}else{
		header("location: index.php");
	}
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		}else{
			$page =1;
		}

	$rowsPerPage = 20;
	$perRow = $page*$rowsPerPage - $rowsPerPage;
	$new_search_input = str_replace(" ", "%", $search_input);

	if (isset($_GET['filter'])) {
		$filter = $_GET['filter'];
		if ($filter === "tc") {
			$sql = "SELECT * FROM sp WHERE ten_sp LIKE '%$search_input%' OR th_sp like '%$search_input%' ORDER BY gia_sp DESC LIMIT $perRow, $rowsPerPage";
		}else{
			$sql = "SELECT * FROM sp WHERE ten_sp LIKE '%$search_input%' OR th_sp like '%$search_input%' ORDER BY gia_sp ASC LIMIT $perRow, $rowsPerPage";
		}
	}else{
		$sql = "SELECT * FROM sp WHERE ten_sp LIKE '%$search_input%' OR th_sp like '%$search_input%' ORDER BY id_sp DESC LIMIT $perRow, $rowsPerPage";
	}
	
	$query = mysqli_query($conn,$sql);
	

	$totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sp WHERE ten_sp LIKE '%$search_input%' OR th_sp like '%$search_input%'"));
 	$totalPages = ceil($totalRows/$rowsPerPage);
 	
 	$listPage = '';
 	for($i = 1; $i<= $totalPages; $i++){

 		if($page == $i){
 			$listPage .='<span style="background-color: #06b9a6; color:#fff;">'.$i.'</span>';
 		}
 		else{
 			$listPage .= '<a href="index.php?page_layout=timkiem&search_input='.$_COOKIE['search_input'].'&page='.$i.'">'.$i.'</a>';
 		}
 	}
?>
<hr>

<?php
	if($totalRows==0){
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
			include_once('web/timkiem/timkiem_content_result.php');
		}
?>
	