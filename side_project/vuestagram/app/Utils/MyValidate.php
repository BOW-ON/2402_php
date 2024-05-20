<?php

namespace App\Utils;

use Illuminate\Support\Facades\Validator;

// abstract(추상클래스) : 상속 받은 자식에게 강제성을 부여함
abstract class MyValidate {
    protected $validateList; // 유효성 체크 패턴 리스트

    public function myValidate($chkData) {
        $validateItem =[];

        // 유효성 체크 리스트 재구성
        foreach($chkData as $key => $val) {
            $validateItem[$key] = $this->validateList[$key];
        }

        // 유효성 검사
        return Validator::make($chkData, $validateItem);
    }

}