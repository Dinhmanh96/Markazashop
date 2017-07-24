<?php
if(isset($_GET['id_dmt'])){
	$id_dmt = $_GET['id_dmt'];

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}

	$rowsPerPage = 20;
	$perRow = $page*$rowsPerPage - $rowsPerPage;
			// include_once('../../connect/ketnoi.php');

	if(isset($_GET['filter'])){
		$filter  = $_GET['filter'];
		if($filter=="tc"){
			$sql = "SELECT * FROM sp WHERE id_dmt = $id_dmt ORDER BY gia_sp DESC LIMIT $perRow, $rowsPerPage";
		}else{
			$sql = "SELECT * FROM sp WHERE id_dmt = $id_dmt ORDER BY gia_sp ASC LIMIT $perRow, $rowsPerPage";
		}
		
	}else{
		$sql = "SELECT * FROM sp WHERE id_dmt = $id_dmt LIMIT $perRow, $rowsPerPage";
	}
	
	$query = mysqli_query($conn,$sql);

	$sql1 = "SELECT * FROM dmt WHERE id_dmt = $id_dmt";
	$query1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($query1);
	$rs = $row1['ten_dmt'];

	$totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sp WHERE id_dmt = $id_dmt")) ;
	$totalPages = ceil($totalRows/$rowsPerPage);
	
	$listPage = '';
	for($i = 1; $i<= $totalPages; $i++){

		if($page == $i){
			$listPage .='<span style="background-color: #06b9a6; color:#fff;">'.$i.'</span>';
		}
		else{
			$listPage .= '<a href="sp.php?page_layout=sp&id_dmt='.$id_dmt.'&page='.$i.'">'.$i.'</a>';
		}
	} 	
}
elseif(isset($_GET['id_dmn'])){
	$id_dmn = $_GET['id_dmn'];
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}

	$rowsPerPage = 20;
	$perRow = $page*$rowsPerPage - $rowsPerPage;
			// include_once('../../connect/ketnoi.php');
	if(isset($_GET['filter'])){
		$filter  = $_GET['filter'];
		if($filter=="tc"){
			$sql = "SELECT * FROM sp WHERE id_dmn = $id_dmn ORDER BY gia_sp DESC LIMIT $perRow, $rowsPerPage";
		}else{
			$sql = "SELECT * FROM sp WHERE id_dmn = $id_dmn ORDER BY gia_sp ASC LIMIT $perRow, $rowsPerPage";
		}
		
	}else{
		$sql = "SELECT * FROM sp WHERE id_dmn = $id_dmn LIMIT $perRow, $rowsPerPage";
	}
	$query = mysqli_query($conn,$sql);

	$sql1 = "SELECT * FROM dmn WHERE id_dmn = $id_dmn";
	$query1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($query1);
	$rs = $row1['ten_dmn'];

	$totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sp WHERE id_dmn = $id_dmn")) ;
	$totalPages = ceil($totalRows/$rowsPerPage);
	
	$listPage = '';
	for($i = 1; $i<= $totalPages; $i++){

		if($page == $i){
			$listPage .='<span style="background-color: #06b9a6; color:#fff;">'.$i.'</span>';
		}
		else{
			$listPage .= '<a href="sp.php?page_layout=sp&id_dmn='.$id_dmn.'&page='.$i.'">'.$i.'</a>';
		}
	}
}else{
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}

	$rowsPerPage = 10;
	$perRow = $page*$rowsPerPage - $rowsPerPage;

	include_once'connect/ketnoi.php';
	$sql = "SELECT * FROM sp ORDER BY id_sp DESC LIMIT $perRow, $rowsPerPage";
	$query = mysqli_query($conn,$sql);

	$totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sp")) ;
	$totalPages = ceil($totalRows/$rowsPerPage);
	
	$listPage = '';
	for($i = 1; $i<= $totalPages; $i++){

		if($page == $i){
			$listPage .='<span style="background-color: #06b9a6; color:#fff;">'.$i.'</span>';
		}
		else{
			$listPage .= '<a href="sp.php?page_layout=sp&page='.$i.'">'.$i.'</a>';
		}
	}
}
?>
<span style="background-color: red;"></span>

