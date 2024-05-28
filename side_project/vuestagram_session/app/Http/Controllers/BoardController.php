<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

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
}

