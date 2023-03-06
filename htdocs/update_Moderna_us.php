<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "1234";
$db_name="covid-19";
$con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

$Moderna = $_POST["residual_Moderna"];

echo "<h1> Dividing Moderna  </h1>";

$sql_h = "UPDATE hospital SET residual_Moderna = residual_Moderna + $Moderna";
$ret_h = mysqli_query($con, $sql_h);
if($ret_h){
	echo "Divided Successfully(hospital).<br>";
}
else{
	echo "Error Divided!!(hospital)".mysqli_error($con);
}

$sql_g ="UPDATE government SET amount_Moderna = amount_Moderna - $Moderna WHERE country = 'United States'";
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