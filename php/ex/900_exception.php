<?php
// try, catch, finally
try{
    // 예외가 발생할 처리(로직)를 작성
    $i = 5 / 0;
    echo "\$i의 값은 : ";
    // 참고) \ + 문자 : \ 바로 뒤에 한 문자는 문자열로 인식함 ex) \n
    echo $i;
}
catch(\Throwable $e) { // 7버전 이상 (이하는 Exception으로 사용)
    // 예외가 발생했을 때 처리(로직)를 작성
    echo "예외 발생\n".$e->getMessage()."\n";
    // $변수->getMessage() : 어떤 에러가 났는지 알려주는 메세지
}
// 또다른 예외 처리를 추가 하고 싶으면 catch() {} 로 이어서 여러개 작성하면 된다.
// 단, 계층이 낮은 순서부터 작성해야 먼저 예외 처리에 걸린다.
finally {
    // 예외 발생 여부와 상관없이 무조건 마지막 실행
    // finally는 생략 가능
    echo "finally\n";
}

echo "계산 완료";