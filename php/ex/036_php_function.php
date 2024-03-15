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





