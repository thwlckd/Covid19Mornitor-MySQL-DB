
<?php
	$con = mysqli_connect("localhost", "root", "1234", "covid-19") or die ("MySQL 접속 실패!!");
	
	$name = $_POST["name"];
	$ssn = $_POST["ssn"];
	$sex = $_POST["sex"];
    $phone_number = $_POST["phone_number"];
	$location = $_POST["location"];
   
	$sql  = "
		INSERT INTO people 
		VALUES 
		(
			'".$ssn."',
			'".$name."',
			'".$sex."',
			'".$phone_number."',
			'United States',
			'".$location."',
			null,null,null,null,null,null,null,null,null,null,null
		)";

	$ret = mysqli_query($con, $sql);
	if($ret === false){
		echo "Insert Error", mysqli_error($con);
	}
	else{
    echo "Insert Successfully!!";
	}
	
	echo "<br> <a href='american.php'><--Population Page</a>";

	mysqli_close($con);

?>
