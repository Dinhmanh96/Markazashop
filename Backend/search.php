<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.watermark.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#input").watermark("Tìm kiếm đơn hàng theo mã đơn hàng, tên khách hàng, số điện thoại,...");	// Watermart cho khung nhập
$("#input").keyup(function()
{
	var input = $(this).val();   		// Lấy giá trị search của người dùng
	if(input==""){ document.getElementById("resultdata").style.display = 'none';}
	var dataString = 'keyword='+ input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
	if(input.length>0)					// Kiểm tra giá trị người nhập có > 3 ký tự hay ko
	{
		$.ajax({
			type: "GET",      						// Phương thức gọi là GET
			url: "ajax-search.php",  				// File xử lý
			data: dataString,						// Dữ liệu truyền vào
			beforeSend:  function() {				// add class "loading" cho khung nhập
				$('input#input').addClass('loading');
			},
			success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
			{
				$('#resultdata').html(server_response).show();  	// Hiển thị dữ liệu vào thẻ div #searchresultdata
				$('span#faq_category_title').html(faq_search_input);	// Hiển thị giá trị search của người dùng
				
				if ($('input#input').hasClass("loading")) {		// Kiểm tra class "loading"
					$("input#input").removeClass("loading");		// Remove class "loading"
				} 
			}
		});
	}return false;		// Không chuyển trang
});
});
</script>
<div class="col-xs-6 col-sm-7 col-md-5 search" >
						<!-- <div class="input-group add-on" > -->
						<form method="post" class="input-group add-on" action="sp.php?page_layout=timkiem">
	      					<input class="form-control" name="search_input" class="srch-term" id="input" type="text">
	      					<div class="input-group-btn">
	        				<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	      					</div>	
	      				</form>
	      				<!-- <div style="z-index: 30 !important;" id="resultdata" style="clear: both;"></div> -->
	   
	    				<!-- </div> -->
</div>