<?php
// *함수
// 1. 함수 정의
function my_sum($num1, $num2) {
// $num1, $num2 는 받는 값, 파라미터(매개변수,인자)라고 한다.
    return $num1 + $num2;
}
// 2. 함수 호출
echo my_sum(32, 23);
// 32, 23 함수에 입력하는 값, 아큐먼트(인수)라고 한다.
echo "\n";

// 3. 파라미터 default 설정
// 함수 정의 주석을 직접 작성하는 법
/**
 *  두 숫자를 더하는 함수
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2 더할 두번째 숫자, default 10
 * @param int 합계
 * @return int 합계
 */
function my_sum2(int $num1, int $num2 = 10) {
// default 값은 후순위에 지정해줘야 된다.
// ex) function my_sum2($num1 = 10, $num2) 안됨
    return $num1 + $num2;
}
echo my_sum2(5, 4);
echo "\n";
echo my_sum2(5);

// -, *, /, % 를 해주는 각각의 함수를 만들어 주세요.
// -
function my_minus(int $num1, int $num2) {
        return $num1 - $num2;
    }
echo my_minus(5, 4);
echo "\n";

// *
function my_multi(int $num1, int $num2) {
        return $num1 * $num2;
    }
echo my_multi(5, 4);
echo "\n";

// /
function my_div(int $num1, int $num2) {
    return $num1 / $num2;
    }
echo my_div(5, 4);
echo "\n";

// %
function my_remaind(int $num1, int $num2) {
    return $num1 % $num2;
    }
echo my_remaind(5, 4);
echo "\n";


// *전역변수, 지역변수
$str = "처음 정의"; // $str 전역변수

function test(string $str) {
    $str = "text()에서 변경"; // test의 $str 지역변수
    return $str;
}
function test2(string $str) {
    $str = "text2()에서 변경"; // test2의 $str 지역변수
    return $str;
}
echo $str; // $str 전역변수를 호출
echo test($str); // test의 $str 지역변수를 호출
echo test2($str); // test2의 $str 지역변수를 호출

// *가변 길이 파라미터 (php 5.6버전 이상만 사용)
// 받을 파라미터의 개수를 모를 때 ... 으로 배열로 받음.
function my_sum_all(...$numbers) {
    print_r($numbers);
}
my_sum_all(3, 15, 10);
// 5.5 버전 이하
function my_sum_all2() {
    $numbers = func_get_args();
    print_r($numbers);
}
my_sum_all2(3, 1, 0);

echo "\n";
// 파라미터로 받은 모든 수를 더하는 함수를 만들어 주세요.
function my_sum_all3(...$numbers) {
    $sum = 0; // 합계 저장 변수, 합계를 저장하기 떄문에 숫자 0으로 초기화

    // 파라미터 루프해서 값을 획득 후 더하기
    foreach ($numbers as $val) {
        $sum += $val;
    }

    // 합계 리턴
    return $sum;
}
echo my_sum_all3 (5,4,5,6);
echo "\n";

// *참조 전달
function test_v($num) {
    $num = 3;
}
function test_r(&$num) {
    $num = 5;
}
$num = 0;

test_v($num);
echo $num;

echo "\n";
// 참조 변수
$a = 1;
$b = &$a; // b에 a에 있는 1의 주소값을 받음
$a = 3;
echo $b; // so) a가 3으로 변했을때 b도 3으로 변함
// 원래는 위에서 차례대로 처리가 되므로 & 없을경우 a가 3으로 변해도 b는 1(두번째줄 $b=$a)이 된다.