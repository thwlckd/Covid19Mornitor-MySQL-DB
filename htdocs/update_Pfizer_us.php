<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "1234";
$db_name="covid-19";
$con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

$Pfizer = $_POST["residual_Pfizer"];

echo "<h1> Dividing Pfizer  </h1>";

$sql_h = "UPDATE hospital SET residual_Pfizer = residual_Pfizer + $Pfizer";
$ret_h = mysqli_query($con, $sql_h);
if($ret_h){
	echo "Divided Successfully(hospital).<br>";
}
else{
	echo "Error Divided!!(hospital)".mysqli_error($con);
}

$sql_g ="UPDATE government SET amount_Pfizer = amount_Pfizer - $Pfizer WHERE country = 'United States'";
$ret_g = mysqli_query($con, $sql_g);
if($ret_g){
	echo "Dividing Successfully(government).<br>";
}
else{
	echo "Error Dividing!!(government)".mysqli_error($con);
}

mysqli_close($con);
echo "<br><a href='government.php'><--Privious Page</a>";

?>