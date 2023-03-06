<html>
   <head>
      <META http-eqiuiv="content-type" content="text/html; charset=utf-8">
		
   </head>
   <body>
	  <h1> National Information Check </h1>
      </FORM>
   <body>
   
</html>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("Failed to connect to MySQL");

   $sql="SELECT * FROM people WHERE ssn='".$_POST['ssn']."' AND country='United States'";
   $ret=mysqli_query($con, $sql);
   if($ret){
   $count = mysqli_num_rows($ret);
   if($count==0) {
      echo $_POST['ssn']." The citizens of the resident registration number do not exist."."<br>";
      echo "<br> <a href='american.php'><--Privious Page</a>";
      exit();
      }
     }
   else{
      echo "Failed to check the data"."<br>";
      echo"The reason for the failure:".mysqli_error($con);
      echo"<br> <a href='american.php'><--Privious Page</a>";
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
   echo "<TH>ssn</TH><TH>name</TH><TH>sex</TH><TH>phone number</TH><TH>country</TH><TH>location</TH><TH>positive</TH><TH>pcr date</TH>";
   echo "<TH>vaccination hospital</TH><TH>vaccine</TH><TH>1st vaccination date</TH><TH>2st vaccination date</TH><TH>side effect</TH><TH>hospitalization hospital</TH><TH>hospitalization date</TH><TH>discharge date</TH><TH>deathday</TH>";
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
   echo "<br> <a href='american.php'> <--Previous Page</a>"; 
   echo "<br> <a href='index_us.php'> <--Initial Page</a>";
?>