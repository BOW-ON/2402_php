<?php

class Shark {
    // 프로퍼티
    private $name;
    // 생성자
    public function __construct($name) {
        $this->name = $name;
    }
    // 메소드
    public function swim() {
        echo $this->name." 수영한다.\n";
    }
    public function breathe() {
        echo $this->name." 호흡한다.\n";
    }
}