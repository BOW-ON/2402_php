<?php
require_once("./lib_db.php"); // 함수 가져오기
$limit = 5;

try {
    $CONN = db_conn(); // PDO객체 리턴 함수 호출
    
    // 쿼리 작성
    /* *placeholder 셋팅이 없는 경우
    $sql = " SELECT * FROM employees LIMIT 10 ";
    $stmt = $CONN->query($sql); // 쿼리 준비 + 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치
    print_r($result);
    */
    // *placeholder 셋팅이 있는 경우
    // $sql = " SELECT * FROM employees LIMIT ".$limt 이렇게 작성 했을경우
    // 공격자가 $limit = " 5; drop table employees;" 를 작성하면
    // " SELECT * FROM employees LIMIT 5; drop table employees; " 실행되서 drop이 됨
    // so) 보안 대처 (LIMIT :limit 처럼 보안 대처를 해야됨)
    $sql = " SELECT * FROM employees LIMIT :limit OFFSET :offset ";
    $arr_prepare = [
        "limit" => $limit
        ,"offset" => 10
    ];
    $stmt = $CONN->prepare($sql); // 쿼리 준비
    $stmt->execute($arr_prepare); // DB에 질의
    $result = $stmt->fetchAll(); // 질의 결과 패치
    
    print_r($result); // 결과 출력
} catch (\Throwable $e) {
    echo "예외 발생 : ".$e->getMessage()."\n";
} finally {
    $CONN = null; // PDO 파기
}
echo "------------------------------------\n";

// 사번 10003, 10004의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.
// prepared statment 이용해서 작성
$empNo = [10003, 10004];
$limit = 1;


try {
    $CONN = db_conn();
    $sql =
        " SELECT "
	    ."  sal.salary "
	    .", emp.emp_no "
	    .", emp.birth_date " 
        ." FROM " 
        ."  employees emp "
	    ." JOIN salaries sal "
		."  ON emp.emp_no = sal.emp_no "
		."  AND emp.emp_no IN ( :emp_no1, :emp_no2 ) "
		."  AND to_date >= Date(NOW()) "
        ." LIMIT :limit"
    ;
    $arr_prepare = [
         "emp_no1" => $empNo[0]
        ,"emp_no2" => $empNo[1]
        ,"limit" => $limit
    ];

    $stmt = $CONN->prepare($sql);
    $stmt->execute($arr_prepare);
    $result = $stmt->fetchAll();
    print_r($result);

} catch (\Throwable $err) {
    echo "예외 발생 : ".$err->getMessage()."\n";
} finally {
    $CONN = null;
}
