<?php
// class : 동종의 객체들을 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
class Whale {
    // *접근 제어 지시자 (캡슐화, 외부에서 접근을 제어하기 위해)
    // 프로퍼티(public, private, protected)
    // public : class 외부, 내부 어디에서 접근가능
    public $str;
    // private : class 내부에서만 접근가능, 외부 접근 불가능
    private $i;
    // protected : class 내부에서만 접근 가능, 외부 접근 불가능
    //      단, 상속 관계에서는 접근이 가능
    protected $boo;
    
    private $name;

    // 생성자 메소드
    public function __construct($name) {
        $this->name = $name;
    }

    // getter / setter
    // 외부에서 기존 private이나 protected로 설정된 프로퍼티(값)에 접근할 수 있도록 따로 만듬
    // 기존 값 오염을 막으면서 값을 외부에서도 사용할 수 있음
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    // *메소드 : 클래스 안에서 정의된 함수라고 생각
    //      보통 한 메소드에는 한가지 처리만 작성
    public function swim($opt) {
        echo $opt.$this->name." 헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name." 호흡 한다.\n";
    }
    // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    // 이미 메모리에 저장 되어 있기때문에 this->를 사용할 수 없다.
    public static function big() {
        echo "매우 크다.\n";
    }
}
// static 메소드 호출
Whale::big();

// 클래스 인스턴스 생성
$objWhale = new Whale("고래");
//Whale 클래스를 변수에 지정하고
$objWhale->swim("흰 수염 ");
//클래스의 특정 메소드를 호출
echo $objWhale->getName()."\n";
$objWhale->breathe();

$objWhale->setName("참새");
$objWhale->swim("흰 수염 ");
$objWhale->breathe();


echo "\n";
// Shark 클래스들 만들어주세요.
// 프로퍼티 : private $name
// 생성자 메소드 : Whale 클래스랑 동일
// 메소드 : public swim, public breathe

/* Shark.php 파일로 옮겨서 사용 (php\ex\Shark.php)
    일반적으로 클래스는 파일로 별도로 만들어서 관리함
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

// 인스턴스 생성
$objShark = new Shark("상어");
// 호출
$objShark->swim();
$objShark->breathe();
*/