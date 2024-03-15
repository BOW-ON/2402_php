<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
for ($j = 1; $j < 6; $j++) {
    for ($i = 1; $i < 6; $i++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****

for ($i = 1; $i < 6; $i++) {
    for ($j = 1; $j < $i+1; $j++){
        echo "*";
    }
    echo "\n";
}
echo "\n";


// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****
for ($i = 1; $i < 6; $i++) {
    for ($j = 1; $j < 6-$i; $j++){
        echo " ";   
    }
    for ($k = 1; $k < $i+1; $k++){
        echo "*";
    }
    echo "\n";
}
echo "\n";


// 풀이
// 1.
for ($j = 0; $j < 5; $j++) {
    echo "*****\n";
}
echo "\n";

// 2.
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j <= $i; $j++){
        echo "*";
    }
    echo "\n";
}
echo "\n";

//3-1-1. if문 이용 (for문 + if문)
$num = 5;
for($i = 1; $i <= $num; $i++) {
    $cnt_space = $num - $i;
    for($z = 1; $z <= $num; $z++) {
        if($z <= $cnt_space) {
            echo " ";
        }
        else {
            echo "*";
        }
    }
    echo "\n";
}
echo "\n";
//3-1-2. if문 이용
for($i=0; $i<=$num-1; $i++) {
    for($z=$num-1; $z>=0; $z--) {
        if($z <= $i) {
            echo "*";
        }
        else {
            echo " ";
        }
    }
    echo "\n";
}
echo "\n";
//3-2. for문 이용
for($i = 0; $i < $num; $i++) {
    //공백찍는 for문
    for($z = 1; $z < $num - $i; $z++){
        echo " ";
    }
    //별찍는 for문
    for($y = 0; $y <= $i; $y++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";


// 삼각형 연습
$heigh = 3;
for ($i = 1; $i < $heigh; $i++) {
    for ($j = 1; $j < $heigh-$i; $j++){
        echo " ";   
    }
    for ($k = 1; $k <= (2*$i-1); $k++){
        echo "*";
    }
    for ($j = 1; $j < $heigh-$i; $j++){
        echo " ";   
    }
    echo "\n";
}
echo "\n";

