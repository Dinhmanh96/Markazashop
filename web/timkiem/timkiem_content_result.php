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
			<div class="col-xs-12 col-sm-12 col-md-12 ">
				<?php
					while ($rows = mysqli_fetch_array($query)) {
				?>
				<?php
				$rs = $rows['id_sp'];
				?>
				<div class="production">
						<center><a href="index.php?page_layout=thongtinsanpham&id_sp=<?php echo $rs?>"><img src="image/Source/<?php echo $rows['anh_sp']?>" class="img-responsive" alt="" width="200px" height="200px"></a></center>
						<p style="padding-top: 10px;" class="name-production"><?php echo $rows['ten_sp']?></p>
						<p style="padding-top: 10px;" class="price-production"><b><?php echo number_format($rows['gia_sp'],0,',','.') ?>VND</b></p>
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
		</div>