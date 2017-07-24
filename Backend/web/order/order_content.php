<?php

if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page =1;
}

$rowsPerPage = 10;
$perRow = $page*$rowsPerPage - $rowsPerPage;
include_once'connect/ketnoi.php';

if (isset($_POST['submit_day'])) {
	$today = gmdate("Y-m-d H:i",time()+7*3600);
	$time_today = gmdate("d H:i",time()+7*3600);
	// echo "$time_today";
	$day = $_POST['day'];
	// echo "\n";
	$set= $time_today-$day;
	$day_new = gmdate("Y-m-$set H:i",time()+7*3600);
	// echo "$day_new";
	// echo "\n";
	// $rss =strtotime($today) - strtotime($day_new);
	// echo "$rss";
	$sql = "SELECT * FROM orderlist WHERE date_order <= '$day_new' AND pay='Chưa đặt cọc'  ORDER BY id_order DESC LIMIT $perRow, $rowsPerPage";
	$totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orderlist WHERE date_order <= '$day_new'  AND pay='Chưa đặt cọc'")) ;
}else{
	$sql = "SELECT * FROM orderlist ORDER BY id_order DESC LIMIT $perRow, $rowsPerPage";
	$totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orderlist")) ;
}

// $sql = "SELECT * FROM orderlist ORDER BY id_order DESC LIMIT $perRow, $rowsPerPage";
$query = mysqli_query($conn,$sql);


$totalPages = ceil($totalRows/$rowsPerPage);

$listPage = '';
for($i = 1; $i<= $totalPages; $i++){

	if($page == $i){
		$listPage .='<span style="background-color: #06b9a6; color:#fff;">'.$i.'</span>';
	}
	else{
		$listPage .= '<a href="sp.php?page_layout=order&page='.$i.'">'.$i.'</a>';
	}
}
?>
<span style="background-color: red;"></span>

<hr>

<form class="form-inline" enctype="multipart/form-data" method="post">
 <div class="form-group">
    <label >Lọc đơn hàng (chưa đặt cọc) quá:</label>
    <input type="number" class="form-control" name="day" placeholder="Nhập số ngày"> <b>(ngày)</b>
    <button type="submit" name="submit_day" class="btn btn-primary btn-sm">Lọc</button>
  </div>
	
</form>
<table class="table table-hover table-striped table-responsive" style="margin-top: 30px;">
	<thead>
		<tr>
			<th width="3%" class="text-center">ID</th>
			<th width="7%" class="text-center">Mã đơn hàng</th>
			<th width="15%" class="text-center">Ngày đặt</th>
			<th width="15%" >Tên khách hàng</th>
			<th width="10%" class="text-center">Số điện thoại</th>
			<th width="10%" class="text-center">Tình trạng</th>
			<th width="10%" class="text-center">Đặt cọc</th>
			<th width="10%" class="text-center">Xác nhận</th>
			<th width="5%" style="text-align:center; ">Chi tiết</th>
			<th width="5%" style="text-align:center; ">Hủy</th>
			<th width="5%" style="text-align:center; ">Đã CK</th>
			<th width="5%" class="text-center">Xóa</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($rows = mysqli_fetch_array($query)) {
			?>	
			<?php
			if($rows['confirm'] == 'Awaiting confirmation'){
				?>
				<tr class="danger">
					<?php
				}else{
					echo '<tr>';
				}
				?>
				<td class="text-center"><?php echo $rows['id_order']; ?></td>
				<td style="text-align:center; font-size: 11px"><?php echo $rows['code_order']; ?></td>
				<td style="text-align:center; font-size: 11px"><?php echo $rows['date_order'];?></td>
				<td ><?php echo $rows['name_customer']; ?></td>
				<td class="text-center"><?php echo $rows['sdt']; ?></td>
				<td class="text-center"><?php echo $rows['status']; ?></td>
				<td class="text-center"><?php if($rows['pay']=="Chưa đặt cọc"){
					echo '<span style="color:red">'.$rows['pay'].'</span>';
				}else{ 
					// echo $rows['confirm'];
					echo ' <img style="padding-bottom: 10px" src ="../image/yes.png" with ="5px" height ="auto">';
				}?></td>
				<td style="text-align:center; font-size: 11px"><?php if($rows['confirm']=="Awaiting confirmation"){
					echo '<span style="color:red">'.$rows['confirm'].'</span>';
				}else{ 
					// echo $rows['confirm'];
					echo ' <img style="padding-bottom: 10px" src ="../image/yes.png" with ="5px" height ="auto">';
				} ?></td>
				<td class="text-center">
					<a href="sp.php?page_layout=thongtindonhang&id_order=<?php echo $rows['id_order']; ?>">
						<button type="button" class="btn btn-primary btn-sm" >
							<span class="glyphicon glyphicon-list-alt"></span>
						</button>
					</a>
				</td>

				<td class="text-center">
					<?php 
					if ($rows['status'] != 'Đã hủy') {
						echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn hủy đơn hàng ID = '.$rows['id_order'].' ? &#39'.');" href="sp.php?page_layout=huydonhang&code_order='.$rows['code_order'].'"';
					}
					?>
					<button <?php if ($rows['status'] === 'Đã hủy') {
						echo "disabled";
					} ?> type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>

					<?php 
					if ($_SESSION['role'] == '1') {
						echo '</a>'; 

					}
					?>

				</td>

				<td class="text-center">
					<a onclick="return confirm('Đơn hàng này Đã đặt cọc?');" href="sp.php?page_layout=pay&id=<?php echo $rows['id_order']; ?>">
						<button type="button" class="btn btn-primary btn-sm" >
							<span class="glyphicon glyphicon-ok"></span>
						</button>
					</a>
				</td>

				<td class="text-center">
					
					<?php 
					if ($_SESSION['role'] == '1') {
						echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn xóa đơn hàng ID = '.$rows['id_order'].' ? &#39'.');" href="sp.php?page_layout=xoadonhang&id='.$rows['id_order'].'"';
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
					$pageprv = $page-1;
					echo 'sp.php?page_layout=order&page='.$pageprv;	
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
				echo 'sp.php?page_layout=order&page='.$pagenext;
			}
			?>" aria-label="Previous">
			<span aria-hidden="true">&raquo;</span>
			<span class="sr-only">Previous</span>
		</a>
	</li>
</ul>
</nav>
</center>
<hr>	