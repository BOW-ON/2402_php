<?php
namespace App\Utils;

use Illuminate\Support\Str;

class MyEncrypt {
    /**
     * base64 URL 인코드
     * 
     * @param   string $json
     * @return  string base64 URL encode
     */
    public function base64UrlEncode(string $json) {
        
        return trim(strtr(base64_encode($json), '+/', '-_'), '=');
    }

    /**
     * base64 URL 디코드
     * 
     * @param   string base64 URL encode
     * @return  string $json
     */
    public function base64UrlDecode(string $base64) {
    
        return base64_decode(strtr($base64, '-_', '+/'));
    }

    /**
     * 문자열 생성
     * 
     * @param   string $alg 알고리즘 명
     * @param   string $str 암호화할 문자열
     * @param   string $salt 솔트
     * @return  string 암호화 된 문자열
     * 
     */
    public function hashWithSalt(string $alg, string  $str, string  $salt = '') {
        return hash($alg, $str).$salt;
    }

    /**
     * 특정 길이 만큼의 랜덤한 문자열 생성
     * 
     * @param   int $saltLength
     * @return  string 랜덤 문자열
     */
    public function makeSalt($saltLength) {
        return Str::random($saltLength);
    }

}