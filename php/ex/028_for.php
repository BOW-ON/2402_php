<?php
// for문
// 특정 처리를 반복해서 구현할때 사용하는 문법
for($i = 0; $i <3; $i++) {
    //반복할 처리
    echo $i."번째 루프\n";
}

// 총 10번 도는 루프문을 만들어 주세요.
// 단, 7까지 출력하기
// 단, 3, 6은 출력하지 않기
for ($i = 0; $i < 10; $i++) {
    // 특정 조건일때 루프문 종료
    if ($i === 8) {
        // break : 루프문 종료
        break;
    }
    if ($i === 3 || $i ===6) {
        // continue : continue 아래의 처리를 건너 뛰고 다음루프로 진행
        continue;
    }
    echo $i."\n";
}

// 배열 루프
$arr = [1,2,3,4,5,6,7,8,9,10];
$loop_cnt = count($arr);
for ($i = 0; $i < $loop_cnt; $i++) {
    echo $arr[$i];
}
echo "\n";

// 다중루프
for($i = 1; $i < 3; $i++) {
    echo "1번 LOOP : ".$i."번째\n";
    for($z = 1; $z < 3; $z++) {
        echo "\t2번 LOOP : ".$z."번째\n";
    }
}

// 구구단 2단 출력
$dan = 2;
for($multi_num =1; $multi_num < 10; $multi_num++){
    $msg_line = $dan." X ".(string)$multi_num." = ".(string)($dan*$multi_num)."\n";
    echo $msg_line;
}
echo "\n";

// 구구단 9단까지 출력
for($dan = 2; $dan < 10; $dan++) {
    echo "** ".(string)$dan."단 **\n";
    for($multi_num =1; $multi_num < 10; $multi_num++){
        $msg_line = (string)$dan." X ".(string)$multi_num." = ".(string)($dan*$multi_num);
        echo $msg_line."\n";
    }
    echo "\n";
}




