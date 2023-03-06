<html lang="kr">
	<head>
	<meta charset="UTF-8">
<style rel="stylesheet">
body {
  background-color: #d7d8d6;
}
body * {
  box-sizing: border-box;
}

.header {
  background-color: #8b8b8b;
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
  border: 1px solid #707070;
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
  color: #000000;
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
  background-color: #ececec;
  font-weight: 200;
}
table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n+1) {
  background-color: #f3f3f3;
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
    color: #d1d1d1;
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
    background-color: #e4e4e4;
    border-bottom: 1px solid #cccccc;
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
    border: 1px solid #cacaca;
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
<body>

<div class="table-users">
   <div class="header"><h3>Patient information</h3></div>
<?php
	$con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("covid-19 Failed to connect !!");	
	$sql ="SELECT * FROM people WHERE hospitalization_hospital = 'New York University Hospital'"; 
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
 
	//echo "<h1> ⦁Patient information </h1>";
  echo "<TABLE border=1>";
	echo "<TR>";
	echo "<TH>Ssn</TH><TH>Name</TH><TH>Sex</TH><TH>Phone number</TH><TH>Country</TH><TH>Location</TH><TH>Positive</TH><TH>Pcr date</TH>";
	echo "<TH>Vaccination hospital</TH><TH>vaccine</TH><TH>1st Vaccination date</TH><TH>2nd Vaccination date</TH><TH>Side effect</TH><TH>Hospitalization hospital</TH><TH>Hospitalization date</TH><TH>Discharge date</TH><TH>Deathday</TH>";
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
?>

<HTML>
	<HEAD>
		<META http-eqiuiv="content-type" content="text/html; charset=utf-8">
	</HEAD>
	<BODY>
		<FORM METHOD="post" ACTION="nyuh_update.php">
        Modify the information - NAME: <INPUT TYPE = "text" NAME="name" VALUE>  SSN: <INPUT TYPE = "text" NAME="ssn" VALUE>
			<INPUT TYPE="submit" VALUE="Modify">
			<br> <a href='nyuh.php'> <-Back to New York University Hospital Homepage</a><br><br>
		</FORM>
	</BODY>
</HTML>
