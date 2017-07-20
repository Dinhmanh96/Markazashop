<?php 

	$sqltop100 = "SELECT * FROM sp ORDER BY id_sp DESC LIMIT 5";
	$querytop100  = mysqli_query($conn,$sqltop100);


    ?>

			<div class="row slide" style="padding-top: 5px">
					<div class="col-xs-3 col-sm-3 col-md-3 row-no-padding banner" >
						<a href="index.php?page_layout=thongtinsanpham&id_sp=65"><img src="image/Source/64.jpg" class="img-responsive" ></a>
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
				include_once('web/topnew.php');
			?>
			<hr>

			<?php
				include_once('web/topbuy.php');
			?>
			<hr>
			<?php
				include_once('web/topview.php');
			?>
			<hr>
				
			    
			
			



			