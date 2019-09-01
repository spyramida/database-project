<html>
<head>
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
<div style="float:left; width:10%;">
&nbsp;
</div>
<div style="float:right; width:10%;">
&nbsp;
</div>
<div style="background-color:#AAAAAA; display:inline-block; width:80%; margin-bottom:100;" class="container" >
<div style="float:left; height:90%; width:50%; border-radius:25px; border:2px solid #2F4F4F; padding:20px; background:#528B8B; margin-bottom:20px;">
	<h3>Do you want just to edit?</h3>
<?php 
	
	$value = $_GET["value"];
	include 'value.php';
	//mesw tou value, gnwrizw ta gnwrismata tou query p 8a kanw edit, opote pairnw mesw ths GET
	//thn timh tou ka8e stoixeiou. Afta 8a ta valw se mia forma typou create, me default tis yparxouses times
	//afou parw tis times 8a kanw update. Gia na 3erw poio 8a nai to stoixeio p 8a kanw update, apo dw k pera
	// 8a krataw ka8e key.
	for($i=0; $i<$num_of_elements; $i++){
		$element[$i] = $_GET[$select_array[$i]];
	}
	for($i=0; $i<$num_of_elements; $i++){
		if ($select_array[$i] == "DateOfRequest"|| $select_array[$i] == "DateOfApproval"|| $select_array[$i] == "DateOfAggrement"|| $select_array[$i] == "DateOfPayment")
			$form_type[$i] = "datepicker";
		else if($select_array[$i] == "StreetNumber"|| $select_array[$i] == "PostalCode" || $select_array[$i] == "Amount"||$select_array[$i] == "BId" || $select_array[$i] =="LId"|| $select_array[$i] == "MId"|| $select_array[$i] == "Percentage" || $select_array[$i] == "PaybackPeriod" )
			$form_type[$i] = "number";
		else
			$form_type[$i] = "text";

		}
	
	?>
<?php /*
**
** ftiaxnw th forma. An, to element pou paw na valw einai kleidi, MHN to emfaniseis. dld MH kaneis edit keys
** meta vlepw an h forma einai typou text 'h num, 'h date kai th ftiaxnw. ta apotelesmata ths formas
** stelnodai sto final_edit.php?value=$value
*/
$count = 0;
$key[0] = 0;
$key[1] = 0;
$key[2] = 0;
?>	
	<form action=<?php echo "\"final_edit.php?value=" . $value . " \""?> method="get">
		<div class="form-group">
                                <label for="value"></label>
                                <input type="hidden" id="value" name="value" value=<?php echo "\"" . $value . "\""?>>
                                </div>
		<?php 
			for($i=0; $i<$num_of_elements; $i++){
				if ($select_array[$i] == "Borrower.BId"|| $select_array[$i] == "Lender.LId"|| $select_array[$i] == "Intermediary.MId"|| $select_array[$i] == "Trust.BId"|| $select_array[$i] == "Trust.LId"||$select_array[$i] == "LoanRequest.BId"||$select_array[$i] == "LoanRequest.DateOfRequest"||$select_array[$i] == "Commitment.LId"||$select_array[$i] == "Commitment.BId"||$select_array[$i] == "Commitment.DateOfRequest"||$select_array[$i] == "Loan.Id"||$select_array[$i] == "Repayment.Id"||$select_array[$i] == "Repayment.DateOfPayment"||$select_array[$i] == "Deadline.Id" ||$select_array[$i] == "Deadline.DateOfAggreement"||$select_array[$i] == "BId"||$select_array[$i] == "LId"||$select_array[$i] == "MId"||$select_array[$i] == "DateOfRequest"||$select_array[$i] == "Id"||$select_array[$i] == "DateOfPayment"||$select_array[$i] == "DateOfAggreement"){
					?><div class="form-group">
						<label for="value"><?php echo $select_array[$i] . "=" . $element[$i] . "" ?> </label>
		                                <input type="hidden" id="value" name=<?php echo "\"" . $select_array[$i] . "\""?> value=<?php echo "\"" . $element[$i] . "\""?>>
					</div><?php
					$key[$count] = $select_array[$i];
					continue;
				}
				if ($form_type[$i] == "text"){
				echo "<div class=\"form-group\">
			                <label for=\"" . $select_array[$i] . "\">" . $select_array[$i] . ":</label>
			                <input type=\"" . $form_type . "\" id=\"" . $select_array[$i] . "\" name=\"" . $select_array[$i] . "\" placeholder=\"" . $element[$i] . "\" value=\"" . $element[$i] . "\">
				      </div>";
				}
				else if($form_type[$i] == "datepicker"){
					
					echo "<div class=\"form-group\">
                                        <label for=\"" . $select_array[$i] . "\">" . $select_array[$i] . ":</label>
                                        <input type=\"text\" id=\"" . $form_type . "\" name=\"" . $select_array[$i] . " value=\"" . $element[$i] . "\">
                                      </div>";

				}
				else{
					echo "<div class=\"form-group\">
                                        <label for=\"" . $select_array[$i] . "\">" . $select_array[$i] . ":</label>
                                        <input type=\"" . $form_type . "\" step=\"0.01\" id=\"" . $select_array[$i] . "\" name=\"" . $select_array[$i] . "\" placeholder=\"" . $element[$i] . "\" value=\"" . $element[$i] . "\">
                                      </div>";

				}

			} ?>
				<div class="form-group">
                                <label for="key1"></label>
                                <input type="hidden" id="key1" name="key1" value=<?php echo "\"" . $key[0] . "\""?>>
                                </div>
				<?php if ($key[1] !=0){?>
					<div class="form-group">
	                                <label for="key2"></label>
        	                        <input type="hidden" id="key2" name="key2" value=<?php echo "\"" . $key[1] . "\""?>>
                	                </div>
				<?php } ?>
	
				<input type="submit" value="Edit"><?php
		
		?>
		
	</form>	
<?php ?>
</div>
<div style="float:right; height:90%; width:50%; border-radius:25px; border:2px solid #2F4F4F; padding:20px; background:#528B8B; margin-bottom:20px;">

	<h3 style="text-align:center">Or do you want to delete????</h3>

<?php	for($i=1; $i<$num_of_elements; $i++){
                $querystring = $querystring . " ," . $select_array[$i] . "=" . $element[$i];
        }
        $keystring = $key[0] . "=" . $element[0] . "";
        if($key[1] != 0)
                $keystring = $keystring . " and " . $key[1] . "=" . $element[1] . "";?>

	<form method="post">
		<input type="checkbox" name="Delete" value="Delete" unckecked>Are you sure you want to delete <?php echo $keystring?> ?</br>
		<input type="submit" value="Delete">
	</form>

	<?php 

	if(isset($_POST["Delete"])){
		$query = "DELETE FROM " . $datatable . " WHERE " . $keystring . "";
		echo $query;
		$connect = mysql_connect("localhost","root","j931218");
	        if (!$connect){
	//                        die("Connect to database failed!! Error: " . mysql_error());
	        }
	        mysql_select_db("microloans",$connect);
	        $results = mysql_query("$query");
	
	}
	?>
</div>
</div>
</body>
</html>
