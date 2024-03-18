<?php
// *PHP내장함수
// 1. trim(문자열) : 문자 좌우의 공백 제거 함수
$str = "             홍길동       ";
echo trim($str);
echo "\n";

// 2-1. strtoupper(문자열) : 영어 대문자 출력
echo strtoupper("asdf");
// 2-2. strtolower(문자열) : 영어 소문자 출력
echo strtolower("ASDF");
echo "\n";

// 3. str_replace(대상 문자, 변경할 문자열, 문자열) : 특정 문자를 치환
echo str_replace("c","Z","ascdf");
// 문자을 삭제
echo str_replace("c","","ascdf");
echo "\n";

// 4. mb_substr(문자열, 시작위치, 출력할 개수) : 문자열을 시작위치에서 출력 개수만큼 잘라서 반환
$str = "홍길동갑순이";
echo mb_substr($str, 0, 3)."\n"; // 홍길동 출력
echo mb_substr($str, 2)."\n"; // 출력할 개수는 생략 가능

// 5. mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치가 반환 (int로 반환함)
//      검색할 문자열이 중복되는 경우 제일 왼쪽에 있는 문자열이 검색.
$str = "나는 홍길동 입니다.";
echo mb_strpos($str, "홍");

if(mb_strpos($str, "a")) {
    echo "포함됨";
}
else {
    echo "없어";
}
echo "\n";

// 6. sprintf(포맷문자열, 대입문자열1, 대입문자열2, ...)
$base_msg = "%s이/가 틀렸습니다.";
$print_msg = sprintf($base_msg, "아이디");
echo $print_msg."\n";
printf($print_msg);
echo "\n";

// 7. isset(변수) : 변수의 설정 여부 확인 true/false 리턴
$ans1 = ""; // 빈 문자라는 변수, 메모리를 가짐
$ans2 = NULL; // 변수가 지정되지 않아 값이 없음, 메모리를 가지지 않음
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1), isset($ans2), isset($ans3), isset($ans4), isset($ans5));
echo "\n";

// 7. empty(변수) : 변수의 값이 비어있는지 확인, true/false 리턴
var_dump("--", empty($ans1), empty($ans2), empty($ans3), empty($ans4), empty($ans5));
echo "\n";

// 8. gettype(변수) : 데이터 타입을 문자열로 반환
$str1 = "abc";
$int1 = 5;
$arr1 = [];
$double1 = 1.4;
$boo = true;
$null1 = null;
$obj = new DateTime();
var_dump(gettype($str1), gettype($int1)
,gettype($arr1), gettype($double1)
,gettype($boo), gettype($null1), gettype($obj));

// 9. settype(변수) : 변수의 데이터 형을 변환, 원본 변수 자체가 변경되므로 주의
// Review) 기존 형변환
$i = 3;
$i2 = (string)$i;
var_dump($i, $i2); // 원본을 수정하지 않음
// but) settype
$i = 3;
$i2 = settype($i, "string"); // 리턴 값 bool : 변환에 성공했으면 true
var_dump($i, $i2);
echo "\n";

// 10. time() : 유닉스 타임스태프
echo time();
echo "\n";

// 11. date(포맷형식, 타임스탬프값) : 타임스탬프 값을 날짜 포맷형식으로 변환해서 변환
echo date("Y-m-d H:i:s", time()-86400); // 2000-01-01- 13-50-06
echo "\n";
// 윤달 계산 오류
$date1 = new DateTime("2024-03-31");
$date1 -> modify("-1 month");
echo $date1 -> format('Y-m-d');

// 12. ceil(숫자), round(숫자), floor(숫자)
var_dump(ceil(1.4), round(2.5), floor(1.9));
echo "\n";

// 13. random_int(시작 값, 마지막값) : 시작값~ 마지막값 범위의 랜덤한 숫자를 반환
echo random_int(1,10);
echo "\n";