<html>
  <head>
    <meta http-equiv="content-type" content="text.php; charset=UTF-8">
  </head>
  <body>
    <h1> ⦁PCR 검사 인원</h1>
    <FORM METHOD="post" ACTION="pcr_update.php">
      PCR 검사일: <INPUT TYPE ="text" NAME="pcr_date" VALUE=<?php echo date("Y-m-d") ?>> <br>
      이름 : <INPUT TYPE ="text" NAME="name" >
      주민등록번호 : <INPUT TYPE ="text" NAME="ssn" > <br>
      확진여부: 알파<INPUT TYPE ="radio" NAME="positive" VALUE='알파'>
      델타<INPUT TYPE ="radio" NAME="positive" VALUE='델타'>
      델타+<INPUT TYPE ="radio" NAME="positive" VALUE='델타+'>
      오미크론<INPUT TYPE ="radio" NAME="positive" VALUE='오미크론'>
      / 완치(음성)<INPUT TYPE ="radio" NAME="positive" VALUE=''>
      변동없음<INPUT TYPE ="radio" NAME="positive" VALUE=' ', CHECKED="checked">
      <br><br>
      <INPUT TYPE ="submit" VALUE="결과제출">
    </FORM>
  <body>
</html>

<?php 
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속실패");


$sql ="SELECT * FROM people WHERE country='대한민국'"; 
   $ret = mysqli_query($con, $sql);
   if($ret) {
      $count = mysqli_num_rows($ret);
   }
   else {
      echo "people 생성 실패!!!"."<br>";
      echo "실패 원인 :".mysqli_error($con);
      exit();
   }
   function date_default($date){
        if($date=='0000-00-00' | $date=='0000-00-00 00:00:00'){
            $date='';
        }
        return $date;
  }
   
  echo "<br> <TABLE border=1>";
  echo "<TR>";
  echo "<TH>이름</TH><TH>주민번호</TH><TH>확진</TH><TH>검사날짜</TH>";
  echo "</TR>";
   
  while($row = mysqli_fetch_array($ret)) 
  {
   
      $pcr_date = date_default($row['pcr_date']);
      

      echo "<TR>";
      echo "<TD>", $row['name'], "</TD>";
      echo "<TD>", $row['ssn'], "</TD>";
      echo "<TD>", $row['positive'], "</TD>";
      echo "<TD>", $pcr_date, "</TD>";
      echo "</TR>";
  }
      mysqli_close($con);
   
      echo "</TABLE>"."<br>";



  echo "<br> <a href='index_kor.php'> <--홈페이지 </a> "; 

?>
