<div class="row result_search">

				<div class="col-xs-12 col-sm-12 col-md-9">
					<h4>Kết quả tìm kiếm cho "<b style="color: #00aeac"><?php echo $search_input?></b>"</h4>
					<span>Có "<?php echo $totalRows?>" sản phẩm tìm thấy</span>
				</div>
				<div class="col-sx-12 col-sm-12 col-md-3" style="padding-top: 10px;">

	                <span>Lọc:</span>
			               <a href="index.php?page_layout=timkiem&search_input=<?php echo $_COOKIE['search_input'];?>&filter=ct"><button  type="button" class="btn btn-default" style="font-size: 12px">Thấp đến cao</button></a>

			               <a href="index.php?page_layout=timkiem&search_input=<?php echo $_COOKIE['search_input'];?>&filter=tc"><button type="button" class="btn btn-default" style="font-size: 12px">Cao đến thấp</button></a>
            	</a>
      
				</div>
				
	</div>
	<hr>
		<div class="row top100">
			
				<?php
					while ($rows = mysqli_fetch_array($query)) {
				?>
				<?php
				$rs = $rows['id_sp'];
				?>
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
							<p class="name-production" style="padding-top: 5px; max-width: 90%; white-space: nowrap;	overflow: hidden; text-overflow: ellipsis;"><?php echo $rows['ten_sp']?></p>
							<p class="price-production" style="padding-top: 10px"><b><?php echo number_format($rows['gia_sp'],0,',','.') ?>VND</b></p>
						</div>
					</div>
					 <?php 

					 }
					  ?>
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
											echo 'index.php?page_layout=timkiem&search_input='.$_COOKIE['search_input'].'&page='.$pageprv;
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
												echo 'index.php?page_layout=timkiem&search_input='.$_COOKIE['search_input'].'&page='.$pagenext;
									}
								?>" aria-label="Previous">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
						</ul>
					</nav>			
		</div>
		<hr>