<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>[Demo] Tìm Kiếm Dữ Liệu Với PHP Kết Hợp Ajax jQuery - 2CwebVN</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="2cwebvn" />
<link href="../favicon.png" rel="icon" type="image/x-icon" >
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.watermark.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#faq_search_input").watermark("Nhập Từ Cần Tìm Kiếm");	// Watermart cho khung nhập
$("#faq_search_input").keyup(function()
{
	var faq_search_input = $(this).val();   		// Lấy giá trị search của người dùng
	var dataString = 'keyword='+ faq_search_input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
	if(faq_search_input.length>3)					// Kiểm tra giá trị người nhập có > 3 ký tự hay ko
	{
		$.ajax({
			type: "GET",      						// Phương thức gọi là GET
			url: "ajax-search.php",  				// File xử lý
			data: dataString,						// Dữ liệu truyền vào
			beforeSend:  function() {				// add class "loading" cho khung nhập
				$('input#faq_search_input').addClass('loading');
			},
			success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
			{
				$('#searchresultdata').html(server_response).show();  	// Hiển thị dữ liệu vào thẻ div #searchresultdata
				$('span#faq_category_title').html(faq_search_input);	// Hiển thị giá trị search của người dùng
				
				if ($('input#faq_search_input').hasClass("loading")) {		// Kiểm tra class "loading"
					$("input#faq_search_input").removeClass("loading");		// Remove class "loading"
				} 
			}
		});
	}return false;		// Không chuyển trang
});
});
</script>

</head>
<body class="faq">
<div id="content"><!-- END #content   -->

	<center><h2>Tìm Kiếm Dữ Liệu Với PHP Kết Hợp Ajax jQuery - 2Cwebvn</h2></center>
    <p class="back"><a href="http://www.2cweb.vn/blog/" target="_blank"><strong>Trở về trang chủ 2Cwebvn</strong></a> </p><br/>
    <p class="goiy">Gợi Ý: Tìm với từ khóa: Hướng Dẫn, Tạo, Bộ Sưu Tập, 2Cwebvn</p><br/>
   
    <div id="prod-content"><!-- #prod-content   -->
		<div class="prod-subsubhead">
			<h4 id="faq_title"> <strong>Tìm Kiếm Với Từ Khóa : </strong> <span id="faq_category_title">Keyword </span> </h4>
		</div>
		
		<div class="prod-subcontent">
            <div class="faqsearch">
              <div class="faqsearchinputbox">
                <!-- Khung Search  -->
                <input  name="query" type="text" id="faq_search_input" />
                <!-- END Khung Search   -->
              </div>
            </div>
            <div id="searchresultdata" class="faq-articles"> </div>
		</div>
    </div><!-- END #prod-content   -->
</div><!-- END #content   -->
</body>
</html>