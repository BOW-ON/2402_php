<?php
// while문
$cnt = 0;
while($cnt < 3) {
    echo "count : $cnt \n";
    $cnt++;
}

$cnt = 0;
while(true){
    if ($cnt === 3){
        break;
    }
    $cnt++;
    echo "$cnt \n";
}
echo "\n";

// while를 이용해서 2단을 출력해 주세요.
$num = 0;
$dan = 2;
while($num < 9) {
    $num++;
    $msg = "$dan X $num = ".($dan*$num)."\n";
    echo $msg;
}
// while을 이용해서 구구단출력
$num = 0;
$dan = 1;
while ($dan < 9) {
    $dan++;
    echo "** ".$dan."단 **\n";
    while ($num < 9) {
        $num++;
        $msg = "$dan X $num = ".($dan*$num)."\n";
        echo $msg;
    }
    $num = 0;
}
echo "\n";

// 풀이
// 2단
$num =1;
while($num < 10) {
    echo "2 X ".$num." = ".(2*$num)."\n";
    $num++;
}
// 구구단
$dan = 2;
$multi_num = 1;
while ($dan < 10) {
    $multi_num = 1;
    // for문과 달리 초기값을 설정해줘야 다음 while에서 초기값부터 시작된다.
    echo $dan."단\n";

    while($multi_num < 10) {
        echo $dan." X ".$multi_num." = ".($dan*$multi_num)."\n";
        $multi_num++;
    }
    $dan++;

}