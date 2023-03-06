<!DOCTYPE html>
<html lang="en">
    <head>
        <META http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>YU - COVID-19 Comprehensive management system</title>
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
                <div class="sidebar-heading border-bottom bg-light">covid-19 <br> Comprehensive management system</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='Pfizer_english.php'>Pfizer</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='Moderna_english.php'>Moderna</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='jhh.php'>Johns Hopkins Hospital</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='mc.php'>Mayo Clinic</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='nyuh.php'>New York University hospital</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='American.php'>Population</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href='pcr_select_us.php'>PCR</a>

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
                                <li class="nav-item active"><a class="nav-link" href="index_us.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="home.html">logout</a>
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
        $sql = "SELECT * FROM people WHERE ($attr IS NOT NULL) AND ($attr != '00-00-00')  AND (country='United States')";
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
        $sql = "SELECT * FROM people WHERE ($attr IS NOT NULL) AND ($attr != '') AND (country='United States')";
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

    function sql_pos($console, $attr){
        $sql = "SELECT * FROM people WHERE $attr = '' AND (country='United States')";
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

    $sql = "SELECT * FROM government WHERE country='United States'";
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

?>
   <div id="info">
   <dl class="bot_rgt">
      <dt>covid-19 Condition</dt>
        <dd><p><?php echo "Positive(cumulative): ", sql_str($con, 'positive') - sql_date($con, 'deathday'), "(", sql_str($con, 'positive') + sql_pos($con, 'positive'), ")<br>"; echo "Dead: ", sql_date($con, 'deathday')?></p></dd>
   </dl>
   <dl class="bot_lft">
      <dt>Vaccination Status</dt>
      <dd><p><?php echo "1st Vaccination Status: ", sql_date($con, '1st_vaccination_date')," / "; echo " 1st Vaccination rate: ", sprintf("%0.4f",$per1), "%<br>";
                   echo "2nd Vaccination Status: ", sql_date($con, '2st_vaccination_date'), " / "; echo "2nd Vaccination rate: ", sprintf("%0.4f",$per2), "%<br>"; ?></p></dd>
   </dl>
   <dl class="top_rgt">
      <dt>Vaccine holdings</dt>
      <dd><p><?php echo "Pfizer: ", $row['amount_Pfizer'], "<br>"; echo "Moderna: ", $row['amount_Moderna'] ?></p></dd>
   </dl>
   <dl class="top_lft">
   <FORM METHOD="get" ACTION="us_DW.php">
      <dt>Social Distancing Level (<?php echo "population: ",  $population; ?> )</dt>
      <dd><p><?php echo "Level: ", $row['distance_working'] ?> <INPUT TYPE="submit" VALUE="set-up"></p></dd>
   </FORM>
   </dl>

   </div>
<?php
    $data = array(
       array('location', 'positive'),
       array('Atlanta', pos_loc($con, "Atlanta") - die_loc($con, "Atlanta")),
       array('Boston', pos_loc($con, "Boston") - die_loc($con, "Boston")),
       array('Chicago', pos_loc($con, "Chicago") - die_loc($con, "Chicago")),
       array('Philadelpia', pos_loc($con, "Philadelpia") - die_loc($con, "Philadelpia")),
       array('Houston', pos_loc($con, "Houston") - die_loc($con, "Houston")),
       array('New York', pos_loc($con, "New York") - die_loc($con, "New York")),
       array('San Antonio', pos_loc($con, "San Antonio") - die_loc($con, "San Antonio")),
       array('Orlando', pos_loc($con, "Orlando") - die_loc($con, "Orlando")),
       array('San Diego', pos_loc($con, "San Diego") - die_loc($con, "San Diego")),
       array('San Francisco', pos_loc($con, "San Francisco") - die_loc($con, "San Francisco")),
       array('Seattle', pos_loc($con, "Seattle") - die_loc($con, "Seattle")),
       array('New Jersey', pos_loc($con, "New Jersey") - die_loc($con, "New Jersey")),
       array('New Mexico', pos_loc($con, "New Mexico") - die_loc($con, "New Mexico")),
       array('North Carolina', pos_loc($con, "North Carolina") - die_loc($con, "North Carolina")),
       array('North Dakota', pos_loc($con, "North Dakota") - die_loc($con, "North Dakota")),
       array('South Dakota', pos_loc($con, "South Dakota") - die_loc($con, "South Dakota")),
       array('ohio', pos_loc($con, "ohio") - die_loc($con, "ohio")),
       array('Oregon', pos_loc($con, "Oregon") - die_loc($con, "Oregon")),
       array('Puerto Rico', pos_loc($con, "Puerto Rico") - die_loc($con, "Puerto Rico")),
       array('Rhode Island', pos_loc($con, "Rhode Island") - die_loc($con, "Rhode Island")),
       array('Tennessee', pos_loc($con, "Tennessee") - die_loc($con, "Tennessee"))
    );
    $options = array(
       'title' => 'COVID-19 infection status by region',
       'width' => 1100, 'height' => 400
    );
    $data2 = array(
       array('location', 'dead'),
       array('Atlanta', die_loc($con, "Atlanta")),
       array('Boston', die_loc($con, "Boston")),
       array('Chicago', die_loc($con, "Chicago")),
       array('Philadelpia', die_loc($con, "Philadelpia")),
       array('Houston', die_loc($con, "Houston")),
       array('New York', die_loc($con, "New York")),
       array('San Antonio', die_loc($con, "San Antonio")),
       array('Orlando', die_loc($con, "Orlando")),
       array('San Diego', die_loc($con, "San Diego")),
       array('San Francisco', die_loc($con, "San Francisco")),
       array('Seattle', die_loc($con, "Seattle")),

       array('New Jersey', die_loc($con, "New Jersey")),
       array('New Mexico', die_loc($con, "New Mexico")),
       array('North Carolina', die_loc($con, "North Carolina")),
       array('North Dakota', die_loc($con, "North Dakota")),
       array('South Dakota', die_loc($con, "South Dakota")),
       array('ohio', die_loc($con, "ohio")),
       array('Oregon', die_loc($con, "Oregon")),
       array('Puerto Rico', die_loc($con, "Puerto Rico")),
       array('Rhode Island', die_loc($con, "Rhode Island")),
       array('Tennessee', die_loc($con, "Tennessee"))
    );
    $options2 = array(
       'title' => 'COVID-19 deaths status by region',
       'width' => 1100, 'height' => 400
    );
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