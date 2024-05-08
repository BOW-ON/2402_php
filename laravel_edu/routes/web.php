<?php

use Illuminate\Support\Facades\Route;
// Request 사용
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome'); // resources/view/welcome.blade.php 에 있는 파일이 실행됨
});

// ----------------------
// 라우터 정의
// ----------------------
// 문자열 리턴
Route::get('/hi', function() {
    return "안녕하세요.";
});

Route::get('/hello', function() {
    return "hello";
});

// 뷰파일 리턴
Route::get('/myview', function() {
    return view('myView');
});

// ----------------------------
// HTTP 메소드에 대응하는 라우터
// ----------------------------
Route::get('/home', function() {
    return view('home');
});

Route::post('/home', function() {
    return '<h1>POST HOME</h1>';
});

Route::put('/home', function() {
    return '<h2 style="Color : red;">PUT HOME</h2>';
});

Route::delete('/home', function() {
    return '<h3 style="Color : red; background-color : blue">DELETE HOME</h3>';
});


// ----------------------------
// 라우터에서 파라미터 제어
// ----------------------------
// 파라미터 획득
Route::get('/param', function(Request $request) {
    return 'ID : '.$request->id.", name : ".$request->name;
});
// http://localhost:8000/param?id=1234&name=홍길동


// 세그먼트 파라미터
Route::get('/segment/{id}/{gender}', function($id, $gender){
   return $id." : ".$gender; 
});
// http://localhost:8000/segment/123/apple

Route::get('/segment2/{id}/{gender}', function(Request $request, $id){
   return $request->id." : ".$id." : ".$request->gender;
});

// 세그먼트 파라미터를 기본값 설정
Route::get('/segment3/{id?}', function($id = 'base') {
    return $id;
});


// ---------------------
// 라우터명 지정
// ---------------------
Route::get('/name', function(){
    return view('name');
});

// name(라우터명) 메소드를 이용
Route::get('/name/home/php505/root', function(){
    return 'URL 매우 길다.';
})->name('name.root');

// -----------------------
// 뷰에 데이터 전달
// with(키, 값) 메소드를 이용해서 뷰에 전달
// 뷰에서는 $키 로 사용이 가능하다.
// -----------------------
Route::get('/send', function(){
    $arr = [
        'id' => 'id1'
        ,'email' => 'email@email.com'
    ];

    return view('send')
        ->with([ // 배열로 여러개 가져오기
            'gender' => '남성'
            ,'name'=> '홍길동'
            ,'data' => $arr // 배열안에 배열도 가능
        ])
        ->with('age', '20'); // 체이닝 메소드로 여러개 가져오기
});





// 존재하지 않는 url을 보냈을때 라우터 정의
//  >> 먼저 인식할수 있으므로 최하단에 두는 것이 좋음
Route::fallback(function() {
    return '없는 URL 입니다.';
});