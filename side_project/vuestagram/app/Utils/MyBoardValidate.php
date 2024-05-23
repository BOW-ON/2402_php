<?php

namespace App\Utils;

use App\Utils\MyValidate;

// MyFacade에 등록을 해야 파사드로 사용가능

class MyBoardValidate extends MyValidate {
    protected $validateList = [
        'id' => ['regex:/^[0-9]+$/']
        ,'content' => ['required', 'max:200']
        ,'img' => ['image']
    ];
}