<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "1234";
    $db_name="covid-19";
    $con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $Moderna = $_POST["order_Moderna"];

    echo "<h1> Moderna Ordering </h1>";

    $sql_g ="UPDATE government SET order_Moderna = $Moderna, amount_Moderna = amount_Moderna + $Moderna WHERE country = 'United States'";
    $ret_g = mysqli_query($con, $sql_g);
    if($ret_g){
    	echo "Success of Ordering(government).<br>";
    }
    else{
    	echo "Failure of Ordering(government)". "<br>";
    	echo "Cause of Failure: ".mysqli_error($con);
    }

    $sql_p = "UPDATE pharmacist SET holding_vaccine = holding_vaccine - $Moderna";
    $ret_p = mysqli_query($con, $sql_p);
    if($ret_p){
    	echo "Success of Ordering(pharmacist).<br>";
    }
    else{
    	echo "Failure of Ordering(pharmacist)". "<br>";
    	echo "Cause of Failure: ".mysqli_error($con);
    }

    mysqli_close($con);
    echo "<br><a href='Moderna_enlgish.php'><--Moderna Page</a>";

?>