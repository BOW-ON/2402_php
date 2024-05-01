<?php
namespace controller;

use model\UsersModel;
use lib\UserValidator;

class UserController extends Controller {
    // 로그인 페이지로 이동
    protected function loginGet() {
        return "login.php";
    }
    
    // 로그인 처리
    protected function loginPost() {
        // 유저 입력 정보 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
            ,"u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        // TODO : 나중에 구현
        $resultValidator = UserValidator::chkValidator($requestData); // static으로 만들어서 바로 호출
        if(count($resultValidator) > 0){
            $this->arrErrorrMsg = $resultValidator;
            return "login.php";
        }


        // 유저 정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        // 유저 존재 유무 체크
        if(empty($resultUserInfo)){
            // 에러메세지
            $this->arrErrorrMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";

            return "login.php";
        }

        // 세션에 u_id 저장
        $_SESSION["u_id"] = $resultUserInfo["u_id"];

        // 로케이션 처리
        // TODO : 보드 리스트 게시판 타입 수정할때 같이 수정
        return "Location: /board/list";
        
    }

    // 로그아웃 처리
    public function logoutGet(){
        session_destroy(); // 세션 전체를 아예 제거.
        // +) session_unset(); // 해당 세션의 키와 값만 제거.

        return "Location: /user/login";
    }
}