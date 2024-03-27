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
    <title>수정 페이지</title>
    <link rel="stylesheet" href="./1css/1common.css">
</head>
<body>
    <?php require_once(FILE_HEADER) ?>
    update
    <a href="./1list.php">완료</a>
    <a href="./1list.php">취소</a>
</body>
</html>