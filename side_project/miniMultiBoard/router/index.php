<?php
// ex) 연결확인
//  echo $_GET['url'];

// *설정 파일 불러오기
require_once("./config.php");
// ex) 연결확인
//  echo _ROOT;

// *오토로드 호출
// 자동으로 requrier_once를 함
require_once("./autoload.php");


// require_once("router/Router.php");
// requrier_once를 오토로드 사용하기때문에 직접 불러올 필요 없어서 삭제

// *라우터 호출
new router\Router();
