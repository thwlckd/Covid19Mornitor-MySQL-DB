<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
   $sql ="SELECT * FROM hospital WHERE name = 'MAYO CLINIC'";
   $sql2 ="SELECT * FROM people WHERE hospitalization_hospital='MAYO CLINIC' AND hospitalization_date IS NOT NULL AND (discharge_date IS NULL OR discharge_date='0000-00-00') AND (deathday IS NULL OR deathday='0000-00-00 00:00:00')";
   $ret = mysqli_query($con, $sql);   
   $data = mysqli_query($con, $sql2);
   $total_rows = mysqli_num_rows($data);
  
   
   $row = mysqli_fetch_array($ret);
   
   $Pfizer = $row['residual_Pfizer'];
   $Moderna = $row['residual_Moderna'];

   $sql ="SELECT * FROM people WHERE country='United States' AND hospitalization_hospital = 'MAYO CLINIC' AND positive IS NOT NULL AND positive != ''"; 
   $sql2 ="SELECT * FROM people WHERE hospitalization_hospital='MAYO CLINIC' AND deathday IS NOT NULL AND deathday != '00-00-00 00:00:00'";
   $Modernanum = "SELECT * FROM people WHERE vaccination_hospital = 'MAYO CLINIC' AND vaccine = 'Moderna'";
   $Modernanum2 = "SELECT * FROM people WHERE vaccination_hospital = 'MAYO CLINIC' AND vaccine = 'Moderna' AND (2st_vaccination_date is NOT NULL AND 2st_vaccination_date != '0000-00-00' )";
   $Pfizernum = "SELECT * FROM people WHERE vaccination_hospital = 'MAYO CLINIC' AND vaccine = 'Pfizer'";
   $Pfizernum2 = "SELECT * FROM people WHERE vaccination_hospital = 'MAYO CLINIC' AND vaccine = 'Pfizer' AND (2st_vaccination_date is NOT NULL AND 2st_vaccination_date != '0000-00-00' )";

   $ret = mysqli_query($con, $sql);
   $ret2 = mysqli_query($con, $sql2);
   $ret3 = mysqli_query($con, $Modernanum);
   $ret4 =  mysqli_query($con, $Pfizernum);
   $ret5 = mysqli_query($con, $Modernanum2);
   $ret6 =  mysqli_query($con, $Pfizernum2);
   $count = mysqli_num_rows($ret);
   $count2 = mysqli_num_rows($ret2);
   $count3 = mysqli_num_rows($ret3);
   $count4 = mysqli_num_rows($ret4);
   $count5 = mysqli_num_rows($ret5);
   $count6 = mysqli_num_rows($ret6);
   mysqli_close($con);
   
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Dental Care, Welcome to DentalPlus, Make your dream smile a reality!, Make your dream smile a reality!, Giving excellent care to every patient., OurGallery, Quality patient care with up-to-date technology, We Love Whiter Teeth, Our Team">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Home</title>
  <link rel="stylesheet" href="hhnicepage.css" media="screen">
<link rel="stylesheet" href="hhHome.css" media="screen">
    <script class="u-script" type="text/javascript" src="hhjquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="hhnicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i">
    
  
    
    <script type="application/ld+json">{



		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
    var seoyoung = parseInt('<?= $seoyoung ?>');
}</script>
    <meta name="theme-color" content="#0facf1">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">


  </head>
  <body class="u-body"><header class="u-clearfix u-header u-white u-header" id="sec-e270"><div class="u-align-left u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-default u-image-1" src="images/signature4.png" alt="" data-image-width="1230" data-image-height="468">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="XL">
          <div class="menu-collapse">
            <a class="u-button-style u-nav-link" href="#" style="padding: 4px 0px; font-size: calc(1em + 8px);">
              <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style="undefined"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a760"></use></svg>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-a760" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;" xml:space="preserve" class="u-svg-content"><g><rect y="36" width="302" height="30"></rect><rect y="236" width="302" height="30"></rect><rect y="136" width="302" height="30"></rect>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-spacing-25 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html" style="padding: 8px 0px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.html" style="padding: 8px 0px;">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html" style="padding: 8px 0px;">Contact</a>
