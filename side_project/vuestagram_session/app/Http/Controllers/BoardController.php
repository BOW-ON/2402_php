<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\MyValidateException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    // ** 최초 게시글 획득 **
    public function index() {
        $boardData = Board::select('boards.*', 'users.name')
                        ->join('users', 'users.id', '=', 'boards.user_id')
                        ->orderBy('id','DESC')
                        ->limit(20)
                        ->get();

        // 레스폰스 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];
        return response()->json($responseData, 200);
    }


    // ** 추가 게시글 획득  **
    // /api/board/{id} 에서 받아온 세그먼트 파라미터로 $id를 바로 받아옴
    public function moreIndex($id) {
        $boardData = Board::select('boards.*', 'users.name')
                        ->join('users', 'boards.user_id', '=', 'users.id')
                        ->where('boards.id', '<', $id)
                        ->orderBy('boards.id','DESC')
                        ->limit(20)              
                        ->get();

        // 레스폰스 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => '추가 게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];
        return response()->json($responseData, 200);
    }


    // ** 게시글 작성  **
    public function boardCreate(Request $request) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'content' => $request->content
            ,'img' => $request->img
        ];

        // 유효성 검사
        $validator = Validator::make(
            $requestData
            ,[
                'content' => ['required', 'min:1' ,'max:200']
                ,'img' => ['required', 'image']
            ]
        );

        // 유효성 검사 실패 시 처리
        if($validator->fails()){
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // // ** 엘러펀트로 처리 **
        // // 이미지 파일 저장
        // $path = $request->file('img')->store('img');
        // // 인서트 처리
        $boardModel = Board::select('boards.*', 'users.name')
                                ->join('users', 'users.id', '=', 'boards.id')
                                ->where('user.id', Auth::id())
                                ->first();
        // $boardModel->content = $request->content;
        // $boardModel->img = $path;
        // $boardModel->user_id = Auth::id();
        // $boardModel->save();


        // ** 배열로 처리하기 (일반적으로 많이 사용함) **
        // insert 데이터 생성
        $inserData = $request->only('content');
        $inserData['user_id'] = Auth::id();

        $filePath = $request->file('img')->store('img');
        $inserData['img'] = '/'.$filePath; // 제일 앞 /는 생략가능

        // insert 처리
        $BoardInfo = Board::create($inserData);

        // response 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $BoardInfo
        ];

        return response()->json($responseData, 200);

    }
}
