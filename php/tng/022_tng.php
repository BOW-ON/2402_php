<?php
// IF로 만들어주세요.
// 성적 
// 범위 : 
//		100   : A+
//		90이상 100미만 : A
//		80이상 90미만 : B
//		70이상 80미만 : C
//		60이상 70미만 : D
//		60미만: F

//출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"
// 0~100 입력 받았을 때, "당신의 점수는 xxx점 입니다. <등급>"라고 출력 하고,
// 그 외의 값일 경우 "잘못된 값을 입력 했습니다."라고 출력해 주세요.
$num = 120; // 점수 저장용
$msg1 = "당신의 점수는 ";
$msg2 = "점 입니다.";
$msg3 = "잘못된 값을 입력 했습니다.";

if ($num > 100) {
    echo $msg3;
}
else if ($num === 100) {
    echo $msg1.$num.$msg2." <A+>";
}
else if ($num >= 90) {
    echo $msg1.$num.$msg2." <A>";
}
else if ($num >= 80) {
    echo $msg1.$num.$msg2." <B>";
}
else if ($num >= 70) {
    echo $msg1.$num.$msg2." <C>";
}
else if ($num >= 60) {
    echo $msg1.$num.$msg2." <D>";
}
else if ($num >= 0) {
    echo $msg1.$num.$msg2." <F>";
}
else {
    echo $msg3;
}
echo "\n";

// 풀이
$num_A = 1000; // 점수 저장용
$grade = ""; // 등급 저장용
$str_print = "당신의 점수는 %u점 입니다. <%s>"; // 정상 출력 포멧
$msg = "잘못된 값을 입력 했습니다."; // 오류 출력 포멧
if ($num_A >= 0 && $num_A <= 100) {
    if ($num_A === 100) {
        $grade = "A+";
    }
    else if($num_A >= 90) {
        $grade = "A";
    }
    else if($num_A >= 80) {
        $grade = "B";
    }
    else if($num_A >= 70) {
        $grade = "C";
    }
    else if($num_A >= 60) {
        $grade = "D";
    }
    else  {
        $grade = "F";
    }
    $msg = sprintf($str_print, $num_A, $grade);
}
echo $msg;