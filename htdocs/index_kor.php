<!DOCTYPE html>
<html lang="en">
    <head>
        <META http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>영남대 - covid-19 종합관리시스템</title>
        <!-- Favicon-->
<style type="text/css">
#info {height:250px;}

dl {font-family:돋움;font-size:15px;}
dt {font-weight:bold}
dl.bot_rgt {background:#7f7f9c url(/data/201012/IJ12929573850979/c_tl.gif) top left no-repeat; margin:5px 0 0 50px; padding:0; float:left; margin-right:10px; width:40%; display:inline;}
dl.bot_rgt dt {background:transparent url(/data/201012/IJ12929573850979/c_tr.gif) top right no-repeat; padding:10px; text-align:center; color:#fff;}
dl.bot_rgt dd {background:#eee url(/data/201012/IJ12929573850979/c_bl.gif) bottom left no-repeat; padding:0; margin:0;}

dl.bot_lft {background:#7f7f9c url(/data/201012/IJ12929573850979/c_tl.gif) top left no-repeat; margin:5px 0; padding:0; float:left; margin-right:10px; width:40%;}
dl.bot_lft dt {background:transparent url(/data/201012/IJ12929573850979/c_tr.gif) top right no-repeat; padding:10px; text-align:center; color:#fff;}
dl.bot_lft dd {background:#eee url(/data/201012/IJ12929573850979/c_br.gif) bottom right no-repeat; padding:0; margin:0;}

dl.top_rgt {background:#eee url(/data/201012/IJ12929573850979/c_bl.gif) bottom left no-repeat; margin:5px 0 0 50px; padding:0; float:left; margin-right:10px; width:40%; display:inline;}
dl.top_rgt dt {background:#7f7f9c url(/data/201012/IJ12929573850979/c_tl.gif) top left no-repeat; padding:10px; text-align:center; color:#fff;}
dl.top_rgt dd {background:transparent url(/data/201012/IJ12929573850979/c_br.gif) bottom right no-repeat; padding:0; margin:0;}

dl.top_lft {background:#eee url(/data/201012/IJ12929573850979/c_bl.gif) bottom left no-repeat; margin:5px 0; padding:0; float:left; margin-right:10px; width:40%;}
dl.top_lft dt {background:#7f7f9c url(/data/201012/IJ12929573850979/c_tr.gif) top right no-repeat; padding:10px; text-align:center; color:#fff;}
dl.top_lft dd {background:transparent url(/data/201012/IJ12929573850979/c_br.gif) bottom right no-repeat; padding:0; margin:0;}

dd p {margin:0; padding:10px; line-height:1.3em;}
</style>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">covid-19 <br> 종합관리시스템</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='Pfizer_korean.php'>화이자</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='Moderna_korean.php'>모더나</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='yu.php'>영남대병원</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='knu.php'>경북대병원</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='dg.php'>대구병원</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='korean.php'>국민</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='pcr_select.php'>PCR</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="index_kor.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="home.html">로그아웃</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            <!-- Page content-->
            <div class="container-fluid">

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
	$per1 = sql_date($con, '1st_vaccination_date') / $population * 100;
	$per2 = sql_date($con, '2st_vaccination_date') / $population * 100;


    function sql_pos($console, $attr){
        $sql = "SELECT * FROM people WHERE $attr = '' AND (country='대한민국')";
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

    function ($console, $attr){
        $sql = "SELECT * FROM people WHERE $attr = '' AND (country='대한민국')";
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

?>  
	<div id="info">
	<dl class="bot_rgt">
		<dt>covid-19 현황</dt>
		<dd><p><?php echo "감염자(누적): ", sql_str($con, 'positive') - sql_date($con, 'deathday'), "(", sql_str($con, 'positive') + sql_pos($con, 'positive'), ")<br>"; echo "사망자: ", sql_date($con, 'deathday')?></p></dd>
	</dl>
	<dl class="bot_lft">
		<dt>백신 접종 현황</dt>
		<dd><p><?php echo "1차 접종자 수: ", sql_date($con, '1st_vaccination_date')," / "; echo " 1차 접종률: ",  sprintf("%0.4f", $per1), "%<br>";
			          echo "2차 접종자 수: ", sql_date($con, '2st_vaccination_date'), " / "; echo "2차 접종률: ",  sprintf("%0.4f", $per2), "%<br>"; ?></p></dd>
	</dl>
	<dl class="top_rgt">
		<dt>백신 보유 현황</dt>
		<dd><p><?php echo "보유 백신(화이자): ", $row['amount_Pfizer'], "<br>"; echo "보유 백신(모더나): ", $row['amount_Moderna'] ?></p></dd>
	</dl>
	<dl class="top_lft">
		<FORM METHOD="get" ACTION="kor_DW.php">
			<dt>실시간 정부지침 거리두기단계 (<?php echo "인구: ", $population; ?> )</dt>
			<dd><p><?php echo "거리두기단계: ", $row['distance_working'] ?> <INPUT TYPE="submit" VALUE="설정"> </p></dd>
		</FORM>
	</dl>
	</div>

<?php
    $data = array(
    	array('지역명', '감염자'),
    	array('서울', pos_loc($con, "서울특별시") - die_loc($con, "서울특별시")),
    	array('인천', pos_loc($con, "인천광역시") - die_loc($con, "인천광역시")),
    	array('경기도', pos_loc($con, "경기도") - die_loc($con, "경기도")),
    	array('강원도', pos_loc($con, "강원도") - die_loc($con, "강원도")),
    	array('충북', pos_loc($con, "충청북도") - die_loc($con, "충청북도")),
    	array('충남', pos_loc($con, "충청남도") - die_loc($con, "충청남도")),
    	array('대전', pos_loc($con, "대전광역시") - die_loc($con, "대전광역시")),
    	array('대구', pos_loc($con, "대구광역시") - die_loc($con, "대구광역시")),
    	array('경북', pos_loc($con, "경상북도") - die_loc($con, "경상북도")),
    	array('경남', pos_loc($con, "경상남도") - die_loc($con, "경상남도")),
        array('울산', pos_loc($con, "울산광역시") - die_loc($con, "울산광역시")),
    	array('부산', pos_loc($con, "부산광역시") - die_loc($con, "부산광역시")),
    	array('전북', pos_loc($con, "전라북도") - die_loc($con, "전라북도")),
    	array('전남', pos_loc($con, "전라남도") - die_loc($con, "전라남도")),
    	array('제주', pos_loc($con, "제주특별시") - die_loc($con, "제주특별시")),
    );
    $options = array(
    	'title' => 'covid-19 지역별 감염 현황',
    	'width' => 1100, 'height' => 400
    );
    $data2 = array(
    	array('지역명', '사망자'),
    	array('서울', die_loc($con, "서울특별시")),
    	array('인천', die_loc($con, "인천광역시")),
    	array('경기도', die_loc($con, "경기도")),
    	array('강원도', die_loc($con, "강원도")),
    	array('충북', die_loc($con, "충청북도")),
    	array('충남', die_loc($con, "충청남도")),
    	array('대전', die_loc($con, "대전광역시")),
    	array('대구', die_loc($con, "대구광역시")),
    	array('경북', die_loc($con, "경상북도")),
    	array('경남', die_loc($con, "경상남도")),
        array('울산', die_loc($con, "울산광역시")),
    	array('부산', die_loc($con, "부산광역시")),
    	array('전북', die_loc($con, "전라북도")),
    	array('전남', die_loc($con, "전라남도")),
    	array('제주', die_loc($con, "제주특별시")),
    );
    $options2 = array('title' => 'covid-19 지역별 사망 현황', 'width' => 1100, 'height' => 400);
    mysqli_close($con);
?>
<script src="//www.google.com/jsapi"></script>
<script>
var data = <?= json_encode($data) ?>;
var options = <?= json_encode($options) ?>;
var data2 = <?= json_encode($data2) ?>;
var options2 = <?= json_encode($options2) ?>;
google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(function() {
  var chart = new google.visualization.ColumnChart(document.querySelector('#chart_div'));
  chart.draw(google.visualization.arrayToDataTable(data), options);
  var chart2 = new google.visualization.ColumnChart(document.querySelector('#chart_div2'));
  chart2.draw(google.visualization.arrayToDataTable(data2), options2);
});
</script>
<div id="chart_div"></div>
<div id="chart_div2"></div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
