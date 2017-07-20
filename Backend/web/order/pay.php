<?php

	include("connect/ketnoi.php");
    
    $id = $_GET['id'];
    $sql = "UPDATE orderlist SET pay = 'Đã đặt cọc' WHERE id_order ='$id'";
    $query = mysqli_query($conn,$sql);
    header("location:sp.php?page_layout=order");
    
?>