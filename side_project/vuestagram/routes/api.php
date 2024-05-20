<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 유저가 url을 보낼떄 /api를 포함해서 보낼 시 api.php에서 처리함
//  so) 아래 url은 '/api/login 이라고 생각하면 됨
Route::post('/login', [UserController::class, 'login']);
