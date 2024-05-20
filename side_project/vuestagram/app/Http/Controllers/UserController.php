<?php

namespace App\Http\Controllers;

// use App\Utils\MyUserValidate;
use MyUserValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request) {
        // LOG_LEVEL이 debug 이상일 경우 (.env에 확인 및 설정 가능)
        Log::debug('Start Login', $request->all());


        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
        ];
        
        // 유효성 검사
        // MyUserValidate를 Facade로 만들어야 static함수로 바로 사용할수 있음
        //      >> (MyUserValidateFacade.php)
        // MyUserValidate::make($requestData); 
        $resultValidate =  MyUserValidate::myValidate($requestData);

        // 유효성 검사 실패 처리
        if($resultValidate->fails()){
            
        }

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => 'accessToken'
            ,'refreshToken' => 'refreshToken'
        ];
        return response()->json($responseData, 200);

    }
}
