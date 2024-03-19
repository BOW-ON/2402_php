<?php
// 다른 파일 불러오기
// *require : 파일 불러왔을때 오류가 발생하면 정지
// require : 파일을 불러옴, 코드 작성한 만큼 불러옴
require("./071_require2.php");
// require_once : 파일을 불러옴, 코드를 많이 작성해도 한번만 불러옴
require_once("./071_require2.php");

echo "\n";
echo my_sum(1, 2);