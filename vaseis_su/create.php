<html>

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


<div>
<?php 
$guy = $_GET["guy"]; 
if ($guy == 4){
//Loan Request
	$my_ID = $_GET["myid"];
	$dateofrequest = "" . date("Y-m-d");
	$deadline = $_GET["deadline"];
	$amount = $_GET["amount"];
	$paybackperiod = $_GET["paybackperiod"];
	$description = $_GET["description"];
	$percentage = $_GET["percentage"];

        //prp na checkarw prwta ti paizei me BID,DateOfRequest  
	$query = "SELECT BId,DateOfRequest FROM LoanRequest WHERE BId = " . $my_ID . "and DateOfRequest = " . $dateofrequest . "";
        $connect = mysql_connect("localhost","root","j931218");
        if (!$connect){
                die("Connect to database failed!! Error: " . mysql_error());
        }
        mysql_select_db("microloans",$connect);
        $results = mysql_query("$query");
	$row = mysql_fetch_array($results);
	if ($row["BId"] == $my_ID && $row["DateOfRequest"] == $dateofrequest)	
		die("Cheater! You have already applied for a loan today");
	else {
	$query="INSERT INTO LoanRequest (BId,DateOfRequest,Deadline,Amount,PaybackPeriod,Description,Percentage) VALUES ($my_ID, '$dateofrequest', '$deadline', $amount,$paybackperiod,'$description',$percentage)";
	echo $query;
	$results = mysql_query("$query");
	}

}
else{
	$name = $_GET["name"];
	$town = $_GET["town"];
	$streetname = $_GET["streetname"];
	$streetnumber = $_GET["streetnumber"];
	$postalcode = $_GET["postalcode"];
	//gia na kanw insert to kainourio account, prwta prp na vrw to megalytero ID, kai meta kanw insert gia Id+1

	if ($guy == 1){
		$query="SELECT max(BId) as BId FROM Borrower";
	}
	else if ($guy == 2){
		$query="SELECT max(LId) as BId FROM Lender";
	}
	else if ($guy == 3){
		$query="SELECT max(MId) as BId FROM Intermediary";
	}

	      $connect = mysql_connect("localhost","root","j931218");
        if (!$connect){
                die("Connect to database failed!! Error: " . mysql_error());
        }
        mysql_select_db("microloans",$connect);
        $results = mysql_query("$query");
        //gia na kanw insert to kainourio account, prwta prp na vrw to megalytero ID, kai meta kanw insert gia Id+1

	$ID = mysql_fetch_array($results);
	$my_ID = intval($ID["BId"]) + 1;
	if ($guy =='1'){
                $query="INSERT INTO Borrower (BId,Name,Town,StreetName,StreetNumber,PostalCode) VALUES ($my_ID,'$name','$town','$streetname',$streetnumber,$postalcode)";
        }
        else if ($guy == 2){
                $query="INSERT INTO Lender (LId,Name,Town,StreetName,StreetNumber,PostalCode) VALUES ($my_ID,'$name', '$town', '$streetname', '$streetnumber',$postalcode)";
        }
        else if ($guy == 3){
                $query="INSERT INTO Intermediary (MId,Name,Town,StreetName,StreetNumber,PostalCode) VALUES ($my_ID,'$name','$town','$streetname',$streetnumber,$postalcode)";
        }
	echo $query;
    $results = mysql_query("$query");

}
?>


</div>
<div>
        <a href="index2.php"><img src="thanks.jpg" width="50%"/></a>

</div>
</body>
</html>
