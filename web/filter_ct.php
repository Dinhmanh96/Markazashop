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