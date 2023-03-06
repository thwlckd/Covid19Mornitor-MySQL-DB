<?php
   $con=mysqli_connect("localhost","root","1234","covid-19") or die("MySQL 접속 실패 !!");
   
   $id = $_POST["id"];
   $pwd = $_POST["pwd"];

   $sql ="SELECT * FROM administrator WHERE id = '$id'";
   $ret = mysqli_query($con, $sql);
   if($ret) {
   }
   else{
       echo "covid-19 데이터 조회 실패..."."<br>";
       echo "실패 원인 :".mysqli_error($console);
       exit();
   }
   
   $row = mysqli_fetch_array($ret);
   
   if($row != NULL){
      if($pwd == $row["pwd"]){
         $country = $row["country"];

         if($country=='대한민국'){
            echo '<script type="text/javascript">'; 
            echo 'window.location.href = "index_kor.php";';
            echo '</script>';
 
         }
         else{
            echo '<script type="text/javascript">'; 
            echo 'window.location.href = "index_us.php";';
            echo '</script>';
 
         }
      }
      else{
         echo "Wrong Login Data!!";
         echo "<br> <a href='Home.html'> <- Re-Login</a>";
      }
   }
   else{
      echo "Wrong Login Data!!";
      echo "<br> <a href='Home.html'> <- Re-Login</a>";
   }

   mysqli_close($con);
   echo "<br> <a href='Home.html'> <- Re-Login</a>";

?>