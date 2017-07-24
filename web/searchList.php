<?php
    //database configuration
    include_once('../connect/ketnoi.php');
    
    //get search term
    $searchTerm = $_GET['searchInput'];
    
    //get matched data from skills table
    $sql = "SELECT * FROM sp WHERE ten_sp LIKE '%$searchTerm%' ORDER BY id_sp ASC";

    $query = mysqli_query($conn,$sql);
    // $count = count($query);
    // print_r($count);
    while ($row = mysqli_fetch_assoc($query)){
        $data[] = $row['ten_sp'];
        echo json_encode($data);
    }
    
    //return json data
    
?>