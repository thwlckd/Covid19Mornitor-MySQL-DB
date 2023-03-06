<?php
  $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

  $pcr_date = $_POST["pcr_date"];
  $name = $_POST["name"];
  $ssn = $_POST["ssn"];
  $positive = $_POST["positive"];


  if($positive==' '){
    $sql = "SELECT * FROM people WHERE ssn='".$ssn."'";
    $ret=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($ret);
    $positive=$row['positive'];

    if($row['positive']==NULL){
      $sql = "UPDATE people SET pcr_date='".$pcr_date."', positive=NULL WHERE ssn= '".$ssn."'"; 
  
      $ret=mysqli_query($con, $sql);
      if($ret) {
          echo "PCR 검사 결과 성공적으로 수정됨.";
      }
      else {
          echo "데이터 수정 실패"."<br>";
          echo "실패 원인 :".mysqli_error($con);
      }
  
    }
    else{
      $sql = "UPDATE people SET pcr_date='".$pcr_date."', positive='".$positive."' WHERE ssn= '".$ssn."'"; 
  
      $ret=mysqli_query($con, $sql);
      if($ret) {
          echo "PCR 검사 결과 성공적으로 수정됨.";
      }
      else {
          echo "데이터 수정 실패"."<br>";
          echo "실패 원인 :".mysqli_error($con);
      }
    }
  }
  else{
    $sql = "UPDATE people SET pcr_date='".$pcr_date."', positive='".$positive."' WHERE ssn= '".$ssn."'"; 
  
      $ret=mysqli_query($con, $sql);
      if($ret) {
          echo "PCR 검사 결과 성공적으로 수정됨.";
      }
      else {
          echo "데이터 수정 실패"."<br>";
          echo "실패 원인 :".mysqli_error($con);
      }
  }




  mysqli_close($con);

  echo "<br> <a href='pcr_select.php'> <--PCR검사 페이지</a> ";
?>