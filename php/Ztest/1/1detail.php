<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/1config.php"); // 설정 파일 호출																		
require_once(FILE_LIB_DB); // DB관련 라이브러리


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
                <div class="li_main_name">DETAIL PAGE</div>
                <a href="./1update.php" class="a-button small-button">수정</a>
                <a href="./1delete.php" class="a-button small-button">삭제</a>
            </div>
            <div class="li_main_item">
                <div class="li_main_card">
                    <div class="li_card_item">
                        <div class="li_card_no">no</div>
                        <div class="li_card_no2">1</div>
                    </div>
                    <div class="li_card_item">
                        <div class="li_card_name">제목</div>
                        <div class="li_card_name2">1234</div>
                    </div>   
                    <div class="li_card_item">
                        <div class="li_card_no">작성일자</div>
                        <div class="li_card_no2">12342222</div>
                    </div>
                    <div class="li_card_item">
                        <div class="li_card_name">내용</div>
                        <div class="li_card_name2">1234ㅁㅇㄻㄴㅇㄹ</div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</body>
</html>