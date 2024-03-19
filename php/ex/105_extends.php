<?php
// 상속 : 부모클래스의 자원을 자식 클래스가 물려받아 사용하거나 재정의 하는것

class Parents {
    protected $name;

    public function __construct() {
        echo "부모클래스 생성자 실행\n";
    }

    private function home() {
        echo "집은 부모님 겁니다.\n";
    }
    public function car() {
        echo "차는 부모님 자식 다 씁니다.\n";
    }
}

class Child extends Parents {
    public function __construct($name) {
        $this->name = $name;
        echo "자식클래스 생성자 실행\n";
    }
    public function dog() {
        echo "강아지는 제겁니다.";
    }

    // 오버라이딩 : 부모의 메소드를 자식에서 재정의해서 사용
    public function car() {
        echo "이 자동차는 이제 제겁니다.";
    }

    public function getName() {
        echo $this->name;
    }
}

$obj = new Child();
// construct 생성자를 실행 > 자신의 construct를 찾고 없으면 기본값
//      but) 상속일경우 자식의 construct가 없을 시 부모의 construct가 있는지 확인 후 실행
$obj = new Child("홍길동");
// 자식 클래스 안에 name을 정의하는 변수가 없기 때문에 %$this->name을 사용 불가능.
// but) 상속인 경우 자식에 없어도 부모의 name 정의한 것을 받아오기 때문에 사용 가능.
$obj->car();
// $obj->home();
// 부모에서 home을 private으로 생성했고 자식 인스턴스만 생성 해서 오류가 발생



