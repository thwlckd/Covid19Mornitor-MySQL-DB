
<?php
	$con = mysqli_connect("localhost", "root", "1234", "covid-19") or die ("MySQL 접속 실패!!");
	
	$distance_working = $_POST["distance_working"];
	
	
	$sql2 = "UPDATE government SET distance_working='$distance_working' WHERE country='대한민국'";
	
	$ret = mysqli_query($con, $sql2);
	
	echo "<h1> 거리두기단계 변경 결과 </h1>";
	if($ret)
	{
		echo"데이터가 성공적으로 수정됨.";
	}
	else
	{
		echo "데이터 수정 실패!!!"."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);
	
	echo "<br> <a href='index_kor.php'><-- 초기화면</a>"
?>
