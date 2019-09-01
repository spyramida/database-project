<?php /*
** Index!
** The user chooses his type (Borrower Lender Intermediary). 
** Then, he chooses what kind of query he wants to execute
** which prompts to value.php
*/?>

<html>
<head >
<title>The Bank</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:500px; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px; background-color: #ff9800;}
  #section4 {padding-top:50px;height:500px; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;background-color: #009688;}
  </style>

</head>



<?php //<body style="background-image:url(main.jpg); ">?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style="background-image:url(main.jpg)">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		  <span class="icon-bar"></span>

          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DaBestBank</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">Home</a></li>
          <li><a href="#section2">Borrower</a></li>
          <li><a href="#section3">Lender</a></li>
          <li><a href="#section4">Intermediary</a></li>
<?php /*          <li><a href="#section42">Section 4-2</a></li> */?>
        </ul>
      </div>
    </div>
  </div>
</nav>


<?php /*
<div style="float:left; width:10%; background-color:#AAAAAA">
        </br>
        </br>
</div>
<div style="float:right; width:10%; background-color:#AAAAAA">
        </br>
        </br>
</div>

<div style="background-color:#AAAAAA; display:inline-block; width:80%; margin-bottom:100;" class="container" >
<h2 style="text-align:center">Microloans</h2>
<?php /*<ul style="left:500px" class="nav nav-pills">
<li class="active"><a data-toggle="pill" href="#home"><h3>Home</h3></a></li>
<li><a data-toggle="pill" href="#menu1"><h3>Borrower</h3></a></li>
<li><a data-toggle="pill" href="#menu2"><h3>Lender</h3></a></li>
<li><a data-toggle="pill" href="#menu3"><h3>Intermediary</h3></a></li>
</ul>
*/?>
<div id="section1" class="container-fluid" style="height:100%;">
<div id="home" class="tab-pane fade in active">
	<h1 style="text-align:center">WELCOME TO OUR SUPER DOUPER BANK</h1>
	<h3 style="text-align:center"><img src="house.jpg" alt="House" height="80%"/></h3>
	<p style="text-align:center"> </br>&nbsp;</br> Hey!! Welcome to Da Bank Microloans CO!</br></br></br></br></br></p>
</div>
</div>
<div id="section2" class="container-fluid" style="height:100%;">
<h1 style="text-align:center"> Borrower &nbsp; &nbsp;<a style="top:20%;" href="sign.php?guy=1"><img src="sign.jpg" alt="Sign Up" width="12%"/></a>
</h1></br>

<div style="float:left; height:65%; width:45%; border-radius:25px; border:2px solid #73AD21; padding:20px; background:#73AD21; margin-bottom:20px;">
</br>
<?php $davalue=1;?>
		<p style="text-align:center;">
                        Select which table you want to view or edit
                </p>
                <div style="position:relative; left:0%; width:90%; ">
                        <form action="after_index.php" method="get">
                                <p>
                                        <label for="skata">Select a query:</label>
                                        <select id="skata" name="skatoname" style="width:100%;">
                                                <option value="1">View all Borrowers</option>
                                                <option value="2">View all Loan Requests</option>
                                                <option value="3">View your payment history</option>
                                                <option value="4">View the deadline of the loans before a specific date</option>
                                                <option value="5">View the remaining amount needed for your request</option>
                                                <option value="6">Special Borrower View</option>
                                        		
                                        </select>
                                </p>
                                <p>
                                        <input type="submit" value="Run"/>
                                </p>
                        </form>
                </div>
</div>
<div style="float:right; height:65%; width:45%; border-radius:25px; border:2px solid #73AD21; padding:20px; background:#73AD21; margin-bottom:20px;">
        </br>
	<div style="float:left; width:50%;">
		<a href="sign.php?guy=4">Apply for a loan!</a> <?php //img?>
		<a href="sign.php?guy=4" style="text-align:center"><img src="apply.jpg" alt="Apply icon" width="60%" height="40%"/></a>
	        </br>&nbsp;</br>
	</div>
        <div style="float:right; width:50%;">
		<a href="pay.php">Manage a loan!</a> <?php //img?>
                <a href="pay.php" style="text-align:center"><img src="manage.jpg" alt="Manage icon" height="40%" width="60%"/></a>

	</div>
	<div>
	
	
        </br>&nbsp;</br>
	</div>
	<?php //EDW NA 8YMH8W NA ALLA3W TO DISPLAY TOU BUTTON
	?>
