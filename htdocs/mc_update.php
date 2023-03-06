<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("Failed to connect MySQL !!");

   $sql="SELECT * FROM people WHERE ssn='".$_POST['ssn']."' AND (hospitalization_hospital = 'Mayo Clinic' OR hospitalization_hospital is NULL)";
   $ret=mysqli_query($con, $sql);
   if($ret){
      $count = mysqli_num_rows($ret);
      if($count==0){
         echo $_POST['ssn'], " NOT FOUND.<br>";
         echo "<br> <a href='mc_select.php'><--Previous screen</a>";
         exit();
      }
   }
   else{
      echo "Failed to check the data."."<br>";
      echo"The reason for the failure:".mysqli_error($con);
      echo"<br> <a href='mc_select.php'><--Previous screen</a>";
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

<h1> ⦁Modify patient information </h1>

<FORM METHOD="post" ACTION="mc_update_result.php">
   Name : <INPUT TYPE ="text" NAME="name" VALUE=<?php echo $name ?> READONLY> <br>
   Ssn : <INPUT TYPE ="text" NAME="ssn" VALUE=<?php echo $ssn ?> READONLY> <br>
   Hospitalization hospital:<INPUT TYPE ="text" NAME="hospitalization_hospital" VALUE><br>
   Hospitalization date: <INPUT TYPE ="text" NAME="hospitalization_date" VALUE=<?php echo $hospitalization_date ?>> <br>
   Discharge date: <INPUT TYPE ="text" NAME="discharge_date" VALUE=<?php echo $discharge_date ?>> <br>
   Deathday: <INPUT TYPE ="text" NAME="deathday" VALUE=<?php echo $deathday ?>> <br>
   <br><br>
   <INPUT TYPE ="submit" VALUE="Update">
</FORM>

<body>
</html>