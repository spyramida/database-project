<?php /* process_commit.php
** Pairnoume ta stoixeia gia to commit. Arxika me to 1o query pairnoume to synoliko amount p xei ginei commit
** sth synexeia, checkaroume an me to commit p ginetai, einai etoimo to loanrequest gia loan.
** An den einai, apla kanoume insert thn commit tupla. Alliws, vriskoume to max(ID)+1 twn Loan ws kainourio ID
** kanoume insert to Loan mas kai meta kanoume insert kai to commitment mas. ggwp ezpez
*/?>
<html>

<head >
<title>The Bank</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

</head>


<body style="background-image:url(main.jpg); ">

<?php 
$bid = $_GET["bid"];
$dateofrequest = $_GET["dateofrequest"];
$lid = $_GET["lid"];
$amount = $_GET["amount"];
$absolute_amount = $_GET["absolute_amount"];
if (!$connect){
	die("Connect to database failed!! Error: " . mysql_error());
}
mysql_select_db("microloans",$connect);
$query = "SELECT sum(Amount) AS suma FROM Commitment,LoanRequest WHERE LoanRequest.Bid = Commitment.Bid and LoanRequest.DateOfRequest = Commitment.DateOfRequest";
$results = mysql_query("$query");
$row = mysql_fetch_array($results);
if ($absolute_amount - ($row["suma"] + $amount) <= 0){//kalyf8hke to poso
        $amount = $absolute_amount - $row["suma"];
	$query = "SELECT max(ID) AS newid FROM Loan";
	$results = mysql_query("$query");
	$row = mysql_fetch_array($results);
	$newid = $row["newid"]+1;
	$dadate = "" . date("Y-m-d");
	$query = "INSERT INTO Loan (ID,DateOfApproval,MId,BId,DateOfRequest) VALUES (" . $newid . "," . $dadate . "," . $mid . "," . $bid . "," . $dateofrequest . ")";

}
else {
}
$query = "INSERT INTO Commitment (\"BId\",\"DateOfRequest\",\"LId\",\"Amount\") VALUES (" . $bid . "," . $dateofrequest . "," . $lid . "," . $amount . ")";
$results = mysql_query("$query");


?>

</body>


</html>
