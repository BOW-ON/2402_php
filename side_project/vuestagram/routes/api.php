<?php

use App\Http\Controllers\BoardController;
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

// 유저가 url을 보낼때 /api를 포함해서 보낼 시 api.php에서 처리함
//  so) 아래 url은 '/api/login 이라고 생각하면 됨

// 인증관련
Route::post('/login', [UserController::class, 'login']);
Route::middleware('my.auth')->post('/logout', [UserController::class, 'logout']);


// 보드 관련
Route::middleware('my.auth')->get('/board/{id}/list', [BoardController::class, 'index']);
Route::middleware('my.auth')->get('/board/{id}', [BoardController::class, 'addIndex']);
Route::middleware('my.auth')->post('/board', [BoardController::class, 'store']);





// 유효하지 않은 패스
Route::fallback(function(){
    return response()->json(['code' => 'E90']);
});