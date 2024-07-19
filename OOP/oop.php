<?php
// *객체 지향

// Whale와 FlyingSquirrel을 공통인 부분을 묶어서 추상화 작업을 함
// Whale, FlyingSquirrel에 Mammal을 상속하여 사용하면 된다.
class Mammal {
    protected $name;
    protected $residence;

    // 생성자 메소드
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }
    // final : 메소드 앞에 작성하면 자식 클래스에서 메소드로 사용하지 못함
    final public function breath() {
        echo $this->name."는 폐호흡을 합니다.\n";
    }
}

class Whale extends Mammal {
    // public $name;
    // public $residence;
    
    public function __construct() {
        echo "고래 클래스 입니다.\n";
        // 부모 생성자 메소드를 실행함
        parent::__construct("고래", "바다");
    }


    // public function breath() {
    //     echo $this->name."는 폐호흡을 합니다.";
    // }
    public function swimming() {
        echo $this->name."가 헤엄을 칩니다.\n";
    }

    // 부모 클래스에서 final을 사용하였기 때문에 사용 하지 못함
    // public function breath() {
    //     echo $this->name."는 폐호흡을 하고 숨을 잘 참습니다.";
    // }
}

class FlyingSquirrel extends Mammal {
    // public $name;
    // public $residence;
    
    // public function breath() {
    //     echo $this->name."는 폐호흡을 합니다.";
    // }
    public function flying() {
        echo $this->name."가 날아갑니다.\n";
    }

}

// 인스턴스
// $WhaleInstance = new Whale("고래", "바다");
$WhaleInstance = new Whale();
$WhaleInstance->breath();




// 예제)
class fish {
    protected $name;
    protected $residence;
    // 생성자
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }
    final public function breath() {
        echo $this->name."는 아가미 호흡을 합니다.\n";
    }
    public function swimming() {
        echo $this->name."가 헤엄을 칩니다.\n";
    }
}

class Saba extends fish{
    // protected $name;
    // protected $residence;
    // // 생성자
    // public function __construct(string $name, string $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    // final public function breath() {
    //     echo $this->name."는 아가미 호흡을 합니다.\n";
    // }
    // public function swimming() {
    //     echo $this->name."가 헤엄을 칩니다.\n";
    // }
}
class FlyingFish extends fish{
    // protected $name;
    // protected $residence;
    // // 생성자
    // public function __construct(string $name, string $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    // final public function breath() {
    //     echo $this->name."는 아가미 호흡을 합니다.\n";
    // }
    // public function swimming() {
    //     echo $this->name."가 헤엄을 칩니다.\n";
    // }
    public function flying() {
        echo $this->name."가 날아갑니다.\n";
    }
}

$sabaInstance = new saba("고등어", "바다");
$sabaInstance->breath();


