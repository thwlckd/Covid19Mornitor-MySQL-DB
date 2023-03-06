<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "1234";
    $db_name="covid-19";
    $con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $t_Pfizer = $_POST["today_production"];

    echo "<h1> Update Today Production of Pfizer </h1>";

    $sql_t = "UPDATE pharmacist SET holding_vaccine = holding_vaccine + $t_Pfizer, cumulative_production = cumulative_production + $t_Pfizer WHERE name = 'Pfizer'";
    $ret_t = mysqli_query($con, $sql_t);
    if($ret_t){
    	echo "Update! <br>";
    }
    else{
    	echo "Error!", mysqli_error($con);
    }

    $sql_t = "UPDATE pharmacist SET today_production = $t_Pfizer WHERE name = 'Pfizer'";
    $ret_t = mysqli_query($con, $sql_t);
    if($ret_t){
    	echo "Update! <br>";
    }
    else{
    	echo "Error!", mysqli_error($con);
    }

    mysqli_close($con);
    echo "<br><a href='Pfizer_english.php'><--Pfizer Page</a>";

?>