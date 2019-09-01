<html> <?php //after_index.php?>
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


<body style="background-image:url(main.jpg)">

<?php if (isset($_GET['skatoname'])){
                       include 'value.php';
			echo $_GET['skatoname'];
                        //afto to shmeio na to psa3w lg
                        $connect = mysql_connect("localhost","root","j931218");
                        if (!$connect){
        //                        die("Connect to database failed!! Error: " . mysql_error());
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
                                        <td><?php echo $select_array[$i]?></td>
                                <?php } ?>
                        </tr>
                                <?php while($row = mysql_fetch_array($results)){
                                ?><tr>
                                        <?php for($i=0; $i<$num_of_elements; $i++){?>
                                                <td><?php echo $row[$select_array[$i]];?></td>
                                                <?php
                                        }
                                        if ($edit == 1) { ?>
                                                <?php
                                                $mastring = "value=" . $_GET['skatoname'] . "&";
                                                for($j=0; $j<$num_of_elements; $j++){
                                                        if ($j<$num_of_elements)
                                                                $mastring = $mastring . $select_array[$j] . "=" . $row[$select_array[$j]];
                                                        if ($j+1<$num_of_elements+$key_elements)
                                                                $mastring = $mastring . "&";
                                                }
                                                ?>
                                                <td><a href="edit.php?<?php echo $mastring?>">Edit</a></td>
                                                <?php }
                                                ?>
                                </tr>
                        <?php } ?>
                        </tbody>
                </table>
                <?php
                }
                }//afto anaferetai sto isset
                ?>
                </div>
                <?php //-----------------------------------------------------------------------------
                //-----------------------------------------------------------------------------
                //-----------------------------------------------------------------------------
                ?>
</div>
<div>
<a href="index2.php"><img src="thanks.jpg" width="50%"/></a>

</div>

</body>



</html>




