<?php

include("connect/ketnoi.php");
$id = $_GET['id'];
$sql = "SELECT * FROM sp WHERE id_sp ='$id'";
$query = mysqli_query($conn,$sql);
$rows = mysqli_fetch_array($query);

$sqlDmn = "SELECT * FROM dmn";
$queryDmn = mysqli_query($conn,$sqlDmn);

if(isset($_POST['submit'])){

	$id_dmn = $_POST['id_dmn'];
	$sql1 = "SELECT id_dmt FROM dmn WHERE id_dmn = $id_dmn";
	$query1 = mysqli_query($conn,$sql1);

	$rs = mysqli_fetch_assoc($query1);

	$id_dmt = $rs['id_dmt'];

	$ten_sp = $_POST['ten_sp'];
	$gia_sp = $_POST['gia_sp'];
	$bh_sp = $_POST['bh_sp'];
	$chitiet_sp= $_POST['chitiet_sp'];
	$sl_sp = $_POST['sl_sp'];
	$th_sp = $_POST['th_sp'];
	$cs_sp = $_POST['cs_sp'];
	$view = $_POST['view'];
	$baiviet_sp = $_POST['baiviet_sp'];
	if($_FILES['anh_sp']['name'] == ''){
		$anh_sp = $_POST['anh_sp'];
	}
	else{
		$anh_sp = $_FILES['anh_sp']['name'];
		$tmp_name = $_FILES['anh_sp']['tmp_name'];
	}
	move_uploaded_file($tmp_name, '../image/Source/'.$anh_sp);
	$sql = "UPDATE sp SET id_dmt = '$id_dmt', id_dmn = '$id_dmn', ten_sp ='$ten_sp', gia_sp ='$gia_sp' , bh_sp = '$bh_sp', chitiet_sp = '$chitiet_sp', anh_sp = '$anh_sp', th_sp = '$th_sp', sl_sp = '$sl_sp', cs_sp = '$cs_sp', view = '$view', baiviet_sp='$baiviet_sp' WHERE id_sp = '$id'";
	$query = mysqli_query($conn,$sql);
	header("location:sp.php");
} 
?>

<?php
include_once'connect/ketnoi.php';
$sql = "SELECT * FROM sp";
$query = mysqli_query($conn,$sql);

?>
<hr>
<form enctype="multipart/form-data" method="post">

	<div class="form-group">
		<label for="">ID Danh mục</label>

		<select class="form-control" name="id_dmn">
			<?php
			while ($rowDmn = mysqli_fetch_array($queryDmn)) {
				?>
				<option <?php if($rows['id_dmn'] == $rowDmn['id_dmn']){echo "selected='selected'";} ?> value="<?php echo $rowDmn['id_dmn']?>"  ><?php echo $rowDmn['ten_dmn']?>

					<?php
				}
				?>
			</select>		
		</div>
		
		<div class="form-group">
			<label for="">Tên sản phẩm</label>
			<input type="text" name="ten_sp" value="<?php echo $rows['ten_sp'];?>" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Giá sản phẩm</label>
			<input type="text" name="gia_sp" value="<?php echo $rows['gia_sp'];?>" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Bảo hành</label>
			<input type="text" name="bh_sp" value="<?php echo $rows['bh_sp'];?>" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Ảnh</label>
			<input type="file" name="anh_sp" class="form-control">
			<input type="hidden" name="anh_sp" value="<?php echo $rows['anh_sp'];?>">
		</div>

		<div class="form-group">
			<label for="">Thương hiệu</label>
			<input type="text" name="th_sp" value="<?php echo $rows['th_sp'];?>" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Số lượng</label>
			<input type="number" name="sl_sp" value="<?php echo $rows['sl_sp'];?>" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Chỉ số Q/c</label>
			<input type="number" name="cs_sp" value="<?php echo $rows['cs_sp'];?>" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Lượt view</label>
			<input type="number" readonly name="view" value="<?php echo $rows['view'];?>" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Chi tiết chính sản phẩm</label>
			<textarea rows="8" type="text" name="chitiet_sp" value="" class="form-control"><?php echo $rows['chitiet_sp'];?></textarea>
		</div>

		<div class="form-group">
			<label for="">Bài viết sản phẩm</label>
			<textarea rows="8" type="text" name="baiviet_sp" value="" class="form-control ckeditor"><?php echo $rows['baiviet_sp'];?></textarea>
			<script type="text/javascript">
				var editor = CKEDITOR.replace('content',{
					language:'vi',
					filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
					filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
					filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
					filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				});
			</script>
		</div>

		<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
	</form>
	<center><?php 
					if ($_SESSION['role'] == '1') {
						echo '<a onclick="return confirm('.'&#39'.'Bạn có muốn xóa sản phẩm ID='.$rows['id_sp'].' ?&#39'.');" href="sp.php?page_layout=xoa_sp&id='.$rows['id_sp'].'"';
					}
					?>
					<button <?php if ($_SESSION['role'] != '1') {
						echo "disabled";
					} ?> type="button" class="btn btn-danger">Xóa sản phẩm</span></button>

					<?php 
					if ($_SESSION['role'] == '1') {
						echo '</a>'; 

					}
					?></center>
	<hr>