<?php
namespace App\Utils;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use MyEncrypt;
use PDOException;

class MyToken {
    /**
     * 액세스 토큰과 리프레시 토큰 생성
     * 
     * @param   App\Models\User $UserInfo
     * @return  Array [$accessToken, $refreshToken]
     */
    public function createTokens(User $userInfo){
        $accessToken = $this->createToken($userInfo, env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($userInfo, env('TOKEN_EXP_REFRESH'), false);
        // .env에 관련 설정하기

        return [$accessToken, $refreshToken];
    }

    /**
     * JWT 생성
     * 
     * @param   App\Models\User $UserInfo
     * @param   int $ttl
     * @param   bool $accessFlg
     * @return  string JWT
     */
    private function createToken(User $userInfo, int $ttl, bool $accessFlg = true) {
        $header = $this->makeHeader();
        $payload = $this->makePayload($userInfo, $ttl, $accessFlg);
        $signature = $this->makeSignature($header, $payload);

        return $header.".".$payload.".".$signature;
    }

    /**
     * JWT 헤더 작성
     * 
     * @return string base64Header
     */
    private function makeHeader( ){
        $header = [
            'alg' => env('TOKEN_ALG')
            ,'type' => env('TOKEN_TYPE')
        ];

        return MyEncrypt::base64UrlEncode(json_encode($header));
    }

    /**
     * JWT 페이로드 작성
     * 
     * @param   App\Model\User $userInfo
     * @param   int $ttl(초 단위)
     * @param   bool $accessFlg
     * @return  string base64Payload
     * 
     */
    private function makePayload(User $userInfo, int $ttl, bool $accessFlg) {
        $now = time(); // 현재 시간

        // 페이로드 기본 데이터 생성
        $payload = [
            'idt' => $userInfo->id
            ,'iat' => $now  // 생성 시간
            ,'exp' => $now + $ttl
            ,'ttl' => $ttl
        ];

        // 엑세스 토큰일 경우 아래 데이터 추가
        if($accessFlg) {
            $payload['acc'] = $userInfo->account;
            $payload['name'] = $userInfo->name;
        }

        return MyEncrypt::base64UrlEncode(json_encode($payload));
    }

    /**
     * JWT 시그니처 작성
     * 
     * @param string $header base64URL Encode
     * @param string $payload base64URL Encode
     * @return string base64Signature
     */
    private function makeSignature(string $header, string $payload){
        return MyEncrypt::hashWithSalt(env('TOKEN_ALG'), $header.env('TOKEN_SECRET_KEY').$payload, MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH')));
    }

    /** 리프래시 토큰 저장 
     * 
     * @param App\Medel\User $userInfo 유정정보
     * @param strign $refreshToken 리프래시 토큰
     * 
     * @return bool true || false
    */
    public function updateRefreshToken(User $userInfo, string $refreshToken) {
        // 유저 모델 객체에 리프래시 토큰 추가
        $userInfo->refresh_token = $refreshToken;

        // 업데이트 처리
        DB::beginTransaction();
        
        if(!($userInfo->save())) {
            DB::rollback();
            throw new PDOException();
        }

        DB::commit();
    }

}
