<?php
// 변수(Variable)
$str = "안녕 php";
echo $str;

// 한글로도 변수 설정이 가능하나, 사용하지 말자
$숫자1= 1;
echo $숫자1;

$num1 = 2;
echo $num1;

$user_name = 3;

// 대소문자 구분
$Num = 1;
$num = 2;
echo $Num, $num;

// 네이밍 기법
// 1) 스네이크 기법
$user_name = 4;
// 2) 카멜 기법
$userName = 4;

echo "\n";
// 상수 : 절대 변하지 않는 값 > 다시 재설정하면 경고가 발생(line 29) - 에러는 x
//        전부 대문자로 작성함
define("USER_AGE", 20);
define("USER_AGE", 30); // 이미 선언된 상수이므로 워닝 일어나고 값이 바뀌지 않음

echo USER_AGE;

// 점심메뉴
// 탕수육 9000원
// 햄버거 10000원
// 빵 2000원

echo "\n";
$lunch_menu = "점심메뉴";
$menu1 = "탕수육";
$menu2 = "햄버거";
$menu3 = "빵";
$price1 = 9000;
$price2 = 10000;
$price3 = 2000;
echo $lunch_menu;
echo "\n";
echo $menu1, " ", $price1, "원";
echo "\n";
echo $menu2, " ", $price2, "원";
echo "\n";
echo $menu3, " ", $price3, "원";

// 풀이
$menu = "점심메뉴\n";
$tang = "탕수육\n";
$hamburger = "햄버거\n";
$bread = "빵\n";
echo $menu, $tang, $hamburger, $bread;
// 상수로 작성해보기
define("MENU","점심메뉴\n");
echo MENU;

// 스왑
$swap1 = "곤드레밥";
$swap2 = "짜장면";
$temp = ""; // 임시 변수를 만들어 저장해둔다

$temp = $swap1;
$swap1 = $swap2;
$swap2 = $temp;

echo "스왑 후 \$swap1: $swap1, \$swap2: $swap2";