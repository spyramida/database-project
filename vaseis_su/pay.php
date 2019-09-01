<?php /* pay.php
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

<div style="float:left; width:10%;">
&nbsp;
</div>
<div style="float:right; width:10%;">
&nbsp;
</div>
<div style="background-color:#AAAAAA; display:inline-block; width:80%; margin-bottom:100;" class="container" >
<h2 style="text-align:center">Microloans</h2>
<ul style="left:500px" class="nav nav-pills">
<li class="active"><a data-toggle="pill" href="#home"><h3>Deadline</h3></a></li>
<li><a data-toggle="pill" href="#menu1"><h3>Pay a loan</h3></a></li>
</ul>
</div>

<div class="tab-content">
<div id="home" class="tab-pane fade in active" style="background-color:#AAAAAA; width:80%; margin-left:10%;">
<?php if(!isset($_POST["id"])){ ?>
<div class="container" style="background-color:#AAAAAA; width:80%; left:10%;">
<form method="POST">
        <div class="form-group">
                <label for="id">Id:</label>
                <input type="number" id="id" name="id" placeholder="The loan ID">
        </div>
        <div class="form-group">
                <label for="datepicker">Date Of Aggreement:</label>
                <input type="text" id="datepicker" name="datepicker" placeholder="2017-1-1">
        </div>
	
        <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="text" id="datepicker" name="deadline" placeholder="2017-1-1">
        </div>
	

        <input type="submit">

</form>

</div>
<?php }else{ ?>
	<a style="position:relative; left:25%" href="index2.php"><img src="thanks.jpg" width="50%"/></a>


<?php } ?>

</div>

<div id="menu1" class="tab-pane fade" style="background-color:#AAAAAA; width:80%; margin-left:10%;">
<?php if(!isset($_POST["id"])){ ?>
<div class="container" style="background-color:#AAAAAA; width:80%; left:10%;">
<form method="POST">
	<div class="form-group">
                <label for="id">Id:</label>
                <input type="number" id="id" name="id" placeholder="The loan ID">
        </div>
	<div class="form-group">
	</div>
	<div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" placeholder="Euros">
        </div>

        <input type="submit">
	
</form>

</div>
<?php }else{ ?>
        <a style="position:relative; left:25%" href="index2.php"><img src="thanks.jpg" width="50%"/></a>


<?php } ?>


<?php if(isset($_POST["id"]) && isset($_POST["amount"])){ 

	$id = $_POST["id"];
	$amount = $_POST["amount"];
	$dateofpayment = "" . date("Y-m-d");
	$query = "INSERT INTO Repayment (Id,DateOfPayment,Amount) VALUES (" . $id . ",'" . $dateofpayment . "'," . $amount . ")";

	/*TRIGGER TRIGGER TRIGGER*/
	$connect = mysql_connect("localhost","root","j931218");
                      
	if (!$connect){                                
		die("Connect to database failed!! Error: " . mysql_error());                       
//		echo $query;
	}
	mysql_select_db("microloans",$connect);                
	$results = mysql_query("$query");                        

?>


<?php } else if (isset($_POST["id"])){
	$id = $_POST["id"];
        $deadline = $_POST["deadline"];
        $dateofagreement = $_POST["datepicker"];
        $query = "INSERT INTO Deadline (Id,DateOfAgreement,Deadline) VALUES (" . $id . ",'" . $dateofagreement . "','" . $deadline . "')";

        /*TRIGGER TRIGGER TRIGGER*/
        $connect = mysql_connect("localhost","root","j931218");

        if (!$connect){
                die("Connect to database failed!! Error: " . mysql_error());
//              echo $query;
        }
        mysql_select_db("microloans",$connect);
        $results = mysql_query("$query");


	}

 ?>
</div>



</body>


</html>
