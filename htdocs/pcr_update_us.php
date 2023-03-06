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
          echo "Complete PCR Update!";
      }
      else {
          echo "Error!".mysqli_error($con);
      }
  
    }
    else{
      $sql = "UPDATE people SET pcr_date='".$pcr_date."', positive='".$positive."' WHERE ssn= '".$ssn."'"; 
  
      $ret=mysqli_query($con, $sql);
      if($ret) {
        echo "Complete PCR Update!";
      }
      else {         
        echo "Error!".mysqli_error($con);
      }
    }
  }
  else{
    $sql = "UPDATE people SET pcr_date='".$pcr_date."', positive='".$positive."' WHERE ssn= '".$ssn."'"; 
  
      $ret=mysqli_query($con, $sql);
      if($ret) {
        echo "Complete PCR Update!";
      }
      else {
        echo "Error!".mysqli_error($con);

      }
  }




  mysqli_close($con);

  echo "<br> <a href='pcr_select_us.php'> <--PCR Page</a> ";
?>