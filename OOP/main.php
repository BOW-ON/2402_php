<?php
require_once('./mammal/Whale.php');
require_once('./mammal/FlyingSquirrel.php');
require_once('./Swim.php');
require_once('./fish/Saba.php');


use mammal\Whale;
use mammal\FlyingSquirrel;
use inf\Swim;
use fish\Saba;

$WhaleInstance = new Whale('고래');
$WhaleInstance->swimming();

$flyingSquirrelInstance = new FlyingSquirrel('날다람쥐');
$flyingSquirrelInstance->printRegidence();

$sabaInstance = new Saba('고등어');

function test(Swim $instance) {
    $instance->swimming();
}

test($sabaInstance); // 정상으로 출력됨
// test($flyingSquirrelInstance); // test 메소드의 타입 힌트가 Swim 이므로 flyingSquirrelInstance 에는 사용할 수 없음