</li></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.html">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html">Contact</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header> 
    <section class="u-clearfix u-image u-valign-middle-sm u-valign-middle-xs u-section-1" id="sec-bd5d" data-image-width="1000" data-image-height="1156">
      <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-24 u-image-1">
              <div class="u-container-layout u-container-layout-1">
                <h1 class="u-custom-font u-font-source-sans-pro u-text u-text-palette-4-base u-title u-text-1">MAYO CLINIC</h1>
                <p class="u-text u-text-2"></p>
              </div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-right-cell u-size-36 u-image-2" data-image-width="150" data-image-height="100">
              <div class="u-container-layout u-container-layout-2"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-grey-5 u-section-2" id="sec-e59d">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-gutter-20 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-center u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-container-style u-layout-cell u-left-cell u-size-15 u-size-30-md u-white u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <h3 class="u-text u-text-1">Sickbed</h3>
                  <p class="u-text u-text-2">Total : <br>
                  <?php echo  $row['amount_sickbed']; "%<br>"; ?>
                  <p class="u-text u-text-2">Hospitalized patient : <br>
                    <?php echo   $total_rows; "%<br>"; ?>
                    <p class="u-text u-text-2">Number of Sickbed : <br>
                      <?php echo $row['amount_sickbed'] - $total_rows; "%<br>"; ?>
            
                  </p>
                </div>
              </div>
              <div class="u-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-white u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h3 class="u-text u-text-3">Remaning Vaccine</h3>
                    <p class="u-text u-text-2">Moderna : <br>
                      <?php echo  $row['residual_Moderna']; "%<br>";?><br>
                      <?php echo "<TD> <a href='mc_m_select.php'> Inoculaion </a> </TD>"; ?>
                      
                      <p class="u-text u-text-2">Pfizer : <br>
                        <?php echo  $row['residual_Pfizer']; "%<br>"; ?><br>
                      <?php echo "<TD> <a href='mc_p_select.php'> Inoculaion </a> </TD>"; ?>
                  </p>
                </div>
              </div>
              <div class="u-align-center u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-container-style u-layout-cell u-size-15 u-size-30-md u-white u-layout-cell-3">
                <div class="u-container-layout u-container-layout-3">
                  <h3 class="u-text u-text-5">Inoculation vaccine</h3>
                  <p class="u-text u-text-2">Moderna : <br>
                    <?php echo  $count3 + $count5; "%<br>"; ?>
                    <p class="u-text u-text-2">Pfizer : <br>
                      <?php echo  $count4 + $count6; "%<br>"; ?>
                  </p>
                </div>
              </div>
              <div class="u-align-center u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-container-style u-layout-cell u-right-cell u-size-15 u-size-30-md u-white u-layout-cell-4">
                <div class="u-container-layout u-container-layout-4">
                  <h3 class="u-text u-text-7">Statistic of COVID-19</h3>
                  <p class="u-text u-text-2">Coronic : <br>
                    <?php echo  $count; "%<br>"; ?>
                    <p class="u-text u-text-2">Death : <br>
                      <?php echo  $count2; "%<br>"; ?>
                
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-3" id="sec-738a">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    <HTML>
      <HEAD>
         <META http-equiv="content-type" content="text/html; charset=utf-8">
      </HEAD>
      <BODY>
         <FORM METHOD="post" ACTION="mc_update_Pfizer.php">
           <center>
                     Pfizer : <INPUT TYPE = "text" NAME = "residual_Pfizer" VALUE=<?php echo $Pfizer ?>>
          <INPUT TYPE="submit" VALUE="division">
         </FORM>
         <FORM METHOD="post" ACTION="mc_update_Moderna.php">
                     Moderna : <INPUT TYPE = "text" NAME = "residual_Moderna" VALUE=<?php echo $Moderna ?>>
           <INPUT TYPE="submit" VALUE="division">
      
         </FORM>
         <h3><br> <a href='mc_select.php'> >Edit Patient Information</a> <br><h3>

        </center>
      </BODY>
   </HTML>
    
    <footer class="u-clearfix u-footer u-grey-80" id="sec-e985"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-30 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-20 u-size-20-md u-layout-cell-1">
                <div class="u-container-layout u-valign-top u-container-layout-1"><!--position-->
                  <div data-position="" class="u-position u-position-1"><!--block-->
                    <div class="u-block">
                      <div class="u-block-container u-clearfix"><!--block_header-->
                        <h5 class="u-block-header u-text"><!--block_header_content--> Address<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                        <div class="u-block-content u-text"><!--block_content_content--><?php echo  $row['address']; "%<br>"; ?> <!--/block_content_content--></div><!--/block_content-->
                      </div>
                    </div><!--/block-->
                  </div><!--/position-->
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-20 u-size-20-md u-layout-cell-2">
                <div class="u-container-layout u-valign-top u-container-layout-2"><!--position-->
                  <div data-position="" class="u-position u-position-2"><!--block-->
                    <div class="u-block">
                      <div class="u-block-container u-clearfix"><!--block_header-->
                        <h5 class="u-block-header u-text"><!--block_header_content-->Call<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                        <div class="u-block-content u-text"><!--block_content_content--> <?php echo  $row['phone_number']; "%<br>"; ?> <!--/block_content_content--></div><!--/block_content-->
                      </div>
                    </div><!--/block-->
                  </div><!--/position-->
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-20 u-size-20-md u-layout-cell-3">
                <div class="u-container-layout u-valign-top u-container-layout-3"><!--position-->
                  <div data-position="" class="u-position"><!--block-->
                    <div class="u-block">
                      <div class="u-block-container u-clearfix"><!--block_header-->
                        <h5 class="u-block-header u-text"><!--block_header_content--> Business number<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                        <div class="u-block-content u-text"><!--block_content_content--> <?php echo $row['business_number']; "%<br>"; ?><!--/block_content_content--></div><!--/block_content-->
                      </div>
                    </div><!--/block-->
                  </div><!--/position-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/html5-template" target="_blank">
        <span>HTML5 Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="https://nicepage.com/html-website-builder" target="_blank">
        <span>HTML Builder</span>
      </a>. 
    </section>
  </body>
</html>