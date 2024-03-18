<?php
// 로또 번호 생성기
// 1~45 까지의 랜덤한 숫자를 6개 뽑습니다.
// 단, 중복되는 숫자는 없어야 합니다.

// 풀이
$num_A=[];
for ($i=1; $i<7; $i++) {
    $num = random_int(1,45);
    $nums[] = $num;
}
print_r($nums);

foreach ($nums as $val) {
    print_r($val);
    if ($val === $nums) {
        $nums[] = random_int(1,45);
    }

}
echo "\n";

echo "정답1\n";
// 정답1.
$arry_pick = []; // 뽑은 값 저장용
while (true) {
    
    //랜덤 숫자 획득
    $int_rand = random_int(1,45);
    
    // 중복 체크
    if(!isset($arr_pick[$int_rand])){
        $arr_pick[$int_rand] = $int_rand;
    }

    // 루프 종료 체크
    if(count($arr_pick) === 6 ) {
        break;
    }
}
print_r($arr_pick);
echo "\n";

echo "정답2\n";
// 정답2.
$arr_base = range(1, 45); // 기본 배열
$arr_pick = []; // 뽑은 값 저장용
for($i = 0; $i < 6; $i++) {
    $int_rand = random_int(0, count($arr_base)-1); // 랜덤 숫자 획득(배열의 키)
    $arr_pick[] = $arr_base[$int_rand]; // 랜덤한 값 대입
    unset($arr_base[$int_rand]); // 사용한 요소 삭제
    $arr_base = array_values($arr_base); // 배열 인덱스 정렬
}
print_r($arr_pick);
echo "\n";

echo "정답3\n";
// 정답3.
$arr_base = range(1, 45); // 기본 배열
shuffle($arr_base); // 참조 변수이므로 원본이 변경되어 따로 변수를 지정해서 저장할 필요 없음.
$result = array_slice($arr_base, 0, 6); // 배열 키 0~6까지 가져오기
print_r($result);


