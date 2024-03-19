<?php
// 다른 파일 불러오기
// *include : 파일 불러왔을때 오류가 발생해도 정지하지 않고 진행
// include : 파일을 불러옴, 코드 작성한 만큼 불러옴
include("./070_include2.php");
// include_once : 파일을 불러옴, 코드를 많이 작성해도 한번만 불러옴
include_once("./070_include2.php");

echo "\n";
echo my_sum(1, 2);