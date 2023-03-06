<?php
    $con=mysqli_connect("localhost","root","1234","covid-19") or die("MySQL 접속 실패 !!");

    echo "<h1> Moderna </h1>";
    echo "<h2> Vaccine Production Status </h2>";
    
    $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
    $ret = mysqli_query($con, $sql);
    if($ret) {
    }
    else{
        echo "Error! :".mysqli_error($con);
        exit();
    }
    $row=mysqli_fetch_array($ret);

    echo "<TABLE border=1>";
    echo "<TR>";
    echo "<TH>Holding Vaccine</TH><TH>Today Production</TH><TH>Cumulative Production</TH><TH>Monthly Production Plan</TH>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>", $row['holding_vaccine'], "</TD>";
    echo "<TD>", $row['today_production'], "</TD>";
    echo "<TD>", $row['cumulative_production'], "</TD>";
    echo "<TD>", $row['monthly_production_plan'], "</TD>";
    echo "</TR>";
    echo "</TABLE><br>";

    echo "<h2> Preventive Rate </h2>";
    echo "<TABLE border=1>";
    echo "<TR>";
    echo "<TH>1st preventive rate</TH><TH>2nd preventive rate</TH>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>", $row['1st_preventive_rate'], "</TD>";
    echo "<TD>", $row['2st_preventive_rate'], "</TD>";
    echo "</TR>";
    echo "</TABLE>";

    function sql_side_effect($con, $str1, $str2){
        $sql ="SELECT * FROM people WHERE (side_effect LIKE '%$str1%' OR side_effect LIKE '%$str2%') AND vaccine = 'Moderna'";
        $ret = mysqli_query($con, $sql);
        if($ret) {
            $count=mysqli_num_rows($ret);
        }
        else{
            echo "Error!  :".mysqli_error($con);
            exit();
        }
        echo "<h3> $str2 $count cases<br></h3>";

        return $count;
    }

    echo "<h2> Side Effect </h2>";
    $sum = sql_side_effect($con, '발열', 'cold');
    $sum += sql_side_effect($con, '근육통', 'muscle pain');
    $sum += sql_side_effect($con, '두통', 'headache');
    $sum += sql_side_effect($con, '알레르기', 'Allergie');
    echo "<h3> Total $sum cases<br><br></h3>";

    mysqli_close($con);
?>

<HTML>
   <HEAD>
      <META http-equiv="content-type" content="text/html; charset=utf-8">
   </HEAD>
   <BODY>
      <h2> Update Production </h2>
      <FORM METHOD="post" ACTION="update_moderna_production.php">
	      Today Production : <INPUT TYPE = "text" NAME = "today_production" VALUE=>
	      <INPUT TYPE="submit" VALUE="update">
      </FORM>
      <h2> Ordering Vaccine </h2>
      <FORM METHOD="post" ACTION="order_Moderna_us.php">
	      United States : <INPUT TYPE = "text" NAME = "order_Moderna" VALUE=>
	      <INPUT TYPE="submit" VALUE="order">
      </FORM>
   </BODY>
</HTML>

<?php echo "<br><a href='index_us.html'><--Previous Page</a>"; ?>