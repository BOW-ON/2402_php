<?php

// 함수
function next_btn(&$conn, &$array_param){
    $sql =
        " SELECT "
        ." no "
        ." FROM "
        ." boards1 "
        ." WHERE "
        ." no > :no "
        ." AND deleted_at IS NULL "
        ." ORDER BY no ASC "
        ." LIMIT 1 "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchColumn();

    return $result ? $result : null;
}
function prev_btn(&$conn, &$array_param){
    $sql=
        " SELECT "
        ." no" 
        ." FROM "
        ." boards1 " 
        ." WHERE "
        ." no < :no " 
        ." AND "
        ." deleted_at IS NULL " 
        ." ORDER BY no DESC " 
        ." LIMIT 1 "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchColumn();

    return $result ? $result : null;
}

function max_no_sql(&$conn){
    $sql =
        " SELECT "
        ." MAX(no) no "
        ." FROM boards1 "
        ." WHERE "
        ." deleted_at IS NULL "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result[0]["no"];
}

function min_no_sql(&$conn){
    $sql =
        " SELECT "
        ." MIN(no) no "
        ." FROM "
        ." boards1 "
        ." WHERE "
        ." deleted_at IS NULL "
    ;

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result[0]["no"];
}


// 변수
$max_board_no = max_no_sql($conn);
$min_board_no = min_no_sql($conn);
$prev_btn_result = prev_btn($conn, $arr_param);
$next_btn_result = next_btn($conn, $arr_param);

// html
// detail.php?no = <?php
// if($prev_btn_result !== null){
//     echo $prev_btn_result;
// }
// if($no == $min_board_no){
//     echo $min_board_no;
// }

// detail.php?no = <?php
// if($next_btn_result !== null){
//     echo $next_btn_result;
// }
// if($no == $max_board_no){
//     echo $max_board_no;
// }