

<p>Select a new car from the list.</p>

<select id="mySelect" onchange="myFunction()">
  <option value="dm">Audi
  <option value="BMV">BMW
  <option value="Mercedes">Mercedes
  <option value="Volvo">Volvo
</select>

<p>When you select a new car, a function is triggered which outputs the value of the selected car.</p>



<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    
    document.write('<?php include("web/topview.php") ?>');
   
}
</script>
