<?php
$today = "현재는 " .date("Y-m-j"). " 입니다.";
echo $today, "<br>";
$ary = array(100,50,200,7);
echo "최대:", max($ary) ," 최소: ", min($ary), "<br>";

echo pi(), " ", round(M_PI), " ", ceil(M_PI), "<br>";  // M_PI: pi 상수값

$str = "   This is MySQL   ";
$str = trim($str);
echo "#", $str, "#", "<br>";

echo "문자열 길이: ", strlen($str), "<br>";

echo str_repeat("-", 30), "<br>";

echo str_replace("MySQL", "마이에스큐엘", "This is MySQL"), "<br>";

$ary = str_split("This is MySQL", 3);  // 세글자씩 끊어서 배열 저장
print_r($ary); echo "<br>";
echo "<br>";

$ary = explode(" ", "This is MySQL");  // " "(공백) 으로 끊어서 배열 저장
print_r($ary); echo "<br>";

echo implode($ary, " "), "<br>";

$myHTML = "<A href='www.hanbit.co.kr'> 한빛미디어 </A> <br>";
echo $myHTML;
echo htmlspecialchars($myHTML);
?>