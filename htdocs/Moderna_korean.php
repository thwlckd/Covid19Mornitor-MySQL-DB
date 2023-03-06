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
#info {height:450px;}

dl {font-family:돋움;font-size:15px;}
dt {font-weight:bold}
dl.bot_rgt {background: #F78181 url(/data/201012/IJ12929573850979/c_tl.gif) top left no-repeat; margin:5px 0 0 50px; padding:0; float:right; margin-right:10px; width:40%; display:inline;}
dl.bot_rgt dt {background:transparent url(/data/201012/IJ12929573850979/c_tr.gif) top left no-repeat; padding:10px; text-align:center; color:#fff;}
dl.bot_rgt dd {background:#eee url(/data/201012/IJ12929573850979/c_bl.gif) bottom left no-repeat; padding:0; margin:0;}

dl.bot_lft {background:#F78181 url(/data/201012/IJ12929573850979/c_tl.gif) top left no-repeat; margin:5px 0 ; padding:0;  text-align:center; float:left; margin-right:10px;margin-left : 150px; width:40%;}
dl.bot_lft dt {background:transparent url(/data/201012/IJ12929573850979/c_tr.gif) top left no-repeat; padding:10px; text-align:center; color:#fff;}
dl.bot_lft dd {background:#eee url(/data/201012/IJ12929573850979/c_br.gif) bottom right no-repeat; padding:0; margin:0;}

dl.top_rgt {background:#eee url(/data/201012/IJ12929573850979/c_bl.gif) bottom left no-repeat; margin:5px 0 0 50px; padding:0;  text-align:center; float:left; margin-right:10px;margin-left : 50px;width:40%; display:inline;}
dl.top_rgt dt {background:#F78181 url(/data/201012/IJ12929573850979/c_tl.gif) top left no-repeat; padding:10px; text-align:center; color:#fff;}
dl.top_rgt dd {background:transparent url(/data/201012/IJ12929573850979/c_br.gif) bottom right no-repeat; padding:0; margin:0;}

dl.top_lft {background:#eee url(/data/201012/IJ12929573850979/c_bl.gif) bottom left no-repeat; margin:5px 0 0 50px; padding:0; text-align:center; float:left; margin-right:10px; margin-left : 50px;width:40%;}
dl.top_lft dt {background:#F78181 url(/data/201012/IJ12929573850979/c_tr.gif) top right no-repeat; padding:10px; text-align:center; color:#fff;}
dl.top_lft dd {background:transparent url(/data/201012/IJ12929573850979/c_br.gif) bottom right no-repeat; padding:0; margin:0;}

dd p {margin:0; padding:10px; line-height:1.3em;}
</style>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper"></div>
           
    <?php
    $con=mysqli_connect("localhost","root","1234","covid-19") or die("MySQL 접속 실패 !!");
    ?>

<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="+500, 800, +300, +300">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>counter</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="counter.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/12079fc1be16bc14f06020f8a39656d22ed2574ba9400cdd0c1d68066a0275172d92f3f2446204661cc0f2e72a1a904de7ce961a7aec8afc67cda7d521c8051e64676877c35d202f06b08817f43c949c12bdb23c411fcb2f363a62cde4a58ba2.svg"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="counter">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-header" id="sec-fc89"><div class="u-align-left u-clearfix u-sheet u-valign-middle u-sheet-1">
  
        <a href="https://nicepage.com/html5-template" class="u-image u-logo u-image-1" data-image-width="130" data-image-height="53">
          <img src="images/12079fc1be16bc14f06020f8a39656d22ed2574ba9400cdd0c1d68066a0275172d92f3f2446204661cc0f2e72a1a904de7ce961a7aec8afc67cda7d521c8051e64676877c35d202f06b08817f43c949c12bdb23c411fcb2f363a62cde4a58ba2.svg" class="u-logo-image u-logo-image-1">
        
         
         


        </a>
      </div>
      </header>

      <?php
      $con=mysqli_connect("localhost","root","1234","covid-19") or die("MySQL 접속 실패 !!");

      function holding($console, $attr){
        $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
        $ret = mysqli_query($console, $sql);
        $row = mysqli_fetch_array($ret);
        return  $row['holding_vaccine'];
    }

    function today($console, $attr){
      $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
      $ret = mysqli_query($console, $sql);
      $row = mysqli_fetch_array($ret);
      return  $row['today_production'];
    } 

    function cumulative($console, $attr){
      $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
      $ret = mysqli_query($console, $sql);
      $row = mysqli_fetch_array($ret);
      return  $row['cumulative_production'];
    } 

    function monthly($console, $attr){
      $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
      $ret = mysqli_query($console, $sql);
      $row = mysqli_fetch_array($ret);
      return  $row['monthly_production_plan'];
    } 
  ?>

    <section class="u-align-center u-clearfix u-color-scheme-custom-color-scheme-1 u-color-style-multicolor-1 u-custom-color-3 u-section-1" id="sec-7fb7">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-border-2 u-border-white u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <h1 class="u-text u-text-default u-title u-text-1" data-animation-name="counter" data-animation-event="scroll" 
                data-animation-duration="3000"><?php echo today($con, 'today_production'); "%<br>"; ?></h1>
                <h5 class="u-text u-text-2">금일 생산량</h5>
              </div>
            </div>
            <div class="u-align-center u-border-2 u-border-white u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <h1 class="u-text u-text-default u-title u-text-3" data-animation-name="counter" data-animation-event="scroll"
                 data-animation-duration="3000"><?php echo cumulative($con, 'cumulative_production'); "%<br>"; ?></h1>
                <h5 class="u-text u-text-4">누적 생산량</h5>
              </div>
            </div>
            <div class="u-align-center u-border-2 u-border-white u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <h1 class="u-text u-text-default u-title u-text-5" data-animation-name="counter" data-animation-event="scroll" 
                data-animation-duration="3000"><?php echo holding($con, 'holding_vaccine'); "%<br>"; ?></h1>
                <h5 class="u-text u-text-6">보유 백신량</h5>
              </div>
            </div>
            <div class="u-align-center u-border-2 u-border-white u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-4">
                <h1 class="u-text u-text-default u-title u-text-7" data-animation-name="counter" data-animation-event="scroll" 
                data-animation-duration="3000"><?php echo monthly($con, 'monthly_production_plan'); "%<br>"; ?></h1>
                <h5 class="u-text u-text-8">월간 생산량</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>

 
   </style>
</head>

<div id="info">
 
  
    
  
 
           <?php  
          $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
          $ret = mysqli_query($con, $sql);
          if($ret) {
          }
          else{
              echo "covid-19 데이터 조회 실패..."."<br>";
              echo "실패 원인 :".mysqli_error($con);
              exit();
          }
          $row = mysqli_fetch_array($ret);            
           ?>
       </p>
   </dd>
  </dl>
 <dl class="bot_lft">
     <dt>부작용 현황</dt>
     <dd>
       <p>
       <?php 
           function sql_side_effect($con, $str1, $str2){
               $sql ="SELECT * FROM people WHERE (side_effect LIKE '%$str1%' OR side_effect LIKE '%$str2%') AND vaccine = 'Moderna'";
               $ret = mysqli_query($con, $sql);
               if($ret) {
                   $count=mysqli_num_rows($ret);
               }
               else{
                   echo "covid-19 데이터 조회 실패..."."<br>";
                   echo "실패 원인 :".mysqli_error($con);
                   exit();
               }
               echo "<h6> $str1 $count 건<br></h6>";
       
               return $count;
           }

           $sum = sql_side_effect($con, '발열', 'cold');
           $soohyun1=$sum;
           
           $summ = sql_side_effect($con, '근육통', 'muscle pain');
           $soohyun2=$summ;
           $sum+=$summ;
           
           $summm = sql_side_effect($con, '두통', 'headache');
           $soohyun3=$summm;
           $sum+=$summm;
           
           $summmm = sql_side_effect($con, '알레르기', 'Allergie');
           $soohyun4=$summmm;
           $sum+=$summmm;
           
           echo "<h6> 총 $sum 건<br><br></h6>";
       ?>

<?php
$str = 'hello';
$arr = array('my', 'friend');
?>
<script>
var str = '<?= $str ?>';
var arr = <?= json_encode($arr) ?>;
</script>

<html>
<head> 
<script type="text/javascript" src="https://www.google.com/jsapi">
</script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
</script> 
<script type="text/javascript">google.load("visualization", "1", {packages:["corechart"]});google.setOnLoadCallback(drawChart);
function drawChart()
 {
       var soohyun1 = parseInt('<?= $soohyun1 ?>');
       var soohyun2 = parseInt('<?= $soohyun2 ?>');
       var soohyun3 = parseInt('<?= $soohyun3 ?>');
       var soohyun4 = parseInt('<?= $soohyun4 ?>');
      // parseInt
      var data = google.visualization.arrayToDataTable([["Employee","Rating"],["발열", soohyun1],["근육통",soohyun2],["두통", soohyun3],["알레르기", soohyun4]]);
      var options = { title: " "}; 
      var chart = new google.visualization.PieChart(document.getElementById("employee_piechart"));
      chart.draw(data, options);
      }
       </script> </head> 
       <body>
       <div id="employee_piechart" style="width: 750px; height:400px;">
        </div> 
        </body> 
</html>


       </p>
       
       </dd>
  </dl>
</dl>



<div id="info">
<dl class="top_rgt">
      <dt>예방률</dt>
      <br> 1차 접종 예방률 : 
      <?php  
           $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
           $ret = mysqli_query($con, $sql);
           if($ret) {
       
           }
           else{
               echo "covid-19 데이터 조회 실패..."."<br>";
               echo "실패 원인 :".mysqli_error($con);
               exit();
           }
           
           $row = mysqli_fetch_array($ret);
           $Pfizer = $row["1st_preventive_rate"];
               echo $Pfizer, "%";
            ?>

        <br>
        2차 접종 예방률 : 
        <?php  
           $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
           $ret = mysqli_query($con, $sql);
           if($ret) {
       
           }
           else{
               echo "covid-19 데이터 조회 실패..."."<br>";
               echo "실패 원인 :".mysqli_error($con);
               exit();
           }
           
           $row = mysqli_fetch_array($ret);
           $Pfizer = $row["2st_preventive_rate"];
               echo $Pfizer, "%";
            ?>

            
        <br>  
      </FORM>
      
   </dl>

    <dl class="top_rgt">
      <dt>생산량 갱신</dt>
        <FORM METHOD="post" ACTION="update_Moderna_production.php">
         <br>금일 생산량 : <INPUT TYPE = "text" NAME = "today_production" VALUE=>
         <INPUT TYPE="submit" VALUE="갱신"><br>
        <br>
      </FORM>
      
   </dl>
   <dl class="top_rgt">
      <dt>백신 주문</dt>
        <FORM METHOD="post" ACTION="order_Moderna.php">
         <br>대한민국 : <INPUT TYPE = "text" NAME = "order_Moderna" VALUE=>
         <INPUT TYPE="submit" VALUE="주문"><br>
        <br>
      </FORM>
      
   </dl>

    


   </div>

   


  </div>
 <div style="position: absolute; right: 350px; bottom: 100px;">
 <button type="button" onclick="location.href='index_kor.php'">이전 화면</button>

</div>

<?php
   $sql ="SELECT * FROM pharmacist WHERE name='Moderna'";
   //$ret = mysqli_query($con, $sql);
   if($ret) {
   }
   else{
       echo "covid-19 데이터 조회 실패..."."<br>";
       echo "실패 원인 :".mysqli_error($con);
       exit();
   }
   $row = mysqli_fetch_array($ret);

  // mysqli_close($con);
?>


<script src="//www.google.com/jsapi"></script>
<script>
var data = <?= json_encode($data) ?>;
var options = <?= json_encode($options) ?>;
google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(function() {
 var chart = new google.visualization.ColumnChart(document.querySelector('#chart_div'));
 chart.draw(google.visualization.arrayToDataTable(data), options);
});
</script>

<div id="chart_div"></div>
               </div>
           </div>
       </div>
       <!-- Bootstrap core JS-->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
       <!-- Core theme JS-->
       <script src="js/scripts.js"></script>
   </body>
</html>



