<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use MyBoardValidate;

class BoardController extends Controller
{
    /**
     * 초기 보드리스트 획득
     * 
     * @param string $id 마지막 게시글 pk
     * 
     * @return response() json
     */
    public function index($id) {
        // 유효성 체크용 데이터 초기화
        $requsetData = [
            'id' => $id
        ];

        // 유효성 체크
        $validator = MyBoardValidate::myValidate($requsetData);

        // 유효성 검사 실패 시 처리
        if($validator->fails()){
            throw new MyValidateException('E01');
        }

        // 게시글 정보 획득 
        //  - $id == 0 일 경우, 최초 게시글 습득
        //  - $id != 0 일 경우, 해당 id까지의 모든 데이터 습득
        $BoardList = Board::join('users', 'boards.user_id', '=', 'users.id')
                            ->select('boards.*', 'users.name')
                            ->orderBy('boards.id', 'DESC')
                            // when : 라라벨에서 동적 쿼리 만들기 (id가 0일때 와 아닐때)
                            ->when($id, function($query, $id) {
                                // id != 0
                                return $query->where('boards.id', '>=', $id);
                            })
                            ->unless($id, function($query, $id) {    
                                // id == 0
                                return $query->limit(20);
                            })
                            ->get();

        $responseData = [
            'code'=> '0'
            ,'msg' => ''
            ,'data' => $BoardList->toArray()
        ];

        return response()->json($responseData, 200);
    }
}
