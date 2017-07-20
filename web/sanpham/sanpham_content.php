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
		 			$listPage .= '<a href="index.php?page_layout=sanpham&id_dmt='.$id_dmt.'&page='.$i.'">'.$i.'</a>';
		 		}
		 	} 	
		}
		else{
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
		 			$listPage .= '<a href="index.php?page_layout=sanpham&id_dmn='.$id_dmn.'&page='.$i.'">'.$i.'</a>';
		 		}
		 	}
		}

?>

<!-- Slide -->
			<div class="row slide" style="padding-top: 5px">
					<div class="col-xs-3 col-sm-3 col-md-3 row-no-padding banner" >
						<a href="index.php?page_layout=thongtinsanpham&id_sp=102"><img src="image/Source/76.jpg" class="img-responsive" ></a>
					</div>
					
					<div class="col-xs-9 col-sm-9 col-md-9 row-no-padding" style="padding-left: 5px">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						    <ol class="carousel-indicators">
						    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    	<li data-target="#myCarousel" data-slide-to="1"></li>
						    	<li data-target="#myCarousel" data-slide-to="2"></li>
						    </ol>

    						<div class="carousel-inner" role="listbox">
								<div class="item active">
							    	<img src="image/slide.jpg"  width="870" height="290">
							    <!-- <div class="carousel-caption"></div> -->
							    </div>

							    <div class="item">
							      	<img src="image/slide1.jpg"  width="870" height="290">
							      <!-- <div class="carousel-caption"></div> -->
							    </div>
							    
							    <div class="item">
							    	<img src="image/slide2.jpg" width="870" height="290">
							      <!-- <div class="carousel-caption"></div> -->
							    </div>
    						</div>

    						<!-- Left and right controls -->
						    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						      <span class="sr-only">Next</span>
						    </a>
  						</div>
					</div>	
			</div>
			<hr>
			<?php
			include_once('web/topdmview.php');
			?>
			
			<!-- End Slide -->
			<div class="main">
				<div class="row danhmuc">
					<div class="col-xs-9 col-sm-9 col-md-8" style="padding-top: 15px;">
						<h4><?php echo $rs?></h4>
					</div>
					<div class="col-sx-3 col-sm-3 col-md-4" style="padding-top: 8px;">
						
		                <span>Lọc:</span>
			               <a href="index.php?page_layout=sanpham&<?php if(isset($_GET['id_dmt'])){echo 'id_dmt='.$_GET['id_dmt'];}else{echo 'id_dmn='.$_GET['id_dmn']; }?>&filter=ct"><button  type="button" class="btn btn-default" style="font-size: 12px">Thấp đến cao</button></a>

			               <a href="index.php?page_layout=sanpham&<?php if(isset($_GET['id_dmt'])){echo 'id_dmt='.$_GET['id_dmt'];}else{echo 'id_dmn='.$_GET['id_dmn']; }?>&filter=tc"><button type="button" class="btn btn-default" style="font-size: 12px">Cao đến thấp</button></a>
		            	
					</div>
				</div>

				<center>

				<div class="list_production">
					<?php
					while ($rows = mysqli_fetch_array($query)) {
					 ?>
					<?php
					$rs2 = $rows['id_sp'];
					?>
					<div class="production"  style="height: 250px; width: 200px; border: solid 1px #eee; margin:11px; ">
						<div style="height: 200px;">
							<a href="index.php?page_layout=thongtinsanpham&id_sp=<?php echo $rs2?>"><center><img src="image/Source/<?php echo $rows['anh_sp']?>" class="img-responsive" alt="" width="150px" height="auto"></center></a>
						</div>
						<div style="height: 50px">
							<p class="name-production" style="padding-top: 5px"><?php echo $rows['ten_sp']?></p>
							<p class="price-production" style="padding-top: 10px"><b><?php echo number_format($rows['gia_sp'],0,',','.') ?>VND</b></p>
						</div>
					</div>
					 <?php 

					 }
					  ?>
					<div class="clear"></div>
					<nav>
						<ul class="pagination">
							<li>
								<a href="
								<?php
									if($page==1){
										echo "";
									}
									else{	
											$pageprv = $page-1;
											if(isset($_GET['id_dmt'])){
												echo 'index.php?page_layout=sanpham&id_dmt='.$id_dmt.'&page='.$pageprv;
											}
											else{
												echo 'index.php?page_layout=sanpham&id_dmn='.$id_dmn.'&page='.$pageprv;
											}
									}
								?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li><?php echo $listPage?></a></li>
							
							<li>
								<a href="
								<?php
									if($page==$totalPages){
										echo "";
									}
									else{
											$pagenext = $page+1;
											if(isset($_GET['id_dmt'])){
												echo 'index.php?page_layout=sanpham&id_dmt='.$id_dmt.'&page='.$pagenext;
											}
											else{
												echo 'index.php?page_layout=sanpham&id_dmn='.$id_dmn.'&page='.$pagenext;
											}
									}
								?>" aria-label="Previous">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
						</ul>
					</nav>	
				</div>
				</center>


			</div>
<hr>
<?php
	include_once('web/topdmbuy.php');
?>
<hr>

