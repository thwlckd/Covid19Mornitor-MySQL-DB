<!doctype html>
<html lang="kr">
	<head>
	<meta charset="UTF-8">
<style rel="stylesheet">
body {
  background-color: #91ced4;
}
body * {
  box-sizing: border-box;
}

.header {
  background-color: #327a81;
  color: white;
  font-size: 1.5em;
  padding: 1rem;
  text-align: center;
  text-transform: uppercase;
}

img {
  border-radius: 50%;
  height: 60px;
  width: 60px;
}

.table-users {
  border: 1px solid #327a81;
  border-radius: 10px;
  box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  max-width: calc(100% - 2em);
  margin:  0;
  overflow: hidden;
  width: 1900px;
}

table {
  width: 100%;
}
table td, table th {
  color: #2b686e;
  padding: 5px;
}
table td {
  text-align: center;
  vertical-align: middle;
}
table td:last-child {
  font-size: 0.7em;
  line-height: 1.4;
  text-align: left;
}
table th {
  background-color: #daeff1;
  font-weight: 200;
}
table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n+1) {
  background-color: #edf7f8;
}

@media screen and (max-width: 500px) {
  table, tr, td {
    display: block;
  }

  td:first-child {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    width: 100px;
  }
  td:not(:first-child) {
    clear: both;
    margin-left: 100px;
    padding: 4px 20px 4px 90px;
    position: relative;
    text-align: left;
  }
  td:not(:first-child):before {
    color: #91ced4;
    content: '';
    display: block;
    left: 0;
    position: absolute;
  }

  tr {
    padding: 10px 0;
    position: relative;
  }
  tr:first-child {
    display: none;
  }
}
@media screen and (max-width: 500px) {
  .header {
    background-color: transparent;
    color: white;
    font-size: 2em;
    font-weight: 700;
    padding: 0;
    text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
  }


  td:first-child {
    background-color: #c8e7ea;
    border-bottom: 1px solid #91ced4;
    border-radius: 10px 10px 0 0;
    position: relative;
    top: 0;
    -webkit-transform: translateY(0);
            transform: translateY(0);
    width: 100%;
  }
  td:not(:first-child) {
    margin: 0;
    padding: 5px 1em;
    width: 100%;
  }
  td:not(:first-child):before {
    font-size: .8em;
    padding-top: 0.3em;
    position: relative;
  }
  td:last-child {
    padding-bottom: 1rem !important;
  }

  tr {
    background-color: white !important;
    border: 1px solid #6cbec6;
    border-radius: 10px;
    box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
    margin: 0.5rem 0;
    padding: 0;
  }

  .table-users {
    border: none;
    box-shadow: none;
    overflow: visible;
  }
}

</style>
</head>
<HTML>
	<HEAD>
		<META http-eqiuiv="content-type" content="text/html; charset=utf-8">
	</HEAD>
	<BODY>
	<h1> National Information </h1>
		<FORM METHOD="post" ACTION="american_check.php">
			Information Check - Name: <INPUT TYPE = "text" NAME="name" >  ssn: <INPUT TYPE = "text" NAME="ssn">
			<INPUT TYPE="submit" VALUE="Check">
			<br>
		</FORM>
		<h4><a href='american_insert.php'> =>Information_Add </a> <h4>
	</BODY>
</HTML>

<?php
   echo " <a href='index_us.php'> <--Previous screen<br></a>";
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("Failed to connect to covid-19!!");

   $sql ="SELECT * FROM people WHERE country='United States'";

 
   $ret = mysqli_query($con, $sql);
 
   if($ret) {
      $count = mysqli_num_rows($ret);
   }
   else {
      echo "Failed to create people!!!"."<br>";
      echo "The reason for the failure :".mysqli_error($con);
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
   echo "<TD>", $row['pcr_date'], "</TD>";
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
   
?>


