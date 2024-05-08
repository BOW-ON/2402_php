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
            $this->arrErrorMsg = $resultValidator;
            return "login.php";
        }

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 유저 정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        // 유저 존재 유무 체크
        if(empty($resultUserInfo)){
            // 에러메세지
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";

            return "login.php";
        }

        // 세션에 u_id 저장
        $_SESSION["u_id"] = $resultUserInfo["u_id"];

        // 로케이션 처리
        // TODO : 보드 리스트 게시판 타입 수정할때 같이 수정
        return "Location: /board/list";
        
    }

    // 로그아웃 처리
    protected function logoutGet(){
        session_destroy(); // 세션 전체를 아예 제거.
        // +) session_unset(); // 해당 세션의 키와 값만 제거.

        return "Location: /user/login";
    }

    // 회원 가입 페이지 이동
    protected function registGet(){
        return "regist.php";
    }

    // 회원 가입 처리
    protected function registPost(){
        $requestData = [
            "u_email" => $_POST["u_email"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_name" => $_POST["u_name"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData); // static으로 만들어서 바로 호출
        if(count($resultValidator) > 0){
            $this->arrErrorMsg = $resultValidator;
            return "regist.php";
        }

        // 이메일 중복 체크
        $selectData = [
            "u_email" => $requestData["u_email"]
        ];
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($selectData);
        if(count($resultUserInfo) > 0 ) {
            $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            return "regist.php";
        }

        
        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);
        
        
        // 회원 정보 인서트 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->addUserInfo($requestData);
        if($resultUserInsert === 1) {
            $modelUsers->commit();
        } else {
            $modelUsers->rollback();
            $this->arrErrorMsg = ["회원가입에 실패 했습니다."];
            return "regist.php";
        }
        
        return "Location: /user/login";
        
    }

    // 이메일 체크 처리
    protected function chkEmailPost() {
        // 유저 입력 데이터 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
        ];

        // response 데이터 초기화
        $responseArr = [
            "errorFlg" => false
            ,"errorMsg" => ""
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData); // static으로 만들어서 바로 호출
        if(count($resultValidator) > 0){
            $this->arrErrorMsg = $resultValidator;
        } else { // 유효성체크에서 정상으로 나온 것만 이메일 중복 체크 함
            // 이메일 중복 체크
            $modelUsers = new UsersModel();
            $resultUserInfo = $modelUsers->getUserInfo($requestData);
            if(count($resultUserInfo) > 0 ) {
                $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            }
        }

        // response 데이터 셋팅
        if(count($this->arrErrorMsg) > 0) {
            $responseArr["errorFlg"] = true;
            $responseArr["errorMsg"] = $this->arrErrorMsg;
        }

        // response 처리
        header('Content-type: application/json');
        echo json_encode($responseArr);
        exit;

    }
    
    // 비밀번호 암호화
    private function encryptionPassword($pw, $email) {
        return base64_encode($pw.$email);
    }



    // 회원정보 수정 페이지 이동(SESSION 사용 > getter 사용으로 변경)
    private $callUser; // getter 사용하기 위해 변수 지정(배열로 타입설정, 값 초기화를 위해 = []을 추가해도 됨.)
    // getter 사용 : 외부에서 원본 데이터 수정을 막으면서 외부에서 사용하기 위해서
    public function getCallUser($key){ 
        return $this->callUser[$key];
    }

    // 회원정보 수정 Get 처리
    protected function editGet(){
        $requestData2 = [
            "u_id" => $_SESSION["u_id"]
        ];
        $modelUsers = new UsersModel();
        // 이름, 이메일 가져오기
        //$_SESSION['callUser'] = $modelUsers->callUser($requestData2);
        $this->callUser = $modelUsers->callUser($requestData2);

        return "edit.php";
    }

    // 회원정보 수정 Post 처리
    protected function editPost(){
        $modelUsers = new UsersModel();

        $requestData2 = [
            "u_id" => $_SESSION["u_id"]
        ];
        // 이름, 이메일 가져오기
        // $callUser = $modelUsers->callUser($requestData2);
        $this->callUser = $modelUsers->callUser($requestData2);
        

        $requestData3 = [
            "u_id" => $_SESSION["u_id"]
            ,"u_name" => $_POST["u_name"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_pw2" => $_POST["u_pw2"]
        ];
        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData3); // static으로 만들어서 바로 호출
        if(count($resultValidator) > 0){
            $this->arrErrorMsg = $resultValidator;
            return "edit.php";
        }
        

        $requestData = [
            // "u_email" => $callUser[0]["u_email"]
            "u_email" => $this->getCallUser("u_email")
            ,"u_name" => $_POST["u_name"]
            ,"u_pw" => $_POST["u_pw"]
        ];

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $this->getCallUser("u_email"));

        // 회원 정보 수정 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->editUser($requestData);
        if($resultUserInsert === 1) {
            $modelUsers->commit();
        } else {
            $modelUsers->rollback();
            $this->arrErrorMsg = ["회원정보 수정에 실패하였습니다."];
            return "edit.php";
        }


        return "Location: /user/edit";
    }


}