<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use Illuminate\Http\Request;
use MyBoardValidate;
use MyToken;

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

    /**
     * 추가 보드리스트 획득
     * 
     * @param string $id 마지막 게시글 pk
     * 
     * @return response() json
     */
    public function addIndex($id) {
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
        $BoardList = Board::join('users', 'boards.user_id', '=', 'users.id')
                            ->select('boards.*', 'users.name')
                            ->orderBy('boards.id', 'DESC')
                            ->where('boards.id', '<', $id)
                            ->limit(20)
                            ->get();

        $responseData = [
            'code'=> '0'
            ,'msg' => ''
            ,'data' => $BoardList->toArray()
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 글 작성
     * 
     * @param Illuminate\Http\Request;
     * 
     * @return string json 
     */
    public function store(Request $request) {
        // 유효성 체크용 데이터 초기화
        $requsetData = [
            'content' => $request->content
            ,'img' => $request->img
        ];

        // 유효성 체크
        $validator = MyBoardValidate::myValidate($requsetData);

        // 유효성 검사 실패 시 처리
        if($validator->fails()){
            throw new MyValidateException('E01');
        }

        // insert 데이터 생성
        $inserData = $request->only('content');
        $inserData['user_id'] = MyToken::getValueInPayload($request->bearerToken(), 'idt');

        // filesystem.php : local 부분 my로 변경 후 'root' => public_path() 로 수정하기
        // .env : FILESYSTEM_DISK = my로 변경
        $filePath = $request->file('img')->store('img');
        $inserData['img'] = '/'.$filePath;
        $inserData['like'] = 0;

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
