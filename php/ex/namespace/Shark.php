<?php
/* 사용한 파일
    ex\namespace\Shark.php
    ex\Shark.php
    ex\Z_excute.php
*/

// namespace : 클래스명이 동일한 경우가 발생할 수 있으므로 
//      해당 파일에 주소를 할당, 일반적으로 해당 파일의 패스(경로)를 적는다.
namespace php\ex\namespace;
// 사용할 파일에서 'use 경로\클래스명' 을 작성해서 사용

class Shark {
    public function test() {
        echo "namespace의 Shark 클래스\n";
    }
}