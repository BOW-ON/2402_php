<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/1config.php"); // 설정 파일 호출																		
require_once(FILE_LIB_DB); // DB관련 라이브러리

try {
    // DB Connect
    $conn = my_db_conn(); // PDO 인스턴스 생성
    
    // 게시글 데이터 조회
    // 파라미터 획득
    $no = isset($_GET["no"]) ? $_GET["no"] : ""; // no 획득
    $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 획득

    // 파라미터 예외처리
    $arr_err_param = [];
    if( $no === "") {
        $arr_err_param[] = "no";
    }
    if( $page === "") {
        $arr_err_param[] = "page";
    }
    if(count($arr_err_param) > 0) {
        throw new Exception("Parameter Error : ".implode( ",", $arr_err_param));
    }

    // 게시글 정보 획득
    $arr_param = [
        "no" => $no
    ];
    $result = db_select_boards_no($conn, $arr_param);
    if(count($result) !==1 ) {
        throw new Exception("Select Boards no count");
    }

    // 아이템 셋팅
    $item = $result[0];

} catch (\Throwable $err) {
    echo $err->getMessage();
    exit;
} finally {
    if(!empty($conn)) {
        // PDO 파기
        $conn = null;
    }
}


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세 페이지</title>
    <link rel="stylesheet" href="./1css/1common.css">
</head>

<body>
    <?php require_once(FILE_HEADER) ?>
    <div class="list_container">
        <div class="li_header">
            <div class="li_header_back">
                <a class="li_a" href="./1list.php">back</a>
            </div>
        </div>
        <div class="li_main">
            <div class="li_main_header">
                <div class="li_main_name">상세 PAGE</div>
                <div class="b-button">
                    <a href="./1update.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">수정</a>
                    <a href="./1delete.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">삭제</a>
                </div>
            </div>
            <div class="li_main_item">
                <div class="li_main_card">
                    <div class="li_card_item">
                        <div class="li_card_no">no</div>
                        <div class="li_card_no2"><?php echo $item["no"] ?></div>
                    </div>
                    <div class="li_card_item">
                        <div class="li_card_name">제목</div>
                        <div class="li_card_name2"><?php echo $item["title"] ?></div>
                    </div>   
                    <div class="li_card_item">
                        <div class="li_card_no">내용</div>
                        <div class="li_card_no2"><?php echo $item["content"] ?></div>
                    </div>
                    <div class="li_card_item">
                        <div class="li_card_name">created</div>
                        <div class="li_card_name2"><?php echo $item["created_at"] ?></div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</body>
</html>