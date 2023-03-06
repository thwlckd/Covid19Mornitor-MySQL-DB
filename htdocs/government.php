<HTML>
    <HEAD>
        <META http-equiv="content-type" content="text/html; charset=utf-8">
    </HEAD>
    <BODY>
        <h1> 코로나-19 현황 </h1>
        <nav>
            <ul>
                <li><a href = 'Pfizer.php'> 화이자 </a></li>
                <li><a href = 'Moderna.php'> 모더나 </a></li>
                <li><a href = 'Yu.php'> 영남대병원 </a></li>
                <li><a href = 'Knu.php'> 경북대병원 </a></li>
                <li><a href = 'DG.php'> 대구병원 </a></li>
                <li><a href = 'korean.php'> 국민 </a></li>
            </ul>
        <nav>
    </BODY>
</HTML>


<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "1234";
    $db_name="covid-19";
    $con=mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    function pos_loc($console, $loc){
        $sql = "SELECT * FROM people WHERE (positive IS NOT NULL) AND (positive != '') AND (location = '$loc')";
        $ret = mysqli_query($console, $sql);

        return mysqli_num_rows($ret);
    }

    function die_loc($console, $loc){
        $sql = "SELECT * FROM people WHERE (deathday IS NOT NULL) AND (deathday != '00-00-00 00:00:00') AND (location = '$loc')";
        $ret = mysqli_query($console, $sql);

        return mysqli_num_rows($ret);
    }

    function sql_date($console, $attr){
        $sql = "SELECT * FROM people WHERE ($attr IS NOT NULL) AND ($attr != '00-00-00')  AND (country='대한민국')";
        $ret = mysqli_query($console, $sql);
        if($ret) {
        }
        else{
            echo "covid-19 데이터 조회 실패..."."<br>";
            echo "실패 원인 :".mysqli_error($console);
            exit();
        }
        return mysqli_num_rows($ret);
    }

    function sql_str($console, $attr){
        $sql = "SELECT * FROM people WHERE ($attr IS NOT NULL) AND ($attr != '') AND (country='대한민국')";
        $ret = mysqli_query($console, $sql);
        if($ret) {
        }
        else{
            echo "covid-19 데이터 조회 실패..."."<br>";
            echo "실패 원인 :".mysqli_error($console);
            exit();
        }
        return mysqli_num_rows($ret);
    }

    $sql = "SELECT * FROM government WHERE country='대한민국'";
    $ret = mysqli_query($con, $sql);
    if($ret) {
    }
    else{
        echo "covid-19 데이터 조회 실패..."."<br>";
        echo "실패 원인 :".mysqli_error($console);
        exit();
    }
    $row = mysqli_fetch_array($ret);

    $population = sql_str($con, 'ssn');
    echo "인구: ", $population, "<br>";
    echo "거리두기단계: ", $row['distance_working'], "<br>";
    echo "감염자(현재): ", sql_date($con, 'positive'), "(", sql_str($con, 'positive'), ")<br>";
    echo "사망자: ", sql_date($con, 'deathday'), "<br>";
    echo "1차 접종자 수: ", sql_date($con, '1st_vaccination_date'), "<br>";
    echo "1차 접종률: ", sql_date($con, '1st_vaccination_date') / $population * 100, "%<br>";
    echo "2차 접종자 수: ", sql_date($con, '2st_vaccination_date'), "<br>";
    echo "2차 접종률: ", sql_date($con, '2st_vaccination_date') / $population * 100, "%<br>";
    echo "보유 백신(화이자): ", $row['amount_Pfizer'], "<br>";
    echo "보유 백신(모더나): ", $row['amount_Moderna'], "<br><br>";

    echo "<TABLE border=1>";
    echo "<TR>";
    echo "<TH></TH><TH>서울특별시</TH><TH>인천광역시</TH><TH>경기도</TH><TH>강원도</TH><TH>충청북도</TH>";
    echo "<TH>충청남도</TH><TH>대전광역시</TH><TH>대구광역시</TH><TH>경상북도</TH><TH>경상남도</TH>";
    echo "<TH>부산광역시</TH><TH>전라북도</TH><TH>전라남도</TH><TH>제주특별시</TH>";
    echo "</TR>";

    echo "<TR>";
	echo "<TD>감염자</TD>";
	echo "<TD>", pos_loc($con, "서울특별시"), "</TD>";
	echo "<TD>", pos_loc($con, "인천광역시"), "</TD>";
    echo "<TD>", pos_loc($con, "경기도"), "</TD>";
	echo "<TD>", pos_loc($con, "강원도"), "</TD>";
    echo "<TD>", pos_loc($con, "충청북도"), "</TD>";
	echo "<TD>", pos_loc($con, "충청남도"), "</TD>";
    echo "<TD>", pos_loc($con, "대전광역시"), "</TD>";
	echo "<TD>", pos_loc($con, "대구광역시"), "</TD>";
    echo "<TD>", pos_loc($con, "경상북도"), "</TD>";
	echo "<TD>", pos_loc($con, "경상남도"), "</TD>";
    echo "<TD>", pos_loc($con, "부산광역시"), "</TD>";
    echo "<TD>", pos_loc($con, "전라북도"), "</TD>";
	echo "<TD>", pos_loc($con, "전라남도"), "</TD>";
    echo "<TD>", pos_loc($con, "제주특별시"), "</TD>";
	echo "</TR>";

    echo "<TR>";
	echo "<TD>사망자</TD>";
	echo "<TD>", die_loc($con, "서울특별시"), "</TD>";
	echo "<TD>", die_loc($con, "인천광역시"), "</TD>";
    echo "<TD>", die_loc($con, "경기도"), "</TD>";
	echo "<TD>", die_loc($con, "강원도"), "</TD>";
    echo "<TD>", die_loc($con, "충청북도"), "</TD>";
	echo "<TD>", die_loc($con, "충청남도"), "</TD>";
    echo "<TD>", die_loc($con, "대전광역시"), "</TD>";
	echo "<TD>", die_loc($con, "대구광역시"), "</TD>";
    echo "<TD>", die_loc($con, "경상북도"), "</TD>";
	echo "<TD>", die_loc($con, "경상남도"), "</TD>";
    echo "<TD>", die_loc($con, "부산광역시"), "</TD>";
    echo "<TD>", die_loc($con, "전라북도"), "</TD>";
	echo "<TD>", die_loc($con, "전라남도"), "</TD>";
    echo "<TD>", die_loc($con, "제주특별시"), "</TD>";
	echo "</TR>";
    echo "</TABLE>";

    mysqli_close($con);
?>