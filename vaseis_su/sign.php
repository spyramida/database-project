<?php /* If u want to create an account B,L,I
** Whatever the user chooses, we go to the create.php
**
**
*/
?>
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
<script>
$(function() {
  $( "#datepicker" ).datepicker();
});
</script>

</head>


<body style="background-image:url(main.jpg); ">
<div style="float:left; width:10%; background-color:#AAAAAA">
        </br>
        </br>
</div>
<div style="float:right; width:10%; background-color:#AAAAAA">
        </br>
        </br>
</div>

<div style="background-color:#AAAAAA; display:inline-block; width:80%; margin-bottom:100;" class="container" >
<h2 style="text-align:center">Sign Up</h2>
<ul style="left:500px" class="nav nav-pills">
<li><a href="index2.php">Home</a></li>
</ul>

<?php
	$guy = ($_GET['guy']);

	if ($guy== 1){
// B O R R O W E R
?>
<div class="container">
<form action="create.php" method="get">
	<div class="form-group">
		<label for="name">Full Name:</label>
		<input type="text" id="name" name="name" placeholder="Full Name">
        </div>
	<div class="form-group">
                <label for="town">Town:</label>
                <input type="text" id="town" name="town" placeholder="Town">
        </div>
	<div class="form-group">
                <label for="streetname">Street Name:</label>
                <input type="text" id="streetname" name="streetname" placeholder="Street Name">
        </div>
	<div class="form-group">
		<label for="streetnumber">Street Number:</label>
		<input type="number" id="streetnumber" name="streetnumber" placeholder="Street Number">
	</div>
	<div class="form-group">
                <label for="postalcode">Postal Code:</label>
                <input type="number" id="postalcode" name="postalcode" placeholder="Postal Code">
        </div>
	<div class="form-group">
		<label for="guy"></label>
                <input type="hidden" id="guy" name="guy" value="1">
        </div>

	<input type="submit">
<?php //	<button type="submit" class="btn btn-default">Submit</button> ?>


</form>
</div>
<?php 
}
else if ($guy == 2){
// L E N D E R
?>
<div class="container">
<form action="create.php" method="get">
        <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Full Name">
        </div>
        <div class="form-group">
                <label for="town">Town:</label>
                <input type="text" id="town" name="town" placeholder="Town">
        </div>
        <div class="form-group">
                <label for="streetname">Street Name:</label>
                <input type="text" id="streetname" name="streetname" placeholder="Street Name">
        </div>
        <div class="form-group">
                <label for="streetnumber">Street Number:</label>
                <input type="number" id="streetnumber" name="streetnumber" placeholder="Street Number">
        </div>
        <div class="form-group">
                <label for="postalcode">Postal Code:</label>
                <input type="number" id="postalcode" name="postalcode" placeholder="Postal Code">
        </div>
        <div class="form-group">
                <label for="guy"></label>
                <input type="hidden" id="guy" name="guy" value="2">
        </div>

        <input type="submit">
<?php //        <button type="submit" class="btn btn-default">Submit</button> ?>


</form>
</div>

<?php
}
else if ($guy == 3){
//   I N T E R M E D I A R Y 
?>
<div class="container">
<form action="create.php" method="get">
        <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Full Name">
        </div>
        <div class="form-group">
                <label for="town">Town:</label>
                <input type="text" id="town" name="town" placeholder="Town">
        </div>
        <div class="form-group">
                <label for="streetname">Street Name:</label>
                <input type="text" id="streetname" name="streetname" placeholder="Street Name">
        </div>
        <div class="form-group">
                <label for="streetnumber">Street Number:</label>
                <input type="number" id="streetnumber" name="streetnumber" placeholder="Street Number">
        </div>
        <div class="form-group">
                <label for="postalcode">Postal Code:</label>
                <input type="number" id="postalcode" name="postalcode" placeholder="Postal Code">
        </div>
        <div class="form-group">
                <label for="guy"></label>
                <input type="hidden" id="guy" name="guy" value="3">
        </div>

        <input type="submit">
<?php //        <button type="submit" class="btn btn-default">Submit</button> ?>


</form>
</div>
<?php
}
else if ($guy == 4){
?>
<div class="container">
<form action="create.php" method="get">
        <div class="form-group">
                <label for="myid">BId (If u dont have,create acc):</label>
                <input type="number" id="myid" name="myid" placeholder="Your special ID">
        </div>
        <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="text" id="datepicker" name="deadline" placeholder="1/1/2017">
        </div>
	<div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" placeholder="Euros">
        </div>
	<div class="form-group">
                <label for="paybackperiod">Payback Period:</label>
                <input type="number" id="paybackperiod" name="paybackperiod" placeholder="Months">
        </div>
	<div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" placeholder="Reason for your loan">
        </div>
	<div class="form-group">
                <label for="percentage">Percentage:</label>
                <input type="number" step="0.01" id="percentage" name="percentage" placeholder="Just the number">
        </div>
        <div class="form-group">
                <label for="guy"></label>
                <input type="hidden" id="guy" name="guy" value="4">
        </div>
	 <input type="submit">
</form>
<?php } ?>
</div>
</body>

</html>

