<?php

include_once('connect/ketnoi.php');		
// Kiểm tra dữ liệu đầu vào có tồn tại hay không

if(isset($_GET['keyword'])){		
    $keyword = 	trim($_GET['keyword']) ;		// Cắt bỏ khoảng trắng
		// Lọc các ký tự đặc biệt

	// Kiểm tra kết quả trả về có hay không ?
	$sql = "SELECT * FROM orderlist WHERE sdt LIKE '%$keyword%' OR code_order LIKE '%$keyword%' OR name_customer LIKE '%$keyword%'";
	$query = mysqli_query($conn,$sql);
		// Kiểm tra có dòng record nào hay không? 
			// Hiển thị dữ liệu
			// $i=0;
			// while($row = mysqli_fetch_array($query)){
			// if($i==5) break;
	include_once ('web/timkiem/timkiem_content_result.php');
			
			// echo $sp;
			// $i++;
		// }
	$sqlsp =  "SELECT * FROM sp WHERE ten_sp LIKE '%$keyword%' OR th_sp LIKE '%$keyword%' OR chitiet_sp LIKE '%$keyword%'";
	$querysp = mysqli_query($conn,$sqlsp);
	include_once ('web/sanpham/sp_content_result_search.php');


	$sqltv =  "SELECT * FROM thanhvien WHERE ten_thanhvien LIKE '%$keyword%' OR email_thanhvien LIKE '%$keyword%' OR dc_thanhvien LIKE '%$keyword%' OR sdt_thanhvien LIKE '%$keyword%'";
	$querytv = mysqli_query($conn,$sqltv);
	include_once ('web/thanhvien/thanhvien_content_result_search.php');


	}else {
		echo 'Không có từ khóa nào được gởi đến !';
	}
?>