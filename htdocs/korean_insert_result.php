
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
			'대한민국',
			'".$location."',
			null,null,null,null,null,null,null,null,null,null,null
		)";

	$ret = mysqli_query($con, $sql);
	if($ret === false){
		echo "Insert Error", mysqli_error($con);
	}
	else{
    echo "국민 정보 추가 성공!!";
	}
	
	echo "<br> <a href='korean.php'><--국민페이지</a>";

	mysqli_close($con);

?>
