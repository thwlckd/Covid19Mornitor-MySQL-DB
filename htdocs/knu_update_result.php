<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속실패");
   
    $ssn = $_POST["ssn"];
    $hospitalization_hospital = $_POST["hospitalization_hospital"];
    $hospitalization_date = $_POST["hospitalization_date"];
    $discharge_date = $_POST["discharge_date"];
    $deathday = $_POST["deathday"];

    function date_default($date){
        if($date==''){
            $date='00-00-00';
        }
        return $date;
    }
    $hospitalization_hospital = date_default($hospitalization_hospital);
    $hospitalization_date = date_default($hospitalization_date);
    $discharge_date = date_default($discharge_date);
    $deathday = date_default($deathday);

    $sql = "UPDATE people SET hospitalization_hospital ='".$hospitalization_hospital."' ,hospitalization_date='".$hospitalization_date."', discharge_date='".$discharge_date."',deathday='".$deathday."' WHERE ssn= '".$ssn."'"; 
    
    $ret=mysqli_query($con, $sql);

    echo "<h1> ⦁환자 정보 수정 결과 </h1>";
    if($ret) {
        echo "데이터가 성공적으로 수정됨.";
    }
    else {
        echo "데이터 수정 실패"."<br>";
        echo "실패 원인 :".mysqli_error($con);
    }
    mysqli_close($con);
    echo "<br> <a href='knu_select.php'> <--환자조회</a> ";
?>