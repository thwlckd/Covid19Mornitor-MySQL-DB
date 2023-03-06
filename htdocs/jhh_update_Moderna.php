<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "1234";
$db_name="covid-19";
$con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL connection failed!!");

$Moderna = $_POST["residual_Moderna"];

echo "<h1> Moderna Vaccine Division Results </h1>";

$sql_h = "UPDATE hospital SET residual_Moderna = residual_Moderna + $Moderna WHERE name = 'Johns Hopkins Hospital'";
$ret_h = mysqli_query($con, $sql_h);
if($ret_h){
	echo "Successfully distributed vaccines(Hospital).<br>";
}
else{
	echo "Failed to division vaccines!!(Hospital)". "<br>";
	echo "The reason why I failed: ".mysqli_error($con);
}

$sql_g ="UPDATE government SET amount_Moderna = amount_Moderna - $Moderna WHERE country = 'United States'";
$ret_g = mysqli_query($con, $sql_g);
if($ret_g){
	echo "Successfully distributed vaccines(Government).<br>";
}
else{
	echo "Failed to division vaccines!!(Government)". "<br>";
	echo "The reason why I failed: ".mysqli_error($con);
}

mysqli_close($con);
echo "<br><a href='jhh.php'><--Back</a>";

?>