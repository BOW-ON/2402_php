<?php
// int : 숫자, 정수
echo 123;
var_dump(123);

// double : 실수
var_dump(3.141592);

// string : 문자열
var_dump("asdf");
var_dump('qwer');

// boolean : 논리 (true or false)
var_dump(true, false);

// NULL
var_dump(NULL);

// array : 배열
var_dump([1,2,3]);

// object : 객체
$obj = new DateTime();
var_dump($obj);


// 형변환 : 변수 앞에(데이터 타입) 작성
var_dump((int)"123");
var_dump((string)456);
var_dump((int)"asd"); // 문자열 안에 데이터가 숫자로 바꿀 수 없는 문자데이터이므로 하면 안됨
