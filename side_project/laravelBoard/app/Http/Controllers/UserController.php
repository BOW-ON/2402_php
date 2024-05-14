<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function login(Request $request) {
        // ------------------------------
        // *유효성 검사
        // ------------------------------
        // 1. 라라벨에서 제공하는 validate
        $request->validate([
            'email' => 'required|email|max:50' // 라라벨에서 제공하는 validate 형식
            // 'email' => ['required, email, max:50'] // 배열로 받아도 됨
            ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
        ]);

        // 2. validator 객체 생성으로 체크하는 방법(실패해도 이전 페이지로 이동X)
        //  >> 유효성 검사 이후 추가 처리를 하고 싶을 경우 사용자validator를 생성함
        // $validator = Validator::make(
        //     $request->only('email', 'password')
        //     ,[
        //         'email' => 'required|email|max:50'
        //         ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
        //     ]
        // );

        // if($validator->fails()){
        //     return redirect() // redirect() : PHP에서 Location 처리랑 동일
        //             ->route('get.login')
        //             ->withErrors($validator->errors());
        // }
        
        // ------------------------------
        // *유저 정보 획득
        // ------------------------------
        $resultUserInfo = User::where('email', $request->email)->first();
        $errorMsg = '';
        // if(!$resultUserInfo) { // null값 체크하기 위해 !을 사용해도 되지만 정확히 하기 is_null 사용
        if(is_null($resultUserInfo)){
            // 회원 존재 여부 체크
            $errorMsg = '존재하지 않는 회원입니다.';
        } else {
            // 비밀번호 일치 체크
            if(!(Hash::check($request->password, $resultUserInfo->password))){
                $errorMsg = '비밀번호가 일치하지 않습니다.';
            }
        }
        // 회원 정보 예외 발생시, 로그인 페이지로 리다이렉트
        if($errorMsg !== '') {
            return redirect()->route('get.login')->withErrors($errorMsg);
        }

        // --------------------------
        // *유저 인증 처리
        // --------------------------
        // 로그인 처리
        Auth::login($resultUserInfo);
        // Auth::id() : 로그인한 유저 PK 획득
        // Auth::user() : 로그인한 유저 정보 획득
        // Auth::check() : 현재 로그인 여부 체크

        
        return redirect()->route('board.index');
    }

    // ------------------------------
    // *로그아웃 처리
    // ------------------------------    
    public function logout(Request $request) {
        Auth::logout(); // 로그 아웃

        // 1. Session 객체 이용
        Session::invalidate();// 기존 세션의 모든 데이터를 제거하고 새로운 세션 ID를 발급
        Session::regenerateToken(); // CSRF 토크 재발급

        // 2. Request 객체의 Session메소드 이용
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('get.login');


    }
    // ------------------------------    
    // *회원가입 처리
    // ------------------------------    
    public function regist(Request $request) {
        
        // 유효성 검사
        $request->validate([
            'email' => 'required|email|max:50' // 라라벨에서 제공하는 validate 형식
            // 'email' => ['required, email, max:50'] // 배열로 받아도 됨
            ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
            ,'name' => ['required', 'regex:/^[가-힣]{2,30}$/u']
        ]);

        // 회원정보 가공
        $insertData = $request->only('email', 'password', 'name');
        $insertData['password'] = Hash::make($insertData['password']);

        // 인서트 처리
        User::create($insertData);

        // return view('login'); // url은 변경되지 않은 상태에서 화면만 login페이지를 출력함.
        //  so) redirect 로 이동해야됨
        return redirect()->route('get.login'); 
             
    }

    // ------------------------------   
    // *이메일 중복 처리
    // ------------------------------   
    public function emailChk(Request $request) {
        try {
            // 응답 데이터 초기화
            $responseData = [
                'errorFlg' => true
                ,'emailFlg' => true
                ,'errorMsg' => ''
            ];

            // 유효성 검사
            $validation = Validator::make(
                $request->only('email')
                ,[
                    'email' => 'required|email|max:50'
                ]
            );    
            if($validation->fails()){
                throw new Exception('유효성 체크 에러');
            };

            // 이메일 체크
            $resultEmail = User::select('id')
                                ->where('email',$request->email)
                                ->first();
            if(!is_null($resultEmail)) {
                $responseData['emailFlg'] = true;
                throw new Exception('이메일 중복');
            }

            //정상 처리 (사용가능 이메일)
            $responseData['errorFlg'] = false;
            $responseData['emailFlg'] = false;


        } catch (\Throwable $th) {
            $responseData['errorFlg'] = true;
            $responseData['errorMsg'] = $th->getMessage();
        } finally {
            return response()->json($responseData);
        }

    }


}
