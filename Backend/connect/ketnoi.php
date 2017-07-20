<?php

	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = 'manh9896';
	$dbName = 'markaza';


	// $dbHost = 'mysql.hostinger.vn';
	// $dbUser = 'u982742432_marka';
	// $dbPass = 'manh9896';
	// $dbName = 'u982742432_marka';

	$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName );

	if($conn){
		mysqli_query($conn,"SET NAMES 'utf8'");
	}else{
		die("Kết nối thất bại ".mysqli_connect_error($conn));
	}

	// $dbConnect = mysql_connect($dbHost, $dbUser, $dbPass);
	// $dbSelected = mysql_select_db($dbName, $dbConnect);
	// $dbSetLang = mysql_query("SET NAMES 'utf8'");  
?>