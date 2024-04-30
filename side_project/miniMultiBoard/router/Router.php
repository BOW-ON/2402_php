<?php
namespace router; // Review) 클래스가 위치한 주소(경로) > \로 작성

use controller\UserController;
use controller\BoardController;

// 라우터 : 유저의 요청을 분석해서 해당 Controller로 연결해주는 클래스
class Router {
    // 생성자 : 무조건 실행되는 메소드 (일반 메소드는 호출을 해야 출력됨)
    public function __construct() {
        // URL 규칙
        // 1. 회원 관련 URL
        //      user/[액션]
        //      ex) 로그인 : 도메인/user/login
        //      ex) 회원가입 : 도메인/user/regist
        // 2. 게시판 관련 URL
        //     board/[액션]
        //      ex) 리스트 : 도메인/board/list
        //      ex) 수정 : 도메인/board/edit

        $url = $_GET["url"]; // url 획득
        $httpMethod = $_SERVER["REQUEST_METHOD"]; // HTTP 메소드 획득

        // url 체크
        if($url === "user/login") {
            // 회원 로그인 관련
            if($httpMethod === "GET") {
                new UserController("loginGet");
            } else {
                new UserController("loginPost");
            }
        } else if ($url === "board/list") {
            // 게시글 페이지 관련
            if($httpMethod === "GET") {
                new BoardController("listGet");
            }
        }

        // 예외처리
        echo "잘못된 URL : ".$url;


    }
}