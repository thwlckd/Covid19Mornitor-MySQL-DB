
<?php
	$con = mysqli_connect("localhost", "root", "1234", "covid-19") or die ("MySQL 접속 실패!!");
	
	$distance_working = $_POST["distance_working"];
	
	
	$sql2 = "UPDATE government SET distance_working='$distance_working' WHERE country='United States'";
	
	$ret = mysqli_query($con, $sql2);
	
	echo "<h1> Social Distancing Level Set-Up Result </h1>";
	if($ret)
	{
		echo"Data Saved Successfully .";
	}
	else
	{
		echo "Data Saved fail!!!"."<br>";
		echo "Cause of failur:".mysqli_error($con);
	}
	mysqli_close($con);
	
	echo "<br> <a href='index_us.php'><-- Inital Screen</a>"
?>
