<?php
// 연결 연산자
$str1 = "안녕, ";
$str2 = "PHP!!";
$num = 1111; // 자동으로 str로 형변환을 시킴, 추후 에러가 발생할 수도 있다.
// so) num앞에 string을 작성해서 우리가 지정해주면 에러가 적어진다.
echo $str1.$str2.(string)$num;
var_dump ($str1.$str2.$num); // 모든 데이터가 string 형태로 출력된다.

// 출력 : "안녕, 하세요!~"
$str1 = "안녕";
$str2 = "하세요!";

echo $str1.", ".$str2."~";