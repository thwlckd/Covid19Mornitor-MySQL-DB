<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("Failed to connect MySQL !!");
   
    $ssn = $_POST["ssn"];
    $hospitalization_date = $_POST["hospitalization_date"];
    $discharge_date = $_POST["discharge_date"];
    $deathday = $_POST["deathday"];

    function date_default($date){
        if($date==''){
            $date='00-00-00';
        }
        return $date;
    }
    
    $hospitalization_date = date_default($hospitalization_date);
    $discharge_date = date_default($discharge_date);
    $deathday = date_default($deathday);

    $sql = "UPDATE people SET hospitalization_date='".$hospitalization_date."', discharge_date='".$discharge_date."',deathday='".$deathday."' WHERE ssn= '".$ssn."'"; 
    
    $ret=mysqli_query($con, $sql);

    echo "<h1> ⦁Results of patient information modification </h1>";
    if($ret) {
        echo "Data has been successfully modified.";
    }
    else {
        echo "Data modification failed."."<br>";
        echo "The reason for the failure :".mysqli_error($con);
    }
    mysqli_close($con);
    echo "<br> <a href='mc_select.php'> <--Patient information</a> ";
?>