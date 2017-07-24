<?php

		if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page =1;
			}

			$rowsPerPage = 20;
			$perRow = $page*$rowsPerPage - $rowsPerPage;
			
			$sql = "SELECT * FROM sp ORDER BY view DESC LIMIT 50 ";
			
			$query = mysqli_query($conn,$sql);
			
			$totalRows = mysqli_num_rows($query);
			$totalPages = ceil($totalRows/$rowsPerPage);
		 	$listPage = '';
		 	for($i = 1; $i<= $totalPages; $i++){

		 		if($page == $i){
		 			$listPage .='<span style="background-color: #06b9a6; color:#fff;">'.$i.'</span>';
		 		}
		 		else{
		 			$listPage .= '<a href="index.php?page_layout=top100&page='.$i.'">'.$i.'</a>';
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
			<!-- End Slide -->
			<div class="main">
				<div class="row" style="background-color: #00aeac; margin-top: 15px; height: 50px">
					<div class="col-xs-12 col-sm-12 col-md-9" style="padding-top: 15px;">
						<h4 style="color: #fff">Top 50 sản phẩm xem nhiều</h4>
					</div>
					<div class="col-sx-12 col-sm-12 col-md-3" style="padding-top: 8px;">
						<!-- <a class="btn btn-default">
		                	<span>Lọc theo</span>
			                <select>
			                	<option>Thấp đến cao</option>
			                	<option>Cao đến thấp</option>
			                	<option>Theo tên</option>
			                </select>
		            	</a> -->
					</div>
				</div>
				<hr>
				<center><div class="list_production">
					<?php
					while ($rows = mysqli_fetch_array($query)) {
					 ?>
					<?php
					$rs2 = $rows['id_sp'];
					?>
					<div class="production" style="height: 250px; width: 200px; border: solid 1px #eee; margin:11px; ">
						<div style="height: 200px;">
							<a href="index.php?page_layout=thongtinsanpham&id_sp=<?php echo $rs2?>"><center><img src="image/Source/<?php echo $rows['anh_sp']?>" class="img-responsive" alt="" width="180px" height="180"></center></a>
						</div>
						<div style="height: 50px">
							<p class="name-production" style="padding-top: 5px; max-width: 90%;	white-space: nowrap;	overflow: hidden; text-overflow: ellipsis;"><?php echo $rows['ten_sp']?></p>
							<p class="price-production" style="padding-top: 10px"><b><?php echo number_format($rows['gia_sp'],0,',','.') ?>VND</b></p>
						</div>
					</div>
					 <?php 

					 }
					  ?>
					<div class="clear"></div>
						
				</div>
				</center>
			</div>
			<hr>
			<?php
				include_once('web/topnew.php');
			?>
			<hr>