<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;


class MyUserValidateFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'MyUserValidate';
    }
};

// 이후 config/app.php 에서 aliases 지정하기