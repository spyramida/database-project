
			
<html>
<head >
	<div style="background-image:url(footer.png); font-size:40px; margin-top:-8; position: relative; left:0px; width:100%; height:150px; text-align:center;">
		</br>Databases Microloans	
	</div>
</head>

<body style="background-image:url(main.jpg); ">
	<div style="position: relative; left:100px; width:80%; background-color:#AAAAAA; ">
		<p style="text-align:center;">
			Hello Borrower! Com'e stai?</br>
			View your loans or create a new request?
		</p>
		<div style="position:relative; left:0%; width:90%;">
			<form method="POST">
				<p> Myform </p>
				<p>
					<label for="skata">Select a query:</label>
					<select id="skata" name="skatoname">
						<option value="1">View all LoanRequests</option>
						<option value="2">View all Borrowers</option>
					</select>
				</p>
				<p>
					<input type="submit" value="Run"/>
				</p>
			</form>
		</div>
		</br>
		</br>
		</br>
	<?php //-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		?><div style="position:relative; left:0%; width:90%;" ><?php
		if (isset($_POST['skatoname'])){

			if ($_POST['skatoname'] == 1){
				$select_array = array("BId","DateOfRequest","Deadline","Amount","PaybackPeriod","Description","Percentage");
				$num_of_elements = 7;
				$query = "SELECT * FROM LoanRequest";
			}
			else if($_POST['skatoname'] == 2){
				$select_array = array("Name","Town","StreetName","StreetNumber","PostalCode");
				$num_of_elements = 5;
				$query = "SELECT * FROM Borrower";
			}
			//afto to shmeio na to psa3w lg
			$connect = mysql_connect("localhost","root","j931218");
			if (!$connect){
				die("Connect to database failed!! Error: " . mysql_error());
			}
			mysql_select_db("microloans",$connect);
			$results = mysql_query("$query");
			if ($results){
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
                                                <td><?php echo $row[$select_array[$i]]?></td>
                                        <?php } ?>

                                </tr>
                        <?php } ?>
	
			</tbody>
		</table>
		<?php
		}
		else {
			echo "Query did not return any results";
		}
		}//afto anaferetai sto isset
		?>
		</div>
		<?php //-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		?>
	</div>
</body>
</html>
