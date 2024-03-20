<?php
require_once("./lib_db.php");


try {
    $conn = db_conn();

    $sql =
        " UPDATE employees SET first_name = :first_name
        WHERE emp_no = :emp_no ";
    
    $arr_prepare = [
         "first_name" => "gildong"
        ,"emp_no" => 700000
    ];

    $conn->beginTransaction(); // 트랜잭션 시작
    $stmt = $conn->prepare($sql); // DB 질의 준비
    $stmt->execute($arr_prepare); // DB 질의 실행

    $conn->commit(); // 커밋 처리
    echo "수정 완료\n";
} catch (\Throwable $err) {
    if(!empty($conn)) {
        $conn->rollBack(); // 롤백 처리
    }
    echo "예외 발생 : ".$err->getMessage()."\n";
} finally {
    $conn = null;
}