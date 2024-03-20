<?php
// 클래스는 파일로 만들고 불러와서 사용한다.
include_once("./Shark.php");
include_once("./namespace/Shark.php");
// 클래스명이 동일할 경우 namespace와 use를 사용해서 구분

// use : namespace를 이용해서 특정 클래스를 지정
//      별칭을 설정할 수도 있음(선택사항). 단, 별칭을 부여했으면 무조건 별칭으로 사용.
use php\ex\Shark as ExShark;
use php\ex\namespace\Shark as NamespaceShark;

$obj = new ExShark("죠스");
$obj->swim();
$obj = new NamespaceShark("죠스");
$obj->test();
