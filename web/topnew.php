<?php
	$sqlview = "SELECT * FROM sp ORDER BY id_sp DESC LIMIT 15";
	$queryview  = mysqli_query($conn,$sqlview);
?>

<div class="panel panel-default panel-slide panel-new" >
  <div style="background-color: #00b3b3; height: 40px; border-radius: 0px;" class="panel-heading">
		<span class="title" style="color: #fff; font-size: 16px;">Top sản phẩm mới nhất</span>
		<span style="float: right;" class="title-child" >
			<button type="button" class="btn btn-xs slick-prev" style="background-color: #fff">
				<i class="fa fa-angle-left"></i>
			</button>

			<button type="button" class="btn btn-xs slick-next" style="background-color: #fff">
				<i class="fa fa-angle-right"></i>
			</button>
		</span>
  </div>
  <div id="demo" class="panel-body collapse in">
    <div class="row pack-data">
    <?php
    	while ($rowsview = mysqli_fetch_array($queryview)) {
    	?>
    		<a href="index.php?page_layout=thongtinsanpham&id_sp=<?php echo $rowsview['id_sp'] ;?>">
			<div class="pack production" style="border: solid 1px #f9f6f6;">
				<img style="padding-left: 10%;" src="image/Source/<?php echo $rowsview['anh_sp']?>" alt="" width=90%>
				<div class="pack-row">
					<div>
						<p style="padding: 10px 0px 10px 10%; color: #000; max-width: 90%;	white-space: nowrap;	overflow: hidden; text-overflow: ellipsis;"><?php echo $rowsview['ten_sp']?></p>
						<span style="padding: 10px 0px 0px 10%;" class="price-production"><b><?php echo number_format($rowsview['gia_sp'],0,',','.') ?>VND</b></span>
					</div>
				</div>
			</div>
			</a>
    	<?php
    	}
    ?>
	</div>
  </div>
  <div class="panel-footer text-right">
  	<center><a href="index.php?page_layout=topnew"><button type="button" class="btn btn-primary">Xem thêm >></button></a></center>
  </div>
</div>
			