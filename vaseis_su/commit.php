<?php /* commit.php
** Edw erxomaste apo hyperlink <a href=""> apo to index2. Emfanizei
** ton pinaka twn LoanRequest pou den adistoixoun sto loan, kai meta katw katw
** syblhrwneis th forma opou dineis to BId,DateOfRequest tou Request pou 8es
** to LId sou kai to Amount pou 8a desmefteis. 
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
/*
**	emfanizei ta LoanRequests sta opoia to BId tous den yparxei sto synolo opou L.BId = LR.BId
**	kai taftoxrona to Date tous den yparxei sto synolo me L.Date = LR. Date
*/	
	$query = "SELECT LoanRequest.BId, LoanRequest.DateOfRequest, LoanRequest.Deadline, LoanRequest.Amount, LoanRequest.PaybackPeriod, LoanRequest.Description, LoanRequest.Percentage FROM LoanRequest , Loan WHERE LoanRequest.BId exists not in (SELECT Loan.BId FROM Loan, LoanRequest WHERE Loan.BId = LoanRequest.BId) and LoanRequest.DateOfRequest exists not in (SELECT LoanRequest.DateOfRequest FROM Loan,LoanRequest WHERE LoanRequest.DateOfRequest = Loan.DateOfRequest)";	

	if (!$connect){
//                die("Connect to database failed!! Error: " . mysql_error());
        }
        mysql_select_db("microloans",$connect);
        $results = mysql_query("$query");
	$select_array = array("BId","DateOfRequest","Deadline","Amount","PaybackPeriod","Description","Percentage");
	$num_of_elements = 7;

?>
	<table style="position:relative; left:2.5%; width:95%; text-align:center; background-color:#999999; " border="1"  border-spacing: 10px;>
                        <tbody>
                        <tr>
			        <?php $i=0;
                                for ($i=0; $i<$num_of_elements; $i++){
                                ?>
                                        <td><?php echo $select_array[i]?></td>
                                <?php } ?>
                        </tr>

		<?php while($row = mysql_fetch_array($results)){
                                ?><tr>
                                        <?php for($i=0; $i<$num_of_elements; $i++){?>
						<td><?php echo $row[$select_array[$i]];?></td>
		<?php 
		}

		}
	
?>


<div class="container">
<p> Put the combination of BId and Date of Request of the loan you want to commit to as your LId and the amount you want to commit.</br></br></p> 
<form action="process_commit.php" method="get">
        <div class="form-group">
                <label for="bid">BId:</label>
                <input type="number" id="bid" name="bid" placeholder="The ID of the Borrower">
        </div>
        <div class="form-group">
                <label for="dateofrequest">Date of Request:</label>
                <input type="text" id="datepicker" name="dateofrequest" placeholder="1/1/2017">
        </div>
        <div class="form-group">
                <label for="lid">LId:</label>
                <input type="number" id="percentage" name="lid" placeholder="Your unique ID">
        </div>
        <div class="form-group">
	<div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" placeholder="Euros">
        </div>
	<div class="form-group">
                <label for="absolute_amount"></label>
                <input type="hidden" id="absolute_amount" name="absolute_amount" value=<?php echo "\"" . $row["Amount"] . "\"" ?> >
        </div>        
	<input type="submit"> 
</form>
</div>

</body>
</html>
