<html>
  <head>
     <META http-eqiuiv="content-type" content="text/html; charset=utf-8">
  </head>
  <body>
    <form action="korean_insert_result.php" method="POST">
	  <h1>국민 정보 추가</h1>
	  <h3>- 국민 추가</h3>
	  이름:<INPUT TYPE = "text" NAME="name" > <br>
	  주민번호:<INPUT TYPE = "text" NAME="ssn" > <br>
	  성별:<INPUT TYPE = "text" NAME="sex" > <br>
	  전화번호:<INPUT TYPE = "text" NAME="phone_number" > <br>
	  지역:<INPUT TYPE = "text" NAME="location" > <br>
    <br><br>
    <input type="submit" VALUE="정보추가">
    </form>
  </body>
</html>
<?php 
   echo "<br> <a href='korean.php'> <--이전화면</a>"; 
   echo "<br> <a href='index_kor.php'> <--초기화면</a>";
?>

