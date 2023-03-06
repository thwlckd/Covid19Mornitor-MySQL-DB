<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속실패");

   $sql="SELECT * FROM people WHERE ssn='".$_POST['ssn']."' AND (hospitalization_hospital = '대구병원' OR hospitalization_hospital is NULL)";
   $ret=mysqli_query($con, $sql);
   if($ret){
   $count = mysqli_num_rows($ret);
   if($count==0) {
      echo $_POST['ssn']." 해당 ssn의 국민이 존재하지않습니다."."<br>";
      echo "<br> <a href='dg_select.php'><--초기화면</a>";
      exit();
      }
     }
   else{
      echo "데이터 조회실패"."<br>";
      echo"실패원인:".mysqli_error($con);
      echo"<br> <a href='dg_select.php'><--초기화면</a>";
      exit();
   }
  
   function date_default($date){
      if($date=='0000-00-00' | $date=='0000-00-00 00:00:00'){
          $date='';
      }
      return $date;
   }

   $row=mysqli_fetch_array($ret);
   $name = $row['name'];
   $ssn = $row['ssn'];
   $hospitalization_hospital = date_default($row['hospitalization_hospital']);
   $hospitalization_date = date_default($row['hospitalization_date']);
   $discharge_date = date_default($row['discharge_date']);
   $deathday = date_default($row['deathday']);

   mysqli_close($con);

?>


<html>
<head>
<meta http-equiv="content-type" content="text.php; charset=UTF-8">
</head>
<body>

<h1> ⦁환자 정보 수정 </h1>

<FORM METHOD="post" ACTION="dg_update_result.php">
   이름 : <INPUT TYPE ="text" NAME="name" VALUE=<?php echo $name ?> READONLY> <br>
   주민등록번호 : <INPUT TYPE ="text" NAME="ssn" VALUE=<?php echo $ssn ?> READONLY> <br>
   입원병원:<INPUT TYPE ="text" NAME="hospitalization_hospital" VALUE=<?php echo '대구병원' ?> READONLY><br>
   입원일: <INPUT TYPE ="text" NAME="hospitalization_date" VALUE=<?php echo $hospitalization_date ?>> <br>
   퇴원일: <INPUT TYPE ="text" NAME="discharge_date" VALUE=<?php echo $discharge_date ?>> <br>
   사망일: <INPUT TYPE ="text" NAME="deathday" VALUE=<?php echo $deathday ?>> <br>
   <br><br>
   <INPUT TYPE ="submit" VALUE="정보수정">
</FORM>

<body>
</html>