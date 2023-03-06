<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "1234";
    $db_name="covid-19";
    $con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $Pfizer = $_POST["order_Pfizer"];

    echo "<h1> 화이자 백신 주문 결과 </h1>";

    $sql_g ="UPDATE government SET order_Pfizer = $Pfizer, amount_Pfizer = amount_Pfizer + $Pfizer WHERE country = '대한민국'";
    $ret_g = mysqli_query($con, $sql_g);
    if($ret_g){
    	echo "백신을 성공적으로 주문함(정부).<br>";
    }
    else{
    	echo "백신 주문 실패!!(정부)". "<br>";
    	echo "실패 원인: ".mysqli_error($con);
    }

    $sql_p = "UPDATE pharmacist SET holding_vaccine = holding_vaccine - $Pfizer";
    $ret_p = mysqli_query($con, $sql_p);
    if($ret_p){
    	echo "백신을 성공적으로 주문받음(제약사).<br>";
    }
    else{
    	echo "백신 주문 실패!!(제약사)". "<br>";
    	echo "실패 원인: ".mysqli_error($con);
    }

    mysqli_close($con);
    echo "<br><a href='Pfizer_korean.php'><--이전 화면</a>";

?>