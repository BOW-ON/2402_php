<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;


class MyTokenFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'MyToken';
    }
};

// 이후 config/app.php 에서 aliases 지정하기