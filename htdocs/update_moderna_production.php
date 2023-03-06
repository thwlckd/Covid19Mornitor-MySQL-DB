<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "1234";
    $db_name="covid-19";
    $con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $t_Moderna = $_POST["today_production"];

    echo "<h1> 모더나 백신 생산량 수정 결과 </h1>";

    $sql_t = "UPDATE pharmacist SET holding_vaccine = holding_vaccine + $t_Moderna, cumulative_production = cumulative_production + $t_Moderna WHERE name = 'Moderna'";
    $ret_t = mysqli_query($con, $sql_t);
    if($ret_t){
    	echo "성공적으로 수정함.<br>";
    }
    else{
    	echo "수정 실패!!(제약사)". "<br>";
    	echo "실패 원인: ".mysqli_error($con);
    }

    $sql_t = "UPDATE pharmacist SET today_production = $t_Moderna WHERE name = 'Moderna'";
    $ret_t = mysqli_query($con, $sql_t);
    if($ret_t){
    	echo "성공적으로 수정함.<br>";
    }
    else{
    	echo "수정 실패!!(제약사)". "<br>";
    	echo "실패 원인: ".mysqli_error($con);
    }

    mysqli_close($con);
    echo "<br><a href='Moderna_korean.php'><--이전 화면</a>";

?>