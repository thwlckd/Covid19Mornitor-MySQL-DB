<?php

   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속실패");

   function vaccinate_M($con, $hospital, $ssn){
      echo "<h1> ⦁접종 결과 </h1>";

      $sql = "SELECT * FROM people WHERE ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
      }
      else{
         echo "잘못된 국민 정보입니다.";
         exit();
      }

      $sql = "SELECT * FROM people WHERE 2st_vaccination_date IS NOT NULL AND 2st_vaccination_date!='0000:00:00' AND ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
         echo "2차 접종까지 완료한 인원입니다.";
         echo "<br> <a href='knu.php'> <--경북대병원</a> ";
         exit();
      }

      $sql = "SELECT * FROM people WHERE vaccine = 'Pfizer' AND ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
         echo "교차접종 불가!! (1차 화이자)";
         echo "<br> <a href='knu.php'> <--경북대병원</a> ";
         exit();
      }

      $sql = "SELECT * FROM people WHERE (1st_vaccination_date IS NULL OR 1st_vaccination_date='0000:00:00') AND ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
         echo "1차 접종 인원입니다.";
         $fst_date = date("Y-m-d", time());
         $scd_date = '0000:00:00';
      }
      else{
         $sql = "SELECT * FROM people WHERE (2st_vaccination_date IS NULL OR 2st_vaccination_date='0000:00:00') AND ssn= '".$ssn."'"; 
         $ret = mysqli_query($con, $sql);
         $row = mysqli_fetch_array($ret);
         if($row) {
         echo "2차 접종 인원입니다.";
         $fst_date = $row['1st_vaccination_date'];
         $scd_date = date("Y-m-d", time());
         }
      }

      $sql_h = "UPDATE hospital SET residual_Moderna = residual_Moderna - 1 WHERE name = '경북대병원'";
      $ret_h = mysqli_query($con, $sql_h);
      if($ret_h){
         echo "백신 접종 완료.<br>";
      }
      else{
         echo "접종 실패!!(병원)". "<br>";
         echo "실패 원인: ".mysqli_error($con);
      }
      
      $sql = "UPDATE people SET vaccination_hospital='".$hospital."', 1st_vaccination_date='".$fst_date."',
      2st_vaccination_date='".$scd_date."', vaccine='Moderna' WHERE ssn= '".$ssn."'"; 
       
      $ret=mysqli_query($con, $sql);
      if($ret) {
          echo "데이터가 성공적으로 수정됨.";
      }
      else {
          echo "데이터 수정 실패"."<br>";
          echo "실패 원인 :".mysqli_error($con);
      }
      mysqli_close($con);
   }

   $name = $_POST["name"];
   $ssn = $_POST["ssn"];
   $vaccination_hospital = '경북대병원';

   vaccinate_M($con, $vaccination_hospital, $ssn);
   
   echo "<br> <a href='knu.php'> <--경북대병원</a> ";
   echo "<br> <a href='korean.php'> <--국민조회</a> ";

?>