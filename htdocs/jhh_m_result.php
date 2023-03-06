<?php

   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속실패");

   function vaccinate_M($con, $hospital, $ssn){
      echo "<h1> ⦁Vaccination Result </h1>";

      $sql = "SELECT * FROM people WHERE ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
      }
      else{
         echo "Wrong Data!!";
         exit();
      }

      $sql = "SELECT * FROM people WHERE 2st_vaccination_date IS NOT NULL AND 2st_vaccination_date!='0000:00:00' AND ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
         echo "Already done for 2st vaccination.";
         echo "<br> <a href='jhh.php'> <--Johns Hopkins Hospital</a> ";
         exit();
      }

      $sql = "SELECT * FROM people WHERE vaccine = 'Pfizer' AND ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
         echo "Different with 1st Vaccine !! (1st Pfizer)";
         echo "<br> <a href='jhh.php'> <--Johns Hopkins Hospital</a> ";
         exit();
      }

      $sql = "SELECT * FROM people WHERE (1st_vaccination_date IS NULL OR 1st_vaccination_date='0000:00:00') AND ssn= '".$ssn."'"; 
      $ret = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($ret);
      if($row) {
         echo "1st Vaccination";
         $fst_date = date("Y-m-d", time());
         $scd_date = '0000:00:00';
      }
      else{
         $sql = "SELECT * FROM people WHERE (2st_vaccination_date IS NULL OR 2st_vaccination_date='0000:00:00') AND ssn= '".$ssn."'"; 
         $ret = mysqli_query($con, $sql);
         $row = mysqli_fetch_array($ret);
         if($row) {
         echo "2st Vaccination";
         $fst_date = $row['1st_vaccination_date'];
         $scd_date = date("Y-m-d", time());
         }
      }

      $sql_h = "UPDATE hospital SET residual_Moderna = residual_Moderna - 1 WHERE name = 'Johns Hopkins Hospital'";
      $ret_h = mysqli_query($con, $sql_h);
      if($ret_h){
         echo "Vaccination Success.<br>";
      }
      else{
         echo "Vaccination Failure: ".mysqli_error($con);
      }
      
      $sql = "UPDATE people SET vaccination_hospital='".$hospital."', 1st_vaccination_date='".$fst_date."',
      2st_vaccination_date='".$scd_date."', vaccine='Moderna' WHERE ssn= '".$ssn."'"; 
       
      $ret=mysqli_query($con, $sql);
      if($ret) {
          echo "Update Success";
      }
      else {
          echo "Update Failure:".mysqli_error($con);
      }
      mysqli_close($con);
   }

   $name = $_POST["name"];
   $ssn = $_POST["ssn"];
   $vaccination_hospital = 'Johns Hopkins Hospital';

   vaccinate_M($con, $vaccination_hospital, $ssn);
   
   echo "<br> <a href='jhh.php'> <--Johns Hopkins Hospital</a> ";
   echo "<br> <a href='index_us.php'> <--Population</a> ";

?>