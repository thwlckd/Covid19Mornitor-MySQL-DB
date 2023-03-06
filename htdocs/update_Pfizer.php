<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "1234";
$db_name="covid-19";
$con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

$Pfizer = $_POST["residual_Pfizer"];

echo "<h1> 화이자 백신 분배 결과 </h1>";

$sql_h = "UPDATE hospital SET residual_Pfizer = residual_Pfizer + $Pfizer";
$ret_h = mysqli_query($con, $sql_h);
if($ret_h){
	echo "백신을 성공적으로 분배받음(병원).<br>";
}
else{
	echo "백신 분배 실패!!(병원)". "<br>";
	echo "실패 원인: ".mysqli_error($con);
}

$sql_g ="UPDATE government SET amount_Pfizer = amount_Pfizer - $Pfizer WHERE country = '대한민국'";
$ret_g = mysqli_query($con, $sql_g);
if($ret_g){
	echo "백신을 성공적으로 분배함(정부).<br>";
}
else{
	echo "백신 분배 실패!!(정부)". "<br>";
	echo "실패 원인: ".mysqli_error($con);
}

mysqli_close($con);
echo "<br><a href='Yu.php'><--이전 화면</a>";

?>