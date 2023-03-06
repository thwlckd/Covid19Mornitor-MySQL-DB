<html>
  <head>
    <meta http-equiv="content-type" content="text.php; charset=UTF-8">
  </head>
  <body>
    <h1> ⦁PCR Check Person</h1>
    <FORM METHOD="post" ACTION="pcr_update_us.php">
      PCR Date: <INPUT TYPE ="text" NAME="pcr_date" VALUE=<?php echo date("Y-m-d") ?>> <br>
      Name : <INPUT TYPE ="text" NAME="name" >
      Ssn : <INPUT TYPE ="text" NAME="ssn" > <br>
      PCR Result: Alpha<INPUT TYPE ="radio" NAME="positive" VALUE='Alpha'>
      Delta<INPUT TYPE ="radio" NAME="positive" VALUE='Delta'>
      Delta+<INPUT TYPE ="radio" NAME="positive" VALUE='Delta+'>
      Omicron<INPUT TYPE ="radio" NAME="positive" VALUE='Omicron'>
      / Recover(Negative)<INPUT TYPE ="radio" NAME="positive" VALUE=''>
      Unchanged<INPUT TYPE ="radio" NAME="positive" VALUE=' ', CHECKED="checked">
      <br><br>
      <INPUT TYPE ="submit" VALUE="Update">
    </FORM>
  <body>
</html>

<?php 
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속실패");


$sql ="SELECT * FROM people WHERE country='United States'"; 
   $ret = mysqli_query($con, $sql);
   if($ret) {
      $count = mysqli_num_rows($ret);
   }
   else {
      echo "Error!".mysqli_error($con);
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
  echo "<TH>Name</TH><TH>Ssn</TH><TH>Positive</TH><TH>PCR Date</TH>";
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



  echo "<br> <a href='index_us.php'> <--Home Page </a> "; 

?>
