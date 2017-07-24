<?php

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}

	$rowsPerPage = 10;
	$perRow = $page*$rowsPerPage - $rowsPerPage;
	include_once'connect/ketnoi.php';
	$sql = "SELECT * FROM thanhvien";
	$query = mysqli_query($conn,$sql);

	$totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM thanhvien ORDER BY id_thanhvien DESC LIMIT $perRow, $rowsPerPage")) ;
 	$totalPages = ceil($totalRows/$rowsPerPage);
 	
 	$listPage = '';
 	for($i = 1; $i<= $totalPages; $i++){

 		if($page == $i){
 			$listPage .='<span style="background-color: #06b9a6; color: #fff;">'.$i.'</span>';
 		}
 		else{
 			$listPage .= '<a href="sp.php?page_layout=sp&page='.$i.'">'.$i.'</a>';
 		}
 	}



?>

<hr>
		<div style="float: right; padding-bottom: 10px;">
			<a href="sp.php?page_layout=add_thanhvien">
			<button type="button" class="btn btn-primary">
	         	<span class="glyphicon glyphicon-plus-sign"></span> Thêm
	         </button>
	        </a>
        </div>


		<table class="table table-hover">
			<thead>
				<tr>
					<th width="5%" style="text-align:center;">ID</th>
					<!-- <th width="10%">Username</th> -->
					<!-- <th width="10%">Password</th> -->
					<th width="15%">Tên thành viên</th>
					<th width="15%">Email</th>
					<th width="15%">Phone</th>
					<th width="15%">Address</th>
					<th width="5%">Quyền</th>
					<th width="5%" style="text-align:center;">Sửa</th>
					<th width="5%" style="text-align:center;">Xóa</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($rows = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td style="text-align:center;"><?php echo $rows['id_thanhvien']; ?></td>					
					<td><?php echo $rows['ten_thanhvien']; ?></td>
					<td><?php echo $rows['email_thanhvien']; ?></td>
					<td><?php echo $rows['sdt_thanhvien']; ?></td>
					<td><?php echo $rows['dc_thanhvien']; ?></td>
					<td><?php echo $rows['quyen_thanhvien']; ?></td>
					
					<td style="text-align:center;">
						<a href="sp.php?page_layout=edit_thanhvien&id=<?php echo $rows['id_thanhvien']; ?>">
							<button type="button" class="btn btn-primary" >
								<span class="glyphicon glyphicon-pencil"></span>
							</button>
						</a>
					</td>
					<td style="text-align:center;">
						<?php 
							if ($_SESSION['role'] == '1') {
								echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn xóa thành viên '.$rows['ten_thanhvien'].'?'.'&#39'.');" href="sp.php?page_layout=xoa_thanhvien&id='.$rows['id_thanhvien'].'"';
							}
						 ?>
					    <button <?php if ($_SESSION['role'] != '1') {
							echo "disabled";
						} ?> type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>

						<?php 
							if ($_SESSION['role'] == '1') {
								echo '</a>'; 

							}
						 ?>
					</td>
				</tr>
			<?php
				}  
			?>
				
			</tbody>
		</table>

		<center>
			<nav>
					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<li><?php echo $listPage?></a></li>
						
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
					</ul>
			</nav>
		</center>	