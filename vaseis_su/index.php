
			
<html>
<head >
	<div style="background-image:url(footer.png); font-size:40px; margin-top:-8; position: relative; left:0px; width:100%; height:150px; text-align:center;">
		</br>Databases Microloans	
	</div>
</head>

<body style="background-image:url(main.jpg); ">
	<div style="position: relative; left:100px; width:80%; background-color:#AAAAAA; ">
		<p>
			Welcome to da best databases project ever!
		</p>
		
		<a href="borrower.php" style="position: relative; left:150px; width:15%;"><img src="Button1.png" alt="Borrower" width="200" /></a>
		<a href="lender.php" style="position: relative; left:400px; width:15%;"><img src="Button2.png" alt="Lender" width="200" /></a>
		<?php //-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		?>
		
		<table style="position:relative; left:2.5%; width:95%; text-align:center; " border="1"  border-spacing: 10px;>
			<tbody>
			 <?php
            $connect = mysql_connect("localhost","root", "j931218");
			$error = 0;
            if (!$connect) {
				$error = 1;
                die("Database connection failed miserably: " . mysql_error());
            }
			
			
            mysql_select_db("microloans",$connect);
            $results = mysql_query("SELECT * FROM Borrower");
			?>
			
            <?php while($row = mysql_fetch_array($results)) {
            ?>
                <tr>
					
					<td><?php echo $row['Bid']?></td>
                    <td><?php echo $row['Name']?></td>
					<td><?php echo $row['Town']?></td>
                    <td><?php echo $row['StreetName']?></td>
					<td><?php echo $row['StreetNumber']?></td>
                    <td><?php echo $row['PostalCode']?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
			
		</table>
		
		<?php //-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		//-----------------------------------------------------------------------------
		?>
		
	</div>
</body>
</html>



