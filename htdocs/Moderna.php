<?php
    $con=mysqli_connect("localhost","root","1234","covid-19") or die("MySQL 접속 실패 !!");

    echo "<h1> Moderna </h1>";
    echo "<h2> 백신 생산 현황 </h2>";
    
    $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
    $ret = mysqli_query($con, $sql);
    if($ret) {

    }
    else{
        echo "covid-19 데이터 조회 실패..."."<br>";
        echo "실패 원인 :".mysqli_error($con);
        exit();
    }
    $row = mysqli_fetch_array($ret);

    echo "<TABLE border=1>";
    echo "<TR>";
    echo "<TH>백신 보유 현황</TH><TH>금일 생산량</TH><TH>누적 생산량</TH><TH>주간 생산 계획</TH>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>", $row['holding_vaccine'], "</TD>";
    echo "<TD>", $row['today_production'], "</TD>";
    echo "<TD>", $row['cumulative_production'], "</TD>";
    echo "<TD>", $row['monthly_production_plan'], "</TD>";
    echo "</TR>";
    echo "</TABLE><br>";

    echo "<h2> 백신 예방률 </h2>";
    echo "<TABLE border=1>";
    echo "<TR>";
    echo "<TH>1차 접종 예방률</TH><TH>2차 접종 예방률</TH>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>", $row['1st_preventive_rate'], "%</TD>";
    echo "<TD>", $row['2st_preventive_rate'], "%</TD>";
    echo "</TR>";
    echo "</TABLE><br>";

    function sql_side_effect($con, $str1, $str2){
        $sql ="SELECT * FROM people WHERE (side_effect LIKE '%$str1%' OR side_effect LIKE '%$str2%') AND vaccine = 'Moderna'";
        $ret = mysqli_query($con, $sql);
        if($ret) {
            $count=mysqli_num_rows($ret);
        }
        else{
            echo "covid-19 데이터 조회 실패..."."<br>";
            echo "실패 원인 :".mysqli_error($con);
            exit();
        }
        echo "<h3> $str1 $count 건<br></h3>";

        return $count;
    }
    
    echo "<h2> 부작용 현황 </h2>";
    $sum = sql_side_effect($con, '발열', 'cold');
    $sum += sql_side_effect($con, '근육통', 'muscle pain');
    $sum += sql_side_effect($con, '두통', 'headache');
    $sum += sql_side_effect($con, '알레르기', 'Allergie');
    echo "<h3> 총 $sum 건<br><br></h3>";
 
    mysqli_close($con);
?>

<HTML>
   <HEAD>
      <META http-equiv="content-type" content="text/html; charset=utf-8">
   </HEAD>
   <BODY>
      <h2> 생산량 갱신 </h2>
      <FORM METHOD="post" ACTION="update_Moderna_production.php">
	      금일 생산량 : <INPUT TYPE = "text" NAME = "today_production" VALUE=>
	      <INPUT TYPE="submit" VALUE="갱신">
      </FORM>
      <h2> 백신 주문 </h2>
      <FORM METHOD="post" ACTION="order_Moderna.php">
	      대한민국 : <INPUT TYPE = "text" NAME = "order_Moderna" VALUE=>
	      <INPUT TYPE="submit" VALUE="주문">
      </FORM>
   </BODY>
</HTML>

<?php echo "<br><a href='government.php'><--이전 화면</a>"; ?>