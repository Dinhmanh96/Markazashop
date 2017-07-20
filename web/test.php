

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
    $( "#searchInput" ).autocomplete({
        source: <?php
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
        minLength: 0
    }).focus(function(){
        if (this.value == ""){
            $(this).autocomplete("search");
        }
    });
});
</script>
</head>
<body>
<div class="ui-widget">
    <label for="searchInput">Tên </label>
    <input id="searchInput" name="searchInput">
</div>
</body>
</html>