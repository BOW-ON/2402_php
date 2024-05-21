<?php

namespace App\Http\Controllers;

// use App\Utils\MyUserValidate;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use MyUserValidate;
use MyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            Log::debug('login Validation Error', $resultValidate->errors()->all());
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)
                                    ->withCount('boards')
                                    ->first();

        // 미등록 유저 체크
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');
        }

        // 토근 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프레시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        return response()->json($responseData, 200);

        
    }
}