<hr>
<div style="float: right; padding-bottom: 10px;">
	<a href="sp.php?page_layout=add_sp">
		<button type="button" class="btn btn-primary">
			<span class="glyphicon glyphicon-plus-sign"></span> Thêm
		</button>
	</a>
</div>

<table class="table table-hover table-striped table-responsive">
	<thead>
		<tr>
			<th width="5%" style="text-align:center;">ID</th>
			<th width="10%" style="text-align:center;">Tên sản phẩm</th>
			<th width="12" style="text-align:center;">Danh mục</th>
			<th width="5%" style="text-align:center;">Giá (VNĐ)</th>
			<th width="10%" style="text-align:center;">Bảo hành</th>
			<th width="10%" style="text-align:center;">Thương hiệu</th>
			<th width="8%" style="text-align:center;">Chỉ số</th>
			<th width="5%" style="text-align:center;">Số lượng</th>
			<th width="10%" style="text-align:center;">Ảnh</th>
			<th width="15%" style="text-align:center;">Chi tiết</th>
			<th width="5%" style="text-align:center;">Sửa</th>
			<th width="5%" style="text-align:center;">Xóa</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($rows = mysqli_fetch_array($query)) {
			?>
			<tr>
				<td style="text-align:center;"><?php echo $rows['id_sp']; ?></td>
				<td><?php echo $rows['ten_sp']; ?></td>
				<td style="text-align:center;">
					<?php $id_dmn=$rows['id_dmn'];?>
					<?php 
					$sql2 = "SELECT ten_dmn FROM dmn WHERE id_dmn = $id_dmn ";
					$query2 = mysqli_query($conn,$sql2);
					$rs = mysqli_fetch_assoc($query2);
					echo $rs['ten_dmn'];
					?>
				</td>
				<td style="text-align:right;"><?php echo number_format($rows['gia_sp'],0,',','.') ?></td>
				<td style="text-align:center;"><?php echo $rows['bh_sp']; ?></td>
				<td style="text-align:center;"><?php echo $rows['th_sp']; ?></td>
				<td style="text-align:center;"><?php echo $rows['cs_sp']; ?></td>
				<td style="text-align:center;"><?php echo $rows['sl_sp']; ?></td>
				<td style="text-align:center;"><img src="../image/Source/<?php echo $rows['anh_sp']; ?>" class="img"></td>
				<td style="font-size: 11px;"><?php echo $rows['chitiet_sp']; ?></td>
				<td style="text-align:center;">
					<a href="sp.php?page_layout=edit_sp&id=<?php echo $rows['id_sp']; ?>">
						<button type="button" class="btn btn-primary" >
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
					</a>
				</td>
				<td style="text-align:center;">
					<?php 
					if ($_SESSION['role'] == '1') {
						echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn xóa sản phẩm ID='.$rows['id_sp'].' ?&#39'.');" href="sp.php?page_layout=xoa_sp&id='.$rows['id_sp'].'"';
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
				<a href="<?php
				if($page==1){
					echo "";
				}
				else{
					$pagenext = $page-1;
					if(isset($_GET['id_dmn'])){
						echo 'sp.php?page_layout=sp&id_dmn='.$id_dmn.'&page='.$pagenext;
					}elseif (isset($_GET['id_dmt'])) {
						echo 'sp.php?page_layout=sp&id_dmt='.$id_dmt.'&page='.$pagenext;
					}else{
						echo 'sp.php?page_layout=sp&page='.$pagenext;
					}
				}
				?>" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			</a>
		</li>

		<li><?php echo $listPage?></a></li>		
		<li>
			<a href="<?php
			if($page==$totalPages){
				echo "";
			}
			else{
				$pagenext = $page+1;
				if(isset($_GET['id_dmn'])){
					echo 'sp.php?page_layout=sp&id_dmn='.$id_dmn.'&page='.$pagenext;
				}elseif (isset($_GET['id_dmt'])) {
					echo 'sp.php?page_layout=sp&id_dmt='.$id_dmt.'&page='.$pagenext;
				}else{
					echo 'sp.php?page_layout=sp&page='.$pagenext;
				}
			}
			?>" aria-label="Previous">
			<span aria-hidden="true">&raquo;</span>
			<span class="sr-only">Previous</span>
		</a>
	</li>
</ul>
</nav>
</center>	