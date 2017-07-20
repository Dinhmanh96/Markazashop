<?php

	include("connect/ketnoi.php");
	// $sql = "SELECT quyen_thanhvien FROM thanhvien WHERE username ='$_SESSION['tk']'";
 //    $query = mysql_query($sql);
 //    $totalrows = mysql_num_rows($query);
    
    $id = $_GET['id'];
    $sqlDeleted = "DELETE FROM sp WHERE id_sp ='$id'";
    $queryDeleted = mysqli_query($conn,$sqlDeleted); 

    header("location:sp.php");
    
?>