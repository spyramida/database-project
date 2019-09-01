<?php final_edit?>
<html>

<head >
<title>The Bank</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

<link rel="stylesheet" href="jquery-ui.css">
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
</script>

</head>


<body style="background-image:url(main.jpg); ">

<?php
if(isset($_GET["value"]))
	$value = $_GET["value"];
	include "value.php";
//	var_dump(debug_backtrace());
//	echo $value;
        $element[0] = $_GET[$select_array[0]];
	if ($select_array[0] == "DateOfRequest"|| $select_array[0] == "DateOfApproval"|| $select_array[0] == "DateOfAggrement"|| $select_array[0] == "DateOfPayment")
                        $form_type[0] = "datepicker";
                else if($select_array[0] == "StreetNumber"|| $select_array[0] == "PostalCode" || $select_array[0] == "Amount"||$select_array[0] == "BId" || $select_array[0] =="LId"|| $select_array[0] == "MId"|| $select_array[0] == "Percentage" || $select_array[0] == "PaybackPeriod" )
                        $form_type[0] = "number";
                else
                        $form_type[0] = "text";
		
                
	if ($form_type[0] == "number")
		$querystring = $select_array[0] . "=" . $element[0] . " ";
	else 
		$querystring = $select_array[0] . "='" . $element[0] . "' "; 
	for($i=1; $i<$num_of_elements; $i++){
                $element[$i] = $_GET[$select_array[$i]];
		if ($select_array[$i] == "DateOfRequest"|| $select_array[$i] == "DateOfApproval"|| $select_array[$i] == "DateOfAggrement"|| $select_array[$i] == "DateOfPayment")
                        $form_type[$i] = "datepicker";
                else if($select_array[$i] == "StreetNumber"|| $select_array[$i] == "PostalCode" || $select_array[$i] == "Amount"||$select_array[$i] == "BId" || $select_array[$i] =="LId"|| $select_array[$i] == "MId"|| $select_array[$i] == "Percentage" || $select_array[$i] == "PaybackPeriod" )
                        $form_type[$i] = "number";
                else
                        $form_type[$i] = "text";

                
		if ($form_type[$i] == "number")
        	        $querystring = $querystring . "," .  $select_array[$i] . "=" . $element[$i] . " ";
	        else
	                $querystring = $querystring . "," . $select_array[$i] . "='" . $element[$i] . "' ";  
        }
	$key1 = $_GET["key1"];
	$key2 = $_GET["key2"];
	$keystring = $key1 . "=" . $element[0] . "";
	if(isset($_GET["key2"]))
		$keystring = $keystring . " and " . $key2 . "=" . $element[1] . "";
	$query = "UPDATE " . $datatable . " SET " . $querystring . " WHERE " . $keystring . "";
	echo $query;	
	$connect = mysql_connect("localhost","root","j931218");
        if (!$connect){
                die("Connect to database failed!! Error: " . mysql_error());
        }
        mysql_select_db("microloans",$connect);
        $results = mysql_query("$query");
	//kati gia na checkarw an egine to update??
?>


</body>

</html>
