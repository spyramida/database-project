<?php /* query.php, it will connect with the database and present the results of the querie
*/?>
<html>

<head >

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

<link rel="stylesheet" href="jquery-ui.css">
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
<script>
$(function() {
  $( "#datepicker" ).datepicker();
});
</script>

</head>


<body style="background-image:url(main.jpg); ">

<?php
	$var = $_GET["var"];
	$var2 = $_GET["var2"];
	$value= $_GET["value"];
	include "value.php";



	$connect = mysql_connect("localhost","root","j931218");
        if (!$connect){
                        die("Connect to database failed!! Error: " . mysql_error());
        }
        mysql_select_db("microloans",$connect);
        $results = mysql_query("$query");	
?>
<div style="float:left; width:10%; background-color:#AAAAAA">
        </br>
        </br>
</div>
<div style="float:right; width:10%; background-color:#AAAAAA">
        </br>
        </br>
</div>

<div style="background-color:#AAAAAA; display:inline-block; width:80%; margin-bottom:100;" class="container" >

<table border="1">
	<tbody>
	<tr>
	<?php 
	for($i=0; $i<$num_of_elements; $i++){
		?><td><?php echo $select_array[$i]; ?></td>	
	<?php }

?>	</tr>
	<?php
	while($row = mysql_fetch_array($results)){
	?><tr>
                                        <?php  for($i=0; $i<$num_of_elements; $i++){?>
                                                <td><?php echo $row[$select_array[$i]]; ?></td>
                                                <?php
                                        }
	?></tr><?php
	}?>

</tbody>
</table>
</div>
</body>



</html>
