<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ---------------------
// *유저 관련
// ---------------------
// 로그인(get) : 시작페이지
Route::get('/', function () {
    return view('login'); // views/login.blade.php로 이동
})->name('get.login');

// 로그인(post)
// 로그인 버튼을 누르면 UserController의 login 함수 실행
Route::post('/login', [UserController::class, 'login'])->name('post.login');

// 로그아웃(get)
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 회원가입(get)
Route::get('/regist', function () {
    return view('regist'); // views/regist.blade.php로 이동
})->name('regist.index');

// 회원가입 완료처리(post)
Route::post('/regist', [UserController::class, 'regist'])->name('regist.store');

// 이메일 체크(post)
Route::post('/user/chk', [UserController::class, 'emailChk']);


// ---------------------
// *게시판 관련
// ---------------------
// Route::resource('/board', BoardController::class); // 아래와 같이 미들웨어 추가(접근 권한 추가)
Route::middleware('auth')->resource('/board', BoardController::class);


