<html>
   <head>
      <META http-eqiuiv="content-type" content="text/html; charset=utf-8">
		
   </head>
   <body>
	  <h1> 국민 정보 조회 </h1>
      </FORM>
   <body>
   
</html>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("Failed to connect to MySQL");

   $sql="SELECT * FROM people WHERE ssn='".$_POST['ssn']."' AND country='대한민국'";
   $ret=mysqli_query($con, $sql);
   if($ret){
      $count = mysqli_num_rows($ret);
      if($count==0){
         echo $_POST['ssn']."등록되지 않은 국민 입니다."."<br>";
         echo "<br> <a href='korean.php'><--Privious Page</a>";
         exit();
      }
   }
   else{
      echo "데이터 조회 실패! ".mysqli_error($con);
      echo"<br> <a href='korean.php'><--Privious Page</a>";
      exit();
   }

   function date_default($date){
      if($date=='0000-00-00' | $date=='0000-00-00 00:00:00'){
          $date='';
      }
      return $date;
   }

   echo "<TABLE border=1>";
   echo "<TR>";
	echo "<TH>주민번호</TH><TH>이름</TH><TH>성별</TH><TH>전화번호</TH><TH>나라</TH><TH>거주지역</TH><TH>확진</TH><TH>검사날짜</TH>";
	echo "<TH>접종병원</TH><TH>접종 백신</TH><TH>1차백신 접종날</TH><TH>2차백신 접종날</TH><TH>부작용</TH><TH>입원병원</TH><TH>입원날</TH><TH>퇴원날</TH><TH>사망일자</TH>";
   echo "</TR>";
   while($row = mysqli_fetch_array($ret)) {
       $pcr_date = date_default($row['pcr_date']);
       $fst_vaccination_date = date_default($row['1st_vaccination_date']);
       $scd_vaccination_date = date_default($row['2st_vaccination_date']);
       $hospitalization_date = date_default($row['hospitalization_date']);
       $discharge_date = date_default($row['discharge_date']);
       $deathday = date_default($row['deathday']);

      echo "<TR>";
      echo "<TD>", $row['ssn'], "</TD>";
      echo "<TD>", $row['name'], "</TD>";
      echo "<TD>", $row['sex'], "</TD>";
      echo "<TD>", $row['phone_number'], "</TD>";
      echo "<TD>", $row['country'], "</TD>";
      echo "<TD>", $row['location'], "</TD>";
      echo "<TD>", $row['positive'], "</TD>";
      echo "<TD>", $pcr_date, "</TD>";
      echo "<TD>", $row['vaccination_hospital'], "</TD>";
      echo "<TD>", $row['vaccine'], "</TD>";
      echo "<TD>", $fst_vaccination_date, "</TD>";
      echo "<TD>", $scd_vaccination_date, "</TD>";
      echo "<TD>", $row['side_effect'], "</TD>";
      echo "<TD>", $row['hospitalization_hospital'], "</TD>";
      echo "<TD>", $hospitalization_date, "</TD>";
      echo "<TD>", $discharge_date, "</TD>";
      echo "<TD>", $deathday, "</TD>";
      echo "</TR>";
   }
   
   mysqli_close($con);
   echo "</TABLE>"."<br>";
   echo "<br> <a href='korean.php'> <--이전화면</a>"; 
   echo "<br> <a href='index_kor.php'> <--초기화면</a>";
?>