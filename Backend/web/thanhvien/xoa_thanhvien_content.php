<?php
	include("connect/ketnoi.php");
 	$id = $_GET['id'];
    $sqlDeleted = "DELETE FROM thanhvien WHERE id_thanhvien ='$id'";
    $queryDeleted = mysqli_query($conn,$sqlDeleted); 

    header("location:sp.php?page_layout=thanhvien");
?>