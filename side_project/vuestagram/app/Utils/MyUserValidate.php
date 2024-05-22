<?php

namespace App\Utils;

use App\Utils\MyValidate;

// MyFacade에 등록을 해야 파사드로 사용가능

class MyUserValidate extends MyValidate {
    protected $validateList = [
        'account' => ['required', 'min:5', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
        ,'password' => ['required', 'min:2', 'max:20', 'regex:/^[a-zA-Z0-9!@]+$/']
        ,'password_chk' => ['same:password']
        ,'name' => ['required', 'min:2', 'max:20', 'regex:/^[가-힣]+$/u']
        ,'gender' => ['required', 'regex:/^[0-9]{1}$/']
        ,'profile' => ['image']
    ];
}