</div>
</br>
&nbsp;
</div>
<?php  /*
**
** L E N D E R 
**
*/ ?>


<div id="section3" class="container-fluid" style="height:100%;" >
<h1 style="text-align:center"> Lender &nbsp; &nbsp;<a style="top:20%;" href="sign.php?guy=2"><img src="sign.jpg" alt="Sign Up" width="12%"/></a>
</h1></br>
<div style="height:50%; width:100%; border-radius:25px; border:2px solid #73AD21; padding:20px; background:#73AD21; margin-bottom:20px;">
</br>
<?php $davalue=2;?>
		<p style="text-align:center;">
                        Hello Lender! Com'e stai?</br>
			        <a href="commit.php">GO AND LEND TO A LOAN!!!!!!!!</a>
				<a href="commit.php"><img src="commit.jpg" alt="Lend" height="30%"/></a>
                        
                </p>
                <div style="position:relative; left:0%; width:90%;">
                        <form action="after_index.php" method="get">
                                <p>
                                        <label for="skata">Select a query:</label>
                                        <select id="skata" name="skatoname" style="width:100%;">
                                                <option value="11">View all the Lenders</option>
                                                <option value="12">View the Trust table</option>
						<option value="13">View the Commitment table</option>
                                                <option value="14">View YOUR Trust table</option>
						<option value="15">View max,min,avg loan for a BId</option>
                                                <option value="16">View each Borrowers' dept</option>
						<option value="17">View a Borrowers' max trust and num of loans</option>
                                                <option value="18">Deadlines that concern you, due by a certain date</option>
                                                <option value="19">Looking for a commitment?</option>
                                        </select>
                                </p>
                                <p>
                                        <input type="submit" value="Run"/>
                                </p>
                        </form>
                </div>
</div>

</div>
<?php //I N T E R M E D I A R Y ?>
<div id="section4" class="container-fluid" style="height:100%;">
<h1 style="text-align:center"> Intermediary &nbsp; &nbsp;<a style="top:20%;" href="sign.php?guy=3"><img src="sign.jpg" alt="Sign Up" width="12%"/></a>
</h1></br>
<div style="height:50%; width:100%; border-radius:25px; border:2px solid #73AD21; padding:20px; background:#73AD21; margin-bottom:20px;">
</br>
</br>
</br>
<?php $davalue=1;?>
                <p style="text-align:center;">
                        Hello Intermediary! Com'e stai?</br>
                        View your loans or create a new request?
                </p>
                <div style="position:relative; left:0%; width:90%;">
                        <form action="after_index.php "method="get">
                                <p>
                                        <label for="skata">Select a query:</label>
                                        <select id="skata" name="skatoname" style="width:100%;">
                                                <option value="21">View all the Intermediaries</option>
                                                <option value="22">View all the Loans</option>
						<option value="23">View the Repayment table</option>
                                                <option value="24">View the Deadline table</option>
                                                <option value="25">View the Intermediary Over-view</option>
                                                <option value="26">View most expensive loans info</option>

                                        </select`>


                                </p>
                                <p>
                                        <input style="text-align:center" type="submit" value="Run"/>
                                </p>
                        </form>
                </div>
</div>

</div>


</div>
</div>

<?php /* 
       ***********************************************************************************************************
       ***********************************************************************************************************
       ***********************************************************************************************************
       */?>
<div style="position: relative; margin-left:10%; width:80%; background-color:#AAAAAA; ">
	<?php//		include 'value.php';
			$query = "";
                        $connect = mysql_connect("localhost","root","j931218");
                        if (!$connect){
        //                        die("Connect to database failed!! Error: " . mysql_error());
                        }
                        mysql_select_db("microloans",$connect);
			$query = "delimiter //";
                        $results = mysql_query("$query");
                        $query = "";
			$results = mysql_query("$query");
                        $query = "";
                        $results = mysql_query("$query");
                        $query = "";
                        $results = mysql_query("$query");
                        $query = "";
                        $results = mysql_query("$query");
			$query = "delimiter ;";
                        $results = mysql_query("$query");
                ?>
                </div>
                <?php //-----------------------------------------------------------------------------
                //-----------------------------------------------------------------------------
                //-----------------------------------------------------------------------------
                ?>
        </div>
</body>
</html>



