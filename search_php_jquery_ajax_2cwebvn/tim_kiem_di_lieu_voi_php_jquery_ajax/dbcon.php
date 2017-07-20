<?php
/***********************************
 * Tác giả: 2Cwebvn
 * Website : www.2cweb.vn
 ***********************************/
 
/*Định nghĩa các hằng số kết nối đến database */
DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_PASSWORD', '');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', '2cwebvn_demo');

// Tạo chuỗi két nối và thiết lập hiển thị tiếng việt:
$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,DATABASE_NAME);
@mysqli_query($dbc,'set character set "utf8"'); 

// Kiểm tra kết nối
if (!$dbc) {
    trigger_error('Không thể kết nối đến MySQL: ' . mysqli_connect_error());
}

?>