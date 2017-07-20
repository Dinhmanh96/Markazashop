<?php

include_once('connect/ketnoi.php');		
// Kiểm tra dữ liệu đầu vào có tồn tại hay không

if(isset($_GET['keyword'])){		
    $keyword = 	trim($_GET['keyword']) ;		// Cắt bỏ khoảng trắng
		// Lọc các ký tự đặc biệt

	// Kiểm tra kết quả trả về có hay không ?
	$sql = "SELECT * FROM sp WHERE ten_sp like '%$keyword%' OR th_sp like '%$keyword%'";
	$query = mysqli_query($conn,$sql);
		// Kiểm tra có dòng record nào hay không? 
			// Hiển thị dữ liệu
			$i=0;
			while($row = mysqli_fetch_array($query)){
			if($i==5) break;
			$sp='<div style="border: 1px solid #CCC;width:305px;height:65px; background: #fff;"> 
        		<a href="index.php?page_layout=thongtinsanpham&id_sp='.$row['id_sp'].'">
        			<div style="float:left;width:60px;height:65px;">
        			<img src="image/Source/'.$row['anh_sp'].'" style="width:60%;height:90%;margin-top:2px;margin-left:10px;"></div>
        		<div style="float:left;width:230;height:55px;margin-top:10px;">
        			<b>'.$row['ten_sp'].'</b><br><span  style="color:#F00">'.number_format($row['gia_sp'],0,',','.').' đ</span>
					</div></a></div>';
			echo $sp;
			$i++;
		}
	
	}else {
		echo 'Không có từ khóa nào được gởi đến.';
	}
?>